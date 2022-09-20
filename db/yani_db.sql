-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2022 at 02:00 PM
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
  `admin_fn` varchar(50) NOT NULL,
  `admin_mn` varchar(50) NOT NULL,
  `admin_ln` varchar(50) NOT NULL,
  `admin_contno` varchar(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
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
  `bk_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bk_id`, `clnt_id`, `pkg_id`, `venue_id`, `bk_name`, `bk_guest`, `bk_remark`, `bk_date`, `bk_status`) VALUES
(18, 17, 17, 1, 'James and Clara\'s Wedding', 25, 'I would like to have a sky-themed wedding!', '2023-01-04', 2),
(19, 18, 13, 4, 'Thomas Wedding', 125, 'I would love a grandiose wedding.', '2022-09-21', 0),
(20, 19, 16, 4, 'Francis-Donna Wedding', 69, 'Indian Themed', '2022-09-17', 3),
(21, 20, 17, 1, 'Patricia\'s BTS Wedding', 100, 'I would like to have purple and white as my main theme.', '2023-01-11', 1),
(23, 21, 16, 4, 'Belle-Nozomi Wedding', 100, 'Korea Themed\r\n', '2022-09-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clnt_id` int(11) NOT NULL,
  `clnt_fn` varchar(50) NOT NULL,
  `clnt_mn` varchar(50) DEFAULT NULL,
  `clnt_ln` varchar(50) NOT NULL,
  `clnt_contno` varchar(11) NOT NULL,
  `clnt_add` varchar(100) NOT NULL,
  `clnt_email` varchar(100) NOT NULL,
  `clnt_pass` varchar(255) NOT NULL,
  `clnt_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clnt_id`, `clnt_fn`, `clnt_mn`, `clnt_ln`, `clnt_contno`, `clnt_add`, `clnt_email`, `clnt_pass`, `clnt_img`) VALUES
