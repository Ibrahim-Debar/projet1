-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2017 at 05:39 PM
-- Server version: 10.1.23-MariaDB
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblio`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteurs`
--

CREATE TABLE `auteurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ouvrage_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auteurs`
--

INSERT INTO `auteurs` (`id`, `nom`, `created_at`, `updated_at`, `ouvrage_id`) VALUES
(1, 'sdfsd', '2017-06-13 18:05:33', '2017-06-13 18:05:33', 7),
(2, 'ibrahim debar', '2017-06-14 14:32:05', '2017-06-14 14:32:05', 8),
(6, 'lkjkljk', '2017-06-16 15:50:34', '2017-06-16 15:50:34', 12),
(7, 'sdflan flani', '2017-06-16 17:06:20', '2017-06-16 17:06:20', 13),
(8, 'ertlan', '2017-06-16 17:06:20', '2017-06-16 17:06:20', 13),
(9, 'alfa', '2017-06-16 17:06:21', '2017-06-16 17:06:21', 13),
(16, 'test10', '2017-06-17 11:29:44', '2017-06-17 11:29:44', 14),
(17, 'test2', '2017-06-17 11:29:44', '2017-06-17 11:29:44', 14),
(18, 'test30', '2017-06-17 11:29:44', '2017-06-17 11:29:44', 14),
(19, 'test40', '2017-06-17 11:29:44', '2017-06-17 11:29:44', 14),
(20, 'sdf', '2017-06-17 11:43:19', '2017-06-17 11:43:19', 15),
(21, 'ghug', '2017-06-17 12:02:39', '2017-06-17 12:02:39', 16),
(22, 'gfhfh', '2017-06-17 12:04:01', '2017-06-17 12:04:01', 17);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `categorie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emprunts`
--

CREATE TABLE `emprunts` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `demande` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enseignant_id` int(10) UNSIGNED NOT NULL,
  `exemplaire_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enseignants`
--

CREATE TABLE `enseignants` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exemplaires`
--

CREATE TABLE `exemplaires` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_achat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prix` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ouvrage_id` int(10) UNSIGNED NOT NULL,
  `n_ordre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exemplaires`
--

