-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 01:45 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  `id_akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_admin`
--

INSERT INTO `wo_admin` (`id_admin`, `username`, `nama`, `password`, `created`, `last_login`, `id_akses`) VALUES
(1, 'admin', 'ddmmyy', '$2y$10$8RX/2CCQdwCYXuuF0WBay.h7AFCRXlSLODX0jKrBYrZFIcVraw0PO', '2019-03-13 09:41:32', '2019-06-07 12:00:45', 1),
(2, 'amailia', 'ddmmyy', '$2y$10$1G8DgVbW9yfo5yS334IEz.U1ZM1oDuYb9XiPUxGYvvOOxwT63w2hG', '2019-06-02 05:10:41', '2019-07-01 07:07:20', 2);

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
  `id_pemesanan` int(5) NOT NULL,
  `id_include` int(3) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `harga_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_detail_include`
--

INSERT INTO `wo_detail_include` (`id_detail_include`, `id_pemesanan`, `id_include`, `jumlah`, `harga_total`) VALUES
(2, 4, 6, 3, 1200000),
(3, 4, 6, 1, 250000),
(4, 5, 6, 100, 8000000);

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
(6, 'Tenda', 55000, 'meter', 'Tenda.jpg'),
(7, 'Panggung musik 4x4 ', 500000, 'meter', 'Panggung_musik_4x4_.jpg'),
(8, 'Photobooth Bunga Plastik', 1500000, 'paket', 'Photobooth_Bunga_Plastik.jpg');

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
(1, 'gold 3', 1, 'Pelaminan (8m),Mini Garden,Standing Flower (5),Standing Flower jalan (4),Karpet Standar Pelaminan,Red Karpet (karpet jalan),Kotak Angpau (2),Meja Terima Tamu (2),Display/Photobooth, Meja & Kursi Akad Nikah,Gapura Pintu Masuk', 15500000, 'gold_3.jpg'),
(2, 'gold 2', 1, 'Pelaminan (8m),Background pelaminan Hitam,Mini Garden,Standing Flower (5),Standing Flower jalan (6),Karpet Pelaminan Bunga,Red Karpet (karpet jalan),Pohon (1),Kotak Angpau (2),Meja Terima Tamu (2),Buku Tamu (2),Display/Photobooth,Meja & Kursi Akad Nikah,Gapura Pintu Masuk,Ruang VIP', 25500000, 'gold_2.jpg'),
(3, 'gold 1', 1, 'Pelaminan (8m),Background pelaminan Hitam,Mini Garden,Standing Flower (7),Standing Flower jalan (6),Karpet Pelaminan Bunga,Red Karpet (karpet jalan),Pohon (2),Kotak Angpau (3),Background Meja Tamu (2),Meja Terima Tamu (2),Buku Tamu (2),Display/Photobooth,Meja & Kursi Akad Nikah,Gapura Pintu Masuk,Gapura Tengah,Ruang VIP', 35500000, 'gold_1.jpg'),
(4, 'PAKET SILVER tanpa Rias 2', 2, 'Pelaminan (6m),Standing Flower (5),Mini Garden,Standing Flower Jalan (4),Kotak Angpau (2),Gapura Pintu Masuk,Meja Terima Tamu (1),Buku Tamu (1),Tenda ukuran 6x16m,Warna pelapon Standart,Kursi Stanlis + Sarung (100),Piring Sendok Garpu (100),Langseng (1),Kuali besar (1),Kompor mawar besar (1),RollTop Soup (1),Pemanas RollTop (5),Kipas Blower (2),Extra Meja Kotak (4),Gubugan (2),Prasmanan (1 baris)', 17900000, 'PAKET_SILVER_tanpa_Rias_2.jpg'),
(5, 'PAKET SILVER tanpa Rias 1', 2, 'Pelaminan (8m)\r\nStanding Flower (5)\r\nMini Garden\r\nStanding Flower Jalan (4)\r\nDekor pohon\r\nRed Karpet\r\nKotak Angpau (2)\r\nGapura Pintu Masuk\r\nMeja Terima Tamu (2)\r\nBuku tamu (2)\r\nDisplay/Photobooth\r\nMeja & kursi Akad\r\n\r\nTenda ukuran 8x16m\r\nWarna pelapon Standart\r\nKursi Pultura + Sarung (100)\r\nPiring Sendok Garpu (150)\r\nLangseng (1)\r\nKuali besar (1)\r\nKompor mawar besar (1)\r\nRollTop Soup (1)\r\nPemanas RollTop (5)\r\nKipas Blower (2)\r\nMeja bundar (3)\r\nExtra Meja Kotak (2)\r\nGubugan (3)\r\nPrasmanan (1 baris)\r\nFull karpet', 21900000, 'PAKET_SILVER_tanpa_Rias_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wo_pemesanan`
--

CREATE TABLE `wo_pemesanan` (
  `id_pemesanan` int(5) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_package` int(3) NOT NULL,
  `id_detail_include_pemesanan` int(3) DEFAULT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `tanggal_booking` date NOT NULL,
  `total_uang_masuk` double NOT NULL,
  `total_uang_bayar` double NOT NULL,
  `foto_bukti` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_pemesanan`
--

INSERT INTO `wo_pemesanan` (`id_pemesanan`, `id_user`, `id_package`, `id_detail_include_pemesanan`, `tanggal_pemesanan`, `tanggal_booking`, `total_uang_masuk`, `total_uang_bayar`, `foto_bukti`, `status`) VALUES
(4, 13, 2, 0, '2019-06-06', '2019-06-06', 213, 111, '1_2019-06-06.jpg', 1),
(5, 13, 1, 0, '2019-06-06', '2019-06-06', 1212, 1232131, '5_2019-06-06.jpg', 1),
(6, 14, 2, 6, '2019-06-06', '2019-06-13', 1000000, 12000000, '6_2019-06-06.jpg', 1),
(7, 16, 3, 7, '2019-06-29', '2020-06-29', 10000000, 1000000, '7_2019-06-29.png', 1);

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
(15, 'Hisyam Husein', 'Jakarta', '1996-02-27', 'Jatijajar, Depok', '081905096841', 'Hisyam_Husein_081905096841.jpg'),
(16, 'Amailia cahya', 'bogor', '1996-05-24', 'Bojonggede', '085885468865', 'Amailia_cahya_085885468865.jpg'),
(17, 'Dewi Rizka', 'Bogor', '2001-08-28', 'Bojonggede', '089630240330', 'Dewi_Rizka_089630240330.jpg');

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
  ADD KEY `id_detail_include_pemesanan` (`id_pemesanan`),
  ADD KEY `id_detail_include_include` (`id_include`);

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
  ADD KEY `id_user_pemesanan` (`id_user`,`id_package`,`id_detail_include_pemesanan`),
  ADD KEY `fk_pemesanan_package` (`id_package`),
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
  MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wo_user`
--
ALTER TABLE `wo_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wo_admin`
--
ALTER TABLE `wo_admin`
  ADD CONSTRAINT `fk_admin_akses` FOREIGN KEY (`id_akses`) REFERENCES `wo_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wo_detail_include`
--
ALTER TABLE `wo_detail_include`
  ADD CONSTRAINT `fk_detail_include_include` FOREIGN KEY (`id_include`) REFERENCES `wo_include` (`id_include`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_include_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `wo_pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wo_pemesanan`
--
ALTER TABLE `wo_pemesanan`
  ADD CONSTRAINT `fk_pemesanan_package` FOREIGN KEY (`id_package`) REFERENCES `wo_package` (`id_package`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pemesanan_user` FOREIGN KEY (`id_user`) REFERENCES `wo_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
