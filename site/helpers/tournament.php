<?php

defined('_JEXEC') or die;

/**
 * Compare routine for usort()
 * @param mixed $a
 * @param mixed $b
 * @return -1 0 1
 */
function ScoreCompare($a,$b)
{
	if ($a[4] == $b[4])
	{
		if ($a[5] == $b[5])
		{
			if ($a[6] == $b[6])
			{
				if ($a[7] == $b[7])
				{
					if ($a[8] == $b[8])
					{
						if ($a[9] == $b[9])
						{
							return 0;
						}
						return ($a[9] < $b[9]) ? 1 : -1;
					}
					return ($a[8] < $b[8]) ? 1 : -1;
				}
				return ($a[7] < $b[7]) ? 1 : -1;
			}
			return ($a[6] < $b[6]) ? 1 : -1;
		}
		return ($a[5] < $b[5]) ? 1 : -1;
	}
	return ($a[4] < $b[4]) ? 1 : -1;
}

class TournamentHelper
{
	public $tournament;
	public $player;
	public $result;
	public $head;
	protected $score;
	
	public function displayTable($round)
	{
		$lastRound=$this->_getLastRound();
		if ($round>$lastRound)
			$round=$lastRound;
		
		$table="";
		$this->_calcResult($round);
		
		$table="<table class='polartour_table'>\n";
		if ($this->head!="")
			$table.="<caption>$this->head</caption>\n";
		$table.="<thead>\n";
		$table.="<tr>\n";
		$table.="<th class='polartour_number'>Pl.</th>\n";
		$table.="<th class='polartour_name'>Navn</th>\n";
		if ($this->tournament['tournamenttype']>4)
		{
			for ($i=1;$i<=count($this->score);$i++)
				$table.="<th class='polartour_xtable'>$i</th>\n";
		}else 
		{
			for ($i=1;$i<=$round;$i++)
				$table.="<th class='polartour_xtable'>$i</th>\n";
		}
		$table.="<th class='polartour_score'>Poeng</th>\n";
		$table.="</tr>\n";
		$table.="</thead>\n";
		$table.="<tbody>\n";
		$class='polartour_tbody_tr_odd';
		
		foreach ($this->score as $s)
		{
			$table.="<tr class=$class>\n";
			$table.="<td class='polartour_number'>{$s[0]}</td>\n";
			$table.="<td class='polartour_name'>{$s[2]} {$s[3]}</td>\n";
			if ($this->tournament['tournamenttype']>4)
			{
				for ($i=0;$i<count($this->score);$i++)
					$table.="<td class='polartour_xtable'>" . $this->_getRoundRobinScore($this->score[$i][1],$s[1],$round) . "</td>\n";
			}else
			{
				for ($i=1;$i<=$round;$i++)
					$table.="<td class='polartour_xtable'>" . $this->_getRoundScore($i,$s[1],$round) . "</td>\n";
			}
			$table.="<td class='polartour_score'>{$s[4]}</td>\n";
			$table.="</tr>\n";
			$class=($class=='polartour_tbody_tr_odd')?'polartour_tbody_tr_even':'polartour_tbody_tr_odd';
		}
		$table.="</tbody>\n";
		$table.="</table>\n";
		return $table;
	}
	/**
 	* 
 	* @param integer $o	Opponent number
 	* @param integer $p	Player id
 	* @param integer $r	Number of rounds
 	* @return string String to put into the xtable
 	*/
	protected function _getRoundRobinScore($oid, $pid, $r)
	{
		$ret='';
		if ($oid==$pid)
		{
			if ($this->tournament['tournamenttype']==4)
				return '*';
			else if ($this->tournament['tournamenttype']==5)
				return '**';
			else if ($this->tournament['tournamenttype']==6)
				return '***';
			return '****';
		}
		for ($i=0;$i<count($this->score);$i++)
		{
			if ($this->score[$i][1]==$pid)
			{
				for ($j=10;$j<(10+$r);$j++)
				{
					if ($oid==$this->score[$i][$j+$r])
					{
						if (($this->tournament['showcolor']==1) && ($this->score[$i][$j+$r*2]=='w'))
							$ret.="<b>";
						if ($this->score[$i][$j]==1)
							$ret.='1';
						else if ($this->score[$i][$j]==0)
							$ret.='0';
						else
							$ret.='&frac12;';
						if (($this->tournament['showcolor']==1) && ($this->score[$i][$j+$r*2]=='w'))
							$ret.="</b>";
					}
				}
			}
		}
		if (strlen($ret)<1)
			$ret="&nbsp";
		if ($this->tournament['tournamenttype']>4)
		{
			if (strlen($ret)<2)
				$ret.="&nbsp";
			if ($this->tournament['tournamenttype']>5)
			{
				if (strlen($ret)<3)
					$ret.="&nbsp";
				if ($this->tournament['tournamenttype']>6)
				{
					if (strlen($ret)<4)
						$ret.="&nbsp";
				}
			}
		}
		return $ret;
	}
	
