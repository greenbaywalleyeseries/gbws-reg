-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: gbws_reg
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `archive_unpaid_members`
--

DROP TABLE IF EXISTS `archive_unpaid_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archive_unpaid_members` (
  `mbr_id` varchar(8) NOT NULL,
  `first` varchar(50) DEFAULT NULL,
  `last` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` char(5) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `boat` varchar(50) DEFAULT NULL,
  `motor` varchar(50) DEFAULT NULL,
  `trolling_motor` varchar(50) DEFAULT NULL,
  `electronics` varchar(50) DEFAULT NULL,
  `sub` varchar(1) DEFAULT NULL,
  `paid` varchar(1) DEFAULT NULL,
  `SSN` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archive_unpaid_members`
--

LOCK TABLES `archive_unpaid_members` WRITE;
/*!40000 ALTER TABLE `archive_unpaid_members` DISABLE KEYS */;
INSERT INTO `archive_unpaid_members` VALUES ('2021-124','Henry','Rauschenbach','N14578 old 13 rd','Fifield','WI','54524','7156614034','henry@restoru.net',NULL,NULL,NULL,NULL,NULL,NULL,'393041396'),('2021-125','Ben ','Minnema','N16472 Agenda Rd','Park Falls','WI','54552','7156613125','Minnemakelly@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'393924573');
/*!40000 ALTER TABLE `archive_unpaid_members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-31  9:32:33
