-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 10:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fn`, `admin_mn`, `admin_ln`, `admin_contno`, `admin_email`, `admin_pass`, `admin_status`) VALUES
(1, 'Shand Ivan', 'Pabia', 'Sinohon', '09455519167', 'admin@test.com', '$2y$10$qNEm5ZTweQYqcKNCAsgJUOWX0ZD3jqGIgs4u/U5h3FTFsK2kUJba6', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bk_id`, `clnt_id`, `pkg_id`, `venue_id`, `bk_name`, `bk_guest`, `bk_remark`, `bk_date`, `bk_status`) VALUES
(18, 17, 17, 1, 'James and Clara\'s Wedding', 25, 'I would like to have a sky-themed wedding!', '2023-01-11', 0),
(19, 18, 13, 4, 'Thomas Wedding', 125, 'I would love a grandiose wedding.', '2022-09-21', 1),
(21, 20, 18, 20, 'Patricia\'s BTS Wedding', 100, 'I would like to have purple and white as my main theme.', '2022-09-28', 2),
(27, 24, 17, 4, 'Heddy-Justin', 350, 'I would like a sosyal wedding.', '2023-01-01', 3),
(37, 23, 13, 3, 'Ivan-Patricia', 250, 'I would like to have a K-Pop themed wedding!', '2023-02-28', 0),
(44, 26, 17, 90, 'Sam', 500, 'pppp', '2023-02-20', 2),
(45, 27, 13, 86, 'Max-Amelia', 500, 'I would like to have a Japanese-style wedding', '2022-11-05', 0),
(46, 30, 16, 94, 'Gon-Shan Wedding', 150, '', '2023-04-10', 1),
(71, 42, 16, 92, 'Edna-Paul Wedding', 150, 'I want a Filipino Wedding', '2023-06-20', 0),
(72, 43, 16, 90, 'Banban-Patty', 34, 'I like to have BTS-Themed Wedding.', '2023-04-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clnt_id` int(11) NOT NULL,
  `clnt_fn` varchar(50) NOT NULL,
  `clnt_mn` varchar(50) DEFAULT NULL,
  `clnt_ln` varchar(50) NOT NULL,
  `clnt_contno` varchar(11) DEFAULT NULL,
  `clnt_add` varchar(100) DEFAULT NULL,
  `clnt_email` varchar(100) NOT NULL,
  `clnt_pass` varchar(255) NOT NULL,
  `clnt_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clnt_id`, `clnt_fn`, `clnt_mn`, `clnt_ln`, `clnt_contno`, `clnt_add`, `clnt_email`, `clnt_pass`, `clnt_img`) VALUES
(17, 'James', 'Anderson', 'de Guzman', '09151234567', 'Lapasan, Cagayan de Oro City', 'james@test.com', '$2y$10$2ZLeOI2zXXMYR/wgOoZ74O4LvPd/qqVTNKq4l9Uy8dCaDAecCPLNu', 'James de Guzman.jpg'),
(18, 'Thomas', 'Anderson', 'Romanio', '09151234567', 'Camiguin', 'thomas@test.com', '$2y$10$n0smyW3pkUVz61M5n0RVBevLGli0FUJ48qYkjSj/0thpLmSQIq.J6', ''),
(20, 'Patricia Anne', 'Montemayor', 'Ong San Soy', '09151234567', 'Igpit, Misamis Oriental', 'patricia@gmail.com', '$2y$10$o8fQ3EPq/KfHiQnLlY/0Jeo/PidpvckKN7VDoBKK8W9qvYyxU/QxC', 'patricia.jpg'),
(21, 'Marie Isabelle', '', 'Trimidal', '09151234567', 'Igpit, Misamis Oriental', 'belle@test.com', '$2y$10$CtI03mgVQbZtybEs4pzGD.tDVTLkjyed01ENt0cKK4906X2F5hLX2', ''),
(23, 'Shand Ivan', 'Pabia', 'Sinohon', '09151234567', 'Bulua, Cagayan de Oro', 'ivan@test.com', '$2y$10$rPnOiyCk13Yd4QcBms4ItO4gfb1aNwqvC1/8Ammehtubl7UqnaIsO', ''),
(24, 'Heddy', '', 'Sasuter', '09151234567', 'Bulua, Cagayan de Oro', 'heds@test.com', '$2y$10$AVmwv82udtcdoihq02HL9Or5KMI6IZM9RVUosHIfYxwlEd9m/Tgre', ''),
(25, 'Jeth Mychael', '', 'Gargar', '09125555111', 'Balulang', 'gargar@gmail.com', '$2y$10$TgtA1H1OF66yduxlMwXJ.OTgmD0l8.XYjlXwBc/yblauViwOz6DOq', ''),
(26, 'Sam', '', 'Gubaten', '09112345555', 'Carmen', 'sam@gmail.com', '$2y$10$CnHTDTEjkvpeTn9oWxXktuYJbaEWegl5crjBdfV6VTXPN1vhwd3TG', ''),
(27, 'Max', 'James', 'Sinohon', '09123456789', 'Bulua, CDO', 'max@gmail.com', '$2y$10$ijijA4Elt9XNcf.qWFYpIuRmIHXeScsQZp0K4FUE97ab4539GYU1.', ''),
(28, 'James', '', 'Markus', '09123456789', 'Bulua, CDO', 'james1@gmail.com', '$2y$10$v1hvQTW.RazQu1HpyCtRreWtqwRDhTMF9z5g.j1DkWAckqHe3t.Ei', ''),
(29, 'Josephus', '', 'Cua', '09151231231', 'Aurora, Zamboanga del Sur', 'josephus@test.com', '$2y$10$Lz9kQyAnJXtIDmiJVZ.Yjea8nuOQIfLMNsTnY4N2qDVaAdzRuh5DG', ''),
(30, 'Gon', '', 'Freecs', '09451123555', 'Manila, Philippines', 'gonfreecs@gmail.com', '$2y$10$hnhkew6pkXCcLgA.bEU0neKMjPQ7LJxKauHo66xdlAK2kijO5kPQO', '1078997.jpg'),
(31, 'Michaella', '', 'Ong San Soy', '09333123121', 'Igpit, CDO', 'mong@gmail.com', '$2y$10$qBrYE34PLaKoHJhxIqAXX.FVpLKcy7iXTFz.wFeAArW2HhJR1zq9u', '326152259_1206840073276067_3475802420833525244_n.jpg'),
(34, 'Angela', 'Jonas', 'Ramos', '09111142342', 'Carmen, CDO', 'angela@gmail.com', '$2y$10$vjQ6WMmaQgKrLSBhbik1OOtI7aS8Y80UKDaREqt7uN7/MuBoELGdC', 'generic girl.jpg'),
(42, 'Edna', NULL, 'Sinohon', '09123781222', NULL, 'edna@test.com', '$2y$10$x/wViYPADQDKS.eQXG3NnebDYFxbs6ibP3nJpCNi2i9uhd0mLZvtO', NULL),
(43, 'Shand Ivan', NULL, 'Sinohon', NULL, NULL, 'ivan@gmail.com', '$2y$10$sGvikiSqCywvwlPbjj5J0.jrlPuf0YtqK5DVJTJ1VsbRMw/u79zVS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `clnt_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `clnt_email` varchar(100) NOT NULL,
  `inbox_text` varchar(255) NOT NULL,
  `inbox_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inbox_id`, `inbox_datetime`, `clnt_id`, `admin_id`, `clnt_email`, `inbox_text`, `inbox_status`) VALUES
