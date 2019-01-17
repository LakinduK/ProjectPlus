-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 08:36 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_email`, `admin_password`) VALUES
(1, 'aaa@aa', '123');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_members` text NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_title`, `post_content`, `post_members`, `upload_image`, `post_date`) VALUES
(1, 1, '', 'helllo world', '', 'IMG_20181225_082455.jpg.50', '2019-01-14 07:04:42'),
(2, 1, '', 'asdhasbd', '', 'alphago.jpg.13', '2019-01-14 07:37:11'),
(3, 1, '', 'lakidu', '', 'Demis Hassabis.jpg.87', '2019-01-14 07:37:37'),
(4, 2, 'samm', 'hirusha \r\nlakidu\r\nakila\r\nhasanka\r\nsamidi', 'this is ai ', 'Demis Hassabis.jpg.8', '2019-01-14 08:09:56'),
(5, 2, 'asdasasdhsa', 'KSJDSH\r\nASDFASASFD\r\nASFASDF\r\nASFSDF\r\nASFAS', 'fdsycvghbfklmsdfugvsadhbklmafjbhisdjnlakmckajbghsdjckmNJVBHFVHJDKCMSKJB HVJDCSKXLA,', 'John McCarthy.jpg.32', '2019-01-14 08:11:23'),
(6, 2, 'SAMM', 'We used the dialog flow API software that developed by google assistant as the main software to our voice assistant robot. The program was only a Beta version at that time so we had to go through lot of different reviews and blogs to find out a way to get the output as voice. Our plan was to focus the robot on Artificial intelligence and NSBM.  We build our own data structure according to what we focused on our project .The robot was made out of regifoam and used arduino project board to power up the voice activated lights. We designed it to get attention of the audience and we wanted to be more simple and elegant.', 'L.H.R.Fernando\r\nO.S.S.Silva\r\nL.G.L.Y.Kariyawasam\r\nT.A.D.A.E.Siriwardana\r\nR.M.H.U.M.Ranasinghe\r\nT.H.D.Malaka\r\nD.O.S.Peiris\r\nK.H.K.Madhusanka\r\nB.I.E.Madubhashitha\r\nK.G.R.Thaksara', '37731906_430983014070479_6810861616469377024_o.jpg.17', '2019-01-14 08:19:30'),
(7, 2, 'SAM', 'We used the dialog flow API software that developed by google assistant as the main software to our voice assistant robot. The program was only a Beta version at that time so we had to go through lot of different reviews and blogs to find out a way to get the output as voice. Our plan was to focus the robot on Artificial intelligence and NSBM.  We build our own data structure according to what we focused on our project .The robot was made out of regifoam and used arduino project board to power up the voice activated lights. We designed it to get attention of the audience and we wanted to be more simple and elegant.asdsaf', 'asda\r\nasfsd\r\nxcvxc\r\nfdg\r\n', '37736482_430986827403431_4139083609770295296_o.jpg.47', '2019-01-14 08:21:39'),
(8, 2, 'SAM', 'We used the dialog flow API software that developed by google assistant as the main software to our voice assistant robot. The program was only a Beta version at that time so we had to go through lot of different reviews and blogs to find out a way to get the output as voice. Our plan was to focus the robot on Artificial intelligence and NSBM.  We build our own data structure according to what we focused on our project .The robot was made out of regifoam and used arduino project board to power up the voice activated lights. We designed it to get attention of the audience and we wanted to be more simple and elegant.', 'asf\r\nsdf\r\nxcv\r\nfdg\r\ntyr\r\n', '37731906_430983014070479_6810861616469377024_o.jpg.20', '2019-01-14 08:22:29'),
(9, 2, 'sada', 'We used the dialog flow API software that developed by google assistant as the main software to our voice assistant robot. The program was only a Beta version at that time so we had to go through lot of different reviews and blogs to find out a way to get the output as voice. Our plan was to focus the robot on Artificial intelligence and NSBM.  We build our own data structure according to what we focused on our project .The robot was made out of regifoam and used arduino project board to power up the voice activated lights. We designed it to get attention of the audience and we wanted to be more simple and elegant.asdas', 'sada\r\nasda\r\ndfs\r\n', '37743835_430991277402986_6106193178392526848_o.jpg.88', '2019-01-14 08:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text,
  `l_name` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `describe_user` text,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_gender` text,
  `user_birthday` text,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posts` text,
  `recovery_account` varchar(255) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `degree` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `user_pass`, `user_email`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `posts`, `recovery_account`, `batch`, `degree`) VALUES
(1, 'hiru', 'randunu', 'Hirusha Randunu fernano', '', 'qweasdzxc', 'hiru@123', '', '', 'aibo.jpg.28', '37721590_430982190737228_7311955979174674432_o.jpg.77', '2019-01-14 07:03:04', 'yes', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
