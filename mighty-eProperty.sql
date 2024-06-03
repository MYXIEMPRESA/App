-- phpMyAdmin SQL Dump
-- version 5.3.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2024 at 01:45 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mighty-eProperty`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` longtext COLLATE utf8mb4_unicode_ci,
  `site_copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_option` json DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help_support_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_settings` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `site_name`, `site_email`, `site_logo`, `site_favicon`, `site_description`, `site_copyright`, `facebook_url`, `instagram_url`, `twitter_url`, `linkedin_url`, `language_option`, `contact_email`, `contact_number`, `help_support_url`, `notification_settings`, `created_at`, `updated_at`) VALUES
(1, 'Mighty eProperty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"en\"]', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags_id` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_amenity_mappings`
--

CREATE TABLE `category_amenity_mappings` (
  `id` bigint UNSIGNED NOT NULL,
  `amenity_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra_property_limits`
--

CREATE TABLE `extra_property_limits` (
  `id` bigint UNSIGNED NOT NULL,
  `limit` bigint UNSIGNED DEFAULT NULL,
  `price` double DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'all, add_property, view_property, advertisement_property',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra_property_limit_transactions`
--

CREATE TABLE `extra_property_limit_transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `extra_property_limit_id` bigint UNSIGNED DEFAULT NULL,
  `subscription_id` bigint UNSIGNED DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `extra_property_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'all,add_property, view_property, advertisement_property',
  `limit` bigint UNSIGNED DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'pending, paid , failed',
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'active, inactive',
  `extra_property_limit_data` json DEFAULT NULL,
  `other_transaction_detail` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_contents`
--

CREATE TABLE `language_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `language_id` bigint UNSIGNED DEFAULT NULL,
  `keyword_id` bigint UNSIGNED DEFAULT NULL,
  `screen_id` bigint UNSIGNED DEFAULT NULL,
  `keyword_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_default_lists`
--