(17, 'James', 'Anderson', 'de Guzman', '09151234567', 'Lapasan, Cagayan de Oro City', 'james@test.com', '$2y$10$2ZLeOI2zXXMYR/wgOoZ74O4LvPd/qqVTNKq4l9Uy8dCaDAecCPLNu', 'James de Guzman.jpg'),
(18, 'Thomas', 'Anderson', 'Romanio', '09151234567', 'Camiguin', 'thomas@test.com', '$2y$10$n0smyW3pkUVz61M5n0RVBevLGli0FUJ48qYkjSj/0thpLmSQIq.J6', ''),
(19, 'Francis', 'Tabiano', 'Cabahug', '09151234567', 'Aurora, Zamboanga del Sur', 'francis@test.com', '$2y$10$PzH5gf5lFXaLXZdiP4xYIeGmULlqA9WNXM32A/HjU260YsIYRS4J.', 'francis.jpg'),
(20, 'Patricia Anne', 'Montemayor', 'Ong San Soy', '09151234567', 'Igpit, Misamis Oriental', 'patricia@gmail.com', '$2y$10$o8fQ3EPq/KfHiQnLlY/0Jeo/PidpvckKN7VDoBKK8W9qvYyxU/QxC', 'patricia.jpg'),
(21, 'Marie Isabelle', '', 'Trimidal', '09151234567', 'Igpit, Misamis Oriental', 'belle@test.com', '$2y$10$CtI03mgVQbZtybEs4pzGD.tDVTLkjyed01ENt0cKK4906X2F5hLX2', '');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inq_id` int(11) NOT NULL,
  `inq_name` varchar(50) NOT NULL,
  `inq_contno` varchar(11) NOT NULL,
  `inq_email` varchar(100) NOT NULL,
  `inq_remark` varchar(255) NOT NULL,
  `inq_status` int(1) NOT NULL,
  `inq_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inq_id`, `inq_name`, `inq_contno`, `inq_email`, `inq_remark`, `inq_status`, `inq_datetime`) VALUES
(23, 'Francis Gabriel Cabahug', '09151234567', 'francis@test.com', 'I would like to see if there are available slots for a November wedding?', 1, '2022-09-18 13:19:26'),
(24, 'Jeremiah Osabel', '09151234567', 'josabel@gmail.com', 'Sample text\r\n', 0, '2022-09-19 12:12:18'),
(25, 'Jc Niere', '09151234567', 'niere@test.com', 'Sample text', 1, '2022-09-19 12:39:04'),
(26, 'Patricia', '09151234567', 'patricia@gmail.com', 'I would like to ask for your services!', 0, '2022-09-19 17:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pkg_id` int(11) NOT NULL,
  `pkg_name` varchar(100) NOT NULL,
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
  `staff_fn` varchar(50) NOT NULL,
  `staff_mn` varchar(50) DEFAULT NULL,
  `staff_ln` varchar(50) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_contno` varchar(11) NOT NULL,
  `staff_add` varchar(100) NOT NULL,
  `staff_pos` varchar(50) NOT NULL,
  `staff_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_img`, `staff_fn`, `staff_mn`, `staff_ln`, `staff_email`, `staff_contno`, `staff_add`, `staff_pos`, `staff_status`) VALUES
(1, 'Ayana.jpg', 'Ayana', '', 'Flores', 'ayana@gmail.com', '09999914556', 'Cagayan de Oro City', 'Head Coordinator', 1),
(2, 'ferle.jpg', 'Ferle', '', 'Busano', 'ferle@test.com', '09123456789', 'Cagayan de Oro City', 'Officer-In-Charge', 1),
(3, 'Gillian.jpg', 'Gillian', '', 'Mugot', 'gillian@test.com', '09151234567', 'Cagayan de Oro', 'Officer-In-Charge', 1),
(4, 'Heds.jpg', 'Hedda', '', 'Gulmatico', 'hedda@test.com', '09151234567', 'Cagayan de Oro', 'Officer-In-Charge', 1),
(5, 'patricia.jpg', 'Patricia Anne', '', 'Ong San Soy', 'patricia@gmail.com', '09291449870', 'Igpit, Cagayan de Oro', 'On-The-Day Coordinator', 1),
(14, 'Glenny.jpg', 'Glenny', '', 'Melendres', 'glenny@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(15, 'Shimmay.jpg', 'Shimmay', '', 'Balagtas', 'shimmay@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(16, 'Donna.jpg', 'Donna', '', 'Rodrigo', 'donna@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(17, 'Frenzcel.jpg', 'Frenzcel', '', 'Felias', 'frenzcel@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(18, 'Mehzi.jpg', 'Mehzi', '', 'Navarro', 'mehzi@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(19, 'Erika.jpg', 'Erika', '', 'Manego', 'erika@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_grp`
--

