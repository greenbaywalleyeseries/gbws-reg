-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: gbws_reg
-- Source Schemata: gbws_reg
-- Created: Sat Feb 15 19:42:51 2020
-- Workbench Version: 8.0.18
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
-- Table gbws_reg.member_info
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `gbws_reg`.`member_info` (
  `mbr_id` VARCHAR(8) CHARACTER SET 'latin1' NOT NULL,
  `first` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `last` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `address` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `city` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `state` VARCHAR(2) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `zip` CHAR(5) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `phone` CHAR(20) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `email` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `boat` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `motor` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `trolling_motor` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `electronics` VARCHAR(50) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `sub` VARCHAR(1) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `paid` VARCHAR(1) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `SSN` VARCHAR(11) NULL DEFAULT NULL,
  PRIMARY KEY (`mbr_id`),
  UNIQUE INDEX `mbr_id_UNIQUE` (`mbr_id` ASC) VISIBLE)
ENGINE = InnoDB
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
  PRIMARY KEY (`team_id`),
  INDEX `FK_partner1_idx` (`partner1` ASC) VISIBLE,
  INDEX `FK_partner2_idx` (`partner2` ASC) VISIBLE,
  INDEX `FK_sub1_idx` (`sub1` ASC) VISIBLE,
  INDEX `FK_sub2_idx` (`sub2` ASC) VISIBLE)
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
  PRIMARY KEY (`tourney_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
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
  PRIMARY KEY (`id`),
  INDEX `FK_txn_id_idx` (`txn_id` ASC) VISIBLE,
  CONSTRAINT `FK_txn_id`
    FOREIGN KEY (`txn_id`)
    REFERENCES `gbws_reg`.`transactions` (`txn_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 72
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
  PRIMARY KEY (`id`),
  UNIQUE INDEX `txn_id_UNIQUE` (`txn_id` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Routine gbws_reg.get_mbr_id
-- ----------------------------------------------------------------------------
DELIMITER $$

DELIMITER $$
USE `gbws_reg`$$
CREATE  PROCEDURE `get_mbr_id`(OUT ID_num varchar(8))
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
CREATE PROCEDURE `get_team_id`(OUT ID_num varchar(8))
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
