<?php
defined('_JEXEC') or die;
?>
<!-- Tournament data -->
<form action="<?php echo JRoute::_('index.php?option=com_polartour&view=tournament&task=save'); ?>>
<div id="tournament"><?php echo $this->Item['tournament']['event']; ?>
</div>
<div id="player" class='hide'>Player <?php echo JPATH_SITE; ?>
</div>
<div id="result" class='hide'>Result
</div>
</form>