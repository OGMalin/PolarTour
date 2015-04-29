<?php

defined('_JEXEC') or die;

//jimport('joomla.application.component.modelitem');
class PolartourModelTournament extends JModelItem
{
	public $tournament_id;
	
	public function __construct($config=array())
	{
		$app=JFactory::getApplication();
		$this->input = $app->input;
		$this->tournament_id=$this->input->getInt('id',0);
		
		parent::__construct($config);
	}
	
	public function getTournament()
	{
		$db=$this->getDbo();
	
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_tournament');
		$query->where("id={$this->tournament_id}");
	//		var_dump($query); return;
		$db->setQuery($query);
		if (!$db->execute())
			return null;
		return $db->loadAssoc();
	}
	public function getPlayer()
	{
		$db=$this->getDbo();
	
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_player');
		$query->where("tournamentid={$this->tournament_id}");
		$db->setQuery($query);
		if (!$db->execute())
			return null;
		return $db->loadAssocList();
	}
		
	public function getResult()
	{
		$db=$this->getDbo();
	
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_result');
		$query->where("tournamentid={$this->tournament_id}");
		$db->setQuery($query);
		if (!$db->execute())
			return null;
		return $db->loadAssocList();
	}
	
	
}

