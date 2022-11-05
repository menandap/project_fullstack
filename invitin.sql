/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.25-MariaDB : Database - invitin
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`invitin` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `invitin`;

/*Table structure for table `banks` */

DROP TABLE IF EXISTS `banks`;

CREATE TABLE `banks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banks_id_user_index` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banks` */

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_undangan` bigint(20) unsigned NOT NULL,
  `title` char(50) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_event` (`id_undangan`),
  CONSTRAINT `pk_event` FOREIGN KEY (`id_undangan`) REFERENCES `undangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `events` */

insert  into `events`(`id`,`id_undangan`,`title`,`date_start`,`date_end`,`location`,`desc`,`created_at`,`updated_at`) values 
(1,1,'Event1','2022-11-02 18:52:30','2022-11-03 18:52:32','bali','kwowowowow',NULL,NULL),
(2,4,'Event2','2022-11-02 19:11:00','2022-11-03 19:11:01','bali','hahahha',NULL,NULL),
(3,1,'Event3','2022-11-02 19:11:31','2022-11-03 19:11:33','jawa','xd',NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `gifts` */

DROP TABLE IF EXISTS `gifts`;

CREATE TABLE `gifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned DEFAULT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof_transfer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gifts_id_user_index` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `gifts` */

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_undangan` bigint(20) unsigned NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_image` (`id_undangan`),
  CONSTRAINT `pk_image` FOREIGN KEY (`id_undangan`) REFERENCES `undangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `images` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2022_09_28_024732_create_gifts_table',1),
(6,'2022_09_28_024830_create_banks_table',1),
(7,'2022_09_28_024831_create_undangans_table',1),
(8,'2022_09_28_025428_create_wishes_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `storys` */

DROP TABLE IF EXISTS `storys`;

CREATE TABLE `storys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_undangan` bigint(20) unsigned NOT NULL,
  `title` char(50) NOT NULL,
  `date` date NOT NULL,
  `images` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_story` (`id_undangan`),
  CONSTRAINT `pk_story` FOREIGN KEY (`id_undangan`) REFERENCES `undangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `storys` */

/*Table structure for table `trx` */

DROP TABLE IF EXISTS `trx`;

CREATE TABLE `trx` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `id_undangan` bigint(20) unsigned NOT NULL,
  `keyword` char(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_user` (`id_user`),
  KEY `pk_undangan` (`id_undangan`),
  CONSTRAINT `pk_undangan` FOREIGN KEY (`id_undangan`) REFERENCES `undangans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `trx` */

insert  into `trx`(`id`,`id_user`,`id_undangan`,`keyword`,`date_start`,`date_end`,`created_at`,`updated_at`) values 
(1,6,1,'coba','2022-11-02','2022-11-02',NULL,NULL),
(2,6,4,'cek','2022-11-02','2022-11-02',NULL,NULL);

/*Table structure for table `undangans` */

DROP TABLE IF EXISTS `undangans`;

CREATE TABLE `undangans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_1_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_2_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_1_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_2_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_person_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_person_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_wedding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wedding_date` datetime NOT NULL,
  `wedding_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_user_undangan` (`id_user`),
  CONSTRAINT `pk_user_undangan` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `undangans` */

insert  into `undangans`(`id`,`id_user`,`title`,`featured_image`,`person_1_name`,`person_2_name`,`person_1_image`,`person_2_image`,`desc_person_1`,`desc_person_2`,`desc_wedding`,`wedding_date`,`wedding_location`,`created_at`,`updated_at`) values 
(1,6,'Undangan1','tes','nama1','nama2','','','data1','data2','skaskasas','2022-11-02 00:00:00','bali',NULL,NULL),
(4,3,'Coba','tes','nama1','nama2','','','data1','data2','ksaskaks','2022-11-02 00:00:00','bali',NULL,NULL),
(5,7,'tes1','tes','nama1','nama1','','','data1','data2','kakaka','2022-11-04 21:36:21','bali',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`created_at`,`updated_at`) values 
(1,'Firman Kurniawan','kurniawan.firman94@gmail.com','$2y$10$NL0tlwGIV9Js/jCKPs9zneg9wl5eAqMBRTimelikdq1XS0yvMEJym','2022-10-10 12:33:23','2022-10-10 12:33:23'),
(3,'demo','demo@gmail.com','$2y$10$YRj5rrePKlbJPz4RlZjIROP72q1e.7S03I02LU925yoe0kFpDL2PG','2022-10-12 13:37:30','2022-10-12 13:37:30'),
(4,'Ananda Prema','anandaprema19@gmail.com','$2y$10$ShzIhbHz2QUf71wbuF7zmudN8ouGzobwN4xRajAaLyDHI4tC7iMxq','2022-10-15 15:10:07','2022-10-15 15:10:07'),
(6,'Tes','anandaprema185@gmail.com','$2y$10$6kHXEgbwHwHNEHv.nMcmZOJvkfG7i4QlYMqKt5Jl4yQJWXnaiEwim','2022-11-01 16:25:58','2022-11-01 16:25:58'),
(7,'Ananda Prema','bukuku@gmail.com','$2y$10$LROVQQetFXB.UIfo0sWr5u8zj9iMn7vrvL4tQ42BkKe3CW.xPgdFe','2022-11-04 13:34:01','2022-11-04 13:34:01');

/*Table structure for table `wishes` */

DROP TABLE IF EXISTS `wishes`;

CREATE TABLE `wishes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishes_id_user_index` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `wishes` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
