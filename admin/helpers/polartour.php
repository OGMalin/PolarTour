<?php
defined('_JEXEC') or die;

/**
 * 
 */
class PolartourHelper
{
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