<?php
defined('_JEXEC') or die;

jimport( 'joomla.html.html' );
class PolartourViewEdit extends JViewLegacy
{
	protected $Item;

	
	function display($tpl = null)
	{
		$doc = JFactory::getDocument();
		$doc->addScriptDeclaration("
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
		
		$this->Item=$this->get('Item');
		if ($this->Item['tournament']['owner']==0)
			$user=JFactory::getUser();
		else
			$user=JFactory::getUser($this->Item['tournament']['owner']);
		$this->Item['tournament']['ownername']=$user->name;
		
		for ($rid=0;$rid<count($this->Item['result']);$rid++)
		{
			$this->Item['result'][$rid]['white']=$this->GetPlayerName($this->Item['result'][$rid]['whiteid']);
			$this->Item['result'][$rid]['black']=$this->GetPlayerName($this->Item['result'][$rid]['blackid']);
		}
		parent::display($tpl);
	}
	protected function GetPlayerName($id)
	{
		foreach ($this->Item['player'] as $player)
		{
			if ($player['id']==$id)
				return $player['firstname'] . ' ' . $player['lastname']; 
		}
		return "";
	}
}

