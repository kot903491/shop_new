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
INSERT INTO `comics_char` VALUES (1,1),(3,1),(6,1),(7,1),(3,2),(7,2),(2,3);
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
INSERT INTO `desk` VALUES (1,'Загадка Палача, или начало истории о Бэтмене и Робине','<p>На заре своей карьеры Темного Рыцаря Бэтмен пытается выследить неуловимого убийцу копов по кличке Палач, прежде чем тот нанесет очередной удар. Единственный намек на личность преступника — листок с детской игрой, приколотый к телам жертв. В качестве главных подозреваемых выступает целая галерея злодеев: Двуликий, Джокер, Загадочник, Женщина-Кошка. Даже полиции во главе с недавно назначенным комиссаром Гордоном доверять нельзя.</p><p>Чтобы разрешить загадку, Бэтмену придется заручиться помощью с самой неожиданной стороны. Он возьмет в напарники осиротевшего мальчика, который навсегда изменит его жизнь. Они станут известны как Бэтмен и Робин. Их история перед вами.</p><p>В качестве авторов книги выступает знаменитый тандем: лауреаты премии Айснера Джеф Лоэб и Тим Сэйл («Супермен на все времена», «Бэтмен: Долгий Хэллоуин»). Абсолютное издание включает оригинальную серию из 0–13 выпусков, интервью Джефа Лоэба, вступительные статьи Тима Сэйла и сценариста кинотрилогии о Бэтмене Дэвида С. Гойера, а также множество набросков и эскизов.</p>'),(2,'Одинокий. Измученный. Голодный. Жаждущий мщения','<p>Легкомысленный повеса Оливер Квин плевать хотел на всех и вся — в том числе и на себя самого. Но когда его — обманутого и полумертвого — выбросило течением на тропический остров, Оливер понял, что кое-что его все-таки заботит: справедливость!</p><p> Вооруженный только самодельным луком и стрелами, Оливер пытается выжить в незнакомой суровой местности, одновременно ведя войну против кровожадных наркодельцов, по вине которых он и оказался в изгнании.</p><p> «Зеленая стрела. Год первый» — каноническая предыстория всеми любимого Изумрудного Лучника, которую расскажет звездный тандем в лице сценариста Энди Диггла («Бэтмен», «Адам Стрэндж») и художника Джока («Болотная тварь», «Хеллблэйзер»). В книгу также вошли иллюстрированные отрывки сценария, раскадровки и предисловие, написанное Брайаном К. Воном ( «Y: последний мужчина»).</p><p> «От Энди Диггла и Джока, двух моих самых любимых творцов в современной индустрии комиксов, я меньшего и не ожидал. [Они] составляют тот уникальный дуэт сценариста и художника, в котором один неизменно помогает другому достичь вершин мастерства». — Брайан К. Вон</p>'),(3,'Он стар, но еще полон сил и опасен, как никогда.','<p>Писатель и художник Фрэнк Миллер совместно с Клаусом Янсеном и Линн Варли заново, с чистого листа создали легенду о Бэтмене в своей саге о городе Готэме, который в ближайшем будущем, спустя десять лет после того, как Бэтмен удалился от дел, пришел в полный упадок.</p><p> С момента первой публикации графического романа «Бэтмен. Возвращение Темного Рыцаря» прошло уже тридцать лет, однако он остается бесспорной классикой и входит в канон мира комиксов. Тридцать лет назад, в феврале 1986 года вышел первый выпуск этой серии на Западе.</p><p> В российское издание входят все имеющиеся на сегодняшний день материалы по этому комиксу – 3 предисловия – одно от Алана Мура к самому первому изданию и два юбилейных от Фрэнка Миллера – к изданиям 1996 и 2006 годов; два рабочих сценария (первый представляет собой скорее первоначальную заявку на создание комикса, а второй, более проработанный, детальный, где прослеживается создание образов); большое количество скетчей; галерею обложек и фото атрибутики по мотивам комикса.</p>'),(6,'test1','<p>test1 gfhoifgonbn sdnuirngiobnsgio dfinghhiskbefjsdbfsj dflmblf;ghml;yhn vbsdvfervuierb dntrnhetklsktrb dfgheugrhwriothwrio</p>'),(7,'fjgnfjn fdungidbgsdib rigotrnhtornri syfsvudfd','<p>drgnisnionr80engheb sn styngrsitobns iosrwur0nmy9tmbsu jeurigb euroiunvm </p>');
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
INSERT INTO `gallery` VALUES (1,'CS_1_s.jpg','CS_1.jpg'),(2,'CS_2_s.jpg','CS_2.jpg'),(3,'CS_3_s.jpg','CS_3.jpg'),(6,'CS_6_s.jpg','CS_6.jpg'),(7,'CS_7_s.jpg','CS_7.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL,
  `order_name` varchar(45) NOT NULL,
  `order_tel` varchar(45) NOT NULL,
  `opder_email` varchar(45) DEFAULT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'2017-11-08 17:11:54','kot903491','+789456123','kot903491@gmail.com','fhfghfghfghfghfg',1),(2,'2017-11-08 17:11:51','kot903491','+789456123','kot903491@gmail.com','jlhjkhjkhjkhj',1),(3,'2017-11-08 19:11:07','kot903491','+789456123','kot903491@gmail.com','dfgdfgdfgdfgdfg',1);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  KEY `fk_order_product_idx` (`id_product`),
  KEY `fk_order_id_idx` (`id_order`),
  CONSTRAINT `fk_order_id` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_order_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` VALUES (1,2,1),(1,1,5),(2,2,1),(2,1,5),(3,1,1),(3,2,1),(3,3,1);
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Бэтмен. Темная победа','Джэф Лоэб','Тим Сэйл',408,1000.00),(2,'Зеленая стрела. Год первый','Энди Дигг','Джок',16,500.00),(3,'Бэтмен. Возвращение темного рыцаря','Фрэнк Миллер','Фрэнк Миллер, Клаус Янсен',264,1200.00),(6,'test1','test1','test1',1,1.00),(7,'test2','test2','test2',2,2.00);
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
INSERT INTO `publishing` VALUES (1,1,2,1),(2,1,1,1),(3,1,1,1),(6,1,1,1),(7,1,1,2);
/*!40000 ALTER TABLE `publishing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `datetime` datetime NOT NULL,
  `review` text NOT NULL,
  KEY `fk_reviw_id_idx` (`id`),
  CONSTRAINT `fk_reviw_id` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,'Тимур','kot903491@gmail.com','2017-11-05 18:11:04','Первый комментарий'),(1,'Тимур','kot903491@gmail.com','2017-11-05 22:11:15','Проверяем временную зону'),(1,'kot903491','kot903491@gmail.com','2017-11-06 00:11:48','И еще раз проверяем временную зону'),(1,'kot903491','kot903491@gmail.com','2017-11-06 00:11:54','Проверяю обновляшку'),(3,'автор','kot903491@gmail.com','2017-11-06 22:11:13','Бэтмен. Возвращение темного рыцаря'),(2,'автор','kot903491@gmail.com','2017-11-06 22:11:59','Зеленая стрела. Год первый');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
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

-- Dump completed on 2017-11-28 21:31:55
