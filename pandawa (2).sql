-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2022 at 09:55 AM
-- Server version: 8.0.30-0ubuntu0.22.04.1
-- PHP Version: 8.1.10

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
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL,
  `gelar` varchar(20) NOT NULL,
  `foto_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nid`, `nama_dosen`, `gelar`, `foto_dosen`) VALUES
('12344556', 'Dosen ABC D', '', 'default.png'),
('12344557', 'Dosen ABC7D', '', 'default.png'),
('12344558', 'Dosen C', '', 'default.png'),
('12344559', 'Dosen0', '', 'default.png'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `kelas` varchar(45) DEFAULT NULL,
  `thn_akademik` varchar(6) NOT NULL,
  `idprodi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_matkul`, `nid`, `kelas`, `thn_akademik`, `idprodi`) VALUES
(1, 'MK.1234.12', '12344556', '2', '20212', 1),
(2, 'MK.1234.13', '12344557', '10', '20212', 1),
(3, 'MK.1234.15', '12344560', '1', '20212', 1),
(4, 'MK.1234.12', '12344560', '12', '20221', 1),
(5, 'MK.1234.12', '12344560', '12', '20221', 1),
(6, 'MK.1234.12', '12344560', '13', '20221', 1),
(7, 'MK.1234.12', '12344556', '4', '20221', 1),
(8, 'MK.1234.12', '12344558', '1', '20221', 1),
(9, 'MK.1234.12', '12344560', '3', '20221', 1),
(10, 'MK.1234.12', '12344560', '12', '20221', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE `kritiksaran` (
  `id_ks` int NOT NULL,
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nim` varchar(11) NOT NULL,
  `kritiksaran` text NOT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `kode_matkul` varchar(14) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `matkul` varchar(45) DEFAULT NULL,
  `sks` varchar(3) NOT NULL,
  `semester` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama_mhs`, `angkatan`, `idprodi`, `password`) VALUES
('12230', 'nama saya', '2019', 1, '$2y$10$3xqIcuKC08wapn5//FmKKe1aSs2lt5kX2Gni0xO62A3vRfcc9QFwK'),
('201915001', 'Mhs 1', '2019', 2, '$2y$10$filz8PkqZouv1.Gl29a.2ua5DMjEYdA.EVTnBE6eDdJIGGupRfAUG'),
('201915002', 'Mhs 2', '2019', 1, '$2y$10$jTYqSs1iVxhmltTdDmO0buNy27FBU4OEZqfKICrIbcv1aly3z./B2'),
('201915003', 'Mhs 3', '2019', 1, '$2y$10$uM9ct.807ApKSyuPQ/N44ORWnTysI/i.LgFChguyzFfYt/WsMovkS'),
('201915004', 'Mhs 4', '2019', 1, '$2y$10$.ZWi9sKIYHdoofNJD1UpsOprGxJQprdjnyh3rOGRhJ5cWqUBJr4LO'),
('201915005', 'Mhs 5', '2019', 1, '$2y$10$sh.FW/z/vHXoUSdTIjufYeKPGZJbz8.ag4GCYsqrnQdBXDL3X3xFe'),
('201915006', 'Mhs 6', '2019', 1, '$2y$10$ey9rFXqA1waUqQtMnuBENORajjH5B5yjryiK2p9SFOog4JUfOfkXO'),
('201915007', 'Mhs 7', '2019', 1, '$2y$10$iV1IdnHMSZjzW0Iev6vUe.sXLFH8OHKOb4K7m3DsRk./e2fklMyRS'),
('201915008', 'Mhs 8', '2019', 1, '$2y$10$nZO7oEotK8mSObnb0tjMGOTCha6kJOcY9LKMzlfLx1umkCP98vUOe'),
('201915009', 'Mhs 9', '2019', 1, '$2y$10$yNM/B1XTjybOdYycV7DlmedYZnlyVR10CdxlEF6zvVvdFKFDU7n3u'),
('201915010', 'Mhs 10', '2019', 1, '$2y$10$oJHC1F9zXtNbjI9EbQeCweQrs4nYPHr46K4wGX4.Qt.ElfQJf5pWC'),
('201915011', 'Mhs 11', '2019', 1, '$2y$10$8f8Ph.EaFrrz0QApYqg/YOLegADYmCwNK.dMlzL5tgZFGMeBkfgEu'),
('201915012', 'Mhs 12', '2019', 1, '$2y$10$zqNCS.kDcBb/rvCZ142KpO7ypW6oPwr5801Q3Ix1T6uOthEXXF3ye'),
('201915013', 'Mhs 13', '2019', 1, '$2y$10$L4AFx9dzIILkGjS.hW681eXC9zSi4yCzjFY2kNvJc4aJNaLAtPjT2'),
('201915014', 'Mhs 14', '2019', 1, '$2y$10$y34XMXtxGmSrySyl0gNl2u1XyeAgY5TPj1i0Sqrf5B8lVrkff7oQu');

-- --------------------------------------------------------

--
-- Stand-in structure for view `mhsprodi`
-- (See below for the actual view)
--
CREATE TABLE `mhsprodi` (
`angkatan` varchar(4)
,`fakultas` varchar(100)
,`idprodi` int
,`nama_mhs` varchar(45)
,`nama_prodi` varchar(45)
,`nim` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `mhs_kelas`
--

CREATE TABLE `mhs_kelas` (
  `id_kelasmhs` int NOT NULL,
  `nim` varchar(11) NOT NULL,
  `id_kelas` int NOT NULL,
  `dinilai` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `mhs_kelas`
--

INSERT INTO `mhs_kelas` (`id_kelasmhs`, `nim`, `id_kelas`, `dinilai`) VALUES
(1, '12230', 3, 1),
(2, '12230', 1, 0),
(3, '12230', 2, 1),
(4, '12230', 9, 0),
(5, '201915002', 9, 0),
(6, '201915003', 9, 0),
(7, '201915004', 9, 0),
(8, '12230', 10, 0),
(9, '201915002', 10, 0),
(10, '201915003', 10, 0),
(11, '201915004', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int NOT NULL,
  `id_pertanyaan` int NOT NULL,
  `nid` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nilai` int NOT NULL,
  `thn_akademik` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_pertanyaan`, `nid`, `nim`, `nilai`, `thn_akademik`) VALUES
(1, 1, '12344560', '12230', 4, '20221'),
(2, 2, '12344560', '201915002', 3, '20221'),
(3, 3, '12344560', '12230', 3, '20221'),
(4, 4, '12344560', '12230', 3, '20221'),
(5, 5, '12344560', '12230', 4, '20221'),
(6, 6, '12344560', '12230', 4, '20221'),
(7, 7, '12344560', '12230', 4, '20221'),
(8, 8, '12344560', '12230', 4, '20221'),
(9, 9, '12344560', '12230', 4, '20221'),
(10, 10, '12344560', '12230', 4, '20221'),
(11, 11, '12344560', '12230', 4, '20221'),
(12, 12, '12344560', '12230', 3, '20221'),
(13, 1, '12344556', '12230', 4, '20221'),
(14, 2, '12344556', '12230', 4, '20221'),
(15, 3, '12344556', '12230', 4, '20221'),
(16, 4, '12344556', '12230', 3, '20221'),
(17, 5, '12344556', '12230', 3, '20221'),
(18, 6, '12344556', '12230', 4, '20221'),
(19, 7, '12344556', '12230', 4, '20221'),
(20, 8, '12344556', '12230', 4, '20221'),
(21, 9, '12344556', '12230', 3, '20221'),
(22, 10, '12344556', '12230', 3, '20221'),
(23, 11, '12344556', '12230', 3, '20221'),
(24, 12, '12344556', '12230', 2, '20221'),
(25, 13, '12344560', '12230', 4, '20221'),
(26, 14, '12344560', '12230', 4, '20221'),
(27, 15, '12344560', '12230', 3, '20221'),
(28, 16, '12344560', '12230', 3, '20221'),
(29, 17, '12344560', '12230', 3, '20221'),
(30, 18, '12344560', '12230', 4, '20221'),
(31, 19, '12344560', '12230', 3, '20221'),
(32, 20, '12344560', '12230', 4, '20221'),
(33, 9, '12344560', '12230', 4, '20221'),
(34, 10, '12344560', '12230', 4, '20221'),
(35, 11, '12344560', '12230', 4, '20221'),
(36, 12, '12344560', '12230', 3, '20221'),
(37, 1, '12344556', '12230', 4, '20221'),
(38, 2, '12344556', '12230', 4, '20221'),
(39, 3, '12344556', '12230', 4, '20221'),
(40, 4, '12344556', '12230', 4, '20221'),
(41, 5, '12344556', '12230', 3, '20221'),
(42, 6, '12344556', '12230', 4, '20221'),
(43, 7, '12344556', '12230', 4, '20221'),
(44, 8, '12344556', '12230', 4, '20221'),
(45, 9, '12344556', '12230', 4, '20221'),
(46, 10, '12344556', '12230', 3, '20221'),
(47, 11, '12344556', '12230', 4, '20221'),
(48, 12, '12344556', '12230', 3, '20221'),
(49, 1, '12344560', '12230', 4, '20221'),
(50, 2, '12344560', '12230', 3, '20221'),
(51, 3, '12344560', '12230', 3, '20221'),
(52, 4, '12344560', '12230', 4, '20221'),
(53, 5, '12344560', '12230', 3, '20221'),
(54, 6, '12344560', '12230', 4, '20221'),
(55, 7, '12344560', '12230', 3, '20221'),
(56, 8, '12344560', '12230', 4, '20221'),
(57, 9, '12344560', '12230', 4, '20221'),
(58, 10, '12344560', '12230', 3, '20221'),
(59, 11, '12344560', '12230', 3, '20221'),
(60, 12, '12344560', '12230', 3, '20221'),
(61, 1, '12344560', '12230', 4, '20221'),
(62, 2, '12344560', '12230', 3, '20221'),
(63, 3, '12344560', '12230', 3, '20221'),
(64, 4, '12344560', '12230', 4, '20221'),
(65, 5, '12344560', '12230', 3, '20221'),
(66, 6, '12344560', '12230', 4, '20221'),
(67, 7, '12344560', '12230', 3, '20221'),
(68, 8, '12344560', '12230', 4, '20221'),
(69, 9, '12344560', '12230', 4, '20221'),
(70, 10, '12344560', '12230', 3, '20221'),
(71, 11, '12344560', '12230', 3, '20221'),
(72, 12, '12344560', '12230', 3, '20221'),
(73, 1, '12344560', '12230', 4, '20221'),
(74, 2, '12344560', '12230', 3, '20221'),
(75, 3, '12344560', '12230', 3, '20221'),
(76, 4, '12344560', '12230', 4, '20221'),
(77, 5, '12344560', '12230', 3, '20221'),
(78, 6, '12344560', '12230', 4, '20221'),
(79, 7, '12344560', '12230', 3, '20221'),
(80, 8, '12344560', '12230', 4, '20221'),
(81, 9, '12344560', '12230', 4, '20221'),
(82, 10, '12344560', '12230', 3, '20221'),
(83, 11, '12344560', '12230', 3, '20221'),
(84, 12, '12344560', '12230', 3, '20221'),
(85, 1, '12344560', '12230', 4, '20221'),
(86, 2, '12344560', '12230', 3, '20221'),
(87, 3, '12344560', '12230', 3, '20221'),
(88, 4, '12344560', '12230', 4, '20221'),
(89, 5, '12344560', '12230', 3, '20221'),
(90, 6, '12344560', '12230', 4, '20221'),
(91, 7, '12344560', '12230', 3, '20221'),
(92, 8, '12344560', '12230', 4, '20221'),
(93, 9, '12344560', '12230', 4, '20221'),
(94, 10, '12344560', '12230', 3, '20221'),
(95, 11, '12344560', '12230', 3, '20221'),
(96, 12, '12344560', '12230', 3, '20221'),
(97, 1, '12344560', '12230', 4, '20221'),
(98, 2, '12344560', '12230', 3, '20221'),
(99, 3, '12344560', '12230', 3, '20221'),
(100, 4, '12344560', '12230', 4, '20221'),
(101, 5, '12344560', '12230', 3, '20221'),
(102, 6, '12344560', '12230', 4, '20221'),
(103, 7, '12344560', '12230', 3, '20221'),
(104, 8, '12344560', '12230', 4, '20221'),
(105, 9, '12344560', '12230', 4, '20221'),
(106, 10, '12344560', '12230', 3, '20221'),
(107, 11, '12344560', '12230', 3, '20221'),
(108, 12, '12344560', '12230', 3, '20221'),
(109, 1, '12344560', '12230', 4, '20221'),
(110, 2, '12344560', '12230', 3, '20221'),
(111, 3, '12344560', '12230', 3, '20221'),
(112, 4, '12344560', '12230', 4, '20221'),
(113, 5, '12344560', '12230', 3, '20221'),
(114, 6, '12344560', '12230', 4, '20221'),
(115, 7, '12344560', '12230', 3, '20221'),
(116, 8, '12344560', '12230', 4, '20221'),
(117, 9, '12344560', '12230', 4, '20221'),
(118, 10, '12344560', '12230', 3, '20221'),
(119, 11, '12344560', '12230', 3, '20221'),
(120, 12, '12344560', '12230', 3, '20221'),
(121, 1, '12344560', '12230', 1, '20221'),
(122, 2, '12344560', '12230', 1, '20221'),
(123, 3, '12344560', '12230', 1, '20221'),
(124, 4, '12344560', '12230', 1, '20221'),
(125, 5, '12344560', '12230', 1, '20221'),
(126, 6, '12344560', '12230', 1, '20221'),
(127, 7, '12344560', '12230', 1, '20221'),
(128, 8, '12344560', '12230', 1, '20221'),
(129, 9, '12344560', '12230', 1, '20221'),
(130, 10, '12344560', '12230', 1, '20221'),
(131, 11, '12344560', '12230', 1, '20221'),
(132, 12, '12344560', '12230', 3, '20221');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `idpertanyaan` int NOT NULL,
  `idjenis_pertanyaan` int NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(12, 4, 'Kewibawaan sebagai pribadi dosen'),
(13, 3, 'Kearifan dalam mengambil keputusan'),
(14, 3, 'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),
(15, 3, 'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),
(16, 3, 'Kewibawaan sebagai pribadi dosen'),
(17, 4, 'Kearifan dalam mengambil keputusan'),
(18, 4, 'Kemampuan mengendalikan diri dalam berbagai situasi dan kondisi termasuk dalam pembelajaran online'),
(19, 4, 'Kemampuan menjadi contoh dalam bersikap dan berperilaku'),
(20, 4, 'Kewibawaan sebagai pribadi dosen');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` int NOT NULL,
  `nama_prodi` varchar(45) DEFAULT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `alamat`, `status`) VALUES
(1, 'admin', '$2y$10$u0.XDBNcIOnuoCcz/gFZfejrPTnlomyV8i/Icf1E3bwvnCrx.a.O.', 'admin', 'admin@admin', 'alamat admin', NULL);

-- --------------------------------------------------------

--
-- Structure for view `mhsprodi`
--
DROP TABLE IF EXISTS `mhsprodi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dev`@`%` SQL SECURITY DEFINER VIEW `mhsprodi`  AS SELECT `mhs`.`nim` AS `nim`, `mhs`.`nama_mhs` AS `nama_mhs`, `mhs`.`angkatan` AS `angkatan`, `prodi`.`nama_prodi` AS `nama_prodi`, `prodi`.`idprodi` AS `idprodi`, `prodi`.`fakultas` AS `fakultas` FROM (`mhs` join `prodi` on((`mhs`.`idprodi` = `prodi`.`idprodi`))) ;

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
  ADD KEY `npm` (`nid`),
  ADD KEY `idprodi` (`idprodi`);

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
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kritiksaran`
--
ALTER TABLE `kritiksaran`
  MODIFY `id_ks` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mhs_kelas`
--
ALTER TABLE `mhs_kelas`
  MODIFY `id_kelasmhs` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `idpertanyaan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
