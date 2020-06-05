-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2020 pada 04.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualanhoscloud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
('001', 'Baju', '2020-06-01 17:00:00', '2020-06-01 17:00:00'),
('002', 'Kaos', '2020-06-01 17:00:00', '2020-06-01 17:00:00'),
('003', 'Jilbab', NULL, NULL),
('004', 'Celana', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_06_02_071820_create_teble_kategori', 1),
(8, '2020_06_02_092710_create_teble_supplier', 2),
(9, '2020_06_02_094322_create_teble_produk', 3),
(10, '2020_06_02_153002_create_table_produkmasuk', 4),
(11, '2020_06_03_060340_create_items_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pelanggan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `alamat_pelanggan`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'Surya Diansyah', 'Jalan Merak2', '08211221', '2020-06-01 17:00:00', '2020-06-01 17:00:00'),
(16, 'Sri Rezeki', 'JL Taman sari No. 11 Tangkerang Selatan, Pekanbaru 28282', '08121212134', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kode_kategori` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_supplier` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok`, `kode_kategori`, `id_supplier`, `created_at`, `updated_at`) VALUES
('001', 'celana doger', 100000, 62, '004', '2', NULL, NULL),
('002', 'Kaos Harley', 120000, 30, '002', '3', NULL, NULL),
('003', 'Gamis Full Komplit', 150000, 42, '001', '4', NULL, NULL),
('004', 'jilbab cantik', 25000, 15, '003', '4', NULL, NULL),
('005', 'Kemeja Jepang', 150001, 26, '001', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produkmasuk`
--

CREATE TABLE `produkmasuk` (
  `id_produkmasuk` bigint(20) UNSIGNED NOT NULL,
  `kode_produk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_datang` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produkmasuk`
--

INSERT INTO `produkmasuk` (`id_produkmasuk`, `kode_produk`, `jumlah`, `id_user`, `id_supplier`, `tanggal_datang`, `created_at`, `updated_at`) VALUES
(1, '001', '12', '1', '2', '2020-06-02', NULL, NULL),
(2, '002', '4', '1', '3', '2020-06-03', NULL, NULL),
(3, '001', '2', '1', '3', '2020-06-11', NULL, NULL),
(4, '002', '4', '1', '3', '2020-06-11', NULL, NULL),
(5, '001', '20', '1', '2', '2020-06-03', NULL, NULL),
(6, '002', '10', '2', '3', '2020-06-03', NULL, NULL),
(7, '001', '10', '1', '2', '2020-06-03', NULL, NULL),
(8, '001', '4', '1', '3', '2020-06-03', NULL, NULL),
(9, '001', '1', '1', '2', '2020-06-03', NULL, NULL),
(10, '003', '7', '2', '4', '2020-06-04', NULL, NULL),
(11, '003', '20', '2', '4', '2020-06-04', NULL, NULL),
(12, '005', '10', '1', '2', '2020-06-05', NULL, NULL);

--
-- Trigger `produkmasuk`
--
DELIMITER $$
CREATE TRIGGER `triger_produkmasuk` AFTER INSERT ON `produkmasuk` FOR EACH ROW BEGIN
UPDATE produk
SET stok = stok + NEW.jumlah
WHERE
id_produk = NEW.kode_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_supplier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat_supplier`, `no_hp`, `created_at`, `updated_at`) VALUES
(2, 'PT Kaos', 'pekanbaru', '081212121212', NULL, NULL),
(3, 'PT Celana', 'jlan Balam', '081212132313', NULL, NULL),
(4, 'PT Gamis', 'JL Taman sari No. 11 Tangkerang Selatan, Pekanbaru 28282', '08121212134', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `tanggal_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `bayar`, `kembali`, `total`, `id_user`, `id_pelanggan`, `tanggal_beli`) VALUES
(1, 'T0001', 700000, 20000, 680000, '2', '16', '2020-06-04'),
(2, 'T0002', 800000, 40000, 760000, '2', '16', '2020-06-04'),
(3, 'T0003', 600000, 40000, 560000, '2', '1', '2020-06-04'),
(4, 'T0003', 600000, 40000, 560000, '2', '1', '2020-06-04'),
(5, 'T0003', 600000, 40000, 560000, '2', '1', '2020-06-04'),
(6, 'T0004', 900000, 100000, 800000, '2', '16', '2020-06-04'),
(7, 'T0004', 900000, 100000, 800000, '2', '16', '2020-06-04'),
(8, 'T0004', 900000, 100000, 800000, '2', '16', '2020-06-04'),
(9, 'T0004', 900000, 100000, 800000, '2', '16', '2020-06-04'),
(10, 'T0004', 900000, 100000, 800000, '2', '16', '2020-06-04'),
(11, 'T0004', 900000, 100000, 800000, '2', '16', '2020-06-04'),
(12, 'T0005', 100000, 25000, 75000, '2', '1', '2020-06-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksidetail` int(11) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksidetail`, `kode_transaksi`, `id_produk`, `jumlah_beli`, `harga`) VALUES
(4, 'T0001', '001', 2, 100000),
(5, 'T0001', '002', 4, 120000),
(6, 'T0002', '001', 4, 100000),
(7, 'T0002', '002', 3, 120000),
(8, 'T0003', '001', 2, 100000),
(9, 'T0003', '002', 3, 120000),
(10, 'T0004', '001', 2, 100000),
(11, 'T0004', '003', 4, 150000),
(12, 'T0005', '004', 3, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'surya diansyah', 'suryadiansyahh@gmail.com', NULL, '$2y$10$vSsI/BZQHQUAymssIg4WHe/5OOg6ocv5I6CAJIhvVXsTjVp1IavvC', NULL, '2020-06-02 00:26:36', '2020-06-02 00:26:36'),
(2, 'Sri Rezeki', 'admin@gmail.com', NULL, '$2y$10$6SndG2c26.njYe6qaUshXeasMprXLOCfpq8kS4XOhKP/1Pw562Owy', NULL, '2020-06-02 08:57:10', '2020-06-02 08:57:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produkmasuk`
--
ALTER TABLE `produkmasuk`
  ADD PRIMARY KEY (`id_produkmasuk`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksidetail`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `produkmasuk`
--
ALTER TABLE `produkmasuk`
  MODIFY `id_produkmasuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksidetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
