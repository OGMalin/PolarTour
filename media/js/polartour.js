window.onload=function(){init();};

var fullplayerlist = [];

function init()
{
	jQuery('#jform_catid').attr('name','tournament[catid]');
	jQuery('#jform_state').attr('name','tournament[state]');
	jQuery('#jform_catid').val(catid);
	jQuery('#jform_state').val(state);
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
			createPlayerTable();
			jQuery('#tournamenttab').removeClass('active');
			jQuery('#resulttab').removeClass('active');
			jQuery('#tournament').addClass('hide');
			jQuery('#result').addClass('hide');
			jQuery('#playertab').addClass('active');
			jQuery('#player').removeClass('hide');
			break;
		case 'resulttab':
			createResultTable();
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
	tablerow = "<tr><th>Startnr.</th><th>Fornavn</th><th>Etternavn</th><th>Klubb</th><th>Rating</th><th>Født</th><th></th></tr>";
	jQuery('#playertable').append(tablerow);
	for (pid=0; pid<playerlist.length;pid++)
	{
		tablerow = "<tr id='playerrow"+pid+"'>";
		tablerow += "<input type='hidden' id='p_trash"+pid+"' name='player["+pid+"][trash]' value='"+playerlist[pid].trash+"' />";
		tablerow += "<input type='hidden' name='player["+pid+"][id]' value='"+playerlist[pid].id+"' />";
		tablerow +=	"<td><input class='input-mini' type='text' id='p_startnr"+pid+"' name='player["+pid+"][startnr]' value='"+playerlist[pid].startnr+"' onchange='updatePlayer("+pid+");return false;' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_firstname"+pid+"' name='player["+pid+"][firstname]' value='"+playerlist[pid].firstname+"' onchange='updatePlayer("+pid+");return false;' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_lastname"+pid+"' name='player["+pid+"][lastname]' value='"+playerlist[pid].lastname+"' onchange='updatePlayer("+pid+");return false;' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_club"+pid+"' name='player["+pid+"][club]' value='"+playerlist[pid].club+"' onchange='updatePlayer("+pid+");return false;' /></td>";
		tablerow +=	"<td><input class='input-mini' type='text' id='p_elo"+pid+"' name='player["+pid+"][elo]' value='"+playerlist[pid].elo+"' onchange='updatePlayer("+pid+");return false;' /></td>";
		tablerow +=	"<td><input class='input-medium' type='text' id='p_born"+pid+"' name='player["+pid+"][born]' value='"+playerlist[pid].born+"' onchange='updatePlayer("+pid+");return false;' /></td>";
		tablerow += "<td><a href='# id='search' title='Finn spiller' onclick=searchPlayerOpen("+pid+");return false;'><i class='icon-search'></i></a> ";
		tablerow += "<a href='# id='delete' title='Slett spiller' onclick=removePlayer("+pid+");return false;'><i class='icon-delete'></i></a></td>";
		tablerow += "</tr>";
		jQuery('#playertable').append(tablerow);
		if (playerlist[pid].trash==1)
			jQuery('#playerrow'+pid).addClass('hide');
	}
};

function createResultTable()
{
	jQuery('#resulttable').empty();
	var rid=0;
	var pid;
	var tablerow;
	tablerow = "<tr><th>Runde</th><th>Hvit</th><th>Sort</th><th>Resultat</th><th>Parti nr.</th><th></th></tr>";
	jQuery('#resulttable').append(tablerow);
	for (rid=0; rid<resultlist.length;rid++)
	{
		tablerow = "<tr id='resultrow"+rid+"'>";//+(playerlist[pid].trash==1)?" class='hide'";""+">";
		tablerow += "<input type='hidden' id='r_trash"+rid+"' name='result["+rid+"][trash]' value='"+resultlist[rid].trash+"' />";
		tablerow += "<input type='hidden' name='result["+rid+"][id]' value='"+resultlist[rid].id+"' />";
		tablerow +=	"<td><input class='input-mini' type='text' id='r_round"+rid+"' name='result["+rid+"][round]' value='"+resultlist[rid].round+"' onchange='updateResult("+rid+");return false;' /></td>";
		tablerow += "<td><select class='input-medium' id='r_white"+rid+"' name='result["+rid+"][whiteid]' onchange='updateResult("+rid+");return false;'>";
		tablerow += "<option value='0'></option>";
		for (pid=0;pid<playerlist.length;pid++)
		{
			if (playerlist[pid].trash==0)
				tablerow += "<option value='"+playerlist[pid].id+"'>"+getPlayerName(playerlist[pid].id)+"</option>";
		}
		tablerow += "</select></td>";
		tablerow += "<td><select class='input-medium' id='r_black"+rid+"' name='result["+rid+"][blackid]' onchange='updateResult("+rid+");return false;'>";
		tablerow += "<option value='0'></option>";
		for (pid=0;pid<playerlist.length;pid++)
		{
			if (playerlist[pid].trash==0)
				tablerow += "<option value='"+playerlist[pid].id+"'>"+getPlayerName(playerlist[pid].id)+"</option>";
		}
		tablerow += "</select></td>";
		tablerow += "<td><select class='input-small' id='r_result"+rid+"' name='result["+rid+"][result]' onchange='updateResult("+rid+");return false;'>";
		tablerow += "<option value='0'></option>";
		tablerow += "<option value='1'>½-½</option>";
		tablerow += "<option value='2'>1-0</option>";
		tablerow += "<option value='3'>0-1</option>";
		tablerow += "<option value='4'>F ½-½</option>";
		tablerow += "<option value='5'>F 1-0</option>";
		tablerow += "<option value='6'>F 0-1</option>";
		tablerow += "</select></td>";
		tablerow +=	"<td><input class='input-mini' type='text' id='r_game"+rid+"' name='result["+rid+"][game]' value='"+resultlist[rid].game+"' onchange='updateResult("+rid+");return false;' /></td>";
		tablerow += "<td><a href='# id='delete' title='Slett resultat' onclick=removeResult("+rid+");return false;'><i class='icon-delete'></i></a></td>";
		tablerow += "</tr>";
		jQuery('#resulttable').append(tablerow);
		jQuery('#r_white'+rid).val(resultlist[rid].whiteid);
		jQuery('#r_black'+rid).val(resultlist[rid].blackid);
		jQuery('#r_result'+rid).val(resultlist[rid].result);
		if (resultlist[rid].trash==1)
			jQuery('#resultrow'+rid).addClass('hide');
	}
	
};

