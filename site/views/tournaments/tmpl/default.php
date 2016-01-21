<?php
defined('_JEXEC') or die;
$user		= JFactory::getUser();
$canCreate = $user->authorise('core.create',     'com_polartour');

JHtml::_('bootstrap.framework');
?>

<table class="table table-striped" id="polartourList">
	<thead>
		<tr>
			<th><?php echo(JText::_('COM_POLARTOUR_TABLE_EVENT')); ?></th> 
			<th><?php echo(JText::_('COM_POLARTOUR_TABLE_STARTDATE')); ?></th> 
			<th><?php echo(JText::_('COM_POLARTOUR_TABLE_ENDDATE')); ?></th> 
			<th><?php echo(JText::_('COM_POLARTOUR_TABLE_UPDATED')); ?></th> 
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->items as $item) : ?>
			<tr<?php if ($item->state==0) echo " class='muted'"?>>
				<td>
					<a<?php if ($item->state==0) echo " class='muted'"?> href="<?php echo JRoute::_('index.php?option=com_polartour&view=tournament&id='.(int) $item->id); ?>"><?php echo $item->event==''?'*':$this->escape($item->event); ?></a>
				</td>
				<td>
					<?php echo JHTML::_('date', $item->startdate, JText::_('DATE_FORMAT_JS1')); ?>
				</td>
				<td>
					<?php echo JHTML::_('date', $item->enddate, JText::_('DATE_FORMAT_JS1')); ?>
				</td>
				<td>
					<?php echo JHTML::_('date', $item->updated, JText::_('DATE_FORMAT_JS1')); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php if ($canCreate)
echo "<a href=" . JRoute::_('index.php?option=com_polartour&view=edit&id=0') . ">Ny turnering</a>";
?>
