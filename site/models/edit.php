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
			$user=JFactory::getUser();
			$item['tournament']['id']=0;	
			$item['tournament']['owner']=$user->id;
			$item['tournament']['event']='';
			$item['tournament']['site']='';	
			$item['tournament']['organizer']='';	
			$item['tournament']['rounds']=0;	
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
}

