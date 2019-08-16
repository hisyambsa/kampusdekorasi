-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2019 at 09:01 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wo_amai`
--

-- --------------------------------------------------------

--
-- Table structure for table `wo_admin`
--

CREATE TABLE `wo_admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `id_akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_admin`
--

INSERT INTO `wo_admin` (`id_admin`, `username`, `nama`, `password`, `created`, `last_login`, `id_akses`) VALUES
(1, 'admin', 'ddmmyy', '$2y$10$8RX/2CCQdwCYXuuF0WBay.h7AFCRXlSLODX0jKrBYrZFIcVraw0PO', '2019-03-13 09:41:32', '2019-06-07 12:00:45', 1),
(2, 'amailia', 'ddmmyy', '$2y$10$1G8DgVbW9yfo5yS334IEz.U1ZM1oDuYb9XiPUxGYvvOOxwT63w2hG', '2019-06-02 05:10:41', '2019-07-15 09:57:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wo_akses`
--

CREATE TABLE `wo_akses` (
  `id_akses` int(2) NOT NULL,
  `nama_akses` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grup` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_akses`
--

INSERT INTO `wo_akses` (`id_akses`, `nama_akses`, `grup`) VALUES
(1, 'admin', 'admin'),
(2, 'pengelola', 'pengelola');

-- --------------------------------------------------------

--
-- Table structure for table `wo_detail_include`
--

CREATE TABLE `wo_detail_include` (
  `id_detail_include` int(3) NOT NULL,
  `id_detail_include_pemesanan` int(5) NOT NULL,
  `id_detail_include_include` int(3) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_detail_include`
--

INSERT INTO `wo_detail_include` (`id_detail_include`, `id_detail_include_pemesanan`, `id_detail_include_include`, `jumlah`, `harga_total`) VALUES
(1, 2, 8, 2, 3000000),
(2, 2, 7, 1, 500000),
(3, 2, 6, 10, 550000),
(4, 3, 7, 1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `wo_include`
--

CREATE TABLE `wo_include` (
  `id_include` int(3) NOT NULL,
  `nama_include` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_include` double NOT NULL,
  `satuan_include` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_include` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_include`
--

INSERT INTO `wo_include` (`id_include`, `nama_include`, `harga_include`, `satuan_include`, `foto_include`) VALUES
(6, 'Tenda', 55000, 'meter', 'asdf.jpg'),
(7, 'Panggung musik 4x4 ', 500000, 'meter', 'asdf.jpg'),
(8, 'Photobooth Bunga Plastik', 1500000, 'paket', 'asdf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wo_package`
--

CREATE TABLE `wo_package` (
  `id_package` int(3) NOT NULL,
  `nama_package` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_package` int(2) NOT NULL,
  `detail_package` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_package` double NOT NULL,
  `foto_package` varchar(73) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_package`
--

INSERT INTO `wo_package` (`id_package`, `nama_package`, `jenis_package`, `detail_package`, `harga_package`, `foto_package`) VALUES
(1, 'gold 3', 1, 'Pelaminan (8m),Mini Garden,Standing Flower (5),Standing Flower jalan (4),Karpet Standar Pelaminan,Red Karpet (karpet jalan),Kotak Angpau (2),Meja Terima Tamu (2),Display/Photobooth, Meja & Kursi Akad Nikah,Gapura Pintu Masuk', 15500000, 'asdf.jpg'),
(2, 'gold 2', 1, 'Pelaminan (8m),Background pelaminan Hitam,Mini Garden,Standing Flower (5),Standing Flower jalan (6),Karpet Pelaminan Bunga,Red Karpet (karpet jalan),Pohon (1),Kotak Angpau (2),Meja Terima Tamu (2),Buku Tamu (2),Display/Photobooth,Meja & Kursi Akad Nikah,Gapura Pintu Masuk,Ruang VIP', 25500000, 'zxcv.jpg'),
(3, 'gold 1', 1, 'Pelaminan (8m),Background pelaminan Hitam,Mini Garden,Standing Flower (7),Standing Flower jalan (6),Karpet Pelaminan Bunga,Red Karpet (karpet jalan),Pohon (2),Kotak Angpau (3),Background Meja Tamu (2),Meja Terima Tamu (2),Buku Tamu (2),Display/Photobooth,Meja & Kursi Akad Nikah,Gapura Pintu Masuk,Gapura Tengah,Ruang VIP', 35500000, 'asdf.jpg'),
(4, 'PAKET SILVER tanpa Rias 2', 2, 'Pelaminan (6m),Standing Flower (5),Mini Garden,Standing Flower Jalan (4),Kotak Angpau (2),Gapura Pintu Masuk,Meja Terima Tamu (1),Buku Tamu (1),Tenda ukuran 6x16m,Warna pelapon Standart,Kursi Stanlis + Sarung (100),Piring Sendok Garpu (100),Langseng (1),Kuali besar (1),Kompor mawar besar (1),RollTop Soup (1),Pemanas RollTop (5),Kipas Blower (2),Extra Meja Kotak (4),Gubugan (2),Prasmanan (1 baris)', 17900000, 'test.png'),
(5, 'PAKET SILVER tanpa Rias 1', 2, 'Pelaminan (8m),Standing Flower (5),Mini Garden,Standing Flower Jalan (4),Dekor pohon,Red Karpet,Kotak Angpau (2),Gapura Pintu Masuk,Meja Terima Tamu (2),Buku tamu (2),Display/Photobooth,Meja & kursi Akad,Tenda ukuran 8x16m,Warna pelapon Standart,Kursi Pultura + Sarung (100),Piring Sendok Garpu (150)Langseng (1),Kuali besar (1),Kompor mawar besar (1),RollTop Soup (1),Pemanas RollTop (5),Kipas Blower (2),Meja bundar (3),Extra Meja Kotak (2),Gubugan (3),Prasmanan (1 baris),Full karpet', 21900000, 'asdf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wo_pemesanan`
--

CREATE TABLE `wo_pemesanan` (
  `id_pemesanan` int(5) NOT NULL,
  `id_user_pemesanan` int(3) NOT NULL,
  `id_package_pemesanan` int(3) NOT NULL,
  `id_detail_include_pemesanan` int(3) DEFAULT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_booking` date NOT NULL,
  `total_uang_masuk` double DEFAULT NULL,
  `total_uang_bayar` double DEFAULT NULL,
  `foto_bukti` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_pemesanan`
--

INSERT INTO `wo_pemesanan` (`id_pemesanan`, `id_user_pemesanan`, `id_package_pemesanan`, `id_detail_include_pemesanan`, `tanggal_pemesanan`, `tanggal_booking`, `total_uang_masuk`, `total_uang_bayar`, `foto_bukti`, `status`) VALUES
(1, 15, 3, 1, '2019-07-26', '2019-07-28', 900000, 35500000, '1_2019-07-26.jpg', 2),
(2, 15, 5, 2, '2019-07-26', '2019-07-30', 2700000, 21900000, '1_2019-07-26.jpg', 2),
(3, 15, 4, 3, '2019-07-26', '2019-08-01', 4000000, 17900000, '3_2019-07-26.jpeg', 1),
(4, 15, 1, 4, '2019-07-26', '2019-07-28', 7000000, 15500000, '4_2019-07-26.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wo_user`
--

CREATE TABLE `wo_user` (
  `id_user` int(3) NOT NULL,
  `nama_user` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_identitas` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_user`
--

INSERT INTO `wo_user` (`id_user`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `foto_identitas`) VALUES
(13, 'dfsa', 'asrrr', '2019-06-04', 'FDSA', '2123', 'dfsa_2123.jpg'),
(14, 'qwert', 'qwert', '2010-06-03', 'qwertqwer', '234441231', 'qwert_234441231.png'),
(15, 'Hisyam Husein', 'Jakarta', '1996-02-27', 'Jatijajar, Depok', '123', 'Hisyam_Husein_081905096841.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wo_admin`
--
ALTER TABLE `wo_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `wo_akses`
--
ALTER TABLE `wo_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `wo_detail_include`
--
ALTER TABLE `wo_detail_include`
  ADD PRIMARY KEY (`id_detail_include`),
  ADD KEY `id_detail_include_pemesanan` (`id_detail_include_pemesanan`),
  ADD KEY `id_detail_include_include` (`id_detail_include_include`);

--
-- Indexes for table `wo_include`
--
ALTER TABLE `wo_include`
  ADD PRIMARY KEY (`id_include`);

--
-- Indexes for table `wo_package`
--
ALTER TABLE `wo_package`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `wo_pemesanan`
--
ALTER TABLE `wo_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user_pemesanan` (`id_user_pemesanan`,`id_package_pemesanan`,`id_detail_include_pemesanan`),
  ADD KEY `fk_pemesanan_package` (`id_package_pemesanan`),
  ADD KEY `fk_pemesanan_detail_include` (`id_detail_include_pemesanan`);

--
-- Indexes for table `wo_user`
--
ALTER TABLE `wo_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wo_admin`
--
ALTER TABLE `wo_admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wo_akses`
--
ALTER TABLE `wo_akses`
  MODIFY `id_akses` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wo_detail_include`
--
ALTER TABLE `wo_detail_include`
  MODIFY `id_detail_include` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wo_include`
--
ALTER TABLE `wo_include`
  MODIFY `id_include` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wo_package`
--
ALTER TABLE `wo_package`
  MODIFY `id_package` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wo_pemesanan`
--
ALTER TABLE `wo_pemesanan`
  MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wo_user`
--
ALTER TABLE `wo_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wo_admin`
--
ALTER TABLE `wo_admin`
  ADD CONSTRAINT `fk_user_akses` FOREIGN KEY (`id_akses`) REFERENCES `wo_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wo_detail_include`
--
ALTER TABLE `wo_detail_include`
  ADD CONSTRAINT `fk_detail_include_include` FOREIGN KEY (`id_detail_include_include`) REFERENCES `wo_include` (`id_include`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_include_pemesanan` FOREIGN KEY (`id_detail_include_pemesanan`) REFERENCES `wo_pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wo_pemesanan`
--
ALTER TABLE `wo_pemesanan`
  ADD CONSTRAINT `fk_pemesanan_package` FOREIGN KEY (`id_package_pemesanan`) REFERENCES `wo_package` (`id_package`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemesanan_user` FOREIGN KEY (`id_user_pemesanan`) REFERENCES `wo_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
