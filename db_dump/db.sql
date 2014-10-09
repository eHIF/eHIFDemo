-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 10 Οκτ 2014 στις 01:04:50
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
  `when` datetime NOT NULL,
  `patient_id` int(11) NOT NULL,
  `context` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `scheduler_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
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
-- Δομή πίνακα για τον πίνακα `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `departments`
--

INSERT INTO `departments` (`id`, `created_at`, `updated_at`, `name`) VALUES
  (1, 0, 0, 'Ιατρείο Επειγόντων Περιστατικών');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `medical_sessions`
--

CREATE TABLE IF NOT EXISTS `medical_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `symptoms` text COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `diagnosis` text COLLATE utf8_unicode_ci NOT NULL,
  `closed` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Άδειασμα δεδομένων του πίνακα `medical_sessions`
--

INSERT INTO `medical_sessions` (`id`, `created_at`, `updated_at`, `visit_id`, `patient_id`, `symptoms`, `doctor_id`, `diagnosis`, `closed`) VALUES
  (15, '2014-10-09 14:48:57', '2014-10-09 11:48:57', 32, 1, 'sdf', 1, '', 0),
  (10, '2014-10-04 22:28:20', '2014-10-04 11:39:16', 27, 2, 'dsf', 1, '', 0),
  (11, '2014-10-05 10:36:34', '2014-10-05 07:36:34', 15, 1, 'sdf', 1, 'Πνευμονικό οίδημα', 0),
  (12, '2014-10-05 11:54:23', '2014-10-05 08:54:01', 15, 1, 'sdf', 1, '', 0),
  (13, '2014-10-05 12:33:15', '2014-10-05 09:33:15', 27, 2, 'dsf', 1, '', 0),
  (14, '2014-10-08 14:06:01', '2014-10-08 11:06:01', 31, 7, 'ghj', 1, '', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Άδειασμα δεδομένων του πίνακα `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`, `id`) VALUES
  ('2014_09_05_203227_confide_setup_users_table', 1, 1),
  ('2014_09_05_214338_entrust_setup_tables', 1, 2),
  ('2014_09_20_154713_create_patients_table', 2, 3),
  ('2014_09_21_232644_create_appointments_table', 3, 4),
  ('2014_09_21_233853_create_visits_table', 4, 5),
  ('2014_10_09_225539_create_appointments_table', 5, 7);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Άδειασμα δεδομένων του πίνακα `patients`
--

INSERT INTO `patients` (`id`, `name`, `surname`, `amka`, `fathername`, `mothername`, `address`, `phone`, `mobile`, `zip`, `area`, `nationality`, `birthday`, `updated_at`, `created_at`) VALUES
  (1, 'Ασθένιος', 'Νοσοκομίου', '11888', 'Ιπποκράτης', 'Τασούλα', '', '', '', '', '', '', '0000-00-00', '2014-09-29 06:26:10', '0000-00-00 00:00:00'),
  (2, 'Αριστοτέλης', 'Νικομάχους', '13821', '', '', '', '', '', '', '', '', '0000-00-00', '2014-09-29 09:26:06', '0000-00-00 00:00:00'),
  (7, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '2014-10-08 10:37:36', '2014-10-08 10:37:36'),
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
-- Δομή πίνακα για τον πίνακα `perscriptions`
--

CREATE TABLE IF NOT EXISTS `perscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `referrals`
--

CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `patient_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `inhouse` tinyint(1) NOT NULL,
  `referral_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Άδειασμα δεδομένων του πίνακα `referrals`
--

