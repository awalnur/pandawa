-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: pandawa
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosen` (
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL,
  `gelar` varchar(20) NOT NULL,
  `foto_dosen` varchar(100) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES ('12314448','Dosen ABC7D ','M.si A.md, I7-64000U','default.png'),('12344557','Dosen ABC7D ','M.si, M.Op, EsDm','default.png'),('12344558','Dosen ABC7D','','default.png'),('12344559','Dosen ABC7D','','default.png'),('12344560','Dosen ABC7D','','default.png'),('12344570','Dosen ABC7D','','default.png'),('123466','Dosen ABC7D','','default.png');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_pertanyaan`
--

DROP TABLE IF EXISTS `jenis_pertanyaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_pertanyaan` (
  `idjenis_pertanyaan` int NOT NULL,
  `jenis` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idjenis_pertanyaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_pertanyaan`
--

LOCK TABLES `jenis_pertanyaan` WRITE;
/*!40000 ALTER TABLE `jenis_pertanyaan` DISABLE KEYS */;
INSERT INTO `jenis_pertanyaan` VALUES (1,'Kepribadian'),(2,'Pedagogik'),(3,'Profesional'),(4,'Sosial');
/*!40000 ALTER TABLE `jenis_pertanyaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `kode_matkul` varchar(14) DEFAULT NULL,
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `thn_akademik` varchar(6) NOT NULL,
  `idprodi` int NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `kode_matkul` (`kode_matkul`),
  KEY `npm` (`nid`),
  KEY `idprodi` (`idprodi`),
  CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `makul` (`kode_matkul`),
  CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`nid`) REFERENCES `dosen` (`nid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas`
--

LOCK TABLES `kelas` WRITE;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` VALUES (1,'MK.1234.12','12314448','2','20212',1),(2,'MK.1234.13','12344557','10','20212',1),(6,'MK.1234.12','12344560','13','20221',1),(7,'MK.1234.12','12314448','4','20221',1),(8,'MK.1234.12','12344558','1','20221',1),(9,'MK.1234.12','12344560','3','20221',1),(10,'MK.1234.12','12344560','12','20221',1);
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kritiksaran`
--

DROP TABLE IF EXISTS `kritiksaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kritiksaran` (
  `id_ks` int NOT NULL AUTO_INCREMENT,
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nim` varchar(11) NOT NULL,
  `kritiksaran` text NOT NULL,
  `thn_akademik` varchar(6) NOT NULL,
  PRIMARY KEY (`id_ks`),
  KEY `npm` (`nid`),
  KEY `nim` (`nim`),
  CONSTRAINT `kritiksaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kritiksaran`
--

LOCK TABLES `kritiksaran` WRITE;
/*!40000 ALTER TABLE `kritiksaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `kritiksaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makul`
--

DROP TABLE IF EXISTS `makul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `makul` (
  `kode_matkul` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `matkul` varchar(45) DEFAULT NULL,
  `sks` varchar(3) NOT NULL,
  `semester` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`kode_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makul`
--

LOCK TABLES `makul` WRITE;
/*!40000 ALTER TABLE `makul` DISABLE KEYS */;
INSERT INTO `makul` VALUES ('MK.1234.12','Makul 1344','3','5'),('MK.1234.13','Makul 2','','2'),('MK.1234.15','Makul 3','','2'),('MK.1234.53','Makul 54','','2'),('MK.1234.54','Makul 5','','2');
/*!40000 ALTER TABLE `makul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mhs`
--

DROP TABLE IF EXISTS `mhs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mhs` (
  `nim` varchar(11) NOT NULL,
  `nama_mhs` varchar(45) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `idprodi` int DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`nim`),
  KEY `idprodi` (`idprodi`),
  CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`idprodi`) REFERENCES `prodi` (`idprodi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mhs`
--

LOCK TABLES `mhs` WRITE;
/*!40000 ALTER TABLE `mhs` DISABLE KEYS */;
INSERT INTO `mhs` VALUES ('2019150080','Ahmad Rifai','2019',1,'$2y$10$uSbY5Q9OSkFuoC2DSWiYf.eK0eElXkTMBAT9tH/UTjbGmnoWsss5a'),('2019150081','Slamet Daroji','2019',3,'$2y$10$qjQe5/WnbbJrUsJutIeZ7OQ7pz0WudF2n.b8gjjJZ0ycB/C1kBt6a');
/*!40000 ALTER TABLE `mhs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mhs_kelas`
--

DROP TABLE IF EXISTS `mhs_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mhs_kelas` (
  `id_kelasmhs` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(11) NOT NULL,
  `id_kelas` int NOT NULL,
  `dinilai` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kelasmhs`),
  KEY `nim` (`nim`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `mhs_kelas_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `mhs_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mhs_kelas`
--

LOCK TABLES `mhs_kelas` WRITE;
/*!40000 ALTER TABLE `mhs_kelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `mhs_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `mhsprodi`
--

DROP TABLE IF EXISTS `mhsprodi`;
/*!50001 DROP VIEW IF EXISTS `mhsprodi`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `mhsprodi` AS SELECT 
 1 AS `nim`,
 1 AS `nama_mhs`,
 1 AS `angkatan`,
 1 AS `nama_prodi`,
 1 AS `idprodi`,
 1 AS `fakultas`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `nilai`
--

DROP TABLE IF EXISTS `nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int NOT NULL,
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nilai` int NOT NULL,
  `thn_akademik` varchar(6) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_pertanyaan` (`id_pertanyaan`),
  KEY `npm` (`nid`),
  KEY `nim` (`nim`),
  CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`idpertanyaan`),
  CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nid`) REFERENCES `dosen` (`nid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nilai`
--

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pertanyaan`
--

DROP TABLE IF EXISTS `pertanyaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pertanyaan` (
  `idpertanyaan` int NOT NULL AUTO_INCREMENT,
  `idjenis_pertanyaan` int NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idpertanyaan`),
  KEY `idjenis_pertanyaan` (`idjenis_pertanyaan`),
  CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`idjenis_pertanyaan`) REFERENCES `jenis_pertanyaan` (`idjenis_pertanyaan`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pertanyaan`
--

LOCK TABLES `pertanyaan` WRITE;
/*!40000 ALTER TABLE `pertanyaan` DISABLE KEYS */;
INSERT INTO `pertanyaan` VALUES (1,1,'Adil dalam memperlakukan mahasiswa'),(2,1,'Kearifan dalam mengambil keputusan'),(3,1,'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),(4,1,'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),(5,1,'Kewibawaan sebagai pribadi dosen'),(6,2,'Adil dalam memperlakukan mahasiswa'),(7,2,'Kearifan dalam mengambil keputusan'),(8,2,'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),(9,2,'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),(10,2,'Kewibawaan sebagai pribadi dosen'),(11,3,'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),(12,4,'Kewibawaan sebagai pribadi dosen'),(13,3,'Kearifan dalam mengambil keputusan'),(14,3,'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),(15,3,'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),(16,3,'Kewibawaan sebagai pribadi dosen'),(17,4,'Kearifan dalam mengambil keputusan'),(18,4,'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),(19,4,'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),(20,4,'Kewibawaan sebagai pribadi dosen');
/*!40000 ALTER TABLE `pertanyaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodi` (
  `idprodi` int NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(45) DEFAULT NULL,
  `fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`idprodi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodi`
--

LOCK TABLES `prodi` WRITE;
/*!40000 ALTER TABLE `prodi` DISABLE KEYS */;
INSERT INTO `prodi` VALUES (1,'Akuntansi','Ekonomi dan Bisnis'),(2,'Manajemen','Ekonomi dan Bisnis'),(3,'Perbankan Syariah','Ekonomi dan Bisnis');
/*!40000 ALTER TABLE `prodi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thn_akademik`
--

DROP TABLE IF EXISTS `thn_akademik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thn_akademik` (
  `thn_akademik` varchar(6) NOT NULL,
  `aktif` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`thn_akademik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thn_akademik`
--

LOCK TABLES `thn_akademik` WRITE;
/*!40000 ALTER TABLE `thn_akademik` DISABLE KEYS */;
INSERT INTO `thn_akademik` VALUES ('20211',0),('20212',0),('20221',1),('202213',0),('20222',0);
/*!40000 ALTER TABLE `thn_akademik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2y$10$so.Xql.Gdy2yEqnO/DdMpO/GWL1CaH6k8GYokdLUy8N3uh2L5rGyG','admin','admin@admin','alamat admin',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `mhsprodi`
--

/*!50001 DROP VIEW IF EXISTS `mhsprodi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`dev`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `mhsprodi` AS select `mhs`.`nim` AS `nim`,`mhs`.`nama_mhs` AS `nama_mhs`,`mhs`.`angkatan` AS `angkatan`,`prodi`.`nama_prodi` AS `nama_prodi`,`prodi`.`idprodi` AS `idprodi`,`prodi`.`fakultas` AS `fakultas` from (`mhs` join `prodi` on((`mhs`.`idprodi` = `prodi`.`idprodi`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-02 21:50:08
