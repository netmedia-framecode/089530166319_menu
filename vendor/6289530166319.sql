-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2024 pada 15.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `6289530166319`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `image`, `judul`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES
(2, 1, '2956077503.jpg', 'CEKER MERCON', 'Catatan: Kepedasan dapat disesuaikan sesuai selera.', 20000, '2024-01-30 20:48:28', '2024-01-30 22:00:58'),
(3, 1, '3805712900.jpg', 'SEBLAK', 'Catatan: Kepedasan dapat disesuaikan sesuai selera.', 25000, '2024-01-30 20:49:01', '2024-01-30 22:01:01'),
(4, 1, '2759579629.jpg', 'BASRENG', 'Catatan: Kepedasan dapat disesuaikan sesuai selera.', 10000, '2024-01-30 20:49:32', '2024-01-30 22:01:03'),
(5, 1, '3709630615.jpeg', 'MIE PEDAS', 'Catatan: Kepedasan dapat disesuaikan sesuai selera.', 18000, '2024-01-30 20:49:58', '2024-01-30 22:01:05'),
(6, 1, '1668796622.jpg', 'AYAM GEPREK', 'Catatan: Kepedasan dapat disesuaikan sesuai selera.', 19000, '2024-01-30 20:50:23', '2024-01-30 22:01:09'),
(7, 1, '797130223.jpg', 'AYAM PENYET', 'Catatan: Kepedasan dapat disesuaikan sesuai selera.', 19000, '2024-01-30 20:50:45', '2024-01-30 22:01:12'),
(8, 2, '4070982346.jpg', 'ES JERUK', '', 7000, '2024-01-30 20:52:41', '2024-01-30 22:01:26'),
(9, 2, '2959997126.jpg', 'ES TEH', '', 5000, '2024-01-30 20:52:54', '2024-01-30 22:01:29');

--
-- Trigger `menu`
--
DELIMITER $$
CREATE TRIGGER `before_update_menu` BEFORE UPDATE ON `menu` FOR EACH ROW BEGIN
SET
  NEW.updated_at = NOW();

END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
