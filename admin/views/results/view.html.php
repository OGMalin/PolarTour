<?php
defined('_JEXEC') or die;

/**
 * Polartour view
 * @author oddg
 *
 */
class PolartourViewResults extends JViewLegacy
{
	protected $items;
	
	public function display($tpl=null)
	{
		// Henter opp data fra /administrator/components/com_polartour/models/tournaments.php
		$this->items = $this->get('Items');
		
		PolartourHelper::addSubmenu('results');
		
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();
 		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		$canDo = PolartourHelper::getActions();
		$bar = JToolBar::getInstance('toolbar');
		
		// Add the admin view title
		JToolbarHelper::title(JText::_('COM_POLARTOUR_POLARTOUR_TITLE'));
		
		JToolbarHelper::addNew('results.add');
		
		if ($canDo->get('core.edit'))
		{
			JToolbarHelper::editList('results.edit');
		}
		
		if ($canDo->get('core.admin')){
			JToolbarHelper::preferences('com_polartour');
		}
	}
	
	
}