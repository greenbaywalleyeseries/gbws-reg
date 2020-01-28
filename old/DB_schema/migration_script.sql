-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: gbws_reg
-- Source Schemata: gbws_reg
-- Created: Sun Nov 10 19:30:41 2019
-- Workbench Version: 6.3.10
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema gbws_reg
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `gbws_reg` ;
CREATE SCHEMA IF NOT EXISTS `gbws_reg` ;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.log
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`log` (
  `message` LONGTEXT NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.points
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`points` (
  `team_id` VARCHAR(8) NOT NULL,
  `fox_river` INT(3) NULL DEFAULT NULL,
  `marinette` INT(3) NULL DEFAULT NULL,
  `oconto` INT(3) NULL DEFAULT NULL,
  `sturgeon_bay` INT(3) NULL DEFAULT NULL,
  PRIMARY KEY (`team_id`),
  INDEX `fk_teamid` (`team_id` ASC),
  CONSTRAINT `fk_teamid`
    FOREIGN KEY (`team_id`)
    REFERENCES `gbws_reg`.`teaminfo` (`team_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.teaminfo
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`teaminfo` (
  `team_id` VARCHAR(8) NOT NULL,
  `partner1_first` VARCHAR(50) NULL DEFAULT NULL,
  `partner1_last` VARCHAR(50) NULL DEFAULT NULL,
  `partner1_address` VARCHAR(50) NULL DEFAULT NULL,
  `partner1_city` VARCHAR(50) NULL DEFAULT NULL,
  `partner1_state` VARCHAR(2) NULL DEFAULT NULL,
  `partner1_zip` CHAR(5) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `partner1_phone` CHAR(20) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `partner1_email` VARCHAR(50) NULL DEFAULT NULL,
  `partner2_first` VARCHAR(50) NULL DEFAULT NULL,
  `partner2_last` VARCHAR(50) NULL DEFAULT NULL,
  `partner2_address` VARCHAR(50) NULL DEFAULT NULL,
  `partner2_city` VARCHAR(50) NULL DEFAULT NULL,
  `partner2_state` VARCHAR(2) NULL DEFAULT NULL,
  `partner2_zip` CHAR(5) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `partner2_phone` CHAR(20) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `partner2_email` VARCHAR(50) NULL DEFAULT NULL,
  `boat` VARCHAR(50) NULL DEFAULT NULL,
  `motor` VARCHAR(50) NULL DEFAULT NULL,
  `trolling_motor` VARCHAR(50) NULL DEFAULT NULL,
  `electronics` VARCHAR(50) NULL DEFAULT NULL,
  `paid` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`team_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.teamsubs
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`teamsubs` (
  `sub_id` INT(11) NOT NULL AUTO_INCREMENT,
  `team_id` VARCHAR(8) NOT NULL,
  `sub_first` VARCHAR(50) NOT NULL,
  `sub_last` VARCHAR(50) NOT NULL,
  `sub_address` VARCHAR(50) NULL DEFAULT NULL,
  `sub_city` VARCHAR(50) NULL DEFAULT NULL,
  `sub_state` VARCHAR(2) NULL DEFAULT NULL,
  `sub_zip` CHAR(5) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `sub_phone` CHAR(20) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `sub_email` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`sub_id`),
  INDEX `fk_team` (`team_id` ASC),
  CONSTRAINT `fk_team`
    FOREIGN KEY (`team_id`)
    REFERENCES `gbws_reg`.`teaminfo` (`team_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.tourney_reg
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`tourney_reg` (
  `reg_id` INT(11) NOT NULL AUTO_INCREMENT,
  `team_id` VARCHAR(8) NOT NULL,
  `tourney_id` INT(11) NOT NULL,
  `reg_date` DATETIME NULL DEFAULT NULL,
  `partner1_first` VARCHAR(50) NOT NULL,
  `partner1_last` VARCHAR(50) NOT NULL,
  `partner2_first` VARCHAR(50) NOT NULL,
  `partner2_last` VARCHAR(50) NOT NULL,
  `option_pot` VARCHAR(1) NULL DEFAULT NULL,
  `big_fish` VARCHAR(1) NULL DEFAULT NULL,
  `boat_num` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`reg_id`),
  INDEX `fk_team_id` (`team_id` ASC),
  INDEX `fk_tourney_id` (`tourney_id` ASC),
  CONSTRAINT `fk_team_id`
    FOREIGN KEY (`team_id`)
    REFERENCES `gbws_reg`.`teaminfo` (`team_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_tourney_id`
    FOREIGN KEY (`tourney_id`)
    REFERENCES `gbws_reg`.`tourneyinfo` (`tourney_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 120
DEFAULT CHARACTER SET = latin1;

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
  PRIMARY KEY (`tourney_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.transaction_items
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`transaction_items` (
  `txn_id` VARCHAR(20) NOT NULL,
  `item_number` VARCHAR(127) NULL DEFAULT NULL,
  `item_name` VARCHAR(127) NULL DEFAULT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  `mc_gross` DECIMAL(6,2) NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table gbws_reg.transactions
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`transactions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `txn_id` VARCHAR(255) NOT NULL,
  `payment_status` VARCHAR(255) NULL DEFAULT NULL,
  `team_id` VARCHAR(8) NULL DEFAULT NULL,
  `payer_email` VARCHAR(255) NULL DEFAULT NULL,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `address_name` VARCHAR(255) NULL DEFAULT NULL,
  `address_street` VARCHAR(255) NULL DEFAULT NULL,
  `address_city` VARCHAR(255) NULL DEFAULT NULL,
  `address_state` VARCHAR(255) NULL DEFAULT NULL,
  `address_zip` VARCHAR(255) NULL DEFAULT NULL,
  `address_country` VARCHAR(255) NULL DEFAULT NULL,
  `address_country_code` VARCHAR(45) NULL DEFAULT NULL,
  `address_status` VARCHAR(255) NULL DEFAULT NULL,
  `residence_country` VARCHAR(45) NULL DEFAULT NULL,
  `payment_date` VARCHAR(255) NULL DEFAULT NULL,
  `num_cart_items` INT(11) NULL DEFAULT NULL,
  `mc_gross` DECIMAL(6,2) NULL DEFAULT NULL,
  `mc_fee` VARCHAR(255) NULL DEFAULT NULL,
  `mc_currency` VARCHAR(255) NULL DEFAULT NULL,
  `payment_fee` DECIMAL(4,2) NULL DEFAULT NULL,
  `payer_id` VARCHAR(255) NULL DEFAULT NULL,
  `payer_status` VARCHAR(255) NULL DEFAULT NULL,
  `ipn_track_id` VARCHAR(45) NULL DEFAULT NULL,
  `payment_gross` DECIMAL(4,2) NULL DEFAULT NULL,
  `verify_sign` VARCHAR(255) NULL DEFAULT NULL,
  `txn_type` VARCHAR(255) NULL DEFAULT NULL,
  `payment_type` VARCHAR(255) NULL DEFAULT NULL,
  `receiver_email` VARCHAR(255) NULL DEFAULT NULL,
  `protection_eligibility` VARCHAR(45) NULL DEFAULT NULL,
  `notify_version` VARCHAR(255) NULL DEFAULT NULL,
  `receiver_id` VARCHAR(45) NULL DEFAULT NULL,
  `transaction_subject` VARCHAR(255) NULL DEFAULT NULL,
  `charset` VARCHAR(45) NULL DEFAULT NULL,
  `shipping_method` VARCHAR(45) NULL DEFAULT NULL,
  `shipping_discount` DECIMAL(4,2) NULL DEFAULT NULL,
  `insurance_amount` DECIMAL(4,2) NULL DEFAULT NULL,
  `discount` DECIMAL(4,2) NULL DEFAULT NULL,
  `test_ipn` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `txn_id_UNIQUE` (`txn_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.get_team_id
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`yami`@`%` PROCEDURE `get_team_id`(OUT ID_num varchar(8))
begin

DECLARE ID VARCHAR(8) DEFAULT "";

set @curr_year=(select (year(curdate())));
-- set @curr_year=(select concat(@curr_year, '%'));
-- set @curr_year=(select quote(@curr_year));

set @curr_num=(select CONVERT(SUBSTRING_INDEX(team_id,'-',-1),UNSIGNED INTEGER) from teaminfo order by CONVERT(SUBSTRING_INDEX(team_id,'-',-1),UNSIGNED INTEGER) desc limit 1);
if (@curr_num IS NULL) then set @curr_num=0;
END IF;
set @new_num=@curr_num+1;

set ID=concat(@curr_year, '-', @new_num);

select ID into ID_num;

end$$

DELIMITER ;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.setBoatNum
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE DEFINER=`yami`@`%` PROCEDURE `setBoatNum`(IN tourney int)
BEGIN
set @x=0;
UPDATE tourney_reg SET boat_num = (@x:=@x+1) where tourney_id=tourney ORDER BY reg_date;

END$$

DELIMITER ;
SET FOREIGN_KEY_CHECKS = 1;
