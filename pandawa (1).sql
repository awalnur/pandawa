-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2022 at 11:41 AM
-- Server version: 8.0.29-0ubuntu0.20.04.3
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
-- Database: `pandawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `npm` varchar(15) NOT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL,
  `foto_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pertanyaan`
--

CREATE TABLE `jenis_pertanyaan` (
  `idjenis_pertanyaan` int NOT NULL,
  `jenis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_pertanyaan`
--

INSERT INTO `jenis_pertanyaan` (`idjenis_pertanyaan`, `jenis`) VALUES
(1, 'Kepribadian'),
(2, 'Pedagogik'),
(3, 'Profesional'),
(4, 'Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `kode_matkul` varchar(14) DEFAULT NULL,
  `npm` varchar(45) DEFAULT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id_ks` int NOT NULL,
  `npm` varchar(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `kritiksaran` text NOT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makul`
--

CREATE TABLE `makul` (
  `idmakul` varchar(14) NOT NULL,
  `matkul` varchar(45) DEFAULT NULL,
  `semester` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` int NOT NULL,
  `nama_mhs` varchar(45) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `idprodi` int DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama_mhs`, `angkatan`, `idprodi`, `password`) VALUES
(12230, 'nama saya', '2019', 1, '$2y$10$3xqIcuKC08wapn5//FmKKe1aSs2lt5kX2Gni0xO62A3vRfcc9QFwK');

-- --------------------------------------------------------

--
-- Table structure for table `mhs_kelas`
--

CREATE TABLE `mhs_kelas` (
  `id_kelasmhs` int NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_kelas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `id_pertanyaan` int NOT NULL,
  `npm` int NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nilai` int NOT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int NOT NULL,
  `idjenis_pertanyaan` int NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`idpertanyaan`, `idjenis_pertanyaan`, `pertanyaan`) VALUES
(1, 1, 'Adil dalam memperlakukan mahasiswa'),
(2, 1, 'Kearifan dalam mengambil keputusan'),
(3, 1, 'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),
(4, 1, 'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),
(5, 1, 'Kewibawaan sebagai pribadi dosen');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` int NOT NULL,
  `nama_prodi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `jenis_pertanyaan`
--
ALTER TABLE `jenis_pertanyaan`
  ADD PRIMARY KEY (`idjenis_pertanyaan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`idmakul`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mhs_kelas`
--
ALTER TABLE `mhs_kelas`
  ADD PRIMARY KEY (`id_kelasmhs`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mhs_kelas`
--
ALTER TABLE `mhs_kelas`
  MODIFY `id_kelasmhs` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `idprodi` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
