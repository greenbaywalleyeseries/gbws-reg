-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: gbws_reg
-- Source Schemata: gbws_reg
-- Created: Mon Sep 12 12:05:49 2022
-- Workbench Version: 8.0.19
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema gbws_reg
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `gbws_reg` ;
CREATE SCHEMA IF NOT EXISTS `gbws_reg` ;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.archive_unpaid_members
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`archive_unpaid_members` (
  `mbr_id` VARCHAR(8) CHARACTER SET 'latin1' NOT NULL,
  `first` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `last` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `address` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `city` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `state` VARCHAR(2) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `zip` CHAR(5) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `phone` CHAR(20) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `email` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `paid` VARCHAR(1) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `EUA` VARCHAR(1) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `SSN` VARCHAR(11) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `waiver1` VARCHAR(3) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `waiver2` VARCHAR(3) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `waiver3` VARCHAR(3) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.archive_unpaid_teams
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`archive_unpaid_teams` (
  `team_id` VARCHAR(8) CHARACTER SET 'latin1' NOT NULL,
  `partner1` VARCHAR(8) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `partner2` VARCHAR(8) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `sub1` VARCHAR(8) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `sub2` VARCHAR(8) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `paid` VARCHAR(1) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `refund` VARCHAR(1) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `boat` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `motor` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `trolling_motor` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `electronics` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.log
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`log` (
  `message` LONGTEXT NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.member_info
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`member_info` (
  `mbr_id` VARCHAR(8) NOT NULL,
  `first` VARCHAR(50) NULL DEFAULT NULL,
  `last` VARCHAR(50) NULL DEFAULT NULL,
  `address` VARCHAR(50) NULL DEFAULT NULL,
  `city` VARCHAR(50) NULL DEFAULT NULL,
  `state` VARCHAR(2) NULL DEFAULT NULL,
  `zip` CHAR(5) NULL DEFAULT NULL,
  `phone` CHAR(20) NULL DEFAULT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `paid` VARCHAR(1) NULL DEFAULT NULL,
  `EUA` VARCHAR(1) NULL DEFAULT NULL,
  `SSN` VARCHAR(11) NULL DEFAULT NULL,
  `waiver1` VARCHAR(3) NULL DEFAULT NULL,
  `waiver2` VARCHAR(3) NULL DEFAULT NULL,
  `waiver3` VARCHAR(3) NULL DEFAULT NULL,
  `date` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`mbr_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.points
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`points` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `team_id` VARCHAR(8) NOT NULL,
  `tourney` VARCHAR(3) NOT NULL,
  `points` INT(11) NULL DEFAULT NULL,
  `weight` DECIMAL(5,2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 600
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.team_info
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`team_info` (
  `team_id` VARCHAR(8) NOT NULL,
  `partner1` VARCHAR(8) NULL DEFAULT NULL,
  `partner2` VARCHAR(8) NULL DEFAULT NULL,
  `sub1` VARCHAR(8) NULL DEFAULT NULL,
  `sub2` VARCHAR(8) NULL DEFAULT NULL,
  `paid` VARCHAR(1) NULL DEFAULT NULL,
  `refund` VARCHAR(1) NULL DEFAULT NULL,
  `boat` VARCHAR(45) NULL DEFAULT NULL,
  `motor` VARCHAR(45) NULL DEFAULT NULL,
  `trolling_motor` VARCHAR(45) NULL DEFAULT NULL,
  `electronics` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`team_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.tourneyinfo
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`tourneyinfo` (
  `tourney_id` INT(11) NOT NULL AUTO_INCREMENT,
  `location` VARCHAR(20) NOT NULL,
  `start_date` DATE NOT NULL,
  `second_date` DATE NULL DEFAULT NULL,
  `third_date` DATE NULL DEFAULT NULL,
  `entry_fee` DECIMAL(6,2) NULL DEFAULT NULL,
  `option_fee` DECIMAL(6,2) NULL DEFAULT NULL,
  `big_fish_fee` DECIMAL(6,2) NULL DEFAULT NULL,
  `local` VARCHAR(20) NULL DEFAULT NULL,
  `reg_deadline` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`tourney_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.transaction_items
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`transaction_items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `txn_id` VARCHAR(255) NOT NULL,
  `item_number` VARCHAR(127) NULL DEFAULT NULL,
  `item_name` VARCHAR(127) NULL DEFAULT NULL,
  `partner1` VARCHAR(200) NULL DEFAULT NULL,
  `partner2` VARCHAR(200) NULL DEFAULT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  `mc_gross` DECIMAL(6,2) NULL DEFAULT NULL,
  `team_id` VARCHAR(8) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1169
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.transactions
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`transactions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `txn_id` VARCHAR(255) NOT NULL,
  `payer_id` VARCHAR(13) NULL DEFAULT NULL,
  `payer_status` VARCHAR(10) NULL DEFAULT NULL,
  `custom` VARCHAR(255) NULL DEFAULT NULL,
  `payment_status` VARCHAR(255) NULL DEFAULT NULL,
  `payer_email` VARCHAR(127) NULL DEFAULT NULL,
  `first_name` VARCHAR(64) NULL DEFAULT NULL,
  `last_name` VARCHAR(64) NULL DEFAULT NULL,
  `address_name` VARCHAR(128) NULL DEFAULT NULL,
  `address_street` VARCHAR(200) NULL DEFAULT NULL,
  `address_city` VARCHAR(40) NULL DEFAULT NULL,
  `address_state` VARCHAR(40) NULL DEFAULT NULL,
  `address_zip` VARCHAR(20) NULL DEFAULT NULL,
  `address_country` VARCHAR(64) NULL DEFAULT NULL,
  `address_country_code` VARCHAR(2) NULL DEFAULT NULL,
  `address_status` VARCHAR(40) NULL DEFAULT NULL,
  `contact_phone` VARCHAR(20) NULL DEFAULT NULL,
  `residence_country` VARCHAR(2) NULL DEFAULT NULL,
  `payment_date` VARCHAR(28) NULL DEFAULT NULL,
  `num_cart_items` INT(11) NULL DEFAULT NULL,
  `mc_gross` DECIMAL(6,2) NULL DEFAULT NULL,
  `mc_fee` VARCHAR(255) NULL DEFAULT NULL,
  `mc_currency` VARCHAR(255) NULL DEFAULT NULL,
  `ipn_track_id` VARCHAR(45) NULL DEFAULT NULL,
  `verify_sign` VARCHAR(255) NULL DEFAULT NULL,
  `txn_type` VARCHAR(10) NULL DEFAULT NULL,
  `payment_type` VARCHAR(10) NULL DEFAULT NULL,
  `receiver_email` VARCHAR(127) NULL DEFAULT NULL,
  `receiver_id` VARCHAR(13) NULL DEFAULT NULL,
  `notify_version` VARCHAR(255) NULL DEFAULT NULL,
  `transaction_subject` VARCHAR(255) NULL DEFAULT NULL,
  `charset` VARCHAR(45) NULL DEFAULT NULL,
  `discount` DECIMAL(4,2) NULL DEFAULT NULL,
  `test_ipn` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 170
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.get_mbr_id
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`gbws_admin`@`%` PROCEDURE `get_mbr_id`(OUT ID_num varchar(8))
begin

DECLARE ID VARCHAR(8) DEFAULT "";

set @curr_year=(select (year(curdate())));
-- set @curr_year=(select concat(@curr_year, '%'));
-- set @curr_year=(select quote(@curr_year));

set @curr_num=(select CONVERT(SUBSTRING_INDEX(mbr_id,'-',-1),UNSIGNED INTEGER) from member_info order by CONVERT(SUBSTRING_INDEX(mbr_id,'-',-1),UNSIGNED INTEGER) desc limit 1);
if (@curr_num IS NULL) then set @curr_num=0;
END IF;
set @new_num=@curr_num+1;

set ID=concat(@curr_year, '-', @new_num);

select ID into ID_num;

end$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.get_team_id
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`gbws_admin`@`%` PROCEDURE `get_team_id`(OUT ID_num varchar(8))
begin

DECLARE ID VARCHAR(8) DEFAULT "";

set @curr_year=(select (year(curdate())));
-- set @curr_year=(select concat(@curr_year, '%'));
-- set @curr_year=(select quote(@curr_year));

set @curr_num=(select CONVERT(SUBSTRING_INDEX(team_id,'_',-1),UNSIGNED INTEGER) from team_info order by CONVERT(SUBSTRING_INDEX(team_id,'_',-1),UNSIGNED INTEGER) desc limit 1);
if (@curr_num IS NULL) then set @curr_num=0;
END IF;
set @new_num=@curr_num+1;

set ID=concat(@curr_year, '_', @new_num);

select ID into ID_num;

end$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.ListTourneyRoster
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`gbws_admin`@`%` PROCEDURE `ListTourneyRoster`(
	IN local varchar(3)
)
BEGIN

DROP TEMPORARY TABLE IF EXISTS tourney_boats;
DROP TEMPORARY TABLE IF EXISTS tourney_option;
DROP TEMPORARY TABLE IF EXISTS tourney_fish;

SET @tourney := concat(local, "-Tourney");
SET @option := concat(local, "-Option");
SET @fish := concat(local, "-Fish");

create temporary table tourney_boats
select 
	a.id, 
    a.team_id, 
    concat(b.first, " ", b.last) as partner1,
    concat(c.first, " ", c.last) as partner2, 
    a.item_number
from 
	gbws_reg.transaction_items a
    inner join gbws_reg.member_info b on ( a.partner1=b.mbr_id)
    inner join gbws_reg.member_info c on (a.partner2=c.mbr_id)
where 
	a.item_number=@tourney;
    
create temporary table tourney_option
select 
	* 
from 
    transaction_items 
where 
	item_number=@option;
    
create temporary table tourney_fish
select 
	* 
from 
    transaction_items 
where 
	item_number=@fish;
    
SELECT 
	a.id,
    a.team_id,
    a.partner1,
    a.partner2,
    CONCAT(a.partner1, " & ",a.partner2) as Team,
    IF(b.item_number IS NOT NULL,'X', NULL) AS option_pot,
	IF(c.item_number IS NOT NULL,'X', NULL) AS big_fish
FROM
	tourney_boats a
LEFT JOIN tourney_option b ON a.team_id=b.team_id
LEFT JOIN tourney_fish c ON a.team_id=c.team_id
ORDER BY
	a.id asc;
    
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.ListTOYPoints
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`gbws_admin`@`%` PROCEDURE `ListTOYPoints`(

)
BEGIN

DROP TEMPORARY TABLE IF EXISTS tourney_teams;
DROP TEMPORARY TABLE IF EXISTS tourney_1;
DROP TEMPORARY TABLE IF EXISTS tourney_2;
DROP TEMPORARY TABLE IF EXISTS tourney_3;
DROP TEMPORARY TABLE IF EXISTS tourney_4;
DROP TEMPORARY TABLE IF EXISTS tourney_5;

create temporary table tourney_teams
select 
    a.team_id, 
    concat(b.first, " ", b.last) as partner1,
    concat(c.first, " ", c.last) as partner2
from 
	gbws_reg.team_info a
    inner join gbws_reg.member_info b on ( a.partner1=b.mbr_id)
    inner join gbws_reg.member_info c on (a.partner2=c.mbr_id);

    
create temporary table tourney_1
select 
	* 
from 
    points
where 
	tourney='T1';
    
create temporary table tourney_2
select 
	* 
from 
    points
where 
	tourney='T2';
    
create temporary table tourney_3
select 
	* 
from 
    points
where 
	tourney='T3';
    
    
create temporary table tourney_4
select 
	* 
from 
    points
where 
	tourney='T4';

create temporary table tourney_5
select 
	* 
from 
    points
where 
	tourney='CH';
    
SELECT 
    a.team_id,
    concat(a.partner1, " & ", a.partner2) as Team,
    If(ISNULL(b.points)=1, 0, b.points) as tourney1,
	If(ISNULL(c.points)=1, 0, c.points) as tourney2,
    If(ISNULL(d.points)=1, 0, d.points) as tourney3,
	If(ISNULL(e.points)=1, 0, e.points) as tourney4,
	If(ISNULL(f.points)=1, 0, f.points) as tourney5,
    (If(ISNULL(b.points)=1, 0, b.points) + If(ISNULL(c.points)=1, 0, c.points) + If(ISNULL(d.points)=1, 0, d.points) + If(ISNULL(e.points)=1, 0, e.points) + If(ISNULL(f.points)=1, 0, f.points)) as Total_Points,
    (If(ISNULL(b.weight)=1, 0, b.weight) + If(ISNULL(c.weight)=1, 0, c.weight) + If(ISNULL(d.weight)=1, 0, d.weight) + If(ISNULL(e.weight)=1, 0, e.weight) + If(ISNULL(f.weight)=1, 0, f.weight)) as Total_Weight
FROM
	tourney_teams a
LEFT JOIN tourney_1 b ON a.team_id=b.team_id
LEFT JOIN tourney_2 c ON a.team_id=c.team_id
LEFT JOIN tourney_3 d ON a.team_id=d.team_id
LEFT JOIN tourney_4 e ON a.team_id=e.team_id
LEFT JOIN tourney_5 f ON a.team_id=f.team_id
ORDER BY
	Total_points desc,
    Total_weight desc;
    
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.ListTOYTie
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`gbws_admin`@`%` PROCEDURE `ListTOYTie`(

)
BEGIN

DROP TEMPORARY TABLE IF EXISTS tourney_teams;
DROP TEMPORARY TABLE IF EXISTS tourney_1;
DROP TEMPORARY TABLE IF EXISTS tourney_2;
DROP TEMPORARY TABLE IF EXISTS tourney_3;
DROP TEMPORARY TABLE IF EXISTS tourney_4;
DROP TEMPORARY TABLE IF EXISTS tourney_5;

create temporary table tourney_teams
select 
    a.team_id, 
    concat(b.first, " ", b.last) as partner1,
    concat(c.first, " ", c.last) as partner2
from 
	gbws_reg.team_info a
    inner join gbws_reg.member_info b on ( a.partner1=b.mbr_id)
    inner join gbws_reg.member_info c on (a.partner2=c.mbr_id);

    
create temporary table tourney_1
select 
	* 
from 
    points
where 
	tourney='T1';
    
create temporary table tourney_2
select 
	* 
from 
    points
where 
	tourney='T2';
    
SELECT 
    a.team_id,
    concat(a.partner1, " & ", a.partner2) as Team,
    If(ISNULL(b.points)=1, 0, b.points) as tourney1,
	If(ISNULL(c.points)=1, 0, c.points) as tourney2,
    (If(ISNULL(b.points)=1, 0, b.points) + If(ISNULL(c.points)=1, 0, c.points)) as Total,
    If(ISNULL(b.weight)=1, 0, b.weight) as tourney1_weight,   
	If(ISNULL(c.weight)=1, 0, c.weight) as tourney2_weight,
    (If(ISNULL(b.weight)=1, 0, b.weight) + If(ISNULL(c.weight)=1, 0, c.weight)) as Cumulative_Weight
FROM
	tourney_teams a
LEFT JOIN tourney_1 b ON a.team_id=b.team_id
LEFT JOIN tourney_2 c ON a.team_id=c.team_id
ORDER BY
	Total desc,
    Cumulative_Weight desc;
    
END$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.setBoatNum
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`gbws_admin`@`%` PROCEDURE `setBoatNum`(IN tourney int)
BEGIN
set @x=0;
UPDATE tourney_reg SET boat_num = (@x:=@x+1) where tourney_id=tourney ORDER BY reg_date;

END$$

DELIMITER ;
SET FOREIGN_KEY_CHECKS = 1;
