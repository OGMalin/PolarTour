window.onload=function(){init();};

var fullplayerlist = [];

function init()
{
	jQuery('#jform_catid').attr('name','tournament[catid]');
	jQuery('#jform_state').attr('name','tournament[state]');
	jQuery('#jform_catid').val(catid);
	jQuery('#jform_state').val(state);
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
	var rid;
	var pid;
	var tablerow;
	var resnum=0;
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
				tablerow += "<option value='"+playerlist[pid].id+"'"+(playerlist[pid].id==0?' disabled':'')+">"+getPlayerName(playerlist[pid].id)+"</option>";
		}
		tablerow += "</select></td>";
		tablerow += "<td><select class='input-medium' id='r_black"+rid+"' name='result["+rid+"][blackid]' onchange='updateResult("+rid+");return false;'>";
		tablerow += "<option value='0'></option>";
		for (pid=0;pid<playerlist.length;pid++)
		{
			if (playerlist[pid].trash==0)
				tablerow += "<option value='"+playerlist[pid].id+"'"+(playerlist[pid].id==0?' disabled':'')+">"+getPlayerName(playerlist[pid].id)+"</option>";
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
	if (canGenerateBerger())
	{
		jQuery('#r_berger').removeClass('hide');
	}else
	{
		jQuery('#r_berger').addClass('hide');
	}
};

function canGenerateBerger()
{
	if (!isBerger())
		return false;
	var num=numberOfPlayers();
	if ((num<3) || (num>12))
		return false;
	if (numberOfResults()>0)
		return false;
	if (unsavedPlayers())
		return false;
	
	var pid;
	var startnr;
	updatePlayerList();
	for (pid=0;pid<playerlist.length;pid++)
	{
		if (playerlist[pid].trash!=1)
		{
			if (playerlist[pid].startnr<1)
				return false;
		};
	};
	return true;
};

function updatePlayerList()
{
	var pid;
	for (pid=0; pid< playerlist.length; pid++)
	{
		if (playerlist[pid].trash==0)
		{
			playerlist[pid].startnr=jQuery('#p_startnr'+pid).val();
			playerlist[pid].firstname=jQuery('#p_firstname'+pid).val();
			playerlist[pid].lastname=jQuery('#p_lastname'+pid).val();
			playerlist[pid].club=jQuery('#p_club'+pid).val();
			playerlist[pid].elo=jQuery('#p_elo'+pid).val();
			playerlist[pid].born=jQuery('#p_born'+pid).val();
		};
	};
};

function unsavedPlayers()
{
	var pid;
	for (pid=0;pid<playerlist.length;pid++)
	{
		if (playerlist[pid].trash!=1)
			if (playerlist[pid].id==0)
				return true;
	};
	return false;
};

function numberOfPlayers()
{
	var ret=0;
	var pid;
	for (pid=0;pid<playerlist.length;pid++)
	{
		if (playerlist[pid].trash!=1)
			++ret;
	};
	return ret;
};

function numberOfResults()
{
	var ret=0;
	var rid;
	for (rid=0;rid<resultlist.length;rid++)
	{
		if (resultlist[rid].trash!=1)
			++ret;
	};
	return ret;
};

