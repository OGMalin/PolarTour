<?php
defined('_JEXEC') or die;

JHtml::_('bootstrap.framework');
?>

<div class="well">
	<button id="tournamentsave" class="btn btn-primary" onclick="saveTournament();return false;"><?php echo JText::_('COM_POLARTOUR_SAVE') ?></button>
	<button class="btn"><?php echo JText::_('COM_POLARTOUR_CLOSE') ?></button>
</div>

<ul class="nav nav-tabs">
	<li class="active"><a href="#">Turneringsinfo</a></li>
	<li><a href="#">Spillere</a></li>
	<li><a href="#">Resultater</a></li>
</ul>
<?php echo $this->loadTemplate('modals'); ?>