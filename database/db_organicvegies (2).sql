-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 03:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organicvegies`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`, `admin_img`) VALUES
(18, 'lasaan', '8129692192', 'lasaan11@gmail.com', 'Lasaan123', ' about.jpg'),
(24, 'lashiya', '8129692192', 'lashiya12@gmail.com', 'aaaddd444', 'logo (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `booking_total` int(11) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `bill_num` varchar(300) NOT NULL,
  `bookingdeliv_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `user_id`, `dist_id`, `booking_status`, `payment_status`, `booking_total`, `booking_date`, `bill_num`, `bookingdeliv_date`) VALUES
(108, 24, 0, 4, 1, 105, '2023-12-08', '202312000', '2023-12-12'),
(109, 24, 0, 1, 1, 130, '2023-12-08', '202312001', '2023-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `veg_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL DEFAULT 1,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `booking_id`, `veg_id`, `tool_id`, `cart_quantity`, `cart_status`) VALUES
(180, 108, 28, 0, 2, 1),
(181, 108, 29, 0, 1, 1),
(182, 109, 39, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_title` varchar(40) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `dist_id` int(11) NOT NULL DEFAULT 0,
  `complaint_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_content`, `complaint_title`, `complaint_reply`, `user_id`, `dist_id`, `complaint_status`) VALUES
(39, 'the site some times slow', 'slow', '', 24, 0, 0),
(40, 'should add some more features', 'features', '', 24, 0, 0),
(41, 'more selection of items', 'more selection', '', 0, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributor`
--

CREATE TABLE `tbl_distributor` (
  `dist_id` int(11) NOT NULL,
  `dist_name` varchar(40) NOT NULL,
  `dist_email` varchar(40) NOT NULL,
  `dist_address` varchar(40) NOT NULL,
  `place_id` int(11) NOT NULL,
  `dist_pass` varchar(10) NOT NULL,
  `dist_contact` varchar(20) NOT NULL,
  `dist_img` varchar(100) NOT NULL,
  `dist_proof` varchar(100) NOT NULL,
  `dist_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_distributor`
--

INSERT INTO `tbl_distributor` (`dist_id`, `dist_name`, `dist_email`, `dist_address`, `place_id`, `dist_pass`, `dist_contact`, `dist_img`, `dist_proof`, `dist_status`) VALUES
(30, 'Koushik Raman', 'koushik@gmail.com', 'Kuriyalimolath , karukadom ', 10, '123koushik', '9846935816', 'dphoto2.jpg', 'uproof2.jpg', 1),
(31, 'selvum krishnan', 'selvum@gmail.com', 'puthedathu , thirumadi', 6, 'selvum456', '8129692192', 'dphoto1.jpg', 'uproof2.jpg', 1),
(32, 'Ganesh', 'Ganesh@gmail.com', 'kavaladeth', 10, 'ganesh1234', '8767854563', 'dphoto2.jpg', 'dphoto2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(45, 'Kasaragod'),
(46, 'Kannur'),
(47, 'Wayanad'),
(48, 'Kozhikode'),
(49, 'Malappuram'),
(50, 'Palakkad'),
(51, 'Thrissur'),
(52, 'Eranakulam'),
(53, 'Idukki'),
(54, 'Kottayam'),
(55, 'Alappuzha'),
(56, 'Pathanamthitta'),
(57, 'Kollam'),
(64, 'Thiruvanandapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(40) NOT NULL,
  `place_pincode` int(11) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(6, 'kothamangalam', 686691, 52),
(7, 'Muvattupuzha', 686661, 52),
(8, 'Kalpetta', 673121, 47),
(9, 'Periya', 670644, 47),
(10, 'Nilambur', 679329, 49),
(11, 'Chavakkad', 680506, 51);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_rating` int(11) NOT NULL,
  `review_datetime` varchar(50) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `user_review` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_id`, `user_rating`, `review_datetime`, `dist_id`, `user_review`) VALUES
(6, 24, 3, '2023-11-02 11:16:23', 31, 'kjfirufotigtp4o');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(11) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_address` varchar(40) NOT NULL,
  `user_proof` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `place_id`, `user_email`, `user_password`, `user_contact`, `user_photo`, `user_gender`, `user_address`, `user_proof`) VALUES
(24, 'sara merry', 8, 'sara@gmail.com', 'saramerry22', '9846935816', 'logo (2).jpg', 'female', 'kudamedath , kalpatti', 'uproof1.jpg'),
(25, 'Kiara jamval', 7, 'kiara@gmail.com', 'kiara1234', '9846935816', 'uphoto1.jpg', 'female', 'samiluda , sagathipurum', 'uproof1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vegcategory`
--

CREATE TABLE `tbl_vegcategory` (
  `vegcat_id` int(11) NOT NULL,
  `vegcat_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vegcategory`
--

INSERT INTO `tbl_vegcategory` (`vegcat_id`, `vegcat_name`) VALUES
(9, 'Root'),
(10, 'Stem'),
(11, 'Edible Tubers'),
(12, 'Leaf and Leafstalk'),
(13, 'Headflower'),
(14, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vegetables`
--

CREATE TABLE `tbl_vegetables` (
  `veg_id` int(11) NOT NULL,
  `veg_name` varchar(40) NOT NULL,
  `veg_rate` int(11) NOT NULL,
  `veg_img` varchar(100) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `vegcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vegetables`
--

INSERT INTO `tbl_vegetables` (`veg_id`, `veg_name`, `veg_rate`, `veg_img`, `dist_id`, `vegcat_id`) VALUES
(28, 'Tomatoes', 40, 'tomatoes.jpg', 30, 14),
(29, 'Sweet Potatoes', 25, 'sweet-potato.jpg', 30, 9),
(30, 'Tapioca', 30, 'arrangement-nutritious-cassava-roots.jpg', 30, 9),
(31, 'Green Banana', 30, 'green-banana.jpg', 31, 10),
(32, 'Coconut', 35, 'fresh-coconuts-white-surface.jpg', 31, 14),
(35, 'Cauliflower', 100, 'fresh-cauliflower.jpg', 31, 12),
(36, 'Mushroom', 25, 'brown-mushroom.jpg', 31, 13),
(37, 'Red Onion', 33, 'red-onion.jpg', 31, 9),
(38, 'Cabbage', 100, 'fresh-cabbage-table.jpg', 31, 12),
(39, 'Broccoli', 130, 'fresh-broccoli-isolated.jpg', 31, 12),
(40, 'Green Chilli', 25, 'green-chili-peppers.jpg', 30, 14),
(41, 'Garlic', 33, 'garlic-table.jpg', 30, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vegstock`
--

CREATE TABLE `tbl_vegstock` (
  `vegstock_id` int(11) NOT NULL,
  `vegstock_quant` int(11) NOT NULL,
  `veg_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `stocking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expiry_date` varchar(20) NOT NULL,
  `damage_veg` int(11) NOT NULL,
  `notify_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vegstock`
--

INSERT INTO `tbl_vegstock` (`vegstock_id`, `vegstock_quant`, `veg_id`, `batch_id`, `stocking_date`, `expiry_date`, `damage_veg`, `notify_status`) VALUES
(67, 30, 28, 100000, '2023-10-31 16:29:34', '2023-11-21', 2, 0),
(68, 40, 29, 100001, '2023-10-31 16:30:14', '2023-11-21', 0, 0),
(69, 25, 30, 100002, '2023-10-31 16:31:22', '2023-11-12', 0, 0),
(70, 12, 31, 100003, '2023-10-31 16:31:47', '2023-11-22', 0, 0),
(71, 11, 32, 100004, '2023-10-31 16:32:52', '2023-11-14', 0, 0),
(72, 10, 35, 100005, '2023-10-31 16:33:15', '2023-11-23', 0, 0),
(73, 30, 36, 100006, '2023-10-31 16:33:35', '2023-11-12', 0, 0),
(74, 25, 37, 100007, '2023-10-31 16:34:39', '2023-11-14', 0, 0),
(75, 26, 38, 100008, '2023-10-31 16:35:06', '2023-11-26', 0, 0),
(76, 22, 39, 100009, '2023-10-31 16:35:49', '2023-11-22', 0, 0),
(77, 12, 40, 100010, '2023-10-31 16:36:06', '2023-11-12', 0, 0),
(78, 25, 41, 100011, '2023-10-31 16:36:29', '2023-11-14', 0, 0),
(79, 12, 28, 100012, '2023-12-08 10:46:27', '2023-12-21', 0, 0),
(80, 22, 29, 100013, '2023-12-08 10:47:26', '2023-12-21', 0, 0),
(81, 12, 39, 100014, '2023-12-08 10:57:31', '2023-12-24', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_vegcategory`
--
ALTER TABLE `tbl_vegcategory`
  ADD PRIMARY KEY (`vegcat_id`);

--
-- Indexes for table `tbl_vegetables`
--
ALTER TABLE `tbl_vegetables`
  ADD PRIMARY KEY (`veg_id`);

--
-- Indexes for table `tbl_vegstock`
--
ALTER TABLE `tbl_vegstock`
  ADD PRIMARY KEY (`vegstock_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_distributor`
--
ALTER TABLE `tbl_distributor`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_vegcategory`
--
ALTER TABLE `tbl_vegcategory`
  MODIFY `vegcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_vegetables`
--
ALTER TABLE `tbl_vegetables`
  MODIFY `veg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_vegstock`
--
ALTER TABLE `tbl_vegstock`
  MODIFY `vegstock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
