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
		echo "<pre>";
		var_dump($item);
		echo "</pre>";
		
	}
}

