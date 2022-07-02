-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: chatapp
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `subcriptionpackage`
--

DROP TABLE IF EXISTS `subcriptionpackage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcriptionpackage` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `packagename` varchar(50) NOT NULL,
  `packageprice` int(50) NOT NULL,
  `packageduration` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcriptionpackage`
--

LOCK TABLES `subcriptionpackage` WRITE;
/*!40000 ALTER TABLE `subcriptionpackage` DISABLE KEYS */;
INSERT INTO `subcriptionpackage` VALUES (1,'Silver',10,'1 month'),(2,'Gold',100,'6 month'),(3,'Platinum',200,'12 month'),(4,'Free',0,'1 month');
/*!40000 ALTER TABLE `subcriptionpackage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `Id` int(30) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password2` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `user_img` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Rafid','rafid@gmail.com','rafid','01534205266','Rafid.jpg'),(2,'soumit','soumit@gmail.com','soumit','01314566','286082117_316152070729106_2368'),(3,'etu','ety@gmail.com','ety','01314566','Cool-Profile-Picture.jpg'),(4,'Rafi','rafi@gmail.com','rafi','01718888888','icons8-user-80.png'),(5,'Hasan','ha@gmail.com','hasan','099928393848','pngkey.com-face-silhouette-png'),(6,'Abir','abir@gmail.com','abir','01928333847','andy-holmes-rCbdp8VCYhQ-unspla');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subcription_info`
--

DROP TABLE IF EXISTS `user_subcription_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_subcription_info` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subscribedpackagename` varchar(50) NOT NULL,
  `subscribedpackageprice` int(50) NOT NULL,
  `subscribedpackageduration` varchar(50) NOT NULL,
  `activationdate` date NOT NULL,
  `deactivationdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subcription_info`
--

LOCK TABLES `user_subcription_info` WRITE;
/*!40000 ALTER TABLE `user_subcription_info` DISABLE KEYS */;
INSERT INTO `user_subcription_info` VALUES (24,'Abir','abir@gmail.com','Silver',10,'1 month','2022-06-30','2022-07-30');
/*!40000 ALTER TABLE `user_subcription_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-30 19:17:50