	/**
	 * 
	 * @param integer $r Round
	 * @param integer $p Player
	 * @param integer $rounds Number of rounds
	 */
	protected function _getRoundScore($r,$p,$rounds)
	{
		$ret="&nbsp;";
		$c1='';$c2='';$c3='';
		// Find result
		
		for ($i=0;$i<count($this->score);$i++)
		{
			if ($this->score[$i][1]==$p)
			{
				if ((!isset($this->score[$i][9+$r+$rounds*2])) || ($this->score[$i][9+$r+$rounds*2]==''))
					return $ret; 
				$ret='';
				if (($this->tournament['showcolor']==1) && ($this->score[$i][9+$r+$rounds*2]=='w'))
					$ret.="<b>";
				if ($this->score[$i][9+$r]==0)
					$ret.='-';
				elseif ($this->score[$i][9+$r]==1)
					$ret.='+';
				else 
					$ret.='=';
				if ($this->score[$i][9+$r+$rounds]==0)
				{
					if ($this->score[$i][9+$r+$rounds*2]=='f')
						$ret.='F';
					else
						$ret.='W';
					
				}else
				{
					$k=count($this->score);
					for ($j=0;$j<$k;$j++)
					{
						if ($this->score[$j][1]==$this->score[$i][9+$r+$rounds])
							$ret.=($k>9)?sprintf("%02d",$j+1):sprintf("%d",$j+1);
					}
				}
				if (($this->tournament['showcolor']==1) && ($this->score[$i][9+$r+$rounds*2]==''))
					$ret.="</b>";
				return $ret;
			}
		}
		
		return $ret;
	}
	
