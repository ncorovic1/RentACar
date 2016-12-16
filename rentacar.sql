-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2016 at 11:51 AM
-- Server version: 5.7.11-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentacar`
--

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text COLLATE utf8_slovenian_ci NOT NULL,
  `damage` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`id`, `user_id`, `vehicle_id`, `type`, `date`, `description`, `damage`, `created_at`, `updated_at`) VALUES
(1, 24, 7, 'Crash (Not Guilty', '2016-12-12 12:00:00', 'Probni udes...', 100, '2016-12-13 08:06:03', '2016-12-13 08:06:03'),
(2, 24, 1, 'Low Fuel', '2016-12-13 11:00:00', 'Drugi probni incident...', 20, '2016-12-13 09:47:52', '2016-12-13 09:47:52'),
(3, 24, 1, 'Car Failure', '2016-12-13 10:00:00', 'Kvar.', 1000, '2016-12-13 10:38:55', '2016-12-13 10:38:55'),
(4, 1, 1, 'Crash - Guilty', '2016-12-13 10:00:00', 'Kriv je.', 1000, '2016-12-13 10:39:32', '2016-12-13 10:39:32'),
(5, 1, 1, 'Crash - Guilty', '2016-12-13 10:00:00', 'Kriv.', 1000, '2016-12-13 10:41:47', '2016-12-13 10:41:47'),
(6, 1, 1, 'Crash - Guilty', '2016-12-13 10:00:00', 'Kriv.', 1000, '2016-12-13 10:49:03', '2016-12-13 10:49:03'),
(7, 1, 1, 'Crash - Guilty', '2016-12-13 10:00:00', 'Kriv.', 1000, '2016-12-13 10:49:46', '2016-12-13 10:49:46'),
(8, 24, 1, 'Crash - Guilty', '2016-12-13 10:00:00', 'Kriv.', 1000, '2016-12-13 10:51:10', '2016-12-13 10:51:10'),
(9, 24, 8, 'Crash - Guilty', '2016-12-13 12:00:00', 'Potpuno kriv.', 2000, '2016-12-13 10:51:46', '2016-12-13 10:51:46'),
(10, 1, 1, 'Car Damage', '2016-12-13 10:00:00', 'Šteta.', 50, '2016-12-13 10:52:31', '2016-12-13 10:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parking_lots`
--

