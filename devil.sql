-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2024 at 12:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devil`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int NOT NULL,
  `brandname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandname`, `image`, `status`) VALUES
(1, 'Creative IT', '14-Abir-09-09-2024-413.png', 'active'),
(2, 'Abcl IT', '14-Abir-09-09-2024-8489.png', 'active'),
(10, 'Programming Hero', '14-Abir-09-09-2024-2878.jpeg', 'active'),
(12, 'Jamuna TV', '14-Abir-09-09-2024-4222.png', 'active'),
(13, 'Amazon', '14-Abir-09-09-2024-3554.png', 'active'),
(14, 'Daraz', '14-Abir-09-09-2024-8935.jpeg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

CREATE TABLE `facts` (
  `id` int NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `count` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `shortdescription` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facts`
--

INSERT INTO `facts` (`id`, `icon`, `count`, `shortdescription`, `status`) VALUES
(2, 'fa fa-map-marker', '10', 'Branches', 'active'),
(3, 'fa fa-bell-slash-o', 'Explicabo Non sunt ', 'Eum cupidatat sint ', 'active'),
(4, 'fa fa-address-book', '5000', 'Peoples', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `name`, `email`, `body`) VALUES
(1, 'Md Abir Hossain', 'shawonkhan446@gmail.com', 'hi'),
(2, 'Abir', 'shawonkhan446@gmail.com', 'kemon aco'),
(3, 'Nobita', 'shawonkhan446@gmail.com', 'dfg'),
(4, 'Nobita', 'shawonkhan446@gmail.com', 'dfefere'),
(5, 'Nobita', 'shawonkhan446@gmail.com', 'xfdfe'),
(6, 'Nichole Mckee', 'gimalu@mailinator.com', 'Illo aliquam vitae v'),
(7, 'Bethany Ferguson', 'jopiwipa@mailinator.com', 'Iusto nostrum ut occ'),
(8, 'Ruby Chen', 'shawonkhan446@gmail.com', 'Elit pariatur Null');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `subtitle` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `subtitle`, `description`, `image`, `status`) VALUES
(12, 'Voluptatem Qui ea v', 'Veniam ex vitae et ', 'Voluptas reprehender ', '11-Voluptatem Qui ea v-31-08-2024-9572.png', 'active'),
(14, 'Quasi est est duis e', 'Nulla dolores iure e', 'Elit molestiae vel  ', '11-Quasi est est duis e-31-08-2024-6291.jpg', 'active'),
(15, 'Quaerat et aut et al', 'Consectetur labore ', 'Omnis aut dolor perf ', '10-Quaerat et aut et al-01-09-2024-5625.png', 'deactive');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `link`, `icon`, `status`) VALUES
(4, 'https://www.facebook.com/profile.php?id=100081126881922', 'fa fa-heart', 'active'),
(6, 'Ullam ipsum quo cum ', 'fa fa-address-book', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `status`) VALUES
(10, 'Home maker', ' Professional Home maker ', 'fa fa-bank', 'active'),
(11, 'Car', 'I am a professional car mechanic.', 'fa fa-automobile', 'active'),
(13, 'Officia vitae aut pl', 'Et error temporibus ', 'fa fa-address-book', 'active'),
(14, 'Id Card', 'I am a professinal id card provider', 'fa fa-address-card', 'active'),
(15, 'Officiis delectus o', ' Voluptas culpa venia ', 'fa fa-camera', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `ratio` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `year`, `ratio`, `status`) VALUES
(3, 'Cumque ut quisquam a', '1985', '23', 'active'),
(4, 'Excepturi deserunt lf', '2005', '90', 'active'),
(5, 'Architecto similique', '1991', '31', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int NOT NULL,
  `link` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `link`, `icon`, `status`) VALUES
(1, 'https://www.facebook.com/profile.php?id=100081126881922', 'fa fa-brands fa-facebook', 'active'),
(2, 'https://www.linkedin.com/in/mdabir-hossain-fulchad/', 'fa fa-linkedin', 'active'),
(6, 'https://www.instagram.com/abir_freelancer/', 'fa fa-instagram', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `designation` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `image`, `description`, `designation`, `status`) VALUES
(3, 'Abir h', '12-cugaqefoc-01-09-2024-7702.jpg', ' As a web developer, I design and build responsive, user-friendly websites and applications. I specialize in HTML, CSS, JavaScript, and backend technologies like PHP and Node.js. My focus is on creating clean, efficient code, ensuring cross-browser compatibility, and optimizing performance. I collaborate with designers and stakeholders to deliver seamless, engaging digital expedffriences.', 'Web Developers', 'active'),
(4, 'Md Abir Hossain', '12--01-09-2024-5494.jpg', 'As a web developer, I design and build responsive, user-friendly websites and applications. I specialize in HTML, CSS, JavaScript, and backend technologies like PHP and Node.js. My focus is on creating clean, efficient code, ensuring cross-browser compatibility, and optimizing performance. I collaborate with designers and stakeholders to deliver seamless, engaging digital experiences.', 'Senior Programmer', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'default.jpeg',
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `bio` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `bio`, `about`) VALUES
(10, 'Nobita', 'nobita@mailinator.com', 'default.jpeg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', ''),
(14, 'Abir', 'mdabirhossain.bd.info@gmail.com', '14-Abir-02-09-2024-5109.png', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'Professional Web Developer', '\"Passionate web developer with expertise in front-end and back-end technologies. Skilled in HTML, CSS, JavaScript, and PHP, with a knack for crafting responsive, user-friendly websites. Experienced in problem-solving and optimizing performance to deliver high-quality digital solutions.\"'),
(15, 'fyteryroz', 'hykux@mailinator.com', 'default.jpeg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', '', ''),
(16, 'sehuvabyri', 'nepivu@mailinator.com', 'default.jpeg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, NULL),
(17, 'cesok', 'huzaca@mailinator.com', 'default.jpeg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facts`
--
ALTER TABLE `facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facts`
--
ALTER TABLE `facts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
