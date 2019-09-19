# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.25)
# Database: hris
# Generation Time: 2019-09-19 08:55:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contract
# ------------------------------------------------------------

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
	(1,1,1,12),
	(4,5,1,12),
	(5,78,1,6);

/*!40000 ALTER TABLE `contract` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cuti
# ------------------------------------------------------------

CREATE TABLE `cuti` (
  `cuti_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) DEFAULT NULL,
  `cuti_start` date DEFAULT NULL,
  `cuti_end` date DEFAULT NULL,
  `cuti_desc` text,
  `cuti_total` int(11) DEFAULT '0',
  `cuti_year` year(4) DEFAULT NULL,
  `cuti_status` int(11) DEFAULT '0',
  `cuti_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cuti_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cuti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table division
# ------------------------------------------------------------

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
	(1,'01','BISNIS','2019-06-10 14:03:38','2019-06-12 11:20:10'),
	(2,'02','SDI &amp; UMUM','2019-06-10 14:04:16','2019-06-12 11:20:39'),
	(3,'03','OPERATIONAL &amp; MANAJEMEN RESIKO','2019-06-10 14:04:34','2019-06-12 11:20:31'),
	(4,'04','LEGAL','2019-06-12 11:20:01',NULL),
	(5,'05','INTERNAL AUDIT','2019-06-12 11:22:47',NULL);

/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employee
# ------------------------------------------------------------

CREATE TABLE `employee` (
  `employee_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_nik` varchar(20) DEFAULT NULL,
  `employee_pin` varchar(255) DEFAULT NULL,
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

INSERT INTO `employee` (`employee_id`, `employee_nik`, `employee_pin`, `employee_name`, `store_id`, `employee_join_date`, `employee_exit_date`, `employee_pob`, `employee_bdate`, `employee_gender`, `employee_ktp`, `employee_current_address`, `employee_current_postcode`, `employee_current_village`, `employee_current_district`, `employee_id_address`, `employee_id_postcode`, `employee_id_village`, `employee_id_district`, `employee_phone`, `employee_email`, `employee_mother`, `employee_married`, `employee_status`, `position_id`, `employee_acc_bank`, `employee_no_bpjskes`, `employee_no_bpjstk`, `employee_tax_status`, `employee_children`, `employee_npwp`, `employee_family_card`, `employee_ordner`, `employee_active`, `user_id`, `employee_created_at`, `employee_updated_at`)
VALUES
	(1,'011902105','$2y$10$ASoLGL50AAGzEnOARgtxGeegKnUJPxZmjM1PO41HVa3sKsZCOBkzq','Trianti Puspa Sari Sinaga',14,'2019-01-14',NULL,'BEKASI','1989-01-24','P','3275116401890004','Perumahan Mayang Pratama Blok D6 No 2 RT.05 RW.08 Kelurahan Mustikasari Kecamatan Mustikajaya\r\n','17157','MUSTIKA JAYA','BEKASI','Perumahan Mayang Pratama Blok D6 No 2 RT.05 RW.08 Kelurahan Mustikasari Kecamatan Mustikajaya\r\n','17157','MUSTIKA JAYA','BEKASI','082208235877','PUSPA.SINAGA89@GMAIL.COM','KUSDARIAH','JANDA','KONTRAK',33,'7126145262','','','MENIKAH',3,'784106056412000','3275111608160022','L-70','1',1,'2019-06-13 08:53:10','2019-06-14 14:51:14'),
	(2,'051600254','$2y$10$lqiCi2cI7/bS5dP80nyjUeavsaThXQ5MCgxX83d19PsaBHkS74gGq','Astri Yuningsih',14,'2016-05-25',NULL,'BEKASI','1992-10-15','P','3216015510920005','JL Marunda Makmur KP Kebon Kelapa RT.05 RW.02 No.6 Kelurahan Segaramakmur Kecamatan. Tarumajaya\r\n','17211','TARUMAJAYA','BEKASI','JL Marunda Makmur KP Kebon Kelapa RT.05 RW.02 No.6 Kelurahan Segaramakmur Kecamatan. Tarumajaya\r\n','17211','TARUMAJAYA','BEKASI','08567105140','ASTRI.YUNINGSIH15@GMAIL.COM','ASINAH','TIDAK MENIKAH','TETAP',94,'7099397963','0001772873324','3216015510920007','TIDAK MENIKAH',0,'765416979435000','3216010704070951','B-11','1',1,'2019-06-13 09:04:55',NULL),
	(3,'031700163','$2y$10$D1QRC5bvFT2ZImqGBdSUquD8h9verDh9j7/q8P2HzmGaoP3yaq3xa','Agung Dwi Kuncoro',8,'0000-00-00',NULL,'kudus','1978-04-10','L','3275011004780022','KP Rawa Semut No : 57 Rt.01 Rw.012 Kelurahan Margahayu Kecamatan Bekasi Timur\r\n','17113','bekasi timur','bekasi','KP Rawa Semut No : 57 Rt.01 Rw.012 Kelurahan Margahayu Kecamatan Bekasi Timur\r\n','17113','bekasi timur','bekasi','','','','MENIKAH','KONTRAK',52,'','','','MENIKAH',0,'','','a-1','1',1,'2019-06-13 11:14:00',NULL),
	(4,'031201023','$2y$10$crrvFYvyWFzHwiPpzUazu.vXR1gC.mSqWEoOEJgIgKkkpAvbj6ayG','Agung Fatiris',4,'2013-01-03',NULL,'JAKARTA','1989-07-08','L','3209230807890007','Blok Kajengan Kidul RT.011 RW.003 Kelurahan. Danawinangun Kecamatan. Klangenan Cirebon\r\n','45157','klangenan','cirebon','Blok Kajengan Kidul RT.011 RW.003 Kelurahan. Danawinangun Kecamatan. Klangenan Cirebon\r\n','45157','klangenan','cirebon','','','','MENIKAH','TETAP',55,'','','','MENIKAH',0,'','','','1',1,'2019-06-13 11:29:30','2019-09-17 19:09:27'),
	(5,'021800377','$2y$10$qb3SxqaVdyyKcoQbRUn4V.FA2t6HS1AMJeYSuTgxndob6o7dUUOQy','Ajeng Ratnasiwi',13,'2018-02-19',NULL,'CIANJUR','1995-04-04','P','','Kampung Babakan Rt. 02 Rw. 03 Kelurahan. Mustikasari Kecamatan. Mustikajaya Bekasi\r\n','17158','mustikajaya','bekasi','Kampung Babakan Rt. 02 Rw. 03 Kelurahan. Mustikasari Kecamatan. Mustikajaya Bekasi\r\n','17158','muatikajaya','bekasi','','','','TIDAK MENIKAH','KONTRAK',55,'','','','TIDAK MENIKAH',0,'','','','1',1,'2019-06-13 11:37:47',NULL),
	(6,'021008019','$2y$10$q4qFwiVkhOoKgOmoZbjY/eUhUTPDXn5tgxvOYBnD/ZHqcZYhLz6l6','Andhi',1,'2010-02-09',NULL,'JAKARTA','1977-03-18','L','3275081803770021','JL Setia 1 No : 19 RT.05 RW.04 Kelurahan. Jatiwaringin Kecamatan. Pondok Gede Bekasi\r\n','17433','pondok gede ','bekasi','JL Setia 1 No : 19 RT.05 RW.04 Kelurahan. Jatiwaringin Kecamatan. Pondok Gede Bekasi\r\n','17433','pondok gede','bekasi','','','','MENIKAH','TETAP',87,'','','','TIDAK MENIKAH',0,'','','a-4','1',1,'2019-06-13 11:46:11',NULL),
	(7,'051800589','$2y$10$WVxXdWLA/tTii7l.7Emeku4eMaUfm7saog.vIFkRPi3M0K0BvCwKq','Anggi Nury Chela Savela',14,'2018-05-14',NULL,'PURWOREJO','2000-04-14','P','3275065404000009','KP Rawa Bambu RT.01 RW.009 Kelurahan. Kalibaru Kecamatan. Medan Satria Bekasi\r\n','17133','medan satria','bekasi','KP Rawa Bambu RT.01 RW.009 Kelurahan. Kalibaru Kecamatan. Medan Satria Bekasi\r\n','17133','medan satria','bekASI','','','','TIDAK MENIKAH','KONTRAK',25,'','','','TIDAK MENIKAH',0,'','','A-5','1',1,'2019-06-13 11:54:36',NULL),
	(8,'031600352','$2y$10$eBafeuoXAY6GVzykCZU3duxeLCYSiH333FC2Fy0MVLYNlQBqy8wwC','Antoni S Taher',7,'2016-03-24',NULL,'KLATEN','1986-07-09','L','3275040907860017','KP Tanah Dua Ratus RT.05 RW. 006 Kelurahan. Margajaya Kecamatan. Bekasi Selatan\r\n','17113','BEKASI SELATAN','BEKASI','KP Tanah Dua Ratus RT.05 RW. 006 Kelurahan. Margajaya Kecamatan. Bekasi Selatan\r\n','17113','BEKASI SELATAN','BEKASI','','','','TIDAK MENIKAH','TETAP',54,'','','3275040907860017','TIDAK MENIKAH',0,'','','A-6','1',1,'2019-06-13 12:01:52','2019-06-18 09:55:30'),
	(9,'031401034','$2y$10$zdUSli6bAgZg3xwfxKjOBe4K2lj5TGeo1Us.S6JcXcCdfnSmStYKq','Ardi Nurdian',10,'2014-03-10',NULL,'CIAMIS','1994-04-10','L','3207241004940001','JL Rawa Kalong Perumahan Taman Alamanda Blok E3 No. 4 Bekasi\r\n','17510','','BEKASI','JL Rawa Kalong Perumahan Taman Alamanda Blok E3 No. 4 Bekasi\r\n','17510','','BEKASI','','','','TIDAK MENIKAH','TETAP',53,'','','3207241004940001','TIDAK MENIKAH',0,'','','b-7','1',1,'2019-06-13 12:10:26','2019-06-18 09:33:14'),
	(10,'021402033','$2y$10$oY9AnfFq9lN6lXq7nGD1K.Kqe25GFXHO9wVSpUbXo9ziXnNk9R1/i','Arie Budiyanto',6,'2014-02-20',NULL,'BEKASI','1990-01-15','L','3275031501900029','Taman Wisma Asri Blok BB 39 No. 8 RT.06 RW.04 Kelurahan. Teluk Pucung Kecamatan. Bekasi Utara\r\n','17121','bekasi utara','bekasi','Taman Wisma Asri Blok BB 39 No. 8 RT.06 RW.04 Kelurahan. Teluk Pucung Kecamatan. Bekasi Utara\r\n','17121','bekasi timur','bekasi','','','','MENIKAH','TETAP',54,'','','3275031501900029','MENIKAH',0,'','','b-8','1',1,'2019-06-13 13:04:31','2019-06-18 09:53:22'),
	(11,'041800183','$2y$10$PjljIFpMtjxToJSXrWNI/.3GSm6yGhmN.7X/dCwvcksk93uxZCsQ2','Arif Afriyadi',14,'2018-04-20',NULL,'JAKARTA','1984-06-17','L','3175071706840011','KP Jembatan RT.04 RW.01 No. 119 Kelurahan. Penggilingan Kecamatan. Cakung Jakarta Timur\r\n','13940','cakung','jakarta timur','KP Jembatan RT.04 RW.01 No. 119 Kelurahan. Penggilingan Kecamatan. Cakung Jakarta Timur\r\n','13940','cakung','jakarta timur','','','','MENIKAH','KONTRAK',7,'','','','MENIKAH',0,'','','b-9','1',1,'2019-06-13 13:17:16',NULL),
	(12,'051800387','$2y$10$mZHL2etdAdKe93e5utWnoOXMrY96yitTQml9/XkUbeWYcs.U0LUrO','Asep Sumaryo',10,'2018-05-14',NULL,'BEKASI','1995-06-30','L','3216133006950003','KP Rumbia RT.03 RW.02 Kelurahan. Karangreja Kecamatan. Pebayuran Bekasi\r\n','17710','pebayuran','bekasi','KP Rumbia RT.03 RW.02 Kelurahan. Karangreja Kecamatan. Pebayuran Bekasi\r\n','17710','pebayuran','bekasi','','','','TIDAK MENIKAH','KONTRAK',55,'','','','TIDAK MENIKAH',0,'','','b-10','1',1,'2019-06-13 13:27:16',NULL),
	(13,'071800396','$2y$10$JS7HTorur82rZqdQt9JFBeQZ.pm/kWmL100uZDEmt25AWGGd97pdm','Ayuwandira',15,'2018-07-05',NULL,'JAKARTA','1996-11-27','P','3175066711960009','KP Rawa Badung RT.08 RW.07 No. 200 Sektor B Kelurahan. Jatinegara Kecamatan. Cakung \r\n','13930','cakung','jakarta timur','KP Rawa Badung RT.08 RW.07 No. 200 Sektor B Kelurahan. Jatinegara Kecamatan. Cakung \r\n','13930','cakung ','jakarta timur','','','','TIDAK MENIKAH','KONTRAK',24,'','','','TIDAK MENIKAH',0,'','','b-12','1',1,'2019-06-13 13:43:38',NULL),
	(14,'121700170','$2y$10$Y3I1MgSmdjF18ENIf/Y/bewS3QU35L3QahRN8KVAIk2XD1NEqdyXK','Badru Nurjaman',15,'2017-12-05',NULL,'BEKASI','1995-02-19','L','3216091902950005','KP Laum Lebak RT.04 RW.02 Kelurahan. Simpangan Kecamatan. Cikarang Utara Bekasi\r\n','17534','cikarang utara','bekasi','KP Laum Lebak RT.04 RW.02 Kelurahan. Simpangan Kecamatan. Cikarang Utara Bekasi\r\n','17534','cikarang utara','bekasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','C-13','1',1,'2019-06-13 13:52:56',NULL),
	(15,'080603003','$2y$10$beMdb7qq3g8LLqDWKhkq6OV7DPBAhzdpKGN5jkl8jXKwehXS9iowy','Bambang Lulus S',14,'2016-09-01',NULL,'JAKARTA','1977-11-27','L','3175072711770009','JL Pahlawan Revolusi GG. H Mutolib  RT.04 RW.03 No. 24 Kelurahan. Pondok Bambu Kecamatan. Duren Sawit\r\n','13430','DUREN SAWIT','JAKARTA TIMUR','JL Pahlawan Revolusi GG. H Mutolib  RT.04 RW.03 No. 24 Kelurahan. Pondok Bambu Kecamatan. Duren Sawit\r\n','13430','DUREN SAWIT','JAKARTA TIMUR','','','','MENIKAH','TETAP',46,'','','3175072711770009','MENIKAH',0,'','','C-14','1',1,'2019-06-13 14:00:01','2019-06-18 09:15:00'),
	(16,'031800182','$2y$10$11GxTHHQ78pFpA8coyVYrudDI3F.WRi19CaMLu0tyaI.I7Vc6jEdW','Bintang Cynthya Putri',5,'2018-03-23',NULL,'JAKARTA','1997-02-02','P','3275054202970019','JL Lumbu Tengah 3L No.128 RT.02 RW.09 Keluarahan. Bojong Rawalumbu Kecamatan. Rawalumbu \r\n','17116','RAWALUMBU','BEKASI','JL Lumbu Tengah 3L No.128 RT.02 RW.09 Keluarahan. Bojong Rawalumbu Kecamatan. Rawalumbu \r\n','17116','RAWALUMBU','BEKASI','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','C-15','1',1,'2019-06-13 14:07:07',NULL),
	(17,'031600251','$2y$10$JrWQBSOEi.TEobGXMUciVOJ8szsMR603WDrsJhI6ueezC9V6AKaB6','Chaidir',4,'2016-03-25',NULL,'JAKARTA','1978-08-26','L','3171082608780001','JL Arimbi No. 37 RT.02 RW.07 Kelurahan. Tanah Tinggi Kecamatan. Johar Baru','10560','johar baru','jakarta pusat','JL Arimbi No. 37 RT.02 RW.07 Kelurahan. Tanah Tinggi Kecamatan. Johar Baru\r\n','10560','johar baru','jakarta pusat','','','','TIDAK MENIKAH','TETAP',53,'','','3171082608780001','TIDAK MENIKAH',0,'','','c-16','1',1,'2019-06-13 14:13:06','2019-06-18 09:54:51'),
	(18,'021002013','$2y$10$I5sF5n9jzi.Yhp8mbCfRX.te1ttRy8k1dWtm/goIgd9Cy7WWDgY6G','Dadi Haris M',15,'2010-05-11',NULL,'INDRAMAYU','1978-10-19','L','3275011910780017','KP Rawa Semut RT.02 RW.12 Kelurahan. Margahayu Kecamatan. Bekasi Timur \r\n','17113','bekasi timur','bekasi','KP Rawa Semut RT.02 RW.12 Kelurahan. Margahayu Kecamatan. Bekasi Timur \r\n','17113','bekasi timur','bekasi','','','','TIDAK MENIKAH','TETAP',59,'','','3275011910780017','TIDAK MENIKAH',0,'','','c-17','1',1,'2019-06-13 14:21:37','2019-06-18 08:59:23'),
	(19,'121700271','$2y$10$5rGily5g5ZoPYu8fqBC70uStZv/T5c0soBAHR25/y7FbnQDJRJhgu','Desy Nurafni',7,'2017-12-05',NULL,'JAKARTA','1995-12-13','P','3275085312950006','JL H Taqwa Jatimakmur RT.03 RW.09 Kelurahan. Jatimakmur Kecamatan. Pondok Gede \r\n','17432','pondok gede','bekasi','JL H Taqwa Jatimakmur RT.03 RW.09 Kelurahan. Jatimakmur Kecamatan. Pondok Gede \r\n','17432','pondok gede','bekasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','c-18','1',1,'2019-06-13 14:28:15',NULL),
	(20,'041800184','$2y$10$IwqcPonYQvRFPTBYc0L6IOhCvZrbV2tzwvG.DuqSUqQH4TTnguAZW','Dian Savanah',15,'2018-04-20',NULL,'BEKASI','1999-03-29','P','3275046903990011','KP Kayuringin RT.04 RW.12 Kelurahan. Kayuringinjaya Kecamatan. Bekasi Selatan\r\n',' 17144','bekasi selatan','bekasi','KP Kayuringin RT.04 RW.12 Kelurahan. Kayuringinjaya Kecamatan. Bekasi Selatan\r\n',' 17144','bekasi selatan','bakasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','d-19','1',1,'2019-06-13 14:32:42',NULL),
	(21,'011903101','$2y$10$ExLW8HUlwc35w47U1ddShe3RvhBQv/MQMgElx6cKGRD0GWunDGwbG','Dinar Titah Sepdyandini',8,'2019-01-08',NULL,'JAKARTA','1998-12-09','P','3275095309980013','JL H Mudiar Rt.05 RW.01 Kelurahan. Jatikramat Kecamatan. Jatiasih\r\n','17423','jatiasih','bekasi','JL H Mudiar Rt.05 RW.01 Kelurahan. Jatikramat Kecamatan. Jatiasih\r\n','17423','jatiasih','bekasi','','','','TIDAK MENIKAH','KONTRAK',25,'','','','TIDAK MENIKAH',0,'','','d-20','1',1,'2019-06-13 14:38:13',NULL),
	(22,'021800382','$2y$10$f0JLUbUBMQbUz1jhDk.NteFrcGVJ8yd0CJYK7bfbfFsL48bOA/1om','Dwi Kurniawan',14,'2018-02-22',NULL,'JAKARTA','1985-07-02','L','3171050207850003','JL RA Kartini GG Mawar VI RT.07 RW.03 Kelurahan. Margahayu Kecamatan.Bekasi Timur\r\n\r\n','17113','bekasi timur','bekasi','JL RA Kartini GG Mawar VI RT.07 RW.03 Kelurahan. Margahayu Kecamatan.Bekasi Timur\r\n','17113','bekasi timur','bekasi','','','','MENIKAH','KONTRAK',2,'','','','MENIKAH',0,'','','d-21','1',1,'2019-06-13 14:45:33',NULL),
	(23,'071800194','$2y$10$U7jzDoUsSvrj4eAoVgsjquwFWeuIvvfe544ncMhySZqdEzCRgkmMK','Elisa Marwati',10,'2018-07-04',NULL,'PURBALINGGA','1997-07-31','P','3275047107970003','JL Damar VI Pekayon Jaya RT.06 RW.06 Kelurahan. Pekayon Jaya Kecamatan. Pekayon Jaya Bekasi\r\n','17148','pekayon jaya','bekasi','JL Damar VI Pekayon Jaya RT.06 RW.06 Kelurahan. Pekayon Jaya Kecamatan. Pekayon Jaya Bekasi\r\n','17148','pekayon jaya','bekasi','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','d-22','1',1,'2019-06-13 14:53:14',NULL),
	(24,'111302031','$2y$10$mEXksA7MZHmJlGpWrrINpuv8WT8sCR5x6OOG.rQnockcSbpUHt6zu','Faisal',15,'2013-12-18',NULL,'JAKARTA','1981-01-01','L','3275090101810023','GG Masjid Alfalaq No. 35 RT.03 RW.08 Kelurahan. Jatiasih Kecamatan. Jatiasih Bekasi\r\n','17423	','jatiasih','bekasi','GG Masjid Alfalaq No. 35 RT.03 RW.08 Kelurahan. Jatiasih Kecamatan. Jatiasih Bekasi\r\n','17423	','jatiasih','bekasi','','','','MENIKAH','TETAP',3,'','','3275090101810023','MENIKAH',0,'','','d-23','1',1,'2019-06-13 14:58:43','2019-06-18 09:50:54'),
	(25,'021001012','$2y$10$Ah1JCJWg6phnttwyl4oHEOuWbQW6.rC3RTGf8eFiulpSrFwApo/16','Fasihul Islam',15,'2010-02-08',NULL,'JAKARTA','1983-03-15','L','3275071503830018','Bantar Gebang Utara RT.02 RW.03 Kelurahan. Bantar Gebang Kecamatan. Bantar Gebang\r\n','17151','bantar gebang','bekasi','Bantar Gebang Utara RT.02 RW.03 Kelurahan. Bantar Gebang Kecamatan. Bantar Gebang\r\n','17151','bantar gebang','bekasi','','','','MENIKAH','TETAP',150,'','','3275071503830018','MENIKAH',0,'','','d-24','1',1,'2019-06-13 15:05:33','2019-06-18 08:57:23'),
	(26,'081600156','$2y$10$qMN4fbIOOAiSm/W1cYJ0pO06tkmftcPuB2MsLFVK9I.PO8kfOMyQ2','Faturiah',9,'2019-08-01',NULL,'JAKARTA','1988-06-20','P','3275026006880008','JL Banteng RT.02 RW.015 Kelurahan. Kranji Kecamatan. Bekasi Barat\r\n','17135','bekasi barat','bekasi','JL Banteng RT.02 RW.015 Kelurahan. Kranji Kecamatan. Bekasi Barat\r\n','17135','bekasi barat','bekasi','','','','MENIKAH','KONTRAK',53,'','','3275026006880008','MENIKAH',0,'','','e-25','1',1,'2019-06-13 15:13:22','2019-06-18 09:04:39'),
	(27,'010801006','$2y$10$jeJUSInL9KvG5yx2gxCW8.Cilhv.1ah67GIRhtFhNSDBXlfQft.1y','Gunadi',2,'2010-04-01',NULL,'KUNINGAN','2079-08-18','L','3275061808790031','KP Rawa Pasung RT.09 RW.03 Kelurahan. Kalibaru Kecamatan. Medan Satria\r\n','17133	','medan satria','bekasi','KP Rawa Pasung RT.09 RW.03 Kelurahan. Kalibaru Kecamatan. Medan Satria\r\n','17133	','medan satria','bekasi','','','','TIDAK MENIKAH','TETAP',54,'','','','TIDAK MENIKAH',0,'','','e-26','1',1,'2019-06-13 15:18:24',NULL),
	(28,'091301028','$2y$10$9iNt9p6t5NMmN515UIX06Oa3xMD1PnYrwUs4hZh2hXEEdbPBbOBMS','Hadi Prabowo',14,'2013-09-02',NULL,'JAKARTA','1984-04-21','L','3275032104840014','JL Bogeunville IV Blok S21 Taman Wisma Asri Kelurahan. Teluk pucung Kecamatan. Bekasi Utara\r\n','17121','bekasi utara','bekasi','JL Bogeunville IV Blok S21 Taman Wisma Asri Kelurahan. Teluk pucung Kecamatan. Bekasi Utara\r\n','17121','bekasi utara','bekasi','','','','TIDAK MENIKAH','TETAP',30,'','','3275032104840014','TIDAK MENIKAH',0,'','','e-28','1',1,'2019-06-13 15:29:17','2019-06-18 09:51:39'),
	(29,'081800197','$2y$10$wdi6CRc/ly.XAMoU51nKIe8yyQ3GQPk44haXkZ/AekKwk0CojozIy','Gunthoro Wisnu Saputra',12,'2018-08-30',NULL,'BEKASI','2000-01-29','L','3275082901000026','KP Bojong RawaLele RT.03 RW.09 Kelurahan. Jatimakmur Kecamatan. Pondok Gede \r\n','17432','pondok gede ','bekasi','KP Bojong RawaLele RT.03 RW.09 Kelurahan. Jatimakmur Kecamatan. Pondok Gede \r\n','17432','pondok gede','bekasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','e-27','1',1,'2019-06-13 15:36:44',NULL),
	(30,'091500443','$2y$10$lDpt.EECj6n2cjm0hXsDKeK6k5aYb1kqj4bkUARN94HlYmZPbMD.W','Henry Candra Laksmitawuri',15,'2015-09-25',NULL,'LAMONGAN','1991-02-04','L','3275054402910008','JL Narogong MolekI No. 01 RT.01 RW.019 Kelurahan. Pengasinan Kecamatan. Rawalumbu Bekasi\r\n','17115','rawalumbu','bekasi','JL Narogong MolekI No. 01 RT.01 RW.019 Kelurahan. Pengasinan Kecamatan. Rawalumbu Bekasi\r\n','17115','rawalumbu','bekasi','','','','TIDAK MENIKAH','KONTRAK',23,'','','3275054402910008','TIDAK MENIKAH',0,'','','e-29','1',1,'2019-06-13 16:04:31','2019-06-18 09:37:20'),
	(31,'121500349','$2y$10$/UWx6vMdJhlt3Tr/OmqjA.emThRZ0FE4uQhYAVzoTBU36oUnhZIUO','Ihsan Fathur Rahman',5,'2015-12-25',NULL,'BEKASI','1986-05-28','L','3275042805860009','JL Laskar RT.04 RW.02 Kelurahan. Pekayon Jaya Kecamatan. Bekasi Selatan\r\n','17148','bekasi selatan','bekasi','JL Laskar RT.04 RW.02 Kelurahan. Pekayon Jaya Kecamatan. Bekasi Selatan\r\n','17148','bekasi selatan','bekasi','','','','TIDAK MENIKAH','TETAP',56,'','','3275042805860009','TIDAK MENIKAH',0,'','','e-30','1',1,'2019-06-13 16:16:40','2019-06-18 09:01:46'),
	(32,'121700473','$2y$10$ZUySl66dbRKyd26/.JiwBO2OcEppHe5yGeD3qAcLPPA8Su//sUJ/S','Ika Nopiyanti',11,'2017-12-05',NULL,'BREBES','1993-11-01','P','3175094111930004','JL Raya Ciracas RT.02 RW.05 Kelurahan. Ciracas Kecamatan. Ciracas Jakarta Timur\r\n','13740','ciracas','jakarta timur','JL Raya Ciracas RT.02 RW.05 Kelurahan. Ciracas Kecamatan. Ciracas Jakarta Timur\r\n','13740','ciracas','jakarta timur','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','f-31','1',1,'2019-06-13 16:27:21','2019-06-13 16:52:03'),
	(33,'011905103','$2y$10$0Gt14RvpziM67UM6HxMw9eWX5YpHgdaqWbdgjibTZ5Mdw/O2Sqe7G','Ilham Samsul Alam',13,'2019-01-01',NULL,'BOGOR','1999-09-20','L','3275082009990008','JL Tekel Kamp Pedurenan RT.04 RW.04 Kelurahan Jatiluhur Kecamatan Jatiasih\r\n',' 17425','jatiasih','bekasi','JL Tekel Kamp Pedurenan RT.04 RW.04 Kelurahan Jatiluhur Kecamatan Jatiasih\r\n',' 17425','jatiasih','bekasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','f-32','1',1,'2019-06-13 16:39:30','2019-06-13 16:52:45'),
	(34,'080601001','$2y$10$G0YaGtyOI0DMnrK/g6NrT.AWujrxj4MAcX/B.jonyRzP3nRv0jIpS','Ima Rachmayanty',14,'2006-08-01',NULL,'JAKARTA','1977-11-23','P','3216066311770013','Summarecon bekasi bluebell residence fi/19 rt.005/rw.016\r\n',' 17123','medan satria','kota bekasi','SUMMARECON BEKASI BLUEBELL RESIDENCE FI/19 RT.005/RW.016\r\n',' 17123','medan satria','kota bekasi','087882306189','imarachmayanty@gmail.com','HJ. AMMA SUHANAH','MENIKAH','TETAP',144,'7055293907','0001299526931','3216066311770013','MENIKAH',2,'697193555435000','3275060806160014','f-33','1',1,'2019-06-13 16:50:27','2019-09-02 16:29:05'),
	(35,'091009020','$2y$10$5jm6rL5UJkXAkIS1HQDzw.gvEHorqhKHgJYp7S6n/hGG8Gx9rmD.u','Indra Prasetya',15,'2010-09-27',NULL,'BEKASI','1969-05-17','L','3275011705690005','JL R A Kartini GG Mawar VI RT.07 RW.03 Kelurahan. Margahayu Kecamatan. Bekasi Timur\r\n','17113','bekasi timur','bekasi','JL R A Kartini GG Mawar VI RT.07 RW.03 Kelurahan. Margahayu Kecamatan. Bekasi Timur\r\n','17113','bekasi timur','bekasi','','','','MENIKAH','TETAP',94,'','','3275011705690005','MENIKAH',0,'','','f-34','1',1,'2019-06-13 16:58:37','2019-06-18 09:58:56'),
	(36,'111700167','$2y$10$zJ.DOeMbX6XE9ylTUBnJHu4Y4mcw01wXULbOp7ViVRk6oxKAHiZjC','Indriyani Fitria',15,'2017-06-11',NULL,'GARUT','1996-03-07','P','3275044703950006','JL RH Umar KP Ceger No. 97 RT.02 RW.18 Kelurahan. Jakasetia Kecamatan. Bekasi Selatan\r\n','17153','bekasi selatan','bekasi','JL RH Umar KP Ceger No. 97 RT.02 RW.18 Kelurahan. Jakasetia Kecamatan. Bekasi Selatan\r\n','17153','bekasi selatan','bekasi','','','','MENIKAH','KONTRAK',20,'','','','MENIKAH',0,'','','f-35','1',1,'2019-06-14 08:38:47',NULL),
	(37,'021700159','$2y$10$S.2wCskCMJY9KyBlgqU6C.NdvA5DgQ7nu33uDG4qdhvWI3TvMq13O','Intan Kaerunisah Syarif',1,'2017-01-25',NULL,'BEKASI','1996-04-08','P','3275094804960015','KP Kebantenan RT.04 RW.08 Kelurahan. Jatiasih Kecamatan. Jatiasih Bekasi\r\n','17423','jatiasih','bekasi','KP Kebantenan RT.04 RW.08 Kelurahan. Jatiasih Kecamatan. Jatiasih Bekasi\r\n','17423','jatiasih','bekasi','','','','TIDAK MENIKAH','KONTRAK',25,'','','','TIDAK MENIKAH',0,'','','f-36','1',1,'2019-06-14 09:05:02',NULL),
	(38,'121500147','$2y$10$mJMcEgPfhSTo38hdpXDo4ueoH6fafkE2EwQB6UQHAF6Ac8XYyx1AG','Jon Warisar',15,'2015-12-25',NULL,'BENGKULU','1976-07-27','L','3215142707760002','Taman Alamanda Blok. F11 No. 9 RT.03 RW.019 Kelurahan. Karangsatria Kecamatan. Tambun Utara\r\n',' 17511','tambun utara','bekasi','Taman Alamanda Blok. F11 No. 9 RT.03 RW.019 Kelurahan. Karangsatria Kecamatan. Tambun Utara\r\n',' 17511','tambun utara','bekasi','','','','MENIKAH','TETAP',5,'','','3215142707760002','TIDAK MENIKAH',0,'','','g-37','1',1,'2019-06-14 09:11:53','2019-06-18 09:46:53'),
	(39,'021005016','$2y$10$s4QiwEOudwNg8wvVr592veZsYlDYJXLPRhcUwzP8BleKwuIpJdJnC','Khoirul Masrodhi',13,'2010-02-09',NULL,'BATANG','2085-05-01','L','3275110105850002','Perumahan Graha Harapan Blok A3 No. 3 RT.02 RW.014 Kelurahan. Mustikasari Kecamatan. Mustikajaya \r\n','17158','mustikajaya','bekasi','Perumahan Graha Harapan Blok A3 No. 3 RT.02 RW.014 Kelurahan. Mustikasari Kecamatan. Mustikajaya \r\n','17158','mustikajaya','bekasi','','','','TIDAK MENIKAH','TETAP',53,'','','3275110105850002','TIDAK MENIKAH',0,'','','g-38','1',1,'2019-06-14 09:16:18','2019-06-18 09:57:31'),
	(40,'021700260','$2y$10$vftsz/vQJIZu5Nfa.qL7V.2OHa7sGj5vZHvNgpTsMwV804iYjV.de','Leni Fitriani',15,'2017-02-01',NULL,'PALEMBANG','1983-07-08','P','3275014807830022','JL Koperpu III No. 59 Komplek Sapta Taruna RT.02 RW.025 Kelurahan. Margahayu Kecamatan. Bekasi Timur\r\n','17154','bekasi timur','bekasi','JL Koperpu III No. 59 Komplek Sapta Taruna RT.02 RW.025 Kelurahan. Margahayu Kecamatan. Bekasi Timur\r\n','17154','bekasi timur','bekasi','','','','TIDAK MENIKAH','KONTRAK',59,'','','3275014807830022','TIDAK MENIKAH',0,'','','g-39','1',1,'2019-06-14 09:21:55','2019-06-18 09:05:40'),
	(41,'061501041','$2y$10$nskgrxB5JhJAzmo3QyO/EuKGcb.PVd/4iR44UtdEdXXmfrfuSyWiO','Lili Rahmawati',14,'2015-06-25',NULL,'BEKASI','1993-01-07','P','3275094701930008','KP Pedurenan RT.05 RW.11 Kelurahan. Jatiluhur Kecamatan. Jatiasih Bekasi\r\n','17425','jatiasih','bekasi','KP Pedurenan RT.05 RW.11 Kelurahan. Jatiluhur Kecamatan. Jatiasih Bekasi\r\n','17425','jatiasih','bekasi','','','','TIDAK MENIKAH','TETAP',43,'','','3275094701930008','TIDAK MENIKAH',0,'','','g-40','1',1,'2019-06-14 09:33:28','2019-06-18 09:48:07'),
	(42,'031700162','$2y$10$/6i/Lgb8HIB4FXZmi/Ajme3y8gji7.WKouddh/NShHKYded/KpiDm','M. Zahrul Anam',15,'2017-03-08',NULL,'JAKARTA','1994-07-01','L','3275060107940087','Perum Pejuang Pratama Blok S/ 20 Rt.07 Rw.06 Kelurahan. Pejuang Kecamatan. Medan Satria\r\n',' 17131','medan satria','bekasi','Perum Pejuang Pratama Blok S/ 20 Rt.07 Rw.06 Kelurahan. Pejuang Kecamatan. Medan Satria\r\n',' 17131','medan satria','bekasi','','','','TIDAK MENIKAH','KONTRAK',50,'','','','TIDAK MENIKAH',0,'','','g-41','1',1,'2019-06-14 09:52:23',NULL),
	(43,'071800193','$2y$10$2OTB8UseC8TOhnOHztaQv.CHiICzT36q6Z/na8joVQlUtlpd8CKIq','Meutia Zahra',15,'2018-07-18',NULL,'BEKASI','1995-09-02','P','3275014209950008','JL KH Agus Salim No. 152A RT.08 RW.07 Keluarahan. Bekasi Jaya Kecamatan. Bekasi Timur\r\n','17153','bekasi timur','bekasi','JL KH Agus Salim No. 152A RT.08 RW.07 Keluarahan. Bekasi Jaya Kecamatan. Bekasi Timur\r\n','17153','bekasi timur','bekasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','g-42','1',1,'2019-06-14 10:02:07',NULL),
	(44,'011901099','$2y$10$Rb5mpSKRycjBPLXN7BKfj.9mc9mtwmtYbcQ5zyFRferB/vSi2TC7O','Miftah Farid ',13,'2019-01-09',NULL,'BANDUNG','1996-03-30','L','3204343005960001','KP Tanggeung RT. 01 RW.04 Kelurahan Langensari Kecamatan Solokanjeruk\r\n','40375','solokanjeruk','bandung','KP Tanggeung RT. 01 RW.04 Kelurahan Langensari Kecamatan Solokanjeruk\r\n','40375','solokanjeruk','bandung','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','h-43','1',1,'2019-06-14 10:24:03',NULL),
	(45,'051800286','$2y$10$A/mgGsnuEecgJ6EaGfAnJeXsy2mDz0v58ZbDJME/roUE3ugkKmXce','Muhammad Iqbal',11,'2019-05-14',NULL,'BEKASI','1994-10-01',NULL,'3275080110940028','Pesantren Putra Assyafiah RT.08 RW.09 Kelurahan. Jaticempaka Kecamatan. Pondok Gede\r\n','17434','PONDOK GEDE','BEKASI','Pesantren Putra Assyafiah RT.08 RW.09 Kelurahan. Jaticempaka Kecamatan. Pondok Gede\r\n','17434','PONDOK GEDE','BEKASI','','','','TIDAK MENIKAH','KONTRAK',57,'','','','TIDAK MENIKAH',0,'','','h-44','1',1,'2019-06-14 10:43:40',NULL),
	(46,'091500140','$2y$10$2I1pqN0vtvKGt8TDTWR0AeMKJMHkY2MC4aY8AoMUTNRq8z/xe0V1q','Muhtar',15,'2015-09-25',NULL,'BEKASI','1991-07-09','L','3275030907910018','Kaliabang Bungur RT.01 RW.01 Kelurahan. Harapan Jaya Kecamatan. Bekasi Utara\r\n','	17153','bekasi utara','bekasi','Kaliabang Bungur RT.01 RW.01 Kelurahan. Harapan Jaya Kecamatan. Bekasi Utara\r\n','	17153','bekasi utara','bekasi','','','','TIDAK MENIKAH','TETAP',56,'','','3275030907910018','TIDAK MENIKAH',0,'','','h-45','1',1,'2019-06-14 10:56:24','2019-06-18 09:34:25'),
	(47,'031402035','$2y$10$shftiJOqmFtbH67xRHWb/OL9Mu9tcCSi.Y0OTHDy2ohxMligGwOY2','Nano Haryono',5,'2014-03-10',NULL,'CIAMIS','1988-09-16','L','3275061922880001','KP Rawa Pasung RT.02 RW.03 Kelurahan. Kalibaru Kecamatan. Medan Satria\r\n',' 17133','medan satria','bekasi','KP Rawa Pasung RT.02 RW.03 Kelurahan. Kalibaru Kecamatan. Medan Satria\r\n',' 17133','medan satria','bekasi','','','','TIDAK MENIKAH','TETAP',85,'','','3275061912880001','TIDAK MENIKAH',0,'','','h-46','1',1,'2019-06-14 11:00:35','2019-06-18 09:45:54'),
	(48,'021401032','$2y$10$CFRWFbnb9fcubCdY3EMjxesBi3Tf/WA7abcswUc8Pm9WYd5.Tacee','Nur Rahmi Alfath',14,'2014-02-17',NULL,'PADANG','1995-05-11','P','3275115105950006','JL Khairul Bariyyah No. 29 RT.02 RW.04 Desa. Cimuning Kecamatan. Mustikajaya Bekasi\r\n',' 17155','mustikajaya','bekasi','JL Khairul Bariyyah No. 29 RT.02 RW.04 Desa. Cimuning Kecamatan. Mustikajaya Bekasi\r\n',' 17155','mustikajaya','bekasi','','','','TIDAK MENIKAH','TETAP',109,'','','3275115105950006','TIDAK MENIKAH',0,'','','h-47','1',1,'2019-06-14 11:05:34','2019-06-18 09:52:38'),
	(49,'110901010','$2y$10$eT7rlXTLPLhWugCsUvACj.eK7WTO9vKkqnu6D84nZfydIkOYz1Va2','Nuraeni',15,'2010-05-26',NULL,'BEKASI','1980-07-04','L','3275064407800009','Pondok Ungu RT.01 RW.05 Kelurahan. Medan Satria Kecamatan. Medan Satria Bekasi\r\n','17132','medan satria','bekasi','Pondok Ungu RT.01 RW.05 Kelurahan. Medan Satria Kecamatan. Medan Satria Bekasi\r\n','17132','medan satria','bekasi','','','','MENIKAH','TETAP',104,'','','3275064407800009','TIDAK MENIKAH',0,'','','h-48','1',1,'2019-06-14 11:10:21','2019-06-18 09:15:59'),
	(50,'041501036','$2y$10$KEHQ.OvEBSP0ieyKxQS0ruSffHxIfCMQ8Az2rA4tNxpkRJoYKUOna','Nurul Muthiarani Aswir',15,'2015-04-25',NULL,'PADANG','1995-10-20','L','3275096010950007','KP Pedurenan RT.07 RW.02 Kelurahan. Jatiluhur Kecamatan. Jatiasih Bekasi\r\n',' 17425','jatiasih','bekasi','KP Pedurenan RT.07 RW.02 Kelurahan. Jatiluhur Kecamatan. Jatiasih Bekasi\r\n',' 17425','jatiasih','bekasi','','','','TIDAK MENIKAH','TETAP',23,'','','3275096010950007','TIDAK MENIKAH',0,'','','i-49','1',1,'2019-06-14 11:14:41','2019-06-18 09:56:07'),
	(51,'071500142','$2y$10$q57NOV6i.4/LUEET.bxIc.5/btsw60edybIxDsiGsTysIXQpruG5.','Nurwinda Sari',15,'2015-07-25',NULL,'BEKASI','1990-01-04','P','3275074401900016','Bantar Gebang Utara RT.02 RW.03 Kelurahan. Bantar Gebang Kecamatan. Bantar Gebang\r\n','17151','bantar gebang','bekasi','Bantar Gebang Utara RT.02 RW.03 Kelurahan. Bantar Gebang Kecamatan. Bantar Gebang\r\n','17151','bantar gebang','bekasi','','','','MENIKAH','KONTRAK',22,'','','3275074401900016','TIDAK MENIKAH',0,'','','i-50','1',1,'2019-06-14 11:27:48','2019-06-18 09:49:10'),
	(52,'101700166','$2y$10$/l8avUxi25Fib6mIcV15busY77odIWmdxI24IPj1laM2bp0TOrsOi','Oktavia Yasmin',15,'2017-10-04',NULL,'PEKANBARU','1995-10-01','P','1471124110950002','JL Lembah Damai RT.03 RW.07 Kelurahan. Lembah Damai Kecamatan. Rumbai Pesisir \r\n','28263','rumbai pesisir','pekanbaru','JL Lembah Damai RT.03 RW.07 Kelurahan. Lembah Damai Kecamatan. Rumbai Pesisir \r\n','28263','rumbai pesisir','pekanbaru','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','i-51','1',1,'2019-06-14 11:34:59',NULL),
	(53,'111700369','$2y$10$T.A2Q4SoS6BO9BdSDepLMeonkTWsCRMl3g59ZQWyOC41GLV0wDSLK','Panisa',2,'2017-11-09',NULL,'BANJAR','1998-02-04','P','3279034402980001','Lingk Haurmukti RT.04 RW.02 Kelurahan. Purwaharja Kecamatan. Purwaharja Banjar\r\n','46331','purwaharja','banjar','Lingk Haurmukti RT.04 RW.02 Kelurahan. Purwaharja Kecamatan. Purwaharja Banjar\r\n','46331','purwaharja','banjar','','','','TIDAK MENIKAH','KONTRAK',55,'','','','TIDAK MENIKAH',0,'','','i-52','1',1,'2019-06-14 11:43:43',NULL),
	(54,'061800190','$2y$10$miAZcu6qQqhm277EnVUlneejRZul0snKU1w5yw/6J4XIK01pddf5m','Pipit Karlina',15,'2018-06-04',NULL,'BREBES','1997-06-22','P','3275026206970003','KP Cibening RT.01 RW.08 Kelurahan. Bintara Jaya Kecamatan. Bekasi Barat \r\n','17153','bekasi barat','bekasi','KP Cibening RT.01 RW.08 Kelurahan. Bintara Jaya Kecamatan. Bekasi Barat \r\n','17153','bekasi barat','bekasi','','','','TIDAK MENIKAH','KONTRAK',25,'','','','TIDAK MENIKAH',0,'','','i-53','1',1,'2019-06-14 12:02:30',NULL),
	(55,'121700574','$2y$10$mHK91yPxj08gjXoaP0JngO9A7/uERfhtPLdi.XNM2TUIjxy6aVBoa','Pramestika Endra Putri',3,'2017-12-05',NULL,'PONOROGO','1997-10-21','P','21/10/1997','Dukuh Keden RT.04 RW.03 Kelurahan. Batu Bonang Kecamatan. Badegan \r\n','63455','badegan','ponorogo','Dukuh Keden RT.04 RW.03 Kelurahan. Batu Bonang Kecamatan. Badegan \r\n','63455     ','badegan','ponorogo','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','i-54','1',1,'2019-06-14 13:02:54',NULL),
	(56,'021800579','$2y$10$py7TcJa2Pf6dXuuu9537JuUiSjYKXTqwSzunMlgrzeUGNn0XpZaky','Purwanto Agung Pambudi',14,'2018-02-19',NULL,'JAKARTA','1993-04-24','L','3275112504930003','Perumahan Mayang Pratama Blok B1 No 15 Rt.01 RW.08 Kelurahan. Mustikasari Kecamatan. Mustikajaya Bekasi\r\n',' 17157','mustikajaya','bekasi','Perumahan Mayang Pratama Blok B1 No 15 Rt.01 RW.08 Kelurahan. Mustikasari Kecamatan. Mustikajaya Bekasi\r\n',' 17157','mustikajaya','bekasi','','','','TIDAK MENIKAH','KONTRAK',29,'','','','TIDAK MENIKAH',0,'','','j-55','1',1,'2019-06-14 13:09:29',NULL),
	(57,'121700372','$2y$10$Hgg2AFMro8UpyeeFJshVuu0ddt/Y1cKzP2fSEo5.CxgcfjspXN5Km','Rika Purnama Sari',9,'2017-12-05',NULL,'SUKA BANJAR','1994-02-16','P','1609015602940002','Suka Banjar Kelurahan. Sukabanjar Kecamatan. Muaradua Sumatera Selatan\r\n',' 32212','muaradua','sumatra selatan','Suka Banjar Kelurahan. Sukabanjar Kecamatan. Muaradua Sumatera Selatan\r\n',' 32212','muaradua ','sumatra selatan','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','j-56','1',1,'2019-06-14 13:14:21',NULL),
	(58,'061800192','$2y$10$tPrf2ag/PiZdISO5kB2zbOOpCYdRn5.Fk2pFe28126/VQ8yW4B9xe','Romi Martin Simangunsong',7,'2018-06-04',NULL,'RANTAU PRAPAT','1987-03-24','L','3174042403870008','JL DR Saharjo GG Bhakti IX No. 1 RT.05 RW,06 Kelurahan. Manggarai Kecamatan. Tebet \r\n',' 12850','tebet','jakarta selatan','JL DR Saharjo GG Bhakti IX No. 1 RT.05 RW,06 Kelurahan. Manggarai Kecamatan. Tebet \r\n',' 12850','tebet','jakarta selatan','','','','TIDAK MENIKAH','KONTRAK',52,'','','','TIDAK MENIKAH',0,'','','j-57','1',1,'2019-06-14 13:23:16',NULL),
	(59,'021800180','$2y$10$tOhMXsNRAtyAybTLkcJM8OudyaLKLpiWM/s7/RYu/UGw7Vr/THAEK','Rr Noni Arini',9,'2018-02-22',NULL,'BEKASI','1990-01-03','P','3275024301900013','Perum Puskopad Permai Blok A No : 48 RT.01 RW.017 Kelurahan Jakasampurna Kecamatan. Bekasi Barat\r\n','17152','bekasi barat','bekasi','Perum Puskopad Permai Blok A No : 48 RT.01 RW.017 Kelurahan Jakasampurna Kecamatan. Bekasi Barat\r\n','17152','bekasi barat','bekasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','j-58','1',1,'2019-06-14 13:27:45',NULL),
	(60,'111801098','$2y$10$bKIIPsIwaCNlE/.RiQa0VeMGKWiGeH0aShxOCL8rMpkWH4KkBVrWi','Ruby Sugiana',15,'2018-11-23',NULL,'BANDUNG','1976-12-14','L','3211221412760006','Perum PPI Blok C RT.03 RW.16 Kecamatan. Tanjungsari Bandung\r\n',' 40238','tanjungsari','bandung','Perum PPI Blok C RT.03 RW.16 Kecamatan. Tanjungsari Bandung\r\n',' 40238','tanjungsari','bandung','','','','TIDAK MENIKAH','KONTRAK',57,'','','','TIDAK MENIKAH',0,'','','j-59','1',1,'2019-06-14 13:33:04',NULL),
	(61,'011902100','$2y$10$x00zwQTzpspYi6k/XpVcWOHlnOVxyx4OSjOwZRpo5Sd0akYClVtJC','Ryan Januardin',2,'2019-01-09',NULL,'SINGKIL','1996-01-18','L','1175011801960001','JL Cut Nyak Dhin Gang Kumbang Kelurahan Subulussalam Kecamatan Simpang Kiri\r\n','24781','simpang kiri','Subulussalam','JL Cut Nyak Dhin Gang Kumbang Kelurahan Subulussalam Kecamatan Simpang Kiri\r\n','24781','simpang kiri','Subulussalam','','','','TIDAK MENIKAH','KONTRAK',55,'','','','TIDAK MENIKAH',0,'','','j-60','1',1,'2019-06-14 13:40:31',NULL),
	(62,'011904102','$2y$10$of5ecTGfu2IvkaEL9zKA2uDkNwqbcSZ5teJ0nyZwVMJQLRL0GhPoO','Sahrul Romadon',4,'2019-01-08',NULL,'BEKASI','2000-07-09','L','3216160709000003','KP Cabang 2 RT.018 RW. 06 Kelurahan Lenggahsari. Kecamatan. Cabangbungin \r\n',' 17720','CABANGBUNGIN ','bekasi','KP Cabang 2 RT.018 RW. 06 Kelurahan Lenggahsari. Kecamatan. Cabangbungin \r\n',' 17720','CABANGBUNGIN ','bekasi','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','k-61','1',1,'2019-06-14 13:46:05',NULL),
	(63,'021800276','$2y$10$eA8w3v78lVZvggj2k9R7CuMouGcRtHjZNvkxZGjXgmU9sexJC.kie','Salasatul Milati',10,'2018-02-19',NULL,'BEKASI','1996-04-30','P','3275087004960008','JL Suluki Cempaka RT.05 RW.02 Kelurahan. Jatibening Kecamatan. Pondok Gede\r\n','17412','PONDOK GEDE','bekasi','JL Suluki Cempaka RT.05 RW.02 Kelurahan. Jatibening Kecamatan. Pondok Gede\r\n','17412','PONDOK GEDE','BEKASI','','','','TIDAK MENIKAH','KONTRAK',56,'','','','TIDAK MENIKAH',0,'','','k-62','1',1,'2019-06-14 13:53:29',NULL),
	(64,'080602002','$2y$10$MscH1Nla2roj2kFAG2wHkeonDDAZx3FMV.A3xOT00//lQv5UJYyhG','Selamet Dedy Mulyadi',7,'2006-08-01',NULL,'JAKARTA','1972-12-25','L','3275032512720007','JL Kelud Kiri Atas Griya Kelud KAV II No.13 RT.05 RW.04 Keruhan. Jatibening baru Kecamatan. Pondok Gede\r\n','17412',' PONDOK GEDE','bekasi','JL Kelud Kiri Atas Griya Kelud KAV II No.13 RT.05 RW.04 Keruhan. Jatibening baru Kecamatan. Pondok Gede\r\n','17412     ',' PONDOK GEDE','bekasi','','','','TIDAK MENIKAH','TETAP',57,'','','3275032512720010','TIDAK MENIKAH',0,'','','k-63','1',1,'2019-06-14 14:07:25','2019-06-18 09:13:50'),
	(65,'011904107','$2y$10$dT1LUF9/UgKffpdHmxdPh.IlINEv9yR1WnFHOcr9FZhlrE.wsAeO6','Siti Julaehah',5,'2019-01-11',NULL,'SERANG','1996-06-23','P','3175066306960010','Ujung Menteng RT.04 RW.01 Kelurahan Ujung Menteng Kecamatan Cakung\r\n','13960','CAKUNG','jakarta timur','Ujung Menteng RT.04 RW.01 Kelurahan Ujung Menteng Kecamatan Cakung\r\n','13960','CAKUNG','JAKARTA TIMUR','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','k-64','1',1,'2019-06-14 14:11:47',NULL),
	(66,'051600153','$2y$10$xdT/lU8BQg.ZB9iZsmJNHudE/GOdKmSNjOCByRM0UvUKEiX.zs/IG','Siti Kulsum',8,'2016-05-25',NULL,'BEKASI','1996-01-23','P','3275126301960002','JL Raya Hankam GG Sunter No. 10 RT.05 RW.05 Kelurahan. Jatimelati Kecamatan. Pondok Melati\r\n','17414','PONDOK MELATI','bekasi','JL Raya Hankam GG Sunter No. 10 RT.05 RW.05 Kelurahan. Jatimelati Kecamatan. Pondok Melati\r\n','17414','PONDOK MELATI','bekasi','','','','TIDAK MENIKAH','TETAP',57,'','','3275126301960002','TIDAK MENIKAH',0,'','','k-65','1',1,'2019-06-14 14:19:59','2019-06-18 09:11:47'),
	(67,'081600257','$2y$10$u/CNb2fgwMCD.veFED.8WOLhbfFYWH8ViECXMpDT/wLvIsxjxmXua','Siti Maslikah',8,'2016-08-01',NULL,'SRAGEN','1997-04-24','P','3275046604970005','KP Pulo Ceger RT.06 RW.03 Kelurahan. Jakasetia Kecamatan. Bekasi Selatan\r\n','17153','bekasi selatan','bekasi','KP Pulo Ceger RT.06 RW.03 Kelurahan. Jakasetia Kecamatan. Bekasi Selatan\r\n','17153','bekasi selatan','bekasi','','','','TIDAK MENIKAH','KONTRAK',56,'','','3275046604970005','TIDAK MENIKAH',0,'','','k-66','1',1,'2019-06-14 14:24:12','2019-06-18 08:55:55'),
	(68,'021700361  ','$2y$10$dB4KZDQR5Q3LLUbY6BA0NuwzAH0zeWrcP5sZspQDEB4xQ17pEIbjW','Sokheh Iswanto',15,'2017-01-25',NULL,'TEGAL','1989-06-01','L','3328091106890005','Bogares Kidul RT.04 RW.01 Kelurahan. Bogareskidul Kecamatan. Pangkah Tegal\r\n',' 52471','PANGKAH','tegal','Bogares Kidul RT.04 RW.01 Kelurahan. Bogareskidul Kecamatan. Pangkah Tegal\r\n',' 52471','PANGKAH','tegal','','','','TIDAK MENIKAH','TETAP',13,'','','3328091106890005','TIDAK MENIKAH',0,'','','l-67','1',1,'2019-06-14 14:29:56','2019-06-18 09:03:27'),
	(69,'041503038','$2y$10$mD1KyOYeFb14vWx2/NgYjOzjLPxtTF2t2.vbLIvi67oAIQxIqbE8S','Syara Chintya Dewi',2,'2016-04-25',NULL,'CIAMIS','1995-01-26','P','3210046601950021','Blok Karanganyar RT.14 RW.04 Kelurahan. Talagawetan Kecamatan. Talaga Jawa Barat\r\n','45463','telaga','jawa barat','Blok Karanganyar RT.14 RW.04 Kelurahan. Talagawetan Kecamatan. Talaga Jawa Barat\r\n','45463','telaga ','jawa barat','','','','TIDAK MENIKAH','TETAP',27,'','','3210046601950021','TIDAK MENIKAH',0,'','','l-68','1',1,'2019-06-14 14:35:09','2019-06-18 09:56:45'),
	(70,'011901104','$2y$10$EFDMoyWROg9WY4opf/ux6eQgWBNMfTEggu0.a5YkFLAn6dFhT4dAy','TB Ilham Aditia Pradana Hariyadi',12,'2019-01-12',NULL,'BEKASI','1994-12-24','L','3175072412940004','JL Swakarsa II RT.01 RW.03 Kelurahan Pondok Kelapa Kecamatan Duren Sawit\r\n','13450','duren sawit','jakarta timur','JL Swakarsa II RT.01 RW.03 Kelurahan Pondok Kelapa Kecamatan Duren Sawit\r\n','13450','duren sawit','jakarta timur','','','','TIDAK MENIKAH','KONTRAK',55,'','','','TIDAK MENIKAH',0,'','','l-69','1',1,'2019-06-14 14:41:25',NULL),
	(71,'011903106','$2y$10$cAgE8MxyqODkManRVugbkeBdwKqbHzVyOZuR.I9kO3jx7tDSnhSPC','Vania Dhara Calista',12,'2019-01-11',NULL,'JAKARTA','2000-07-14','P','3275095407000028','JL Bina Asih 2 No 12 RT.02 RW.09 Kelurahan Jatiasih Kecamatan Jatiasih\r\n','17423','jatiasih','bekasi','JL Bina Asih 2 No 12 RT.02 RW.09 Kelurahan Jatiasih Kecamatan Jatiasih\r\n','17423','jatiasih','bekasi','','','','TIDAK MENIKAH','KONTRAK',26,'','','','TIDAK MENIKAH',0,'','','l-71','1',1,'2019-06-14 14:56:37',NULL),
	(72,'021003014','$2y$10$HyAkpsZBFafDtAKooD8Xu.hz4KGVorepLH8hEpDFLVBPFWiqmX52m','Wagiman',15,'2010-02-09',NULL,'BLORA','1972-06-14','L','3275041406720016','Bumi Sentosa Asri Blok B6 No.13 RT.04 RW.15 Kelurahan. Jejalenjaya Kecamatan. Tambun Utara Bekasi\r\n',' 17511','tambun utara','bekasi','Bumi Sentosa Asri Blok B6 No.13 RT.04 RW.15 Kelurahan. Jejalenjaya Kecamatan. Tambun Utara Bekasi\r\n',' 17511','tambun utara','bekasi','','','','TIDAK MENIKAH','TETAP',84,'','','1222021402720003','TIDAK MENIKAH',0,'','','l-72','1',1,'2019-06-14 15:08:55','2019-06-18 09:00:36'),
	(73,'050803009','$2y$10$uIIaBZbaiHqMcFCT5r/C4uA3SO14NMRneBqlDRZ9bE630Egt7J1da','Yudi Suwiryo',11,'2008-11-25',NULL,'BEKASI','1970-05-12','L','3216041205700007','KP Pakuning RT.01 RW.01 Kelurahan. Sukarahayu Kecamatan. Tambelang Bekasi\r\n',' 17621','tambelang','BEKASI','KP Pakuning RT.01 RW.01 Kelurahan. Sukarahayu Kecamatan. Tambelang Bekasi\r\n',' 17621','tambelang','BEKASI','','','','TIDAK MENIKAH','TETAP',54,'','','321604120570007','TIDAK MENIKAH',0,'','','m-73','1',1,'2019-06-14 15:20:52','2019-06-18 09:09:57'),
	(74,'071800295','$2y$10$TN6M08MocbPFqaEMMxkBB.Ract811rgzyNjqyGYBA5Xb8LalflpEW','Yuni Astuti Rahardjo',14,'2018-07-05',NULL,'JAKARTA','1996-06-20','P','3216056006960003','KP Karang Mulya RT.05 RW.08 Kelurahan. Karangsatria Kecamatan. Tambun Utara Bekasi\r\n','17511','tambun utara','bekasi','KP Karang Mulya RT.05 RW.08 Kelurahan. Karangsatria Kecamatan. Tambun Utara Bekasi\r\n','17511','tambun utara','bekasi','','','','TIDAK MENIKAH','KONTRAK',36,'','','','TIDAK MENIKAH',0,'','','m-74','1',1,'2019-06-14 15:26:13','2019-06-14 15:27:41'),
	(75,'021800175','$2y$10$dh0XgVXA8H62hSCubsGOp.tqCYUo8BvwfgwQHCh522CK9oASiewi6','Zainal Mustofa',6,'2018-02-19',NULL,'SRAGEN','1995-04-17','L','3275081704950015','JL Melati IV RT.02 RW.12 Kelurahan. Jatiwaringin Kecamatan. Pondok Gede Bekasi\r\n','17433','pondok gede','bekasi','JL Melati IV RT.02 RW.12 Kelurahan. Jatiwaringin Kecamatan. Pondok Gede Bekasi\r\n','17433','pondok gede','bekasi','','','','MENIKAH','KONTRAK',27,'','','','TIDAK MENIKAH',0,'','','m-75','1',1,'2019-06-14 15:33:27',NULL),
	(76,'021800281','$2y$10$pBy.VQwazMRSj9iiITcOkOTH5HcBOfRtU4x7j/TYCpXp3xBZZ3.n.','Zakiyahdini Hanifah',14,'2018-02-22',NULL,'BEKASI','1995-05-28','P','3275126805950002','KP Bojong Nangka RT.02 RW.08 Kelurahan. Jatirahayu Kecamatan. Pondok Melati Bekasi\r\n','17414','pondok melati','bekasi','KP Bojong Nangka RT.02 RW.08 Kelurahan. Jatirahayu Kecamatan. Pondok Melati Bekasi\r\n','17414','pondok melati','bekasi','','','','MENIKAH','KONTRAK',97,'','','','TIDAK MENIKAH',0,'','','m-76','1',1,'2019-06-14 15:57:55',NULL),
	(77,'021004015','$2y$10$h9/EOTf6eMd7dKQVOI5YT.dnSn/Lr1puAkiKHze8M2cNj6R17qg7O','Zulfahri Firdaus',15,'2010-02-09',NULL,'METRO','1986-07-30','L','3275092403150008','KP Haja RT.07 RW.11 Kelurahan. Jatimekar Kecamatan. Jatiasih Bekasi\r\n','17422','jatiasih','bekasi','KP Haja RT.07 RW.11 Kelurahan. Jatimekar Kecamatan. Jatiasih Bekasi\r\n','17422','jatiasih','bekasi','','','','TIDAK MENIKAH','TETAP',90,'','','3275013007860028','TIDAK MENIKAH',0,'','','m-77','1',1,'2019-06-14 16:03:13','2019-06-18 08:54:08'),
	(78,'121212','$2y$10$6YjfAi/Ggiyy2wGonLVqiuXsFZUcBbjVZmOYV5dAfTH4HFNRsYoWm','123',1,'2019-09-11',NULL,'bogor','2019-09-11','L','Achyar Anshorie','asasa','16925','','','','','','','811366875','achyar.anshorie@gmail.com','KUSDARIAH','TIDAK MENIKAH','KONTRAK',53,'12121','1212121','121212','TIDAK MENIKAH',0,'1212121','','','1',1,'2019-09-11 08:50:07',NULL);

/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table family
# ------------------------------------------------------------

CREATE TABLE `family` (
  `family_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) unsigned NOT NULL,
  `family_name` varchar(255) DEFAULT NULL,
  `family_relation` enum('AYAH','IBU','ANAK','SUAMI','ISTRI') DEFAULT NULL,
  `family_bdate` date DEFAULT NULL,
  `family_gender` enum('L','P') DEFAULT NULL,
  PRIMARY KEY (`family_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `family` WRITE;
/*!40000 ALTER TABLE `family` DISABLE KEYS */;

