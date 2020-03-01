-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 03:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci-login`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
('699d51d3-55ef-11ea-b704-0492260d9830', 'Fahtul Abd', 'fahtul@gmail.com', 'default.jpg', '$2y$10$Bhzz6GbJDhL/p3V2x1a2KeRWMz4uVoKhiaS5.snJQj5KxFCkfzPhG', '5d8dee09-2373-4152-aad1-679099b07be2', 1, 1582429731),
('811c6ffd-5558-11ea-afc3-0492260d9830', 'Yogi', 'yogiermanto59@gmail.com', 'default.jpg', '$2y$10$tmMwLVXs.iSeRkRq31g.UOmivpaFbcX4gBtKfx7sxNSxL9j7bVbqG', 'ff419e6a-e62e-47cf-a3ef-681143e74f46', 1, 1582364919),
('9b373306-555a-11ea-afc3-0492260d9830', 'Yogi Ermanto', 'yogi@yogi.com', 'default.jpg', '$2y$10$YGFfNt0hS9uSxHOuamnJgO.v/og9tkmivPJmDKHDzgdChZbJqD1IW', '5d8dee09-2373-4152-aad1-679099b07be2', 1, 1582365822),
('fe750ea4-5559-11ea-afc3-0492260d9830', 'Rahmad', 'rahmad@gmail.com', 'default.jpg', '$2y$10$nEODqE7tASxPPUPOghJnbu2p5wu3ob2CNgDpGl84Q0dj3uo4L7jje', '5d8dee09-2373-4152-aad1-679099b07be2', 1, 1582365559);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` varchar(128) NOT NULL,
  `role_id` varchar(128) NOT NULL,
  `menu_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
('', 'ff419e6a-e62e-47cf-a3ef-681143e74f46', 'a4b19146-5439-412a-95ff-ea753a22c13a'),
('4c19491c-2359-4d37-a84c-a87223a6dfa4', '5d8dee09-2373-4152-aad1-679099b07be2', 'a4b19146-5439-412a-95ff-ea753a22c13a'),
('78f89b4a-fff8-4809-9178-d50b3c02e40c', 'ff419e6a-e62e-47cf-a3ef-681143e74f46', 'bdb04430-8654-4ef2-8a67-12b8957b07e3'),
('87ba35c5-5ab3-11ea-8a5d-0492260d9830', 'ff419e6a-e62e-47cf-a3ef-681143e74f46', 'b6fb9ecc-eb7c-47df-9f14-092b8dd594c5');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` varchar(128) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `sequence` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `sequence`) VALUES
('a4b19146-5439-412a-95ff-ea753a22c13a', 'User', 2),
('b6fb9ecc-eb7c-47df-9f14-092b8dd594c5', 'Menu', 3),
('bdb04430-8654-4ef2-8a67-12b8957b07e3', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
('5d8dee09-2373-4152-aad1-679099b07be2', 'Member'),
('ff419e6a-e62e-47cf-a3ef-681143e74f46', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` varchar(128) NOT NULL,
  `menu_id` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `sequence` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `url`, `icon`, `is_active`, `title`, `sequence`) VALUES
('177c5243-6b75-49e9-9d16-2d39c160eced', 'a4b19146-5439-412a-95ff-ea753a22c13a', 'user', 'fas fa-fw fa-user', 1, 'My Profile', 1),
('23381bbe-5a94-11ea-8a5d-0492260d9830', 'bdb04430-8654-4ef2-8a67-12b8957b07e3', 'admin/role', 'fas fa-fw fa-user-tie', 1, 'Role', 2),
('2b258b75-cd74-49a0-bf4a-379a8f9a3121', 'bdb04430-8654-4ef2-8a67-12b8957b07e3', 'admin', 'fas fa-fw fa-tachometer-alt', 1, 'Dashboard', 1),
('8ef12ee8-dbee-47fd-9c74-d6459c8edfbf', 'a4b19146-5439-412a-95ff-ea753a22c13a', 'user/edit', 'fas fa-fw fa-user-edit', 1, 'Edit Profile', 2),
('d1a21583-2dcd-47b8-bb31-008d864b6179', 'b6fb9ecc-eb7c-47df-9f14-092b8dd594c5', 'menu/sub_menu', 'fas fa-fw fa-folder-open', 1, 'Submenu Management', 2),
('e6c8668c-fee7-420a-8aef-6d28d5aec820', 'b6fb9ecc-eb7c-47df-9f14-092b8dd594c5', 'menu', 'fas fa-fw fa-folder', 1, 'Menu Management', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
