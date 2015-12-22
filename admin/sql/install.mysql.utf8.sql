DROP TABLE IF EXISTS `#__polartour_tournament`;
DROP TABLE IF EXISTS `#__polartour_player`;
DROP TABLE IF EXISTS `#__polartour_result`;

CREATE TABLE `#__polartour_tournament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trash` int(11) NOT NULL DEFAULT '0',
  `event` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `arbiter` varchar(255) NOT NULL,
  `owner` int(11) NOT NULL COMMENT 'Userid in Joomla',
  `rounds` int(11) NOT NULL,
  `elocat` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=classical, 2=rapid, 3=blitz',
  `showtiebreak` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=Only needed, 2=All',
  `showelo` int(11) NOT NULL DEFAULT '0',
  `showclub` int(11) NOT NULL DEFAULT '0',
  `showcolor` int(11) NOT NULL DEFAULT '0',
  `switchname` int(11) NOT NULL DEFAULT '0',
  `tiebreak1` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=Average Rating, 2= Average rating cut, 3=Buchholz, 4=Median Buchholz, 5=Median Buchholz 2, 6=Buchholz cut 1, 7=Bucholz cut 2, 8=Direct encounter, 9=Sonneborn-Berger',
  `tiebreak2` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=Average Rating, 2= Average rating cut, 3=Buchholz, 4=Median Buchholz, 5=Median Buchholz 2, 6=Buchholz cut 1, 7=Bucholz cut 2, 8=Direct encounter, 9=Sonneborn-Berger',
  `tiebreak3` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=Average Rating, 2= Average rating cut, 3=Buchholz, 4=Median Buchholz, 5=Median Buchholz 2, 6=Buchholz cut 1, 7=Bucholz cut 2, 8=Direct encounter, 9=Sonneborn-Berger',
  `tiebreak4` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=Average Rating, 2= Average rating cut, 3=Buchholz, 4=Median Buchholz, 5=Median Buchholz 2, 6=Buchholz cut 1, 7=Bucholz cut 2, 8=Direct encounter, 9=Sonneborn-Berger',
  `tiebreak5` int(11) NOT NULL DEFAULT '0' COMMENT '0=none, 1=Average Rating, 2= Average rating cut, 3=Buchholz, 4=Median Buchholz, 5=Median Buchholz 2, 6=Buchholz cut 1, 7=Bucholz cut 2, 8=Direct encounter, 9=Sonneborn-Berger',
  `tournamenttype` int(11) NOT NULL DEFAULT '0' COMMENT '0=Unknown, 1=Konrad, 2=Monrad, 3=Swiss, 4=Round Robin. 5=Doble RR, 6=Trippel RR, 7=Quadro RR',
  `startdate` date NOT NULL DEFAULT '0000-00-00',
  `enddate` date NOT NULL DEFAULT '0000-00-00',
  `pgnfile` varchar(255) NOT NULL,
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `event` (`event`),
  KEY `startdate` (`startdate`),  
  KEY `enddate` (`enddate`)  
  KEY `updated` (`updated`)  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `#__polartour_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tournamentid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `club` varchar(255) NOT NULL,
  `elo` int(11) NOT NULL DEFAULT '0',
  `startnr` int(11) NOT NULL DEFAULT '0',
  `born` date NOT NULL DEFAULT '1900-01-01',
  PRIMARY KEY (`id`),
  KEY `tournamentid` (`tournamentid`),
  KEY `lastname` (`lastname`(255)),
  KEY `firstname` (`firstname`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `#__polartour_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tournamentid` int(11) NOT NULL DEFAULT '0',
  `whiteid` int(11) NOT NULL DEFAULT '0',
  `blackid` int(11) NOT NULL DEFAULT '0',
  `round` int(11) NOT NULL DEFAULT '0',
  `result` int(11) NOT NULL DEFAULT '0' COMMENT '0=ongoing, 1=draw, 2=white win, 3=blackwin, 4=unplayed draw, 5=unplayed white win, 6=unplayed black win, -1 Use white/blackscore',
  `game` int(11) NOT NULL DEFAULT '0' COMMENT 'Gamenumber in pgnfile',
  PRIMARY KEY (`id`),
  KEY `tournamentid` (`tournamentid`),
  KEY `round` (`round`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
