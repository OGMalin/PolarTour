<?php

defined('_JEXEC') or die;

//jimport('joomla.application.component.modelitem');
class PolartourModelEdit extends JModelAdmin
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
			$item['tournament']['catid']=0;	
			$item['tournament']['state']=0;	
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
			return $item;
		}
		$db=$this->getDbo();
		
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_tournament');
		$query->where("id={$this->tournament_id}");
		//		var_dump($query); return;
		$db->setQuery($query);
	  $item["tournament"]=$db->loadAssoc();
		
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_player');
		$query->where("tournamentid={$this->tournament_id}");
		$db->setQuery($query);
		$item["player"]=$db->loadAssocList();

		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_result');
		$query->where("tournamentid={$this->tournament_id}");
		$db->setQuery($query);
		$item["result"]=$db->loadAssocList();
		return $item;
	}
	
	public function save($item)
	{
//		echo "<pre>"; var_dump($item); echo "</pre>"; exit;
		$db=$this->getDbo();
		
		// Lagre turneringsinfo
		$query=$db->getQuery(true);
		if ((int)$item['tournament']['id']==0)
		{
			$query->insert('#__polartour_tournament');
		} else
		{
			$query->update('#__polartour_tournament');
			$query->where('id=' . (int)$item['tournament']['id']);
		}
		$query->set('catid=' . (int)$item['tournament']['catid']);
		$query->set('state=' . (int)$item['tournament']['state']);
		$query->set('event=' . $db->quote($item['tournament']['event']));
		$query->set('site=' . $db->quote($item['tournament']['site']));
		$query->set('organizer=' . $db->quote($item['tournament']['organizer']));
		$query->set('arbiter=' . $db->quote($item['tournament']['arbiter']));
		$query->set('owner=' . (int)$item['tournament']['owner']);
		$query->set('elocat=' . (int)$item['tournament']['elocat']);
		$query->set('showtiebreak=' . (int)$item['tournament']['showtiebreak']);
		if (!isset($item['tournament']['showelo']))
			$query->set('showelo=0');
		else
			$query->set('showelo=' . (int)$item['tournament']['showelo']);
		if (!isset($item['tournament']['showclub']))
			$query->set('showclub=0');
		else
			$query->set('showclub=' . (int)$item['tournament']['showclub']);
		if (!isset($item['tournament']['showcolor']))
			$query->set('showcolor=0');
		else
			$query->set('showcolor=' . (int)$item['tournament']['showcolor']);
		if (!isset($item['tournament']['switchname']))
			$query->set('switchname=0');
		else
			$query->set('switchname=' . (int)$item['tournament']['switchname']);
		$query->set('tiebreak1=' . (int)$item['tournament']['tiebreak1']);
		$query->set('tiebreak2=' . (int)$item['tournament']['tiebreak2']);
		$query->set('tiebreak3=' . (int)$item['tournament']['tiebreak3']);
		$query->set('tiebreak4=' . (int)$item['tournament']['tiebreak4']);
		$query->set('tiebreak5=' . (int)$item['tournament']['tiebreak5']);
		$query->set('tournamenttype=' . (int)$item['tournament']['tournamenttype']);
		$query->set('startdate=' . $db->quote($item['tournament']['startdate']));
		$query->set('enddate=' . $db->quote($item['tournament']['enddate']));
		$query->set('pgnfile=' . $db->quote($item['tournament']['pgnfile']));
		$query->set('updated=' . $db->quote($item['tournament']['updated']));
		$db->setQuery($query);
		$db->execute();
		if ((int)$item['tournament']['id']==0)
			$ret=$db->insertid();
		else
			$ret=(int)$item['tournament']['id'];

			// Lagre spillere		
		foreach ($item['player'] as $player)
		{
			$query=$db->getQuery(true);
			if ((int)$player['trash']==1)
			{
				if ((int)$player['id']!=0)
				{
					$query=$db->getQuery(true);
					$query->delete('#__polartour_player');
					$query->where('id='.(int)$player['id']);
					$db->setQuery($query);
					$db->execute();
				}
			} else 
			{
				if ((int)$player['id']==0)
				{
					$query->insert('#__polartour_player');
					$query->set('tournamentid=' . (int)$item['tournament']['id']);
				} 	else
				{
					$query->update('#__polartour_player');
					$query->where('id=' . (int)$player['id']);
				}
				$query->set('firstname=' . $db->quote($player['firstname']));
				$query->set('lastname=' . $db->quote($player['lastname']));
				$query->set('club=' . $db->quote($player['club']));
				$query->set('elo=' . (int)$player['elo']);
				$query->set('startnr=' . (int)$player['startnr']);
				$query->set('born=' . $db->quote($player['born']));
				$db->setQuery($query);
				$db->execute();
			}
		}
			// Lagre resultater		
		foreach ($item['result'] as $result)
		{
			$query=$db->getQuery(true);
			if ((int)$result['trash']==1)
			{
				if ((int)$result['id']!=0)
				{
					$query=$db->getQuery(true);
					$query->delete('#__polartour_result');
					$query->where('id='.(int)$result['id']);
					$db->setQuery($query);
					$db->execute();
				}
			} else 
			{
				if ((int)$result['id']==0)
				{
					$query->insert('#__polartour_result');
					$query->set('tournamentid=' . (int)$item['tournament']['id']);
				} 	else
				{
					$query->update('#__polartour_result');
					$query->where('id=' . (int)$result['id']);
				}
				$query->set('whiteid=' . (int)$result['whiteid']);
				$query->set('blackid=' . (int)$result['blackid']);
				$query->set('round=' . (int)$result['round']);
				$query->set('result=' . (int)$result['result']);
				$query->set('game=' . (int)$result['game']);
				$db->setQuery($query);
				$db->execute();
			}
		}
		return $ret;
	}
	
	public function getPlayerList()
	{
		$db = JFactory::getDbo();
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('(select * from #__polartour_player order by id desc) as db');
		$query->group('lastname, firstname');
		$query->order('lastname, firstname');
		$db->setQuery($query);
		if (!$db->execute())
			return array();
		return $db->loadAssocList();
	}

	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();

		$form = $this->loadForm('com_polartour.tournament', 'tournament', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_polartour.edit.tournament.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
}

