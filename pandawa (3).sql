-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2022 at 11:18 AM
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
  `nid` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL,
  `gelar` varchar(20) NOT NULL,
  `foto_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nid`, `nama_dosen`, `gelar`, `foto_dosen`) VALUES
('12344556', 'Dosen ABC D', '', 'default.png'),
('12344557', 'Dosen ABC7D', '', 'default.png'),
('12344558', 'Dosen ABs D', '', 'default.png'),
('12344559', 'Dosen ABs D', '', 'default.png'),
('12344560', 'Dosen AB45', '', 'default.png'),
('12344570', 'Dosen AB45D', '', 'default.png'),
('123466', 'sadasdasd', 'S,pd', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pertanyaan`
--

CREATE TABLE `jenis_pertanyaan` (
  `idjenis_pertanyaan` int NOT NULL,
  `jenis` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

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
  `nid` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_matkul`, `nid`, `kelas`, `thn_akademik`) VALUES
(1, 'MK.1234.12', '12344556', '2', '20212'),
(2, 'MK.1234.13', '12344557', '10', '20212'),
(3, 'MK.1234.15', '12344560', '1', '20212');

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id_ks` int NOT NULL,
  `nid` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `nim` varchar(11) NOT NULL,
  `kritiksaran` text NOT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kritiksaran`
--

INSERT INTO `kritiksaran` (`id_ks`, `nid`, `nim`, `kritiksaran`, `thn_akademik`) VALUES
(1, '12344560', '12230', 'asdasdasd', '20222'),
(2, '12344560', '12230', 'asdasdasd', '20222'),
(3, '12344560', '12230', 'asdasdasd', '20212'),
(4, '12344560', '12230', 'asdasdasd', '20212'),
(5, '12344556', '12230', 'asdasd', '20212'),
(6, '12344560', '12230', 'asd', '20212'),
(7, '12344556', '12230', 'sd', '20212'),
(8, '12344560', '12230', 'asdasdd', '20212'),
(9, '12344560', '12230', 'asdasdd', '20212'),
(10, '12344560', '12230', 'asdasdd', '20212'),
(11, '12344560', '12230', 'asdasdd', '20212'),
(12, '12344560', '12230', 'asdasdd', '20212'),
(13, '12344560', '12230', 'asdasdd', '20212'),
(14, '12344560', '12230', 'sd', '20212');

-- --------------------------------------------------------

--
-- Table structure for table `makul`
--

