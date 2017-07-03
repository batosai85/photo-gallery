-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 05:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment_photo_id` int(11) NOT NULL,
  `comment_user` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_photo_id`, `comment_user`, `comment_content`, `comment_date`) VALUES
(5, 19, 'as', 'asd', '2017-05-02 15:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo_title` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `photo_description` text NOT NULL,
  `photo_filename` varchar(255) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `photo_size` int(11) NOT NULL,
  `photo_date` varchar(255) NOT NULL,
  `photo_caption` varchar(255) NOT NULL,
  `photo_alternate_text` varchar(255) NOT NULL,
  `photo_likes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_title`, `user`, `photo_description`, `photo_filename`, `photo_type`, `photo_size`, `photo_date`, `photo_caption`, `photo_alternate_text`, `photo_likes`) VALUES
(19, 'asd', 'as', '<p>asdas</p>', 'the_cringe_is_so_much_in_the_air_you_could_almost_touch_it_640_42.jpg', 'image/jpeg', 48583, '2017-05-02 15:08:27', 'asd', 'asd', 1),
(20, 'asd', 'as', '<p>adsas</p>', 'ham.png', 'image/png', 27364, '2017-05-02 15:43:06', 'asd', 'asd', 0),
(21, 'aa', 'as', '<p>asas</p>', '0-02-01-a1f5284568ad56248abb46ffa73615d9db82e0bfa5060f7b678d884adf63e323_full.jpg', 'image/jpeg', 139497, '2017-05-02 15:43:20', 'aa', 'asd', 0),
(24, 'asd', 'as', '<p>ads</p>', 'glednje.txt', 'text/plain', 104, '2017-05-02 15:46:14', 'asd', 'asd', 0),
(25, 'asd', 'as', '<p>dasdas</p>', 'RECEPT.jpg', 'image/jpeg', 120837, '2017-05-02 15:46:32', 'asd', 'asdas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `photo`, `username`, `password`, `first_name`, `last_name`) VALUES
(11, 'the_cringe_is_so_much_in_the_air_you_could_almost_touch_it_640_42.jpg', 's', '$2y$12$5bZYj45jJiasKrEOY6CzTeLb4f9Afpp7Ae379BGipNMjiaD97UJRK', 's', 's');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
