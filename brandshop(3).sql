-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2015 at 04:25 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brandshop`
--
CREATE DATABASE IF NOT EXISTS `brandshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `brandshop`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(3) unsigned NOT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `status`) VALUES
(1, 'Men', 1),
(2, 'Women', 1),
(3, 'Childreen', 1),
(4, 'Child Pant', 0),
(5, 'Child Shirt', 0),
(6, 'Gents Shirt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` int(11) unsigned NOT NULL,
  `p_id` int(11) unsigned NOT NULL,
  `com_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `star` int(1) unsigned NOT NULL,
  `com_date` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `p_id`, `com_name`, `com_email`, `star`, `com_date`, `comment`) VALUES
(1, 1, 'SA', 'sayemkr.abu@gmail.com', 5, '2015-01-22', '\r\n    Description\r\n    Additional Info\r\n    Reviews (0)\r\n\r\nAdd a review'),
(2, 11, 'Abu Sayem', 'sayem@asteriskbd.com', 0, '2015-01-26', 'SSSSSSSSSSSSSSSSSSSSSSSSSSS');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
`con_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `con_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_message` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`con_id`, `created_at`, `con_name`, `con_email`, `con_message`, `status`) VALUES
(1, '2015-01-15 06:05:09', 'sssssss22', 'sayem@gmail.com', 'aaaaaaaaaaaaaaaaa', 1),
(2, '2015-01-15 06:13:43', 'sssssss22', 'sayem@gmail.com', 'aaaaaaaaaaaaaaaaa', 0),
(3, '2015-01-22 20:33:09', 'sssssss', 'sayem@gmail.com', '5512 Lorem Ipsum Vestibulum Mas, Dolor Sit Amet, 666', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`cus_id` int(11) unsigned NOT NULL,
  `cus_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cus_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N/A',
  `cus_address` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`created_at`, `cus_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_address`) VALUES
('2015-01-22 20:31:38', 1, 'Abu Sayem', 'sayem_102@diu.edu.bd', '01718775095', 'Lalmatia,Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
`img_id` int(11) unsigned NOT NULL,
  `p_id` int(11) unsigned NOT NULL,
  `img_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `featured_img` tinyint(1) unsigned DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `p_id`, `img_name`, `featured_img`) VALUES
(1, 1, 'e6d6aea2f97aa76fca255dde35903be5.jpg', 1),
(2, 2, 'cdf189d6b2f2122660d266420a7c4d2e.jpg', 1),
(3, 3, 'cac5a49925b9219b79c01e2393b08156.jpg', 1),
(4, 4, 'c954ae3c05fa383e1ea2a24567872039.png', 1),
(5, 5, '6d32592ea02efb2b9f8871280d062d8d.jpg', 1),
(6, 6, '0ad25440da01f5866d7df9576312e479.jpg', 1),
(7, 7, 'e944b69f50531a8cc04b7beb06c04d90.jpg', 1),
(8, 8, 'a1154bc0eb6d05b7d1f2249d1eb8560d.jpg', 1),
(9, 9, 'a1154bc0eb6d05b7d1f2249d1eb8560d.jpg', 1),
(10, 10, 'a1154bc0eb6d05b7d1f2249d1eb8560d.jpg', 1),
(11, 11, '6935b5f8e84448ce10f2e94066d51325.jpg', 1),
(12, 12, 'e944b69f50531a8cc04b7beb06c04d90.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(11) unsigned NOT NULL,
  `cus_id` int(11) unsigned NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_paid` int(11) NOT NULL DEFAULT '0',
  `order_due` int(11) NOT NULL DEFAULT '0',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) unsigned NOT NULL,
  `Remarks` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cus_id`, `order_price`, `order_paid`, `order_due`, `date_time`, `status`, `Remarks`) VALUES
(1, 1, 28000, 5000, 23000, '2015-01-22 20:31:38', 1, ''),
(2, 1, 56000, 50000, 6000, '2015-01-22 20:45:50', 1, ''),
(3, 1, 6000, 6000, 0, '2015-01-23 04:53:51', 2, ''),
(4, 1, 4500, 0, 4500, '2015-01-23 15:41:39', 0, ''),
(5, 1, 6000, 0, 6000, '2015-01-25 16:20:13', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
`op_id` int(11) unsigned NOT NULL,
  `order_id` int(11) unsigned NOT NULL,
  `p_id` int(11) unsigned NOT NULL,
  `quantity` int(5) unsigned NOT NULL,
  `op_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `op_color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `op_price` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`op_id`, `order_id`, `p_id`, `quantity`, `op_size`, `op_color`, `op_price`, `date_time`) VALUES