(25, '2023-02-11 16:31:28', 34, 0, 'angela@gmail.com', '[Angela] asdfasdf', 1),
(26, '2023-02-11 17:11:37', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] wow\r\n', 1),
(27, '2023-02-11 17:14:05', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] tyuityui', 1),
(28, '2023-02-11 17:16:46', 34, 0, 'angela@gmail.com', '[Angela] qwerqwerw', 1),
(30, '2023-02-11 17:22:41', 34, 0, 'angela@gmail.com', '[Angela] sdfgsdf', 1),
(33, '2023-02-11 17:23:58', 34, 0, 'angela@gmail.com', '[Angela] rftgyhjfghjfgh', 1),
(36, '2023-02-11 17:25:55', 34, 0, 'angela@gmail.com', '[Angela] nice', 1),
(37, '2023-02-11 17:32:18', 34, 0, 'angela@gmail.com', '[Angela] l;jahdsfl;jhdaskljfhsdakljfhaskldjfhaskldjfhaskldjfhaklsjdhfaklsjdhfklajsdhfklasjdhflkasjdhfklajshdflkajsdhfkaljsdhflakjsdhfakljsdhflksd', 1),
(40, '2023-02-11 19:49:22', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] fhjfghjfgh', 1),
(41, '2023-02-11 20:54:40', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] admin\r\n', 1),
(42, '2023-02-11 20:55:07', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] asdfasdf', 1),
(43, '2023-02-11 20:55:10', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] asdfasdf', 1),
(44, '2023-02-11 21:00:48', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] asdfasdf', 1),
(45, '2023-02-11 21:00:51', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] asdfasdfasdf', 1),
(46, '2023-02-11 21:00:54', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] asdfasdfasdf', 1),
(47, '2023-02-11 21:00:57', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] asdfasdfasdfasdf', 1),
(48, '2023-02-11 21:03:07', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] rhfgjgfhjghj', 1),
(49, '2023-02-11 21:03:10', 34, 1, 'angela@gmail.com', '[Admin Shand Ivan] fghjfghjfghj', 1),
(50, '2023-02-12 17:03:43', 43, 0, 'ivan@gmail.com', '[Shand Ivan] Hello\r\n', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inq_id`, `inq_name`, `inq_contno`, `inq_email`, `inq_remark`, `inq_status`, `inq_datetime`) VALUES
(23, 'Francis Gabriel Cabahug', '09151234567', 'francis@test.com', 'I would like to see if there are available slots for a November wedding?', 1, '2022-09-18 13:19:26'),
(24, 'Jeremiah Osabel', '09151234567', 'josabel@gmail.com', 'Sample text\r\n', 1, '2022-09-19 12:12:18'),
(25, 'Jc Niere', '09151234567', 'niere@test.com', 'Sample text', 1, '2022-09-19 12:39:04'),
(26, 'Patricia', '09151234567', 'patricia@gmail.com', 'I would like to ask for your services!', 1, '2022-09-19 17:50:21'),
(27, 'Annie', '09125555111', 'annie@gmail.com', 'lkajsdflkjasgdfkagsdkfasd', 1, '2022-09-28 15:11:04'),
(28, 'Mikee', '09111142342', 'mikee1@gmail.com', 'I would like to know more about your services!', 1, '2023-01-27 17:28:01');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pkg_id`, `pkg_name`, `pkg_price`, `pkg_desc`, `pkg_img`, `pkg_status`) VALUES
(13, 'Gran Boda Full Planning and Coordination (70-150 pax)', 60000.00, '• Overall Planning\r\n<br> • Supplier directory\r\n<br> • Wedding documents guidance\r\n<br> • Monthly wedding to-do-list\r\n<br> • Ceremony Procession Rehearsal Assistance\r\n<br> • On-the-day coordinators\r\n<br> • Suppliers\' payment assistance', '315174412_824720532069134_8081289422894190207_n.jpg', 1),
(16, 'Gran Boda On-the-day Coordination (70-150 pax)', 45000.00, '• Program flow management\r\n<br> • Ceremony Procession Rehearsal Assistance\r\n<br> • Wedding entourage & supplier coordination <br> on wedding call times and on-the-day activities\r\n<br> • On-the-day coordinators\r\n<br> • Suppliers’ payment assistance', '315174412_824720532069134_8081289422894190207_n.jpg', 1),
(17, 'Intima Boda Full Planning and Coordination (30-70 pax)', 50000.00, '• Overall Planning\r\n<br> • Supplier directory\r\n<br> • Wedding documents guidance\r\n<br> • Monthly wedding to-do-list\r\n<br> • Ceremony Procession Rehearsal Assistance\r\n<br> • Wedding entourage & supplier coordination\r\n<br> • Suppliers’ payment assistance', '315174412_824720532069134_8081289422894190207_n.jpg', 1),
(18, 'On-The-Day Coordination', 46000.00, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam nulla facilisi cras fermentum odio. Nulla facilisi nullam vehicula ipsum a arcu. Non quam lacus suspendisse faucibus interd', 'otd.jpg', 0),
(24, 'Sample Package', 15000.00, 'Example', 'istockphoto-851716948-612x612.jpg', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_img`, `staff_fn`, `staff_mn`, `staff_ln`, `staff_email`, `staff_contno`, `staff_add`, `staff_pos`, `staff_status`) VALUES
(1, 'Ayana.jpg', 'Ayana', '', 'Flores', 'ayana@gmail.com', '09999914556', 'Cagayan de Oro City', 'Head Coordinator', 1),
(2, 'ferle.jpg', 'Ferle', '', 'Busano', 'ferle@test.com', '09123456789', 'Cagayan de Oro City', 'Officer-In-Charge', 1),
(3, 'Gillian.jpg', 'Gillian', '', 'Mugot', 'gillian@test.com', '09151234567', 'Cagayan de Oro', 'Officer-In-Charge', 1),
(4, 'Heds.jpg', 'Heddy', '', 'Gulmatico', 'hedda@test.com', '09151234567', 'Cagayan de Oro', 'Officer-In-Charge', 1),
(5, '326372857_484752243825020_9094669114770993723_n.jpg', 'Patricia Anne', '', 'Ong San Soy', 'patricia@gmail.com', '09291449870', 'Igpit, Cagayan de Oro', 'On-The-Day Coordinator', 1),
(14, 'Glenny.jpg', 'Glenny', '', 'Melendres', 'glenny@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(15, 'Shimmay.jpg', 'Shimmay', '', 'Balagtas', 'shimmay@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(16, 'Donna.jpg', 'Donna', '', 'Rodrigo', 'donna@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(17, 'Frenzcel.jpg', 'Frenzcel', '', 'Felias', 'frenzcel@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(18, 'Mehzi.jpg', 'Mehzi', '', 'Navarro', 'mehzi@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 0),
(19, 'Erika.jpg', 'Erika', '', 'Manego', 'erika@test.com', '09151234567', 'Cagayan de Oro', 'On-The-Day Coordinator', 1),
(20, '326152259_1206840073276067_3475802420833525244_n.jpg', 'Michaella', '', 'Ong San Soy', 'michaellaongsansoy@gmail.com', '09451333411', 'Igpit, Cagayan de Oro City', 'On-The-Day Coordinator', 1),
(21, '325714804_1228569304404910_1698795889305253619_n.jpg', 'Alexxa', '', 'Janeo', 'a.janeo1999@gmail.com', '09327933427', 'Kauswagan, Cagayan de Oro City', 'On-The-Day Coordinator', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_grp`
--

CREATE TABLE `staff_grp` (
  `bk_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_grp`
--

INSERT INTO `staff_grp` (`bk_id`, `staff_id`) VALUES
(18, 1),
(18, 2),
(18, 5),
(20, 16),
(20, 17),
(23, 1),
(23, 2),
(23, 14),
(25, 3),
(25, 4),
(25, 5),
(27, 1),
(27, 2),
(27, 3),
(31, 1),
(31, 3),
(31, 4),
(31, 5),
(37, 1),
(37, 3),
(37, 4),
(37, 16),
(37, 17),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(47, 2),
(47, 3),
(47, 15),
(48, 1),
(48, 4),
(48, 5),
(48, 17),
(46, 3),
(46, 14),
(46, 15),
(56, 3),
(56, 4),
(56, 5),
(57, 4),
(57, 5),
(57, 19),
(57, 20),
(61, 15),
(61, 16),
(70, 4),
(70, 14),
(70, 15);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL,
  `supp_name` varchar(100) NOT NULL,
  `supp_contno` varchar(11) NOT NULL,
  `supp_email` varchar(100) NOT NULL,
  `supp_role` varchar(50) NOT NULL,
  `supp_add` varchar(100) NOT NULL,
  `supp_img` varchar(255) DEFAULT NULL,
  `supp_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_contno`, `supp_email`, `supp_role`, `supp_add`, `supp_img`, `supp_status`) VALUES
(2, 'Brian DJ and Hosting Services', '09761234567', 'briandj@gmail.com', 'Hosting Service', 'Iponan, Cagayan de Oro City', 'Become-a-Great-Wedding-DJ-5-800x445.jpg', 0),
(16, 'Samantha\'s Cakes and Pastries', '09123456789', 'samcakes@gmail.com', 'Food Catering Service', 'Kauswagan, Cagayan de Oro City', 'Wedding_Cake_Background.jpg', 0),
(17, 'Ray\'s Filmography Services', '09123456789', 'raydigital@test.com', 'Digital Services', 'Opol, Misamis Oriental', 'How-To-Become-a-Successful-Commercial-Photographer-768x350.jpg', 0),
(29, 'Carlo Gaid Photography', '09568307711', 'gaidcarlojohn@gmail.com', 'Photography', 'Manila, Philippines', '312200768_659645208865562_6738191573269978324_n.jpg', 1),
(30, 'Damari Studios', '09451123444', 'damaristudios@gmail.com', 'Videography', 'Paradigm Lounge, Tibanga Highway, Iligan City, Philippines', '290040490_479221524108143_9166860709514034459_n.jpg', 1),
(31, 'Benjie G. Photography', '09569768871', 'jiegumalang@gmail.com', 'Photography', 'Carmen, Cagayan de Oro City', '309585064_488574709949135_4669182275065103526_n.jpg', 1),
(32, 'The Creative House', '09451123555', 'thecreativehouse.ph@gmail.com', 'Stylist', 'Cagayan de Oro/Cebu/Iligan', '290767284_453778796750326_3892283105906014622_n.jpg', 1),
(33, 'Elegance by Bem', '09177043777', 'elegancebybem@gmail.com', 'Stylist', 'Cagayan de Oro, Philippines', '308469343_391168093221090_9000125561152569412_n.jpg', 1),
(34, 'DJ Mark Glenn', '09451341123', 'bajaomarkglennrey93@gmail.com', 'DJ', 'Cagayan de Oro, Philippines', '158617319_212759070307093_4488013402883448969_n.jpg', 1),
(35, 'Meg\'s Cakes', '09327990112', 'megscakescdo@gmail.com', 'Dessert and Pastries', 'Villa Violeta, Damilag, Bukidnon, Damilag, Philippines', '274825098_7158604207544823_9146029470762809787_n.jpg', 1),
(36, 'Simplejoys Bakery & Café', '09563416662', 'joanntychua@yahoo.com', 'Dessert and Pastries', 'J.R Borja - Burgos Streets, Cagayan de Oro, Philippines', '323041947_1249000319296739_2708480908581907778_n.jpg', 1),
(37, 'Dessert Boss', '09278198073', 'dessertbosscdo@gmail.com', 'Dessert and Pastries', 'Dessert Boss, Kalambaguhan Burgos St, Cagayan de Oro City 9000 Cagayan de Oro, Philippines', '70767903_2554388728126869_7000158464634781696_n.jpg', 1),
(38, 'KPOP Resto', '', '', '', '', NULL, 30),
(40, 'Montemayor Catering Services', '', '', 'Food Catering', '', NULL, 17),
(41, 'Montemayor Catering Services', '', '', 'Food Catering', '', NULL, 34),
(42, 'Niko Go', '09374034583', 'nikogohmua@gmail.com', 'HMUA', 'Nazareth, CDO', 'mup1.webp', 1),
(43, 'Alain Adeva', '09451123874', 'aadeva1992@gmail.com', 'HMUA', 'Balingasag', 'mup2.jfif', 1),
(44, 'Sean dela Cruz', '09976041787', 'seanpreildelacruz@gmail.com', 'Emcee', 'Iligan City', 'sdc.png', 1),
(45, 'Montemayor Catering Services', '', '', 'Food Catering', '', NULL, 40),
(49, 'Montemayor Catering Services', '', '', 'Food Catering', '', NULL, 42);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_grp`
--

CREATE TABLE `supplier_grp` (
  `supp_id` int(11) NOT NULL,
  `bk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 22),
(16, 22),
(17, 22),
(2, 23),
(16, 23),
(16, 24),
(17, 24),
(17, 21),
(2, 25),
(16, 25),
(2, 26),
(16, 26),
(17, 26),
(2, 27),
(16, 27),
(2, 28),
(16, 28),
(2, 29),
(16, 29),
(16, 31),
(2, 30),
(16, 30),
(22, 32),
(23, 33),
(17, 34),
(2, 35),
(16, 35),
(16, 36),
(17, 36),
(2, 38),
(16, 38),
(16, 39),
(17, 39),
(16, 40),
(17, 40),
(2, 41),
(16, 41),
(2, 42),
(16, 42),
(2, 43),
(16, 43),
(2, 44),
(16, 44),
(17, 45),
(28, 45),
(30, 46),
(36, 46),
(37, 46),
(38, 46),
(30, 47),
(31, 47),
(36, 47),
(29, 48),
(30, 48),
(35, 48),
(36, 48),
(30, 49),
(31, 49),
(36, 49),
(37, 49),
(29, 50),
(30, 50),
(31, 50),
(35, 51),
(36, 51),
(37, 51),
(29, 52),
(35, 52),
(29, 53),
(32, 53),
(34, 54),
(45, 54),
(32, 55),
(33, 55),
(29, 56),
(32, 56),
(49, 56),
(32, 58),
(31, 59),
(32, 59),
(29, 37),
(35, 37),
(32, 37),
(42, 37),
(0, 65),
(32, 70),
(33, 70),
(42, 70),
(34, 70),
(31, 71),
(35, 71),
(32, 71),
(42, 71),
(44, 71),
(49, 71),
(29, 72),
(32, 72),
(34, 72);

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `text_id` int(11) NOT NULL,
  `text_home` varchar(1000) NOT NULL,
  `text_about` varchar(1000) NOT NULL,
  `text_team` varchar(1000) NOT NULL,
  `text_service` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`text_id`, `text_home`, `text_about`, `text_team`, `text_service`) VALUES
