-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: Aug 05, 2015 at 06:08 PM
=======
-- Generation Time: Jul 20, 2015 at 10:21 AM
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
<<<<<<< HEAD
-- Database: `50course`
=======
-- Database: `50course_new`
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60
--

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE IF NOT EXISTS `continents` (
  `code` char(2) NOT NULL COMMENT 'Continent code',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`code`, `name`) VALUES
('AF', 'Africa'),
('AN', 'Antarctica'),
('AS', 'Asia'),
('EU', 'Europe'),
('NA', 'North America'),
('OC', 'Oceania'),
('SA', 'South America');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `code` char(2) NOT NULL COMMENT 'Two-letter country code (ISO 3166-1 alpha-2)',
  `name` varchar(255) NOT NULL COMMENT 'English country name',
  `full_name` varchar(255) NOT NULL COMMENT 'Full English country name',
  `iso3` char(3) NOT NULL COMMENT 'Three-letter country code (ISO 3166-1 alpha-3)',
  `number` smallint(3) unsigned zerofill NOT NULL COMMENT 'Three-digit country number (ISO 3166-1 numeric)',
  `continent_code` char(2) NOT NULL,
<<<<<<< HEAD
  `currency_code` varchar(11) NOT NULL,
  `currency_symbol` text NOT NULL,
