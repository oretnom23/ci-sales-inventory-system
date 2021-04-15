-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 03:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_parent` tinyint(4) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `is_parent`, `parent`, `created_at`, `status`) VALUES
(8, 'Clothes', '', 0, NULL, '2017-01-21', 1),
(9, 'Apparels', '', 0, NULL, '2017-01-21', 1),
(10, 'Bracelet', '', 0, NULL, '2017-01-21', 0),
(11, 'Accesories', '', 0, NULL, '2017-01-21', 1),
(12, 'Paintings', '', 0, NULL, '2017-01-22', 1),
(13, 'Category 101', 'Sample Category', 0, NULL, '2021-03-02', 0),
(14, 'Category 101', 'Sample Category', 0, NULL, '2021-03-02', 0),
(15, 'asdasd', 'asdasd', 0, NULL, '2021-03-02', 0),
(16, 'asdasd', 'asdasdasd', 0, NULL, '2021-03-02', 0),
(17, '', '', 0, NULL, '2021-03-02', 0),
(18, '', '', 0, NULL, '2021-03-02', 0),
(19, '', '', 0, NULL, '2021-03-02', 0),
(20, 'asdasd', 'asdasdasd', 0, NULL, '2021-03-02', 0),
(21, 'asdasd', 'ghj', 0, NULL, '2021-03-02', 0),
(22, 'asdasd', 'ghj', 0, NULL, '2021-03-02', 0),
(23, 'asdas', 'asdasd', 0, NULL, '2021-03-02', 0),
(24, 'asda', 'asdasd', 0, NULL, '2021-03-02', 0),
(25, 'asdasd', 'asdasdasd', 0, NULL, '2021-03-02', 0),
(26, 'asdasd', 'asdasd', 0, NULL, '2021-03-02', 0),
(27, 'asdasd', 'asdasd', 0, NULL, '2021-03-02', 0),
(28, 'asdasd', 'asdasd', 0, NULL, '2021-03-02', 0),
(29, 'asdasd', 'asdasd', 0, NULL, '2021-03-02', 0),
(30, 'Category 101', 'Sample Category', 0, NULL, '2021-03-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`id`, `name`, `slug`, `content`, `created_at`, `status`) VALUES
(1, 'About', 'about', '<p><b>Awesome About</b><br></p>', '2017-01-15', 0),
(2, 'About Page', 'about page', '<p>This is awesome<br></p>', '2017-01-15', 0),
(3, 'dsadas dsadsa', 'dsadas_dsadsa', '<p>dsadsadsadsa<br></p>', '2017-01-15', 0),
(4, 'ABOUT', 'about', '<h1><div style=\"text-align: center;\"><b><span style=\"font-size: 12pt; background-color: rgb(255, 255, 255);\" arial\",\"sans-serif\";mso-fareast-font-family:\"droid=\"\" sans=\"\" fallback\";background:=\"\" white;mso-font-kerning:1.5pt;mso-ansi-language:en-ph;mso-fareast-language:zh-cn;=\"\" mso-bidi-language:hi\"=\"\" lang=\"EN-PH\"><u>Carlos Hilado Memorial State College Techno Bazaar</u></span></b></div><div style=\"text-align: center;\"><b style=\"color: inherit;\"><span style=\"font-size:12.0pt;font-family:\r\n\" arial\",\"sans-serif\";mso-fareast-font-family:\"droid=\"\" sans=\"\" fallback\";background:=\"\" white;mso-font-kerning:1.5pt;mso-ansi-language:en-ph;mso-fareast-language:zh-cn;=\"\" mso-bidi-language:hi\"=\"\" lang=\"EN-PH\"> is a\r\nsmall bargain store that specializes in product made by the students and\r\nworkers of CHMSC- Talisay.</span></b></div><div style=\"text-align: center;\"><b style=\"color: inherit;\"><span style=\"font-size:12.0pt;font-family:\r\n\" arial\",\"sans-serif\";mso-fareast-font-family:\"droid=\"\" sans=\"\" fallback\";background:=\"\" white;mso-font-kerning:1.5pt;mso-ansi-language:en-ph;mso-fareast-language:zh-cn;=\"\" mso-bidi-language:hi\"=\"\" lang=\"EN-PH\"><br></span></b></div><b><div style=\"text-align: center;\"><b style=\"color: inherit;\"><span style=\"font-size:12.0pt;font-family:\r\n\" arial\",\"sans-serif\";mso-fareast-font-family:\"droid=\"\" sans=\"\" fallback\";background:=\"\" white;mso-font-kerning:1.5pt;mso-ansi-language:en-ph;mso-fareast-language:zh-cn;=\"\" mso-bidi-language:hi\"=\"\" lang=\"EN-PH\">It is located in Mabini St., Talisay City, Negros &nbsp;Occidental.</span></b></div></b></h1><div style=\"text-align: center;\"></div>', '2017-01-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `created_at`, `status`) VALUES
(1, 'kath', '0192023a7bbd73250516f069df18b500', 'Kath Pasco', 'kath.pasco@gmail.com', '', '2016-12-01', 1),
(2, 'juan', 'ba8a48b0e34226a2992d871c65600a7c', 'juan luna', 'kajskjas@gmail.com', '', '2017-01-06', 1),
(3, 'harl', '982b880089fafda700d5925647fd1886', 'harl', 'harljoy@yahoo.com', '', '2017-01-06', 1),
(4, 'melissa', '6a81060b83b919bc115112bf840eca63', 'MELISSA GANTALAO', 'melissa_gantalao@yahoo.com', '', '2017-01-09', 1),
(5, 'rhea', '827ccb0eea8a706c4c34a16891f84e7b', 'rhea', 'rhea@gmail.com', '', '2017-01-16', 1),
(6, 'cheng', '202cb962ac59075b964b07152d234b70', 'gdfgd', 'ge@gmail.com', '', '2017-01-18', 1),
(7, 'kris', '03e13700e25563c0c0a8ffdb48dbbc19', 'kris', 'k@gmail.com', '', '2017-01-18', 1),
(8, 'kris', '03e13700e25563c0c0a8ffdb48dbbc19', 'kris', 'kris@gmail.com', '', '2017-01-18', 1),
(9, 'eric123', '4131f403beab0f4fa9e654b2ffa4f769', 'eric', 'eric13@gmail.com', '', '2017-01-21', 1),
(10, 'harl', '515e3c43756c238b1be58ec03254007d', 'sfds', 'rhea@gmail.com', '', '2017-01-21', 1),
(11, 'kk', 'dc468c70fb574ebd07287b38d0d0676d', 'ajhjhajks', 'jha@gmail.com', '', '2017-01-21', 1),
(12, 'kris', '03e13700e25563c0c0a8ffdb48dbbc19', 'KJJL', 'aksd@gmail.com', '', '2017-01-21', 1),
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', '', '2017-01-21', 1),
(14, 'harlahahaha', '7128af45c6524ded471ca66c5b71f514', 'cute', '', '', '2017-01-22', 1),
(15, '123', '202cb962ac59075b964b07152d234b70', 'askajsk', '', '', '2017-01-22', 1),
(16, '456', '250cf8b51c773f3f8dc8b4be867a9a02', 'ajskajsk', '', '', '2017-01-22', 1),
(17, '123', '202cb962ac59075b964b07152d234b70', 'jakkjk', '', '', '2017-01-22', 1),
(18, 'awesome', '21232f297a57a5a743894a0e4a801fc3', 'cxsadsa', '', '', '2017-01-22', 1),
(19, 'amaze', '21232f297a57a5a743894a0e4a801fc3', 'amaze', '', '', '2017-01-22', 1),
(20, 'kk', 'dc468c70fb574ebd07287b38d0d0676d', 'kjdkasj', '', '', '2017-01-22', 1),
(21, 'maria', '263bce650e68ab4e23f28263760b9fa5', 'Maria Cruz', '', '', '2017-01-22', 1),
(22, 'lux', '81dc9bdb52d04dc20036dbd8313ed055', 'lux louise', '', '', '2017-01-23', 1),
(23, 'kaka', '5541c7b5a06c39b267a5efae6628e003', 'kaka', '', '', '2017-01-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `srp_price` float NOT NULL,
  `qty_type` varchar(250) NOT NULL,
  `qty` float NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `sku`, `price`, `srp_price`, `qty_type`, `qty`, `image`, `category_id`, `supplier_id`, `online`, `created_at`, `status`) VALUES
(7, 'Floral Wallet ', 'Made of beads,\r\nColors:  Blue and White, \r\nSize: 4 x 12 inches', '002', 30, 25, '', 18, '92b630e05d2ea71e24b3994bad4669c3.JPG', 9, 2, 1, '2016-12-17', 1),
(9, 'Hello Kitty Wallet ', 'Made of beads, \r\nColors: Red, White and Black,\r\nSize: 3x5 inches', '004', 35, 30, '', 42, 'd8ba870607b7987f144f8cdc52386554.JPG', 9, 2, 1, '2016-12-17', 1),
(11, 'Floral Wallet ', 'Made of beads,\r\nColor: Blue and Yellow,\r\nSize: 3 x 4 inches', '005', 30, 25, '', 50, '19013df2a5d9bfb736a919e9ecff94e7.JPG', 9, 2, 1, '2016-12-17', 1),
(18, 'Floral Wallet', 'Made of beads,\r\nColors: Pink and Black,\r\nSize: 4x4 inches', '009', 25, 20, '', 20, 'a8ee14444a9d99759d3c328da80bd713.JPG', 9, 2, 1, '2016-12-17', 1),
(32, 'Minion Wallet', 'Made of Beads,\r\nColors: Yellow and Blue,\r\nSize: 12 x 4 inches', '013', 35, 30, '', 50, 'adbe3bd2474ca0a657007b7eba6487f0.JPG,b19f98d35c8c7e41db448ead1a4dd5a8.JPG', 9, 2, 1, '2017-01-10', 1),
(35, 'Rosary', 'Made of Beads,\r\nColor: Black,\r\nSize: 6 inches diameter\r\nMade by: Students of CHMSC Talisay', '016', 100, 80, '', 4, 'a4e1de9aa72ca28453d4b0974c0237e3.JPG,83fe0e811812f1b308c1a6416e573b51.JPG,654ff60bdf54668869734fe7ed6aaf9b.JPG', 11, 2, 1, '2017-01-10', 1),
(36, 'Knitted Belt', 'Colors: Yellow and Black,\r\nSize: 44 inches,\r\nMade by: Students of CHMSC Talisay', '017', 50, 40, '', 9, '3c7e23e45419e8be9b6664e9719268bd.JPG,2a22d11d1eb3cdbaee211b559f015020.JPG', 9, 2, 1, '2017-01-10', 1),
(46, 'Blouse&Short Terno', 'Made of Cotton,\r\nColor: Red,\r\nSize: Medium,\r\nMade by: Waswas Panahi of CHMSC Talisay', '102', 140, 120, '', 1, '33f13735eb29568230eae4e879dfa1e9.JPG,279eef576a14c06edf66954775cdb87d.JPG', 8, 2, 1, '2017-01-22', 1),
(47, 'Blouse&Short Terno', 'Made of Cotton,\r\nColor: Pink,\r\nSize: Medium,\r\nMade by: Waswas Panahi of CHMSC Talisay', '103', 140, 120, '', 1, 'd1155dce1749d9eb24f3cab299e2e866.JPG,006bd90556eca4f3b665aa7f4fb4653d.JPG', 8, 2, 1, '2017-01-22', 1),
(49, 'Hand Bag', 'Made of Canvas,\r\nSize: 14 x 12 inches,\r\nMade by: Students of CHMSC Talisay', '105', 130, 100, '', 5, '76797f0446758b6b2e6e0295fda880d2.JPG', 9, 2, 1, '2017-01-22', 1),
(50, 'Hand Bag', 'Made of Canvas,\r\nDesign: Stripes,\r\nSize: 14 x 12 inches,\r\nMade by: Students of CHMSC Talisay', '106', 150, 100, '', 2, '0e58df9da568e1ae84ec9e0be9b41b0d.JPG', 9, 2, 1, '2017-01-22', 1),
(51, 'Pillow', 'Made of Micro Fiber,\r\nColor: Black and White,\r\nSize: 12x12 inches,\r\nMade by: TLE Students of CHMSC Talisay', '108', 50, 40, '', 14, '77e4c0fff7ce9e545cef4ced27f838c2.JPG', 9, 2, 1, '2017-01-22', 1),
(52, 'Pillow', 'Made of Micro Fiber,\r\nColor: Red and White,\r\nSize: 12 x 12 inches,\r\nMade by: TLE Students of CHMSC Talisay\r\n', '109', 100, 50, '', 10, '41acee14aa5d5ef99a18fd8d2235470c.JPG', 9, 2, 1, '2017-01-22', 1),
(53, 'Pillow', 'Made of Micro Fiber,\r\nColor: Green, Yellow and White,\r\nSize: 12 x 12 inches,\r\nMade by: TLE Students of CHMSC Talisay', '111', 100, 80, '', 9, '5a0b2dce9b948aa5dbf947233a240f56.JPG', 9, 2, 1, '2017-01-22', 1),
(54, 'Pillow', 'Made of Micro Fiber,\r\nColors: Green, White and Red,\r\nDesign: Floral,\r\nSize: 12 x 12 inches,\r\nMade by: TLE Students of CHMSC Talisay', '112', 100, 80, '', 10, 'ce5619f25084fe0323da796900a9509c.JPG', 9, 2, 1, '2017-01-22', 1),
(55, 'CHMSC Keychain', 'Size: 1 1/2 x 1 inches,\r\nMade by: IS Students of the CHMSC Talisay', '113', 50, 40, '', 50, 'e2efd316450f0a6e44a0663609a10a6d.JPG', 11, 2, 1, '2017-01-22', 1),
(56, 'IS Keychain', 'Size: 1 1/2 x 1 inches,\r\nMade by: IS Students of the CHMSC Talisay', '114', 50, 40, '', 20, 'd74293325b956258ea866560823bac8e.JPG', 11, 2, 1, '2017-01-22', 1),
(57, 'Blouse&Short Terno', 'Made of Cotton,\r\nColor: Blue Green,\r\nSize: Small,\r\nMade by: Waswas Panahi of CHMSC Talisay', '115', 140, 120, '', 3, '6b94c490b93f3f47b47d46a961c39209.JPG,e2502838f1b70fb627ad13d6486cff00.JPG', 8, 2, 1, '2017-01-22', 1),
(60, 'Wallet', 'Made of Cotton,\r\nSize: 6 x 4 inches,\r\nMade by: Students of CHMSC Talisay', '120', 50, 40, '', 0, '9855405dc1d7f749df690393c1eed363.JPG', 9, 2, 1, '2017-01-22', 1),
(62, 'Scenery Painting', 'Made of Canvas,\r\nSize: 16 x 24 inches,\r\nMade by: Korj Tibor', '118', 1000, 500, '', 1, '0a59e30e0213eed35fc177d5adfd1bab.JPG,4218052b14d366da8d7d04d2667f6016.JPG,62d0ad2cc7ae9668a409380951ec5052.JPG,63dfa7f476882b9f440ec47ecb88cae5.JPG', 12, 0, 1, '2017-01-22', 1),
(65, 'Bracelet', 'Made of beads,\r\nColor: Blue,\r\nSize: 4 inches diameter,\r\nMade by: TLE Students of CHMSC Talisay', '124', 45, 40, '', 9, '17fa779839ec51ac4112b964d34fffda.JPG', 11, 2, 1, '2017-01-22', 1),
(67, 'Philippine Scenery', 'Made of Oil Pastel,\r\nColors: Blue, Brown and Black,\r\nSize: 12 x 14 inches,\r\nMade by: Rey Balinas', '211', 1000, 800, '', 1, '5bee347aa6df702eaf915120481e5c0f.JPG,0393f257f3615e88a1d776a5e7b206b2.JPG', 12, 0, 1, '2017-01-22', 1),
(68, 'CHMSC Wallet', 'Made of Canvas,\r\nColor: Violet,\r\nSize: 4 x 6 inches', '101', 35, 30, '', 20, 'ae1c5edfe5c1c66beb463a1a730388f7.JPG', 9, 0, 1, '2017-01-23', 1),
(69, 'CHMSC Wallet', 'Made of Canvas, Color: Green, Size: 4 x 6 inches', '110', 35, 30, '', 9, '7e9c12bddee1526df3832918a641cc3d.JPG', 9, 0, 1, '2017-01-23', 1),
(70, 'CHMSC Wallet', 'Made of Canvas, Color: Brown, Size: 6 x 6 inches', '301', 40, 35, '', 15, '2b2195ee38c7654a13c29739f379865c.JPG', 9, 0, 1, '2017-01-23', 1),
(72, 'Chef\'s Uniform', 'Made of Cotton,\r\nSize: Small, Medium and Large', '290', 300, 250, '', 20, 'cb29740d3fed7f6890ee6591dbf90f21.JPG,79eb5bbf99568275853d6de7535905ca.JPG', 8, 0, 1, '2017-01-23', 1),
(73, 'Bracelet', 'Made of beads,\r\nSize: 6 inches diameter\r\n', '291', 30, 25, '', 20, '92c4a159be4823e9260e51e581c7c19d.JPG', 11, 0, 1, '2017-01-23', 1),
(74, 'CHMSC Fan', 'Colors: Red, Blue, Black, Green', '250', 20, 15, '', 100, '', 9, 0, 0, '2017-01-23', 1),
(75, 'Product 101', 'Sample Product only', '6231415', 500, 550, 'pair', 20, '38dead2057bc3d74b66994640af9398e.jpg,5a32afe0a4f3aa042151372f323ab481.png', 30, 4, 1, '2021-03-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `pick_up_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `payment_method`, `created_at`, `pick_up_date`, `status`) VALUES
(1, 1, 'cash', '2016-12-10', '2016-12-11', 3),
(2, 1, 'credit_card', '2016-12-16', '2016-12-17', 3),
(3, 1, 'cash', '2016-12-17', '2016-12-19', 3),
(4, 1, 'cash', '2016-12-17', '2017-01-03', 3),
(5, 1, 'cash', '2016-12-21', '2016-12-23', 3),
(6, 1, 'credit_card', '2017-01-04', '2017-01-04', 3),
(7, 2, 'cash', '2017-01-06', '2017-01-09', 3),
(8, 2, 'cash', '2017-01-06', '2017-01-08', 3),
(9, 3, 'cash', '2017-01-06', '2017-01-09', 3),
(10, 3, 'cash', '2017-01-08', '2017-01-08', 3),
(11, 3, 'cash', '2017-01-08', '2017-01-10', 3),
(12, 3, 'cash', '2017-01-09', '2017-01-14', 3),
(13, 4, 'cash', '2017-01-09', '2017-01-11', 3),
(14, 3, 'cash', '2017-01-09', '2017-01-09', 3),
(15, 3, 'cash', '2017-01-10', '2017-01-12', 3),
(16, 3, 'cash', '2017-01-14', '2017-01-14', 3),
(17, 3, 'cash', '2017-01-13', '2017-01-15', 1),
(18, 3, 'cash', '2017-01-16', '2017-01-16', 3),
(19, 3, 'cash', '2017-01-16', '2017-01-16', 0),
(20, 3, 'cash', '2017-01-16', '2017-01-16', 3),
(21, 5, 'cash', '2017-01-16', '2017-01-16', 1),
(22, 5, 'cash', '2017-01-16', '2017-01-16', 1),
(23, 3, 'cash', '2017-01-17', '2017-01-17', 1),
(24, 3, 'cash', '2017-01-18', '2017-01-18', 1),
(25, 3, 'cash', '2017-01-18', '2017-01-18', 0),
(26, 3, 'cash', '2017-01-18', '2017-01-18', 1),
(27, 10, 'cash', '2017-01-21', '2017-01-21', 1),
(28, 11, 'cash', '2017-01-21', '2017-01-21', 1),
(29, 11, 'cash', '2017-01-21', '2017-01-21', 1),
(30, 11, 'cash', '2017-01-21', '2017-01-21', 1),
(31, 11, 'cash', '2017-01-21', '2017-01-21', 1),
(32, 7, 'cash', '2017-01-21', '2017-01-21', 1),
(33, 3, 'cash', '2017-01-21', '2017-01-21', 3),
(34, 3, 'cash', '2017-01-22', '2017-01-22', 3),
(35, 21, 'cash', '2017-01-22', '2017-01-22', 3),
(36, 21, 'cash', '2017-01-22', '2017-01-22', 1),
(37, 22, 'cash', '2017-01-23', '2017-01-23', 1),
(38, 3, 'cash', '2017-01-23', '2017-01-23', 1),
(39, 23, 'cash', '2017-01-23', '2017-01-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_item`
--

CREATE TABLE `reservation_item` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_item`
--

INSERT INTO `reservation_item` (`id`, `reservation_id`, `product_id`, `product_name`, `sku`, `price`, `qty`) VALUES
(1, 1, 2, 'Sample Product Two', 'Sample Product Two', 69, 2),
(2, 1, 3, 'Sample Product Three', 'Sample Product Three', 100, 1),
(3, 2, 1, 'Sample Product One', 'Sample Product One', 17, 1),
(4, 3, 21, 'Victorias Sardines', '008', 15, 1),
(5, 4, 7, 'Floral Wallet', '002', 25, 1),
(6, 5, 22, 'Victorias Sardines', 'sample product', 60, 2),
(7, 6, 6, 'Ocean', '001', 1000, 1),
(8, 6, 7, 'Floral Wallet', '002', 25, 1),
(9, 6, 9, 'Hello Kitty Wallet', '004', 30, 1),
(10, 7, 9, 'Hello Kitty Wallet', '004', 30, 1),
(11, 7, 11, 'Floral Wallet', '005', 25, 5),
(12, 8, 7, 'Floral Wallet', '002', 25, 1),
(13, 9, 19, 'Taro Chips', '006', 15, 100),
(14, 9, 20, 'Turmeric Herbal Tea', '007', 100, 1),
(15, 9, 21, 'Victorias Sardines', '008', 15, 1),
(16, 9, 22, 'Victorias Sardines', 'sample product', 60, 1),
(17, 10, 7, 'Floral Wallet', '002', 25, 1),
(18, 10, 9, 'Hello Kitty Wallet', '004', 30, 1),
(19, 11, 9, 'Hello Kitty Wallet', '004', 30, 1),
(20, 12, 7, 'Floral Wallet', '002', 25, 1),
(21, 13, 7, 'Floral Wallet', '002', 25, 1),
(22, 13, 20, 'Turmeric Herbal Tea', '007', 100, 1),
(23, 14, 7, 'Floral Wallet', '002', 25, 2),
(24, 15, 9, 'Hello Kitty Wallet (Red)', '004', 30, 1),
(25, 16, 6, 'Ocean Painting', '001', 1000, 1),
(26, 17, 18, 'Floral Wallet (Pink)', '009', 20, 1),
(27, 17, 11, 'Floral Wallet (Black)', '005', 30, 1),
(28, 18, 21, 'Victorias Sardines', '008', 15, 1),
(29, 18, 20, 'Turmeric Herbal Tea', '007', 100, 1),
(30, 19, 6, 'Ocean Painting', '001', 1000, 1),
(31, 20, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(32, 20, 9, 'Hello Kitty Wallet (Red)', '004', 30, 1),
(33, 21, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(34, 22, 9, 'Hello Kitty Wallet (Red)', '004', 30, 1),
(35, 23, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(36, 24, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(37, 24, 9, 'Hello Kitty Wallet (Red)', '004', 30, 1),
(38, 25, 10, 'Hello Kitty Wallet (Orange)', '003', 30, 1),
(39, 26, 18, 'Floral Wallet (Pink)', '009', 20, 1),
(40, 26, 11, 'Floral Wallet (Black)', '005', 30, 1),
(41, 27, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(42, 28, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(43, 29, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(44, 30, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(45, 31, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(46, 32, 9, 'Hello Kitty Wallet (Red)', '004', 30, 1),
(47, 33, 43, 'Awesome', 'ABC110', 100, 1),
(48, 34, 36, 'Knitted Belt', '017', 40, 1),
(49, 35, 35, 'Rosary', '016', 100, 1),
(50, 36, 11, 'Floral Wallet (Black)', '005', 30, 1),
(51, 37, 51, 'Checkered Pillow', '108', 50, 1),
(52, 38, 11, 'Floral Wallet ', '005', 30, 1),
(53, 38, 9, 'Hello Kitty Wallet ', '004', 35, 1),
(54, 39, 11, 'Floral Wallet ', '005', 30, 3),
(55, 39, 32, 'Minion Wallet', '013', 35, 1),
(56, 39, 9, 'Hello Kitty Wallet ', '004', 35, 1),
(57, 39, 47, 'Blouse&Short Terno', '103', 140, 1),
(58, 39, 49, 'Hand Bag', '105', 130, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `amount_paid` double NOT NULL,
  `created_at` date NOT NULL,
  `teller_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `order_id`, `customer_id`, `customer_name`, `reservation_id`, `payment_method`, `amount_paid`, `created_at`, `teller_id`, `status`) VALUES
