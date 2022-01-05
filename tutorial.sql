/*
SQLyog Ultimate v9.02 
MySQL - 5.5.5-10.4.10-MariaDB : Database - tutorial
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tutorial` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tutorial`;

/*Table structure for table `tb_siswa` */

DROP TABLE IF EXISTS `tb_siswa`;

CREATE TABLE `tb_siswa` (
  `kd_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tb_siswa` */

insert  into `tb_siswa`(`kd_siswa`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`no_telp`,`alamat`) values (2,'Diva Sejati','wanita','Jogjakarta','1999-03-02','03432432','Jl magelang'),(3,'Joni Esteh','pria','Jogjakarta','2002-02-03','086655565','Jl. Widuri'),(7,'Tes Nama','pria','jakarta','2000-01-01','0865353553','Sleman Jogjakarta'),(8,'Jono Lono','pria','Jogjakarta','2000-09-01','086725555','Jl. Sulawesi'),(9,'Agus Wahono','pria','Magelang','1999-04-20','0876565267','Jl. Magelang No. 10 Trihanggo, Sleman, DI. Yogyakarta'),(10,'Joni','pria','Jakarta','2000-01-01','0878373736','Jl. Sadewa no 18'),(13,'Jihan','wanita','Jakarta','2000-01-01','0878373736','Jl. Sadewa no 18');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`username`,`password`,`nama`) values ('ada','$2y$10$Yrh/oSzwTK9BpO71ySSsBe8QvY0fxi0mwFCXV.FAaE/gf9kljpnPC','ada'),('angga','$2y$10$Tqplx9NrWnlf4mIMYZmYIOaaVCEjxmFnvqGA5MJWEdRqnfHoIguSC','Angga'),('tes','$2y$10$EcyFqsZmbphavCps.BgUp.0GUDjrfAX8a1VNyjGsTuVdZYACYIk8S','tes'),('tes1','$2y$10$GLMgXtHjh/NlK8enD7dpoOHROckhDKlkaBdelMIiJVEgBVhelzuxS','tes1'),('user','$2y$10$XD2aevubxM5OSdW5DAkR3.3fUOT1LGFVRA6P3k2JK.sZ6SgPvI2Ty','Nama User'),('wew','$2y$10$/IekayN3JdzXEfwwK8WCb.OnkDBUuuPWWK1VWBHXI4mp6z7W8vGJO','wewe');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
