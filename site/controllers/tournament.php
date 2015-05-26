<?php
/**
 * @package     Polartour for Joomla 3.x
 * @version     1.0.0
 * @author      Odd Gunnar Malin
 * @copyright   Copyright 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

defined('_JEXEC') or die;

class PolartourControllerTournament extends JControllerLegacy
{
/*
	public function getModel($name = 'Tournaments', $prefix = 'PolartourModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
	*/
	
	public function save()
	{
//		$model=$this->getModel('Edit');
		$app=JFactory::getApplication();
		$doc = JFactory::getDocument();
		$this->input = $app->input;
		var_dump($this->input);
		exit;
//		$id=$this->input->getInt('id',0);
//		$white=$this->input->getInt('white',0);
//		$black=$this->input->getInt('black',0);
//		$level=$this->input->getInt('level',1);
	}
}
