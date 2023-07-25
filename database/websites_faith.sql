-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2023 at 09:48 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websites_faith`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute`, `name`, `role`, `color`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'roles', 'CEO', 'Super Admin', '#00ffe5', 1, 0, '2021-05-12 00:45:00', '2021-05-12 00:56:40', NULL),
(2, 'roles', 'COO', 'Admin', '#0084ff', 1, 0, '2021-05-12 00:45:13', '2021-05-12 00:45:33', NULL),
(3, 'roles', 'Manager', 'Manager', '#b3ff00', 1, 0, '2021-05-12 00:46:30', '2021-05-12 00:46:30', NULL),
(4, 'roles', 'Employee', 'Employee', '#ff5c33', 1, 0, '2021-05-12 00:46:51', '2021-05-12 00:46:51', NULL),
(5, 'departments', 'Custom Development', '', '#007a6e', 1, 0, '2021-05-12 00:47:25', '2021-05-12 00:47:25', NULL),
(6, 'departments', 'WordPress Development', '', '#3fc624', 1, 0, '2021-05-12 00:47:48', '2021-05-12 00:47:48', NULL),
(7, 'departments', 'Logo Design', '', '#7d248f', 1, 0, '2021-05-12 00:48:14', '2021-05-12 00:48:14', NULL),
(8, 'departments', 'Mock Design', '', '#1e00ff', 1, 0, '2021-05-12 00:48:34', '2021-05-12 00:48:34', NULL),
(9, 'designations', 'Executive', '', '#a7f4ec', 1, 0, '2021-05-12 00:49:08', '2021-05-12 00:49:08', NULL),
(10, 'designations', 'Junior Executive', '', '#a7f4ec', 1, 0, '2021-05-12 00:49:23', '2021-05-12 00:49:23', NULL),
(11, 'designations', 'Senior Executive', '', '#327770', 1, 0, '2021-05-12 00:49:43', '2021-05-12 00:49:43', NULL),
(12, 'designations', 'Manager Executive', '', '#007bff', 1, 0, '2021-05-12 00:50:30', '2021-05-12 00:50:30', NULL),
(13, 'designations', 'Chief Operating Officer', '', '#ae00ff', 1, 0, '2021-05-12 00:50:50', '2021-05-12 00:50:50', NULL),
(14, 'designations', 'Chief Executive Officer', '', '#ff007b', 1, 0, '2021-05-12 00:51:23', '2021-05-12 00:51:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `category_file` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `details`, `category_file`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sports', 'sports', 'Sports', 'uploads/category/e2b95cbe56f8f0b327941ea2ac95c60f/FFnFNRgpe2Ka1llda1LXGjPdyjNzaLtVz8z21KuS.jpg', 1, 0, '2023-03-16 16:19:57', '2023-03-16 16:19:57', NULL),
(2, 'Lifestyle', 'lifestyle', 'Lifestyle', 'uploads/category/a7fb777641082a017a64c3ee6ac1f112/ou6O3EQRerqrAMVifnp2Kzu3nWxbs48eEqRIYQiM.jpg', 1, 0, '2023-03-16 16:21:47', '2023-03-16 16:21:47', NULL),
(3, 'Accessories', 'accessories', 'Accessories', 'uploads/category/71cb7f156bd6068d89567e0c31ffac5c/oLgVB0E5T5DUXvBBZW7AdAQOmRFhjNYhXovyOQaj.jpg', 1, 0, '2023-03-16 17:12:05', '2023-03-16 17:12:05', NULL),
(4, 'Fitness', 'fitness', 'Fitness', 'uploads/category/8104df5febe0d52f029f1b0d5014ad5f/KdiVDZVZtGPmbqLxJJRJGkX6F21DrNIPyPGM3YTe.jpg', 1, 0, '2023-03-16 17:12:28', '2023-03-16 17:12:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1:Contact,2:Sponsor',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `type`, `first_name`, `last_name`, `email`, `subject`, `message`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'test', 'Racka', 'test@tsetet.com', 'tttt', 'test test test', 1, 0, '2023-07-14 13:26:39', '2023-07-14 13:26:39', NULL),
(2, 1, 'Harry', 'Tom', 'harrybrown0078@gmail.com', 'test', 'testing testing', 1, 0, '2023-07-14 13:28:33', '2023-07-14 13:28:33', NULL),
(3, 2, 'Mike', 'Racka', 'mike@gmail.com', 'Testing', 'test test test', 1, 0, '2023-07-14 13:43:40', '2023-07-14 13:43:40', NULL),
(4, 2, 'dummy name', 'dummy name 2', 'dummy@gmail.com', 'DUmmy subject', 'hello', 1, 0, '2023-07-14 18:59:17', '2023-07-14 18:59:17', NULL),
(5, 1, 'John', 'Kass', 'john@gmail.com', 'Meet up', 'hello every one', 1, 0, '2023-07-14 18:59:48', '2023-07-14 18:59:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `is_paid` int(11) NOT NULL DEFAULT 0,
  `order_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `last_4_digit` varchar(255) DEFAULT NULL,
  `payment_link` varchar(255) DEFAULT NULL,
  `response_data` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `name`, `email`, `amount`, `is_paid`, `order_id`, `customer_id`, `payment_id`, `last_4_digit`, `payment_link`, `response_data`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Testing', 'test@test.com', '20', 1, NULL, 'cus_OJ1e3cbkNE0x2F', 'txn_3NWPbKJRpBY7eGHe03sIFuI7', '4242', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKOPK66UGMgaZSYYqYrY6LBZJMkDZvyVPQ1QCwSPAqgDEkVTIaV6RfM99B29Iy9GILg1CxD0ieTtj9gXG', NULL, 1, 0, '2023-07-21 14:46:47', '2023-07-21 15:06:58', NULL),
(2, 'alexmorgan', 'test123@test.com', '44', 0, 'VE5P2JGE', NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-21 20:26:14', '2023-07-21 20:26:14', NULL),
(3, 'Test', 'test@abc.com', '6', 1, '760UPK5O', 'cus_OJ1yh52kQqTfoG', 'txn_3NWPukJRpBY7eGHe0Qehc962', '4242', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKJfU66UGMgaF6pfC5iQ6LBYAzkBgJ2oYZquAz3wfunZ51HIx9rLvNoxHVLzEdIaRR6DCGL8ih8MgDEwN', 'O:13:\"Stripe\\Charge\":8:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:47:{s:2:\"id\";s:27:\"ch_3NWPukJRpBY7eGHe0em5oyiw\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:600;s:15:\"amount_captured\";i:600;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_3NWPukJRpBY7eGHe0Qehc962\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:31:\"calculated_statement_descriptor\";s:6:\"Stripe\";s:8:\"captured\";b:1;s:7:\"created\";i:1689971222;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";s:18:\"cus_OJ1yh52kQqTfoG\";s:11:\"description\";s:58:\"Charged from Founding On Faith with the order ID: 760UPK5O\";s:11:\"destination\";N;s:7:\"dispute\";N;s:8:\"disputed\";b:0;s:27:\"failure_balance_transaction\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:2;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1NWPujJRpBY7eGHeM52Ujnm2\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:156:\"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKJfU66UGMgaF6pfC5iQ6LBYAzkBgJ2oYZquAz3wfunZ51HIx9rLvNoxHVLzEdIaRR6DCGL8ih8MgDEwN\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWPukJRpBY7eGHe0em5oyiw/refunds\";}s:6:\"review\";N;s:8:\"shipping\";a:5:{s:7:\"address\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:7:\"carrier\";N;s:4:\"name\";s:4:\"Test\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:6:\"source\";a:24:{s:2:\"id\";s:29:\"card_1NWPujJRpBY7eGHeM52Ujnm2\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ1yh52kQqTfoG\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";a:0:{}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:10:\"\0*\0_values\";a:47:{s:2:\"id\";s:27:\"ch_3NWPukJRpBY7eGHe0em5oyiw\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:600;s:15:\"amount_captured\";i:600;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_3NWPukJRpBY7eGHe0Qehc962\";s:15:\"billing_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:10:\"\0*\0_values\";a:4:{s:7:\"address\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:10:\"\0*\0_values\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:31:\"calculated_statement_descriptor\";s:6:\"Stripe\";s:8:\"captured\";b:1;s:7:\"created\";i:1689971222;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";s:18:\"cus_OJ1yh52kQqTfoG\";s:11:\"description\";s:58:\"Charged from Founding On Faith with the order ID: 760UPK5O\";s:11:\"destination\";N;s:7:\"dispute\";N;s:8:\"disputed\";b:0;s:27:\"failure_balance_transaction\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:2;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:10:\"\0*\0_values\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:2;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1NWPujJRpBY7eGHeM52Ujnm2\";s:22:\"payment_method_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:2:{s:4:\"card\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:10:\"\0*\0_values\";a:2:{s:4:\"card\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:10:\"\0*\0_values\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:10:\"\0*\0_values\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:1:{s:4:\"used\";b:0;}s:10:\"\0*\0_values\";a:1:{s:4:\"used\";b:0;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"type\";s:4:\"card\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:156:\"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKJfU66UGMgaF6pfC5iQ6LBYAzkBgJ2oYZquAz3wfunZ51HIx9rLvNoxHVLzEdIaRR6DCGL8ih8MgDEwN\";s:8:\"refunded\";b:0;s:7:\"refunds\";O:17:\"Stripe\\Collection\":8:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWPukJRpBY7eGHe0em5oyiw/refunds\";}s:10:\"\0*\0_values\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWPukJRpBY7eGHe0em5oyiw/refunds\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;s:10:\"\0*\0filters\";a:0:{}}s:6:\"review\";N;s:8:\"shipping\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:5:{s:7:\"address\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:7:\"carrier\";N;s:4:\"name\";s:4:\"Test\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:10:\"\0*\0_values\";a:5:{s:7:\"address\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:10:\"\0*\0_values\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:7:\"carrier\";N;s:4:\"name\";s:4:\"Test\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:6:\"source\";O:11:\"Stripe\\Card\":8:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:24:{s:2:\"id\";s:29:\"card_1NWPujJRpBY7eGHeM52Ujnm2\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ1yh52kQqTfoG\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";a:0:{}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:10:\"\0*\0_values\";a:24:{s:2:\"id\";s:29:\"card_1NWPujJRpBY7eGHeM52Ujnm2\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ1yh52kQqTfoG\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;s:14:\"saveWithParent\";b:0;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";O:18:\"Stripe\\ApiResponse\":4:{s:7:\"headers\";O:32:\"Stripe\\Util\\CaseInsensitiveArray\":1:{s:43:\"\0Stripe\\Util\\CaseInsensitiveArray\0container\";a:17:{s:6:\"server\";s:5:\"nginx\";s:4:\"date\";s:29:\"Fri, 21 Jul 2023 20:27:03 GMT\";s:12:\"content-type\";s:16:\"application/json\";s:14:\"content-length\";s:4:\"3459\";s:32:\"access-control-allow-credentials\";s:4:\"true\";s:28:\"access-control-allow-methods\";s:32:\"GET, POST, HEAD, OPTIONS, DELETE\";s:27:\"access-control-allow-origin\";s:1:\"*\";s:29:\"access-control-expose-headers\";s:104:\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\";s:22:\"access-control-max-age\";s:3:\"300\";s:13:\"cache-control\";s:18:\"no-cache, no-store\";s:15:\"idempotency-key\";s:36:\"c4613d18-55cb-4974-b9cc-061ef963e50b\";s:16:\"original-request\";s:18:\"req_MGvWq19dW8ANEv\";s:10:\"request-id\";s:18:\"req_MGvWq19dW8ANEv\";s:19:\"stripe-should-retry\";s:5:\"false\";s:14:\"stripe-version\";s:10:\"2020-08-27\";s:38:\"x-stripe-routing-context-priority-tier\";s:12:\"api-testmode\";s:25:\"strict-transport-security\";s:44:\"max-age=63072000; includeSubDomains; preload\";}}s:4:\"body\";s:3459:\"{\n  \"id\": \"ch_3NWPukJRpBY7eGHe0em5oyiw\",\n  \"object\": \"charge\",\n  \"amount\": 600,\n  \"amount_captured\": 600,\n  \"amount_refunded\": 0,\n  \"application\": null,\n  \"application_fee\": null,\n  \"application_fee_amount\": null,\n  \"balance_transaction\": \"txn_3NWPukJRpBY7eGHe0Qehc962\",\n  \"billing_details\": {\n    \"address\": {\n      \"city\": null,\n      \"country\": null,\n      \"line1\": null,\n      \"line2\": null,\n      \"postal_code\": null,\n      \"state\": null\n    },\n    \"email\": null,\n    \"name\": null,\n    \"phone\": null\n  },\n  \"calculated_statement_descriptor\": \"Stripe\",\n  \"captured\": true,\n  \"created\": 1689971222,\n  \"currency\": \"usd\",\n  \"customer\": \"cus_OJ1yh52kQqTfoG\",\n  \"description\": \"Charged from Founding On Faith with the order ID: 760UPK5O\",\n  \"destination\": null,\n  \"dispute\": null,\n  \"disputed\": false,\n  \"failure_balance_transaction\": null,\n  \"failure_code\": null,\n  \"failure_message\": null,\n  \"fraud_details\": {},\n  \"invoice\": null,\n  \"livemode\": false,\n  \"metadata\": {},\n  \"on_behalf_of\": null,\n  \"order\": null,\n  \"outcome\": {\n    \"network_status\": \"approved_by_network\",\n    \"reason\": null,\n    \"risk_level\": \"normal\",\n    \"risk_score\": 2,\n    \"seller_message\": \"Payment complete.\",\n    \"type\": \"authorized\"\n  },\n  \"paid\": true,\n  \"payment_intent\": null,\n  \"payment_method\": \"card_1NWPujJRpBY7eGHeM52Ujnm2\",\n  \"payment_method_details\": {\n    \"card\": {\n      \"brand\": \"visa\",\n      \"checks\": {\n        \"address_line1_check\": null,\n        \"address_postal_code_check\": null,\n        \"cvc_check\": \"pass\"\n      },\n      \"country\": \"US\",\n      \"exp_month\": 7,\n      \"exp_year\": 2024,\n      \"fingerprint\": \"b41oV967gNYgxff1\",\n      \"funding\": \"credit\",\n      \"installments\": null,\n      \"last4\": \"4242\",\n      \"mandate\": null,\n      \"network\": \"visa\",\n      \"network_token\": {\n        \"used\": false\n      },\n      \"three_d_secure\": null,\n      \"wallet\": null\n    },\n    \"type\": \"card\"\n  },\n  \"receipt_email\": null,\n  \"receipt_number\": null,\n  \"receipt_url\": \"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKJfU66UGMgaF6pfC5iQ6LBYAzkBgJ2oYZquAz3wfunZ51HIx9rLvNoxHVLzEdIaRR6DCGL8ih8MgDEwN\",\n  \"refunded\": false,\n  \"refunds\": {\n    \"object\": \"list\",\n    \"data\": [],\n    \"has_more\": false,\n    \"total_count\": 0,\n    \"url\": \"/v1/charges/ch_3NWPukJRpBY7eGHe0em5oyiw/refunds\"\n  },\n  \"review\": null,\n  \"shipping\": {\n    \"address\": {\n      \"city\": \"Not Entered\",\n      \"country\": \"Not Entered\",\n      \"line1\": \"Not Entered\",\n      \"line2\": null,\n      \"postal_code\": \"Not Entered\",\n      \"state\": \"Not Entered\"\n    },\n    \"carrier\": null,\n    \"name\": \"Test\",\n    \"phone\": null,\n    \"tracking_number\": null\n  },\n  \"source\": {\n    \"id\": \"card_1NWPujJRpBY7eGHeM52Ujnm2\",\n    \"object\": \"card\",\n    \"address_city\": null,\n    \"address_country\": null,\n    \"address_line1\": null,\n    \"address_line1_check\": null,\n    \"address_line2\": null,\n    \"address_state\": null,\n    \"address_zip\": null,\n    \"address_zip_check\": null,\n    \"brand\": \"Visa\",\n    \"country\": \"US\",\n    \"customer\": \"cus_OJ1yh52kQqTfoG\",\n    \"cvc_check\": \"pass\",\n    \"dynamic_last4\": null,\n    \"exp_month\": 7,\n    \"exp_year\": 2024,\n    \"fingerprint\": \"b41oV967gNYgxff1\",\n    \"funding\": \"credit\",\n    \"last4\": \"4242\",\n    \"metadata\": {},\n    \"name\": null,\n    \"tokenization_method\": null,\n    \"wallet\": null\n  },\n  \"source_transfer\": null,\n  \"statement_descriptor\": null,\n  \"statement_descriptor_suffix\": null,\n  \"status\": \"succeeded\",\n  \"transfer_data\": null,\n  \"transfer_group\": null\n}\";s:4:\"json\";a:47:{s:2:\"id\";s:27:\"ch_3NWPukJRpBY7eGHe0em5oyiw\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:600;s:15:\"amount_captured\";i:600;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_3NWPukJRpBY7eGHe0Qehc962\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:31:\"calculated_statement_descriptor\";s:6:\"Stripe\";s:8:\"captured\";b:1;s:7:\"created\";i:1689971222;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";s:18:\"cus_OJ1yh52kQqTfoG\";s:11:\"description\";s:58:\"Charged from Founding On Faith with the order ID: 760UPK5O\";s:11:\"destination\";N;s:7:\"dispute\";N;s:8:\"disputed\";b:0;s:27:\"failure_balance_transaction\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:2;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1NWPujJRpBY7eGHeM52Ujnm2\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:156:\"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKJfU66UGMgaF6pfC5iQ6LBYAzkBgJ2oYZquAz3wfunZ51HIx9rLvNoxHVLzEdIaRR6DCGL8ih8MgDEwN\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWPukJRpBY7eGHe0em5oyiw/refunds\";}s:6:\"review\";N;s:8:\"shipping\";a:5:{s:7:\"address\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:7:\"carrier\";N;s:4:\"name\";s:4:\"Test\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:6:\"source\";a:24:{s:2:\"id\";s:29:\"card_1NWPujJRpBY7eGHeM52Ujnm2\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ1yh52kQqTfoG\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:7;s:8:\"exp_year\";i:2024;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";a:0:{}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:4:\"code\";i:200;}s:14:\"saveWithParent\";b:0;}', 1, 0, '2023-07-21 20:26:14', '2023-07-21 20:27:03', NULL),
(4, '12312', 'ssd@gmail.com', '65', 0, 'I07WUEN8', NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-21 20:29:18', '2023-07-21 20:29:18', NULL),
(5, 'test', 'test@gmail.com', '12', 0, 'BRTF7LFJ', NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-21 22:44:04', '2023-07-21 22:44:04', NULL);
INSERT INTO `donation` (`id`, `name`, `email`, `amount`, `is_paid`, `order_id`, `customer_id`, `payment_id`, `last_4_digit`, `payment_link`, `response_data`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'TestingFolder', 'hashamkhanprotontech@gmail.com', '22', 1, 'KLHA60FX', 'cus_OJ4cWhztPND9Pr', 'txn_3NWST3JRpBY7eGHe0URheSgS', '4242', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKO2g7KUGMgaA5XX71DY6LBbRf6sVD9Jrthv2almjx2Sg60dgzUm0xlT-bQDXzuJpOTWme13cFV4Hw-4E', 'O:13:\"Stripe\\Charge\":8:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:47:{s:2:\"id\";s:27:\"ch_3NWST3JRpBY7eGHe0EtzZq6z\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:2200;s:15:\"amount_captured\";i:2200;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_3NWST3JRpBY7eGHe0URheSgS\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:31:\"calculated_statement_descriptor\";s:6:\"Stripe\";s:8:\"captured\";b:1;s:7:\"created\";i:1689981037;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";s:18:\"cus_OJ4cWhztPND9Pr\";s:11:\"description\";s:58:\"Charged from Founding On Faith with the order ID: KLHA60FX\";s:11:\"destination\";N;s:7:\"dispute\";N;s:8:\"disputed\";b:0;s:27:\"failure_balance_transaction\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:57;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1NWST1JRpBY7eGHeVW1jIGQr\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:156:\"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKO2g7KUGMgaA5XX71DY6LBbRf6sVD9Jrthv2almjx2Sg60dgzUm0xlT-bQDXzuJpOTWme13cFV4Hw-4E\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWST3JRpBY7eGHe0EtzZq6z/refunds\";}s:6:\"review\";N;s:8:\"shipping\";a:5:{s:7:\"address\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:7:\"carrier\";N;s:4:\"name\";s:13:\"TestingFolder\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:6:\"source\";a:24:{s:2:\"id\";s:29:\"card_1NWST1JRpBY7eGHeVW1jIGQr\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ4cWhztPND9Pr\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";a:0:{}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:10:\"\0*\0_values\";a:47:{s:2:\"id\";s:27:\"ch_3NWST3JRpBY7eGHe0EtzZq6z\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:2200;s:15:\"amount_captured\";i:2200;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_3NWST3JRpBY7eGHe0URheSgS\";s:15:\"billing_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:10:\"\0*\0_values\";a:4:{s:7:\"address\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:10:\"\0*\0_values\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:31:\"calculated_statement_descriptor\";s:6:\"Stripe\";s:8:\"captured\";b:1;s:7:\"created\";i:1689981037;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";s:18:\"cus_OJ4cWhztPND9Pr\";s:11:\"description\";s:58:\"Charged from Founding On Faith with the order ID: KLHA60FX\";s:11:\"destination\";N;s:7:\"dispute\";N;s:8:\"disputed\";b:0;s:27:\"failure_balance_transaction\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:57;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:10:\"\0*\0_values\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:57;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1NWST1JRpBY7eGHeVW1jIGQr\";s:22:\"payment_method_details\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:2:{s:4:\"card\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:10:\"\0*\0_values\";a:2:{s:4:\"card\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:10:\"\0*\0_values\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:10:\"\0*\0_values\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:1:{s:4:\"used\";b:0;}s:10:\"\0*\0_values\";a:1:{s:4:\"used\";b:0;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"type\";s:4:\"card\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:156:\"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKO2g7KUGMgaA5XX71DY6LBbRf6sVD9Jrthv2almjx2Sg60dgzUm0xlT-bQDXzuJpOTWme13cFV4Hw-4E\";s:8:\"refunded\";b:0;s:7:\"refunds\";O:17:\"Stripe\\Collection\":8:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWST3JRpBY7eGHe0EtzZq6z/refunds\";}s:10:\"\0*\0_values\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWST3JRpBY7eGHe0EtzZq6z/refunds\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;s:10:\"\0*\0filters\";a:0:{}}s:6:\"review\";N;s:8:\"shipping\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:5:{s:7:\"address\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:7:\"carrier\";N;s:4:\"name\";s:13:\"TestingFolder\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:10:\"\0*\0_values\";a:5:{s:7:\"address\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:10:\"\0*\0_values\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:7:\"carrier\";N;s:4:\"name\";s:13:\"TestingFolder\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:6:\"source\";O:11:\"Stripe\\Card\":8:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:24:{s:2:\"id\";s:29:\"card_1NWST1JRpBY7eGHeVW1jIGQr\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ4cWhztPND9Pr\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";a:0:{}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:10:\"\0*\0_values\";a:24:{s:2:\"id\";s:29:\"card_1NWST1JRpBY7eGHeVW1jIGQr\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ4cWhztPND9Pr\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";O:19:\"Stripe\\StripeObject\":7:{s:8:\"\0*\0_opts\";O:26:\"Stripe\\Util\\RequestOptions\":3:{s:7:\"headers\";a:0:{}s:6:\"apiKey\";s:107:\"sk_test_51Kq6DVJRpBY7eGHezv8DSKwFjoJAhZFUKSV88x6BOauoeRdM08YB3giQ9OFcQKApM4YlEWKKtdCYSuiwHxzP9Tl700RyTcpCJG\";s:7:\"apiBase\";N;}s:18:\"\0*\0_originalValues\";a:0:{}s:10:\"\0*\0_values\";a:0:{}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";N;s:14:\"saveWithParent\";b:0;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:17:\"\0*\0_unsavedValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_transientValues\";O:15:\"Stripe\\Util\\Set\":1:{s:22:\"\0Stripe\\Util\\Set\0_elts\";a:0:{}}s:19:\"\0*\0_retrieveOptions\";a:0:{}s:16:\"\0*\0_lastResponse\";O:18:\"Stripe\\ApiResponse\":4:{s:7:\"headers\";O:32:\"Stripe\\Util\\CaseInsensitiveArray\":1:{s:43:\"\0Stripe\\Util\\CaseInsensitiveArray\0container\";a:17:{s:6:\"server\";s:5:\"nginx\";s:4:\"date\";s:29:\"Fri, 21 Jul 2023 23:10:37 GMT\";s:12:\"content-type\";s:16:\"application/json\";s:14:\"content-length\";s:4:\"3473\";s:32:\"access-control-allow-credentials\";s:4:\"true\";s:28:\"access-control-allow-methods\";s:32:\"GET, POST, HEAD, OPTIONS, DELETE\";s:27:\"access-control-allow-origin\";s:1:\"*\";s:29:\"access-control-expose-headers\";s:104:\"Request-Id, Stripe-Manage-Version, X-Stripe-External-Auth-Required, X-Stripe-Privileged-Session-Required\";s:22:\"access-control-max-age\";s:3:\"300\";s:13:\"cache-control\";s:18:\"no-cache, no-store\";s:15:\"idempotency-key\";s:36:\"755abadf-b475-4342-a65c-020b21395fc5\";s:16:\"original-request\";s:18:\"req_haSAF5Sut6KmEi\";s:10:\"request-id\";s:18:\"req_haSAF5Sut6KmEi\";s:19:\"stripe-should-retry\";s:5:\"false\";s:14:\"stripe-version\";s:10:\"2020-08-27\";s:38:\"x-stripe-routing-context-priority-tier\";s:12:\"api-testmode\";s:25:\"strict-transport-security\";s:44:\"max-age=63072000; includeSubDomains; preload\";}}s:4:\"body\";s:3473:\"{\n  \"id\": \"ch_3NWST3JRpBY7eGHe0EtzZq6z\",\n  \"object\": \"charge\",\n  \"amount\": 2200,\n  \"amount_captured\": 2200,\n  \"amount_refunded\": 0,\n  \"application\": null,\n  \"application_fee\": null,\n  \"application_fee_amount\": null,\n  \"balance_transaction\": \"txn_3NWST3JRpBY7eGHe0URheSgS\",\n  \"billing_details\": {\n    \"address\": {\n      \"city\": null,\n      \"country\": null,\n      \"line1\": null,\n      \"line2\": null,\n      \"postal_code\": null,\n      \"state\": null\n    },\n    \"email\": null,\n    \"name\": null,\n    \"phone\": null\n  },\n  \"calculated_statement_descriptor\": \"Stripe\",\n  \"captured\": true,\n  \"created\": 1689981037,\n  \"currency\": \"usd\",\n  \"customer\": \"cus_OJ4cWhztPND9Pr\",\n  \"description\": \"Charged from Founding On Faith with the order ID: KLHA60FX\",\n  \"destination\": null,\n  \"dispute\": null,\n  \"disputed\": false,\n  \"failure_balance_transaction\": null,\n  \"failure_code\": null,\n  \"failure_message\": null,\n  \"fraud_details\": {},\n  \"invoice\": null,\n  \"livemode\": false,\n  \"metadata\": {},\n  \"on_behalf_of\": null,\n  \"order\": null,\n  \"outcome\": {\n    \"network_status\": \"approved_by_network\",\n    \"reason\": null,\n    \"risk_level\": \"normal\",\n    \"risk_score\": 57,\n    \"seller_message\": \"Payment complete.\",\n    \"type\": \"authorized\"\n  },\n  \"paid\": true,\n  \"payment_intent\": null,\n  \"payment_method\": \"card_1NWST1JRpBY7eGHeVW1jIGQr\",\n  \"payment_method_details\": {\n    \"card\": {\n      \"brand\": \"visa\",\n      \"checks\": {\n        \"address_line1_check\": null,\n        \"address_postal_code_check\": null,\n        \"cvc_check\": \"pass\"\n      },\n      \"country\": \"US\",\n      \"exp_month\": 11,\n      \"exp_year\": 2026,\n      \"fingerprint\": \"b41oV967gNYgxff1\",\n      \"funding\": \"credit\",\n      \"installments\": null,\n      \"last4\": \"4242\",\n      \"mandate\": null,\n      \"network\": \"visa\",\n      \"network_token\": {\n        \"used\": false\n      },\n      \"three_d_secure\": null,\n      \"wallet\": null\n    },\n    \"type\": \"card\"\n  },\n  \"receipt_email\": null,\n  \"receipt_number\": null,\n  \"receipt_url\": \"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKO2g7KUGMgaA5XX71DY6LBbRf6sVD9Jrthv2almjx2Sg60dgzUm0xlT-bQDXzuJpOTWme13cFV4Hw-4E\",\n  \"refunded\": false,\n  \"refunds\": {\n    \"object\": \"list\",\n    \"data\": [],\n    \"has_more\": false,\n    \"total_count\": 0,\n    \"url\": \"/v1/charges/ch_3NWST3JRpBY7eGHe0EtzZq6z/refunds\"\n  },\n  \"review\": null,\n  \"shipping\": {\n    \"address\": {\n      \"city\": \"Not Entered\",\n      \"country\": \"Not Entered\",\n      \"line1\": \"Not Entered\",\n      \"line2\": null,\n      \"postal_code\": \"Not Entered\",\n      \"state\": \"Not Entered\"\n    },\n    \"carrier\": null,\n    \"name\": \"TestingFolder\",\n    \"phone\": null,\n    \"tracking_number\": null\n  },\n  \"source\": {\n    \"id\": \"card_1NWST1JRpBY7eGHeVW1jIGQr\",\n    \"object\": \"card\",\n    \"address_city\": null,\n    \"address_country\": null,\n    \"address_line1\": null,\n    \"address_line1_check\": null,\n    \"address_line2\": null,\n    \"address_state\": null,\n    \"address_zip\": null,\n    \"address_zip_check\": null,\n    \"brand\": \"Visa\",\n    \"country\": \"US\",\n    \"customer\": \"cus_OJ4cWhztPND9Pr\",\n    \"cvc_check\": \"pass\",\n    \"dynamic_last4\": null,\n    \"exp_month\": 11,\n    \"exp_year\": 2026,\n    \"fingerprint\": \"b41oV967gNYgxff1\",\n    \"funding\": \"credit\",\n    \"last4\": \"4242\",\n    \"metadata\": {},\n    \"name\": null,\n    \"tokenization_method\": null,\n    \"wallet\": null\n  },\n  \"source_transfer\": null,\n  \"statement_descriptor\": null,\n  \"statement_descriptor_suffix\": null,\n  \"status\": \"succeeded\",\n  \"transfer_data\": null,\n  \"transfer_group\": null\n}\";s:4:\"json\";a:47:{s:2:\"id\";s:27:\"ch_3NWST3JRpBY7eGHe0EtzZq6z\";s:6:\"object\";s:6:\"charge\";s:6:\"amount\";i:2200;s:15:\"amount_captured\";i:2200;s:15:\"amount_refunded\";i:0;s:11:\"application\";N;s:15:\"application_fee\";N;s:22:\"application_fee_amount\";N;s:19:\"balance_transaction\";s:28:\"txn_3NWST3JRpBY7eGHe0URheSgS\";s:15:\"billing_details\";a:4:{s:7:\"address\";a:6:{s:4:\"city\";N;s:7:\"country\";N;s:5:\"line1\";N;s:5:\"line2\";N;s:11:\"postal_code\";N;s:5:\"state\";N;}s:5:\"email\";N;s:4:\"name\";N;s:5:\"phone\";N;}s:31:\"calculated_statement_descriptor\";s:6:\"Stripe\";s:8:\"captured\";b:1;s:7:\"created\";i:1689981037;s:8:\"currency\";s:3:\"usd\";s:8:\"customer\";s:18:\"cus_OJ4cWhztPND9Pr\";s:11:\"description\";s:58:\"Charged from Founding On Faith with the order ID: KLHA60FX\";s:11:\"destination\";N;s:7:\"dispute\";N;s:8:\"disputed\";b:0;s:27:\"failure_balance_transaction\";N;s:12:\"failure_code\";N;s:15:\"failure_message\";N;s:13:\"fraud_details\";a:0:{}s:7:\"invoice\";N;s:8:\"livemode\";b:0;s:8:\"metadata\";a:0:{}s:12:\"on_behalf_of\";N;s:5:\"order\";N;s:7:\"outcome\";a:6:{s:14:\"network_status\";s:19:\"approved_by_network\";s:6:\"reason\";N;s:10:\"risk_level\";s:6:\"normal\";s:10:\"risk_score\";i:57;s:14:\"seller_message\";s:17:\"Payment complete.\";s:4:\"type\";s:10:\"authorized\";}s:4:\"paid\";b:1;s:14:\"payment_intent\";N;s:14:\"payment_method\";s:29:\"card_1NWST1JRpBY7eGHeVW1jIGQr\";s:22:\"payment_method_details\";a:2:{s:4:\"card\";a:14:{s:5:\"brand\";s:4:\"visa\";s:6:\"checks\";a:3:{s:19:\"address_line1_check\";N;s:25:\"address_postal_code_check\";N;s:9:\"cvc_check\";s:4:\"pass\";}s:7:\"country\";s:2:\"US\";s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:12:\"installments\";N;s:5:\"last4\";s:4:\"4242\";s:7:\"mandate\";N;s:7:\"network\";s:4:\"visa\";s:13:\"network_token\";a:1:{s:4:\"used\";b:0;}s:14:\"three_d_secure\";N;s:6:\"wallet\";N;}s:4:\"type\";s:4:\"card\";}s:13:\"receipt_email\";N;s:14:\"receipt_number\";N;s:11:\"receipt_url\";s:156:\"https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xS3E2RFZKUnBCWTdlR0hlKO2g7KUGMgaA5XX71DY6LBbRf6sVD9Jrthv2almjx2Sg60dgzUm0xlT-bQDXzuJpOTWme13cFV4Hw-4E\";s:8:\"refunded\";b:0;s:7:\"refunds\";a:5:{s:6:\"object\";s:4:\"list\";s:4:\"data\";a:0:{}s:8:\"has_more\";b:0;s:11:\"total_count\";i:0;s:3:\"url\";s:47:\"/v1/charges/ch_3NWST3JRpBY7eGHe0EtzZq6z/refunds\";}s:6:\"review\";N;s:8:\"shipping\";a:5:{s:7:\"address\";a:6:{s:4:\"city\";s:11:\"Not Entered\";s:7:\"country\";s:11:\"Not Entered\";s:5:\"line1\";s:11:\"Not Entered\";s:5:\"line2\";N;s:11:\"postal_code\";s:11:\"Not Entered\";s:5:\"state\";s:11:\"Not Entered\";}s:7:\"carrier\";N;s:4:\"name\";s:13:\"TestingFolder\";s:5:\"phone\";N;s:15:\"tracking_number\";N;}s:6:\"source\";a:24:{s:2:\"id\";s:29:\"card_1NWST1JRpBY7eGHeVW1jIGQr\";s:6:\"object\";s:4:\"card\";s:12:\"address_city\";N;s:15:\"address_country\";N;s:13:\"address_line1\";N;s:19:\"address_line1_check\";N;s:13:\"address_line2\";N;s:13:\"address_state\";N;s:11:\"address_zip\";N;s:17:\"address_zip_check\";N;s:5:\"brand\";s:4:\"Visa\";s:7:\"country\";s:2:\"US\";s:8:\"customer\";s:18:\"cus_OJ4cWhztPND9Pr\";s:9:\"cvc_check\";s:4:\"pass\";s:13:\"dynamic_last4\";N;s:9:\"exp_month\";i:11;s:8:\"exp_year\";i:2026;s:11:\"fingerprint\";s:16:\"b41oV967gNYgxff1\";s:7:\"funding\";s:6:\"credit\";s:5:\"last4\";s:4:\"4242\";s:8:\"metadata\";a:0:{}s:4:\"name\";N;s:19:\"tokenization_method\";N;s:6:\"wallet\";N;}s:15:\"source_transfer\";N;s:20:\"statement_descriptor\";N;s:27:\"statement_descriptor_suffix\";N;s:6:\"status\";s:9:\"succeeded\";s:13:\"transfer_data\";N;s:14:\"transfer_group\";N;}s:4:\"code\";i:200;}s:14:\"saveWithParent\";b:0;}', 1, 0, '2023-07-21 23:09:29', '2023-07-21 23:10:37', NULL),
(7, 'foundingonfaith', 'test@gmail.com', '55000', 0, '0Q268EDZ', NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-21 23:20:13', '2023-07-21 23:20:13', NULL),
(8, 'Mohammad Ovais', 'ovaism210@gmail.com', '150000', 0, 'OSF5HNMO', NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-21 23:23:47', '2023-07-21 23:23:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`id`, `type`, `name`, `slug`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Tracksuit', 'tracksuit', 1, 0, '2023-03-23 15:52:35', '2023-03-23 15:52:35', NULL),
(2, 1, 'Gilet', 'gilet', 1, 0, '2023-03-23 15:53:34', '2023-03-23 15:53:34', NULL),
(3, 1, 'Hoodie', 'hoodie', 1, 0, '2023-03-23 15:53:42', '2023-03-23 15:53:42', NULL),
(4, 1, 'Trousers', 'trousers', 1, 0, '2023-03-23 15:53:46', '2023-03-23 15:53:46', NULL),
(5, 1, 'T-shirt', 't-shirt', 1, 0, '2023-03-23 15:53:53', '2023-03-23 15:53:53', NULL),
(6, 1, 'Sleeveless T-shirt', 'sleeveless-t-shirt', 1, 0, '2023-03-23 15:54:05', '2023-03-23 15:54:05', NULL),
(7, 1, 'Skin-shirt', 'skin-shirt', 1, 0, '2023-03-23 15:54:11', '2023-03-23 15:54:11', NULL),
(8, 1, 'Thermal shirt', 'thermal-shirt', 1, 0, '2023-03-23 15:54:19', '2023-03-23 15:54:19', NULL),
(9, 1, 'Shorts', 'shorts', 1, 0, '2023-03-23 15:54:24', '2023-03-23 15:54:24', NULL),
(10, 1, 'Socks', 'socks', 1, 0, '2023-03-23 15:54:29', '2023-03-23 15:54:29', NULL),
(11, 1, 'Hats', 'hats', 1, 0, '2023-03-23 15:54:33', '2023-03-23 15:54:33', NULL),
(12, 2, 'Tracksuit', 'tracksuit', 1, 0, '2023-03-23 15:55:06', '2023-03-23 15:55:06', NULL),
(13, 2, 'Trousers', 'trousers', 1, 0, '2023-03-23 15:55:10', '2023-03-23 15:55:10', NULL),
(14, 2, 'Hoodie', 'hoodie', 1, 0, '2023-03-23 15:55:14', '2023-03-23 15:55:14', NULL),
(15, 2, 'Long Hoodie', 'long-hoodie', 1, 0, '2023-03-23 15:55:19', '2023-03-23 15:55:19', NULL),
(16, 2, 'Training Top', 'training-top', 1, 0, '2023-03-23 15:55:26', '2023-03-23 15:55:26', NULL),
(17, 2, 'Jumper', 'jumper', 1, 0, '2023-03-23 15:55:30', '2023-03-23 15:55:30', NULL),
(18, 2, 'Leggings', 'leggings', 1, 0, '2023-03-23 15:55:34', '2023-03-23 15:55:34', NULL),
(19, 2, 'Socks', 'socks', 1, 0, '2023-03-23 15:55:38', '2023-03-23 15:55:38', NULL),
(20, 2, 'Headband', 'headband', 1, 0, '2023-03-23 15:55:41', '2023-03-23 15:55:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_departments_table', 1),
(2, '2014_10_12_000000_create_designations_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2021_05_08_010845_attributes', 1),
(7, '2021_05_12_051804_role_assign', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_file` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `details`, `price`, `product_file`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Dummy 1', 'dummy-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '10', 'uploads/product/a0abfd874f96430e86c8a27a7b52850f/DGbsGuNfq41cnowAY01rRdJhBWwZoNxCygKdi2nw.jpg', 0, 0, '2023-03-17 21:30:21', '2023-03-20 13:00:19', NULL),
(2, 2, 'Dummy 2', 'dummy-2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '20', 'uploads/product/5a153c7ebfda570ce0057eaf794b7397/55tRKIjWjTOeQJ6Q3OBgp4mJh1pU3vkPMWhnHNJt.jpg', 0, 0, '2023-03-17 21:31:42', '2023-03-20 13:00:22', NULL),
(3, 3, 'Dummy 3', 'dummy-3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '30', 'uploads/product/c8ae93e847415eac27b3300734c85eca/nzv1hwLOtQcyxj6qfdLSuTzSomyq9n31LEyTrDQf.jpg', 0, 0, '2023-03-17 21:32:06', '2023-03-20 13:00:24', NULL),
(4, 4, 'Dummy 4', 'dummy-4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '40', 'uploads/product/b26104dc3fc01e64f14af3b4d9acbb6e/ypHu4qk1En04GhS9SsPOILITGhFGw2Cd6TQvJOq5.jpg', 0, 0, '2023-03-17 21:32:26', '2023-03-20 13:00:26', NULL),
(5, 2, 'DUmmy 5', 'dummy-5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '40', 'uploads/product/e0c8397ce64c0d5aeb356c261e624a28/DCH92ob78YFYsjNweCZlPd4gyjRGNlHw8zxZPmC0.jpg', 0, 0, '2023-03-17 21:34:46', '2023-03-20 13:00:29', NULL),
(6, 2, 'Dummy 6', 'dummy-6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '50', 'uploads/product/7efeaad8af32feb4153878a3ed8f1bc8/CfaQBPAx2cweSgu3J8eBURPUPPB3VyaQlHPGpRk4.jpg', 0, 0, '2023-03-17 21:35:09', '2023-03-20 13:00:41', NULL),
(7, 2, 'Dummy 7', 'dummy-7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '60', 'uploads/product/6f0d82c31e5d4fa5b67d895e13ea778c/JyVJK2gllbFT87yXdpYdaxRUkFxwuol0EoDfsj20.png', 1, 0, '2023-03-17 21:35:47', '2023-03-17 21:35:47', NULL),
(8, 2, 'Dummy 8', 'dummy-8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '70', 'uploads/product/e848a567467298fc1ee90d6251a569b3/jIYxcPdttG6JRfN6P9I7ZaZp2hJ9JgzxV77AEAbX.png', 1, 0, '2023-03-17 21:36:09', '2023-03-17 21:36:09', NULL),
(9, 2, 'Dummy 9', 'dummy-9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '80', 'uploads/product/060c2454d3dc6468817b75119d0b9c86/Qyi9gjzDZ8Od4mT6stfPEtPOLueC7U721SteC2uc.png', 1, 0, '2023-03-20 13:02:23', '2023-03-20 13:02:23', NULL),
(10, 3, 'Dummy 10', 'dummy-10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '100', 'uploads/product/f3e7b3d6483ae54a59d9296893e9985d/lTv0DEEn54vCKJaLbxwBPjgm9S5TUskPMbcSA4Qw.png', 1, 0, '2023-03-20 13:03:18', '2023-03-20 13:03:18', NULL),
(11, 2, 'Dummy 11', 'dummy-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '110', 'uploads/product/100761328cd53adf511f9d846efaa783/zZXKkUpuAvGlcSdhnkgrzXddOBgY9Vd4F6HrN4Y9.png', 1, 0, '2023-03-20 13:04:00', '2023-03-20 13:04:00', NULL),
(12, 2, 'Dummy 12', 'dummy-12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud laboris ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in velit esse dolore eu fugiat nulla pariatur. Excepteur sint', '40', 'uploads/product/c07012bb29986327c71d145b8fe3eed7/OgPdxDAIABBksyqxu8gbNTKfIgL844h5J92gcPKf.png', 1, 0, '2023-03-20 13:04:37', '2023-03-20 13:04:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `upload` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `desc`, `upload`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'How does it work?', '<p class=\"text-dark\">\r\n                    When you contact us, we’ll schedule an interview with you to understand your goals and identify your needs. We know you need assistance now, so we’ll move as quickly as possible. After the interview, we’ll arrange a safe\r\n                    and comfortable housing solution. Then you’ll meet with the team to develop a two or four-year plan. The team consists of a:\r\n                </p>\r\n                <p class=\"text-primary\">\r\n                    Paralegal or Attorney<br>\r\n                    Program coordinator<br>\r\n                    Financial Consultant<br>\r\n                    Life Coach<br>\r\n                    Therapist\r\n                </p>', 'uploads/program/96a9e87ba7512f0e06e5408795620297/6L1aEhNlShZyNltOchsin9yrGOyGHhcjsHAs2sVH.jpg', 1, 0, '2023-07-21 15:43:43', '2023-07-21 15:43:43', NULL),
(2, 'What housing is available?', '<p class=\"text-light\">\r\n                    What housing is available? Individual minors will have a shared apartment with their own bedroom. Families will have their own private apartment. All housing is free for one to two years, after which the participant will\r\n                    be responsible for 50% of the market rent. Housing audits are performed every six months by property maintenance. Leases are 12 months and renew only if the participant is active in the program.\r\n                </p>', 'uploads/program/8d930ad9c7b8af6054025a47a5899524/5CVmg23w0I0pOoCZMpSCtgVapf1oTf9PO7D7CAXs.jpg', 1, 0, '2023-07-21 19:13:28', '2023-07-21 14:21:35', NULL),
(3, 'Career Building', '<p class=\"text-dark\">\r\n                    Career Building There’s no one-size solution that works for everyone’s future. Founding on Faith offers a flexible career support system that allows for the achievement of all sorts of dreams. After the interview, we’ll\r\n                    arrange a safe and comfortable housing solution. Then you’ll meet with the team to develop a two or four-year plan.\r\n                </p>', 'uploads/program/d47ffd19fbfb68a870bb9401a11bb11d/t4HhxdXncYjX9ld21eemKjADCMsRateFcVMvkMdU.jpg', 1, 0, '2023-07-21 19:13:56', '2023-07-21 14:22:04', NULL),
(4, 'Life coaching', '<p class=\"text-light\">\r\n                    Participants aged 14 and older will meet with a life coach once a month. Your life coach will help clarify your goals and path to success. They’ll help you gain perspective on your challenges, offer objective advice, and\r\n                    teach you tools for dealing with ongoing stressors.\r\n                </p>', 'uploads/program/7f36ad534b3c8442897f42f6f4663f19/rsSEbZTvc8RwyzTFzYGJwOhX6cvDB0APSl9QeuN0.jpg', 1, 0, '2023-07-21 19:14:20', '2023-07-21 14:22:17', NULL),
(5, 'Therapy', '<p class=\"text-dark\">\r\n                    All participants will engage in weekly therapy. Talk therapy – or psychotherapy – is a healthy way to work through difficult emotions like fear and anger, deal with stress, and strengthen relationships.\r\n                </p>', 'uploads/program/e90cf7dcea45cb16e858455f4ed84627/VObpHhOLsIhyoe1xa7oqDrbU0vpxci6VUWmBtT8a.jpg', 1, 0, '2023-07-21 19:14:44', '2023-07-21 14:22:28', NULL),
(6, 'Financial Literacy', '<p class=\"text-light\">\r\n                    One of the most important skills you can have is financial literacy. Understanding your money and how to make the most of it can change your life and allow you to turn off survival mode. All participants will receive\r\n                    financial literacy training to prepare them for a bright and secure future.\r\n                </p>', 'uploads/program/b1953e21833acb56f46c2ec491835a2d/Ms7q0N22BGbR9n4yQGQGzzAJGDsCT1iAgaO3Cdg4.jpg', 1, 0, '2023-07-21 19:15:09', '2023-07-21 14:22:39', NULL),
(7, 'Legal Assistance', '<p class=\"text-dark\">\r\n                    When needed, all participants will have access to legal assistance from a paralegal or attorney. Assistance with filing paperwork Legal advice Appeals support Court appearances Domestic violence reporting\r\n                </p>', 'uploads/program/d42773d8d4298aecfbd30a9433229461/yE7HGYqT2y6mFAnQl5Q9afQpzoP7fjUo7lS0GRkr.jpg', 1, 0, '2023-07-21 19:15:33', '2023-07-21 14:22:50', NULL),
(8, 'Childcare', '<p class=\"text-light\">\r\n                    Childcare can be incredibly restricting for single parents. Childcare that you can trust is often cost prohibitive and negates the benefits of your job almost entirely. Founding on Faith provides, after school, and\r\n                    overnight childcare for children aged 15 and under. Transportation can also be provided.\r\n                </p>', 'uploads/program/918576eee61f5cd199d201c0a52179fd/qeGzrY7RJ8JPBuTEt0Cr76d6eydOBFYYYPALDlOm.jpg', 1, 0, '2023-07-21 19:16:09', '2023-07-21 14:23:01', NULL),
(9, 'Life skills & other services', '<p class=\"text-dark\">\r\n                    Having a well-rounded portfolio of life skills doesn’t just prepare you for mundane life tasks like making dinner. It expands your horizons with new experiences and chances to discover things you enjoy. You can learn\r\n                    more about yourself, improve your health and wellness, and engage in your community.\r\n                </p>', 'uploads/program/22589eab0b7f225b7758bc40cd7b805e/ihZhVuWS5ugXrj2CcRe3VXOrtVSKlqDT8xdABbgF.jpg', 1, 0, '2023-07-21 19:16:37', '2023-07-21 14:23:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_assign`
--

CREATE TABLE `role_assign` (
  `id` int(10) UNSIGNED NOT NULL,
  `assignee` text DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_assign`
--

INSERT INTO `role_assign` (`id`, `assignee`, `role_id`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'a:4:{i:0;s:7:\"roles_1\";i:1;s:13:\"departments_2\";i:2;s:13:\"departments_4\";i:3;s:14:\"designations_3\";}', 2, 1, 0, '2021-05-11 20:05:21', '2021-05-11 20:05:21', NULL),
(2, 'a:12:{i:0;s:7:\"roles_1\";i:1;s:7:\"roles_2\";i:2;s:7:\"roles_3\";i:3;s:7:\"roles_4\";i:4;s:13:\"departments_1\";i:5;s:13:\"departments_2\";i:6;s:13:\"departments_3\";i:7;s:13:\"departments_4\";i:8;s:14:\"designations_1\";i:9;s:14:\"designations_2\";i:10;s:14:\"designations_3\";i:11;s:14:\"designations_4\";}', 1, 1, 0, '2021-05-11 20:06:25', '2021-05-11 20:06:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `upload` text NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `designation`, `upload`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jeremie Priso-Wandja', 'Bilingual Program Officer', 'uploads/team/67dbfaf5c408dd4f2200e9c8d5278c91/Yspu1EcxExypLFGm16zETvmhy4QE0oocTl3qmYcB.jpg', 1, 0, '2023-07-21 12:18:26', '2023-07-21 12:18:26', NULL),
(2, 'Jackie Williamson, RN, BScN MEd PhD', 'Board Chair', 'uploads/team/f043c55e3ef723e72f77a1ee3e8e523c/izSK2ixqwx2SCysORz2PDwBODqCFtfY9rZ3UtsIF.jpg', 1, 0, '2023-07-21 12:20:28', '2023-07-21 12:20:28', NULL),
(3, 'Nicole Tappenden', 'Executive Director', 'uploads/team/8ce7d02775603ff3f9c01e97c0e09300/DGFGyPDZWmAiVntpaamUm54v6jS563z2adm5Ebja.jpg', 1, 0, '2023-07-21 12:20:48', '2023-07-21 12:20:48', NULL),
(4, 'Debra Grant, ECE', 'Treasurer', 'uploads/team/69ebc7175f028b5de9e01da61558114f/IlMaDTsbUwoWNepj6WsFi5li1ZenSSoB387oxaWj.jpg', 1, 0, '2023-07-21 12:21:12', '2023-07-21 12:21:12', NULL),
(5, 'Khadijah Khan', 'Technology Officer', 'uploads/team/be817230c1b96bc981060029e7da78a2/6ApWLMo3SC3I2GaYGrG86IJ5CeaaMYpxh7akczsO.jpg', 1, 0, '2023-07-21 12:21:28', '2023-07-21 12:21:28', NULL),
(6, 'Zain Porter', 'Men’s Director', 'uploads/team/e4ca1e4246e1e39f39dc336c8392ca94/1nHDHOeikR0uasS8Jq8APXcLgT5pFIy9H0qAB9n1.jpg', 1, 0, '2023-07-21 12:21:35', '2023-07-21 14:27:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `resume_doc` varchar(255) DEFAULT NULL,
  `cnic_doc` varchar(255) DEFAULT NULL,
  `education_doc` varchar(255) DEFAULT NULL,
  `personal_email` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `emergency_number` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `residential_address` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `join_date` date NOT NULL,
  `reporting_line` varchar(255) DEFAULT NULL,
  `v_model_name` varchar(255) DEFAULT NULL,
  `v_model_year` varchar(255) DEFAULT NULL,
  `v_number_plate` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `profile_pic`, `resume_doc`, `cnic_doc`, `education_doc`, `personal_email`, `phonenumber`, `emergency_number`, `cnic`, `residential_address`, `blood_group`, `dob`, `gender`, `marital_status`, `emp_id`, `designation`, `department`, `join_date`, `reporting_line`, `v_model_name`, `v_model_year`, `v_number_plate`, `bank_account_number`, `is_active`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 1, 'Administrator', 'admin', 'admin@project.com', NULL, '$2y$10$tmPeoAmP.ER/7cVW6JvGMOhEtCztu7LiyGde99kwQWO2ot.Ad7tGa', 'uploads/avatar/3393dd54a0cfbc5c1e0f5b7a7ddea30c/gmTKaSExV9V3CQSmaEzsx3fmMcX3LWPigcQp0aLb.png', 'uploads/resume/2339f4445ad239e370e032dbee4d5819/4e9psgcsxImYuXFTRJMdpu9RS7RgL6twLhX6QfCT.png', 'uploads/cnic/b591d9b80583399ce26d62ab98bf47ec/it4PcMBwokHHu43ruRYeNi1benQEdfCCEolbOcLr.png', NULL, 'admin@test.com', '+1XXXXXXXXX', '+1XXXXXXXXX', '00000-0000000-0', 'None', 'B-VE', '1992-06-14', 'male', 'single', 1027, 'Chief Executive Officer', 'Custom Development', '2021-05-01', 'me@mydomain.com', 'Vitz', '2021', '12345', 'None', 1, 0, '2021-05-11 19:44:21', '2023-07-14 09:21:23', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_assign`
--
ALTER TABLE `role_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_assign`
--
ALTER TABLE `role_assign`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
