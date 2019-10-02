-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 03:53 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kampusdekorasi`
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
(2, 'amailia', 'ddmmyy', '$2y$10$1G8DgVbW9yfo5yS334IEz.U1ZM1oDuYb9XiPUxGYvvOOxwT63w2hG', '2019-06-02 05:10:41', '2019-08-05 13:59:49', 2);

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
(4, 3, 7, 1, 500000),
(7, 8, 22, 5, 250000),
(8, 8, 21, 5, 150000),
(9, 8, 20, 20, 500000),
(10, 8, 19, 5, 1500000),
(11, 8, 18, 30, 300000),
(12, 8, 17, 50, 600000),
(13, 8, 16, 100, 150000),
(14, 8, 15, 5, 500000),
(15, 8, 14, 2, 50000),
(16, 8, 13, 2, 60000),
(17, 8, 12, 2, 80000),
(18, 8, 11, 2, 120000),
(19, 8, 10, 100, 100000),
(20, 8, 9, 100, 200000),
(21, 8, 8, 3, 4500000),
(22, 8, 7, 1, 500000),
(23, 8, 6, 15, 825000),
(24, 9, 22, 5, 250000),
(25, 9, 21, 5, 150000),
(26, 9, 20, 5, 125000),
(27, 9, 19, 5, 1500000),
(28, 9, 18, 5, 50000),
(29, 9, 17, 5, 60000),
(30, 9, 16, 500, 750000),
(31, 9, 15, 5, 500000),
(32, 9, 14, 5, 125000),
(33, 9, 13, 5, 150000),
(34, 9, 12, 5, 200000),
(35, 9, 11, 5, 300000),
(36, 9, 10, 500, 500000),
(37, 9, 9, 500, 1000000),
(38, 9, 8, 5, 7500000),
(39, 9, 7, 1, 500000),
(40, 9, 6, 20, 1100000),
(41, 10, 22, 2, 100000);

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
(6, 'Tenda', 55000, 'meter', 'Tenda.png'),
(7, 'Panggung musik 4x4 ', 500000, 'meter', 'Panggung_musik_4x4_.png'),
(8, 'Photobooth Bunga Plastik', 1500000, 'paket', 'Photobooth_Bunga_Plastik.png'),
(9, 'Piring, piring, dan Garfu', 2000, 'pcs', 'Piring,_piring,_dan_Garfu.png'),
(10, 'Gelas', 1000, 'pcs', 'Gelas.png'),
(11, 'Pemanas (Rooftop/Big)', 60000, 'pcs', 'Pemanas_(RooftopBig).png'),
(12, 'Pemanas (Besar standart)', 40000, 'pcs', 'Pemanas_(Besar_standart).png'),
(13, 'Pemanas (Sedang)', 30000, 'pcs', 'Pemanas_(Sedang).png'),
(14, 'Pemanas (kecil)', 25000, 'pcs', 'Pemanas_(kecil).png'),
(15, 'Jusser Kaca', 100000, 'pcs', 'Jusser_Kaca.png'),
(16, 'Mangkok', 1500, 'pcs', 'Mangkok.png'),
(17, 'kursi pultura + sarung', 12000, 'pcs', 'kursi_pultura_+_sarung.png'),
(18, 'kursi pultura tanpa sarung', 10000, 'pcs', 'kursi_pultura_tanpa_sarung.png'),
(19, 'Kipas Blower', 300000, 'pcs', 'Kipas_Blower.png'),
(20, 'Meja + Cover', 25000, '60 cm X ', 'Meja_+_Cover.png'),
(21, 'Round Table', 30000, '100cm', 'Round_Table.png'),
(22, 'Gubugan kotak', 50000, 'pcs', 'Gubugan_kotak.png'),
(23, 'Meja + Cover (60  X 100 )', 25000, 'cm', 'Meja_+_Cover_(60_X_100_).png'),
(24, 'Photobooth Bunga Hidup', 2500000, 'package', 'Photobooth_Bunga_Hidup.png');

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
(1, 'Gold 3', 1, '- Pelaminan (8m)\r\n- Mini Garden\r\n- Standing Flower (5)\r\n- Standing Flower jalan (4)\r\n- Karpet Standar Pelaminan\r\n- Red Karpet (karpet jalan)\r\n- Kotak Angpau (2)\r\n- Meja Terima Tamu (2)\r\n- Display/Photobooth\r\n- Meja & Kursi Akad Nikah\r\n- Gapura Pintu Masuk\r\n(Bonus Janur 1pcs)', 15500000, 'Gold_3.png'),
(2, 'Gold 2', 1, '- Pelaminan (8m)\r\n- Background pelaminan Hitam\r\n- Mini Garden\r\n- Standing Flower (5)\r\n- Standing Flower jalan (6)\r\n- Karpet Pelaminan Bunga\r\n- Red Karpet (karpet jalan)\r\n- Pohon (1)\r\n- Kotak Angpau (2)\r\n- Meja Terima Tamu (2)\r\n- Buku Tamu (2)\r\n- Display/Photobooth\r\n- Meja & Kursi Akad Nikah\r\n- Gapura Pintu Masuk\r\n- Ruang VIP\r\n(Bonus Janur 2pcs)', 25500000, 'Gold_2.png'),
(3, 'Gold 1', 1, '- Pelaminan (8m)\r\n- Background pelaminan Hitam\r\n- Mini Garden\r\n- Standing Flower (7)\r\n- Standing Flower jalan (6)\r\n- Karpet Pelaminan Bunga\r\n- Red Karpet (karpet jalan)\r\n- Pohon (2)\r\n- Kotak Angpau (3)\r\n- Background Meja Tamu (2)\r\n- Meja Terima Tamu (2)\r\n- Buku Tamu (2)\r\n- Display/Photobooth\r\n- Meja & Kursi Akad Nikah\r\n- Gapura Pintu Masuk\r\n- Gapura Tengah\r\n- Ruang VIP\r\n(Bonus Janur 2pcs)', 35500000, 'Gold_1.png'),
(4, 'PAKET SILVER tanpa Rias 2', 2, 'Untung info lebih lanjut bisa langsung menghubungi admin :)', 17900000, 'PAKET_SILVER_tanpa_Rias_2.png'),
(5, 'PAKET SILVER tanpa Rias 1', 2, 'Untung info lebih lanjut bisa langsung menghubungi admin :)', 21900000, 'PAKET_SILVER_tanpa_Rias_1.png'),
(6, 'PAKET SILVER 2', 2, 'Untung info lebih lanjut bisa langsung menghubungi admin :)', 26900000, 'PAKET_SILVER_2.png'),
(7, 'PAKET SILVER 1', 2, 'Untung info lebih lanjut bisa langsung menghubungi admin :)', 30900000, 'PAKET_SILVER_1.png');

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
(3, 15, 4, 3, '2019-07-26', '2019-08-01', 4000000, 17900000, '3_2019-07-26.jpeg', 2),
(4, 15, 1, 4, '2019-07-26', '2019-07-28', 7000000, 15500000, '4_2019-07-26.jpeg', 1),
(8, 17, 7, 8, '2019-07-31', '2019-08-28', 100000, 30900000, '1_2019-07-26.jpg', 3),
(9, 17, 7, 9, '2019-07-31', '2019-11-15', 100000, 30900000, '9_2019-07-31.jpg', 2),
(10, 24, 7, 10, '2019-08-06', '2019-08-23', 24720000, 30900000, '10_2019-08-06.jpg', 1);

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
  `foto_identitas` varchar(58) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `random_code` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wo_user`
