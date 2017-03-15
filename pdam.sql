-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 06:07 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
('1', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `buktibayar`
--

CREATE TABLE `buktibayar` (
  `id` int(100) NOT NULL,
  `tanggal` text NOT NULL,
  `idpelanggan` int(100) NOT NULL,
  `buktibayar` text NOT NULL,
  `status` text NOT NULL,
  `idtagihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buktibayar`
--

INSERT INTO `buktibayar` (`id`, `tanggal`, `idpelanggan`, `buktibayar`, `status`, `idtagihan`) VALUES
(3, '30-12-2016', 123, '276908.png', 'Ter_verifikasi', '80032-122016'),
(4, '30-12-2016', 123, '871254.png', 'Belum Di Verifikasi', '55372-122016');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(100) NOT NULL,
  `namapelanggan` text NOT NULL,
  `alamat` text NOT NULL,
  `kontak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `namapelanggan`, `alamat`, `kontak`) VALUES
(123, 'asep', 'cimalaka', '13'),
(234, 'dede', 'as', 'asa');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `idtagihan` text NOT NULL,
  `tanggal` date NOT NULL,
  `besar` text NOT NULL,
  `idpelanggan` int(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`idtagihan`, `tanggal`, `besar`, `idpelanggan`, `status`) VALUES
('01148-122016', '2016-12-28', '10000', 234, 'SUDAH BAYAR'),
('80032-122016', '2016-12-30', '2000', 123, 'SUDAH BAYAR'),
('55372-122016', '2016-12-30', '100000', 123, 'BELUM BAYAR');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(3, 'dede', '81dc9bdb52d04dc20036dbd8313ed055', '234'),
(4, 'asep', '81dc9bdb52d04dc20036dbd8313ed055', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buktibayar`
--
ALTER TABLE `buktibayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buktibayar`
--
ALTER TABLE `buktibayar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
