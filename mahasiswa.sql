/*
SQLyog Ultimate v13.1.8 (64 bit)
MySQL - 5.7.17-log : Database - mahasiswa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `mahasiswa_tab` */

DROP TABLE IF EXISTS `mahasiswa_tab`;

CREATE TABLE `mahasiswa_tab` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mahasiswa_tab` */

insert  into `mahasiswa_tab`(`nim`,`nama`,`alamat`) values 
('129380','Agust','Tanggerang'),
('130230','Patlisan','CIkarang 1'),
('154330','Novanda','Ciledug'),
('154333','Namora','Jakarta 1');

/*Table structure for table `matakuliah_tab` */

DROP TABLE IF EXISTS `matakuliah_tab`;

CREATE TABLE `matakuliah_tab` (
  `kd_mtk` varchar(5) NOT NULL,
  `nm_mtk` varchar(20) DEFAULT NULL,
  `sks` int(3) DEFAULT '0',
  PRIMARY KEY (`kd_mtk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `matakuliah_tab` */

insert  into `matakuliah_tab`(`kd_mtk`,`nm_mtk`,`sks`) values 
('2001','Data Mining',4),
('2002','Big Data',4),
('2003','Sistem Operasi',3);

/*Table structure for table `nilai_tab` */

DROP TABLE IF EXISTS `nilai_tab`;

CREATE TABLE `nilai_tab` (
  `nim` varchar(10) NOT NULL,
  `kd_mtk` varchar(5) NOT NULL,
  `tugas` int(3) DEFAULT NULL,
  `uts` int(3) DEFAULT NULL,
  `uas` int(3) DEFAULT NULL,
  PRIMARY KEY (`nim`,`kd_mtk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `nilai_tab` */

insert  into `nilai_tab`(`nim`,`kd_mtk`,`tugas`,`uts`,`uas`) values 
('129380','2001',100,78,90),
('129380','2002',100,70,10),
('129380','2003',80,90,70),
('130230','2001',50,70,98),
('130230','2002',100,100,100),
('130230','2003',80,45,40);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
