-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 01:39 PM
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
-- Database: `movie-ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$XSCvdpHmc9eJxrWvlAeSre5rR0LfTL9JkAA5wAFBdVzsZ97q0Do.m', 'admin@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `genres` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`genres`)),
  `appear_on` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`appear_on`)),
  `description` text DEFAULT NULL,
  `imdb_rating` decimal(3,1) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `release_date`, `duration_minutes`, `genres`, `appear_on`, `description`, `imdb_rating`, `picture_url`, `price`, `created_at`) VALUES
(4, 'EXPEND4BLES', '2023-03-25', 148, '[\"Action\"]', '[\"Front Page\"]', 'Armed with every weapon they can get thier hands on, the Expendables are the world\'s last line of defence and the team that get called when all other options are off the table.', 4.0, 'uploads/65db8b122dcc27.79538213_d1.jpg', 2000.00, '2024-02-25 18:46:42'),
(5, 'PATHAAN', '2023-03-25', 178, '[\"Action\"]', '[\"Front Page\"]', 'Am indian spy takes on the leader of a group of mercenaries who have nefarious plans to target his homeland.', 4.0, 'uploads/65db8ba80f6b02.30263581_new2.jpg', 2000.00, '2024-02-25 18:49:12'),
(6, 'EXTRACTION 2', '2023-11-25', 184, '[\"Action\"]', '[\"Front Page\"]', 'After barely surviving his grievous wounds from his mission in Dhaka, Bangladesh, Tyler Rake is back, and his team is ready to take on this next mission.', 5.0, 'uploads/65db8bf3ca6710.26588521_new3.jpg', 5000.00, '2024-02-25 18:50:27'),
(7, 'All That Gliters', '2024-02-24', 162, '[\"Drama\"]', '[\"Latest Movies\",\"Directors Choice\"]', 'Love Lost and Found: A Journey of Second Chance...', 5.0, 'uploads/65dba79e93b650.63330422_new12.jpg', 2000.00, '2024-02-25 20:48:30'),
(8, 'Heart Strings', '2024-02-24', 166, '[\"Drama\"]', '[\"Latest Movies\",\"Directors Choice\"]', 'When a doctor falls head over heels for a lady,A delimma Awaits him...', 5.0, 'uploads/65dba8122c8143.52784234_new13.jpg', 2500.00, '2024-02-25 20:50:26'),
(9, 'The One Who Got Away', '2023-03-25', 172, '[\"Drama\"]', '[\"Latest Movies\",\"Directors Choice\"]', 'A mother\'s love knows no bounds, will she find love or heartbreak?...', 4.0, 'uploads/65dba939b93dc8.24116217_new14.jpg', 1500.00, '2024-02-25 20:55:21'),
(10, 'Tears Line', '2024-03-07', 193, '[\"Drama\"]', '[\"Latest Movies\",\"Directors Choice\"]', 'Twin siblings embark on poignant journey to uncover the secret and missteps...', 5.0, 'uploads/65dba9a1b0cac9.10670184_new15.jpg', 3000.00, '2024-02-25 20:57:05'),
(11, 'A Weekend To Forget', '2024-02-03', 177, '[\"Thriller\"]', '[\"Latest Movies\",\"Directors Choice\"]', 'Seven friends reunite for a weekend getaway after years of being apart...', 5.0, 'uploads/65dbaa15649801.19370103_new17.jpg', 2000.00, '2024-02-25 20:59:01'),
(12, 'Big Love', '2024-02-09', 188, '[\"Drama\"]', '[\"Latest Movies\",\"Directors Choice\"]', 'Love sparks when Adil,chasing his dreams meets Adina,a focused woman...', 3.0, 'uploads/65dbaaa10ea335.60272129_new18.jpg', 2000.00, '2024-02-25 21:01:21'),
(13, 'Yoh! Chrismas', '2024-01-28', 190, '[\"Comedy\"]', '[\"Latest Movies\",\"Directors Choice\"]', 'Single,30 and under pressure,lies to her family about having a boyfriend...', 5.0, 'uploads/65dbab44472919.11149251_new19.jpg', 2500.00, '2024-02-25 21:04:04'),
(14, 'CHETAM', '2024-02-10', 148, '[\"Drama\",\"Thriller\"]', '[\"Latest Movies\"]', 'Alove story that transcends boundries between teenage couple...', 4.0, 'uploads/65dbab9cad8c51.69358029_new55.jpg', 2000.00, '2024-02-25 21:05:32'),
(15, 'IJOGBON', '2024-02-14', 200, '[\"Action\",\"Drama\"]', '[\"Upcoming Events\",\"Just Arrived\",\"Free Movies\"]', 'Four teenagers from a rural village in South West Nigeria stumble upon...', 5.0, 'uploads/65dbac0f5f1673.49527623_new8.jpg', 3000.00, '2024-02-25 21:07:27'),
(16, 'ORISA', '2023-12-25', 135, '[\"Action\",\"Drama\"]', '[\"Upcoming Events\",\"Just Arrived\",\"Free Movies\"]', 'From royalty to redemption: withness the kings descent...', 5.0, 'uploads/65dbac8451e847.58603636_new25.jpg', 3500.00, '2024-02-25 21:09:24'),
(17, 'MERRY MEN 3', '2022-06-25', 177, '[\"Drama\",\"Thriller\"]', '[\"Upcoming Events\",\"Just Arrived\",\"Free Movies\"]', 'The film tells the story of four Abuja\'s most eligible and notorious bachelors....', 5.0, 'uploads/65dbad021c9ca2.15790661_new26.jpg', 2000.00, '2024-02-25 21:11:30'),
(18, 'BREATH OF LIFE', '2023-01-25', 170, '[\"Drama\",\"Thriller\"]', '[\"Upcoming Events\",\"Just Arrived\",\"Free Movies\"]', 'Breath of life, a faith-based story, follows the story of a man...', 5.0, 'uploads/65dbad6805a263.06087783_new28.jpg', 3900.00, '2024-02-25 21:13:12'),
(19, 'TIGER 3', '2023-12-25', 168, '[\"Action\",\"Drama\"]', '[\"Upcoming Events\"]', 'Tiger and Zoya are back to save the country and thier family....', 5.0, 'uploads/65dbadea032678.60012997_new6.jpg', 3000.00, '2024-02-25 21:15:22'),
(20, 'WURA', '2024-01-31', 160, '[\"Drama\",\"Thriller\"]', '[\"Upcoming Events\"]', 'Wura follows the secret lives of Wura Amoo-Adeleke, a wife, loving monther and ruthless iron lady...', 5.0, 'uploads/65dbae603b7ba1.17431664_new29.jpg', 2900.00, '2024-02-25 21:17:20'),
(21, 'Hotel Labamba', '2024-03-02', 109, '[\"Comedy\",\"Drama\"]', '[\"Latest Movies\"]', 'Hotel Labamba', 5.0, 'uploads/65dbaee19182d4.61569474_new16.jpg', 3000.00, '2024-02-25 21:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `expiration_date` varchar(7) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `full_name`, `email`, `phone_number`, `movie_id`, `movie_name`, `card_number`, `cardholder_name`, `expiration_date`, `cvv`, `price`, `payment_status`, `created_at`) VALUES
(10, 'ibrahim', 'hibee@gmail.com', '0908658676', 14, 'CHETAM', '6899', 'bkbku', '7697697', 'gi7t', 2000.00, 'complete', '2024-02-27 12:22:27'),
(11, 'ibrahim', 'hibee@gmail.com', '0908658676', 11, 'A Weekend To Forget', '7697868', 'vhvuk', 'bhkuj', '8089', 2000.00, 'complete', '2024-02-27 12:24:14'),
(12, 'ibrahim', 'hibee@gmail.com', '0908658676', 15, 'IJOGBON', 'y698', 'hvjhkvk', '6988', 'hbkj', 3000.00, 'complete', '2024-02-27 12:26:13'),
(13, 'ibrahim', 'hibee@gmail.com', '0908658676', 14, 'CHETAM', '487836398', '7349', 'dhdye', '4373', 2000.00, 'complete', '2024-02-27 12:31:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
