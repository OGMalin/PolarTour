window.onload=function(){init();};

function init()
{
//	createPlayerTable();
//	createResultTable();
};

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

function createPlayerTable()
{
	jQuery('#player').empty();
	var table = "<table id='playertable'><tr><th>Startnr.</th><th>Fornavn</th><th>Etternavn</th><th>Klubb</th><th>Rating</th><th>Født.</th><th>Kommentar</th><th>&nbsp;</th></tr></table>";
	jQuery('#player').append(table);
	var pid=0;
	var tablerow = '';
	tablerow += "<tr id='playerrow+pid'>";
	tablerow +=	"<td><input class='input-mini' size='2' type='text' id='p_startnr' name='player["+pid+"][startnr]' value='"+pid+"' /></td>";
	tablerow += "</tr>";
	jQuery('#playertable').append(tablerow);
//	<input type='hidden' name='player[<?php echo $pid; ?>][id]' value='<?php echo $player['id']; ?>' />
//	<input type='hidden' name='player[<?php echo $pid; ?>][tournamentid]' value='<?php echo $player['tournamentid']; ?>' />
//	<tr id='playerrow<?php echo $pid; ?>'>
//	<td><input class='input-mini' size=2 type='text' id='p_startnr' name='player[<?php echo $pid; ?>][startnr]' value='<?php echo $player['startnr']; ?>' /></td>
//	<td><input class='input-medium' type='text' id='p_firstname<?php echo $pid; ?>' name='player[<?php echo $pid; ?>][firstname]' value='<?php echo $player['firstname']; ?>' /></td>
//	<td><input class='input-medium' type='text' id='p_lastname<?php echo $pid; ?>' name='player[<?php echo $pid; ?>][lastname]' value='<?php echo $player['lastname']; ?>' /></td>
//	<td><input class='input-medium' type='text' id='p_club' name='player[<?php echo $pid; ?>][club]' value='<?php echo $player['club']; ?>' /></td>
//	<td><input class='input-mini' size='4' type='text' id='p_elo' name='player[<?php echo $pid; ?>][elo]' value='<?php echo $player['elo']; ?>' /></td>
//	<td><?php echo JHtml::_('calendar',date('d.m.Y',strtotime($player['born'])),'player[' .$pid . '][born]', 'p_born', '%d.%m.%Y', array('class' => 'input-small')); ?></td>
//	<td><input class='input-medium' type='text' id='p_comment' name='player[<?php echo $pid; ?>][comment]' value='<?php echo $player['comment']; ?>' /></td>
//	<td><a href="#" id="delete" href="#" title="Slett spiller" onclick="removePlayer(<?php echo $pid; ?>);return false;"><i class="icon-delete"></i></a></td>
//	</tr>
};

function createResultTable()
{
};

function removePlayer(row)
{
	jQuery('#p_firstname'+row).val('');
	jQuery('#p_lastname'+row).val('');
	jQuery('#playerrow'+row).addClass('hide');
};
		
function addPlayer()
{
};
				
function removeResult(row)
{
	jQuery('select#r_white'+row).val(0);
	jQuery('select#r_black'+row).val(0);
	jQuery('#resultrow'+row).addClass('hide');
};
				
function addResult()
{
};
	