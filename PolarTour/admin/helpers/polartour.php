<?php
defined('_JEXEC') or die;

/**
 * 
 */
class PolartourHelper
{
	public static function addSubmenu($vName='')
	{
		JHtmlSidebar::addEntry(JText::_('COM_POLARTOUR_TITLE_TOURNAMENTS'),'index.php?option=com_polartour&view=tournaments',$vName=='tournaments');
		JHtmlSidebar::addEntry(JText::_('COM_POLARTOUR_TITLE_PLAYERS'),'index.php?option=com_polartour&view=players',$vName=='players');
		JHtmlSidebar::addEntry(JText::_('COM_POLARTOUR_TITLE_RESULTS'),'index.php?option=com_polartour&view=results',$vName=='results');
		JHtmlSidebar::addEntry(JText::_('COM_POLARTOUR_TITLE_CATEGORIES'),'index.php?option=com_categories&extension=com_polartour',$vName == 'categories');
		if ($vName == 'categories')
		{
			JToolbarHelper::title(JText::sprintf('COM_CATEGORIES_CATEGORIES_TITLE', JText::_('com_polartour')),'folios-categories');
		}
	}
	
	public static function  getActions($categoryId=0)
	{
		$user = JFactory::getUser();
		$result = new JObject();
		
		if (empty($categoryId))
		{
			$assetName = 'com_polartour';
			$level = 'component';
		}else 
		{
			$assetName = 'com_polartour.category.' . (int) $categoryId;
			$level = 'category';
		}
		$actions = JAccess::getActions('com_polartour', $level);
		
		foreach ($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}
		
		return $result;
	}
}