CREATE TABLE `staff_grp` (
  `bk_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_grp`
--

INSERT INTO `staff_grp` (`bk_id`, `staff_id`) VALUES
(18, 1),
(18, 2),
(18, 5),
(19, 5),
(19, 14),
(19, 15),
(20, 16),
(20, 17),
(23, 1),
(23, 2),
(23, 14);

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
(2, 16),
(2, 17),
(16, 17),
(2, 18),
(16, 18),
(2, 19),
(16, 19),
(17, 20),
(16, 21),
(17, 21),
(2, 22),
(16, 22),
(17, 22),
(2, 23),
(16, 23);

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
(263, 'Admin Log Out', '2022-09-17 14:25:10'),
(264, 'Client, James de Guzman , Logged In', '2022-09-17 14:25:18'),
(265, 'Client, James de Guzman, Log Out', '2022-09-17 14:25:23'),
(266, 'Admin Log In', '2022-09-17 14:25:34'),
(267, 'Updated Information for Staff Member, Patricia Anne Ong San Soy', '2022-09-17 14:26:02'),
(268, 'Admin Log Out', '2022-09-17 14:51:10'),
(269, 'Client, James de Guzman, Logged In', '2022-09-17 14:51:33'),
(270, 'Client, James de Guzman, Log Out', '2022-09-17 14:51:48'),
(271, 'Admin Log In', '2022-09-17 14:51:55'),
(272, 'Admin Log Out', '2022-09-17 15:00:24'),
(273, 'Admin Log In', '2022-09-17 15:00:31'),
(274, 'Admin Log Out', '2022-09-17 15:07:54'),
(275, 'Admin Log In', '2022-09-17 15:08:17'),
(276, 'Updated Information for Staff Member, Patricia Anne Ong San Soy', '2022-09-17 15:10:15'),
(277, 'Admin Log Out', '2022-09-17 16:38:50'),
(278, 'Admin Log In', '2022-09-17 16:38:59'),
(279, 'Admin Log Out', '2022-09-17 17:05:02'),
(280, 'New inquiry from Michael Reeves', '2022-09-17 17:05:30'),
(281, 'Admin Log In', '2022-09-17 17:05:39'),
(282, 'Admin Log Out', '2022-09-17 17:06:01'),
(283, 'New inquiry from Michael Reeves', '2022-09-17 17:06:16'),
(284, 'Registered Thomas Romanio as New Client', '2022-09-17 17:08:02'),
(285, 'Client, Thomas Romanio, Logged In', '2022-09-17 17:08:10'),
(286, 'Client, Thomas Romanio, Log Out', '2022-09-17 17:08:45'),
(287, 'Admin Log In', '2022-09-17 17:08:52'),
(288, 'Admin Log Out', '2022-09-17 17:09:22'),
(289, 'New inquiry from Michael Reeves', '2022-09-17 17:09:37'),
(290, 'Admin Log In', '2022-09-17 17:09:47'),
(291, 'Admin Log Out', '2022-09-17 17:11:11'),
(292, 'Admin Log In', '2022-09-17 17:11:18'),
(293, 'Admin Log Out', '2022-09-17 17:12:06'),
(294, 'New inquiry from Michael Reeves', '2022-09-17 17:12:31'),
(295, 'Admin Log In', '2022-09-17 17:12:38'),
(296, 'Admin Log Out', '2022-09-17 17:28:39'),
(297, 'Admin Log In', '2022-09-17 17:28:51'),
(298, 'Admin Log Out', '2022-09-17 17:29:01'),
(299, 'New inquiry from Francis Gabriel Cabahug', '2022-09-17 17:29:33'),
(300, 'Admin Log In', '2022-09-17 17:29:50'),
(301, 'Admin Log Out', '2022-09-17 17:51:16'),
(302, 'Registered Francis Cabahug as New Client', '2022-09-17 17:55:29'),
(303, 'Client, Francis Cabahug, Logged In', '2022-09-17 17:55:40'),
(304, 'Client, Francis Cabahug, Log Out', '2022-09-17 17:57:41'),
(305, 'Admin Log In', '2022-09-17 17:57:47'),
(306, 'Admin Log Out', '2022-09-17 17:58:20'),
(307, 'Client, Francis Cabahug, Logged In', '2022-09-17 17:58:31'),
(308, 'Client, Francis Cabahug, Log Out', '2022-09-17 18:04:38'),
(309, 'Admin Log In', '2022-09-17 18:04:47'),
(310, 'Admin Log Out', '2022-09-17 18:05:21'),
(311, 'Client, Francis Cabahug, Logged In', '2022-09-17 18:05:30'),
(312, 'Client, Francis Cabahug, Log Out', '2022-09-17 18:07:19'),
(313, 'Admin Log In', '2022-09-17 18:07:28'),
(314, 'Admin Log Out', '2022-09-17 18:08:18'),
(315, 'Admin Log In', '2022-09-17 18:08:33'),
(316, 'Admin Log Out', '2022-09-17 18:23:41'),
(317, 'Admin Log In', '2022-09-17 18:23:47'),
(318, 'Admin Log Out', '2022-09-17 18:24:22'),
(319, 'Client, Francis Cabahug, Logged In', '2022-09-17 18:24:30'),
(320, 'Admin Log In', '2022-09-17 18:37:00'),
(321, 'Client, Francis Cabahug, Logged In', '2022-09-17 18:44:26'),
(322, 'Client, Francis Cabahug, Log Out', '2022-09-17 18:57:27'),
(323, 'Client, Francis Cabahug, Logged In', '2022-09-17 18:57:52'),
(324, 'New inquiry from Francis Gabriel Cabahug', '2022-09-18 13:19:26'),
(325, 'Admin Log In', '2022-09-18 13:19:32'),
(326, 'Admin Log Out', '2022-09-18 13:28:48'),
(327, 'Client, Francis Cabahug, Logged In', '2022-09-18 13:33:07'),
(328, 'Client, Francis Cabahug, Log Out', '2022-09-18 13:46:54'),
(329, 'Client, Francis Cabahug, Logged In', '2022-09-18 13:47:06'),
(330, 'Client, Francis Cabahug, Log Out', '2022-09-18 13:47:19'),
(331, 'Client, Francis Cabahug, Logged In', '2022-09-18 13:47:33'),
(332, 'Client, Francis Cabahug, Log Out', '2022-09-18 13:49:16'),
(333, 'Admin Log In', '2022-09-18 13:49:25'),
(334, 'Admin Log Out', '2022-09-18 13:50:13'),
(335, 'Client, Francis Cabahug, Logged In', '2022-09-18 13:55:12'),
(336, 'Client, Francis Cabahug, Log Out', '2022-09-18 13:58:27'),
(337, 'Client, Francis Cabahug, Logged In', '2022-09-18 13:58:40'),
(338, 'Client, Francis Cabahug, Log Out', '2022-09-18 13:58:44'),
(339, 'Client, Francis Cabahug, Logged In', '2022-09-18 13:58:52'),
(340, 'Client, Francis Cabahug, Log Out', '2022-09-18 14:04:49'),
(341, 'Admin Log In', '2022-09-18 14:04:56'),
(342, 'Admin Log Out', '2022-09-18 15:32:35'),
(343, 'Admin Log In', '2022-09-18 15:32:43'),
(344, 'Admin Log Out', '2022-09-18 15:48:23'),
(345, 'Admin Log In', '2022-09-18 15:48:31'),
(346, 'Admin Log Out', '2022-09-18 15:49:07'),
(347, 'Client, Francis Cabahug, Logged In', '2022-09-18 15:49:14'),
(348, 'Client, Francis Cabahug, Log Out', '2022-09-18 15:50:27'),
(349, 'Admin Log In', '2022-09-18 15:51:05'),
(350, 'Client, Francis Cabahug, Logged In', '2022-09-18 16:46:29'),
(351, 'Client, Francis Cabahug, Log Out', '2022-09-18 17:23:15'),
(352, 'Admin Log In', '2022-09-18 17:23:20'),
(353, 'Admin Log Out', '2022-09-18 17:26:17'),
(354, 'Admin Log In', '2022-09-18 17:26:22'),
(355, 'Admin Log In', '2022-09-19 12:01:33'),
(356, 'Admin Log Out', '2022-09-19 12:03:15'),
(357, 'Admin Log In', '2022-09-19 12:04:15'),
(358, 'Admin Log Out', '2022-09-19 12:04:34'),
(359, 'Client, Francis Cabahug, Logged In', '2022-09-19 12:05:41'),
(360, 'Client, Francis Cabahug, Log Out', '2022-09-19 12:06:05'),
(361, 'Admin Log In', '2022-09-19 12:06:27'),
(362, 'Admin Log Out', '2022-09-19 12:07:44'),
(363, 'Admin Log In', '2022-09-19 12:10:18'),
(364, 'Admin Log Out', '2022-09-19 12:10:28'),
(365, 'New inquiry from Jeremiah Osabel', '2022-09-19 12:12:18'),
(366, 'Admin Log In', '2022-09-19 12:12:30'),
(367, 'Admin Log Out', '2022-09-19 12:12:44'),
(368, 'Admin Log In', '2022-09-19 12:13:33'),
(369, 'Admin Log Out', '2022-09-19 12:13:57'),
(370, 'Client, Francis Cabahug, Logged In', '2022-09-19 12:14:11'),
(371, 'Client, Francis Cabahug, Log Out', '2022-09-19 12:14:21'),
(372, 'Client, Francis Cabahug, Logged In', '2022-09-19 12:17:05'),
(373, 'Client, Francis Cabahug, Log Out', '2022-09-19 12:17:17'),
(374, 'Admin Log In', '2022-09-19 12:17:34'),
(375, 'Admin Log In', '2022-09-19 12:37:30'),
(376, 'Admin Log Out', '2022-09-19 12:37:59'),
(377, 'Admin Log In', '2022-09-19 12:38:15'),
(378, 'Admin Log Out', '2022-09-19 12:38:36'),
(379, 'New inquiry from Jc Niere', '2022-09-19 12:39:04'),
(380, 'Admin Log In', '2022-09-19 12:39:13'),
(381, 'Admin Log In', '2022-09-19 16:41:35'),
(382, 'Admin Log Out', '2022-09-19 16:41:50'),
(383, 'Admin Log In', '2022-09-19 16:41:56'),
(384, 'Admin Log Out', '2022-09-19 16:42:07'),
(385, 'Admin Log In', '2022-09-19 16:42:21'),
(386, 'Admin Log Out', '2022-09-19 16:42:24'),
(387, 'Admin Log In', '2022-09-19 16:42:36'),
(388, 'Admin Log Out', '2022-09-19 16:42:38'),
(389, 'Admin Log In', '2022-09-19 16:42:45'),
(390, 'Admin Log Out', '2022-09-19 16:42:56'),
(391, 'Admin Log In', '2022-09-19 16:43:30'),
(392, 'Admin Log Out', '2022-09-19 16:43:38'),
(393, 'Client, Francis Cabahug, Logged In', '2022-09-19 16:43:52'),
(394, 'Client, Francis Cabahug, Log Out', '2022-09-19 16:43:59'),
(395, 'Admin Log In', '2022-09-19 16:49:17'),
(396, 'Admin Log Out', '2022-09-19 16:50:44'),
(397, 'Client, Francis Cabahug, Logged In', '2022-09-19 16:54:53'),
(398, 'Client, Francis Cabahug, Log Out', '2022-09-19 16:58:07'),
(399, 'Admin Log In', '2022-09-19 16:58:12'),
(400, 'Admin Log Out', '2022-09-19 16:58:15'),
(401, 'Admin Log In', '2022-09-19 16:58:26'),
(402, 'Admin Log Out', '2022-09-19 17:01:59'),
(403, 'Admin Log In', '2022-09-19 17:03:51'),
(404, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:05:07'),
(405, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:10:08'),
(406, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:12:35'),
(407, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:12:42'),
(408, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:12:48'),
(409, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:13:35'),
(410, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:13:38'),
(411, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:14:08'),
(412, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:14:57'),
(413, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:15:05'),
(414, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:15:35'),
(415, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:15:42'),
(416, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:16:18'),
(417, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:16:29'),
(418, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:16:33'),
(419, 'Admin Log In', '2022-09-19 17:20:40'),
(420, 'Admin Log In', '2022-09-19 17:24:56'),
(421, 'Admin Log In', '2022-09-19 17:25:08'),
(422, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:25:26'),
(423, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:25:31'),
(424, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:27:47'),
(425, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:30:57'),
(426, 'Admin Log In', '2022-09-19 17:31:15'),
(427, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:31:27'),
(428, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:33:14'),
(429, 'Admin Log In', '2022-09-19 17:33:18'),
(430, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:33:30'),
(431, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:33:33'),
(432, 'Admin Log In', '2022-09-19 17:34:20'),
(433, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:34:30'),
(434, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:34:35'),
(435, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:35:17'),
(436, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:36:19'),
(437, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:38:16'),
(438, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:38:23'),
(439, 'Admin Log In', '2022-09-19 17:41:56'),
(440, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:42:16'),
(441, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:42:20'),
(442, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:42:27'),
(443, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:42:32'),
(444, 'Admin Log In', '2022-09-19 17:43:06'),
(445, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:44:44'),
(446, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:49:47'),
(447, 'New inquiry from Patricia', '2022-09-19 17:50:21'),
(448, 'Admin Log In', '2022-09-19 17:50:28'),
(449, 'Registered Patricia Anne Ong San Soy as New Client', '2022-09-19 17:51:47'),
(450, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-19 17:51:55'),
(451, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-19 17:53:29'),
(452, 'Admin Log In', '2022-09-19 17:53:39'),
(453, 'Client, Francis Cabahug, Logged In', '2022-09-19 17:57:00'),
(454, 'Client, Francis Cabahug, Log Out', '2022-09-19 17:57:05'),
(455, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-19 17:58:43'),
(456, 'Admin Log In', '2022-09-19 19:36:15'),
(457, 'Admin Log In', '2022-09-19 19:37:48'),
(458, 'Admin Log Out', '2022-09-19 19:37:54'),
(459, 'Admin Log In', '2022-09-19 19:41:03'),
(460, 'Client, Francis Cabahug, Logged In', '2022-09-19 19:52:27'),
(461, 'Client, Francis Cabahug, Log Out', '2022-09-19 19:52:33'),
(462, 'Admin Log In', '2022-09-19 19:52:55'),
(463, 'Admin Log Out', '2022-09-19 19:53:29'),
(464, 'Admin Log In', '2022-09-19 19:54:29'),
(465, 'Admin Log Out', '2022-09-19 19:54:42'),
(466, 'Client, Francis Cabahug, Logged In', '2022-09-19 19:57:36'),
(467, 'Client, Francis Cabahug, Log Out', '2022-09-19 19:57:43'),
(468, 'Admin Log In', '2022-09-19 19:59:38'),
(469, 'Admin Log Out', '2022-09-19 19:59:43'),
(470, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:00:07'),
(471, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:00:31'),
(472, 'Admin Log In', '2022-09-19 20:05:39'),
(473, 'Admin Log Out', '2022-09-19 20:05:42'),
(474, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:05:48'),
(475, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:07:15'),
(476, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:07:32'),
(477, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:10:48'),
(478, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:10:59'),
(479, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:14:32'),
(480, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:14:38'),
(481, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:15:25'),
(482, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:16:06'),
(483, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:26:01'),
(484, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:26:44'),
(485, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:26:49'),
(486, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:28:35'),
(487, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:29:39'),
(488, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:30:16'),
(489, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:30:20'),
(490, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:30:32'),
(491, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:30:36'),
(492, 'Admin Log In', '2022-09-19 20:30:54'),
(493, 'Admin Log Out', '2022-09-19 20:30:58'),
(494, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:31:11'),
(495, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:32:02'),
(496, 'Admin Log In', '2022-09-19 20:32:26'),
(497, 'Admin Log Out', '2022-09-19 20:32:30'),
(498, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:33:40'),
(499, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:33:45'),
(500, 'Admin Log In', '2022-09-19 20:35:02'),
(501, 'Admin Log Out', '2022-09-19 20:35:06'),
(502, 'Admin Log In', '2022-09-19 20:35:14'),
(503, 'Admin Log Out', '2022-09-19 20:35:17'),
(504, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:35:47'),
(505, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:35:50'),
(506, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:36:25'),
(507, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:38:13'),
(508, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:38:46'),
(509, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:38:51'),
(510, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:40:47'),
(511, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:41:00'),
(512, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:43:06'),
(513, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:43:11'),
(514, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:44:08'),
(515, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:44:15'),
(516, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:44:34'),
(517, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:47:51'),
(518, 'Admin Log In', '2022-09-19 20:48:04'),
(519, 'Admin Log Out', '2022-09-19 20:48:13'),
(520, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:49:26'),
(521, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:49:43'),
(522, 'Admin Log In', '2022-09-19 20:49:52'),
(523, 'Admin Log Out', '2022-09-19 20:50:25'),
(524, 'Client, Francis Cabahug, Logged In', '2022-09-19 20:51:17'),
(525, 'Client, Francis Cabahug, Log Out', '2022-09-19 20:53:05'),
(526, 'Admin Log In', '2022-09-19 20:53:20'),
(527, 'Admin Log Out', '2022-09-19 20:53:27'),
(528, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 09:18:35'),
(529, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 10:02:07'),
(530, 'Admin Log In', '2022-09-20 10:02:12'),
(531, 'Admin Log Out', '2022-09-20 10:02:31'),
(532, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 10:02:37'),
(533, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 10:17:55'),
(534, 'Admin Log In', '2022-09-20 10:18:00'),
(535, 'Admin Log Out', '2022-09-20 10:24:51'),
(536, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 10:24:58'),
(537, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 10:25:17'),
(538, 'Admin Log In', '2022-09-20 10:25:22'),
(539, 'Admin Log Out', '2022-09-20 10:29:45'),
(540, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 10:29:52'),
(541, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 10:30:11'),
(542, 'Admin Log In', '2022-09-20 10:30:21'),
(543, 'Admin Log Out', '2022-09-20 10:30:45'),
(544, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 10:30:58'),
(545, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 10:35:18'),
(546, 'Registered Marie Isabelle Trimidal as New Client', '2022-09-20 10:36:07'),
(547, 'Client, Marie Isabelle Trimidal, Logged In', '2022-09-20 10:36:15'),
(548, 'Client, Marie Isabelle Trimidal, Log Out', '2022-09-20 10:37:43'),
(549, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 10:37:49'),
(550, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 10:54:32'),
(551, 'Admin Log In', '2022-09-20 10:54:37'),
(552, 'Admin Log Out', '2022-09-20 10:54:58'),
(553, 'Admin Log In', '2022-09-20 10:55:04'),
(554, 'Admin Log Out', '2022-09-20 11:00:31'),
(555, 'Admin Log In', '2022-09-20 11:03:58'),
(556, 'Admin Log Out', '2022-09-20 11:04:12'),
(557, 'Client, Marie Isabelle Trimidal, Logged In', '2022-09-20 16:41:05'),
(558, 'Client, Marie Isabelle Trimidal, Log Out', '2022-09-20 16:51:23'),
(559, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 16:51:30'),
(560, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 16:56:45'),
(561, 'Client, Marie Isabelle Trimidal, Logged In', '2022-09-20 16:56:51'),
(562, 'Client, Marie Isabelle Trimidal, Log Out', '2022-09-20 17:15:34'),
(563, 'Client, Francis Cabahug, Logged In', '2022-09-20 17:15:40'),
(564, 'Client, Marie Isabelle Trimidal, Logged In', '2022-09-20 17:17:31'),
(565, 'Client, Marie Isabelle Trimidal, Log Out', '2022-09-20 17:18:01'),
(566, 'Client, Patricia Anne Ong San Soy, Logged In', '2022-09-20 17:22:38'),
(567, 'Client, Patricia Anne Ong San Soy, Log Out', '2022-09-20 17:24:28'),
(568, 'Admin Log In', '2022-09-20 17:24:34'),
(569, 'Admin Log In', '2022-09-20 17:29:51'),
(570, 'Admin Log In', '2022-09-20 17:55:12');

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
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pkg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `ulog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
