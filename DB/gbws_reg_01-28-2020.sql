USE gbws_reg;

-- MariaDB dump 10.17  Distrib 10.4.8-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: gbws_reg
-- ------------------------------------------------------
-- Server version	10.4.8-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `member_info`
--

DROP TABLE IF EXISTS `member_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_info` (
  `mbr_id` varchar(8) CHARACTER SET latin1 NOT NULL,
  `first` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `last` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `state` varchar(2) CHARACTER SET latin1 DEFAULT NULL,
  `zip` char(5) CHARACTER SET utf8 DEFAULT NULL,
  `phone` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `boat` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `motor` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `trolling_motor` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `electronics` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sub` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `paid` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`mbr_id`),
  UNIQUE KEY `mbr_id_UNIQUE` (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_info`
--

LOCK TABLES `member_info` WRITE;
/*!40000 ALTER TABLE `member_info` DISABLE KEYS */;
INSERT INTO `member_info` VALUES ('2020-1','Michael','Yamaguchi','1322 Highlandview Drive','West Bend','WI','53095','2623399506','mguchi@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL),('2020-2','Marc','Brook','W6420 Everglade Road','Greenville','WI','54942','4147792407','',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `member_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_info`
--

DROP TABLE IF EXISTS `team_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_info` (
  `team_id` varchar(8) COLLATE latin1_bin NOT NULL,
  `partner1` varchar(8) COLLATE latin1_bin DEFAULT NULL,
  `partner2` varchar(8) COLLATE latin1_bin DEFAULT NULL,
  `sub1` varchar(8) COLLATE latin1_bin DEFAULT NULL,
  `sub2` varchar(8) COLLATE latin1_bin DEFAULT NULL,
  `paid` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`team_id`),
  KEY `FK_partner1_idx` (`partner1`),
  KEY `FK_partner2_idx` (`partner2`),
  KEY `FK_sub1_idx` (`sub1`),
  KEY `FK_sub2_idx` (`sub2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_info`
--

LOCK TABLES `team_info` WRITE;
/*!40000 ALTER TABLE `team_info` DISABLE KEYS */;
INSERT INTO `team_info` VALUES ('2020-59','2020-1','2020-2','','',NULL);
/*!40000 ALTER TABLE `team_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tourneyinfo`
--

DROP TABLE IF EXISTS `tourneyinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tourneyinfo` (
  `tourney_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `second_date` date DEFAULT NULL,
  `third_date` date DEFAULT NULL,
  `entry_fee` decimal(6,2) DEFAULT NULL,
  `option_fee` decimal(6,2) DEFAULT NULL,
  `big_fish_fee` decimal(6,2) DEFAULT NULL,
  `local` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`tourney_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tourneyinfo`
--

LOCK TABLES `tourneyinfo` WRITE;
/*!40000 ALTER TABLE `tourneyinfo` DISABLE KEYS */;
INSERT INTO `tourneyinfo` VALUES (1,'Green Bay Metro','2020-04-12',NULL,NULL,410.00,200.00,20.00,'GB'),(2,'Dyckesville','2020-05-17',NULL,NULL,410.00,200.00,20.00,'DY'),(3,'Sturgeon Bay','2020-08-02',NULL,NULL,410.00,200.00,20.00,'SB'),(4,'Marinette','2020-08-29','2020-08-30',NULL,510.00,200.00,40.00,'MAR');
/*!40000 ALTER TABLE `tourneyinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_items`
--

DROP TABLE IF EXISTS `transaction_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(255) NOT NULL,
  `item_number` varchar(127) DEFAULT NULL,
  `item_name` varchar(127) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `mc_gross` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_txn_id_idx` (`txn_id`),
  CONSTRAINT `FK_txn_id` FOREIGN KEY (`txn_id`) REFERENCES `transactions` (`txn_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_items`
--

LOCK TABLES `transaction_items` WRITE;
/*!40000 ALTER TABLE `transaction_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(255) NOT NULL,
  `payer_id` varchar(13) DEFAULT NULL,
  `payer_status` varchar(10) DEFAULT NULL,
  `custom` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `payer_email` varchar(127) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `address_name` varchar(128) DEFAULT NULL,
  `address_street` varchar(200) DEFAULT NULL,
  `address_city` varchar(40) DEFAULT NULL,
  `address_state` varchar(40) DEFAULT NULL,
  `address_zip` varchar(20) DEFAULT NULL,
  `address_country` varchar(64) DEFAULT NULL,
  `address_country_code` varchar(2) DEFAULT NULL,
  `address_status` varchar(40) DEFAULT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `residence_country` varchar(2) DEFAULT NULL,
  `payment_date` varchar(28) DEFAULT NULL,
  `num_cart_items` int(11) DEFAULT NULL,
  `mc_gross` decimal(6,2) DEFAULT NULL,
  `mc_fee` varchar(255) DEFAULT NULL,
  `mc_currency` varchar(255) DEFAULT NULL,
  `ipn_track_id` varchar(45) DEFAULT NULL,
  `verify_sign` varchar(255) DEFAULT NULL,
  `txn_type` varchar(10) DEFAULT NULL,
  `payment_type` varchar(10) DEFAULT NULL,
  `receiver_email` varchar(127) DEFAULT NULL,
  `receiver_id` varchar(13) DEFAULT NULL,
  `notify_version` varchar(255) DEFAULT NULL,
  `transaction_subject` varchar(255) DEFAULT NULL,
  `charset` varchar(45) DEFAULT NULL,
  `discount` decimal(4,2) DEFAULT NULL,
  `test_ipn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `txn_id_UNIQUE` (`txn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gbws_reg'
--
/*!50003 DROP PROCEDURE IF EXISTS `get_mbr_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `get_mbr_id`(OUT ID_num varchar(8))
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

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_team_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `get_team_id`(OUT ID_num varchar(8))
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

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `setBoatNum` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE PROCEDURE `setBoatNum`(IN tourney int)
BEGIN
set @x=0;
UPDATE tourney_reg SET boat_num = (@x:=@x+1) where tourney_id=tourney ORDER BY reg_date;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-28  8:55:45
