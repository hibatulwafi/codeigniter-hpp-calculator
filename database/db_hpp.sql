-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 06:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `brand`, `nama_barang`) VALUES
(1, 'WB001', 'Webber', 'Webber 2 Tungku'),
(2, 'GJ003', 'Gorenje', 'Gorenje 2 Pintu'),
(4, 'BB011', 'Bo Concept', 'Sofa B&B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_import`
--

CREATE TABLE `tb_import` (
  `id_import` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `value` double NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_import`
--

INSERT INTO `tb_import` (`id_import`, `id_barang`, `qty`, `value`, `tanggal_input`) VALUES
(4, 1, 10, 55000000, '2023-06-01'),
(5, 2, 1, 45000000, '2023-06-17'),
(6, 4, 1, 2000000, '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` int(1) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `email`, `username`, `password`, `no_telp`, `nama_lengkap`, `foto`, `aktif`, `level`) VALUES
(2, 'sales@email.com', 'sales', '$2a$12$qkeP7sDBy4aBT8dS8sfJi.uFEDSd.QleeG4rt1/Js8H7D3kflnMXy', '085863046869', 'Sales Admin', 'github.jpg', 1, 1),
(4, 'import@email.com', 'import', '$2a$12$qkeP7sDBy4aBT8dS8sfJi.uFEDSd.QleeG4rt1/Js8H7D3kflnMXy', '085863046869', 'Import Admin', 'github.jpg', 1, 2),
(5, 'management@email.com', 'management', '$2a$12$qkeP7sDBy4aBT8dS8sfJi.uFEDSd.QleeG4rt1/Js8H7D3kflnMXy', '085863046869', 'Management', 'github.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales`
--

CREATE TABLE `tb_sales` (
  `id_sales` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `sales` varchar(50) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sales`
--

INSERT INTO `tb_sales` (`id_sales`, `id_barang`, `nama_customer`, `harga_jual`, `qty`, `value`, `sales`, `tanggal_transaksi`) VALUES
(1, 4, 'Mariska', 5500000, 2, 11000000, 'Viska', '2023-06-07'),
(3, 4, 'Wafi', 2400000, 1, 2400000, 'Samuel', '2023-06-08'),
(4, 2, 'Henny', 51000000, 1, 51000000, 'Wafi', '2023-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_simulasi`
--

CREATE TABLE `tb_simulasi` (
  `id_simulasi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_simulasi`
--

INSERT INTO `tb_simulasi` (`id_simulasi`, `id_barang`, `harga_jual`, `unit`) VALUES
(1, 1, 6000000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_import`
--
ALTER TABLE `tb_import`
  ADD PRIMARY KEY (`id_import`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `tb_simulasi`
--
ALTER TABLE `tb_simulasi`
  ADD PRIMARY KEY (`id_simulasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_import`
--
ALTER TABLE `tb_import`
  MODIFY `id_import` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_sales`
--
ALTER TABLE `tb_sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_simulasi`
--
ALTER TABLE `tb_simulasi`
  MODIFY `id_simulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
