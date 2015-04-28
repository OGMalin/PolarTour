<?php
defined('_JEXEC') or die;
jimport( 'joomla.html.html' );
class PolartourViewTournament extends JViewLegacy
{
	protected $tournament;
	protected $player;
	protected $result;
	
	function display($tpl = null)
	{
//		$this->tournament=$this->get('Tournament');
		parent::display($tpl);
	}
}