=======
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60
  PRIMARY KEY (`code`),
  KEY `continent_code` (`continent_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

<<<<<<< HEAD
INSERT INTO `countries` (`code`, `name`, `full_name`, `iso3`, `number`, `continent_code`, `currency_code`, `currency_symbol`) VALUES
('AD', 'Andorra', 'Principality of Andorra', 'AND', 020, 'EU', 'EUR', ''),
('AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', 784, 'AS', 'AED', ''),
('AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', 004, 'AS', 'AFN', ''),
('AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', 028, 'NA', 'XCD', ''),
('AI', 'Anguilla', 'Anguilla', 'AIA', 660, 'NA', 'XCD', ''),
('AL', 'Albania', 'Republic of Albania', 'ALB', 008, 'EU', 'ALL', ''),
('AM', 'Armenia', 'Republic of Armenia', 'ARM', 051, 'AS', 'AMD', ''),
('AO', 'Angola', 'Republic of Angola', 'AGO', 024, 'AF', 'AOA', ''),
('AQ', 'Antarctica', 'Antarctica (the territory South of 60 deg S)', 'ATA', 010, 'AN', 'XCD', ''),
('AR', 'Argentina', 'Argentine Republic', 'ARG', 032, 'SA', 'ARS', ''),
('AS', 'American Samoa', 'American Samoa', 'ASM', 016, 'OC', 'USD', ''),
('AT', 'Austria', 'Republic of Austria', 'AUT', 040, 'EU', 'EUR', ''),
('AU', 'Australia', 'Commonwealth of Australia', 'AUS', 036, 'OC', 'AUD', ''),
('AW', 'Aruba', 'Aruba', 'ABW', 533, 'NA', 'AWG', ''),
('AX', 'Åland Islands', 'Åland Islands', 'ALA', 248, 'EU', 'EUR', ''),
('AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', 031, 'AS', 'AZN', ''),
('BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', 070, 'EU', 'BAM', ''),
('BB', 'Barbados', 'Barbados', 'BRB', 052, 'NA', 'BBD', ''),
('BD', 'Bangladesh', 'People''s Republic of Bangladesh', 'BGD', 050, 'AS', 'BDT', ''),
('BE', 'Belgium', 'Kingdom of Belgium', 'BEL', 056, 'EU', 'EUR', ''),
('BF', 'Burkina Faso', 'Burkina Faso', 'BFA', 854, 'AF', 'XOF', ''),
('BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', 100, 'EU', 'BGN', ''),
('BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', 048, 'AS', 'BHD', ''),
('BI', 'Burundi', 'Republic of Burundi', 'BDI', 108, 'AF', 'BIF', ''),
('BJ', 'Benin', 'Republic of Benin', 'BEN', 204, 'AF', 'XOF', ''),
('BL', 'Saint Barthélemy', 'Saint Barthélemy', 'BLM', 652, 'NA', 'EUR', ''),
('BM', 'Bermuda', 'Bermuda', 'BMU', 060, 'NA', 'BMD', ''),
('BN', 'Brunei Darussalam', 'Brunei Darussalam', 'BRN', 096, 'AS', 'BND', ''),
('BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', 068, 'SA', 'BOB', ''),
('BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 'NA', 'USD', ''),
('BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', 076, 'SA', 'BRL', ''),
('BS', 'Bahamas', 'Commonwealth of the Bahamas', 'BHS', 044, 'NA', 'BSD', ''),
('BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', 064, 'AS', 'BTN', ''),
('BV', 'Bouvet Island (Bouvetøya)', 'Bouvet Island (Bouvetøya)', 'BVT', 074, 'AN', 'NOK', ''),
('BW', 'Botswana', 'Republic of Botswana', 'BWA', 072, 'AF', 'BWP', ''),
('BY', 'Belarus', 'Republic of Belarus', 'BLR', 112, 'EU', 'BYR', ''),
('BZ', 'Belize', 'Belize', 'BLZ', 084, 'NA', 'BZD', ''),
('CA', 'Canada', 'Canada', 'CAN', 124, 'NA', 'CAD', ''),
('CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', 166, 'AS', 'AUD', ''),
('CD', 'Congo', 'Democratic Republic of the Congo', 'COD', 180, 'AF', 'CDF', ''),
('CF', 'Central African Republic', 'Central African Republic', 'CAF', 140, 'AF', 'XAF', ''),
('CG', 'Congo', 'Republic of the Congo', 'COG', 178, 'AF', 'XAF', ''),
('CH', 'Switzerland', 'Swiss Confederation', 'CHE', 756, 'EU', 'CHF', ''),
('CI', 'Cote d''Ivoire', 'Republic of Cote d''Ivoire', 'CIV', 384, 'AF', 'XOF', ''),
('CK', 'Cook Islands', 'Cook Islands', 'COK', 184, 'OC', 'NZD', ''),
('CL', 'Chile', 'Republic of Chile', 'CHL', 152, 'SA', 'CLP', ''),
('CM', 'Cameroon', 'Republic of Cameroon', 'CMR', 120, 'AF', 'XAF', ''),
('CN', 'China', 'People''s Republic of China', 'CHN', 156, 'AS', 'CNY', ''),
('CO', 'Colombia', 'Republic of Colombia', 'COL', 170, 'SA', 'COP', ''),
('CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', 188, 'NA', 'CRC', ''),
('CU', 'Cuba', 'Republic of Cuba', 'CUB', 192, 'NA', 'CUP', ''),
('CV', 'Cabo Verde', 'Republic of Cabo Verde', 'CPV', 132, 'AF', 'CVE', ''),
('CW', 'Curaçao', 'Curaçao', 'CUW', 531, 'NA', 'ANG', ''),
('CX', 'Christmas Island', 'Christmas Island', 'CXR', 162, 'AS', 'AUD', ''),
('CY', 'Cyprus', 'Republic of Cyprus', 'CYP', 196, 'AS', 'EUR', ''),
('CZ', 'Czech Republic', 'Czech Republic', 'CZE', 203, 'EU', 'CZK', ''),
('DE', 'Germany', 'Federal Republic of Germany', 'DEU', 276, 'EU', 'EUR', ''),
('DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', 262, 'AF', 'DJF', ''),
('DK', 'Denmark', 'Kingdom of Denmark', 'DNK', 208, 'EU', 'DKK', ''),
('DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', 212, 'NA', 'XCD', ''),
('DO', 'Dominican Republic', 'Dominican Republic', 'DOM', 214, 'NA', 'DOP', ''),
('DZ', 'Algeria', 'People''s Democratic Republic of Algeria', 'DZA', 012, 'AF', 'DZD', ''),
('EC', 'Ecuador', 'Republic of Ecuador', 'ECU', 218, 'SA', 'ECS', ''),
('EE', 'Estonia', 'Republic of Estonia', 'EST', 233, 'EU', 'EEK', ''),
('EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', 818, 'AF', 'EGP', ''),
('EH', 'Western Sahara', 'Western Sahara', 'ESH', 732, 'AF', 'MAD', ''),
('ER', 'Eritrea', 'State of Eritrea', 'ERI', 232, 'AF', 'ERN', ''),
('ES', 'Spain', 'Kingdom of Spain', 'ESP', 724, 'EU', 'EUR', ''),
('ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', 231, 'AF', 'ETB', ''),
('FI', 'Finland', 'Republic of Finland', 'FIN', 246, 'EU', 'EUR', ''),
('FJ', 'Fiji', 'Republic of Fiji', 'FJI', 242, 'OC', 'FJD', ''),
('FK', 'Falkland Islands (Malvinas)', 'Falkland Islands (Malvinas)', 'FLK', 238, 'SA', 'FKP', ''),
('FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', 583, 'OC', 'USD', ''),
('FO', 'Faroe Islands', 'Faroe Islands', 'FRO', 234, 'EU', 'DKK', ''),
('FR', 'France', 'French Republic', 'FRA', 250, 'EU', 'EUR', ''),
('GA', 'Gabon', 'Gabonese Republic', 'GAB', 266, 'AF', 'XAF', ''),
('GB', 'United Kingdom of Great Britain & Northern Ireland', 'United Kingdom of Great Britain & Northern Ireland', 'GBR', 826, 'EU', 'GBP', ''),
('GD', 'Grenada', 'Grenada', 'GRD', 308, 'NA', 'XCD', ''),
('GE', 'Georgia', 'Georgia', 'GEO', 268, 'AS', 'GEL', ''),
('GF', 'French Guiana', 'French Guiana', 'GUF', 254, 'SA', 'EUR', ''),
('GG', 'Guernsey', 'Bailiwick of Guernsey', 'GGY', 831, 'EU', 'GGP', ''),
('GH', 'Ghana', 'Republic of Ghana', 'GHA', 288, 'AF', 'GHC', ''),
('GI', 'Gibraltar', 'Gibraltar', 'GIB', 292, 'EU', 'GIP', ''),
('GL', 'Greenland', 'Greenland', 'GRL', 304, 'NA', 'DKK', ''),
('GM', 'Gambia', 'Republic of the Gambia', 'GMB', 270, 'AF', 'GMD', ''),
('GN', 'Guinea', 'Republic of Guinea', 'GIN', 324, 'AF', 'GNF', ''),
('GP', 'Guadeloupe', 'Guadeloupe', 'GLP', 312, 'NA', 'EUR', ''),
('GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', 226, 'AF', 'XAF', ''),
('GR', 'Greece', 'Hellenic Republic Greece', 'GRC', 300, 'EU', 'EUR', ''),
('GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', 239, 'AN', 'GBP', ''),
('GT', 'Guatemala', 'Republic of Guatemala', 'GTM', 320, 'NA', 'GTQ', ''),
('GU', 'Guam', 'Guam', 'GUM', 316, 'OC', 'USD', ''),
('GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', 624, 'AF', 'GWP', ''),
('GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', 328, 'SA', 'GYD', ''),
('HK', 'Hong Kong', 'Hong Kong Special Administrative Region of China', 'HKG', 344, 'AS', 'HKD', ''),
('HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', 334, 'AN', 'AUD', ''),
('HN', 'Honduras', 'Republic of Honduras', 'HND', 340, 'NA', 'HNL', ''),
('HR', 'Croatia', 'Republic of Croatia', 'HRV', 191, 'EU', 'HRK', ''),
('HT', 'Haiti', 'Republic of Haiti', 'HTI', 332, 'NA', 'HTG', ''),
('HU', 'Hungary', 'Hungary', 'HUN', 348, 'EU', 'HUF', ''),
('ID', 'Indonesia', 'Republic of Indonesia', 'IDN', 360, 'AS', 'IDR', ''),
('IE', 'Ireland', 'Ireland', 'IRL', 372, 'EU', 'EUR', ''),
('IL', 'Israel', 'State of Israel', 'ISR', 376, 'AS', 'ILS', ''),
('IM', 'Isle of Man', 'Isle of Man', 'IMN', 833, 'EU', 'IMP', ''),
('IN', 'India', 'Republic of India', 'IND', 356, 'AS', 'INR', ''),
('IO', 'British Indian Ocean Territory (Chagos Archipelago)', 'British Indian Ocean Territory (Chagos Archipelago)', 'IOT', 086, 'AS', 'USD', ''),
('IQ', 'Iraq', 'Republic of Iraq', 'IRQ', 368, 'AS', 'IQD', ''),
('IR', 'Iran', 'Islamic Republic of Iran', 'IRN', 364, 'AS', 'IRR', ''),
('IS', 'Iceland', 'Republic of Iceland', 'ISL', 352, 'EU', 'ISK', ''),
('IT', 'Italy', 'Italian Republic', 'ITA', 380, 'EU', 'EUR', ''),
('JE', 'Jersey', 'Bailiwick of Jersey', 'JEY', 832, 'EU', 'JEP', ''),
('JM', 'Jamaica', 'Jamaica', 'JAM', 388, 'NA', 'JMD', ''),
('JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', 400, 'AS', 'JOD', ''),
('JP', 'Japan', 'Japan', 'JPN', 392, 'AS', 'JPY', ''),
('KE', 'Kenya', 'Republic of Kenya', 'KEN', 404, 'AF', 'KES', ''),
('KG', 'Kyrgyz Republic', 'Kyrgyz Republic', 'KGZ', 417, 'AS', 'KGS', ''),
('KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', 116, 'AS', 'KHR', ''),
('KI', 'Kiribati', 'Republic of Kiribati', 'KIR', 296, 'OC', 'AUD', ''),
('KM', 'Comoros', 'Union of the Comoros', 'COM', 174, 'AF', 'KMF', ''),
('KN', 'Saint Kitts and Nevis', 'Federation of Saint Kitts and Nevis', 'KNA', 659, 'NA', 'XCD', ''),
('KP', 'Korea', 'Democratic People''s Republic of Korea', 'PRK', 408, 'AS', 'KPW', ''),
('KR', 'Korea', 'Republic of Korea', 'KOR', 410, 'AS', 'KRW', ''),
('KW', 'Kuwait', 'State of Kuwait', 'KWT', 414, 'AS', 'KWD', ''),
('KY', 'Cayman Islands', 'Cayman Islands', 'CYM', 136, 'NA', 'KYD', ''),
('KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', 398, 'AS', 'KZT', ''),
('LA', 'Lao People''s Democratic Republic', 'Lao People''s Democratic Republic', 'LAO', 418, 'AS', 'LAK', ''),
('LB', 'Lebanon', 'Lebanese Republic', 'LBN', 422, 'AS', 'LBP', ''),
('LC', 'Saint Lucia', 'Saint Lucia', 'LCA', 662, 'NA', 'XCD', ''),
('LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', 438, 'EU', 'CHF', ''),
('LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', 144, 'AS', 'LKR', ''),
('LR', 'Liberia', 'Republic of Liberia', 'LBR', 430, 'AF', 'LRD', ''),
('LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', 426, 'AF', 'LSL', ''),
('LT', 'Lithuania', 'Republic of Lithuania', 'LTU', 440, 'EU', 'LTL', ''),
('LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', 442, 'EU', 'EUR', ''),
('LV', 'Latvia', 'Republic of Latvia', 'LVA', 428, 'EU', 'LVL', ''),
('LY', 'Libya', 'Libya', 'LBY', 434, 'AF', 'LYD', ''),
('MA', 'Morocco', 'Kingdom of Morocco', 'MAR', 504, 'AF', 'MAD', ''),
('MC', 'Monaco', 'Principality of Monaco', 'MCO', 492, 'EU', 'EUR', ''),
('MD', 'Moldova', 'Republic of Moldova', 'MDA', 498, 'EU', 'MDL', ''),
('ME', 'Montenegro', 'Montenegro', 'MNE', 499, 'EU', 'EUR', ''),
('MF', 'Saint Martin', 'Saint Martin (French part)', 'MAF', 663, 'NA', 'ANG', ''),
('MG', 'Madagascar', 'Republic of Madagascar', 'MDG', 450, 'AF', 'MGF', ''),
('MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', 584, 'OC', 'USD', ''),
('MK', 'Macedonia', 'Republic of Macedonia', 'MKD', 807, 'EU', 'MKD', ''),
('ML', 'Mali', 'Republic of Mali', 'MLI', 466, 'AF', 'XOF', ''),
('MM', 'Myanmar', 'Republic of the Union of Myanmar', 'MMR', 104, 'AS', 'MMK', ''),
('MN', 'Mongolia', 'Mongolia', 'MNG', 496, 'AS', 'MNT', ''),
('MO', 'Macao', 'Macao Special Administrative Region of China', 'MAC', 446, 'AS', 'MOP', ''),
('MP', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', 'MNP', 580, 'OC', 'USD', ''),
('MQ', 'Martinique', 'Martinique', 'MTQ', 474, 'NA', 'EUR', ''),
('MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', 478, 'AF', 'MRO', ''),
('MS', 'Montserrat', 'Montserrat', 'MSR', 500, 'NA', 'XCD', ''),
('MT', 'Malta', 'Republic of Malta', 'MLT', 470, 'EU', 'EUR', ''),
('MU', 'Mauritius', 'Republic of Mauritius', 'MUS', 480, 'AF', 'MUR', ''),
('MV', 'Maldives', 'Republic of Maldives', 'MDV', 462, 'AS', 'MVR', ''),
('MW', 'Malawi', 'Republic of Malawi', 'MWI', 454, 'AF', 'MWK', ''),
('MX', 'Mexico', 'United Mexican States', 'MEX', 484, 'NA', 'MXN', ''),
('MY', 'Malaysia', 'Malaysia', 'MYS', 458, 'AS', 'MYR', ''),
('MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', 508, 'AF', 'MZN', ''),
('NA', 'Namibia', 'Republic of Namibia', 'NAM', 516, 'AF', 'NAD', ''),
('NC', 'New Caledonia', 'New Caledonia', 'NCL', 540, 'OC', 'XPF', ''),
('NE', 'Niger', 'Republic of Niger', 'NER', 562, 'AF', 'XOF', ''),
('NF', 'Norfolk Island', 'Norfolk Island', 'NFK', 574, 'OC', 'AUD', ''),
('NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', 566, 'AF', 'NGN', ''),
('NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', 558, 'NA', 'NIO', ''),
('NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', 528, 'EU', 'ANG', ''),
('NO', 'Norway', 'Kingdom of Norway', 'NOR', 578, 'EU', 'NOK', ''),
('NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', 524, 'AS', 'NPR', ''),
('NR', 'Nauru', 'Republic of Nauru', 'NRU', 520, 'OC', 'AUD', ''),
('NU', 'Niue', 'Niue', 'NIU', 570, 'OC', 'NZD', ''),
('NZ', 'New Zealand', 'New Zealand', 'NZL', 554, 'OC', 'NZD', ''),
('OM', 'Oman', 'Sultanate of Oman', 'OMN', 512, 'AS', 'OMR', ''),
('PA', 'Panama', 'Republic of Panama', 'PAN', 591, 'NA', 'PAB', ''),
('PE', 'Peru', 'Republic of Peru', 'PER', 604, 'SA', 'PEN', ''),
('PF', 'French Polynesia', 'French Polynesia', 'PYF', 258, 'OC', 'EUR', ''),
('PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', 598, 'OC', 'PGK', ''),
('PH', 'Philippines', 'Republic of the Philippines', 'PHL', 608, 'AS', 'PHP', ''),
('PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', 586, 'AS', 'PKR', ''),
('PL', 'Poland', 'Republic of Poland', 'POL', 616, 'EU', 'PLN', ''),
('PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', 666, 'NA', 'EUR', ''),
('PN', 'Pitcairn Islands', 'Pitcairn Islands', 'PCN', 612, 'OC', 'NZD', ''),
('PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', 630, 'NA', 'USD', ''),
('PS', 'Palestine', 'State of Palestine', 'PSE', 275, 'AS', 'EGP', ''),
('PT', 'Portugal', 'Portuguese Republic', 'PRT', 620, 'EU', 'EUR', ''),
('PW', 'Palau', 'Republic of Palau', 'PLW', 585, 'OC', 'USD', ''),
('PY', 'Paraguay', 'Republic of Paraguay', 'PRY', 600, 'SA', 'PYG', ''),
('QA', 'Qatar', 'State of Qatar', 'QAT', 634, 'AS', 'QAR', ''),
('RE', 'Réunion', 'Réunion', 'REU', 638, 'AF', 'EUR', ''),
('RO', 'Romania', 'Romania', 'ROU', 642, 'EU', 'RON', ''),
('RS', 'Serbia', 'Republic of Serbia', 'SRB', 688, 'EU', 'RSD', ''),
('RU', 'Russian Federation', 'Russian Federation', 'RUS', 643, 'EU', 'RUB', ''),
('RW', 'Rwanda', 'Republic of Rwanda', 'RWA', 646, 'AF', 'RWF', ''),
('SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', 682, 'AS', 'SAR', ''),
('SB', 'Solomon Islands', 'Solomon Islands', 'SLB', 090, 'OC', 'SBD', ''),
('SC', 'Seychelles', 'Republic of Seychelles', 'SYC', 690, 'AF', 'SCR', ''),
('SD', 'Sudan', 'Republic of Sudan', 'SDN', 729, 'AF', 'SDG', ''),
('SE', 'Sweden', 'Kingdom of Sweden', 'SWE', 752, 'EU', 'SEK', ''),
('SG', 'Singapore', 'Republic of Singapore', 'SGP', 702, 'AS', 'SGD', ''),
('SH', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', 654, 'AF', 'SHP', ''),
('SI', 'Slovenia', 'Republic of Slovenia', 'SVN', 705, 'EU', 'EUR', ''),
('SJ', 'Svalbard & Jan Mayen Islands', 'Svalbard & Jan Mayen Islands', 'SJM', 744, 'EU', 'NOK', ''),
('SK', 'Slovakia (Slovak Republic)', 'Slovakia (Slovak Republic)', 'SVK', 703, 'EU', 'EUR', ''),
('SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', 694, 'AF', 'SLL', ''),
('SM', 'San Marino', 'Republic of San Marino', 'SMR', 674, 'EU', 'EUR', ''),
('SN', 'Senegal', 'Republic of Senegal', 'SEN', 686, 'AF', 'XOF', ''),
('SO', 'Somalia', 'Federal Republic of Somalia', 'SOM', 706, 'AF', 'SOS', ''),
('SR', 'Suriname', 'Republic of Suriname', 'SUR', 740, 'SA', 'SRD', ''),
('SS', 'South Sudan', 'Republic of South Sudan', 'SSD', 728, 'AF', 'SSP', ''),
('ST', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe', 'STP', 678, 'AF', 'STD', ''),
('SV', 'El Salvador', 'Republic of El Salvador', 'SLV', 222, 'NA', 'SVC', ''),
('SX', 'Sint Maarten (Dutch part)', 'Sint Maarten (Dutch part)', 'SXM', 534, 'NA', 'ANG', ''),
('SY', 'Syrian Arab Republic', 'Syrian Arab Republic', 'SYR', 760, 'AS', 'SYP', ''),
('SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', 748, 'AF', 'SZL', ''),
('TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', 796, 'NA', 'USD', ''),
('TD', 'Chad', 'Republic of Chad', 'TCD', 148, 'AF', 'XAF', ''),
('TF', 'French Southern Territories', 'French Southern Territories', 'ATF', 260, 'AN', 'EUR', ''),
('TG', 'Togo', 'Togolese Republic', 'TGO', 768, 'AF', 'XOF', ''),
('TH', 'Thailand', 'Kingdom of Thailand', 'THA', 764, 'AS', 'THB', ''),
('TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', 762, 'AS', 'TJS', ''),
('TK', 'Tokelau', 'Tokelau', 'TKL', 772, 'OC', 'NZD', ''),
('TL', 'Timor-Leste', 'Democratic Republic of Timor-Leste', 'TLS', 626, 'AS', 'USD', ''),
('TM', 'Turkmenistan', 'Turkmenistan', 'TKM', 795, 'AS', 'TMT', ''),
('TN', 'Tunisia', 'Tunisian Republic', 'TUN', 788, 'AF', 'TND', ''),
('TO', 'Tonga', 'Kingdom of Tonga', 'TON', 776, 'OC', 'TOP', ''),
('TR', 'Turkey', 'Republic of Turkey', 'TUR', 792, 'AS', 'TRL', ''),
('TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', 780, 'NA', 'TTD', ''),
('TV', 'Tuvalu', 'Tuvalu', 'TUV', 798, 'OC', 'TVD', ''),
('TW', 'Taiwan', 'Taiwan, Province of China', 'TWN', 158, 'AS', 'TWD', ''),
('TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', 834, 'AF', 'TZS', ''),
('UA', 'Ukraine', 'Ukraine', 'UKR', 804, 'EU', 'UAH', ''),
('UG', 'Uganda', 'Republic of Uganda', 'UGA', 800, 'AF', 'UGX', ''),
('UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', 581, 'OC', 'USD', ''),
('US', 'United States of America', 'United States of America', 'USA', 840, 'NA', 'USD', ''),
('UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', 858, 'SA', 'UYU', ''),
('UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', 860, 'AS', 'UZS', ''),
('VA', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'VAT', 336, 'EU', 'EUR', ''),
('VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', 670, 'NA', 'XCD', ''),
('VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', 862, 'SA', 'VEF', ''),
('VG', 'British Virgin Islands', 'British Virgin Islands', 'VGB', 092, 'NA', 'USD', ''),
('VI', 'United States Virgin Islands', 'United States Virgin Islands', 'VIR', 850, 'NA', 'USD', ''),
('VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', 704, 'AS', 'VND', ''),
('VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', 548, 'OC', 'VUV', ''),
('WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', 876, 'OC', 'XPF', ''),
('WS', 'Samoa', 'Independent State of Samoa', 'WSM', 882, 'OC', 'WST', ''),
('YE', 'Yemen', 'Yemen', 'YEM', 887, 'AS', 'YER', ''),
('YT', 'Mayotte', 'Mayotte', 'MYT', 175, 'AF', 'EUR', ''),
('ZA', 'South Africa', 'Republic of South Africa', 'ZAF', 710, 'AF', 'ZAR', ''),
('ZM', 'Zambia', 'Republic of Zambia', 'ZMB', 894, 'AF', 'ZMK', ''),
('ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', 716, 'AF', 'ZWD', '');
=======
INSERT INTO `countries` (`code`, `name`, `full_name`, `iso3`, `number`, `continent_code`) VALUES
('AD', 'Andorra', 'Principality of Andorra', 'AND', 020, 'EU'),
('AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', 784, 'AS'),
('AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', 004, 'AS'),
('AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', 028, 'NA'),
('AI', 'Anguilla', 'Anguilla', 'AIA', 660, 'NA'),
('AL', 'Albania', 'Republic of Albania', 'ALB', 008, 'EU'),
('AM', 'Armenia', 'Republic of Armenia', 'ARM', 051, 'AS'),
('AO', 'Angola', 'Republic of Angola', 'AGO', 024, 'AF'),
('AQ', 'Antarctica', 'Antarctica (the territory South of 60 deg S)', 'ATA', 010, 'AN'),
('AR', 'Argentina', 'Argentine Republic', 'ARG', 032, 'SA'),
('AS', 'American Samoa', 'American Samoa', 'ASM', 016, 'OC'),
('AT', 'Austria', 'Republic of Austria', 'AUT', 040, 'EU'),
('AU', 'Australia', 'Commonwealth of Australia', 'AUS', 036, 'OC'),
('AW', 'Aruba', 'Aruba', 'ABW', 533, 'NA'),
('AX', 'Åland Islands', 'Åland Islands', 'ALA', 248, 'EU'),
('AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', 031, 'AS'),
('BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', 070, 'EU'),
('BB', 'Barbados', 'Barbados', 'BRB', 052, 'NA'),
('BD', 'Bangladesh', 'People''s Republic of Bangladesh', 'BGD', 050, 'AS'),
('BE', 'Belgium', 'Kingdom of Belgium', 'BEL', 056, 'EU'),
('BF', 'Burkina Faso', 'Burkina Faso', 'BFA', 854, 'AF'),
('BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', 100, 'EU'),
('BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', 048, 'AS'),
('BI', 'Burundi', 'Republic of Burundi', 'BDI', 108, 'AF'),
('BJ', 'Benin', 'Republic of Benin', 'BEN', 204, 'AF'),
('BL', 'Saint Barthélemy', 'Saint Barthélemy', 'BLM', 652, 'NA'),
('BM', 'Bermuda', 'Bermuda', 'BMU', 060, 'NA'),
('BN', 'Brunei Darussalam', 'Brunei Darussalam', 'BRN', 096, 'AS'),
('BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', 068, 'SA'),
('BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', 535, 'NA'),
('BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', 076, 'SA'),
('BS', 'Bahamas', 'Commonwealth of the Bahamas', 'BHS', 044, 'NA'),
('BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', 064, 'AS'),
('BV', 'Bouvet Island (Bouvetøya)', 'Bouvet Island (Bouvetøya)', 'BVT', 074, 'AN'),
('BW', 'Botswana', 'Republic of Botswana', 'BWA', 072, 'AF'),
('BY', 'Belarus', 'Republic of Belarus', 'BLR', 112, 'EU'),
('BZ', 'Belize', 'Belize', 'BLZ', 084, 'NA'),
('CA', 'Canada', 'Canada', 'CAN', 124, 'NA'),
('CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', 166, 'AS'),
('CD', 'Congo', 'Democratic Republic of the Congo', 'COD', 180, 'AF'),
('CF', 'Central African Republic', 'Central African Republic', 'CAF', 140, 'AF'),
('CG', 'Congo', 'Republic of the Congo', 'COG', 178, 'AF'),
('CH', 'Switzerland', 'Swiss Confederation', 'CHE', 756, 'EU'),
('CI', 'Cote d''Ivoire', 'Republic of Cote d''Ivoire', 'CIV', 384, 'AF'),
('CK', 'Cook Islands', 'Cook Islands', 'COK', 184, 'OC'),
('CL', 'Chile', 'Republic of Chile', 'CHL', 152, 'SA'),
('CM', 'Cameroon', 'Republic of Cameroon', 'CMR', 120, 'AF'),
('CN', 'China', 'People''s Republic of China', 'CHN', 156, 'AS'),
('CO', 'Colombia', 'Republic of Colombia', 'COL', 170, 'SA'),
('CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', 188, 'NA'),
('CU', 'Cuba', 'Republic of Cuba', 'CUB', 192, 'NA'),
('CV', 'Cabo Verde', 'Republic of Cabo Verde', 'CPV', 132, 'AF'),
('CW', 'Curaçao', 'Curaçao', 'CUW', 531, 'NA'),
('CX', 'Christmas Island', 'Christmas Island', 'CXR', 162, 'AS'),
('CY', 'Cyprus', 'Republic of Cyprus', 'CYP', 196, 'AS'),
('CZ', 'Czech Republic', 'Czech Republic', 'CZE', 203, 'EU'),
('DE', 'Germany', 'Federal Republic of Germany', 'DEU', 276, 'EU'),
('DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', 262, 'AF'),
('DK', 'Denmark', 'Kingdom of Denmark', 'DNK', 208, 'EU'),
('DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', 212, 'NA'),
('DO', 'Dominican Republic', 'Dominican Republic', 'DOM', 214, 'NA'),
('DZ', 'Algeria', 'People''s Democratic Republic of Algeria', 'DZA', 012, 'AF'),
('EC', 'Ecuador', 'Republic of Ecuador', 'ECU', 218, 'SA'),
('EE', 'Estonia', 'Republic of Estonia', 'EST', 233, 'EU'),
('EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', 818, 'AF'),
('EH', 'Western Sahara', 'Western Sahara', 'ESH', 732, 'AF'),
('ER', 'Eritrea', 'State of Eritrea', 'ERI', 232, 'AF'),
('ES', 'Spain', 'Kingdom of Spain', 'ESP', 724, 'EU'),
('ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', 231, 'AF'),
('FI', 'Finland', 'Republic of Finland', 'FIN', 246, 'EU'),
('FJ', 'Fiji', 'Republic of Fiji', 'FJI', 242, 'OC'),
('FK', 'Falkland Islands (Malvinas)', 'Falkland Islands (Malvinas)', 'FLK', 238, 'SA'),
('FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', 583, 'OC'),
('FO', 'Faroe Islands', 'Faroe Islands', 'FRO', 234, 'EU'),
('FR', 'France', 'French Republic', 'FRA', 250, 'EU'),
('GA', 'Gabon', 'Gabonese Republic', 'GAB', 266, 'AF'),
('GB', 'United Kingdom of Great Britain & Northern Ireland', 'United Kingdom of Great Britain & Northern Ireland', 'GBR', 826, 'EU'),
('GD', 'Grenada', 'Grenada', 'GRD', 308, 'NA'),
('GE', 'Georgia', 'Georgia', 'GEO', 268, 'AS'),
('GF', 'French Guiana', 'French Guiana', 'GUF', 254, 'SA'),
('GG', 'Guernsey', 'Bailiwick of Guernsey', 'GGY', 831, 'EU'),
('GH', 'Ghana', 'Republic of Ghana', 'GHA', 288, 'AF'),
('GI', 'Gibraltar', 'Gibraltar', 'GIB', 292, 'EU'),
('GL', 'Greenland', 'Greenland', 'GRL', 304, 'NA'),
('GM', 'Gambia', 'Republic of the Gambia', 'GMB', 270, 'AF'),
('GN', 'Guinea', 'Republic of Guinea', 'GIN', 324, 'AF'),
('GP', 'Guadeloupe', 'Guadeloupe', 'GLP', 312, 'NA'),
('GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', 226, 'AF'),
('GR', 'Greece', 'Hellenic Republic Greece', 'GRC', 300, 'EU'),
('GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', 239, 'AN'),
('GT', 'Guatemala', 'Republic of Guatemala', 'GTM', 320, 'NA'),
('GU', 'Guam', 'Guam', 'GUM', 316, 'OC'),
('GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', 624, 'AF'),
('GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', 328, 'SA'),
('HK', 'Hong Kong', 'Hong Kong Special Administrative Region of China', 'HKG', 344, 'AS'),
('HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', 334, 'AN'),
('HN', 'Honduras', 'Republic of Honduras', 'HND', 340, 'NA'),
('HR', 'Croatia', 'Republic of Croatia', 'HRV', 191, 'EU'),
('HT', 'Haiti', 'Republic of Haiti', 'HTI', 332, 'NA'),
('HU', 'Hungary', 'Hungary', 'HUN', 348, 'EU'),
('ID', 'Indonesia', 'Republic of Indonesia', 'IDN', 360, 'AS'),
('IE', 'Ireland', 'Ireland', 'IRL', 372, 'EU'),
('IL', 'Israel', 'State of Israel', 'ISR', 376, 'AS'),
('IM', 'Isle of Man', 'Isle of Man', 'IMN', 833, 'EU'),
('IN', 'India', 'Republic of India', 'IND', 356, 'AS'),
('IO', 'British Indian Ocean Territory (Chagos Archipelago)', 'British Indian Ocean Territory (Chagos Archipelago)', 'IOT', 086, 'AS'),
('IQ', 'Iraq', 'Republic of Iraq', 'IRQ', 368, 'AS'),
('IR', 'Iran', 'Islamic Republic of Iran', 'IRN', 364, 'AS'),
('IS', 'Iceland', 'Republic of Iceland', 'ISL', 352, 'EU'),
('IT', 'Italy', 'Italian Republic', 'ITA', 380, 'EU'),
('JE', 'Jersey', 'Bailiwick of Jersey', 'JEY', 832, 'EU'),
('JM', 'Jamaica', 'Jamaica', 'JAM', 388, 'NA'),
('JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', 400, 'AS'),
('JP', 'Japan', 'Japan', 'JPN', 392, 'AS'),
('KE', 'Kenya', 'Republic of Kenya', 'KEN', 404, 'AF'),
('KG', 'Kyrgyz Republic', 'Kyrgyz Republic', 'KGZ', 417, 'AS'),
('KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', 116, 'AS'),
('KI', 'Kiribati', 'Republic of Kiribati', 'KIR', 296, 'OC'),
('KM', 'Comoros', 'Union of the Comoros', 'COM', 174, 'AF'),
('KN', 'Saint Kitts and Nevis', 'Federation of Saint Kitts and Nevis', 'KNA', 659, 'NA'),
('KP', 'Korea', 'Democratic People''s Republic of Korea', 'PRK', 408, 'AS'),
('KR', 'Korea', 'Republic of Korea', 'KOR', 410, 'AS'),
('KW', 'Kuwait', 'State of Kuwait', 'KWT', 414, 'AS'),
('KY', 'Cayman Islands', 'Cayman Islands', 'CYM', 136, 'NA'),
('KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', 398, 'AS'),
('LA', 'Lao People''s Democratic Republic', 'Lao People''s Democratic Republic', 'LAO', 418, 'AS'),
('LB', 'Lebanon', 'Lebanese Republic', 'LBN', 422, 'AS'),
('LC', 'Saint Lucia', 'Saint Lucia', 'LCA', 662, 'NA'),
('LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', 438, 'EU'),
('LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', 144, 'AS'),
('LR', 'Liberia', 'Republic of Liberia', 'LBR', 430, 'AF'),
('LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', 426, 'AF'),
('LT', 'Lithuania', 'Republic of Lithuania', 'LTU', 440, 'EU'),
('LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', 442, 'EU'),
('LV', 'Latvia', 'Republic of Latvia', 'LVA', 428, 'EU'),
('LY', 'Libya', 'Libya', 'LBY', 434, 'AF'),
('MA', 'Morocco', 'Kingdom of Morocco', 'MAR', 504, 'AF'),
('MC', 'Monaco', 'Principality of Monaco', 'MCO', 492, 'EU'),
('MD', 'Moldova', 'Republic of Moldova', 'MDA', 498, 'EU'),
('ME', 'Montenegro', 'Montenegro', 'MNE', 499, 'EU'),
('MF', 'Saint Martin', 'Saint Martin (French part)', 'MAF', 663, 'NA'),
('MG', 'Madagascar', 'Republic of Madagascar', 'MDG', 450, 'AF'),
('MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', 584, 'OC'),
('MK', 'Macedonia', 'Republic of Macedonia', 'MKD', 807, 'EU'),
('ML', 'Mali', 'Republic of Mali', 'MLI', 466, 'AF'),
('MM', 'Myanmar', 'Republic of the Union of Myanmar', 'MMR', 104, 'AS'),
('MN', 'Mongolia', 'Mongolia', 'MNG', 496, 'AS'),
('MO', 'Macao', 'Macao Special Administrative Region of China', 'MAC', 446, 'AS'),
('MP', 'Northern Mariana Islands', 'Commonwealth of the Northern Mariana Islands', 'MNP', 580, 'OC'),
('MQ', 'Martinique', 'Martinique', 'MTQ', 474, 'NA'),
('MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', 478, 'AF'),
('MS', 'Montserrat', 'Montserrat', 'MSR', 500, 'NA'),
('MT', 'Malta', 'Republic of Malta', 'MLT', 470, 'EU'),
('MU', 'Mauritius', 'Republic of Mauritius', 'MUS', 480, 'AF'),
('MV', 'Maldives', 'Republic of Maldives', 'MDV', 462, 'AS'),
('MW', 'Malawi', 'Republic of Malawi', 'MWI', 454, 'AF'),
('MX', 'Mexico', 'United Mexican States', 'MEX', 484, 'NA'),
('MY', 'Malaysia', 'Malaysia', 'MYS', 458, 'AS'),
('MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', 508, 'AF'),
('NA', 'Namibia', 'Republic of Namibia', 'NAM', 516, 'AF'),
('NC', 'New Caledonia', 'New Caledonia', 'NCL', 540, 'OC'),
('NE', 'Niger', 'Republic of Niger', 'NER', 562, 'AF'),
('NF', 'Norfolk Island', 'Norfolk Island', 'NFK', 574, 'OC'),
('NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', 566, 'AF'),
('NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', 558, 'NA'),
('NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', 528, 'EU'),
('NO', 'Norway', 'Kingdom of Norway', 'NOR', 578, 'EU'),
('NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', 524, 'AS'),
('NR', 'Nauru', 'Republic of Nauru', 'NRU', 520, 'OC'),
('NU', 'Niue', 'Niue', 'NIU', 570, 'OC'),
('NZ', 'New Zealand', 'New Zealand', 'NZL', 554, 'OC'),
('OM', 'Oman', 'Sultanate of Oman', 'OMN', 512, 'AS'),
('PA', 'Panama', 'Republic of Panama', 'PAN', 591, 'NA'),
('PE', 'Peru', 'Republic of Peru', 'PER', 604, 'SA'),
('PF', 'French Polynesia', 'French Polynesia', 'PYF', 258, 'OC'),
('PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', 598, 'OC'),
('PH', 'Philippines', 'Republic of the Philippines', 'PHL', 608, 'AS'),
('PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', 586, 'AS'),
('PL', 'Poland', 'Republic of Poland', 'POL', 616, 'EU'),
('PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', 666, 'NA'),
('PN', 'Pitcairn Islands', 'Pitcairn Islands', 'PCN', 612, 'OC'),
('PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', 630, 'NA'),
('PS', 'Palestine', 'State of Palestine', 'PSE', 275, 'AS'),
('PT', 'Portugal', 'Portuguese Republic', 'PRT', 620, 'EU'),
('PW', 'Palau', 'Republic of Palau', 'PLW', 585, 'OC'),
('PY', 'Paraguay', 'Republic of Paraguay', 'PRY', 600, 'SA'),
('QA', 'Qatar', 'State of Qatar', 'QAT', 634, 'AS'),
('RE', 'Réunion', 'Réunion', 'REU', 638, 'AF'),
('RO', 'Romania', 'Romania', 'ROU', 642, 'EU'),
('RS', 'Serbia', 'Republic of Serbia', 'SRB', 688, 'EU'),
('RU', 'Russian Federation', 'Russian Federation', 'RUS', 643, 'EU'),
('RW', 'Rwanda', 'Republic of Rwanda', 'RWA', 646, 'AF'),
('SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', 682, 'AS'),
('SB', 'Solomon Islands', 'Solomon Islands', 'SLB', 090, 'OC'),
('SC', 'Seychelles', 'Republic of Seychelles', 'SYC', 690, 'AF'),
('SD', 'Sudan', 'Republic of Sudan', 'SDN', 729, 'AF'),
('SE', 'Sweden', 'Kingdom of Sweden', 'SWE', 752, 'EU'),
('SG', 'Singapore', 'Republic of Singapore', 'SGP', 702, 'AS'),
('SH', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', 654, 'AF'),
('SI', 'Slovenia', 'Republic of Slovenia', 'SVN', 705, 'EU'),
('SJ', 'Svalbard & Jan Mayen Islands', 'Svalbard & Jan Mayen Islands', 'SJM', 744, 'EU'),
('SK', 'Slovakia (Slovak Republic)', 'Slovakia (Slovak Republic)', 'SVK', 703, 'EU'),
('SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', 694, 'AF'),
('SM', 'San Marino', 'Republic of San Marino', 'SMR', 674, 'EU'),
('SN', 'Senegal', 'Republic of Senegal', 'SEN', 686, 'AF'),
('SO', 'Somalia', 'Federal Republic of Somalia', 'SOM', 706, 'AF'),
('SR', 'Suriname', 'Republic of Suriname', 'SUR', 740, 'SA'),
('SS', 'South Sudan', 'Republic of South Sudan', 'SSD', 728, 'AF'),
('ST', 'Sao Tome and Principe', 'Democratic Republic of Sao Tome and Principe', 'STP', 678, 'AF'),
('SV', 'El Salvador', 'Republic of El Salvador', 'SLV', 222, 'NA'),
('SX', 'Sint Maarten (Dutch part)', 'Sint Maarten (Dutch part)', 'SXM', 534, 'NA'),
('SY', 'Syrian Arab Republic', 'Syrian Arab Republic', 'SYR', 760, 'AS'),
('SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', 748, 'AF'),
('TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', 796, 'NA'),
('TD', 'Chad', 'Republic of Chad', 'TCD', 148, 'AF'),
('TF', 'French Southern Territories', 'French Southern Territories', 'ATF', 260, 'AN'),
('TG', 'Togo', 'Togolese Republic', 'TGO', 768, 'AF'),
('TH', 'Thailand', 'Kingdom of Thailand', 'THA', 764, 'AS'),
('TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', 762, 'AS'),
('TK', 'Tokelau', 'Tokelau', 'TKL', 772, 'OC'),
('TL', 'Timor-Leste', 'Democratic Republic of Timor-Leste', 'TLS', 626, 'AS'),
('TM', 'Turkmenistan', 'Turkmenistan', 'TKM', 795, 'AS'),
('TN', 'Tunisia', 'Tunisian Republic', 'TUN', 788, 'AF'),
('TO', 'Tonga', 'Kingdom of Tonga', 'TON', 776, 'OC'),
('TR', 'Turkey', 'Republic of Turkey', 'TUR', 792, 'AS'),
('TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', 780, 'NA'),
('TV', 'Tuvalu', 'Tuvalu', 'TUV', 798, 'OC'),
('TW', 'Taiwan', 'Taiwan, Province of China', 'TWN', 158, 'AS'),
('TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', 834, 'AF'),
('UA', 'Ukraine', 'Ukraine', 'UKR', 804, 'EU'),
('UG', 'Uganda', 'Republic of Uganda', 'UGA', 800, 'AF'),
('UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', 581, 'OC'),
('US', 'United States of America', 'United States of America', 'USA', 840, 'NA'),
('UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', 858, 'SA'),
('UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', 860, 'AS'),
('VA', 'Holy See (Vatican City State)', 'Holy See (Vatican City State)', 'VAT', 336, 'EU'),
('VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', 670, 'NA'),
('VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', 862, 'SA'),
('VG', 'British Virgin Islands', 'British Virgin Islands', 'VGB', 092, 'NA'),
('VI', 'United States Virgin Islands', 'United States Virgin Islands', 'VIR', 850, 'NA'),
('VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', 704, 'AS'),
('VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', 548, 'OC'),
('WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', 876, 'OC'),
('WS', 'Samoa', 'Independent State of Samoa', 'WSM', 882, 'OC'),
('YE', 'Yemen', 'Yemen', 'YEM', 887, 'AS'),
('YT', 'Mayotte', 'Mayotte', 'MYT', 175, 'AF'),
('ZA', 'South Africa', 'Republic of South Africa', 'ZAF', 710, 'AF'),
('ZM', 'Zambia', 'Republic of Zambia', 'ZMB', 894, 'AF'),
('ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', 716, 'AF');
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE IF NOT EXISTS `country_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `countries_code` varchar(10) NOT NULL,
  `continents_code` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countries_code` (`countries_code`),
  KEY `fk_ContinentCode` (`continents_code`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

--
-- Dumping data for table `country_list`
--

INSERT INTO `country_list` (`id`, `countries_code`, `continents_code`) VALUES
(3, 'CL', 'SA'),
(4, 'AE', 'AS'),
(5, 'BG', 'EU'),
(6, 'AR', 'SA'),
(7, 'AX', 'EU'),
<<<<<<< HEAD
(8, 'BI', 'AF'),
(9, 'BH', 'AS');
=======
(8, 'BI', 'AF');
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `email_notifications`
--

CREATE TABLE IF NOT EXISTS `email_notifications` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','InActive') NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subject` (`subject`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Email Notifications templates.' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `email_notifications`
--

INSERT INTO `email_notifications` (`id`, `subject`, `alias`, `description`, `status`, `created_on`, `updated_on`) VALUES
(1, 'Welcome Email', 'fdsfdsafsadf', '<p>f dsafdsafasd f</p>', 'Active', '', '2015-08-05 11:31:24'),
(5, 'Welcome Emaildssdfg', 'test_123', '<p>sdfgsdfgsdfg</p>', 'Active', '2015-08-05 17:59:27', '2015-08-05 12:29:42');

-- --------------------------------------------------------

--
=======
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60
-- Table structure for table `jackpot_details`
--

CREATE TABLE IF NOT EXISTS `jackpot_details` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `jackpot_price` float NOT NULL,
  `ticket_price` float NOT NULL,
  `jackpot_section_image` varchar(500) NOT NULL,
  `average_person` int(4) NOT NULL,
  `continent` varchar(10) NOT NULL,
  `countryid` varchar(10) NOT NULL,
<<<<<<< HEAD
  `desc` text NOT NULL,
  `tandc` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;
=======
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

--
-- Dumping data for table `jackpot_details`
--

<<<<<<< HEAD
INSERT INTO `jackpot_details` (`id`, `name`, `jackpot_price`, `ticket_price`, `jackpot_section_image`, `average_person`, `continent`, `countryid`, `desc`, `tandc`, `start_date`, `end_date`) VALUES
(4, 'Z jackpot', 3333, 1, 'index.jpeg', 100, 'EU', 'AX', '', '', '2015-07-14 00:00:00', '2015-07-29 13:20:17'),
(5, 'test jackpot', 11.77, 11, 'Screenshot-from-2015-06-12-11:51:43.png', 11, 'AS', 'AE', '<p>sdfsd</p>', '<p>sdfsdfsdf</p>', '2015-07-24 18:15:46', '2015-07-31 14:39:40'),
(6, 'upcoming latest jackpot', 11, 11.34, 'home_video.png', 11, 'EU', 'AX', '<p>sdafsadf</p>', '<p>asdfadsf</p>', '2015-07-31 16:55:05', '2015-08-10 11:00:36'),
(7, 'Mega millions', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-30 17:41:28', '2015-07-31 11:30:00'),
(8, 'Mega millions 2', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-07-31 14:30:00'),
(9, 'jackpot 3', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-08-31 03:30:00'),
(10, 'a jackpot', 11.77, 11.34, 'homepage-slider-image3.jpg', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-07-31 03:30:00'),
(11, 'jackpot 5', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-08-11 03:30:00'),
(12, 'jackpot 6', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-08-11 03:30:00'),
(13, 'jackpot 7', 11.77, 11.34, 'homepage-slider-image4.jpg', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-08-11 03:30:00'),
(14, 'jackpot 8', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-08-11 03:30:00'),
(15, 'jackpot 9', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-07-29 17:41:28', '2015-08-11 03:30:00'),
(16, 'jackpot 10', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-03 17:41:28', '2015-08-11 03:30:00'),
(17, 'jackpot 11', 11.77, 11.34, 'iOS Simulator Screen Shot 04-Aug-2015 3.39.41 pm.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-03 17:41:28', '2015-08-11 03:30:00'),
(18, 'jackpot 12', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-03 17:41:28', '2015-08-11 03:30:00'),
(19, 'jackpot 13', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-03 17:41:28', '2015-08-11 03:30:00'),
(20, 'jackpot 14', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-03 17:41:28', '2015-08-11 03:30:00'),
(21, 'jackpot New', 11.77, 11.34, 'homepage-slider-image1.jpg', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-05 17:41:28', '2015-08-11 03:30:00'),
(22, 'jackpot 15', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-05 17:41:28', '2015-08-11 03:30:00'),
(23, 'jackpot 16', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-05 17:41:28', '2015-08-11 03:30:00'),
(24, 'jackpot 17', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-05 17:41:28', '2015-08-11 03:30:00'),
(25, 'jackpot 18', 11.77, 11.34, 'home_video.png', 11, 'AS', 'AE', '<p>test description</p>', '<p>test Term &amp; Condition</p>', '2015-08-05 17:41:28', '2015-08-11 03:30:00'),
(28, 'Diwali Bumper', 3333, 1, 'linux_file_permissions.png', 100, 'AF', 'BI', '<p>dsa fdsa asd</p>', '<p>f adsf sadfsad</p>', '2015-08-18 12:42:35', '2015-08-18 17:00:00');
=======
INSERT INTO `jackpot_details` (`id`, `name`, `jackpot_price`, `ticket_price`, `jackpot_section_image`, `average_person`, `continent`, `countryid`, `start_date`, `end_date`) VALUES
(4, 'dsdfsadfasdfas', 3333, 1, 'error.png', 100, 'EU', 'AX', '2015-07-14 15:38:14', '2015-07-23 13:20:17');
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

-- --------------------------------------------------------

--
-- Table structure for table `lottery_details`
--

CREATE TABLE IF NOT EXISTS `lottery_details` (
  `id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL,
  `currency_id` int(10) NOT NULL,
  `lottery_name` varchar(100) NOT NULL,
  `lottery_number` varchar(100) NOT NULL,
  `lottery_image` varchar(100) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1433315186),
('m130524_201442_init', 1433315207);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
<<<<<<< HEAD
  `status` enum('Active','InActive') NOT NULL,
=======
  `status` enum('active','deactive') NOT NULL,
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60
  `meta_title` varchar(100) NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `status`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
<<<<<<< HEAD
(1, 'Contact Us', 'contact-us', '<h1>Welcome to the TinyMCE editor demo!</h1>\r\n<p>Feel free to try out the different features that are provided, please note that the <strong>MoxieManager</strong> specific functionality is part of our commercial offering. The demo is to show the integration.</p>\r\n<h2>Got questions or need help?</h2>\r\n<p>If you have questions or need help, feel free to visit our <a href="../forum/index.php">community forum</a>! We also offer Enterprise <a href="../enterprise/support.php">support</a> solutions. Also do not miss out on the <a href="../wiki.php">documentation</a>, its a great resource wiki for understanding how TinyMCE works and integrates.</p>', 'Active', 'Contact Us', '<p>This is some example text that you can edit inside the <strong>TinyMCE editor</strong>.</p>', 'contactus');
=======
(1, 'Contact Us', 'contact-us', '<h1>Welcome to the TinyMCE editor demo!</h1>\r\n<p>Feel free to try out the different features that are provided, please note that the <strong>MoxieManager</strong> specific functionality is part of our commercial offering. The demo is to show the integration.</p>\r\n<h2>Got questions or need help?</h2>\r\n<p>If you have questions or need help, feel free to visit our <a href="../forum/index.php">community forum</a>! We also offer Enterprise <a href="../enterprise/support.php">support</a> solutions. Also do not miss out on the <a href="../wiki.php">documentation</a>, its a great resource wiki for understanding how TinyMCE works and integrates.</p>', 'active', 'Contact Us', '<p>This is some example text that you can edit inside the <strong>TinyMCE editor</strong>.</p>', 'contactus');
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(3, 'prem');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE IF NOT EXISTS `ticket_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `transaction_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `ticket_jackpot_summary`
--

CREATE TABLE IF NOT EXISTS `ticket_jackpot_summary` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `jackpot_id` int(5) NOT NULL,
  `user_id` int(6) NOT NULL,
  `ticket_number` varchar(40) NOT NULL,
  `created_on` varchar(50) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `jackpot_id` (`jackpot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
=======
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
<<<<<<< HEAD
(1, 'test', 'iarkJFlrxYJqJCKfWAFH_XG6CfVqV_hZ', '$2y$13$K1taGHa8Qc9fNlcfRrtZ8.hRrDjhmM4XmMPyDYakZHXkFq1a4E2Ja', 'RwUiePZLhWOebm3RWk576xHK1PUT8nqU_1438336519', 'test@gmail.com', 10, 10, 1433325929, 1438336519),
(2, 'admin', 'iarkJFlrxYJqJCKfWAFH_XG6CfVqV_hZ', '$2y$13$KiLkQiJg6vSY9JaY.gMaBuQWMN/Asqbs77qVxevpk/Jn/YBnm3se6', 'jvKdne4f9MiVWiYZbafjGuEG7FyCIZC4_1438345010', 'trantor.php@gmail.com', 10, 10, 1433325929, 1438345010);
=======
(1, 'test', 'iarkJFlrxYJqJCKfWAFH_XG6CfVqV_hZ', '$2y$13$bBu/K5jvAM8TboYT51hMIumBVZzsiBdtZQmawL21MCeJfrJDaIN7G', NULL, 'test@gmail.com', 10, 10, 1433325929, 1433325929),
(2, 'admin', 'iarkJFlrxYJqJCKfWAFH_XG6CfVqV_hZ', '$2y$13$KiLkQiJg6vSY9JaY.gMaBuQWMN/Asqbs77qVxevpk/Jn/YBnm3se6', NULL, 'test@gmail.com', 10, 10, 1433325929, 1433325929);
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

-- --------------------------------------------------------

--
-- Table structure for table `users_register`
--

CREATE TABLE IF NOT EXISTS `users_register` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `emailID` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `con_password` varchar(100) NOT NULL,
<<<<<<< HEAD
  `created_date` varchar(100) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `device_token` varchar(255) NOT NULL,
  `device_type` varchar(100) NOT NULL,
  `is_notification` int(11) NOT NULL DEFAULT '1',
  `gender` varchar(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `user_pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emailID` (`emailID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;
=======
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

--
-- Dumping data for table `users_register`
--

<<<<<<< HEAD
INSERT INTO `users_register` (`id`, `firstname`, `lastname`, `emailID`, `password`, `con_password`, `created_date`, `updated_date`, `device_token`, `device_type`, `is_notification`, `gender`, `date_of_birth`, `user_pic`) VALUES
(2, 'sadfa', 'dsfadsf', 'adsfadsf@xdfg.ftgh', '1234234', 'sdfg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, '', '0000-00-00', ''),
(3, 'sdfghsdfgs', 'dfgsdfgsdf', 'dfgsdfgs', 'gsdfgsdfg', 'sfgs', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, '', '0000-00-00', ''),
(9, 'dev', 'new', 'dev@gmail.com', '$2y$13$iPPZ95NKYe6saO8Vlz0fZ.1BD1rR1TuPmVXiVMRGASew8zznCPfJ6', '$2y$13$Lz62qPcrIVnu949.67Da0ulirYiZQLL1pCqk.ClvpFbXwibH7NLuW', '', '2015-07-21 11:20:46', '', '', 1, '', '0000-00-00', ''),
(10, 'dev', 'new', 'devs@gmail.com', '$2y$13$HPL5bYdWn/qrMwBNbkXF6.xO7psc3wH1h36kco4GSCoTdq.pTNELy', '$2y$13$hIUbN6Cx1k4yD24BOoeHnum8GS3j5oVN9pzCiDGIRu1Qa.ka1Vpwm', '', '2015-07-21 11:22:49', '', '', 1, '', '0000-00-00', ''),
(11, 'rajesh', 'kumar', 'kumar@gmail.com', '$2y$13$sDZc2LaUBF92v10q4jCI5u8ote0gguf.p8VwWnB8zFrn..xSMBfKG', '$2y$13$FzMeZfws8DTAANC3HNbgJOaMrcdAomQj1fIGQsCy/1nUf194O69tO', '', '2015-07-21 12:24:08', '', '', 1, '', '0000-00-00', ''),
(12, 'kiran', 'chawla', 'kiran@gga.com', '$2y$13$kenxp4ziJjbS1j3wJiqIHOdV6aTrzheXHwfLpT8j1W3BTueMA/CZW', '$2y$13$GW0Eoj8eoDXjF2kLP9otRuwXugZkBlar5FrYJCl2rOHs4h6JxmyUK', '', '2015-07-21 12:35:21', '', '', 1, '', '0000-00-00', ''),
(13, 'dev', 'new', 'devsssss@gmail.com', '$2y$13$GxepQegxaSgdtxqakVAXTOoq9ESxnpHpBl3.Y.s9FzFERGIdBm5Y2', '$2y$13$57OHPZ6NmcEUgPVK01tkpuWuiCNX2J8VWEs5I/.XiJwloCxeaMPzm', '', '2015-07-21 12:37:34', '', '', 1, '', '0000-00-00', ''),
(14, 'devraj', 'sharma', 'devraj@gmail.com', '$2y$13$ZjLrqW5j615WlRW/ED3UiuqHeoHN.Rb7ZEB3/73dyPqqhyUBhjagO', '$2y$13$ZjLrqW5j615WlRW/ED3UiuqHeoHN.Rb7ZEB3/73dyPqqhyUBhjagO', '2015-07-22 14:45:50', '2015-07-22 13:24:08', '', '', 1, '', '0000-00-00', ''),
(15, 'kiran', 'chawla', 'xcsd@ddf.com', '$2y$13$36mBDJinIlHGfeDKnyhV7OsH4lCmV.YNmQAouYWWijDQQqMSoKzgC', '$2y$13$0MhFl8DYZHvAmaq6/h0w3Ouyenz3e9L335AgwVgiPVqxwXULHKxXi', '', '2015-07-22 13:20:35', '', '', 1, '', '0000-00-00', ''),
(16, 'kiran', 'chawla', 'asa@ds.com', '$2y$13$XkdJJyplHRJXKoiXuwcgOuyNM700qArdmxH49zoIhWDTozOZuAd9K', '$2y$13$XkdJJyplHRJXKoiXuwcgOuyNM700qArdmxH49zoIhWDTozOZuAd9K', '', '2015-07-23 06:07:03', '', '', 1, '', '0000-00-00', ''),
(19, 'sdfsd', 'sdfg', 'sdfsdf@gdmghf.dfg', '$2y$13$6V312ITQYh6OfClyPRh2I.r4sQgPgjt.LIm2/0bU0RGtfJ7QtT1ZW', '$2y$13$UPX/1cZKp.fA4WFiBcNoveB.g6diDZ0ppUDLqQ0eTJdhEoNOJ.cHe', '2015-07-23 11:39:15', '2015-07-23 09:39:43', '', '', 1, '', '0000-00-00', ''),
(20, 'sham', 'verma', 'verma@gmail.com', '$2y$13$cx46XB7X7.mbNOaalkJWLOxt3nt9ADsZWk4MsWgysjwjG6Fiax3l2', '$2y$13$sDA7dJdTd7ESh.FnJZ9YP.0vRWQjIxlUF24HLhk0NjW.2SoavcB.W', '', '2015-07-23 09:48:20', '', '', 1, '', '0000-00-00', ''),
(21, 'sham', 'verma', 'verma1@gmail.com', '$2y$13$OiUL1sXrz9XCTzGrdtup2uQq1BpCjOuUlCWxIOppVxqFRS6Zl5BUq', '$2y$13$7VotaDHOmdI0B.AbBPkZU.ZZjFJ72T0LGft/lOo90jRuEIBrE0lQm', '', '2015-07-23 09:53:30', '', '', 1, '', '0000-00-00', ''),
(22, 'sham', 'verma', 'verma12@gmail.com', '$2y$13$o.hEA0YqcIhNc57/QywfXeeigrDZKfCVa1AmVaktCN/W4wpDOPJ3e', '$2y$13$e8EEc.oduIi3Xua/eI1.Y.ddUFAZWCLyrfsqYiBne0JX6ZVDVyETi', '2015-07-23 12:03:39', '2015-07-23 11:03:42', '567567', 'android', 1, '', '0000-00-00', ''),
(23, 'sdfgsdfgsdfgsdfg', 'dfsgdfgsdfgsdfg', 'sdfgsdfgsdfgdsf@gmail.ggg', '$2y$13$sGod5G7TT.YZe3nw8QastesHXPWQxB8glBmKj797URsEVE2.mnrqO', '$2y$13$N.w/7bR6klwCs2egs4lm5e0jD6PYqfy.ZZTGsoPyGuf586XsyvPn6', '2015-07-23 12:06:57', '2015-07-23 10:07:15', '', '', 1, '', '0000-00-00', ''),
(24, 'trantor', 'software', 'kiran@trantor.com', '$2y$13$.CdmE0ODzV6IKIg.oqm.0uQRaIFc/BfA2ysgFSjcarHzF.ddVQznu', '$2y$13$YRNpxeynlrvG6uIW/DbnkuJ0Kqo0uDp.FZVmZEx9nvX491ZI.MuxC', '2015-07-23 13:17:32', '2015-07-23 11:17:33', '', '', 1, '', '0000-00-00', ''),
(25, 'arjun', 'dev', 'dev123123@gmail.com', '$2y$13$/O1IaQVkOfg/wl8DYapoNuHkTa8IuRKFLHfz3njSSfzO9JfnVIp1C', '$2y$13$zZSRfI69EetjWeaWcgWlxO3R7RUmh1uS0mV7UWkubcmrs0vUOBQRW', '2015-07-23 14:23:05', '2015-07-23 12:37:00', 'tkn222444', 'andrd', 0, '', '0000-00-00', ''),
(26, 'anubha', '123', 'anubha@123.com', '$2y$13$p8ylOwOsrZ1sZQ13dS87QuQcm/g2oX/YjI/Z2BEQGTYFO0Ly0RZH6', '$2y$13$8X7Sh5.fP9QFmlrmDhR2GuuP3BJq2hp4v52i1oxHJAviFf9YFVRUu', '2015-07-23 14:42:37', '2015-07-23 12:42:38', '', '', 1, '', '0000-00-00', ''),
(27, 'android', '123', 'android@123.com', '$2y$13$su0mGQc3sVmlWeb2gDrbPOPi3ctYytI1TOl/Si7SGavZcnzDjLZ0m', '$2y$13$j7dM5VUwGhtsYQdFyrazYuZA5.VhTgo.MghncEAeTA8IcWEWVWcgq', '2015-07-23 14:56:25', '2015-07-23 12:56:26', '123527728782', '', 1, '', '0000-00-00', ''),
(28, 'android', '123', 'android@12345.com', '$2y$13$T0E/QhBc.0jTE44ytxw7S.kopAIykw52iP1q3MAhJzHAdp8bzKbUe', '$2y$13$3Oo.37Au3tMzjRt1CDwLp.CaDE9tMcRAJGp9jiT37B1bR/IOpD3f6', '2015-07-23 14:58:38', '2015-07-23 12:58:39', '123527728782', 'android', 1, '', '0000-00-00', ''),
(29, 'Gambling', '123', 'gambling@12345.com', '$2y$13$BzJm4V0N3LiXU7lJ5EwAUeyj90jvQwX/JrYl1Gf48TdHhR/X9DFsC', '$2y$13$NMnSeroD/gm4LB71pUtGBOZ9gh4gSKbA7KrTqhX7pn6MzZTJrdvAu', '2015-07-23 14:59:32', '2015-07-23 12:59:33', '', '', 1, '', '0000-00-00', ''),
(30, 'Anubha', 'Chopra', 't@T.com', '$2y$13$Nan8R9NVzN7cGp1GBMw9euuwo5Ddg.I3NNQH9lZCzVSA4lh8.QRuy', '$2y$13$Nan8R9NVzN7cGp1GBMw9euuwo5Ddg.I3NNQH9lZCzVSA4lh8.QRuy', '2015-07-23 15:00:16', '2015-08-04 13:19:03', '', '', 1, 'Female', '1987-12-14', '30.jpeg'),
(31, 'Gambling', '123', 'gambling123@12345.com', '$2y$13$55oEkPx7Qu.riTGxIHRDveXksDU8jlvPSe2mnlFjgXnRE5m0rjxaq', '$2y$13$.QQo2ycodbwXrrYk2bU1lOkzTP9yLdU9kFGJiGq8reglpPxEaBSuW', '2015-07-23 15:03:04', '2015-07-23 13:03:05', '', '', 1, '', '0000-00-00', ''),
(32, 'Gambling', '123', 'gambling12345@12345.com', '$2y$13$1usRf6F2KjEzxhqV.P4KqOpwG9BroK8U7.RAjgX6qScDfuorLqIge', '$2y$13$kKYbxnIlnEvZTMhCIel4ROAa5XGNaYO2kX8OdpKhOyijg9HEDYbwi', '2015-07-23 15:04:06', '2015-07-23 13:04:07', '', '', 1, '', '0000-00-00', ''),
(33, 'reepa', 'dhiman', 'reepa@trantor.com', '$2y$13$yVV9WOGmXWOrgxa3.NL0H.pwEYMihbApNzH4wjwIdR7UzfNhoW4uC', '$2y$13$QwVcCbiiAnp5Lt7asyUoNeI9GXAivRtBBNVWN3VKbR6TiApssx4a.', '2015-07-24 12:51:56', '2015-07-27 05:57:05', '1234567890', 'android', 1, '', '0000-00-00', ''),
(34, 'rr', 'rr', 'rr@rr.com', '$2y$13$UiduD6/unrXU79Ek68oxh.WNfnyO7u9CQFWzo5.mJlkc.UGQCyTFu', '$2y$13$aPQfa2vxX8HISNC67lhP5.4McxiKI2Dy0K0KyrYTw3YPl/S0d369.', '2015-07-24 13:22:34', '2015-07-24 11:22:35', '8ec3bba7de23cda5e8a2726c081be79204faede67529e617b625c984d61cf5c1', 'ios', 1, '', '0000-00-00', ''),
(35, 'yy', 'yy', 'yy@y.com', '$2y$13$hxZSV6QzEK1S7sG5rZctSui0Rx19KOaDahp/eq.L9//okEsQgq9ZC', '$2y$13$/V8wOa9POC8yoQHXvpQSueaLgYLnNgfgF0QZBhXcYd9R3AFOLuyEm', '2015-07-24 13:29:51', '2015-07-24 11:29:52', '8ec3bba7de23cda5e8a2726c081be79204faede67529e617b625c984d61cf5c1', 'ios', 1, '', '0000-00-00', ''),
(36, 'dev', 'raj', 'raj@gmail.com', '$2y$13$fTZw0eNwX1uwA7YWeL3PZOnWIlFrFDu74Buoop4RmQAuSUg3sbkNW', '$2y$13$RoXGFXxZ8dzUREP8DbVCx.oPgnVtk4a0zx9pDECTKdSE80yL2XMP2', '2015-07-27 09:50:41', '2015-07-27 10:51:20', 'serwed', 'ITC', 1, 'male', '0000-00-00', '1437994280_imgo.jpeg'),
(37, 'q', 'q', 'q@q.com', '$2y$13$8rpMrVR6ra1DOBivVdF.ZO8wbMY2rZDTr2Hou1yozakde0p5p.ndi', '$2y$13$hZ2A8io62D9IjQhCTlFpROmiQ6.B7ZjMB7ktgtc0TAXvC7etmFpYq', '2015-07-27 12:56:24', '2015-07-27 11:05:52', '', '', 1, '', '0000-00-00', ''),
(38, 'dd', 'dd', 'd@d.com', '$2y$13$jR9i2G6LWdudYHrz4a3.DOxTGNQf7MjCbwxgFu9uQhh2e./tBiWFS', '$2y$13$CQDxNveisUghGFFJowxBnuEIRofhRKzqxjhgZbC9VStreezRzkiAi', '2015-07-27 13:06:16', '2015-07-27 11:13:27', '', '', 1, '', '0000-00-00', ''),
(39, 'ff', 'ff', 'ff@g.com', '$2y$13$KoIL999oQTzm30R.Py6h9OjDseBmJwjpAULJBXqDEsWpzLxqGuNdu', '$2y$13$5Cysqemfj1Q8mtQVzdg1FOUwWK/qQfbaAVmjZi8jd.NHEznILnj8K', '2015-07-27 13:46:59', '2015-07-27 11:47:27', '', '', 1, '', '0000-00-00', ''),
(40, 'a', 'a', 'a@s.com', '$2y$13$Hcw5lv0h4ja0QKx4EXQnLekFV3VtRihPNhW0KFjjQofO96BvmBSiS', '$2y$13$Hcw5lv0h4ja0QKx4EXQnLekFV3VtRihPNhW0KFjjQofO96BvmBSiS', '2015-07-27 13:48:44', '2015-07-27 11:49:22', '8ec3aaa7de23cda5e8a2726c081be79204faede67529e617b625c984d61cf5c1', 'ios', 1, '', '0000-00-00', ''),
(41, 'aq', 'aq', 'aq@aq.com', '$2y$13$jrGb3fkFm1LH1hoV6sCe7etG2p/05xEaMb9svFRyx18HbeZCv1sWu', '$2y$13$J2brPqbpp.SLIQTbtIZR/.SoKZNk6Ybo5V4dqt/KujzsfEtRHPZ8y', '2015-07-28 14:33:25', '2015-07-28 12:37:06', '', '', 1, '', '0000-00-00', ''),
(42, 'pp', 'pp', 'q@q.comm', '$2y$13$A.qg9RPZCtSGT.i9b8xOfOMLIx9zQvPj3p/LABOyt78h9BjmL9fb2', '$2y$13$a04Z3k6MFK49yNeA4irOj.1k1gjs7xuy3.1bSKRSUqnxYYwYvFVra', '2015-07-29 08:01:13', '2015-07-29 07:17:09', '8ec3aaa7de23cda5e8a2726c081be79204faede67529e617b625c984d61cf5c1', 'ios', 1, '', '0000-00-00', '42.jpeg'),
(43, 'new', 'user', 'new@user.com', '$2y$13$odWA5Pr.QtJjwArbZGYSoO3F2U5UWVQDke5vDLol17V7i60ZT6pWO', '$2y$13$jhogBFJsBLalWewgoI6zVO5yy.Vflnq6oS2PapW.nZpDxjU3MrQ2S', '2015-07-29 08:26:25', '2015-07-29 11:40:51', '123456', 'android', 1, '', '0000-00-00', ''),
(44, 'final', 'test', 'final@test.com', '$2y$13$4yoyCe8K5O8ilwOr/mlZ8e8vofXWfqyypUazFg/IMtpODMkoZsEgS', '$2y$13$lK8ImxRvnvY3k8F7Fj1CJuv4Ikrp9bLL8CQFI50Bo0/qvrQvXXYhG', '2015-07-31 14:02:49', '2015-07-31 12:05:08', '123456', 'android', 1, '', '0000-00-00', ''),
(45, 'amrit', 'kaur', 'amrit@kaur.com', '$2y$13$zdyQ.HtsV5ruYE0BlPMSoO7PcBDrsh1Q59.Vv/4ZIiEgmoKaoMSZO', '$2y$13$cYN6wC195vNV3CHAYUDfd.6U.zjgPFx8QXV33uFvCv2Ms1rLQBx3i', '2015-07-31 15:41:11', '2015-07-31 13:41:12', '1234567890', 'android', 1, '', '0000-00-00', ''),
(46, 'sunakshi', 'gautam', 'sunakshi@gautam.com', '$2y$13$BDxmInyRudGAA2x5lgrrb.S54f2B9UWOA28pQSlFzT6Z.PvY6jnQi', '$2y$13$Ld66A4JIw/lWbaH3V2Gz/.Wmf4.W8AvsdNvsM7xmdI4/WeSWKIpt.', '2015-08-04 09:29:45', '2015-08-04 13:29:37', '123456', 'android', 1, '', '0000-00-00', ''),
(47, 'Reepa', 'kaur', 'reepa@kaur.com', '$2y$13$U9WytUHLyHTrmfR4fcVPmeGD9NETWhLixa.c/6gQ4j5r1ClViHtDm', '$2y$13$Y7IdMrJZvHz8YSRzD1RuTus1DQvBFpNLBo0nWgU6VaANKUk7nUu9.', '2015-08-04 09:38:08', '2015-08-04 07:38:09', '1234567890', 'android', 1, '', '0000-00-00', ''),
(48, 'abc', 'def', 'abc@def.com', '$2y$13$BZNKu9ezTzCja9G24TneKexqV6.ge/huoa.k.99WjmJErWQ3ZHPVG', '$2y$13$2Kle8lSI4muXJDiw6zDFh.sVVp34b7v0jf5BW3SafXs2O0l4OxDxi', '2015-08-04 09:42:27', '2015-08-04 07:42:28', '1234567890', 'android', 1, '', '0000-00-00', ''),
(49, 'dfd', 'fdf', 'test@test.com', '$2y$13$.1eWxyPnIdoS9N/kMTdr7eoQTpna2bIPa1juRYJavto1OaMtndPCG', '$2y$13$VjfFfGHDRn32.rUDn7PpIegyeaYAoc58jiB0CFcCMSOST3XupukqC', '2015-08-04 09:50:25', '2015-08-04 07:50:26', '1234567890', 'android', 1, '', '0000-00-00', ''),
(50, 'fdf', 'ghg', 'bla@bla.com', '$2y$13$HAXFyUm/k9Dyrv2PeHD00.LuHLAxNzZ61WmAPmnI4o/sc5TDhqFjm', '$2y$13$GbshnjDuUU9BA2S8WPX4KOiGMXNtrc0kz26sg7lZzn16ps83r6hR6', '2015-08-04 10:08:28', '2015-08-04 08:08:29', '1234567890', 'android', 1, '', '0000-00-00', ''),
(51, 'harjot', 'singh', 'harjot@singh.com', '$2y$13$v/PJmYdaGnyGCq.eiSLtSOBX6eMlDAhUAqTxphluCopXAJkmqukau', '$2y$13$xRa1P3KVWMLciaLJ.E1BvekCjqtwx9zSQquRjcU6DQSMF2//1fTTW', '2015-08-04 12:24:22', '2015-08-04 12:34:44', '', '', 1, '', '0000-00-00', ''),
(52, 'sadfaff', 'sdfgcccvvv', 'sdfsdfaaaaaaaaa@gmail.com', '$2y$13$bpVvnTRkGT3ZIg7phN03deerOlF2avVOtlEVkzg1yZO.P80GUDX2i', '$2y$13$bpVvnTRkGT3ZIg7phN03deerOlF2avVOtlEVkzg1yZO.P80GUDX2i', '2015-08-04 16:52:15', '2015-08-04 13:46:22', '', '', 1, 'female', '2015-08-27', 'homepage-slider-image3.jpg'),
(53, 'did', 'did', 'd@d.comm', '$2y$13$rEA2Z.YsXVS5XCUiNohBYewW6UquSu11VdQgcm1XLYDvG6QCYGS3e', '$2y$13$rEA2Z.YsXVS5XCUiNohBYewW6UquSu11VdQgcm1XLYDvG6QCYGS3e', '2015-08-04 15:00:34', '2015-08-04 13:01:40', '', '', 1, '', '0000-00-00', ''),
(54, 'hh', 'Hh', 'hh@hh.com', '$2y$13$7UGuqJFAImjdOGR4M5h9BecsOjDKcL6iEekIFri0xrG3bFXzNZH/G', '$2y$13$7UGuqJFAImjdOGR4M5h9BecsOjDKcL6iEekIFri0xrG3bFXzNZH/G', '2015-08-04 15:02:21', '2015-08-04 13:06:44', '', '', 1, '', '0000-00-00', '54.jpeg'),
(55, 'you', 'you', 'y@y.com', '$2y$13$xx.IucBPAK1FYjRsemp7D.WmjsM9Ygt5prM7CYL1F9BNlFS2dsSc.', '$2y$13$xx.IucBPAK1FYjRsemp7D.WmjsM9Ygt5prM7CYL1F9BNlFS2dsSc.', '2015-08-04 15:07:18', '2015-08-04 13:09:04', 'a83422892b83601bcd7bcfe137882878d1cc8508497401699ad25f926bda52d1', 'ios', 1, '', '0000-00-00', '55.jpeg'),
(56, 'arjun', 'devxcc', 'dev@tttgmail.com', '$2y$13$p8qSM3FM2rA2OecMBTJqBO4zVl9GdaEqUMAC9ShNOYPPU53OTBv9q', '$2y$13$p8qSM3FM2rA2OecMBTJqBO4zVl9GdaEqUMAC9ShNOYPPU53OTBv9q', '2015-08-04 19:17:41', '2015-08-04 13:53:27', '', '', 1, 'male', '2015-08-12', 'homepage-slider-image1.jpg'),
(57, 'vvvv', 'xxxxcc', 'vvvv@vvv.ccc', '$2y$13$JRYDApxxfkqDjwzMzjWVOeQE9oB/J0HG9nQG0hEK8bFTUsMYCF4V.', '$2y$13$JRYDApxxfkqDjwzMzjWVOeQE9oB/J0HG9nQG0hEK8bFTUsMYCF4V.', '2015-08-04 19:23:50', '2015-08-04 13:54:40', '', '', 1, 'male', '2015-08-02', '');
=======
INSERT INTO `users_register` (`id`, `firstname`, `lastname`, `emailID`, `password`, `con_password`, `created_date`, `updated_date`) VALUES
(2, 'sadfa', 'dsfadsf', 'adsfadsf@xdfg.ftgh', '1234234', 'sdfg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sdfghsdfgs', 'dfgsdfgsdf', 'dfgsdfgs', 'gsdfgsdfg', 'sfgs', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60

-- --------------------------------------------------------

--
-- Table structure for table `user_listing`
--

CREATE TABLE IF NOT EXISTS `user_listing` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_listing`
--

INSERT INTO `user_listing` (`id`, `name`, `email`, `password`) VALUES
(1, 'Prem Tiwari', 'itrantor.php111@gmail.com', '12345678');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `fk_countries_continents` FOREIGN KEY (`continent_code`) REFERENCES `continents` (`code`);

--
-- Constraints for table `country_list`
--
ALTER TABLE `country_list`
  ADD CONSTRAINT `fk_ContinentCode` FOREIGN KEY (`continents_code`) REFERENCES `continents` (`code`),
  ADD CONSTRAINT `fk_country_code` FOREIGN KEY (`countries_code`) REFERENCES `countries` (`code`);

<<<<<<< HEAD
--
-- Constraints for table `ticket_jackpot_summary`
--
ALTER TABLE `ticket_jackpot_summary`
  ADD CONSTRAINT `ticket_jackpot_summary_ibfk_1` FOREIGN KEY (`jackpot_id`) REFERENCES `jackpot_details` (`id`);

=======
>>>>>>> 3624d25fa39a91e0266f4460cee01180d75e1b60
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
