-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 08:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlxl_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `concert`
--

CREATE TABLE `concert` (
  `id` int(5) NOT NULL,
  `concert_name` varchar(100) NOT NULL,
  `location_id` int(5) NOT NULL,
  `show_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reserve_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concert`
--

INSERT INTO `concert` (`id`, `concert_name`, `location_id`, `show_date`, `reserve_date`, `pic`) VALUES
(1, '2019 IU Tour Concert <LOVE, POEM> In Bangkok ', 1, '2020-01-07 04:00:00', '2019-12-05 21:00:00', 'https://m.thaiticketmajor.com/img_poster/prefix_1/1956/4956/2019-iu-tour-concert-love-poem-in-bangkok-5db6aaaee72b9-l.jpg'),
(2, 'คอนเสิร์ตอำพลXอัญชลี', 2, '2020-01-01 04:00:00', '2019-11-30 21:00:00', 'https://www.thaiticketmajor.com/amphon-anchalee-2019/assets/img/poster-12-11-300.jpg\r\n'),
(3, 'As I Lay Dying', 3, '2020-01-02 04:00:00', '2019-12-01 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1955/4955/as-i-lay-dying-2020-5db68c0c98dfc-l.jpg\r\n'),
(4, 'D2B INFINITY CONCERT 2019', 4, '2020-01-03 04:00:00', '2019-12-01 21:00:00', 'http://www.thaiticketmajor.com/variety/img_content/imgeditor/d2b.jpg'),
(5, 'Fullmoon The Party 1st Fan Meeting in Thailand', 5, '2020-01-04 04:00:00', '2019-12-02 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1949/4949/fullmoon-the-party-1st-fan-meeting-in-thailand-2019-5dad54cc336b6-l.jpg\r\n'),
(6, 'ลูกกรุง IN CONCERT', 6, '2020-01-05 04:00:00', '2019-12-04 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1927/4927/luk-krung-in-concert-2019-5dba62f8d8067-l.jpg\r\n'),
(7, 'DAY6 WORLD TOUR ‘GRAVITY’ in BANGKOK', 7, '2020-01-06 04:00:00', '2019-12-04 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1943/4943/day6-world-tour-gravity-in-bangkok-2019-5da6d0f0caee7-l.jpg'),
(8, 'PAUL GILBERT LIVE IN BANGKOK 2019', 8, '2020-01-07 04:00:00', '2019-12-11 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1928/4928/paul-gilbert-live-in-bangkok-2019-5d92df56ad8af-l.jpg'),
(9, 'FWD x LIDO CONNECT Present DARE TO BE QUEEN CONCERT', 9, '2020-01-10 04:00:00', '2019-12-09 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1959/4959/fwd-lido-connect-dare-to-be-queen-concert-5db944eede42a-l.jpg'),
(10, 'SEVENTEEN WORLD TOUR IN BANGKOK', 10, '2020-01-11 04:00:00', '2019-12-10 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1930/4930/seventeen-world-tour-ode-to-you-in-bangkok-2019-5d9418f6d45d1-l.jpg'),
(11, 'YEO JIN GOO Fan Meeting [MOON LIGHT]In Bangkok', 11, '2020-01-11 04:00:00', '2019-12-10 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1963/4963/2019-yeojingoo-fan-meeting-moon-light-in-bangkok-5dc23bd09b0d9-l.jpg'),
(12, 'TRINITY PREMIERE SHOWCASE STAGE 1 - I O U : I’M IN LOVE WITH YOU 2019', 12, '2020-01-09 04:00:00', '2019-12-08 21:00:00', 'https://www.thaiticketmajor.com/img_poster/prefix_1/1972/4972/trinity-premiere-showcase-stage-1-iou-i-m-in-love-with-you-5dc56df161c8a-l.jpg'),
(60, 'K-JOY MUSIC FESTIVAL 2020', 1, '2020-01-12 13:00:00', '2019-12-14 05:00:00', 'https://uppic.cc/d/5AYE');

-- --------------------------------------------------------

--
-- Table structure for table `concert_info`
--

CREATE TABLE `concert_info` (
  `id` int(5) NOT NULL,
  `concert_id` int(5) NOT NULL,
  `zone_id` int(5) NOT NULL,
  `seat_avaliable` int(5) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concert_info`
--

INSERT INTO `concert_info` (`id`, `concert_id`, `zone_id`, `seat_avaliable`, `price`) VALUES
(1, 1, 1, 0, 5500),
(2, 1, 2, 28, 5000),
(3, 1, 3, 85, 5500),
(4, 1, 4, 110, 4000),
(5, 1, 5, 112, 4000),
(6, 1, 6, 97, 4000),
(7, 1, 7, 130, 3000),
(8, 1, 8, 86, 3000),
(9, 1, 9, 89, 3000),
(10, 2, 10, 100, 5000),
(11, 2, 11, 118, 5000),
(12, 2, 12, 120, 5000),
(13, 2, 13, 97, 4000),
(14, 2, 14, 128, 4000),
(15, 2, 15, 86, 4000),
(16, 2, 16, 89, 3000),
(17, 2, 17, 100, 3000),
(18, 2, 18, 120, 3000),
(19, 2, 19, 120, 2000),
(20, 2, 20, 100, 2000),
(21, 2, 21, 127, 1000),
(22, 2, 22, 86, 1000),
(23, 3, 23, 100, 6000),
(24, 3, 24, 120, 6000),
(25, 3, 25, 117, 6000),
(26, 3, 26, 99, 6000),
(27, 3, 27, 130, 5000),
(28, 3, 28, 86, 5000),
(29, 3, 29, 89, 4500),
(30, 3, 30, 100, 4500),
(31, 3, 31, 120, 3500),
(32, 3, 32, 120, 3500),
(33, 3, 33, 100, 2000),
(34, 3, 34, 130, 2000),
(35, 4, 35, 100, 2000),
(36, 4, 36, 120, 2000),
(37, 4, 37, 120, 1500),
(38, 4, 38, 100, 1500),
(39, 4, 39, 130, 500),
(40, 4, 40, 86, 500),
(41, 5, 41, 89, 5000),
(42, 5, 42, 100, 5000),
(43, 5, 43, 120, 5000),
(44, 5, 44, 120, 6500),
(45, 5, 45, 100, 3500),
(46, 5, 46, 130, 3500),
(47, 5, 47, 86, 3500),
(48, 5, 48, 100, 2500),
(49, 5, 49, 120, 2500),
(50, 5, 50, 120, 2500),
(51, 5, 51, 100, 1500),
(52, 5, 52, 130, 1500),
(53, 5, 53, 86, 1500),
(54, 6, 54, 89, 4500),
(55, 6, 55, 100, 4500),
(56, 6, 56, 120, 3500),
(57, 6, 57, 120, 2500),
(58, 7, 58, 100, 3500),
(59, 7, 59, 130, 3500),
(60, 7, 60, 86, 3500),
(61, 7, 61, 100, 3500),
(62, 7, 62, 120, 2500),
(63, 7, 63, 120, 2500),
(64, 7, 64, 100, 2500),
(65, 7, 65, 130, 2500),
(66, 7, 66, 86, 2500),
(67, 7, 67, 89, 2500),
(68, 7, 68, 100, 1000),
(69, 8, 69, 120, 4500),
(70, 8, 70, 120, 4500),
(71, 8, 71, 100, 3500),
(72, 8, 72, 130, 3500),
(73, 8, 73, 86, 2500),
(74, 8, 74, 100, 2500),
(75, 8, 75, 120, 1500),
(76, 8, 76, 120, 1500),
(77, 9, 77, 100, 3000),
(78, 9, 78, 130, 2500),
(79, 9, 79, 86, 1500),
(80, 9, 80, 89, 2500),
(81, 9, 81, 100, 2500),
(82, 9, 82, 120, 2000),
(83, 9, 83, 120, 1500),
(84, 9, 84, 100, 1500),
(85, 9, 85, 130, 1500),
(86, 9, 86, 86, 2000),
(87, 9, 87, 100, 2500),
(88, 9, 88, 120, 2500),
(89, 10, 89, 119, 4500),
(90, 10, 90, 100, 3500),
(91, 10, 91, 130, 3500),
(92, 10, 92, 84, 2500),
(93, 10, 93, 85, 2500),
(94, 10, 94, 97, 1500),
(95, 10, 95, 119, 1500),
(96, 11, 96, 120, 4800),
(97, 11, 97, 100, 4800),
(98, 11, 98, 130, 4800),
(99, 11, 99, 86, 3800),
(100, 11, 100, 120, 3800),
(101, 11, 101, 100, 3800),
(102, 11, 102, 130, 2800),
(103, 11, 103, 86, 2800),
(104, 12, 104, 120, 4900),
(105, 12, 105, 99, 4900),
(106, 12, 106, 130, 2900),
(107, 12, 107, 86, 2900),
(108, 12, 108, 120, 1900),
(109, 12, 109, 100, 1900),
(129, 60, 1, 200, 6000),
(130, 60, 2, 200, 6000),
(131, 60, 3, 197, 6000),
(132, 60, 4, 300, 5500),
(133, 60, 5, 297, 5500),
(134, 60, 6, 300, 5500),
(135, 60, 7, 199, 4000),
(136, 60, 8, 100, 4000),
(137, 60, 9, 200, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `zone_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`id`, `location_id`, `zone_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 2, 10),
(11, 2, 11),
(12, 2, 12),
(13, 2, 13),
(14, 2, 14),
(15, 2, 15),
(16, 2, 16),
(17, 2, 17),
(18, 2, 18),
(19, 2, 19),
(20, 2, 20),
(21, 2, 21),
(22, 2, 22),
(23, 3, 23),
(24, 3, 24),
(25, 3, 25),
(26, 3, 26),
(27, 3, 27),
(28, 3, 28),
(29, 3, 29),
(30, 3, 30),
(31, 3, 31),
(32, 3, 32),
(33, 3, 33),
(34, 3, 34),
(35, 4, 35),
(36, 4, 36),
(37, 4, 37),
(38, 4, 38),
(39, 4, 39),
(40, 4, 40),
(41, 5, 41),
(42, 5, 42),
(43, 5, 43),
(44, 5, 44),
(45, 5, 45),
(46, 5, 46),
(47, 5, 47),
(48, 5, 48),
(49, 5, 49),
(50, 5, 50),
(51, 5, 51),
(52, 5, 52),
(53, 5, 53),
(54, 6, 54),
(55, 6, 55),
(56, 6, 56),
(57, 6, 57),
(58, 7, 58),
(59, 7, 59),
(60, 7, 60),
(61, 7, 61),
(62, 7, 62),
(63, 7, 63),
(64, 7, 64),
(65, 7, 65),
(66, 7, 66),
(67, 7, 67),
(68, 7, 68),
(69, 8, 69),
(70, 8, 70),
(71, 8, 71),
(72, 8, 72),
(73, 8, 73),
(74, 8, 74),
(75, 8, 75),
(76, 8, 76),
(77, 9, 77),
(78, 9, 78),
(79, 9, 79),
(80, 9, 80),
(81, 9, 81),
(82, 9, 82),
(83, 9, 83),
(84, 9, 84),
(85, 9, 85),
(86, 9, 86),
(87, 9, 87),
(88, 9, 88),
(89, 10, 89),
(90, 10, 90),
(91, 10, 91),
(92, 10, 92),
(93, 10, 93),
(94, 10, 94),
(95, 10, 95),
(96, 11, 96),
(97, 11, 97),
(98, 11, 98),
(99, 11, 99),
(100, 11, 100),
(101, 11, 101),
(102, 11, 102),
(103, 11, 103),
(104, 12, 104),
(105, 12, 105),
(106, 12, 106),
(107, 12, 107),
(108, 12, 108),
(109, 12, 109);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(5) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `location_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `location_image`) VALUES
(1, ' Paragon Hall Floor.5', 'https://uppic.cc/d/5AYP'),
(2, 'Bitec Bangna (Hall 98)', 'https://img.pingbook.com/archive/20140225139331330719y1.jpg'),
(3, ' Live Arena RCA', 'https://m.thaiticketmajor.com/img_seat/prefix_1/1032/4032/wanna-one-1st-fan-meeting-in-bangkok-2017-5b64295e4c6b3-l.gif'),
(4, 'Impact Arena, Muang Thong Thani', 'http://cms.thaiticketmajor.net/upload_online/909/seating_plan909.gif'),
(5, 'SHOW DC, RAMA9 - Ultra Arena 6th Floor', 'https://www.thaiticketmajor.com/img_seat/prefix_1/2724/2724/2724-5daec8c0ac89b-s.gif'),
(6, 'Muangthai Rachadalai Theatre', 'https://uppic.cc/d/5TRq'),
(7, 'Rajamangala National Stadium ', 'https://uppic.cc/d/5TRc'),
(8, 'Siam park city', 'https://uppic.cc/d/5Tm9'),
(9, 'Lido 2, Lido Connect Siam Square‬', 'https://uppic.cc/d/5Tmv'),
(10, 'Thunder Dome‬', 'https://uppic.cc/d/5AY2'),
(11, 'GMM Live House @ Central World Fl.8', 'https://uppic.cc/d/5AYo'),
(12, 'Union Hall 2, Union Mall', 'https://uppic.cc/d/5Tms');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `concert_id` int(5) NOT NULL,
  `users_id` int(5) NOT NULL,
  `zone_id` int(5) NOT NULL,
  `orders_qty` int(5) NOT NULL,
  `total_price` int(5) NOT NULL,
  `status_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `concert_id`, `users_id`, `zone_id`, `orders_qty`, `total_price`, `status_id`) VALUES
(1, 1, 3, 1, 2, 11000, 2),
(2, 1, 3, 5, 2, 8000, 2),
(3, 1, 3, 6, 2, 8000, 3),
(4, 1, 3, 3, 2, 11000, 2),
(5, 1, 3, 4, 2, 8000, 2),
(6, 1, 3, 2, 2, 10000, 3),
(7, 1, 3, 5, 3, 12000, 2),
(8, 1, 3, 3, 3, 16500, 2),
(9, 1, 3, 1, 1, 5500, 2),
(10, 1, 3, 1, 1, 5500, 2),
(11, 10, 3, 93, 2, 5000, 3),
(12, 10, 3, 92, 2, 5000, 2),
(13, 3, 1, 25, 3, 18000, 3),
(14, 1, 3, 6, 3, 12000, 2),
(15, 60, 3, 5, 3, 16500, 2),
(18, 1, 3, 4, 3, 12000, 2),
(19, 12, 3, 105, 1, 4900, 2),
(20, 2, 3, 13, 3, 12000, 2),
(21, 1, 3, 5, 2, 8000, 3),
(23, 3, 3, 26, 1, 6000, 2),
(24, 3, 3, 14, 2, 0, 2),
(25, 1, 3, 3, 3, 16500, 3),
(26, 1, 3, 2, 2, 10000, 1),
(27, 1, 3, 4, 2, 8000, 2),
(28, 1, 3, 3, 3, 16500, 3),
(29, 1, 3, 5, 3, 12000, 2),
(30, 60, 3, 3, 3, 18000, 1),
(31, 10, 3, 89, 1, 4500, 1),
(32, 10, 3, 95, 1, 1500, 1),
(33, 10, 3, 94, 3, 4500, 1),
(37, 60, 10, 7, 1, 4000, 1),
(38, 1, 3, 2, 4, 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(5) NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `description`) VALUES
(1, 'Reserved'),
(2, 'Order Completed'),
(3, 'Order Not Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `userlevel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `tel`, `userlevel`) VALUES
(1, 'janjan', '81dc9bdb52d04dc20036dbd8313ed055', 'jannsmy@gmail.com', 'jan', 'smy', '0863340039', 'user'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'admin', '0863340039', 'admin'),
(3, 'chacha', '4ba29b9f9e5732ed33761840f4ba6c53', 'chachajunho@gmail.com', 'junho', 'cha', '1111111111', 'user'),
(9, 'jane', '81dc9bdb52d04dc20036dbd8313ed055', 'chachajunho@gmail.com', '', 'smy', '1131313213', 'user'),
(10, 'janene', '81dc9bdb52d04dc20036dbd8313ed055', 'janejann@gmail.com', '', 'piyathida', '0863748174', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(5) NOT NULL,
  `zone_name` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `zone_name`, `qty`) VALUES
