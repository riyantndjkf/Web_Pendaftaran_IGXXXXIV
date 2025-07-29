-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: babak_2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_07_26_154510_add_gambar_to_tsoalqr_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('ea6sirChjBZe3pCSTUf2nL8Lgo8dRigGppUu97nz',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YToxMTp7czo2OiJfdG9rZW4iO3M6NDA6IkZReUdxRXdSQVRWalJTVTlnajdxT25rNW9VekJHY2VZdE9LYTNiY2ciO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvcmFsbHktMi9jbGFpbS1lbnZlbG9wZS8xNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTI6ImFrc2VzX3NvYWxfMyI7YjoxO3M6MTQ6InBlcm5haF9ha3Nlc18zIjtiOjE7czoxMjoiYWtzZXNfc29hbF81IjtiOjE7czoxNDoicGVybmFoX2Frc2VzXzUiO2I6MTtzOjEyOiJha3Nlc19zb2FsXzYiO2I6MTtzOjE0OiJwZXJuYWhfYWtzZXNfNiI7YjoxO3M6MTY6ImFrc2VzX2VudmVsb3BlXzEiO2I6MTtzOjE3OiJha3Nlc19lbnZlbG9wZV8xNSI7YjoxO30=',1753784051);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tfactory`
--

DROP TABLE IF EXISTS `tfactory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tfactory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tTeam_id` int(11) NOT NULL,
  `isUnlocked` tinyint(1) NOT NULL DEFAULT 0,
  `isMaintenance` tinyint(1) NOT NULL DEFAULT 0,
  `biaya_unlock` int(11) NOT NULL DEFAULT 105000,
  `waktu_unlock` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tFactory_tTeam1_idx` (`tTeam_id`),
  CONSTRAINT `fk_tFactory_tTeam1` FOREIGN KEY (`tTeam_id`) REFERENCES `tteam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tfactory`
--

LOCK TABLES `tfactory` WRITE;
/*!40000 ALTER TABLE `tfactory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tfactory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmachine`
--

DROP TABLE IF EXISTS `tmachine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmachine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` enum('Cutting','Welding','Painting','Assembly') NOT NULL,
  `jenis` enum('1','2','3','4') NOT NULL,
  `harga_dasar` int(11) NOT NULL,
  `kapasitas_dasar` int(11) NOT NULL DEFAULT 0,
  `base_time` int(11) NOT NULL,
  `biaya_maintenance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmachine`
--

LOCK TABLES `tmachine` WRITE;
/*!40000 ALTER TABLE `tmachine` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmachine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmysteryenvelope`
--

DROP TABLE IF EXISTS `tmysteryenvelope`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmysteryenvelope` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reward_amount` int(11) NOT NULL,
  `deskripsi_lokasi` varchar(255) NOT NULL,
  `tTeam_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tMysteryEnvelope_tTeam1_idx` (`tTeam_id`),
  CONSTRAINT `fk_tMysteryEnvelope_tTeam1` FOREIGN KEY (`tTeam_id`) REFERENCES `tteam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmysteryenvelope`
--

LOCK TABLES `tmysteryenvelope` WRITE;
/*!40000 ALTER TABLE `tmysteryenvelope` DISABLE KEYS */;
INSERT INTO `tmysteryenvelope` VALUES (1,3000,'Gazebo Teknik',NULL),(2,3000,'Meja Pelangi',NULL),(3,3000,'Boulevard Teknik',NULL),(4,3000,'Gedung TG',NULL),(5,3000,'KSM Teknik Industri',NULL),(6,4000,'Vending Machine TB',NULL),(7,4000,'Kantin Keluwih',NULL),(8,4000,'Tangga TF',NULL),(9,4000,'Toilet TF Lantai 3',NULL),(10,4000,'Lab Industri New',NULL),(11,5000,'Lab TC 4 Informatika',NULL),(12,5000,'Ruang Elektro',NULL),(13,5000,'Tempat Sampah Farmasi',NULL),(14,5000,'Tangga Gedung TG',NULL),(15,5000,'Jembatan TF & TB',NULL);
/*!40000 ALTER TABLE `tmysteryenvelope` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tproduction`
--

DROP TABLE IF EXISTS `tproduction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tproduction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tTeam_id` int(11) NOT NULL,
  `tSession_id` int(11) NOT NULL,
  `unit_diproduksi` int(11) NOT NULL,
  `unit_defect` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `unit_terjual` int(11) NOT NULL,
  `biaya_invectory` int(11) NOT NULL,
  `maintenance_paid` int(11) NOT NULL,
  `uang_didapatkan` int(11) NOT NULL,
  `poin_didapatkan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tProduction_tTeam1_idx` (`tTeam_id`),
  KEY `fk_tProduction_tSession1_idx` (`tSession_id`),
  CONSTRAINT `fk_tProduction_tSession1` FOREIGN KEY (`tSession_id`) REFERENCES `tsession` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tProduction_tTeam1` FOREIGN KEY (`tTeam_id`) REFERENCES `tteam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tproduction`
--

LOCK TABLES `tproduction` WRITE;
/*!40000 ALTER TABLE `tproduction` DISABLE KEYS */;
/*!40000 ALTER TABLE `tproduction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tqualitycontrol`
--

DROP TABLE IF EXISTS `tqualitycontrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tqualitycontrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tTeam_id` int(11) NOT NULL,
  `tipe_mesin` enum('1','2','3') NOT NULL,
  `level_qc` enum('1','2','3') NOT NULL,
  `persentase_defect` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tQualityControl_tTeam1_idx` (`tTeam_id`),
  CONSTRAINT `fk_tQualityControl_tTeam1` FOREIGN KEY (`tTeam_id`) REFERENCES `tteam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tqualitycontrol`
--

LOCK TABLES `tqualitycontrol` WRITE;
/*!40000 ALTER TABLE `tqualitycontrol` DISABLE KEYS */;
/*!40000 ALTER TABLE `tqualitycontrol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tsession`
--

DROP TABLE IF EXISTS `tsession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_sesi` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `demand` int(11) NOT NULL,
  `event` enum('reward_amount * 1.5','maintenance * 1.5') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsession`
--

LOCK TABLES `tsession` WRITE;
/*!40000 ALTER TABLE `tsession` DISABLE KEYS */;
/*!40000 ALTER TABLE `tsession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tsoalqr`
--

DROP TABLE IF EXISTS `tsoalqr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tsoalqr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` enum('1','2','3') NOT NULL,
  `pertanyaan` varchar(510) NOT NULL,
  `reward_amount` int(11) NOT NULL,
  `option_1` varchar(255) DEFAULT NULL,
  `option_2` varchar(255) DEFAULT NULL,
  `option_3` varchar(255) DEFAULT NULL,
  `option_4` varchar(255) DEFAULT NULL,
  `jawaban_benar` varchar(255) NOT NULL,
  `gambar_soal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tsoalqr`
--

LOCK TABLES `tsoalqr` WRITE;
/*!40000 ALTER TABLE `tsoalqr` DISABLE KEYS */;
INSERT INTO `tsoalqr` VALUES (1,'1','Nilai \\( x \\) yang memenuhi \\( 2x - 5 < 3x + 2 \\) adalah...',1200,'\\( x > -7 \\)','\\( x < -7 \\)','\\( x > 7 \\)','\\( x < 7 \\)','x>-7',NULL),(2,'1','Jika \\( x + y = 7 \\) dan \\( 2x - y = 5 \\), maka nilai \\( y \\) adalah...',1200,NULL,NULL,NULL,NULL,'3',NULL),(3,'1','Gradien garis yang melalui titik \\( (1, 2) \\) dan \\( (3, 12) \\) adalah...',1200,NULL,NULL,NULL,NULL,'5',NULL),(4,'1','Nilai \\( x \\) yang memenuhi \\( 2^{x+1} = 16 \\) adalah...',1200,NULL,NULL,NULL,NULL,'3',NULL),(5,'1','Median dari data: 3, 5, 7, 8, 10 adalah...',1200,'3','5,5','7','7,5','7',NULL),(6,'1','Jika \\( \\tan \\theta = 1 \\), maka \\( \\theta \\) adalah...',1200,'\\( 30^\\circ \\)','\\( 45^\\circ \\)','\\( 60^\\circ \\)','\\( 90^\\circ \\)','45∘',NULL),(7,'1','Titik puncak parabola \\( y = x^2 - 4x + 3 \\) adalah...',1200,'\\( (2, -1) \\)','\\( (1, 0) \\)','\\( (-2, 15) \\)','\\( (4, 3) \\)','(2,-1)',NULL),(8,'1','Jika \\( f(x) = x^3 + 4x^2 - 2x - 3 \\), maka \\( f(5) \\) adalah...',1200,NULL,NULL,NULL,NULL,'212',NULL),(9,'1','Negasi dari \"Semua siswa rajin belajar\" adalah...',1200,'Beberapa siswa tidak rajin belajar','Tidak ada siswa yang rajin belajar','Semua siswa tidak rajin belajar','Beberapa siswa rajin belajar','Beberapa siswa tidak rajin belajar',NULL),(10,'1','Jika \\( p \\) benar dan \\( q \\) salah, nilai kebenaran \\( p \\lor \\lnot q \\) adalah...',1200,'Benar','Salah','Tidak dapat ditentukan','Bukan pernyataan','Benar',NULL),(11,'1','Gradien garis \\( y = -2x + 5 \\) adalah...',1200,NULL,NULL,NULL,NULL,'-2',NULL),(12,'1','\\( \\mathrm{HCl} \\) termasuk senyawa...',1200,'Basa kuat','Asam kuat','Garam','Netral','Asam kuat',NULL),(13,'1','Unsur \\( X \\) memiliki nomor atom \\( 11 \\) dan massa atom \\( 23 \\). Maka jumlah neutronnya adalah...',1200,'12','11','23','13','12',NULL),(14,'1','Rumus kimia dari air adalah...',1200,'\\( \\mathrm{CO_2} \\)','\\( \\mathrm{H_2O} \\)','\\( \\mathrm{HCl} \\)','\\( \\mathrm{OH^-} \\)','h2o',NULL),(15,'1','Rumus massa jenis adalah...',1200,'\\( m \\times V \\)','\\( \\frac{V}{m} \\)','\\( \\frac{m}{V} \\)','\\( V \\times m^2 \\)','mv',NULL),(16,'1','Asam memiliki pH...',1200,'Di atas 7','Tepat 7','Di bawah 7','Tidak terukur','Di bawah 7',NULL),(17,'2','Berapa digit terakhir dari \\( 33^{2025} \\)?',2000,NULL,NULL,NULL,NULL,'3',NULL),(18,'2','Nilai dari \\( \\sin 150^\\circ + \\cos 300^\\circ \\) adalah...',2000,NULL,NULL,NULL,NULL,'1',NULL),(19,'2','Persamaan garis yang melalui titik \\( (1, 2) \\) dengan gradien \\( 3 \\) adalah...',2000,'\\( y = 3x - 1 \\)','\\( y = 3x + 1 \\)','\\( y = x + 3 \\)','\\( y = -3x + 5 \\)','y=3x-1',NULL),(20,'2','Turunan pertama dari \\( f(x) = 3x^4 - 2x^2 + 5 \\) adalah...',2000,'\\( 12x^3 - 4x \\)','\\( 6x^3 - 2x \\)','\\( 12x^2 - 4 \\)','\\( 6x^3 - 4x \\)','12x3-4x',NULL),(21,'2','Jika \\( f(x) = 2x - 1 \\) dan \\( g(x) = x^2 \\), maka \\( (f \\circ g)(3) \\) adalah...',2000,NULL,NULL,NULL,NULL,'17',NULL),(22,'2','Jika diketahui \\( M_r\\ \\mathrm{H_2O} = 18 \\) dan massa \\( 36 \\) gram, maka jumlah mol \\( \\mathrm{H_2O} \\) adalah...',2000,'1','2','3','18','2',NULL),(23,'2','Volume 2 mol gas ideal pada STP adalah...',2000,'\\( 22{,}4\\ \\text{L} \\)','\\( 24\\ \\text{L} \\)','\\( 44{,}8\\ \\text{L} \\)','\\( 48\\ \\text{L} \\)','44,8 l',NULL),(24,'2','Jika \\( 25\\ \\mathrm{mL} \\) \\( \\mathrm{HCl} \\) \\( 0{,}1\\ \\mathrm{M} \\) direaksikan sempurna dengan \\( 25\\ \\mathrm{mL} \\) \\( \\mathrm{NaOH} \\) \\( 0{,}1\\ \\mathrm{M} \\), maka pH campuran setelah reaksi adalah...',2000,NULL,NULL,NULL,NULL,'7',NULL),(25,'2','Jika massa jenis larutan adalah \\( 1{,}2\\ \\mathrm{g/mL} \\) dan volumenya \\( 250\\ \\mathrm{mL} \\), hitung massanya dalam gram!',2000,NULL,NULL,NULL,NULL,'300',NULL),(26,'2','Ion yang terbentuk dari pelepasan elektron disebut...',2000,'Anion','Kation','Proton','Elektron','Kation',NULL),(27,'3','Jika akar-akar persamaan \\( x^2 - 4x + 13 = 0 \\) adalah \\( \\alpha \\) dan \\( \\beta \\), nilai dari \\( \\alpha^4 + \\beta^4 \\) adalah...',3000,'-238','-100','169','338','-238',NULL),(28,'3','Berapa sisa pembagian \\( 3^{100} \\) oleh \\( 101 \\)?',3000,NULL,NULL,NULL,NULL,'1',NULL),(29,'3','Sebuah pabrik memproduksi dua jenis tas: tas premium (Rp\\(500.000\\)/unit) dan tas standar (Rp\\(300.000\\)/unit). Setiap tas premium membutuhkan \\(4\\) jam kerja dan \\(2\\) kg bahan baku, sedangkan tas standar membutuhkan \\(2\\) jam kerja dan \\(1\\) kg bahan baku. Jika tersedia \\(200\\) jam kerja dan \\(100\\) kg bahan baku per hari, berapa keuntungan maksimum yang dapat diperoleh?',3000,'Rp25 juta','Rp30 juta','Rp35 juta','Rp40 juta','Rp30 juta',NULL),(30,'3','Populasi bakteri berkembang 2 kali lipat setiap 3 jam. Jika awalnya ada 100 bakteri, berapa waktu yang dibutuhkan untuk mencapai 6.400 bakteri ?',3000,'12 jam','18 jam','24 jam','30 jam','18 jam',NULL),(31,'3','Sebuah wadah terdiri dari tabung (jari-jari \\(7\\ \\text{cm}\\), tinggi \\(10\\ \\text{cm}\\)) dan kerucut (jari-jari \\(7\\ \\text{cm}\\), tinggi \\(24\\ \\text{cm}\\)) yang ditumpuk. Berapa volume total wadah (dalam \\(\\pi\\))?',3000,'\\( 392\\pi\\ \\mathrm{cm^3} \\)','\\( 784\\pi\\ \\mathrm{cm^3} \\)','\\( 882\\pi\\ \\mathrm{cm^3} \\)','\\( 960\\pi\\ \\mathrm{cm^3} \\)','882π cm3',NULL),(32,'3','Ion kompleks berikut yang memiliki bilangan koordinasi 6 adalah...',3000,'\\( \\mathrm{[Ag(NH_3)_2]^+} \\)','\\( \\mathrm{[Fe(CN)_6]^{3-}} \\)','\\( \\mathrm{[Cu(NH_3)_4]^{2+}} \\)','\\( \\mathrm{[Zn(OH)_4]^{2-}} \\)','[fe(cn)6]3-',NULL),(33,'3','Hitung \\( \\Delta G \\) (kJ) jika \\( \\Delta H = -100\\ \\mathrm{kJ} \\) dan \\( \\Delta S = +200\\ \\mathrm{J/mol{\\cdot}K} \\) pada \\( 300\\ \\mathrm{K} \\)!',3000,NULL,NULL,NULL,NULL,'-160',NULL),(34,'3','Larutan \\( \\mathrm{CH_3COOH} \\) \\( 0{,}1\\ \\mathrm{M} \\) memiliki derajat ionisasi \\( \\alpha = 0{,}01 \\), hitung \\( [\\mathrm{H}^+] \\) larutan tersebut!',3000,'0,001 M','0,01 M','0,1 M','1 M','0,001 M',NULL),(35,'3','Reaksi pengendapan akan terjadi jika larutan \\( \\mathrm{AgNO_3} \\) dicampur dengan...',3000,'\\( \\mathrm{NaCl} \\)','\\( \\mathrm{KNO_3} \\)','\\( \\mathrm{KCl} \\)','\\( \\mathrm{HNO_3} \\)','nacl',NULL),(36,'3','Bentuk molekul dari \\( \\mathrm{NH_3} \\) berdasarkan teori VSEPR adalah...',3000,'Linear','Tetrahedral','Segitiga datar','Piramida trigonal','Piramida trigonal',NULL),(37,'2','Jika \\( f(x) = 3x - 2 \\), maka \\( f^{-1}(4) \\) adalah…',2000,NULL,NULL,NULL,NULL,'2',NULL),(38,'2','Dua dadu dilempar. Peluang muncul jumlah mata dadu 7 adalah...',2000,'\\( \\frac{1}{2} \\)','\\( \\frac{1}{6} \\)  ','\\( \\frac{1}{12} \\)  ','\\( \\frac{1}{36} \\)','16',NULL),(39,'2','Nilai dari \\( \\lim_{x \\to 3} \\frac{x^2 - 9}{x - 3} \\) adalah...',2000,NULL,NULL,NULL,NULL,'6',NULL),(40,'2','Nilai dari \\( \\lim_{x \\to 0} \\frac{\\sin x}{x} \\) adalah...',2000,'0','1','Tak hingga','Tak terdefinisi','1',NULL),(41,'2','Luas daerah yang dibatasi \\( y = x^2 \\) dan \\( y = 2x \\) adalah…',2000,'\\( 4 \\)','\\( \\frac{8}{3} \\)','\\( \\frac{16}{3} \\)','\\( \\frac{4}{3} \\)','43',NULL),(42,'2','Berapa banyak cara duduk 6 orang di meja bundar jika 2 orang tertentu tidak boleh bersebelahan?',2000,NULL,NULL,NULL,NULL,'72',NULL),(43,'2','Dalam satu set kartu remi (52 kartu), diambil satu kartu secara acak. Berapa peluang kartu yang terambil adalah kartu berwarna merah atau merupakan kartu King?',2000,'\\( \\frac{1}{2} \\)','\\( \\frac{7}{13} \\)','\\( \\frac{15}{26} \\)','\\( \\frac{11}{52} \\)','713',NULL),(44,'2','Diberikan vektor \\( \\mathbf{a} = (1, 2, 3) \\) dan \\( \\mathbf{b} = (2, -1, 0) \\). Panjang proyeksi vektor \\( \\mathbf{a} \\) pada vektor \\( \\mathbf{b} \\) adalah…',2000,NULL,NULL,NULL,NULL,'0',NULL),(45,'2','Jika vektor \\( \\mathbf{a} = (2, -1) \\) dan vektor \\( \\mathbf{b} = (3, 4) \\), hasil dari vektor \\( 2\\mathbf{a} + \\mathbf{b} \\) adalah...',2000,'\\( (5, 3) \\)','\\( (8, -1) \\)','\\( (6, -4) \\)','\\( (7, 2) \\)','(7,2)',NULL),(46,'3','Di sebuah kelas, 60% siswa suka matematika dan 40% suka fisika. Jika 30% suka keduanya, berapa peluang siswa yang suka fisika juga suka matematika? (Gunakan tanda titik { . } sebagai pengganti koma)',3000,NULL,NULL,NULL,NULL,'0.75',NULL),(47,'3','Diberikan suatu trapesium \\(ABCD\\) dengan \\( AB \\; \\text{sejajar} \\; CD \\). Misalkan titik \\(P\\) dan \\(Q\\) berturut-turut pada \\(AD\\) dan \\(BC\\) sedemikian sehingga\\( PQ \\; \\text{sejajar} \\; AB \\) dan membagi trapesium menjadi dua bagian yang sama luasnya. Jika \\(AB = 17\\) dan \\(CD = 7\\), maka nilai \\(PQ\\) adalah...',3000,'10','12','13','15','13',NULL),(48,'3','Sebuah roket bergerak dengan persamaan \\( h(t) = -2t^2 + 40t \\) (meter). Kapan roket mencapai ketinggian maksimum (dalam detik)?',3000,NULL,NULL,NULL,NULL,'10',NULL),(49,'3','Suatu perusahaan mengukur keuntungan \\( U(t) = 2t \\) dan biaya \\( C(t) = t^2 + 4 \\). Jika \\( t \\) adalah waktu dalam tahun, kapan keuntungan melebihi biaya untuk pertama kali?',3000,'Tahun ke-3','Tahun ke-4','Tahun ke-5','Tahun ke-6','Tahun ke-5',NULL),(50,'3','Dari 10 siswa (4 perempuan: \\( P_1, P_2, P_3, P_4 \\) dan 6 laki-laki), sebuah tim berisi 5 orang dipilih secara acak. Berapa peluang tim itu terdiri dari tepat 2 perempuan dan \\( P_1 \\) dan \\( P_2 \\) tidak boleh bersama?',3000,'\\( \\frac{5}{21} \\)','\\( \\frac{10}{63} \\)','\\( \\frac{25}{63} \\)','\\( \\frac{50}{126} \\)','2563',NULL),(51,'3','Dari huruf-huruf dalam kata \"KOMBINATORIKA\", berapa banyak susunan berbeda yang bisa dibentuk jika semua huruf vokal tidak boleh saling berdampingan?',3000,NULL,NULL,NULL,NULL,'6350400',NULL),(52,'1','NaCl termasuk senyawa ionik.',1200,NULL,NULL,NULL,NULL,'TRUE',NULL),(53,'1','Semua senyawa karbon bersifat organik.',1200,NULL,NULL,NULL,NULL,'FALSE',NULL),(54,'1','Ion positif disebut anion.',1200,NULL,NULL,NULL,NULL,'FALSE',NULL),(55,'1','Air laut merupakan campuran heterogen',1200,NULL,NULL,NULL,NULL,'FALSE',NULL),(56,'1','Elektrolit kuat menghantarkan listrik lebih baik daripada elektrolit lemah.',1200,NULL,NULL,NULL,NULL,'TRUE',NULL),(57,'1','Gas mulia bersifat sangat reaktif.',1200,NULL,NULL,NULL,NULL,'FALSE',NULL),(58,'2','Manakah pasangan volume dan konsentrasi berikut yang menghasilkan jumlah mol zat terbesar?',2000,'\\(150\\,\\text{mL} \\times 0{,}1\\,\\text{M}\\)','\\(200\\,\\text{mL} \\times 0{,}05\\,\\text{M}\\)','\\(250\\,\\text{mL} \\times 0{,}04\\,\\text{M}\\)','\\(50\\,\\text{mL} \\times 0{,}2\\,\\text{M}\\)','150ml×0,1m',NULL),(59,'2','Hitung konsentrasi larutan jika \\(0{,}2\\,\\text{mol}\\) zat terlarut dilarutkan dalam \\(0{,}5\\,\\text{L}\\) larutan! (Gunakan tanda titik { . } sebagai pengganti koma)',2000,NULL,NULL,NULL,NULL,'0.4',NULL),(60,'2','Jika \\(25\\,\\text{mL}\\) larutan \\(\\mathrm{HCl}\\) \\(1\\,\\text{M}\\) diencerkan menjadi \\(100\\,\\text{mL}\\), berapa konsentrasi akhirnya? (Gunakan tanda titik { . } sebagai pengganti koma)',2000,NULL,NULL,NULL,NULL,'0.25',NULL),(61,'2','Berapa bilangan oksidasi N dalam \\(\\mathrm{HNO_3}\\)?',2000,NULL,NULL,NULL,NULL,'+5',NULL),(62,'2','Jika volume larutan adalah \\(0{,}25~\\mathrm{L}\\) dan konsentrasi \\(1{,}5~\\mathrm{M}\\), berapa mol zat terlarutnya? (Gunakan tanda titik { . } sebagai pengganti koma)',2000,NULL,NULL,NULL,NULL,'0.375',NULL),(63,'2','Hitung jumlah mol elektron yang dibutuhkan untuk mereduksi \\( 0{,}3 \\) mol \\( \\mathrm{Fe}^{3+} \\) menjadi \\( \\mathrm{Fe} \\). (Gunakan tanda titik { . } sebagai pengganti koma)',2000,NULL,NULL,NULL,NULL,'0.9',NULL),(64,'2','Ion kompleks \\( \\left[\\mathrm{Cu}(\\mathrm{NH}_3)_4\\right]^{2+} \\) termasuk...',2000,'Anion kompleks','Kation kompleks','Molekul nonpolar','Senyawa kovalen','Kation kompleks',NULL),(65,'2','Jika \\( [\\mathrm{H}^+] = 1 \\times 10^{-6} \\ \\mathrm{M} \\), hitung pH larutan tersebut!',2000,NULL,NULL,NULL,NULL,'6',NULL),(66,'2','Zat yang dapat menyebabkan efek Tyndall adalah...',2000,'Larutan gula','Koloid susu','Air murni','Larutan NaCl','Koloid susu',NULL),(67,'2','Campuran \\(200\\ \\mathrm{mL}\\) NaOH \\(0{,}1\\ \\mathrm{M}\\) dengan \\(100\\ \\mathrm{mL}\\) HCl \\(0{,}1\\ \\mathrm{M}\\) akan menghasilkan larutan dengan pH…',2000,'1,9','7,3','11,2','12,5','12,5',NULL),(68,'3','Dalam reaksi pembakaran sempurna etana \\((\\mathrm{C_2H_6})\\), jumlah mol \\(\\mathrm{CO_2}\\) yang dihasilkan dari \\(2\\ \\text{mol}\\ \\mathrm{C_2H_6}\\) adalah...',3000,'2','3','4','5','4',NULL),(69,'3','Jika tekanan dalam sistem kesetimbangan gas ditingkatkan, maka sistem akan bergeser ke arah...',3000,'Yang memiliki jumlah mol gas lebih besar','Yang memiliki jumlah mol gas lebih kecil','Tidak berubah','Endoterm','Yang memiliki jumlah mol gas lebih kecil',NULL),(70,'3','Sebanyak \\( 0{,}1 \\) mol \\( \\mathrm{Ca(OH)_2} \\) dilarutkan dalam air hingga volumenya \\( 1 \\) liter. Hitung pH larutan!',3000,NULL,NULL,NULL,NULL,'13',NULL),(71,'3','Jika \\( 0{,}02 \\) mol \\( \\mathrm{CH_3COOH} \\) \\( 0{,}1 \\, \\mathrm{M} \\) bereaksi dengan \\( \\mathrm{NaOH} \\) \\( 0{,}02 \\) mol, maka pH larutan setelah reaksi adalah...',3000,'3','4,7','8,9','13','8,9',NULL),(72,'3','Hitung kalor (\\( J \\)) yang dilepaskan jika \\( 100 \\) gram air didinginkan dari \\( 80^\\circ\\mathrm{C} \\) ke \\( 30^\\circ\\mathrm{C} \\). \\( (c = 4{,}18 \\, \\mathrm{J/g^\\circ C}) \\)',3000,NULL,NULL,NULL,NULL,'20900',NULL),(73,'3','Zat X memiliki titik didih lebih tinggi dari Y, padahal massa molarnya lebih kecil. Kemungkinan besar X memiliki...',3000,'Ikatan ion','Ikatan hidrogen','Ikatan logam','Ikatan kovalen non-polar','Ikatan hidrogen',NULL),(74,'1','Jika tingkat akurasi produksi adalah \\( 98\\% \\), dari \\( 1000 \\) unit yang diproduksi akan ada ... unit cacat.',1200,NULL,NULL,NULL,NULL,'20',NULL),(75,'1','Jika efisiensi lini produksi adalah \\( 80\\% \\), waktu kerja efektif dalam \\( 1 \\) jam adalah ... menit.',1200,NULL,NULL,NULL,NULL,'48',NULL),(76,'1','Salah satu tujuan utama dari Teknik Industri adalah...',1200,'Merancang desain bangunan','Mendesain produk','Mengoptimalkan sistem produksi','Mengoperasikan mesin','Mengoptimalkan sistem produksi',NULL),(77,'1','Tujuan utama dari \\( \\textit{Lean Manufacturing} \\) adalah ...',1200,'Menambah biaya','Mengurangi pemborosan','Menambah tenaga kerja','Memperbanyak produksi','Mengurangi pemborosan',NULL),(78,'1','Seorang operator dapat memproduksi pensil 50 unit dalam waktu 2 jam. produktivitas operator tersebut dalam memproduksi pensil adalah …. unit/jam.',1200,NULL,NULL,NULL,NULL,'25',NULL),(79,'1','Sebuah proses produksi membutuhkan 3 menit untuk memproduksi tiap unit. Berapa unit yang bisa diselesaikan dalam waktu 1 jam?',1200,NULL,NULL,NULL,NULL,'20',NULL),(80,'1','Dalam \\( \\textit{SWOT} \\), faktor \\( \\textit{Strength} \\) merujuk pada ...',1200,'Kelemahan yang harus diperbaiki','Ancaman dari pesaing','Keunggulan internal yang dimiliki perusahaan','Peluang dari luar perusahaan','Keunggulan internal yang dimiliki perusahaan',NULL),(81,'1','Faktor dalam ergonomi mencakup hal berikut, kecuali...',1200,'Pencahayaan lingkungan kerja','Postur tubuh saat bekerja','Beban angkat dan aktivitas fisik','Struktur organisasi perusahaan','Struktur organisasi perusahaan',NULL),(82,'1','Aplikasi \\( \\textit{Aluminum Alloy} \\), kecuali:',1200,'Konstruksi Berat / Jembatan','Velg Mobil','Peralatan Dapur','Kemasan Minuman Kaleng','Konstruksi Berat / Jembatan',NULL),(83,'1','Manakah di bawah ini yang bukan termasuk kriteria utama dalam pemilihan lokasi fasilitas industri?',1200,'Kedekatan dengan market','Biaya tenaga kerja','Jumlah pesaing','Estetika lokasi','Estetika lokasi',NULL),(84,'1','Pengujian tarik (\\textit{tensile test}) digunakan untuk mengetahui sifat logam seperti...',1200,'Tingkat kerapatan','Titik leleh dan titik didih','Modulus elastisitas dan regangan','Kecepatan reaksi dengan udara','Modulus elastisitas dan regangan',NULL),(85,'1','Apa yang dimaksud dengan \\( \\textit{Delivery Lead Time} \\)?',1200,'Waktu yang dibutuhkan untuk menyelesaikan proses produksi','Waktu dari pesanan diterima hingga produk dikirim ke pelanggan','Waktu istirahat dalam proses distribusi','Total waktu kerja karyawan logistik','Waktu dari pesanan diterima hingga produk dikirim ke pelanggan',NULL),(86,'1','Jika sebuah perusahaan memiliki \\( \\textit{Delivery Lead Time} = 7 \\) hari, artinya...',1200,'Pelanggan menerima barang 7 hari setelah pemesanan','Barang diproduksi dalam 7 hari','Gudang diisi kembali setiap 7 hari','Pekerja Gudang harus bekerja 7 hari penuh','Pelanggan menerima barang 7 hari setelah pemesanan',NULL),(87,'1','Apa yang dimaksud dengan pendekatan \\( \\textit{Integrated System Thinking} \\)?',1200,'Pendekatan untuk membuat sistem menjadi lebih rumit tanpa mempertimbangkan keterkaitannya','Pemikiran parsial (hanya melihat sebagian kecil saja) dari suatu sistem','Pendekatan yang mempertimbangkan semua komponen sistem sebagai bagian yang saling terhubung','Pengujian sistem berdasarkan intuisi tanpa disertai analisis sistemastis terhadap suatu sistem','Pendekatan yang mempertimbangkan semua komponen sistem sebagai bagian yang saling terhubung',NULL),(88,'1','Berikut ini merupakan prinsip dasar manajemen mutu menurut \\( \\textit{ISO 9001} \\), kecuali...',1200,'Fokus pada pelanggan','Kepemimpinan','Pendekatan proses','Kompetisi antar karyawan','Kompetisi antar karyawan',NULL),(89,'2','Sistem \\( \\textit{JIT (Just in Time)} \\) bertujuan untuk ...',2000,'Memperbanyak kapasitas gudang','Mengurangi stok berlebih','Menunda pengiriman','Mengurangi jam lembur','Mengurangi stok berlebih',NULL),(90,'2','Sistem produksi yang dilakukan dalam satu alur tanpa gangguan disebut...',2000,'\\( \\textit{Parallel system} \\)  ','\\( \\textit{Push system} \\)','\\( \\textit{Multi-line system} \\)','\\( \\textit{One-piece flow} \\)','one-piece flow',NULL),(91,'2','Konsep \\( \\textit{mass customization} \\) bertujuan untuk ...',2000,'Personalisasi produk dalam volume besar ','Produksi satu model saja','Menekan biaya produksi serendah mungkin','Menyeragamkan semua produk','Personalisasi produk dalam volume besar ',NULL),(92,'2','Konsep \\( \\textit{\"Fitting the Task to the Man\"} \\) dalam ergonomi berarti ...',2000,'Manusia harus menggantikan mesin','Semua pekerjaan dapat dikerjakan manusia','Tugas disesuaikan dengan kemampuan manusia ','Pekerjaan tidak dapat dimodifikasi ','Tugas disesuaikan dengan kemampuan manusia ',NULL),(93,'2','Jika sebuah mesin rusak dan berhenti \\( 2 \\) jam dari \\( 10 \\) jam kerja, maka efektivitas mesin tersebut adalah ...%.',2000,NULL,NULL,NULL,NULL,'80',NULL),(94,'2','Analisis sistem terintegrasi bertujuan untuk...',2000,'Mengoptimalkan satu bagian saja ','Mengurangi keterlibatan pengguna ','Meminimalkan kinerja tim','Menyelaraskan seluruh elemen sistem','Menyelaraskan seluruh elemen sistem',NULL),(95,'2','\\( \\textit{Mass production} \\) sangat erat kaitannya dengan konsep ...',2000,'\\( \\textit{Economic of scale} \\) ','\\( \\textit{Overproduction} \\) ','\\( \\textit{Batch system} \\) ','\\( \\textit{Lean thinking} \\)','economic of scale',NULL),(96,'2','\\( \\textit{Kaizen} \\) dikenal sebagai budaya ...',2000,'Penggantian sistem','Perbaikan berkelanjutan','Evaluasi tahunan','Perbaikan sebagian sistem saja','Perbaikan berkelanjutan',NULL),(97,'2','Mesin A menghasilkan \\( 500 \\) unit dalam \\( 10 \\) jam dan mesin B menghasilkan \\( 300 \\) unit dalam \\( 5 \\) jam. Mesin yang lebih produktif adalah ...',2000,'Mesin A','Mesin B','Kedua mesin sama-sama produktif','Tergantung operator','Mesin B',NULL),(98,'2','Manfaat dilakukannya \\( \\textit{elemental breakdown} \\) adalah ...',2000,'Menggabung beberapa aktivitas menjadi satu tahapan besar ','Menambah tahapan proses dalam rangkaian aktivitas','Menyusun ulang suatu aktivitas untuk efisiensi','Mengidentifikasi bagian proses paling cepat dalam rangkaian aktivitas','Menyusun ulang suatu aktivitas untuk efisiensi',NULL),(99,'2','Dalam sistem produksi, istilah \\( \\textit{lead time} \\) merujuk pada ...',2000,'Waktu akhir suatu proses produksi','Waktu mulai dari suatu proses produksi ','Waktu antara awal hingga akhir proses produksi','Volume produksi yang dihasilkan selama proses produksi berlangsung','Waktu antara awal hingga akhir proses produksi',NULL),(100,'2','Istilah \\( \\textit{dead stock} \\) dalam industri artinya ...',2000,'Barang yang dijual dengan harga yang sangat mahal','Barang yang cepat laku','Barang yang mudah rusak','Barang yang tidak terjual dalam waktu lama','Barang yang tidak terjual dalam waktu lama',NULL),(101,'2','Suatu mesin bekerja selama \\( 8 \\) jam dan menghasilkan \\( 400 \\) unit produk. Laju produksi dari mesin tersebut adalah ... unit/jam.',2000,NULL,NULL,NULL,NULL,'50',NULL),(102,'2','Tujuan dari \\( \\textit{system thinking} \\) dalam Teknik Industri adalah ...',2000,'Memahami interaksi antar elemen sistem','Memutuskan proses yang tidak penting dalam suatu sistem','Menghindari koordinasi antar elemen sistem','\\( \\textit{Fokus hanya pada output saja} \\)','Memahami interaksi antar elemen sistem',NULL),(103,'2','\\( \\textit{Continuous improvement} \\) mendorong suatu perusahaan untuk ...',2000,'Berhenti pada saat suatu sistem dirasa sudah efisien ','Meningkatkan proses secara bertahap dan terus-menerus','Menambah tenaga kerja manual berdasarkan hasil evaluasi sistem','Menggunakan solusi lama untuk melanjutkan kinerja suatu sistem kedepannya','Meningkatkan proses secara bertahap dan terus-menerus',NULL),(104,'2','Dalam industri, efisiensi sistem yang tinggi berarti …',2000,'Penggunaan bahan baku yang banyak dan variatif serta waktu produksi yang singkat','Penggunaan bahan baku yang sedikit dan waktu produksi yang lama','Jumlah tenaga kerja sesedikit mungkin dan output yang dihasilkan sedikit','Jumlah tenaga kerja sesedikit mungkin dan output yang dihasilkan banyak','Jumlah tenaga kerja sesedikit mungkin dan output yang dihasilkan banyak',NULL),(105,'3','Dalam besi tuang kelabu \\( \\textit{(grey cast iron)} \\), struktur grafitnya berubah menjadi partikel.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(106,'3','Elemen utama apa yang digunakan untuk membuat paduan \\( \\textit{stainless steel?} \\)',3000,'\\( \\textit{Kromium} \\) ','\\( \\textit{Tin} \\) ','\\( \\textit{Titanium} \\) ','\\( \\textit{Aluminium} \\)','kromium',NULL),(107,'3','Salah satu cara pemerintah menerapkan kebijakan fiskal ekspansif adalah dengan meningkatkan belanja pemerintah.',3000,NULL,NULL,NULL,NULL,'TRUE',NULL),(108,'3','Jika perekonomian suatu negara mengalami resesi, kebijakan moneter yang mungkin diambil oleh bank sentral untuk mendorong pertumbuhan adalah...',3000,'Menaikkan suku bunga acuan','Menjual surat-surat berharga pemerintah','Menaikkan rasio cadangan wajib bank','Menurunkan suku bunga acuan','Menurunkan suku bunga acuan',NULL),(109,'3','Karyawan di PT ABC rata-rata membutuhkan waktu \\( 3 \\) menit untuk menyelesaikan satu produk. Base rate di PT ABC adalah Rp \\( 6.000 \\) per jamnya. Jika seorang karyawan dapat menyelesaikan \\( 24 \\) produk per jam, maka penghasilan (pokok dan insentif) yang bisa karyawan itu dapatkan jika dalam sehari terdapat \\( 8 \\) jam kerja adalah... rupiah.',3000,NULL,NULL,NULL,NULL,'57600',NULL),(110,'3','Produk Domestik Bruto (PDB) nominal suatu negara pada tahun \\( 2024 \\) adalah sebesar Rp\\( 15.000 \\) triliun. Indeks harga (deflator PDB) pada tahun \\( 2024 \\) adalah \\( 125 \\) (dengan tahun dasar \\( 2015 = 100 \\)). Maka nilai PDB riil (dalam triliun rupiah) pada tahun \\( 2024 \\) berdasarkan harga tahun dasar sebesar Rp... triliun.',3000,NULL,NULL,NULL,NULL,'12000',NULL),(111,'3','Apa guna mesin frais \\( \\textit{Milling Machine} \\)?',3000,'Untuk membentuk permukaan material','Untuk menyambung material','Untuk mengecor besi','Untuk coating besi','Untuk membentuk permukaan material',NULL),(112,'3','Jenis las apa yang tidak memerlukan listrik sebagai energi?',3000,'\\( \\textit{GTAW} \\)','\\( \\textit{SMAW} \\)','\\( \\textit{Oxy-Acetylene Welding} \\)','\\( \\textit{Laser Beam Welding} \\)','oxy-acetylene welding',NULL),(113,'3','Manakah dari pernyataan berikut yang sesuai dengan ilmu antropometri dalam ergonomi?',3000,'Tingkat stress kerja karyawan','Pembuatan meja dan kursi yang sesuai dengan ukuran tubuh operator','Suhu dan kelembaban ruang kerja','Kapasitas dan output hasil produksi yang dapat diselesaikan oleh operator','Pembuatan meja dan kursi yang sesuai dengan ukuran tubuh operator',NULL),(114,'3','Optimalisasi tata letak dan desain ergonomis workstation dianggap sebagai variabel signifikan dalam meminimalkan pemborosan gerak serta meningkatkan efisiensi kognitif dan mekanis pekerja, sehingga berkontribusi terhadap peningkatan produktivitas kerja.',3000,NULL,NULL,NULL,NULL,'TRUE',NULL),(115,'3','Manakah elemen \\( \\textit{Therblig} \\) yang sesuai untuk kegiatan mengambil bolpoin dari atas meja?',3000,'RE, G, M','PP, P, A','PP, RL, U','AD, H, A','RE, G, M',NULL),(116,'3','PT Maju Terus adalah perusahaan manufaktur komponen otomotif. Dalam beberapa bulan terakhir, perusahaan mengalami peningkatan jumlah produk cacat, yaitu sekitar 10 dari setiap 1.000 unit yang diproduksi. Setelah dilakukan analisis, diketahui bahwa sebagian besar cacat disebabkan oleh kesalahan penyetelan mesin. Manajemen kemudian menerapkan pendekatan Kaizen dengan langkah-langkah berikut: Menyusun checklist penyetelan mesin harian. Memberikan pelatihan ulang kepada operator mesin. Menyediakan papan visua',3000,'Fokus pada hasil akhir dan bonus karyawan','Perbaikan besar dengan investasi alat baru','Perubahan bertahap yang melibatkan karyawan','Restrukturisasi total organisasi','Perubahan bertahap yang melibatkan karyawan',NULL),(117,'3','Semakin tinggi struktur hirarki dalam suatu perusahaan, akan selalu membuat struktur organisasi dalam perusahaan tersebut semakin baik.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(118,'3','Waktu standar seorang pekerja untuk menyelesaikan perakitan handphone adalah \\( 3 \\) menit/unit-produk. Jika base rate sebesar Rp\\( 5.000 \\) per jamnya, maka berapa banyak uang yang didapat oleh seorang pekerja per jamnya jika dapat menghasilkan \\( 22 \\) unit per jamnya?',3000,'5.000 rupiah','5.500 rupiah','6.000 rupiah','10.000 rupiah','5.500 rupiah',NULL),(119,'1','Negara dengan ekspor teknologi tinggi terbesar di dunia adalah …',1200,'Amerika','Jepang','China','Rusia','China',NULL),(120,'1','Satuan Internasional yang digunakan untuk mengukur berat adalah …',1200,'Liter','Gram','Kilogram','Newton','Newton',NULL),(121,'1','Komponen yang menyimpan energi listrik dalam rangkaian disebut …',1200,'Kapasitor','Resistor','Baterai','Generator','Kapasitor',NULL),(122,'1','Bahan bakar fosil terbentuk dari …',1200,'Kelapa sawit','Sisa makhluk hidup purba','Kotoran hewan','Tumbuhan yang membusuk','Sisa makhluk hidup purba',NULL),(123,'1','Bagian terkecil dari suatu unsur adalah …',1200,'Sel','Ion','Molekul','Atom','Atom',NULL),(124,'1','Tumbuhan yang bisa hidup di tempat kering disebut tumbuhan …',1200,'\\( \\textit{Tropofit} \\)','\\( \\textit{Hidrofit} \\)','\\( \\textit{Xerofit} \\)','\\( \\textit{Higrofit} \\)','xerofit',NULL),(125,'1','Gas yang jumlahnya paling banyak di atmosfer bumi adalah …',1200,'\\( \\mathrm{O} \\)','\\( \\mathrm{H} \\)','\\( \\mathrm{CO_2} \\)','\\( \\mathrm{N} \\)','n',NULL),(126,'1','Salah satu kota di Indonesia yang dikenal sebagai kota pelajar adalah …',1200,'Bandung','Yogyakarta','Malang','Surabaya','Yogyakarta',NULL),(127,'1','Dalam sistem pemerintahan Indonesia, lembaga yang berwenang untuk mengadili perkara sengketa kewenangan lembaga negara adalah…',1200,'Komisi Yudisial','Mahkamah Agung','Mahkamah Konstitusi','Dewan Perwakilan Rakyat','Mahkamah Konstitusi',NULL),(128,'1','Nama lengkap penulis novel berjudul, “Bumi Manusia” adalah …',1200,'Pramoedya Ananta Toer','Andrea Hirata','Sapardi Djoko Damono','Chairil Anwar','Pramoedya Ananta Toer',NULL),(129,'1','Gunung yang pernah meletus dahsyat pada tahun 1815 adalah …',1200,'Gunung Krakatau','Gunung Agung','Gunung Tambora','Gunung Merapi','Gunung Tambora',NULL),(130,'1','Alat optik yang digunakan untuk melihat benda-benda di kejauhan dengan lebih jelas adalah …',1200,'Periskop','Kacamata','Mikroskop','Teleskop','Teleskop',NULL),(131,'1','Jenis gelombang suara yang dikeluarkan oleh paus adalah...',1200,'Audiosonik','Infrasonik','Ultrasonik','Supersonik','Infrasonik',NULL),(132,'1','Patung Liberty adalah simbol kebebasan yang terletak di Pulau … dan merupakan hadiah dari negara … sebagai tanda persahabatan',1200,'Ellis - Prancis','Ellis - Amerika Serikat ','Staten - Inggris','Liberty - Prancis','Ellis - Prancis',NULL),(133,'1','Organisme yang tidak bisa menghasilkan makanannya sendiri disebut …',1200,'\\( \\textit{Detritivor} \\)','\\( \\textit{Dekomposer} \\)','\\( \\textit{Parasit} \\) \\\\','\\( \\textit{Heterotrof} \\)','heterotrof',NULL),(134,'2','Unsur kimia dengan nomor atom 43 adalah satu-satunya unsur ringan yang tidak memiliki isotop stabil. Apa nama unsur tersebut?',2000,'\\( \\textit{Technetium} \\)','\\( \\textit{Promethium} \\)','\\( \\textit{Polonium} \\)','\\( \\textit{Francium} \\)','technetium',NULL),(135,'2','Alat yang digunakan untuk mengukur kekuatan gempa bumi adalah…',2000,'Barometer','Termometer','Seismograf','Anemometer','Seismograf',NULL),(136,'2','Pada masa Revolusi Industri di Inggris, sektor yang pertama kali mengalami mekanisasi secara luas adalah…',2000,'Pertanian','Pertambangan','Transportasi','Tekstil','Tekstil',NULL),(137,'2','Lapisan bumi tempat manusia hidup disebut…',2000,'Inti bumi','Mantel','Atmosfer','Litosfer','Litosfer',NULL),(138,'2','Peradaban kuno manakah yang pertama kali diketahui menggunakan sistem irigasi skala besar di wilayah Mesopotamia?',2000,'Akkadia','Babilonia','Sumeria','Asyur','Sumeria',NULL),(139,'2','Hukum kedua termodinamika menyatakan bahwa entropi dalam sistem tertutup akan selalu menurun.',2000,NULL,NULL,NULL,NULL,'FALSE',NULL),(140,'2','Mikroskop pertama kali dikembangkan oleh ilmuwan Inggris bernama Robert Hooke.',2000,NULL,NULL,NULL,NULL,'FALSE',NULL),(141,'2','Venus memiliki rotasi lebih lambat daripada revolusinya mengelilingi Matahari.',2000,NULL,NULL,NULL,NULL,'TRUE',NULL),(142,'2','Perang Dunia I dimulai pada tahun 1914.',2000,NULL,NULL,NULL,NULL,'TRUE',NULL),(143,'2','Pada kromosom manakah sindrom Down terjadi akibat trisomi?…',2000,'Kromosom 21','Kromosom 23','Kromosom 18','Kromosom 12','Kromosom 21',NULL),(144,'2','Hukum kekekalan massa dikemukakan oleh...',2000,'Lavoisier','Boyle','Avogadro','Dalton','Lavoisier',NULL),(145,'2','Proyek Manhattan adalah proyek riset rahasia yang menghasilkan bom atom pertama di dunia. Siapa direktur ilmiah proyek ini?',2000,'Niels Bohr','Robert Oppenheimer','Enrico Fermi','Richard Feynman','Robert Oppenheimer',NULL),(146,'2','Siapa penjelajah Eropa pertama yang mencapai India melalui jalur laut mengelilingi Tanjung Harapan?',2000,'Ferdinand Magellan','Vasco da Gama','Bartolomeu Dias','Christopher Columbus','Vasco da Gama',NULL),(147,'2','Bagian dari atom yang bermuatan negatif disebut...',2000,'Proton','Neutron','Ion','Elektron','Elektron',NULL),(148,'2','Organisme manakah yang berperan besar dalam menciptakan atmosfer kaya oksigen di Bumi purba?',2000,'Ganggang merah','Cyanobacteria','Protozoa','Amoeba','Cyanobacteria',NULL),(149,'2','Manusia pertama kali mendarat di Bulan pada tahun…',2000,'1967','1968','1969','1970','1969',NULL),(150,'3','Fenomena \\( \\textit{Doppler Effect} \\) menjelaskan mengapa bintang yang menjauh dari Bumi mengalami pergeseran cahaya ke arah \\( \\textbf{biru} \\)',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(151,'3','Hewan \\( \\textit{Axolotl} \\) tidak pernah mengalami metamorfosis sempurna dalam hidupnya.',3000,NULL,NULL,NULL,NULL,'TRUE',NULL),(152,'3','Proses \\( \\textit{osmosis} \\) hanya terjadi pada sel tumbuhan.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(153,'3','Dalam sistem klasifikasi makhluk hidup, \\( \\textit{famili} \\) memiliki kedudukan lebih tinggi daripada \\( \\textit{ordo} \\).',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(154,'3','Nilai \\( \\text{pH} \\) larutan garam hasil \\( \\textit{hidrolisis} \\) basa kuat dan asam lemah akan bersifat asam.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(155,'3','Konstitusi RIS (Republik Indonesia Serikat) berlaku lebih dari \\( 10 \\) tahun di Indonesia.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(156,'3','\\( \\textit{NATO} \\) adalah organisasi internasional yang didirikan setelah Perang Dunia I.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(157,'3','Perubahan iklim hanya dipengaruhi oleh aktivitas alamiah bumi.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(158,'3','\\( \\textit{Mount Everest} \\) terletak di perbatasan antara wilayah Nepal dan Tibet serta merupakan bagian dari pegunungan Himalaya.',3000,NULL,NULL,NULL,NULL,'TRUE',NULL),(159,'3','Dalam metabolisme sel, siklus \\( \\textit{Krebs} \\) terjadi di sitoplasma.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(160,'3','Piramida Giza dibangun oleh peradaban Maya',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(161,'3','Dalam metode ilmiah, hipotesis yang terbukti salah masih memiliki nilai ilmiah jika diuji dengan benar.',3000,NULL,NULL,NULL,NULL,'TRUE',NULL),(162,'3','Glikolisis menghasilkan bersih \\( 4 \\) ATP dari setiap molekul glukosa.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(163,'3','Atmosfer terdiri dari lima lapisan, dan lapisan \\( \\textit{termosfer} \\) adalah tempat terbentuknya awan cuaca.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(164,'3','Hewan \\( \\textit{platypus} \\) berkembang biak dengan bertelur.',3000,NULL,NULL,NULL,NULL,'TRUE',NULL),(165,'3','Revolusi Industri pertama kali terjadi di Prancis pada akhir abad ke-18.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(166,'3','Wilayah pedalaman cenderung memiliki amplitudo suhu harian lebih besar dibanding wilayah pesisir.',3000,NULL,NULL,NULL,NULL,'TRUE',NULL),(167,'3','Virus dapat bereproduksi sendiri di luar sel inang.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(168,'3','Otot polos bekerja secara sadar di bawah kendali otak',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(169,'3','Indeks pembangunan manusia (IPM) hanya mengukur pendapatan nasional bruto per kapita.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(170,'3','\\( \\textit{Stagflasi} \\) adalah kondisi ekonomi di mana terjadi inflasi tinggi disertai pengangguran rendah.',3000,NULL,NULL,NULL,NULL,'FALSE',NULL),(171,'1','\\( \\text{DNA} \\) terletak di dalam inti sel.',1200,NULL,NULL,NULL,NULL,'TRUE',NULL),(172,'1','Organel sel yang berfungsi sebagai tempat \\( \\textit{respirasi sel} \\) adalah...',1200,'\\( \\textit{Ribosom} \\)','\\( \\textit{Mitokondria} \\)','\\( \\textit{Nukleus} \\)','\\( \\textit{Retikulum endoplasma} \\)','mitokondria',NULL),(173,'1','Fungsi utama \\( \\textit{stomata} \\) pada daun adalah...',1200,'Menyerap air','Tempat fotosintesis','Tempat pertukaran gas','Tempat pembentukan klorofil','Tempat pertukaran gas',NULL),(174,'1','Alat ekskresi utama pada manusia adalah...',1200,'Hati','Ginjal','Paru-paru','Kandung kemih','Paru-paru',NULL),(175,'1','Enzim \\( \\textit{pepsin} \\) bekerja optimal di lingkungan asam seperti lambung.',1200,NULL,NULL,NULL,NULL,'TRUE',NULL),(176,'1','Zat hasil \\( \\textit{fotosintesis} \\) yang digunakan sebagai sumber energi adalah...',1200,'Oksigen','Air','Glukosa','Nitrogen','Glukosa',NULL),(177,'1','Manusia memiliki berapa pasang kromosom?',1200,'22','23','24','46','23',NULL),(178,'1','Organisme yang hanya memiliki satu sel disebut...',1200,'\\( \\textit{Multiseluler} \\)','\\( \\textit{Uniseluler} \\)','\\( \\textit{Prokariotik} \\)','\\( \\textit{Heterotrof} \\)','uniseluler',NULL),(179,'1','Enzim dalam mulut yang membantu mencerna \\( \\textit{karbohidrat} \\) adalah...',1200,'\\( \\textit{Tripsin} \\)','\\( \\textit{Amilase} \\)','\\( \\textit{Lipase} \\)','\\( \\textit{Pepsin} \\)','amilase',NULL),(180,'1','Sel darah merah mengandung hemoglobin untuk mengikat nutrisi.',1200,NULL,NULL,NULL,NULL,'FALSE',NULL),(181,'1','Salah satu akibat dari gangguan pada pankreas adalah...',1200,'\\( \\textit{Hipertensi} \\)','\\( \\textit{Diabetes melitus} \\)','\\( \\textit{Asma} \\)','\\( \\textit{Anemia} \\)','diabetes melitus',NULL),(182,'2','Perbedaan utama antara sel \\( \\textit{prokariotik} \\) dan \\( \\textit{eukariotik} \\) terletak pada...',2000,'Jumlah kromosom','Ada atau tidaknya dinding sel','Kecepatan pembelahan sel','Ada atau tidaknya membran inti','Ada atau tidaknya membran inti',NULL),(183,'2','Salah satu ciri khas jaringan \\( \\textit{xilem} \\) pada tumbuhan adalah...',2000,'Membawa hasil fotosintesis dari daun ke seluruh tubuh','Mengangkut air dan mineral dari akar ke daun','Mengandung kloroplas untuk fotosintesis','Berfungsi sebagai tempat cadangan makanan','Mengangkut air dan mineral dari akar ke daun',NULL),(184,'2','Salah satu ciri \\( \\textit{mitosis} \\) dibandingkan \\( \\textit{meiosis} \\) adalah...',2000,'Terjadi hanya pada sel kelamin','Menghasilkan empat sel anak','Menghasilkan dua sel anak yang identik secara genetik','Mengurangi jumlah kromosom','Menghasilkan dua sel anak yang identik secara genetik',NULL),(185,'2','Otot polos memiliki ciri...',2000,'Bekerja cepat dan mudah lelah','Bergerak secara sadar','Terdapat di organ dalam seperti usus dan lambung','Menempel pada rangka','Terdapat di organ dalam seperti usus dan lambung',NULL),(186,'1','Seekor kucing berlari ke arah timur sejauh \\( 9 \\) meter, kemudian berbelok ke selatan dan berlari lagi sejauh \\( 12 \\) meter. Perpindahan yang dialami kucing tersebut adalah... meter',1200,NULL,NULL,NULL,NULL,'15',NULL),(187,'1','Sebuah lokomotif mula-mula diam, kemudian bergerak dengan percepatan \\( 2\\ \\text{m/s}^2 \\). Berapa detik yang dibutuhkan ketika lokomotif menempuh jarak \\( 900\\ \\text{m} \\) ?',1200,'3 detik','6 detik','15 detik','30 detik','30 detik',NULL),(188,'1','Sebuah zat memiliki suhu \\( 77^\\circ\\mathrm{F} \\). Berapakah suhu zat tersebut dalam satuan Kelvin (K)?',1200,'\\( 273\\ \\text{K} \\)','\\( 298\\ \\text{K} \\)','\\( 313\\ \\text{K} \\)','\\( 325\\ \\text{K} \\)','298 k',NULL),(189,'1','Sebuah teropong digunakan untuk melihat bintang yang menghasilkan perbesaran anguler \\( 6 \\) kali. Jika jarak fokus lensa objektif \\( 30\\ \\text{cm} \\) dan mata tak berakomodasi, maka jarak fokus okulernya adalah...',1200,'5 cm','6 cm','7 cm','10 cm','5 cm',NULL),(190,'1','Dua buah cermin datar dipasang membentuk sudut \\( 20^\\circ \\) satu dengan lainnya. Di depan kedua cermin itu ada sebuah titik cahaya. Kedua cermin membentuk bayangan sebanyak...',1200,NULL,NULL,NULL,NULL,'17',NULL),(191,'1','Jika benda A memiliki massa \\( M \\) kg dan sejauh \\( R \\) dari permukaan bumi, sementara benda B memiliki massa \\( 2M \\) kg dengan posisi sejauh \\( 2R \\) dari permukaan bumi, maka perbandingan kuat medan gravitasi benda A dengan benda B adalah...',1200,'\\( 2 : 1 \\)','\\( 4 : 1 \\)','\\( 1 : 4 \\)','\\( 4 : 9 \\)','2:1',NULL),(192,'1','Sebuah remote TV memancarkan gelombang elektromagnetik agar dapat mengendalikan televisi dari jarak jauh. Gelombang yang digunakan oleh remote tersebut memiliki frekuensi sekitar \\( 3 \\times 10^{14} \\ \\text{Hz} \\). Jika cepat rambat cahaya di udara adalah \\( 3 \\times 10^8 \\ \\text{m/s} \\), maka panjang gelombang yang digunakan oleh remote tersebut adalah... meter. (Gunakan tanda titik { . } sebagai pengganti koma)',1200,NULL,NULL,NULL,NULL,'0.000001',NULL),(193,'1','Luas penampang pipa pada Venturimeter adalah \\( 18\\ \\text{cm}^2 \\) dan \\( 6\\ \\text{cm}^2 \\). Beda ketinggian air pada pipa adalah \\( 5\\ \\text{cm} \\), maka kecepatan aliran air pada venturimeter berdiameter kecil adalah...',1200,'\\( 35\\ \\text{cm/s} \\)','\\( 50\\ \\text{cm/s} \\)','\\( 55\\ \\text{cm/s} \\)','\\( 60\\ \\text{cm/s} \\)','35 cm/s',NULL),(194,'1','Persamaan simpangan gelombang berjalan \\( y = 10 \\sin \\pi (0{,}5t - 2x) \\). Jika \\( x \\) dan \\( y \\) dalam meter serta \\( t \\) dalam sekon, maka cepat rambat gelombang adalah...',1200,'\\( 0{,}25\\ \\text{m/s} \\)','\\( 0{,}5\\ \\text{m/s} \\)','\\( 1\\ \\text{m/s} \\)','\\( 1{,}5\\ \\text{m/s} \\)','0,25 m/s',NULL),(195,'2','Bola bermassa \\( 1{,}2\\ \\text{kg} \\) dilontarkan dari tanah dengan laju \\( 16\\ \\text{m/s} \\). Dengan percepatan gravitasi \\( 10\\ \\text{m/s}^2 \\), berapa detik waktu yang diperlukan bola untuk tiba kembali ke tanah? (Gunakan tanda titik { . } sebagai pengganti koma)',2000,NULL,NULL,NULL,NULL,'3.2',NULL),(196,'2','Sebuah benda berotasi dengan kecepatan anguler \\( \\omega = t^3 + 2t^2 - 4 \\) dan \\( \\omega \\) dalam rad/s. Percepatan anguler benda tersebut saat \\( t = 3 \\) sekon adalah...',2000,'\\( 72\\ \\text{rad/s}^2 \\)','\\( 41\\ \\text{rad/s}^2 \\)','\\( 39\\ \\text{rad/s}^2 \\)','\\( 18\\ \\text{rad/s}^2 \\)','39 rad/s2',NULL),(197,'2','Di dalam sebuah lift ditempatkan sebuah timbangan badan. Saat lift dalam keadaan diam, seseorang menimbang badannya dan didapatkan bahwa berat badan orang tersebut \\( 500\\  \\text{N} \\). Jika lift bergerak ke atas dengan percepatan tetap \\( 5\\ \\text{m/s}^2 \\) dan \\( g = 10\\ \\text{m/s}^2 \\), maka berat orang tersebut menjadi...',2000,'\\( 250\\ \\text{N} \\)','\\( 400\\ \\text{N} \\)','\\( 500\\ \\text{N} \\)','\\( 750\\ \\text{N} \\)','750 n',NULL),(198,'2','Sebuah mesin Carnot awalnya menghasilkan usaha \\( 750\\ \\text{kJ} \\) dengan suhu panas \\( 800\\ \\text{K} \\) dan suhu dingin \\( 500\\ \\text{K} \\). Jika mesin ditingkatkan kinerjanya sehingga usahanya menjadi \\( 1000\\ \\text{kJ} \\) (dengan kalor masuk tetap), berapa suhu dingin barunya?',2000,'\\( 350\\ \\text{K} \\)','\\( 400\\ \\text{K} \\)','\\( 450\\ \\text{K} \\)','\\( 500\\ \\text{K} \\)','400 k',NULL),(199,'2','Sebuah benda terapung di atas permukaan air yang berlapiskan minyak dengan \\( 50\\% \\) volume benda berada di dalam air dan \\( 40\\% \\) di dalam minyak, sisanya berada di atas permukaan minyak. Apabila massa jenis minyak \\( 0{,}8\\ \\text{gr/cm}^3 \\), maka massa jenis benda dalam \\( \\text{gr/cm}^3 \\) adalah...',2000,'0,82','0,66','0,64','0,5','0,82',NULL),(200,'2','Sebuah besi \\( 2\\ \\text{N} \\) diikat dengan tali dan dimasukkan ke dalam minyak bermassa jenis \\( 0{,}8\\ \\text{gr/cm}^3 \\). Jika massa jenis besi diasumsikan \\( 8\\ \\text{gr/cm}^3 \\), maka gaya tegangan tali adalah...',2000,'\\( 2\\ \\text{N} \\)','\\( 1{,}8\\ \\text{N} \\)','\\( 1{,}6\\ \\text{N} \\)','\\( 1{,}2\\ \\text{N} \\)','1,8 n',NULL),(201,'1','Dari gambar di bawah ini, air memancar dari pipa kecil di bagian bawah tandon dan jatuh di tanah sejauh \\( x \\) dari kaki penahan tandon. Jika \\( g = 10\\ \\text{m/s}^2 \\), maka besar \\( x \\) adalah...',1200,'5 m','10 m','15 m','25 m','5 m','Fisika_Mudah_4.png'),(202,'2','Perhatikan gambar di bawah ini. Jika koefisien gerak kinetis antara balok A dan meja adalah \\( 0{,}1 \\) dan percepatan gravitasi \\( 10\\ \\text{m/s}^2 \\), maka gaya yang harus diberikan balok A agar sistem bergerak ke kiri dengan percepatan \\( 2\\ \\text{m/s}^2 \\) adalah...',2000,'\\( 70\\ \\text{N} \\)','\\( 90\\ \\text{N} \\)','\\( 150\\ \\text{N} \\)','\\( 330\\ \\text{N} \\)','330 n','Fisika_Sedang_5.png'),(203,'2','Berdasarkan gambar rangkaian listrik di bawah ini, beda potensial antara titik \\( B \\) dan \\( D \\) adalah...',2000,'\\( 0{,}5\\ \\text{V} \\)','\\( 1\\ \\text{V} \\)','\\( 3\\ \\text{V} \\)','\\( 4\\ \\text{V} \\)','3 v','Fisika_Sedang_12.png'),(204,'2','Dua partikel \\( P \\) dan \\( Q \\) terpisah pada jarak \\( 9\\ \\text{cm} \\) seperti pada gambar. Letak titik yang kuat medannya nol adalah...',2000,'\\( 9\\ \\text{cm} \\) di kiri \\( P \\)','\\( 9\\ \\text{cm} \\) di kanan \\( P \\)','\\( 6\\ \\text{cm} \\) di kanan \\( P \\)','\\( 6\\ \\text{cm} \\) di kiri \\( Q \\)','6 cm di kiri q','Fisika_Sedang_13.png'),(205,'3','Dua lembar papan homogen digabungkan seperti pada gambar. Letak titik berat benda gabungan tersebut adalah... (dalam \\( \\text{cm} \\))',3000,'\\( (20, 30) \\)','\\( (20, 40) \\)','\\( (30, 20) \\)','\\( (30, 40) \\)','(20,30)','Fisika_Sulit_2.png'),(206,'3','Berdasarkan gambar di bawah, dua bola dengan massa yang sama dijatuhkan pada bidang licin berbentuk setengah lingkaran dengan jari-jari \\( 1{,}8\\ \\text{m} \\). Jika kedua bola bertumbukan lenting sebagian dengan \\( e = 0{,}5 \\), berapa kecepatan bola 1 sesaat setelah tumbukan?',3000,'\\( 0\\ \\text{m/s}^2 \\)','\\( 3\\ \\text{m/s}^2 \\)','\\( 6\\ \\text{m/s}^2 \\)','\\( 10\\ \\text{m/s}^2 \\)','3 m/s2','Fisika_Sulit_4.png'),(207,'2','Sebuah benda dilempar ke atas dengan kecepatan \\( 40\\ \\text{m/s}^2 \\). Satu detik kemudian bola kedua dilempar ke atas dari posisi yang sama dengan kecepatan \\( 47{,}5\\ \\text{m/s}^2 \\). Jika \\( g = 10\\ \\text{m/s}^2 \\), maka tinggi yang dicapai bola kedua saat bertemu dengan bola pertama adalah...',2000,'\\( 55\\ \\text{m} \\)','\\( 75\\ \\text{m} \\)','\\( 95\\ \\text{m} \\)','\\( 125\\ \\text{m} \\)','75 m',NULL),(208,'3','Seorang mahasiswa diberi tugas untuk mengukur kekuatan sebuah lampu. Data tersebut dikumpulkan dan diolah menggunakan software, hasil outputnya pada tabel dibawah ini. Berapakah jam rata-rata waktu yang dibutuhkan sampai lampu tersebut rusak?',3000,'120,150 jam','186,063 jam','655,967 jam','296,257 jam','296,257 jam','Industri_Sulit_11.png');
/*!40000 ALTER TABLE `tsoalqr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tteam`
--

DROP TABLE IF EXISTS `tteam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tteam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tim` varchar(255) NOT NULL,
  `total_uang` int(11) NOT NULL DEFAULT 100000,
  `poin_total` int(11) NOT NULL,
  `current_session` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tteam`
--

LOCK TABLES `tteam` WRITE;
/*!40000 ALTER TABLE `tteam` DISABLE KEYS */;
/*!40000 ALTER TABLE `tteam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tteammachine`
--

DROP TABLE IF EXISTS `tteammachine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tteammachine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tTeam_id` int(11) NOT NULL,
  `tMachine_id` int(11) NOT NULL,
  `level` enum('1','2','3') NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `operater_hired` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tTeamMachine_tTeam1_idx` (`tTeam_id`),
  KEY `fk_tTeamMachine_tMachine1_idx` (`tMachine_id`),
  CONSTRAINT `fk_tTeamMachine_tMachine1` FOREIGN KEY (`tMachine_id`) REFERENCES `tmachine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tTeamMachine_tTeam1` FOREIGN KEY (`tTeam_id`) REFERENCES `tteam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tteammachine`
--

LOCK TABLES `tteammachine` WRITE;
/*!40000 ALTER TABLE `tteammachine` DISABLE KEYS */;
/*!40000 ALTER TABLE `tteammachine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tteamtask`
--

DROP TABLE IF EXISTS `tteamtask`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tteamtask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tTeam_id` int(11) NOT NULL,
  `tSoalQR_id` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `reward_claimed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tTeamTask_tTeam1_idx` (`tTeam_id`),
  KEY `fk_tTeamTask_tSoalQR1_idx` (`tSoalQR_id`),
  CONSTRAINT `fk_tTeamTask_tSoalQR1` FOREIGN KEY (`tSoalQR_id`) REFERENCES `tsoalqr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tTeamTask_tTeam1` FOREIGN KEY (`tTeam_id`) REFERENCES `tteam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tteamtask`
--

LOCK TABLES `tteamtask` WRITE;
/*!40000 ALTER TABLE `tteamtask` DISABLE KEYS */;
/*!40000 ALTER TABLE `tteamtask` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2025-07-29 17:19:55
