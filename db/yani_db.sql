-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2022 at 02:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yani_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fn` varchar(255) NOT NULL,
  `admin_mn` varchar(255) NOT NULL,
  `admin_ln` varchar(255) NOT NULL,
  `admin_contno` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fn`, `admin_mn`, `admin_ln`, `admin_contno`, `admin_email`, `admin_pass`) VALUES
(17, 'Shand Ivan', 'Pabia', 'Sinohon', '09455519167', 'admin@test.com', '$2y$10$qNEm5ZTweQYqcKNCAsgJUOWX0ZD3jqGIgs4u/U5h3FTFsK2kUJba6');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bk_id` int(11) NOT NULL,
  `clnt_id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `bk_name` varchar(255) NOT NULL,
  `bk_guest` int(5) NOT NULL,
  `bk_remark` varchar(255) NOT NULL,
  `bk_date` date NOT NULL,
  `bk_status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bk_id`, `clnt_id`, `pkg_id`, `venue_id`, `bk_name`, `bk_guest`, `bk_remark`, `bk_date`, `bk_status`) VALUES
(15, 14, 13, 1, 'Ivan\'s Wedding', 12, 'Wow', '2022-09-22', 1),
(16, 14, 13, 3, 'Sample Wedding', 62, 'I wish to have a grandiose wedding!', '2023-01-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clnt_id` int(11) NOT NULL,
  `clnt_fn` varchar(255) NOT NULL,
  `clnt_mn` varchar(255) NOT NULL,
  `clnt_ln` varchar(255) NOT NULL,
  `clnt_contno` varchar(255) NOT NULL,
  `clnt_add` varchar(255) NOT NULL,
  `clnt_email` varchar(255) NOT NULL,
  `clnt_pass` varchar(255) NOT NULL,
  `clnt_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clnt_id`, `clnt_fn`, `clnt_mn`, `clnt_ln`, `clnt_contno`, `clnt_add`, `clnt_email`, `clnt_pass`, `clnt_img`) VALUES
(14, 'Shand Ivan', 'Pabia', 'Sinohon', '09455519167', 'Bulua, CDO', 'ivan@test.com', '$2y$10$Wyo7nN9ejzzJXYrv5Bp.0un8SKMyErZWKkX01BYpX3SkHj6pOqV4.', NULL),
(15, 'Francis', 'Chicken', 'Cabahug', '98230-42803-4', 'KAJDL\'FAJS', 'chicken@gmail.com', '$2y$10$TMRU2tvujAgqqjffL8awY.NPRNKDYVNm/5/KKzM9TgbN3FfRHwb8e', NULL),
(16, 'Marie Isabelle', 'Ycong', 'Trimidal', '09123456789', 'Lapasan, Cagayan de Oro City', 'marie@gmail.com', '$2y$10$YnE8pjTYap1xn6rr1ApsP.ZF1NJO.4kISvpVR226ma3oLdJobeLUm', 'belle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inq_id` int(11) NOT NULL,
  `inq_name` varchar(255) NOT NULL,
  `inq_contno` varchar(11) NOT NULL,
  `inq_email` varchar(255) NOT NULL,
  `inq_remark` varchar(255) NOT NULL,
  `inq_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inq_id`, `inq_name`, `inq_contno`, `inq_email`, `inq_remark`, `inq_status`) VALUES
(20, 'James Sunderland', '09481114423', 'jamestc@gmail.com', 'I would like to inquire some of your services!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pkg_id` int(11) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `pkg_price` float(10,2) NOT NULL,
  `pkg_desc` varchar(255) NOT NULL,
  `pkg_img` varchar(255) DEFAULT NULL,
  `pkg_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pkg_id`, `pkg_name`, `pkg_price`, `pkg_desc`, `pkg_img`, `pkg_status`) VALUES
