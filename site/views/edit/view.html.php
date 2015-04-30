<?php
defined('_JEXEC') or die;

jimport( 'joomla.html.html' );
class PolartourViewEdit extends JViewLegacy
{
	protected $Item;

	function display($tpl = null)
	{
		$this->Item=$this->get('Item');
		parent::display($tpl);
	}
}

