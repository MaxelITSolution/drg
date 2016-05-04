/*
SQLyog Ultimate v11.5 (64 bit)
MySQL - 10.1.10-MariaDB : Database - maxel_drg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`maxel_drg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `maxel_drg`;

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `pasien_id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_nama` varchar(100) DEFAULT NULL,
  `pasien_alamat` varchar(100) DEFAULT NULL,
  `pasien_hp` varchar(25) DEFAULT NULL,
  `pasien_email` varchar(100) DEFAULT NULL,
  `pasien_lahir_tanggal` date DEFAULT NULL,
  `pasien_usia` int(11) DEFAULT '1',
  `pasien_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`pasien_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_username` varchar(15) DEFAULT NULL,
  `user_password` varchar(32) DEFAULT NULL,
  `user_alamat` varchar(100) DEFAULT NULL,
  `user_hp` varchar(25) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_tipe` tinyint(4) DEFAULT '3' COMMENT '1=Admin, 2=Dokter. 3=Resepsionis',
  `role_id` tinyint(4) DEFAULT '1',
  `user_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
