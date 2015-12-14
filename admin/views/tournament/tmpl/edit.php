<?php
defined('_JEXEC') or die;

?>

<form action="<?php echo JRoute::_('index.php?option=com_polartour&layout=edit&id='.(int)$this->item->id); ?>"
			method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset>
				<?php echo JHtml::_('bootstrap.startPane', 'myTab', array('active' => 'details')); ?>
					<?php echo JHtml::_('bootstrap.addPanel', 'myTab',
							'details', empty($this->item->id) ? 
							JText::_('COM_POLARTOUR_NEW_TOURNAMENT', true) :
							JText::sprintf('COM_POLARTOUR_EDIT_TOURNAMENT',
							$this->item->id, true)); ?>
						<?php foreach ($this->form->getFieldset('tournament') as $field) : ?>
							<div class="control-group">
								<div class="control-label"><?php echo $field->label; ?></div>
								<div class="controls"><?php echo $field->input; ?></div>
							</div>
						<?php endforeach; ?>
					<?php echo JHtml::_('bootstrap.endPanel'); ?>
					<input type="hidden" name="task" value="" />
					<?php echo JHtml::_('form.token'); ?>
				<?php echo JHtml::_('bootstrap.endPane'); ?>
			</fieldset>
		</div>
	</div>
</form>
