# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: clowting.me (MySQL 5.5.43-MariaDB)
# Database: twz
# Generation Time: 2015-09-23 12:27:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table attempts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `attempts`;

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(39) NOT NULL,
  `count` int(11) NOT NULL,
  `expiredate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `attempts` WRITE;
/*!40000 ALTER TABLE `attempts` DISABLE KEYS */;

INSERT INTO `attempts` (`id`, `ip`, `count`, `expiredate`)
VALUES
	(15,'145.19.252.65',1,'2015-06-17 06:07:12'),
	(19,'145.19.240.234',3,'2015-06-19 05:20:13'),
	(20,'145.19.255.115',1,'2015-06-19 06:54:58'),
	(21,'::1',2,'2015-09-23 14:30:56');

/*!40000 ALTER TABLE `attempts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Beschikbaarheid
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Beschikbaarheid`;

CREATE TABLE `Beschikbaarheid` (
  `SurveillantID` int(11) NOT NULL DEFAULT '0',
  `Datum` date NOT NULL,
  `Ochtend` tinyint(1) NOT NULL DEFAULT '0',
  `Middag` tinyint(1) NOT NULL DEFAULT '0',
  `Avond` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`SurveillantID`,`Datum`),
  CONSTRAINT `FK_Beschikbaarheid_Surveillant` FOREIGN KEY (`SurveillantID`) REFERENCES `Surveillant` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Beschikbaarheid` WRITE;
/*!40000 ALTER TABLE `Beschikbaarheid` DISABLE KEYS */;

INSERT INTO `Beschikbaarheid` (`SurveillantID`, `Datum`, `Ochtend`, `Middag`, `Avond`)
VALUES
	(1,'2015-06-22',1,0,0),
	(1,'2015-06-23',1,1,0),
	(1,'2015-07-13',0,1,0),
	(1,'2015-07-14',0,1,0),
	(1,'2015-07-15',0,1,0),
	(1,'2015-07-16',0,1,0),
	(1,'2015-07-17',1,0,0),
	(2,'2015-06-15',1,1,1),
	(2,'2015-06-16',1,0,0),
	(2,'2015-06-17',1,1,0),
	(2,'2015-06-18',1,1,1),
	(2,'2015-06-19',1,0,0),
	(2,'2015-06-22',1,0,0),
	(2,'2015-06-23',0,1,0),
	(2,'2015-06-24',0,1,0),
	(2,'2015-06-25',0,0,1),
	(21,'2015-06-15',1,1,1),
	(21,'2015-06-16',1,0,1),
	(21,'2015-06-17',1,1,1),
	(21,'2015-06-18',0,1,1),
	(21,'2015-06-19',1,1,1),
	(21,'2015-06-20',1,1,1),
	(21,'2015-06-22',0,0,1),
	(21,'2015-06-23',1,0,1),
	(21,'2015-06-24',1,1,0),
	(21,'2015-06-25',1,1,1),
	(21,'2015-06-26',1,1,1),
	(21,'2015-07-13',1,1,1),
	(21,'2015-07-14',1,1,1),
	(21,'2015-07-15',1,1,1),
	(21,'2015-07-16',1,1,1),
	(21,'2015-07-17',1,1,1),
	(23,'2015-07-17',0,1,0),
	(29,'2015-07-13',1,1,1),
	(29,'2015-07-14',1,1,1),
	(29,'2015-07-15',1,1,1),
	(29,'2015-07-16',1,1,1),
	(29,'2015-07-17',1,1,1),
	(31,'2015-06-15',1,0,0),
	(31,'2015-06-16',1,0,0),
	(31,'2015-06-17',1,0,0),
	(31,'2015-06-19',1,0,0),
	(31,'2015-06-22',1,0,0),
	(31,'2015-06-23',1,0,1),
	(31,'2015-06-24',1,0,0),
	(31,'2015-06-25',1,0,0),
	(31,'2015-06-26',1,0,0),
	(31,'2015-07-13',1,0,0),
	(31,'2015-07-14',0,1,0),
	(31,'2015-07-15',0,0,1),
	(31,'2015-07-16',1,0,0),
	(42,'2015-06-15',1,0,0),
	(42,'2015-06-16',0,1,0),
	(42,'2015-06-17',0,0,1),
	(42,'2015-06-18',1,1,1),
	(42,'2015-06-19',1,0,0),
	(42,'2015-06-22',0,1,0),
	(42,'2015-06-23',0,1,0),
	(42,'2015-06-24',1,0,0),
	(42,'2015-06-25',0,1,0),
	(42,'2015-06-26',1,0,1),
	(42,'2015-07-13',0,1,0),
	(42,'2015-07-14',0,1,0),
	(42,'2015-07-15',0,1,0),
	(42,'2015-07-16',0,1,0),
	(42,'2015-07-17',0,1,0);

