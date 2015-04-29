<?php
defined('_JEXEC') or die;

//jimport( 'joomla.html.html' );
class PolartourViewTournaments extends JViewLegacy
{
	protected $items = null;
	
	function display($tpl = null)
	{
		$this->items=$this->get('Items');
		if (count($errors=$this->get('Errors')))
		{
			JError::raisError(500,implode("\n", $errors));
			return false;
		}
		parent::display($tpl);
	}
}