INSERT INTO `exemplaires` (`id`, `type_achat`, `prix`, `created_at`, `updated_at`, `ouvrage_id`, `n_ordre`) VALUES
(1, NULL, NULL, '2017-06-17 14:23:26', '2017-06-17 14:23:26', 14, '54521'),
(2, NULL, NULL, '2017-06-17 14:25:03', '2017-06-17 14:25:03', 14, '78954'),
(3, NULL, NULL, '2017-06-17 14:25:16', '2017-06-17 14:25:16', 14, '500'),
(5, 'donn', 7000.00, '2017-06-17 15:41:03', '2017-06-17 17:14:29', 8, '132154'),
(6, 'achat', 52100.85, '2017-06-17 15:41:30', '2017-06-17 17:11:13', 8, '857445');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_03_154949_create_auteurs_table', 1),
(4, '2017_06_03_161537_create_ouvrages_table', 1),
(5, '2017_06_03_234800_create_collections_table', 1),
(6, '2017_06_03_235143_create_exemplaires_table', 1),
(7, '2017_06_03_235624_create_types_ouvrages_table', 1),
(8, '2017_06_05_165741_create_types_enseignants_table', 1),
(9, '2017_06_05_170847_create_types_emprunts_table', 1),
(10, '2017_06_06_113525_create_rayons_table', 1),
(11, '2017_06_06_120029_forein_key_to_ouvrages', 1),
(12, '2017_06_06_120946_forein_key_to_exemplaires', 1),
(13, '2017_06_06_121234_forein_key_to_emprunts', 1),
(14, '2017_06_06_121607_forein_key_to_auteurs', 1),
(15, '2017_06_12_122050_add_columns_to_ouvrage', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ouvrages`
--

CREATE TABLE `ouvrages` (
  `id` int(10) UNSIGNED NOT NULL,
  `isbn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `titre_propre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complement_titre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annee_edition` int(11) DEFAULT NULL,
  `prix` double(8,2) DEFAULT NULL,
  `resume` text COLLATE utf8_unicode_ci,
  `mot_cle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `langue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_soutenue` date DEFAULT NULL,
  `issn` int(11) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `nsupplement` int(11) DEFAULT NULL,
  `pagination` int(11) DEFAULT NULL,
  `tyope_carte` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `echelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `types_ouvrage_id` int(10) UNSIGNED NOT NULL,
  `rayon_id` int(10) UNSIGNED DEFAULT NULL,
  `collection_id` int(10) UNSIGNED DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feuille` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subdivision` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lieuConservation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `these_genre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeAchat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `column_name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ouvrages`
--

INSERT INTO `ouvrages` (`id`, `isbn`, `titre_propre`, `complement_titre`, `edition`, `annee_edition`, `prix`, `resume`, `mot_cle`, `langue`, `date_soutenue`, `issn`, `volume`, `nsupplement`, `pagination`, `tyope_carte`, `echelle`, `created_at`, `updated_at`, `types_ouvrage_id`, `rayon_id`, `collection_id`, `pays`, `nature`, `feuille`, `categorie`, `subdivision`, `lieuConservation`, `these_genre`, `typeAchat`, `column_name`) VALUES
(5, NULL, 'ADDOUZ', NULL, NULL, 1973, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Topographique', '1:50005', '2017-06-12 13:39:41', '2017-06-13 13:03:44', 3, NULL, NULL, 'MAROC', 'CA', 'NH-29-XXII-1b', NULL, NULL, 'CA', NULL, '', NULL),
(6, NULL, 'dsfs', NULL, 'fsdf', NULL, NULL, NULL, NULL, NULL, '2017-10-02', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-13 18:05:16', '2017-06-13 18:05:16', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', '', NULL),
(7, NULL, 'dsfs', NULL, 'fsdf', NULL, NULL, NULL, NULL, NULL, '2017-10-02', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-13 18:05:33', '2017-06-13 18:05:33', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', '', NULL),
(8, '54564-5468-54', 'tanzania', NULL, 'l3erbawi phon', 1903, 5000.00, 'kan ya makan fi9adim zaman                                        El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson\r\nkan ya makan fi9adim zaman                                        El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson\r\n', 'tanmirt', 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-14 14:32:05', '2017-06-14 14:32:05', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '21231-545', 'sajkl;jklj', NULL, 'lkjjskk', 1901, 521.00, NULL, NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-16 15:50:34', '2017-06-16 15:50:34', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '545-56465', 'jsdlfkjsd', NULL, NULL, NULL, NULL, NULL, NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-16 17:06:19', '2017-06-16 17:06:19', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 'amal', NULL, NULL, NULL, NULL, NULL, NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-16 17:48:53', '2017-06-17 11:29:44', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 'tanzania2', NULL, 'sdf', NULL, NULL, NULL, NULL, NULL, '2017-05-11', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-17 11:43:19', '2017-06-17 11:43:19', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fsd', NULL, NULL),
(16, NULL, 'tanzania2', NULL, NULL, NULL, NULL, NULL, NULL, 'fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-17 12:02:39', '2017-06-17 12:02:39', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 'tanzania2', NULL, 'asdf', NULL, NULL, NULL, NULL, NULL, '2017-05-11', NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-17 12:04:01', '2017-06-17 12:04:01', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rayons`
--

CREATE TABLE `rayons` (
  `id` int(10) UNSIGNED NOT NULL,
  `rayonnage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types_ouvrages`
--

CREATE TABLE `types_ouvrages` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `types_ouvrages`
--

INSERT INTO `types_ouvrages` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'livre', '2017-06-10 16:06:02', '2017-06-10 16:06:05'),
(2, 'these', '2017-06-10 16:06:06', '2017-06-10 16:06:07'),
(3, 'carte', '2017-06-10 16:06:17', '2017-06-10 16:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auteurs`
--
ALTER TABLE `auteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteurs_ouvrage_id_foreign` (`ouvrage_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emprunts`
--
ALTER TABLE `emprunts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emprunts_enseignant_id_foreign` (`enseignant_id`),
  ADD KEY `emprunts_exemplaire_id_foreign` (`exemplaire_id`);

--
-- Indexes for table `enseignants`
--
ALTER TABLE `enseignants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `enseignants_email_unique` (`email`);

--
-- Indexes for table `exemplaires`
--
ALTER TABLE `exemplaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exemplaires_ouvrage_id_foreign` (`ouvrage_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ouvrages_types_ouvrage_id_foreign` (`types_ouvrage_id`),
  ADD KEY `ouvrages_rayon_id_foreign` (`rayon_id`),
  ADD KEY `ouvrages_collection_id_foreign` (`collection_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rayons`
--
ALTER TABLE `rayons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types_ouvrages`
--
ALTER TABLE `types_ouvrages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auteurs`
--
ALTER TABLE `auteurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emprunts`
--
ALTER TABLE `emprunts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enseignants`
--
ALTER TABLE `enseignants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exemplaires`
--
ALTER TABLE `exemplaires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ouvrages`
--
ALTER TABLE `ouvrages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rayons`
--
ALTER TABLE `rayons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types_ouvrages`
--
ALTER TABLE `types_ouvrages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auteurs`
--
ALTER TABLE `auteurs`
  ADD CONSTRAINT `auteurs_ouvrage_id_foreign` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_enseignant_id_foreign` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignants` (`id`),
  ADD CONSTRAINT `emprunts_exemplaire_id_foreign` FOREIGN KEY (`exemplaire_id`) REFERENCES `exemplaires` (`id`);

--
-- Constraints for table `exemplaires`
--
ALTER TABLE `exemplaires`
  ADD CONSTRAINT `exemplaires_ouvrage_id_foreign` FOREIGN KEY (`ouvrage_id`) REFERENCES `ouvrages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ouvrages`
--
ALTER TABLE `ouvrages`
  ADD CONSTRAINT `ouvrages_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`),
  ADD CONSTRAINT `ouvrages_rayon_id_foreign` FOREIGN KEY (`rayon_id`) REFERENCES `rayons` (`id`),
  ADD CONSTRAINT `ouvrages_types_ouvrage_id_foreign` FOREIGN KEY (`types_ouvrage_id`) REFERENCES `types_ouvrages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