/*!40000 ALTER TABLE `Beschikbaarheid` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;

INSERT INTO `config` (`id`, `setting`, `value`)
VALUES
	(1,'site_name','TWZ'),
	(2,'site_url','thijsvdeerden.me/twz'),
	(3,'site_email','info@twz.nl'),
	(4,'cookie_name','authID'),
	(5,'cookie_path','/'),
	(6,'cookie_domain',NULL),
	(7,'cookie_secure','0'),
	(8,'cookie_http','0'),
	(9,'site_key','ZpFGGnx^q*w2&Gukak=XG3J?9?NQQ!qR'),
	(10,'cookie_remember','+1 month'),
	(11,'cookie_forget','+30 minutes'),
	(12,'bcrypt_cost','10'),
	(13,'table_attempts','attempts'),
	(14,'table_requests','requests'),
	(15,'table_sessions','sessions'),
	(16,'table_users','users'),
	(17,'site_timezone','Europe/Amsterdam'),
	(18,'site_activation_page','pages/activate.php'),
	(19,'site_password_reset_page','pages/reset.php'),
	(20,'smtp','1'),
	(21,'smtp_host','smtp.gmail.com'),
	(22,'smtp_auth','1'),
	(23,'smtp_username','twerkzoneh@gmail.com'),
	(24,'smtp_password','twerktwerk'),
	(25,'smtp_port','465'),
	(26,'smtp_security','ssl');

/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Opleiding
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Opleiding`;

CREATE TABLE `Opleiding` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Een opleiding of academie.';

LOCK TABLES `Opleiding` WRITE;
/*!40000 ALTER TABLE `Opleiding` DISABLE KEYS */;

INSERT INTO `Opleiding` (`ID`, `Naam`)
VALUES
	(1,'HBO ICT'),
	(2,'PABO'),
	(4,'PEDA'),
	(6,'Engineering'),
	(7,'PT'),
	(8,'Academie'),
	(9,'Economie');