(13, 'Intima Boda - Basic Full Wedding', 25000.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam nulla facilisi cras fermentum odio. Nulla facilisi nullam vehicula ipsum a arcu. Non quam lacus suspendisse faucibus interd', 'ib full.jpg', 1),
(16, 'Intima Boda - Civil Wedding', 20000.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam nulla facilisi cras fermentum odio. Nulla facilisi nullam vehicula ipsum a arcu. Non quam lacus suspendisse faucibus interd', 'civil.jpg', 1),
(17, 'Full Planning & Coordination', 55000.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam nulla facilisi cras fermentum odio. Nulla facilisi nullam vehicula ipsum a arcu. Non quam lacus suspendisse faucibus interd', 'full.jpg', 1),
(18, 'On-The-Day Coordination', 45000.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam nulla facilisi cras fermentum odio. Nulla facilisi nullam vehicula ipsum a arcu. Non quam lacus suspendisse faucibus interd', 'otd.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_img` varchar(255) DEFAULT NULL,
  `staff_fn` varchar(255) NOT NULL,
  `staff_mn` varchar(255) DEFAULT NULL,
  `staff_ln` varchar(255) NOT NULL,
  `staff_email` varchar(255) NOT NULL,
  `staff_contno` varchar(255) NOT NULL,
  `staff_add` varchar(255) NOT NULL,
  `staff_pos` varchar(255) NOT NULL,
  `staff_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_img`, `staff_fn`, `staff_mn`, `staff_ln`, `staff_email`, `staff_contno`, `staff_add`, `staff_pos`, `staff_status`) VALUES
(5, 'patricia.jpg', 'Patricia Anne', 'Montemayor', 'Ong San Soy', 'patricia@gmail.com', '09291449870', 'Igpit, CDO', 'On-The-Day Coordinator', 1),
(9, 'ferle.jpg', 'Ferle', '', 'Busano', 'ferle@test.com', '09123456789', 'Cagayan de Oro City', 'Officer-In-Charge', 1),
(10, '', 'Ayana', '', 'Manriquez', 'ayana@gmail.com', '09999914556', 'Cagayan de Oro City', 'Head Coordinator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL,
  `supp_name` varchar(255) NOT NULL,
  `supp_contno` varchar(255) NOT NULL,
  `supp_email` varchar(255) NOT NULL,
  `supp_role` varchar(255) NOT NULL,
  `supp_add` varchar(255) NOT NULL,
  `supp_img` varchar(255) DEFAULT NULL,
  `supp_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_contno`, `supp_email`, `supp_role`, `supp_add`, `supp_img`, `supp_status`) VALUES
(2, 'Brian DJ and Hosting Services', '09761234567', 'briandj@gmail.com', 'Hosting Service', 'Iponan, Cagayan de Oro City', 'Become-a-Great-Wedding-DJ-5-800x445.jpg', 1),
(16, 'Samantha\'s Cakes and Pastries', '09123456789', 'samcakes@gmail.com', 'Food Catering Service', 'Kauswagan, Cagayan de Oro City', 'Wedding_Cake_Background.jpg', 1),
(17, 'Ray\'s Filmography Services', '09123456789', 'raydigital@test.com', 'Digital Services', 'Opol, Misamis Oriental', 'How-To-Become-a-Successful-Commercial-Photographer-768x350.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_grp`
--

CREATE TABLE `supplier_grp` (
  `supp_id` int(11) NOT NULL,
  `bk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_grp`
--

INSERT INTO `supplier_grp` (`supp_id`, `bk_id`) VALUES
(1, 12),
(2, 12),
(1, 13),
(3, 13),
(2, 14),
(3, 14),
(1, 15),
(2, 15),
(2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `ulog_id` int(11) NOT NULL,
  `ulog_act` varchar(255) NOT NULL,
  `ulog_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`ulog_id`, `ulog_act`, `ulog_datetime`) VALUES
(138, 'Added Sample Package', '2022-09-13 17:05:09'),
(139, 'Deleted Sample Package', '2022-09-13 17:05:13'),
(140, 'Added 2nd Sample Package', '2022-09-13 17:06:29'),
(141, 'Updated 2nd Sample Package Info Where Price is 95000.00', '2022-09-13 17:06:44'),
(142, 'Deleted 2nd Sample Package', '2022-09-13 17:06:49'),
(143, 'Added New Staff Member, Zie Arceo', '2022-09-13 17:16:42'),
(144, 'Updated Information for Staff Member, Zie Arceo', '2022-09-13 17:17:06'),
(145, 'Removed Zie Arceo From Staff', '2022-09-13 17:17:14'),
(146, 'Added New Supplier, Michael\'s Venue Designing As Design Coordination Service', '2022-09-13 17:25:23'),
(147, 'Updated Supplier Info for Jon\'s Venue Designing', '2022-09-13 17:25:51'),
(148, 'Updated Supplier Info for Jon\'s Venue Designing', '2022-09-13 17:26:05'),
(149, 'Removed Jon\'s Venue Designing From Suppliers', '2022-09-13 17:26:37'),
(150, 'Updated Supplier Info for Ray\'s Filmography Services', '2022-09-13 17:32:55'),
(161, 'Updated Supplier Info for Ray\'s Filmography Services', '2022-09-13 17:46:39'),
(162, 'Added New Venue, Punta Dolores Siargao Wedding and Events Venue', '2022-09-13 17:49:15'),
(164, 'Updated Venue Info for Punta Dolores Siargao Wedding and Events Venue', '2022-09-13 17:50:07'),
(166, 'Updated Venue Info for Punta Dolores Siargao Wedding and Events Venue', '2022-09-13 17:50:47'),
(167, 'Removed Punta Dolores Siargao Wedding and Events Venue From Venues', '2022-09-13 17:51:49'),
(199, 'Admin Log Out', '2022-09-13 18:06:16'),
(200, 'Admin Log In', '2022-09-13 18:06:22'),
(201, 'Admin Log Out', '2022-09-13 18:11:10'),
(204, 'Admin Log In', '2022-09-13 18:11:43'),
(205, 'Admin Log Out', '2022-09-13 18:11:59'),
(206, 'Client, Shand Ivan Sinohon , Logged In', '2022-09-13 18:13:05'),
(207, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-13 18:13:06'),
(208, 'Admin Log In', '2022-09-13 18:13:19'),
(209, 'Admin Log Out', '2022-09-13 18:16:01'),
(210, 'Admin Log In', '2022-09-14 19:34:05'),
(211, 'Added New Package, Sample Wedding Package', '2022-09-14 19:34:41'),
(212, 'Admin Log Out', '2022-09-14 19:34:45'),
(213, 'Admin Log In', '2022-09-14 19:34:58'),
(214, 'Removed Sample Wedding Package From Packages', '2022-09-14 19:35:04'),
(215, 'Admin Log Out', '2022-09-14 19:35:18'),
(216, 'Admin Log In', '2022-09-14 19:37:03'),
(217, 'Admin Log Out', '2022-09-14 19:39:47'),
(218, 'Admin Log In', '2022-09-14 19:40:12'),
(219, 'Added New Package, Mcdo', '2022-09-14 19:40:35'),
(220, 'Admin Log Out', '2022-09-14 19:40:37'),
(221, 'Admin Log In', '2022-09-14 19:41:14'),
(222, 'Removed Mcdo From Packages', '2022-09-14 19:41:32'),
(223, 'Admin Log Out', '2022-09-14 19:41:51'),
(224, 'Admin Log In', '2022-09-14 19:42:01'),
(225, 'Client, Shand Ivan Sinohon , Logged In', '2022-09-14 19:58:04'),
(226, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-14 19:58:18'),
(227, 'Client, Marie Isabelle Trimidal , Logged In', '2022-09-14 20:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `venue_add` varchar(255) NOT NULL,
  `venue_img` varchar(255) DEFAULT NULL,
  `venue_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `venue_name`, `venue_add`, `venue_img`, `venue_status`) VALUES
(1, 'Cove Garden Resort', 'Zone 3 Old Road, Cagayan de Oro, 9000 Misamis Oriental', 'cover garden.jpg', 1),
(3, 'Casa de Canitoan', 'Macapagal Dr, Cagayan de Oro, 9000 Misamis Oriental', 'casa de canitoan.jpg', 1),
(4, 'High Ridge', 'Bontula Upper Macasandig 9000 Cagayan de Oro, Philippines', 'high-ridge.jpg', 1),
(20, 'Riverview Event Center', 'Purok 4 S Diversion Rd, Cagayan de Oro, 9000 Misamis Oriental', 'riverview.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clnt_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inq_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pkg_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`ulog_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pkg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `ulog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
