<?php
defined('_JEXEC') or die;
?>
<!-- Tournament data -->
<form action="<?php echo JRoute::_('index.php?option=com_polartour&view=tournament&task=save'); ?>">
<div id='tournament'>
<table>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ID'); ?></label></td>
<td><input readonly type='text' id='t_id' value='<?php echo $this->Item['tournament']['id']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_OWNER'); ?></label></td>
<td><input readonly type='text' id='t_owner' value='<?php echo $this->Item['tournament']['owner']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_EVENT'); ?></label></td>
<td><input type='text' id='t_event' value='<?php echo $this->Item['tournament']['event']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SITE'); ?></label></td>
<td><input type='text' id='t_site' value='<?php echo $this->Item['tournament']['site']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ORGANIZER'); ?></label></td>
<td><input type='text' id='t_organizer' value='<?php echo $this->Item['tournament']['organizer']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ROUNDS'); ?></label></td>
<td><input type='text' id='t_rounds' value='<?php echo $this->Item['tournament']['rounds']; ?>' /></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_ELOCAT'); ?></label></td>
<td><select id='t_elocat'>
<option value='0'<?php $this->Item['tournament']['elocat']==0?' selected':'';?>> </option>
<option value='1'<?php $this->Item['tournament']['elocat']==1?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_CLASSICAL'); ?></option>
<option value='2'<?php $this->Item['tournament']['elocat']==2?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_RAPID'); ?></option>
<option value='3'<?php $this->Item['tournament']['elocat']==3?' selected':'';?>><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_BLITZ'); ?></option>
</select></td>
</tr>
<tr>
<td><label><?php echo JText::_('COM_POLARTOUR_TOURNAMENT_SHOWTIEBREAK'); ?></label></td>
<td><input type='checkbox' id='t_showtiebreak' value='<?php echo $this->Item['tournament']['rounds']; ?>' /></td>
</tr>
</table>
</div>
<div id="player" class='hide'>Player <?php echo JPATH_SITE; ?>
</div>
<div id="result" class='hide'>Result
</div>
</form>
<!-- 
  `showtiebreake` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=Only needed, 2=All',
  `showelo` int(11) NOT NULL DEFAULT '0',
  `showclub` int(11) NOT NULL DEFAULT '0',
  `showcolor` int(11) NOT NULL DEFAULT '0',
  `switchname` int(11) NOT NULL DEFAULT '0',
  `tiebreake1` int(11) NOT NULL DEFAULT '0',
  `tiebreake2` int(11) NOT NULL DEFAULT '0',
  `tiebreake3` int(11) NOT NULL DEFAULT '0',
  `tiebreake4` int(11) NOT NULL DEFAULT '0',
  `tiebreake5` int(11) NOT NULL DEFAULT '0',
  `tournamenttype` int(11) NOT NULL DEFAULT '0' COMMENT '0=Unknown, 1=Konrad, 2=Monrad, 3=Swiss, 4=Round Robin. 5=Doble RR',
  `startdate` date NOT NULL DEFAULT '0000-00-00',
  `enddate` date NOT NULL DEFAULT '0000-00-00',
  `pgnfile` varchar(255) NOT NULL,
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment` text NOT NULL,
 -->