-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2021 at 01:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_berobat`
--

CREATE TABLE `jenis_berobat` (
  `id` int(30) NOT NULL,
  `jenis_pasien` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_berobat`
--

INSERT INTO `jenis_berobat` (`id`, `jenis_pasien`) VALUES
(1, 'PASIEN POLI UMUM'),
(2, 'PASIEN POLI GIGI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `id_dokter` int(30) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_dokter` varchar(10) NOT NULL,
  `no_hp` int(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`id_dokter`, `nama_dokter`, `alamat`, `jenis_dokter`, `no_hp`, `foto`) VALUES
(1, 'dr. Ni Made Febriani Suprapti', 'qwer', 'umum', 8882, '1-resize.jpg'),
(5, 'dr Qamara Kalehismaningrat', 'ttt', 'umum', 8786472, '2.jpg'),
(11, 'dr. Safitri Yuli Istiarini', 'aaa', 'umum', 81803, '135215_sssc1.jpg'),
(12, 'dr. I Wayan Suparthanaya', 'hhh', 'umum', 888, '3.jpg'),
(13, 'drg. Evi Maria', 'sds', 'gigi', 8900, '56bebe68-da59-461d-b55a-491d598b71d5_43.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(30) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `hari` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `waktu`, `hari`) VALUES
(1, 'pagi 08:00 - 14:00 Wita', 'senin, rabu, jumat'),
(2, 'pagi 08:00 - 14:00 Wita', 'selasa, kamis, sabtu'),
(3, 'sore 15:00 - 21:00 Wita', 'senin, rabu,jumat'),
(4, 'sore 15:00 - 21:00 Wita', 'selasa, kamis,sabtu'),
(5, 'sore 17:00 - 21:00', 'senin s/d sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_BPJS` int(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `id_user`, `nama_pasien`, `alamat`, `no_BPJS`, `no_hp`) VALUES
(9, 8, 'qweqwe', 'qweqwe', 8908908, '809809809'),
(10, 9, 'Bulan Isma Sawitri', 'Karang Tapen', 1190397857, '08814802233');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_jadwal`
--

CREATE TABLE `tbl_transaksi_jadwal` (
  `id_transaksi_jadwal` int(30) NOT NULL,
  `id_dokter` int(30) NOT NULL,
  `id_jadwal` int(30) NOT NULL,
  `id_jenis_berobat` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi_jadwal`
--

INSERT INTO `tbl_transaksi_jadwal` (`id_transaksi_jadwal`, `id_dokter`, `id_jadwal`, `id_jenis_berobat`, `keterangan`) VALUES
(3, 10, 2, 2, 'kjhjkhjk'),
(5, 5, 2, 0, ''),
(6, 11, 2, 0, ''),
(7, 12, 4, 0, ''),
(8, 1, 1, 0, ''),
(10, 13, 5, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_pasien`
--

CREATE TABLE `tbl_transaksi_pasien` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_berobat` int(11) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi_pasien`
--

INSERT INTO `tbl_transaksi_pasien` (`id`, `id_user`, `id_jenis_berobat`, `tanggal_daftar`, `keterangan`) VALUES
(5, 8, 1, '2021-06-24 16:00:00', 'qwe'),
(8, 1, 1, '2021-06-23 16:00:00', 'asd'),
(9, 1, 1, '2021-06-23 16:00:00', 'wwww'),
(10, 9, 1, '2021-06-25 16:00:00', 'sakit flu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(2, 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user'),
(8, 'qweqwe', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', 'user'),
(9, 'bulanisma', '40ba91898e5274357dbf263fc3653c12671d9cf3', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_berobat`
--
ALTER TABLE `jenis_berobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_transaksi_jadwal`
--
ALTER TABLE `tbl_transaksi_jadwal`
  ADD PRIMARY KEY (`id_transaksi_jadwal`);

--
-- Indexes for table `tbl_transaksi_pasien`
--
ALTER TABLE `tbl_transaksi_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  MODIFY `id_dokter` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_transaksi_jadwal`
--
ALTER TABLE `tbl_transaksi_jadwal`
  MODIFY `id_transaksi_jadwal` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_transaksi_pasien`
--
ALTER TABLE `tbl_transaksi_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
