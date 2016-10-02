<?php
defined('_JEXEC') or die;

class PolartourModelResult extends JModelAdmin
{
	protected $text_prefix = 'COM_POLARTOUR';
	
	public function getTable($type = 'Result', $prefix = 'PolartourTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();
		
		$form = $this->loadForm('com_polartour.result', 'result', array('control' => 'jform', 'load_data' => $loadData));
		
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_polartour.edit.result.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	protected function prepareTable($table)
	{
	}
	
}