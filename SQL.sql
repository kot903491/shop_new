CREATE DATABASE  IF NOT EXISTS `comics_shop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `comics_shop`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: comics_shop
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `binding`
--

DROP TABLE IF EXISTS `binding`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `binding` (
  `id_bin` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_bin`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binding`
--

LOCK TABLES `binding` WRITE;
/*!40000 ALTER TABLE `binding` DISABLE KEYS */;
INSERT INTO `binding` VALUES (2,'Мягкий'),(1,'Твердый');
/*!40000 ALTER TABLE `binding` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comics_char`
--

DROP TABLE IF EXISTS `comics_char`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comics_char` (
  `id` int(11) NOT NULL,
  `id_pers` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_pers`),
  KEY `fk_person_idx` (`id_pers`),
  CONSTRAINT `fk_person` FOREIGN KEY (`id_pers`) REFERENCES `persons` (`id_pers`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prod_id1` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comics_char`
--

LOCK TABLES `comics_char` WRITE;
/*!40000 ALTER TABLE `comics_char` DISABLE KEYS */;
INSERT INTO `comics_char` VALUES (1,1);
/*!40000 ALTER TABLE `comics_char` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `desk`
--

DROP TABLE IF EXISTS `desk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desk` (
  `id` int(11) NOT NULL,
  `s_desk` varchar(250) NOT NULL,
  `f_desk` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_prod_id3` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desk`
--

LOCK TABLES `desk` WRITE;
/*!40000 ALTER TABLE `desk` DISABLE KEYS */;
INSERT INTO `desk` VALUES (1,'Загадка Палача, или начало истории о Бэтмене и Робине','<p>На заре своей карьеры Темного Рыцаря Бэтмен пытается выследить неуловимого убийцу копов по кличке Палач, прежде чем тот нанесет очередной удар. Единственный намек на личность преступника — листок с детской игрой, приколотый к телам жертв. В качестве главных подозреваемых выступает целая галерея злодеев: Двуликий, Джокер, Загадочник, Женщина-Кошка. Даже полиции во главе с недавно назначенным комиссаром Гордоном доверять нельзя.</p><p>Чтобы разрешить загадку, Бэтмену придется заручиться помощью с самой неожиданной стороны. Он возьмет в напарники осиротевшего мальчика, который навсегда изменит его жизнь. Они станут известны как Бэтмен и Робин. Их история перед вами.</p><p>В качестве авторов книги выступает знаменитый тандем: лауреаты премии Айснера Джеф Лоэб и Тим Сэйл («Супермен на все времена», «Бэтмен: Долгий Хэллоуин»). Абсолютное издание включает оригинальную серию из 0–13 выпусков, интервью Джефа Лоэба, вступительные статьи Тима Сэйла и сценариста кинотрилогии о Бэтмене Дэвида С. Гойера, а также множество набросков и эскизов</p>');
/*!40000 ALTER TABLE `desk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `s_img` varchar(100) NOT NULL,
  `b_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`s_img`,`b_img`),
  CONSTRAINT `fk_prod_id2` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (1,'CS_1_s.jpg','CS_1.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `id_pers` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pers`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (1,'Бетмен'),(2,'Джокер'),(3,'Зеленая стрела'),(4,'Робин');
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `painter` varchar(50) NOT NULL,
  `pages` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Бэтмен. Темная победа','Джэф Лоэб','Тим Сэйл',408,1000.00);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publ_local`
--

DROP TABLE IF EXISTS `publ_local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publ_local` (
  `id_publ` int(11) NOT NULL AUTO_INCREMENT,
  `publ` varchar(45) NOT NULL,
  PRIMARY KEY (`id_publ`),
  UNIQUE KEY `publ_UNIQUE` (`publ`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publ_local`
--

LOCK TABLES `publ_local` WRITE;
/*!40000 ALTER TABLE `publ_local` DISABLE KEYS */;
INSERT INTO `publ_local` VALUES (1,'Азбука-Аттикус'),(2,'АСТ');
/*!40000 ALTER TABLE `publ_local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publ_origin`
--

DROP TABLE IF EXISTS `publ_origin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publ_origin` (
  `id_publ` int(11) NOT NULL AUTO_INCREMENT,
  `publ` varchar(45) NOT NULL,
  PRIMARY KEY (`id_publ`),
  UNIQUE KEY `publ_UNIQUE` (`publ`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publ_origin`
--

LOCK TABLES `publ_origin` WRITE;
/*!40000 ALTER TABLE `publ_origin` DISABLE KEYS */;
INSERT INTO `publ_origin` VALUES (1,'DC'),(2,'Vertigo');
/*!40000 ALTER TABLE `publ_origin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publishing`
--

DROP TABLE IF EXISTS `publishing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publishing` (
  `id` int(11) NOT NULL,
  `id_publ_o` int(11) NOT NULL,
  `id_publ_l` int(11) NOT NULL,
  `id_bin` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_publ_o`,`id_publ_l`,`id_bin`),
  KEY `fk_publ_o_idx` (`id_publ_o`),
  KEY `fk_publ_l_idx` (`id_publ_l`),
  KEY `fk_binding_idx` (`id_bin`),
  CONSTRAINT `fk_binding` FOREIGN KEY (`id_bin`) REFERENCES `binding` (`id_bin`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_prod_id` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_publ_l` FOREIGN KEY (`id_publ_l`) REFERENCES `publ_local` (`id_publ`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_publ_o` FOREIGN KEY (`id_publ_o`) REFERENCES `publ_origin` (`id_publ`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publishing`
--

LOCK TABLES `publishing` WRITE;
/*!40000 ALTER TABLE `publishing` DISABLE KEYS */;
INSERT INTO `publishing` VALUES (1,1,1,1);
/*!40000 ALTER TABLE `publishing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','21232f297a57a5a743894a0e4a801fc312hdfgrtr23123er565hghjmvcdkdjkytrh',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-03 16:00:26
