<?php
defined('_JEXEC') or die;

JHtml::_('bootstrap.framework');
?>

<div class="well">
	<button id="tournamentsave" class="btn btn-primary" onclick="saveTournament();return false;"><?php echo JText::_('COM_POLARTOUR_SAVE') ?></button>
	<button class="btn"><?php echo JText::_('COM_POLARTOUR_CLOSE') ?></button>
</div>

<ul id="tournamentmenu" class="nav nav-tabs">
	<li id="tournamenttab" class="active"><a href="#" onclick="switchTab('tournamenttab');">Turneringsinfo</a></li>
	<li id="playertab"><a href="#" onclick="switchTab('playertab');return false;">Spillere</a></li>
	<li id="resulttab"><a href="#" onclick="switchTab('resulttab');return false;">Resultater</a></li>
</ul>
<?php echo $this->loadTemplate('modals'); ?>