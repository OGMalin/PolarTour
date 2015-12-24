<?php
defined('_JEXEC') or die;

//jimport( 'joomla.html.html' );
class PolartourViewTournaments extends JViewLegacy
{
	protected $items = null;
	
	function display($tpl = null)
	{
		$this->items=$this->get('Items');
//		echo "<pre>"; var_dump($this->items); echo "</pre>";
		$app		= JFactory::getApplication();
		$params		= $app->getParams();
		$this->assignRef('params', $params);
		
		if (count($errors=$this->get('Errors')))
		{
			JError::raisError(500,implode("\n", $errors));
			return false;
		}
		parent::display($tpl);
	}
}

