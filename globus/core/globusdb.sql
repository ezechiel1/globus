-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 07:11 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globusdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `admin_fname` varchar(30) DEFAULT NULL,
  `admin_lname` varchar(30) DEFAULT NULL,
  `photoprofile` varchar(3000) DEFAULT '../../img/profile/th.jpg',
  `admin_email` varchar(30) DEFAULT NULL,
  `admin_phone` varchar(30) DEFAULT NULL,
  `admin_pin` int(11) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `admin_city` varchar(30) NOT NULL,
  `admin_country` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `admin_fname`, `admin_lname`, `photoprofile`, `admin_email`, `admin_phone`, `admin_pin`, `admin_password`, `c_date`, `admin_city`, `admin_country`, `admin_status`) VALUES
(1, 'Admin', 'Admin', '', 'admin@gmail.com', '098765567', 1, 'globus', '0000-00-00 00:00:00', 'Kigali', 1, 1),
(2, 'luka', 'pachioli', '../../img/profile/th.jpg', 'lmk@gmail.com', '098-765-432-345', 0, '123456', '2019-11-24 22:56:31', 'bukavu', 1, 1),
(3, 'luka', 'eze', '../../img/profile/th.jpg', 'admin1@gmail.com', '098-765-456-789', 0, '934c2bebef2303defabcb02375b1b4', '2019-12-03 14:36:02', 'goma', 1, 1),
(6, 'luka', 'a', '../../img/profile/th.jpg', 'administrateur@gmail.com', '098-765-434-567', 1, '934c2bebef2303defabcb02375b1b4be4e79e940', '2019-12-04 19:17:43', 'bukavu1', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agentID` int(11) NOT NULL,
  `agent_fname` varchar(30) DEFAULT NULL,
  `agent_lname` varchar(30) DEFAULT NULL,
  `photoprofile` varchar(3000) DEFAULT '../../img/profile/th.jpg',
  `agent_email` varchar(30) DEFAULT NULL,
  `agent_phone` varchar(30) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `agent_country` varchar(30) NOT NULL,
  `agent_city` varchar(30) NOT NULL,
  `agent_status` int(11) NOT NULL,
  `agent_pin` int(11) NOT NULL,
  `agent_password` varchar(255) NOT NULL,
  `addedby` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agentID`, `agent_fname`, `agent_lname`, `photoprofile`, `agent_email`, `agent_phone`, `c_date`, `agent_country`, `agent_city`, `agent_status`, `agent_pin`, `agent_password`, `addedby`, `type`) VALUES
