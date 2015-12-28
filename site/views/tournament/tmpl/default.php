<?php
defined('_JEXEC') or die;
$user		= JFactory::getUser();
$canEdit = $user->authorise('core.edit',     'com_polartour');

JHtml::_('bootstrap.framework');

echo $this->table;

if ($canEdit)
	echo "<a href=" . JRoute::_('index.php?option=com_polartour&view=edit&id='.(int) $this->Item['tournament']['id']) . ">Rediger</a>";
	
?>


