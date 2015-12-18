window.onload=function(){init();};

function init()
{
	createPlayerTable();
	createResultTable();
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
	jQuery('#playertable').empty();
	var pid=0;
	var tablerow;
	for (pid=0; pid<playerlist.length;pid++)
	{
		tablerow = "<tr id='playerrow"+pid+"'>";//+(playerlist[pid].trash==1)?" class='hide'";""+">";
		tablerow += "<input type='hidden' name='player["+pid+"][trash]' value='"+playerlist[pid].id+"' />";
		tablerow += "<input type='hidden' name='player["+pid+"][id]' value='"+playerlist[pid][1]+"' />";
		tablerow +=	"<td><input class='input-mini size='2' type='text' id='p_startnr' name='player["+pid+"][startnr]' value='"+playerlist[pid].startnr+"' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_firstname' name='player["+pid+"][firstname]' value='"+playerlist[pid].firstname+"' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_firstname' name='player["+pid+"][lastname]' value='"+playerlist[pid].lastname+"' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_club' name='player["+pid+"][club]' value='"+playerlist[pid].club+"' /></td>";
		tablerow +=	"<td><input class='input-mini' type='text' id='p_elo' name='player["+pid+"][club]' value='"+playerlist[pid].elo+"' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_born' name='player["+pid+"][born]' value='"+playerlist[pid].born+"' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_comment' name='player["+pid+"][club]' value='"+playerlist[pid].comment+"' /></td>";
		tablerow += "<td><a href='# id='delete' title='Slett spiller' onclick=removePlayer"+pid+";return false;'><i class='icon-delete'></i></a></td>";
		tablerow += "</tr>";
		jQuery('#playertable').append(tablerow);
	}
};

function createResultTable()
{
	jQuery('#resulttable').empty();
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
	