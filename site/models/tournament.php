<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modelitem');
class PolartourModelTournament extends JModelItem
{
	public function getTournament($tid)
	{
		$db=$this->getDbo();
	
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_tournament');
		$query->where('id='.$tid);
	//		var_dump($query); return;
		$db->setQuery($query);
		if (!$db->execute())
			return null;
		return $db->loadAssoc();
	}
	public function getPlayer($tid)
	{
		$db=$this->getDbo();
	
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_player');
		$query->where('tournamentid='.$tid);
		$db->setQuery($query);
		if (!$db->execute())
			return null;
		return $db->loadAssocList();
	}
		
	public function getResult($tid)
	{
		$db=$this->getDbo();
	
		$query=$db->getQuery(true);
		$query->select('*');
		$query->from('#__polartour_result');
		$query->where('tournamentid='.$tid);
		$db->setQuery($query);
		if (!$db->execute())
			return null;
		return $db->loadAssocList();
	}
	
	
}