INSERT INTO `referrals` (`id`, `created_at`, `updated_at`, `patient_id`, `session_id`, `doctor_id`, `comments`, `inhouse`, `referral_type_id`) VALUES
  (13, '2014-10-04 19:21:46', '2014-10-04 19:21:46', 0, 0, 0, 'Σακχαρο', 0, 1),
  (12, '2014-10-04 19:21:35', '2014-10-04 19:21:35', 0, 0, 0, 'Σακχαρο', 0, 1),
  (4, '2014-10-04 17:22:34', '2014-10-04 17:22:34', 0, 0, 0, 'hghj', 0, 2),
  (14, '2014-10-04 19:22:51', '2014-10-04 19:22:51', 0, 0, 0, 'sdf', 0, 1),
  (6, '2014-10-04 17:40:51', '2014-10-04 17:40:51', 0, 0, 0, 'Α/Α Θώρακος', 0, 2),
  (7, '2014-10-04 18:26:41', '2014-10-04 18:26:41', 0, 0, 0, 'cxb', 0, 1),
  (15, '2014-10-04 19:29:17', '2014-10-04 19:29:17', 0, 0, 0, 'Χολ', 0, 1),
  (10, '2014-10-04 22:26:18', '2014-10-04 18:31:56', 0, 0, 1, 'zzzz', 0, 1),
  (16, '2014-10-04 19:29:23', '2014-10-04 19:29:23', 0, 0, 0, 'Χολ', 0, 1),
  (17, '2014-10-04 19:37:57', '2014-10-04 19:37:57', 0, 0, 0, 'f', 0, 1),
  (18, '2014-10-04 19:38:30', '2014-10-04 19:38:30', 0, 0, 0, 'd', 0, 1),
  (19, '2014-10-04 19:41:03', '2014-10-04 19:41:03', 0, 0, 0, 'ss', 0, 1),
  (23, '2014-10-04 19:47:19', '2014-10-04 19:47:19', 2, 10, 0, '44', 0, 1),
  (24, '2014-10-05 07:30:50', '2014-10-05 07:30:50', 1, 11, 0, 'sdf', 0, 1),
  (25, '2014-10-05 07:35:31', '2014-10-05 07:35:31', 1, 11, 0, 'A/A Θώρακος', 0, 2),
  (26, '2014-10-05 09:27:38', '2014-10-05 09:27:38', 1, 12, 0, 'y', 0, 1),
  (27, '2014-10-09 11:49:04', '2014-10-09 11:49:04', 1, 15, 0, 'df', 0, 1),
  (28, '2014-10-09 11:49:25', '2014-10-09 11:49:25', 1, 15, 0, 'dfg', 0, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `referral_types`
--

CREATE TABLE IF NOT EXISTS `referral_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `name` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Άδειασμα δεδομένων του πίνακα `referral_types`
--

INSERT INTO `referral_types` (`id`, `created_at`, `updated_at`, `name`) VALUES
  (1, 0, 0, 'Αιματολογικές Εξετάσεις'),
  (2, 0, 0, 'Απεικονιστικές Εξετάσεις');

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
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_code`, `remember_token`, `confirmed`, `created_at`, `updated_at`, `name`, `department_id`) VALUES
  (1, 'larjohn', 'larjohn@gmail.com', '$2y$10$wzlN4w8uOkOZUCB.yXXAwOlqAusRadbzYHjDTdSb01GgWJZtEo232', 'c8ef6a8533372fd16651017b9ae6bcb3', NULL, 1, '2014-09-29 17:19:24', '2014-09-29 17:19:24', 'Λάζαρος Ιωαννίδης', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `when` datetime NOT NULL,
  `symptoms` text COLLATE utf8_unicode_ci NOT NULL,
  `doctoruser_id` int(11) NOT NULL,
  `reception_user_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visit_classification_id` int(11) NOT NULL,
  `until` datetime NOT NULL,
  `department_id` int(11) NOT NULL,
  `visit_status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `visits_patient_id_foreign` (`patient_id`),
  KEY `visits_receptionuser_id_foreign` (`reception_user_id`),
  KEY `visits_doctoruser_id_foreign` (`doctoruser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Άδειασμα δεδομένων του πίνακα `visits`
--

INSERT INTO `visits` (`id`, `when`, `symptoms`, `doctoruser_id`, `reception_user_id`, `patient_id`, `created_at`, `updated_at`, `visit_classification_id`, `until`, `department_id`, `visit_status_id`) VALUES
  (32, '2014-10-09 14:48:02', 'sdf', 0, 1, 1, '2014-10-09 11:48:49', '2014-10-09 11:48:49', 1, '0000-00-00 00:00:00', 0, 1),
  (31, '2014-10-08 13:37:37', 'ghj', 0, 1, 7, '2014-10-08 10:37:46', '2014-10-08 10:37:46', 2, '0000-00-00 00:00:00', 0, 1),
  (30, '2014-10-05 12:31:58', 'Πόνος', 0, 1, 1, '2014-10-05 09:32:05', '2014-10-05 09:32:05', 1, '0000-00-00 00:00:00', 0, 1),
  (15, '2014-09-29 20:21:42', 'sdfsdf', 0, 1, 1, '2014-09-29 17:34:28', '2014-09-29 17:34:28', 1, '0000-00-00 00:00:00', 0, 0),
  (16, '2014-10-03 11:41:41', 'gdfghdfgh', 0, 1, 1, '2014-10-03 08:41:46', '2014-10-03 08:41:46', 1, '0000-00-00 00:00:00', 0, 0),
  (17, '2014-10-03 12:00:37', '', 0, 1, 1, '2014-10-03 09:00:44', '2014-10-03 09:00:44', 1, '0000-00-00 00:00:00', 0, 0),
  (18, '2014-10-03 12:01:18', '', 0, 1, 1, '2014-10-03 09:01:20', '2014-10-03 09:01:20', 1, '0000-00-00 00:00:00', 0, 0),
  (19, '2014-10-03 12:01:18', '', 0, 1, 1, '2014-10-03 09:01:35', '2014-10-03 09:01:35', 1, '0000-00-00 00:00:00', 0, 0),
  (20, '2014-10-03 12:01:18', '', 0, 1, 1, '2014-10-03 09:01:52', '2014-10-03 09:01:52', 1, '0000-00-00 00:00:00', 0, 0),
  (21, '2014-10-03 12:01:18', '', 0, 1, 1, '2014-10-03 09:02:26', '2014-10-03 09:02:26', 1, '0000-00-00 00:00:00', 0, 0),
  (22, '2014-10-03 12:01:18', '', 0, 1, 1, '2014-10-03 09:02:30', '2014-10-03 09:02:30', 1, '0000-00-00 00:00:00', 0, 0),
  (23, '2014-10-03 12:01:18', '', 0, 1, 1, '2014-10-03 09:02:48', '2014-10-03 09:02:48', 1, '0000-00-00 00:00:00', 0, 0),
  (29, '2014-10-05 10:29:02', 'df', 0, 1, 1, '2014-10-05 07:29:07', '2014-10-05 07:29:07', 1, '0000-00-00 00:00:00', 0, 1),
  (28, '2014-10-04 14:38:56', 'dsf', 0, 1, 1, '2014-10-04 11:39:01', '2014-10-04 11:39:01', 1, '0000-00-00 00:00:00', 0, 1),
  (27, '2014-10-04 12:12:25', 'dsf', 0, 1, 2, '2014-10-04 09:25:53', '2014-10-04 09:25:53', 2, '0000-00-00 00:00:00', 0, 1);

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

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `visit_statuses`
--

CREATE TABLE IF NOT EXISTS `visit_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Άδειασμα δεδομένων του πίνακα `visit_statuses`
--

INSERT INTO `visit_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
  (1, 'pending', '2014-10-03 21:48:14', '0000-00-00 00:00:00'),
  (2, 'session', '2014-10-03 21:48:14', '0000-00-00 00:00:00'),
  (3, 'cancelled', '2014-10-03 23:19:04', '0000-00-00 00:00:00'),
  (4, 'complete', '2014-10-03 23:19:12', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
