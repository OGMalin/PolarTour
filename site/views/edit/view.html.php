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
			$playerlist .= "playerid.push(" . $player['id'] . ");\n";
			$playerlist .= "playername.push('" . $player['firstname'] . ' ' . $player['lastname'] . "');\n";
		} 
		
		$doc->addScriptDeclaration("
				var playerid=[];
				var playername=[];\n" . $playerlist . "
				
				function switchTab(newtab)
				{
					switch (newtab)
					{
						case 'tournamenttab':
							jQuery('#playertab').removeClass('active');
							jQuery('#resulttab').removeClass('active');
							jQuery('#player').addClass('hide');
							jQuery('#result').addClass('hide');
							jQuery('#tournamenttab').addClass('active');
							jQuery('#tournament').removeClass('hide');
							break;
						case 'playertab':
							jQuery('#tournamenttab').removeClass('active');
							jQuery('#resulttab').removeClass('active');
							jQuery('#tournament').addClass('hide');
							jQuery('#result').addClass('hide');
							jQuery('#playertab').addClass('active');
							jQuery('#player').removeClass('hide');
							break;
						case 'resulttab':
							jQuery('#tournamenttab').removeClass('active');
							jQuery('#playertab').removeClass('active');
							jQuery('#player').addClass('hide');
							jQuery('#tournament').addClass('hide');
							jQuery('#resulttab').addClass('active');
							jQuery('#result').removeClass('hide');
							break;
					};
				};
		");
		
		parent::display($tpl);
	}
}