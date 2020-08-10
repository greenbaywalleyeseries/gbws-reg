#create schema oconto_tourney;

CREATE TABLE oconto_tourney.conversion LIKE gbws_reg.conversion;
INSERT oconto_tourney.conversion SELECT * FROM gbws_reg.conversion;

CREATE TABLE `tourney_info` (
  `Day1` date NOT NULL,
  `Day2` date DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `option_pot_places` int(11) DEFAULT NULL,
  `big_fish_places` int(11) DEFAULT NULL,
  `comeback_award` varchar(1) DEFAULT NULL COMMENT 'Y only if exists',
  PRIMARY KEY (`Day1`)
  );
  
  INSERT INTO `oconto_tourney`.`tourney_info` (`Day1`, `description`, `option_pot_places`, `big_fish_places`, `comeback_award`) VALUES ('2020-05-17', 'Oconto', '3', '3', 'N');
  
   CREATE TABLE `tourney_teams` (
  `boat_num` int(11) NOT NULL,
  `participant` varchar(255) NULL,
  `team_id` varchar(8) NOT NULL,
  `partner1` varchar(50) NOT NULL,
  `partner2` varchar(50) NOT NULL,
  `big_fish` varchar(1) DEFAULT NULL,
  `option_pot` varchar(1) DEFAULT NULL,
  `NTC_side_pot` varchar(1) DEFAULT NULL,
  `weigh_in` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`boat_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `donkey` (
  `ID` int(11) NOT NULL,
  `Division` varchar(45) DEFAULT NULL,
  `Participant` varchar(255) DEFAULT NULL,
  `Species` varchar(45) DEFAULT NULL,
  `Length` decimal(4,2) DEFAULT NULL,
  `timestamp` date DEFAULT NULL,
  `weight` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `tempsortfish` (
  `participant` varchar(255) NOT NULL,
  `ID` int(3) NOT NULL,
  `length` decimal(4,2) DEFAULT NULL,
  `weight` decimal(4,2) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `temp_places` (
  `boat_num` int(11) NOT NULL,
  `participant` varchar(255) DEFAULT NULL,
  `team_id` varchar(8) DEFAULT NULL,
  `partner1` varchar(50) DEFAULT NULL,
  `partner2` varchar(50) DEFAULT NULL,
  `day_1_fish` int(2) DEFAULT 0,
  `day_1_penalty` int(2) DEFAULT 0,
  `day_1_weight` decimal(5,2) DEFAULT 0.00,
  `day_2_fish` int(2) DEFAULT 0,
  `day_2_penalty` int(2) DEFAULT 0,
  `day_2_weight` decimal(5,2) DEFAULT 0.00,
  `total_weight` decimal(5,2) DEFAULT 0.00,
  PRIMARY KEY (`boat_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `penalties` (
  `boat_num` int(11) NOT NULL,
  `minutes_late` int(3) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_team_penalty` (`boat_num`),
  CONSTRAINT `fk_team_penalty` FOREIGN KEY (`boat_num`) REFERENCES `tourney_teams` (`boat_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `BigFish` (
  `participant` varchar(255) NOT NULL,
  `ID` int(3) NOT NULL,
  `length` decimal(4,2) DEFAULT NULL,
  `weight` decimal(4,2) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;