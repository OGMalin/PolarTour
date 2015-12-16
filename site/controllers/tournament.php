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
		$app=JFactory::getApplication();
		$input = $app->input;
		$item=array("tournament" => array(), "player" => array(), "result" => array());
//			echo "<pre>";var_dump($input);echo "</pre>";exit;
		$item['tournament']=$input->get('tournament',array(),'');
		$item['tournament']['updated']=date('Y-m-d H:i:s');
		$item['tournament']['startdate']=date('Y-m-d', strtotime($item['tournament']['startdate']));
		$item['tournament']['enddate']=date('Y-m-d', strtotime($item['tournament']['enddate']));
		$item['player']=$input->get('player',array(),'');
		$item['result']=$input->get('result',array(),'');
		if ($input->getString('save')==JText::_('COM_POLARTOUR_SAVE'))
		{
			$id=$this->getModel('Edit')->save($item);
		} else 
		{
			$id=$item['tournament']['id'];
		}
		if ($id==0)
			$app->redirect(JRoute::_('index.php?option=com_polartour&view=tournaments'));
		$app->redirect(JRoute::_('index.php?option=com_polartour&view=tournament&id='. $id));
		$app->close();
	}
}
