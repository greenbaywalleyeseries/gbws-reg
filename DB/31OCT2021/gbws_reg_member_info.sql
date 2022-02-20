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
  `boat` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `motor` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `trolling_motor` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `electronics` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `sub` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `paid` varchar(1) COLLATE latin1_bin DEFAULT NULL,
  `SSN` varchar(11) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`mbr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_info`
--

LOCK TABLES `member_info` WRITE;
/*!40000 ALTER TABLE `member_info` DISABLE KEYS */;
INSERT INTO `member_info` VALUES ('2021-1','Michael','Yamaguchi','1322 Highlandview Drive','West Bend','WI','53095','2623399506','mguchi@hotmail.copm',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-100','Scott','Ristow','216270 County Road KK','Mosinee','WI','54455','7145742604','sristow@scswiderski.com',NULL,NULL,NULL,NULL,NULL,NULL,'389726131'),('2021-101','Craig','Suda','4236 White Pine Dr','Green Bay','WI','54313','9204619828','craig.suda@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'395901381'),('2021-102','Phil','Rahlf','6601 Pheasant View Dr','Rhinelander','WI','54501','7153601921','bethphilrahlf@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'390780337'),('2021-103','Kurt','Henrickson','803 29TH STREET','TWO RIVERS','WI','54241','9206818658','lastdroproofing@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'399804275'),('2021-104','Jesse','Walt','341 Elm street','Reedsville','WI','54230','9209735657','jesse.walt34@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'387086865'),('2021-105','Josh','Hooyman','W7319 Westhaven Dr','Greenville ','WI','54942','9208587094','jhooyman44@new.rr.com',NULL,NULL,NULL,NULL,NULL,NULL,'392848551'),('2021-106','Joshua ','Kramer','1604 Main Ave','Kaukauna ','WI','54130','9202051247','Joshua.kramer7575@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'395846679'),('2021-107','Jason','Wanty','N1785 County Rd K','Waupaca','WI','54981','7153212126','Wanty.jason@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'394983473'),('2021-108','Dave','Parker','1411 Berlin St','Waupaca ','WI','54971','7152817303','Davparker82@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'391407478'),('2021-109','Steve','Bieda','400 security Blvd','Green bay','WI','54313','9206097756','Sbieda@mau-associates',NULL,NULL,NULL,NULL,NULL,NULL,''),('2021-11','Chris','Van Iten','455 Mueller Ct','Luxemburg ','WI','54217','9203712575','cvi@catchmuskiesgb.com',NULL,NULL,NULL,NULL,NULL,NULL,'398849288'),('2021-110','Skyler','Adamski','W1180 Deer Dr','PULASKI','WI','54162','9206344565','skyler.e.adamski@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,''),('2021-111','Jim ','Peterson','4400 Sequoia Drive','Stevens Point','WI','54481','7153401448','goblue@charter.net',NULL,NULL,NULL,NULL,NULL,NULL,'394906753'),('2021-112','Greg','Josephs','2421 Forestville Road','Green Bay','WI','54304','9203717018','',NULL,NULL,NULL,NULL,NULL,NULL,'396909295'),('2021-113','Craig','Hable','1682 Thornton Dr.','Oshkosh','WI','54904','7152260430','craig.hable@mercmarine.com',NULL,NULL,NULL,NULL,NULL,NULL,'395022451'),('2021-114','Andrew','Swan','1300 Maple St.','Baldwin','WI','54002','7152257898','andrewswan@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'398048095'),('2021-115','Andrew','Wasson','242 Dekard Road','Little Suamico','WI','54141','9208836614','andrew8554@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-116','Avery','Smith','631 W. Frontier Rd.','Little Suamico','WI','54141','9204718612','',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-117','Greg','Wierzba','5376 BROWN ROAD','LITTLE SUAMICO','WI','54141','9206211662','greg@gmwguideservice.com',NULL,NULL,NULL,NULL,NULL,NULL,'394687485'),('2021-118','Tanner ','Weise','2404 South Ridge Road ','Green Bay ','WI','54304','9208835634','tanner.weise@tweetgarot.com',NULL,NULL,NULL,NULL,NULL,NULL,'387175009'),('2021-119','Dave ','Wierzba','3719 Tipperary Road ','Poynette ','WI','53955','6086957417','Dave.Wierzba@aebs.com',NULL,NULL,NULL,NULL,NULL,NULL,'394685213'),('2021-12','Tyler','Nechodom','121 Homewood Ct','Little Chute','WI','54140','9207167800','Tnechodom1990@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'390064898'),('2021-120','Mitchell','Daun','516 S 32ND ST','MANITOWOC','WI','54220','9206291204','mitchell.daun@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'388041931'),('2021-121','Dylan','Knoespel','1540 S. Huron Rd. #11','Green Bay','WI','54311','9205880368','dylan.knoespel@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'392172224'),('2021-122','Bob','Heilman','7859 rainbow rd','lake tomahawk','WI','54539','9208589688','bheilman22@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'390841416'),('2021-123','Todd','Rebek','8542 woodland ct','woodruff','WI','54568','7154905931','trebek1@frontier.com',NULL,NULL,NULL,NULL,NULL,NULL,'393681850'),('2021-126','Henry','Rauschenbach','N14578 old 13 rd','Fifield','WI','54524','7156614034','henry@restoru.net',NULL,NULL,NULL,NULL,NULL,NULL,'393041396'),('2021-127','Ben ','Minnema','N16472 Agenda Rd','Park Falls','WI','54552','7156613125','Minnemakelly@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'393924573'),('2021-128','Alec','Zalar','110 S. Jefferson Street ','Waterford ','WI','53185','4147323690','aleczalar@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'389131109'),('2021-129','Joe','Zalar','123 water street ','Waterford ','WI','53185','4144604284','josephzalar23@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'396043244'),('2021-130','Bret','Alexander','Suamico st','Anywhere','WI','54942','9208414214','Balex911@aol.com',NULL,NULL,NULL,NULL,NULL,NULL,'387807389'),('2021-131','Jay','Stephan','W5871 royaltroon dr','Menasha ','WI','54952','9208517033','Jaystephan11@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'472884547'),('2021-132','Carp','Vansteippen','Nonw','Gjjf','WI','54952','','',NULL,NULL,NULL,NULL,NULL,NULL,''),('2021-133','Hunter ','Minnema','N16472 agenda rd','Park falls ','WI','54552','7156614052','minnemakelly@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'395214173'),('2021-134','Adam ','Mann','1214 pasha Ave ','Mosinee ','WI','54455','7155731242','',NULL,NULL,NULL,NULL,NULL,NULL,'397080662'),('2021-135','Gary ','Pearson','1286 chapel st','Sobieski ','WI','54171','9202465038','Sgary4343@icloud.com',NULL,NULL,NULL,NULL,NULL,NULL,'392081113'),('2021-136','Branden','Rosner','630 first street','Pulaski','WI','54162','9206604365','11brrosner@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'395115391'),('2021-137','Tyler','Gau','6760 south chase rd','Sobieski','WI','54171','9206805035','Gautyler@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'387139796'),('2021-138','Levi','Minnema','9910 Watts Road','Verona','WI','53593','9207671134','minnemalevi@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'399158818'),('2021-139','Bailey','Buschke','717 MacArthur Dr.','Beaver Dam','WI','53916','9203929214','baileybuschke98@icloud.com',NULL,NULL,NULL,NULL,NULL,NULL,'395173261'),('2021-140','Pete','Petta','N9485 County Rd H','Tomahawk','WI','54487','7156120276','ppetta@amfam.com',NULL,NULL,NULL,NULL,NULL,NULL,'395789095'),('2021-141','Don ','Petta','W5224 Crass Rd','Tomahawk','WI','54487','7154533949','socks1@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'389561953'),('2021-142','Heath','Hagedorn','W3175 Landstad Rd. ','Bonduel','WI','54107','9206390503','Heathhagedorn@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'473044266'),('2021-143','David','Golik','958 Cross Rd','Sobieski ','WI','54171','9206397963','Dgolik111@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'393923591'),('2021-144','Jared','Parks','N1518 COUNTY ROAD X','Weyauwega','WI','54983','9202670841','hvac_jp@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'389064290'),('2021-145','Elicia','Fimreite','N1518 County Rd X','Weyauwega','WI','54983','4143501659','Elicia.fimreite@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'387946796'),('2021-146','Tyler','Hopfensperger','124 Grant St.','Kaukauna','WI','54130','9205404079','hoppy',NULL,NULL,NULL,NULL,NULL,NULL,'123456789'),('2021-147','Eric','Balstad','4385 ANNABELL CIRCLE','GREEN BAY','WI','54313','9203666406','ebalstad@new.rr.com',NULL,NULL,NULL,NULL,NULL,NULL,'477944551'),('2021-148','Brandon','Seidl','N260 kings court','Sherwood','WI','54169',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2021-149','Antonio ','Gutierrez','2403 farlin ave ','Green Bay ','WI','54302','7158910172','Gutiar14@uwgb.edu',NULL,NULL,NULL,NULL,NULL,NULL,'392210187'),('2021-15','Brodie','Berriochoa','741 Selden st','Columbus','WI','53925','6084455952','Berriochoa1@outlook.com ',NULL,NULL,NULL,NULL,NULL,NULL,'528250959'),('2021-150','Carlos ','Gutierrez','2404 farlin ave ','Green Bay ','WI','54302','7158913078','Guticd14@uwgb.edu',NULL,NULL,NULL,NULL,NULL,NULL,'392210186'),('2021-151','Antonio ','Gutierrez','2403 farlin ave ','Green Bay ','WI','54302','7158910172','Gutiar14@uwgb.edu',NULL,NULL,NULL,NULL,NULL,NULL,'392210187'),('2021-152','Carlos ','Gutierrez','2404 farlin ave ','Green Bay ','WI','54302','7158913078','Guticd14@uwgb.edu',NULL,NULL,NULL,NULL,NULL,NULL,'392210186'),('2021-153','Kirk','Moe','585 Spyglass on ','waukee ','IA','50263','5153205728','kirk.moe@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'483087467'),('2021-154','Owen ','Moe','585 spyglass Ln. ','Waukee ','IA','50263','5153205728','',NULL,NULL,NULL,NULL,NULL,NULL,'482394540'),('2021-155','Kevin','Walker','2788 NW 74th Ave','Ankeny','IA','50023','5156693562','kwalker@webildcom',NULL,NULL,NULL,NULL,NULL,NULL,'479923300'),('2021-156','Jason','Victor','2104 SW Tanglewood Lane','Ankeny','IA','50023','5152509016','jasonvictor@mchsi.com',NULL,NULL,NULL,NULL,NULL,NULL,'479945227'),('2021-157','Mitchell','Daun','516 S 32ND ST','Manitowoc','WI','54220','9206291204','mitchell.daun@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'388041931'),('2021-158','Mike','Parker','400 S Lakeshor Dr.','Chilton','WI','53014','9206349081','mparker@tsihvac.com',NULL,NULL,NULL,NULL,NULL,NULL,'391907335'),('2021-159','Tyler','Herman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2021-16','Dean ','Smith','951 cannal','Marseilles ','IL','61341','8152014215','Dean.berriochoa2@outlook.com',NULL,NULL,NULL,NULL,NULL,NULL,'361562941'),('2021-160','Jake','LaPine','2845 Beachcomber St.','Oshkosh','WI','54902','9205391047','jjlapine7@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'399984310'),('2021-161','Brennen','Bertel','810 Forest Drive','Mayville','WI','53050','9209041797','Brennen179@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'399081898'),('2021-162','Isaac ','Lakich ','3804 Cora Ln ','Richfield ','WI','53076','2629518808','Isaaclakichfishing@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'387156352'),('2021-163','Tristan','Beckwith','1030 Chestnut Street','West Bend','WI','53095','','',NULL,NULL,NULL,NULL,NULL,NULL,'442082198'),('2021-164','Dylan','Millis',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('2021-165','Matt','Mikulec','805 Willow Lane','Hartford','WI','53027','2622475024','mattmikulec1@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'391216462'),('2021-17','Chris','Radandt','510 Urban St','Rothschild','WI','54474','7155812808','cradandt@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'391060586'),('2021-18','Reggie','Taylor','1714 El Segundo Ave','Weston','WI','54476','9062870054','reg.tay34@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'369989040'),('2021-19','Josh ','Kopling','3770 E Becker rd ','Oak Creek ','WI','53154','4145547933','Tequilaman0811@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'390962536'),('2021-2','Tryton','Yamaguchi','1322 Highlandview Drive','West Bend','WI','56095','2623386987','me@here.com',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-20','Michael','Burdette','925 E Wells St.      Apt #720','Milwaukee','WI','53202','6084324558','mburdette156@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'387965984'),('2021-21','Ryan','Pizzi','618 Hwy 17','Phelps','WI','54554','7156170762','pz34@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'394928582'),('2021-22','Don','Rideout','2628 Manuel Lake Ln','Phelps','WI','54554','19203795689','don@rideoutservices.net',NULL,NULL,NULL,NULL,NULL,NULL,'396904044'),('2021-23','Marc','Jackson','618 church ave','Casco','WI','54205','9202556245','marcjacks10@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'398048019'),('2021-24','Jeremy','Jackson','1010 Scott st','Kewaunee','WI','54216','9202551360','NA',NULL,NULL,NULL,NULL,NULL,NULL,'398048018'),('2021-25','Douglas','Mcdonough','1556 Park Haven Rd','De Pere','WI','54115','9208191443','MCDONOUGH235@YAHOO.COM',NULL,NULL,NULL,NULL,NULL,NULL,'397701932'),('2021-26','Tim','Skenandore','W826 Cnty VV','Seymour','WI','54165','9208191823','tskenan1@oneidanation.org',NULL,NULL,NULL,NULL,NULL,NULL,'000000000'),('2021-27','Cameron','Lewis','457 Meadowlark Court','West Bend','WI','53090','9206349036','Walleyesextremeguideservice.com',NULL,NULL,NULL,NULL,NULL,NULL,'394866594'),('2021-28','Matt','Vanden Heuvel','N150 Horizon Drive','Neenah','WI','54956','9208588202','Matt.vandenheuvel@rbc.com',NULL,NULL,NULL,NULL,NULL,NULL,'397624159'),('2021-29','Christopher','Pockat','5450 Degantown Road','Gillett','WI','54124','9206347962','Walleyefisherman87@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'388987087'),('2021-3','Shelly','Swain','3492 RidgeWood Court','Suamico','WI','54313','9206349818','shelly.swain718w@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'387883960'),('2021-30','Mike','Dercks','N1929 Domain Dr','Kaukauna','WI','54130','9206368660','mddercks@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'393904144'),('2021-31','Colton','Dercks','N1929 Domain Dr','Kaukauna','WI','54130','9206368660','mddercks@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'399311700'),('2021-32','Mario','Nanna','2569 Whispering Oak Ct','De Pere','WI','54115','9203716543','mario.nanna@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'396863848'),('2021-33','Chris','Bartsch','757 Aster Trl','Suamico','WI','54141','9203603982','bigfish353@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'388845563'),('2021-34','Rob','Korth','879 Woodstock Lane','Pulaski','WI','54162','9204701980','swampdonkeybait@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,''),('2021-35','Michael','Denis','N4834 park st','Krakow','WI','54137','9207131540','Outdoorzman89@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'396042288'),('2021-36','Scott','Aimers','2645 E Shore Dr','Green bay','WI','54302','9204121428','Saimers44@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'394884212'),('2021-4','Scott','Swain','3492 RidgeWood Court','Suamico','WI','54313','9204920900','swain718@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'392880217'),('2021-40','Cliff','Henschel','3103 White Street','Marinette','WI','54143','9205880085','cwfinn18@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'396646663'),('2021-41','Patrica','Hiers','3103 White Street','Marinette','WI','54143','9208578510','parh8992@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'248254694'),('2021-42','Joe','Mans','','Peshtigo','WI','','','',NULL,NULL,NULL,NULL,NULL,NULL,''),('2021-43','David','Koller','PO Box 2561','Kingsford','MI','49892','9062212558','killer David39@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'383885058'),('2021-44','Jon','Vanderpoel','1202 S Smalley St','Shawano','WI','54166','7157010507','Jon.vanderpoel79@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'392983940'),('2021-45','Shawn ','Kahut','n7236 winnebago dr','fond du lac','WI','54935','9205394668','shawnkahut@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'398740772'),('2021-46','Corey','Kahut','1036 clover court','Hubertus','WI','53033','9209601465','coreykahut@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'398900975'),('2021-47','Shane','Hawkins','228 Theresa lane','Theresa','WI','53091','9209609762','walleyes4882@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'387928539'),('2021-48','Jeff','Josephs','519 13th Ave','Green Bay','WI','54303','9206061993','',NULL,NULL,NULL,NULL,NULL,NULL,'387925201'),('2021-49','Chris','Konitzer','106 Birch Ave','Oconto Falls','WI','54154','9206152848','Christopherkonitzer@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'391882303'),('2021-5','Jim ','Olsson','w255s7595 hilo dr','waukesha','WI','53189','2627162044','jimolsson7@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'399925395'),('2021-50','Ryan','Dempsey','1234 Main Street','Howard','WI','55555','9208194228','ryanmdempsey@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-51','Derek','Navis','1234 Main Street','Somewhere','WI','55555','5555551234','dereknavis@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-52','Jake','Becker','9431 400th Avenue','Genoa City','WI','53128','2627455787','qkrkllr@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'396116788'),('2021-53','Tyler','Mueller','70 pheasant ct','appleton','WI','54915','9208517021','bigmueller16@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'394061887'),('2021-57','Matthew','Wachowiak','W204 S8226 Pasadena Dr.','Muskego','WI','53150','2625274963','wachowiakmatt@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'395152174'),('2021-58','Jacob','Wachowiak','W204 S8226 Pasadena Dr.','Muskego','WI','53150','2628252792','Wachowiajk11@uww.edu',NULL,NULL,NULL,NULL,NULL,NULL,'394171082'),('2021-59','Casey','Felling','1151 Woodview Drive','Libertyville','IL','60048','8472755723','cfelling@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'355801364'),('2021-6','Bob','Vlach','6216 373rd ave','Burlington ','WI','53105','2627587568','bobbyvlach@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'395061807'),('2021-60','Trevor','Wood','555 Cherokee Rd','Lake Forest','IL','60045','8476827500','trevor.e.wood@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'353705038'),('2021-61','Ross','Neubauer','W7505 upper pine creek rd','Iron mountain','MI','49801','9043024979','pita234@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'382065519'),('2021-62','Brandon','Rouse','300 3rd st','Iron mountain','MI','49801','9063964086','',NULL,NULL,NULL,NULL,NULL,NULL,'366864442'),('2021-63','Damian ','Hannus','5525 Goldust Dr','De pere','WI','54115','9205850700','Damianhannus@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-64','Kris','Lulloff','520 Sunrise Bay Rd','Neenah','WI','54956','9204284342','',NULL,NULL,NULL,NULL,NULL,NULL,'111111111'),('2021-65','Glenn','Chenier','5780 Pine 0 25 st.','Gladstone','MI','49837','19062801365','',NULL,NULL,NULL,NULL,NULL,NULL,'000000000'),('2021-66','Shannon','Larson','600 Colan Blvd#12','Rice Lake','WI','54868','7156519698','larson.shannon@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'000000000'),('2021-67','Jeff','Nuechterlein','W7578 Gene Ct','Greenville','WI','54942','19204276723','eyetime365@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'377029948'),('2021-68','Ryan','Foster','W1022 Cty ZZ','Kaukauna','WI','54130','9208588387','crazyeyes365@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'387029801'),('2021-69','Bob','Zepnick','3360 Belmer Rd.','Green Bay','WI','54313','19204128603','rzepnick64@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'387783296'),('2021-7','Brennan','Rhode','1409 Lee Circle','Manitowoc','WI','54220','9209735550','brhod255@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'393083214'),('2021-70','Phil','Theisen','5658 wildflower','Auburndale','WI','54412','7158513586','info@theisenadventures.com',NULL,NULL,NULL,NULL,NULL,NULL,'388947396'),('2021-71','Travis','Boyd','N3491 Messer Rd','White Lake','WI','54491','7156105593','20tboyd19@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'389944343'),('2021-72','Brian','Fetzer','4019 Nature court','Green Bay','WI','54313','9203620824','brianfetzer61@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'388028917'),('2021-73','Travis','Kuepper','1505 n Viola st ','Appleton','WI','54911','9208580781','',NULL,NULL,NULL,NULL,NULL,NULL,'395022215'),('2021-74','Brian','Paul','2104 Jen Rae Rd','Green Bay','WI','54311','9202467260','bpaulfishing@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'388848442'),('2021-75','Wayne','Nitka','2696 St. Ann Dr.','Green Bay','WI','54311','9203239470','bushmaster15@aol.com',NULL,NULL,NULL,NULL,NULL,NULL,'399666171'),('2021-76','Lawrence','Rupinski','W377S10669 Betts Road','Eagle','WI','53119','4149156999','Jrhomeimprovementsllc@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'392843229'),('2021-77','Nichole ','Higgins','W7075 w bush rd','Pardeeville ','WI','53954','6082285680','Higginsnik@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'391924002'),('2021-78','Troy','Krause','217 East River Dr.','De Pere','WI','54115','9206649103','Walleyemafia1@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'396764525'),('2021-79','Brent','Dempsey','1496 McCormick St','Green Bay','WI','54301','9203714249','Brent.dempsey84@icloud.com',NULL,NULL,NULL,NULL,NULL,NULL,'396960573'),('2021-8','Ross','Rhode','450 N Westmount Drive','Sun Prairie','WI','53590','9209732230','rjrhode50@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'394116993'),('2021-80','Greg','Reckelberg','N4464 County Rd AB','Luxemburg','WI','54217','19205360156','gsreckelberg@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'398883922'),('2021-81','Max ','Reckelberg','N4464 County Rd AB','Luxemburg','WI','54217','19205361356','mreckelberg@packerfastener.com',NULL,NULL,NULL,NULL,NULL,NULL,'396175582'),('2021-82','Nolan','Koepp','7728 PRAIRIE RD','Two Rivers','WI','54241','2623053938','nolankoepp@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'398049823'),('2021-83','David','Skinner','428 W 11th St.','Kaukauna','WI','54130','9202573938','Fishindaveskinner@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'391045649'),('2021-84','Michael','Anderson','860 Evergreen Court','Kingsford','MI','49802','9063968933','upmanderson@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'381217807'),('2021-85','Chip','Anderson','860 Evergreen Court','Kingsford','MI','49802','9063968299','andersonchip@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,'365849026'),('2021-86','Benjamin','Anderson','860 Evergreen Court','Kingsford','MI','49802','9067748299','andebe01@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'555555555'),('2021-87','Scott','Valleskey','3425 Riverside Dr','Manitowoc','WI','54220','9203236528','FFSMV@YAHOO.COM',NULL,NULL,NULL,NULL,NULL,NULL,'393867721'),('2021-88','Michael','Mccardle','N7911 Lakeshore Dr','Fond du lac','WI','54937','4146877593','mmcardle@signaturefloorswi.com',NULL,NULL,NULL,NULL,NULL,NULL,'388902879'),('2021-89','Trevor','Gantz','2150 South Ridge Road','Green Bay','WI','54304','9206804798','tgantz54210@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'390196829'),('2021-90','Nick','Mills','P.O. Box 199','Whitelaw','WI','54247','9209172816','n.mills.lds@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'390943656'),('2021-91','Jacob','Kaprelian','606 Heyden Ln.','Green Bay','WI','54301','4144847768','Jakekaprelian@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'397060299'),('2021-92','Andrew','Berken','206 Summit St.','Pulaski','WI','54162','9206608841','Aberken12@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'390080714'),('2021-93','Andy','Zegers','3177 Manitowoc rd ','Greenbay ','WI','54311','9208193798','Andyzegers@hotmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'399044485'),('2021-94','Ken','Radey','453 East main st','Mishicot ','WI','54228','9206292226','',NULL,NULL,NULL,NULL,NULL,NULL,'398840860'),('2021-95','Ronald','Wautlet','E2571 CTY RD S','Casco','WI','54205','9206399292','rjwautlet@live.com',NULL,NULL,NULL,NULL,NULL,NULL,'398929418'),('2021-96','Trevor','Rass','3544 Cty Rd CC','Sturgeon Bay','WI','54235','9205360751','tjrass16@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'389114435'),('2021-97','Brad','Zahringer','W4643 High Cliff rd','Menasha ','WI','54952','9208501006','Bradz@theepoxypeople.com',NULL,NULL,NULL,NULL,NULL,NULL,'389886331'),('2021-98','Joel','Justinger','3010 N. Conkey St','Appleton','WI','54911','9202092180','joel@endeavorelectricinc.com',NULL,NULL,NULL,NULL,NULL,NULL,'396542177'),('2021-99','John','Clumpner','1018 RIVERVIEW DR','LITTLE SUAMICO','WI','54141','9203090781','CLUMPNER@YAHOO.COM',NULL,NULL,NULL,NULL,NULL,NULL,'394665045');
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

-- Dump completed on 2021-10-31  9:32:33