(1, '', 1, 'Kath Pasco', 2, 'credit_card', 0, '2016-12-16', 0, 0),
(2, '', 1, 'Kath Pasco', 5, 'cash', 0, '2016-12-21', 0, 0),
(3, '', 0, 'harl', 0, 'credit_card', 0, '2016-12-21', 0, 0),
(4, '', 0, 'jo', 0, 'cash', 0, '2016-12-22', 0, 0),
(5, '', 1, 'Kath Pasco', 1, 'cash', 0, '2017-01-04', 0, 0),
(6, '', 1, 'Kath Pasco', 3, 'cash', 0, '2017-01-04', 0, 0),
(7, '', 1, 'Kath Pasco', 4, 'cash', 0, '2017-01-04', 0, 0),
(8, '', 0, 'Gene Rator', 0, 'cash', 0, '2017-01-05', 0, 0),
(9, '', 0, 'Gene Rator', 0, 'cash', 0, '2017-01-05', 0, 0),
(10, '', 0, 'Gene Rator', 0, 'cash', 0, '2017-01-05', 0, 0),
(11, '', 0, 'Gene Rator', 0, 'cash', 250, '2017-01-05', 0, 0),
(12, '', 0, 'Gene Rator', 0, 'credit_card', 0, '2017-01-05', 0, 0),
(13, '', 0, 'Generator', 0, 'credit_card', 0, '2017-01-05', 0, 1),
(14, '', 0, 'Gene', 0, 'cash', 130, '2017-01-05', 0, 1),
(15, '', 0, 'Gene', 0, 'cash', 50, '2017-01-05', 0, 1),
(16, '', 0, 'Gene', 0, 'cash', 50, '2017-01-05', 0, 1),
(17, '', 0, 'Gene', 0, 'cash', 20, '2017-01-05', 0, 1),
(18, '', 0, 'Gene', 0, 'cash', 50, '2017-01-05', 0, 1),
(19, '', 0, 'Gene', 0, 'cash', 120, '2017-01-05', 0, 1),
(20, '', 0, 'Gene', 0, 'cash', 100, '2017-01-05', 0, 1),
(21, '', 0, 'Gene', 0, 'cash', 80, '2017-01-05', 0, 1),
(22, '', 0, 'shen', 0, 'cash', 500, '2017-01-06', 0, 1),
(23, '', 0, 'harl', 0, 'cash', 200, '2017-01-06', 0, 1),
(24, '', 0, 'harl', 0, 'cash', 200, '2017-01-06', 0, 1),
(25, '', 1, 'Kath Pasco', 6, 'credit_card', 0, '2017-01-06', 0, 1),
(26, '', 0, 'harl', 0, 'cash', 500, '2017-01-06', 0, 1),
(27, '', 0, 'Harl', 0, 'cash', 100, '2017-01-06', 0, 1),
(28, '', 2, 'juan luna', 7, 'cash', 0, '2017-01-06', 0, 1),
(29, '', 0, 'feer', 0, 'cash', 100, '2017-01-06', 0, 1),
(30, '', 3, 'harl', 9, 'cash', 0, '2017-01-06', 0, 1),
(31, '', 0, 'harl', 0, 'cash', 50000, '2017-01-06', 0, 1),
(32, '', 0, 'Gene', 0, 'cash', 150, '2017-01-08', 0, 1),
(33, '', 0, 'juan', 0, 'cash', 100, '2017-01-09', 0, 1),
(34, '', 0, 'bea', 0, 'cash', 200, '2017-01-09', 0, 1),
(35, '', 4, 'MELISSA GANTALAO', 13, 'cash', 500, '2017-01-09', 0, 1),
(36, '', 0, 'bea', 0, 'cash', 50, '2017-01-09', 0, 1),
(37, '', 3, 'harl', 11, 'cash', 50, '2017-01-09', 0, 1),
(38, '', 3, 'harl', 12, 'cash', 100, '2017-01-09', 0, 1),
(39, '', 0, 'harl', 0, 'cash', 100, '2017-01-09', 0, 1),
(40, '', 0, 'harl', 0, 'cash', 100, '2017-01-09', 0, 1),
(41, '', 0, 'harl', 0, 'cash', 200, '2017-01-09', 0, 1),
(42, '', 3, 'harl', 10, 'cash', 100, '2017-01-10', 0, 1),
(43, '', 0, 'harl', 0, 'cash', 200, '2017-01-10', 0, 1),
(44, '', 3, 'harl', 14, 'cash', 100, '2017-01-10', 0, 1),
(45, '', 2, 'juan luna', 8, 'cash', 100, '2017-01-15', 0, 1),
(46, '', 0, '', 0, 'cash', 100, '2017-01-15', 0, 1),
(47, '', 0, '', 0, 'cash', 100, '2017-01-15', 1, 1),
(48, '', 0, '', 0, 'cash', 150, '2017-01-15', 1, 1),
(49, '', 0, '', 0, 'cash', 300, '2017-01-15', 1, 1),
(50, '', 0, '', 0, 'cash', 300, '2017-01-15', 1, 1),
(51, '', 0, '', 0, 'cash', 50, '2017-01-16', 1, 1),
(52, '', 0, '', 0, 'cash', 100, '2017-01-16', 1, 1),
(53, '', 3, 'harl', 15, 'cash', 50, '2017-01-16', 1, 1),
(54, '', 3, 'harl', 16, 'cash', 2000, '2017-01-16', 1, 1),
(55, '', 0, '', 0, 'cash', 200, '2017-01-16', 1, 1),
(56, '', 3, 'harl', 18, 'cash', 115, '2017-01-17', 1, 1),
(57, '', 0, '', 0, 'cash', 100, '2017-01-17', 1, 1),
(58, '', 3, 'harl', 20, 'cash', 55, '2017-01-17', 1, 1),
(59, '', 0, '', 0, 'cash', 100, '2017-01-18', 1, 1),
(60, '', 0, '', 0, 'cash', 100, '2017-01-21', 1, 1),
(61, '', 0, '', 0, 'cash', 100, '2017-01-21', 1, 1),
(62, '', 0, '', 0, 'cash', 1000, '2017-01-21', 1, 1),
(63, '', 0, '', 0, 'cash', 100, '2017-01-21', 7, 1),
(64, '', 0, '', 0, 'cash', 100, '2017-01-21', 1, 1),
(65, '', 0, '', 0, 'cash', 100, '2017-01-21', 1, 1),
(66, '', 0, '', 0, 'cash', 200, '2017-01-21', 1, 1),
(67, '', 0, '', 0, 'cash', 100, '2017-01-22', 1, 1),
(68, '', 3, 'harl', 34, 'cash', 50, '2017-01-22', 1, 1),
(69, '', 0, '', 0, 'cash', 2000, '2017-01-22', 1, 1),
(70, '', 21, 'Maria Cruz', 35, 'cash', 100, '2017-01-22', 1, 1),
(71, '', 0, '', 0, 'cash', 50, '2017-01-22', 1, 1),
(72, '', 0, '', 0, 'cash', 20, '2017-01-22', 1, 1),
(73, '', 0, '', 0, 'cash', 1000, '2017-01-23', 1, 1),
(74, '', 3, 'harl', 33, 'cash', 1000, '2017-01-23', 1, 1),
(75, '', 0, '', 0, 'cash', 1000, '2017-01-23', 1, 1),
(76, '', 0, '', 0, 'cash', 1000, '2017-01-23', 1, 1),
(77, '', 0, '', 0, 'cash', 500, '2017-01-23', 1, 1),
(78, '', 0, '', 0, 'cash', 50, '2017-01-23', 1, 1),
(79, '', 0, 'John Smith', 0, 'cash', 700, '2021-03-02', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_item`
--

CREATE TABLE `sales_order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order_item`
--

INSERT INTO `sales_order_item` (`id`, `order_id`, `product_id`, `product_name`, `sku`, `price`, `qty`) VALUES
(3, 3, 7, 'Floral Wallet', '002', 25, 1),
(4, 3, 11, 'Floral Wallet', '005', 25, 1),
(6, 4, 19, 'Taro Chips', '006', 15, 20),
(7, 4, 13, 'Victorias Bangus', '007', 20, 100),
(8, 4, 12, 'Victorias Sardines', '006', 15, 100),
(9, 5, 2, 'Sample Product Two', 'Sample Product Two', 69, 2),
(10, 5, 3, 'Sample Product Three', 'Sample Product Three', 100, 1),
(11, 6, 21, 'Victorias Sardines', '008', 15, 1),
(12, 7, 7, 'Floral Wallet', '002', 25, 1),
(13, 8, 8, 'Beads Wallet ', '003', 25, 4),
(14, 9, 8, 'Beads Wallet ', '003', 25, 10),
(15, 10, 8, 'Beads Wallet ', '003', 25, 5),
(17, 11, 15, 'Chips', '008', 20, 5),
(18, 12, 8, 'Beads Wallet ', '003', 25, 5),
(19, 13, 8, 'Beads Wallet ', '003', 25, 5),
(20, 13, 15, 'Chips', '008', 20, 5),
(21, 14, 8, 'Beads Wallet ', '003', 25, 5),
(22, 15, 15, 'Chips', '008', 20, 5),
(26, 19, 15, 'Chips', '008', 20, 6),
(27, 20, 15, 'Chips', '008', 20, 5),
(28, 21, 15, 'Chips', '008', 20, 4),
(29, 22, 15, 'Chips', '008', 20, 2),
(30, 22, 7, 'Floral Wallet', '002', 25, 2),
(31, 23, 11, 'Floral Wallet', '005', 25, 2),
(32, 23, 18, 'Floral Wallet', '009', 20, 1),
(33, 24, 18, 'Floral Wallet', '009', 20, 1),
(34, 25, 6, 'Ocean', '001', 1000, 1),
(35, 25, 7, 'Floral Wallet', '002', 25, 1),
(36, 25, 9, 'Hello Kitty Wallet', '004', 30, 1),
(37, 26, 15, 'Chips', '008', 20, 2),
(38, 27, 15, 'Chips', '008', 20, 1),
(39, 27, 7, 'Floral Wallet', '002', 25, 2),
(40, 28, 9, 'Hello Kitty Wallet', '004', 30, 1),
(41, 28, 11, 'Floral Wallet', '005', 25, 5),
(42, 29, 15, 'Chips', '008', 20, 1),
(43, 30, 19, 'Taro Chips', '006', 15, 100),
(44, 30, 20, 'Turmeric Herbal Tea', '007', 100, 1),
(45, 30, 21, 'Victorias Sardines', '008', 15, 1),
(46, 30, 22, 'Victorias Sardines', 'sample product', 60, 1),
(47, 31, 7, 'Floral Wallet', '002', 25, 45),
(48, 32, 15, 'Chips', '008', 20, 5),
(49, 33, 15, 'Chips', '008', 20, 2),
(50, 34, 15, 'Chips', '008', 20, 5),
(51, 35, 7, 'Floral Wallet', '002', 25, 1),
(52, 35, 20, 'Turmeric Herbal Tea', '007', 100, 1),
(53, 36, 7, 'Floral Wallet', '002', 25, 1),
(54, 37, 9, 'Hello Kitty Wallet', '004', 30, 1),
(55, 38, 7, 'Floral Wallet', '002', 25, 1),
(56, 38, 15, 'Chips', '008', 20, 3),
(57, 39, 15, 'Chips', '008', 20, 1),
(58, 40, 15, 'Chips', '008', 20, 1),
(59, 41, 15, 'Chips', '008', 20, 1),
(60, 42, 7, 'Floral Wallet', '002', 25, 1),
(61, 42, 9, 'Hello Kitty Wallet', '004', 30, 1),
(62, 43, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(63, 44, 7, 'Floral Wallet', '002', 25, 2),
(64, 44, 15, 'Chips', '008', 20, 1),
(65, 45, 7, 'Floral Wallet', '002', 25, 1),
(66, 46, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(67, 47, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(68, 48, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(69, 49, 33, '5 in 1 Ginger Tea', '014', 100, 3),
(70, 50, 33, '5 in 1 Ginger Tea', '014', 100, 3),
(71, 51, 15, 'Chips', '008', 20, 1),
(72, 52, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(73, 53, 9, 'Hello Kitty Wallet (Red)', '004', 30, 1),
(74, 54, 6, 'Ocean Painting', '001', 1000, 1),
(75, 55, 33, '5 in 1 Ginger Tea', '014', 100, 2),
(76, 56, 21, 'Victorias Sardines', '008', 15, 1),
(77, 56, 20, 'Turmeric Herbal Tea', '007', 100, 1),
(78, 57, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(79, 58, 7, 'Floral Wallet (Blue)', '002', 25, 1),
(80, 58, 9, 'Hello Kitty Wallet (Red)', '004', 30, 1),
(81, 59, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(82, 60, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(83, 61, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(84, 62, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(85, 63, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(86, 64, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(87, 65, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(88, 66, 33, '5 in 1 Ginger Tea', '014', 100, 2),
(89, 67, 33, '5 in 1 Ginger Tea', '014', 100, 1),
(90, 68, 36, 'Knitted Belt', '017', 40, 1),
(91, 69, 64, 'Love of a Mother', '121', 2000, 1),
(92, 70, 35, 'Rosary', '016', 100, 1),
(93, 71, 65, 'Blue Bracelet', '124', 45, 1),
(94, 72, 17, 'Victorias Sardines', '007', 15, 1),
(95, 73, 60, 'Wallet', '120', 50, 10),
(96, 74, 43, 'Awesome', 'ABC110', 100, 1),
(97, 75, 46, 'Blouse&Short Terno', '102', 140, 2),
(98, 75, 47, 'Blouse&Short Terno', '103', 140, 2),
(99, 76, 57, 'Blouse&Short Terno', '115', 140, 2),
(100, 76, 47, 'Blouse&Short Terno', '103', 140, 2),
(101, 76, 46, 'Blouse&Short Terno', '102', 140, 2),
(102, 77, 7, 'Floral Wallet ', '002', 30, 1),
(103, 77, 9, 'Hello Kitty Wallet ', '004', 35, 2),
(104, 78, 7, 'Floral Wallet ', '002', 30, 1),
(105, 79, 50, 'Hand Bag', '106', 150, 3),
(106, 79, 51, 'Pillow', '108', 50, 1),
(107, 79, 69, 'CHMSC Wallet', '110', 35, 1),
(108, 79, 53, 'Pillow', '111', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `file`, `created_at`, `status`) VALUES
(1, 'bee0bac39637a1064c536877361078c2.JPG', '2016-11-30', 0),
(2, 'de3822d7ab168a751a72b9a3f59d9162.JPG', '2016-11-30', 0),
(3, '85354764d08e80bed9d4f9af393df08d.JPG', '2016-11-30', 0),
(4, '6c49561f5e78f24c07bb70895ba49397.JPG', '2016-11-30', 0),
(5, 'ff4f9be461767137c14d99a394006c4a.JPG', '2016-11-30', 0),
(6, 'f6d3e761a757e099e9ac385576c18452.JPG', '2016-11-30', 0),
(7, 'f789ad9876475fbd9da3db8a869cc3e8.jpg', '2016-12-17', 1),
(8, '067839457e5b7dbd5ecc84dc20aa6adb.jpg', '2016-12-17', 0),
(9, '1883bb04ad1d83ed445e80ccf85cd234.png', '2016-12-17', 0),
(10, '90f0cf3eaf686274d7ec89d652c5efc9.jpg', '2016-12-17', 0),
(11, '943fc9cff89a5c446230e26d43ccf066.jpg', '2017-01-06', 1),
(12, '97de471bd27f1d03fc7cf884aadbddd3.JPG', '2017-01-09', 0),
(13, '8c398f43aea83345e51b9b16a2fe2011.JPG', '2017-01-22', 1),
(14, 'ccdbb5fc4e5c08b7644ba5ec9602495f.JPG', '2017-01-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `email`, `status`) VALUES
(1, 'CHMSC Bazaar', '4564564', 'info@chmsc.com', 0),
(2, 'CHMSC', '123324234', 'info@chmsc.com', 1),
(3, 'Students', '234234', 'info@chmsc.com', 1),
(4, 'Supplier 101', '7894564320', 'info@supplier.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `email`, `username`, `password`, `fullname`, `created_at`, `status`) VALUES
(1, 1, '', 'admin', '0192023a7bbd73250516f069df18b500', 'Kath Pasco', '2016-10-16', 1),
(2, 1, 'sample@gmail.com', 'sample', 'sample', 'Sample User', '2016-10-22', 0),
(3, 1, 'test@gmail.com', 'test', 'test', 'Test', '2016-10-22', 1),
(4, 1, 'sample@gmail.com', 'sample123', 'admin123', 'Sample123', '2016-11-01', 0),
(5, 3, 'kristell@gmail.com', 'ktel', '0192023a7bbd73250516f069df18b500', 'Kristell Paclibar', '2016-12-17', 0),
(6, 3, 'harl@gmail.com', 'harl', '02829fb05c3076ec5a6caebd12477dec', 'Harl Joy Bornales', '2017-01-06', 0),
(7, 2, 'juan@gmail.com', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'Juan', '2017-01-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `access` text NOT NULL,
  `created_at` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `access`, `created_at`, `status`) VALUES
(1, 'Administrator', 'all', '2016-11-01', 1),
(2, 'Cashier', 'a:2:{s:3:\"pos\";a:2:{s:6:\"teller\";s:1:\"1\";s:11:\"reservation\";s:1:\"1\";}s:6:\"report\";a:3:{s:5:\"sales\";s:1:\"1\";s:11:\"reservation\";s:1:\"1\";s:9:\"inventory\";s:1:\"1\";}}', '2016-11-03', 1),
(3, 'Auditor', 'a:2:{s:9:\"inventory\";a:1:{s:5:\"order\";s:1:\"1\";}s:3:\"pos\";a:2:{s:6:\"teller\";s:1:\"1\";s:11:\"reservation\";s:1:\"1\";}}', '2017-01-05', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `reservation_item`
--
ALTER TABLE `reservation_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `sales_order_item`
--
ALTER TABLE `sales_order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reservation_item`
--
ALTER TABLE `reservation_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `sales_order_item`
--
ALTER TABLE `sales_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation_item`
--
ALTER TABLE `reservation_item`
  ADD CONSTRAINT `reservation_item_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