function getPlayerName(id)
{
	var pid;
	for (pid=0;pid<playerlist.length;pid++)
	{
		if (playerlist[pid].id==id)
			return playerlist[pid].firstname+' '+playerlist[pid].lastname
	}
	return '';
};

function removePlayer(pid)
{
	jQuery('#p_trash'+pid).val('1');
	playerlist[pid].trash=1;
	jQuery('#playerrow'+pid).addClass('hide');
	var rid;
	for (rid=0;rid<resultlist.length;rid++)
	{
		if ((resultlist[rid].whiteid==playerlist[pid].id) || (resultlist[rid].blackid==playerlist[pid].id))
			resultlist[rid].trash=1;
	}
};
		
function addPlayer()
{
	var pid = playerlist.length;
	playerlist[pid] = new Object();
	playerlist[pid].trash=0;
	playerlist[pid].id=0;
	playerlist[pid].startnr=0;
	playerlist[pid].firstname='';
	playerlist[pid].lastname='';
	playerlist[pid].club='';
	playerlist[pid].elo=0;
	playerlist[pid].born='0000-00-00';
	createPlayerTable();
};

function updatePlayer(pid)
{
	playerlist[pid].startnr=jQuery('#p_startnr'+pid).val();
	playerlist[pid].firstname=jQuery('#p_firstname'+pid).val();
	playerlist[pid].lastname=jQuery('#p_lastname'+pid).val();
	playerlist[pid].club=jQuery('#p_club'+pid).val();
	playerlist[pid].elo=jQuery('#p_elo'+pid).val();
	playerlist[pid].born=jQuery('#p_born'+pid).val();
};

function removeResult(row)
{
	jQuery('#r_trash'+row).val('1');
	resultlist[row].trash=1;
	jQuery('#resultrow'+row).addClass('hide');
};
				
function addResult()
{
	var rid = resultlist.length;
	resultlist[rid] = new Object();
	resultlist[rid].trash=0;
	resultlist[rid].id=0;
	resultlist[rid].round=0;
	resultlist[rid].whiteid=0;
	resultlist[rid].blackid=0;
	resultlist[rid].result=0;
	resultlist[rid].game=0;
	createResultTable();
};

function updateResult(rid)
{
	resultlist[rid].round=jQuery('#r_round'+rid).val();
	resultlist[rid].whiteid=jQuery('#r_whiteid'+rid).val();
	resultlist[rid].blackid=jQuery('#r_blackid'+rid).val();
	resultlist[rid].result=jQuery('#r_result'+rid).val();
	resultlist[rid].game=jQuery('#r_game'+rid).val();
};

function inPlayerList(lastname, firstname)
{
	var i;
	for (i=0;i<playerlist.length;i++)
	{
		if ((playerlist[i].trash==0) &&
			(playerlist[i].lastname==lastname) &&
			(playerlist[i].firstname==firstname))
			return true;
	};
	return false;
};

function searchPlayerOpen(pid)
{
	jQuery('#searchplayer').modal();
	jQuery('#searchplayerrow').val(pid);
	jQuery.ajax({
		cache : false,
		type : 'POST',
		dataType : 'json',
		url : responseUrl + 'task=response.getplayerlist&format=json',
		timeout : 5000,
//		error : function(){alert("Ajax error");},
		success : function(json) {
			if (json)
			{
				var i,j=0;
				fullplayerlist=[];
				jQuery('#searchplayerselect').empty();
				for (i=0; i<json.length; i++)
				{
					if (!inPlayerList(json[i]['lastname'],json[i]['firstname']))
					{
						fullplayerlist[j]= new Object();
						fullplayerlist[j].firstname=json[i]['firstname'];
						fullplayerlist[j].lastname=json[i]['lastname'];
						fullplayerlist[j].club=json[i]['club'];
						fullplayerlist[j].elo=json[i]['elo'];
						fullplayerlist[j].born=json[i]['born'];
						++j;
					}
				}
				var s="<select class='form-control' id='searchplayername' size='5'>\n";
				for (i=0; i<fullplayerlist.length;i++)
				{
					s+="<option value='"+i+"'>";
					s+=fullplayerlist[i].firstname + ' ' + fullplayerlist[i].lastname ;
					s+="</option>\n";
				}
				s+="</select>\n";
				jQuery('#searchplayerselect').append(s);
			}
		}
	});
};

function searchPlayerOk()
{
	var id=jQuery('#searchplayername').val();
	var pid=jQuery('#searchplayerrow').val();
	playerlist[pid].firstname=fullplayerlist[id].firstname;
	playerlist[pid].lastname=fullplayerlist[id].lastname;
	playerlist[pid].club=fullplayerlist[id].club;
	playerlist[pid].elo=fullplayerlist[id].elo;
	playerlist[pid].born=fullplayerlist[id].born;
	createPlayerTable();
}

