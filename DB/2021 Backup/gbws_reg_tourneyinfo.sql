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
  `reg_deadline` date DEFAULT NULL,
  PRIMARY KEY (`tourney_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tourneyinfo`
--

LOCK TABLES `tourneyinfo` WRITE;
/*!40000 ALTER TABLE `tourneyinfo` DISABLE KEYS */;
INSERT INTO `tourneyinfo` VALUES (1,'Tourney 1','2022-04-10',NULL,NULL,410.00,200.00,20.00,'T1','2022-04-04'),(2,'Tourney 2','2022-05-15',NULL,NULL,410.00,200.00,20.00,'T2','2022-05-09'),(3,'Tourney 3','2022-06-26',NULL,NULL,410.00,200.00,20.00,'T3','2022-06-20'),(4,'Tourney 4','2022-07-24',NULL,NULL,410.00,200.00,20.00,'T4','2022-07-18'),(5,'Championship','2022-08-27','2022-08-28',NULL,510.00,200.00,40.00,'CH','2022-08-22');
/*!40000 ALTER TABLE `tourneyinfo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-16 20:21:37
