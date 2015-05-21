<?php
defined('_JEXEC') or die;

require_once './components/com_polartour/helpers/tournament.php';

jimport( 'joomla.html.html' );
class PolartourViewTournament extends JViewLegacy
{
	protected $table;
	protected $Item;
	
	function display($tpl = null)
	{
//		$layout = JFactory::getApplication()->input->getCmd('layout', 'default');
		$this->Item=$this->get('Item');
		
//		echo "<pre>" . var_dump($this->Item) . "</pre>";
		$tour=new TournamentHelper();
			
		if (isset($this->Item["tournament"]["id"]))
		{
			$tour->tournament=$this->Item["tournament"];
			$tour->player=$this->Item["player"];
			$tour->result=$this->Item["result"];
			$tour->head=$this->Item["tournament"]['event'];
			$this->table=$tour->displayTable(999);
		}
		parent::display($tpl);
	}
}

