<?php
defined('_JEXEC') or die;

/**
 * Polartour view
 * @author oddg
 *
 */
class PolartourViewResult extends JViewLegacy
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
		
		JToolbarHelper::save('result.save');
		
		if (empty($this->item->id))
		{
			JToolbarHelper::cancel('result.cancel');
		}else
		{
			JToolbarHelper::cancel('result.cancel', 'JTOOLBAR_CLOSE');
		}
	}
	
	
}