/*!40000 ALTER TABLE `Opleiding` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table requests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;

INSERT INTO `requests` (`id`, `uid`, `rkey`, `expire`, `type`)
VALUES
	(3,2,'C6DC72Tq493RI36cX6P6','2015-06-17 15:03:18','activation'),
	(4,3,'xU4lKj5EaD9s1qKJ5X9S','2015-06-17 16:57:58','activation'),
	(5,4,'W8186Q6U1335V2wMIT3U','2015-06-17 17:02:56','activation'),
	(7,6,'N7LgI79Gd199659jUY4z','2015-06-18 04:57:54','activation'),
	(8,7,'k0bng8596a9YdN4ID4N2','2015-06-18 05:24:03','activation'),
	(9,8,'2n364D2x438q2Dj14F69','2015-06-18 05:36:52','activation'),
	(10,9,'gKT47Mk3Cy3Mbi22AC52','2015-06-18 06:55:26','activation'),
	(14,13,'212z3emKd2638G16jrZ3','2015-06-18 07:16:39','activation'),
	(15,14,'n45vZD3Gi0S5o71R0e2R','2015-06-18 07:25:14','activation'),
	(16,15,'D8827629L6Vt51BXv66v','2015-06-18 07:29:31','activation'),
	(17,16,'lx80Q07832325UjNa0e0','2015-06-20 06:21:16','activation'),
	(18,17,'13H3X531D46N66pbd6P5','2015-09-24 13:57:59','activation');

/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`)
VALUES
	(112,10,'b4e7161248019642674ef55be595835743c40a66','2015-07-19 05:54:37','145.19.255.115','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.124 Safari/537.36','8d9613a26e26cdecc36edf15a246151eadc61082'),
	(127,12,'085ad325e79c5c88dfed5fb8106bacb38d1ac9c9','2015-07-26 09:16:20','84.26.254.113','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/43.0.2357.130 Safari/537.36','724014a1f406eaafa77f4807823fbb2ba6eb5139'),
	(131,5,'9e05eea03526f485c5a21fe1b76c04a7f3e515ed','2015-09-16 15:58:22','84.26.234.2','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36','71e214db4d566b8b751551d3887b7b7991bdd459'),
	(132,11,'0a63bba6e80a06240e5c91068f72b88f62b0f7eb','2015-10-03 05:21:33','145.19.251.164','Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36','9aa6d99f726bf1bdd2949997abe11dedbc5d135e'),
	(141,1,'55e4979c2f68d398e497e57afbe492f1091acc68','2015-10-23 14:23:21','::1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.99 Safari/537.36','35f0a510c30bdae5c1c6f7ec27513295f5f968fb');

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Surveillant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Surveillant`;

CREATE TABLE `Surveillant` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GebruikerID` int(11) DEFAULT NULL,
  `Actief` tinyint(1) NOT NULL DEFAULT '1',
  `Voornaam` varchar(128) NOT NULL,
  `Tussenvoegsel` varchar(16) DEFAULT NULL,
  `Achternaam` varchar(128) NOT NULL,
  `WerknemerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Surveillant_users` (`GebruikerID`),
  CONSTRAINT `FK_Surveillant_users` FOREIGN KEY (`GebruikerID`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Surveillant` WRITE;
/*!40000 ALTER TABLE `Surveillant` DISABLE KEYS */;

INSERT INTO `Surveillant` (`ID`, `GebruikerID`, `Actief`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `WerknemerID`)
VALUES
	(1,1,1,'Thijs','','Clowting',1211),
	(2,5,1,'Thijs','van der ','Eerden',1123),
	(4,12,0,'Quentin','','Geervliet',1112),
	(21,10,1,'Bryan','','Buijs',1),
	(23,11,1,'Joren','van den','Bos',2111),
	(28,NULL,0,'Raymon','de','Looff',1121),
	(29,8,1,'Raymon','de','Vaak',652),
	(30,9,0,'Joren','vd','Bos',542),
	(31,NULL,0,'Thijs','vd','Eerden',632),
	(34,NULL,0,'RIKKERRRRTTT','BIEM','ANSERARA',3),
	(40,15,0,'Rikk','andre','Rieu',10),
	(41,NULL,0,'Bryan',NULL,'Buijs',26),
	(42,NULL,1,'Rikkert','van','Rieu',10),
	(44,NULL,1,'Toby','vd','Wouden',555555);

/*!40000 ALTER TABLE `Surveillant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Tentamen
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tentamen`;

CREATE TABLE `Tentamen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OpleidingID` int(11) NOT NULL DEFAULT '0',
  `Naam` varchar(128) NOT NULL,
  `Opmerking` varchar(2048) DEFAULT NULL,
  `Aantal` tinyint(4) NOT NULL DEFAULT '1',
  `Dag` date DEFAULT NULL,
  `Week` tinyint(2) DEFAULT NULL,
  `BeginTijd` time DEFAULT NULL,
  `EindTijd` time DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Tentamen_Opleiding` (`OpleidingID`),
  CONSTRAINT `FK_Tentamen_Opleiding` FOREIGN KEY (`OpleidingID`) REFERENCES `Opleiding` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Tentamen` WRITE;
/*!40000 ALTER TABLE `Tentamen` DISABLE KEYS */;

