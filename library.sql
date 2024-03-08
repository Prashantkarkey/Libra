-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 09:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(10) NOT NULL,
  `user_fk` int(10) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_auth` varchar(255) NOT NULL,
  `book_genre` varchar(255) NOT NULL,
  `book_language` varchar(255) NOT NULL,
  `book_date` varchar(25) NOT NULL,
  `book_image` text NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `book_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `user_fk`, `book_title`, `book_auth`, `book_genre`, `book_language`, `book_date`, `book_image`, `book_isbn`, `book_desc`) VALUES
(1, 1, 'math', 'durga', 'nepali', 'nepali', '2024-03-14', 'img3.jpg', '6763443', 'iljkwld'),
(3, 1, 'math', 'durga', 'comedy', 'english', '2024-03-08', 'libra logo 2.png', '999999', 'kknjlcbujhekfjovnijubikndwf'),
(4, 1, 'dbms', 'debu babu', 'gucci', 'prada', '2024-03-15', 'libra logo.png', '44444', 'nhjlskcjml;lkdw'),
(5, 1, 'ai', 'bi', 'dkm;l,/dconmk,e', 'kem,f;lnk, rf', '2024-03-16', 'KU logo.png', '4444444', 'We, the creators of Libra, are passionate bibliophiles who understand the joy and challenge of managing a personal library. We believe that everyone should have a user-friendly and efficient way to catalog their book collection, and that\'s why we built Libra.  Our Mission:  Libra\'s mission is to empower book lovers with a powerful yet user-friendly tool to:  Catalog their personal libraries with ease, storing essential book details like title, author, publication date, ISBN, and genre. Effortlessly view and search their library, making it easy to find specific books whenever needed. Keep their library information up-to-date by editing details like quantity, author information, and more. Maintain complete control over their library by removing books they no longer need. Enjoy the peace of mind that comes with a secure user authentication system, ensuring only authorized users can access and modify their library.');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(255) NOT NULL,
  `users_name` varchar(30) NOT NULL,
  `user_mail` varchar(20) NOT NULL,
  `libra_username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `users_name`, `user_mail`, `libra_username`, `user_password`, `verification_code`, `verified`) VALUES
(1, 'libra', '7libra7777@gmail.com', 'libra', '7$Librarymanagement', '458429', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
