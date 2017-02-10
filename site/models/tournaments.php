<?php

defined('_JEXEC') or die;

//jimport('joomla.application.component.modellist');
class PolartourModelTournaments extends JModelList
{
 	public function __construct($config = array())
 	{
 		if (empty($config['filter_fields']))
 		{
 			$config['filter_fields'] = array(
 					'id', 'a.id',
 					'event', 'a.event',
 					'state', 'a.state',
 					'startdate', 'a.startdate',
 					'enddate', 'a.enddate',
 					'updated', 'a.updated'
 			);
 		}

 		parent::__construct($config);
 	}

 	protected function populateState($ordering = null, $direction = null)
 	{
		$app=JFactory::getApplication();
		$input = $app->input;
		
		$catid = $input->getInt('catid');
		$startdate=$input->getString('startdate');
		$enddate=$input->getString('enddate');
		$this->setState('catid', $catid);
		$this->setState('startdate', $startdate);
 		$this->setState('enddate', $enddate);
 	}
 	
 	protected function getListQuery()
	{
		$user	= JFactory::getUser();
		$canEdit = $user->authorise('core.edit', 'com_polartour');
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*');
//				$this->getState(
//						'list.select',
// 						'a.id',
// 						'a.event',
// 						'a.state',
// 						'a.startdate',
// 						'a.enddate',
// 						'a.updated'
//						)
//				);
		$query->from($db->quoteName('#__polartour_tournament') . ' AS a');

		if ($canEdit)
			$query->where('(a.state IN (0, 1, 2))');
		else
			$query->where('(a.state IN (1, 2))');
				
		if ($categoryId = $this->getState('catid'))
		{
			$query->where('a.catid = '.(int) $categoryId);
		}
		
		if ($startdate = $this->getState('startdate'))
		{
			$query->where("a.startdate >= '" . $startdate . "'");
		}

 		if ($enddate = $this->getState('enddate'))
		{
			$query->where("a.enddate <= '" . $enddate . "'");
		}
				
//		$orderCol	= $this->state->get('list.ordering');
//		$orderDirn	= $this->state->get('list.direction');
//		$query->order($db->escape($orderCol . ' ' . $orderDirn));
		$query->order("a.startdate desc");
//		echo "<pre>"; echo $query->__toString(); echo "</pre>";
		
		return $query;
	}
}

