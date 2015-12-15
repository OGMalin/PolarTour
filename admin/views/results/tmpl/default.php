<?php
defined('_JEXEC') or die;

// $user = JFactory::getUser();
 $listOrder = '';//$this->escape($this->state->get('list.ordering'));
 $listDirn = '';//$this->escape($this->state-get('list-direction'));
// $canOrder = $user->autorise('core.edit.state', 'com_polartour');
// $saveOrder = $listOrder == 'a.ordering';

// if ($saveOrder)
// {
// 	$saveOrderingUrl = 'index.php?option=com_polartour&task=results.saveOrderAjax&tmpl=component';
// 	JHtml::_('sortablelist.sortable', 'folioList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
// }
// $sortFields = $this->getSortFields();
?>
<!-- script type="text/javascript">
	Joomla.orderTable = function()
	{
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $listOrder; ?>')
		{
			dirn = 'asc';
		} else
		{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script -->
<form action="<?php echo JRoute::_('index.php?option=com_polartour&view=results'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<div class="clearfix"> </div>
		<table class="table table-striped" id="polartourList">
			<thead>
				<tr>
					<th width="1%" class="hidden-phone">
						<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
					</th>
					<th class="title">
						<?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.tournamentid', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($this->items as $i => $item) :
				 ?>
					<tr class="row<?php echo $i % 2; ?>">
						<td class="center hidden-phone">
							<?php echo JHtml::_('grid.id', $i, $item->id); ?>
						</td>
						<td class="nowrap has-context">
							<a href="<?php echo JRoute::_('index.php?option=com_polartour&task=result.edit&id='.(int) $item->id); ?>">
								<?php echo $item->tournamentid . " " . $item->whiteid . "-" . $item->blackid . " " . $item->result; ?>
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>