	/**
	 * 
	 * @return integer Last round with result
	 */
	protected function _getLastRound()
	{
		$lastround=0;
		foreach ($this->result as $r)
		{
			if ($r['round']>$lastround)
				$lastround=$r['round'];
		}
		return $lastround;
	}
	
	
	/**
	 * 
	 * @param integer $round Round to make the score table for
	 * @return Update $this->score
	 * 
	 * $this->score
	 * (col 0-9)
	 * Number;Player id;First name;Last name;Score;Tb1;Tb2;Tb3;Tb4;Tb5;
	 * (col 10-n)
	 * Point round 1;...;Opponent id round 1;...;Color(w/b) or f round 1;...;
	 */
	protected function _calcResult($round){
		$this->score=array();
		
//		echo "<pre>";var_dump($this->player);echo "</pre>";
		$i=0;
		foreach ($this->player as $p)
		{
			$this->score[$i++]=array(0,$p['id'],$p['firstname'],$p['lastname'],0,0,0,0,0,0);
		}
		
		foreach ($this->result as $r)
		{
			if ($r['round']<=$round)
			{
				$ws=$bs=0;
				$wp=$r['whiteid'];
				$bp=$r['blackid'];
				$skip=false;
				switch ($r['result'])
				{
					case -1:
						$ws=$r['whitescore'];
						$bs=$r['blackscore'];
						break;
					case 0:  // Ongoing
						$skip=true;
						break;
					case 1:  // draw
						$ws=$bs=0.5;
						break;
					case 2:  // White win
						$ws=1;
						break;
					case 3:  // Black win
						$bs=1;
						break;
					case 4:  // Unplayed draw
						$ws=$bs=0.5;
						break;
					case 5:  // Unplayed White win
						$ws=1;
						break;
					case 6:  // Unplayed Black win
						$bs=1;
						break;
				}
				if ($skip)
					continue;
				for ($i=0;$i<count($this->score);$i++)
				{
					if ($this->score[$i][1]==$wp)
					{
						$this->score[$i][4]+=$ws;
						$this->score[$i][9+$r['round']]=$ws;
						$this->score[$i][9+$r['round']+$round]=$bp;
						if ($r['result']>3)
							$this->score[$i][9+$r['round']+$round*2]='f';
						else
							$this->score[$i][9+$r['round']+$round*2]='w';
					}
					if ($this->score[$i][1]==$bp)
					{
						$this->score[$i][4]+=$bs;
						$this->score[$i][9+$r['round']]=$bs;
						$this->score[$i][9+$r['round']+$round]=$wp;
						if ($r['result']>3)
							$this->score[$i][9+$r['round']+$round*2]='f';
						else
							$this->score[$i][9+$r['round']+$round*2]='b';
					}
				}
			}
		}

		// Calc Tiebreak points
		$this->_calcTiebreak($this->tournament['tiebreak1'],0,$round);
		$this->_calcTiebreak($this->tournament['tiebreak2'],1,$round);
		$this->_calcTiebreak($this->tournament['tiebreak3'],2,$round);
		$this->_calcTiebreak($this->tournament['tiebreak4'],3,$round);
		$this->_calcTiebreak($this->tournament['tiebreak5'],4,$round);
		
		usort($this->score, 'ScoreCompare');
		
		$pl=1;
		$skip=1;
		$sc=$tb1=$tb2=$tb3=$tb4=$tb5=0;
//		echo "<pre>";var_dump($this->score);echo "</pre>";

		// Sett plassering
		for ($i=0;$i<count($this->score);$i++)
		{
			if ($i>0)
			{
				if (($this->score[$i][4]==$sc) &&
						($this->score[$i][5]==$tb1) &&
						($this->score[$i][6]==$tb2) &&
						($this->score[$i][7]==$tb3) &&
						($this->score[$i][8]==$tb4) &&
						($this->score[$i][9]==$tb5))
				{
					++$skip;
				}else 
				{
					$pl+=$skip;
					$skip=1;
				}
			}
			$this->score[$i][0]=$pl;
			$sc=$this->score[$i][4];
			$tb1=$this->score[$i][5];
			$tb2=$this->score[$i][6];
			$tb3=$this->score[$i][7];
			$tb4=$this->score[$i][8];
			$tb5=$this->score[$i][9];
		}
//		echo "<pre>";var_dump($this->score);echo "</pre>";
	}

	protected function _calcTiebreak($rule, $tb, $round)
	{
		switch ($rule)
		{
			case 1:
				$this->_calcAverageRating($tb, $round);
				break;
			case 2:
				$this->_calcAverageRatingCut($tb, $round);
				break;
			case 3:
				$this->_calcBuchholz($tb, $round);
				break;
			case 4:
				$this->_calcMedianBuchholz($tb, $round);
				break;
			case 5:
				$this->_calcMedianBuchholz2($tb, $round);
				break;
			case 6:
				$this->_calcBuchholzCut1($tb, $round);
				break;
			case 7:
				$this->_calcBuchholzCut2($tb, $round);
				break;
			case 8:
				$this->_calcDirectEncounter($tb, $round);
				break;
			case 9:
				$this->_calcSonnebornBerger($tb, $round);
		}
		
	}

	
	protected function _calcAverageRating($tb, $round)
	{
	
	}
	
	protected function _calcAverageRatingCut($tb, $round)
	{
	
	}
	
	protected function _calcBuchholz($tb, $round)
	{
	
	}
	
	protected function _calcMedianBuchholz($tb, $round)
	{
	
	}
	
	protected function _calcMedianBuchholz2($tb, $round)
	{
	
	}
	
	protected function _calcBuchholzCut1($tb, $round)
	{
	
	}

	protected function _calcBuchholzCut2($tb, $round)
	{
	
	}

	protected function _calcDirectEncounter($tb, $round)
	{
	
	}

	protected function _calcSonnebornBerger($tb, $round)
	{
	
	}
	
}