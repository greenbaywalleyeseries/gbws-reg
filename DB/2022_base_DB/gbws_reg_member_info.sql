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
-- Table structure for table `member_info`
--

DROP TABLE IF EXISTS `member_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_info` (
  `mbr_id` varchar(8) COLLATE latin1_bin NOT NULL,
  `first` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `last` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `address` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `city` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `state` varchar(2) COLLATE latin1_bin DEFAULT NULL,
  `zip` char(5) COLLATE latin1_bin DEFAULT NULL,
  `phone` char(20) COLLATE latin1_bin DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `paid` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `EUA` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `SSN` varchar(11) COLLATE latin1_bin DEFAULT NULL,
  `waiver1` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `waiver2` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `waiver3` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_info`
--

LOCK TABLES `member_info` WRITE;
/*!40000 ALTER TABLE `member_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-20 14:15:28
