<?php
defined('_JEXEC') or die;

class PolartourModelPlayer extends JModelAdmin
{
	protected $text_prefix = 'COM_POLARTOUR';
	
	public function getTable($type = 'Player', $prefix = 'PolartourTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();
		
		$form = $this->loadForm('com_polartour.player', 'player', array('control' => 'jform', 'load_data' => $loadData));
		
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_polartour.edit.player.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	protected function prepareTable($table)
	{
		$table->lastname = htmlspecialchars_decode($table->lastname, ENT_QUOTES);
	}
	
}