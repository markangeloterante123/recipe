-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 11:12 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category`) VALUES
(1, 'Appetizer '),
(2, 'Soup '),
(3, 'Main Dish '),
(4, 'Dessert ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe`
--

CREATE TABLE `tbl_recipe` (
  `id` int(11) NOT NULL,
  `category` varchar(45) NOT NULL,
  `recipeName` varchar(125) NOT NULL,
  `recipeImg` varchar(125) NOT NULL,
  `recipeDirection` text NOT NULL,
  `recipeTime` varchar(125) NOT NULL,
  `recipeIngridients` varchar(125) NOT NULL,
  `recipeDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recipe`
--

INSERT INTO `tbl_recipe` (`id`, `category`, `recipeName`, `recipeImg`, `recipeDirection`, `recipeTime`, `recipeIngridients`, `recipeDate`) VALUES
(12, 'Appitizer', 'asf', 'ahmadreza-rezaie-eU2s_fonJkg-unsplash.jpg', 'Tahong ni karla 2', 'asf', 'asf', '2021-10-23'),
(13, 'Soup', 'saf', 'male-watch-g437373879_1920.jpg', 'asf', 'saf', 'asf', '2021-10-23'),
(14, 'Main Dish', 'asf', 'analog-watch-gb88cd73a7_1920.jpg', 'asf', 'asf', 'asf', '2021-10-23'),
(15, 'Dessert', 'saf', 'time-g071c52a54_1920.jpg', 'aegea', 'agas', 'safas', '2021-10-23'),
(16, 'Main Dish', 'Mark Test', 'time-g071c52a54_1920.jpg', 'asfa', '1.4', 'afasf', '2021-10-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_recipe`
--
ALTER TABLE `tbl_recipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_recipe`
--
ALTER TABLE `tbl_recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
