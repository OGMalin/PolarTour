<?php
defined('_JEXEC') or die;

jimport( 'joomla.html.html' );
class PolartourViewEdit extends JViewLegacy
{
	protected $Item;
	protected $form;
	
	function display($tpl = null)
	{
		$this->form		= $this->get('Form');
		
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
			$c++;
		};
		
		$resultlist="";
		$c=0;
		foreach ($this->Item['result'] as $res)
		{
			$resultlist .= "resultlist[$c]=new Object();\n";
			$resultlist .= "resultlist[$c].trash=0;\n";
			$resultlist .= "resultlist[$c].id={$res['id']};\n";
			$resultlist .= "resultlist[$c].round={$res['round']};\n";
			$resultlist .= "resultlist[$c].whiteid={$res['whiteid']};\n";
			$resultlist .= "resultlist[$c].blackid={$res['blackid']};\n";
			$resultlist .= "resultlist[$c].result={$res['result']};\n";
			$resultlist .= "resultlist[$c].game={$res['game']};\n";
			$c++;
		};
				
		JHtml::script('com_polartour/polartour.js',false,true);
		$doc->addScriptDeclaration("var tournamentid = " . $this->Item['tournament']['id'] . ";\n");
		$doc->addScriptDeclaration("var catid = " . $this->Item['tournament']['catid'] . ";\n");
		$doc->addScriptDeclaration("var state = " . $this->Item['tournament']['state'] . ";\n");
		$doc->addScriptDeclaration("var responseUrl='" . $this->baseurl . "/index.php?option=com_polartour&amp;';\n");
		$doc->addScriptDeclaration("var playerlist=[];\n" . $playerlist);
		$doc->addScriptDeclaration("var resultlist=[];\n" . $resultlist);
		
		parent::display($tpl);
	}
}