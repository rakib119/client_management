-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2021 at 12:30 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgdbilli_client`
--
CREATE DATABASE IF NOT EXISTS `bgdbilli_client` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bgdbilli_client`;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `campain_category` int(11) NOT NULL,
  `offer_amount` int(11) NOT NULL,
  `percentage` varchar(11) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `name`, `campain_category`, `offer_amount`, `percentage`, `starting_date`, `ending_date`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(17, 'fxhnjh', 2, 20, 'on', '2021-12-04', '2021-12-04', '04_12_2021_01_47_34top11.jpg', '0000-00-00 00:00:00', 1, '2021-12-15 03:19:00', 1, 1),
(18, 'Black Friday', 1, 10, '', '2021-12-08', '2021-12-08', '07_12_2021_02_06_06Tulips.jpg', '2021-12-07 02:10:50', 1, '2021-12-12 02:11:08', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_categorys`
--

CREATE TABLE `campaign_categorys` (
  `campaign_cat_id` int(255) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaign_categorys`
--

INSERT INTO `campaign_categorys` (`campaign_cat_id`, `category_name`, `status`) VALUES
(1, 'Service', 1),
(2, 'Deposit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(6, 'Social Media Marketing (SMM)', '2021-12-01 05:58:57', 1, '2021-12-05 03:00:31', 1, 1),
(9, 'Digital Marketing', '2021-12-02 03:14:00', 1, '2021-12-02 03:17:38', 1, 1),
(10, 'Web Services', '2021-12-02 03:17:51', 1, '2021-12-04 01:31:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(255) NOT NULL,
  `clientid` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobail` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_contact` varchar(11) NOT NULL,
  `company_address` text NOT NULL,
  `client_img` varchar(500) NOT NULL DEFAULT 'set_profile.jpeg',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `vkey` varchar(100) DEFAULT NULL,
  `balance` float DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `clientid`, `name`, `email`, `mobail`, `password`, `designation`, `company_name`, `company_email`, `company_contact`, `company_address`, `client_img`, `created_at`, `created_by`, `updated_at`, `updated_by`, `vkey`, `balance`, `status`) VALUES
(27, '42124', 'Md Ruhul Amin', 'ruhul1.bgd@gmail.com', '01943636143', '8843028fefce50a6de50acdf064ded27', 'web developer', '', '', '', 'Shewrapara', '15_12_2021_03_05_16rlogo.png', '2021-12-15 03:04:16', 1, '2021-12-15 03:05:30', 0, NULL, 650, 1),
(28, '75305', 'Shuvo', 'bgd.shuvo@gmail.com', '01904111661', '8843028fefce50a6de50acdf064ded27', 'all', '', '', '', '', 'set_profile.jpeg', '2021-12-18 04:59:57', 1, NULL, NULL, NULL, 6350, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `deposit_method` varchar(50) NOT NULL,
  `deposit_amount` float NOT NULL,
  `deposit_voucher` varchar(255) NOT NULL,
  `deposit_date` date NOT NULL,
  `campaign_id` int(255) NOT NULL,
  `campaign_amount` float NOT NULL,
  `total_amount` float NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `payment_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_id`, `name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Mobail Banking', '2021-11-11 11:14:23', 1, NULL, NULL, 1),
(2, 'Bank', '2021-11-11 11:15:06', 1, NULL, NULL, 1),
(3, 'Cash', '2021-11-11 11:15:27', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `permission`) VALUES
(1, 1, 'users,permissions,clients,diposite,service,campain,report,settings'),
(2, 2, 'users,permissions,clients,diposite,service,campain,report,settings'),
(4, 3, 'diposite,service,campain,report'),
(6, 4, 'service,campain,settings');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `price_category` varchar(30) NOT NULL,
  `price_unit` int(11) NOT NULL,
  `price_unit_amount` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `discount_amount` float NOT NULL,
  `campain_id` int(11) NOT NULL,
  `service_amount` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `role`, `status`) VALUES
(1, 1, 'admin', 1),
(2, 2, 'sub-admin', 1),
(3, 3, 'accountance', 1),
(4, 4, 'marketer', 1),
(5, 5, 'moderator', 1),
(6, 6, 'editor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(70) NOT NULL,
  `service_details` text NOT NULL,
  `service_amount` float NOT NULL,
  `categories_id` int(11) NOT NULL,
  `subcategories_id` int(11) NOT NULL,
  `price_categories` varchar(7) NOT NULL,
  `price_unit` varchar(20) NOT NULL,
  `price_unit_amount` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `discount_amount` float NOT NULL,
  `image` varchar(70) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_details`, `service_amount`, `categories_id`, `subcategories_id`, `price_categories`, `price_unit`, `price_unit_amount`, `created_at`, `created_by`, `updated_at`, `updated_by`, `discount_amount`, `image`, `status`) VALUES
(9, 'Facebook Boosting $10', 'Facebook Boosting - 15% ð—¢ð—™ð—™ É´á´á´¡ ðŸ˜±\r\n\r\nðŸŽ¯ target audience set\r\nðŸ”® goal setting \r\nðŸ–² add a button \r\nðŸ“¥ welcome message setup\r\nðŸ‘« target gander \r\nðŸ’â€â™‚ï¸ age segmentation \r\nðŸ“ location radius \r\nðŸ§¿ detail targeting\r\nâ° ads time set up\r\nðŸ’µ ads budget set up\r\nâ„ï¸ ads on others platform \r\n\r\nNote: 15% off only for October\r\n\r\nà¦†à¦®à¦¾à¦¦à§‡à¦° Facebook boosting service à¦¬à§à¦¯à¦¬à¦¹à¦¾à¦° à¦•à¦°à§‡, à¦à¦–à¦¨ à¦†à¦ªà¦¨à¦¿ à¦†à¦ªà¦¨à¦¾à¦° Facebook page à¦¸à¦¹à¦œà§‡ à¦†à¦ªà¦¨à¦¾à¦° ð˜ð—®ð—¿ð—´ð—²ð˜ ð—°ð˜‚ð˜€ð˜ð—¼ð—ºð—²ð—¿-à¦à¦° à¦•à¦¾à¦›à§‡ boost à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡à¦¨ à¥¤\r\n\r\nðŸŽ¯ ð—§ð—®ð—¿ð—´ð—²ð˜ ð—®ð˜‚ð—±ð—¶ð—²ð—»ð—°ð—²: Facebook boosting -à¦à¦° à¦•à§à¦·à§‡à¦¤à§à¦°à§‡ à¦†à¦ªà¦¨à¦¿ à¦¯à¦¦à¦¿ target audience set à¦•à¦°à¦¤à§‡ à¦¨à¦¾ à¦ªà¦¾à¦°à§‡à¦¨, à¦¤à¦¾à¦¹à¦²à§‡ à§§à§¦à§¦à§¦ à¦¡à¦²à¦¾à¦° à¦–à¦°à¦š à¦•à¦°à§‡à¦“ effective result-à¦à¦° à¦†à¦¶à¦¾ à¦•à¦°à¦¾ à¦¯à¦¾à§Ÿ à¦¨à¦¾, à¦†à¦¬à¦¾à¦° à¦†à¦ªà¦¨à¦¿ à¦¯à¦¦à¦¿ target audience set à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡à¦¨ à¦¤à¦¾à¦¹à¦²à§‡ à¦¦à§‡à¦–à¦¾ à¦¯à¦¾à¦¬à§‡ à§§à§¦/à§¨à§¦ à¦¡à¦²à¦¾à¦° invest à¦•à¦°à§‡à¦“ à¦­à¦¾à¦²à§‹ response à¦ªà¦¾à¦“à§Ÿà¦¾ à¦¸à¦®à§à¦­à¦¬à¥¤ à¦¤à¦¾à¦‡ à¦†à¦®à¦°à¦¾ à¦†à¦ªà¦¨à¦¾à¦° target audience effective way à¦¤à§‡ set à¦•à¦°à§‡ à¦¦à¦¿à¦¬à¥¤\r\n\r\nðŸ”® ð—šð—¼ð—®ð—¹ð˜€ ð˜€ð—²ð˜ð˜ð—¶ð—»ð—´: à¦à¦Ÿà¦¿ à¦¸à¦¾à¦§à¦¾à¦°à¦¨à¦¤ à¦†à¦ªà¦¨à¦¾à¦¦à§‡à¦° à¦‡à¦šà§à¦›à¦¾à¦° à¦“à¦ªà¦° à¦¨à¦¿à¦°à§à¦­à¦° à¦•à¦°à§‡ à¦†à¦ªà¦¨à¦¿ à¦¯à§‡ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ ads à¦¦à¦¿à¦¬à§‡à¦¨, à¦†à¦ªà¦¨à¦¾à¦° à¦²à¦•à§à¦·à§à¦¯à¦Ÿà¦¾ à¦•à¦¿ ? \r\n\r\n* à¦†à¦ªà¦¨à¦¿ à¦•à¦¿ à¦†à¦ªà¦¨à¦¾à¦° website-à¦ visitor à¦¬à¦¾à¦¡à¦¼à¦¾à¦¤à§‡ à¦šà¦¾à¦¨ ? \r\n* à¦†à¦ªà¦¨à¦¿ à¦•à¦¿ à¦†à¦ªà¦¨à¦¾à¦° target customers à¦¥à§‡à¦•à§‡ message à¦ªà§‡à¦¤à§‡ à¦šà¦¾à¦¨? \r\n*à¦†à¦ªà¦¨à¦¿ à¦•à¦¿ à¦†à¦ªà¦¨à¦¾à¦° post -à¦ engagement à¦¬à¦¾à¦¡à¦¼à¦¾à¦¤à§‡ à¦šà¦¾à¦¨ ? (React, like, comment &amp; share)\r\n* à¦†à¦ªà¦¨à¦¿ à¦•à¦¿ à¦†à¦ªà¦¨à¦¾à¦° ads -à¦à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ leads à¦ªà§‡à¦¤à§‡ à¦šà¦¾à¦¨ ? à¦…à¦°à§à¦¥à¦¾à§Ž à¦†à¦ªà¦¨à¦¾à¦° customer à¦°à¦¾ à¦†à¦ªà¦¨à¦¾à¦° ads à¦¦à§‡à¦–à§‡ à¦à¦•à¦Ÿà¦¾ contact form fill up à¦•à¦°à¦¬à§‡ à¦¯à¦¾à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦†à¦ªà¦¨à¦¿ à¦¤à¦¾à¦¦à§‡à¦° mobile number, email and other contact information à¦ªà§‡à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡à¦¨ à¦¯à¦¾à¦¤à§‡ à¦ªà¦°à§‡ à¦†à¦ªà¦¨à¦¿ à¦¸à§‡ client à¦•à§‡ à¦†à¦ªà¦¨à¦¾à¦° service à¦¬à¦¾ product à¦¸à¦®à§à¦ªà¦°à§à¦•à§‡ à¦­à¦¾à¦²à§‹à¦­à¦¾à¦¬à§‡ à¦¬à§à¦à¦¿à§Ÿà§‡ à¦†à¦ªà¦¨à¦¾à¦° sales à¦¬à¦¾à¦¡à¦¼à¦¾à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡à¦¨à¥¤ \r\n* à¦†à¦ªà¦¨à¦¿ à¦•à¦¿ à¦†à¦ªà¦¨à¦¾à¦° target customers à¦¥à§‡à¦•à§‡ direct call à¦ªà§‡à¦¤à§‡ à¦šà¦¾à¦¨ ?\r\n\r\nðŸ“ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦°à¦¾à¦¸à¦°à¦¿ à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦•à¦°à§à¦¨: \r\nMamun Tower, Shewrapara, \r\nMirpur Dhaka - 1216\r\n\r\nðŸ“ž 01904-111666\r\nðŸ“§ info@bgdonline.net\r\nðŸŒ www.bgdonlineltd.net', 1150, 6, 12, '', '', '', '2021-12-02 15:34:04', 1, '2021-12-07 12:30:44', 1, 0, '2021-12-02_15-34-045033428552.jpg', 1),
(11, 'Facebook Professional Business Page', 'create your Facebook professional business page ðŸ˜€\r\n\r\nðŸž create a professional Facebook page\r\nðŸ‘ 1000 likes\r\nðŸ“¸ 5 cover pics design\r\nðŸ™†â€â™‚ï¸ 10 positive review\r\nðŸŒ  profile picture design\r\nðŸ–² Add a button\r\nðŸŽ¥ photo &amp; video gallery set\r\nâ˜ƒï¸ custom URL\r\nðŸŽšcover and profile pic size\r\nðŸ“ž contact information set\r\nðŸ¦  COVID update set\r\nðŸ“ map indexing\r\nðŸ’° price range\r\nðŸ“  about section\r\nðŸ“‹ page name and category set\r\nðŸ—º Additional location details\r\nðŸ§¿ 10+ service area\r\nâ° hours set up\r\nðŸ“Ÿ temporary service change\r\nðŸ”® others account attach\r\nðŸš´â€â™€ï¸ more (according to requirements)\r\n\r\nRegular price: 10000 tk\r\nDiscount price: 5000 tk (for November)\r\n\r\nà§§à§¦,à§¦à§¦à§¦ à¦Ÿà¦¾à¦•à¦¾à¦° service à¦®à¦¾à¦¤à§à¦° à§«à§¦à§¦à§¦ à¦Ÿà¦¾à¦•à¦¾à§Ÿ à¦ªà§‡à¦¤à§‡ offer code à¦ªà¦¾à¦“à§Ÿà¦¾à¦° à¦œà¦¨à§à¦¯ link -à¦à¦° form à¦Ÿà¦¿ fill up à¦•à¦°à§à¦¨ ðŸ‘‰ https://tinyurl.com/bgdfbpage\r\n\r\nðŸ“à¦†à¦®à¦¾à¦¦à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦°à¦¾à¦¸à¦°à¦¿ à¦¯à§‹à¦—à¦¾à¦¯à§‹à¦— à¦•à¦°à§à¦¨:\r\nMamun Tower, Shewrapara,\r\nMirpur Dhaka - 1216\r\n\r\nðŸ“ž 01904-111666\r\nðŸ“§ info@bgdonline.net\r\nðŸŒ www.bgdonlineltd.net', 10000, 6, 12, '', '', '', '2021-12-02 16:12:31', 1, '0000-00-00 00:00:00', 0, 0, '2021-12-02_16-12-317635164386.jpg', 1),
(12, 'Facebook page Like (1000 like)', 'ðŸ’¥ ð—™ð—®ð—°ð—²ð—¯ð—¼ð—¼ð—¸ ð—½ð—®ð—´ð—² ð—¹ð—¶ð—¸ð—² ðŸ‘ðŸ‘ðŸ‘\r\n\r\nðŸŒ€ Facebook page like increasing à¦•à¦¿ ?\r\n\r\nà¦†à¦ªà¦¨à¦¾à¦° Facebook business page à¦ like à¦¬à¦¾à¦¡à¦¼à¦¾à¦¨à§‹à¦° system à¦•à§‡ Facebook page like increasing à¦¬à¦²à§‡ à¥¤\r\n\r\nðŸŒ€ Facebook page-à¦ like à¦¬à¦¾à¦¡à¦¼à¦¾à¦²à§‡ à¦•à¦¿ à¦•à¦¿ à¦¸à§à¦¬à¦¿à¦§à¦¾ à¦ªà¦¾à¦¬ ?\r\n\r\n* à¦†à¦ªà¦¨à¦¾à¦° page à¦•à§‡ à¦¸à¦¬à¦¾à¦‡ trust à¦•à¦°à¦¬à§‡\r\n\r\n* à¦à¦‡ page à¦Ÿà¦¾ à¦¨à¦¤à§à¦¨ à¦¨à¦¾ à¦¸à¦¬à¦¾à¦‡ à¦œà¦¾à¦¨à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡\r\n\r\n* à¦¨à¦¤à§à¦¨ page à¦ à¦•à§‡à¦‰ à¦¸à¦¹à¦œà§‡ à¦²à§‡à¦¨à¦¦à§‡à¦¨ à¦•à¦°à¦¤à§‡ à¦šà¦¾à§Ÿ à¦¨à¦¾ à¦•à¦¾à¦°à¦£ à¦…à¦¨à§‡à¦•à§‡à¦° à¦®à¦¨à§‡à¦° à¦§à¦¾à¦°à¦¨à¦¾ à¦¯à§‡ à¦à¦‡ à¦¨à¦¤à§à¦¨ page à¦Ÿà¦¾ à¦•à§‹à¦¨ fraud incident à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à§‡\r\n\r\n* page à¦ like à¦¬à¦¾à¦¡à¦¼à¦¾à¦²à§‡ blue badge à¦à¦° à¦œà¦¨à§à¦¯ apply à¦•à¦°à¦¾ à¦¸à¦¹à¦œ à¦¹à§Ÿ\r\n\r\n* Page à¦Ÿà¦¾à¦•à§‡ strong à¦¬à¦¾à¦¨à¦¾à¦¨à§‹ à¦¯à¦¾à§Ÿ à¦à¦¬à¦‚ page à¦à¦° à¦—à§à¦¨à¦—à¦¤ à¦®à¦¾à¦¨ à¦¬à§ƒà¦¦à§à¦§à¦¿ à¦ªà¦¾à§Ÿ\r\n\r\n* à¦¸à¦¬à¦¾à¦° first-à¦ à¦¸à¦¬à¦¾à¦‡ à¦†à¦ªà¦¨à¦¾à¦° page -à¦ like à¦Ÿà¦¾ à¦¦à§‡à¦–à§‡ then à¦†à¦ªà¦¨à¦¾à¦° product à¦¬à¦¾ service à¦•à¦¿à¦¨à¦¤à§‡ à¦†à¦—à§à¦°à¦¹ à¦ªà§à¦°à¦•à¦¾à¦¶ à¦•à¦°à§‡\r\n\r\n* à¦†à¦ªà¦¨à¦¾à¦° page -à¦à¦° like à¦à¦° à¦•à¦¾à¦°à¦¨à§‡ à§«à§¦% à¦†à¦ªà¦¨à¦¾à¦° target customer page -à¦ à¦†à¦¸à¦¾à¦° à¦ªà¦°à¦“ à¦†à¦ªà¦¨à¦¾à¦° product à¦¬à¦¾ service à¦•à¦¿à¦¨à§‡ à¦¨à¦¾\r\n\r\n* à¦à¦•à¦œà¦¨ à¦¸à¦«à¦² online à¦¬à§à¦¯à¦¬à¦¸à¦¾à§Ÿà§€ à¦¹à¦¤à§‡ à¦¸à¦¾à¦¹à¦¾à¦¯à§à¦¯ à¦•à¦°à§‡\r\n\r\n* à¦à¦›à¦¾à¦¡à¦¼à¦¾à¦“ like increasing à¦à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦à¦®à¦¨ à¦¸à§à¦¬à¦¿à¦§à¦¾ à¦ªà¦¾à¦“à§Ÿà¦¾ à¦¯à¦¾à§Ÿ à¦¯à¦¾à¦° à¦«à¦²à¦¾à¦«à¦² à¦†à¦ªà¦¨à¦¿ page like à¦¬à¦¾à¦¡à¦¼à¦¾à¦¨à§‹à¦° à¦ªà¦° à¦¨à¦¿à¦œà§‡à¦‡ à¦¬à§à¦à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡à¦¨\r\n\r\nRegular price: 400 tk (1000 like)\r\nDiscount price: 250 tk (for December)\r\n\r\nMamun Tower, Shewrapara,\r\nMirpur Dhaka - 1216\r\n\r\nðŸ“ž 01904-111666\r\nðŸ“§ info@bgdonline.net\r\nðŸŒ www.bgdonline.net', 400, 6, 12, '', '', '', '2021-12-02 16:16:57', 1, '2021-12-15 15:15:31', 1, 0, '2021-12-15_15-15-314644467775.jpg', 1),
(14, 'boosting', 'j;kl;lknn;', 1150, 6, 12, '', '', '', '2021-12-18 11:04:52', 1, '0000-00-00 00:00:00', 0, 0, '2021-12-18_11-04-527490617392.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `subcategory_name` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `subcategory_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(12, 6, 'Facebook', '2021-12-02 03:19:53', 1, '0000-00-00 00:00:00', 0, 1),
(13, 6, 'Instagram', '2021-12-02 03:20:04', 1, '2021-12-05 03:35:08', 1, 1),
(14, 6, 'Youtube', '2021-12-02 03:20:17', 1, '0000-00-00 00:00:00', 0, 1),
(15, 6, 'Linkedin', '2021-12-02 03:20:41', 1, '0000-00-00 00:00:00', 0, 1),
(16, 6, 'Twitter', '2021-12-02 03:22:38', 1, '0000-00-00 00:00:00', 0, 1),
(17, 6, 'Tiktok', '2021-12-02 03:22:54', 1, '0000-00-00 00:00:00', 0, 1),
(18, 6, 'Pinterest', '2021-12-02 03:23:27', 1, '0000-00-00 00:00:00', 0, 1),
(19, 10, 'Domain', '2021-12-02 03:23:46', 1, '2021-12-15 03:14:03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `deposit_method` varchar(220) NOT NULL,
  `deposit_amount` int(11) NOT NULL,
  `deposit_voucher` varchar(255) NOT NULL,
  `deposit_date` date NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `campaign_amount` float NOT NULL,
  `total_amount` float NOT NULL,
  `service_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `price_category` int(11) NOT NULL,
  `price_unit` int(11) NOT NULL,
  `price_unit_amount` float NOT NULL,
  `discount_amount` float NOT NULL,
  `service_amount` float NOT NULL,
  `selling_price` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `role` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `client_id`, `transaction_id`, `deposit_method`, `deposit_amount`, `deposit_voucher`, `deposit_date`, `campaign_id`, `campaign_amount`, `total_amount`, `service_id`, `cat_id`, `sub_cat_id`, `price_category`, `price_unit`, `price_unit_amount`, `discount_amount`, `service_amount`, `selling_price`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `role`) VALUES
(37, 27, 'HGDFJS14', '2', 10000, '', '0000-00-00', 0, 0, 10000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-12-15 03:06:50', '0000-00-00 00:00:00', 1, 0, 1, 1),
(38, 27, '', '', 0, '', '0000-00-00', 18, 0, 0, 11, 0, 0, 0, 0, 0, 10, 10000, 9990, '2021-12-15 15:07:15', '0000-00-00 00:00:00', 27, 0, 1, 0),
(39, 27, 'fgjhgjfjh', '1', 4500, '15_12_2021_03_08_55Desert.jpg', '0000-00-00', 0, 0, 4500, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-12-15 03:08:25', '2021-12-18 04:54:55', 1, 1, 1, 1),
(41, 27, '', '', 0, '', '0000-00-00', 18, 0, 0, 12, 0, 0, 0, 0, 0, 10, 400, 390, '2021-12-15 15:16:17', '0000-00-00 00:00:00', 1, 0, 1, 1),
(42, 27, '', '', 0, '', '0000-00-00', 18, 0, 0, 12, 6, 12, 0, 0, 0, 10, 400, 390, '2021-12-15 15:18:02', '2021-12-18 12:48:09', 1, 1, 1, 1),
(43, 27, '', '', 0, '', '0000-00-00', 18, 0, 0, 9, 0, 0, 0, 0, 0, 10, 1150, 1140, '2021-12-18 13:07:28', '0000-00-00 00:00:00', 27, 0, 1, 0),
(45, 27, '', '', 0, '', '0000-00-00', 0, 0, 0, 14, 0, 0, 0, 0, 0, 0, 1150, 1150, '2021-12-18 14:13:23', '0000-00-00 00:00:00', 1, 0, 1, 1),
(46, 27, '', '', 0, '', '0000-00-00', 18, 0, 0, 12, 6, 12, 0, 0, 0, 10, 400, 390, '2021-12-18 14:35:09', '2021-12-18 14:35:50', 1, 1, 1, 1),
(47, 27, '', '', 0, '', '0000-00-00', 0, 0, 0, 12, 0, 0, 0, 0, 0, 400, 400, 0, '2021-12-18 14:37:50', '0000-00-00 00:00:00', 27, 0, 0, 0),
(48, 27, '', '', 0, '', '0000-00-00', 0, 0, 0, 12, 6, 12, 0, 0, 0, 0, 400, 400, '2021-12-18 14:59:00', '0000-00-00 00:00:00', 27, 0, 1, 0),
(49, 28, 'kjgjhf', '2', 3000, '', '0000-00-00', 0, 0, 3000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-12-18 04:59:09', '2021-12-18 05:18:01', 1, 1, 1, 1),
(50, 28, 'kjikuyg', '3', 4500, '', '0000-00-00', 0, 0, 4500, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-12-18 05:18:48', '2021-12-18 05:24:12', 1, 1, 1, 1),
(51, 28, '', '', 0, '', '0000-00-00', 0, 0, 0, 9, 6, 12, 0, 0, 0, 0, 1150, 1150, '2021-12-19 11:01:34', '2021-12-19 12:24:36', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `vkey` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `mobile`, `password`, `gender`, `created_at`, `created_by`, `updated_at`, `updated_by`, `vkey`, `status`) VALUES
(1, 1, 'BGD office', 'bgd@gmail.com', '01700000123', 'c33716eebbf83d422531970fc80ca677', 'male', '2021-11-09 09:46:01', 1, '2021-11-09 09:46:01', 1, NULL, 1),
(6, 1, 'Ruhul Amin', 'ruhul@gmail.com', '01712345678', '8843028fefce50a6de50acdf064ded27', 'male', '2021-11-27 17:31:38', 1, '2021-12-05 17:49:54', 1, NULL, 0),
(8, 2, 'Md Ruhul Amin', 'Ruhulfb7@gmail.com', '01943636143', '8843028fefce50a6de50acdf064ded27', 'male', '2021-12-15 15:01:48', 1, '2021-12-15 15:02:16', 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_categorys`
--
ALTER TABLE `campaign_categorys`
  ADD PRIMARY KEY (`campaign_cat_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
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
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `campaign_categorys`
--
ALTER TABLE `campaign_categorys`
  MODIFY `campaign_cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `payment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