--

INSERT INTO `wo_user` (`id_user`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `hp`, `foto_identitas`, `email`, `random_code`, `verify`) VALUES
(15, 'Hisyam Husein', 'Jakarta', '1996-02-27', 'Jatijajar, Depok', '085612546777', 'Hisyam_Husein_085612546777.png', '', '0', 0),
(17, 'Dewi Rizka Rudiana', 'Bogor', '2001-08-28', 'Kp. Sawah rt 02/07 no19, Bojonggede, Bogor', '08981612109', 'Dewi_Rizka_Rudiana_08981612109.jpg', '', '0', 0),
(24, 'Amailia cahya', 'Bogor', '1996-05-24', 'Bojonggede', '085888888888', 'Amailia_cahya_085888888888.jpg', 'amailiacahya@gmail.com', '0052069db1a0017f6a27f27e6dcbb919', 2),
(25, 'Dewi Rofi', 'Bogor', '2001-08-28', 'Bojonggede', '085777777777', 'Dewi_Rofi_085777777777.jpg', 'dewirizka24936@gmail.com', '464ef8b13a84d5f47c6591a9f892bf30', 1),
(26, 'Hisyam', 'Jakarta', '1996-02-27', 'Jalan Jatijajar DEPOK', '081905096842', 'Hisyam_081905096842.jpg', 'hisyam.husein@gmail.com', '8c531d5ff27a37d697d53cab360ccf15', 1);

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
  MODIFY `id_detail_include` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `wo_include`
--
ALTER TABLE `wo_include`
  MODIFY `id_include` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wo_package`
--
ALTER TABLE `wo_package`
  MODIFY `id_package` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wo_pemesanan`
--
ALTER TABLE `wo_pemesanan`
  MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wo_user`
--
ALTER TABLE `wo_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
