<?php
defined('_JEXEC') or die;
?>
<div id="result" class='hide'>
<table>
<tr>
<th>Runde</th>
<th>Hvit</th>
<th>Sort</th>
<th>Resultat</th>
<th>Hvit poeng</th>
<th>Sort poeng</th>
<th>Parti nr.</th>
<th>Kommentar</th>
</tr>
<?php
$rid=0; 
foreach ($this->Item['result'] as $res) { ?>
<input type='hidden' name='result[<?php echo $rid; ?>][id]' value='<?php echo $res['id']; ?>' />
<input type='hidden' name='result[<?php echo $rid; ?>][tournamentid]' value='<?php echo $res['tournamentid']; ?>' />
<tr id="resultrow<?php echo $rid; ?>">
<td><input class='input-mini' size=2 type='text' id='r_round' name='result[<?php echo $rid; ?>][round]' value='<?php echo $res['round']; ?>' /></td>
<td><select class='input-medium' id='r_white<?php echo $rid; ?>' name='result[<?php echo $rid; ?>][whiteid]'>
<option value='0'<?php echo $res['whiteid']==0?' selected':''; ?>></option>
<?php foreach ($this->Item['player'] as $player) { ?>
<option value='<?php echo $player['id']; ?>'<?php echo $player['id']==$res['whiteid']?' selected':''; ?>><?php echo $player['firstname'] . ' ' . $player['lastname']; ?></option>
<?php }; ?>
</select></td>
<td><select class='input-medium' id='r_black<?php echo $rid; ?>' name='result[<?php echo $rid; ?>][blackid]'>
<option value='0'<?php echo $res['blackid']==0?' selected':''; ?>></option>
<?php foreach ($this->Item['player'] as $player) { ?>
<option value='<?php echo $player['id']; ?>'<?php echo $player['id']==$res['blackid']?' selected':''; ?>><?php echo $player['firstname'] . ' ' . $player['lastname']; ?></option>
<?php }; ?>
</select></td>
<td><select class='input-mini' id='r_result' name='result[<?php echo $rid; ?>][result]'>
<option value='0'<?php echo $res['result']==0?' selected':''; ?>></option>
<option value='1'<?php echo $res['result']==1?' selected':''; ?>>½-½</option>
<option value='2'<?php echo $res['result']==2?' selected':''; ?>>1-0</option>
<option value='3'<?php echo $res['result']==3?' selected':''; ?>>0-1</option>
<option value='4'<?php echo $res['result']==4?' selected':''; ?>>F ½-½</option>
<option value='5'<?php echo $res['result']==5?' selected':''; ?>>F 1-0</option>
<option value='6'<?php echo $res['result']==6?' selected':''; ?>>F 0-1</option>
<option value='-1'<?php echo $res['result']==-1?' selected':''; ?>>Bruk poeng</option></select></td>
<td><input class='input-mini' type='text' id='r_whitescore' name='result[<?php echo $rid; ?>][whitescore]' value='<?php echo $res['whitescore']; ?>' /></td>
<td><input class='input-mini' type='text' id='r_blackscore' name='result[<?php echo $rid; ?>][blackscore]' value='<?php echo $res['blackscore']; ?>' /></td>
<td><input class='input-mini' type='text' id='r_game' name='result[<?php echo $rid; ?>][game]' value='<?php echo $res['game']; ?>' /></td>
<td><input class='input-medium' type='text' id='r_comment' name='result[<?php echo $rid; ?>][comment]' value='<?php echo $res['comment']; ?>' /></td>
<td><a href="#" id="delete" href="#" title="Slett resultat" onclick="removeResult(<?php echo $rid; ?>);return false;"><i class="icon-delete"></i></a></td>
</tr>
<?php $rid++;};?>
</table>
<a href="#" onclick="addResult();return false;">Nytt resultat</a>
</div>
