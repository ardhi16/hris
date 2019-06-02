# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: hris
# Generation Time: 2019-06-02 15:07:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contract
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contract`;

CREATE TABLE `contract` (
  `contract_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `contract_period` int(11) DEFAULT NULL,
  `contract_length` int(11) DEFAULT NULL,
  PRIMARY KEY (`contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contract` WRITE;
/*!40000 ALTER TABLE `contract` DISABLE KEYS */;

INSERT INTO `contract` (`contract_id`, `employee_id`, `contract_period`, `contract_length`)
VALUES
	(1,1,1,12);

/*!40000 ALTER TABLE `contract` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table division
# ------------------------------------------------------------

DROP TABLE IF EXISTS `division`;

CREATE TABLE `division` (
  `division_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `division_code` varchar(10) DEFAULT NULL,
  `division_name` varchar(100) DEFAULT NULL,
  `division_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `division_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `division` WRITE;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;

INSERT INTO `division` (`division_id`, `division_code`, `division_name`, `division_created_at`, `division_updated_at`)
VALUES
	(1,'99','Human Resource Administration','2019-05-28 20:10:23','2019-05-28 20:11:56');

/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employee
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `employee_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_nik` varchar(20) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `employee_join_date` date DEFAULT NULL,
  `employee_exit_date` date DEFAULT NULL,
  `employee_pob` varchar(100) DEFAULT NULL,
  `employee_bdate` date DEFAULT NULL,
  `employee_gender` enum('L','P') DEFAULT NULL,
  `employee_ktp` varchar(16) DEFAULT NULL,
  `employee_current_address` text,
  `employee_current_postcode` varchar(10) DEFAULT NULL,
  `employee_current_village` varchar(100) DEFAULT NULL,
  `employee_current_district` varchar(100) DEFAULT NULL,
  `employee_id_address` text,
  `employee_id_postcode` varchar(10) DEFAULT NULL,
  `employee_id_village` varchar(100) DEFAULT NULL,
  `employee_id_district` varchar(100) DEFAULT NULL,
  `employee_phone` varchar(15) DEFAULT NULL,
  `employee_email` varchar(100) DEFAULT NULL,
  `employee_mother` varchar(255) DEFAULT NULL,
  `employee_married` enum('TIDAK MENIKAH','MENIKAH','DUDA','JANDA') DEFAULT NULL,
  `employee_status` enum('KONTRAK','TETAP') DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `employee_acc_bank` varchar(100) DEFAULT NULL,
  `employee_no_bpjskes` varchar(100) DEFAULT NULL,
  `employee_no_bpjstk` varchar(100) DEFAULT NULL,
  `employee_tax_status` enum('MENIKAH','TIDAK MENIKAH') DEFAULT NULL,
  `employee_children` int(11) DEFAULT '0',
  `employee_npwp` varchar(100) DEFAULT NULL,
  `employee_family_card` varchar(20) DEFAULT NULL,
  `employee_ordner` varchar(20) DEFAULT NULL,
  `employee_active` enum('1','0') DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `employee_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employee_id`),
  KEY `nik` (`employee_nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;

INSERT INTO `employee` (`employee_id`, `employee_nik`, `employee_name`, `store_id`, `employee_join_date`, `employee_exit_date`, `employee_pob`, `employee_bdate`, `employee_gender`, `employee_ktp`, `employee_current_address`, `employee_current_postcode`, `employee_current_village`, `employee_current_district`, `employee_id_address`, `employee_id_postcode`, `employee_id_village`, `employee_id_district`, `employee_phone`, `employee_email`, `employee_mother`, `employee_married`, `employee_status`, `position_id`, `employee_acc_bank`, `employee_no_bpjskes`, `employee_no_bpjstk`, `employee_tax_status`, `employee_children`, `employee_npwp`, `employee_family_card`, `employee_ordner`, `employee_active`, `user_id`, `employee_created_at`, `employee_updated_at`)
VALUES
	(1,'12096398','Achyar Anshorie',1,'2019-05-10',NULL,'Bogor','2019-05-01','L','3201131012940003','Waringin Jaya rt.01 rw.03 no.18','16925','Bojonggede','Bogor','WARINGIN JAYA RT.01 RW.03 NO.18','16925','Bojonggede','Bogor','0811366875','achyar@gmail.com','Maryam','MENIKAH','TETAP',1,'1234567890','111222333','5554455544','MENIKAH',1,'234567654323','3201131012000010','A1234','1',1,'2019-05-29 00:22:41','2019-06-02 22:05:46');

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table family
# ------------------------------------------------------------

DROP TABLE IF EXISTS `family`;

CREATE TABLE `family` (
  `employee_id` int(11) unsigned NOT NULL,
  `family_name` varchar(255) DEFAULT NULL,
  `family_relation` enum('AYAH','IBU','ANAK','SUAMI','ISTRI') DEFAULT NULL,
  `family_bdate` date DEFAULT NULL,
  `family_gender` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table grade
# ------------------------------------------------------------

DROP TABLE IF EXISTS `grade`;

CREATE TABLE `grade` (
  `grade_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(10) DEFAULT NULL,
  `grade_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `grade_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;

INSERT INTO `grade` (`grade_id`, `grade_name`, `grade_created_at`, `grade_updated_at`)
VALUES
	(1,'1 (Satu)','2019-05-28 20:15:13','2019-05-28 20:15:26');

/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table position
# ------------------------------------------------------------

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `position_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_code` varchar(10) DEFAULT NULL,
  `position_name` varchar(100) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `position_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `position_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;

INSERT INTO `position` (`position_id`, `position_code`, `position_name`, `grade_id`, `division_id`, `position_created_at`, `position_updated_at`)
VALUES
	(1,'HR01','HRA Staff',1,1,'2019-05-28 20:25:54','2019-05-28 22:52:01');

/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`role_id`, `role_name`)
VALUES
	(1,'SUPERADMIN'),
	(2,'ADMIN'),
	(3,'USER');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table school
# ------------------------------------------------------------

DROP TABLE IF EXISTS `school`;

CREATE TABLE `school` (
  `school_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `school_level` enum('SMA','S1','S2','S3') DEFAULT NULL,
  `school_major` varchar(100) DEFAULT NULL,
  `school_name` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;

INSERT INTO `school` (`school_id`, `employee_id`, `school_level`, `school_major`, `school_name`)
VALUES
	(1,1,'SMA','Multimedia','SMK Bogor');

/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table store
# ------------------------------------------------------------

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store` (
  `store_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `store_code` varchar(10) DEFAULT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `store_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `store_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `store` WRITE;
/*!40000 ALTER TABLE `store` DISABLE KEYS */;

INSERT INTO `store` (`store_id`, `store_code`, `store_name`, `store_created_at`, `store_updated_at`)
VALUES
	(1,'100','Bojonggede Barat','2019-05-28 19:40:00','2019-05-28 20:04:29'),
	(2,'200','Bogor Utara','2019-05-28 20:05:24',NULL);

/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_fullname`, `user_image`, `role_id`, `user_created_at`, `user_updated_at`)
VALUES
	(1,'admin','$2y$10$HX3CGLS/LqhwlSM5zmnbcOReN2PEXmIWt1UpU8bsNbGw8KO4I1FfC','admin@admin.com','Administrator',NULL,1,'2019-05-28 19:09:24','2019-05-28 19:09:58');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