INSERT INTO `family` (`family_id`, `employee_id`, `family_name`, `family_relation`, `family_bdate`, `family_gender`)
VALUES
	(1,1,'','AYAH','0000-00-00',''),
	(2,78,'asa','AYAH','0000-00-00',''),
	(3,78,'12','IBU','2019-09-09','P'),
	(4,78,'tes','ISTRI','1996-10-16','P'),
	(6,78,'Anak','ANAK','2019-04-27','L'),
	(7,4,'tes','AYAH','2019-09-20','L'),
	(8,5,'ayah','AYAH','2019-09-20','L');

/*!40000 ALTER TABLE `family` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table grade
# ------------------------------------------------------------

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
	(1,'1','2019-06-10 13:58:28',NULL),
	(2,'1*','2019-06-10 13:58:43',NULL),
	(3,'1**','2019-06-10 13:58:51',NULL),
	(4,'2','2019-06-10 13:58:59',NULL),
	(5,'2*','2019-06-10 13:59:05',NULL),
	(6,'2**','2019-06-10 13:59:10',NULL),
	(7,'3','2019-06-10 13:59:18','2019-06-10 13:59:27'),
	(8,'3*','2019-06-10 13:59:52',NULL),
	(9,'3**','2019-06-10 14:00:05',NULL),
	(10,'4','2019-06-10 14:00:37',NULL),
	(11,'4*','2019-06-10 14:00:42',NULL),
	(12,'4**','2019-06-10 14:00:47',NULL),
	(13,'5','2019-06-10 14:00:50',NULL),
	(14,'5*','2019-06-10 14:00:54',NULL),
	(15,'5**','2019-06-10 14:00:58',NULL),
	(16,'6','2019-06-10 14:01:02',NULL),
	(17,'6*','2019-06-10 14:01:06',NULL),
	(18,'6**','2019-06-10 14:01:10',NULL),
	(19,'7','2019-06-10 14:01:16',NULL),
	(20,'7*','2019-06-10 14:01:22',NULL),
	(21,'7**','2019-06-10 14:01:29',NULL),
	(22,'8','2019-06-10 14:01:37',NULL),
	(23,'8*','2019-06-10 14:01:42',NULL),
	(24,'8**','2019-06-10 14:01:47',NULL),
	(25,'9','2019-06-10 14:01:51',NULL),
	(26,'9*','2019-06-10 14:01:55',NULL),
	(27,'9**','2019-06-10 14:01:59',NULL);

/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kkout
# ------------------------------------------------------------

CREATE TABLE `kkout` (
  `kkout_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kkout_no` varchar(100) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `kkout_type` int(11) DEFAULT '0' COMMENT '0=habis kontrak, 1=baik, 2=meninggal',
  `kkout_date` date DEFAULT NULL,
  `kkout_inactive` int(11) DEFAULT '0',
  `kkout_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `kkout_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`kkout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table position
# ------------------------------------------------------------

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
	(1,'001','PRAMUBAKTI (SMP, SMA)',1,2,'2019-06-10 14:06:32','2019-09-02 17:01:33'),
	(2,'002','PRAMUBAKTI (SMP, SMA)',2,2,'2019-06-11 16:54:27','2019-09-02 17:01:39'),
	(3,'003','PRAMUBAKTI (SMP, SMA)',3,2,'2019-06-12 10:13:01','2019-09-02 17:01:43'),
	(4,'004','DRIVER (SMP, SMA)',1,2,'2019-06-12 10:13:16','2019-09-02 17:02:07'),
	(5,'005','DRIVER (SMP, SMA)',2,2,'2019-06-12 10:26:12','2019-09-02 17:02:14'),
	(6,'006','DRIVER (SMP, SMA)',3,2,'2019-06-12 10:26:29','2019-09-02 17:02:21'),
	(7,'007','SECURITY (SMP, SMA)',1,2,'2019-06-12 10:27:36','2019-09-02 17:02:35'),
	(8,'008','SECURITY (SMP, SMA)',2,2,'2019-06-12 10:28:36','2019-09-02 17:02:42'),
	(9,'009','SECURITY (SMP, SMA)',3,2,'2019-06-12 10:28:57','2019-09-02 17:02:50'),
	(10,'010','SENIOR PRAMUBAKTI',4,2,'2019-06-12 11:03:26',NULL),
	(11,'011','SENIOR PRAMUBAKTI',5,2,'2019-06-12 11:03:52','2019-06-12 11:06:27'),
	(12,'012','SENIOR PRAMUBAKTI',6,2,'2019-06-12 11:04:13','2019-06-12 11:06:41'),
	(13,'013','SENIOR DRIVER',4,2,'2019-06-12 11:07:06',NULL),
	(14,'014','SENIOR DRIVER',5,2,'2019-06-12 11:07:24',NULL),
	(15,'015','SENIOR DRIVER',6,2,'2019-06-12 11:07:45',NULL),
	(16,'016','SENIOR SECURITY',4,2,'2019-06-12 11:08:08',NULL),
	(17,'017','SENIOR SECURITY',5,2,'2019-06-12 11:08:20',NULL),
	(18,'018','SENIOR SECURITY',6,2,'2019-06-12 11:08:36',NULL),
	(19,'019','CUSTOMER SERVICE (SMA, D3)',4,3,'2019-06-12 11:14:35','2019-09-02 17:05:34'),
	(20,'020','CUSTOMER SERVICE (SMA, D3)',5,3,'2019-06-12 11:15:22','2019-09-02 17:05:46'),
	(21,'021','CUSTOMER SERVICE (SMA, D3)',6,3,'2019-06-12 11:15:37','2019-09-02 17:05:57'),
	(22,'022','STAFF ACCOUNTING (SMA, D3)',4,3,'2019-06-12 11:16:58','2019-09-02 17:07:12'),
	(23,'023','STAFF ACCOUNTING (SMA, D3)',5,3,'2019-06-12 11:17:12','2019-09-02 17:07:26'),
	(24,'024','STAFF ACCOUNTING (SMA, D3)',6,3,'2019-06-12 11:17:23','2019-09-02 17:07:59'),
	(25,'025','TELLER (SMA, D3)',4,3,'2019-06-12 11:17:49','2019-09-02 17:08:27'),
	(26,'026','TELLER (SMA, D3)',5,3,'2019-06-12 11:18:02','2019-09-02 17:08:51'),
	(27,'027','TELLER (SMA, D3)',6,3,'2019-06-12 11:18:14','2019-09-02 17:09:00'),
	(28,'028','STAFF LEGAL (SMA, D3)',4,4,'2019-06-12 11:18:40','2019-09-02 17:09:33'),
	(29,'029','STAFF LEGAL (SMA, D3)',5,4,'2019-06-12 11:19:05','2019-09-02 17:09:46'),
	(30,'030','STAFF LEGAL (SMA, D3)',6,4,'2019-06-12 11:19:17','2019-09-02 17:14:24'),
	(31,'031','STAFF SDI &amp; UMUM',4,2,'2019-06-12 11:21:40',NULL),
	(32,'032','STAFF SDI &amp; UMUM',5,2,'2019-06-12 11:21:54',NULL),
	(33,'033','STAFF SDI &amp; UMUM',6,2,'2019-06-12 11:22:08',NULL),
	(34,'034','STAFF INTERNAL AUDIT',4,5,'2019-06-12 11:23:13',NULL),
	(35,'035','STAFF INTERNAL AUDIT',5,5,'2019-06-12 11:23:27',NULL),
	(36,'036','STAFF INTERNAL AUDIT',6,5,'2019-06-12 11:23:41',NULL),
	(37,'037','SENIOR CUSTOMER SERVICE',7,3,'2019-06-12 11:26:27',NULL),
	(38,'038','SENIOR CUSTOMER SERVICE',8,3,'2019-06-12 11:26:42',NULL),
	(39,'039','SENIOR CUSTOMER SERVICE',9,3,'2019-06-12 11:27:13',NULL),
	(40,'040','SENIOR STAFF ACCOUNTING',7,3,'2019-06-12 11:27:50',NULL),
	(41,'041','SENIOR STAFF ACCOUNTING',8,3,'2019-06-12 11:28:06',NULL),
	(42,'042','SENIOR STAFF ACCOUNTING',9,3,'2019-06-12 11:28:18',NULL),
	(43,'043','SENIOR STAFF LEGAL',7,4,'2019-06-12 11:29:06',NULL),
	(44,'044','SENIOR STAFF LEGAL',8,4,'2019-06-12 11:29:25',NULL),
	(45,'045','SENIOR STAFF LEGAL',9,4,'2019-06-12 11:29:38',NULL),
	(46,'046','SENIOR STAFF SDI &amp; UMUM',7,2,'2019-06-12 11:30:19',NULL),
	(47,'047','SENIOR STAFF SDI &amp; UMUM',8,2,'2019-06-12 11:30:50',NULL),
	(48,'048','SENIOR STAFF SDI &amp; UMUM',9,2,'2019-06-12 11:31:28',NULL),
	(49,'049','SENIOR STAFF INTERNAL AUDIT',7,5,'2019-06-12 11:32:08',NULL),
	(50,'050','SENIOR STAFF INTERNAL AUDIT',8,5,'2019-06-12 11:32:25',NULL),
	(51,'051','SENIOR STAFF INTERNAL AUDIT',9,5,'2019-06-12 11:32:59','2019-06-12 11:33:23'),
	(52,'052','KEPALA KAS',10,1,'2019-06-12 11:35:06','2019-06-17 14:28:07'),
	(53,'053','KEPALA KAS',11,1,'2019-06-12 11:35:19','2019-06-17 14:28:49'),
	(54,'054','KEPALA KAS',12,1,'2019-06-12 11:35:34','2019-06-17 14:29:10'),
	(55,'055','ACCOUNT OFFICER',7,1,'2019-06-12 11:36:03',NULL),
	(56,'056','ACCOUNT OFFICER',8,1,'2019-06-12 11:36:20',NULL),
	(57,'057','ACCOUNT OFFICER',9,1,'2019-06-12 11:36:38',NULL),
	(58,'058','FUNDING OFFICER',7,1,'2019-06-12 11:37:12',NULL),
	(59,'059','FUNDING OFFICER',8,1,'2019-06-12 11:37:40',NULL),
	(60,'060','FUNDING OFFICER',9,1,'2019-06-12 11:37:53',NULL),
	(61,'061','REMEDIAL OFFICER',7,1,'2019-06-12 11:38:28',NULL),
	(62,'062','REMEDIAL OFFICER',8,1,'2019-06-12 11:38:42',NULL),
	(63,'063','REMEDIAL OFFICER',9,1,'2019-06-12 11:38:54',NULL),
	(64,'064','STAFF ACCOUNTING (S1)',7,3,'2019-06-12 11:40:47','2019-06-17 13:43:01'),
	(65,'065','STAFF ACCOUNTING (S1)',8,3,'2019-06-12 11:41:01','2019-06-17 13:43:40'),
	(66,'066','STAFF ACCOUNTING (S1)',9,3,'2019-06-12 11:41:17','2019-06-17 13:44:01'),
	(67,'067','STAFF LEGAL (S1)',7,4,'2019-06-12 11:42:09','2019-06-17 13:45:16'),
	(68,'068','STAFF LEGAL (S1)',8,4,'2019-06-12 11:42:20','2019-06-17 13:45:46'),
	(69,'069','STAFF LEGAL (S1)',9,4,'2019-06-12 11:42:47','2019-06-17 13:47:27'),
	(70,'070','STAFF SDI &amp; UMUM (S1)',7,2,'2019-06-12 11:43:13','2019-06-17 13:48:09'),
	(71,'071','STAFF SDI &amp; UMUM (S1)',8,2,'2019-06-12 11:43:25','2019-06-17 13:48:52'),
	(72,'072','STAFF SDI &amp; UMUM (S1)',9,2,'2019-06-12 11:43:37','2019-06-17 13:49:25'),
	(73,'073','STAFF INTERNAL AUDIT (S1)',7,5,'2019-06-12 11:44:04','2019-06-17 13:50:04'),
	(74,'074','STAFF INTERNAL AUDIT (S1)',8,5,'2019-06-12 11:44:20','2019-06-17 13:50:38'),
	(75,'075','STAFF INTERNAL AUDIT (S1)',9,5,'2019-06-12 11:44:30','2019-06-17 13:51:08'),
	(76,'076','SENIOR ACCOUNT OFFICER',10,1,'2019-06-12 11:47:43',NULL),
	(77,'077','SENIOR ACCOUNT OFFICER',11,1,'2019-06-12 11:48:04',NULL),
	(78,'078','SENIOR ACCOUNT OFFICER',12,1,'2019-06-12 11:48:20',NULL),
	(79,'079','SENIOR FUNDING OFFICER',10,1,'2019-06-12 11:48:53',NULL),
	(80,'080','SENIOR FUNDING OFFICER',11,1,'2019-06-12 11:49:34',NULL),
	(81,'081','SENIOR FUNDING OFFICER',12,1,'2019-06-12 11:49:49','2019-06-12 11:50:03'),
	(82,'082','SENIOR REMEDIAL OFFICER',10,1,'2019-06-12 11:50:30',NULL),
	(83,'083','SENIOR REMEDIAL OFFICER',11,1,'2019-06-12 11:50:46',NULL),
	(84,'084','SENIOR REMEDIAL OFFICER',12,1,'2019-06-12 11:51:00',NULL),
	(85,'085','SENIOR KEPALA KAS',13,1,'2019-06-12 11:55:52','2019-06-17 14:30:18'),
	(86,'086','SENIOR KEPALA KAS',11,1,'2019-06-12 11:56:17','2019-06-17 14:31:30'),
	(87,'087','SENIOR KEPALA KAS',12,1,'2019-06-12 11:56:32','2019-06-17 14:32:12'),
	(88,'088','KABAG ACCOUNTING',10,3,'2019-06-12 11:57:56','2019-06-17 13:54:01'),
	(89,'089','KABAG ACCOUNTING',11,3,'2019-06-12 11:58:27','2019-06-17 13:54:36'),
	(90,'090','KABAG ACCOUNTING',12,3,'2019-06-12 11:58:45','2019-06-17 13:54:54'),
	(91,'091',' KABAG LEGAL',10,4,'2019-06-12 11:59:35','2019-06-17 13:55:45'),
	(92,'092','KABAG LEGAL',11,4,'2019-06-12 11:59:52','2019-06-17 13:56:11'),
	(93,'093','KABAG LEGAL',12,4,'2019-06-12 12:00:06','2019-06-17 13:56:47'),
	(94,'094','KABAG INTERNAL AUDIT ',10,5,'2019-06-12 12:19:15','2019-06-17 13:57:57'),
	(95,'095','KABAG INTERNAL AUDIT',11,5,'2019-06-12 12:19:29','2019-06-17 13:58:43'),
	(96,'096','KABAG INTERNAL AUDIT',12,5,'2019-06-12 12:19:42','2019-06-17 13:59:18'),
	(97,'097','CORPORATE SECRETARY',7,2,'2019-06-12 12:20:27',NULL),
	(98,'098','CORPORATE SECRETARY',8,2,'2019-06-12 12:20:39',NULL),
	(99,'099','CORPORATE SECRETARY',9,2,'2019-06-12 12:20:53','2019-06-12 13:54:24'),
	(100,'100','SENIOR CORPORATE SECRETARY',10,2,'2019-06-12 12:39:11',NULL),
	(101,'101','SENIOR CORPORATE SECRETARY',11,2,'2019-06-12 12:39:25',NULL),
	(102,'102','SENIOR CORPORATE SECRETARY',12,2,'2019-06-12 12:39:43',NULL),
	(103,'103','KA KPO',16,1,'2019-06-12 12:41:21',NULL),
	(104,'104','KA KPO',17,1,'2019-06-12 12:41:37',NULL),
	(105,'105','KA KPO',18,1,'2019-06-12 12:41:50',NULL),
	(106,'106','JUNIOR KADIV OPERATIONAL',16,3,'2019-06-12 12:45:59',NULL),
	(107,'107','JUNIOR KADIV OPERATIONAL',17,3,'2019-06-12 12:46:30',NULL),
	(108,'108','JUNIOR KADIV OPERATIONAL',18,3,'2019-06-12 12:46:41',NULL),
	(109,'109','JUNIOR KADIV LEGAL',16,4,'2019-06-12 12:47:07',NULL),
	(110,'110','JUNIOR KADIV LEGAL',17,4,'2019-06-12 12:47:17',NULL),
	(111,'111','JUNIOR KADIV LEGAL',18,4,'2019-06-12 12:47:28',NULL),
	(112,'112','JUNIOR KADIV SDI &amp; UMUM',16,2,'2019-06-12 12:52:06',NULL),
	(113,'113','JUNIOR KADIV SDI &amp; UMUM',17,2,'2019-06-12 12:52:18',NULL),
	(114,'114','JUNIOR KADIV SDI &amp; UMUM',18,2,'2019-06-12 12:52:31',NULL),
	(115,'115','JUNIOR KADIV INTERNAL AUDIT',16,5,'2019-06-12 13:14:41',NULL),
	(116,'116','JUNIOR KADIV INTERNAL AUDIT',17,5,'2019-06-12 13:14:53',NULL),
	(117,'117','JUNIOR KADIV INTERNAL AUDIT',18,5,'2019-06-12 13:15:05',NULL),
	(118,'118','SENIOR KA KPO',19,1,'2019-06-12 13:16:46',NULL),
	(119,'119','SENIOR KA KPO',20,1,'2019-06-12 13:17:17',NULL),
	(120,'120','SENIOR KA KPO',21,1,'2019-06-12 13:17:36',NULL),
	(121,'121','KADIV OPERATIONAL',19,3,'2019-06-12 13:19:23',NULL),
	(122,'122','KADIV OPERATIONAL',20,3,'2019-06-12 13:19:41',NULL),
	(123,'123','KADIV OPERATIONAL',21,3,'2019-06-12 13:20:00',NULL),
	(124,'124','KADIV LEGAL',19,4,'2019-06-12 13:20:22',NULL),
	(125,'125','KADIV LEGAL',20,4,'2019-06-12 13:20:41',NULL),
	(126,'126','KADIV LEGAL',21,4,'2019-06-12 13:20:52',NULL),
	(127,'127','KADIV SDI &amp; UMUM',19,2,'2019-06-12 13:21:15',NULL),
	(128,'128','KADIV SDI &amp; UMUM',20,2,'2019-06-12 13:21:45',NULL),
	(129,'129','KADIV SDI &amp; UMUM',21,2,'2019-06-12 13:21:56',NULL),
	(130,'130','KADIV INTERNAL AUDIT',19,5,'2019-06-12 13:22:20',NULL),
	(131,'131','KADIV INTERNAL AUDIT',20,5,'2019-06-12 13:22:41',NULL),
	(132,'132','KADIV INTERNAL AUDIT',21,5,'2019-06-12 13:22:51',NULL),
	(133,'133','KADIV BISNIS',22,1,'2019-06-12 13:23:25',NULL),
	(134,'134','KADIV BISNIS',23,1,'2019-06-12 13:23:38','2019-06-12 13:24:00'),
	(135,'135','KADIV BISNIS',24,1,'2019-06-12 13:23:52',NULL),
	(136,'136','SENIOR KADIV OPERATIONAL',22,3,'2019-06-12 13:25:45',NULL),
	(137,'137','SENIOR KADIV OPERATIONAL',23,3,'2019-06-12 13:25:59',NULL),
	(138,'138','SENIOR KADIV OPERATIONAL',24,3,'2019-06-12 13:26:24',NULL),
	(139,'139','SENIOR KADIV LEGAL',22,4,'2019-06-12 13:26:47',NULL),
	(140,'140','SENIOR KADIV LEGAL',23,4,'2019-06-12 13:27:00',NULL),
	(141,'141','SENIOR KADIV LEGAL',24,4,'2019-06-12 13:27:14',NULL),
	(142,'142','SENIOR KADIV SDI &amp; UMUM',22,2,'2019-06-12 13:27:37',NULL),
	(143,'143','SENIOR KADIV SDI &amp; UMUM',23,2,'2019-06-12 13:27:54',NULL),
	(144,'144','SENIOR KADIV SDI &amp; UMUM',24,2,'2019-06-12 13:28:06',NULL),
	(145,'145','SENIOR KADIV INTERNAL AUDIT',22,5,'2019-06-12 13:28:31',NULL),
	(146,'146','SENIOR KADIV INTERNAL AUDIT',23,5,'2019-06-12 13:28:58',NULL),
	(147,'147','SENIOR KADIV INTERNAL AUDIT',24,5,'2019-06-12 13:29:12',NULL),
	(148,'148','SENIOR KADIV BISNIS (S2)',25,1,'2019-06-12 13:29:55','2019-06-17 13:34:15'),
	(149,'149','SENIOR KADIV BISNIS (S2)',26,1,'2019-06-12 13:30:09','2019-06-17 13:34:23'),
	(150,'150','SENIOR KADIV BISNIS (S2)',27,1,'2019-06-12 13:30:25','2019-06-17 13:34:30'),
	(151,'151','STAFF ACCOUNTING (S1)',7,3,'2019-06-17 14:02:00',NULL),
	(152,'152','STAFF ACCOUNTING (S1)',8,3,'2019-06-17 14:02:15',NULL),
	(153,'153','STAFF ACCOUNTING (S1)',9,3,'2019-06-17 14:02:29',NULL),
	(154,'154','STAFF LEGAL (S1)',7,4,'2019-06-17 14:03:18',NULL),
	(155,'155','STAFF LEGAL (S1)',8,4,'2019-06-17 14:03:35',NULL),
	(156,'156','STAFF LEGAL (S1)',9,4,'2019-06-17 14:03:55',NULL),
	(157,'157','STAFF SDI & UMUM (S1)',7,2,'2019-06-17 14:04:28','2019-09-19 13:11:51'),
	(158,'158','STAFF SDI & UMUM (S1)',8,2,'2019-06-17 14:04:42','2019-09-19 13:11:56'),
	(159,'159','STAFF SDI & UMUM (S1)',9,2,'2019-06-17 14:04:58','2019-09-19 13:11:58'),
	(160,'160','STAFF INTERNAL AUDIT (S1)',7,5,'2019-06-17 14:05:32',NULL),
	(161,'161','STAFF INTERNAL AUDIT (S1)',8,5,'2019-06-17 14:05:48',NULL),
	(162,'162','STAFF INTERNAL AUDIT (S1)',9,5,'2019-06-17 14:06:00','2019-06-17 14:06:12'),
	(163,'163','SENIOR ACCOUNT OFFICER (S1)',13,1,'2019-06-17 14:07:02','2019-06-17 14:23:57'),
	(164,'164','SENIOR ACCOUNT OFFICER (S1)',14,1,'2019-06-17 14:07:22','2019-06-17 14:24:16'),
	(165,'165','SENIOR ACCOUNT OFFICER (S1)',15,1,'2019-06-17 14:07:41','2019-06-17 14:24:07'),
	(166,'166','SENIOR FUNDING OFFICER (S1)',13,1,'2019-06-17 14:08:10','2019-06-17 14:24:25'),
	(167,'167','SENIOR FUNDING OFFICER (S1)',14,1,'2019-06-17 14:09:21','2019-06-17 14:24:33'),
	(168,'168','SENIOR FUNDING OFFICER (S1)',15,1,'2019-06-17 14:09:44','2019-06-17 14:24:39'),
	(169,'169','SENIOR REMEDIAL OFFICER (S1)',13,1,'2019-06-17 14:25:19',NULL),
	(170,'170','SENIOR REMEDIAL OFFICER (S1)',14,1,'2019-06-17 14:25:42',NULL),
	(171,'171','SENIOR REMEDIAL OFFICER (S1)',15,1,'2019-06-17 14:26:03',NULL),
	(172,'172','KEPALA KAS (S1)',13,1,'2019-06-17 14:33:42',NULL),
	(173,'173','KEPALA KAS (S1)',14,1,'2019-06-17 14:33:54',NULL),
	(174,'174','KEPALA KAS (S1)',15,1,'2019-06-17 14:34:07',NULL);

/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

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
	(1,1,'SMA','AKUNTANSI','SMK N 3 JAK'),
	(2,2,'S1','AKUNTANSI','POLITEKNIK '),
	(3,3,'SMA','','SMU N 2 BAE'),
	(4,4,'SMA','','MA AS SAKIE'),
	(5,5,'SMA','','SMA N 9 BEK'),
	(6,6,'S1','','UNIVERSITAS'),
	(7,7,'SMA','','SMK BAKTI M'),
	(8,8,'S1','','UNIVERSITAS'),
	(9,10,'SMA','','SMK TARUNA '),
	(10,11,'SMA','','SMK CORPATA'),
	(11,12,'S1','','UNIVERSITAS'),
	(12,13,'SMA','','SMA N 107 J'),
	(13,14,'S1','','UNIVERSITAS'),
	(14,15,'SMA','','SMK YEPEKA '),
	(15,16,'SMA','','SMA N 9 BEK'),
	(16,17,'S1','','UNIVERSITAS'),
	(17,18,'SMA','','SMA N 1 IND'),
	(18,19,'SMA','','MA N 9 JAKA'),
	(19,20,'SMA','','SMA N 8 BEK'),
	(20,21,'SMA','','SMA N 8 BEK'),
	(21,22,'SMA','','SMK N 39 JA'),
	(22,23,'SMA','','SMA N 8 BEK'),
	(23,24,'SMA','','SMK YPP BEK'),
	(24,25,'S2','','UNIVERSITAS'),
	(25,26,'S1','','UNIVERSITAS'),
	(26,27,'SMA','','SMU SWASTA '),
	(27,28,'SMA','','SMU N 1 TAM'),
	(28,29,'SMA','','SMK BINA HU'),
	(29,30,'S1','','UNIVERSITAS'),
	(30,31,'S1','','STAI DUTA B'),
	(31,32,'S1','','STIE KUSUMA'),
	(32,33,'SMA','','SMK BINA HU'),
	(33,34,'S1','manajemen','UNIVERSITAS'),
	(34,35,'S1','','POLITEKNIK '),
	(35,36,'SMA','','MA PERSIS T'),
	(36,37,'SMA','','SMK BINA HU'),
	(37,38,'SMA','','SEKOLAH PER'),
	(38,39,'S1','','AMIK BSI BE'),
	(39,40,'S1','','UNIVERSITAS'),
	(40,41,'S1','','UNIVERSITAS'),
	(41,42,'S1','','UNIVERSITAS'),
	(42,43,'SMA','','SMK KARYA G'),
	(43,44,'S1','','INSTITUTE K'),
	(44,45,'SMA','','SMA AS SYAF'),
	(45,46,'S1','','UNIVERSITAS'),
	(46,47,'S1','','SMA PATRIOT'),
	(47,48,'SMA','','SMA DAYA UT'),
	(48,49,'S1','','STIE PERBAN'),
	(49,50,'SMA','','SMK N 4 BEK'),
	(50,51,'SMA','','SMK YADIKA '),
	(51,52,'S1','','UNIVERSITAS'),
	(52,53,'SMA','','SMK MIFTAHU'),
	(53,54,'SMA','','SMK BAKTI P'),
	(54,55,'SMA','','SMK WIDYA N'),
	(55,56,'SMA','','SMA N 9 BEK'),
	(56,57,'S1','','STAI BATURA'),
	(57,58,'S1','','UNIVERSITAS'),
	(58,59,'S1','','STA MANDALA'),
	(59,60,'S1','','INSTITUTE K'),
	(60,61,'S1','','INSTITUTE K'),
	(61,62,'SMA','','SMK BINA HU'),
	(62,63,'SMA','','SMA AN NAJA'),
	(63,64,'S1','','AKADEMI KEU'),
	(64,65,'SMA','','SMK PERBANK'),
	(65,66,'SMA','','SMK SANDIKT'),
	(66,67,'SMA','','SMK TERATAI'),
	(67,68,'SMA','',''),
	(68,69,'SMA','','SMA N 1 TAL'),
	(69,70,'S1','','PERBANAS IN'),
	(70,71,'SMA','','SMK HUTAMA'),
	(71,72,'SMA','','SMEA MAKART'),
	(72,73,'SMA','','SMA ISLAM C'),
	(73,74,'SMA','','SMA N 1 TAM'),
	(74,75,'S1','','UNIVERSITAS'),
	(75,76,'S1','','UNIVERSITAS'),
	(76,77,'S1','','UNIVERSITAS'),
	(77,5,'S1','EKONOMI','STIE C'),
	(78,78,'SMA','TI','ST');

/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sk
# ------------------------------------------------------------

CREATE TABLE `sk` (
  `sk_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sk_no` varchar(100) DEFAULT NULL,
  `sk_type` enum('MUTASI','PROMOSI','DEMOSI','ROTASI','PENGANGKATAN') DEFAULT 'MUTASI',
  `employee_id` int(11) DEFAULT NULL,
  `sk_memo` varchar(100) DEFAULT NULL,
  `sk_memo_date` date DEFAULT NULL,
  `sk_store_id` int(11) DEFAULT NULL,
  `sk_position_id` int(11) DEFAULT NULL,
  `sk_inactive` int(11) DEFAULT '0',
  `sk_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sk_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sp1
# ------------------------------------------------------------

CREATE TABLE `sp1` (
  `sp1_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sp1_no` varchar(100) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `sp1_desc` text,
  `sp1_date_start` date DEFAULT NULL,
  `sp1_date_end` date DEFAULT NULL,
  `sp1_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sp1_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sp1_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sp2
# ------------------------------------------------------------

CREATE TABLE `sp2` (
  `sp2_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sp1_id` int(11) DEFAULT NULL,
  `sp2_no` varchar(100) DEFAULT NULL,
  `sp2_desc` text,
  `sp2_date_start` date DEFAULT NULL,
  `sp2_date_end` date DEFAULT NULL,
  `sp2_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sp2_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sp2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table store
# ------------------------------------------------------------

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
	(1,'02','KAS KRANGGAN','2019-06-10 13:43:26','2019-06-12 13:37:28'),
	(2,'03','KAS BEKASI TIMUR','2019-06-10 13:43:42','2019-06-12 13:37:36'),
	(3,'04','KAS BANTAR GEBANG','2019-06-10 13:44:05','2019-06-12 13:37:43'),
	(4,'05','KAS JATIASIH','2019-06-10 13:44:22','2019-06-12 13:37:50'),
	(5,'06','KAS MEDAN SATRIA','2019-06-10 13:44:35','2019-06-12 13:37:58'),
	(6,'07','KAS KELILING','2019-06-10 13:44:58','2019-06-12 13:38:10'),
	(7,'08','KAS BEKASI UTARA','2019-06-10 13:45:54','2019-06-12 13:38:21'),
	(8,'09','KAS PEMDA','2019-06-10 13:46:06','2019-06-12 13:38:31'),
	(9,'10','KAS BEKASI BARAT','2019-06-10 13:46:18','2019-06-12 13:38:40'),
	(10,'11','KAS RAWALUMBU','2019-06-10 13:46:35','2019-06-12 13:38:51'),
	(11,'12','KAS PONDOK MELATI','2019-06-10 13:46:49','2019-06-12 13:39:09'),
	(12,'13','KAS PONDOK GEDE','2019-06-10 13:47:12','2019-06-12 13:39:19'),
	(13,'14','KAS MUSTIKA JAYA','2019-06-10 13:47:31','2019-06-12 13:39:31'),
	(14,'01','KANTOR PUSAT ','2019-06-12 13:36:57',NULL),
	(15,'15','KANTOR PUSAT OPERATIONAL','2019-06-12 13:37:19',NULL);

/*!40000 ALTER TABLE `store` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

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
