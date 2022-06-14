-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 09:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siak`
--

-- --------------------------------------------------------

--
-- Table structure for table `aye_dosen`
--

CREATE TABLE `aye_dosen` (
  `id_dosen` int(11) NOT NULL,
  `kode_dosen` varchar(10) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `foto_dosen` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aye_dosen`
--

INSERT INTO `aye_dosen` (`id_dosen`, `kode_dosen`, `nidn`, `nama_dosen`, `foto_dosen`, `password`) VALUES
(1, 'DS123', '298767', 'Sumiati', 'foto - Copy.png', 'sumiati');

-- --------------------------------------------------------

--
-- Table structure for table `aye_fakultas`
--

CREATE TABLE `aye_fakultas` (
  `id_fakultas` int(2) NOT NULL,
  `fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aye_fakultas`
--

INSERT INTO `aye_fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'Fakultas Pendidikan Matematika dan Ilmu Pengetahuan Alam'),
(2, 'Fakultas Bahasa'),
(3, 'Ilmu Pendidikan'),
(4, 'Bahasa dan Sastra'),
(5, 'Sosiall');

-- --------------------------------------------------------

--
-- Table structure for table `aye_krs`
--

CREATE TABLE `aye_krs` (
  `id_krs` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aye_krs`
--

INSERT INTO `aye_krs` (`id_krs`, `id_mhs`, `id_matkul`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aye_matkul`
--

CREATE TABLE `aye_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(255) DEFAULT NULL,
  `matkul` varchar(255) DEFAULT NULL,
  `sks` int(3) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `smt` int(2) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aye_matkul`
--

INSERT INTO `aye_matkul` (`id_matkul`, `kode_matkul`, `matkul`, `sks`, `kategori`, `smt`, `id_prodi`) VALUES
(1, 'MK123', 'Pemrograman Internet', 3, 'Wajib', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aye_mhs`
--

CREATE TABLE `aye_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_mhs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aye_mhs`
--

INSERT INTO `aye_mhs` (`id_mhs`, `nim`, `nama_mhs`, `id_prodi`, `password`, `foto_mhs`) VALUES
(1, 1906200, 'Hikaru Yaotome', 2, 'hikaganteng', 'foto - Copy.png'),
(3, 12345, 'Kodok', 1, 'kodok', 'foto - Copy.png');

-- --------------------------------------------------------

--
-- Table structure for table `aye_prodi`
--

CREATE TABLE `aye_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(2) DEFAULT NULL,
  `kode_prodi` varchar(10) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `jenjang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aye_prodi`
--

INSERT INTO `aye_prodi` (`id_prodi`, `id_fakultas`, `kode_prodi`, `prodi`, `jenjang`) VALUES
(1, 1, 'SI', 'Sistem Informasi', 'S2'),
(2, 1, 'PIK', 'Pendidikan Ilmu Komputer', 'S1'),
(4, 5, 'HI', 'Hubungan Internasional', 'S1'),
(5, 4, 'BJ', 'Bahasa Jepang', 'S2');

-- --------------------------------------------------------

--
-- Table structure for table `aye_user`
--

CREATE TABLE `aye_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aye_user`
--

INSERT INTO `aye_user` (`id_user`, `nama_user`, `username`, `password`, `foto`) VALUES
(1, 'Ayesha Aprilia', 'admin', 'admin', 'foto.png'),
(2, 'Macan', 'macan', 'macan', '1622612262_30fbcb67cc5ec0154fc0.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aye_dosen`
--
ALTER TABLE `aye_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `aye_fakultas`
--
ALTER TABLE `aye_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `aye_krs`
--
ALTER TABLE `aye_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `aye_matkul`
--
ALTER TABLE `aye_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `aye_mhs`
--
ALTER TABLE `aye_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `aye_prodi`
--
ALTER TABLE `aye_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `aye_user`
--
ALTER TABLE `aye_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aye_dosen`
--
ALTER TABLE `aye_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aye_fakultas`
--
ALTER TABLE `aye_fakultas`
  MODIFY `id_fakultas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aye_krs`
--
ALTER TABLE `aye_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aye_matkul`
--
ALTER TABLE `aye_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aye_mhs`
--
ALTER TABLE `aye_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aye_prodi`
--
ALTER TABLE `aye_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `aye_user`
--
ALTER TABLE `aye_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
