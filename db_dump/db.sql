-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 30 Σεπ 2014 στις 01:52:56
-- Έκδοση διακομιστή: 5.6.15-log
-- Έκδοση PHP: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `ehif`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `appointments_patient_id_foreign` (`patient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_09_05_203227_confide_setup_users_table', 1),
('2014_09_05_214338_entrust_setup_tables', 1),
('2014_09_20_154713_create_patients_table', 2),
('2014_09_21_232644_create_appointments_table', 3),
('2014_09_21_233853_create_visits_table', 4),
('2014_09_210_232644_create_appointments_table', 5);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amka` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fathername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mothername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `patients`
--

INSERT INTO `patients` (`id`, `name`, `surname`, `amka`, `fathername`, `mothername`, `address`, `phone`, `mobile`, `zip`, `area`, `nationality`, `birthday`, `updated_at`, `created_at`) VALUES
(1, 'Ασθένιος', 'Νοσοκομίου', '11888', 'Ιπποκράτης', 'Τασούλα', '', '', '', '', '', '', '0000-00-00', '2014-09-29 06:26:10', '0000-00-00 00:00:00'),
(2, 'Αριστοτέλης', 'Νικομάχους', '13821', '', '', '', '', '', '', '', '', '0000-00-00', '2014-09-29 09:26:06', '0000-00-00 00:00:00'),
(6, '44', 'sdf', '', '', '', '', '', '', '', '', '', '0000-00-00', '2014-09-29 07:28:04', '2014-09-29 07:28:04');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, 'larjohn', 'larjohn@gmail.com', '$2y$10$wzlN4w8uOkOZUCB.yXXAwOlqAusRadbzYHjDTdSb01GgWJZtEo232', 'c8ef6a8533372fd16651017b9ae6bcb3', NULL, 1, '2014-09-29 17:19:24', '2014-09-29 17:19:24');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `when` datetime NOT NULL,
  `symptoms` text COLLATE utf8_unicode_ci NOT NULL,
  `diagnosis` text COLLATE utf8_unicode_ci NOT NULL,
  `doctoruser_id` int(11) NOT NULL,
  `reception_user_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visit_classification_id` int(11) NOT NULL,
  `until` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `visits_patient_id_foreign` (`patient_id`),
  KEY `visits_receptionuser_id_foreign` (`reception_user_id`),
  KEY `visits_doctoruser_id_foreign` (`doctoruser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Άδειασμα δεδομένων του πίνακα `visits`
--

INSERT INTO `visits` (`id`, `when`, `symptoms`, `diagnosis`, `doctoruser_id`, `reception_user_id`, `patient_id`, `created_at`, `updated_at`, `visit_classification_id`, `until`) VALUES
(1, '0000-00-00 00:00:00', '', '', 0, 0, 0, '2014-09-29 07:44:00', '2014-09-29 07:44:00', 0, '0000-00-00 00:00:00'),
(2, '0000-00-00 00:00:00', '', '', 0, 0, 0, '2014-09-29 07:46:29', '2014-09-29 07:46:29', 0, '0000-00-00 00:00:00'),
(3, '2014-09-29 10:46:50', 'Πόνος', '', 0, 0, 0, '2014-09-29 07:46:59', '2014-09-29 07:46:59', 0, '0000-00-00 00:00:00'),
(4, '2014-09-29 10:47:09', '', '', 0, 0, 0, '2014-09-29 07:47:33', '2014-09-29 07:47:33', 0, '0000-00-00 00:00:00'),
(5, '2014-09-29 10:47:09', '', '', 0, 0, 0, '2014-09-29 07:48:14', '2014-09-29 07:48:14', 0, '0000-00-00 00:00:00'),
(6, '2014-09-29 11:20:47', '', '', 0, 0, 0, '2014-09-29 08:21:15', '2014-09-29 08:21:15', 0, '0000-00-00 00:00:00'),
(7, '2014-09-29 11:20:47', '', '', 0, 0, 0, '2014-09-29 08:42:01', '2014-09-29 08:42:01', 0, '0000-00-00 00:00:00'),
(8, '2014-09-29 11:20:47', '', '', 0, 0, 0, '2014-09-29 08:42:50', '2014-09-29 08:42:50', 0, '0000-00-00 00:00:00'),
(9, '2014-09-29 11:20:47', '', '', 0, 0, 0, '2014-09-29 08:43:03', '2014-09-29 08:43:03', 0, '0000-00-00 00:00:00'),
(10, '2014-09-29 11:44:05', '', '', 0, 0, 0, '2014-09-29 08:44:10', '2014-09-29 08:44:10', 2, '0000-00-00 00:00:00'),
(11, '2014-09-29 11:44:05', '', '', 0, 0, 0, '2014-09-29 08:46:13', '2014-09-29 08:46:13', 2, '0000-00-00 00:00:00'),
(12, '2014-09-29 11:44:05', '', '', 0, 0, 0, '2014-09-29 08:47:15', '2014-09-29 08:47:15', 2, '0000-00-00 00:00:00'),
(13, '2014-09-29 20:21:42', 'sdfsdf', '', 0, 0, 0, '2014-09-29 17:21:49', '2014-09-29 17:21:49', 1, '0000-00-00 00:00:00'),
(14, '2014-09-29 20:21:42', 'sdfsdf', '', 0, 0, 0, '2014-09-29 17:33:37', '2014-09-29 17:33:37', 1, '0000-00-00 00:00:00'),
(15, '2014-09-29 20:21:42', 'sdfsdf', '', 0, 1, 1, '2014-09-29 17:34:28', '2014-09-29 17:34:28', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `visit_classifications`
--

CREATE TABLE IF NOT EXISTS `visit_classifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Άδειασμα δεδομένων του πίνακα `visit_classifications`
--

INSERT INTO `visit_classifications` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Έκτακτο', '2014-09-29 11:20:37', '0000-00-00 00:00:00'),
(2, 'Τακτικό', '2014-09-29 11:20:43', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
