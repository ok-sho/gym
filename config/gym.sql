-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2026 at 04:45 AM
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
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_events`
--

CREATE TABLE `class_events` (
  `id` int(11) NOT NULL,
  `starts_at` datetime NOT NULL,
  `ends_at` datetime NOT NULL,
  `max_participants` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `class_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_events`
--

INSERT INTO `class_events` (`id`, `starts_at`, `ends_at`, `max_participants`, `instructor_id`, `class_type_id`) VALUES
(1, '2026-08-03 12:00:00', '2026-08-03 13:00:00', 15, 1, 1),
(2, '2026-08-05 12:00:00', '2026-08-05 13:00:00', 15, 1, 1),
(3, '2026-08-10 12:00:00', '2026-08-10 13:00:00', 15, 1, 1),
(4, '2026-08-12 12:00:00', '2026-08-12 13:00:00', 15, 1, 1),
(5, '2026-08-17 12:00:00', '2026-08-17 13:00:00', 15, 1, 1),
(6, '2026-08-19 12:00:00', '2026-08-19 13:00:00', 15, 1, 1),
(7, '2026-08-24 12:00:00', '2026-08-24 13:00:00', 15, 1, 1),
(8, '2026-08-26 12:00:00', '2026-08-26 13:00:00', 15, 1, 1),
(9, '2026-08-04 09:00:00', '2026-08-04 10:30:00', 10, 1, 2),
(10, '2026-08-06 09:00:00', '2026-08-06 10:30:00', 10, 1, 2),
(11, '2026-08-11 09:00:00', '2026-08-11 10:30:00', 10, 1, 2),
(12, '2026-08-13 09:00:00', '2026-08-13 10:30:00', 10, 1, 2),
(13, '2026-08-18 09:00:00', '2026-08-18 10:30:00', 10, 1, 2),
(14, '2026-08-20 09:00:00', '2026-08-20 10:30:00', 10, 1, 2),
(15, '2026-08-07 10:00:00', '2026-08-07 10:30:00', 5, 2, 3),
(16, '2026-08-14 10:00:00', '2026-08-14 10:30:00', 5, 2, 3),
(17, '2026-08-21 10:00:00', '2026-08-21 10:30:00', 5, 2, 3),
(18, '2026-08-28 10:00:00', '2026-08-28 10:30:00', 5, 2, 3),
(19, '2026-08-07 13:00:00', '2026-08-07 13:30:00', 5, 3, 3),
(20, '2026-08-14 13:00:00', '2026-08-14 13:30:00', 5, 3, 3),
(21, '2026-08-21 13:00:00', '2026-08-21 13:30:00', 5, 3, 3),
(22, '2026-08-28 13:00:00', '2026-08-28 13:30:00', 5, 3, 3),
(23, '2026-08-06 18:00:00', '2026-08-06 19:00:00', 11, 2, 4),
(24, '2026-08-13 18:00:00', '2026-08-13 19:00:00', 11, 2, 4),
(25, '2026-08-20 18:00:00', '2026-08-20 19:00:00', 11, 2, 4),
(26, '2026-08-27 18:00:00', '2026-08-27 19:00:00', 11, 2, 4),
(27, '2026-08-01 11:00:00', '2026-08-01 13:00:00', 18, 4, 5),
(28, '2026-08-08 11:00:00', '2026-08-08 13:00:00', 18, 4, 5),
(29, '2026-08-15 11:00:00', '2026-08-15 13:00:00', 18, 4, 5),
(30, '2026-08-22 11:00:00', '2026-08-22 13:00:00', 18, 4, 5),
(31, '2026-08-29 11:00:00', '2026-08-29 13:00:00', 18, 4, 5),
(32, '2026-08-03 08:00:00', '2026-08-03 09:00:00', 14, 3, 6),
(33, '2026-08-05 08:00:00', '2026-08-05 09:00:00', 14, 3, 6),
(34, '2026-08-10 08:00:00', '2026-08-10 09:00:00', 14, 3, 6),
(35, '2026-08-12 08:00:00', '2026-08-12 09:00:00', 14, 3, 6),
(36, '2026-08-17 08:00:00', '2026-08-17 09:00:00', 14, 3, 6),
(37, '2026-08-19 08:00:00', '2026-08-19 09:00:00', 14, 3, 6),
(38, '2026-08-24 08:00:00', '2026-08-24 09:00:00', 14, 3, 6),
(39, '2026-08-26 08:00:00', '2026-08-26 09:00:00', 14, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `class_instructors`
--

CREATE TABLE `class_instructors` (
  `instructor_id` int(11) NOT NULL,
  `class_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_instructors`
--

INSERT INTO `class_instructors` (`instructor_id`, `class_type_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 3),
(3, 6),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `class_types`
--

CREATE TABLE `class_types` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `length_in_minutes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_types`
--

