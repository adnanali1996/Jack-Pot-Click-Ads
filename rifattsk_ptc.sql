-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2020 at 04:10 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rifattsk_ptc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'support@thesoftking.com', '$2y$10$.aqKmU30hXHdIcteW1rng.OOimVNGMk/Ukw05EFY1jCqTQdNeOUqK', 'mUYzVAcBbG7LXPSwUiyJvEdlWnt2BPxLIEnRrxU7CiD4uVXYwYDhqz8rpG7e', NULL, '2018-03-05 00:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE `advertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `remain` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `package_status` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertises`
--

INSERT INTO `advertises` (`id`, `title`, `token`, `link`, `price`, `quantity`, `remain`, `created_at`, `updated_at`, `user_id`, `package_id`, `package_status`, `date`) VALUES
(38, 'How To Make Website Using Wordpress', 'dIafEMvss9rfQhj3', 'https://www.accuweather.com/en/pk/faisalabad/260626/weather-forecast/260626', '3', 100, 10, '2019-05-20 14:09:48', '2019-05-23 15:13:03', NULL, NULL, 1, '2019-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `charge_commisions`
--

CREATE TABLE `charge_commisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transfer_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `withdraw_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_commision_tree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_commision_sponsor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `update_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `match_bonus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `charge_commisions`
--

INSERT INTO `charge_commisions` (`id`, `transfer_charge`, `withdraw_charge`, `update_charge`, `update_commision_tree`, `update_commision_sponsor`, `created_at`, `updated_at`, `update_text`, `match_bonus`) VALUES
(1, '3', '5', '50', '0.02', '10', NULL, '2018-05-07 07:29:55', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><b><font size=\"4\">There are many variations of passages of Lorem Ipsum available,</font>&nbsp;</b></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '10');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bcid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bcam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usd_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `amount`, `status`, `trx`, `bcid`, `bcam`, `try`, `created_at`, `updated_at`, `usd_amount`, `trx_charge`) VALUES
(6, 1, 4, '5002', '1', 'DP865266745', NULL, NULL, '0', '2018-03-01 08:12:12', '2018-03-01 08:12:36', '64.15', '130.05');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gateimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargefx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargepc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `gateimg`, `minamo`, `maxamo`, `chargefx`, `chargepc`, `rate`, `val1`, `val2`, `val3`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', '5a7ed13a7d0d3.png', '10', '10000', '2', '2.5', '80', 'rexrifat636@gmail.com', NULL, NULL, 1, NULL, '2018-02-11 05:56:35'),
(2, 'Perfect Money', '5a7ed14857f6d.png', '10', '20000', '3', '1', '80', 'U5376900', 'G079qn4Q7XATZBqyoCkBteGRg', NULL, 1, NULL, '2018-02-11 05:56:45'),
(3, 'BlockChain', '5a70961c5783f.png', '10', '20000', '0.01', '0.5', '675410.98', 'YOUR API KEY FROM BLOCKCHAIN.INFO', 'YOUR XPUB FROM BLOCKCHAIN.INFO', NULL, 1, NULL, '2018-02-11 05:05:11'),
(4, 'Stripe', '5a7ed16c4cf99.png', '10', '50000', '5', '2.5', '80', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', NULL, 1, NULL, '2018-02-12 01:30:47'),
(5, 'Skrill', '5a70963c08257.jpg', '10', '50000', '3', '3', '81', 'merchant@skrill', 'AUMS TECS', NULL, 1, NULL, '2018-02-11 04:11:45'),
(6, 'Coingate', '5a709647b797a.jpg', '10', '50000', '3', '3', '83.30', '1257', '8wbQIWcXyRu1AHiJqtEhTY', 'Hr7LqFM83aJsZgbIVkoUW2Q4cGvlB05n', 1, NULL, '2018-02-11 08:39:15'),
(7, 'Coin Payment', '5a709659027e1.jpg', '0', '0', '0', '0', '675410.98', 'db1d9f12444e65c921604e289a281c56', NULL, NULL, 1, NULL, '2018-02-11 04:12:15'),
(8, 'Block IO', '5a70966f55b80.jpg', '0', '10000', '0', '10', '675410.98', '7e13-0ee0-161c-882e', '101201101201', NULL, 1, '2018-01-27 12:00:00', '2018-02-11 08:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(10) UNSIGNED NOT NULL,
  `web_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(191) NOT NULL DEFAULT '0',
  `about_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about_video_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailver` int(1) NOT NULL,
  `smsver` int(1) NOT NULL,
  `emessage` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sec_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nfy` int(1) DEFAULT '0',
  `sms_nfy` int(1) NOT NULL DEFAULT '0',
  `add_show` int(11) NOT NULL,
  `add_show_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `web_title`, `currency`, `symbol`, `message`, `email`, `mobile`, `status`, `about_text`, `image`, `theme`, `created_at`, `updated_at`, `about_video_link`, `footer`, `footer_text`, `policy`, `terms`, `address`, `google_map_address`, `start_date`, `smsapi`, `emailver`, `smsver`, `emessage`, `esender`, `sec_color`, `email_nfy`, `sms_nfy`, `add_show`, `add_show_limit`) VALUES
(1, 'Jackpotclickads- Pay Per Click Platform', 'USD', '$', '<span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">W3Schools is optimized for learning, testing, and training. Examples might be simplified to improve reading and basic understanding. Tutorials, references, and examples are constantly reviewed to avoid errors, but we cannot warrant full correctness of all content. While using this site, you agree to have read and accepted our&nbsp;</span><a href=\"https://www.w3schools.com/about/about_copyright.asp\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: inherit; font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">terms of use</a><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">,&nbsp;</span><a href=\"https://www.w3schools.com/about/about_privacy.asp\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: inherit; font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">cookie and privacy policy</a><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">.&nbsp;</span><a href=\"https://www.w3schools.com/about/about_copyright.asp\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); color: inherit; font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">Copyright 1999-2018</a><span style=\"color: rgb(0, 0, 0); font-family: Verdana, sans-serif; font-size: 12px; text-align: center;\">&nbsp;by Refsnes Data. All Rights Reserved.</span>', 'demo@aum.com', '+01234567895', 0, '<div><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p></div>', '1524988443.png', '282fbe', NULL, '2019-05-20 13:29:50', 'https://www.youtube.com/watch?v=2kXbdIw0Nx4', '2019 © . Website Name  All Rights Reserved', 'will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><div><br></div><div><span style=\"color: rgb(0, 0, 0); text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></div><div><span style=\"color: rgb(0, 0, 0); text-align: justify;\"><br></span></div><div><span style=\"color: rgb(0, 0, 0); text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><span style=\"color: rgb(0, 0, 0); text-align: justify;\"><br></span></div>', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\"><br></p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br></p><div><br></div>', 'Mezan Bank Unique Motors  \"1181 0103738189\"', '<iframe width=\"600\" height=\"500\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe>', '2018-02-01', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=*****&sender=okiptc&SMSText={{message}}&GSM={{number}}&type=longSMS', 1, 1, '<div><br></div><div><b>Hi {{name}},</b></div><div><br></div><div></div><div>{{message}}</div><div><br></div><div>Thanks,&nbsp;<br>Oki Team</div><div><br></div><div><br></div>', 'example@sitename.com', '27ae60', 0, 0, 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `total_balance` double NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `user_id`, `amount`, `total_balance`, `description`, `type`, `created_at`, `updated_at`) VALUES
(15, 1, 0.6000000000000001, 0.6000000000000001, 'Refferal Click Income Added By ', 'R', '2019-05-20 16:12:21', '2019-05-20 16:12:21'),
(16, 1, 0.6000000000000001, 1.2000000000000002, 'Refferal Click Income Added By ', 'R', '2019-05-20 16:14:49', '2019-05-20 16:14:49'),
(17, 1, 0.6000000000000001, 1.8000000000000003, 'Refferal Click Income Added By alpha10', 'R', '2019-05-20 16:17:29', '2019-05-20 16:17:29'),
(18, 1, 0.6000000000000001, 2.4000000000000004, 'Refferal Click Income Added By alpha10', 'R', '2019-05-20 16:46:05', '2019-05-20 16:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `member_extras`
--

CREATE TABLE `member_extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `left_paid` int(11) NOT NULL,
  `right_paid` int(11) NOT NULL,
  `left_free` int(11) NOT NULL,
  `right_free` int(11) NOT NULL,
  `left_bv` int(11) NOT NULL,
  `right_bv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_extras`
--

INSERT INTO `member_extras` (`id`, `user_id`, `left_paid`, `right_paid`, `left_free`, `right_free`, `left_bv`, `right_bv`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 2, 10, 0, 4, 0, '2018-03-26 18:00:00', '2018-05-07 07:56:18'),
(2, 11, 3, 1, 7, 3, 1, 0, '2018-03-01 07:23:52', '2018-05-07 07:56:18'),
(3, 12, 2, 0, 5, 2, 1, 0, '2018-03-01 07:26:48', '2018-05-07 07:56:18'),
(4, 13, 0, 0, 1, 2, 0, 0, '2018-03-01 07:29:27', '2018-03-04 04:14:55'),
(5, 14, 0, 0, 0, 0, 0, 0, '2018-03-01 07:40:28', '2018-03-01 07:40:28'),
(6, 15, 2, 0, 4, 0, 1, 0, '2018-03-01 08:01:39', '2018-05-07 07:56:18'),
(7, 16, 0, 0, 0, 1, 0, 0, '2018-03-01 08:02:41', '2018-03-03 01:59:56'),
(8, 17, 0, 0, 0, 0, 0, 0, '2018-03-01 08:04:58', '2018-03-01 08:04:58'),
(9, 18, 0, 0, 0, 1, 0, 0, '2018-03-01 08:05:41', '2018-03-04 04:14:55'),
(10, 19, 2, 0, 3, 0, 1, 0, '2018-03-03 01:58:45', '2018-05-07 07:56:18'),
(11, 20, 0, 0, 0, 0, 0, 0, '2018-03-03 01:59:56', '2018-03-03 01:59:56'),
(12, 21, 0, 0, 0, 0, 0, 0, '2018-03-04 04:14:55', '2018-03-04 04:14:55'),
(13, 22, 2, 0, 2, 0, 1, 0, '2018-03-04 23:44:09', '2018-05-07 07:56:18'),
(14, 23, 2, 0, 1, 0, 1, 0, '2018-03-05 07:26:02', '2018-05-07 07:56:18'),
(15, 24, 2, 0, 0, 0, 1, 0, '2018-03-12 08:07:28', '2018-05-07 07:56:17'),
(16, 25, 2, 0, -1, 0, 2, 0, '2018-04-29 04:41:05', '2018-05-07 07:56:17'),
(17, 26, 0, 0, 0, 0, 0, 0, '2018-05-07 07:54:09', '2018-05-07 07:54:09'),
(18, 27, 0, 0, 0, 0, 0, 0, '2019-05-01 02:51:22', '2019-05-01 02:51:22'),
(20, 29, 0, 0, 1, 0, 0, 0, '2019-05-01 03:04:25', '2019-05-04 14:47:28'),
(21, 30, 0, 0, 0, 7, 0, 0, '2019-05-01 06:46:38', '2019-05-04 14:34:02'),
(22, 31, 0, 0, 0, 6, 0, 0, '2019-05-01 06:50:57', '2019-05-04 14:34:02'),
(23, 32, 0, 0, 0, 0, 0, 0, '2019-05-01 06:54:29', '2019-05-01 06:54:29'),
(24, 33, 0, 0, 0, 5, 0, 0, '2019-05-01 07:08:09', '2019-05-04 14:34:02'),
(25, 34, 0, 0, 0, 4, 0, 0, '2019-05-01 07:12:25', '2019-05-04 14:34:02'),
(26, 35, 0, 0, 0, 3, 0, 0, '2019-05-01 07:25:03', '2019-05-04 14:34:02'),
(27, 36, 0, 0, 0, 2, 0, 0, '2019-05-01 07:26:49', '2019-05-04 14:34:02'),
(28, 37, 0, 0, 0, 1, 0, 0, '2019-05-01 07:29:51', '2019-05-04 14:34:02'),
(29, 38, 0, 0, 0, 0, 0, 0, '2019-05-04 14:11:31', '2019-05-04 14:11:31'),
(30, 40, 0, 0, 0, 0, 0, 0, '2019-05-04 14:34:01', '2019-05-04 14:34:01'),
(31, 41, 0, 0, 0, 0, 0, 0, '2019-05-04 14:47:28', '2019-05-04 14:47:28'),
(32, 43, 0, 0, 0, 0, 0, 0, '2019-05-19 06:37:07', '2019-05-19 06:37:07'),
(33, 44, 0, 0, 0, 0, 0, 0, '2019-05-20 12:59:32', '2019-05-20 12:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `image`, `title`, `description`, `created_at`, `updated_at`) VALUES
(17, '1524999324.jpg', 'Many desktop publishing packages', '<p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Pakistan\'s World Cup winning field hockey goalkeeper Mansoor Ahmed Monday reached out to India for help in securing a heart transplant -- despite years of breaking his rivals\' \"hearts on the field\".</p><div class=\"fb-quote fb_iframe_widget\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=1499138263726489&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174578%2FPakistan-hockey-hero-seeks-heart-transplant-in&amp;locale=en_US&amp;sdk=joey\" style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: absolute; overflow: hidden; left: 107px; top: 486px;\"><span style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: relative; text-align: justify; vertical-align: bottom; width: 169px; height: 47px;\"><iframe name=\"f1e549263191cf4\" width=\"1000px\" height=\"1000px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" title=\"fb:quote Facebook Social Plugin\" src=\"https://www.facebook.com/v2.5/plugins/quote.php?app_id=1499138263726489&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F2VRzCA39w_9.js%3Fversion%3D42%23cb%3Df22c08da01e6284%26domain%3Den.prothomalo.com%26origin%3Dhttp%253A%252F%252Fen.prothomalo.com%252Ff3915ba6511729%26relation%3Dparent.parent&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174578%2FPakistan-hockey-hero-seeks-heart-transplant-in&amp;locale=en_US&amp;sdk=joey\" class=\"\" style=\"padding: 0px; margin: 0px; outline: 0px; border-width: initial; border-style: none; position: absolute; visibility: visible; width: 169px; height: 47px;\"></iframe></span></div><p></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">The 49-year-old has been suffering for weeks from complications stemming from a pacemaker and stents implanted in his heart.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Ahmed has been a sporting icon in Pakistan since helping the country win the 1994 World Cup in Sydney with his penalty stroke push against the Netherlands in the final.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">\"I may have broken a lot of Indian hearts on the field of play by beating India in the Indira Gandhi Cup (1989) and in other events but that was sport,\" Ahmed told AFP.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">\"Now I need a heart transplant in India and for that I need support from the Indian government.\"</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">India-Pakistan ties, including sports and cultural contacts, plummeted after the 2008 militant attacks in Mumbai, which New Delhi blamed on Pakistani militant groups.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Despite the strained ties, Pakistanis are eligible to apply for medical visas to India, renowned for its booming medical tourism industry.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Ahmed -- who played 338 international matches, participated in three Olympics and various other high-profile events in a career spanning from 1986 to 2000 -- said the visa could be a lifesaver.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">\"Humanity is paramount and I too would be obliged if I get a visa and other help in India\" said Ahmed.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Sport has been one of the few avenues to improve relations between the arch rivals, he added.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">\"We have had a great rivalry and sports have helped on a number of occasions so that should continue,\" said Ahmed.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">India has suspended most bilateral sporting ties with Pakistan since 2008, with high-profile cricket tours bearing the brunt of the moratorium.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">They have, however, continued to play each other in multinational events like the World Cup.</p>', '2018-04-28 08:09:22', '2018-04-29 04:55:24'),
(18, '1524999448.jpg', 'Spin twins Shakib Al Hasan', '<p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Spin twins Shakib Al Hasan and Rashid Khan shared five wickets between them to help Sunrisers Hyderabad defend a meagre 132 against Kings XI Punjab by 13 runs in a nail-biting Indian Premier League (IPL) clash as the Orange Army vaulted to the No 2 spot in the points table.</p><div class=\"fb-quote fb_iframe_widget\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=1499138263726489&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174722%2FShakib-Rashid-rout-Punjab&amp;locale=en_US&amp;sdk=joey\" style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: absolute; overflow: hidden; left: 280px; top: 486px;\"><span style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: relative; text-align: justify; vertical-align: bottom; width: 169px; height: 47px;\"><iframe name=\"f299fe5debfbe3c\" width=\"1000px\" height=\"1000px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" title=\"fb:quote Facebook Social Plugin\" src=\"https://www.facebook.com/v2.5/plugins/quote.php?app_id=1499138263726489&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F2VRzCA39w_9.js%3Fversion%3D42%23cb%3Df24dc641e41fae8%26domain%3Den.prothomalo.com%26origin%3Dhttp%253A%252F%252Fen.prothomalo.com%252Ff296019bca6f91c%26relation%3Dparent.parent&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174722%2FShakib-Rashid-rout-Punjab&amp;locale=en_US&amp;sdk=joey\" class=\"\" style=\"padding: 0px; margin: 0px; outline: 0px; border-width: initial; border-style: none; position: absolute; visibility: visible; width: 169px; height: 47px;\"></iframe></span></div><p></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Demoted to No 3, Kings XI Punjab squandered a watchful 55-run opening start from Chris Gayle and Lokesh Rahul before falling apart, as Rashid (3/19) and Shakib (2/18) triggered a batting collapse to see the team home amid thunderous applause from the vociferous crowd at the Rajiv Gandhi International Stadium here on Thursday.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">While Gayle (23 off 22 balls) started with a thunderous six over off-spinner Mohammad Nabi’s head before going into a shell, Rahul (32 off 26) sent the Afghan tweaker to the cleaners on three consecutive occasions to outscore his West Indian opening partner.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Rahul’s innings was laced with a range of stylish cover drives and straight drives even as Gayle found back his groove by welcoming medium pacer Basil Thampi for a thunderous six, and helping his side past the 50-run mark.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">With Punjab sailing smoothly towards the target, Kane Williamson brought in his strike bowler Rashid Khan, who responded in style by hammering Rahul’s off-stump with a googly.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Thampi (2/14) then joined the party by getting the better of Gayle, who miscued a short ball to non-existent square-leg only to find the bowler completing a clean catch.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">At 57/2, Punjab needed to start afresh with Mayank Agarwal (12) and Karun Nair (13) joining forces, but left-arm spinner Shakib Al Hasan nipped the partnership in the bud with the wicket of Agarwal.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Nair departed soon after failing to read Rashid’s googly which trapped him plumb in front even as Manoj Tiwary (1) was welcomed with a couple of fiery lbw appeals from the Afghan.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Punjab’s nightmare continued in the next over when Shakib packed back Aaron Finch (8) after being clobbered for a massive six on the previous ball.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Medium pacer Sandeep Sharma added salt to Punjab’s woes by packing Tiwary soon after as the visitors’ chase derailed after losing six wickets in a span of just 37 runs.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Skipper Ravichandran Ashwin (4), Andrew Tye (4) and Barinder Sran (2) could hardly offer any resistance as the home bowlers continued their stronghold.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">With the target gradually getting out of Punjab’s hands, tailenders Mujeeb Ur Rahman (10 not out) and Ankit Rajpoot (8) got a few hits before Thampi uprooted Rajpoot’s middle stick to take his team home.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Earlier, medium pacer Ankit Rajpoot (5/14) ripped through the Hyderabad batting to restrict them to a paltry 132.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">The 24-year-old Rajpoot started off with the key wickets of skipper Kane Williamson (0), Shikhar Dhawan (11) and Wriddhiman Saha (6) from his first three overs before returning to pick Manish Pandey (54) and Mohammad Nabi (4) in the final over of the innings.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Put in to bat, the hosts were saved from the blushes by Pandey’s fighting 51-ball knock, laced with three fours and a six after Rajpoot reduced them to 27/3 in the first five overs.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Pandey, however found a companion in Bangladesh skipper Shakib, who made the most of the two reprieves, striking a 29-ball 28, laced with three hits to the fence and forged a 52-run fourth wicket stand.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">But the joy was short-lived as 17-year-old mystery spinner Mujeeb Ur Rahman ended the partnership with the wicket of Shakib.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Shakib’s dismissal brought in an experienced Yusuf Pathan (21 not out off 19; 4x1, 6x1) who was forced to curb his natural game, even as Pandey reached his fifty by sending Tye’s slower one to the extra cover boundary.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Afghan all-rounder Nabi then joined Pathan for the final two deliveries but couldn’t trouble the scorers much as Rajpoot had the last laugh.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Brief Scores: Sunrisers Hyderabad 132/6 (Manish Pandey 54, Shakib Al Hasan 28; Ankit Rajpoot 5/14) beat Kings XI Punjab (Lokesh Rahul 32, Chris Gayle 23; Rashid Khan 3/19, Basil Thampi 2/14, Shakib Al Hasan 2/18) by 13 runs.</p>', '2018-04-28 08:09:59', '2018-04-29 04:57:28'),
(20, '1524999209.jpg', 'It uses a dictionary of over Latin words', '<p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Gareth Bale scored as a much-changed Real Madrid warmed up for Tuesday’s Champions League semi-final second leg at Bayern Munich with a 2-1 win over Leganes on Saturday.</p><div class=\"fb-quote fb_iframe_widget\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=1499138263726489&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174820%2FBale-leads-Real-to-low-key-win-over-Leganes&amp;locale=en_US&amp;sdk=joey\" style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: absolute; overflow: hidden; left: 165px; top: 486px;\"><span style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: relative; text-align: justify; vertical-align: bottom; width: 169px; height: 47px;\"><iframe name=\"f28c75f501f59dc\" width=\"1000px\" height=\"1000px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" title=\"fb:quote Facebook Social Plugin\" src=\"https://www.facebook.com/v2.5/plugins/quote.php?app_id=1499138263726489&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F2VRzCA39w_9.js%3Fversion%3D42%23cb%3Df94fc74d82508%26domain%3Den.prothomalo.com%26origin%3Dhttp%253A%252F%252Fen.prothomalo.com%252Ff1b974af27d3cc8%26relation%3Dparent.parent&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174820%2FBale-leads-Real-to-low-key-win-over-Leganes&amp;locale=en_US&amp;sdk=joey\" class=\"\" style=\"padding: 0px; margin: 0px; outline: 0px; border-width: initial; border-style: none; position: absolute; visibility: visible; width: 169px; height: 47px;\"></iframe></span></div><p></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Bale bundled Real into an early lead, before Borja Mayoral took advantage of more sloppy defending to make it two before half-time.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Serbian Darko Brasanac gave Leganes hope of a comeback, but Real closed out the victory despite struggling in the second half.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“I’m very happy with the attitude of my players today, with 10 changes to the starting eleven, with players who haven’t played much,” said Real coach Zinedine Zidane.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“We can’t be happy with what we’ve done in the league in general. We lost a lot of points at the beginning, then we were a bit better but that can happen in a season.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“Now we have to get back to work, we have another match on Tuesday which will be our game of the year. We have a title to defend.”</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Real stay third in the table, one point behind city rivals Atletico who play Alaves on Sunday, when Barcelona can secure the La Liga title if they avoid defeat at Deportivo La Coruna.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Zidane made sweeping changes to the team which beat Bayern 2-1 in Wednesday’s first leg at the Allianz Arena, with Bale and Karim Benzema returning.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Bale boosted his hopes of a start in the second leg by hooking in a deflected Benzema effort to give Real an eighth-minute lead with his first goal since a double against Las Palmas on 31 March.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Leganes had stunned Real with a 2-1 victory at the Santiago Bernabeu in January to reach the Copa del Rey semi-finals, but struggled to make any inroads against their dominant hosts.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Daniel Ceballos fired narrowly over, but the soon-to-be deposed league champions doubled their advantage on the stroke of half-time.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Mayoral tapped in from close range after Leganes goalkeeper Pichu Cuellar totally missed a left-wing cross, with offside appeals waved away as defender Unai Bustinza had got a touch to the ball on its way through.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">It was the 21-year-old Mayoral’s second La Liga goal, having also netted against Real Sociedad in September.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Leganes grew into the game after the break as Real’s thoughts perhaps turned towards Bayern, and Miguel Guerrero wasted an excellent chance to halve the deficit as he headed wide from a Nabil El Zhar cross.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">But the away team did pull one back in the 66th minute, as Nordin Amrabat forced his way to the byline and squared for Brasanac to tap in from close range.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">On-loan Watford winger Amrabat was proving dangerous, and the Moroccan saw a low shot saved by stand-in Real goalkeeper Kiko Casilla.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Leganes continued to pile on the pressure, with Casilla making a brilliant stop to deny Bustinza.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Leganes defender Gabriel sent off in injury-time, as Real clung on for the three points after a below-par performance.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Own-goal double settles Basque derby</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Earlier on Saturday, Athletic Bilbao midfielder Mikel San Jose scored two own goals as his side slipped to a 3-1 defeat at Real Sociedad in Saturday’s Basque country derby.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">The 28-year-old volleyed a corner emphatically past his own goalkeeper Kepa Arrizabalaga in the 15th minute, before Mikel Oyarzabal doubled the advantage before half-time.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">San Jose became only the second player to ever score two own goals in a La Liga match at the Anoeta Stadium, putting through his own net early in the second half before Raul Garcia scored a consolation from the penalty spot.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Elsewhere, Carlos Bacca scored a 25-minute hat-trick as sixth-placed Villarreal claimed a 4-1 victory over Celta Vigo.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">The Colombian striker broke the deadlock in the 13th minute and tapped in to complete his hat-trick seven minutes before half-time and score his 18th goal of the season.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Sevilla sacked coach Vincenzo Montella after just four months in charge after seeing their winless run extended to nine games with a 2-1 loss at lowly Levante on Friday.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">It was the second time the Italian had been sacked this season, after being dumped by AC Milan last November.</p>', '2018-04-28 08:10:20', '2018-04-29 04:54:20'),
(21, '1524999182.jpg', 'Contrary to popular belief', '<p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Manchester City coach Pep Guardiola said departing Barcelona captain Andres Iniesta helped him understand football better as he led tributes to the veteran midfielder, who is leaving the club after 16 glorious years at the Nou Camp.</p><div class=\"fb-quote fb_iframe_widget\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=1499138263726489&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174765%2FGuardiola-Zidane-Lopetegui-praise-%25E2%2580%259Cfootball-man%25E2%2580%259D&amp;locale=en_US&amp;sdk=joey\" style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: absolute; overflow: hidden; left: 146.5px; top: 486px;\"><span style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: relative; text-align: justify; vertical-align: bottom; width: 169px; height: 47px;\"><iframe name=\"f707bd63948de4\" width=\"1000px\" height=\"1000px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" title=\"fb:quote Facebook Social Plugin\" src=\"https://www.facebook.com/v2.5/plugins/quote.php?app_id=1499138263726489&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F2VRzCA39w_9.js%3Fversion%3D42%23cb%3Df61165fc5489b4%26domain%3Den.prothomalo.com%26origin%3Dhttp%253A%252F%252Fen.prothomalo.com%252Ff2401f03b801d8%26relation%3Dparent.parent&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174765%2FGuardiola-Zidane-Lopetegui-praise-%25E2%2580%259Cfootball-man%25E2%2580%259D&amp;locale=en_US&amp;sdk=joey\" class=\"\" style=\"padding: 0px; margin: 0px; outline: 0px; border-width: initial; border-style: none; position: absolute; visibility: visible; width: 169px; height: 47px;\"></iframe></span></div><p></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Iniesta pulled the strings in the middle of the pitch alongside Xavi Hernandez when Guardiola was in charge of Barcelona for four years, winning three La Liga titles, two domestic cups and two Champions League triumphs.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“I want to say thank you. He helped me understand the game better, just watching him and what he does on the football pitch,” Guardiola told a news conference on Friday.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">It was Iniesta who scored the crucial late equaliser against Chelsea at Stamford Bridge in 2009 to send Barcelona into the Champions League final. The Spaniard then shrugged off an injury to help the Catalans outclass Manchester United in Rome to win the trophy.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">He was also crucial to Barca beating United again in the 2011 final.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“I could say a lot of things but basically the pleasure of seeing him train, how everything was easy, I think the most impressive thing about him is how naturally he played,” added Guardiola.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“That is very difficult to find in a football player.”</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">The Spain midfielder also received praise from Zinedine Zidane, coach of Barca’s rivals Real Madrid.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“It’s difficult for me and for anyone who likes football. I don’t see him as a Barcelona player but a football man,” Zidane said.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“He is charming, very reserved and I like people like that. I don’t know him well but I only have good words for him and I wish him all the best as a player and as a person.”</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Spain coach Julen Lopetegui said Iniesta was still one of the best players around and added he is rare in receiving universal adoration.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\"><strong style=\"padding: 0px; margin: 0px; outline: 0px;\">TOP OF HIS GAME</strong></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“He is a player who first of all is still at the top of his game. He has been a regular starter for us in every game and I don’t speak about him in the past but in the present,” Lopetegui told reporters.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">“The manner in which he has won everything and his behaviour after winning has meant that he is given standing ovations in stadiums across Spain and abroad. That is something which very few other footballers in history have had.”</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Iniesta is one of the most loved footballers in Spain after he scored the only goal in the 2010 World Cup final when they beat the Netherlands to lift the trophy for the first time.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">He also played a key role in Spain winning the 2008 European Championship to snap a 44-year trophy drought and he was named player of the tournament when they defended the title in 2012.</p>', '2018-04-28 08:10:28', '2018-04-29 04:53:02'),
(22, '1524999152.jpg', 'There are many variations', '<p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Levante practically sealed their La Liga status by beating visiting Sevilla 2-1 with a late Jose Luis Morales goal on Friday, piling more misery on the crisis-hit Andalusians.</p><div class=\"fb-quote fb_iframe_widget\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=1499138263726489&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174766%2FLevante-move-to-brink-of-survival-with-win-over&amp;locale=en_US&amp;sdk=joey\" style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: absolute; overflow: hidden; left: 101.5px; top: 486px;\"><span style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: relative; text-align: justify; vertical-align: bottom; width: 169px; height: 47px;\"><iframe name=\"f13d2bfc4b3ded8\" width=\"1000px\" height=\"1000px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" title=\"fb:quote Facebook Social Plugin\" src=\"https://www.facebook.com/v2.5/plugins/quote.php?app_id=1499138263726489&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F2VRzCA39w_9.js%3Fversion%3D42%23cb%3Df3cc02459f3a0c8%26domain%3Den.prothomalo.com%26origin%3Dhttp%253A%252F%252Fen.prothomalo.com%252Ff30f7c6a912542c%26relation%3Dparent.parent&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174766%2FLevante-move-to-brink-of-survival-with-win-over&amp;locale=en_US&amp;sdk=joey\" class=\"\" style=\"padding: 0px; margin: 0px; outline: 0px; border-width: initial; border-style: none; position: absolute; visibility: visible; width: 169px; height: 47px;\"></iframe></span></div><p></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Forward Roger Marti put Levante ahead from close range in the 11th minute but Sevilla youngster Carlos Fernandez levelled in the 16th with a brilliant turn and thumping shot.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Levante have moved steadily away from the relegation zone since Paco Lopez succeeded the sacked Juan Muniz at the start of March and took another step towards sealing their top-flight status when Morales restored their lead in the 74th minute.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">He latched onto a through ball from Jose Campana and knocked it through goalkeeper David Soria\'s legs to put Levante on the way to their sixth victory in eight games under the new coach, which takes them within a point of clinching survival.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">The win takes Levante above Espanyol to 16th, 12 points clear of third-bottom Deportivo La Coruna, who have four games left and play at home to champions-elect Barcelona on Sunday.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Sevilla sacked sporting director Oscar Arias on Tuesday when coach Vincenzo Montella clung on to his job, but the Italian\'s position looks ever more precarious after suffering an eighth defeat in 17 league games.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Sevilla are seventh on 48 points and face a battle to stay there and qualify for the Europa League ahead of eighth-placed Getafe who also have 48 and ninth-placed Girona are on 47.</p>', '2018-04-28 08:10:37', '2018-04-29 04:52:32'),
(24, '1524999119.jpg', 'The point of using Lorem Ipsum', '<p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Bayer Leverkusen have secured the signature of Paulinho, the latest Brazilian teenager to be tipped for a big future, the German club announced on Friday.</p><div class=\"fb-quote fb_iframe_widget\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=1499138263726489&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174774%2FLeverkusen-seal-deal-with-Brazilian-Paulinho&amp;locale=en_US&amp;sdk=joey\" style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: absolute; overflow: hidden; left: 279.5px; top: 486px;\"><span style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: relative; text-align: justify; vertical-align: bottom; width: 169px; height: 47px;\"><iframe name=\"f98fb8636ef29c\" width=\"1000px\" height=\"1000px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" title=\"fb:quote Facebook Social Plugin\" src=\"https://www.facebook.com/v2.5/plugins/quote.php?app_id=1499138263726489&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F2VRzCA39w_9.js%3Fversion%3D42%23cb%3Df203546b278c654%26domain%3Den.prothomalo.com%26origin%3Dhttp%253A%252F%252Fen.prothomalo.com%252Ff7540f1239617c%26relation%3Dparent.parent&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174774%2FLeverkusen-seal-deal-with-Brazilian-Paulinho&amp;locale=en_US&amp;sdk=joey\" class=\"\" style=\"padding: 0px; margin: 0px; outline: 0px; border-width: initial; border-style: none; position: absolute; visibility: visible; width: 169px; height: 47px;\"></iframe></span></div><p></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">The 17-year-old winger, whose full name is Paulo Henrique Sampaio Filho, will move from Rio de Janeiro side Vasco da Gama on the day of his 18th birthday in July on a five-year deal.<br style=\"padding: 0px; margin: 0px; outline: 0px;\">German media reports say Leverkusen will pay up to 20 million euros for his signature ($24.2 million).<br style=\"padding: 0px; margin: 0px; outline: 0px;\">“The signing of Paulinho is a huge success for us,” said the club’s CEO Michael Schade.<br style=\"padding: 0px; margin: 0px; outline: 0px;\">Leverkusen currently sit fourth in the Bundesliga with three games remaining, meaning they are on course for a return to the Champions League next season.<br style=\"padding: 0px; margin: 0px; outline: 0px;\">Paulinho’s decision to move to the Werkself may seem surprising, but the 2002 Champions League runners-up have a history of bringing through South American talents-Brazilians Lucio and Ze Roberto are notable former players, as is Chile midfielder Arturo Vidal.<br style=\"padding: 0px; margin: 0px; outline: 0px;\">“The club has a great reputation back home and everybody knows them as a club in Europe where a lot of Brazilians have been happy,” Paulinho said in a statement on Leverkusen’s website.<br style=\"padding: 0px; margin: 0px; outline: 0px;\">“I think it’s important to fully consider a move abroad, that’s why I’ve chosen a club that works seriously and yet still pursues great ambitions.”</p>', '2018-04-29 00:08:46', '2018-04-29 04:51:59'),
(25, '1524999420.jpg', 'Sometimes on purpose', '<p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Real Madrid coach Zinedine Zidane gave Cristiano Ronaldo a day off on Saturday ahead of Tuesday\'s Champions League semi-final second leg against Bayern Munich.</p><div class=\"fb-quote fb_iframe_widget\" fb-xfbml-state=\"rendered\" fb-iframe-plugin-query=\"app_id=1499138263726489&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174797%2FReal-rest-Ronaldo-ahead-of-Bayern-return-leg&amp;locale=en_US&amp;sdk=joey\" style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: absolute; overflow: hidden; left: 276.5px; top: 486px;\"><span style=\"padding: 0px; margin: 0px; outline: 0px; display: inline-block; position: relative; text-align: justify; vertical-align: bottom; width: 169px; height: 47px;\"><iframe name=\"f3b68675adc86a4\" width=\"1000px\" height=\"1000px\" frameborder=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" allow=\"encrypted-media\" title=\"fb:quote Facebook Social Plugin\" src=\"https://www.facebook.com/v2.5/plugins/quote.php?app_id=1499138263726489&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F2VRzCA39w_9.js%3Fversion%3D42%23cb%3Df19b4eec18ce328%26domain%3Den.prothomalo.com%26origin%3Dhttp%253A%252F%252Fen.prothomalo.com%252Ff3afae0975e0414%26relation%3Dparent.parent&amp;container_width=1349&amp;href=http%3A%2F%2Fen.prothomalo.com%2Fsports%2Fnews%2F174797%2FReal-rest-Ronaldo-ahead-of-Bayern-return-leg&amp;locale=en_US&amp;sdk=joey\" class=\"\" style=\"padding: 0px; margin: 0px; outline: 0px; border-width: initial; border-style: none; position: absolute; visibility: visible; width: 169px; height: 47px;\"></iframe></span></div><p></p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Defenders Sergio Ramos and Raphael Varane were also rested for the home La Liga game with modest Madrid rivals Leganes.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Isco and Dani Carvajal miss out too&nbsp;as&nbsp;they sustained a shoulder and hamstring injury respectively in last week\'s first leg 2-1 win against the Bundesliga champions and have already been ruled out of the second leg.</p><p style=\"padding: 0px; margin-bottom: 16px; outline: 0px; overflow: hidden; color: rgb(34, 34, 34); font-family: Arial, Vrinda, FallbackBengaliFont, Helvetica, sans-serif; font-size: 16px;\">Real moved a step closer to a third straight European title when substitute Marco Asensio hit the winner in Munich last Wednesday after Bayern had taken the lead through Joshua Kimmich with Marcelo levelling just before the break.</p>', '2018-04-29 00:10:59', '2018-04-29 04:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_01_114204_create_admins_table', 1),
(4, '2018_02_01_114205_create_admin_password_resets_table', 1),
(5, '2017_12_18_061348_create_menus_table', 2),
(6, '2017_12_18_082712_create_logos_table', 2),
(7, '2017_12_18_092133_create_silders_table', 2),
(8, '2017_12_18_104142_create_services_table', 2),
(9, '2017_12_19_043718_create_testimonals_table', 2),
(10, '2017_12_19_063256_create_socials_table', 2),
(11, '2017_12_19_074614_create_footers_table', 2),
(12, '2018_01_25_220231_create_teams_table', 2),
(13, '2018_01_28_071556_create_contact_uses_table', 2),
(14, '2017_12_02_061213_create_generals_table', 3),
(15, '2018_02_05_064723_create_terms_policies_table', 3),
(16, '2018_02_05_070947_create_charge_commisions_table', 3),
(19, '2014_10_12_000000_create_users_table', 4),
(21, '2018_01_30_154801_create_tickets_table', 6),
(22, '2018_01_30_155004_create_ticket_comments_table', 6),
(23, '2017_12_28_072948_create_gateways_table', 7),
(25, '2017_12_28_105104_create_deposits_table', 8),
(27, '2018_02_11_062847_create_withdraws_table', 9),
(29, '2018_02_11_141223_create_withdraw_trasections_table', 10),
(30, '2018_02_12_062428_create_transactions_table', 11),
(31, '2018_02_18_102350_create_socials_table', 12),
(32, '2018_02_18_125849_create_member_belows_table', 13),
(33, '2018_02_18_135728_create_member_extras_table', 14),
(34, '2018_02_28_070550_create_incomes_table', 15),
(35, '2018_03_06_131031_create_advertises_table', 16),
(36, '2018_03_08_093658_create_user_advertises_table', 17),
(37, '2018_03_08_115828_create_packages_table', 18),
(38, '2018_03_08_123502_create_package_details_table', 19),
(39, '2018_04_29_110737_create_newsletters_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'pranto101201@gmail.com', '2018-04-29 05:17:08', '2018-04-29 05:17:08'),
(2, 'www.prantoroy.com@gmail.com', '2018-04-29 05:17:33', '2018-04-29 05:17:33'),
(3, 'pranto@gmail.com', '2018-04-29 05:18:09', '2018-04-29 05:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `click` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `minimum_withdraw` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `status`, `created_at`, `updated_at`, `click`, `unit_price`, `minimum_withdraw`) VALUES
(3, 'Package 1', '2000', 1, '2018-03-08 06:39:00', '2019-05-19 05:09:26', 100, 3, 500),
(4, 'Package 2', '40', 1, '2018-03-08 06:42:30', '2019-05-19 11:04:39', 200, 2.5, 1000),
(5, 'Package 3', '50', 1, '2018-03-08 07:37:37', '2018-03-08 07:40:34', 300, 9, 2000),
(6, 'Package 4', '100', 1, '2018-03-08 07:37:56', '2019-05-17 12:51:59', 500, 12, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `package_details`
--

CREATE TABLE `package_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `package_id` int(11) NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_details`
--

INSERT INTO `package_details` (`id`, `package_id`, `detail`, `created_at`, `updated_at`) VALUES
(4, 4, 'It is a long established fact that', '2018-03-08 06:42:30', '2018-03-08 07:35:35'),
(5, 4, 'It is a long established fact that', '2018-03-08 06:42:30', '2018-03-08 07:35:35'),
(6, 4, 'It is a long established fact that', '2018-03-08 06:42:30', '2018-03-08 07:35:35'),
(16, 3, 'It is a long established fact that', '2018-03-08 07:32:52', '2018-03-08 07:32:52'),
(17, 3, 'It is a long established fact that', '2018-03-08 07:32:52', '2018-03-08 07:32:52'),
(18, 3, 'It is a long established fact that', '2018-03-08 07:32:52', '2018-03-08 07:32:52'),
(19, 5, 'It is a long established fact that', '2018-03-08 07:37:37', '2018-03-08 07:37:37'),
(20, 5, 'It is a long established fact that', '2018-03-08 07:37:37', '2018-03-08 07:37:37'),
(21, 5, 'It is a long established fact that', '2018-03-08 07:37:37', '2018-03-08 07:37:37'),
(22, 6, 'It is a long established fact that', '2018-03-08 07:37:56', '2018-03-08 07:37:56'),
(23, 6, 'It is a long established fact that', '2018-03-08 07:37:56', '2018-03-08 07:37:56'),
(24, 6, 'It is a long established fact that', '2018-03-08 07:37:56', '2018-03-08 07:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `status`, `created_at`) VALUES
('www.prantoroy.com@gmail.com', 'xWyZ5lpeMLkFexeduclhp2aQHmTF9N', 0, '2018-04-29 05:24:30'),
('www.prantoroy.com@gmail.com', 'xWyZ5lpeMLkFexeduclhp2aQHmTF9N', 0, '2018-04-29 05:24:30');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'fa-archive', 'Title', 'will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident<br>', '2018-02-05 05:13:48', '2018-02-28 07:41:12'),
(4, 'fa-anchor', 'Service Title', 'will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident<br>', '2018-02-05 05:30:25', '2018-02-28 07:52:58'),
(7, 'fa-file', 'Service Title', 'will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident<br>', '2018-02-05 05:52:40', '2018-02-28 07:53:12'),
(8, 'fa-audio-description', 'Title', 'will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident<br>', '2018-04-29 07:05:07', '2018-04-29 07:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `silders`
--

CREATE TABLE `silders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `silders`
--

INSERT INTO `silders` (`id`, `image`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(20, '1556391631.jpg', 'Why do we use it?', 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose injected humour and the', '2018-02-14 16:25:42', '2019-04-27 14:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(1, 'fa-twitter', 'https://twitter.com/thesoftking', '2018-02-18 04:33:29', '2018-03-19 12:54:39'),
(3, 'fa-facebook', 'https://www.facebook.com/', '2018-02-18 04:51:34', '2018-03-19 12:54:49'),
(4, 'fa-youtube', 'https://www.youtube.com/', '2018-02-18 04:53:57', '2018-03-19 12:54:59'),
(5, 'fa-instagram', 'https://www.instagram.com/', '2018-02-18 04:54:14', '2018-03-19 12:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `image`, `facebook`, `linkedin`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'Jhon', 'Developer', '1517748742.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '2018-02-04 06:50:42', '2018-02-06 05:06:48'),
(2, 'Kallu Mamah', 'Designer', '1517748662.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '2018-02-04 06:51:02', '2018-02-06 05:06:27'),
(3, 'Chainse Girl', 'Developer', '1517748686.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '2018-02-04 06:51:26', '2018-02-06 05:06:15'),
(4, 'Batista Chohan', 'Solving', '1517915419.jpg', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '2018-02-06 05:05:53', '2018-02-06 05:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonals`
--

CREATE TABLE `testimonals` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonals`
--

INSERT INTO `testimonals` (`id`, `image`, `name`, `company`, `star`, `comment`, `created_at`, `updated_at`) VALUES
(1, '1524919899.jpg', 'Username', 'Your Company', '4', 'Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2018-02-04 06:54:59', '2019-05-17 13:00:33'),
(3, '1517916026.jpg', 'Username', 'Your Company', '3', 'Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2018-02-04 23:28:12', '2019-05-17 13:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket`, `subject`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CA269197', 'sdfghjkl', 11, 2, '2018-03-05 06:51:16', '2018-03-05 07:22:51'),
(2, '01C15FED', 'sdfghjkl', 23, 2, '2018-03-05 07:52:16', '2019-04-24 12:20:00'),
(3, '0A05A2A8', 'dfghjkl', 11, 1, '2018-04-28 03:52:57', '2018-04-28 03:52:57'),
(4, 'A10E4FE9', 'lklkl', 29, 9, '2019-05-01 07:43:19', '2019-05-01 07:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_comments`
--

INSERT INTO `ticket_comments` (`id`, `ticket_id`, `type`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'CA269197', 1, 'sdfgthjl;', '2018-03-05 06:51:16', '2018-03-05 06:51:16'),
(2, 'CA269197', 0, 'edrftu', '2018-03-05 07:22:51', '2018-03-05 07:22:51'),
(3, '01C15FED', 1, 'azfgjk', '2018-03-05 07:52:17', '2018-03-05 07:52:17'),
(4, '0A05A2A8', 1, 'dfghujikl;', '2018-04-28 03:52:57', '2018-04-28 03:52:57'),
(5, '01C15FED', 0, 'fdgfd', '2019-04-24 12:20:00', '2019-04-24 12:20:00'),
(6, 'A10E4FE9', 1, 'lklklklklk', '2019-05-01 07:43:19', '2019-05-01 07:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `trans_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `trans_id`, `time`, `description`, `amount`, `new_balance`, `type`, `created_at`, `updated_at`, `charge`) VALUES
(148, 11, '882864238', '2018-03-01 13:24:53', 'ADD FUND#ID-DP1040786733', '100', '100', 1, '2018-03-01 07:24:53', '2018-03-01 07:24:53', ''),
(149, 1, '1270154692', '2018-03-01 13:25:02', 'REFERRAL COMMISSION#ID-REF1397331782', '10', '10', 1, '2018-03-01 07:25:02', '2018-03-01 07:25:02', ''),
(150, 11, '1576455916', '2018-03-01 13:25:02', 'UPGRADE TO PREMIUM#ID-UPDATE2072714780', '-50', '50', 2, '2018-03-01 07:25:02', '2018-03-01 07:25:02', ''),
(151, 12, '1538994265', '2018-03-01 13:27:40', 'ADD FUND#ID-DP1258253513', '150', '150', 1, '2018-03-01 07:27:40', '2018-03-01 07:27:40', ''),
(152, 11, '94176784', '2018-03-01 13:27:49', 'REFERRAL COMMISSION#ID-REF142712785', '10', '60', 1, '2018-03-01 07:27:49', '2018-03-01 07:27:49', ''),
(153, 12, '401760444', '2018-03-01 13:27:49', 'UPGRADE TO PREMIUM#ID-UPDATE839344240', '-50', '100', 2, '2018-03-01 07:27:49', '2018-03-01 07:27:49', ''),
(154, 13, '1157565836', '2018-03-01 13:30:20', 'ADD FUND#ID-DP374522286', '100', '100', 1, '2018-03-01 07:30:20', '2018-03-01 07:30:20', ''),
(155, 11, '1407560216', '2018-03-01 13:30:28', 'REFERRAL COMMISSION#ID-REF734105268', '10', '70', 1, '2018-03-01 07:30:28', '2018-03-01 07:30:28', ''),
(156, 13, '1450256633', '2018-03-01 13:30:28', 'UPGRADE TO PREMIUM#ID-UPDATE9929462', '-50', '50', 2, '2018-03-01 07:30:28', '2018-03-01 07:30:28', ''),
(157, 11, '1465187121', '2018-03-01 13:30:56', 'Matching Bonus Of 1 Users', '2', '72', 1, '2018-03-01 07:30:56', '2018-03-01 07:30:56', ''),
(158, 14, '42845741', '2018-03-01 13:48:10', 'ADD FUND#ID-DP2136838413', '1000', '1000', 1, '2018-03-01 07:48:10', '2018-03-01 07:48:10', ''),
(159, 1, '866969185', '2018-03-01 13:49:00', 'REFERRAL COMMISSION#ID-REF220270646', '10', '20', 1, '2018-03-01 07:49:00', '2018-03-01 07:49:00', ''),
(160, 14, '2109115175', '2018-03-01 13:49:00', 'UPGRADE TO PREMIUM#ID-UPDATE629524360', '-50', '950', 2, '2018-03-01 07:49:00', '2018-03-01 07:49:00', ''),
(161, 1, '992688864', '2018-03-01 14:12:36', 'ADD FUND#ID-DP1546761973', '5002', '5022', 1, '2018-03-01 08:12:36', '2018-03-01 08:12:36', ''),
(162, 1, '1428420290', '2018-03-01 14:13:09', 'WITHDRAW#ID-WD121820506', '-500', '4509.5', 2, '2018-03-01 08:13:09', '2018-03-01 08:13:09', ''),
(163, 1, '1692883318', '2018-03-01 14:14:22', 'BALANCE TRANSFER#ID-BT61249084', '10', '4499.2', 3, '2018-03-01 08:14:22', '2018-03-01 08:14:22', ''),
(164, 1, '593419879', '2018-03-01 14:35:24', 'Matching Bonus Of 1 Users', '2', '9501.2', 1, '2018-03-01 08:35:24', '2018-03-01 08:35:24', ''),
(165, 1, '1402850289', '2018-03-01 14:38:17', 'Matching Bonus Of 99 Users', '198', '9699.2', 1, '2018-03-01 08:38:17', '2018-03-01 08:38:17', ''),
(166, 11, '1438103576', '2018-03-03 06:46:18', 'ADD FUND#ID-DP1823489918', '500', '572', 1, '2018-03-03 00:46:18', '2018-03-03 00:46:18', ''),
(167, 11, '461438469', '2018-03-03 08:07:35', 'BALANCE TRANSFER#ID-BT333514044', '100', '469', 3, '2018-03-03 02:07:35', '2018-03-03 02:07:35', ''),
(168, 11, '452898876', '2018-03-03 11:07:46', 'ADD FUND#ID-DP233202587', '1000', '1469', 1, '2018-03-03 05:07:46', '2018-03-03 05:07:46', NULL),
(169, 11, '445991657', '2018-03-03 11:37:55', 'BALANCE TRANSFER#ID-BT1489498719', '500', '954', 3, '2018-03-03 05:37:55', '2018-03-03 05:37:55', NULL),
(170, 11, '1995752843', '2018-03-03 11:38:30', 'BALANCE TRANSFER#ID-BT48476917', '500', '439', 3, '2018-03-03 05:38:30', '2018-03-03 05:38:30', NULL),
(171, 11, '1055187895', '2018-03-03 12:10:32', 'WITHDRAW#ID-WD996207719', '-300', '129.5', 2, '2018-03-03 06:10:32', '2018-03-03 06:10:32', '9.5'),
(172, 11, '2055439824', '2018-03-03 12:13:20', 'BALANCE TRANSFER#ID-BT587319240', '50', '78', 3, '2018-03-03 06:13:20', '2018-03-03 06:13:20', '1.5'),
(173, 12, '1277713975', '2018-03-04 10:53:38', 'ADMIN#ID-ADD516258649', '200', '1150', 5, '2018-03-04 04:53:38', '2018-03-04 04:53:38', NULL),
(174, 1, '309088592', '2018-03-04 10:55:38', 'ADMIN#ID-SUBTRACT1575729615', '-500', '9199.2', 6, '2018-03-04 04:55:38', '2018-03-04 04:55:38', NULL),
(175, 1, '1792713687', '2018-03-04 10:55:48', 'ADMIN#ID-ADD2134518428', '500', '9699.2', 5, '2018-03-04 04:55:48', '2018-03-04 04:55:48', NULL),
(176, 11, '2057533063', '2018-03-04 10:56:06', 'ADMIN#ID-SUBTRACT494361207', '-20', '58', 6, '2018-03-04 04:56:06', '2018-03-04 04:56:06', NULL),
(177, 11, '1585173014', '2018-03-04 10:56:13', 'ADMIN#ID-SUBTRACT1177175348', '-8', '50', 6, '2018-03-04 04:56:13', '2018-03-04 04:56:13', NULL),
(178, 23, '109065285', '2018-03-05 13:28:44', 'ADD FUND#ID-DP1493039367', '555', '555', 1, '2018-03-05 07:28:44', '2018-03-05 07:28:44', NULL),
(179, 23, '183566512', '2018-03-05 13:32:43', 'WITHDRAW#ID-WD270303319', '-500', '34.5', 2, '2018-03-05 07:32:43', '2018-03-05 07:32:43', '20.5'),
(180, 12, '560004860', '2018-03-08 11:16:37', 'CLICKADD#ID-CA199389515', '0.5', '1155.5', 1, '2018-03-08 05:16:37', '2018-03-08 05:16:37', NULL),
(181, 12, '72388204', '2018-03-08 11:17:07', 'CLICKADD#ID-CA946644732', '1', '1156.5', 1, '2018-03-08 05:17:07', '2018-03-08 05:17:07', NULL),
(182, 12, '513494390', '2018-03-08 11:18:55', 'CLICKADD#ID-CA1820017197', '0.6', '1157.1', 1, '2018-03-08 05:18:55', '2018-03-08 05:18:55', NULL),
(183, 11, '22620019', '2018-03-10 06:06:08', 'BUYPACKAGE#ID-BP1548637117', '-50', '7.200000000000003', 9, '2018-03-10 00:06:08', '2018-03-10 00:06:08', NULL),
(184, 11, '2036892130', '2018-03-10 06:09:41', 'ADD FUND#ID-DP1968406472', '200', '207.2', 1, '2018-03-10 00:09:41', '2018-03-10 00:09:41', NULL),
(185, 11, '1284850297', '2018-03-10 06:10:32', 'BUYPACKAGE#ID-BP2137584939', '-25', '182.2', 9, '2018-03-10 00:10:32', '2018-03-10 00:10:32', NULL),
(186, 11, '92237200', '2018-03-10 06:15:41', 'BUYPACKAGE#ID-BP2074397657', '-100', '82.19999999999999', 9, '2018-03-10 00:15:41', '2018-03-10 00:15:41', NULL),
(187, 11, '2094084203', '2018-03-10 07:48:26', 'BACKMONEY#ID-BM954339280', '50', '182.2', 1, '2018-03-10 01:48:26', '2018-03-10 01:48:26', NULL),
(188, 13, '446791632', '2018-03-10 08:20:20', 'CLICKADD#ID-CA2102570872', '2', '568.4000000000001', 1, '2018-03-10 02:20:20', '2018-03-10 02:20:20', NULL),
(189, 13, '750868346', '2018-03-10 08:20:38', 'CLICKADD#ID-CA195446497', '2', '570.4000000000001', 1, '2018-03-10 02:20:38', '2018-03-10 02:20:38', NULL),
(190, 12, '494673672', '2018-03-10 08:22:06', 'CLICKADD#ID-CA486235877', '0.6', '1157.6999999999998', 1, '2018-03-10 02:22:06', '2018-03-10 02:22:06', NULL),
(191, 1, '1742467644', '2018-03-10 08:30:45', 'CLICKADD#ID-CA1123950204', '2', '9701.2', 1, '2018-03-10 02:30:45', '2018-03-10 02:30:45', NULL),
(192, 14, '1846603590', '2018-03-10 08:31:26', 'CLICKADD#ID-CA196965170', '0.2', '950.2', 1, '2018-03-10 02:31:26', '2018-03-10 02:31:26', NULL),
(193, 15, '2007503517', '2018-03-10 08:34:24', 'CLICKADD#ID-CA1294818610', '2', '2', 1, '2018-03-10 02:34:24', '2018-03-10 02:34:24', NULL),
(194, 15, '2022863973', '2018-03-10 08:34:26', 'CLICKADD#ID-CA1508053564', '2', '4', 1, '2018-03-10 02:34:26', '2018-03-10 02:34:26', NULL),
(195, 15, '1494882145', '2018-03-10 08:34:27', 'CLICKADD#ID-CA546240393', '2', '6', 1, '2018-03-10 02:34:27', '2018-03-10 02:34:27', NULL),
(196, 15, '1264742730', '2018-03-10 08:34:27', 'CLICKADD#ID-CA1770429695', '2', '8', 1, '2018-03-10 02:34:27', '2018-03-10 02:34:27', NULL),
(197, 15, '35721199', '2018-03-10 08:35:20', 'CLICKADD#ID-CA1795364135', '0.5', '8.5', 1, '2018-03-10 02:35:20', '2018-03-10 02:35:20', NULL),
(198, 19, '147762785', '2018-03-10 08:40:09', 'CLICKADD#ID-CA1218626376', '0.5', '0.5', 1, '2018-03-10 02:40:09', '2018-03-10 02:40:09', NULL),
(199, 22, '446344239', '2018-03-10 08:47:09', 'CLICKADD#ID-CA927194733', '0.6', '0.6', 1, '2018-03-10 02:47:09', '2018-03-10 02:47:09', NULL),
(200, 22, '1522661789', '2018-03-10 08:47:24', 'CLICKADD#ID-CA895233455', '1', '1.6', 1, '2018-03-10 02:47:24', '2018-03-10 02:47:24', NULL),
(201, 21, '2085196660', '2018-03-10 08:49:24', 'CLICKADD#ID-CA570818573', '0.5', '0.5', 1, '2018-03-10 02:49:24', '2018-03-10 02:49:24', NULL),
(202, 21, '469793594', '2018-03-10 08:49:38', 'CLICKADD#ID-CA226883967', '0.6', '1.1', 1, '2018-03-10 02:49:38', '2018-03-10 02:49:38', NULL),
(203, 11, '1213152919', '2018-03-10 10:49:42', 'CLICKADD#ID-CA854009733', '2', '184.2', 1, '2018-03-10 04:49:42', '2018-03-10 04:49:42', NULL),
(204, 22, '352992886', '2018-03-10 10:50:55', 'CLICKADD#ID-CA361044929', '2', '3.6', 1, '2018-03-10 04:50:55', '2018-03-10 04:50:55', NULL),
(205, 22, '160524224', '2018-03-10 10:51:07', 'CLICKADD#ID-CA272282742', '0.2', '3.8000000000000003', 1, '2018-03-10 04:51:07', '2018-03-10 04:51:07', NULL),
(206, 22, '237472309', '2018-03-10 10:51:57', 'ADD FUND#ID-DP1456553781', '100', '103.8', 1, '2018-03-10 04:51:57', '2018-03-10 04:51:57', NULL),
(207, 22, '1297221891', '2018-03-10 10:52:24', 'BUYPACKAGE#ID-BPPackage 2', '-40', '63.8', 9, '2018-03-10 04:52:24', '2018-03-10 04:52:24', NULL),
(208, 12, '1714066048', '2018-03-10 10:56:45', 'CLICKADD#ID-CA1637859306', '2', '1159.6999999999998', 1, '2018-03-10 04:56:45', '2018-03-10 04:56:45', NULL),
(209, 12, '540978100', '2018-03-10 10:56:45', 'CLICKADD#ID-CA487955961', '2', '1161.6999999999998', 1, '2018-03-10 04:56:45', '2018-03-10 04:56:45', NULL),
(210, 12, '1879093494', '2018-03-10 10:56:45', 'CLICKADD#ID-CA2079078891', '2', '1163.6999999999998', 1, '2018-03-10 04:56:45', '2018-03-10 04:56:45', NULL),
(211, 12, '718869686', '2018-03-10 10:58:04', 'CLICKADD#ID-CA583318976', '0.6', '1164.2999999999997', 1, '2018-03-10 04:58:04', '2018-03-10 04:58:04', NULL),
(212, 12, '137660444', '2018-03-10 10:58:22', 'CLICKADD#ID-CA429758921', '1', '1165.2999999999997', 1, '2018-03-10 04:58:22', '2018-03-10 04:58:22', NULL),
(213, 12, '981656736', '2018-03-10 10:58:23', 'CLICKADD#ID-CA2022455448', '1', '1166.2999999999997', 1, '2018-03-10 04:58:23', '2018-03-10 04:58:23', NULL),
(214, 12, '44307122', '2018-03-10 10:58:23', 'CLICKADD#ID-CA410136309', '1', '1167.2999999999997', 1, '2018-03-10 04:58:23', '2018-03-10 04:58:23', NULL),
(215, 12, '1988119101', '2018-03-10 11:00:44', 'CLICKADD#ID-CA1348609674', '1', '1168.2999999999997', 1, '2018-03-10 05:00:44', '2018-03-10 05:00:44', NULL),
(216, 12, '551214010', '2018-03-10 11:02:57', 'CLICKADD#ID-CA176442376', '2', '1170.2999999999997', 1, '2018-03-10 05:02:57', '2018-03-10 05:02:57', NULL),
(217, 11, '1101957123', '2018-03-10 11:12:01', 'CLICKADD#ID-CA219559943', '2', '186.2', 1, '2018-03-10 05:12:01', '2018-03-10 05:12:01', NULL),
(218, 13, '1865051103', '2018-03-10 11:24:29', 'CLICKADD#ID-CA1065569606', '0.6', '571.0000000000001', 1, '2018-03-10 05:24:29', '2018-03-10 05:24:29', NULL),
(219, 13, '982707408', '2018-03-10 11:24:44', 'CLICKADD#ID-CA192773125', '1', '572.0000000000001', 1, '2018-03-10 05:24:44', '2018-03-10 05:24:44', NULL),
(220, 13, '1878137156', '2018-03-10 11:25:09', 'CLICKADD#ID-CA1216445861', '2', '574.0000000000001', 1, '2018-03-10 05:25:09', '2018-03-10 05:25:09', NULL),
(221, 13, '238254868', '2018-03-10 11:25:44', 'CLICKADD#ID-CA2141306947', '1', '575.0000000000001', 1, '2018-03-10 05:25:44', '2018-03-10 05:25:44', NULL),
(222, 13, '1153343048', '2018-03-10 11:25:44', 'CLICKADD#ID-CA431940914', '1', '576.0000000000001', 1, '2018-03-10 05:25:44', '2018-03-10 05:25:44', NULL),
(223, 13, '1403015180', '2018-03-10 11:27:10', 'CLICKADD#ID-CA1148115708', '1', '577.0000000000001', 1, '2018-03-10 05:27:10', '2018-03-10 05:27:10', NULL),
(224, 13, '1547353074', '2018-03-10 11:27:10', 'CLICKADD#ID-CA805817099', '1', '578.0000000000001', 1, '2018-03-10 05:27:10', '2018-03-10 05:27:10', NULL),
(225, 13, '206761354', '2018-03-10 11:27:10', 'CLICKADD#ID-CA192288888', '1', '579.0000000000001', 1, '2018-03-10 05:27:10', '2018-03-10 05:27:10', NULL),
(226, 13, '1812560315', '2018-03-10 11:27:11', 'CLICKADD#ID-CA712967787', '1', '580.0000000000001', 1, '2018-03-10 05:27:11', '2018-03-10 05:27:11', NULL),
(227, 13, '389495102', '2018-03-10 11:27:11', 'CLICKADD#ID-CA117800114', '1', '581.0000000000001', 1, '2018-03-10 05:27:11', '2018-03-10 05:27:11', NULL),
(228, 13, '1786289627', '2018-03-10 11:27:11', 'CLICKADD#ID-CA1709280985', '1', '582.0000000000001', 1, '2018-03-10 05:27:11', '2018-03-10 05:27:11', NULL),
(229, 13, '343592794', '2018-03-10 11:27:12', 'CLICKADD#ID-CA847368715', '1', '583.0000000000001', 1, '2018-03-10 05:27:12', '2018-03-10 05:27:12', NULL),
(230, 14, '2023638958', '2018-03-10 11:29:02', 'CLICKADD#ID-CA777160965', '2', '952.2', 1, '2018-03-10 05:29:02', '2018-03-10 05:29:02', NULL),
(231, 14, '114593126', '2018-03-10 11:29:03', 'CLICKADD#ID-CA744739216', '2', '954.2', 1, '2018-03-10 05:29:03', '2018-03-10 05:29:03', NULL),
(232, 14, '1808380338', '2018-03-10 11:29:37', 'CLICKADD#ID-CA412523066', '1', '955.2', 1, '2018-03-10 05:29:37', '2018-03-10 05:29:37', NULL),
(233, 14, '1134858874', '2018-03-10 11:29:37', 'CLICKADD#ID-CA1491881450', '1', '956.2', 1, '2018-03-10 05:29:37', '2018-03-10 05:29:37', NULL),
(234, 14, '1552702985', '2018-03-10 11:29:52', 'CLICKADD#ID-CA758721427', '1', '957.2', 1, '2018-03-10 05:29:52', '2018-03-10 05:29:52', NULL),
(235, 14, '427767642', '2018-03-10 11:32:14', 'CLICKADD#ID-CA1977056738', '2', '959.2', 1, '2018-03-10 05:32:14', '2018-03-10 05:32:14', NULL),
(236, 14, '359083736', '2018-03-10 11:32:48', 'CLICKADD#ID-CA1710098885', '0.6', '959.8000000000001', 1, '2018-03-10 05:32:48', '2018-03-10 05:32:48', NULL),
(237, 14, '1920441493', '2018-03-10 11:32:48', 'CLICKADD#ID-CA1718011581', '0.6', '960.4000000000001', 1, '2018-03-10 05:32:48', '2018-03-10 05:32:48', NULL),
(238, 15, '1473772063', '2018-03-10 11:33:52', 'CLICKADD#ID-CA1593890323', '1', '9.5', 1, '2018-03-10 05:33:52', '2018-03-10 05:33:52', NULL),
(239, 15, '1836904642', '2018-03-10 11:33:53', 'CLICKADD#ID-CA1602457866', '1', '10.5', 1, '2018-03-10 05:33:53', '2018-03-10 05:33:53', NULL),
(240, 15, '417059486', '2018-03-10 11:33:53', 'CLICKADD#ID-CA2035682594', '1', '11.5', 1, '2018-03-10 05:33:53', '2018-03-10 05:33:53', NULL),
(241, 15, '50236121', '2018-03-10 11:33:54', 'CLICKADD#ID-CA5334678', '1', '12.5', 1, '2018-03-10 05:33:54', '2018-03-10 05:33:54', NULL),
(242, 15, '511810572', '2018-03-10 11:33:54', 'CLICKADD#ID-CA1736064541', '1', '13.5', 1, '2018-03-10 05:33:54', '2018-03-10 05:33:54', NULL),
(243, 15, '79631662', '2018-03-10 11:33:54', 'CLICKADD#ID-CA892956719', '1', '14.5', 1, '2018-03-10 05:33:54', '2018-03-10 05:33:54', NULL),
(244, 15, '945435957', '2018-03-10 11:33:54', 'CLICKADD#ID-CA2107270581', '1', '15.5', 1, '2018-03-10 05:33:54', '2018-03-10 05:33:54', NULL),
(245, 15, '788808474', '2018-03-10 11:33:54', 'CLICKADD#ID-CA110626032', '1', '16.5', 1, '2018-03-10 05:33:54', '2018-03-10 05:33:54', NULL),
(246, 15, '1657573381', '2018-03-10 11:33:55', 'CLICKADD#ID-CA782367812', '1', '17.5', 1, '2018-03-10 05:33:55', '2018-03-10 05:33:55', NULL),
(247, 15, '1381529600', '2018-03-10 11:33:55', 'CLICKADD#ID-CA1484332603', '1', '18.5', 1, '2018-03-10 05:33:55', '2018-03-10 05:33:55', NULL),
(248, 15, '2068006147', '2018-03-10 11:33:55', 'CLICKADD#ID-CA1698854518', '1', '19.5', 1, '2018-03-10 05:33:55', '2018-03-10 05:33:55', NULL),
(249, 15, '1750321958', '2018-03-10 11:33:55', 'CLICKADD#ID-CA1258924980', '1', '20.5', 1, '2018-03-10 05:33:55', '2018-03-10 05:33:55', NULL),
(250, 15, '810824923', '2018-03-10 11:33:55', 'CLICKADD#ID-CA447767475', '1', '21.5', 1, '2018-03-10 05:33:55', '2018-03-10 05:33:55', NULL),
(251, 15, '1361439231', '2018-03-10 11:33:55', 'CLICKADD#ID-CA322510852', '1', '22.5', 1, '2018-03-10 05:33:55', '2018-03-10 05:33:55', NULL),
(252, 15, '1196165147', '2018-03-10 11:33:56', 'CLICKADD#ID-CA1066835366', '1', '23.5', 1, '2018-03-10 05:33:56', '2018-03-10 05:33:56', NULL),
(253, 15, '290457933', '2018-03-10 11:33:56', 'CLICKADD#ID-CA475738409', '1', '24.5', 1, '2018-03-10 05:33:56', '2018-03-10 05:33:56', NULL),
(254, 15, '8258715', '2018-03-10 11:33:56', 'CLICKADD#ID-CA2114031046', '1', '25.5', 1, '2018-03-10 05:33:56', '2018-03-10 05:33:56', NULL),
(255, 15, '1564205326', '2018-03-10 11:33:56', 'CLICKADD#ID-CA1593251703', '1', '26.5', 1, '2018-03-10 05:33:56', '2018-03-10 05:33:56', NULL),
(256, 15, '1140727869', '2018-03-10 11:37:30', 'CLICKADD#ID-CA1638982731', '2', '28.5', 1, '2018-03-10 05:37:30', '2018-03-10 05:37:30', NULL),
(257, 15, '1497748246', '2018-03-10 11:38:08', 'CLICKADD#ID-CA496930893', '1', '29.5', 1, '2018-03-10 05:38:08', '2018-03-10 05:38:08', NULL),
(258, 15, '443762286', '2018-03-10 11:38:51', 'CLICKADD#ID-CA1592570069', '0.6', '30.1', 1, '2018-03-10 05:38:51', '2018-03-10 05:38:51', NULL),
(259, 15, '1727120506', '2018-03-10 11:39:49', 'CLICKADD#ID-CA1235043349', '1', '31.1', 1, '2018-03-10 05:39:49', '2018-03-10 05:39:49', NULL),
(260, 17, '742643296', '2018-03-10 11:40:56', 'CLICKADD#ID-CA1072874806', '1', '1', 1, '2018-03-10 05:40:56', '2018-03-10 05:40:56', NULL),
(261, 17, '1573227779', '2018-03-10 11:41:41', 'CLICKADD#ID-CA1997972343', '2', '3', 1, '2018-03-10 05:41:41', '2018-03-10 05:41:41', NULL),
(262, 17, '2024125701', '2018-03-10 11:42:55', 'CLICKADD#ID-CA977916123', '1', '4', 1, '2018-03-10 05:42:55', '2018-03-10 05:42:55', NULL),
(263, 18, '37777209', '2018-03-10 11:56:48', 'CLICKADD#ID-CA1582024139', '0.6', '0.6', 1, '2018-03-10 05:56:48', '2018-03-10 05:56:48', NULL),
(264, 18, '1689538541', '2018-03-10 11:57:07', 'CLICKADD#ID-CA1295051685', '1', '1.6', 1, '2018-03-10 05:57:07', '2018-03-10 05:57:07', NULL),
(265, 18, '79279086', '2018-03-10 11:57:44', 'CLICKADD#ID-CA1343102864', '1', '2.6', 1, '2018-03-10 05:57:44', '2018-03-10 05:57:44', NULL),
(266, 11, '447873722', '2018-03-10 12:21:04', 'ADD FUND#ID-DP1914790387', '100', '286.2', 1, '2018-03-10 06:21:04', '2018-03-10 06:21:04', NULL),
(267, 11, '1029694474', '2018-03-12 03:16:45', 'WITHDRAW#ID-WD1031211384', '-100', '179.89999999999998', 2, '2018-03-12 08:16:45', '2018-03-12 08:16:45', '6.3'),
(268, 1, '641118365', '2018-03-12 09:15:01', 'CLICKADD#ID-CA1955864606', '1', '9702.2', 1, '2018-03-12 14:15:01', '2018-03-12 14:15:01', NULL),
(269, 1, '694039202', '2018-03-12 09:16:03', 'CLICKADD#ID-CA553624586', '2', '9704.2', 1, '2018-03-12 14:16:03', '2018-03-12 14:16:03', NULL),
(270, 1, '1358239051', '2018-03-12 09:23:16', 'CLICKADD#ID-CA1825126870', '1', '9705.2', 1, '2018-03-12 14:23:16', '2018-03-12 14:23:16', NULL),
(271, 1, '1004331699', '2018-03-12 09:23:43', 'CLICKADD#ID-CA25672770', '2', '9707.2', 1, '2018-03-12 14:23:43', '2018-03-12 14:23:43', NULL),
(272, 1, '966182549', '2018-03-12 09:24:01', 'CLICKADD#ID-CA285456867', '1', '9708.2', 1, '2018-03-12 14:24:01', '2018-03-12 14:24:01', NULL),
(273, 11, '1899096444', '2018-03-12 10:05:01', 'CLICKADD#ID-CA323930691', '2', '181.89999999999998', 1, '2018-03-12 15:05:01', '2018-03-12 15:05:01', NULL),
(274, 1, '1022677490', '2018-03-14 12:43:54', 'CLICKADD#ID-CA1240366399', '1', '9709.2', 1, '2018-03-14 17:43:54', '2018-03-14 17:43:54', NULL),
(275, 1, '1351256036', '2018-03-14 13:06:27', 'BUYPACKAGE#ID-BPPackage 1', '-25', '9684.2', 9, '2018-03-14 18:06:27', '2018-03-14 18:06:27', NULL),
(276, 1, '583085681', '2018-03-17 05:22:37', 'CLICKADD#ID-CA1255774443', '2', '9686.2', 1, '2018-03-17 10:22:37', '2018-03-17 10:22:37', NULL),
(277, 1, '573389296', '2018-03-17 05:23:45', 'CLICKADD#ID-CA2004925298', '2', '9688.2', 1, '2018-03-17 10:23:45', '2018-03-17 10:23:45', NULL),
(278, 1, '371010786', '2018-03-17 05:23:57', 'CLICKADD#ID-CA1062711803', '2', '9690.2', 1, '2018-03-17 10:23:57', '2018-03-17 10:23:57', NULL),
(279, 1, '2061769032', '2018-03-17 05:24:11', 'CLICKADD#ID-CA242434320', '2', '9692.2', 1, '2018-03-17 10:24:11', '2018-03-17 10:24:11', NULL),
(280, 1, '1026388925', '2018-03-17 05:24:52', 'CLICKADD#ID-CA1178155191', '2', '9694.2', 1, '2018-03-17 10:24:52', '2018-03-17 10:24:52', NULL),
(281, 1, '1582445199', '2018-03-17 05:25:08', 'CLICKADD#ID-CA2094855256', '2', '9696.2', 1, '2018-03-17 10:25:08', '2018-03-17 10:25:08', NULL),
(282, 11, '893529037', '2018-03-17 05:49:09', 'CLICKADD#ID-CA1976311313', '0.5', '182.39999999999998', 1, '2018-03-17 10:49:09', '2018-03-17 10:49:09', NULL),
(283, 11, '2081550443', '2018-03-17 06:48:41', 'CLICKADD#ID-CA425485983', '0.5', '182.89999999999998', 1, '2018-03-17 11:48:41', '2018-03-17 11:48:41', NULL),
(284, 11, '1094872593', '2018-03-17 06:49:03', 'CLICKADD#ID-CA1482595781', '1', '183.89999999999998', 1, '2018-03-17 11:49:03', '2018-03-17 11:49:03', NULL),
(285, 11, '739614894', '2018-03-17 06:52:10', 'CLICKADD#ID-CA845627633', '2', '185.89999999999998', 1, '2018-03-17 11:52:10', '2018-03-17 11:52:10', NULL),
(286, 11, '776326436', '2018-03-17 06:55:40', 'CLICKADD#ID-CA1830301721', '2', '187.89999999999998', 1, '2018-03-17 11:55:40', '2018-03-17 11:55:40', NULL),
(287, 11, '1287637719', '2018-03-17 07:29:22', 'CLICKADD#ID-CA161048203', '1', '188.89999999999998', 1, '2018-03-17 12:29:22', '2018-03-17 12:29:22', NULL),
(288, 11, '553200641', '2018-03-17 07:40:48', 'CLICKADD#ID-CA50339220', '0.5', '189.39999999999998', 1, '2018-03-17 12:40:48', '2018-03-17 12:40:48', NULL),
(289, 1, '1421172927', '2018-04-26 12:15:20', 'CLICKADD#ID-CA687557392', '1', '9697.2', 1, '2018-04-26 06:15:20', '2018-04-26 06:15:20', NULL),
(290, 1, '1191335989', '2018-04-26 13:00:49', 'CLICKADD#ID-CA1467288268', '1', '9698.2', 1, '2018-04-26 07:00:49', '2018-04-26 07:00:49', NULL),
(291, 1, '1506292289', '2018-04-26 13:01:51', 'CLICKADD#ID-CA1500237457', '1', '9699.2', 1, '2018-04-26 07:01:51', '2018-04-26 07:01:51', NULL),
(292, 1, '1057066608', '2018-04-26 13:03:46', 'WITHDRAW#ID-WD21459277', '-500', '9186.7', 2, '2018-04-26 07:03:46', '2018-04-26 07:03:46', '12.5'),
(293, 11, '623535851', '2018-04-28 10:03:17', 'WITHDRAW#ID-WD296814273', '-50', '133.64999999999998', 2, '2018-04-28 04:03:17', '2018-04-28 04:03:17', '5.75'),
(294, 11, '214248052', '2018-04-28 10:03:55', 'ADD FUND#ID-DP1554606593', '5000', '5133.65', 1, '2018-04-28 04:03:55', '2018-04-28 04:03:55', NULL),
(295, 11, '1537251948', '2018-04-28 10:04:16', 'BALANCE TRANSFER#ID-BT1566976737', '200', '4927.65', 3, '2018-04-28 04:04:16', '2018-04-28 04:04:16', '6'),
(296, 11, '388715637', '2018-04-28 10:28:18', 'CLICKADD#ID-CA1991692803', '1', '4928.65', 1, '2018-04-28 04:28:18', '2018-04-28 04:28:18', NULL),
(297, 11, '1793336220', '2018-04-28 10:38:45', 'BUYPACKAGE#ID-BPPackage 3', '-50', '4878.65', 9, '2018-04-28 04:38:45', '2018-04-28 04:38:45', NULL),
(298, 25, '1134806435', '2018-04-29 10:45:45', 'CLICKADD#ID-CA379085833', '1', '1', 1, '2018-04-29 04:45:45', '2018-04-29 04:45:45', NULL),
(299, 11, '595866865', '2018-04-29 13:18:45', 'ADD FUND#ID-DP181319500', '500', '5378.65', 1, '2018-04-29 07:18:45', '2018-04-29 07:18:45', NULL),
(300, 11, '94495495', '2018-04-29 13:18:45', 'ADD FUND#ID-DP1472948275', '500', '5378.65', 1, '2018-04-29 07:18:45', '2018-04-29 07:18:45', NULL),
(301, 24, '1234442834', '2018-05-07 13:55:49', 'REFERRAL COMMISSION#ID-REF1756499297', '10', '10', 1, '2018-05-07 07:55:49', '2018-05-07 07:55:49', '0'),
(302, 24, '193192855', '2018-05-07 13:56:17', 'REFERRAL COMMISSION#ID-REF1819865528', '10', '20', 1, '2018-05-07 07:56:17', '2018-05-07 07:56:17', '0'),
(303, 25, '1119349861', '2018-05-07 13:56:17', 'TREE BONUS#ID-BONUS2116993178', '0.02', '1.02', 1, '2018-05-07 07:56:17', '2018-05-07 07:56:17', NULL),
(304, 24, '507360858', '2018-05-07 13:56:17', 'TREE BONUS#ID-BONUS369844706', '0.02', '20.02', 1, '2018-05-07 07:56:17', '2018-05-07 07:56:17', NULL),
(305, 23, '167843811', '2018-05-07 13:56:18', 'TREE BONUS#ID-BONUS1716374045', '0.02', '555.02', 1, '2018-05-07 07:56:18', '2018-05-07 07:56:18', NULL),
(306, 22, '854821084', '2018-05-07 13:56:18', 'TREE BONUS#ID-BONUS1211393894', '0.02', '63.82', 1, '2018-05-07 07:56:18', '2018-05-07 07:56:18', NULL),
(307, 19, '1900270655', '2018-05-07 13:56:18', 'TREE BONUS#ID-BONUS1634633784', '0.02', '0.52', 1, '2018-05-07 07:56:18', '2018-05-07 07:56:18', NULL),
(308, 15, '217926244', '2018-05-07 13:56:18', 'TREE BONUS#ID-BONUS2088581569', '0.02', '31.12', 1, '2018-05-07 07:56:18', '2018-05-07 07:56:18', NULL),
(309, 12, '66254110', '2018-05-07 13:56:18', 'TREE BONUS#ID-BONUS1779196040', '0.02', '1170.3199999999997', 1, '2018-05-07 07:56:18', '2018-05-07 07:56:18', NULL),
(310, 11, '1753605165', '2018-05-07 13:56:18', 'TREE BONUS#ID-BONUS2001438355', '0.02', '5378.67', 1, '2018-05-07 07:56:18', '2018-05-07 07:56:18', NULL),
(311, 1, '1822422714', '2018-05-07 13:56:18', 'TREE BONUS#ID-BONUS480761032', '0.02', '9899.220000000001', 1, '2018-05-07 07:56:18', '2018-05-07 07:56:18', NULL),
(312, 26, '1308254655', '2018-05-07 13:56:18', 'UPGRADE TO PREMIUM#ID-UPDATE1905556924', '-50', '4900', 2, '2018-05-07 07:56:18', '2018-05-07 07:56:18', '0'),
(313, 1, '1725907950', '2019-04-14 14:55:51', 'BUYPACKAGE#ID-BPPackage 3', '-50', '9849.220000000001', 9, '2019-04-14 09:55:51', '2019-04-14 09:55:51', NULL),
(314, 1, '981666883', '2019-04-26 18:24:51', 'WITHDRAW#ID-WD801566763', '-10', '9829.010000000002', 2, '2019-04-26 13:24:51', '2019-04-26 13:24:51', '10.21'),
(315, 29, '1704510911', '2019-05-01 08:19:56', 'CLICKADD#ID-CA482442881', '0.5', '0.5', 1, '2019-05-01 03:19:56', '2019-05-01 03:19:56', NULL),
(316, 29, '1455269687', '2019-05-01 08:20:44', 'CLICKADD#ID-CA1784380611', '1', '1.5', 1, '2019-05-01 03:20:44', '2019-05-01 03:20:44', NULL),
(317, 29, '361524684', '2019-05-01 12:40:18', 'CLICKADD#ID-CA1273997256', '1', '2.5', 1, '2019-05-01 07:40:18', '2019-05-01 07:40:18', NULL),
(318, 32, '1024369888', '2019-05-05 13:57:01', 'ADMIN#ID-ADD749493076', '8', '8', 5, '2019-05-05 08:57:01', '2019-05-05 08:57:01', NULL),
(319, 1, '1208095166', '2019-05-05 15:11:31', 'CLICKADD#ID-CA955579695', '0.5', '9829.510000000002', 1, '2019-05-05 10:11:31', '2019-05-05 10:11:31', NULL),
(320, 1, '956892534', '2019-05-05 19:11:44', 'CLICKADD#ID-CA101441111', '3', '9832.510000000002', 1, '2019-05-05 14:11:44', '2019-05-05 14:11:44', NULL),
(321, 1, '1835834318', '2019-05-05 19:23:10', 'CLICKADD#ID-CA950596675', '3', '9835.510000000002', 1, '2019-05-05 14:23:10', '2019-05-05 14:23:10', NULL),
(322, 1, '1751940089', '2019-05-05 19:33:48', 'CLICKADD#ID-CA1174684573', '0.5', '9836.010000000002', 1, '2019-05-05 14:33:48', '2019-05-05 14:33:48', NULL),
(323, 1, '1258948702', '2019-05-05 19:34:54', 'CLICKADD#ID-CA185048440', '4', '9840.010000000002', 1, '2019-05-05 14:34:54', '2019-05-05 14:34:54', NULL),
(324, 1, '773754521', '2019-05-05 19:42:28', 'CLICKADD#ID-CA1554019294', '40', '9880.010000000002', 1, '2019-05-05 14:42:28', '2019-05-05 14:42:28', NULL),
(325, 1, '1399261177', '2019-05-05 19:51:32', 'WITHDRAW#ID-WD1021051998', '-8', '9861.842000000002', 2, '2019-05-05 14:51:32', '2019-05-05 14:51:32', '10.168'),
(326, 1, '1776668420', '2019-05-05 20:01:00', 'WITHDRAW#ID-WD536773497', '-10', '9841.632000000003', 2, '2019-05-05 15:01:00', '2019-05-05 15:01:00', '10.21'),
(327, 1, '1115776711', '2019-05-05 20:03:24', 'WITHDRAW#ID-WD1189377764', '-50', '9818.960000000003', 2, '2019-05-05 15:03:24', '2019-05-05 15:03:24', '11.05'),
(328, 1, '930072731', '2019-05-05 20:12:00', 'WITHDRAW#ID-WD887087220', '-50', '9763.310000000003', 2, '2019-05-05 15:12:00', '2019-05-05 15:12:00', '5.65'),
(329, 1, '1422776799', '2019-05-16 17:52:51', 'CLICKADD#ID-CA858765401', '3', '9883.010000000002', 1, '2019-05-16 12:52:51', '2019-05-16 12:52:51', NULL),
(330, 1, '1550309882', '2019-05-16 20:12:21', 'CLICKADD#ID-CA800860943', '3', '9886.010000000002', 1, '2019-05-16 15:12:21', '2019-05-16 15:12:21', NULL),
(331, 1, '1641189339', '2019-05-17 22:40:08', 'CLICKADD#ID-CA1612421427', '3', '9889.010000000002', 1, '2019-05-17 17:40:08', '2019-05-17 17:40:08', NULL),
(332, 43, '129454419', '2019-05-19 12:37:34', 'CLICKADD#ID-CA422365241', '6', '3', 1, '2019-05-19 07:37:34', '2019-05-19 07:37:34', NULL),
(333, 43, '329928003', '2019-05-19 13:45:23', 'CLICKADD#ID-CA2047268464', '6', '6', 1, '2019-05-19 08:45:23', '2019-05-19 08:45:23', NULL),
(334, 43, '136877122', '2019-05-19 13:51:27', 'CLICKADD#ID-CA1996729792', '6', '12', 1, '2019-05-19 08:51:27', '2019-05-19 08:51:27', NULL),
(335, 43, '1833732722', '2019-05-19 16:05:20', 'CLICKADD#ID-CA1342771029', '3', '15', 1, '2019-05-19 11:05:20', '2019-05-19 11:05:20', NULL),
(336, 43, '1546006666', '2019-05-19 16:09:25', 'CLICKADD#ID-CA1836534515', '3', '18', 1, '2019-05-19 11:09:25', '2019-05-19 11:09:25', NULL),
(337, 43, '1511028164', '2019-05-19 16:11:46', 'CLICKADD#ID-CA72300621', '2.5', '20.5', 1, '2019-05-19 11:11:46', '2019-05-19 11:11:46', NULL),
(338, 1, '753341938', '2019-05-19 16:34:28', 'WITHDRAW#ID-WD468128643', '-50', '9836.760000000002', 2, '2019-05-19 11:34:28', '2019-05-19 11:34:28', '2.25'),
(339, 44, '1555416495', '2019-05-20 19:25:23', 'CLICKADD#ID-CA1088247398', '3', '3', 1, '2019-05-20 14:25:23', '2019-05-20 14:25:23', NULL),
(340, 44, '705322279', '2019-05-20 19:26:27', 'CLICKADD#ID-CA1472856070', '3', '6', 1, '2019-05-20 14:26:27', '2019-05-20 14:26:27', NULL),
(341, 44, '789707392', '2019-05-20 19:31:33', 'CLICKADD#ID-CA1472515743', '3', '9', 1, '2019-05-20 14:31:33', '2019-05-20 14:31:33', NULL),
(342, 44, '2015986180', '2019-05-20 21:08:26', 'CLICKADD#ID-CA1650971039', '3', '12', 1, '2019-05-20 16:08:26', '2019-05-20 16:08:26', NULL),
(343, 44, '717453198', '2019-05-20 21:12:21', 'CLICKADD#ID-CA2001995779', '3', '15', 1, '2019-05-20 16:12:21', '2019-05-20 16:12:21', NULL),
(344, 44, '352080713', '2019-05-20 21:14:49', 'CLICKADD#ID-CA238949631', '3', '18', 1, '2019-05-20 16:14:49', '2019-05-20 16:14:49', NULL),
(345, 44, '1716250227', '2019-05-20 21:17:30', 'CLICKADD#ID-CA544581455', '3', '21', 1, '2019-05-20 16:17:30', '2019-05-20 16:17:30', NULL),
(346, 44, '599193952', '2019-05-20 21:44:56', 'CLICKADD#ID-CA1226196390', '3', '24', 1, '2019-05-20 16:44:56', '2019-05-20 16:44:56', NULL),
(347, 44, '1396576666', '2019-05-20 21:46:05', 'CLICKADD#ID-CA186091498', '3', '27', 1, '2019-05-20 16:46:05', '2019-05-20 16:46:05', NULL),
(348, 1, '1545552083', '2019-05-23 20:13:03', 'CLICKADD#ID-CA1340527757', '3', '9892.010000000002', 1, '2019-05-23 15:13:03', '2019-05-23 15:13:03', NULL),
(349, 1, '2137517924', '2019-05-23 20:20:50', 'CLICKADD#ID-CA792892607', '3', '9895.010000000002', 1, '2019-05-23 15:20:50', '2019-05-23 15:20:50', NULL),
(350, 1, '1301390180', '2019-05-23 20:23:44', 'CLICKADD#ID-CA1046476557', '3', '9898.010000000002', 1, '2019-05-23 15:23:44', '2019-05-23 15:23:44', NULL),
(351, 1, '1031188692', '2019-05-23 20:27:22', 'CLICKADD#ID-CA1041457302', '3', '9901.010000000002', 1, '2019-05-23 15:27:22', '2019-05-23 15:27:22', NULL),
(352, 1, '1630260913', '2019-05-23 20:35:34', 'CLICKADD#ID-CA682763245', '3', '9904.010000000002', 1, '2019-05-23 15:35:34', '2019-05-23 15:35:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `referrer_id` int(11) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('L','R') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posid` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reffral_balance` double NOT NULL DEFAULT '0',
  `join_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `paid_status` int(1) DEFAULT NULL,
  `ver_status` int(1) DEFAULT NULL,
  `ver_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forget_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_day` date NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tauth` int(11) DEFAULT '0',
  `tfver` int(11) DEFAULT '0',
  `emailv` int(11) DEFAULT '0',
  `smsv` int(11) DEFAULT '0',
  `vsent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `vercode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `secretcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` int(11) NOT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referrer_id`, `username`, `password`, `position`, `posid`, `first_name`, `last_name`, `balance`, `reffral_balance`, `join_date`, `status`, `paid_status`, `ver_status`, `ver_code`, `forget_code`, `birth_day`, `email`, `mobile`, `street_address`, `city`, `country`, `post_code`, `remember_token`, `created_at`, `updated_at`, `tauth`, `tfver`, `emailv`, `smsv`, `vsent`, `vercode`, `secretcode`, `image`, `affiliate_id`, `package_id`, `expiry_date`) VALUES
(1, NULL, 'admin', '$2y$10$ojlQWqauqmVVwnAR2GOv/OsT69vJqdQ2ToK8Qw.d1O3SJiCUfBno.', 'L', 0, 'admin', 'admin', '9904.010000000002', 2.4000000000000004, '0000-00-00', 1, 1, NULL, NULL, NULL, '1900-12-23', 'admin@admin.com', '476541321313', 'fvgbhn', 'fgvbhn', 'fghj', '45678', 'JNXgmep9HygG57aWuxr9D7o1afnFPtBqq4hC6yGd8u3Mx340ldanYeLVJl00', NULL, '2019-05-23 15:35:34', 0, 1, 1, 1, '0', '0', '0', NULL, 'ZRsYJwgAw5', 3, '2019-05-18'),
(44, 1, 'alpha10', '$2y$10$wX.LQtc/Hr97..2wxDISDeRPiAtk.xwj0ies/9Zcqo3k79KiM9AxS', NULL, NULL, 'Adnan', 'Ali', '27', 0, '2019-05-20', 1, 1, 1, '375171', '0', '2019-05-16', 'alpha10@gmail.com', '0909090909', 'House Number 2', 'Lahore', 'Pakistan', NULL, NULL, '2019-05-20 12:59:31', '2019-05-20 16:46:05', 0, 1, 1, 1, '0', '0', '0', NULL, 'FUot6VgJgaNobeh', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_advertises`
--

CREATE TABLE `user_advertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `add_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraws_method`
--

CREATE TABLE `withdraws_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_amo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargefx` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chargepc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraws_method`
--

INSERT INTO `withdraws_method` (`id`, `name`, `image`, `min_amo`, `max_amo`, `chargefx`, `chargepc`, `rate`, `processing_day`, `status`, `currency`, `created_at`, `updated_at`) VALUES
(10, 'UBL', '1557087816.png', '10', '100000', '2', '0.5', '83', '5-7', 1, 'USD', '2018-02-12 01:35:16', '2019-05-05 15:23:52'),
(11, 'HBL', '1557087653.jpg', '5', '10000', '5', '1.5', '1.29', '7-10', 1, 'INR', '2018-02-12 01:37:49', '2019-05-05 15:24:04'),
(12, 'Easy Paisa', '1557087434.jpg', '10', '100000', '5', '1.3', '83', '6-7', 1, 'USD', '2018-02-12 01:38:33', '2019-05-05 15:19:11'),
(13, 'Jazz Cash', '1557087517.jpg', '5', '100000', '10', '2.1', '83', '10-12', 1, 'USD', '2018-02-12 01:39:20', '2019-05-05 15:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_trasections`
--

CREATE TABLE `withdraw_trasections` (
  `id` int(10) UNSIGNED NOT NULL,
  `withdraw_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processing_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_cur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_trasections`
--

INSERT INTO `withdraw_trasections` (`id`, `withdraw_id`, `user_id`, `amount`, `charge`, `method_name`, `processing_time`, `detail`, `status`, `created_at`, `updated_at`, `method_cur`) VALUES
(10, 'WD1189377764', '1', '50', '11.05', 'Jazz Cash', '10-12', 'dfg', 3, '2019-05-05 15:03:24', '2019-05-05 15:12:27', '0.60240963855422'),
(12, 'WD468128643', '1', '50', '2.25', 'UBL', '5-7', 'khkj', 3, '2019-05-19 11:34:28', '2019-05-20 16:39:49', '0.60240963855422');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charge_commisions`
--
ALTER TABLE `charge_commisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_extras`
--
ALTER TABLE `member_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_details`
--
ALTER TABLE `package_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silders`
--
ALTER TABLE `silders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonals`
--
ALTER TABLE `testimonals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_advertises`
--
ALTER TABLE `user_advertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraws_method`
--
ALTER TABLE `withdraws_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_trasections`
--
ALTER TABLE `withdraw_trasections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertises`
--
ALTER TABLE `advertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `charge_commisions`
--
ALTER TABLE `charge_commisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `member_extras`
--
ALTER TABLE `member_extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_details`
--
ALTER TABLE `package_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `silders`
--
ALTER TABLE `silders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonals`
--
ALTER TABLE `testimonals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_advertises`
--
ALTER TABLE `user_advertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraws_method`
--
ALTER TABLE `withdraws_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `withdraw_trasections`
--
ALTER TABLE `withdraw_trasections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
