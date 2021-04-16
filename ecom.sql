-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 08:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `role`, `email`, `mobile`, `status`) VALUES
(1, 'admin', 'admin', 0, '', '', 0),
(2, 'kush', 'kush', 1, 'kush@gmail.com', '1234567890', 1),
(6, 'alok', 'alok1', 1, 'alok@gmail.com', '9478563214', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'MEN', 1),
(2, 'Women', 1),
(4, 'Mobile Ass.', 1),
(6, 'Moblie', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'kush', 'juthanikush@gmail.co', '1478523699', 'Demo Data', '2021-02-10 18:09:49'),
(4, 'KUSH  JUTHNAI', 'juthanikush@gmail.co', '9427368831', 'test', '2021-02-20 01:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupen_master`
--

CREATE TABLE `coupen_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(30) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(15) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupen_master`
--

INSERT INTO `coupen_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `status`) VALUES
(1, 'First50', 100, 'Rupee', 500, 1),
(2, 'first60', 10, 'percentage', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `length` float NOT NULL,
  `breadth` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `ship_order_id` int(11) NOT NULL,
  `ship_shipment_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_value` int(50) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `length`, `breadth`, `height`, `weight`, `ship_order_id`, `ship_shipment_id`, `coupon_id`, `coupon_value`, `coupon_code`, `added_on`) VALUES
(1, 1, 'Place Road', 'Rajkot', 360001, 'cod', 60, 'success', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-02-22 03:37:02'),
(2, 1, 'Place Road', 'Rajkot', 360001, 'cod', 60, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-02-22 03:41:58'),
(3, 1, 'Place Road', 'Rajkot', 360001, 'cod', 12, 'success', 4, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-02-23 01:10:02'),
(4, 1, 'kalavad road', 'Rajkot', 360001, 'cod', 30, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-02-23 01:12:28'),
(5, 1, 'Place Road', 'Rajkot', 360001, 'cod', 3500, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-02-25 06:22:07'),
(6, 1, 'Place Road', 'Rajkot', 360001, 'cod', 70000, 'Success', 3, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-08 05:26:15'),
(7, 1, 'Place Road', 'Rajkot', 360001, 'cod', 350, 'success', 3, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-13 10:00:30'),
(8, 1, 'Place Road', 'Rajkot', 360001, 'cod', 4000, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-13 10:01:34'),
(10, 1, 'Place Road', 'Rajkot', 360001, 'cod', 500, 'success', 3, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-13 10:06:53'),
(11, 1, 'Place Road', 'Rajkot', 360001, 'cod', 500, 'success', 4, 3, 2, 5, 4.5, 95097499, 94709503, 0, 0, '', '2021-03-13 10:06:07'),
(13, 1, 'Place Road', 'Rajkot', 360001, 'cod', 700, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-15 10:20:16'),
(14, 6, 'Place Road', 'Rajkot', 360001, 'cod', 700, 'success', 1, 0, 0, 0, 0, 0, 0, 1, 100, 'first50', '2021-03-15 01:49:32'),
(15, 6, 'Place Road', 'Rajkot', 360001, 'cod', 2380, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-16 10:34:20'),
(16, 6, 'Place Road', 'Rajkot', 360001, 'cod', 500, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-16 10:35:10'),
(17, 6, 'Place Road', 'Rajkot', 360001, 'cod', 500, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-16 10:35:41'),
(18, 6, 'Place Road', 'Rajkot', 360001, 'cod', 0, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-16 10:36:25'),
(19, 6, 'Place Road', 'Rajkot', 360001, 'cod', 350, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-16 10:37:24'),
(20, 6, 'Place Road', 'Rajkot', 360001, 'cod', 11439, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-16 11:49:45'),
(21, 6, 'Place Road', 'Rajkot', 360001, 'cod', 400, 'success', 1, 0, 0, 0, 0, 0, 0, 1, 100, 'first50', '2021-03-16 11:51:15'),
(22, 1, 'Place Road', 'Rajkot', 360001, 'cod', 2469, 'success', 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-03-17 01:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 31, 8, 3),
(2, 1, 33, 9, 4),
(3, 2, 31, 8, 3),
(4, 2, 33, 9, 4),
(5, 3, 31, 4, 3),
(6, 4, 31, 10, 3),
(7, 5, 38, 7, 500),
(8, 6, 46, 1, 70000),
(9, 7, 54, 1, 350),
(10, 8, 44, 10, 400),
(11, 11, 53, 1, 500),
(12, 10, 53, 1, 500),
(13, 13, 35, 1, 700),
(14, 14, 54, 2, 350),
(15, 15, 39, 1, 500),
(16, 15, 43, 4, 470),
(17, 16, 53, 1, 500),
(18, 17, 53, 1, 500),
(19, 19, 54, 1, 350),
(20, 20, 43, 1, 470),
(21, 20, 47, 1, 10000),
(22, 20, 38, 1, 500),
(23, 20, 42, 1, 469),
(24, 21, 39, 1, 500),
(25, 22, 56, 1, 2000),
(26, 22, 42, 1, 469);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'shipped'),
(4, 'canceled'),
(5, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_decs` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `mete_keyword` varchar(2000) NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_decs`, `description`, `best_seller`, `meta_title`, `meta_desc`, `mete_keyword`, `added_by`, `status`) VALUES
(30, 12, 0, 'Product4', 22, 234, 5, '6344_6179cJ0ZasL._SL1080_.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in sodales urna. Donec id lacinia nulla', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris in sodales urna. Donec id lacinia nulla. Integer id ullamcorper ex. Sed mattis metus aliquam eleifend viverra. Sed vel nunc ullamcorper, sollicitudin elit a, malesuada enim. Etiam pretium, ante at scelerisque fermentum, velit sapien consequat est, sit amet commodo erat turpis a turpis. Sed eu ornare libero. Morbi a condimentum augue. Aenean iaculis ante orci, ac tempus tellus tincidunt eu. Sed vulputate gravida justo vitae rutrum. Vivamus sollicitudin tincidunt ante, id semper ipsum. Fusce consequat finibus elit nec fringilla. Curabitur commodo feugiat massa. Mauris nec consectetur mi. Nam dignissim massa fermentum metus tristique, eu rutrum arcu tristique. Etiam ullamcorper urna orci, ac sollicitudin massa interdum at', 0, 'sdfadsdafsdfadsdaf', 'sdfadsdafsdfadsdaf', 'sdfadsdafsdfadsdaf', 0, 1),
(35, 1, 0, 'US Polo Association Men\'s Solid Regular T-Shirt (USTSH0025_Yellow x-Large)', 1750, 700, 5, '1747_811Q6P8abLL._UL1500_.jpg', 'HS R NECK T SHIRT', 'Product Dimensions : 35.6 x 26.7 x 1.3 cm; 210 Grams\r\nDate First Available : 28 January 2021\r\nManufacturer : BALU EXPORTS 60 A5 PALLADAM ROAD ARULPURAM POST TIRUPUR 641605\r\nASIN : B08V9CVVV4\r\nItem model number : USTSH0025\r\nCountry of Origin : India\r\nDepartment : Men', 0, 'HS R NECK T SHIRTHS R NECK T SHIRT', 'HS R NECK T SHIRTHS R NECK T SHIRTHS R NECK T SHIRTHS R NECK T SHIRTHS R NECK T SHIRT', 'HS R NECK T SHIRT', 0, 1),
(36, 1, 0, 'Leotude Regular Fit Matty Half Sleeve Polo Tshirt for Men', 500, 349, 9, '7248_61hh8wS16wL._UL1300_.jpg', 'This Men\'s Polo T-Shirt from Leotude is completely cool and comfortable and its best for daily use or for college.', 'Care Instructions: Hand Wash Only\r\nFit Type: Regular Fit\r\nFabric: Cotton\r\nNeck Style: Polo\r\nSleeve Type: Half Sleeve\r\nPattern : Color Block\r\nColor : Black', 0, 'Men\'s Polo T-Shirt', 'Men\'s Polo T-Shirt', 'Men\'s Polo T-Shirt', 0, 1),
(37, 1, 0, 'US Polo Association Men\'s Solid Regular T-Shirt (USTSH0044_Blue Medium)', 1000, 500, 9, '3120_81szRG1wqUL._UL1500_.jpg', 'HS R NECK T SHIRT', 'Product Dimensions : 35.6 x 26.7 x 1.3 cm; 210 Grams\r\nDate First Available : 28 January 2021\r\nManufacturer : SRI LAKSHMI APPARELS 7/385 V G V GARDEN GANAPATHIPALAYAM ROAD CHENNIMALAIPALAYAM TIRUPPUR 641605\r\nASIN : B08V9DHS9V\r\nItem model number : USTSH0044\r\nCountry of Origin : India\r\nDepartment : Men', 0, 'Men\'s Solid Regular', 'Men\'s Solid Regular', 'Men\'s Solid Regular', 0, 1),
(38, 1, 0, 'Dagcros Full Sleeve Hooded T-Shirt for Men\'s&Boy\'s', 700, 500, 10, '5047_51KSE29ctyL._UL1452_.jpg', 'AGCROS T-Shirt are made with Cotton Blend which provides the highest level of softness and comfort during your intense workouts.', 'DAGCROS T-Shirt are made with Cotton Blend which provides the highest level of softness and comfort during your intense workouts. The touch that these provide for you is the smoothest ever. Wear these T-Shirt once and you will never want to take them off again TAPERED RELAXED FIT: Rarely would you find any T-Shirt that are comfortable as well as trendy at the same time. These are those rare T-Shirt. The trendy tapered fit from bottom and relaxed from the top, these T-Shirts are trendy and fashionable along with the softness as well. COLL TO WEAR: These T-Shirt are made up of Cotton Blend Fabric which make it Heat Resistant so that you need not worry during the Summer.', 0, 'T-Shirt', 'T-Shirt', 'T-Shirt', 0, 1),
(39, 1, 1, 'Allen Solly Men\'s Polo', 1000, 500, 10, '6237_81L9f1n4pGL._UL1500_.jpg', 'Allen Solly Men\'s Polo', 'Product Dimensions : 15 x 15 x 3 cm; 250 Grams\r\nDate First Available : 5 April 2017\r\nManufacturer : Aditya Birla Fashion and Retail Limited\r\nASIN : B06Y2DSLL1\r\nItem model number : AMKP317G04235\r\nDepartment : Men', 1, 't shirts', 't shirts', 't shirts', 0, 1),
(40, 2, 0, 'BoutiQO Women\'s Reyon Straight Kurta with Gold Print Trouser', 1500, 500, 10, '4116_81KgIYAiZzL._UL1500_.jpg', 'BoutiQO Women\'s Reyon Straight Kurta with Gold Print Trouser', 'Product Dimensions : 32 x 24 x 2 cm\r\nDate First Available : 24 December 2020\r\nASIN : B08WKKKNSY\r\nItem model number : BLU2P-3036\r\nCountry of Origin : India\r\nDepartment : Women', 0, 'Women', 'Women', 'Women', 0, 1),
(41, 2, 0, 'GoSriKi Women\'s Pure Cotton Printed Kurta Plazzo Set', 1500, 700, 10, '4754_51xlvuGL2lL._UL1148_.jpg', 'GoSriKi Women\'s cotton straight Salwar Suit Set', 'GoSriKi Women\'s cotton straight Salwar Suit Set\r\nPackage Dimensions : 35.2 x 26.3 x 3.1 cm; 330 Grams\r\nDate First Available : 14 October 2019\r\nManufacturer : Gopala Sarees\r\nASIN : B081Q3HDCS\r\nItem model number : AVENUE-KURTI-PLAZZO-S\r\nDepartment : Women', 0, 'Women\'s', 'Women\'s', 'Women\'s', 0, 1),
(42, 2, 0, 'GoSriKi Women\'s cotton Straight Kurta With Checkered Trouser', 700, 469, 10, '7581_618CNsT6-JL._UL1500_.jpg', 'GoSriKi women\'s Multi color cotton printed kurti with palazzo (DISINI MULTI_L).', 'GoSriKi women\'s Multi color cotton printed kurti with palazzo (DISINI MULTI_L).\r\nProduct Dimensions : 22 x 28 x 2 cm; 260 Grams\r\nDate First Available : 21 July 2020\r\nManufacturer : Gosriki\r\nASIN : B08DD1SM5F\r\nItem model number : DISINI MULTI_S\r\nDepartment : Women', 1, 'Women\'s', 'Women\'s', 'Women\'s', 0, 1),
(43, 2, 0, 'Cloth Clock Women\'s', 900, 470, 10, '7442_61ELhukF6BL._UL1367_.jpg', 'Legal Disclaimer: We never give permission to other Seller for selling this product. As Other sellers are also offering such product at lower rate. We are not responsible for quality issue in that product. Make sure you Always buy from Cloth Clock Import & Export for better services', 'Add colors to your wardrobe with cool collection of pure Crepe Printed salwar suit outfit material. This Patiyala Salwar suit set (Semi-stitched) come with Crepe with Digital Printed Work Top, Bottom, And Nazmeen Chiffon Dupatta. This product may have lighting effects because of photography.', 1, 'Women\'s Women\'s', 'Women\'s', 'Women\'s', 0, 1),
(44, 2, 2, 'Futurekart Women\'s Elastic Stretch Waist Belt', 700, 400, 11, '7588_61ASkporkYL._UL1000_.jpg', 'Women\'s', 'Package Dimensions : 17.5 x 6.8 x 1.6 cm; 80 Grams\r\nDate First Available : 6 March 2020\r\nManufacturer : Futurekart\r\nASIN : B085MB1NRY\r\nItem part number : NBT-001\r\nDepartment : Women', 0, 'Women\'s', 'Women\'s', 'Women\'s', 0, 1),
(45, 6, 0, 'Samsung Galaxy M51 (Electric Blue, 6GB RAM, 128GB Storage)', 28000, 23000, 100, '6560_710weRkP-nL._SL1500_.jpg', 'The symmetric Infinity-O display introduces un-interrupted visual experience for gaming, watching videos, multi-tasking, browsing and more with Versatile Quad Camera. Its Ultra wide camera captures scenes with 123˚ angle of view whilst the Depth camera brings beautiful portraits with Live Focus Effects.', 'The symmetric Infinity-O display introduces un-interrupted visual experience for gaming, watching videos, multi-tasking, browsing and more with Versatile Quad Camera. Its Ultra wide camera captures scenes with 123˚ angle of view whilst the Depth camera brings beautiful portraits with Live Focus Effects.', 0, 'Samsung', 'Samsung', 'Samsung', 0, 1),
(46, 6, 4, 'New Apple iPhone 12 Mini (128GB) - Black', 75000, 70000, 2, '7990_71uuDYxn3XL._SL1500_.jpg', 'New Apple iPhone 12 Mini (128GB) - Black', 'Wireless Carrier	Unlocked for All Carriers\r\nBrand	Apple\r\nColour	Black\r\nMemory Storage Capacity	128 GB\r\nOperating System	IOS 14', 1, 'iPhone 12', 'iPhone 12', 'iPhone 12', 0, 1),
(47, 6, 0, 'Redmi 9 (Sky Blue, 4GB RAM, 64GB Storage)', 11000, 10000, 100, '4500_71A9Vo1BatL._SL1500_.jpg', 'Redmi 9 comes with Octa-core Helio G35 processor and upto 2.3GHz clock speed. It also comes with 13+2MP Dual AI Rear camera along with 5 MP front camera. Redmi 9 also features 16.58 centimeters (6.53-inch) HD + display with 720x1600 pixels. It also comes with 5000 mAH large battery and Fingerprint sensor', 'Redmi 9 comes with Octa-core Helio G35 processor and upto 2.3GHz clock speed. It also comes with 13+2MP Dual AI Rear camera along with 5 MP front camera. Redmi 9 also features 16.58 centimeters (6.53-inch) HD + display with 720x1600 pixels. It also comes with 5000 mAH large battery and Fingerprint sensor', 0, 'Redmi 9', 'Redmi 9', 'Redmi 9', 0, 1),
(48, 6, 4, 'Oppo A31', 11000, 12000, 100, '6438_71KCwNV6MuL._SL1500_.jpg', 'Triple camera with portrait and macro mode. 6.5-inch eye-protection display.Ultimate audio and video experience. 4230mAh bigger battery capacity frees you from the concern of battery drain during your day.', 'Triple camera with portrait and macro mode. 6.5-inch eye-protection display.Ultimate audio and video experience. 4230mAh bigger battery capacity frees you from the concern of battery drain during your day.', 0, 'Oppo A31', 'Oppo A31', 'Oppo A31', 0, 1),
(49, 6, 0, 'Samsung Galaxy M01', 10000, 7500, 100, '2981_81onqHVeECL._SL1500_.jpg', 'With the Samsung Galaxy M01, Samsung introduces a 4000 mAh battery along with a sAmoled display for the first time in this price segment. This comes along with a dual camera set up.', 'With the Samsung Galaxy M01, Samsung introduces a 4000 mAh battery along with a sAmoled display for the first time in this price segment. This comes along with a dual camera set up.', 0, 'Samsung Galaxy M01', 'Samsung Galaxy M01', 'Samsung Galaxy M01', 0, 1),
(50, 4, 0, 'ELV Car Mount Adjustable', 900, 600, 100, '3074_61sCL37xvlL._SL1080_.jpg', 'Compatibility: The ELV easy one touch fits mobile devices, our redesigned bottom foot ensures that there is no interference with your devices bottom ports. Easy one touch to car mount: - The ELV easy one touch, provides a safe, versatile and highly functional smartphone mounting solution.', 'Compatibility: The ELV easy one touch fits mobile devices, our redesigned bottom foot ensures that there is no interference with your devices bottom ports. Easy one touch to car mount: - The ELV easy one touch, provides a safe, versatile and highly functional smartphone mounting solution. Simply, mount it with the one touch locking feature and you are ready to safely drive to your destination. Telescopic arm: - The ELV easy one touch is equipped with a telescopic arm to give users better viewing angles when using their device. Powerful grip: - The ELV easy one touch car mount grips securely onto your device so you can drive with confidence. Mount smart. Drive smarter. Easy access: - The ELV easy one touch also provides a new sliding bottom foot, our redesigned bottom foot ensures that there is no interference with your devices bottom ports. Premium design: - The ELV easy one touch mounting system locks and releases the device with just a push of a finger. Anti-scratch: - Stylish, light weight protect your valuable investment from scratches and damage. Product features: - Super sticky gel pad sticks securely to most surfaces, yet is still easily removable. Protection: - ELV easy one touch mounting system locks and releases the device with just a push of a finger, two step locking lever provides additional mounting support for multiple surfaces.', 0, 'ELV Car', 'ELV Car', 'ELV Car', 0, 1),
(51, 4, 0, 'ELV Desktop Cell Phone', 700, 650, 100, '6849_61vsPLVJQeL._SL1100_.jpg', 'RUBBER PADDING\r\nRubber padding keeps helping in keeping your phone scratch-free.\r\n\r\nANTI-SLIP RUBBER PADS\r\nAnti-Slip Rubber Pads at bottom helps in keeping the device steadily.', 'RUBBER PADDING\r\nRubber padding keeps helping in keeping your phone scratch-free.\r\n\r\nANTI-SLIP RUBBER PADS\r\nAnti-Slip Rubber Pads at bottom helps in keeping the device steadily.\r\n\r\nSTYLISH AND SLEAK DESIGN\r\nThis Stylish Aluminum Phone stand while Enhancing the looks of your desktop, keeps it clean and Mess-free.\r\n\r\nELV ALUMINUM PHONE STAND\r\nThis ELV phone stand is perfect for every need. Be it Kitchen, Bedroom, Office or Living Room.\r\n\r\nKeeping your hands free, helps you in doing Multi-tasking!!!', 0, 'ELV Desktop', 'ELV Desktop', 'ELV Desktop', 0, 1),
(52, 4, 0, 'Universal Mobile Phone Holder', 1200, 700, 100, '8531_71a0beh8foL._SL1500_.jpg', 'Have you always wanted to comfortably watch Movies, Cricket match, your Favorite TV Shows, read e-books from the comfort of your bed or without your hands getting tired? Or do you want to read the new food recipes from tablet over cooking? Then Our Xtore Universal Phone/Tablet Holder is the best solution for you.', 'Have you always wanted to comfortably watch Movies, Cricket match, your Favorite TV Shows, read e-books from the comfort of your bed or without your hands getting tired? Or do you want to read the new food recipes from tablet over cooking? Then Our Xtore Universal Phone/Tablet Holder is the best solution for you.\r\n\r\nIt comes with flexible arm to adjust it to the comfortable position you want. Its also features protective pads to prevent your mobile phone/Tablet from Scratch providing your device with the delicacy that they deserve.', 0, 'Mobile Phone Holder', 'Mobile Phone Holder', 'Mobile Phone Holder', 0, 1),
(53, 4, 3, 'Spiral Charger Cable', 600, 500, 100, '4341_617qYD6cOQL._SL1500_.jpg', 'Tired of fixing and replacing damaged charging cables frequently?', 'Our HUMBLE cable saver is specially made to provide a quick install. It is designed to effectively protect any type of charger cables ranging from all kinds of smart phones, computers, to USB-powered devices and more. It has more applications than you can imagine. Just twist around the cable and it wraps easily, and you don’t need to worry about the cables are easy to be damaged anymore, neither need to spend your precious time on repairing them.', 0, 'HUMBLE® Spiral Charger', 'HUMBLE® Spiral Charger', 'HUMBLE® Spiral Charger', 0, 1),
(54, 4, 0, 'Car Phone Holder', 500, 350, 50, '5794_51jtwis2AWL.jpg', 'CQLEK is created with a straightforward principle in mind, design functionality for a simple lifestyle. Our purpose and vision is to create convenience for all individuals experiencing our product, improving daily functions and activities. We offer the highest quality electronic accessories to enhance our customer lifestyles.', 'CQLEK Mobile Holder for Your Car\r\nDescription- The free combination Rear View mirror holder allows you to drive effortlessly by easy operation.\r\n\r\nSecure Mounting\r\n\r\nEasy to install and removal, no tools required. No cradles, clamps or gel and sticky residue, eliminates the unsightly features of most car mounts, direct to install on car mirror.\r\n\r\nOptimal Viewing\r\n\r\nThe car mount holder can be adjusted to the perfect viewing angle with its 360° flexible ball head. Telescopic arm offers great extension for ideal height and accessibility.\r\n\r\nNote\r\n\r\nThis car rear view mirror mount only fit some size car mirrors, please confirm your car mirror size before you buy, thanks ! Car Rear view Mirror Mount : only fit 2.1 - 2.4 (inch) width & 0.6 - 1.77 (inch) thickness car mirrors!', 0, 'CQLEK®', 'CQLEK®', 'CQLEK®', 0, 1),
(56, 1, 5, 'test', 1500, 2000, 15, '7451_3120_81szRG1wqUL._UL1500_.jpg', 'test desc', 'test desc', 0, '', '', 'vfasfdas', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shiprocket_token`
--

CREATE TABLE `shiprocket_token` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shiprocket_token`
--

INSERT INTO `shiprocket_token` (`id`, `token`, `added_on`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEyNzczNTYsImlzcyI6Imh0dHBzOi8vYXBpdjIuc2hpcHJvY2tldC5pbi92MS9leHRlcm5hbC9hdXRoL2xvZ2luIiwiaWF0IjoxNjE1NzEyMzA5LCJleHAiOjE2MTY1NzYzMDksIm5iZiI6MTYxNTcxMjMwOSwianRpIjoiTnlXdWpWMXpqWkg2NFd5SiJ9.WJNPNAM0_OCVNRN--DqOkRO6uQPXiNC1vsPL8qFypVM', '2021-03-13 20:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_catagories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_catagories`, `status`) VALUES
(1, 1, 'T-shirt', 1),
(2, 2, 'Dress', 1),
(3, 4, 'Handfree', 1),
(4, 6, 'Phone', 1),
(5, 1, 'Pant', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(1, 'kush juthani', 'kush1', 'juthanikush@gmail.com', '1234567896', '2021-02-18 17:15:07'),
(6, 'alok', 'alok', 'juthanikush18@gmail.com', '1234567898', '2021-02-18 17:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(35, 1, 46, '2021-02-27 03:35:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupen_master`
--
ALTER TABLE `coupen_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupen_master`
--
ALTER TABLE `coupen_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