INSERT INTO `class_types` (`id`, `title`, `description`, `length_in_minutes`) VALUES
(1, 'Boxing for Beginners', 'All punching will be done in slow motion.', 60),
(2, 'Advanced Boxing', 'Ever felt like your nose wasn\'t crooked enough?', 90),
(3, 'Yoga Fight', 'Put the war in Warrior pose.', 30),
(4, 'Sumo Slam', 'Bring your own mawashi!', 60),
(5, 'Zumba Tournament', 'Prove you are the Zumba champion! Winner gets a t-shirt with our logo on it that they can wear on laundry day.', 120),
(6, 'No Sweat', 'The whole workout takes place in your mind! People who fall asleep will have moustaches drawn on their face.', 60);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `given_name` varchar(225) NOT NULL,
  `family_name` varchar(225) NOT NULL,
  `bio` text NOT NULL,
  `profile_img_url` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `given_name`, `family_name`, `bio`, `profile_img_url`) VALUES
(1, 'Hitmon', 'Chan', 'I love boxing!', 'assets/hitmonchan.png'),
(2, 'Maku', 'Hita', 'Eat food and get plenty of sleep!', 'assets/makuhita.png'),
(3, 'Medi', 'Cham', 'Meditation sharpens all your senses.', 'assets/medicham.png'),
(4, 'Thro', 'H', 'Always ready to throw down.', 'assets/throh.png');

-- --------------------------------------------------------

--
-- Table structure for table `membership_tiers`
--

CREATE TABLE `membership_tiers` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `gym_access` tinyint(1) NOT NULL,
  `classes_per_month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_tiers`
--

INSERT INTO `membership_tiers` (`id`, `title`, `description`, `gym_access`, `classes_per_month`) VALUES
(1, 'Indigo', 'Unlimited gym access only. Members of this tier pay for every fitness class they take.', 1, 0),
(2, 'Johto', 'Unlimited gym access and 1 free fitness class per month.', 1, 1),
(3, 'Hoenn', 'Unlimited gym access and 3 free fitness classes per month.', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `member_bookings`
--

CREATE TABLE `member_bookings` (
  `id` int(11) NOT NULL,
  `class_event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_visits`
--

CREATE TABLE `member_visits` (
  `id` int(11) NOT NULL,
  `arrived_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `member_booking_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `given_name` varchar(225) NOT NULL,
  `family_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `membership_tier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `given_name`, `family_name`, `email`, `password`, `created_at`, `membership_tier_id`) VALUES
(1, 'Ash', 'Ketchum', 'ash@catchem.com', '$2y$10$k3k6b01jEokk3MJdKB4.WOqlAaAIPyIsQPcPSKxfRvVfzV2DXDnTa', '2026-07-11 00:52:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_events`
--
ALTER TABLE `class_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_class_type_id_ce` (`class_type_id`),
  ADD KEY `fk_instructor_id_ce` (`instructor_id`);

--
-- Indexes for table `class_instructors`
--
ALTER TABLE `class_instructors`
  ADD KEY `fk_instructor_id_ci` (`instructor_id`),
  ADD KEY `fk_class_type_id_ci` (`class_type_id`);

--
-- Indexes for table `class_types`
--
ALTER TABLE `class_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_tiers`
--
ALTER TABLE `membership_tiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_bookings`
--
ALTER TABLE `member_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_mb` (`user_id`),
  ADD KEY `fk_class_event_id` (`class_event_id`);

--
-- Indexes for table `member_visits`
--
ALTER TABLE `member_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_member_booking_id` (`member_booking_id`),
  ADD KEY `fk_user_id_mv` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD KEY `fk_membership_tier_id` (`membership_tier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_events`
--
ALTER TABLE `class_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `class_types`
--
ALTER TABLE `class_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership_tiers`
--
ALTER TABLE `membership_tiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_bookings`
--
ALTER TABLE `member_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_visits`
--
ALTER TABLE `member_visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_events`
--
ALTER TABLE `class_events`
  ADD CONSTRAINT `fk_class_type_id_ce` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`id`),
  ADD CONSTRAINT `fk_instructor_id_ce` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`);

--
-- Constraints for table `class_instructors`
--
ALTER TABLE `class_instructors`
  ADD CONSTRAINT `fk_class_type_id_ci` FOREIGN KEY (`class_type_id`) REFERENCES `class_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_instructor_id_ci` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_bookings`
--
ALTER TABLE `member_bookings`
  ADD CONSTRAINT `fk_class_event_id` FOREIGN KEY (`class_event_id`) REFERENCES `class_events` (`id`),
  ADD CONSTRAINT `fk_user_id_mb` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `member_bookings`
  ADD UNIQUE KEY `unique_user_class_event` (`user_id`, `class_event_id`);

--
-- Constraints for table `member_visits`
--
ALTER TABLE `member_visits`
  ADD CONSTRAINT `fk_member_booking_id` FOREIGN KEY (`member_booking_id`) REFERENCES `member_bookings` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_membership_tier_id` FOREIGN KEY (`membership_tier_id`) REFERENCES `membership_tiers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
