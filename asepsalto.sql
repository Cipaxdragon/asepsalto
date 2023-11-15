-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 09:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `kritik_saran` (
  `user` varchar(255) NOT NULL,
  `teks` longtext NOT NULL,
  `waktu` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`user`, `teks`, `waktu`) VALUES
('6554faa50e561', 'berak', '2023-11-16 03:04:54.000000'),
('6554faa50e561', 'jelle web nu', '2023-11-16 04:02:08.000000'),
('6554faa50e561', 'tai\r\n', '2023-11-16 04:22:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `sambarang`
--

CREATE TABLE `sambarang` (
  `user` varchar(255) NOT NULL,
  `teks` longtext NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sambarang`
--

INSERT INTO `sambarang` (`user`, `teks`, `waktu`) VALUES
('6554faa50e561', 'sundala', '2023-11-16 02:43:29'),
('6554faa50e561', 'asdas', '2023-11-16 02:46:13'),
('6554faa50e561', 'asd', '2023-11-16 02:48:54'),
('6554faa50e561', 'asd', '2023-11-16 02:50:59'),
('6554faa50e561', 'asdasd', '2023-11-16 02:51:17'),
('6554faa50e561', 'asdasd', '2023-11-16 02:51:54'),
('6554faa50e561', 'berak', '2023-11-16 02:52:00'),
('6554faa50e561', 'asdasd', '2023-11-16 02:52:15'),
('6554faa50e561', 'asdasd', '2023-11-16 02:52:23'),
('6554faa50e561', 'asdsada', '2023-11-16 02:52:29'),
('6554faa50e561', 'asda', '2023-11-16 02:52:43'),
('6554faa50e561', 'asda', '2023-11-16 02:52:47'),
('6554faa50e561', '', '2023-11-16 02:52:49'),
('6554faa50e561', '', '2023-11-16 02:53:02'),
('6554faa50e561', '', '2023-11-16 02:53:37'),
('6554faa50e561', 'a', '2023-11-16 03:15:12'),
('6554faa50e561', 'memek', '2023-11-16 03:46:19'),
('6554faa50e561', 'asade kontol sama lu semua ngentod ngentod asade kontol sama lu semua ngentod ngentod', '2023-11-16 04:13:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
