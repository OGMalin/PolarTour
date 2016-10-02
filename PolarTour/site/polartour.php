<?php
defined('_JEXEC') or die;

//jimport('joomla.application.component.controller');

//
$document = JFactory::getDocument();
$cssFile="./media/com_polartour/css/template.css";
$document->addStyleSheet($cssFile);

$controller = JControllerLegacy::getInstance('Polartour');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