CREATE TABLE `language_default_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `languageName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languageCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countryCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_default_lists`
--

INSERT INTO `language_default_lists` (`id`, `languageName`, `languageCode`, `countryCode`, `created_at`, `updated_at`) VALUES
(1, 'Afrikaans (South Africa)', 'af', 'af-ZA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(2, 'Albanian (Albania)', 'sq', 'sq-AL', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(3, 'Alsatian (France)', 'gsw', 'gsw-FR', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(4, 'Amharic (Ethiopia)', 'am', 'am-ET', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(5, 'Arabic (Algeria)', 'ar', 'ar-DZ', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(6, 'Arabic (Bahrain)', 'ar', 'ar-BH', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(7, 'Arabic (Egypt)', 'ar', 'ar-EG', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(8, 'Arabic (Iraq)', 'ar', 'ar-IQ', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(9, 'Arabic (Jordan)', 'ar', 'ar-JO', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(10, 'Arabic (Kuwait)', 'ar', 'ar-KW', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(11, 'Arabic (Lebanon)', 'ar', 'ar-LB', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(12, 'Arabic (Libya)', 'ar', 'ar-LY', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(13, 'Arabic (Morocco)', 'ar', 'ar-MA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(14, 'Arabic (Oman)', 'ar', 'ar-OM', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(15, 'Arabic (Qatar)', 'ar', 'ar-QA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(16, 'Arabic (Saudi Arabia)', 'ar', 'ar-SA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(17, 'Arabic (Syria)', 'ar', 'ar-SY', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(18, 'Arabic (Tunisia)', 'ar', 'ar-TN', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(19, 'Arabic (U.A.E.)', 'ar', 'ar-AE', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(20, 'Arabic (Yemen)', 'ar', 'ar-YE', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(21, 'Armenian (Armenia)', 'hy', 'hy-AM', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(22, 'Assamese (India)', 'as', 'as-IN', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(23, 'Azerbaijani (Cyrillic)', 'az', 'az-Cyrl', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(24, 'Azerbaijani (Cyrillic, Azerbaijan)', 'az', 'az-Cyrl-AZ', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(25, 'Azerbaijani (Latin)', 'az', 'az-Latn', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(26, 'Azerbaijani (Latin, Azerbaijan)', 'az', 'az-Latn-AZ', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(27, 'Bangla (Bangladesh)', 'bn', 'bn-BD', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(28, 'Bangla (India)', 'bn', 'bn-IN', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(29, 'Bashkir (Russia)', 'ba', 'ba-RU', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(30, 'Basque (Spain)', 'eu', 'eu-ES', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(31, 'Belarusian (Belarus)', 'be', 'be-BY', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(32, 'Bosnian (Cyrillic)', 'bs', 'bs-Cyrl', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(33, 'Bosnian (Cyrillic, Bosnia and Herzegovina)', 'bs', 'bs-Cyrl-BA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(34, 'Bosnian (Latin)', 'bs', 'bs-Latn', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(35, 'Bosnian (Latin, Bosnia and Herzegovina)', 'bs', 'bs-Latn-BA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(36, 'Breton (France)', 'br', 'br-FR', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(37, 'Bulgarian (Bulgaria)', 'bg', 'bg-BG', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(38, 'Burmese (Myanmar)', 'my', 'my-MM', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(39, 'Catalan (Spain)', 'ca', 'ca-ES', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(40, 'Central Atlas Tamazight (Arabic, Morocco)', 'tzm', 'tzm-Arab-MA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(41, 'Central Kurdish', 'ku', 'ku-Arab', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(42, 'Central Kurdish (Iraq)', 'ku', 'ku-Arab-IQ', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(43, 'Cherokee', 'chr', 'chr-Cher', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(44, 'Cherokee (United States)', 'chr', 'chr-Cher-US', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(45, 'Chinese (Simplified) (zh-Hans)', 'zh', 'zh-Hans', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(46, 'Chinese (Simplified, People\'s Republic of China)', 'zh', 'zh-CN', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(47, 'Chinese (Simplified, Singapore)', 'zh', 'zh-SG', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(48, 'Chinese (Traditional) (zh-Hant)', 'zh', 'zh-Hant', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(49, 'Chinese (Traditional, Hong Kong S.A.R.)', 'zh', 'zh-HK', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(50, 'Chinese (Traditional, Macao S.A.R.)', 'zh', 'zh-MO', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(51, 'Chinese (Traditional, Taiwan)', 'zh', 'zh-TW', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(52, 'Corsican (France)', 'co', 'co-FR', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(53, 'Croatian (Croatia)', 'hr', 'hr-HR', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(54, 'Croatian (Latin, Bosnia and Herzegovina)', 'hr', 'hr-BA', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(55, 'Czech (Czech Republic)', 'cs', 'cs-CZ', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(56, 'Danish (Denmark)', 'da', 'da-DK', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(57, 'Dari (Afghanistan)', 'prs', 'prs-AF', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(58, 'Divehi (Maldives)', 'dv', 'dv-MV', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(59, 'Dutch (Belgium)', 'nl', 'nl-BE', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(60, 'Dutch (Netherlands)', 'nl', 'nl-NL', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(61, 'Dzongkha (Bhutan)', 'dz', 'dz-BT', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(62, 'English (Australia)', 'en', 'en-AU', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(63, 'English (Belize)', 'en', 'en-BZ', '2024-04-11 01:36:35', '2024-04-11 01:36:35'),
(64, 'English (Canada)', 'en', 'en-CA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(65, 'English (Caribbean)', 'en', 'en-029', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(66, 'English (Hong Kong)', 'en', 'en-HK', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(67, 'English (India)', 'en', 'en-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(68, 'English (Ireland)', 'en', 'en-IE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(69, 'English (Jamaica)', 'en', 'en-JM', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(70, 'English (Malaysia)', 'en', 'en-MY', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(71, 'English (New Zealand)', 'en', 'en-NZ', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(72, 'English (Republic of the Philippines)', 'en', 'en-PH', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(73, 'English (Singapore)', 'en', 'en-SG', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(74, 'English (South Africa)', 'en', 'en-ZA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(75, 'English (Trinidad and Tobago)', 'en', 'en-TT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(76, 'English (United Arab Emirates)', 'en', 'en-AE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(77, 'English (United Kingdom)', 'en', 'en-GB', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(78, 'English (United States)', 'en', 'en-US', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(79, 'English (Zimbabwe)', 'en', 'en-ZW', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(80, 'Estonian (Estonia)', 'et', 'et-EE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(81, 'Faroese (Faroe Islands)', 'fo', 'fo-FO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(82, 'Filipino (Philippines)', 'fi', 'fil-PH', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(83, 'Finnish (Finland)', 'fi', 'fi-FI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(84, 'French (Belgium)', 'fr', 'fr-BE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(85, 'French (Côte d’Ivoire)', 'fr', 'fr-CI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(86, 'French (Cameroon)', 'fr', 'fr-CM', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(87, 'French (Canada)', 'fr', 'fr-CA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(88, 'French (Caribbean)', 'fr', 'fr-029', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(89, 'French (Congo, DRC)', 'fr', 'fr-CD', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(90, 'French (France)', 'fr', 'fr-FR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(91, 'French (Haiti)', 'fr', 'fr-HT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(92, 'French (Luxembourg)', 'fr', 'fr-LU', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(93, 'French (Mali)', 'fr', 'fr-ML', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(94, 'French (Morocco)', 'fr', 'fr-MA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(95, 'French (Principality of Monaco)', 'fr', 'fr-MC', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(96, 'French (Réunion)', 'fr', 'fr-RE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(97, 'French (Senegal)', 'fr', 'fr-SN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(98, 'French (Switzerland)', 'fr', 'fr-CH', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(99, 'Frisian (Netherlands)', 'fy', 'fy-NL', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(100, 'Fulah (Latin)', 'ff', 'ff-Latn', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(101, 'Fulah (Latin, Nigeria)', 'ff', 'ff-Latn-NG', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(102, 'Fulah (Latin, Senegal)', 'ff', 'ff-Latn-SN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(103, 'Galician (Spain)', 'gl', 'gl-ES', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(104, 'Georgian (Georgia)', 'ka', 'ka-GE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(105, 'German (Austria)', 'de', 'de-AT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(106, 'German (Germany)', 'de', 'de-DE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(107, 'German (Liechtenstein)', 'de', 'de-LI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(108, 'German (Luxembourg)', 'de', 'de-LU', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(109, 'German (Switzerland)', 'de', 'de-CH', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(110, 'Greek', 'el', 'el-GR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(111, 'Greenlandic (Greenland)', 'kl', 'kl-GL', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(112, 'Guarani (Paraguay)', 'gn', 'gn-PY', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(113, 'Gujarati', 'gu', 'gu-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(114, 'Hausa (Latin)', 'ha', 'ha-Latn', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(115, 'Hausa (Latin, Nigeria)', 'ha', 'ha-Latn-NG', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(116, 'Hawaiian (United States)', 'haw', 'haw-US', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(117, 'Hebrew (Israel)', 'he', 'he-IL', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(118, 'Hindi', 'hi', 'hi-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(119, 'Hungarian (Hungary)', 'hu', 'hu-HU', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(120, 'Icelandic (Iceland)', 'is', 'is-IS', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(121, 'Igbo (Nigeria)', 'ig', 'ig-NG', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(122, 'Indonesian (Indonesia)', 'id', 'id-ID', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(123, 'Inuktitut (Latin)', 'iu', 'iu-Latn', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(124, 'Inuktitut (Latin, Canada)', 'iu', 'iu-Latn-CA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(125, 'Inuktitut (Syllabics)', 'iu', 'iu-Cans', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(126, 'Inuktitut (Syllabics, Canada)', 'iu', 'iu-Cans-CA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(127, 'Irish (Ireland)', 'ga', 'ga-IE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(128, 'Italian (Italy)', 'it', 'it-IT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(129, 'Italian (Switzerland)', 'it', 'it-CH', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(130, 'Japanese', 'ja', 'ja-JP', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(131, 'Kannada (India)', 'kn', 'kn-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(132, 'Kanuri (Latin, Nigeria)', 'kr', 'kr-Latn-NG', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(133, 'Kashmiri (Devanagari, India)', 'ks', 'ks-Deva-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(134, 'Kashmiri (Perso-Arabic)', 'ks', 'ks-Arab', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(135, 'Kazakh (Kazakhstan)', 'kk', 'kk-KZ', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(136, 'Khmer (Cambodia)', 'km', 'km-KH', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(137, 'K\'iche (Guatemala)', 'qut', 'qut-GT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(138, 'K\'iche (Latin, Guatemala)', 'quc', 'quc-Latn-GT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(139, 'Kinyarwanda (Rwanda)', 'rw', 'rw-RW', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(140, 'Kiswahili (Kenya)', 'sw', 'sw-KE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(141, 'Konkani (India)', 'kok', 'kok-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(142, 'Korean (Korea)', 'ko', 'ko-KR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(143, 'Kyrgyz (Kyrgyzstan)', 'ky', 'ky-KG', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(144, 'Lao (Lao P.D.R.)', 'lo', 'lo-LA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(145, 'Latin (Vatican City)', 'la', 'la-VA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(146, 'Latvian (Latvia)', 'lv', 'lv-LV', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(147, 'Lithuanian (Lithuania)', 'lt', 'lt-LT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(148, 'Lower Sorbian (Germany)', 'dsb', 'dsb-DE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(149, 'Luxembourgish (Luxembourg)', 'lb', 'lb-LU', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(150, 'Macedonian (North Macedonia)', 'mk', 'mk-MK', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(151, 'Malay (Brunei Darussalam)', 'ms', 'ms-BN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(152, 'Malay (Malaysia)', 'ms', 'ms-MY', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(153, 'Malayalam (India)', 'ml', 'ml-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(154, 'Maltese (Malta)', 'mt', 'mt-MT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(155, 'Maori (New Zealand)', 'mi', 'mi-NZ', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(156, 'Mapudungun (Chile)', 'arn', 'arn-CL', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(157, 'Marathi (India)', 'mr', 'mr-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(158, 'Mohawk (Canada)', 'moh', 'moh-CA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(159, 'Mongolian (Cyrillic)', 'mn', 'mn-Cyrl', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(160, 'Mongolian (Cyrillic, Mongolia)', 'mn', 'mn-MN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(161, 'Mongolian (Traditional Mongolian)', 'mn', 'mn-Mong', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(162, 'Mongolian (Traditional Mongolian, Mongolia)', 'mn', 'mn-Mong-MN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(163, 'Mongolian (Traditional Mongolian, People\'s Republic of China)', 'mn', 'mn-Mong-CN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(164, 'Nepali (India)', 'ne', 'ne-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(165, 'Nepali (Nepal)', 'ne', 'ne-NP', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(166, 'Norwegian, Bokmål (Norway)', 'nb', 'nb-NO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(167, 'Norwegian, Nynorsk (Norway)', 'nn', 'nn-NO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(168, 'Occitan (France)', 'oc', 'oc-FR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(169, 'Odia (India)', 'or', 'or-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(170, 'Oromo (Ethiopia)', 'om', 'om-ET', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(171, 'Pashto (Afghanistan)', 'ps', 'ps-AF', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(172, 'Persian (Iran)', 'fa', 'fa-IR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(173, 'Polish (Poland)', 'pl', 'pl-PL', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(174, 'Portuguese (Brazil)', 'pt', 'pt-BR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(175, 'Portuguese (Portugal)', 'pt', 'pt-PT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(176, 'Punjabi - Arab', 'pa', 'pa-Arab', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(177, 'Punjabi (India)', 'pa', 'pa-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(178, 'Punjabi (Islamic Republic of Pakistan)', 'pa', 'pa-Arab-PK', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(179, 'Quechua (Bolivia)', 'quz', 'quz-BO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(180, 'Quechua (Ecuador)', 'quz', 'quz-EC', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(181, 'Quechua (Peru)', 'quz', 'quz-PE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(182, 'Romanian (Moldova)', 'ro', 'ro-MD', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(183, 'Romanian (Romania)', 'ro', 'ro-RO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(184, 'Romansh (Switzerland)', 'rm', 'rm-CH', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(185, 'Russian (Moldova)', 'ru', 'ru-MD', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(186, 'Russian (Russia)', 'ru', 'ru-RU', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(187, 'Sakha (Russia)', 'sah', 'sah-RU', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(188, 'Sami, Inari (Finland)', 'smn', 'smn-FI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(189, 'Sami, Lule (Norway)', 'smj', 'smj-NO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(190, 'Sami, Lule (Sweden)', 'smj', 'smj-SE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(191, 'Sami, Northern (Finland)', 'se', 'se-FI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(192, 'Sami, Northern (Norway)', 'se', 'se-NO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(193, 'Sami, Northern (Sweden)', 'se', 'se-SE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(194, 'Sami, Skolt (Finland)', 'sm', 'sms-FI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(195, 'Sami, Southern (Norway)', 'sm', 'sma-NO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(196, 'Sami, Southern (Sweden)', 'sm', 'sma-SE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(197, 'Sanskrit (India)', 'sa', 'sa-IN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(198, 'Scottish Gaelic (United Kingdom)', 'gd', 'gd-GB', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(199, 'Serbian (Cyrillic)', 'sr', 'sr-Cyrl', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(200, 'Serbian (Cyrillic, Bosnia and Herzegovina)', 'sr', 'sr-Cyrl-BA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(201, 'Serbian (Cyrillic, Montenegro)', 'sr', 'sr-Cyrl-ME', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(202, 'Serbian (Cyrillic, Serbia and Montenegro (Former))', 'sr', 'sr-Cyrl-CS', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(203, 'Serbian (Cyrillic, Serbia)', 'sr', 'sr-Cyrl-RS', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(204, 'Serbian (Latin)', 'sr', 'sr-Latn', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(205, 'Serbian (Latin, Bosnia and Herzegovina)', 'sr', 'sr-Latn-BA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(206, 'Serbian (Latin, Montenegro)', 'sr', 'sr-Latn-ME', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(207, 'Serbian (Latin, Serbia and Montenegro (Former))', 'sr', 'sr-Latn-CS', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(208, 'Serbian (Latin, Serbia)', 'sr', 'sr-Latn-RS', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(209, 'Sesotho sa Leboa (South Africa)', 'nso', 'nso-ZA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(210, 'Setswana (Botswana)', 'tn', 'tn-BW', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(211, 'Setswana (South Africa)', 'tn', 'tn-ZA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(212, 'Sindhi', 'sd', 'sd-Arab', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(213, 'Sindhi (Islamic Republic of Pakistan)', 'sd', 'sd-Arab-PK', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(214, 'Sinhala (Sri Lanka)', 'si', 'si-LK', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(215, 'Slovak (Slovakia)', 'sk', 'sk-SK', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(216, 'Slovenian (Slovenia)', 'sl', 'sl-SI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(217, 'Somali (Somalia)', 'so', 'so-SO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(218, 'Sotho (South Africa)', 'st', 'st-ZA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(219, 'Spanish (Argentina)', 'es', 'es-AR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(220, 'Spanish (Bolivarian Republic of Venezuela)', 'es', 'es-VE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(221, 'Spanish (Bolivia)', 'es', 'es-BO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(222, 'Spanish (Chile)', 'es', 'es-CL', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(223, 'Spanish (Colombia)', 'es', 'es-CO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(224, 'Spanish (Costa Rica)', 'es', 'es-CR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(225, 'Spanish (Cuba)', 'es', 'es-CU', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(226, 'Spanish (Dominican Republic)', 'es', 'es-DO', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(227, 'Spanish (Ecuador)', 'es', 'es-EC', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(228, 'Spanish (El Salvador)', 'es', 'es-SV', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(229, 'Spanish (Guatemala)', 'es', 'es-GT', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(230, 'Spanish (Honduras)', 'es', 'es-HN', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(231, 'Spanish (Latin America)', 'es', 'es-419', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(232, 'Spanish (Mexico)', 'es', 'es-MX', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(233, 'Spanish (Nicaragua)', 'es', 'es-NI', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(234, 'Spanish (Panama)', 'es', 'es-PA', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(235, 'Spanish (Paraguay)', 'es', 'es-PY', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(236, 'Spanish (Peru)', 'es', 'es-PE', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(237, 'Spanish (Puerto Rico)', 'es', 'es-PR', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(238, 'Spanish (Spain, International Sort)', 'es', 'es-ES', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(239, 'Spanish (Traditional Sort)', 'es', 'es-ES', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(240, 'Spanish (United States)', 'es', 'es-US', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(241, 'Spanish (Uruguay)', 'es', 'es-UY', '2024-04-11 01:36:36', '2024-04-11 01:36:36'),
(242, 'Swedish (Finland)', 'sv', 'sv-FI', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(243, 'Swedish (Sweden)', 'sv', 'sv-SE', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(244, 'Syriac (Syria)', 'syr', 'syr-SY', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(245, 'Tajik (Cyrillic)', 'tg', 'tg-Cyrl', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(246, 'Tajik (Cyrillic, Tajikistan)', 'tg', 'tg-Cyrl-TJ', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(247, 'Tamazight (Latin)', 'tzm', 'tzm-Latn', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(248, 'Tamazight (Latin, Algeria)', 'tzm', 'tzm-Latn-DZ', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(249, 'Tamil (India)', 'ta', 'ta-IN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(250, 'Tamil (Sri Lanka)', 'ta', 'ta-LK', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(251, 'Tatar (Russia)', 'tt', 'tt-RU', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(252, 'Telugu (India)', 'te', 'te-IN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(253, 'Thai (Thailand)', 'th', 'th-TH', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(254, 'Tibetan (People\'s Republic of China)', 'bo', 'bo-CN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(255, 'Tigrinya (Eritrea)', 'ti', 'ti-ER', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(256, 'Tigrinya (Ethiopia)', 'ti', 'ti-ET', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(257, 'Tsonga (South Africa)', 'ts', 'ts-ZA', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(258, 'Turkish (Turkey)', 'tr', 'tr-TR', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(259, 'Turkmen (Turkmenistan)', 'tk', 'tk-TM', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(260, 'Ukrainian (Ukraine)', 'uk', 'uk-UA', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(261, 'Upper Sorbian (Germany)', 'hsb', 'hsb-DE', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(262, 'Urdu (India)', 'ur', 'ur-IN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(263, 'Urdu (Islamic Republic of Pakistan)', 'ur', 'ur-PK', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(264, 'Uyghur (People\'s Republic of China)', 'ug', 'ug-CN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(265, 'Uzbek (Cyrillic)', 'uz', 'uz-Cyrl', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(266, 'Uzbek (Cyrillic, Uzbekistan)', 'uz', 'uz-Cyrl-UZ', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(267, 'Uzbek (Latin)', 'uz', 'uz-Latn', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(268, 'Uzbek (Latin, Uzbekistan)', 'uz', 'uz-Latn-UZ', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(269, 'Valencian (Spain)', 'ca', 'ca-ES-valencia', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(270, 'Venda (South Africa)', 've', 've-ZA', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(271, 'Vietnamese (Vietnam)', 'vi', 'vi-VN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(272, 'Welsh (United Kingdom)', 'cy', 'cy-GB', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(273, 'Wolof (Senegal)', 'wo', 'wo-SN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(274, 'Xhosa (South Africa)', 'xh', 'xh-ZA', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(275, 'Yi (People\'s Republic of China)', 'ii', 'ii-CN', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(276, 'Yiddish (World)', 'yi', 'yi-001', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(277, 'Yoruba (Nigeria)', 'yo', 'yo-NG', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(278, 'Zulu (South Africa)', 'zu', 'zu-ZA', '2024-04-11 01:36:37', '2024-04-11 01:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `language_keywords`
--

CREATE TABLE `language_keywords` (
  `id` bigint UNSIGNED NOT NULL,
  `screen_id` bigint UNSIGNED DEFAULT NULL COMMENT 'screens screenID',
  `keyword_id` bigint UNSIGNED DEFAULT NULL COMMENT 'app keyword',
  `keyword_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_keywords`
--

INSERT INTO `language_keywords` (`id`, `screen_id`, `keyword_id`, `keyword_name`, `keyword_value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'skip', 'Skip', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(2, 1, 2, 'getStarted', 'Get Started', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(3, 1, 3, 'WALK1_TITLE', 'With thousands of properties available, Your \\ndream home may be just a few touches away.', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(4, 1, 4, 'WALK2_TITLE', 'use our advanced search features to filter \\nproperties, Save time and find the best \\noption for you.', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(5, 1, 5, 'WALK3_TITLE', 'From \'For Sale\' to \'For Lease,\' discover the \\nseamless way to property fulfillment.', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(6, 1, 6, 'WALK1_TITLE1', 'Find best place to \\nstay in', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(7, 1, 7, 'WALK2_TITLE2', 'fast and easy', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(8, 1, 8, 'WALK3_TITLE3', 'Sell Or Rents', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(9, 1, 9, 'WALK1_TITLE_1', 'good price', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(10, 1, 10, 'WALK2_TITLE_2', 'search', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(11, 1, 11, 'WALK3_TITLE_3', 'Property', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(12, 1, 271, 'next', 'Next', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(13, 3, 12, 'signUp', 'Sign Up', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(14, 3, 13, 'firstName', 'First Name', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(15, 3, 14, 'lastName', 'Last Name', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(16, 3, 15, 'email', 'Email', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(17, 3, 16, 'enterEmail', 'Enter your email', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(18, 3, 17, 'alreadyHaveAccount', 'Already have an account?', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(19, 3, 18, 'signIn', 'Sign In', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(20, 4, 19, 'verifyPhoneNumber', 'Verify Phone Number', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(21, 4, 20, 'enterTheConfirmationCodeWeSentTo', 'Enter the confirmation code we sent to', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(22, 4, 21, 'enterOTP', 'Enter OTP =>', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(23, 4, 22, 'didntReceiveCode', 'Didn’t receive code?', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(24, 4, 23, 'resend', 'Resend', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(25, 4, 24, 'verify', 'Verify', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(26, 4, 25, 'enterValidOTP', 'enter valid otp', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(27, 4, 316, 'invalidOtp', 'invalid OTP', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(28, 5, 26, 'fetchingYourCurrentLocation', 'Fetching your current location...', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(29, 5, 27, 'resultNotFound', 'Result Not Found', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(30, 5, 28, 'chatGpt', 'ChatGpt', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(31, 5, 29, 'bhk_title', 'BHK', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(32, 5, 30, 'up_to', 'up to', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(33, 5, 31, 'selectCity', 'Select City', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(34, 5, 32, 'advertisementProperties', 'Advertisement Properties', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(35, 5, 33, 'seeAll', 'See all', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(36, 5, 34, 'properties', 'Properties', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(37, 5, 35, 'lastSearch', 'Last Search', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(38, 5, 36, 'selectBHK', 'Select BHK', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(39, 5, 37, 'explorePropertiesBasedOnBHKType', 'Explore Properties based on BHK Type', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(40, 5, 38, 'nearByProperty', 'Near By Property', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(41, 5, 39, 'handpickedPropertiesForYou', 'Hand picked properties for you', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(42, 5, 40, 'selectBudget', 'Select Budget', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(43, 5, 41, 'explorePropertiesBasedOnBudget', 'Explore properties based on Budget', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(44, 5, 42, 'ownerProperties', 'Owner Properties', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(45, 5, 43, 'fullyFurnishedProperties', 'Fully Furnished Properties', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(46, 5, 44, 'newsArticles', 'News & Articles', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(47, 5, 45, 'readWhatsHappeningInRealEstate', 'Read What’s happening in Real Estate', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(48, 5, 314, 'upTo', 'up to', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(49, 6, 46, 'notification', 'Notifications', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(50, 7, 260, 'chatMessage_1', 'What are common legal pitfalls to avoid when buying?', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(51, 7, 261, 'chatMessage_2', 'How can I market my property effectively to attract potential buyers?', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(52, 7, 262, 'chatMessage_3', 'How do I determine the fair market value of a property??', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(53, 7, 305, 'chatbotQue1', 'What are common legal pitfalls to avoid when buying?', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(54, 7, 306, 'chatbotQue2', 'How can I market my property effectively to attract potential buyers?', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(55, 7, 307, 'chatbotQue3', 'How do I determine the fair market value of a property??', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(56, 8, 47, 'clearMsg', 'Do you want to clear the conversations ?', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(57, 8, 48, 'yes', 'Yes', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(58, 8, 49, 'no', 'No', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(59, 8, 50, 'aiBot', 'AI-Bot', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(60, 8, 51, 'clearConversion', 'Clear Conversion', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(61, 8, 300, 'copiedToClipboard', 'Copied to Clipboard', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(62, 8, 308, 'tooManyRequestsPleaseTryAgain', 'Too many requests please try again', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(63, 8, 309, 'howCanIHelpYou', 'How can i help you...', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(64, 9, 52, 'noInternet', 'Your internet is not working', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(65, 10, 53, 'useMyCurrentLocation', 'Use My Current Location', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(66, 10, 54, 'recentSearch', 'Recent Search', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(67, 10, 55, 'foundState', 'Found 0 estates', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(68, 10, 56, 'searchNotFound', 'Search not found', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(69, 10, 57, 'searchMsg', 'Oops! We can not found result.', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(70, 10, 58, 'forRent', 'For Rent', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(71, 10, 59, 'forSell', 'For Sell', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(72, 10, 60, 'pg', 'PG', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(73, 10, 283, 'searchLocation', 'Search by location', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(74, 11, 61, 'clearFilter', 'Clear Filter', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(75, 11, 62, 'priceRange', 'Price Range', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(76, 11, 63, 'postedSince', 'Posted Since', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(77, 11, 64, 'location', 'Location', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(78, 11, 65, 'chooseLocation', 'Choose Location', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(79, 11, 266, 'filter', 'Filter', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(80, 11, 267, 'anytime', 'AnyTime', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(81, 11, 268, 'applyFilter', 'Apply Filter', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(82, 11, 277, 'lastWeek', 'LastWeek', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(83, 11, 278, 'yesterday', 'Yesterday', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(84, 12, 66, 'searchResult', 'Search Result', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(85, 12, 67, 'search', 'Search', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(86, 12, 68, 'found', 'Found', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(87, 12, 69, 'estates', 'estates', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(88, 12, 70, 'forSell', 'For Sell', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(89, 12, 71, 'pg', 'PG', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(90, 12, 72, 'searchNotFound', 'Search not found', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(91, 12, 73, 'searchMsg', 'Oops! We can not found result.', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(92, 12, 74, 'forRent', 'For Rent', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(93, 13, 75, 'category', 'Category', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(94, 14, 76, 'updateProperty', 'Update Property', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(95, 14, 77, 'addProperty', 'Add Property', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(96, 14, 78, 'Continue', 'Continue', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(97, 14, 79, 'submit', 'Submit', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(98, 14, 80, 'pleaseSelectCategory', 'Please select category', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(99, 14, 81, 'pleaseSelectPriceDuration', 'Please select Price Duration', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(100, 14, 82, 'pleaseSelectMainPicture', 'Please select main picture', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(101, 14, 83, 'pleaseSelectOtherPicture', 'Please select other picture', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(102, 14, 84, 'pleaseSelectBHK', 'Please select bhk', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(103, 14, 85, 'pleaseSelectAddress', 'Please select Address', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(104, 14, 86, 'areYouA', 'Are you a', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(105, 14, 87, 'selectCategory', 'Select Category', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(106, 14, 88, 'propertyName', 'Property Name', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(107, 14, 89, 'enterPropertyName', 'Enter property name', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(108, 14, 90, 'selectBHK', 'Select BHK', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(109, 14, 91, 'bhk', 'BHK', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(110, 14, 92, 'furnishType', 'Furnished Type', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(111, 14, 93, 'selectFurnishedType', 'Select furnished type', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(112, 14, 94, 'squareFeetArea', 'Square Feet Area', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(113, 14, 95, 'enterSquareFeetArea', 'Enter square feet area', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(114, 14, 96, 'ageOfProperty', 'Age Of Property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(115, 14, 97, 'year', '(Year)', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(116, 14, 98, 'enterAgeOfProperty', 'Enter age of property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(117, 14, 99, 'description', 'Description', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(118, 14, 100, 'writeSomethingHere', 'Write something here...', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(119, 14, 101, 'price', 'Price', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(120, 14, 102, 'enterPrice', 'Enter price', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(121, 14, 103, 'priceDuration', 'Price Duration', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(122, 14, 104, 'selectPriceDuration', 'Select price duration', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(123, 14, 105, 'securityDeposit', 'Security Deposit', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(124, 14, 106, 'enterSecurityDeposit', 'Enter Security Deposit', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(125, 14, 107, 'brokerage', 'Brokerage', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(126, 14, 108, 'enterBrokerage', 'Enter Brokerage', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(127, 14, 109, 'maintenanceCharges', 'Maintenance Charges (Per Month)', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(128, 14, 110, 'enterMaintenanceCharge', 'Enter maintenance charge', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(129, 14, 111, 'address', 'Address', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(130, 14, 112, 'chooseOnMap', 'Choose On Map', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(131, 14, 113, 'country', 'Country', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(132, 14, 114, 'pleaseChooseAddressFromMap', 'Please choose address from map', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(133, 14, 115, 'state', 'State', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(134, 14, 116, 'city', 'City', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(135, 14, 117, 'addPicture', 'Add Picture', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(136, 14, 118, 'addMainPicture', 'Add Main Picture', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(137, 14, 119, 'addOtherPicture', 'Add Other Picture', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(138, 14, 120, 'addOtherPictures', 'Add Other Pictures', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(139, 14, 121, 'videoUrl', 'Video URL', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(140, 14, 122, 'priceDurationValue', 'Price Duration Value', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(141, 14, 123, 'enterVideoUrl', 'Enter video Url', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(142, 14, 124, 'premiumProperty', 'Premium Property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(143, 14, 125, 'extraFacilities', 'Extra Facilities', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(144, 14, 126, 'pleaseAddAmenities', 'Please add Amenities', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(145, 14, 286, 'iWantTo', 'i want to', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(146, 14, 297, 'advertisementHistory', 'Advertisement History', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(147, 14, 298, 'addRequiredAmenityMessage', 'Please add required Amenities', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(148, 14, 301, 'updateProperty', 'Update Property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(149, 14, 302, 'rentProperty', 'Rent property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(150, 14, 303, 'sellProperty', 'Sell property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(151, 14, 304, 'pgColivingProperty', 'PG\\/Co-living property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(152, 14, 328, 'propertyHasBeenSaveSuccessfully', 'Property has been save successfully', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(153, 14, 329, 'planHasExpired', 'Plan Has Expired', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(154, 14, 334, 'daily', 'Daily', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(155, 14, 337, 'monthly', 'Monthly', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(156, 14, 338, 'quarterly', 'Quarterly', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(157, 14, 339, 'yearly', 'Yearly', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(158, 15, 127, 'ageOfProperty', 'Age Of Property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(159, 15, 128, 'year', '(Year)', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(160, 15, 129, 'forSell', 'For Sell', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(161, 15, 130, 'pgCoLiving', 'PG\\/Co-living', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(162, 15, 131, 'edit', 'Edit', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(163, 15, 132, 'delete', 'Delete', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(164, 15, 133, 'deletePropertyMsg', 'Are you sure you want to Delete Property ?', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(165, 15, 134, 'costOfLiving', 'Cost Of Living', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(166, 15, 135, 'securityDeposit', 'Security Deposit', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(167, 15, 136, 'maintenanceCharges', 'Maintenance Charges (Per Month)', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(168, 15, 137, 'brokerage', 'Brokerage', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(169, 15, 138, 'totalExtraCost', 'Total Extra Cost', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(170, 15, 139, 'location', 'Location', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(171, 15, 140, 'viewOnMap', 'View on Map', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(172, 15, 141, 'gallery', 'Gallery', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(173, 15, 142, 'description', 'Description', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(174, 15, 143, 'property', 'Property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(175, 15, 144, 'bhk', 'BHK', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(176, 15, 145, 'semiFurnished', 'Semi Furnished', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(177, 15, 146, 'unfurnished', 'Unfurnished', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(178, 15, 147, 'NearestByGoogle', 'Nearest places provided by google', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(179, 15, 269, 'fullyFurnished', 'Fully Furnished', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(180, 15, 320, 'tapToViewContactInfo', 'Tap to view contact info', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(181, 16, 148, 'favourite', 'Favorite', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(182, 16, 149, 'resultNotFound', 'Result Not Found', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(183, 17, 150, 'myProfile', 'My Profile', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(184, 17, 151, 'yourCurrentPlan', 'Your Current Plan', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(185, 17, 319, 'viewPropertyContactHistory', 'View Property Contact History', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(186, 17, 153, 'deleteAccountMessage', 'Are you sure you want to delete your account ?', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(187, 17, 154, 'advertisement', 'Advertisement', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(188, 17, 155, 'contactInfo', 'Contact Info', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(189, 17, 156, 'myProperty', 'My Properties', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(190, 17, 157, 'newsArticles', 'News & Articles', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(191, 17, 158, 'setting', 'Settings', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(192, 17, 159, 'aboutApp', 'About App', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(193, 17, 160, 'deleteAccount', 'Delete Account', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(194, 17, 161, 'delete', 'Delete', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(195, 17, 162, 'logOut', 'Logout', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(196, 17, 163, 'logoutMsg', 'Are you sure you want to logout from device?', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(197, 17, 270, 'subscription', 'Subscriptions', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(198, 18, 164, 'pay', 'Pay', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(199, 18, 165, 'failed', 'Failed', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(200, 18, 282, 'success', 'Success', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(201, 18, 287, 'paymentFailed', 'Payment Failed', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(202, 18, 291, 'payments', 'Payments', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(203, 18, 317, 'transactionSuccessful', 'Transaction Successful', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(204, 18, 318, 'transactionFailed', 'Transaction Failed', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(205, 18, 335, 'testPayment', 'Test Payment', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(206, 18, 336, 'payWithCard', 'Pay with Card', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(207, 19, 166, 'seenOn', 'Seen on', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(208, 19, 168, 'inquiryFor', 'Inquiry for', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(209, 20, 169, 'editProfile', 'Edit Profile', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(210, 20, 170, 'save', 'Save', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(211, 20, 171, 'firstName', 'First Name', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(212, 20, 172, 'enterFirstName', 'Enter your first name', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(213, 20, 173, 'lastName', 'Last Name', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(214, 20, 174, 'enterLastName', 'Enter your last name', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(215, 20, 175, 'email', 'Email', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(216, 20, 176, 'enterEmail', 'Enter your email', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(217, 20, 177, 'phoneNumber', 'Phone Number', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(218, 20, 178, 'enterPhone', 'Phone Number', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(219, 20, 179, 'camera', 'Camera', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(220, 20, 180, 'chooseImage', 'Choose Image', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(221, 21, 181, 'contactInfoDetails', 'contact info details', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(222, 22, 182, 'tapToView', 'Tap to view', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(223, 23, 183, 'subscriptionPlans', 'Subscription Plans', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(224, 23, 184, 'active', 'Active', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(225, 23, 185, 'history', 'History', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(226, 23, 186, 'subscriptionMsg', 'You have not any subscription plans', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(227, 23, 187, 'cancelled', 'Cancelled', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(228, 23, 188, 'viewPlans', 'View Plans', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(229, 23, 189, 'yourPlanValid', 'Your plan valid', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(230, 23, 190, 'viewPropertyLimit', 'View property limit', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(231, 23, 191, 'unlimited', 'Unlimited', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(232, 23, 192, 'addPropertyLimit', 'Add property limit', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(233, 23, 284, 'to', 'to', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(234, 24, 200, 'aboutUs', 'About Us', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(235, 24, 201, 'followUs', 'Follow Us', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(236, 24, 296, 'mailto', 'mailto =>', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(237, 25, 202, 'advertisementProperties', 'Advertisement Properties', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(238, 25, 203, 'resultNotFound', 'Result Not Found', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(239, 26, 204, 'extraFacilities', 'Extra Facilities', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(240, 27, 205, 'addProperties', 'Add Properties', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(241, 28, 206, 'privacyPolicy', 'Privacy Policy', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(242, 29, 207, 'termsCondition', 'Terms & Conditions', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(243, 30, 208, 'congratulations', 'Congratulations!', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(244, 30, 209, 'yourPropertySubmittedSuccessfully', 'Your Property Submitted Successfully!', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(245, 30, 210, 'previewProperty', 'Preview Property', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(246, 30, 211, 'backToHome', 'Back to home', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(247, 31, 212, 'resultNotFound', 'Result Not Found', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(248, 33, 214, 'newsArticles', 'News & Articles', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(249, 34, 215, 'aboutApp', 'About App', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(250, 34, 216, 'privacyPolicy', 'Privacy Policy', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(251, 34, 217, 'termsCondition', 'Terms & Conditions', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(252, 34, 218, 'aboutUs', 'About Us', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(253, 35, 219, 'language', 'Select Language', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(254, 35, 220, 'appTheme', 'App Theme', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(255, 35, 221, 'setting', 'Settings', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(256, 35, 263, 'systemDefault', 'System Default', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(257, 36, 222, 'noFoundData', 'No Data Found', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(258, 37, 223, 'purchase', 'Purchase', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(259, 37, 224, 'pleaseSelectLimit', 'Please select at least one limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(260, 37, 225, 'limit', 'limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(261, 37, 226, 'addPropertyLimit', 'Add property limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(262, 37, 227, 'contactInfoLimit', 'Add Contact info Limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(263, 37, 228, 'addAdvertisementLimit', 'Add Advertisement Limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(264, 37, 292, 'limitExceeded', 'Limit Exceeded!', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(265, 37, 293, 'limitMsg', 'Extend your limit and keep growing with mighty eProperty. 🚀', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(266, 38, 229, 'myProperty', 'My Properties', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(267, 38, 230, 'addNew', 'Add New', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(268, 38, 231, 'boostYourProperty', 'Boost Your Property', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(269, 38, 280, 'sell', 'Sell', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(270, 38, 281, 'rent', 'Rent', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(271, 38, 288, 'alreadyBoostedYourProperty', 'Already Boosted Your Property', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(272, 39, 232, 'selectPropertyType', 'Select Property Type', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(273, 40, 233, 'properties', 'Properties', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(274, 40, 234, 'resultNotFound', 'Result Not Found', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(275, 41, 235, 'propertyContactInfo', 'Property Contact Info', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(276, 42, 236, 'signIn', 'Sign In', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(277, 42, 237, 'mobileNumber', 'Mobile Number', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(278, 42, 238, 'enterYourMobileNumber', 'Enter Your Mobile Number', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(279, 43, 239, 'addPropertyHistory', 'Add Property History', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(280, 43, 240, 'advertisementHistor', 'Advertisement History', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(281, 44, 241, 'resultNotFound', 'Result Not Found', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(282, 45, 255, 'chooseLocation', 'Choose Location', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(283, 45, 256, 'searchAddress', 'Search Address', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(284, 45, 257, 'pleaseWait', 'Please Wait', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(285, 45, 258, 'confirmAddress', 'Confirm Address', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(286, 45, 259, 'somethingWentWrong', 'something went wrong', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(287, 45, 310, 'chooseLocation', 'Choose Location', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(288, 45, 311, 'searchLocation', 'Search Address', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(289, 45, 312, 'pleaseWait', 'Please Wait', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(290, 45, 313, 'confirmAddress', 'Confirm Address', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(291, 46, 242, 'language', 'Select Language', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(292, 47, 243, 'nearByProperty', 'Near By Property', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(293, 47, 244, 'resultNotFound', 'Result Not Found', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(294, 48, 245, 'checkoutNewsArticles', 'Checkout News & Articles', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(295, 49, 246, 'subscriptionPlans', 'Subscription Plans', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(296, 49, 247, 'subscribe', 'Subscribe', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(297, 49, 248, 'bePremiumGetUnlimitedAccess', 'Be Premium Get Unlimited Access', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(298, 49, 249, 'enjoyUnlimitedAccessWithoutAdsAndRestrictions', 'Enjoy Unlimited Access Without Ads And Restrictions', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(299, 49, 250, 'viewPropertyLimit', 'View property limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(300, 49, 251, 'unlimited', 'Unlimited', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(301, 49, 252, 'addPropertyLimit', 'Add property limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(302, 49, 253, 'advertisementLimit', 'Advertisement limit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(303, 49, 254, 'noData', 'No Data', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(304, 49, 285, 'pleaseSelectPlantContinue', 'please select plan to continue', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(305, 50, 264, 'cancel', 'Cancel', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(306, 50, 272, 'individual', 'Individual', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(307, 50, 273, 'userNotFound', 'User Not Found', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(308, 50, 274, 'allowLocationPermission', 'Allow Location Permission', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(309, 50, 279, 'premium', 'Premium', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(310, 50, 299, 'enter', 'Enter', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(311, 51, 265, 'chooseTheme', 'Choose theme', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(312, 51, 275, 'light', 'Light', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(313, 51, 276, 'dark', 'Dark', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(314, 51, 294, 'paymentSuccessfullyDone', 'Payment successfully done!', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(315, 51, 295, 'paymentSuccessfullyMsg', 'Yippee 🥳, you ve been unlocked amazing features', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(316, 52, 289, 'boost', 'Boost', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(317, 52, 290, 'boostMsg', 'Are you sure you want to boost your property ?', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(318, 53, 321, 'thisFieldIsRequired', 'This field is required', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(319, 53, 323, 'owner', 'Owner', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(320, 53, 324, 'broker', 'Broker', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(321, 53, 325, 'builder', 'Builder', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(322, 53, 326, 'agent', 'Agent', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(323, 54, 327, 'pressBackAgainToExit', 'Press back again to exit', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(324, 55, 330, 'theProvidedPhoneNumberIsNotValid', 'The provided phone number is not valid', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(325, 55, 331, 'phoneVerificationDone', 'Phone Verification done', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(326, 55, 332, 'invalidPhoneNumber', 'invalid phone-number', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(327, 55, 333, 'codeSent', 'code sent', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(328, 23, 340, 'cancelSubscriptionMsg', 'Are you sure you want to cancel current subscription plan?', '2024-04-15 11:52:11', '2024-04-15 11:52:11'),
(329, 23, 341, 'cancelSubscription', 'Cancel Subscription', '2024-04-15 11:52:11', '2024-04-15 11:52:11'),
(330, 23, 342, 'cancelledOn', 'Cancelled on?', '2024-04-15 13:54:18', '2024-04-15 13:54:18'),
(331, 23, 343, 'paymentVia', 'Payment via', '2024-04-15 13:54:59', '2024-04-15 13:54:59');
-- --------------------------------------------------------

--
-- Table structure for table `language_tables`
--

CREATE TABLE `language_tables` (
  `id` bigint UNSIGNED NOT NULL,
  `language_id` bigint UNSIGNED DEFAULT NULL,
  `language_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_rtl` tinyint DEFAULT '0',
  `is_default` tinyint DEFAULT '0' COMMENT '0-no, 1-yes',
  `status` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_version_details`
--

CREATE TABLE `language_version_details` (
  `id` bigint UNSIGNED NOT NULL,
  `default_language_id` bigint UNSIGNED DEFAULT NULL,
  `version_no` bigint UNSIGNED DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_version_details`
--

INSERT INTO `language_version_details` (`id`, `default_language_id`, `version_no`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2024-04-11 01:36:37', '2024-04-11 01:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_02_102753_create_payment_gateways_table', 1),
(6, '2023_05_02_120722_create_permission_tables', 1),
(7, '2023_05_04_100102_create_media_table', 1),
(8, '2023_05_23_084042_create_notifications_table', 1),
(9, '2023_05_23_094130_create_settings_table', 1),
(10, '2023_05_23_104508_create_app_settings_table', 1),
(11, '2023_07_07_085318_create_amenities_table', 1),
(12, '2023_07_07_085319_create_categories_table', 1),
(13, '2023_07_07_085320_create_category_amenity_mappings_table', 1),
(14, '2023_07_07_085321_create_properties_table', 1),
(15, '2023_07_07_085322_create_articles_table', 1),
(16, '2023_07_07_085322_create_property_amenities_table', 1),
(17, '2023_07_07_085323_create_sliders_table', 1),
(18, '2023_07_07_085324_create_packages_table', 1),
(19, '2023_08_19_090739_create_push_notifications_table', 1),
(20, '2023_12_08_095542_create_user_favourite_properties_table', 1),
(21, '2023_12_09_044142_create_subscriptions_table', 1),
(22, '2023_12_14_100405_create_property_view_histories_table', 1),
(23, '2023_12_19_052520_create_tags_table', 1),
(24, '2024_01_10_041517_create_extra_property_limits_table', 1),
(25, '2024_01_10_041702_create_extra_property_limit_transactions_table', 1),
(26, '2024_03_01_022105_create_language_default_lists_table', 2),
(27, '2024_03_01_031149_create_language_tables_table', 2),
(28, '2024_03_01_033733_create_screens_table', 2),
(29, '2024_03_01_040938_create_language_keywords_table', 2),
(30, '2024_03_01_051223_create_language_contents_table', 2),
(31, '2024_03_01_090152_create_language_version_details_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` bigint UNSIGNED DEFAULT NULL,
  `price` double DEFAULT NULL,
  `property` bigint UNSIGNED DEFAULT '0',
  `add_property` bigint UNSIGNED DEFAULT '0',
  `advertisement` bigint UNSIGNED DEFAULT '0',
  `property_limit` bigint UNSIGNED DEFAULT NULL,
  `add_property_limit` bigint UNSIGNED DEFAULT NULL,
  `advertisement_limit` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT '1' COMMENT '0- InActive, 1- Active',
  `is_test` tinyint DEFAULT '1' COMMENT '0-  No, 1- Yes',
  `test_value` json DEFAULT NULL,
  `live_value` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'role', 'web', NULL, '2024-02-02 02:39:56', NULL),
(2, 'role-add', 'web', 1, '2024-02-02 02:39:56', NULL),
(3, 'role-list', 'web', 1, '2024-02-02 02:39:56', NULL),
(4, 'permission', 'web', NULL, '2024-02-02 02:39:56', NULL),
(5, 'permission-add', 'web', 4, '2024-02-02 02:39:56', NULL),
(6, 'permission-list', 'web', 4, '2024-02-02 02:39:56', NULL),
(7, 'customer', 'web', NULL, '2024-02-02 02:39:56', NULL),
(8, 'customer-list', 'web', 7, '2024-02-02 02:39:56', NULL),
(9, 'customer-show', 'web', 7, '2024-02-02 02:39:56', NULL),
(10, 'customer-delete', 'web', 7, '2024-02-02 02:39:56', NULL),
(11, 'agent', 'web', NULL, '2024-02-02 02:39:56', NULL),
(12, 'agent-list', 'web', 11, '2024-02-02 02:39:56', NULL),
(13, 'agent-show', 'web', 11, '2024-02-02 02:39:56', NULL),
(14, 'agent-delete', 'web', 11, '2024-02-02 02:39:56', NULL),
(15, 'builder', 'web', NULL, '2024-02-02 02:39:56', NULL),
(16, 'builder-list', 'web', 15, '2024-02-02 02:39:56', NULL),
(17, 'builder-show', 'web', 15, '2024-02-02 02:39:56', NULL),
(18, 'builder-delete', 'web', 15, '2024-02-02 02:39:56', NULL),
(19, 'subadmin', 'web', NULL, '2024-02-02 02:39:56', NULL),
(20, 'subadmin-list', 'web', 19, '2024-02-02 02:39:56', NULL),
(21, 'subadmin-add', 'web', 19, '2024-02-02 02:39:56', NULL),
(22, 'subadmin-edit', 'web', 19, '2024-02-02 02:39:56', NULL),
(23, 'subadmin-delete', 'web', 19, '2024-02-02 02:39:56', NULL),
(24, 'amenity', 'web', NULL, '2024-02-02 02:39:56', NULL),
(25, 'amenity-list', 'web', 24, '2024-02-02 02:39:56', NULL),
(26, 'amenity-add', 'web', 24, '2024-02-02 02:39:56', NULL),
(27, 'amenity-edit', 'web', 24, '2024-02-02 02:39:56', NULL),
(28, 'amenity-delete', 'web', 24, '2024-02-02 02:39:56', NULL),
(29, 'category', 'web', NULL, '2024-02-02 02:39:56', NULL),
(30, 'category-list', 'web', 29, '2024-02-02 02:39:56', NULL),
(31, 'category-add', 'web', 29, '2024-02-02 02:39:56', NULL),
(32, 'category-edit', 'web', 29, '2024-02-02 02:39:56', NULL),
(33, 'category-delete', 'web', 29, '2024-02-02 02:39:56', NULL),
(34, 'property', 'web', NULL, '2024-02-02 02:39:56', NULL),
(35, 'property-list', 'web', 34, '2024-02-02 02:39:56', NULL),
(36, 'property-add', 'web', 34, '2024-02-02 02:39:56', NULL),
(37, 'property-edit', 'web', 34, '2024-02-02 02:39:56', NULL),
(38, 'property-delete', 'web', 34, '2024-02-02 02:39:56', NULL),
(39, 'article', 'web', NULL, '2024-02-02 02:39:56', NULL),
(40, 'article-list', 'web', 39, '2024-02-02 02:39:56', NULL),
(41, 'article-add', 'web', 39, '2024-02-02 02:39:56', NULL),
(42, 'article-edit', 'web', 39, '2024-02-02 02:39:56', NULL),
(43, 'article-delete', 'web', 39, '2024-02-02 02:39:56', NULL),
(44, 'tags', 'web', NULL, '2024-02-02 02:39:56', NULL),
(45, 'tags-list', 'web', 44, '2024-02-02 02:39:56', NULL),
(46, 'tags-add', 'web', 44, '2024-02-02 02:39:56', NULL),
(47, 'tags-edit', 'web', 44, '2024-02-02 02:39:56', NULL),
(48, 'tags-delete', 'web', 44, '2024-02-02 02:39:56', NULL),
(49, 'slider', 'web', NULL, '2024-02-02 02:39:56', NULL),
(50, 'slider-list', 'web', 49, '2024-02-02 02:39:56', NULL),
(51, 'slider-add', 'web', 49, '2024-02-02 02:39:56', NULL),
(52, 'slider-edit', 'web', 49, '2024-02-02 02:39:56', NULL),
(53, 'slider-delete', 'web', 49, '2024-02-02 02:39:56', NULL),
(54, 'package', 'web', NULL, '2024-02-02 02:39:56', NULL),
(55, 'package-list', 'web', 54, '2024-02-02 02:39:56', NULL),
(56, 'package-add', 'web', 54, '2024-02-02 02:39:56', NULL),
(57, 'package-edit', 'web', 54, '2024-02-02 02:39:56', NULL),
(58, 'package-delete', 'web', 54, '2024-02-02 02:39:56', NULL),
(59, 'extra property limit', 'web', NULL, '2024-02-02 02:39:56', NULL),
(60, 'extra property limit-list', 'web', 59, '2024-02-02 02:39:56', NULL),
(61, 'extra property limit-add', 'web', 59, '2024-02-02 02:39:56', NULL),
(62, 'extra property limit-edit', 'web', 59, '2024-02-02 02:39:56', NULL),
(63, 'extra property limit-delete', 'web', 59, '2024-02-02 02:39:56', NULL),
(64, 'subscription', 'web', NULL, '2024-02-02 02:39:56', NULL),
(65, 'subscription-list', 'web', 64, '2024-02-02 02:39:56', NULL),
(66, 'subscription-show', 'web', 64, '2024-02-02 02:39:56', NULL),
(67, 'push notification', 'web', NULL, '2024-02-02 02:39:56', NULL),
(68, 'push notification-list', 'web', 67, '2024-02-02 02:39:56', NULL),
(69, 'push notification-add', 'web', 67, '2024-02-02 02:39:56', NULL),
(70, 'push notification-delete', 'web', 67, '2024-02-02 02:39:56', NULL),
(71, 'pages', 'web', NULL, '2024-02-02 02:39:56', NULL),
(72, 'terms-condition', 'web', 71, '2024-02-02 02:39:56', NULL),
(73, 'privacy-policy', 'web', 71, '2024-02-02 02:39:56', NULL),
(74, 'property-show', 'web', 34, '2024-02-02 02:39:56', NULL),
(75, 'article-show', 'web', 39, '2024-02-02 02:39:56', NULL),
(76, 'screen', 'web', NULL, '2024-04-11 01:36:35', NULL),
(77, 'screen-list', 'web', 76, '2024-04-11 01:36:35', NULL),
(78, 'languagekeyword', 'web', NULL, '2024-04-11 01:36:35', NULL),
(79, 'languagekeyword-list', 'web', 78, '2024-04-11 01:36:35', NULL),
(80, 'languagekeyword-add', 'web', 78, '2024-04-11 01:36:35', NULL),
(81, 'languagekeyword-edit', 'web', 78, '2024-04-11 01:36:35', NULL),
(82, 'language', 'web', NULL, '2024-04-11 01:36:35', NULL),
(83, 'language-list', 'web', 82, '2024-04-11 01:36:35', NULL),
(84, 'language-add', 'web', 82, '2024-04-11 01:36:35', NULL),
(85, 'language-edit', 'web', 82, '2024-04-11 01:36:35', NULL),
(86, 'language-delete', 'web', 82, '2024-04-11 01:36:35', NULL),
(87, 'languagecontent', 'web', NULL, '2024-04-11 01:36:35', NULL),
(88, 'languagecontent-list', 'web', 87, '2024-04-11 01:36:35', NULL),
(89, 'bulkimport', 'web', NULL, '2024-04-11 01:36:35', NULL),
(90, 'bulkimport-list', 'web', 89, '2024-04-11 01:36:35', NULL),
(91, 'languagekeyword-delete', 'web', 78, '2024-04-11 01:36:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `price` double DEFAULT NULL,
  `furnished_type` bigint UNSIGNED DEFAULT '0' COMMENT '0-unfurnished, 1-fully, 2-semi',
  `saller_type` bigint UNSIGNED DEFAULT '0' COMMENT '0-owner, 1-broker, 2-builder',
  `property_for` bigint UNSIGNED DEFAULT '0' COMMENT '0-rent, 1-sell, 2-pg_co_living',
  `price_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'daily, monthly, quarterly, yearly',
  `age_of_property` double DEFAULT NULL,
  `maintenance` double DEFAULT NULL,
  `security_deposit` double DEFAULT NULL,
  `brokerage` double DEFAULT NULL,
  `bhk` bigint UNSIGNED DEFAULT NULL,
  `sqft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `video_url` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT NULL,
  `premium_property` tinyint DEFAULT '0' COMMENT '0-no, 1-yes',
  `advertisement_property` tinyint DEFAULT NULL COMMENT 'null-no, 1-yes',
  `advertisement_property_date` datetime DEFAULT NULL,
  `added_by` bigint UNSIGNED DEFAULT NULL,
  `total_view` bigint UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities`
--

CREATE TABLE `property_amenities` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `amenity_id` bigint UNSIGNED DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_view_histories`
--

CREATE TABLE `property_view_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `for_user` tinyint(1) DEFAULT '0',
  `for_agent` tinyint(1) DEFAULT '0',
  `for_builder` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', 1, '2024-02-02 02:39:56', NULL),
(2, 'user', 'web', 1, '2024-02-02 02:39:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1);

-- --------------------------------------------------------

--
-- Table structure for table `screens`
--

CREATE TABLE `screens` (
  `id` bigint UNSIGNED NOT NULL,
  `screenId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screenName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `screenId`, `screenName`, `created_at`, `updated_at`) VALUES
(1, '1', 'Walkthrought', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(2, '3', 'SignUp Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(3, '4', 'OTP Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(4, '5', 'Home Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(5, '6', 'Notification Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(6, '7', 'ChatBot Empty Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(7, '8', 'Chatting Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(8, '9', 'No Internet Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(9, '10', 'Search Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(10, '11', 'Filter Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(11, '12', 'Search Result Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(12, '13', 'Category Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(13, '14', 'Add Property Screen', '2024-04-11 01:36:37', '2024-04-11 01:36:37'),
(14, '15', 'Property Detail Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(15, '16', 'Favourite Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(16, '17', 'Profile Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(17, '18', 'Payment Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(18, '19', 'View Property Contact History', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(19, '20', 'Edit Profile Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(20, '21', 'Property Contact History Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(21, '22', 'Slider Details Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(22, '23', 'Subscription Detail Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(23, '24', 'About Us Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(24, '25', 'Advertisement See All Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(25, '26', 'Amenity Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(26, '27', 'Dashboard Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(27, '28', 'Privacy Policy Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(28, '29', 'Terms Conditions Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(29, '30', 'Success Property Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(30, '31', 'Owner Furnished SeeAll Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(31, '33', 'News All Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(32, '34', 'Help Center Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(33, '35', 'Setting Screen', '2024-04-11 01:36:38', '2024-04-11 01:36:38'),
(34, '36', 'No DataScreen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(35, '37', 'Limit Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(36, '38', 'My Properties Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(37, '39', 'Select Property List Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(38, '40', 'See All Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(39, '41', 'Property Contact Info Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(40, '42', 'Login Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(41, '43', 'Add Property History Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(42, '44', 'Category Selected Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(43, '45', 'Google Map Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(44, '46', 'Language Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(45, '47', 'Near By See All Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(46, '48', 'News Details Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(47, '49', 'Subscribe Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(48, '50', 'Other Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(49, '51', 'payment success screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(50, '52', 'boost screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(51, '53', 'constants screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(52, '54', 'constants screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39'),
(53, '55', 'Auth Service Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39');
-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `package_id` bigint UNSIGNED DEFAULT NULL,
  `total_amount` double DEFAULT '0',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'cash',
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_detail` json DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending' COMMENT 'pending, paid, failed',
  `subscription_start_date` datetime DEFAULT NULL,
  `subscription_end_date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'active, inactive',
  `package_data` json DEFAULT NULL,
  `callback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `player_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_notification_seen` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_subscribe` tinyint DEFAULT '0',
  `is_agent` tinyint DEFAULT NULL,
  `is_builder` tinyint DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'UTC',
  `view_limit_count` bigint UNSIGNED DEFAULT NULL,
  `add_limit_count` bigint UNSIGNED DEFAULT NULL,
  `advertisement_limit_count` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `contact_number`, `email_verified_at`, `address`, `user_type`, `player_id`, `remember_token`, `last_notification_seen`, `status`, `uid`, `display_name`, `login_type`, `is_subscribe`, `is_agent`, `is_builder`, `timezone`, `view_limit_count`, `add_limit_count`, `advertisement_limit_count`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', 'admin', '$2y$10$hFGwSkvwkRVVRVHQYAHxYe5UDb9mMbbIcyv.iHDLPphHZ/zcTPOBS', '+919876543210', NULL, NULL, 'admin', NULL, NULL, NULL, 'active', NULL, 'Admin', NULL, NULL, NULL, NULL, 'UTC', NULL, NULL, NULL, '2024-02-02 02:39:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_favourite_properties`
--

CREATE TABLE `user_favourite_properties` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `property_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_amenity_mappings`
--
ALTER TABLE `category_amenity_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_amenity_mappings_amenity_id_foreign` (`amenity_id`),
  ADD KEY `category_amenity_mappings_category_id_foreign` (`category_id`);

--
-- Indexes for table `extra_property_limits`
--
ALTER TABLE `extra_property_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_property_limit_transactions`
--
ALTER TABLE `extra_property_limit_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `language_contents`
--
ALTER TABLE `language_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_contents_language_id_foreign` (`language_id`);

--
-- Indexes for table `language_default_lists`
--
ALTER TABLE `language_default_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_keywords`
--
ALTER TABLE `language_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_tables`
--
ALTER TABLE `language_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_tables_language_id_foreign` (`language_id`);

--
-- Indexes for table `language_version_details`
--
ALTER TABLE `language_version_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_category_id_foreign` (`category_id`);

--
-- Indexes for table `property_amenities`
--
ALTER TABLE `property_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_view_histories`
--
ALTER TABLE `property_view_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_view_histories_property_id_foreign` (`property_id`),
  ADD KEY `property_view_histories_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_category_id_foreign` (`category_id`),
  ADD KEY `sliders_property_id_foreign` (`property_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_package_id_foreign` (`package_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_favourite_properties`
--
ALTER TABLE `user_favourite_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_favourite_properties_user_id_foreign` (`user_id`),
  ADD KEY `user_favourite_properties_property_id_foreign` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_amenity_mappings`
--
ALTER TABLE `category_amenity_mappings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extra_property_limits`
--
ALTER TABLE `extra_property_limits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extra_property_limit_transactions`
--
ALTER TABLE `extra_property_limit_transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_contents`
--
ALTER TABLE `language_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_default_lists`
--
ALTER TABLE `language_default_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_keywords`
--
ALTER TABLE `language_keywords`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_tables`
--
ALTER TABLE `language_tables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_version_details`
--
ALTER TABLE `language_version_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_amenities`
--
ALTER TABLE `property_amenities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_view_histories`
--
ALTER TABLE `property_view_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `screens`
--
ALTER TABLE `screens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_favourite_properties`
--
ALTER TABLE `user_favourite_properties`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_amenity_mappings`
--
ALTER TABLE `category_amenity_mappings`
  ADD CONSTRAINT `category_amenity_mappings_amenity_id_foreign` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_amenity_mappings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `language_contents`
--
ALTER TABLE `language_contents`
  ADD CONSTRAINT `language_contents_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language_tables` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `language_tables`
--
ALTER TABLE `language_tables`
  ADD CONSTRAINT `language_tables_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `language_default_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_view_histories`
--
ALTER TABLE `property_view_histories`
  ADD CONSTRAINT `property_view_histories_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_view_histories_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sliders_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_favourite_properties`
--
ALTER TABLE `user_favourite_properties`
  ADD CONSTRAINT `user_favourite_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_favourite_properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
