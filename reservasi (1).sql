-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 07:24 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idBooking` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `waktu` datetime NOT NULL,
  `jumlah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Telepon','Web') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Booked','Finish','Cancel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`idBooking`, `idUser`, `waktu`, `jumlah`, `pesan`, `jenis`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, '2017-05-14 19:00:00', '2', 'Sedikit terlambat', 'Web', 'Finish', '2017-05-14 02:52:43', '2017-05-14 08:09:54'),
(3, 2, '2017-05-14 14:00:00', '5', 'Mohon disiapkan', 'Web', 'Finish', '2017-05-14 02:53:49', '2017-05-14 08:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `idEvent` int(10) UNSIGNED NOT NULL,
  `namaEvent` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskEvent` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalMulai` datetime NOT NULL,
  `tanggalSelesai` datetime NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`idEvent`, `namaEvent`, `deskEvent`, `tanggalMulai`, `tanggalSelesai`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'diskon 50%', 'Diskon 50% untuk setiap pembelian Ayam Bakar Madu SIL', '2017-05-15 00:00:00', '2017-05-22 00:00:00', '20170514085253.jpg', '2017-05-14 01:52:53', '2017-05-14 01:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `idFasilitas` int(10) UNSIGNED NOT NULL,
  `namaFasilitas` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detailFasilitas` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`idFasilitas`, `namaFasilitas`, `detailFasilitas`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Outdoor', 'Kami memberikan fasilitas outdoor yang nyaman', 'fasilitas20170514090706.jpg', '2017-05-14 02:07:06', '2017-05-14 02:07:06'),
(2, 'Indoor', 'Kami menyediakan fasilitas indoor dengan interior terbaik guna kenyamanan anda', 'fasilitas20170514091022.jpg', '2017-05-14 02:10:23', '2017-05-14 02:10:23'),
(3, 'Free Wifi', 'Kami menyediakan wifi gratis dengan kecepatan 1Gbps', 'fasilitas20170514092033.jpg', '2017-05-14 02:18:24', '2017-05-14 02:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(10) UNSIGNED NOT NULL,
  `namaKategori` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`, `created_at`, `updated_at`) VALUES
(1, 'appetizer', '2017-05-14 02:22:52', '2017-05-14 08:33:13'),
(2, 'main', '2017-05-14 02:23:26', '2017-05-14 02:23:26'),
(3, 'dessert', '2017-05-14 02:23:33', '2017-05-14 02:23:33'),
(4, 'coffee', '2017-05-14 02:23:39', '2017-05-14 02:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(10) UNSIGNED NOT NULL,
  `namaMenu` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskMenu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(10,1) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idKategori` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `namaMenu`, `deskMenu`, `rating`, `harga`, `gambar`, `idKategori`, `created_at`, `updated_at`) VALUES
(1, 'pop chicken salad', 'Salad dengan roti tawar gandum ditambah potongan daging ayam dan dibalut dengan mayonaise', '4.5', 35000, 'Menu20170514093001.jpg', 1, '2017-05-14 02:30:02', '2017-05-14 02:30:02'),
(2, 'ayam bakar madu sil', 'Ayam bakar dengan  Beach Honeydew yang merupakan salah satu madu terbaik di dunia', '4.5', 25000, 'Menu20170514093431.jpg', 2, '2017-05-14 02:34:31', '2017-05-14 02:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(71, '2014_10_12_000000_create_users_table', 1),
(72, '2014_10_12_100000_create_password_resets_table', 1),
(73, '2017_05_07_024812_CreateTableKategori', 1),
(74, '2017_05_07_111742_CreateTableEvent', 1),
(75, '2017_05_07_170939_CreateTableFasilitas', 1),
(76, '2017_05_08_015141_CreateTableMenu', 1),
(77, '2017_05_08_052634_CreateTableReview', 1),
(78, '2017_05_08_053206_CreateTableBooking', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `idReview` int(10) UNSIGNED NOT NULL,
  `review` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(10,1) NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idMenu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`idReview`, `review`, `rating`, `idUser`, `idMenu`, `created_at`, `updated_at`) VALUES
(2, 'Rasanya sangat enak', '4.5', 3, 1, '2017-05-14 02:46:47', '2017-05-14 02:46:47'),
(3, 'Madunya terlalu manis', '3.5', 3, 2, '2017-05-14 02:47:11', '2017-05-14 02:47:11'),
(4, 'Harganya sesuai dengan rasa', '4.0', 2, 1, '2017-05-14 02:48:11', '2017-05-14 02:48:11'),
(5, 'Ayamnya lembut tetapi madunya kemanisan', '4.0', 2, 2, '2017-05-14 02:49:00', '2017-05-14 02:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Admin','Customer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `nama`, `password`, `telepon`, `status`, `gambar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ardye', 'ardye', '$2y$10$YZgXU/y0S1yq4Q7xBmSsSucEEOrGOBU4mdV6Mjnl5UHoQlhJxELwi', '089696509522', 'Customer', NULL, '0XbLWmuJu7Ky3Cmz60eQQeYOc4s2ifjVbSg2llurqeIelq4CDhy89kT7wy2B', '2017-05-13 23:41:23', '2017-05-13 23:41:23'),
(2, 'deki.satria', 'Deki Satria', '$2y$10$LYbbPcdV3fjy9jQQqsimkOcEzD85FQzL3qvd1mlJDRFussrdiN2Jm', '089696509522', 'Customer', 'UserImage-20170514094214.jpg', 'N894TkhJUHGQq5TzYbaclPjwchuMeOlwHElcGw4o9gDoHsh5rO5ioWfTQi0o', '2017-05-14 02:42:14', '2017-05-14 02:42:14'),
(3, 'ardye.amando', 'Ardye Amando', '$2y$10$rxyRNNLYIfsisDaOz.hK5uRboSqMSG2UEMTLyn9HtfXhoZ6oaYuQy', '089696509522', 'Customer', 'UserImage-20170514094535.jpg', 'PugG0WymtCiOrBdkGeWiFY0JywPsBCmGztX94enebZNhjy0ptzcpztQ2zzmi', '2017-05-14 02:45:35', '2017-05-14 02:45:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idBooking`),
  ADD KEY `booking_iduser_foreign` (`idUser`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`idEvent`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`idFasilitas`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `menu_idkategori_foreign` (`idKategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`idReview`),
  ADD KEY `review_idmenu_foreign` (`idMenu`),
  ADD KEY `review_iduser_foreign` (`idUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `idBooking` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `idEvent` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `idFasilitas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `idReview` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_idkategori_foreign` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_idmenu_foreign` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