DROP TABLE IF EXISTS `parking_lots`;
CREATE TABLE IF NOT EXISTS `parking_lots` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `capacity` int(3) NOT NULL,
  `spaces_available` int(3) NOT NULL,
  `lng` decimal(9,6) NOT NULL,
  `lat` decimal(9,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `parking_lots`
--

INSERT INTO `parking_lots` (`id`, `name`, `address`, `city`, `country`, `capacity`, `spaces_available`, `lng`, `lat`) VALUES
(1, 'Parking Lot 1', 'Kampus Univerziteta u Sarajevu, Zmaja od Bosne bb', 'Sarajevo', 'Bosnia and Herzegovina', 50, 50, '18.397159', '43.856678'),
(2, 'Parking Lot 2', 'Ulica Halida Kajtaza 13', 'Sarajevo', 'Bosnia and Herzegovina', 30, 30, '18.400208', '43.860122'),
(3, 'Parking Lot 3', 'Ulica Kotromanića, Marijin dvor', 'Sarajevo', 'Bosnia and Herzegovina', 100, 100, '18.407301', '43.853757');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  `rent_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `vehicle_id`, `rent_date`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2016-12-16 00:00:00', '2016-12-22 00:00:00', '2016-12-08 16:43:35', '2016-12-08 16:43:35'),
(2, 2, 7, '2016-12-15 00:00:00', '2016-12-22 00:00:00', '2016-12-08 17:33:50', '2016-12-08 17:33:50'),
(3, 1, 8, '2016-12-18 00:00:00', '2016-12-29 00:00:00', '2016-12-08 17:40:19', '2016-12-08 17:40:19'),
(4, 24, 1, '2016-12-12 19:00:00', '2016-12-24 02:00:00', '2016-12-10 22:23:52', '2016-12-10 22:23:52'),
(5, 24, 7, '2016-12-15 00:00:00', '2016-12-20 23:00:00', '2016-12-12 00:37:31', '2016-12-12 00:37:31'),
(6, 24, 8, '2016-12-25 00:00:00', '2016-12-31 23:00:00', '2016-12-13 05:16:34', '2016-12-13 05:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `operator` int(1) NOT NULL DEFAULT '0',
  `status` varchar(30) CHARACTER SET utf8 NOT NULL DEFAULT 'active',
  `reputation` decimal(3,1) NOT NULL DEFAULT '20.0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `operator`, `status`, `reputation`) VALUES
(1, 'Nino Ćorović', 'nino.corovic@gmail.com', 'nino', '$2y$10$R8dYV/QXAUlpuLYOkJZg0uYM90oRuw/b83F3rfITgHYJwJMd.XO9a', 'uB0MGSUWXjISvH0YaNB1XZQyiXggsx3HIt09t4sJEDjUlH9yRqk3689MCPqf', '2016-10-30 17:14:40', '2016-12-16 10:16:03', 0, 'active', '17.0'),
(6, 'Operator', 'opp@opp.opp', 'operator', '$2y$10$8kRFNFTP13djMCSgf9nUGeQpWTjHagoUd2nnjfErIU6.wVxIAEcum', 'wjsjH1Rg4oZQTll4hku6kwrITZX685RfdvaKs7ljoVVUtu0kyTJItX8jAjQm', '2016-10-31 06:45:11', '2016-12-16 10:01:22', 1, 'active', '20.0'),
(24, 'Amir Šabanović', 'asabanovic3@gmail.com', 'amirsabanovic', '$2y$10$Py9.bzQnNG82cg6ymPRDneMMhAzlNvtRp7TGn1vkYQixAkm557VMO', 'MHnMEwbTVmRL1D8lEGhw4bggPc1WmnvS0hDfIGMwRprVSvw7ct9SThldFai3', '2016-11-07 21:04:25', '2016-12-13 10:51:47', 0, 'active', '10.0'),
(26, 'Administrator', 'admin@rentacar.com', 'admin', '$2y$10$JvOmr9i.odho2/aQM.XFQ.hXmrO7/PVFK4jtBqaLrbpyCSJbZK7Ua', NULL, '2016-11-12 23:49:46', '2016-11-12 23:49:46', 1, 'active', '20.0');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(25) CHARACTER SET utf16 DEFAULT NULL,
  `model` varchar(30) CHARACTER SET utf16 DEFAULT NULL,
  `production_year` int(4) DEFAULT NULL,
  `color` varchar(20) CHARACTER SET utf16 DEFAULT NULL,
  `form_factor` varchar(25) CHARACTER SET utf16 DEFAULT NULL,
  `automatic` int(1) DEFAULT NULL,
  `air_conditioning` int(1) DEFAULT NULL,
  `passengers` int(1) DEFAULT NULL,
  `bags` int(1) DEFAULT NULL,
  `doors` int(1) DEFAULT NULL,
  `available` int(1) DEFAULT NULL,
  `current_parking_lot` int(10) NOT NULL,
  `price_per_hour` int(3) DEFAULT NULL,
  `fuel_consumption` decimal(3,1) DEFAULT NULL,
  `image1` varchar(150) CHARACTER SET utf16 DEFAULT NULL,
  `image2` varchar(150) CHARACTER SET utf16 DEFAULT NULL,
  `image3` varchar(150) CHARACTER SET utf16 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `current_parking_lot` (`current_parking_lot`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `manufacturer`, `model`, `production_year`, `color`, `form_factor`, `automatic`, `air_conditioning`, `passengers`, `bags`, `doors`, `available`, `current_parking_lot`, `price_per_hour`, `fuel_consumption`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(1, 'Mercedes-Benz', 'CLS 63 AMG', 2016, 'Metallic Gray', 'Standard', 1, 1, 5, 3, 4, 1, 1, 100, '12.0', 'http://buyersguide.caranddriver.com/media/assets/submodel/7415.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/7415.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/7415.jpg', '2016-11-01 20:23:29', '2016-11-01 20:23:29'),
(2, 'BMW', 'M4', 2003, 'White', 'Intermediate', 1, 1, 5, 3, 2, 1, 3, 300, '8.0', 'http://o.aolcdn.com/commerce/autodata/images/USC50BMC641A021001.jpg', 'https://laracasts.com/discuss/channels/general-discussion/url-validation', 'https://laracasts.com/discuss/channels/general-discussion/url-validation', '2016-11-02 16:43:46', '2016-11-02 16:43:46'),
(7, 'Porsche', '911 GT3', 2015, 'White', 'Luxury', 1, 1, 2, 2, 2, 1, 2, 200, '15.0', 'http://media.caranddriver.com/images/media/638444/porsche-911-gt3-photo-640539-s-original.jpg', 'http://media.caranddriver.com/images/media/638444/porsche-911-gt3-photo-640539-s-original.jpg', 'http://media.caranddriver.com/images/media/638444/porsche-911-gt3-photo-640539-s-original.jpg', '2016-11-08 00:27:44', '2016-11-08 00:27:44'),
(8, 'Ferrari', 'LaFerrari', 2015, 'Red', 'Luxury', 1, 1, 2, 2, 2, 1, 2, 220, '3.0', 'http://buyersguide.caranddriver.com/media/assets/submodel/6912.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/6912.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/6912.jpg', '2016-11-08 00:30:28', '2016-11-08 00:30:28'),
(9, 'Chevrolet', 'Impala', 2016, 'Blue', 'Intermediate', 0, 0, 5, 4, 4, 1, 3, 120, '5.0', 'http://buyersguide.caranddriver.com/media/assets/submodel/7673.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/7673.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/7673.jpg', '2016-11-08 13:20:55', '2016-11-08 13:20:55'),
(10, 'Chrysler', '300 SRT', 2015, 'White', 'Standard', 1, 1, 5, 3, 4, 1, 3, 500, '10.0', 'http://buyersguide.caranddriver.com/media/assets/submodel/5651.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/5651.jpg', 'http://buyersguide.caranddriver.com/media/assets/submodel/5651.jpg', '2016-11-08 13:24:19', '2016-11-08 13:24:19'),
(13, 'Nissan', 'Skyline R34', 2005, 'White', 'Luxury', 1, 1, 2, 2, 2, 1, 2, 200, '12.0', 'http://www.abload.de/img/img_2926zuff.jpg', 'http://www.abload.de/img/img_2926zuff.jpg', 'http://www.abload.de/img/img_2926zuff.jpg', '2016-11-13 00:06:07', '2016-11-13 00:06:07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `incidents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `incidents_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`current_parking_lot`) REFERENCES `parking_lots` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
