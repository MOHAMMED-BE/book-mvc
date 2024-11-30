-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2024 at 09:58 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `image`) VALUES
(1, 'The Great Gatsby', 'F. Scott Fitzgerald', 'gatsby.jpg'),
(2, '1984', 'George Orwell', '1984.jpeg'),
(3, 'To Kill a Mockingbird', 'Harper Lee', 'mockingbird.jpg'),
(4, 'Pride and Prejudice', 'Jane Austen', 'pride.jpeg'),
(5, 'The Catcher in the Rye', 'J.D. Salinger', 'catcher.jpeg'),
(6, 'The Lord of the Rings', 'J.R.R. Tolkien', 'lotr.jpg'),
(7, 'Moby Dick', 'Herman Melville', 'mobydick.jpg'),
(8, 'War and Peace', 'Leo Tolstoy', 'warpeace.jpg'),
(9, 'The Odyssey', 'Homer', 'odyssey.jpeg'),
(10, 'The Hobbit', 'J.R.R. Tolkien', 'hobbit.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
