<?php
defined('_JEXEC') or die;
?>
<div id="player" class='hide'>
<table id="playertable">
<tr>
<th>Startnr.</th>
<th>Fornavn.</th>
<th>Etternavn.</th>
<th>Klubb.</th>
<th>Rating.</th>
<th>Født.</th>
<th>Koomentar.</th>
<th></th>
</tr>
<?php
$pid=0; 
foreach ($this->Item['player'] as $player) { ?>
<input type='hidden' name='player[<?php echo $pid; ?>][id]' value='<?php echo $player['id']; ?>' />
<input type='hidden' name='player[<?php echo $pid; ?>][tournamentid]' value='<?php echo $player['tournamentid']; ?>' />
<tr id='playerrow<?php echo $pid; ?>'>
<td><input class='input-mini' size=2 type='text' id='p_startnr' name='player[<?php echo $pid; ?>][startnr]' value='<?php echo $player['startnr']; ?>' /></td>
<td><input class='input-medium' type='text' id='p_firstname<?php echo $pid; ?>' name='player[<?php echo $pid; ?>][firstname]' value='<?php echo $player['firstname']; ?>' /></td>
<td><input class='input-medium' type='text' id='p_lastname<?php echo $pid; ?>' name='player[<?php echo $pid; ?>][lastname]' value='<?php echo $player['lastname']; ?>' /></td>
<td><input class='input-medium' type='text' id='p_club' name='player[<?php echo $pid; ?>][club]' value='<?php echo $player['club']; ?>' /></td>
<td><input class='input-mini' size='4' type='text' id='p_elo' name='player[<?php echo $pid; ?>][elo]' value='<?php echo $player['elo']; ?>' /></td>
<td><?php echo JHtml::_('calendar',date('d.m.Y',strtotime($player['born'])),'player[' .$pid . '][born]', 'p_born', '%d.%m.%Y', array('class' => 'input-small')); ?></td>
<td><input class='input-medium' type='text' id='p_comment' name='player[<?php echo $pid; ?>][comment]' value='<?php echo $player['comment']; ?>' /></td>
<td><a href="#" id="delete" href="#" title="Slett spiller" onclick="removePlayer(<?php echo $pid; ?>);return false;"><i class="icon-delete"></i></a></td>
</tr>
<?php $pid++;};?>
</table>
<a href="#" onclick="addPlayer();return false;">Ny spiller</a>
</div>