(1, 'A1', 200),
(2, 'A2', 200),
(3, 'A3', 200),
(4, 'B1', 300),
(5, 'B2', 300),
(6, 'B3', 300),
(7, 'C1', 200),
(8, 'C2', 100),
(9, 'C3', 200),
(10, 'A1', 200),
(11, 'A2', 200),
(12, 'A3', 200),
(13, 'B1', 200),
(14, 'B2', 200),
(15, 'B3', 200),
(16, 'C1', 200),
(17, 'C2', 200),
(18, 'C3', 200),
(19, 'D1', 200),
(20, 'D2', 200),
(21, 'E1', 200),
(22, 'E2', 200),
(23, 'A1', 200),
(24, 'A2', 200),
(25, 'A3', 200),
(26, 'A4', 200),
(27, 'B1', 200),
(28, 'B2', 200),
(29, 'C1', 200),
(30, 'C2', 200),
(31, 'D1', 200),
(32, 'D2', 200),
(33, 'E1', 200),
(34, 'E2', 200),
(35, 'A1', 200),
(36, 'A2', 200),
(37, 'B1', 200),
(38, 'B2', 200),
(39, 'C1', 200),
(40, 'C2', 200),
(41, 'A1', 200),
(42, 'A2', 200),
(43, 'A3', 200),
(44, 'VIP', 200),
(45, 'B1', 200),
(46, 'B2', 200),
(47, 'B3', 200),
(48, 'C1', 200),
(49, 'C2', 200),
(50, 'C3', 200),
(51, 'D1', 200),
(52, 'D2', 200),
(53, 'D3', 200),
(54, 'A1', 200),
(55, 'A2', 200),
(56, 'B', 200),
(57, 'C', 200),
(58, 'C1', 200),
(59, 'C2', 200),
(60, 'C3', 200),
(61, 'D1', 200),
(62, 'D2', 200),
(63, 'D3', 200),
(64, 'D4', 200),
(65, 'D5', 200),
(66, 'D6', 200),
(67, 'AL', 200),
(68, 'AR', 200),
(69, 'AL', 200),
(70, 'AR', 200),
(71, 'B1', 200),
(72, 'B2', 200),
(73, 'C1', 200),
(74, 'C2', 200),
(75, 'D1', 200),
(76, 'D2', 200),
(77, 'ST1', 200),
(78, 'ST2', 200),
(79, 'ST3', 200),
(80, 'A', 200),
(81, 'B', 200),
(82, 'C', 200),
(83, 'D', 200),
(84, 'E', 200),
(85, 'F', 200),
(86, 'G', 200),
(87, 'H', 200),
(88, 'I', 200),
(89, 'STA', 200),
(90, 'B1', 200),
(91, 'B2', 200),
(92, 'C1', 200),
(93, 'C2', 200),
(94, 'D1', 200),
(95, 'D2', 200),
(96, 'A1', 200),
(97, 'A2', 200),
(98, 'A3', 200),
(99, 'B1', 200),
(100, 'B2', 200),
(101, 'B3', 200),
(102, 'C1', 200),
(103, 'C3', 200),
(104, 'AL', 200),
(105, 'AR', 200),
(106, 'BL', 200),
(107, 'BR', 200),
(108, 'CL', 200),
(109, 'CR', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `concert_info`
--
ALTER TABLE `concert_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concert_id` (`concert_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `concert_id` (`concert_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `zone_id` (`zone_id`),
  ADD KEY `status` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concert`
--
ALTER TABLE `concert`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `concert_info`
--
ALTER TABLE `concert_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `concert_info`
--
ALTER TABLE `concert_info`
  ADD CONSTRAINT `concert_info_ibfk_1` FOREIGN KEY (`concert_id`) REFERENCES `concert` (`id`),
  ADD CONSTRAINT `concert_info_ibfk_2` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`);

--
-- Constraints for table `layout`
--
ALTER TABLE `layout`
  ADD CONSTRAINT `layout_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`),
  ADD CONSTRAINT `layout_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`concert_id`) REFERENCES `concert` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
