-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: champ_tourney
-- Source Schemata: champ_tourney
-- Created: Mon Jun  8 12:43:28 2020
-- Workbench Version: 8.0.19
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema champ_tourney
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `champ_tourney` ;
CREATE SCHEMA IF NOT EXISTS `champ_tourney` ;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.bigfish
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`bigfish` (
  `participant` VARCHAR(255) NOT NULL,
  `ID` INT(3) NOT NULL,
  `length` DECIMAL(4,2) NULL DEFAULT NULL,
  `weight` DECIMAL(4,2) NULL DEFAULT NULL,
  `time` DATETIME NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.conversion
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`conversion` (
  `length` DECIMAL(4,2) NOT NULL,
  `weight` DECIMAL(4,2) NULL DEFAULT NULL,
  PRIMARY KEY (`length`))
ENGINE = InnoDB
;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.donkey
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`donkey` (
  `ID` INT(11) NOT NULL,
  `Division` VARCHAR(45) NULL DEFAULT NULL,
  `Participant` VARCHAR(255) NULL DEFAULT NULL,
  `Species` VARCHAR(45) NULL DEFAULT NULL,
  `Length` DECIMAL(4,2) NULL DEFAULT NULL,
  `timestamp` DATE NULL DEFAULT NULL,
  `weight` DECIMAL(4,2) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.participant_mapping
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`participant_mapping` (
  `team_id` VARCHAR(8) NOT NULL,
  `participant` VARCHAR(255) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.penalties
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`penalties` (
  `boat_num` INT(11) NOT NULL,
  `minutes_late` INT(3) NOT NULL,
  `date` DATE NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.temp_all_results
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`temp_all_results` (
  `boat_num` INT(11) NOT NULL,
  `participant` VARCHAR(255) NULL DEFAULT NULL,
  `team_id` VARCHAR(8) NULL DEFAULT NULL,
  `partner1` VARCHAR(50) NULL DEFAULT NULL,
  `partner2` VARCHAR(50) NULL DEFAULT NULL,
  `day_1_fish` INT(2) NULL DEFAULT '0',
  `day_1_penalty` INT(2) NULL DEFAULT '0',
  `day_1_weight` DECIMAL(5,2) NULL DEFAULT '0.00',
  `day_2_fish` INT(2) NULL DEFAULT '0',
  `day_2_penalty` INT(2) NULL DEFAULT '0',
  `day_2_weight` DECIMAL(5,2) NULL DEFAULT '0.00',
  `total_weight` DECIMAL(5,2) NULL DEFAULT '0.00',
  `option_pot` INT(11) NULL DEFAULT NULL,
  `big_fish_rank` INT(11) NULL DEFAULT NULL,
  `big_fish_size` DECIMAL(4,2) NULL DEFAULT NULL,
  `rank_change` INT(11) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.temp_big_fish_pot
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`temp_big_fish_pot` (
  `team_id` VARCHAR(8) NOT NULL,
  `participant` VARCHAR(255) NOT NULL,
  `length` DECIMAL(4,2) NULL DEFAULT NULL,
  `weight` DECIMAL(4,2) NULL DEFAULT NULL,
  `rank` INT(11) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.temp_option_pot
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`temp_option_pot` (
  `participant` VARCHAR(255) NULL DEFAULT NULL,
  `total_weight` DECIMAL(5,2) NULL DEFAULT '0.00',
  `rank` INT(11) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.temp_places
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`temp_places` (
  `boat_num` INT(11) NOT NULL,
  `participant` VARCHAR(255) NULL DEFAULT NULL,
  `team_id` VARCHAR(8) NULL DEFAULT NULL,
  `partner1` VARCHAR(50) NULL DEFAULT NULL,
  `partner2` VARCHAR(50) NULL DEFAULT NULL,
  `day_1_fish` INT(2) NULL DEFAULT '0',
  `day_1_penalty` INT(2) NULL DEFAULT '0',
  `day_1_weight` DECIMAL(5,2) NULL DEFAULT '0.00',
  `day_2_fish` INT(2) NULL DEFAULT '0',
  `day_2_penalty` INT(2) NULL DEFAULT '0',
  `day_2_weight` DECIMAL(5,2) NULL DEFAULT '0.00',
  `total_weight` DECIMAL(5,2) NULL DEFAULT '0.00',
  PRIMARY KEY (`boat_num`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.tempsortfish
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`tempsortfish` (
  `participant` VARCHAR(255) NOT NULL,
  `ID` INT(3) NOT NULL,
  `length` DECIMAL(4,2) NULL DEFAULT NULL,
  `weight` DECIMAL(4,2) NULL DEFAULT NULL,
  `time` DATETIME NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.tourney_info
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`tourney_info` (
  `Day1` DATE NOT NULL,
  `Day2` DATE NULL DEFAULT NULL,
  `description` VARCHAR(45) NULL DEFAULT NULL,
  `option_pot_places` INT(11) NULL DEFAULT NULL,
  `big_fish_places` INT(11) NULL DEFAULT NULL,
  `comeback_award` VARCHAR(1) NULL DEFAULT NULL COMMENT 'Y only if exists',
  PRIMARY KEY (`Day1`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table champ_tourney.tourney_teams
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `champ_tourney`.`tourney_teams` (
  `boat_num` INT(11) NOT NULL,
  `participant` VARCHAR(255) NULL DEFAULT NULL,
  `team_id` VARCHAR(8) NOT NULL,
  `partner1` VARCHAR(50) NOT NULL,
  `partner2` VARCHAR(50) NOT NULL,
  `big_fish` VARCHAR(1) NULL DEFAULT NULL,
  `option_pot` VARCHAR(1) NULL DEFAULT NULL,
  `NTC_side_pot` VARCHAR(1) NULL DEFAULT NULL,
  `weigh_in` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`boat_num`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Routine champ_tourney.BigFish
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `champ_tourney`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `BigFish`()
BEGIN

set @Day1 = (select concat((select Day1 from tourney_info), "%"));
set @Day2 = (select concat((select Day2 from tourney_info), "%"));

CREATE TEMPORARY TABLE IF NOT EXISTS tempBoats as (select distinct participant from donkey);

set @boats =  (Select count(participant) from tempBoats);

WHILE(@boats > 0) DO

	set @boatvar = (Select participant from tempBoats limit 1);
    
	Insert into BigFish (participant, ID, length)
    select participant, ID, length from donkey 
    where participant = @boatvar and species = 'Walleye' order by length desc limit 1;
    
/*
    Insert into tempsortfish (boat_num, fish_num, weight, time)
    select boat_num, fish_num, weight, time  from reg_fish 
    where boat_num = @boatvar and approved = 1 and time like @Day2 order by weight desc limit 5;
*/    
    delete from tempBoats where participant = @boatvar;
    
	set @boats = @boats - 1;
    
END WHILE;

drop table tempBoats;

#Update weight in tempsortfish table
update
	BigFish t1,
    conversion t2
set 
	t1.weight = t2.weight
where 
	t1.length = t2.length;

END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine champ_tourney.sortmemberfish
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `champ_tourney`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sortmemberfish`()
Begin

set @Day1 = (select concat((select Day1 from tourney_info), "%"));
set @Day2 = (select concat((select Day2 from tourney_info), "%"));


Delete from tempsortfish;

CREATE TEMPORARY TABLE IF NOT EXISTS tempMemberFish AS (select distinct participant from donkey);

set @boats =  (Select count(participant) from tempMemberFish);

WHILE(@boats > 0) DO

	set @boatvar = (Select participant from tempMemberFish limit 1);
    
	Insert into tempsortfish (participant, ID, length)
    select participant, ID, length from donkey 
    where participant = @boatvar and species = 'Walleye' order by length desc limit 5;
    
/*
    Insert into tempsortfish (boat_num, fish_num, weight, time)
    select boat_num, fish_num, weight, time  from reg_fish 
    where boat_num = @boatvar and approved = 1 and time like @Day2 order by weight desc limit 5;
*/    
    delete from tempMemberFish where participant = @boatvar;
    
	set @boats = @boats - 1;
    
END WHILE;

drop table tempMemberFish;

#Update weight in tempsortfish table
update
	tempsortfish t1,
    conversion t2
set 
	t1.weight = t2.weight
where 
	t1.length = t2.length;

END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine champ_tourney.sort_places
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `champ_tourney`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sort_places`()
BEGIN
set @Day1 = (select concat((select Day1 from tourney_info), "%"));
set @Day2 = (select concat((select Day2 from tourney_info), "%"));

delete from temp_places;

insert into temp_places (boat_num, participant, team_id, partner1, partner2, day_1_fish, day_1_weight)
select b.boat_num
			, a.participant
			, b.team_id
        	, b.partner1
        	, b.partner2
        	, ifnull(count(a.ID),0) as day_1_fish
        	, ifnull (sum(a.weight), 0.00) as day_1_weight
         from tourney_teams b
         left join tempsortfish a
        	on a.participant=b.participant
--        where a.time like @Day1
        group by b.boat_num ;
        
 /*       
insert into temp_places (boat_num, participant, team_id, partner1, partner2, day_2_fish, day_2_weight)
select b.boat_num
			, a.participant
			, b.team_id
        	, b.partner1
        	, b.partner2
        	, ifnull(count(a.ID),0) as day_2_fish
        	, ifnull (sum(a.weight), 0.00) as day_2_weight
         from tourney_teams b
         left join tempsortfish a
        	on a.participant=b.participant
        where a.time like @Day2
        group by b.boat_num
        
on duplicate key update
	day_2_fish=values(day_2_fish)
    ,day_2_weight=values(day_2_weight);

*/
    

insert into temp_places (boat_num, team_id, partner1, partner2, day_1_fish, day_1_weight, day_2_fish, day_2_weight)
select a.boat_num, a.team_id, a.partner1, a.partner2, 0 as day_1_fish, 0.00 as day_1_weight, 0 as day_2_fish, 0.00 as day_2_weight from tourney_teams as a
left  join temp_places as b on a.boat_num=b.boat_num
where b.boat_num is null;

insert into temp_places (boat_num, day_1_penalty)
select boat_num, minutes_late as day_1_penalty from penalties where date like @Day1
on duplicate key update
	day_1_penalty=values(day_1_penalty);

insert into temp_places (boat_num, day_2_penalty)
select boat_num, minutes_late as day_2_penalty from penalties where date like @Day2
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

end$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine champ_tourney.UpdateRankings
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `champ_tourney`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateRankings`()
Begin

#drop temp objects if they exist
drop table if exists temp_option_pot;
drop table if exists temp_all_results;
drop table if exists temp_big_fish_pot;

#Call Routines to sort places
call sortmemberfish();
call sort_places();
call BigFish();

#Initialize and populate all ranking temp table
create table temp_all_results select * from temp_places order by total_weight desc;

#Determine number of places to pay out for option pot
set @option_pot_places = (select option_pot_places from tourney_info);
#set @option_pot_places = 3;
#Create list of option pot winners into temp table
PREPARE option_pot FROM 'create table temp_option_pot select a.participant, a.total_weight from temp_places as a join tourney_teams as b on a.participant=b.participant where b.option_pot=\'X\' order by total_weight desc limit ?';
EXECUTE option_pot USING @option_pot_places;

#Set ranking in option pot temp table
ALTER TABLE `temp_option_pot` ADD COLUMN `rank` INT NULL AFTER `total_weight`;
UPDATE temp_option_pot JOIN (SELECT
    participant,
    RANK() OVER (
        ORDER BY total_weight desc
    ) my_rank
FROM
    temp_option_pot)
AS sorted USING(participant) SET temp_option_pot.rank = sorted.my_rank;

#Determine option pot leaders and update temp all results table
ALTER TABLE `temp_all_results` ADD COLUMN `option_pot` INT NULL AFTER `total_weight`;
UPDATE temp_all_results, temp_option_pot
SET temp_all_results.option_pot = temp_option_pot.rank
WHERE temp_option_pot.participant = temp_all_results.participant;
#Clean-up temp objects
#drop table temp_option_pot;

#############################################Big Fish Winner###############
#Determine number of places to pay out for big fish pot
set @big_fish_places = (select big_fish_places from tourney_info);
#set @big_fish_places = 3;
#Create list of big fish winners into temp table
PREPARE big_fish_pot FROM 'create table temp_big_fish_pot select distinct b.team_id, a.participant, a.length, a.weight from BigFish as a join tourney_teams as b on a.participant=b.participant where b.big_fish=\'X\' order by a.weight desc limit ?';
EXECUTE big_fish_pot USING @big_fish_places;

#Set rankning in temp big fish temp table
ALTER TABLE `temp_big_fish_pot` ADD COLUMN `rank` INT NULL AFTER `weight`;

UPDATE temp_big_fish_pot join (SELECT
    team_id,
    DENSE_RANK() OVER (
        ORDER BY weight desc
    ) my_rank
FROM
    temp_big_fish_pot)
AS sorted USING(team_id) SET temp_big_fish_pot.rank = sorted.my_rank;

#Add fields for Big Fish rank and size
ALTER TABLE `temp_all_results` 
ADD COLUMN `big_fish_rank` INT NULL AFTER `option_pot`,
ADD COLUMN `big_fish_size` DECIMAL(4,2) NULL AFTER `big_fish_rank`;

#Update All Results temp table with big fish info
UPDATE temp_all_results, temp_big_fish_pot
SET temp_all_results.big_fish_rank = temp_big_fish_pot.rank, temp_all_results.big_fish_size=temp_big_fish_pot.weight
WHERE temp_big_fish_pot.participant = temp_all_results.participant;

#Clean-up temp objects
#drop table temp_big_fish_pot;

########################### Come-back team ###########################
#Update All Results temp table with rank change
CREATE TABLE IF NOT EXISTS temp_day_1_rank AS (Select boat_num, team_id, day_1_weight from temp_all_results order by day_1_weight desc);

ALTER TABLE `temp_day_1_rank` ADD COLUMN `day_1_rank` INT NULL AFTER `day_1_weight`;
SET @r=0;
UPDATE temp_day_1_rank JOIN (SELECT @r := @r + 1 AS day_1_rank, team_id FROM temp_day_1_rank ORDER BY day_1_rank DESC)
AS sorted USING(team_id) SET temp_day_1_rank.day_1_rank = sorted.day_1_rank;

CREATE TABLE IF NOT EXISTS temp_day_2_rank AS (Select boat_num, team_id, total_weight from temp_all_results order by total_weight desc);

ALTER TABLE `temp_day_2_rank` ADD COLUMN `day_2_rank` INT NULL AFTER `total_weight`;
SET @r=0;
UPDATE temp_day_2_rank JOIN (SELECT @r := @r + 1 AS day_2_rank, team_id FROM temp_day_2_rank ORDER BY day_2_rank DESC)
AS sorted USING(team_id) SET temp_day_2_rank.day_2_rank = sorted.day_2_rank;

ALTER TABLE `temp_day_1_rank` ADD COLUMN `day_2_rank` INT NULL AFTER `day_1_rank`;
UPDATE temp_day_1_rank, temp_day_2_rank
set temp_day_1_rank.day_2_rank = temp_day_2_rank.day_2_rank
where temp_day_1_rank.team_id=temp_day_2_rank.team_id;

ALTER TABLE `temp_day_1_rank` ADD COLUMN `rank_change` INT GENERATED ALWAYS AS (day_1_rank-day_2_rank) AFTER `day_2_rank`; 

#Update temp_all_results table with rank change info
ALTER TABLE temp_all_results ADD COLUMN `rank_change` INT after `big_fish_size`;
UPDATE temp_all_results, temp_day_1_rank
set temp_all_results.rank_change=temp_day_1_rank.rank_change
where temp_all_results.team_id=temp_day_1_rank.team_id;

#Clean-up temp objects
drop table temp_day_1_rank;
drop table temp_day_2_rank;

END$$

DELIMITER ;

insert into champ_tourney.tourney_info (select start_date as Day1, second_date as Day2, location as description, 3 as option_pot_places, 3 as big_fish_places, 'N' as comeback_awark from gbws_reg.tourneyinfo where local='SB');

insert into champ_tourney.conversion (select * from gbws_reg.conversion);

SET FOREIGN_KEY_CHECKS = 1;