(1, 'We are a team consisting of young professionals from all walks of life gathered by one great passion in service and anything related to love and tying the knot! We all have in our heart one goal - to provide quality, systematic and REAL-ational services to all. Weddings have been one of the most celebrated gathers in the Filipino Culture. <br> <br> And we consider the details, preparation, and the coming together of everything envisioned as an art to be done precisely, systematically, and heartfully. We come in service and we do with sincere goal driven desires. <br><br>The past year has been a good one for us. The countless learning we experienced humbled us through and inspired our brand to always strive for growth, improvement, and continuous genuine work.', 'We are a team that consists of young professionals from all walks of life. We are gathered by our passion to serve and anything related to love and tying the knot!\r\n', 'We consider the details, preparation, and the coming together of everything envisioned as an art to be done precisely, systematically, and heartfully. The countless learnings we experienced humbled our brand to always strive for growth, improvements, and continuous genuine work.', 'Just got engaged and no idea of what to do next? We got you covered! Our team will provide you the service to get everything started from scratch to finish. You deserve the best hassle-free wedding experience!');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `ulog_id` int(11) NOT NULL,
  `ulog_act` varchar(255) NOT NULL,
  `ulog_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`ulog_id`, `ulog_act`, `ulog_datetime`) VALUES
(640, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-26 21:24:16'),
(641, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 21:24:28'),
(642, 'Updated Information for Admin Member, Shand Ivan Sinohon', '2022-09-26 21:24:36'),
(643, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-26 21:34:50'),
(644, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 21:37:38'),
(645, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-26 21:40:48'),
(646, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 22:01:33'),
(647, 'Updated Page Texts', '2022-09-26 22:06:47'),
(648, 'Updated Page Texts', '2022-09-26 22:07:01'),
(649, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-26 22:07:11'),
(650, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 22:12:30'),
(651, 'Updated Page Texts', '2022-09-26 22:12:39'),
(652, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-26 22:12:44'),
(653, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 22:12:54'),
(654, 'Updated Page Texts', '2022-09-26 22:13:01'),
(655, 'Updated Page Texts', '2022-09-26 22:14:30'),
(657, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-26 22:30:06'),
(658, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 22:30:10'),
(659, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 23:14:55'),
(660, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-26 23:15:32'),
(661, 'Client, Shand Ivan Sinohon, Log In', '2022-09-26 23:16:08'),
(662, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-26 23:16:14'),
(663, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-26 23:16:21'),
(664, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-27 00:06:34'),
(665, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-27 00:19:21'),
(666, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-27 00:32:36'),
(667, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-27 19:30:49'),
(668, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 13:39:22'),
(669, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-28 13:39:39'),
(670, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 13:39:56'),
(671, 'Updated Page Texts', '2022-09-28 13:40:12'),
(672, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-28 13:40:15'),
(673, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 13:40:24'),
(674, 'Updated Page Texts', '2022-09-28 13:40:44'),
(675, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-28 13:40:46'),
(676, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 15:03:35'),
(677, 'Updated Page Texts', '2022-09-28 15:03:58'),
(678, 'Updated Page Texts', '2022-09-28 15:04:10'),
(680, 'New inquiry from Annie', '2022-09-28 15:11:04'),
(681, 'Registered Jeth Mychael Gargar as New Client', '2022-09-28 15:13:52'),
(682, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 15:14:02'),
(683, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 15:26:59'),
(684, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-28 15:57:38'),
(685, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 15:57:45'),
(686, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 18:13:38'),
(687, 'Client, Jeth Mychael Gargar, Log Out', '2022-09-28 19:11:28'),
(688, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 19:11:35'),
(689, 'Client, Jeth Mychael Gargar, Log Out', '2022-09-28 19:13:36'),
(690, 'Client, Shand Ivan Sinohon, Log In', '2022-09-28 19:13:41'),
(691, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-28 19:23:51'),
(692, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 19:23:58'),
(693, 'Client, Shand Ivan Sinohon, Log In', '2022-09-28 19:25:32'),
(694, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-28 19:33:09'),
(695, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 19:33:15'),
(696, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-28 19:37:02'),
(697, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 19:37:13'),
(698, 'Client, Jeth Mychael Gargar, Log Out', '2022-09-28 20:51:52'),
(699, 'Client, Shand Ivan Sinohon, Log In', '2022-09-28 20:51:57'),
(700, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-28 21:00:11'),
(701, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 21:00:19'),
(702, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-28 21:02:50'),
(703, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 21:03:10'),
(704, 'Client, Jeth Mychael Gargar, Log Out', '2022-09-28 21:57:15'),
(705, 'Client, Shand Ivan Sinohon, Log In', '2022-09-28 21:57:20'),
(706, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-28 22:01:19'),
(707, 'Client, Jeth Mychael Gargar, Log In', '2022-09-28 22:01:25'),
(708, 'Client, Jeth Mychael Gargar, Log Out', '2022-09-28 22:07:58'),
(709, 'Client, Shand Ivan Sinohon, Log In', '2022-09-28 22:08:06'),
(710, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-28 22:18:10'),
(711, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 22:18:14'),
(712, 'Client, Shand Ivan Sinohon, Log In', '2022-09-28 22:20:16'),
(713, 'Admin, Shand Ivan Sinohon, Log In', '2022-09-28 23:25:44'),
(714, 'Admin, Shand Ivan Sinohon, Log Out', '2022-09-28 23:25:49'),
(715, 'Client, Shand Ivan Sinohon, Log In', '2022-09-28 23:25:58'),
(716, 'Client, Shand Ivan Sinohon, Log Out', '2022-09-28 23:26:02'),
(717, 'Client, Shand Ivan Sinohon, Log In', '2022-09-29 13:33:37'),
(718, 'Client, Shand Ivan Sinohon, Log In', '2022-09-29 14:57:37'),
(719, 'Client, Shand Ivan Sinohon, Log In', '2022-09-29 15:07:12'),
(720, 'Client, Shand Ivan Sinohon, Log In', '2022-10-04 19:53:21'),
(721, 'Client, Shand Ivan Sinohon, Log Out', '2022-10-04 20:25:08'),
(722, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-04 20:25:16'),
(723, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-04 21:23:54'),
(724, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-04 22:03:09'),
(725, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-05 17:26:01'),
(726, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-11 13:56:40'),
(727, 'Admin, Shand Ivan Sinohon, Log Out', '2022-10-11 13:56:51'),
(728, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-11 13:58:39'),
(729, 'Registered Sam Gubaten as New Client', '2022-10-19 13:07:22'),
(730, 'Client, Sam Gubaten, Log In', '2022-10-19 13:07:29'),
(731, 'Client, Sam Gubaten, Log In', '2022-10-19 15:19:44'),
(732, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-20 15:48:46'),
(733, 'Registered Max Sinohon as New Client', '2022-10-21 15:27:30'),
(734, 'Client, Max Sinohon, Log In', '2022-10-21 15:27:48'),
(735, 'Client, Max Sinohon, Log Out', '2022-10-21 15:31:41'),
(736, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-21 15:31:53'),
(738, 'Admin, Shand Ivan Sinohon, Log Out', '2022-10-21 15:34:37'),
(739, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-21 15:34:52'),
(741, 'Admin, Shand Ivan Sinohon, Log Out', '2022-10-21 15:36:34'),
(742, 'Registered James Markus as New Client', '2022-10-21 15:39:11'),
(743, 'Client, James Markus, Log In', '2022-10-21 15:39:21'),
(744, 'Client, James Markus, Log Out', '2022-10-21 15:46:50'),
(745, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-21 15:46:59'),
(747, 'Admin, Shand Ivan Sinohon, Log Out', '2022-10-21 15:47:53'),
(748, 'Admin, Shand Ivan Sinohon, Log In', '2022-10-21 15:48:26'),
(749, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-13 22:56:24'),
(750, 'Set Sample Package Package as Inactive', '2023-01-13 22:59:50'),
(751, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-13 23:10:52'),
(752, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-13 23:27:13'),
(753, 'Client, Shand Ivan Sinohon, Log In', '2023-01-13 23:28:19'),
(754, 'Client, Shand Ivan Sinohon, Log Out', '2023-01-13 23:29:50'),
(755, 'Registered Josephus Cua as New Client', '2023-01-13 23:30:36'),
(756, 'Client, Josephus Cua, Log In', '2023-01-13 23:30:45'),
(757, 'Client, Josephus Cua, Log Out', '2023-01-14 00:10:27'),
(758, 'Client, Shand Ivan Sinohon, Log In', '2023-01-14 00:10:33'),
(759, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-14 18:29:32'),
(760, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-14 18:51:23'),
(761, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-14 20:29:58'),
(762, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-14 20:30:21'),
(763, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-14 20:37:08'),
(764, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-14 20:39:56'),
(765, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-14 20:58:00'),
(766, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-15 23:19:15'),
(768, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 00:44:27'),
(769, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 00:44:47'),
(770, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 00:46:11'),
(771, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 00:46:17'),
(774, 'Updated Information for Staff Member, Ayana Flores', '2023-01-16 00:53:04'),
(776, 'Updated Venue Info for Cove Garden Resort', '2023-01-16 00:56:46'),
(778, 'Updated Venue Info for Cove Garden Resorts', '2023-01-16 01:00:00'),
(779, 'Updated Venue Info for Cove Garden Resort', '2023-01-16 01:00:16'),
(780, 'Updated Venue Info for Cove Garden Resort', '2023-01-16 01:00:22'),
(782, 'Updated Information for Staff Member, Ayana Flores', '2023-01-16 01:04:34'),
(791, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 14:43:18'),
(793, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 14:45:40'),
(794, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 14:47:29'),
(799, 'Updated  Package Info', '2023-01-16 14:53:20'),
(800, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 14:53:35'),
(801, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 14:53:45'),
(803, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 14:54:07'),
(804, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 14:54:55'),
(805, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 14:55:24'),
(806, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 14:55:33'),
(807, 'Updated Venue Info for Cove Garden Resorts', '2023-01-16 14:55:46'),
(808, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 14:55:48'),
(809, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 14:55:58'),
(810, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 15:06:20'),
(813, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-16 15:11:04'),
(823, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-16 17:50:12'),
(826, 'Updated Intima Boda - Basic Full Wedding Package Info Where Price is ₱28,000.00', '2023-01-16 17:57:29'),
(827, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-17 14:09:44'),
(828, 'Updated Intima Boda - Basic Full Wedding Package Info Where Price is ₱40,000.00', '2023-01-17 14:13:38'),
(829, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-17 14:25:19'),
(830, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-17 15:22:28'),
(831, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-17 15:22:40'),
(832, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:33:09'),
(833, 'Updated Page Texts', '2023-01-18 19:34:17'),
(834, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:34:19'),
(835, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:34:40'),
(836, 'Set On-The-Day Coordination Package as Inactive', '2023-01-18 19:34:55'),
(838, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:36:40'),
(839, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:37:14'),
(841, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:39:13'),
(842, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:40:54'),
(843, 'Updated Gran Boda On-the-day Coordination (70-150 pax) Package Info Where Price is ₱45,000.00', '2023-01-18 19:41:49'),
(845, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:42:15'),
(846, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:42:35'),
(847, 'Updated Intima Boda Full Planning and Coordination (30-70 pax) Package Info Where Price is ₱50,000.00', '2023-01-18 19:44:15'),
(849, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:44:37'),
(850, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:45:06'),
(851, 'Updated Gran Boda On-the-day Coordination (70-150 pax) Package Info Where Price is ₱45,000.00', '2023-01-18 19:45:26'),
(852, 'Updated Intima Boda Full Planning and Coordination (30-70 pax) Package Info Where Price is ₱50,000.00', '2023-01-18 19:45:33'),
(853, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:45:52'),
(854, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:46:26'),
(855, 'Updated Gran Boda Full Planning and Coordination (70-150 pax) Package Info Where Price is ₱60,000.00', '2023-01-18 19:46:41'),
(856, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:46:43'),
(857, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:46:53'),
(858, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:47:14'),
(859, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 19:54:02'),
(861, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 19:54:19'),
(862, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:07:33'),
(863, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 20:07:47'),
(864, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:13:50'),
(865, 'Added New Supplier, Carlo Gaid Photography As Photography', '2023-01-18 20:15:24'),
(866, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 20:15:31'),
(867, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:16:10'),
(868, 'Added New Supplier, Damari Studios As Videography', '2023-01-18 20:18:08'),
(869, 'Added New Supplier, Benjie G. Photography As Photography', '2023-01-18 20:20:14'),
(870, 'Added New Supplier, The Creative House As Stylist', '2023-01-18 20:21:59'),
(871, 'Added New Supplier, Elegance by Bem As Stylist', '2023-01-18 20:24:46'),
(872, 'Added New Supplier, DJ Mark Glenn As DJ', '2023-01-18 20:26:26'),
(873, 'Added New Supplier, Meg\'s Cakes As Cakes and Pastries', '2023-01-18 20:29:16'),
(874, 'Added New Supplier, Simplejoys Bakery & Café As Cakes and Pastries', '2023-01-18 20:32:08'),
(875, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 20:32:14'),
(876, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:34:01'),
(877, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 20:34:13'),
(878, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:35:40'),
(879, 'Updated Gran Boda On-the-day Coordination (70-150 pax) Package Info Where Price is ₱45,000.00', '2023-01-18 20:35:48'),
(880, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 20:35:55'),
(881, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:36:04'),
(882, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 20:36:16'),
(883, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:38:04'),
(884, 'Added New Supplier, Dessert Boss As Desserts and Pastries', '2023-01-18 20:40:30'),
(885, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 20:41:41'),
(886, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 20:53:40'),
(887, 'Added New Venue, Chali Beach Resort', '2023-01-18 20:56:31'),
(888, 'Set Riverview Event Center Venue as Inactive', '2023-01-18 20:56:46'),
(889, 'Added New Venue, Elysee Cafe', '2023-01-18 20:57:36'),
(890, 'Added New Venue, Marco Hotel', '2023-01-18 20:58:39'),
(891, 'Added New Venue, Pinegrove Mountain Lodge', '2023-01-18 21:00:02'),
(892, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:00:05'),
(893, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:02:09'),
(894, 'Added New Venue, Dahilayan Gardens and Resort', '2023-01-18 21:03:00'),
(895, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:03:09'),
(896, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:03:38'),
(897, 'Set High Ridge Venue as Inactive', '2023-01-18 21:03:49'),
(898, 'Added New Venue, Amaya View', '2023-01-18 21:06:51'),
(899, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:06:57'),
(900, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:08:03'),
(901, 'Set Digital Services, Ray\'s Filmography Services as inactive', '2023-01-18 21:08:11'),
(902, 'Set Food Catering Service, Samantha\'s Cakes and Pastries as inactive', '2023-01-18 21:08:24'),
(903, 'Set Hosting Service, Brian DJ and Hosting Services as inactive', '2023-01-18 21:08:27'),
(904, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:08:29'),
(905, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:12:46'),
(906, 'Updated Information for Staff Member, Ayana Flores', '2023-01-18 21:12:59'),
(907, 'Updated Information for Staff Member, Patricia Anne Ong San Soy', '2023-01-18 21:13:10'),
(908, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:13:11'),
(909, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:13:20'),
(910, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:14:37'),
(911, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:15:52'),
(912, 'Added New Staff Member, Michaella Ong San Soy', '2023-01-18 21:18:24'),
(913, 'Added New Staff Member, Alexxa Janeo', '2023-01-18 21:19:26'),
(914, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:19:29'),
(915, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:20:38'),
(916, 'Set On-The-Day Coordinator, Mehzi Navarro As Inactive', '2023-01-18 21:20:46'),
(917, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:20:48'),
(918, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:24:14'),
(919, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:26:23'),
(920, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-18 21:40:44'),
(921, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-18 21:42:17'),
(922, 'Registered Gon Freecs as New Client', '2023-01-19 03:27:52'),
(923, 'Client, Gon Freecs, Log In', '2023-01-19 03:28:05'),
(924, 'Client, Gon Freecs, Log Out', '2023-01-19 03:33:49'),
(925, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-19 03:33:56'),
(930, 'Updated Gran Boda Full Planning and Coordination (70-150 pax) Package Info', '2023-01-19 03:52:13'),
(931, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-19 03:55:38'),
(932, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-19 03:55:49'),
(933, 'Updated Intima Boda Full Planning and Coordination (30-70 pax) Package Info', '2023-01-19 03:56:11'),
(934, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-19 03:56:14'),
(935, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-19 15:29:23'),
(936, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-19 15:32:47'),
(937, 'Registered Michaella Ong San Soy as New Client', '2023-01-19 15:33:26'),
(938, 'Client, Michaella Ong San Soy, Log In', '2023-01-19 15:33:38'),
(939, 'Client, Michaella Ong San Soy, Log Out', '2023-01-19 15:38:34'),
(940, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-19 15:38:40'),
(941, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-19 15:46:58'),
(942, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-19 15:48:16'),
(943, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-24 14:03:05'),
(944, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-24 14:05:51'),
(945, 'Registered Ed Ramos as New Client', '2023-01-27 14:16:31'),
(946, 'Client, Ed Ramos, Log In', '2023-01-27 14:16:46'),
(947, 'Client, Ed Ramos, Log Out', '2023-01-27 14:48:09'),
(948, 'Client, Ed Ramos, Log In', '2023-01-27 14:48:24'),
(949, 'Client, Ed Ramos, Log Out', '2023-01-27 14:49:42'),
(950, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-27 14:49:51'),
(951, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-27 14:53:19'),
(952, 'New inquiry from Mikee', '2023-01-27 17:28:01'),
(953, 'Registered Ed Ramos as New Client', '2023-01-27 17:29:31'),
(954, 'Client, Ed Ramos, Log In', '2023-01-27 17:29:43'),
(955, 'Client, Ed Ramos, Log Out', '2023-01-27 17:32:09'),
(956, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-27 17:32:18'),
(957, 'Added New Venue, Siargao Wedding Venue', '2023-01-27 17:36:59'),
(958, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-27 17:38:08'),
(959, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-27 17:42:14'),
(960, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-27 17:49:47'),
(961, 'Client, Ed Ramos, Log In', '2023-01-27 17:49:55'),
(962, 'Client, Ed Ramos, Log Out', '2023-01-27 17:50:06'),
(963, 'Client, Ed Ramos, Log In', '2023-01-27 17:50:20'),
(964, 'Client, Ed Ramos, Log Out', '2023-01-27 17:51:09'),
(965, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-27 17:51:14'),
(966, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-27 17:51:25'),
(967, 'Client, Ed Ramos, Log In', '2023-01-27 17:51:32'),
(968, 'Client, Ed Ramos, Log Out', '2023-01-27 17:59:55'),
(969, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-27 18:00:01'),
(970, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-27 18:04:35'),
(971, 'Admin, Shand Ivan Sinohon, Log In', '2023-01-27 18:05:54'),
(972, 'Admin, Shand Ivan Sinohon, Log Out', '2023-01-27 18:36:07'),
(973, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-01 13:17:28'),
(974, 'Updated Venue Info for Chali Beach Resort', '2023-02-01 13:38:23'),
(975, 'Updated Venue Info for Elysee Cafe', '2023-02-01 13:39:10'),
(976, 'Updated Venue Info for Marco Hotel', '2023-02-01 13:40:28'),
(977, 'Updated Venue Info for Pinegrove Mountain Lodge', '2023-02-01 13:41:23'),
(978, 'Updated Venue Info for Dahilayan Gardens and Resort', '2023-02-01 13:42:28'),
(979, 'Updated Venue Info for Amaya View', '2023-02-01 13:43:06'),
(980, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-03 08:14:37'),
(981, 'Registered Angela Ramos as New Client', '2023-02-06 00:41:19'),
(982, 'Client, Angela Ramos, Log In', '2023-02-06 00:41:32'),
(983, 'Client, Angela Ramos, Log Out', '2023-02-06 00:42:01'),
(984, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-06 00:42:13'),
(985, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-06 00:47:49'),
(986, 'Client, Angela Ramos, Log In', '2023-02-06 00:47:58'),
(992, 'Client, Angela Ramos, Log Out', '2023-02-06 01:32:32'),
(993, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-06 01:32:38'),
(994, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-06 01:35:45'),
(995, 'Client, Angela Ramos, Log In', '2023-02-06 01:35:53'),
(997, 'New inbox message from Angela Ramos', '2023-02-06 01:41:49'),
(998, 'New inbox message from Angela Ramos', '2023-02-06 01:42:57'),
(999, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-06 21:36:40'),
(1000, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-06 21:42:56'),
(1001, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-06 21:43:58'),
(1002, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-06 21:44:02'),
(1003, 'Client, Angela Ramos, Log In', '2023-02-06 21:44:16'),
(1004, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-06 22:36:52'),
(1006, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-06 22:40:35'),
(1007, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-06 22:40:42'),
(1013, 'Admin, Shand Ivan Sinohon, updated Gon-Shan Wedding Booking', '2023-02-06 22:52:47'),
(1016, 'Admin, Shand Ivan Sinohon, updated Gon-Shan Wedding Booking Staff List', '2023-02-06 22:54:10'),
(1017, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-06 22:54:22'),
(1018, 'Client, Angela Ramos, Log In', '2023-02-06 22:54:30'),
(1019, 'Client, Angela Ramos, Added A New Booking', '2023-02-06 23:13:05'),
(1020, 'Client, Angela Ramos, Updated their booking, Mark-Angela', '2023-02-06 23:16:43'),
(1021, 'Client, Angela Ramos, Log Out', '2023-02-06 23:16:45'),
(1024, 'Client, Angela Ramos, Log In', '2023-02-06 23:17:41'),
(1025, 'Client, Angela Ramos, Updated Their Information', '2023-02-06 23:18:59'),
(1026, 'Client, Angela Ramos, Log Out', '2023-02-06 23:19:13'),
(1028, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-06 23:28:44'),
(1029, 'Client, Angela Ramos, Log In', '2023-02-06 23:28:50'),
(1030, 'Client, Angela Ramos, Added A New Booking', '2023-02-07 01:06:57'),
(1031, 'Client, Angela Ramos, Log Out', '2023-02-07 01:18:42'),
(1032, 'Client, James de Guzman, Log In', '2023-02-07 01:19:31'),
(1033, 'Client, James de Guzman, Log Out', '2023-02-07 01:26:57'),
(1034, 'Client, Angela Ramos, Log In', '2023-02-07 01:27:09'),
(1035, 'Client, Angela Ramos, Log Out', '2023-02-07 01:27:31'),
(1036, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-07 01:27:44'),
(1037, 'Added New Supplier, Niko Go As HMUA', '2023-02-07 01:30:11'),
(1038, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-07 01:30:16'),
(1039, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-07 01:30:32'),
(1040, 'Added New Supplier, Alain Adeva As HMUA', '2023-02-07 01:31:28'),
(1041, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-07 01:31:30'),
(1042, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-07 01:34:09'),
(1043, 'Added New Supplier, Sean dela Cruz As Emcee', '2023-02-07 01:35:53'),
(1044, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-07 01:36:16'),
(1045, 'Client, Angela Ramos, Log In', '2023-02-07 01:36:23'),
(1046, 'Client, Angela Ramos, Log In', '2023-02-07 09:29:06'),
(1047, 'New inbox message from Angela Ramos', '2023-02-07 09:30:14'),
(1048, 'New inbox message from Angela Ramos', '2023-02-07 09:30:19'),
(1049, 'Client, Angela Ramos, Log Out', '2023-02-07 09:30:25'),
(1050, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-08 21:49:11'),
(1051, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-08 21:54:10'),
(1052, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-08 22:11:58'),
(1053, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-08 22:12:02'),
(1054, 'Client, Angela Ramos, Log In', '2023-02-08 22:12:08'),
(1055, 'Client, Angela Ramos, Log Out', '2023-02-08 22:16:30'),
(1056, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-08 23:00:37'),
(1057, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-08 23:00:41'),
(1058, 'Client, Angela Ramos, Log In', '2023-02-08 23:00:48'),
(1059, 'Client, Angela Ramos, Log Out', '2023-02-08 23:03:14'),
(1060, 'Registered Edna Sinohon as New Client', '2023-02-08 23:06:53'),
(1061, 'Client, Edna Sinohon, Log In', '2023-02-08 23:07:05'),
(1062, 'Client, Edna Sinohon, Updated Their Information', '2023-02-08 23:07:47'),
(1063, 'Client,  , Log Out', '2023-02-08 23:08:44'),
(1064, 'Registered Edna Sinohon as New Client', '2023-02-08 23:09:57'),
(1065, 'Registered Edna Sinohon as New Client', '2023-02-08 23:11:26'),
(1066, 'Registered Edna Sinohon as New Client', '2023-02-08 23:14:17'),
(1067, 'Registered Edna Sinohon as New Client', '2023-02-08 23:16:41'),
(1068, 'Registered Edna Sinohon as New Client', '2023-02-08 23:17:34'),
(1069, 'Registered Edna Sinohon as New Client', '2023-02-08 23:19:20'),
(1070, 'Registered Edna Sinohon as New Client', '2023-02-08 23:22:05'),
(1071, 'Registered Edna Sinohon as New Client', '2023-02-08 23:23:14'),
(1072, 'Client,  , Added A New Booking', '2023-02-08 23:23:14'),
(1073, 'Client, Edna Sinohon, Log In', '2023-02-08 23:25:39'),
(1074, 'Client, Edna Sinohon, Log Out', '2023-02-08 23:35:28'),
(1075, 'Registered Edna Sinohon as New Client', '2023-02-08 23:48:06'),
(1076, 'Client, Edna Sinohon, Added A New Booking', '2023-02-08 23:48:06'),
(1077, 'Client, Edna Sinohon, Log In', '2023-02-08 23:48:19'),
(1078, 'Registered Edna Sinohon as New Client', '2023-02-08 23:56:23'),
(1079, 'Client, Edna Sinohon, Added A New Booking', '2023-02-08 23:56:23'),
(1080, 'Client, Angela Ramos, Log In', '2023-02-09 00:58:48'),
(1081, 'Client, Angela Ramos, Log Out', '2023-02-09 00:58:57'),
(1082, 'Registered Edna Sinohon as New Client', '2023-02-09 00:59:42'),
(1083, 'Client, Edna Sinohon, Added A New Booking', '2023-02-09 00:59:42'),
(1084, 'Client, Edna Sinohon, Log In', '2023-02-09 00:59:51'),
(1085, 'Client, Edna Sinohon, Log Out', '2023-02-09 01:00:38'),
(1086, 'Client, Edna Sinohon, Log In', '2023-02-09 01:00:45'),
(1087, 'Client, Edna Sinohon, Log Out', '2023-02-09 01:04:46'),
(1088, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-09 01:04:51'),
(1089, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-09 01:05:04'),
(1090, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-09 01:05:58'),
(1091, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-09 21:11:43'),
(1092, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-09 21:18:15'),
(1093, 'Client, Edna Sinohon, Log In', '2023-02-09 21:18:21'),
(1094, 'Client, Edna Sinohon, Log Out', '2023-02-09 21:18:44'),
(1095, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-09 21:18:51'),
(1096, 'Admin, Shand Ivan Sinohon, updated Edna Booking Staff List', '2023-02-09 21:32:54'),
(1097, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-09 21:37:55'),
(1098, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-09 21:41:01'),
(1099, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-09 21:41:40'),
(1100, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-09 21:43:10'),
(1101, 'Client, Edna Sinohon, Log In', '2023-02-09 21:43:16'),
(1102, 'Client, Edna Sinohon, Log Out', '2023-02-09 21:43:24'),
(1103, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-09 21:43:34'),
(1104, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-09 21:44:04'),
(1105, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-09 21:44:06'),
(1106, 'Client, Edna Sinohon, Log In', '2023-02-09 21:44:11'),
(1107, 'Client, Edna Sinohon, Updated their booking, Edna', '2023-02-09 22:57:38'),
(1108, 'Client, Edna Sinohon, Updated their booking, Edna', '2023-02-09 22:59:05'),
(1109, 'Client, Edna Sinohon, Updated their booking, Edna', '2023-02-09 23:42:56'),
(1110, 'Client, Edna Sinohon, Log Out', '2023-02-09 23:43:16'),
(1111, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-09 23:43:25'),
(1112, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-09 23:56:57'),
(1113, 'Client, Edna Sinohon, Log In', '2023-02-09 23:57:03'),
(1114, 'Client, Edna Sinohon, Log Out', '2023-02-09 23:57:58'),
(1115, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-09 23:58:06'),
(1116, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-10 00:13:58'),
(1117, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-10 00:14:10'),
(1118, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-10 00:19:31'),
(1119, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-10 00:42:12'),
(1120, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-10 00:43:02'),
(1121, 'Admin, Shand Ivan Sinohon, updated Edna Booking Staff List', '2023-02-10 00:52:38'),
(1122, 'Admin, Shand Ivan Sinohon, updated Edna Booking Staff List', '2023-02-10 00:52:52'),
(1123, 'Admin, Shand Ivan Sinohon, updated Edna Booking Staff List', '2023-02-10 00:52:58'),
(1124, 'Client, Edna Sinohon, Log In', '2023-02-11 14:30:11'),
(1125, 'Client, Edna Sinohon, Log Out', '2023-02-11 14:32:53'),
(1126, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 14:33:00'),
(1127, 'Admin, Shand Ivan Sinohon, updated Edna Booking', '2023-02-11 14:33:15'),
(1128, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 14:33:20'),
(1129, 'Client, Edna Sinohon, Log In', '2023-02-11 14:33:28'),
(1130, 'Client, Edna Sinohon, Log Out', '2023-02-11 14:33:51'),
(1131, 'Client, Edna Sinohon, Log In', '2023-02-11 14:35:23'),
(1132, 'Client, Edna Sinohon, Added A New Booking', '2023-02-11 14:37:15'),
(1133, 'New inbox message from Edna Sinohon', '2023-02-11 14:37:42'),
(1134, 'Client, Edna Sinohon, Log Out', '2023-02-11 14:37:52'),
(1135, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 14:37:59'),
(1136, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 15:04:11'),
(1137, 'Client, Edna Sinohon, Log In', '2023-02-11 15:04:16'),
(1138, 'Client, Edna Sinohon, Log Out', '2023-02-11 15:04:23'),
(1139, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 15:04:29'),
(1140, 'New inbox message from  ', '2023-02-11 15:46:47'),
(1141, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 15:47:14'),
(1142, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:08:05'),
(1143, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:09:01'),
(1144, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:13:52'),
(1145, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:15:19'),
(1146, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:16:16'),
(1147, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:16:32'),
(1148, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:21:29'),
(1149, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:22:13'),
(1150, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:24:47'),
(1151, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:27:35'),
(1152, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:28:18'),
(1153, 'Admin Shand Ivan Sinohon responded to a message from Client Edna Sinohon', '2023-02-11 16:30:13'),
(1154, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 16:30:45'),
(1155, 'Client, Angela Ramos, Log In', '2023-02-11 16:31:22'),
(1156, 'New inbox message from Angela Ramos', '2023-02-11 16:31:28'),
(1157, 'Client, Angela Ramos, Log Out', '2023-02-11 16:31:32'),
(1158, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 16:31:36'),
(1159, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 16:36:43'),
(1160, 'Client, Angela Ramos, Log In', '2023-02-11 16:36:49'),
(1161, 'Client, Angela Ramos, Log Out', '2023-02-11 16:36:56'),
(1162, 'Client, Angela Ramos, Log In', '2023-02-11 16:37:12'),
(1163, 'Client, Angela Ramos, Log Out', '2023-02-11 16:43:01'),
(1164, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 16:43:07'),
(1165, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 16:46:20'),
(1166, 'Client, Angela Ramos, Log In', '2023-02-11 16:46:32'),
(1167, 'Client, Angela Ramos, Added A New Booking', '2023-02-11 16:46:59'),
(1168, 'Client, Angela Ramos, Log Out', '2023-02-11 16:47:03'),
(1169, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 16:47:08'),
(1170, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 16:55:03'),
(1171, 'Client, Angela Ramos, Log In', '2023-02-11 16:55:09'),
(1172, 'Client, Angela Ramos, Added A New Booking', '2023-02-11 16:55:33'),
(1173, 'Client, Angela Ramos, Log Out', '2023-02-11 16:55:36'),
(1174, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 16:55:43'),
(1175, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 17:11:37'),
(1176, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 17:14:05'),
(1177, 'Client, Angela Ramos, Log In', '2023-02-11 17:16:39'),
(1178, 'New inbox message from Angela Ramos', '2023-02-11 17:16:46'),
(1179, 'Admin Angela Ramos responded to a message from Client Angela Ramos', '2023-02-11 17:18:31'),
(1180, 'New inbox message from Angela Ramos', '2023-02-11 17:22:41'),
(1181, 'Admin Angela Ramos responded to a message from Client Angela Ramos', '2023-02-11 17:22:46'),
(1182, 'Admin,  , Log Out', '2023-02-11 17:23:00'),
(1183, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 17:23:05'),
(1184, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 17:23:37'),
(1185, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 17:23:46'),
(1186, 'Client, Angela Ramos, Log In', '2023-02-11 17:23:51'),
(1187, 'New inbox message from Angela Ramos', '2023-02-11 17:23:58'),
(1188, 'Client, Angela Ramos, Log Out', '2023-02-11 17:24:00'),
(1189, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 17:24:34'),
(1190, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 17:24:43'),
(1191, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 17:25:12'),
(1192, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 17:25:36'),
(1193, 'Client, Angela Ramos, Log In', '2023-02-11 17:25:43'),
(1194, 'New inbox message from Angela Ramos', '2023-02-11 17:25:55'),
(1195, 'Client, Angela Ramos, Log Out', '2023-02-11 17:26:01'),
(1196, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 17:26:07'),
(1197, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 17:31:58'),
(1198, 'Client, Angela Ramos, Log In', '2023-02-11 17:32:06'),
(1199, 'New inbox message from Angela Ramos', '2023-02-11 17:32:18'),
(1200, 'Client, Angela Ramos, Log Out', '2023-02-11 17:32:23'),
(1201, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 17:32:31'),
(1202, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 17:35:42'),
(1203, 'Client, Edna Sinohon, Log In', '2023-02-11 17:35:47'),
(1204, 'New inbox message from Edna Sinohon', '2023-02-11 17:35:51'),
(1205, 'Client, Edna Sinohon, Log Out', '2023-02-11 17:35:52'),
(1206, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 17:35:56'),
(1207, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 18:02:53'),
(1208, 'Client, Edna Sinohon, Log In', '2023-02-11 18:03:03'),
(1209, 'New inbox message from Edna Sinohon', '2023-02-11 18:10:38'),
(1210, 'Client, Edna Sinohon, Log Out', '2023-02-11 18:10:50'),
(1211, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 18:10:56'),
(1212, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 19:49:22'),
(1213, 'Admin, Shand Ivan Sinohon, updated Sam Booking', '2023-02-11 20:16:11'),
(1214, 'Admin, Shand Ivan Sinohon, updated Sam Booking', '2023-02-11 20:16:16'),
(1215, 'Admin, Shand Ivan Sinohon, updated Sam Booking', '2023-02-11 20:16:20'),
(1216, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 20:50:24'),
(1217, 'Client, Angela Ramos, Log In', '2023-02-11 20:50:31'),
(1218, 'Client, Angela Ramos, Log Out', '2023-02-11 20:52:18'),
(1219, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 20:52:23'),
(1220, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 20:54:40'),
(1221, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 20:55:07'),
(1222, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 20:55:10'),
(1223, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 21:00:48'),
(1224, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 21:00:51'),
(1225, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 21:00:54'),
(1226, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 21:00:57'),
(1227, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 21:03:07'),
(1228, 'Admin Shand Ivan Sinohon responded to a message from Client Angela Ramos', '2023-02-11 21:03:10'),
(1229, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 21:08:27'),
(1230, 'Client, Angela Ramos, Log In', '2023-02-11 21:08:35'),
(1231, 'Client, Angela Ramos, Log Out', '2023-02-11 21:27:24'),
(1232, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 21:30:05'),
(1233, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 21:30:08'),
(1234, 'Client, Angela Ramos, Log In', '2023-02-11 21:30:15'),
(1235, 'Client, Angela Ramos, Log Out', '2023-02-11 21:35:06'),
(1236, 'Client, Angela Ramos, Log In', '2023-02-11 21:37:03'),
(1237, 'Client, Angela Ramos, Log Out', '2023-02-11 21:37:10'),
(1238, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 21:42:10'),
(1239, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 21:49:54'),
(1240, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 21:51:27'),
(1241, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-11 21:52:39'),
(1242, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-11 21:54:39'),
(1243, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-12 10:30:54'),
(1244, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking Staff List', '2023-02-12 10:41:24'),
(1245, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking Staff List', '2023-02-12 10:41:33'),
(1246, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:41:40'),
(1247, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:41:46'),
(1248, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:42:00'),
(1249, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:42:06'),
(1250, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-12 10:42:12'),
(1251, 'Client, Angela Ramos, Log In', '2023-02-12 10:42:19'),
(1252, 'Client, Angela Ramos, Log Out', '2023-02-12 10:42:24'),
(1253, 'Client, Edna Sinohon, Log In', '2023-02-12 10:42:29'),
(1254, 'Client, Edna Sinohon, Updated their booking, Edna-Paul Wedding', '2023-02-12 10:42:37'),
(1255, 'Client, Edna Sinohon, Log Out', '2023-02-12 10:42:41'),
(1256, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-12 10:42:47'),
(1257, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:46:28'),
(1258, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:46:34'),
(1259, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:46:36'),
(1260, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:46:40'),
(1261, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:46:45'),
(1262, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:56:12'),
(1263, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:56:16'),
(1264, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:57:04'),
(1265, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:59:14'),
(1266, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:59:19'),
(1267, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 10:59:39'),
(1268, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-12 11:00:02'),
(1269, 'Client, Edna Sinohon, Log In', '2023-02-12 11:00:12'),
(1270, 'Client, Edna Sinohon, Log Out', '2023-02-12 11:00:17'),
(1271, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-12 11:00:23'),
(1272, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 11:00:39'),
(1273, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 11:00:51'),
(1274, 'Admin, Shand Ivan Sinohon, updated Edna-Paul Wedding Booking', '2023-02-12 11:00:54'),
(1275, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-12 11:00:56'),
(1276, 'Client, Edna Sinohon, Log In', '2023-02-12 11:01:01'),
(1277, 'Client, Edna Sinohon, Log Out', '2023-02-12 11:01:24'),
(1278, 'Client, Angela Ramos, Log In', '2023-02-12 11:01:30'),
(1279, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:01:51'),
(1280, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:02:12'),
(1281, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:02:22'),
(1282, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:07:01'),
(1283, 'Client, Angela Ramos, Log Out', '2023-02-12 11:07:17'),
(1284, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-12 11:07:25'),
(1285, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:07:36'),
(1286, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking Staff List', '2023-02-12 11:07:42'),
(1287, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:09:50'),
(1288, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:12:19'),
(1289, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:12:20'),
(1290, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:12:21'),
(1291, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:12:21'),
(1292, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:12:21'),
(1293, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:12:21'),
(1294, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:12:21'),
(1295, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:16:48'),
(1296, 'Admin, Shand Ivan Sinohon, updated Ivan-Patricia Booking', '2023-02-12 11:17:03'),
(1297, 'Admin, Shand Ivan Sinohon, updated Ivan-Patricia Booking', '2023-02-12 11:18:28'),
(1298, 'Admin, Shand Ivan Sinohon, updated Ivan-Patricia Booking', '2023-02-12 11:18:33'),
(1299, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:18:42'),
(1300, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:19:03'),
(1301, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 11:19:06'),
(1302, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-12 11:20:53'),
(1303, 'Client, Angela Ramos, Log In', '2023-02-12 11:21:02'),
(1304, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:31:54'),
(1305, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:33:28'),
(1306, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:37:04'),
(1307, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:37:15'),
(1308, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:38:06'),
(1309, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:39:08'),
(1310, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:40:01'),
(1311, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:45:59'),
(1312, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:51:59'),
(1313, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:53:01'),
(1314, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:53:10'),
(1315, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 11:54:23'),
(1316, 'Client, Angela Ramos, Updated their booking, Angela-Marc', '2023-02-12 11:54:30'),
(1317, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 12:00:05'),
(1318, 'Client, Angela Ramos, Updated their booking, Edna-Paul Wedding', '2023-02-12 12:00:14'),
(1319, 'Client, Angela Ramos, Added A New Booking', '2023-02-12 12:02:12'),
(1320, 'Client, Angela Ramos, Log Out', '2023-02-12 12:02:21'),
(1321, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-12 12:02:26'),
(1322, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 12:02:42'),
(1323, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking', '2023-02-12 12:02:52'),
(1324, 'Admin, Shand Ivan Sinohon, updated Angela-Marc Booking Staff List', '2023-02-12 12:03:01'),
(1325, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-12 13:49:41'),
(1326, 'Client, Angela Ramos, Log In', '2023-02-12 15:49:37'),
(1327, 'Client, Angela Ramos, Log Out', '2023-02-12 15:49:43'),
(1328, 'Client, Angela Ramos, Log In', '2023-02-12 15:55:12'),
(1329, 'Client, Angela Ramos, Log Out', '2023-02-12 15:58:37'),
(1330, 'Client, Angela Ramos, Log In', '2023-02-12 16:00:56'),
(1331, 'Client, Angela Ramos, Log Out', '2023-02-12 16:03:01'),
(1332, 'Client, Edna Sinohon, Log In', '2023-02-12 16:03:05'),
(1333, 'Client, Edna Sinohon, Added A New Booking', '2023-02-12 16:03:34'),
(1334, 'Client, Edna Sinohon, Updated their booking, Edna-Paul Wedding', '2023-02-12 16:05:13'),
(1335, 'Client, Edna Sinohon, Log Out', '2023-02-12 16:05:15'),
(1336, 'Client, Angela Ramos, Log In', '2023-02-12 16:07:49'),
(1337, 'Client, Angela Ramos, Log Out', '2023-02-12 16:08:32'),
(1338, 'Admin, Shand Ivan Sinohon, Log In', '2023-02-12 16:08:40'),
(1339, 'Admin, Shand Ivan Sinohon, Log Out', '2023-02-12 17:02:14'),
(1340, 'Registered Shand Ivan Sinohon as New Client', '2023-02-12 17:03:19'),
(1341, 'Client, Shand Ivan Sinohon, Added A New Booking', '2023-02-12 17:03:19'),
(1342, 'Client, Shand Ivan Sinohon, Log In', '2023-02-12 17:03:28'),
(1343, 'New inbox message from Shand Ivan Sinohon', '2023-02-12 17:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `venue_name` varchar(100) NOT NULL,
  `venue_add` varchar(100) NOT NULL,
  `venue_cap` int(4) NOT NULL,
  `venue_desc` varchar(255) NOT NULL,
  `venue_img` varchar(255) DEFAULT NULL,
  `venue_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `venue_name`, `venue_add`, `venue_cap`, `venue_desc`, `venue_img`, `venue_status`) VALUES
