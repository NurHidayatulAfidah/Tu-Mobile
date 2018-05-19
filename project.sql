-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Mei 2018 pada 11.34
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `ID_BARANG` varchar(10) NOT NULL,
  `ID_PEMASOK` varchar(10) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `NAMA_BARANG` char(25) DEFAULT NULL,
  `JENIS_BARANG` char(20) DEFAULT NULL,
  `HARGA_SATUAN` decimal(8,2) DEFAULT NULL,
  `STOCK_BARANG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`ID_BARANG`, `ID_PEMASOK`, `nama_file`, `NAMA_BARANG`, `JENIS_BARANG`, `HARGA_SATUAN`, `STOCK_BARANG`) VALUES
('1', '1', 'aqua-1-dus18.png', 'Aqua', 'Aqua Dos', '12.00', 78);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kurir`
--

CREATE TABLE `data_kurir` (
  `ID_KURIR` varchar(10) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `NAMA_KURIR` char(25) DEFAULT NULL,
  `ALAMAT_KURIR` char(50) DEFAULT NULL,
  `NO_HP_KURIR` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kurir`
--

INSERT INTO `data_kurir` (`ID_KURIR`, `nama_file`, `NAMA_KURIR`, `ALAMAT_KURIR`, `NO_HP_KURIR`) VALUES
('5', 'beti16.jpg', 'selvi', 'Jember, patrang', '085330220793');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemasok`
--

CREATE TABLE `data_pemasok` (
  `ID_PEMASOK` varchar(10) NOT NULL,
  `NAMA_PEMASOK` char(25) DEFAULT NULL,
  `ALAMAT` char(35) DEFAULT NULL,
  `NO_HP_PEMASOK` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pemasok`
--

INSERT INTO `data_pemasok` (`ID_PEMASOK`, `NAMA_PEMASOK`, `ALAMAT`, `NO_HP_PEMASOK`) VALUES
('1', 'beni', 'jember,mastip', '087557676767');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pembayaran`
--

CREATE TABLE `data_pembayaran` (
  `ID_PEMBAYARAN` varchar(10) NOT NULL,
  `ID_PEMESANAN` varchar(10) NOT NULL,
  `ID_PENGGUNA` varchar(10) NOT NULL,
  `HRG_TOTAL` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemesanan`
--

CREATE TABLE `data_pemesanan` (
  `ID_PEMESANAN` varchar(10) NOT NULL,
  `ID_PENGGUNA` varchar(10) NOT NULL,
  `ID_BARANG` varchar(10) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pemesanan`
--

INSERT INTO `data_pemesanan` (`ID_PEMESANAN`, `ID_PENGGUNA`, `ID_BARANG`, `JUMLAH`) VALUES
('12', '1', '1', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `ID_PENGGUNA` varchar(10) NOT NULL,
  `NAMA_PENGGUNA` char(25) DEFAULT NULL,
  `NO_HP_PENGGUNA` varchar(12) DEFAULT NULL,
  `ALAMAT_PENGGUNA` varchar(35) DEFAULT NULL,
  `USERNAME` char(20) DEFAULT NULL,
  `PASSWORD` varchar(15) DEFAULT NULL,
  `LEVEL` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengguna`
--

INSERT INTO `data_pengguna` (`ID_PENGGUNA`, `NAMA_PENGGUNA`, `NO_HP_PENGGUNA`, `ALAMAT_PENGGUNA`, `USERNAME`, `PASSWORD`, `LEVEL`) VALUES
('1', 'afifah', '085330220793', 'Jember, Patrang', 'Afifah', '123456', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengiriman`
--

CREATE TABLE `data_pengiriman` (
  `ID_PENGIRIMAN` varchar(10) NOT NULL,
  `ID_PEMESANAN` varchar(10) NOT NULL,
  `ID_KURIR` varchar(10) NOT NULL,
  `STATUS` enum('Terkirim','Proses Kirim','Belum Dikirim') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pengiriman`
--

INSERT INTO `data_pengiriman` (`ID_PENGIRIMAN`, `ID_PEMESANAN`, `ID_KURIR`, `STATUS`) VALUES
('1', '12', '5', 'Terkirim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD UNIQUE KEY `DATA_BARANG_PK` (`ID_BARANG`),
  ADD KEY `MEMASOK_FK` (`ID_PEMASOK`);

--
-- Indexes for table `data_kurir`
--
ALTER TABLE `data_kurir`
  ADD PRIMARY KEY (`ID_KURIR`),
  ADD UNIQUE KEY `DATA_KURIR_PK` (`ID_KURIR`);

--
-- Indexes for table `data_pemasok`
--
ALTER TABLE `data_pemasok`
  ADD PRIMARY KEY (`ID_PEMASOK`),
  ADD UNIQUE KEY `DATA_PEMASOK_PK` (`ID_PEMASOK`);

--
-- Indexes for table `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD UNIQUE KEY `DATA_PEMBAYARAN_PK` (`ID_PEMBAYARAN`),
  ADD KEY `PEMBAYARAN_FK` (`ID_PEMESANAN`),
  ADD KEY `MEMBAYAR_FK` (`ID_PENGGUNA`);

--
-- Indexes for table `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD PRIMARY KEY (`ID_PEMESANAN`),
  ADD UNIQUE KEY `DATA_PEMESANAN_PK` (`ID_PEMESANAN`),
  ADD KEY `MEMASUKKAN_FK` (`ID_BARANG`),
  ADD KEY `MELAKUKAN_FK` (`ID_PENGGUNA`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`),
  ADD UNIQUE KEY `DATA_PENGGUNA_PK` (`ID_PENGGUNA`);

--
-- Indexes for table `data_pengiriman`
--
ALTER TABLE `data_pengiriman`
  ADD PRIMARY KEY (`ID_PENGIRIMAN`),
  ADD UNIQUE KEY `DATA_PENGIRIMAN_PK` (`ID_PENGIRIMAN`),
  ADD KEY `MEMILIKI_FK` (`ID_PEMESANAN`),
  ADD KEY `FK_DATA_PEN_MENGIRIM_DATA_KUR` (`ID_KURIR`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `FK_DATA_BAR_MEMASOK_DATA_PEM` FOREIGN KEY (`ID_PEMASOK`) REFERENCES `data_pemasok` (`ID_PEMASOK`);

--
-- Ketidakleluasaan untuk tabel `data_pembayaran`
--
ALTER TABLE `data_pembayaran`
  ADD CONSTRAINT `FK_DATA_PEM_MEMBAYAR_DATA_PEN` FOREIGN KEY (`ID_PENGGUNA`) REFERENCES `data_pengguna` (`ID_PENGGUNA`),
  ADD CONSTRAINT `FK_DATA_PEM_PEMBAYARA_DATA_PEM` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `data_pemesanan` (`ID_PEMESANAN`);

--
-- Ketidakleluasaan untuk tabel `data_pemesanan`
--
ALTER TABLE `data_pemesanan`
  ADD CONSTRAINT `FK_DATA_PEM_MELAKUKAN_DATA_PEN` FOREIGN KEY (`ID_PENGGUNA`) REFERENCES `data_pengguna` (`ID_PENGGUNA`),
  ADD CONSTRAINT `FK_DATA_PEM_MEMASUKKA_DATA_BAR` FOREIGN KEY (`ID_BARANG`) REFERENCES `data_barang` (`ID_BARANG`);

--
-- Ketidakleluasaan untuk tabel `data_pengiriman`
--
ALTER TABLE `data_pengiriman`
  ADD CONSTRAINT `FK_DATA_PEN_MEMILIKI_DATA_PEM` FOREIGN KEY (`ID_PEMESANAN`) REFERENCES `data_pemesanan` (`ID_PEMESANAN`),
  ADD CONSTRAINT `FK_DATA_PEN_MENGIRIM_DATA_KUR` FOREIGN KEY (`ID_KURIR`) REFERENCES `data_kurir` (`ID_KURIR`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
