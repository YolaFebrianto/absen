-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 01:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `keterangan` varchar(10) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jam` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_pegawai`, `nama`, `keterangan`, `kategori`, `tanggal`, `jam`) VALUES
(2, 1, 'Asep', '', 'pagi', '2022-05-01', '11:10:15'),
(3, 3, 'Usman', 'I', 'pagi', '2022-05-01', '11:11:28'),
(4, 1, 'Asep', '', 'pagi', '2022-05-02', '06:33:04'),
(5, 1, 'Asep', '', 'siang', '2022-05-02', '11:33:14'),
(6, 3, 'Usman', '', 'pagi', '2022-05-02', '08:41:53'),
(8, 3, 'Usman', '', 'siang', '2022-05-02', '18:00:00'),
(9, 3, 'Usman', 'A', 'pagi', '2022-05-06', '19:05:20'),
(10, 4, 'Ujang subagya', '', 'siang', '2022-05-07', '17:09:31'),
(11, 1, 'Asep', '', 'pagi', '2022-05-24', '10:01:17'),
(12, 1, 'Asep', 'I', 'pagi', '2022-05-30', '07:42:20'),
(13, 1, 'Asep', 'I', 'siang', '2022-05-30', '07:43:30'),
(14, 3, 'Usman', 'A', 'pagi', '2022-05-30', '07:43:47'),
(15, 4, 'Ujang subagya', 'S', 'pagi', '2022-05-30', '07:44:34'),
(16, 3, 'Usman', 'I', 'siang', '2022-05-30', '07:44:47'),
(17, 4, 'Ujang subagya', '', 'siang', '2022-05-30', '07:45:48'),
(18, 11, 'Ainun', 'A', 'pagi', '2022-05-30', '08:28:11'),
(19, 11, 'Ainun', '', 'siang', '2022-05-30', '08:28:22'),
(20, 9, 'Galuh', 'A', 'pagi', '2022-05-30', '08:28:39'),
(21, 9, 'Galuh', 'A', 'siang', '2022-05-30', '08:28:48'),
(22, 8, 'Intan', '', 'pagi', '2022-05-30', '08:29:06'),
(23, 8, 'Intan', '', 'siang', '2022-05-30', '08:29:16'),
(24, 7, 'Nurul aini', 'I', 'pagi', '2022-05-30', '08:29:29'),
(25, 7, 'Nurul aini', '', 'siang', '2022-05-30', '08:29:42'),
(26, 6, 'Riska', 'S', 'pagi', '2022-05-30', '08:29:53'),
(27, 6, 'Riska', 'S', 'siang', '2022-05-30', '08:30:02'),
(28, 10, 'Susi', 'A', 'pagi', '2022-05-30', '08:30:15'),
(31, 7, 'Nurul aini', 'I', 'pagi', '2022-06-21', '17:01:27'),
(32, 11, 'Ainun', 'I', 'pagi', '2022-06-21', '17:03:45'),
(35, 11, 'Ainun', 'I', 'pagi', '2022-06-22', '18:21:58'),
(40, 11, 'Ainun', 'A', 'pagi', '2022-07-19', '08:15:15'),
(41, 11, 'Ainun', '', 'siang', '2022-07-19', '08:15:28'),
(42, 9, 'Galuh', '', 'pagi', '2022-07-19', '08:15:40'),
(43, 9, 'Galuh', '', 'siang', '2022-07-19', '08:15:49'),
(44, 8, 'Intan', 'I', 'pagi', '2022-07-19', '08:15:59'),
(45, 8, 'Intan', 'I', 'siang', '2022-07-19', '08:16:08'),
(46, 7, 'Nurul aini', '', 'pagi', '2022-07-19', '08:16:17'),
(47, 7, 'Nurul aini', 'S', 'siang', '2022-07-19', '08:16:28'),
(48, 6, 'Riska', '', 'pagi', '2022-07-19', '08:16:39'),
(49, 6, 'Riska', '', 'siang', '2022-07-19', '08:16:47'),
(50, 10, 'Susi', 'A', 'pagi', '2022-07-19', '08:16:58'),
(51, 10, 'Susi', 'S', 'siang', '2022-07-19', '08:17:08'),
(53, 12, 'Abdul', 'I', 'siang', '2022-07-19', '15:44:42'),
(54, 12, 'Abdul', '', 'pagi', '2022-07-19', '15:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `gaji` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `telp`, `gaji`, `created_at`, `updated_at`) VALUES
(6, 'Riska', 'Japanan', '0812', 60000, '2022-05-30 01:20:23', '2022-05-30 01:22:09'),
(7, 'Nurul aini', 'Gempol joyo', '0882', 60000, '2022-05-30 01:20:38', '2022-05-30 01:20:38'),
(8, 'Intan', 'Kesambi porong', '081231776521', 45000, '2022-05-30 01:22:48', '2022-05-30 01:22:48'),
(9, 'Galuh', 'Kluwe', '08217678901', 45000, '2022-05-30 01:23:33', '2022-05-30 01:23:33'),
(10, 'Susi', 'Sampurno', '08813456776', 50000, '2022-05-30 01:24:27', '2022-05-30 01:24:27'),
(11, 'Ainun', 'Porong\r\n', '08982234765', 45000, '2022-05-30 01:25:01', '2022-05-30 01:25:01'),
(12, 'Abdul', 'Sidoarjo', '123345678', 1000000, '2022-07-19 08:43:47', '2022-07-19 08:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `proform`
--

CREATE TABLE `proform` (
  `id` int(11) NOT NULL,
  `deadline` date DEFAULT NULL,
  `nama_pesanan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `deadline_penyelesaian` date DEFAULT NULL,
  `status` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proform`
--

INSERT INTO `proform` (`id`, `deadline`, `nama_pesanan`, `jumlah`, `deadline_penyelesaian`, `status`) VALUES
(1, '2022-05-08', 'halnisah', 1000, '2022-05-10', '70.00'),
(2, '2022-05-10', 'galvi', 1500, '2022-05-13', '80.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pegawai_kategori_tanggal` (`id_pegawai`,`kategori`,`tanggal`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `proform`
--
ALTER TABLE `proform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proform`
--
ALTER TABLE `proform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
