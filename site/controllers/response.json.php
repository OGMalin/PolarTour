<?php
defined('_JEXEC') or die;

/**
 * 
 * @author oddg
 *
 */
class PolartourControllerResponse extends JControllerLegacy
{
	function getplayerlist()
	{
		$model=$this->getModel('Edit');
 		$doc = JFactory::getDocument();
 		$app = JFactory::getApplication();
		$result=$model->getPlayerList();
//		$result=array("test");
//		echo "<pre>"; var_dump($result); echo "</pre>"; exit;
//		$doc->setMimeEncoding('application/json');
//		$doc->setMimeEncoding('application/x-www-form-urlencoded');
		echo new JResponseJson($result);
//		echo json_encode($result);
		$app->close();
	}}