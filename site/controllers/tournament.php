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
		$item=array("tournament" => array(), "player" => array(), "result" => array());
		$model=$this->getModel('Edit');
		$app=JFactory::getApplication();
		$doc = JFactory::getDocument();
		$input = $app->input;
		echo "<pre>";
		var_dump($input);
		echo "</pre>";
		$item['tournament']['id']=$input->getInt('t_id',0);	
		$item['tournament']['event']=$input->getString('t_event','');
		$item['tournament']['site']=$input->getString('t_site','');;	
		$item['tournament']['organizer']=$input->getString('t_organizer','');;	
		$item['tournament']['arbiter']=$input->getString('t_arbiter','');;	
		$item['tournament']['owner']=$input->getInt('t_owner',0);
		$item['tournament']['rounds']=$input->getInt('t_rounds',0);
		$item['tournament']['elocat']=$input->getInt('t_elocat',0);
		$item['tournament']['showtiebreak']=$input->getInt('t_showtiebreak',0);
		$item['tournament']['showelo']=$input->getInt('t_showelo',0);
		$item['tournament']['showclub']=$input->getInt('t_showclub',0);
		$item['tournament']['showcolor']=$input->getInt('t_showcolor',0);
		$item['tournament']['switchname']=$input->getInt('t_switchname',0);
		$item['tournament']['tiebreak1']=$input->getInt('t_tiebreak1',0);
		$item['tournament']['tiebreak2']=$input->getInt('t_tiebreak2',0);
		$item['tournament']['tiebreak3']=$input->getInt('t_tiebreak3',0);
		$item['tournament']['tiebreak4']=$input->getInt('t_tiebreak4',0);
		$item['tournament']['tiebreak5']=$input->getInt('t_tiebreak5',0);
		$item['tournament']['tournamenttype']=$input->getInt('t_tournamenttype',0);
		$item['tournament']['startdate']=$input->getString('t_startdate',0);;
		$item['tournament']['enddate']=$input->getString('t_enddate',0);;
		$item['tournament']['pgnfile']='';
		$item['tournament']['updated']=date('Y-m-d H:i:s');
		$item['tournament']['comment']='';
		$model->save($item);
	}
}
