-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 02:29 PM
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
-- Database: `wpu_phpmysql_dasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `nisn_siswa` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas_siswa` varchar(100) NOT NULL,
  `agama_siswa` varchar(100) NOT NULL,
  `telepon_siswa` varchar(14) NOT NULL,
  `foto_siswa` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `nisn_siswa`, `nama_siswa`, `kelas_siswa`, `agama_siswa`, `telepon_siswa`, `foto_siswa`, `created_at`) VALUES
(24, '004050111', 'Heri Kusuma Setiawan', 'X ULP 1', 'Katolik', '08675523653', 'bebek.jpg', '2024-02-11 17:02:45'),
(25, '0040504112', 'Wicaksono Guwa Septiani', 'XII AKL 2', 'Konghucu', '089532278541', 'crab.jpg', '2024-02-11 17:05:45'),
(26, '0060506112', 'Indah Setya Ningrum ', 'XI MPLB 2', 'Katolik', '08975597821', 'like.jpg', '2024-02-11 17:07:42'),
(28, '0040509112', 'Nirum Angkasa', 'X TJKT 1', 'Islam', '08967885341', 'kucing.jpg', '2024-02-11 17:10:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn_siswa` (`nisn_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
