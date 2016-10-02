<?php
defined('_JEXEC') or die;

class PolartourModelTournament extends JModelAdmin
{
	protected $text_prefix = 'COM_POLARTOUR';
	
	public function getTable($type = 'Tournament', $prefix = 'PolartourTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		$app = JFactory::getApplication();
		
		$form = $this->loadForm('com_polartour.tournament', 'tournament', array('control' => 'jform', 'load_data' => $loadData));
		
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	
	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState('com_polartour.edit.tournament.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	protected function prepareTable($table)
	{
		$table->event = htmlspecialchars_decode($table->event, ENT_QUOTES);
	}
	
}