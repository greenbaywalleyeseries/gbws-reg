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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
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
