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

/*Table structure for table `antrian` */

DROP TABLE IF EXISTS `antrian`;

CREATE TABLE `antrian` (
  `antrian_id` int(11) NOT NULL AUTO_INCREMENT,
  `pasien_kode` varchar(10) DEFAULT NULL,
  `dokter_kode` varchar(10) DEFAULT NULL,
  `antrian_tanggal` date DEFAULT NULL,
  `antrian_jam` time DEFAULT NULL,
  `antrian_catatan` text,
  `antrian_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`antrian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `antrian` */

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `barang_kode` varchar(10) NOT NULL,
  `barang_nama` varchar(50) DEFAULT NULL,
  `barang_harga` int(11) DEFAULT '0',
  `barang_stok` int(11) DEFAULT '0',
  `barang_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`barang_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

/*Table structure for table `djual` */

DROP TABLE IF EXISTS `djual`;

CREATE TABLE `djual` (
  `djual_kode` varchar(10) NOT NULL,
  `hjual_kode` varchar(10) NOT NULL,
  `barang_kode` varchar(10) NOT NULL,
  `djual_jumlah` mediumint(9) DEFAULT '0',
  `djual_satuan` varchar(10) DEFAULT NULL,
  `djual_harga` int(11) DEFAULT '0',
  `djual_subtotal` int(11) DEFAULT '0',
  PRIMARY KEY (`djual_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `djual` */

/*Table structure for table `dokter` */

DROP TABLE IF EXISTS `dokter`;

CREATE TABLE `dokter` (
  `dokter_kode` varchar(10) NOT NULL,
  `dokter_nama` varchar(100) DEFAULT NULL,
  `dokter_alamat` varchar(100) DEFAULT NULL,
  `dokter_hp` varchar(25) DEFAULT NULL,
  `dokter_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`dokter_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `dokter` */

/*Table structure for table `hjual` */

DROP TABLE IF EXISTS `hjual`;

CREATE TABLE `hjual` (
  `hjual_kode` varchar(10) NOT NULL,
  `hjual_tanggal` date NOT NULL,
  `hjual_jam` time NOT NULL,
  `pasien_kode` varchar(10) NOT NULL,
  `hjual_total` int(11) DEFAULT '0',
  PRIMARY KEY (`hjual_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hjual` */

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `pasien_kode` varchar(10) NOT NULL,
  `pasien_nama` varchar(100) DEFAULT NULL,
  `pasien_alamat` varchar(100) DEFAULT NULL,
  `pasien_hp` varchar(25) DEFAULT NULL,
  `pasien_email` varchar(100) DEFAULT NULL,
  `pasien_lahir_tanggal` date DEFAULT NULL,
  `pasien_usia` int(11) DEFAULT '1',
  `pasien_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`pasien_kode`)
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
