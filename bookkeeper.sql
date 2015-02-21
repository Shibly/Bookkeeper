-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2015 at 05:41 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookkeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
`id` int(10) unsigned NOT NULL,
  `account_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `balance` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Income','Expense') COLLATE utf8_unicode_ci NOT NULL,
  `bt` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_02_14_181047_create_users_table', 1),
('2015_02_14_211006_create_accounts_table', 1),
('2015_02_15_091136_create_categories_table', 1),
('2015_02_15_154608_create_pmethods_table', 1),
('2015_02_15_172604_create_payees_table', 1),
('2015_02_15_175115_create_payers_table', 1),
('2015_02_16_170543_create_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payees`
--

DROP TABLE IF EXISTS `payees`;
CREATE TABLE IF NOT EXISTS `payees` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payers`
--

DROP TABLE IF EXISTS `payers`;
CREATE TABLE IF NOT EXISTS `payers` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmethods`
--

DROP TABLE IF EXISTS `pmethods`;
CREATE TABLE IF NOT EXISTS `pmethods` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
`id` int(10) unsigned NOT NULL,
  `account` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('Income','Expense','Transfer') COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` decimal(18,2) NOT NULL,
  `payer` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payee` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Cleared','Uncleared','Reconciled','Void') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tax` decimal(18,2) DEFAULT NULL,
  `date` date NOT NULL,
  `dr` decimal(18,2) NOT NULL,
  `cr` decimal(18,2) NOT NULL,
  `bal` decimal(18,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('admin','accountant') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payees`
--
ALTER TABLE `payees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payers`
--
ALTER TABLE `payers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmethods`
--
ALTER TABLE `pmethods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payees`
--
ALTER TABLE `payees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payers`
--
ALTER TABLE `payers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pmethods`
--
ALTER TABLE `pmethods`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
