-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2023 at 10:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `npm` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
);

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `npm`, `email`, `jurusan`, `gambar`) VALUES
(1, 'ansori', '00972', 'ansori@gmail.com', 'sistem informasi', 'ansori.jpeg'),
(2, 'paong', '00973', 'paong@gmail.com', 'sistem informasi', 'paong.jpeg'),
(4, 'tatok', '00975', 'tatok@gmail.com', 'sistem informasi', 'tatok.jpeg'),
(5, 'herman', '00976', 'herman@gmail.com', 'sistem informasi', 'herman.jpeg'),
(9999, 'aripi', '00977', 'arip@gmail.com', 'teknik mesin', 'arip.jpeg'),
(10004, 'rizky', '00981', 'rizky@gmail.com', 'teknik kimia', 'rizky.jpeg'),
(10008, 'JBKJSBF', 'klhasldb', 'BKSJSDF@gmail.com', 'bsksd', '64e0a52fa1d7e.jpg'),
(10009, 'pikipikipi', '01020', 'pikipik@gmail.com', 'teknik mesin', '64e0a9f1c0549.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'anjay123', '$2y$10$i09q3.A.kHfzafGR3q3ghu7HDtV0ow23hxxh5G16k3YfP1acBjRtO'),
(2, 'paong123', '$2y$10$JeSMKOAnfAKPbpeEPuGqcORo1bEY1A0KIYOclhfMomEJL9AMGOo42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