(0, 'agent', 'agent', '../../img/profile/th.jpg', 'agent1@gmail.com', '098-765-456-780', NULL, '1', 'kigali', 1, 1, '934c2bebef2303defabcb02375b1b4be4e79e940', 1, 1),
(7, 'lucien', 'murhula', NULL, 'ezechielkalengya@gmail.com', '098-765-433-456', NULL, '1', 'bukavua', 1, 0, '934c2bebef2303defabcb02375b1b4', 0, 0),
(9, 'lkmk', 'murhula', NULL, 'lmk@gmail.com', '098-765-432-234', NULL, '1', 'kigali', 1, 0, '934c2bebef2303defabcb02375b1b4', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambassador`
--

CREATE TABLE `ambassador` (
  `ambassadorID` int(11) NOT NULL,
  `ambassador_fname` varchar(30) DEFAULT NULL,
  `ambassador_lname` varchar(30) DEFAULT NULL,
  `photoprofile` varchar(3000) DEFAULT '../../img/profile/th.jpg',
  `ambassador_address` varchar(30) DEFAULT NULL,
  `ambassador_email` varchar(30) DEFAULT NULL,
  `ambassador_phone` varchar(30) DEFAULT NULL,
  `ambassador_status` int(11) DEFAULT NULL,
  `ambassador_country` int(11) DEFAULT NULL,
  `ambassador_location` varchar(30) DEFAULT NULL,
  `ambassador_pin` int(11) DEFAULT NULL,
  `ambassador_password` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambassador`
--

INSERT INTO `ambassador` (`ambassadorID`, `ambassador_fname`, `ambassador_lname`, `photoprofile`, `ambassador_address`, `ambassador_email`, `ambassador_phone`, `ambassador_status`, `ambassador_country`, `ambassador_location`, `ambassador_pin`, `ambassador_password`, `c_date`, `addedby`, `type`) VALUES
(13, 'amb', 'amb', '../../img/profile/th.jpg', NULL, 'amb@gmail.com', '098-765-456-789', 1, 1, 'ikiekq', 0, '934c2bebef2303defabcb02375b1b4be4e79e940', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `back_light_picture`
--

CREATE TABLE `back_light_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `back_light_product`
--

CREATE TABLE `back_light_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `back_light_product`
--

INSERT INTO `back_light_product` (`productID`, `product_name`, `product_description`, `product_quantity`, `product_price`, `product_color`, `product_status`, `product_picture`, `post_status`, `categoryID`, `subCategoryID`, `ownerID`, `owner_type`, `itID`, `c_date`) VALUES
(1, 'Positivo BGH Desktop', 'salut', 50, 500, 'Black', 0, '003.jpg', 0, 8, 10, 4, 5, 0, '2019-12-04 20:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `cads_picture`
--

CREATE TABLE `cads_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cads_product`
--

CREATE TABLE `cads_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cameras_picture`
--

CREATE TABLE `cameras_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cameras_product`
--

CREATE TABLE `cameras_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `card_printer_picture`
--

CREATE TABLE `card_printer_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `card_printer_product`
--

CREATE TABLE `card_printer_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `car_body_parties_picture`
--

CREATE TABLE `car_body_parties_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_body_parties_product`
--

CREATE TABLE `car_body_parties_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_computers_picture`
--

CREATE TABLE `car_computers_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_computers_product`
--

CREATE TABLE `car_computers_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_picture1` text NOT NULL,
  `category_picture2` text NOT NULL,
  `category_picture3` text NOT NULL,
  `adminID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `category_name`, `category_picture1`, `category_picture2`, `category_picture3`, `adminID`, `status`, `post`, `c_date`) VALUES
(8, 'CAR PARTS', '../../img/product/car_parts/28.jpg', '../../img/product/car_parts/kisspng-car-toyota-fortuner-light-headlamp-pink-light-5ac8d6c145e829.8130770815231116172864.jpg', '../../img/product/car_parts/61GceRyn3TL._SX425_.jpg', 1, 1, 1, '2019-08-09 04:38:32'),
(10, 'TECHNOLOGY', '../../img/product/technology/apple-products.jpg', '../../img/product/technology/images.jpg', '../../img/product/technology/appleproductlineup.jpg', 1, 1, 1, '2019-08-09 05:15:56'),
(11, 'BEAUTY OF WOMEN', '../../img/product/beauty_of_women/products-grouped-image.jpg', '../../img/product/beauty_of_women/ec8da07c1882751e59ee32b81f8afa9d.jpg', '../../img/product/beauty_of_women/gold-infused-COSmetics-510x600.png', 1, 1, 1, '2019-08-09 05:48:20'),
(12, 'PLEASURE', '../../img/product/pleasure/25Beers_1920x1280w.jpg', '../../img/product/pleasure/7199VQl-sUL._SL1500_.jpg', '../../img/product/pleasure/Cohiba-Esplendidos-tompusi-original-Cuba-25-kom_slika_O_36250645.jpg', 1, 1, 1, '2019-08-09 06:22:20'),
(13, 'ARTS', '../../img/product/arts/art.jpg', '../../img/product/arts/IMG_20170114_222025_931-58a01296a1b60__880.jpg', '../../img/product/arts/abstract-woman-head-colors.jpg', 1, 1, 1, '2019-08-09 06:51:25'),
(14, 'HEALTH', '../../img/product/health/diabetes-treatment.jpg', '../../img/product/health/screen-shot-2018-04-03-at-2-37-28-pm-1522780648.png', '../../img/product/health/many-colorful-pills-royalty-free-image-504370555-1542820898.jpg', 1, 1, 1, '2019-08-09 06:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `client_fname` varchar(30) DEFAULT NULL,
  `client_lname` varchar(30) DEFAULT NULL,
  `client_profil` varchar(255) DEFAULT '../../img/profile/th.jpg',
  `client_email` varchar(30) DEFAULT NULL,
  `client_phone` varchar(30) DEFAULT NULL,
  `client_gender` varchar(30) DEFAULT NULL,
  `client_location` varchar(30) DEFAULT NULL,
  `client_pin` int(11) DEFAULT NULL,
  `client_password` varchar(255) DEFAULT NULL,
  `client_country` varchar(60) NOT NULL,
  `client_status` int(11) NOT NULL,
  `c_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `client_fname`, `client_lname`, `client_profil`, `client_email`, `client_phone`, `client_gender`, `client_location`, `client_pin`, `client_password`, `client_country`, `client_status`, `c_date`) VALUES
(9, 'Ezekiel', 'jjj', '26-05-2013_sprayed_011.jpg', 'lmk@gmail.com', '098-765-432-123', '2', '', 1, '40bd001563085fc35165329ea1ff5c', '', 0, '2019-11-25 12:45:47'),
(10, 'luciano', 'Kapanga', '1757e641ffa1a42.jpg', 'lmk@gmail.com', '987-652-345-678', '1', '', 1, '8cb2237d0679ca88db6464eac60da9', '', 0, '2019-11-25 12:46:43'),
(11, 'Ezekiel', 'Meru', '1757e641ffa1a42.jpg', 'lmk@gmail.com', '098-765-434-567', '1', '', 1, '8cb2237d0679ca88db6464eac60da9', '', 0, '2019-11-25 12:59:53'),
(12, 'Jeremy ', 'Tambwe', '1757e641ffa1a42.jpg', 'lmk@gmail.com', '098-765-432-345', '1', '', 1, '8cb2237d0679ca88db6464eac60da9', '', 0, '2019-11-25 13:03:46'),
(13, 'luciano', 'light', '1757e641ffa1a42.jpg', 'lmk@gmail.com', '098-765-434-567', '1', '', 1, '7110eda4d09e062aa5e4a390b0a572', '', 0, '2019-11-25 13:15:05'),
(14, 'Lucien', 'Tambwe', '003.jpg', 'lmk@gmail.com', '098-764-345-670', '2', '', 1, '7c4a8d09ca3762af61e59520943dc2', '', 0, '2019-11-25 13:18:08'),
(15, 'Lucien', 'Murhula', '26-05-2013_sprayed_011.jpg', 'ezechielkalengya@gmail.com', '098-765-432-345', '1', '', 1, '8cb2237d0679ca88db6464eac60da9', '', 0, '2019-11-25 13:23:18'),
(16, 'Alaine', 'Kapanga', '1757e641ffa1a42.jpg', 'lucienne@gmail.com', '098-765-434-567', '2', '', 1, '7110eda4d09e062aa5e4a390b0a572', '', 0, '2019-11-25 17:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyID` int(11) NOT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `company_location` varchar(30) DEFAULT NULL,
  `company_country` varchar(30) DEFAULT NULL,
  `company_status` int(11) NOT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `company_picture` varchar(30) NOT NULL DEFAULT '../../img/company/image.png',
  `c_date` datetime DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyID`, `company_name`, `company_location`, `company_country`, `company_status`, `categoryID`, `company_picture`, `c_date`, `addedby`, `type`) VALUES
(19, 'IBM', 'Kigali', '1', 1, 11, '../../img/company/image.png', '2019-07-06 16:50:56', 1, 1),
(21, 'Nexmo', 'Kigali', '1', 1, 11, '../../img/company/image.png', '2019-07-06 17:10:21', 1, 1),
(22, 'Globus', 'GERMANY', '1', 1, 8, 'large.png', '2019-08-16 09:06:02', 1, 1),
(23, 'glo', 'jdjhf', '1', 1, 0, '2d.jpg', '2019-11-27 14:39:57', 13, 2),
(24, 'abc', 'kigali', '1', 1, 11, '26-05-2013_sprayed_05.jpg', '2019-11-28 07:18:00', 1, 1),
(25, 'perspectives', 'kigali', '3', 1, 0, '2.jpg', '2019-12-03 12:13:25', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `computers_picture`
--

CREATE TABLE `computers_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `computers_product`
--

CREATE TABLE `computers_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `computers_product`
--

INSERT INTO `computers_product` (`productID`, `product_name`, `product_description`, `product_quantity`, `product_price`, `product_color`, `product_status`, `product_picture`, `post_status`, `categoryID`, `subCategoryID`, `ownerID`, `owner_type`, `itID`, `c_date`) VALUES
(1, 'Computer HP I7', 'Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7Computer HP I7', 20, 700, 'Black', 0, '2e85c17b709741cad2a2b19053f077b2_p543.jpg', 0, 1, 1, 1, 5, 0, '2019-07-09 15:56:23'),
(2, 'Samsung I7', 'Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7Samsung I7', 400, 700, 'Green', 0, 'ventes_ordinateurs.jpg', 0, 1, 1, 1, 5, 0, '2019-07-09 16:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `country_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `country_name`) VALUES
(1, 'Germany'),
(2, 'China'),
(3, 'Rwanda');

-- --------------------------------------------------------

--
-- Table structure for table `electronic_cads_picture`
--

CREATE TABLE `electronic_cads_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `electronic_cads_product`
--

CREATE TABLE `electronic_cads_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `heading_light_picture`
--

CREATE TABLE `heading_light_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heading_light_product`
--

CREATE TABLE `heading_light_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `house_equipement_picture`
--

CREATE TABLE `house_equipement_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `house_equipement_product`
--

CREATE TABLE `house_equipement_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `interior_accessories_picture`
--

CREATE TABLE `interior_accessories_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interior_accessories_product`
--

CREATE TABLE `interior_accessories_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iphones_picture`
--

CREATE TABLE `iphones_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `iphones_product`
--

CREATE TABLE `iphones_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `it`
--

CREATE TABLE `it` (
  `itID` int(11) NOT NULL,
  `it_fname` varchar(30) DEFAULT NULL,
  `it_lname` varchar(30) DEFAULT NULL,
  `photoprofile` varchar(3000) DEFAULT '../../img/profile/th.jpg',
  `it_email` varchar(30) DEFAULT NULL,
  `it_phone` varchar(30) DEFAULT NULL,
  `it_pin` int(11) DEFAULT NULL,
  `it_password` varchar(255) DEFAULT NULL,
  `it_city` varchar(30) DEFAULT NULL,
  `it_country` varchar(30) DEFAULT NULL,
  `it_status` int(11) DEFAULT NULL,
  `c_date` varchar(30) DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`itID`, `it_fname`, `it_lname`, `photoprofile`, `it_email`, `it_phone`, `it_pin`, `it_password`, `it_city`, `it_country`, `it_status`, `c_date`, `addedby`, `type`) VALUES
(1, 'It', 'It', '../../img/profile/th.png', 'it@gmail.com', '250-785-474-152', 1, 'globus', 'Kigali', '3', 1, '2019-7-7 16:33:15', 1, 1),
(2, 'it', 'it', '../../img/profile/th.jpg', 'it1@gmail.com', '098-765-432-345', 1, '934c2bebef2303defabcb02375b1b4be4e79e940', 'bukavu', '2', 1, '2019-12-4 19:27:16', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `logsID` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `logs_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`logsID`, `start_time`, `end_time`, `userID`, `logs_type`) VALUES
(1, '2019-07-02 03:17:10', '2019-12-04 16:18:51', 1, 1),
(2, '2019-07-09 11:09:35', '2019-12-04 16:18:51', 1, 1),
(3, '2019-07-09 13:02:42', '2019-12-04 16:18:51', 1, 1),
(4, '2019-07-09 13:03:39', '2019-12-04 01:48:16', 1, 4),
(6, '2019-07-09 13:11:26', '2019-12-04 16:18:51', 1, 1),
(7, '2019-07-09 15:55:44', '2019-11-24 21:39:02', 1, 5),
(8, '2019-07-09 15:57:00', '2019-12-04 16:18:51', 1, 1),
(9, '2019-07-09 16:04:14', '2019-11-24 21:39:02', 1, 5),
(10, '2019-07-09 16:11:17', '2019-12-04 16:18:51', 1, 1),
(11, '2019-07-09 16:16:07', '2019-12-04 01:48:16', 1, 4),
(12, '2019-07-09 17:05:01', '2019-12-04 16:18:51', 1, 1),
(13, '2019-07-09 17:06:40', '2019-12-04 01:48:16', 1, 4),
(14, '2019-07-09 17:12:27', '2019-12-04 16:18:51', 1, 1),
(15, '2019-07-09 17:16:12', '2019-11-24 21:39:02', 1, 5),
(16, '2019-07-20 13:18:33', '2019-12-04 16:18:52', 1, 1),
(17, '2019-07-20 19:56:50', '2019-12-04 16:18:52', 1, 1),
(18, '2019-07-23 15:21:17', '2019-12-04 16:18:52', 1, 1),
(19, '2019-07-23 19:13:45', '2019-12-04 16:18:52', 1, 1),
(20, '2019-07-27 01:56:38', '2019-12-04 16:18:52', 1, 1),
(21, '2019-08-07 08:40:33', '2019-12-04 16:18:52', 1, 1),
(22, '2019-08-07 08:45:53', '2019-12-04 01:48:17', 1, 4),
(23, '2019-08-07 10:01:03', '2019-12-04 16:18:52', 1, 1),
(24, '2019-08-07 10:51:22', '2019-12-04 16:18:52', 1, 1),
(25, '2019-08-07 10:52:41', '2019-12-04 01:48:17', 1, 4),
(26, '2019-08-08 02:37:08', '2019-12-04 16:18:52', 1, 1),
(27, '2019-08-08 16:40:42', '2019-12-04 16:18:52', 1, 1),
(28, '2019-08-09 04:13:56', '2019-12-04 16:18:52', 1, 1),
(29, '2019-08-09 06:01:19', '2019-12-04 16:18:52', 1, 1),
(30, '2019-08-10 07:10:48', '2019-12-04 16:18:52', 1, 1),
(31, '2019-08-10 12:17:57', '2019-12-04 16:18:52', 1, 1),
(32, '2019-08-11 12:05:31', '2019-12-04 16:18:52', 1, 1),
(33, '2019-08-16 03:35:59', '2019-12-04 16:18:52', 1, 1),
(34, '2019-08-16 05:33:21', '2019-12-04 16:18:53', 1, 1),
(35, '2019-08-16 08:06:00', '2019-12-04 16:18:53', 1, 1),
(36, '2019-08-20 08:28:22', '2019-12-04 16:18:53', 1, 1),
(37, '2019-08-23 13:45:33', '2019-12-04 16:18:53', 1, 1),
(38, '2019-09-07 05:07:35', '2019-12-04 16:18:53', 1, 1),
(39, '2019-09-07 07:27:50', '2019-12-04 16:18:53', 1, 1),
(40, '2019-09-08 17:41:38', '2019-12-04 16:18:53', 1, 1),
(41, '2019-09-10 04:46:10', '2019-12-04 16:18:53', 1, 1),
(42, '2019-10-08 04:14:33', '2019-12-04 16:18:53', 1, 1),
(43, '2019-10-17 09:29:34', '2019-12-04 16:18:53', 1, 1),
(44, '2019-10-23 06:00:14', '2019-12-04 16:18:53', 1, 1),
(45, '2019-10-29 03:49:39', '2019-12-04 16:18:53', 1, 1),
(46, '2019-11-06 07:29:26', '2019-12-04 16:18:53', 1, 1),
(47, '2019-11-06 08:10:50', '2019-12-04 16:18:53', 1, 1),
(48, '2019-11-06 08:21:42', '2019-12-04 16:18:53', 1, 1),
(49, '2019-11-24 20:55:25', '2019-11-24 21:39:02', 1, 5),
(50, '2019-11-24 21:12:31', '2019-12-04 16:18:53', 1, 1),
(51, '2019-11-24 21:17:09', '2019-11-24 21:39:02', 1, 5),
(52, '2019-11-24 21:18:31', '2019-12-04 16:18:53', 1, 1),
(53, '2019-11-24 21:27:38', '2019-11-24 21:39:02', 1, 5),
(54, '2019-11-24 22:11:00', '2019-11-24 22:38:05', 1, 6),
(55, '2019-11-24 22:38:25', '2019-12-04 16:18:53', 1, 1),
(56, '2019-11-24 22:40:37', '2019-11-24 22:44:31', 3, 6),
(57, '2019-11-24 22:45:53', '2019-12-04 01:48:17', 1, 4),
(58, '2019-11-25 13:28:41', '2019-12-04 16:18:54', 1, 1),
(59, '2019-11-27 10:25:10', '2019-12-04 16:18:54', 1, 1),
(60, '2019-11-27 10:37:55', '2019-12-04 16:18:54', 1, 1),
(61, '2019-11-27 10:39:57', '2019-12-04 01:50:48', 10, 3),
(62, '2019-11-27 10:55:13', '2019-12-04 16:18:54', 1, 1),
(63, '2019-11-27 10:57:00', '2019-12-04 16:18:54', 1, 1),
(64, '2019-11-27 10:59:22', '2019-12-04 16:18:54', 1, 1),
(65, '2019-11-27 11:02:19', '2019-12-04 16:18:54', 1, 1),
(66, '2019-11-27 11:04:34', '2019-12-04 16:18:54', 1, 1),
(67, '2019-11-27 11:05:59', '2019-12-04 01:48:17', 1, 4),
(68, '2019-11-27 11:23:14', '2019-11-28 04:04:53', 13, 2),
(69, '2019-11-27 11:32:04', '2019-12-04 16:18:54', 1, 1),
(70, '2019-11-27 11:35:08', '2019-11-28 04:04:53', 13, 2),
(71, '2019-11-27 11:51:34', '2019-11-28 04:04:53', 13, 2),
(72, '2019-11-27 12:12:02', '2019-12-04 16:18:54', 1, 1),
(73, '2019-11-27 12:17:23', '2019-11-28 04:04:53', 13, 2),
(74, '2019-11-27 12:33:12', '2019-12-04 16:18:54', 1, 1),
(75, '2019-11-27 12:37:21', '2019-12-04 01:48:17', 1, 4),
(76, '2019-11-27 12:48:30', '2019-11-28 04:04:53', 13, 2),
(77, '2019-11-27 12:59:55', '2019-12-04 16:18:54', 1, 1),
(78, '2019-11-27 13:56:59', '2019-11-27 14:00:31', 3, 5),
(79, '2019-11-27 13:57:49', '2019-12-04 16:18:54', 1, 1),
(80, '2019-11-27 13:59:51', '2019-11-27 14:00:31', 3, 5),
(81, '2019-11-27 14:00:40', '2019-12-04 01:48:17', 1, 4),
(82, '2019-11-28 01:36:13', '2019-11-28 04:04:53', 13, 2),
(83, '2019-11-28 02:27:01', '2019-12-04 16:18:54', 1, 1),
(84, '2019-11-28 02:29:55', '2019-11-28 04:04:53', 13, 2),
(85, '2019-11-28 04:06:49', '2019-12-04 16:18:54', 1, 1),
(86, '2019-11-28 04:21:22', NULL, 13, 2),
(87, '2019-12-03 09:01:11', '2019-12-04 01:48:17', 1, 4),
(88, '2019-12-03 09:04:52', '2019-12-04 01:50:48', 10, 3),
(89, '2019-12-03 11:35:16', '2019-12-04 16:18:54', 1, 1),
(90, '2019-12-03 11:40:06', '2019-12-04 01:48:17', 1, 4),
(91, '2019-12-04 01:49:24', '2019-12-04 01:50:48', 10, 3),
(92, '2019-12-04 01:53:03', NULL, 1, 4),
(93, '2019-12-04 15:58:53', '2019-12-04 16:18:54', 1, 1),
(94, '2019-12-04 16:11:07', '2019-12-04 16:18:54', 1, 1),
(95, '2019-12-04 16:16:46', '2019-12-04 16:18:54', 1, 1),
(96, '2019-12-04 16:19:40', '2019-12-04 17:43:16', 6, 1),
(97, '2019-12-04 16:31:33', '2019-12-04 17:41:52', 2, 4),
(98, '2019-12-04 17:42:03', '2019-12-04 17:43:16', 6, 1),
(99, '2019-12-04 17:43:58', NULL, 4, 5),
(100, '2019-12-04 22:23:20', NULL, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oparations`
--

CREATE TABLE `oparations` (
  `id` int(11) NOT NULL,
  `clientID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `product_table` int(11) NOT NULL,
  `subCategoryID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `Campany` int(11) DEFAULT NULL,
  `beneficient_type` int(11) DEFAULT NULL,
  `beneficientID` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `others_picture`
--

CREATE TABLE `others_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `others_product`
--

CREATE TABLE `others_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `security_camera_picture`
--

CREATE TABLE `security_camera_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `security_camera_product`
--

CREATE TABLE `security_camera_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerID` int(11) NOT NULL,
  `seller_fname` varchar(30) DEFAULT NULL,
  `seller_lname` varchar(30) DEFAULT NULL,
  `photoprofile` varchar(3000) DEFAULT '../../img/profile/th.jpg',
  `seller_email` varchar(30) DEFAULT NULL,
  `seller_phone` varchar(30) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `seller_gender` varchar(30) DEFAULT NULL,
  `seller_location` varchar(30) DEFAULT NULL,
  `seller_status` int(11) DEFAULT NULL,
  `seller_country` varchar(30) DEFAULT NULL,
  `seller_nationality` varchar(30) DEFAULT NULL,
  `seller_pin` int(11) DEFAULT NULL,
  `seller_password` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerID`, `seller_fname`, `seller_lname`, `photoprofile`, `seller_email`, `seller_phone`, `companyID`, `categoryID`, `subCategoryID`, `seller_gender`, `seller_location`, `seller_status`, `seller_country`, `seller_nationality`, `seller_pin`, `seller_password`, `c_date`, `addedby`, `type`) VALUES
(1, 'sell', 'Seller', NULL, 'seller@gmail.com', '250-785-255-258', 19, 1, 4, NULL, 'Kigali', 1, '3', NULL, 1, '123456', NULL, 1, 1),
(2, 'Sel', 'Sel', NULL, 'sel@gmail.com', '250-785-258-985', 19, 1, 2, NULL, 'Kigali', 1, '1', NULL, 1, 'globus', NULL, 1, 1),
(3, 'lucien', 'murhula', '../../img/profile/th.jpg', 'seller1@gmail.com', '098-765-433-456', 22, 8, 16, NULL, 'rwanda', 1, '2', NULL, 1, '12345', NULL, 1, 1),
(4, 'lucien', 'kdkd', '../../img/profile/th.jpg', 'lkjdf@gmail.com', '987-654-567-890', 0, 0, 0, NULL, 'kdkd', 1, '1', NULL, 0, '934c2bebef2303defabcb02375b1b4be4e79e940', NULL, 10, 3),
(5, 'lucien', 'Seller', '../../img/profile/th.jpg', 'seller1@gmail.com', '098-765-434-567', 0, 0, 0, NULL, 'hongkong', 1, '2', NULL, 0, 'globus', NULL, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart`
--

CREATE TABLE `shop_cart` (
  `id` int(11) NOT NULL,
  `clientID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `product_table` varchar(255) DEFAULT NULL,
  `subCategoryID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `shop_cart`
--

INSERT INTO `shop_cart` (`id`, `clientID`, `productID`, `product_table`, `subCategoryID`, `CategoryID`, `quantity`, `price`, `c_date`) VALUES
(73, 16, 1, 'back_light_product', 10, 8, 1, 500, '2019-12-05 01:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `shop_wishing`
--

CREATE TABLE `shop_wishing` (
  `id` int(11) NOT NULL,
  `clientID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `product_table` varchar(255) DEFAULT NULL,
  `subCategoryID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subCategoryID` int(11) NOT NULL,
  `subCategory_name` varchar(255) NOT NULL,
  `subCategory_path` text NOT NULL,
  `subCategory_picture` text NOT NULL,
  `table_product` varchar(2000) NOT NULL,
  `table_picture` varchar(2000) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subCategoryID`, `subCategory_name`, `subCategory_path`, `subCategory_picture`, `table_product`, `table_picture`, `categoryID`, `adminID`, `status`, `post`, `c_date`) VALUES
(1, 'Computers', '../../img/product/technology/computers/', '../../img/product/technology/computers/lg.jpg', 'computers_product', 'computers_picture', 1, 1, 0, 0, '2019-07-09 15:24:43'),
(2, 'Cameras', '../../img/product/technology/cameras/', '../../img/product/lg.jpg', 'cameras_product', 'cameras_picture', 1, 1, 0, 0, '2019-07-09 15:27:02'),
(3, 'Iphones', '../../img/product/technology/iphones/', '../../img/product/lg.jpg', 'iphones_product', 'iphones_picture', 1, 1, 0, 0, '2019-07-09 15:29:08'),
(4, 'Electronic Cads', '../../img/product/technology/electronic_cads/', '../../img/product/lg.jpg', 'electronic_cads_product', 'electronic_cads_picture', 1, 1, 0, 0, '2019-07-09 15:31:05'),
(5, 'Security Camera', '../../img/product/technology/security_camera/', '../../img/product/lg.jpg', 'security_camera_product', 'security_camera_picture', 1, 1, 0, 0, '2019-07-09 15:33:48'),
(6, 'Card Printer', '../../img/product/technology/card_printer/', '../../img/product/technology/card_printer/canon-pixma-mg7550-1.jpg', 'card_printer_product', 'card_printer_picture', 1, 1, 0, 0, '2019-07-09 15:34:47'),
(7, 'Cads', '../../img/product/technology/cads/', '../../img/product/technology/cads/367da26f-manycam-free-webcam-effects.jpg', 'cads_product', 'cads_picture', 1, 1, 0, 0, '2019-07-09 15:35:11'),
(8, 'House Equipement', '../../img/product/furnitures/house_equipement/', '../../img/product/furnitures/house_equipement/1,,..4X6 (6).jpg', 'house_equipement_product', 'house_equipement_picture', 2, 0, 0, 0, '2019-07-09 16:19:47'),
(9, 'VIP Table', '../../img/product/furnitures/vip_table/', '../../img/product/lg.jpg', 'vip_table_product', 'vip_table_picture', 2, 1, 0, 0, '2019-07-09 17:14:05'),
(10, 'BACK LIGHT', '../../img/product/car_parts/back_light/', '../../img/product/car_parts/back_light/Tailights_1024x1024.png', 'back_light_product', 'back_light_picture', 8, 1, 0, 0, '2019-08-16 08:34:28'),
(11, 'CAR COMPUTERS', '../../img/product/car_parts/car_computers/', '../../img/product/car_parts/car_computers/ECUBottomLone-700.jpg', 'car_computers_product', 'car_computers_picture', 8, 1, 0, 0, '2019-08-16 08:35:30'),
(12, 'WINDSHIELD', '../../img/product/car_parts/windshield/', '../../img/product/car_parts/windshield/imgbin-car-glass-windshield-window-opel-TJLiBVMN5B6X0GFs9HhDCXP2V.jpg', 'windshield_product', 'windshield_picture', 8, 1, 0, 0, '2019-08-16 08:37:05'),
(13, 'HEADING LIGHT', '../../img/product/car_parts/heading_light/', '../../img/product/car_parts/heading_light/spyder-chrome-crystal-headlights-euro-style.jpg', 'heading_light_product', 'heading_light_picture', 8, 1, 0, 0, '2019-08-16 08:38:20'),
(14, 'WHEELS AND TIRES', '../../img/product/car_parts/wheels_and_tires/', '../../img/product/car_parts/wheels_and_tires/21029-5-Speichen-Rad-Mercedes-Benz-18-Zoll-W205-S205-Winterraeder-Alufelgen-Felgen-Winterreifen-Neu_1.png', 'wheels_and_tires_product', 'wheels_and_tires_picture', 8, 1, 0, 0, '2019-08-16 08:39:48'),
(15, 'CAR BODY PARTIES', '../../img/product/car_parts/car_body_parties/', '../../img/product/car_parts/car_body_parties/Piese-caroserie_4799081_1332516302.jpg', 'car_body_parties_product', 'car_body_parties_picture', 8, 1, 0, 0, '2019-08-16 08:51:10'),
(16, 'INTERIOR ACCESSORIES', '../../img/product/car_parts/interior_accessories/', '../../img/product/car_parts/interior_accessories/autopart.jpg', 'interior_accessories_product', 'interior_accessories_picture', 8, 1, 0, 0, '2019-08-16 08:53:49'),
(17, 'OTHERS', '../../img/product/car_parts/others/', '../../img/product/car_parts/others/Pas-19-0290-Dig-3x2.jpg', 'others_product', 'others_picture', 8, 1, 0, 0, '2019-08-16 08:54:43');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(11) NOT NULL,
  `supplier_fname` varchar(30) DEFAULT NULL,
  `supplier_lname` varchar(30) DEFAULT NULL,
  `photoprofile` varchar(3000) DEFAULT '../../img/profile/th.jpg',
  `supplier_email` varchar(30) DEFAULT NULL,
  `supplier_phone` varchar(30) DEFAULT NULL,
  `companyID` int(11) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `supplier_gender` varchar(30) DEFAULT NULL,
  `supplier_location` varchar(30) DEFAULT NULL,
  `supplier_status` int(11) DEFAULT NULL,
  `supplier_country` varchar(30) DEFAULT NULL,
  `supplier_nationality` varchar(30) DEFAULT NULL,
  `supplier_pin` int(11) DEFAULT NULL,
  `supplier_password` varchar(255) DEFAULT NULL,
  `c_date` datetime DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplier_fname`, `supplier_lname`, `photoprofile`, `supplier_email`, `supplier_phone`, `companyID`, `categoryID`, `subCategoryID`, `supplier_gender`, `supplier_location`, `supplier_status`, `supplier_country`, `supplier_nationality`, `supplier_pin`, `supplier_password`, `c_date`, `addedby`, `type`) VALUES
(1, 'supp', 'Supplier', NULL, 'supplier@gmail.com', '250-788-527-418', 19, 1, 1, NULL, 'Kigali', 1, '3', NULL, 0, '934c2bebef2303defabcb02375b1b4be4e79e940', '2019-07-07 15:34:23', 1, 1),
(2, 'Sup', 'Sup', NULL, 'supp@gmail.com', '250-785-412-147', 21, 3, 6, NULL, 'Kigali', 1, '3', NULL, 0, '934c2bebef2303defabcb02375b1b4', '2019-07-07 15:35:07', 1, 1),
(3, 'Supplier', 'Supplier', '../img/profile/th.png', 'supplier1@gmail.com', '098-765-432-654', 21, 1, 1, NULL, 'kigali', 0, '3', NULL, 1, 'globus', '2019-11-24 22:54:38', 1, 1),
(4, 'lucien', 'murhula', '../../img/profile/th.jpg', 'supplier2@gmail.com', '098-765-432-345', 22, 8, 10, NULL, 'kigali', 1, '1', NULL, 1, '934c2bebef2303defabcb02375b1b4be4e79e940', '2019-12-04 20:43:07', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vip_table_picture`
--

CREATE TABLE `vip_table_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vip_table_product`
--

CREATE TABLE `vip_table_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wheels_and_tires_picture`
--

CREATE TABLE `wheels_and_tires_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wheels_and_tires_product`
--

CREATE TABLE `wheels_and_tires_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `windshield_picture`
--

CREATE TABLE `windshield_picture` (
  `pictureID` int(11) NOT NULL,
  `picture_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_status` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `windshield_product`
--

CREATE TABLE `windshield_product` (
  `productID` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `product_picture` text COLLATE utf8_unicode_ci NOT NULL,
  `post_status` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `subCategoryID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `owner_type` int(11) NOT NULL,
  `itID` int(11) NOT NULL,
  `c_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agentID`);

--
-- Indexes for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD PRIMARY KEY (`ambassadorID`);

--
-- Indexes for table `back_light_picture`
--
ALTER TABLE `back_light_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `back_light_product`
--
ALTER TABLE `back_light_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `cads_picture`
--
ALTER TABLE `cads_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `cads_product`
--
ALTER TABLE `cads_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `cameras_picture`
--
ALTER TABLE `cameras_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `cameras_product`
--
ALTER TABLE `cameras_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `card_printer_picture`
--
ALTER TABLE `card_printer_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `card_printer_product`
--
ALTER TABLE `card_printer_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `car_body_parties_picture`
--
ALTER TABLE `car_body_parties_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `car_body_parties_product`
--
ALTER TABLE `car_body_parties_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `car_computers_picture`
--
ALTER TABLE `car_computers_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `car_computers_product`
--
ALTER TABLE `car_computers_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `computers_picture`
--
ALTER TABLE `computers_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `computers_product`
--
ALTER TABLE `computers_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `electronic_cads_picture`
--
ALTER TABLE `electronic_cads_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `electronic_cads_product`
--
ALTER TABLE `electronic_cads_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `heading_light_picture`
--
ALTER TABLE `heading_light_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `heading_light_product`
--
ALTER TABLE `heading_light_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `house_equipement_picture`
--
ALTER TABLE `house_equipement_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `house_equipement_product`
--
ALTER TABLE `house_equipement_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `interior_accessories_picture`
--
ALTER TABLE `interior_accessories_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `interior_accessories_product`
--
ALTER TABLE `interior_accessories_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `iphones_picture`
--
ALTER TABLE `iphones_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `iphones_product`
--
ALTER TABLE `iphones_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD PRIMARY KEY (`itID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`logsID`);

--
-- Indexes for table `oparations`
--
ALTER TABLE `oparations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others_picture`
--
ALTER TABLE `others_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `others_product`
--
ALTER TABLE `others_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `security_camera_picture`
--
ALTER TABLE `security_camera_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `security_camera_product`
--
ALTER TABLE `security_camera_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerID`);

--
-- Indexes for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_wishing`
--
ALTER TABLE `shop_wishing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subCategoryID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`),
  ADD KEY `companyID` (`companyID`);

--
-- Indexes for table `vip_table_picture`
--
ALTER TABLE `vip_table_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `vip_table_product`
--
ALTER TABLE `vip_table_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `wheels_and_tires_picture`
--
ALTER TABLE `wheels_and_tires_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `wheels_and_tires_product`
--
ALTER TABLE `wheels_and_tires_product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `windshield_picture`
--
ALTER TABLE `windshield_picture`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `windshield_product`
--
ALTER TABLE `windshield_product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ambassador`
--
ALTER TABLE `ambassador`
  MODIFY `ambassadorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `back_light_picture`
--
ALTER TABLE `back_light_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `back_light_product`
--
ALTER TABLE `back_light_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cads_picture`
--
ALTER TABLE `cads_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cads_product`
--
ALTER TABLE `cads_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cameras_picture`
--
ALTER TABLE `cameras_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cameras_product`
--
ALTER TABLE `cameras_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_printer_picture`
--
ALTER TABLE `card_printer_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_printer_product`
--
ALTER TABLE `card_printer_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_body_parties_picture`
--
ALTER TABLE `car_body_parties_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_body_parties_product`
--
ALTER TABLE `car_body_parties_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_computers_picture`
--
ALTER TABLE `car_computers_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car_computers_product`
--
ALTER TABLE `car_computers_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `computers_picture`
--
ALTER TABLE `computers_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `computers_product`
--
ALTER TABLE `computers_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `electronic_cads_picture`
--
ALTER TABLE `electronic_cads_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electronic_cads_product`
--
ALTER TABLE `electronic_cads_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heading_light_picture`
--
ALTER TABLE `heading_light_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heading_light_product`
--
ALTER TABLE `heading_light_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house_equipement_picture`
--
ALTER TABLE `house_equipement_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `house_equipement_product`
--
ALTER TABLE `house_equipement_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interior_accessories_picture`
--
ALTER TABLE `interior_accessories_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interior_accessories_product`
--
ALTER TABLE `interior_accessories_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iphones_picture`
--
ALTER TABLE `iphones_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iphones_product`
--
ALTER TABLE `iphones_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `it`
--
ALTER TABLE `it`
  MODIFY `itID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `logsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `oparations`
--
ALTER TABLE `oparations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `others_picture`
--
ALTER TABLE `others_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `others_product`
--
ALTER TABLE `others_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `security_camera_picture`
--
ALTER TABLE `security_camera_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `security_camera_product`
--
ALTER TABLE `security_camera_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `shop_wishing`
--
ALTER TABLE `shop_wishing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vip_table_picture`
--
ALTER TABLE `vip_table_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vip_table_product`
--
ALTER TABLE `vip_table_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wheels_and_tires_picture`
--
ALTER TABLE `wheels_and_tires_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wheels_and_tires_product`
--
ALTER TABLE `wheels_and_tires_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `windshield_picture`
--
ALTER TABLE `windshield_picture`
  MODIFY `pictureID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `windshield_product`
--
ALTER TABLE `windshield_product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`companyID`) REFERENCES `company` (`companyID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