CREATE TABLE `makul` (
  `kode_matkul` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `matkul` varchar(45) DEFAULT NULL,
  `sks` varchar(3) NOT NULL,
  `semester` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `makul`
--

INSERT INTO `makul` (`kode_matkul`, `matkul`, `sks`, `semester`) VALUES
('MK.1234.12', 'Makul 1', '', '2'),
('MK.1234.13', 'Makul 2', '', '2'),
('MK.1234.15', 'Makul 3', '', '2'),
('MK.1234.53', 'Makul 54', '', '2'),
('MK.1234.54', 'Makul 5', '', '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mhs_kelas`
--

INSERT INTO `mhs_kelas` (`id_kelasmhs`, `nim`, `id_kelas`, `dinilai`) VALUES
(1, '12230', 3, 1),
(2, '12230', 1, 0),
(3, '12230', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `id_pertanyaan` int NOT NULL,
  `nid` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nilai` int NOT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_pertanyaan`, `nid`, `nim`, `nilai`, `thn_akademik`) VALUES
(1, 1, '12344560', '12230', 4, '20212'),
(2, 2, '12344560', '12230', 3, '20212'),
(3, 3, '12344560', '12230', 3, '20212'),
(4, 4, '12344560', '12230', 3, '20212'),
(5, 5, '12344560', '12230', 4, '20212'),
(6, 6, '12344560', '12230', 4, '20212'),
(7, 7, '12344560', '12230', 4, '20212'),
(8, 8, '12344560', '12230', 4, '20212'),
(9, 9, '12344560', '12230', 4, '20212'),
(10, 10, '12344560', '12230', 4, '20212'),
(11, 11, '12344560', '12230', 4, '20212'),
(12, 12, '12344560', '12230', 3, '20212'),
(13, 1, '12344556', '12230', 4, '20212'),
(14, 2, '12344556', '12230', 4, '20212'),
(15, 3, '12344556', '12230', 4, '20212'),
(16, 4, '12344556', '12230', 3, '20212'),
(17, 5, '12344556', '12230', 3, '20212'),
(18, 6, '12344556', '12230', 4, '20212'),
(19, 7, '12344556', '12230', 4, '20212'),
(20, 8, '12344556', '12230', 4, '20212'),
(21, 9, '12344556', '12230', 3, '20212'),
(22, 10, '12344556', '12230', 3, '20212'),
(23, 11, '12344556', '12230', 3, '20212'),
(24, 12, '12344556', '12230', 2, '20212'),
(25, 1, '12344560', '12230', 4, '20212'),
(26, 2, '12344560', '12230', 4, '20212'),
(27, 3, '12344560', '12230', 3, '20212'),
(28, 4, '12344560', '12230', 3, '20212'),
(29, 5, '12344560', '12230', 3, '20212'),
(30, 6, '12344560', '12230', 4, '20212'),
(31, 7, '12344560', '12230', 3, '20212'),
(32, 8, '12344560', '12230', 4, '20212'),
(33, 9, '12344560', '12230', 4, '20212'),
(34, 10, '12344560', '12230', 4, '20212'),
(35, 11, '12344560', '12230', 4, '20212'),
(36, 12, '12344560', '12230', 3, '20212'),
(37, 1, '12344556', '12230', 4, '20212'),
(38, 2, '12344556', '12230', 4, '20212'),
(39, 3, '12344556', '12230', 4, '20212'),
(40, 4, '12344556', '12230', 4, '20212'),
(41, 5, '12344556', '12230', 3, '20212'),
(42, 6, '12344556', '12230', 4, '20212'),
(43, 7, '12344556', '12230', 4, '20212'),
(44, 8, '12344556', '12230', 4, '20212'),
(45, 9, '12344556', '12230', 4, '20212'),
(46, 10, '12344556', '12230', 3, '20212'),
(47, 11, '12344556', '12230', 4, '20212'),
(48, 12, '12344556', '12230', 3, '20212'),
(49, 1, '12344560', '12230', 4, '20212'),
(50, 2, '12344560', '12230', 3, '20212'),
(51, 3, '12344560', '12230', 3, '20212'),
(52, 4, '12344560', '12230', 4, '20212'),
(53, 5, '12344560', '12230', 3, '20212'),
(54, 6, '12344560', '12230', 4, '20212'),
(55, 7, '12344560', '12230', 3, '20212'),
(56, 8, '12344560', '12230', 4, '20212'),
(57, 9, '12344560', '12230', 4, '20212'),
(58, 10, '12344560', '12230', 3, '20212'),
(59, 11, '12344560', '12230', 3, '20212'),
(60, 12, '12344560', '12230', 3, '20212'),
(61, 1, '12344560', '12230', 4, '20212'),
(62, 2, '12344560', '12230', 3, '20212'),
(63, 3, '12344560', '12230', 3, '20212'),
(64, 4, '12344560', '12230', 4, '20212'),
(65, 5, '12344560', '12230', 3, '20212'),
(66, 6, '12344560', '12230', 4, '20212'),
(67, 7, '12344560', '12230', 3, '20212'),
(68, 8, '12344560', '12230', 4, '20212'),
(69, 9, '12344560', '12230', 4, '20212'),
(70, 10, '12344560', '12230', 3, '20212'),
(71, 11, '12344560', '12230', 3, '20212'),
(72, 12, '12344560', '12230', 3, '20212'),
(73, 1, '12344560', '12230', 4, '20212'),
(74, 2, '12344560', '12230', 3, '20212'),
(75, 3, '12344560', '12230', 3, '20212'),
(76, 4, '12344560', '12230', 4, '20212'),
(77, 5, '12344560', '12230', 3, '20212'),
(78, 6, '12344560', '12230', 4, '20212'),
(79, 7, '12344560', '12230', 3, '20212'),
(80, 8, '12344560', '12230', 4, '20212'),
(81, 9, '12344560', '12230', 4, '20212'),
(82, 10, '12344560', '12230', 3, '20212'),
(83, 11, '12344560', '12230', 3, '20212'),
(84, 12, '12344560', '12230', 3, '20212'),
(85, 1, '12344560', '12230', 4, '20212'),
(86, 2, '12344560', '12230', 3, '20212'),
(87, 3, '12344560', '12230', 3, '20212'),
(88, 4, '12344560', '12230', 4, '20212'),
(89, 5, '12344560', '12230', 3, '20212'),
(90, 6, '12344560', '12230', 4, '20212'),
(91, 7, '12344560', '12230', 3, '20212'),
(92, 8, '12344560', '12230', 4, '20212'),
(93, 9, '12344560', '12230', 4, '20212'),
(94, 10, '12344560', '12230', 3, '20212'),
(95, 11, '12344560', '12230', 3, '20212'),
(96, 12, '12344560', '12230', 3, '20212'),
(97, 1, '12344560', '12230', 4, '20212'),
(98, 2, '12344560', '12230', 3, '20212'),
(99, 3, '12344560', '12230', 3, '20212'),
(100, 4, '12344560', '12230', 4, '20212'),
(101, 5, '12344560', '12230', 3, '20212'),
(102, 6, '12344560', '12230', 4, '20212'),
(103, 7, '12344560', '12230', 3, '20212'),
(104, 8, '12344560', '12230', 4, '20212'),
(105, 9, '12344560', '12230', 4, '20212'),
(106, 10, '12344560', '12230', 3, '20212'),
(107, 11, '12344560', '12230', 3, '20212'),
(108, 12, '12344560', '12230', 3, '20212'),
(109, 1, '12344560', '12230', 4, '20212'),
(110, 2, '12344560', '12230', 3, '20212'),
(111, 3, '12344560', '12230', 3, '20212'),
(112, 4, '12344560', '12230', 4, '20212'),
(113, 5, '12344560', '12230', 3, '20212'),
(114, 6, '12344560', '12230', 4, '20212'),
(115, 7, '12344560', '12230', 3, '20212'),
(116, 8, '12344560', '12230', 4, '20212'),
(117, 9, '12344560', '12230', 4, '20212'),
(118, 10, '12344560', '12230', 3, '20212'),
(119, 11, '12344560', '12230', 3, '20212'),
(120, 12, '12344560', '12230', 3, '20212'),
(121, 1, '12344560', '12230', 1, '20212'),
(122, 2, '12344560', '12230', 1, '20212'),
(123, 3, '12344560', '12230', 1, '20212'),
(124, 4, '12344560', '12230', 1, '20212'),
(125, 5, '12344560', '12230', 1, '20212'),
(126, 6, '12344560', '12230', 1, '20212'),
(127, 7, '12344560', '12230', 1, '20212'),
(128, 8, '12344560', '12230', 1, '20212'),
(129, 9, '12344560', '12230', 1, '20212'),
(130, 10, '12344560', '12230', 1, '20212'),
(131, 11, '12344560', '12230', 1, '20212'),
(132, 12, '12344560', '12230', 3, '20212');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int NOT NULL,
  `idjenis_pertanyaan` int NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`idprodi`, `nama_prodi`, `fakultas`) VALUES
(1, 'Akuntansi', 'Ekonomi dan Bisnis'),
(2, 'Manajemen', 'Ekonomi dan Bisnis'),
(3, 'Perbankan Syariah', 'Ekonomi dan Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `alamat`, `status`) VALUES
(1, 'admin', '$2y$10$u0.XDBNcIOnuoCcz/gFZfejrPTnlomyV8i/Icf1E3bwvnCrx.a.O.', 'admin', 'admin@admin', 'alamat admin', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nid`);

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
  ADD KEY `npm` (`nid`);

--
-- Indexes for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  ADD PRIMARY KEY (`id_ks`),
  ADD KEY `npm` (`nid`),
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
  ADD KEY `npm` (`nid`),
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id_ks` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mhs_kelas`
--
ALTER TABLE `mhs_kelas`
  MODIFY `id_kelasmhs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `dosen` (`nid`),
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
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `dosen` (`nid`),
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
