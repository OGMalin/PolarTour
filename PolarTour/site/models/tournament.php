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
	
	public function getItem()
	{
		$item=array("tournament" => array(), "player" => array(), "result" => array());
		if ($this->tournament_id==0)
			return $item;
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
}

