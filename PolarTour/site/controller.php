<?php
defined('_JEXEC') or die;

/**
 * 
 * @author oddg
 *
 */
class PolartourController extends JControllerLegacy
{
	public function display($cachable=false, $urlparams=false)
	{
		// Set default view if view is missing
//		$vView=$this->input->get('view','tournaments');
//		$this->input->set('view', $vView);
		return parent::display($cachable, $urlparams);
	}
}