-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 07:24 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reminderme`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_user` int(50) NOT NULL,
  `id_matkul` int(50) NOT NULL,
  `kode_matkul` varchar(50) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `lokal` varchar(100) NOT NULL,
  `dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_user`, `id_matkul`, `kode_matkul`, `nama_matkul`, `jadwal`, `lokal`, `dosen`) VALUES
(24, 2, 'IFT121', 'Praktikum Pemrograman Lanjut', 'Sabtu, 08.00 - 09.00', 'I.lt.V.7', 'Alif Catur Murti, M.Kom'),
(25, 3, 'IFT237', 'Struktur Data', 'Rabu, 08.00-09.30', 'J.lt.III.8', 'Tutik Khotimah, M.Kom'),
(25, 4, 'IFT001', 'Pemrograman Lanjut', 'Sabtu, 08.00 - 09.00', 'I.lt.V.7', 'Tri Listyorini M.Kom'),
(25, 5, 'IFT288', 'Interaksi Manusia dan Komputer', 'Senin, 09.00-10.00', 'J.lt.III.8', 'Tri Listyorini M.Kom');

-- --------------------------------------------------------

--
-- Table structure for table `tb_todolist`
--

CREATE TABLE `tb_todolist` (
  `id_list` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `task` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_todolist`
--

INSERT INTO `tb_todolist` (`id_list`, `id_user`, `task`, `matkul`, `tanggal`, `status`) VALUES
(9, 25, 'Mengerjakan UAS PPL', 'Pemrograman Lanjut', '2023-07-12', 'Selesai'),
(10, 24, 'Mengerjakan UAS PPL', 'Praktikum Pemrograman Lanjut', '2023-07-22', 'Selesai'),
(11, 25, 'Mengerjakan UTS Interaksi Manusia dan Komputer', 'Pemrograman Lanjut', '2023-07-28', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `no_hp`) VALUES
(24, 'aan', 'aan', 'aan', '23089492'),
(25, 'alfiyaa', '123', 'alfiya', '34'),
(26, 'ilham', '123', 'ilhamsyahputra', '03231312');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_todolist`
--
ALTER TABLE `tb_todolist`
  ADD PRIMARY KEY (`id_list`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id_matkul` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_todolist`
--
ALTER TABLE `tb_todolist`
  MODIFY `id_list` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