(1, 'Cove Garden Resort Banquets and Events', 'Zone 3 Old Road, Cagayan de Oro, 9000 Misamis Oriental', 300, 'Cove Garden Resort offers a unique venue for special occasions, featuring a lush tropical garden by the sea with a spectacular panoramic view of Macajalar Bay.', 'Nat-and-Willy020.jpg', 1),
(3, 'Casa de Canitoan', 'Macapagal Dr, Cagayan de Oro, 9000 Misamis Oriental', 100, 'Nestled in the middle of Canitoan, Casa de Canitoan is located on Macapagal road, with direct access to a beautiful and luscious forestry area.', 'casa de canitoan.jpg', 1),
(4, 'High Ridge', 'Bontula Upper Macasandig 9000 Cagayan de Oro, Philippines', 120, 'High Ridge is the newest destination located in hilltop Aluba, Upper Macasandig, Cagayan de Oro City. The place can give you peace of mind due to its quite and calm environment. This is a perfect spot to be with loved ones or maybe for a romantic date.', 'high-ridge.jpg', 0),
(20, 'Riverview Event Center', 'Purok 4 S Diversion Rd, Cagayan de Oro, 9000 Misamis Oriental', 0, '', 'riverview.jpg', 0),
(85, 'Siargao', '', 0, '', NULL, 26),
(86, 'Siargao', '', 0, '', NULL, 27),
(87, 'Siargao', '', 0, '', NULL, 27),
(88, 'Chali Beach Resort', 'Zone 3, Old Road, Cugman, Cagayan de Oro City, Philippines', 120, 'This tropical resort offers an array of room accommodations and amenities for small family functions or big corporate events and conferences.', '287762_14033116270018916168.png', 1),
(89, 'Elysee Cafe', 'Malasag, Cugman', 100, 'If you want a momentary escape from the stress of city life, you should try visiting the new Elyseé Cafe in Brgy. Cugman, Cagayan de Oro City!', '271095776_446558957166600_6995526614360964466_n.jpg', 1),
(90, 'Marco Hotel', 'Cugman Highway', 150, 'Get your trip off to a great start with a stay at this property, which offers car park free of charge. Conveniently situated in the East Cagayan De Oro part of Cagayan De Oro, this property puts you close to attractions and interesting dining options.', 'Hot Pool, Marco Hotel, Cagayan de Oro, Philippinee.jfif', 1),
(91, 'Pinegrove Mountain Lodge', 'Dahilayan, Bukidnon, Philippines', 95, 'Imagine waking up to the sounds of birds chirping, and feeling the cool Dahilayan breeze. Relax, and forget your worries at Pinegrove Mountain Lodge.', 'Pinegrove-Mountain-Lodge-at-Dahilayan-Adventure-Park-Copyright-to-Project-LUPAD-2.webp', 1),
(92, 'Dahilayan Gardens and Resort', 'Sitlo Balilid, Dahilayan, Manolo Fortich, Bukidnon, Philippines', 180, 'Nestled at the base of beautiful Mount Kitanglad is one of Bukidnon’s finest resorts. Dahilayan Gardens and Resort encompasses all that you could ask for when searching for a place to play, relax and unwind amidst some of the most pristine landscape.', 'dscf6290.jpg', 1),
(93, 'Amaya View', 'Indahag Hills 8707 Cagayan de Oro, Philippines', 130, 'Conveniently situated in the Macasandig part of Cagayan De Oro, this property puts you close to attractions and interesting dining options. Don\'t leave before paying a visit to the famous Centrio Mall. ', '51784684051_c33acece29_c.jpg', 1),
(94, 'Cathedral', '', 0, '', NULL, 30),
(96, 'Cathedral', '', 0, '', NULL, 33),
(98, 'Plaza', '', 0, '', NULL, 33),
(99, 'Cathedral', '', 0, '', NULL, 0),
(101, 'St. Augustine Metropolitan Cathedral', 'Cagayan de Oro City', 150, 'Indoor Catholic Wedding', NULL, 34),
(102, 'St. Augustine Metropolitan Cathedral', 'Cagayan de Oro City', 145, 'Indoor Catholic Wedding', NULL, 17),
(103, 'Cathedral', 'Cagayan de Oro City', 66, 'Indoor Catholic Wedding', NULL, 40),
(105, 'St. Augustine Metropolitan Cathedral', 'Cagayan de Oro City', 120, 'Indoor Catholic Wedding', NULL, 42);

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
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`inbox_id`);

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
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`text_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pkg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `ulog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1344;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
