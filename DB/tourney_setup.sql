CREATE DATABASE  IF NOT EXISTS `gb_tourney`;

CREATE TABLE gb_tourney.conversion LIKE gbws_reg.conversion;
INSERT gb_tourney.conversion
SELECT *
FROM gbws_reg.conversion;

USE `gb_tourney`;

DROP TABLE IF EXISTS `tourney_teams`;
CREATE TABLE `tourney_teams` (
  `boat_num` int(11) NOT NULL,
  `team_id` varchar(8) NOT NULL,
  `partner1` varchar(50) NOT NULL,
  `partner2` varchar(50) NOT NULL,
  `big_fish` varchar(1) DEFAULT NULL,
  `option_pot` varchar(1) DEFAULT NULL,
  `NTC_side_pot` varchar(1) DEFAULT NULL,
  `weigh_in` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`boat_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `reg_fish`;
CREATE TABLE `reg_fish` (
  `boat_num` int(11) NOT NULL,
  `fish_num` int(3) NOT NULL,
  `length` decimal(4,2) NOT NULL,
  `time` datetime DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `weight` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`boat_num`,`fish_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `penalties`;
CREATE TABLE `penalties` (
  `boat_num` int(11) NOT NULL,
  `minutes_late` int(3) NOT NULL,
  `date` date DEFAULT NULL,
  KEY `fk_team_penalty` (`boat_num`),
  CONSTRAINT `fk_team_penalty` FOREIGN KEY (`boat_num`) REFERENCES `tourney_teams` (`boat_num`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `temp_places`;
CREATE TABLE `temp_places` (
  `boat_num` int(11) NOT NULL,
  `team_id` varchar(8) DEFAULT NULL,
  `partner1` varchar(50) DEFAULT NULL,
  `partner2` varchar(50) DEFAULT NULL,
  `day_1_fish` int(2) DEFAULT '0',
  `day_1_penalty` int(2) DEFAULT '0',
  `day_1_weight` decimal(5,2) DEFAULT '0.00',
  `day_2_fish` int(2) DEFAULT '0',
  `day_2_penalty` int(2) DEFAULT '0',
  `day_2_weight` decimal(5,2) DEFAULT '0.00',
  `total_weight` decimal(5,2) DEFAULT '0.00',
  PRIMARY KEY (`boat_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tempsortfish`;

CREATE TABLE `tempsortfish` (
  `boat_num` int(11) NOT NULL,
  `fish_num` int(3) NOT NULL,
  `weight` decimal(4,2) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;
CREATE PROCEDURE `sortmemberfish`()
Begin

Delete from tempsortfish;

CREATE TEMPORARY TABLE IF NOT EXISTS tempMemberFish AS (Select distinct boat_num from tourney_teams );

set @boats =  (Select count(boat_num) from tempMemberFish);

WHILE(@boats > 0) DO

	set @boatvar = (Select boat_num from tempMemberFish limit 1);
    
	Insert into tempsortfish (boat_num, fish_num, weight, time)
    select boat_num, fish_num, weight, time  from reg_fish 
    where boat_num = @boatvar and approved = 1 and time like '2020-04-11%' order by weight desc limit 5;
    
    Insert into tempsortfish (boat_num, fish_num, weight, time)
    select boat_num, fish_num, weight, time  from reg_fish 
    where boat_num = @boatvar and approved = 1 and time like '2020-04-12%' order by weight desc limit 5;
    
    delete from tempMemberFish where boat_num = @boatvar;
    
	set @boats = @boats - 1;
    
END WHILE;

drop table tempMemberFish;

END ;;
DELIMITER ;



DELIMITER ;;
CREATE PROCEDURE `sort_places`()
BEGIN

delete from temp_places;

insert into temp_places (boat_num, team_id, partner1, partner2, day_1_fish, day_1_weight)
select b.boat_num
--			, b.team_id
        	, b.partner1_first
        	, b.partner1_last
        	, b.partner2_first
        	, b.partner2_last
        	, ifnull(count(a.fish_num),0) as day_1_fish
        	, ifnull (sum(a.weight), 0.00) as day_1_weight
         from tourney_teams b
         left join tempsortfish a
        	on a.boat_num=b.boat_num
        where a.time like '2020-04-11%'
        group by b.boat_num ;
        
        
insert into temp_places (boat_num, team_id, partner1, partner2, day_2_fish, day_2_weight)
select b.boat_num
--			, b.team_id
        	, b.partner1_first
        	, b.partner1_last
        	, b.partner2_first
        	, b.partner2_last
        	, ifnull(count(a.fish_num),0) as day_2_fish
        	, ifnull (sum(a.weight), 0.00) as day_2_weight
         from tourney_teams b
         left join tempsortfish a
        	on a.boat_num=b.boat_num
        where a.time like '2020-04-12%'
        group by b.boat_num
        
on duplicate key update
	day_2_fish=values(day_2_fish)
    ,day_2_weight=values(day_2_weight);
    

insert into temp_places (boat_num, team_id, partner1, partner2, day_1_fish, day_1_weight, day_2_fish, day_2_weight)
select a.boat_num, a.team_id, a.partner1, a.partner2, 0 as day_1_fish, 0.00 as day_1_weight, 0 as day_2_fish, 0.00 as day_2_weight from tourney_teams as a
left  join temp_places as b on a.boat_num=b.boat_num
where b.boat_num is null;

insert into temp_places (boat_num, day_1_penalty)
select boat_num, minutes_late as day_1_penalty from penalties where date like '2020-04-11%'
on duplicate key update
	day_1_penalty=values(day_1_penalty);

insert into temp_places (boat_num, day_2_penalty)
select boat_num, minutes_late as day_2_penalty from penalties where date like '2020-04-12%'
on duplicate key update
	day_2_penalty=values(day_2_penalty);

update temp_places set day_1_weight=(case
        		when day_1_penalty >=15 then 0.00
                when day_1_penalty<15 and day_1_weight >0 then day_1_weight-day_1_penalty
                when day_1_penalty is null and day_1_weight>0 then day_1_weight
                when day_1_weight=0.00 then 0.00
                end)
                where day_1_penalty > 0;

update temp_places set day_2_weight=(case
        		when day_2_penalty >=15 then 0.00
                when day_2_penalty<15 and day_2_weight >0 then day_2_weight-day_2_penalty
                when day_2_penalty is null and day_2_weight>.01 then day_2_weight=day_2_weight
                when day_2_weight=0.00 then 0.00
                end)
                where day_2_penalty > 0;

update temp_places set total_weight=(day_1_weight+day_2_weight);

end ;;
DELIMITER ;
