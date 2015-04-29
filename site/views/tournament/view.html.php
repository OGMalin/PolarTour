<?php
defined('_JEXEC') or die;

require_once './components/com_polartour/helpers/tournament.php';

jimport( 'joomla.html.html' );
class PolartourViewTournament extends JViewLegacy
{
	protected $tournament;
	protected $player;
	protected $result;
	protected $table;
	
	function display($tpl = null)
	{
		$this->tournament=$this->get('Tournament');
		$this->player=$this->get('Player');
		$this->result=$this->get('Result');
		
		$tour=new TournamentHelper();
		$tour->tournament=$this->tournament;
		$tour->player=$this->player;
		$tour->result=$this->result;
		$tour->head=$this->tournament['event'];
		$this->table=$tour->displayTable(999);
		parent::display($tpl);
	}
}

