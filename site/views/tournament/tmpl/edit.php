<?php
defined('_JEXEC') or die;

JHtml::_('bootstrap.framework');

$doc = JFactory::getDocument();
$doc->addScriptDeclaration("
	function switchTab(newtab)
	{
		switch (newtab)
		{
			case 'tournamenttab':
				jQuery('#playertab').removeClass('active');
				jQuery('#resulttab').removeClass('active');
				jQuery('#player').addClass('hide');
				jQuery('#result').addClass('hide');
				jQuery('#tournamenttab').addClass('active');
				jQuery('#tournament').removeClass('hide');
				break;
			case 'playertab':
				jQuery('#tournamenttab').removeClass('active');
				jQuery('#resulttab').removeClass('active');
				jQuery('#tournament').addClass('hide');
				jQuery('#result').addClass('hide');
				jQuery('#playertab').addClass('active');
				jQuery('#player').removeClass('hide');
				break;
			case 'resulttab':
				jQuery('#tournamenttab').removeClass('active');
				jQuery('#playertab').removeClass('active');
				jQuery('#player').addClass('hide');
				jQuery('#tournament').addClass('hide');
				jQuery('#resulttab').addClass('active');
				jQuery('#result').removeClass('hide');
				break;
		};
	};
");
		
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

<!-- Tournament data -->
<form action="<?php echo JRoute::_('index.php?option=com_polartour&view=tournament&task=save'); ?>">
<div id="tournament"><?php echo $this->Item['tournament']['event']; ?>
</div>
<div id="player" class='hide'>Player <?php echo JPATH_SITE; ?>
</div>
<div id="result" class='hide'>Result
</div>
</form>