function isBerger()
{
	var turnamenttype=jQuery('#t_tournamenttype').val();
	if ((turnamenttype>=4) && (turnamenttype<=7))
		return true;
	return false;
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

function getPlayerIdByStartnr(startnr)
{
	var pid;
	for (pid=0;pid<playerlist.length;pid++)
	{
		if (playerlist[pid].trash==0)
			if (playerlist[pid].startnr==startnr)
				return playerlist[pid].id;
	}
	return 0;
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
	if (canGenerateBerger())
	{
		jQuery('#r_berger').removeClass('hide');
	}else
	{
		jQuery('#r_berger').addClass('hide');
	}
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

function addResult(round, whiteid, blackid)
{
	var rid = resultlist.length;
	resultlist[rid] = new Object();
	resultlist[rid].trash=0;
	resultlist[rid].id=0;
	resultlist[rid].round=round;
	resultlist[rid].whiteid=whiteid;
	resultlist[rid].blackid=blackid;
	resultlist[rid].result=0;
	resultlist[rid].game=0;
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
		data : 'option=com_polartour&task=response.getplayerlist&format=json',
		dataType : 'json',
//		url : responseUrl + 'task=response.getplayerlist&format=json',
		timeout : 5000,
//		error : function(){alert("Ajax error");},
		success : function(json)
		{
			if (json)
			{
				var i,j=0;
				fullplayerlist=[];
				jQuery('#searchplayerselect').empty();
				for (i=0; i<json.data.length; i++)
				{
					if (!inPlayerList(json.data[i]['lastname'],json.data[i]['firstname']))
					{
						fullplayerlist[j]= new Object();
						fullplayerlist[j].firstname=json.data[i]['firstname'];
						fullplayerlist[j].lastname=json.data[i]['lastname'];
						fullplayerlist[j].club=json.data[i]['club'];
						fullplayerlist[j].elo=json.data[i]['elo'];
						fullplayerlist[j].born=json.data[i]['born'];
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
		},
		error: function (xhr, ajaxOptions, thrownError)
		{
	        alert(xhr.status);
	        alert(thrownError);
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
};

function generateBerger()
{
	if (!canGenerateBerger())
		return;

	var num=numberOfPlayers();

	switch (num)
	{
		case 3:
		case 4: generateBerger4();
				break;
		case 5:
		case 6: generateBerger6();
				break;
		case 7:
		case 8: generateBerger8();
				break;
		case 9:
		case 10: generateBerger10();
				break;
		case 11:
		case 12: generateBerger12();
				break;
	};
	createResultTable();
};

function generateBerger4()
{
	var berger=[[1,4],[2,3],
	            [1,2],[4,3],
	            [3,1],[2,4]]; 
	var turnamenttype=jQuery('#t_tournamenttype').val();
	var r;
	for (r=0;r<3;r++)
	{
		addResult(r+1, getPlayerIdByStartnr(berger[r*2][0]),getPlayerIdByStartnr(berger[r*2][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*2+1][0]),getPlayerIdByStartnr(berger[r*2+1][1]));
	}
	if (turnamenttype>4)
	{
		for (r=0;r<3;r++)
		{
			addResult(r+4, getPlayerIdByStartnr(berger[r*2][1]),getPlayerIdByStartnr(berger[r*2][0]));
			addResult(r+4, getPlayerIdByStartnr(berger[r*2+1][1]),getPlayerIdByStartnr(berger[r*2+1][0]));
		}
		
	}
	if (turnamenttype>5)
	{
		for (r=0;r<3;r++)
		{
			addResult(r+7, getPlayerIdByStartnr(berger[r*2][0]),getPlayerIdByStartnr(berger[r*2][1]));
			addResult(r+7, getPlayerIdByStartnr(berger[r*2+1][0]),getPlayerIdByStartnr(berger[r*2+1][1]));
		}
		
	}
	if (turnamenttype==7)
	{
		for (r=0;r<3;r++)
		{
			addResult(r+10, getPlayerIdByStartnr(berger[r*2][1]),getPlayerIdByStartnr(berger[r*2][0]));
			addResult(r+10, getPlayerIdByStartnr(berger[r*2+1][1]),getPlayerIdByStartnr(berger[r*2+1][0]));
		}
		
	}
	// Remove walkover in round robin
	var rid;
	for (rid=0; rid<resultlist.length; rid++)
	{
		if ((resultlist[rid].whiteid==0) || (resultlist[rid].blackid==0))
			resultlist[rid].trash=1;
	}
};

function generateBerger6()
{
	var berger=[[1,6],[2,5],[3,4],
	            [1,2],[5,3],[6,4],
	            [3,1],[2,6],[4,5],
	            [1,4],[2,3],[6,5],
	            [5,1],[4,2],[3,6]]; 
	var turnamenttype=jQuery('#t_tournamenttype').val();
	var r;
	for (r=0;r<5;r++)
	{
		addResult(r+1, getPlayerIdByStartnr(berger[r*3][0]),getPlayerIdByStartnr(berger[r*3][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*3+1][0]),getPlayerIdByStartnr(berger[r*3+1][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*3+2][0]),getPlayerIdByStartnr(berger[r*3+2][1]));
	}
	if (turnamenttype>4)
	{
		for (r=0;r<5;r++)
		{
			addResult(r+6, getPlayerIdByStartnr(berger[r*3][1]),getPlayerIdByStartnr(berger[r*3][0]));
			addResult(r+6, getPlayerIdByStartnr(berger[r*3+1][1]),getPlayerIdByStartnr(berger[r*3+1][0]));
			addResult(r+6, getPlayerIdByStartnr(berger[r*3+2][1]),getPlayerIdByStartnr(berger[r*3+2][0]));
		}
		
	}
	if (turnamenttype>5)
	{
		for (r=0;r<5;r++)
		{
			addResult(r+11, getPlayerIdByStartnr(berger[r*3][0]),getPlayerIdByStartnr(berger[r*3][1]));
			addResult(r+11, getPlayerIdByStartnr(berger[r*3+1][0]),getPlayerIdByStartnr(berger[r*3+1][1]));
			addResult(r+11, getPlayerIdByStartnr(berger[r*3+2][0]),getPlayerIdByStartnr(berger[r*3+2][1]));
		}
		
	}
	if (turnamenttype==7)
	{
		for (r=0;r<5;r++)
		{
			addResult(r+16, getPlayerIdByStartnr(berger[r*3][1]),getPlayerIdByStartnr(berger[r*3][0]));
			addResult(r+16, getPlayerIdByStartnr(berger[r*3+1][1]),getPlayerIdByStartnr(berger[r*3+1][0]));
			addResult(r+16, getPlayerIdByStartnr(berger[r*3+2][1]),getPlayerIdByStartnr(berger[r*3+2][0]));
		}
	}

	// Remove walkover in round robin
	var rid;
	for (rid=0; rid<resultlist.length; rid++)
	{
		if ((resultlist[rid].whiteid==0) || (resultlist[rid].blackid==0))
			resultlist[rid].trash=1;
	}
};

function generateBerger8()
{
	var berger=[[1,8],[2,7],[3,6],[4,5],
	            [1,2],[7,3],[6,4],[8,5],
	            [3,1],[2,8],[4,7],[5,6],
	            [1,4],[2,3],[7,5],[8,6],
	            [5,1],[4,2],[3,8],[6,7],
	            [1,6],[2,5],[3,4],[8,7],
	            [7,1],[6,2],[5,3],[4,8]]; 
	var turnamenttype=jQuery('#t_tournamenttype').val();
	var r;
	for (r=0;r<7;r++)
	{
		addResult(r+1, getPlayerIdByStartnr(berger[r*4][0]),getPlayerIdByStartnr(berger[r*4][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*4+1][0]),getPlayerIdByStartnr(berger[r*4+1][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*4+2][0]),getPlayerIdByStartnr(berger[r*4+2][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*4+3][0]),getPlayerIdByStartnr(berger[r*4+3][1]));
	}
	if (turnamenttype>4)
	{
		for (r=0;r<7;r++)
		{
			addResult(r+8, getPlayerIdByStartnr(berger[r*4][1]),getPlayerIdByStartnr(berger[r*4][0]));
			addResult(r+8, getPlayerIdByStartnr(berger[r*4+1][1]),getPlayerIdByStartnr(berger[r*4+1][0]));
			addResult(r+8, getPlayerIdByStartnr(berger[r*4+2][1]),getPlayerIdByStartnr(berger[r*4+2][0]));
			addResult(r+8, getPlayerIdByStartnr(berger[r*4+3][1]),getPlayerIdByStartnr(berger[r*4+3][0]));
		}
		
	}
	if (turnamenttype>5)
	{
		for (r=0;r<7;r++)
		{
			addResult(r+15, getPlayerIdByStartnr(berger[r*4][0]),getPlayerIdByStartnr(berger[r*4][1]));
			addResult(r+15, getPlayerIdByStartnr(berger[r*4+1][0]),getPlayerIdByStartnr(berger[r*4+1][1]));
			addResult(r+15, getPlayerIdByStartnr(berger[r*4+2][0]),getPlayerIdByStartnr(berger[r*4+2][1]));
			addResult(r+15, getPlayerIdByStartnr(berger[r*4+3][0]),getPlayerIdByStartnr(berger[r*4+3][1]));
		}
		
	}
	if (turnamenttype==7)
	{
		for (r=0;r<7;r++)
		{
			addResult(r+22, getPlayerIdByStartnr(berger[r*4][1]),getPlayerIdByStartnr(berger[r*4][0]));
			addResult(r+22, getPlayerIdByStartnr(berger[r*4+1][1]),getPlayerIdByStartnr(berger[r*4+1][0]));
			addResult(r+22, getPlayerIdByStartnr(berger[r*4+2][1]),getPlayerIdByStartnr(berger[r*4+2][0]));
			addResult(r+22, getPlayerIdByStartnr(berger[r*4+3][1]),getPlayerIdByStartnr(berger[r*4+3][0]));
		}
	}

	// Remove walkover in round robin
	var rid;
	for (rid=0; rid<resultlist.length; rid++)
	{
		if ((resultlist[rid].whiteid==0) || (resultlist[rid].blackid==0))
			resultlist[rid].trash=1;
	}
};

function generateBerger10()
{
	var berger=[[1,10],[2,9],[3,8],[4,7],[5,6],
	            [1,2],[9,3],[8,4],[7,5],[10,6],
	            [3,1],[2,10],[4,9],[5,8],[6,7],
	            [1,4],[2,3],[9,5],[8,6],[10,7],
	            [5,1],[4,2],[3,10],[6,9],[7,8],
	            [1,6],[2,5],[3,4],[9,7],[10,8],
	            [7,1],[6,2],[5,3],[4,10],[8,9],
	            [1,8],[2,7],[3,6],[4,5],[10,9],
	            [9,1],[8,2],[7,3],[6,4],[5,10]]; 
	var turnamenttype=jQuery('#t_tournamenttype').val();
	var r;
	for (r=0;r<9;r++)
	{
		addResult(r+1, getPlayerIdByStartnr(berger[r*5][0]),getPlayerIdByStartnr(berger[r*5][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+1][0]),getPlayerIdByStartnr(berger[r*5+1][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+2][0]),getPlayerIdByStartnr(berger[r*5+2][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+3][0]),getPlayerIdByStartnr(berger[r*5+3][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+4][0]),getPlayerIdByStartnr(berger[r*5+4][1]));
	}
	if (turnamenttype>4)
	{
		for (r=0;r<9;r++)
		{
			addResult(r+10, getPlayerIdByStartnr(berger[r*5][1]),getPlayerIdByStartnr(berger[r*5][0]));
			addResult(r+10, getPlayerIdByStartnr(berger[r*5+1][1]),getPlayerIdByStartnr(berger[r*5+1][0]));
			addResult(r+10, getPlayerIdByStartnr(berger[r*5+2][1]),getPlayerIdByStartnr(berger[r*5+2][0]));
			addResult(r+10, getPlayerIdByStartnr(berger[r*5+3][1]),getPlayerIdByStartnr(berger[r*5+3][0]));
			addResult(r+10, getPlayerIdByStartnr(berger[r*5+4][1]),getPlayerIdByStartnr(berger[r*5+4][0]));
		}
		
	}
	if (turnamenttype>5)
	{
		for (r=0;r<9;r++)
		{
			addResult(r+19, getPlayerIdByStartnr(berger[r*5][0]),getPlayerIdByStartnr(berger[r*5][1]));
			addResult(r+19, getPlayerIdByStartnr(berger[r*5+1][0]),getPlayerIdByStartnr(berger[r*5+1][1]));
			addResult(r+19, getPlayerIdByStartnr(berger[r*5+2][0]),getPlayerIdByStartnr(berger[r*5+2][1]));
			addResult(r+19, getPlayerIdByStartnr(berger[r*5+3][0]),getPlayerIdByStartnr(berger[r*5+3][1]));
			addResult(r+19, getPlayerIdByStartnr(berger[r*5+4][0]),getPlayerIdByStartnr(berger[r*5+4][1]));
		}
		
	}
	if (turnamenttype==7)
	{
		for (r=0;r<9;r++)
		{
			addResult(r+28, getPlayerIdByStartnr(berger[r*5][1]),getPlayerIdByStartnr(berger[r*5][0]));
			addResult(r+28, getPlayerIdByStartnr(berger[r*5+1][1]),getPlayerIdByStartnr(berger[r*5+1][0]));
			addResult(r+28, getPlayerIdByStartnr(berger[r*5+2][1]),getPlayerIdByStartnr(berger[r*5+2][0]));
			addResult(r+28, getPlayerIdByStartnr(berger[r*5+3][1]),getPlayerIdByStartnr(berger[r*5+3][0]));
			addResult(r+28, getPlayerIdByStartnr(berger[r*5+4][1]),getPlayerIdByStartnr(berger[r*5+4][0]));
		}
	}

	// Remove walkover in round robin
	var rid;
	for (rid=0; rid<resultlist.length; rid++)
	{
		if ((resultlist[rid].whiteid==0) || (resultlist[rid].blackid==0))
			resultlist[rid].trash=1;
	}
};

function generateBerger12()
{
	var berger=[[1,12],[2,11],[3,10],[4,9],[5,8],[6,7],
	            [1,2],[11,3],[10,4],[9,5],[8,6],[12,7],
	            [3,1],[2,12],[4,11],[5,10],[6,9],[7,8],
	            [1,4],[2,3],[11,5],[10,6],[9,7],[12,8],
	            [5,1],[4,2],[3,12],[6,11],[7,10],[8,9],
	            [1,6],[2,5],[3,4],[11,7],[10,8],[12,9],
	            [7,1],[6,2],[5,3],[4,12],[8,11],[9,10],
	            [1,8],[2,7],[3,6],[4,5],[11,9],[12,10],
	            [9,1],[8,2],[7,3],[6,4],[5,12],[10,11],
	            [1,10],[2,9],[3,8],[4,7],[5,6],[12,11],
	            [11,1],[10,2],[9,3],[8,4],[7,5],[6,12]]; 
	var turnamenttype=jQuery('#t_tournamenttype').val();
	var r;
	for (r=0;r<11;r++)
	{
		addResult(r+1, getPlayerIdByStartnr(berger[r*5][0]),getPlayerIdByStartnr(berger[r*5][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+1][0]),getPlayerIdByStartnr(berger[r*5+1][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+2][0]),getPlayerIdByStartnr(berger[r*5+2][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+3][0]),getPlayerIdByStartnr(berger[r*5+3][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*5+4][0]),getPlayerIdByStartnr(berger[r*5+4][1]));
		addResult(r+1, getPlayerIdByStartnr(berger[r*6+5][0]),getPlayerIdByStartnr(berger[r*6+5][1]));
	}
	if (turnamenttype>4)
	{
		for (r=0;r<11;r++)
		{
			addResult(r+12, getPlayerIdByStartnr(berger[r*5][1]),getPlayerIdByStartnr(berger[r*5][0]));
			addResult(r+12, getPlayerIdByStartnr(berger[r*5+1][1]),getPlayerIdByStartnr(berger[r*5+1][0]));
			addResult(r+12, getPlayerIdByStartnr(berger[r*5+2][1]),getPlayerIdByStartnr(berger[r*5+2][0]));
			addResult(r+12, getPlayerIdByStartnr(berger[r*5+3][1]),getPlayerIdByStartnr(berger[r*5+3][0]));
			addResult(r+12, getPlayerIdByStartnr(berger[r*5+4][1]),getPlayerIdByStartnr(berger[r*5+4][0]));
			addResult(r+12, getPlayerIdByStartnr(berger[r*6+5][1]),getPlayerIdByStartnr(berger[r*6+5][0]));
		}
		
	}
	if (turnamenttype>5)
	{
		for (r=0;r<11;r++)
		{
			addResult(r+23, getPlayerIdByStartnr(berger[r*5][0]),getPlayerIdByStartnr(berger[r*5][1]));
			addResult(r+23, getPlayerIdByStartnr(berger[r*5+1][0]),getPlayerIdByStartnr(berger[r*5+1][1]));
			addResult(r+23, getPlayerIdByStartnr(berger[r*5+2][0]),getPlayerIdByStartnr(berger[r*5+2][1]));
			addResult(r+23, getPlayerIdByStartnr(berger[r*5+3][0]),getPlayerIdByStartnr(berger[r*5+3][1]));
			addResult(r+23, getPlayerIdByStartnr(berger[r*5+4][0]),getPlayerIdByStartnr(berger[r*5+4][1]));
			addResult(r+23, getPlayerIdByStartnr(berger[r*6+5][0]),getPlayerIdByStartnr(berger[r*6+5][1]));
		}
		
	}
	if (turnamenttype==7)
	{
		for (r=0;r<11;r++)
		{
			addResult(r+34, getPlayerIdByStartnr(berger[r*5][1]),getPlayerIdByStartnr(berger[r*5][0]));
			addResult(r+34, getPlayerIdByStartnr(berger[r*5+1][1]),getPlayerIdByStartnr(berger[r*5+1][0]));
			addResult(r+34, getPlayerIdByStartnr(berger[r*5+2][1]),getPlayerIdByStartnr(berger[r*5+2][0]));
			addResult(r+34, getPlayerIdByStartnr(berger[r*5+3][1]),getPlayerIdByStartnr(berger[r*5+3][0]));
			addResult(r+34, getPlayerIdByStartnr(berger[r*5+4][1]),getPlayerIdByStartnr(berger[r*5+4][0]));
			addResult(r+34, getPlayerIdByStartnr(berger[r*6+5][1]),getPlayerIdByStartnr(berger[r*6+5][0]));
		}
	}

	// Remove walkover in round robin
	var rid;
	for (rid=0; rid<resultlist.length; rid++)
	{
		if ((resultlist[rid].whiteid==0) || (resultlist[rid].blackid==0))
			resultlist[rid].trash=1;
	}
};
