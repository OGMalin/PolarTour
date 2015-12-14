<?php
defined('_JEXEC') or die;

/**
 * Polartour view
 * @author oddg
 *
 */
class PolartourViewTournament extends JViewLegacy
{
	protected $item;
	protected $form;
	
	public function display($tpl=null)
	{
		$this->item = $this->get('Item');
		$this->form = $this->get('Form');
		
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);
		
		JToolbarHelper::title(JText::_('COM_POLARTOUR_POLARTOUR_TITLE'));
		
		JToolbarHelper::save('tournament.save');
		
		if (empty($this->item->id))
		{
			JToolbarHelper::cancel('tournament.cancel');
		}else
		{
			JToolbarHelper::cancel('tournament.cancel', 'JTOOLBAR_CLOSE');
		}
	}
	
	
}