CREATE TABLE `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` varchar(8) COLLATE latin1_bin NOT NULL,
  `tourney` varchar(3) COLLATE latin1_bin NOT NULL,
  `points` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
