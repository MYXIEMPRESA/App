/* 05-04-2023 */

--
-- Table structure for table `language_contents`
--

CREATE TABLE `language_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keyword_id` bigint(20) UNSIGNED DEFAULT NULL,
  `screen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keyword_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------


--
-- Table structure for table `language_default_lists`
--

CREATE TABLE `language_default_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `languageName` varchar(255) DEFAULT NULL,
  `languageCode` varchar(255) DEFAULT NULL,
  `countryCode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_default_lists`
--

INSERT INTO `language_default_lists` (`id`, `languageName`, `languageCode`, `countryCode`, `created_at`, `updated_at`) VALUES
(1, 'Afrikaans (South Africa)', 'af', 'af-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(2, 'Albanian (Albania)', 'sq', 'sq-AL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(3, 'Alsatian (France)', 'gsw', 'gsw-FR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(4, 'Amharic (Ethiopia)', 'am', 'am-ET', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(5, 'Arabic (Algeria)', 'ar', 'ar-DZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(6, 'Arabic (Bahrain)', 'ar', 'ar-BH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(7, 'Arabic (Egypt)', 'ar', 'ar-EG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(8, 'Arabic (Iraq)', 'ar', 'ar-IQ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(9, 'Arabic (Jordan)', 'ar', 'ar-JO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(10, 'Arabic (Kuwait)', 'ar', 'ar-KW', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(11, 'Arabic (Lebanon)', 'ar', 'ar-LB', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(12, 'Arabic (Libya)', 'ar', 'ar-LY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(13, 'Arabic (Morocco)', 'ar', 'ar-MA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(14, 'Arabic (Oman)', 'ar', 'ar-OM', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(15, 'Arabic (Qatar)', 'ar', 'ar-QA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(16, 'Arabic (Saudi Arabia)', 'ar', 'ar-SA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(17, 'Arabic (Syria)', 'ar', 'ar-SY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(18, 'Arabic (Tunisia)', 'ar', 'ar-TN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(19, 'Arabic (U.A.E.)', 'ar', 'ar-AE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(20, 'Arabic (Yemen)', 'ar', 'ar-YE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(21, 'Armenian (Armenia)', 'hy', 'hy-AM', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(22, 'Assamese (India)', 'as', 'as-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(23, 'Azerbaijani (Cyrillic)', 'az', 'az-Cyrl', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(24, 'Azerbaijani (Cyrillic, Azerbaijan)', 'az', 'az-Cyrl-AZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(25, 'Azerbaijani (Latin)', 'az', 'az-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(26, 'Azerbaijani (Latin, Azerbaijan)', 'az', 'az-Latn-AZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(27, 'Bangla (Bangladesh)', 'bn', 'bn-BD', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(28, 'Bangla (India)', 'bn', 'bn-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(29, 'Bashkir (Russia)', 'ba', 'ba-RU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(30, 'Basque (Spain)', 'eu', 'eu-ES', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(31, 'Belarusian (Belarus)', 'be', 'be-BY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(32, 'Bosnian (Cyrillic)', 'bs', 'bs-Cyrl', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(33, 'Bosnian (Cyrillic, Bosnia and Herzegovina)', 'bs', 'bs-Cyrl-BA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(34, 'Bosnian (Latin)', 'bs', 'bs-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(35, 'Bosnian (Latin, Bosnia and Herzegovina)', 'bs', 'bs-Latn-BA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(36, 'Breton (France)', 'br', 'br-FR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(37, 'Bulgarian (Bulgaria)', 'bg', 'bg-BG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(38, 'Burmese (Myanmar)', 'my', 'my-MM', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(39, 'Catalan (Spain)', 'ca', 'ca-ES', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(40, 'Central Atlas Tamazight (Arabic, Morocco)', 'tzm', 'tzm-Arab-MA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(41, 'Central Kurdish', 'ku', 'ku-Arab', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(42, 'Central Kurdish (Iraq)', 'ku', 'ku-Arab-IQ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(43, 'Cherokee', 'chr', 'chr-Cher', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(44, 'Cherokee (United States)', 'chr', 'chr-Cher-US', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(45, 'Chinese (Simplified) (zh-Hans)', 'zh', 'zh-Hans', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(46, 'Chinese (Simplified, People\'s Republic of China)', 'zh', 'zh-CN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(47, 'Chinese (Simplified, Singapore)', 'zh', 'zh-SG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(48, 'Chinese (Traditional) (zh-Hant)', 'zh', 'zh-Hant', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(49, 'Chinese (Traditional, Hong Kong S.A.R.)', 'zh', 'zh-HK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(50, 'Chinese (Traditional, Macao S.A.R.)', 'zh', 'zh-MO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(51, 'Chinese (Traditional, Taiwan)', 'zh', 'zh-TW', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(52, 'Corsican (France)', 'co', 'co-FR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(53, 'Croatian (Croatia)', 'hr', 'hr-HR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(54, 'Croatian (Latin, Bosnia and Herzegovina)', 'hr', 'hr-BA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(55, 'Czech (Czech Republic)', 'cs', 'cs-CZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(56, 'Danish (Denmark)', 'da', 'da-DK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(57, 'Dari (Afghanistan)', 'prs', 'prs-AF', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(58, 'Divehi (Maldives)', 'dv', 'dv-MV', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(59, 'Dutch (Belgium)', 'nl', 'nl-BE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(60, 'Dutch (Netherlands)', 'nl', 'nl-NL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(61, 'Dzongkha (Bhutan)', 'dz', 'dz-BT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(62, 'English (Australia)', 'en', 'en-AU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(63, 'English (Belize)', 'en', 'en-BZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(64, 'English (Canada)', 'en', 'en-CA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(65, 'English (Caribbean)', 'en', 'en-029', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(66, 'English (Hong Kong)', 'en', 'en-HK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(67, 'English (India)', 'en', 'en-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(68, 'English (Ireland)', 'en', 'en-IE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(69, 'English (Jamaica)', 'en', 'en-JM', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(70, 'English (Malaysia)', 'en', 'en-MY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(71, 'English (New Zealand)', 'en', 'en-NZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(72, 'English (Republic of the Philippines)', 'en', 'en-PH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(73, 'English (Singapore)', 'en', 'en-SG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(74, 'English (South Africa)', 'en', 'en-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(75, 'English (Trinidad and Tobago)', 'en', 'en-TT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(76, 'English (United Arab Emirates)', 'en', 'en-AE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(77, 'English (United Kingdom)', 'en', 'en-GB', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(78, 'English (United States)', 'en', 'en-US', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(79, 'English (Zimbabwe)', 'en', 'en-ZW', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(80, 'Estonian (Estonia)', 'et', 'et-EE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(81, 'Faroese (Faroe Islands)', 'fo', 'fo-FO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(82, 'Filipino (Philippines)', 'fi', 'fil-PH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(83, 'Finnish (Finland)', 'fi', 'fi-FI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(84, 'French (Belgium)', 'fr', 'fr-BE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(85, 'French (Côte d’Ivoire)', 'fr', 'fr-CI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(86, 'French (Cameroon)', 'fr', 'fr-CM', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(87, 'French (Canada)', 'fr', 'fr-CA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(88, 'French (Caribbean)', 'fr', 'fr-029', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(89, 'French (Congo, DRC)', 'fr', 'fr-CD', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(90, 'French (France)', 'fr', 'fr-FR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(91, 'French (Haiti)', 'fr', 'fr-HT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(92, 'French (Luxembourg)', 'fr', 'fr-LU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(93, 'French (Mali)', 'fr', 'fr-ML', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(94, 'French (Morocco)', 'fr', 'fr-MA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(95, 'French (Principality of Monaco)', 'fr', 'fr-MC', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(96, 'French (Réunion)', 'fr', 'fr-RE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(97, 'French (Senegal)', 'fr', 'fr-SN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(98, 'French (Switzerland)', 'fr', 'fr-CH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(99, 'Frisian (Netherlands)', 'fy', 'fy-NL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(100, 'Fulah (Latin)', 'ff', 'ff-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(101, 'Fulah (Latin, Nigeria)', 'ff', 'ff-Latn-NG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(102, 'Fulah (Latin, Senegal)', 'ff', 'ff-Latn-SN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(103, 'Galician (Spain)', 'gl', 'gl-ES', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(104, 'Georgian (Georgia)', 'ka', 'ka-GE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(105, 'German (Austria)', 'de', 'de-AT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(106, 'German (Germany)', 'de', 'de-DE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(107, 'German (Liechtenstein)', 'de', 'de-LI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(108, 'German (Luxembourg)', 'de', 'de-LU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(109, 'German (Switzerland)', 'de', 'de-CH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(110, 'Greek', 'el', 'el-GR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(111, 'Greenlandic (Greenland)', 'kl', 'kl-GL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(112, 'Guarani (Paraguay)', 'gn', 'gn-PY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(113, 'Gujarati', 'gu', 'gu-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(114, 'Hausa (Latin)', 'ha', 'ha-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(115, 'Hausa (Latin, Nigeria)', 'ha', 'ha-Latn-NG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(116, 'Hawaiian (United States)', 'haw', 'haw-US', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(117, 'Hebrew (Israel)', 'he', 'he-IL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(118, 'Hindi', 'hi', 'hi-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(119, 'Hungarian (Hungary)', 'hu', 'hu-HU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(120, 'Icelandic (Iceland)', 'is', 'is-IS', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(121, 'Igbo (Nigeria)', 'ig', 'ig-NG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(122, 'Indonesian (Indonesia)', 'id', 'id-ID', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(123, 'Inuktitut (Latin)', 'iu', 'iu-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(124, 'Inuktitut (Latin, Canada)', 'iu', 'iu-Latn-CA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(125, 'Inuktitut (Syllabics)', 'iu', 'iu-Cans', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(126, 'Inuktitut (Syllabics, Canada)', 'iu', 'iu-Cans-CA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(127, 'Irish (Ireland)', 'ga', 'ga-IE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(128, 'Italian (Italy)', 'it', 'it-IT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(129, 'Italian (Switzerland)', 'it', 'it-CH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(130, 'Japanese', 'ja', 'ja-JP', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(131, 'Kannada (India)', 'kn', 'kn-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(132, 'Kanuri (Latin, Nigeria)', 'kr', 'kr-Latn-NG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(133, 'Kashmiri (Devanagari, India)', 'ks', 'ks-Deva-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(134, 'Kashmiri (Perso-Arabic)', 'ks', 'ks-Arab', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(135, 'Kazakh (Kazakhstan)', 'kk', 'kk-KZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(136, 'Khmer (Cambodia)', 'km', 'km-KH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(137, 'K\'iche (Guatemala)', 'qut', 'qut-GT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(138, 'K\'iche (Latin, Guatemala)', 'quc', 'quc-Latn-GT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(139, 'Kinyarwanda (Rwanda)', 'rw', 'rw-RW', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(140, 'Kiswahili (Kenya)', 'sw', 'sw-KE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(141, 'Konkani (India)', 'kok', 'kok-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(142, 'Korean (Korea)', 'ko', 'ko-KR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(143, 'Kyrgyz (Kyrgyzstan)', 'ky', 'ky-KG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(144, 'Lao (Lao P.D.R.)', 'lo', 'lo-LA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(145, 'Latin (Vatican City)', 'la', 'la-VA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(146, 'Latvian (Latvia)', 'lv', 'lv-LV', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(147, 'Lithuanian (Lithuania)', 'lt', 'lt-LT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(148, 'Lower Sorbian (Germany)', 'dsb', 'dsb-DE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(149, 'Luxembourgish (Luxembourg)', 'lb', 'lb-LU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(150, 'Macedonian (North Macedonia)', 'mk', 'mk-MK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(151, 'Malay (Brunei Darussalam)', 'ms', 'ms-BN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(152, 'Malay (Malaysia)', 'ms', 'ms-MY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(153, 'Malayalam (India)', 'ml', 'ml-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(154, 'Maltese (Malta)', 'mt', 'mt-MT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(155, 'Maori (New Zealand)', 'mi', 'mi-NZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(156, 'Mapudungun (Chile)', 'arn', 'arn-CL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(157, 'Marathi (India)', 'mr', 'mr-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(158, 'Mohawk (Canada)', 'moh', 'moh-CA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(159, 'Mongolian (Cyrillic)', 'mn', 'mn-Cyrl', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(160, 'Mongolian (Cyrillic, Mongolia)', 'mn', 'mn-MN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(161, 'Mongolian (Traditional Mongolian)', 'mn', 'mn-Mong', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(162, 'Mongolian (Traditional Mongolian, Mongolia)', 'mn', 'mn-Mong-MN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(163, 'Mongolian (Traditional Mongolian, People\'s Republic of China)', 'mn', 'mn-Mong-CN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(164, 'Nepali (India)', 'ne', 'ne-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(165, 'Nepali (Nepal)', 'ne', 'ne-NP', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(166, 'Norwegian, Bokmål (Norway)', 'nb', 'nb-NO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(167, 'Norwegian, Nynorsk (Norway)', 'nn', 'nn-NO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(168, 'Occitan (France)', 'oc', 'oc-FR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(169, 'Odia (India)', 'or', 'or-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(170, 'Oromo (Ethiopia)', 'om', 'om-ET', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(171, 'Pashto (Afghanistan)', 'ps', 'ps-AF', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(172, 'Persian (Iran)', 'fa', 'fa-IR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(173, 'Polish (Poland)', 'pl', 'pl-PL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(174, 'Portuguese (Brazil)', 'pt', 'pt-BR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(175, 'Portuguese (Portugal)', 'pt', 'pt-PT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(176, 'Punjabi - Arab', 'pa', 'pa-Arab', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(177, 'Punjabi (India)', 'pa', 'pa-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(178, 'Punjabi (Islamic Republic of Pakistan)', 'pa', 'pa-Arab-PK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(179, 'Quechua (Bolivia)', 'quz', 'quz-BO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(180, 'Quechua (Ecuador)', 'quz', 'quz-EC', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(181, 'Quechua (Peru)', 'quz', 'quz-PE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(182, 'Romanian (Moldova)', 'ro', 'ro-MD', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(183, 'Romanian (Romania)', 'ro', 'ro-RO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(184, 'Romansh (Switzerland)', 'rm', 'rm-CH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(185, 'Russian (Moldova)', 'ru', 'ru-MD', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(186, 'Russian (Russia)', 'ru', 'ru-RU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(187, 'Sakha (Russia)', 'sah', 'sah-RU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(188, 'Sami, Inari (Finland)', 'smn', 'smn-FI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(189, 'Sami, Lule (Norway)', 'smj', 'smj-NO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(190, 'Sami, Lule (Sweden)', 'smj', 'smj-SE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(191, 'Sami, Northern (Finland)', 'se', 'se-FI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(192, 'Sami, Northern (Norway)', 'se', 'se-NO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(193, 'Sami, Northern (Sweden)', 'se', 'se-SE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(194, 'Sami, Skolt (Finland)', 'sm', 'sms-FI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(195, 'Sami, Southern (Norway)', 'sm', 'sma-NO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(196, 'Sami, Southern (Sweden)', 'sm', 'sma-SE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(197, 'Sanskrit (India)', 'sa', 'sa-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(198, 'Scottish Gaelic (United Kingdom)', 'gd', 'gd-GB', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(199, 'Serbian (Cyrillic)', 'sr', 'sr-Cyrl', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(200, 'Serbian (Cyrillic, Bosnia and Herzegovina)', 'sr', 'sr-Cyrl-BA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(201, 'Serbian (Cyrillic, Montenegro)', 'sr', 'sr-Cyrl-ME', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(202, 'Serbian (Cyrillic, Serbia and Montenegro (Former))', 'sr', 'sr-Cyrl-CS', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(203, 'Serbian (Cyrillic, Serbia)', 'sr', 'sr-Cyrl-RS', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(204, 'Serbian (Latin)', 'sr', 'sr-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(205, 'Serbian (Latin, Bosnia and Herzegovina)', 'sr', 'sr-Latn-BA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(206, 'Serbian (Latin, Montenegro)', 'sr', 'sr-Latn-ME', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(207, 'Serbian (Latin, Serbia and Montenegro (Former))', 'sr', 'sr-Latn-CS', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(208, 'Serbian (Latin, Serbia)', 'sr', 'sr-Latn-RS', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(209, 'Sesotho sa Leboa (South Africa)', 'nso', 'nso-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(210, 'Setswana (Botswana)', 'tn', 'tn-BW', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(211, 'Setswana (South Africa)', 'tn', 'tn-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(212, 'Sindhi', 'sd', 'sd-Arab', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(213, 'Sindhi (Islamic Republic of Pakistan)', 'sd', 'sd-Arab-PK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(214, 'Sinhala (Sri Lanka)', 'si', 'si-LK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(215, 'Slovak (Slovakia)', 'sk', 'sk-SK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(216, 'Slovenian (Slovenia)', 'sl', 'sl-SI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(217, 'Somali (Somalia)', 'so', 'so-SO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(218, 'Sotho (South Africa)', 'st', 'st-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(219, 'Spanish (Argentina)', 'es', 'es-AR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(220, 'Spanish (Bolivarian Republic of Venezuela)', 'es', 'es-VE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(221, 'Spanish (Bolivia)', 'es', 'es-BO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(222, 'Spanish (Chile)', 'es', 'es-CL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(223, 'Spanish (Colombia)', 'es', 'es-CO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(224, 'Spanish (Costa Rica)', 'es', 'es-CR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(225, 'Spanish (Cuba)', 'es', 'es-CU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(226, 'Spanish (Dominican Republic)', 'es', 'es-DO', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(227, 'Spanish (Ecuador)', 'es', 'es-EC', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(228, 'Spanish (El Salvador)', 'es', 'es-SV', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(229, 'Spanish (Guatemala)', 'es', 'es-GT', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(230, 'Spanish (Honduras)', 'es', 'es-HN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(231, 'Spanish (Latin America)', 'es', 'es-419', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(232, 'Spanish (Mexico)', 'es', 'es-MX', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(233, 'Spanish (Nicaragua)', 'es', 'es-NI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(234, 'Spanish (Panama)', 'es', 'es-PA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(235, 'Spanish (Paraguay)', 'es', 'es-PY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(236, 'Spanish (Peru)', 'es', 'es-PE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(237, 'Spanish (Puerto Rico)', 'es', 'es-PR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(238, 'Spanish (Spain, International Sort)', 'es', 'es-ES', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(239, 'Spanish (Traditional Sort)', 'es', 'es-ES', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(240, 'Spanish (United States)', 'es', 'es-US', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(241, 'Spanish (Uruguay)', 'es', 'es-UY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(242, 'Swedish (Finland)', 'sv', 'sv-FI', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(243, 'Swedish (Sweden)', 'sv', 'sv-SE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(244, 'Syriac (Syria)', 'syr', 'syr-SY', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(245, 'Tajik (Cyrillic)', 'tg', 'tg-Cyrl', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(246, 'Tajik (Cyrillic, Tajikistan)', 'tg', 'tg-Cyrl-TJ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(247, 'Tamazight (Latin)', 'tzm', 'tzm-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(248, 'Tamazight (Latin, Algeria)', 'tzm', 'tzm-Latn-DZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(249, 'Tamil (India)', 'ta', 'ta-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(250, 'Tamil (Sri Lanka)', 'ta', 'ta-LK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(251, 'Tatar (Russia)', 'tt', 'tt-RU', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(252, 'Telugu (India)', 'te', 'te-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(253, 'Thai (Thailand)', 'th', 'th-TH', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(254, 'Tibetan (People\'s Republic of China)', 'bo', 'bo-CN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(255, 'Tigrinya (Eritrea)', 'ti', 'ti-ER', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(256, 'Tigrinya (Ethiopia)', 'ti', 'ti-ET', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(257, 'Tsonga (South Africa)', 'ts', 'ts-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(258, 'Turkish (Turkey)', 'tr', 'tr-TR', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(259, 'Turkmen (Turkmenistan)', 'tk', 'tk-TM', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(260, 'Ukrainian (Ukraine)', 'uk', 'uk-UA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(261, 'Upper Sorbian (Germany)', 'hsb', 'hsb-DE', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(262, 'Urdu (India)', 'ur', 'ur-IN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(263, 'Urdu (Islamic Republic of Pakistan)', 'ur', 'ur-PK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(264, 'Uyghur (People\'s Republic of China)', 'ug', 'ug-CN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(265, 'Uzbek (Cyrillic)', 'uz', 'uz-Cyrl', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(266, 'Uzbek (Cyrillic, Uzbekistan)', 'uz', 'uz-Cyrl-UZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(267, 'Uzbek (Latin)', 'uz', 'uz-Latn', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(268, 'Uzbek (Latin, Uzbekistan)', 'uz', 'uz-Latn-UZ', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(269, 'Valencian (Spain)', 'ca', 'ca-ES-valencia', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(270, 'Venda (South Africa)', 've', 've-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(271, 'Vietnamese (Vietnam)', 'vi', 'vi-VN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(272, 'Welsh (United Kingdom)', 'cy', 'cy-GB', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(273, 'Wolof (Senegal)', 'wo', 'wo-SN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(274, 'Xhosa (South Africa)', 'xh', 'xh-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(275, 'Yi (People\'s Republic of China)', 'ii', 'ii-CN', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(276, 'Yiddish (World)', 'yi', 'yi-001', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(277, 'Yoruba (Nigeria)', 'yo', 'yo-NG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(278, 'Zulu (South Africa)', 'zu', 'zu-ZA', '2024-04-04 23:12:44', '2024-04-04 23:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `language_keywords`
--

CREATE TABLE `language_keywords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `screen_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'screens screenID',
  `keyword_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'app keyword',
  `keyword_name` varchar(255) DEFAULT NULL,
  `keyword_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_keywords`
--

INSERT INTO `language_keywords` (`id`, `screen_id`, `keyword_id`, `keyword_name`, `keyword_value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'skip', 'Skip', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(2, 1, 2, 'getStarted', 'Get Started', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(3, 1, 3, 'WALK1_TITLE', 'With thousands of properties available, Your \\ndream home may be just a few touches away.', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(4, 1, 4, 'WALK2_TITLE', 'use our advanced search features to filter \\nproperties, Save time and find the best \\noption for you.', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(5, 1, 5, 'WALK3_TITLE', 'From \'For Sale\' to \'For Lease,\' discover the \\nseamless way to property fulfillment.', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(6, 1, 6, 'WALK1_TITLE1', 'Find best place to \\nstay in', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(7, 1, 7, 'WALK2_TITLE2', 'fast and easy', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(8, 1, 8, 'WALK3_TITLE3', 'Sell Or Rents', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(9, 1, 9, 'WALK1_TITLE_1', 'good price', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(10, 1, 10, 'WALK2_TITLE_2', 'search', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(11, 1, 11, 'WALK3_TITLE_3', 'Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(12, 1, 271, 'next', 'Next', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(13, 3, 12, 'signUp', 'Sign Up', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(14, 3, 13, 'firstName', 'First Name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(15, 3, 14, 'lastName', 'Last Name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(16, 3, 15, 'email', 'Email', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(17, 3, 16, 'enterEmail', 'Enter your email', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(18, 3, 17, 'alreadyHaveAccount', 'Already have an account?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(19, 3, 18, 'signIn', 'Sign In', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(20, 4, 19, 'verifyPhoneNumber', 'Verify Phone Number', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(21, 4, 20, 'enterTheConfirmationCodeWeSentTo', 'Enter the confirmation code we sent to', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(22, 4, 21, 'enterOTP', 'Enter OTP =>', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(23, 4, 22, 'didntReceiveCode', 'Didn’t receive code?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(24, 4, 23, 'resend', 'Resend', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(25, 4, 24, 'verify', 'Verify', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(26, 4, 25, 'enterValidOTP', 'enter valid otp', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(27, 4, 316, 'invalidOtp', 'invalid OTP', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(28, 5, 26, 'fetchingYourCurrentLocation', 'Fetching your current location...', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(29, 5, 27, 'resultNotFound', 'Result Not Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(30, 5, 28, 'chatGpt', 'ChatGpt', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(31, 5, 29, 'bhk_title', 'BHK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(32, 5, 30, 'up_to', 'up to', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(33, 5, 31, 'selectCity', 'Select City', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(34, 5, 32, 'advertisementProperties', 'Advertisement Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(35, 5, 33, 'seeAll', 'See all', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(36, 5, 34, 'properties', 'Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(37, 5, 35, 'lastSearch', 'Last Search', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(38, 5, 36, 'selectBHK', 'Select BHK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(39, 5, 37, 'explorePropertiesBasedOnBHKType', 'Explore Properties based on BHK Type', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(40, 5, 38, 'nearByProperty', 'Near By Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(41, 5, 39, 'handpickedPropertiesForYou', 'Hand picked properties for you', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(42, 5, 40, 'selectBudget', 'Select Budget', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(43, 5, 41, 'explorePropertiesBasedOnBudget', 'Explore properties based on Budget', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(44, 5, 42, 'ownerProperties', 'Owner Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(45, 5, 43, 'fullyFurnishedProperties', 'Fully Furnished Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(46, 5, 44, 'newsArticles', 'News & Articles', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(47, 5, 45, 'readWhatsHappeningInRealEstate', 'Read What’s happening in Real Estate', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(48, 5, 314, 'upTo', 'up to', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(49, 6, 46, 'notification', 'Notifications', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(50, 7, 260, 'chatMessage_1', 'What are common legal pitfalls to avoid when buying?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(51, 7, 261, 'chatMessage_2', 'How can I market my property effectively to attract potential buyers?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(52, 7, 262, 'chatMessage_3', 'How do I determine the fair market value of a property??', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(53, 7, 305, 'chatbotQue1', 'What are common legal pitfalls to avoid when buying?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(54, 7, 306, 'chatbotQue2', 'How can I market my property effectively to attract potential buyers?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(55, 7, 307, 'chatbotQue3', 'How do I determine the fair market value of a property??', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(56, 8, 47, 'clearMsg', 'Do you want to clear the conversations ?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(57, 8, 48, 'yes', 'Yes', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(58, 8, 49, 'no', 'No', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(59, 8, 50, 'aiBot', 'AI-Bot', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(60, 8, 51, 'clearConversion', 'Clear Conversion', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(61, 8, 300, 'copiedToClipboard', 'Copied to Clipboard', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(62, 8, 308, 'tooManyRequestsPleaseTryAgain', 'Too many requests please try again', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(63, 8, 309, 'howCanIHelpYou', 'How can i help you...', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(64, 9, 52, 'noInternet', 'Your internet is not working', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(65, 10, 53, 'useMyCurrentLocation', 'Use My Current Location', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(66, 10, 54, 'recentSearch', 'Recent Search', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(67, 10, 55, 'foundState', 'Found 0 estates', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(68, 10, 56, 'searchNotFound', 'Search not found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(69, 10, 57, 'searchMsg', 'Oops! We can not found result.', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(70, 10, 58, 'forRent', 'For Rent', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(71, 10, 59, 'forSell', 'For Sell', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(72, 10, 60, 'pg', 'PG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(73, 10, 283, 'searchLocation', 'Search by location', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(74, 11, 61, 'clearFilter', 'Clear Filter', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(75, 11, 62, 'priceRange', 'Price Range', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(76, 11, 63, 'postedSince', 'Posted Since', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(77, 11, 64, 'location', 'Location', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(78, 11, 65, 'chooseLocation', 'Choose Location', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(79, 11, 266, 'filter', 'Filter', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(80, 11, 267, 'anytime', 'AnyTime', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(81, 11, 268, 'applyFilter', 'Apply Filter', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(82, 11, 277, 'lastWeek', 'LastWeek', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(83, 11, 278, 'yesterday', 'Yesterday', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(84, 12, 66, 'searchResult', 'Search Result', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(85, 12, 67, 'search', 'Search', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(86, 12, 68, 'found', 'Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(87, 12, 69, 'estates', 'estates', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(88, 12, 70, 'forSell', 'For Sell', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(89, 12, 71, 'pg', 'PG', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(90, 12, 72, 'searchNotFound', 'Search not found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(91, 12, 73, 'searchMsg', 'Oops! We can not found result.', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(92, 12, 74, 'forRent', 'For Rent', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(93, 13, 75, 'category', 'Category', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(94, 14, 76, 'updateProperty', 'Update Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(95, 14, 77, 'addProperty', 'Add Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(96, 14, 78, 'Continue', 'Continue', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(97, 14, 79, 'submit', 'Submit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(98, 14, 80, 'pleaseSelectCategory', 'Please select category', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(99, 14, 81, 'pleaseSelectPriceDuration', 'Please select Price Duration', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(100, 14, 82, 'pleaseSelectMainPicture', 'Please select main picture', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(101, 14, 83, 'pleaseSelectOtherPicture', 'Please select other picture', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(102, 14, 84, 'pleaseSelectBHK', 'Please select bhk', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(103, 14, 85, 'pleaseSelectAddress', 'Please select Address', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(104, 14, 86, 'areYouA', 'Are you a', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(105, 14, 87, 'selectCategory', 'Select Category', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(106, 14, 88, 'propertyName', 'Property Name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(107, 14, 89, 'enterPropertyName', 'Enter property name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(108, 14, 90, 'selectBHK', 'Select BHK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(109, 14, 91, 'bhk', 'BHK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(110, 14, 92, 'furnishType', 'Furnished Type', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(111, 14, 93, 'selectFurnishedType', 'Select furnished type', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(112, 14, 94, 'squareFeetArea', 'Square Feet Area', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(113, 14, 95, 'enterSquareFeetArea', 'Enter square feet area', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(114, 14, 96, 'ageOfProperty', 'Age Of Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(115, 14, 97, 'year', '(Year)', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(116, 14, 98, 'enterAgeOfProperty', 'Enter age of property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(117, 14, 99, 'description', 'Description', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(118, 14, 100, 'writeSomethingHere', 'Write something here...', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(119, 14, 101, 'price', 'Price', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(120, 14, 102, 'enterPrice', 'Enter price', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(121, 14, 103, 'priceDuration', 'Price Duration', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(122, 14, 104, 'selectPriceDuration', 'Select price duration', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(123, 14, 105, 'securityDeposit', 'Security Deposit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(124, 14, 106, 'enterSecurityDeposit', 'Enter Security Deposit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(125, 14, 107, 'brokerage', 'Brokerage', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(126, 14, 108, 'enterBrokerage', 'Enter Brokerage', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(127, 14, 109, 'maintenanceCharges', 'Maintenance Charges (Per Month)', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(128, 14, 110, 'enterMaintenanceCharge', 'Enter maintenance charge', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(129, 14, 111, 'address', 'Address', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(130, 14, 112, 'chooseOnMap', 'Choose On Map', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(131, 14, 113, 'country', 'Country', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(132, 14, 114, 'pleaseChooseAddressFromMap', 'Please choose address from map', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(133, 14, 115, 'state', 'State', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(134, 14, 116, 'city', 'City', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(135, 14, 117, 'addPicture', 'Add Picture', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(136, 14, 118, 'addMainPicture', 'Add Main Picture', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(137, 14, 119, 'addOtherPicture', 'Add Other Picture', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(138, 14, 120, 'addOtherPictures', 'Add Other Pictures', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(139, 14, 121, 'videoUrl', 'Video URL', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(140, 14, 122, 'priceDurationValue', 'Price Duration Value', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(141, 14, 123, 'enterVideoUrl', 'Enter video Url', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(142, 14, 124, 'premiumProperty', 'Premium Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(143, 14, 125, 'extraFacilities', 'Extra Facilities', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(144, 14, 126, 'pleaseAddAmenities', 'Please add Amenities', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(145, 14, 286, 'iWantTo', 'i want to', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(146, 14, 297, 'advertisementHistory', 'Advertisement History', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(147, 14, 298, 'addRequiredAmenityMessage', 'Please add required Amenities', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(148, 14, 301, 'updateProperty', 'Update Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(149, 14, 302, 'rentProperty', 'Rent property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(150, 14, 303, 'sellProperty', 'Sell property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(151, 14, 304, 'pgColivingProperty', 'PG\\/Co-living property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(152, 14, 328, 'propertyHasBeenSaveSuccessfully', 'Property has been save successfully', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(153, 14, 329, 'planHasExpired', 'Plan Has Expired', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(154, 14, 334, 'daily', 'Daily', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(155, 14, 337, 'monthly', 'Monthly', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(156, 14, 338, 'quarterly', 'Quarterly', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(157, 14, 339, 'yearly', 'Yearly', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(158, 15, 127, 'ageOfProperty', 'Age Of Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(159, 15, 128, 'year', '(Year)', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(160, 15, 129, 'forSell', 'For Sell', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(161, 15, 130, 'pgCoLiving', 'PG\\/Co-living', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(162, 15, 131, 'edit', 'Edit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(163, 15, 132, 'delete', 'Delete', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(164, 15, 133, 'deletePropertyMsg', 'Are you sure you want to Delete Property ?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(165, 15, 134, 'costOfLiving', 'Cost Of Living', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(166, 15, 135, 'securityDeposit', 'Security Deposit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(167, 15, 136, 'maintenanceCharges', 'Maintenance Charges (Per Month)', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(168, 15, 137, 'brokerage', 'Brokerage', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(169, 15, 138, 'totalExtraCost', 'Total Extra Cost', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(170, 15, 139, 'location', 'Location', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(171, 15, 140, 'viewOnMap', 'View on Map', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(172, 15, 141, 'gallery', 'Gallery', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(173, 15, 142, 'description', 'Description', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(174, 15, 143, 'property', 'Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(175, 15, 144, 'bhk', 'BHK', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(176, 15, 145, 'semiFurnished', 'Semi Furnished', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(177, 15, 146, 'unfurnished', 'Unfurnished', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(178, 15, 147, 'NearestByGoogle', 'Nearest places provided by google', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(179, 15, 269, 'fullyFurnished', 'Fully Furnished', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(180, 15, 320, 'tapToViewContactInfo', 'Tap to view contact info', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(181, 16, 148, 'favourite', 'Favorite', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(182, 16, 149, 'resultNotFound', 'Result Not Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(183, 17, 150, 'myProfile', 'My Profile', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(184, 17, 151, 'yourCurrentPlan', 'Your Current Plan', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(185, 17, 319, 'viewPropertyContactHistory', 'View Property Contact History', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(186, 17, 153, 'deleteAccountMessage', 'Are you sure you want to delete your account ?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(187, 17, 154, 'advertisement', 'Advertisement', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(188, 17, 155, 'contactInfo', 'Contact Info', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(189, 17, 156, 'myProperty', 'My Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(190, 17, 157, 'newsArticles', 'News & Articles', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(191, 17, 158, 'setting', 'Settings', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(192, 17, 159, 'aboutApp', 'About App', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(193, 17, 160, 'deleteAccount', 'Delete Account', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(194, 17, 161, 'delete', 'Delete', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(195, 17, 162, 'logOut', 'Logout', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(196, 17, 163, 'logoutMsg', 'Are you sure you want to logout from device?', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(197, 17, 270, 'subscription', 'Subscriptions', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(198, 18, 164, 'pay', 'Pay', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(199, 18, 165, 'failed', 'Failed', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(200, 18, 282, 'success', 'Success', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(201, 18, 287, 'paymentFailed', 'Payment Failed', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(202, 18, 291, 'payments', 'Payments', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(203, 18, 317, 'transactionSuccessful', 'Transaction Successful', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(204, 18, 318, 'transactionFailed', 'Transaction Failed', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(205, 18, 335, 'testPayment', 'Test Payment', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(206, 18, 336, 'payWithCard', 'Pay with Card', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(207, 19, 166, 'seenOn', 'Seen on', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(208, 19, 168, 'inquiryFor', 'Inquiry for', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(209, 20, 169, 'editProfile', 'Edit Profile', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(210, 20, 170, 'save', 'Save', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(211, 20, 171, 'firstName', 'First Name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(212, 20, 172, 'enterFirstName', 'Enter your first name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(213, 20, 173, 'lastName', 'Last Name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(214, 20, 174, 'enterLastName', 'Enter your last name', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(215, 20, 175, 'email', 'Email', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(216, 20, 176, 'enterEmail', 'Enter your email', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(217, 20, 177, 'phoneNumber', 'Phone Number', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(218, 20, 178, 'enterPhone', 'Phone Number', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(219, 20, 179, 'camera', 'Camera', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(220, 20, 180, 'chooseImage', 'Choose Image', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(221, 21, 181, 'contactInfoDetails', 'contact info details', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(222, 22, 182, 'tapToView', 'Tap to view', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(223, 23, 183, 'subscriptionPlans', 'Subscription Plans', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(224, 23, 184, 'active', 'Active', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(225, 23, 185, 'history', 'History', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(226, 23, 186, 'subscriptionMsg', 'You have not any subscription plans', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(227, 23, 187, 'cancelled', 'Cancelled', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(228, 23, 188, 'viewPlans', 'View Plans', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(229, 23, 189, 'yourPlanValid', 'Your plan valid', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(230, 23, 190, 'viewPropertyLimit', 'View property limit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(231, 23, 191, 'unlimited', 'Unlimited', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(232, 23, 192, 'addPropertyLimit', 'Add property limit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(233, 23, 284, 'to', 'to', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(234, 24, 200, 'aboutUs', 'About Us', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(235, 24, 201, 'followUs', 'Follow Us', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(236, 24, 296, 'mailto', 'mailto =>', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(237, 25, 202, 'advertisementProperties', 'Advertisement Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(238, 25, 203, 'resultNotFound', 'Result Not Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(239, 26, 204, 'extraFacilities', 'Extra Facilities', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(240, 27, 205, 'addProperties', 'Add Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(241, 28, 206, 'privacyPolicy', 'Privacy Policy', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(242, 29, 207, 'termsCondition', 'Terms & Conditions', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(243, 30, 208, 'congratulations', 'Congratulations!', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(244, 30, 209, 'yourPropertySubmittedSuccessfully', 'Your Property Submitted Successfully!', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(245, 30, 210, 'previewProperty', 'Preview Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(246, 30, 211, 'backToHome', 'Back to home', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(247, 31, 212, 'resultNotFound', 'Result Not Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(248, 33, 214, 'newsArticles', 'News & Articles', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(249, 34, 215, 'aboutApp', 'About App', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(250, 34, 216, 'privacyPolicy', 'Privacy Policy', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(251, 34, 217, 'termsCondition', 'Terms & Conditions', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(252, 34, 218, 'aboutUs', 'About Us', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(253, 35, 219, 'language', 'Select Language', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(254, 35, 220, 'appTheme', 'App Theme', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(255, 35, 221, 'setting', 'Settings', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(256, 35, 263, 'systemDefault', 'System Default', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(257, 36, 222, 'noFoundData', 'No Data Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(258, 37, 223, 'purchase', 'Purchase', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(259, 37, 224, 'pleaseSelectLimit', 'Please select at least one limit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(260, 37, 225, 'limit', 'limit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(261, 37, 226, 'addPropertyLimit', 'Add property limit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(262, 37, 227, 'contactInfoLimit', 'Add Contact info Limit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(263, 37, 228, 'addAdvertisementLimit', 'Add Advertisement Limit', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(264, 37, 292, 'limitExceeded', 'Limit Exceeded!', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(265, 37, 293, 'limitMsg', 'Extend your limit and keep growing with mighty eProperty. 🚀', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(266, 38, 229, 'myProperty', 'My Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(267, 38, 230, 'addNew', 'Add New', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(268, 38, 231, 'boostYourProperty', 'Boost Your Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(269, 38, 280, 'sell', 'Sell', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(270, 38, 281, 'rent', 'Rent', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(271, 38, 288, 'alreadyBoostedYourProperty', 'Already Boosted Your Property', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(272, 39, 232, 'selectPropertyType', 'Select Property Type', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(273, 40, 233, 'properties', 'Properties', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(274, 40, 234, 'resultNotFound', 'Result Not Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(275, 41, 235, 'propertyContactInfo', 'Property Contact Info', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(276, 42, 236, 'signIn', 'Sign In', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(277, 42, 237, 'mobileNumber', 'Mobile Number', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(278, 42, 238, 'enterYourMobileNumber', 'Enter Your Mobile Number', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(279, 43, 239, 'addPropertyHistory', 'Add Property History', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(280, 43, 240, 'advertisementHistor', 'Advertisement History', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(281, 44, 241, 'resultNotFound', 'Result Not Found', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(282, 45, 255, 'chooseLocation', 'Choose Location', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(283, 45, 256, 'searchAddress', 'Search Address', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(284, 45, 257, 'pleaseWait', 'Please Wait', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(285, 45, 258, 'confirmAddress', 'Confirm Address', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(286, 45, 259, 'somethingWentWrong', 'something went wrong', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(287, 45, 310, 'chooseLocation', 'Choose Location', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(288, 45, 311, 'searchLocation', 'Search Address', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(289, 45, 312, 'pleaseWait', 'Please Wait', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(290, 45, 313, 'confirmAddress', 'Confirm Address', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(291, 46, 242, 'language', 'Select Language', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(292, 47, 243, 'nearByProperty', 'Near By Property', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(293, 47, 244, 'resultNotFound', 'Result Not Found', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(294, 48, 245, 'checkoutNewsArticles', 'Checkout News & Articles', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(295, 49, 246, 'subscriptionPlans', 'Subscription Plans', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(296, 49, 247, 'subscribe', 'Subscribe', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(297, 49, 248, 'bePremiumGetUnlimitedAccess', 'Be Premium Get Unlimited Access', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(298, 49, 249, 'enjoyUnlimitedAccessWithoutAdsAndRestrictions', 'Enjoy Unlimited Access Without Ads And Restrictions', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(299, 49, 250, 'viewPropertyLimit', 'View property limit', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(300, 49, 251, 'unlimited', 'Unlimited', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(301, 49, 252, 'addPropertyLimit', 'Add property limit', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(302, 49, 253, 'advertisementLimit', 'Advertisement limit', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(303, 49, 254, 'noData', 'No Data', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(304, 49, 285, 'pleaseSelectPlantContinue', 'please select plan to continue', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(305, 50, 264, 'cancel', 'Cancel', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(306, 50, 272, 'individual', 'Individual', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(307, 50, 273, 'userNotFound', 'User Not Found', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(308, 50, 274, 'allowLocationPermission', 'Allow Location Permission', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(309, 50, 279, 'premium', 'Premium', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(310, 50, 299, 'enter', 'Enter', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(311, 51, 265, 'chooseTheme', 'Choose theme', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(312, 51, 275, 'light', 'Light', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(313, 51, 276, 'dark', 'Dark', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(314, 51, 294, 'paymentSuccessfullyDone', 'Payment successfully done!', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(315, 51, 295, 'paymentSuccessfullyMsg', 'Yippee 🥳, you ve been unlocked amazing features', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(316, 52, 289, 'boost', 'Boost', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(317, 52, 290, 'boostMsg', 'Are you sure you want to boost your property ?', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(318, 53, 321, 'thisFieldIsRequired', 'This field is required', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(319, 53, 323, 'owner', 'Owner', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(320, 53, 324, 'broker', 'Broker', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(321, 53, 325, 'builder', 'Builder', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(322, 53, 326, 'agent', 'Agent', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(323, 54, 327, 'pressBackAgainToExit', 'Press back again to exit', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(324, 55, 330, 'theProvidedPhoneNumberIsNotValid', 'The provided phone number is not valid', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(325, 55, 331, 'phoneVerificationDone', 'Phone Verification done', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(326, 55, 332, 'invalidPhoneNumber', 'invalid phone-number', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(327, 55, 333, 'codeSent', 'code sent', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(328, 23, 340, 'cancelSubscriptionMsg', 'Are you sure you want to cancel current subscription plan?', '2024-04-15 11:52:11', '2024-04-15 11:52:11'),
(329, 23, 341, 'cancelSubscription', 'Cancel Subscription', '2024-04-15 11:52:11', '2024-04-15 11:52:11'),
(330, 23, 342, 'cancelledOn', 'Cancelled on?', '2024-04-15 13:54:18', '2024-04-15 13:54:18'),
(331, 23, 343, 'paymentVia', 'Payment via', '2024-04-15 13:54:59', '2024-04-15 13:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `language_tables`
--

CREATE TABLE `language_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_name` varchar(255) DEFAULT NULL,
  `language_code` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `language_flag` varchar(255) DEFAULT NULL,
  `is_rtl` tinyint(4) DEFAULT 0,
  `is_default` tinyint(4) DEFAULT 0 COMMENT '0-no, 1-yes',
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language_version_details`
--

CREATE TABLE `language_version_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `default_language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `version_no` bigint(20) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_version_details`
--

INSERT INTO `language_version_details` (`id`, `default_language_id`, `version_no`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '2024-04-04 23:12:44', '2024-04-04 23:12:44');

-- --------------------------------------------------------


INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2024_03_01_022105_create_language_default_lists_table', 2),
(27, '2024_03_01_031149_create_language_tables_table', 2),
(28, '2024_03_01_033733_create_screens_table', 2),
(29, '2024_03_01_040938_create_language_keywords_table', 2),
(30, '2024_03_01_051223_create_language_contents_table', 2),
(31, '2024_03_01_090152_create_language_version_details_table', 2);

-- --------------------------------------------------------


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(76, 'screen', 'web', NULL, '2024-04-04 23:12:44', NULL),
(77, 'screen-list', 'web', 76, '2024-04-04 23:12:44', NULL),
(78, 'languagekeyword', 'web', NULL, '2024-04-04 23:12:44', NULL),
(79, 'languagekeyword-list', 'web', 78, '2024-04-04 23:12:44', NULL),
(80, 'languagekeyword-add', 'web', 78, '2024-04-04 23:12:44', NULL),
(81, 'languagekeyword-edit', 'web', 78, '2024-04-04 23:12:44', NULL),
(82, 'language', 'web', NULL, '2024-04-04 23:12:44', NULL),
(83, 'language-list', 'web', 82, '2024-04-04 23:12:44', NULL),
(84, 'language-add', 'web', 82, '2024-04-04 23:12:44', NULL),
(85, 'language-edit', 'web', 82, '2024-04-04 23:12:44', NULL),
(86, 'language-delete', 'web', 82, '2024-04-04 23:12:44', NULL),
(87, 'languagecontent', 'web', NULL, '2024-04-04 23:12:44', NULL),
(88, 'languagecontent-list', 'web', 87, '2024-04-04 23:12:44', NULL),
(89, 'bulkimport', 'web', NULL, '2024-04-04 23:12:44', NULL),
(90, 'bulkimport-list', 'web', 89, '2024-04-04 23:12:44', NULL),
(91, 'languagekeyword-delete', 'web', 78, '2024-04-04 23:12:44', NULL);

-- --------------------------------------------------------


INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `screenId` varchar(255) DEFAULT NULL,
  `screenName` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `screens`
--

INSERT INTO `screens` (`id`, `screenId`, `screenName`, `created_at`, `updated_at`) VALUES
(1, '1', 'Walkthrought', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(2, '3', 'SignUp Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(3, '4', 'OTP Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(4, '5', 'Home Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(5, '6', 'Notification Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(6, '7', 'ChatBot Empty Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(7, '8', 'Chatting Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(8, '9', 'No Internet Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(9, '10', 'Search Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(10, '11', 'Filter Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(11, '12', 'Search Result Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(12, '13', 'Category Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(13, '14', 'Add Property Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(14, '15', 'Property Detail Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(15, '16', 'Favourite Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(16, '17', 'Profile Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(17, '18', 'Payment Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(18, '19', 'View Property Contact History', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(19, '20', 'Edit Profile Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(20, '21', 'Property Contact History Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(21, '22', 'Slider Details Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(22, '23', 'Subscription Detail Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(23, '24', 'About Us Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(24, '25', 'Advertisement See All Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(25, '26', 'Amenity Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(26, '27', 'Dashboard Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(27, '28', 'Privacy Policy Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(28, '29', 'Terms Conditions Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(29, '30', 'Success Property Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(30, '31', 'Owner Furnished SeeAll Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(31, '33', 'News All Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(32, '34', 'Help Center Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(33, '35', 'Setting Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(34, '36', 'No DataScreen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(35, '37', 'Limit Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(36, '38', 'My Properties Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(37, '39', 'Select Property List Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(38, '40', 'See All Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(39, '41', 'Property Contact Info Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(40, '42', 'Login Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(41, '43', 'Add Property History Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(42, '44', 'Category Selected Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(43, '45', 'Google Map Screen', '2024-04-04 23:12:44', '2024-04-04 23:12:44'),
(44, '46', 'Language Screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(45, '47', 'Near By See All Screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(46, '48', 'News Details Screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(47, '49', 'Subscribe Screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(48, '50', 'Other Screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(49, '51', 'payment success screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(50, '52', 'boost screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(51, '53', 'constants screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(52, '54', 'constants screen', '2024-04-04 23:12:45', '2024-04-04 23:12:45'),
(53, '55', 'Auth Service Screen', '2024-04-11 01:36:39', '2024-04-11 01:36:39');

-- --------------------------------------------------------

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
-- Indexes for table `screens`
--
ALTER TABLE `screens`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `language_contents`
--
ALTER TABLE `language_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_default_lists`
--
ALTER TABLE `language_default_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_keywords`
--
ALTER TABLE `language_keywords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_tables`
--
ALTER TABLE `language_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language_version_details`
--
ALTER TABLE `language_version_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;


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
