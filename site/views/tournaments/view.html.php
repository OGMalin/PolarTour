<?php
defined('_JEXEC') or die;
jimport( 'joomla.html.html' );
class PolartourViewTournaments extends JViewLegacy
{
	protected $items = null;
	
	function display($tpl = null)
	{
		$this->items=$this->get('Items');
		parent::display($tpl);
	}
}

