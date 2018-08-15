-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 10:19 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disposisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `nmr_surat` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `file` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `nama_bdg` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `username_user`, `tgl_surat`, `nmr_surat`, `tanggal`, `perihal`, `nama`, `file`, `keterangan`, `nama_bdg`, `created_at`, `updated_at`) VALUES
(39, 'qwawaaww', '2018-07-09', '0078', '2018-07-09', 'hak ', 'lol', 'Metode Eliminasi Gauss.pdf', 'laldljasdlkasdjlk', 'Sekretariat', '2018-07-09 07:21:10', '2018-07-09 04:37:15'),
(40, 'qwawaaww', '2018-07-09', '2017', '2018-07-09', 'hasda', 'sanj', 'POB-Pengajuan-Judul-Skripsi-2016_2.pdf', 'asdasdasda', 'Bidang Pelayanan Informasi dan Komunikasi', '2018-07-09 07:21:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama_bdg` varchar(100) NOT NULL,
  `username_user` varchar(20) NOT NULL,
  `password_user` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip`, `nama_user`, `jabatan`, `nama_bdg`, `username_user`, `password_user`) VALUES
('', '9080980', 'mas', 'anggota', 'Sekretariat', 'qwawaaww', 'sanja'),
('ADM12', '111', 'Sanja Avi', 'Anggota1', '', 'sanja90', 'sanja'),
('ID03', '9080980', 'mas', 'sanja', 'Bidang Aplikasi Dan Infrastruktur Informatika', 'qwawaaww', 'asdasdasd'),
('ID04', '9080808', 'maulana avi', 'anggota', 'Sekretariat', 'sanja', '0908');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
