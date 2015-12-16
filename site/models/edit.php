<?php

defined('_JEXEC') or die;

//jimport('joomla.application.component.modelitem');
class PolartourModelEdit extends JModelItem
{
	public $tournament_id;
	
	public function __construct($config=array())
	{
		$app=JFactory::getApplication();
		$this->input = $app->input;
		$this->tournament_id=$this->input->getInt('id',0);
		
		parent::__construct($config);
	}
	
	public function getItem()
	{
		$item=array("tournament" => array(), "player" => array(), "result" => array());
		if ($this->tournament_id==0)
		{
			// Sett standardverdier
			$user=JFactory::getUser();
			$item['tournament']['id']=0;	
			$item['tournament']['event']='';
			$item['tournament']['site']='';	
			$item['tournament']['organizer']='';	
			$item['tournament']['arbiter']='';	
			$item['tournament']['owner']=$user->id;
			$item['tournament']['ownername']=$user->name;
			$item['tournament']['rounds']=0;
			$item['tournament']['elocat']=0;
			$item['tournament']['showtiebreak']=0;
			$item['tournament']['showelo']=0;
			$item['tournament']['showclub']=0;
			$item['tournament']['showcolor']=0;
			$item['tournament']['switchname']=0;
			$item['tournament']['tiebreak1']=0;
			$item['tournament']['tiebreak2']=0;
			$item['tournament']['tiebreak3']=0;
			$item['tournament']['tiebreak4']=0;
			$item['tournament']['tiebreak5']=0;
			$item['tournament']['tournamenttype']=0;
			$item['tournament']['startdate']=date('Y-m-d');
			$item['tournament']['enddate']=date('Y-m-d');
			$item['tournament']['pgnfile']='';
			$item['tournament']['updated']=date('Y-m-d H:i:s');
			$item['tournament']['comment']='';
			return $item;
		}
		$db=$this->getDbo();
		
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_tournament');
		$query->where("id={$this->tournament_id}");
		//		var_dump($query); return;
		$db->setQuery($query);
		if ($db->execute())
		  $item["tournament"]=$db->loadAssoc();
		
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_player');
		$query->where("tournamentid={$this->tournament_id}");
		$db->setQuery($query);
		if ($db->execute())
			$item["player"]=$db->loadAssocList();

		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_result');
		$query->where("tournamentid={$this->tournament_id}");
		$db->setQuery($query);
		if ($db->execute())
			$item["result"]=$db->loadAssocList();
		return $item;
	}
	
	public function save($item)
	{
		$db=$this->getDbo();
		
		// Lagre turneringsinfo
		$query=$db->getQuery(true);
		if ($item['tournament']['id']==0)
		{
			$query->insert('#__polartour_tournament');
		} else
		{
			$query->update('#__polartour_tournament');
			$query->where('id=' . $item['tournament']['id']);
		}
		$query->set('event=' . $db->quote($item['tournament']['event']));
		$query->set('site=' . $db->quote($item['tournament']['site']));
		$query->set('organizer=' . $db->quote($item['tournament']['organizer']));
		$query->set('arbiter=' . $db->quote($item['tournament']['arbiter']));
		$query->set('owner=' . $item['tournament']['owner']);
		$query->set('elocat=' . $item['tournament']['elocat']);
		$query->set('showtiebreak=' . $item['tournament']['showtiebreak']);
		if (!isset($item['tournament']['showelo']))
			$query->set('showelo=0');
		else
			$query->set('showelo=' . $item['tournament']['showelo']);
		if (!isset($item['tournament']['showclub']))
			$query->set('showclub=0');
		else
			$query->set('showclub=' . $item['tournament']['showclub']);
		if (!isset($item['tournament']['showcolor']))
			$query->set('showcolor=0');
		else
			$query->set('showcolor=' . $item['tournament']['showcolor']);
		if (!isset($item['tournament']['switchname']))
			$query->set('switchname=0');
		else
			$query->set('switchname=' . $item['tournament']['switchname']);
		$query->set('tiebreak1=' . $item['tournament']['tiebreak1']);
		$query->set('tiebreak2=' . $item['tournament']['tiebreak2']);
		$query->set('tiebreak3=' . $item['tournament']['tiebreak3']);
		$query->set('tiebreak4=' . $item['tournament']['tiebreak4']);
		$query->set('tiebreak5=' . $item['tournament']['tiebreak5']);
		$query->set('tournamenttype=' . $item['tournament']['tournamenttype']);
		$query->set('startdate=' . $db->quote($item['tournament']['startdate']));
		$query->set('enddate=' . $db->quote($item['tournament']['enddate']));
		$query->set('pgnfile=' . $db->quote($item['tournament']['pgnfile']));
		$query->set('updated=' . $db->quote($item['tournament']['updated']));
		$query->set('comment=' . $db->quote($item['tournament']['comment']));
		$db->setQuery($query);
		$db->execute();
		if ($item['tournament']['id']==0)
			$ret=$db->insertid();
		else
			$ret=$item['tournament']['id'];

			// Lagre spillere		
		foreach ($item['player'] as $player)
		{
			$query=$db->getQuery(true);
			$del=(strlen($player['firstname'].$player['lastname'])==0)?true:false;
			if ($del)
			{
				if ($player['id']!=0)
				{
					$query=$db->getQuery(true);
					$query->delete('#__polarbook_player');
					$query->where('id='.$player['id']);
					$db->setQuery($query);
					$db->execute();
				}
			} else 
			{
				if ($player['id']==0)
				{
					$query->insert('#__polartour_player');
					$query->set('tournamentid=' . $item['tournament']['id']);
				} 	else
				{
					$query->update('#__polartour_player');
					$query->where('id=' . $player['id']);
				}
				$query->set('firstname=' . $db->quote($player['firstname']));
				$query->set('lastname=' . $db->quote($player['lastname']));
				$query->set('club=' . $db->quote($player['club']));
				$query->set('elo=' . $player['elo']);
				$query->set('startnr=' . $player['startnr']);
				$query->set('born=' . $db->quote($player['born']));
				$query->set('comment=' . $db->quote($player['comment']));
				$db->setQuery($query);
				$db->execute();
			}
		}
			// Lagre resultater		
		foreach ($item['result'] as $result)
		{
			$query=$db->getQuery(true);
			$del=(($result['whiteid']+$result['blackid'])==0)?true:false;
			if ($del)
			{
				if ($result['id']!=0)
				{
					$query=$db->getQuery(true);
					$query->delete('#__polarbook_result');
					$query->where('id='.$result['id']);
					$db->setQuery($query);
					$db->execute();
				}
			} else 
			{
				if ($result['id']==0)
				{
					$query->insert('#__polartour_result');
					$query->set('tournamentid=' . $item['tournament']['id']);
				} 	else
				{
					$query->update('#__polartour_result');
					$query->where('id=' . $result['id']);
				}
				$query->set('whiteid=' . $result['whiteid']);
				$query->set('blackid=' . $result['blackid']);
				$query->set('round=' . $result['round']);
				$query->set('result=' . $result['result']);
				$query->set('whitescore=' . $result['whitescore']);
				$query->set('blackscore=' . $result['blackscore']);
				$query->set('game=' . $result['game']);
				$query->set('comment=' . $db->quote($result['comment']));
				$db->setQuery($query);
				$db->execute();
			}
		}
		return $ret;
	}
}

