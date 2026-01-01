-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: spmb_smk
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'frhandfraa','$2y$10$TT8t.787dRexEeHp4JI6H.16/AYDsDOTlYTASEAcyuk0yr/cJLPLK','Farhan Defra Jaya Kusuma','2025-12-15 05:53:25');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id_faq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_spmb`
--

DROP TABLE IF EXISTS `jadwal_spmb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_spmb` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tahap` varchar(100) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` enum('Dibuka','Ditutup','Akan Datang') DEFAULT 'Akan Datang',
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_spmb`
--

LOCK TABLES `jadwal_spmb` WRITE;
/*!40000 ALTER TABLE `jadwal_spmb` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_spmb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peserta_biodata`
--

DROP TABLE IF EXISTS `peserta_biodata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peserta_biodata` (
  `id_biodata` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `nama_panggilan` varchar(100) DEFAULT NULL,
  `nik` char(16) DEFAULT NULL,
  `nisn` char(10) DEFAULT NULL,
  `no_kk` char(16) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `anak_ke` int(11) DEFAULT NULL,
  `jumlah_saudara` int(11) DEFAULT NULL,
  `status_keluarga` enum('kandung','tiri','angkat') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jalan` varchar(150) DEFAULT NULL,
  `rt` varchar(20) DEFAULT NULL,
  `rw` varchar(20) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `status_tinggal` varchar(50) DEFAULT NULL,
  `jarak_sekolah` varchar(50) DEFAULT NULL,
  `transportasi` varchar(50) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `kebutuhan_khusus` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_biodata`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peserta_biodata`
--

LOCK TABLES `peserta_biodata` WRITE;
/*!40000 ALTER TABLE `peserta_biodata` DISABLE KEYS */;
INSERT INTO `peserta_biodata` VALUES (1,1,'Farhan Defra Jaya Kusuma','Farhan','1375012309030001','0052492212','1373020217110004','Malang','2003-09-23','L','Islam','Indonesia',1,2,'kandung',NULL,'Jalan H. Adam Malik','000','000','Santur','Barangin','Sawahlunto','Sumatera Barat','23477','Bersama Orang Tua','0.00','Sepeda Motor',160,32,'tidak ada','081234567890','jayakusumabkt2309@gmail.com','2025-12-15 22:09:08');
/*!40000 ALTER TABLE `peserta_biodata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_rombel` int(11) NOT NULL,
  `no_pendaftaran` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT 'L',
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `status_penerimaan` enum('diterima','tidak_diterima','menunggu') DEFAULT 'menunggu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`),
  KEY `id_rombel` (`id_rombel`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_rombel`) REFERENCES `rombel` (`id_rombel`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smk`
--

DROP TABLE IF EXISTS `smk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smk` (
  `id_smk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_smk` varchar(150) NOT NULL,
  `npsn` varchar(20) DEFAULT NULL,
  `status` enum('Negeri','Swasta') DEFAULT 'Negeri',
  `kabupaten` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `akreditasi` varchar(5) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_smk`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smk`
--

LOCK TABLES `smk` WRITE;
/*!40000 ALTER TABLE `smk` DISABLE KEYS */;
INSERT INTO `smk` VALUES (27,'SMK Negeri 1 Padang','10304847','Negeri','Kota Padang','Jl. Mahmud Yunus, Anduring, Kec. Kuranji, Kota Padang, Sumatera Barat 25152',-0.9231787,100.3901881,'A',1,NULL,'2025-12-15 23:57:18'),(28,'SMK Negeri 1 Sumatera Barat','10310780','Negeri','Kota Padang','Jl. M. Yunus No.26-10, Anduring, Kec. Kuranji, Kota Padang, Sumatera Barat 25176',-0.9300668,100.3879409,'A',1,NULL,'2025-12-15 23:57:18'),(29,'SMK Negeri 10 Padang','10307617','Negeri','Kota Padang','Simpang Kantor Camat, Jl. Flamboyan, Lubuk Buaya, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25586',-0.8217223,100.3212675,'A',1,NULL,'2025-12-15 23:57:18'),(30,'SMK Negeri 2 Padang','10304848','Negeri','Kota Padang','Simpang Haru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25121',-0.945125,100.3787364,'A',1,NULL,'2025-12-15 23:57:18'),(31,'SMK Negeri 3 Padang','10304849','Negeri','Kota Padang','Jl. Jend. Sudirman No.11, Kp. Jao, Kec. Padang Bar., Kota Padang, Sumatera Barat 25251',-0.9451722,100.362371,'A',1,NULL,'2025-12-15 23:57:18'),(32,'SMK Negeri 5 Padang','10304851','Negeri','Kota Padang','Jl. Beringin Raya No.4, Lolong Belanti, Kec. Padang Utara, Kota Padang, Sumatera Barat',-0.9214294,100.3514783,'A',1,NULL,'2025-12-15 23:57:18'),(33,'SMK Negeri 6 Padang','10303507','Negeri','Kota Padang','Jl. Suliki No.1, Jati Baru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129',-0.9368018,100.364647,'A',1,NULL,'2025-12-15 23:57:18'),(34,'SMK Negeri 7 Padang','10304188','Negeri','Kota Padang','Jl. Raya Padang Indarung, Cangkeh Nan XX, Kec. Lubuk Begalung, Kota Padang, Sumatera Barat 25159',-0.9498055,100.4152122,'A',1,NULL,'2025-12-15 23:57:18'),(35,'SMK Negeri 8 Padang','10304852','Negeri','Kota Padang','Jl. Raya Padang - Indarung, Cangkeh Nan XX, Kec. Lubuk Begalung, Kota Padang, Sumatera Barat 25225',-0.9516398,100.4154607,'A',1,NULL,'2025-12-15 23:57:18'),(36,'SMK PP N Padang','69734159','Negeri','Kota Padang','Jl. Pertanian, Lubuk Minturun, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25175',-0.8455286,100.3854021,'A',1,NULL,'2025-12-15 23:57:18'),(37,'SMK SMAK PADANG','10307616','Negeri','Kota Padang','Jl. Limau Manis, Limau Manis, Kec. Pauh, Kota Padang, Sumatera Barat 25176',-0.9333832,100.4411142,'A',1,NULL,'2025-12-15 23:57:18'),(38,'SMKN 4 PADANG','10304850','Negeri','Kota Padang','Jl. Raya Padang - Indarung, Cangkeh Nan XX, Kec. Lubuk Begalung, Kota Padang, Sumatera Barat 25159',-0.9517423,100.4153078,'A',1,NULL,'2025-12-15 23:57:18'),(39,'SMKN 9 PADANG','10304853','Negeri','Kota Padang','Jl. Bundo Kanduang No.18, Kp. Pd., Kec. Padang Bar., Kota Padang, Sumatera Barat 25119',-0.9542991,100.3595563,'A',1,NULL,'2025-12-15 23:57:18');
/*!40000 ALTER TABLE `smk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_pendaftaran` varchar(20) DEFAULT 'draft',
  `is_verified` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Farhan Defra Jaya kusuma','jayakusumabkt2309@gmail.com','$2y$10$3G80ylnjw50mlf3K6acSdeIsRAkK1kWkrQhFk5F/oJgFtGzX9cYKu',NULL,'2025-12-15 21:12:11','final',1);
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

-- Dump completed on 2025-12-16  9:25:47
