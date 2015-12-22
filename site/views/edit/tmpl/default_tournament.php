<?php
defined('_JEXEC') or die;
?>
<div id='tournament'>
<p><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ID'); ?>: <?php echo $this->Item['tournament']['id']; ?>,
<?php echo JText::_('COM_POLARTOUR_TOURNAMENT_OWNER'); ?>: <?php echo $this->Item['tournament']['ownername']; ?>,
<?php echo JText::_('COM_POLARTOUR_TOURNAMENT_UPDATED'); ?>: <?php echo date('d.m.Y',strtotime($this->Item['tournament']['updated'])); ?></p>
<table>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_EVENT'); ?></label></td>
<td><input type='text' id='t_event' name='tournament[event]' value='<?php echo $this->Item['tournament']['event']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SITE'); ?></label></td>
<td><input type='text' id='t_site' name='tournament[site]' value='<?php echo $this->Item['tournament']['site']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ORGANIZER'); ?></label></td>
<td><input type='text' id='t_organizer' name='tournament[organizer]' value='<?php echo $this->Item['tournament']['organizer']; ?>' /></td>
</tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ARBITER'); ?></label></td>
<td><input type='text' id='t_arbiter' name='tournament[arbiter]' value='<?php echo $this->Item['tournament']['arbiter']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ROUNDS'); ?></label></td>
<td><input type='text' id='t_rounds' name='tournament[rounds]' value='<?php echo $this->Item['tournament']['rounds']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ELOCAT'); ?></label></td>
<td><select id='t_elocat' name='tournament[elocat]'>
<option value='0'<?php echo $this->Item['tournament']['elocat']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['elocat']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_CLASSICAL'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['elocat']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_RAPID'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['elocat']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BLITZ'); ?></option>
</select></td>
</tr>
<tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWTIEBREAK'); ?></label></td>
<td><select id='t_showtiebreak' name='tournament[showtiebreak]'>
<option value='0'<?php echo $this->Item['tournament']['showtiebreak']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['showtiebreak']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_NEEDED'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['showtiebreak']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ALLWAYS'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWELO'); ?></label></td>
<td><input type='checkbox' id='t_showelo' name='tournament[showelo]' value='1' <?php $this->Item['tournament']['showelo']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWCLUB'); ?></label></td>
<td><input type='checkbox' id='t_showclub' name='tournament[showclub]' value='1' <?php echo $this->Item['tournament']['showclub']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWCOLOR'); ?></label></td>
<td><input type='checkbox' id='t_showcolor' name='tournament[showcolor]' value='1' <?php echo $this->Item['tournament']['showcolor']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SWITCHNAME'); ?></label></td>
<td><input type='checkbox' id='t_switchname' name='tournament[switchname]' value='1' <?php echo $this->Item['tournament']['switchname']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td colspan='2'><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK'); ?></label></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK1'); ?></label></td>
<td><select id='t_tiebreak1' name='tournament[tiebreak1]'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak1']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak1']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELO'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak1']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELOCUT'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak1']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZ'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak1']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ'); ?></option>
<option value='5'<?php echo $this->Item['tournament']['tiebreak1']==5?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ2'); ?></option>
<option value='6'<?php echo $this->Item['tournament']['tiebreak1']==6?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='7'<?php echo $this->Item['tournament']['tiebreak1']==7?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='8'<?php echo $this->Item['tournament']['tiebreak1']==8?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
<option value='9'<?php echo $this->Item['tournament']['tiebreak1']==9?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK2'); ?></label></td>
<td><select id='t_tiebreak2' name='tournament[tiebreak2]'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak2']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak2']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELO'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak2']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELOCUT'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak2']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZ'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak2']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ'); ?></option>
<option value='5'<?php echo $this->Item['tournament']['tiebreak2']==5?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ2'); ?></option>
<option value='6'<?php echo $this->Item['tournament']['tiebreak2']==6?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='7'<?php echo $this->Item['tournament']['tiebreak2']==7?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='8'<?php echo $this->Item['tournament']['tiebreak2']==8?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
<option value='9'<?php echo $this->Item['tournament']['tiebreak2']==9?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK3'); ?></label></td>
<td><select id='t_tiebreak3' name='tournament[tiebreak3]'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak3']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak3']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELO'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak3']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELOCUT'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak3']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZ'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak3']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ'); ?></option>
<option value='5'<?php echo $this->Item['tournament']['tiebreak3']==5?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ2'); ?></option>
<option value='6'<?php echo $this->Item['tournament']['tiebreak3']==6?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='7'<?php echo $this->Item['tournament']['tiebreak3']==7?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='8'<?php echo $this->Item['tournament']['tiebreak3']==8?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
<option value='9'<?php echo $this->Item['tournament']['tiebreak3']==9?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK4'); ?></label></td>
<td><select id='t_tiebreak4' name='tournament[tiebreak4]'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak4']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak4']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELO'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak4']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELOCUT'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak4']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZ'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak4']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ'); ?></option>
<option value='5'<?php echo $this->Item['tournament']['tiebreak4']==5?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ2'); ?></option>
<option value='6'<?php echo $this->Item['tournament']['tiebreak4']==6?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='7'<?php echo $this->Item['tournament']['tiebreak4']==7?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='8'<?php echo $this->Item['tournament']['tiebreak4']==8?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
<option value='9'<?php echo $this->Item['tournament']['tiebreak4']==9?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK5'); ?></label></td>
<td><select id='t_tiebreak5' name='tournament[tiebreak5]'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak5']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak5']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELO'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak5']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_AVERAGEELOCUT'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak5']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZ'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak5']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ'); ?></option>
<option value='5'<?php echo $this->Item['tournament']['tiebreak5']==5?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MEDIANBUCHHOLZ2'); ?></option>
<option value='6'<?php echo $this->Item['tournament']['tiebreak5']==6?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='7'<?php echo $this->Item['tournament']['tiebreak5']==7?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='8'<?php echo $this->Item['tournament']['tiebreak5']==8?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
<option value='9'<?php echo $this->Item['tournament']['tiebreak5']==9?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TOURNAMENTTYPE'); ?></label></td>
<td><select id='t_tournamenttype' name='tournament[tournamenttype]'>
<option value='0'<?php echo $this->Item['tournament']['tournamenttype']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tournamenttype']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_KONRAD'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tournamenttype']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MONRAD'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tournamenttype']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SWISS'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tournamenttype']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ROUNDROBIN'); ?></option>
<option value='5'<?php echo $this->Item['tournament']['tournamenttype']==5?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DOUBLEROUNDROBIN'); ?></option>
<option value='6'<?php echo $this->Item['tournament']['tournamenttype']==6?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TRIPLEROUNDROBIN'); ?></option>
<option value='7'<?php echo $this->Item['tournament']['tournamenttype']==7?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_QUADROROUNDROBIN'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_STARTDATE'); ?></label></td>
<td><?php echo JHtml::_('calendar',date('d.m.Y',strtotime($this->Item['tournament']['startdate'])),'tournament[startdate]','t_startdate','%d.%m.%Y', array('class' => 'input-small')); ?></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ENDDATE'); ?></label></td>
<td><?php echo JHtml::_('calendar',date('d.m.Y',strtotime($this->Item['tournament']['enddate'])),'tournament[enddate]','t_enddate','%d.%m.%Y', array('class' => 'input-small')); ?></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_PGNFILE'); ?></label></td>
<td><input type='text' id='t_pgnfile' name='tournament[pgnfile]' value='<?php echo $this->Item['tournament']['pgnfile']; ?>' /></td>
</tr>
</table>
</div>
