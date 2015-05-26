<?php
defined('_JEXEC') or die;
?>
<!-- Tournament data -->
<form method='post'>
<input type='hidden' name='task' value='tournament.save' />
<input type='hidden' name='option' value='com_polartour' />


<div id='tournament'>
<p><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ID'); ?>: <?php echo $this->Item['tournament']['id']; ?>,
<?php echo JText::_('COM_POLARTOUR_TOURNAMENT_OWNER'); ?>: <?php echo $this->Item['tournament']['ownername']; ?>,
<?php echo JText::_('COM_POLARTOUR_TOURNAMENT_UPDATED'); ?>: <?php echo date('d.m.Y',strtotime($this->Item['tournament']['updated'])); ?></p>
<table>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_EVENT'); ?></label></td>
<td><input type='text' id='t_event' name='t_event' value='<?php echo $this->Item['tournament']['event']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SITE'); ?></label></td>
<td><input type='text' id='t_site' name='t_site' value='<?php echo $this->Item['tournament']['site']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ORGANIZER'); ?></label></td>
<td><input type='text' id='t_organizer' name='t_organizer' value='<?php echo $this->Item['tournament']['organizer']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ROUNDS'); ?></label></td>
<td><input type='text' id='t_rounds' name='t_rounds' value='<?php echo $this->Item['tournament']['rounds']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ELOCAT'); ?></label></td>
<td><select id='t_elocat' name='t_elocat'>
<option value='0'<?php echo $this->Item['tournament']['elocat']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['elocat']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_CLASSICAL'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['elocat']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_RAPID'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['elocat']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BLITZ'); ?></option>
</select></td>
</tr>
<tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWTIEBREAK'); ?></label></td>
<td><select id='t_elocat' name='t_elocat'>
<option value='0'<?php echo $this->Item['tournament']['showtiebreak']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['showtiebreak']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_NEEDED'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['showtiebreak']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ALLWAYS'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWELO'); ?></label></td>
<td><input type='checkbox' id='t_showelo' name='t_showelo' value='1' <?php $this->Item['tournament']['showelo']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWCLUB'); ?></label></td>
<td><input type='checkbox' id='t_showclub' name='t_showclub' value='1' <?php echo $this->Item['tournament']['showclub']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWCOLOR'); ?></label></td>
<td><input type='checkbox' id='t_showcolor' name='t_showcolor' value='1' <?php echo $this->Item['tournament']['showcolor']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SWITCHNAME'); ?></label></td>
<td><input type='checkbox' id='t_switchname' name='t_switchname' value='1' <?php echo $this->Item['tournament']['switchname']==1?' checked':''; ?> /></td>
</tr>
<tr>
<td colspan='2'><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK'); ?></label></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK1'); ?></label></td>
<td><select id='t_tiebreak1' name='t_tiebreak1'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak1']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak1']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak1']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak1']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak1']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK2'); ?></label></td>
<td><select id='t_tiebreak2' name='t_tiebreak2'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak2']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak2']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak2']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak2']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak2']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK3'); ?></label></td>
<td><select id='t_tiebreak3' name='t_tiebreak3'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak3']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak3']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak3']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak3']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak3']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK4'); ?></label></td>
<td><select id='t_tiebreak4' name='t_tiebreak4'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak4']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak4']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak4']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak4']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak4']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TIEBREAK5'); ?></label></td>
<td><select id='t_tiebreak5' name='t_tiebreak5'>
<option value='0'<?php echo $this->Item['tournament']['tiebreak5']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tiebreak5']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT1'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tiebreak5']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BUCHHOLZCUT2'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tiebreak5']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SONNEBORN'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tiebreak5']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DIRECTENCOUNTER'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_TOURNAMENTTYPE'); ?></label></td>
<td><select id='t_tournamenttype' name='t_tournamenttype'>
<option value='0'<?php echo $this->Item['tournament']['tournamenttype']==0?' selected':'';?>> </option>
<option value='1'<?php echo $this->Item['tournament']['tournamenttype']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_KONRAD'); ?></option>
<option value='2'<?php echo $this->Item['tournament']['tournamenttype']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_MONRAD'); ?></option>
<option value='3'<?php echo $this->Item['tournament']['tournamenttype']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SWISS'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tournamenttype']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ROUNDROBIN'); ?></option>
<option value='4'<?php echo $this->Item['tournament']['tournamenttype']==4?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_DOUBLEROUNDROBIN'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_STARTDATE'); ?></label></td>
<td><?php echo JHtml::_('calendar',date('d.m.Y',strtotime($this->Item['tournament']['startdate'])),'t_startdate','t_startdate','%d.%m.%Y', array('class' => 'input-small')); ?></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ENDDATE'); ?></label></td>
<td><?php echo JHtml::_('calendar',date('d.m.Y',strtotime($this->Item['tournament']['enddate'])),'t_enddate','t_enddate','%d.%m.%Y', array('class' => 'input-small')); ?></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_PGNFILE'); ?></label></td>
<td><input type='text' id='t_pgnfile' name='t_pgnfile' value='<?php echo $this->Item['tournament']['pgnfile']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_COMMENT'); ?></label></td>
<td><input type='text' id='t_comment' name='t_comment' value='<?php echo $this->Item['tournament']['comment']; ?>' /></td>
</tr>
</table>
</div>
<div id="player" class='hide'>
<table>
<tr>
<th>Startnr.</th>
<th>Fornavn.</th>
<th>Etternavn.</th>
<th>Klubb.</th>
<th>Rating.</th>
<th>Født.</th>
<th>Koomentar.</th>
</tr>
<?php
$pid=1; 
foreach ($this->Item['player'] as $player) { ?>
<tr>
<td><input type='hidden' name='p_id_<?php echo $pid; ?>' value='<?php echo $player['id']; ?>' />
<input class='input-mini' size=2 type='text' id='p_startnr' name='p_startnr_<?php echo $pid; ?>' value='<?php echo $player['startnr']; ?>' /></td>
<td><input class='input-medium' type='text' id='p_firstname' name='p_firstname_<?php echo $pid; ?>' value='<?php echo $player['firstname']; ?>' /></td>
<td><input class='input-medium' type='text' id='p_lastname' name='p_lastname_<?php echo $pid; ?>' value='<?php echo $player['lastname']; ?>' /></td>
<td><input class='input-medium' type='text' id='p_club' name='p_club_<?php echo $pid; ?>' value='<?php echo $player['club']; ?>' /></td>
<td><input class='input-mini' size='4' type='text' id='p_elo' name='p_elo_<?php echo $pid; ?>' value='<?php echo $player['elo']; ?>' /></td>
<td><?php echo JHtml::_('calendar',date('d.m.Y',strtotime($player['born'])),'p_born','p_born_<?php echo $pid; ?>','%d.%m.%Y', array('class' => 'input-small')); ?></td>
<td><input class='input-medium' type='text' id='p_comment' name='p_comment_<?php echo $pid; ?>' value='<?php echo $player['comment']; ?>' /></td>
</tr>
<?php $pid++;};?>
</table>
</div>
<div id="result" class='hide'>
<table>
<tr>
<th>Runde.</th>
<th>Hvit.</th>
<th>Sort.</th>
<th>Resultat.</th>
</tr>
<?php
$rid=1; 
foreach ($this->Item['result'] as $res) { ?>
<tr>
<td><input type='hidden' name='r_id_<?php echo $rid; ?>' value='<?php echo $res['id']; ?>' />
<input class='input-mini' size=2 type='text' id='r_round' name='r_round_<?php echo $rid; ?>' value='<?php echo $res['round']; ?>' /></td>
<td><input class='input-medium' type='text' id='r_white' name='r_white_<?php echo $rid; ?>' value='<?php echo $res['white']; ?>' /></td>
<td><input class='input-medium' type='text' id='r_black' name='r_black_<?php echo $rid; ?>' value='<?php echo $res['black']; ?>' /></td>
<td><input class='input-mini' type='text' id='r_result' name='r_result_<?php echo $rid; ?>' value='<?php echo $res['result']; ?>' /></td>
</tr>
<?php $rid++;};?>
</table>
</div>
<div class='well'>
<input class='btn btn-primary'  type='submit' value='<?php echo JText::_('COM_POLARTOUR_SAVE') ?>' />
<input class='btn' type='submit' value='<?php echo JText::_('COM_POLARTOUR_CLOSE') ?>' />
</div>
</form>
