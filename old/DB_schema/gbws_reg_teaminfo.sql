CREATE DATABASE  IF NOT EXISTS `gbws_reg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gbws_reg`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gbws_reg
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.33-MariaDB

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
-- Table structure for table `teaminfo`
--

DROP TABLE IF EXISTS `teaminfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teaminfo` (
  `team_id` varchar(8) NOT NULL,
  `partner1_first` varchar(50) DEFAULT NULL,
  `partner1_last` varchar(50) DEFAULT NULL,
  `partner1_address` varchar(50) DEFAULT NULL,
  `partner1_city` varchar(50) DEFAULT NULL,
  `partner1_state` varchar(2) DEFAULT NULL,
  `partner1_zip` char(5) CHARACTER SET utf8 DEFAULT NULL,
  `partner1_phone` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `partner1_email` varchar(50) DEFAULT NULL,
  `partner2_first` varchar(50) DEFAULT NULL,
  `partner2_last` varchar(50) DEFAULT NULL,
  `partner2_address` varchar(50) DEFAULT NULL,
  `partner2_city` varchar(50) DEFAULT NULL,
  `partner2_state` varchar(2) DEFAULT NULL,
  `partner2_zip` char(5) CHARACTER SET utf8 DEFAULT NULL,
  `partner2_phone` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `partner2_email` varchar(50) DEFAULT NULL,
  `boat` varchar(50) DEFAULT NULL,
  `motor` varchar(50) DEFAULT NULL,
  `trolling_motor` varchar(50) DEFAULT NULL,
  `electronics` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-20  8:40:04