(1, 1, 1, 4, 'XL', 'Black', 28000, '2015-01-22 20:31:38'),
(2, 2, 1, 8, 'XXL', 'Green', 56000, '2015-01-22 20:45:50'),
(3, 3, 2, 4, 'XL', 'Black', 6000, '2015-01-23 04:53:51'),
(4, 4, 2, 3, 'XL', 'Black', 4500, '2015-01-23 15:41:39'),
(5, 5, 4, 3, 'XL', 'Red', 6000, '2015-01-25 16:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
`p_id` int(11) unsigned NOT NULL,
  `p_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) unsigned NOT NULL,
  `price` int(11) NOT NULL,
  `p_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_dimension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_summary` text COLLATE utf8_unicode_ci NOT NULL,
  `feature_product` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `cat_id`, `price`, `p_color`, `p_dimension`, `p_summary`, `feature_product`, `description`, `status`) VALUES
(1, 'Colored Jeans', 2, 7000, 'Black,Yelow,Green', 'XL,XXL,M,L,S', 'http://194.60.68.25/brandshop', 1, ' http://194.60.68.25/brandshop/cart/ajaxView', 1),
(2, 'T-Shirt', 1, 1500, 'Black,Yelow,Green', 'XL,XXL,M,L,S', 'Many web scripts and web based software that are related to image generation and manipulation, depend upon the PHP GD library to work. PHP GD is the ..', 1, ' Many web scripts and web based software that are related to image generation and manipulation, depend upon the PHP GD library to work. PHP GD is the ..Many web scripts and web based software that are related to image generation and manipulation, depend upon the PHP GD library to work. PHP GD is the ..', 1),
(3, 'T-Shirt2', 1, 1200, 'B,W,Y', 'XL,XXL,M,L,S', 'Many web scripts and web based software that are related to image generation and manipulation, depend upon the PHP GD library to work. PHP GD is the ..', 1, 'Many web scripts and web based software that are related to image generation and manipulation, depend upon the PHP GD library to work. PHP GD is the ..Many web scripts and web based software that are related to image generation and manipulation, depend upon the PHP GD library to work. PHP GD is the ..Many web scripts and web based software that are related to image generation and manipulation, depend upon the PHP GD library to work. PHP GD is the .. ', 1),
(4, 'IMG', 2, 2000, 'Red,Yellow', 'XL,XXL,M,L,S', 'ASsdcbjdbckjdnc,  cjbc cm kjc jn cxbc s,m', 1, ' ASsdcbjdbckjdnc,  cjbc cm kjc jn cxbc s,mASsdcbjdbckjdnc,  cjbc cm kjc jn cxbc s,mASsdcbjdbckjdnc,  cjbc cm kjc jn cxbc s,mASsdcbjdbckjdnc,  cjbc cm kjc jn cxbc s,mASsdcbjdbckjdnc,  cjbc cm kjc jn cxbc s,mASsdcbjdbckjdnc,  cjbc cm kjc jn cxbc s,m ', 1),
(5, 'Pants', 1, 2000, 'B,W,Y', 'XL,XXL,M,L,S', 'Men''s new clothing | The latest men''s fashion | ASOS\r\nwww.asos.com290 × 370Search by image\r\nBoy London Knuckles Sweatpants\r\nRelated images:\r\nView more\r\nView more\r\nImages may be subject to copyright.Send feedback\r\nMens Fashion Suits 2014\r\nwww.designsnext.com800 × 1066Search by image\r\nmens fashion 2014 768x1024\r\nImages may be subject to copyright.Send feedback', 1, ' Men''s new clothing | The latest men''s fashion | ASOS\r\nwww.asos.com290 × 370Search by image\r\nBoy London Knuckles Sweatpants\r\nRelated images:\r\nView more\r\nView more\r\nImages may be subject to copyright.Send feedback\r\nMens Fashion Suits 2014\r\nwww.designsnext.com800 × 1066Search by image\r\nmens fashion 2014 768x1024\r\nImages may be subject to copyright.Send feedbackMen''s new clothing | The latest men''s fashion | ASOS\r\nwww.asos.com290 × 370Search by image\r\nBoy London Knuckles Sweatpants\r\nRelated images:\r\nView more\r\nView more\r\nImages may be subject to copyright.Send feedback\r\nMens Fashion Suits 2014\r\nwww.designsnext.com800 × 1066Search by image\r\nmens fashion 2014 768x1024\r\nImages may be subject to copyright.Send feedback', 1),
(6, 'SHirt', 1, 2500, 'Black,Yelow,Green', 'XL,XXL,M,L,S', 'cbskjccccccccccccccccc xnmxmcbn xm mxbcmnx mbxm bkcbkjsbckjsbckjskckj mx kb', 1, 'cbskjccccccccccccccccc xnmxmcbn xm mxbcmnx mbxm bkcbkjsbckjsbckjskckj mx kbcbskjccccccccccccccccc xnmxmcbn xm mxbcmnx mbxm bkcbkjsbckjsbckjskckj mx kbcbskjccccccccccccccccc xnmxmcbn xm mxbcmnx mbxm bkcbkjsbckjsbckjskckj mx kb ', 1),
(7, 'T-Shirt', 6, 500, 'Red,Yellow', 'XL,XXL,M,L,S', 'CodeIgniter''s Pagination class is very easy to use, and it is 100% customizable, either dynamically or via stored preferences.\r\nIf you are not familiar with the term "pagination", it refers to links that allows you to navigate from page to page, like this:', 0, ' CodeIgniter''s Pagination class is very easy to use, and it is 100% customizable, either dynamically or via stored preferences.\r\n\r\nIf you are not familiar with the term "pagination", it refers to links that allows you to navigate from page to page, like this:CodeIgniter''s Pagination class is very easy to use, and it is 100% customizable, either dynamically or via stored preferences.\r\n\r\nIf you are not familiar with the term "pagination", it refers to links that allows you to navigate from page to page, like this: ', 1),
(8, 'T-Shirt', 6, 500, 'Red,Yellow', 'XL,XXL,M,L,S', 'CodeIgniter''s Pagination class is very easy to use, and it is 100% customizable, either dynamically or via stored preferences.\r\nIf you are not familiar with the term "pagination", it refers to links that allows you to navigate from page to page, like this:', 0, ' CodeIgniter''s Pagination class is very easy to use, and it is 100% customizable, either dynamically or via stored preferences.\r\n\r\nIf you are not familiar with the term "pagination", it refers to links that allows you to navigate from page to page, like this:CodeIgniter''s Pagination class is very easy to use, and it is 100% customizable, either dynamically or via stored preferences.\r\n\r\nIf you are not familiar with the term "pagination", it refers to links that allows you to navigate from page to page, like this: ', 1),
(9, 'Suit', 1, 3000, 'Red,Yellow', 'XL,XXL,M,L,S', 'Generates an insert string based on the data you supply, and runs the query. You can either pass an array or an object to the function. Here is an example using an array', 1, ' Generates an insert string based on the data you supply, and runs the query. You can either pass an array or an object to the function. Here is an example using an arrayGenerates an insert string based on the data you supply, and runs the query. You can either pass an array or an object to the function. Here is an example using an array', 1),
(10, 'Child Shirt', 6, 400, 'Black,Yelow,Green', 'XL,XXL,M,L,S', '$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();', 0, ' $data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories(); ', 1),
(11, 'Child Shirt', 6, 400, 'Black,Yelow,Green', 'XL,XXL,M,L,S', '$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();', 0, ' $data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories(); ', 1),
(12, 'Child Shirt', 6, 400, 'Black,Yelow,Green', 'XL,XXL,M,L,S', '$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();', 0, ' $data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories();$data[''categories'']=$this->cm->getCategories(); ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1433e031af4df384b1a444aa7dd28bad', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422358164, ''),
('2719e02cc6ecd88886f5a639be878207', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422336299, ''),
('3e42cd43905ed68e1914bb31e329d0ce', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422357756, ''),
('40e58bab2c52befdc22635630162437a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422339438, ''),
('43b937174453b1593cafdad4368b3b52', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422357955, ''),
('4c67ac90ffeb6c999c2ecf72c46d4073', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422348039, ''),
('4e5ceb48ce52fbd93dc9de90604706e9', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422350353, ''),
('6c582e3319717a7aa35a40e520c711a2', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422359207, ''),
('72069cfad96c4b5f8b690c4215b55a1e', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422337630, ''),
('87db1bf02001c57cca9ce34edf5aaaf3', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422358524, ''),
('898b39b033352f46dc59ded9d0ada3b5', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422347866, ''),
('a3afb94883228c8eb124d1eadb102b15', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422411822, 'a:2:{s:8:"username";s:5:"admin";s:9:"islogedin";i:1;}'),
('ae14f03aae8a042a3c7480c0d603490e', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422339779, ''),
('b7e36a421a1b6c7763fe0c75d861ec4e', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422338566, ''),
('c1f8474d289d19136084ddd9bed96040', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422351203, ''),
('c6d10ccd4956d5c28d001ffc8d3bb8c7', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422343727, ''),
('d3e18ca16f5a84625da4828d75d44a1a', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422348310, ''),
('e1636a3b136eb17ac152eda71a1ca841', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422348957, ''),
('e61e54accb1aa1ee4449988224582c7c', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422358183, ''),
('e6be289a82a65e4721c4ca8ac3f3607f', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422351202, ''),
('e72d72804ba42ff5a3fbaf442050fda8', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422350609, ''),
('e97d48968396cc12aa15c7b00b071d79', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1422339560, ''),
('f5164b24f73a4663c7afc9175feb8e39', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0 FirePHP/0.7.4', 1422350610, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) unsigned NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password_salt` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `activission_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code_lifetime` int(20) unsigned NOT NULL,
  `registration_time` int(20) unsigned NOT NULL,
  `assign_roles` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `username`, `password`, `password_salt`, `email`, `activission_code`, `code_lifetime`, `registration_time`, `assign_roles`, `status`) VALUES
(1, 'Abu Sayem', 'admin', '83f3b32a182287f382942381b9c17ce95b4f23fa', 'ERarmlGo!*eWbABU', 'sayem@asteriskbd.com', '9loXkOIB!#x*4gaFmnCL', 1415019291, 1414932891, '', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`), ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`img_id`), ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`), ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
 ADD PRIMARY KEY (`op_id`), ADD KEY `order_id` (`order_id`), ADD KEY `p_i` (`p_id`), ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`p_id`), ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `con_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `cus_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `img_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
MODIFY `op_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
