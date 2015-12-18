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
		
		$playerlist="";
		$c=0;
		foreach ($this->Item['player'] as $player)
		{
			$playerlist .= "playerlist[$c]=new Object();\n";
			$playerlist .= "playerlist[$c].trash=0;\n"; // Trashed
			$playerlist .= "playerlist[$c].id={$player['id']};\n";
			$playerlist .= "playerlist[$c].startnr={$player['startnr']};\n";
			$playerlist .= "playerlist[$c].firstname='{$player['firstname']}';\n";
			$playerlist .= "playerlist[$c].lastname='{$player['lastname']}';\n";
			$playerlist .= "playerlist[$c].club='{$player['club']}';\n";
			$playerlist .= "playerlist[$c].elo={$player['elo']};\n";
			$playerlist .= "playerlist[$c].born='{$player['born']}';\n";
			$playerlist .= "playerlist[$c].comment='{$player['comment']}';\n";
			$c++;
		} 
		
		$resultlist="";
		$c=0;
		foreach ($this->Item['player'] as $player)
		{
			$resultlist .= "resultlist[$c]=new Object();\n";
			$resultlist .= "resultlist[$c].trash=0;\n";
			$c++;
		} 
		
		JHtml::script('com_polartour/polartour.js',false,true);
		$doc->addScriptDeclaration("var tournamentid = " . $player['tournamentid'] . ";\n");
		$doc->addScriptDeclaration("var playerlist=[];\n" . $playerlist);
		$doc->addScriptDeclaration("var resultlist=[];\n" . $resultlist);
		
		parent::display($tpl);
	}
}