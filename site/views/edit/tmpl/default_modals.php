<!-- Search player dialog -->
<div id="searchplayer" class="modal hide fade" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="searchPlayerLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="searchPlayerLabel"><?php echo JText::_('COM_POLARTOUR_SEARCHPLAYER_LABEL') ?></h3>
	</div>
	<div class="modal-body">
		<label><?php echo JText::_('COM_POLARTOUR_SEARCHPLAYER_NAME') ?></label>
		<div id='searchplayerselect'></div>
		<input type='hidden' id='searchplayerrow' name='searchplayerrow' value='-1' />
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('COM_POLARTOUR_CANCEL') ?></button>
		<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onclick="searchPlayerOk();return false;"><?php echo JText::_('COM_POLARTOUR_OK') ?></button>
	</div>
</div>