INSERT INTO `Tentamen` (`ID`, `OpleidingID`, `Naam`, `Opmerking`, `Aantal`, `Dag`, `Week`, `BeginTijd`, `EindTijd`)
VALUES
	(1,1,'English for ICT','Antwoorden bladen niet vergeten.',1,'2015-06-19',25,'12:00:00','14:00:00'),
	(2,7,'ABP ','We want Wolfert back',1,'2015-06-19',25,'17:00:00','18:30:00'),
	(3,1,'English for ICT',NULL,1,'2015-07-17',29,'13:00:00','14:30:00'),
	(4,1,'Carlo helpen',NULL,1,'2015-06-19',25,'14:30:00','16:00:00'),
	(5,2,'Rekenen','Geen rekenmachines!',1,'2015-06-25',26,'12:00:00','13:00:00'),
	(6,1,'Project week','Rondlopen en checken of die gappies niet aan het gamen zijn.',2,'2015-06-18',25,'09:00:00','17:00:00'),
	(7,1,'Carlo helpen',NULL,1,'2015-06-19',25,'13:00:00','14:00:00'),
	(8,7,'Appels tellen','Geen stoute dingen doen.',1,'2015-07-17',29,'14:00:00','16:00:00'),
	(9,1,'ICT Project',NULL,1,'2015-06-18',25,'13:00:00','14:30:00'),
	(10,6,'Inleiding Bedrijfskunde ',NULL,1,'2015-06-17',25,'13:00:00','14:00:00'),
	(11,6,'Programmeren 2',NULL,1,'2015-06-17',25,'14:30:00','16:00:00'),
	(12,1,'Business Intelligence',NULL,3,'2015-06-16',25,'14:00:00','15:30:00'),
	(14,1,'WebWereld','Casus toets',1,'2015-06-17',25,'15:00:00','16:30:00'),
	(15,8,'Appels eten','Yolo',2,'2015-09-09',37,'14:00:00','15:00:00'),
	(16,2,'appels tellen','GROTE APPELS KOPEN',1,'2015-06-23',26,'09:00:00','10:30:00');

/*!40000 ALTER TABLE `Tentamen` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table TentamenSurveillant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TentamenSurveillant`;

CREATE TABLE `TentamenSurveillant` (
  `TentamenID` int(11) NOT NULL,
  `SurveillantID` int(11) NOT NULL,
  PRIMARY KEY (`TentamenID`,`SurveillantID`),
  KEY `FK_TentamenSurveillant_Surveillant` (`SurveillantID`),
  CONSTRAINT `FK_TentamenSurveillant_Surveillant` FOREIGN KEY (`SurveillantID`) REFERENCES `Surveillant` (`ID`),
  CONSTRAINT `FK_TentamenSurveillant_Tentamen` FOREIGN KEY (`TentamenID`) REFERENCES `Tentamen` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `TentamenSurveillant` WRITE;
/*!40000 ALTER TABLE `TentamenSurveillant` DISABLE KEYS */;

INSERT INTO `TentamenSurveillant` (`TentamenID`, `SurveillantID`)
VALUES
	(2,1),
	(3,1),
	(3,2),
	(4,1),
	(7,21),
	(8,1),
	(8,21),
	(9,1),
	(10,21),
	(11,2),
	(12,42),
	(14,21);

/*!40000 ALTER TABLE `TentamenSurveillant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `salt` varchar(120) DEFAULT NULL,
  `rank` varchar(120) NOT NULL DEFAULT 'user' COMMENT 'user of admin',
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `rank`, `isactive`, `dt`)
VALUES
	(1,'thijs@clowting.me','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'admin',1,'2015-06-16 15:33:41'),
	(5,'thijsvde@mailprovider.nl','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'user',1,'2015-06-17 09:46:49'),
	(8,'thijs@test.me','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'user',0,'2015-06-17 11:36:52'),
	(9,'lol@hotmail.com','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'user',0,'2015-06-17 12:55:26'),
	(10,'bryan@mailprovider.nl','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'admin',1,'2015-06-17 13:07:44'),
	(11,'joren@mailprovider.nl','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'admin',1,'2015-06-17 13:10:51'),
	(12,'qg@yolomailcentrale.nl','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'admin',1,'2015-06-17 13:11:46'),
	(13,'knapen123@gmail.com','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'user',0,'2015-06-17 13:16:39'),
	(14,'knapen1234@gmail.com','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'user',0,'2015-06-17 13:25:14'),
	(15,'knapen12345@gmail.com','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'user',0,'2015-06-17 13:29:31'),
	(16,'test@test.nl','$2y$10$7n2tvyKV0johcMqWpd272.EoVL9.Iqcvr7empP/dkvS/6.2ao4AtW',NULL,'user',0,'2015-06-19 12:21:16');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
