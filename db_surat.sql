-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2023 pada 03.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inputsurat`
--

CREATE TABLE `inputsurat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NoSurat` varchar(255) NOT NULL,
  `TanggalBuat` date NOT NULL,
  `Menimbang` varchar(255) NOT NULL,
  `Dasar` text DEFAULT NULL,
  `Untuk` text NOT NULL,
  `DariTanggal` date NOT NULL,
  `SampaiTanggal` date NOT NULL,
  `KabKota` enum('Banjarbaru','Samarinda','Palangkaraya','Pontianak','Tanjung Selor') NOT NULL,
  `Provinsi` enum('Kalimantan Selatan','Kalimantan Timur','Kalimantan Barat','Kalimantan Tengah','Kalimantan Utara') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inputsurat`
--

INSERT INTO `inputsurat` (`id`, `NoSurat`, `TanggalBuat`, `Menimbang`, `Dasar`, `Untuk`, `DariTanggal`, `SampaiTanggal`, `KabKota`, `Provinsi`, `created_at`, `updated_at`) VALUES
(1, '148', '2023-04-08', 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023', '', 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong,', '2023-04-10', '2023-04-15', 'Banjarbaru', 'Kalimantan Selatan', '2023-11-30 18:02:22', '2023-11-30 18:02:22'),
(2, '149', '2023-01-23', 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023', 'Peraturan Menteri Pendidikan', 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ', '2023-01-25', '2023-01-26', 'Banjarbaru', 'Kalimantan Selatan', '2023-11-30 18:02:23', '2023-11-30 18:02:23'),
(3, '150', '2023-11-30', 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023', '', 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ', '2023-12-02', '2023-12-04', 'Banjarbaru', 'Kalimantan Selatan', '2023-11-30 18:02:23', '2023-11-30 18:02:23'),
(4, '151', '2023-03-13', 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023', 'Peraturan Kaprog', 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ', '2023-03-15', '2023-03-16', 'Banjarbaru', 'Kalimantan Selatan', '2023-11-30 18:02:23', '2023-11-30 18:02:23'),
(5, '152', '2023-12-24', 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023', 'Peraturan Menteri Keuangan', 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ', '2023-12-25', '2023-12-26', 'Banjarbaru', 'Kalimantan Selatan', '2023-11-30 18:02:23', '2023-11-30 18:02:23'),
(6, '153', '2023-05-13', 'bahwa dalam rangka melaksanakan Koordinasi Digital Talent Scholarship (DTS) Tahun 2023', '', 'Melaksanakan Koordinasi Kegiatan Digital Entrepreneurship Academy (DEA) Kab. Tabalong dengan Dinas Koperasi, UMKM dan Perindustrian Kab. Tabalong, ', '2023-05-13', '2023-05-20', 'Banjarbaru', 'Kalimantan Selatan', '2023-11-30 18:02:24', '2023-11-30 18:02:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_03_020816_create_inputsurat_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `NIP` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `NIP`, `password`, `pangkat`, `jabatan`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akun User', 20231201, '$2y$10$jwuqueD40pcYXHkyeJfmke0jF1HM99RnVzbAAyEVC.hjWACiRXJDO', 'Penata', 'Analis Tata Usaha', 'user', NULL, '2023-11-30 18:02:22', '2023-11-30 18:02:22'),
(2, 'Akun Admin', 20231130, '$2y$10$M2gVaGG4/HoenIsZV//n9umTTFesRadbLwvfp1jiJTQGmqcR9mdLe', 'Penata ', 'Fasilitator Kemitraan', 'admin', NULL, '2023-11-30 18:02:22', '2023-11-30 18:02:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inputsurat`
--
ALTER TABLE `inputsurat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inputsurat_nosurat_unique` (`NoSurat`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`NIP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inputsurat`
--
ALTER TABLE `inputsurat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
