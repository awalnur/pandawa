-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2022 at 09:55 PM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `npm` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL,
  `foto_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`npm`, `nama_dosen`, `foto_dosen`) VALUES
('12344556', 'Dosen ABC D', 'default.png'),
('12344557', 'Dosen ABC7D', 'default.png'),
('12344558', 'Dosen ABs D', 'default.png'),
('12344559', 'Dosen ABs D', 'default.png'),
('12344560', 'Dosen AB45', 'default.png'),
('12344570', 'Dosen AB45D', 'default.png');

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
  `npm` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_matkul`, `npm`, `kelas`, `thn_akademik`) VALUES
(1, 'MK.1234.12', '12344556', '2', '20212'),
(2, 'MK.1234.13', '12344557', '10', '20212'),
(3, 'MK.1234.15', '12344560', '1', '20212');

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id_ks` int NOT NULL,
  `npm` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nim` varchar(11) NOT NULL,
  `kritiksaran` text NOT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makul`
--

CREATE TABLE `makul` (
  `kode_matkul` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `matkul` varchar(45) DEFAULT NULL,
  `semester` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `makul`
--

INSERT INTO `makul` (`kode_matkul`, `matkul`, `semester`) VALUES
('MK.1234.12', 'Makul 1', '2'),
('MK.1234.13', 'Makul 2', '2'),
('MK.1234.15', 'Makul 3', '2'),
('MK.1234.53', 'Makul 54', '2'),
('MK.1234.54', 'Makul 5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(11) NOT NULL,
  `nama_mhs` varchar(45) DEFAULT NULL,
  `angkatan` varchar(4) DEFAULT NULL,
  `idprodi` int DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama_mhs`, `angkatan`, `idprodi`, `password`) VALUES
('12230', 'nama saya', '2019', 1, '$2y$10$3xqIcuKC08wapn5//FmKKe1aSs2lt5kX2Gni0xO62A3vRfcc9QFwK');

-- --------------------------------------------------------

--
-- Table structure for table `mhs_kelas`
--

CREATE TABLE `mhs_kelas` (
  `id_kelasmhs` int NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_kelas` int NOT NULL,
  `dinilai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mhs_kelas`
--

INSERT INTO `mhs_kelas` (`id_kelasmhs`, `nim`, `id_kelas`, `dinilai`) VALUES
(1, '12230', 3, 0),
(2, '12230', 1, 0),
(3, '12230', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `id_pertanyaan` int NOT NULL,
  `npm` varchar(25) NOT NULL,
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
(5, 1, 'Kewibawaan sebagai pribadi dosen'),
(6, 2, 'Adil dalam memperlakukan mahasiswa'),
(7, 2, 'Kearifan dalam mengambil keputusan'),
(8, 2, 'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),
(9, 2, 'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),
(10, 2, 'Kewibawaan sebagai pribadi dosen'),
(11, 3, 'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),
(12, 4, 'Kewibawaan sebagai pribadi dosen');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` int NOT NULL,
  `nama_prodi` varchar(45) DEFAULT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`idprodi`, `nama_prodi`, `fakultas`) VALUES
(1, 'Akuntansi', 'Ekonomi dan Bisnis'),
(2, 'Manajemen', 'Ekonomi dan Bisnis'),
(3, 'Perbankan Syariah', 'Ekonomi dan Bisnis');

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
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD KEY `npm` (`npm`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `makul`
--
ALTER TABLE `makul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `idprodi` (`idprodi`);

--
-- Indexes for table `mhs_kelas`
--
ALTER TABLE `mhs_kelas`
  ADD PRIMARY KEY (`id_kelasmhs`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`),
  ADD KEY `npm` (`npm`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`),
  ADD KEY `idjenis_pertanyaan` (`idjenis_pertanyaan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mhs_kelas`
--
ALTER TABLE `mhs_kelas`
  MODIFY `id_kelasmhs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `idprodi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `dosen` (`npm`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `makul` (`kode_matkul`);

--
-- Constraints for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD CONSTRAINT `kritiksaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`);

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`idprodi`) REFERENCES `prodi` (`idprodi`);

--
-- Constraints for table `mhs_kelas`
--
ALTER TABLE `mhs_kelas`
  ADD CONSTRAINT `mhs_kelas_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`),
  ADD CONSTRAINT `mhs_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `dosen` (`npm`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`),
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`idpertanyaan`);

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`idjenis_pertanyaan`) REFERENCES `jenis_pertanyaan` (`idjenis_pertanyaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
