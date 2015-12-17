<?php
defined('_JEXEC') or die;

jimport( 'joomla.html.html' );
class PolartourViewEdit extends JViewLegacy
{
	protected $Item;

	
	function display($tpl = null)
	{
		$doc = JFactory::getDocument();
		
		$this->Item=$this->get('Item');
		if ($this->Item['tournament']['owner']==0)
			$user=JFactory::getUser();
		else
			$user=JFactory::getUser($this->Item['tournament']['owner']);
		$this->Item['tournament']['ownername']=$user->name;
		
		$playerlist="playerid.push(0);\nplayername.push('');\n";
		foreach ($this->Item['player'] as $player)
		{
			$playerlist .= "playerlist.push({";
			$playerlist .= "trash:false,";
			$playerlist .= "id:{$player['id']},";
			$playerlist .= "startnr:{$player['startnr']},";
			$playerlist .= "firstname:{$player['firstname']},";
			$playerlist .= "lastname:{$player['lastname']},";
			$playerlist .= "club:{$player['club']},";
			$playerlist .= "elo:{$player['elo']},";
			$playerlist .= "born:{$player['born']},";
			$playerlist .= "comment:{$player['comment']}";
			$playerlist .= "})\n";
		} 
		
		JHtml::script('com_polartour/polartour.js',false,true);
		$doc->addScriptDeclaration("
				var tournamentid = " . $player['tournamentid'] .";\n
				
				var playerlist=[]\n ". $playerlist . "
	");
		
		parent::display($tpl);
	}
}