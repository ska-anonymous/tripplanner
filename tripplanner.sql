-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 08:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tripplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `itineraries`
--

CREATE TABLE `itineraries` (
  `trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_name` varchar(100) NOT NULL,
  `departure_time` datetime NOT NULL,
  `return_time` datetime NOT NULL,
  `num_of_travelers` int(11) NOT NULL,
  `trip_budget` double NOT NULL,
  `trip_description` varchar(1500) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trip_places`
--

CREATE TABLE `trip_places` (
  `id` int(11) NOT NULL,
  `intinerary_id` int(11) NOT NULL,
  `place_id` varchar(300) NOT NULL,
  `activites` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_login_id` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `user_role` varchar(15) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_login_id`, `user_email`, `user_pass`, `user_role`, `user_created_at`) VALUES
(1, 'Salman Khan A', 'salmanlogin', 'salmankhanserai@gmail.com', '$2y$10$E9m1olnmJ8vHWdrzkSKf6e5TrM9IzB5BIkpQj4BuMWQ7W8TecfRcK', 'user', '2023-03-08 07:03:22'),
(2, 'Salman Khan A', 'salmanlogin1', 'salmankhanserai1@gmail.com', '$2y$10$GJ7JRMmfsc5LCER89mqJceZr0ueD6jS/B3Q9Fees84AvFHMTriMPq', 'user', '2023-03-08 07:06:22'),
(3, 'Hamad', 'djfjdsfj', 'h@usa.com', '$2y$10$o1PRd0SidrYdaVFxB15uAu58mfrXsOHuzQycxKakI0Z1e1luccihW', 'user', '2023-03-08 08:06:25'),
(4, 'Hamad Ahmad', 'hamad120', 'hamadatusa@gmail.com', '$2y$10$gvYqKf.hmAaKPJInhJkqUOcOMKbQrmm96cQzzGJSprDkbrS3ovr7S', 'user', '2023-03-08 08:24:08'),
(5, 'Salman Khan A', 'salmanlogin123', 'salmankhanserai232@gmail.com', '$2y$10$ElUGEiqX7rAfqNZVgOYpPe4JHCBcqwBqPL1QrnOwZ1/4QgcFp8lF2', 'user', '2023-03-08 10:54:55'),
(6, 'Salman Khan A', 'salmanlogin34', 'salmankhanserai4321@gmail.com', '$2y$10$86iP5sgAeEYA.8CFqitA4uhTZfo0lCxioGATTkaJgie5VkJM/kjL.', 'user', '2023-03-08 11:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `place_name` varchar(200) NOT NULL,
  `place_address` varchar(400) NOT NULL,
  `place_icon` varchar(200) NOT NULL,
  `place_rating` double NOT NULL,
  `place_business_status` varchar(50) NOT NULL,
  `place_id` varchar(300) NOT NULL,
  `place_types` varchar(200) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `place_name`, `place_address`, `place_icon`, `place_rating`, `place_business_status`, `place_id`, `place_types`, `time_stamp`) VALUES
(17, 1, 'Badshahi Mosque', 'Walled City of Lahore, Lahore, Punjab, Pakistan', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/worship_islam-71.png', 4.8, 'OPERATIONAL', 'ChIJsd4Nv50cGTkR3pC0D7HNvxM', '[\"mosque\",\"tourist_attraction\",\"place_of_worship\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:14:48'),
(18, 1, 'Lahore Fort', 'H8Q7+56P, Fort Rd, Walled City of Lahore, Lahore, Punjab, Pakistan', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png', 4.6, 'OPERATIONAL', 'ChIJbzSCLmIbGTkR7LRMMh7HvTU', '[\"tourist_attraction\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:15:14'),
(19, 1, 'Sheesh Mahal', 'H8Q7+W65, Walled City of Lahore, Lahore, Punjab, Pakistan', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png', 4.6, 'OPERATIONAL', 'ChIJv0SaimIbGTkRijTosQEqNHo', '[\"tourist_attraction\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:15:23'),
(20, 1, 'Mochi Gate', 'H8GC+VJQ, Mohalla Porbian Mochi Gate Walled City of Lahore, Lahore, Punjab 54000, Pakistan', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png', 4.4, 'OPERATIONAL', 'ChIJ6blhnFwbGTkRz8pIc_4XHCA', '[\"tourist_attraction\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:15:27'),
(21, 1, 'Katpana Desert', 'K2 Resort, Katpana, Skardu, 16100', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png', 4.6, 'OPERATIONAL', 'ChIJaSLFrSBk5DgR1QzFu4GNGQU', '[\"tourist_attraction\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:15:31'),
(22, 1, 'lastminute.com London Eye', 'Riverside Building, County Hall, London SE1 7PB, United Kingdom', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png', 4.5, 'OPERATIONAL', 'ChIJc2nSALkEdkgRkuoJJBfzkUI', '[\"tourist_attraction\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:15:53'),
(23, 1, 'Madame Tussauds London', 'Marylebone Rd, London NW1 5LR, United Kingdom', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png', 4.4, 'OPERATIONAL', 'ChIJgZ24Us4adkgRpDNAwNPO_SY', '[\"tourist_attraction\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:15:58'),
(24, 1, 'Jack The Ripper Museum', '12 Cable St, Aldgate, London E1 8JG, United Kingdom', 'https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/museum-71.png', 4.1, 'OPERATIONAL', 'ChIJP0WVyDUDdkgRyXw130nxbxE', '[\"tourist_attraction\",\"museum\",\"point_of_interest\",\"establishment\"]', '2023-04-01 03:16:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itineraries`
--
ALTER TABLE `itineraries`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `trip_places`
--
ALTER TABLE `trip_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_login_id` (`user_login_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itineraries`
--
ALTER TABLE `itineraries`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_places`
--
ALTER TABLE `trip_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
