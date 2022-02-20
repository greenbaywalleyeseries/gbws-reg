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
  `refund` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `boat` varchar(45) COLLATE latin1_bin DEFAULT NULL,
  `motor` varchar(45) COLLATE latin1_bin DEFAULT NULL,
  `trolling_motor` varchar(45) COLLATE latin1_bin DEFAULT NULL,
  `electronics` varchar(45) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_info`
--

LOCK TABLES `team_info` WRITE;
/*!40000 ALTER TABLE `team_info` DISABLE KEYS */;
INSERT INTO `team_info` VALUES ('2021_1','2021-1','2021-2','','','X','','','','',''),('2021_10','2021-19','2021-20','','','X','X','Crestliner 1950 Fish Hawk ','Mercury 200XL ','Minnkota terova ','Lowrance '),('2021_11','2021-21','2021-22','','','X','','Ranger Fisherman 621','Evinrude 250','Minn Kota','Humminbird'),('2021_12','2021-23','2021-24','','','X','X','Nitro ZV21','Mercury','Minn Kota ','Humminbird'),('2021_13','2021-25','2021-26','','','X','X','Ranger 621','Mercury ','Motor Guide','Lowrance'),('2021_14','2021-27','2021-28','2021-29','','X','','Triton Fishunter 216','Mercury Verado 400','Minn Kota Ultrex','Garmin'),('2021_15','2021-30','2021-31','','','X','','Skeeter','Yamaha','Minkota','Garmin, Lowrance'),('2021_16','2021-32','2021-33','2021-34','2021-35','X','X','2020 Nitro ZV21','350 Mercury','Minn Kota','Hummin Bird '),('2021_17','2021-35','2021-36','','','X','','Triton','Mercury','Minnkota','Lowrance/ garmin'),('2021_19','2021-40','2021-41','2021-42','','X','','Yarcraft','250 Yamaha','Minn Kota','Hummingbird/Lowrance'),('2021_2','2021-3','2021-4','','','X','','2015 Ranger 620FS','Merc 250 Pro XS','Min Kota Terrova','Lowrance'),('2021_20','2021-43','2021-44','','','X','','Crestliner','Mercury','Minnkota','Lowrance'),('2021_21','2021-45','2021-46','2021-47','','X','','nitro zv21','400','minn kota','Garmin hummingbird'),('2021_22','2021-48','2021-49','','','X','X','Ranger','Evinrude','Terrova','Hummingbird '),('2021_23','2021-50','2021-51','','','X','','','','',''),('2021_24','2021-52','2021-53','','','X','','Warrior V208','Yamah','Minn Kota','Humminbird'),('2021_26','2021-57','2021-58','','','X','X','Ranger 620 FS Pro','Mercury Verado 250','Minn Kota Ultrex','Hummingbird and Garmin'),('2021_27','2021-59','2021-60','','','X','X','Nitro ZV21','Mercury Verado 300','Minn Kota Terrova','Lowrance'),('2021_28','2021-61','2021-62','','','X','','Skeeter','Yamaha','Minn kota','Lowrance'),('2021_29','2021-63','2021-64','','','X','X','Ranger','Mercury','Minn Kota','Humminbird '),('2021_3','2021-5','2021-6','','','X','X','2017 Ranger 621FS','Mercury Verado 350','Minn Kota Ulterra','Humminbird'),('2021_30','2021-65','2021-66','','','X','X','Ranger 621','Evinrude','MinnKota','Lowrance'),('2021_31','2021-67','2021-68','2021-69','','X','X','Nitro ZV20','Mercury 300Pro XS','Minnkota','Garmin'),('2021_32','2021-70','2021-71','','','X','','Tracker ','Mercury ','Minnkota ','Humminbird /garmin '),('2021_33','2021-72','2021-73','','','X','','Skeeter','Mercury ','Minnkota','Lowrance Hummingbird '),('2021_34','2021-74','2021-75','','','X','','Alumacraft','Evenrude','Minn Kota',''),('2021_35','2021-76','2021-77','','','X','X','Skeeter','Yamaha 250','Minn Kota altera ','Lowrance '),('2021_36','2021-78','2021-79','','','X','','Triton','Mercury','Motorguide','Humminbird and Lowrance'),('2021_37','2021-80','2021-81','','','X','X','Ranger FS 620','Mercury Verado 250','Minn Kota','Lowrance,Garmin'),('2021_38','2021-82','2021-83','2021-34','','X','','RANGER 621','MERCURY ','Minnkota','Lorance'),('2021_4','2021-7','2021-8','','','X','X','Ranger 620 VS','Mercury Verado 250 Pro','Minn Kota Terrova','Lowrance'),('2021_40','2021-84','2021-85','2021-86','','X','X','Lund 2175 Pro-V','Mercury 315','Mercury 25','Lowrance & Humminbird'),('2021_41','2021-87','2021-88','','','X','','Ranger','Mercury','Minnkota','Lowrance/Garmin'),('2021_42','2021-89','2021-90','2021-159','','X','','Yarcraft','Mercury','Minnkota Ultrex','Lowrance'),('2021_43','2021-91','2021-92','','','X','','Ranger 622FS','Mercury Verado 350','Minnkota Ulterra ','Lowrance'),('2021_44','2021-93','2021-94','','','X','','Ranger','Yamaha ','Minnkota ','Lowrance '),('2021_45','2021-95','2021-96','','','X','X','Lund','Mercury','minn kota','lowrance'),('2021_46','2021-97','2021-98','','','X','','Ranger','Mercury ','Minnkota','Hummingbird/Lowrance'),('2021_47','2021-99','2021-100','','','X','X','Nitro','Mercury','Minn Kota','Humminbird'),('2021_48','2021-101','2021-102','','','X','X','Nitro Zv20','Mercury Pro XS 300','Minn Kota Ultrex','Garmin'),('2021_49','2021-103','2021-104','2021-82','','X','X','Nitro ZV21 ','Mercury 300','Minkota','Garmin'),('2021_50','2021-105','2021-106','','','X','X','Ranger','Evinrude ','Minnkota','Humminbird '),('2021_51','2021-107','2021-108','','','X','X','Ranger','Evinrude ','minnkota','Lowrance/garmin'),('2021_52','2021-109','2021-110','','','X','X','Ranger ','Mercury ','Minkoda','Lawrence '),('2021_53','2021-111','2021-112','','','X','','Lund 208 Pro-V GL','300 Verado','Minn Kota Ulterra','Lowrance'),('2021_54','2021-113','2021-114','','','X','','Lund','Mercury','Motorguide','Humminbird'),('2021_55','2021-115','2021-116','','','X','','Nitro','Mercury','Minnkota','Humminbird'),('2021_56','2021-117','2021-118','2021-119','','X','','2019 Nitro ZV21','300 HP Mercury Verado ','Minn Kota ','Hummingbird '),('2021_57','2021-120','2021-121','2021-158','','X','X','Ranger 620 DVS','Mercury Optimax ProXS','MinnKota Terrova','Lowrance HDS Carbon'),('2021_58','2021-122','2021-123','','','X','X','ranger 621FS','evinrude 300','minn kota ultrex','humminbird'),('2021_6','2021-11','2021-12','','','X','X','Ranger 621','Merc 300 proXS','Ulterra','Lowrance & humminbird'),('2021_60','2021-126','2021-127','2021-148','','X','','Nitro ZV21','300 Merc','Ulterra','Lowrance '),('2021_61','2021-128','2021-129','','','X','X','Ranger','Mercury ','Minn Kota ','Humminbird '),('2021_62','2021-130','2021-131','2021-132','','X','','Ranger 622','400','Minnekota ','Hummingbird'),('2021_63','2021-133','2021-134','2021-127','','X','','Lund 2025 pro v ','Mercury 250 optimax pro xs','Minn Kota ','Hummingbird and Lowrance '),('2021_64','2021-135','2021-136','2021-137','2021-164','X','','Nitro','Mercury','Minnkota','Lowrance garmin '),('2021_65','2021-138','2021-139','2021-165','','X','','Lund','Mercury','Minnkota','Humminbird'),('2021_66','2021-140','2021-141','','','X','X','Yarcraft','Yamaha','Minn Kota','Humminbird/Garmin'),('2021_68','2021-142','2021-143','','','X','X','Nitro','Mercury','Minnkota','Minnkota'),('2021_69','2021-144','2021-145','','','X','X','Lund Pro V 1775','Mariner','Minnkota','Humminbird'),('2021_70','2021-146','2021-147','','','X','X','Ranger','Yamaha','Minn-kota','Lowrance'),('2021_71','2021-149','2021-150','','',NULL,'','','','',''),('2021_72','2021-151','2021-152','','',NULL,'','','','',''),('2021_73','2021-153','2021-154','','','X','','Ranger ','250 verado ','minn kota ','lowrance '),('2021_75','2021-155','2021-156','','','X','X','Ranger 622','Mercury Verado 400','Mincota','Lowrance'),('2021_76','2021-160','2021-161','','','X','X','Triton','Yamaha','MinnKota','Garmin/Humminbird'),('2021_77','2021-162','2021-163','','','X','','Crestliner ','Merc ','Ultrex','Garmin '),('2021_8','2021-15','2021-16','','','X','','620 pro xs ','300','Minnkota','Humming bird '),('2021_9','2021-17','2021-18','','','X','','2016 Ranger Angler 1880MS','Mercury 150 4S','Minnkota','Humminbird');
/*!40000 ALTER TABLE `team_info` ENABLE KEYS */;
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
