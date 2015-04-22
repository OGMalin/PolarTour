<?php

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');
class PolartourModelTournaments extends JModelList
{
 	public function __construct($config = array())
 	{
 		if (empty($config['filter_fields']))
 		{
 			$config['filter_fields'] = array(
 					'id', 'a.id',
 					'event', 'a.event',
 					'startdate', 'a.startdate',
 					'enddate', 'a.enddate',
 					'updated', 'a.updated'
 			);
 		}

 		parent::__construct($config);
 	}

 	protected function populateState($ordering = null, $direction = null)
 	{
 		parent::populateState('a.enddate', 'desc');
 	}
 	
 	protected function getListQuery()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select('*');
		$query->from($db->quoteName('#__polartour_tournament') . ' AS a');

		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		$query->order($db->escape($orderCol . ' ' . $orderDirn));
		
		return $query;
	}
}
