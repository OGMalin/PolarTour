<?php
defined('_JEXEC') or die;

JHtml::_('bootstrap.framework');
?>

<ul id="tournamentmenu" class="nav nav-tabs">
	<li id="tournamenttab" class="active"><a href="#" onclick="switchTab('tournamenttab');">Turneringsinfo</a></li>
	<li id="playertab"><a href="#" onclick="switchTab('playertab');return false;">Spillere</a></li>
	<li id="resulttab"><a href="#" onclick="switchTab('resulttab');return false;">Resultater</a></li>
</ul>

<form method='post'>
<input type='hidden' name='task' value='tournament.save' />
<input type='hidden' name='option' value='com_polartour' />
<input type='hidden' name='tournament[id]' value='<?php echo $this->Item["tournament"]["id"]; ?>' />
<input type='hidden' name='tournament[owner]' value='<?php echo $this->Item["tournament"]["owner"] ?>' />

<?php echo $this->loadTemplate('tournament'); ?>
<?php echo $this->loadTemplate('players'); ?>
<?php echo $this->loadTemplate('results'); ?>

<div class='well'>
<input class='btn btn-primary'  type='submit' name='save' value='<?php echo JText::_('COM_POLARTOUR_SAVE') ?>' />
<input class='btn' type='submit' name='save' value='<?php echo JText::_('COM_POLARTOUR_CLOSE') ?>' />
</div>
</form>
