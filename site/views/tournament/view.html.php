<?php
defined('_JEXEC') or die;
jimport( 'joomla.html.html' );
class PolartourViewTournament extends JViewLegacy
{
	protected $item;

	function display($tpl = null)
	{
		$this->items=$this->get('Item');
		parent::display($tpl);
	}
}

