-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 03:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyakita`
--

-- --------------------------------------------------------

--
-- Table structure for table `design`
--

CREATE TABLE `design` (
  `id` int(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `tautan_gambar` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `id_pemilik` varchar(100) NOT NULL,
  `jumlah_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `design`
--

INSERT INTO `design` (`id`, `judul`, `deskripsi`, `tautan_gambar`, `kategori`, `id_pemilik`, `jumlah_like`) VALUES
(1, 'Web design', 'Some desc about the design ', 'file_64b2095c293d7.jpg', '', '5', 0),
(2, 'Mural', 'Some desc about mural design', 'file_64b20b7973623.png', '', '5', 0),
(3, 'Design 123', 'New desc', 'file_64b20bae4f2e4.png', '', '5', 0),
(4, '3D model design', 'Deskripsi 3D Model', 'file_64b20bc9c66a7.png', '', '5', 0),
(6, 'Web design 2', 'Desc edit', 'file_64b225cd3b092.png', '', '6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `subjudul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lamaran_pekerjaan`
--

CREATE TABLE `lamaran_pekerjaan` (
  `id` int(10) NOT NULL,
  `id_pelamar` int(10) NOT NULL,
  `id_pekerjaan` int(10) NOT NULL,
  `tgl_lamaran` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','diterima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lamaran_pekerjaan`
--

INSERT INTO `lamaran_pekerjaan` (`id`, `id_pelamar`, `id_pekerjaan`, `tgl_lamaran`, `status`) VALUES
(3, 2, 4, '2023-07-15 01:05:32', 'pending'),
(4, 2, 5, '2023-07-15 01:19:30', 'pending'),
(5, 5, 4, '2023-07-15 10:05:35', 'pending'),
(6, 6, 4, '2023-07-15 11:52:06', 'pending'),
(7, 7, 4, '2023-07-15 12:33:04', 'pending'),
(8, 7, 4, '2023-07-15 12:43:47', 'pending'),
(9, 7, 4, '2023-07-15 13:11:19', 'pending'),
(10, 7, 10, '2023-07-15 13:12:27', 'pending'),
(11, 7, 2, '2023-07-15 13:18:32', 'pending'),
(12, 7, 10, '2023-07-15 13:18:48', 'pending'),
(13, 7, 10, '2023-07-15 13:19:58', 'pending'),
(14, 7, 10, '2023-07-15 13:20:12', 'pending'),
(15, 12, 12, '2023-07-15 13:33:36', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(10) NOT NULL,
  `judul_pekerjaan` text NOT NULL,
  `gaji` int(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `id_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `judul_pekerjaan`, `gaji`, `tanggal_mulai`, `tanggal_akhir`, `deskripsi_pekerjaan`, `gambar`, `id_user`) VALUES
(2, 'UI/UX Designer', 100000, '2023-07-13', '2023-07-28', 'Test', 'file_64b025036982c.png', 3),
(4, 'UI/UX Designer  2', 18000000, '2023-07-20', '2023-07-29', 'Test desc', 'file_64b179a6da032.png', 3),
(5, 'Programmer', 5700000, '2023-07-19', '2023-07-19', 'Test', 'file_64b190de2a2d3.png', 3),
(7, 'Dosen', 109202, '2023-07-15', '2023-07-15', 'Tset 123', 'file_64b1916921eb4.jpg', 3),
(8, 'desain grafis', 30000, '2023-07-15', '2023-07-15', 'husyguas', 'file_64b22e57454bc.png', 4),
(10, 'desain grafis', 30000, '2023-07-15', '2023-07-25', 'mendesain web', 'file_64b2382cd5920.png', 9),
(11, 'UI/UX', 10000, '2023-07-15', '2023-07-30', 'rajin', 'file_64b23b7095ccf.png', 10),
(12, 'Designer bendungan', 500, '2023-07-15', '2023-07-27', 'bendungan', 'file_64b23d49bf98c.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(50) NOT NULL,
  `id_desainer` int(50) NOT NULL,
  `id_pemilik proyek` int(50) NOT NULL,
  `jumlah_pembayaran` int(20) NOT NULL,
  `status` enum('berhasil','diproses','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(10) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `foto_profil` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `level` enum('designer','client','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `username`, `email`, `kata_sandi`, `foto_profil`, `lokasi`, `level`) VALUES
(2, 'Test', 'test', 'test@mail.com', '1213', '', '', 'designer'),
(3, 'test client', 'client', 'client@mail.com', '123', '', '', 'client'),
(4, 'zain', 'hafid', 'hafidzain38@gmail.com', '123', '', '', 'client'),
(5, 'Hafid Zein', 'zein', 'hafid@mail.com', '123', '', '', 'designer'),
(6, 'Ichsan', 'ichsan', 'ichsan@mail.com', '123', '', '', 'designer'),
(7, 'alh', 'elh', 'elha@gmail.com', '123', '', '', 'designer'),
(8, 'ahmad', 'ahmad', 'ahmad@gmail.com', 'kadalmesir', '', '', 'client'),
(9, 'pweb', 'pweb2023', 'pweb@gmail.com', '123456', '', '', 'client'),
(10, 'pweb2', 'pweb2', 'pweb2@gmail.com', '123456', '', '', 'client'),
(11, 'user1', 'user1', 'user1@gmail.com', '123456', '', '', 'client'),
(12, 'user2', 'user2', 'user2@gmail.com', '123456', '', '', 'designer');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_pemilik` varchar(100) NOT NULL,
  `id_desain` varchar(100) NOT NULL,
  `status` enum('ditola','diterima','pending') NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `design`
--
ALTER TABLE `design`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lamaran_pekerjaan`
--
ALTER TABLE `lamaran_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design`
--
ALTER TABLE `design`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lamaran_pekerjaan`
--
ALTER TABLE `lamaran_pekerjaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
