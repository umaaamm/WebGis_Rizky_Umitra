-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2018 at 02:26 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `password`, `level`) VALUES
(1, 'mam', 'fak', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gis`
--

CREATE TABLE `tbl_gis` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `pimpinan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jam_buka` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lon` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gis`
--

INSERT INTO `tbl_gis` (`id`, `nama_perusahaan`, `pimpinan`, `deskripsi`, `jam_buka`, `alamat`, `no_telp`, `lat`, `lon`, `gambar`) VALUES
(1, 'PT. Kompas Cyber Media', 'umam', 'mam', '90', 'mana aja ', '08992255445', '-7.6508023', '112.0022188', ''),
(2, 'Universitas Teknokrat Indonesia', 'Kurniawan Gigih Lutfi Umam', 'Perguruan Tinggi Teknokrat salah satu perguruan Perguruan Tinggi Teknokrat salah satu perguruan Perguruan Tinggi Teknokrat salah satu perguruan Perguruan Tinggi Teknokrat salah satu perguruan ', '09.00 - 12.00', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '08992255445', '-5.438316', '105.278057', ''),
(3, 'PT. Maju Mundur', 'Ninggar Parashtiwi', 'ini adalah padang', '09.00 - 12.00', 'Padang', '085758547924', '-0.144380', '100.952902', ''),
(5, 'PT UMAM', 'Kurniawan Gigih Lutfi Umam', 'dfs', '09.00 - 12.00', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '085758547924', '-7.360798', '111.7330538', 'Screen Shot 2018-03-14 at 09.41.39.png'),
(6, 'PT. Kompas Cyber Media', 'Kurniawan Gigih Lutfi Umam', 'fdaf', '09.00 - 12.00', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '085758547924', '-7.360798', '111.8330538', 'design.jpg'),
(7, 'Universitas Teknokrat Indonesia', 'Kurniawan Gigih Lutfi Umam', 'dfs', 'ds', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '085758547924', '-7.360798', '131.7330538', 'designq.jpg'),
(8, 'Universitas Teknokrat Indonesia', 'f', 'f', 'f', 'f', '085758547924', '-7.360798', '111.7330538', 'editla.jpg'),
(9, 'fafda', 'ad', 'fdffaf', '09.00 - 12.00', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '085758547924', '-7.360798', '101.7330538', 'Screen Shot 2018-03-14 at 09.41.39.png'),
(10, 'af', 'Kurniawan Gigih Lutfi Umam', 'adf', '09.00 - 12.00', 'Jln. R.A Kartini No. 36 Yukum jaya Terbanggi Besar Lamteng\r\nBandar Jaya', '085758547924', '-7.360798', '113.7330538', 'editla.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gis`
--
ALTER TABLE `tbl_gis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_gis`
--
ALTER TABLE `tbl_gis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
