-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 11:26 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `no_ktp` varchar(50) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `nama_perusahaan`, `alamat`, `gender`, `no_telepon`, `no_ktp`, `password`, `role_id`) VALUES
(4, 'Joko Santoso', 'joko', 'test', 'Jl. Satu Pekanbaru', NULL, '0653246512', NULL, 'ec6a6536ca304edf844d1d248a4f08dc', 2),
(5, 'Darmawan', 'darmawan', '', 'Jl. Dua Pekanbaru', 'laki-laki', '07617623', '1423477324723', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(6, 'Andi', 'andi', '', 'Jakarta', 'laki-laki', '0217687634', '12747657463', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(7, 'Arif', 'admin', '', 'Pekanbaru', 'laki-laki', '065423624', '1764578345', '21232f297a57a5a743894a0e4a801fc3', 1),
(8, 'Bayu', 'bayu', '', 'Jl. Nangka Pekanbaru', 'laki-laki', '07612233', '14000756764735', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(9, 'Toni', 'toni', '', 'Bandung', 'laki-laki', '0835653243', '1753453265435', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(11, '123', '123', '123', '123', NULL, '123', NULL, '202cb962ac59075b964b07152d234b70', 0),
(12, 'abd', 'test', '', 'test', 'laki-laki', '123123', '123123', '098f6bcd4621d373cade4e832627b4f6', 2),
(13, 'test2', 'test2', '', 'testalamat', 'laki-laki', '123123', '123123', 'ad0234829205b9033196ba818f7a872b', 2),
(14, '123', '123', '123', '123', NULL, '123', NULL, '202cb962ac59075b964b07152d234b70', 2),
(15, '123', '123', '123', '123', NULL, '123', NULL, '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_tipe`, `status`, `harga`, `gambar`) VALUES
(1, 5, '0', 175000, 'test5.jpg'),
(2, 6, '1', 300000, 'test4.jpg'),
(4, 7, '1', 350000, 'test2.jpg'),
(5, 8, '1', 350000, ''),
(6, 9, '1', 500000, ''),
(7, 10, '1', 750000, '');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `jam_rental` time NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `harga` varchar(120) NOT NULL,
  `denda` varchar(120) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `status_pengembalian` varchar(50) NOT NULL,
  `status_rental` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
  `nama_tipe` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `kode_tipe`, `nama_tipe`) VALUES
(5, '1.5 ton', 'Komazu'),
(6, '3 ton', 'TCM'),
(7, '3.5 ton', 'Komatsu'),
(8, '3.5 ton', 'TCM'),
(9, '7 ton', 'TCM'),
(10, '10 ton', 'TCM');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `waktu_sewa` time(6) DEFAULT NULL,
  `harga` varchar(120) NOT NULL,
  `status_rental` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(120) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_customer`, `id_mobil`, `lama_sewa`, `tanggal_sewa`, `waktu_sewa`, `harga`, `status_rental`, `bukti_pembayaran`, `status_pembayaran`) VALUES
(16, 12, 1, 2, '2021-07-17', '16:23:00.000000', '175000', 'Belum Selesai', 'cv_pdf.jpeg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
