-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 03:18 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daml`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `ID_BARANG` varchar(10) NOT NULL,
  `ID_PEMASOK` varchar(10) NOT NULL,
  `NAMA_BARANG` char(25) NOT NULL,
  `HARGA_SATUAN` decimal(8,2) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`ID_BARANG`, `ID_PEMASOK`, `NAMA_BARANG`, `HARGA_SATUAN`, `JUMLAH`, `file`) VALUES
('BR001', 'PM001', 'Aqua kemasan', '22000.00', 25, 'aqua_240ml.png'),
('BR002', 'PM001', 'Aqua 330 ml', '30000.00', 14, 'Aqua_330_ml.jpg'),
('BR003', 'PM001', 'Aqua 600 ml', '40000.00', 5, 'aqua_600ml.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_kurir`
--

CREATE TABLE `data_kurir` (
  `ID_KURIR` varchar(10) NOT NULL,
  `NAMA_KURIR` char(25) NOT NULL,
  `ALAMAT_KURIR` char(35) NOT NULL,
  `NO_HP_KURIR` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kurir`
--

INSERT INTO `data_kurir` (`ID_KURIR`, `NAMA_KURIR`, `ALAMAT_KURIR`, `NO_HP_KURIR`) VALUES
('KR001', 'Adi Wijaya', 'Sumbersari Jember', '081234596783'),
('KR002', 'Wahyu Eko', 'Jl. Jawa Jember', '087757234542');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemasok`
--

CREATE TABLE `data_pemasok` (
  `ID_PEMASOK` varchar(10) NOT NULL,
  `NAMA_PEMASOK` char(25) NOT NULL,
  `ALAMAT` char(35) NOT NULL,
  `NO_HP_PEMASOK` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemasok`
--

INSERT INTO `data_pemasok` (`ID_PEMASOK`, `NAMA_PEMASOK`, `ALAMAT`, `NO_HP_PEMASOK`) VALUES
('PM001', 'Andi Muhammad', 'Arjasa Jember', '081245376489'),
('PM002', 'Luki Nugroho', 'Ajung Jember', '089654328765');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemesanan`
--

CREATE TABLE `data_pemesanan` (
  `ID_PEMESANAN` varchar(10) NOT NULL,
  `ID_PENGGUNA` int(11) NOT NULL,
  `ID_BARANG` varchar(10) NOT NULL,
  `TGL_PESAN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `JUMLAH` int(11) NOT NULL,
  `HRG_TOTAL` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemesanan`
--

INSERT INTO `data_pemesanan` (`ID_PEMESANAN`, `ID_PENGGUNA`, `ID_BARANG`, `TGL_PESAN`, `JUMLAH`, `HRG_TOTAL`) VALUES
('PS001', 2, 'BR003', '2018-05-30 03:20:33', 2, '0.00'),
('PS002', 2, 'BR003', '2018-05-30 05:54:26', 3, '0.00');

--
-- Triggers `data_pemesanan`
--
DELIMITER $$
CREATE TRIGGER `pemesanan` AFTER INSERT ON `data_pemesanan` FOR EACH ROW BEGIN
    INSERT INTO data_pengiriman SET ID_PENGIRIMAN= NEW.ID_PEMESANAN, ID_PEMESANAN = NEW.ID_PEMESANAN, ID_KURIR = 'KR001', STATUS='Belum Dikirim';
    UPDATE data_barang SET JUMLAH = JUMLAH - NEW.JUMLAH WHERE ID_BARANG = NEW.ID_BARANG;
  END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tgl_pesan` BEFORE INSERT ON `data_pemesanan` FOR EACH ROW BEGIN
	IF NEW. TGL_PESAN = '0000-00-00 00:00:00' THEN
        SET NEW.TGL_PESAN = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `ID_PENGGUNA` int(11) NOT NULL,
  `NAMA_PENGGUNA` char(25) NOT NULL,
  `NO_HP_PENGGUNA` varchar(12) NOT NULL,
  `ALAMAT_PENGGUNA` varchar(35) NOT NULL,
  `USERNAME` char(20) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `LEVEL` enum('User','Admin') DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`ID_PENGGUNA`, `NAMA_PENGGUNA`, `NO_HP_PENGGUNA`, `ALAMAT_PENGGUNA`, `USERNAME`, `PASSWORD`, `LEVEL`) VALUES
(1, 'Muhammad Joni Kurniawan', '087654398290', 'Jember', 'Joniwan', '765', 'Admin'),
(2, 'Nia Kurnia', '081456342675', 'Jl. Jawa', 'Nia', '012', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengiriman`
--

CREATE TABLE `data_pengiriman` (
  `ID_PENGIRIMAN` int(11) NOT NULL,
  `ID_PEMESANAN` varchar(11) NOT NULL,
  `ID_KURIR` varchar(10) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Belum Dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengiriman`
--

INSERT INTO `data_pengiriman` (`ID_PENGIRIMAN`, `ID_PEMESANAN`, `ID_KURIR`, `STATUS`) VALUES
(1, 'PS001', 'KR002', 'Proses Pengiriman'),
(2, 'PS002', 'KR001', 'Belum Dikirim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `ID_PEMASOK` (`ID_PEMASOK`);

--
-- Indexes for table `data_kurir`
--
ALTER TABLE `data_kurir`
  ADD PRIMARY KEY (`ID_KURIR`);

--
-- Indexes for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
  ADD PRIMARY KEY (`ID_PEMASOK`);

--
-- Indexes for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD KEY `MEMASUKKAN_FK` (`ID_BARANG`),
  ADD KEY `MELAKUKAN_FK` (`ID_PENGGUNA`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`);

--
-- Indexes for table `data_pengiriman`
--
ALTER TABLE `data_pengiriman`
  ADD PRIMARY KEY (`ID_PENGIRIMAN`),
  ADD KEY `MEMILIKI_FK` (`ID_PEMESANAN`),
  ADD KEY `MENGIRIM_FK` (`ID_KURIR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `ID_PENGGUNA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_pengiriman`
--
ALTER TABLE `data_pengiriman`
  MODIFY `ID_PENGIRIMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `data_barang_ibfk_1` FOREIGN KEY (`ID_PEMASOK`) REFERENCES `data_pemasok` (`ID_PEMASOK`);

--
-- Constraints for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD CONSTRAINT `FK_DATA_PEM_MEMASUKKA_DATA_BAR` FOREIGN KEY (`ID_BARANG`) REFERENCES `data_barang` (`ID_BARANG`),
  ADD CONSTRAINT `data_pemesanan_ibfk_1` FOREIGN KEY (`ID_PENGGUNA`) REFERENCES `data_pengguna` (`ID_PENGGUNA`);

--
-- Constraints for table `data_pengiriman`
--
ALTER TABLE `data_pengiriman`
  ADD CONSTRAINT `FK_DATA_PEN_MENGIRIM_DATA_PEN` FOREIGN KEY (`ID_KURIR`) REFERENCES `data_kurir` (`ID_KURIR`),
  ADD CONSTRAINT `data_pengiriman_ibfk_1` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `data_pemesanan` (`ID_PEMESANAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
