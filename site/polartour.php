<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

$controller = JControllerLegacy::getInstance('Polartour');

$controller->execute(JFactory::getApplication()->input->get('task'));

$controller->redirect();