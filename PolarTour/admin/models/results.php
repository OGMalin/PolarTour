<?php
/**
 * @package     Polartour for Joomla 3.x
 * @version     1.0.0
 * @author      Odd Gunnar Malin
 * @copyright   Copyright 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

class PolartourModelResults extends JModelList
{
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
					'id', 'a.id',
					'tournamentid', 'a.tournamentid',
					'whiteid', 'a.whiteid',
					'blackid', 'a.blackid',
					'result', 'a.result'
			);
		}
		parent::__construct($config);
	}

 	protected function populateState($ordering = null, $direction = null)
 	{
 		parent::populateState('a.tournamentid', 'asc');
 	}
 	
	protected function getListQuery()
	{
		$db    = $this->getDbo();
		$query  = $db->getQuery(true);

		$query->select(
				$this->getState(
						'list.select',
						'a.id, a.tournamentid, a.whiteid, a.blackid, a.result'
				)
		);
		$query->from($db->quoteName('#__polartour_result').' AS a');

		return $query;
	}
}
