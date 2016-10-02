<?php
defined('_JEXEC') or die;

jimport('joomla.database.table');

class PolartourTableTournament extends JTable
{
	public function __construct(&$db)
	{
		parent::__construct('#__polartour_tournament', 'id', $db);
	}

	public function bind($array, $ignore='')
	{
		return parent::bind($array, $ignore);
	}

	public function store($updateNulls=false)
	{
		return parent::store($updateNulls);
	}
}