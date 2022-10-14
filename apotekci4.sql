-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2022 pada 09.46
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotekci4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Kasir', 'Akses kasir'),
(2, 'Apoteker', 'Akses Obat'),
(3, 'Admin', 'Akses full admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 4),
(2, 6),
(3, 1),
(3, 2),
(3, 4),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(2, 2),
(2, 19),
(3, 1),
(3, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'umam', NULL, '2022-10-01 00:15:58', 0),
(2, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 00:23:55', 1),
(3, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 00:28:23', 1),
(4, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 00:32:18', 1),
(5, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 01:19:41', 1),
(6, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 05:23:15', 1),
(7, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 05:25:57', 1),
(8, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 05:37:15', 1),
(9, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:19:06', 1),
(10, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:28:37', 1),
(11, '::1', 'khael', NULL, '2022-10-01 06:42:38', 0),
(12, '::1', 'khael', NULL, '2022-10-01 06:42:44', 0),
(13, '::1', 'khael', NULL, '2022-10-01 06:42:53', 0),
(14, '::1', 'khael', NULL, '2022-10-01 06:43:03', 0),
(15, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:43:32', 1),
(16, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:46:59', 1),
(17, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 07:29:43', 1),
(18, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 09:46:37', 1),
(19, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 09:55:31', 1),
(20, '::1', 'umamjr007@gmail.com', 1, '2022-10-02 22:39:43', 1),
(21, '::1', 'umamjr007@gmail.com', 1, '2022-10-02 22:58:42', 1),
(22, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 03:47:59', 1),
(23, '::1', 'umam', NULL, '2022-10-03 03:48:36', 0),
(24, '::1', 'asdsad', NULL, '2022-10-03 03:48:40', 0),
(25, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 03:48:42', 1),
(26, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 09:56:58', 1),
(27, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 09:58:53', 1),
(28, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 00:53:57', 1),
(29, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 07:39:02', 1),
(30, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 09:33:01', 1),
(31, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 21:52:20', 1),
(32, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 23:05:54', 1),
(33, '::1', 'khaeumam@mail.com', 2, '2022-10-04 23:39:12', 1),
(34, '::1', 'umamjr007@gmail.com', 1, '2022-10-05 00:29:54', 1),
(35, '::1', 'umamjr007@gmail.com', 1, '2022-10-05 00:30:04', 1),
(36, '::1', 'khael', NULL, '2022-10-05 00:30:10', 0),
(37, '::1', 'khael@a', NULL, '2022-10-05 00:30:15', 0),
(38, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:30:24', 1),
(39, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:54:05', 1),
(40, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:54:10', 1),
(41, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:57:20', 1),
(42, '::1', 'khaeumam@mail.com', 2, '2022-10-05 01:57:24', 1),
(43, '::1', 'khaeumam@mail.com', 2, '2022-10-05 23:09:06', 1),
(44, '::1', 'khaeumam@mail.com', 2, '2022-10-05 23:35:55', 1),
(45, '::1', 'khaeumam@mail.com', 2, '2022-10-06 00:56:23', 1),
(46, '::1', 'khaeumam@mail.com', 2, '2022-10-06 12:25:53', 1),
(47, '::1', 'khaeumam@mail.com', 2, '2022-10-06 14:28:58', 1),
(48, '::1', 'akuganteng@mail.com', 8, '2022-10-06 14:29:16', 1),
(49, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 01:19:35', 1),
(50, '::1', 'umam', NULL, '2022-10-07 01:21:07', 0),
(51, '::1', 'umam', NULL, '2022-10-07 01:21:53', 0),
(52, '::1', 'khaeumam@mail.com', 2, '2022-10-07 01:22:19', 1),
(53, '::1', 'akuganteng@mail.com', 8, '2022-10-07 01:22:45', 1),
(54, '::1', 'umam', NULL, '2022-10-07 01:24:44', 0),
(55, '::1', 'umam', NULL, '2022-10-07 01:24:52', 0),
(56, '::1', 'akuganteng@mail.com', 8, '2022-10-07 01:24:55', 1),
(57, '::1', 'umamjr007@gmail.com', NULL, '2022-10-07 01:25:11', 0),
(58, '::1', 'akuganteng@mail.com', 8, '2022-10-07 01:25:16', 1),
(59, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:34:21', 1),
(60, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:38:09', 1),
(61, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:38:54', 1),
(62, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:39:37', 1),
(63, '::1', 'umam', NULL, '2022-10-07 02:40:07', 0),
(64, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:40:43', 1),
(65, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:41:04', 1),
(66, '::1', 'akuganteng@mail.com', NULL, '2022-10-07 02:42:22', 0),
(67, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:42:29', 1),
(68, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:42:58', 1),
(69, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:46:26', 1),
(70, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:46:37', 1),
(71, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:46:45', 1),
(72, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:47:15', 1),
(73, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:47:23', 1),
(74, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:05:19', 1),
(75, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:06:19', 1),
(76, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 03:08:34', 1),
(77, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:30:12', 0),
(78, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:30:26', 0),
(79, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 03:30:29', 1),
(80, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:30:56', 1),
(81, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 03:31:06', 1),
(82, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 08:42:19', 1),
(83, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 03:41:12', 1),
(84, '::1', 'umam', NULL, '2022-10-08 05:57:37', 0),
(85, '::1', 'umam', NULL, '2022-10-08 05:57:47', 0),
(86, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 05:58:04', 1),
(87, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:00:31', 1),
(88, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:09:18', 1),
(89, '::1', 'umam', NULL, '2022-10-08 06:09:30', 0),
(90, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:09:32', 1),
(91, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:11:09', 1),
(92, '::1', 'umamjr007@gmail.com', 1, '2022-10-09 08:44:40', 1),
(93, '::1', 'umamjr007@gmail.com', 1, '2022-10-10 02:01:52', 1),
(94, '::1', 'umamjr007@gmail.com', 1, '2022-10-10 22:23:57', 1),
(95, '::1', 'khael', NULL, '2022-10-11 03:07:16', 0),
(96, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:07:25', 1),
(97, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 03:08:26', 1),
(98, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:08:44', 1),
(99, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 03:09:04', 1),
(100, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:09:24', 1),
(101, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:09:35', 1),
(102, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 03:09:40', 1),
(103, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 23:41:20', 1),
(104, '::1', 'umamjr007@gmail.com', 1, '2022-10-12 07:25:38', 1),
(105, '::1', 'umamjr007@gmail.com', 1, '2022-10-12 23:09:24', 1),
(106, '::1', 'umamjr007@gmail.com', 1, '2022-10-13 09:35:18', 1),
(107, '::1', 'umamjr007@gmail.com', 1, '2022-10-14 01:28:57', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'management-obat', ''),
(2, 'management-user', ''),
(4, 'akses-home', ''),
(5, 'management-transaksi', ''),
(6, 'management-laporan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `selector`, `hashedValidator`, `user_id`, `expires`) VALUES
(5, '2746ecbf8ea070cdb6bf5158', '8a50d6980faa6adc74c32ce6d4575d1bdcecebe1f31ab03236f00d65a5063cd9', 1, '2022-10-19 01:28:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `telp`, `email`, `created_at`, `updated_at`) VALUES
(1, 'aldi', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '0871626212', 'test@gmail.com', '2022-10-11 05:31:56', '2022-10-11 05:31:56'),
(2, 'bagong', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '', 'test@gmail.com', '2022-10-11 05:31:56', '2022-10-11 05:31:56'),
(3, 'rayhan', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '', 'test@gmail.com', '2022-10-11 05:32:20', '2022-10-11 05:32:20'),
(4, 'amel', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '', 'test@gmail.com', '2022-10-11 05:32:20', '2022-10-11 05:32:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1664600661, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.png',
  `deskripsi` varchar(250) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `produsen` int(5) NOT NULL,
  `harga` double NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `img`, `deskripsi`, `stok`, `satuan`, `produsen`, `harga`, `discount`, `created_at`, `updated_at`) VALUES
(13, 'Bodrex', '1664891556_4c98679b4f749437b669.jpg', 'obat sakit kepala', 11, 1, 5, 2000, 20, '2022-10-03 05:41:08', '2022-10-13 04:42:31'),
(15, 'Paracetamol', '1664900779_661a084bc6a787f5b734.jpeg', 'Obat pereda sakit', 530, 2, 2, 3000, 0, '2022-10-03 09:14:10', '2022-10-13 04:36:04'),
(17, 'Ranitidin', '1664900846_0c125003cca2ce3498a6.jpg', 'asdasd', 1, 2, 3, 2000, 0, '2022-10-03 09:16:44', '2022-10-13 11:46:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `user_login_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `jk` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `no_hp`, `email`, `jabatan`, `user_login_id`, `status`, `jk`) VALUES
(00000000001, 'krisna', 'tesiting', '123809238', 'kfebrianto2015@gmail.com', 2, 25, 1, 'l'),
(00000000002, 'apoteker', 'jalan apoteker', '09123823', 'kfebrianto2017@gmail.com', 3, 26, 1, 'l'),
(00000000003, 'pemilik', 'pemilik ', '12938910238', 'kfebrianto2018@gmail.com', 1, 27, 1, 'l');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produsen`
--

CREATE TABLE `produsen` (
  `id_produsen` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produsen`
--

INSERT INTO `produsen` (`id_produsen`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(2, 'Sanbe Farma', 'Jln . Leuwi Gajah no 50 cimahi selatan', '07771', NULL, '2022-10-04 22:53:23'),
(3, 'Novartis', 'Jl. Kalijaga No.111 Kota cirebon', '444444', NULL, '2022-10-04 22:53:36'),
(4, 'Dexa Medica', 'Jl. ABC', '222222', '2022-10-04 18:41:00', '2022-10-04 22:54:40'),
(5, 'Kalbe farma', '', '', '2022-10-04 18:41:19', '2022-10-04 18:41:19'),
(6, 'Biofarma', '', '', '2022-10-04 18:41:19', '2022-10-04 18:41:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama`, `alamat`, `kota`, `telp`, `email`) VALUES
(1, 'Apotek ABC', 'JL. Merdeka No.50, Kec. Pegambiran', 'Kota Cirebon', '08716262122', 'Perusahaan123@mail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sale`
--

CREATE TABLE `sale` (
  `sale_id` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sale`
--

INSERT INTO `sale` (`sale_id`, `userid`, `customerid`, `created_at`, `updated_at`) VALUES
('TRX1665476924', 1, 1, '2022-10-11 03:28:44', '2022-10-11 03:28:44'),
('TRX1665477044', 1, 0, '2022-10-11 03:30:44', '2022-10-11 03:30:44'),
('TRX1665477065', 1, 2, '2022-10-11 03:31:05', '2022-10-11 03:31:05'),
('TRX1665562151', 1, 4, '2022-10-12 03:09:11', '2022-10-12 03:09:11'),
('TRX1665578979', 1, 0, '2022-10-12 07:49:39', '2022-10-12 07:49:39'),
('TRX1665579107', 1, 3, '2022-10-12 07:51:47', '2022-10-12 07:51:47'),
('TRX1665579793', 1, 0, '2022-10-12 08:03:13', '2022-10-12 08:03:13'),
('TRX1665579833', 1, 0, '2022-10-12 08:03:53', '2022-10-12 08:03:53'),
('TRX1665583697', 1, 1, '2022-10-12 09:08:17', '2022-10-12 09:08:17'),
('TRX1665583810', 1, 0, '2022-10-12 09:10:10', '2022-10-12 09:10:10'),
('TRX1665644163', 1, 0, '2022-10-13 01:56:03', '2022-10-13 01:56:03'),
('TRX1665644245', 1, 4, '2022-10-13 01:57:25', '2022-10-13 01:57:25'),
('TRX1665647289', 1, 0, '2022-10-13 02:48:09', '2022-10-13 02:48:09'),
('TRX1665651071', 1, 0, '2022-10-13 03:51:11', '2022-10-13 03:51:11'),
('TRX1665653155', 1, 1, '2022-10-13 04:25:55', '2022-10-13 04:25:55'),
('TRX1665653250', 1, 0, '2022-10-13 04:27:30', '2022-10-13 04:27:30'),
('TRX1665653330', 1, 2, '2022-10-13 04:28:50', '2022-10-13 04:28:50'),
('TRX1665653407', 1, 0, '2022-10-13 04:30:07', '2022-10-13 04:30:07'),
('TRX1665653450', 1, 0, '2022-10-13 04:30:50', '2022-10-13 04:30:50'),
('TRX1665653764', 1, 4, '2022-10-13 04:36:04', '2022-10-13 04:36:04'),
('TRX1665653969', 1, 0, '2022-10-13 04:39:29', '2022-10-13 04:39:29'),
('TRX1665654151', 1, 0, '2022-10-13 04:42:31', '2022-10-13 04:42:31'),
('TRX1665679567', 1, 4, '2022-10-13 11:46:07', '2022-10-13 11:46:07'),
('TRX1665679630', 1, 0, '2022-10-13 11:47:10', '2022-10-13 11:47:10'),
('TRX1665680030', 1, 1, '2022-10-13 11:53:50', '2022-10-13 11:53:50'),
('TRX1665680184', 1, 1, '2022-10-13 11:56:24', '2022-10-13 11:56:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sale_detail`
--

CREATE TABLE `sale_detail` (
  `sale_id` varchar(50) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sale_detail`
--

INSERT INTO `sale_detail` (`sale_id`, `id_obat`, `amount`, `price`, `discount`, `total_price`) VALUES
('TRX1665476924', 13, 1, 2000, 400, 1600),
('TRX1665476924', 15, 1, 3000, 0, 3000),
('TRX1665477044', 15, 1, 3000, 0, 3000),
('TRX1665477044', 13, 1, 2000, 400, 1600),
('TRX1665477065', 17, 1, 2000, 0, 2000),
('TRX1665477065', 15, 1, 3000, 0, 3000),
('TRX1665477065', 13, 1, 2000, 400, 1600),
('TRX1665562151', 13, 4, 2000, 1600, 6400),
('TRX1665562151', 15, 1, 3000, 0, 3000),
('TRX1665578979', 13, 1, 2000, 400, 1600),
('TRX1665578979', 15, 1, 3000, 0, 3000),
('TRX1665579107', 13, 1, 2000, 400, 1600),
('TRX1665579107', 15, 1, 3000, 0, 3000),
('TRX1665579107', 17, 1, 2000, 0, 2000),
('TRX1665579793', 15, 1, 3000, 0, 3000),
('TRX1665579833', 13, 1, 2000, 400, 1600),
('TRX1665583697', 15, 1, 3000, 0, 3000),
('TRX1665583810', 13, 2, 2000, 800, 3200),
('TRX1665644163', 13, 7, 2000, 2800, 11200),
('TRX1665644245', 13, 1, 2000, 400, 1600),
('TRX1665647289', 13, 1, 2000, 400, 1600),
('TRX1665651071', 15, 1, 3000, 0, 3000),
('TRX1665651071', 17, 1, 2000, 0, 2000),
('TRX1665653155', 13, 1, 2000, 400, 1600),
('TRX1665653155', 15, 1, 3000, 0, 3000),
('TRX1665653155', 17, 1, 2000, 0, 2000),
('TRX1665653250', 13, 1, 2000, 400, 1600),
('TRX1665653250', 15, 1, 3000, 0, 3000),
('TRX1665653250', 17, 1, 2000, 0, 2000),
('TRX1665653330', 17, 3, 2000, 0, 6000),
('TRX1665653407', 13, 1, 2000, 400, 1600),
('TRX1665653407', 15, 1, 3000, 0, 3000),
('TRX1665653450', 13, 3, 2000, 1200, 4800),
('TRX1665653450', 17, 1, 2000, 0, 2000),
('TRX1665653764', 15, 2, 3000, 0, 6000),
('TRX1665653969', 13, 1, 2000, 400, 1600),
('TRX1665653969', 17, 1, 2000, 0, 2000),
('TRX1665654151', 13, 1, 2000, 400, 1600),
('TRX1665679567', 17, 1, 2000, 0, 2000),
('TRX1665679630', 17, 2, 2000, 0, 4000),
('TRX1665680030', 15, 1, 3000, 0, 3000),
('TRX1665680184', 15, 1, 3000, 0, 3000);

--
-- Trigger `sale_detail`
--
DELIMITER $$
CREATE TRIGGER `after add trans` AFTER INSERT ON `sale_detail` FOR EACH ROW BEGIN
   UPDATE obat SET stok = stok - NEW.amount
 
   WHERE id_obat = NEW.id_obat;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'box', '2022-10-04 15:59:11', '2022-10-04 15:59:11'),
(2, 'strip', '2022-10-04 15:59:11', '2022-10-04 15:59:11'),
(3, 'buah', '2022-10-04 15:59:26', '2022-10-04 15:59:26'),
(4, 'lusin', '2022-10-04 15:59:26', '2022-10-04 15:59:26'),
(5, 'sachet', '2022-10-04 16:03:41', '2022-10-04 16:03:41'),
(6, 'botol', '2022-10-04 12:04:32', '2022-10-06 13:23:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'umamjr007@gmail.com', 'umam', 'Khaerul Umam', '1665223488_64babcc268e81fcadabc.jpg', '$2y$10$p2aresbHZX01/afwa0nAZu5hSbrP7M4s/GkDS5fqy2gIGuMUwquK.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-01 00:16:16', '2022-10-08 06:09:08', NULL),
(2, 'khaeumam@mail.com', 'khael', 'Khaerul Umam', '1665475668_51fe9b6b67bea1adf191.jpg', '$2y$10$Y7WpMZH13e1a2SjDv2DfxOBQApbpq.VRS7.dhhxFCQgPTnC5GfTAW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-04 23:38:57', '2022-10-11 03:07:48', NULL),
(12, 'akuganteng@mail.com', 'aku', 'akuuuuu', 'default.png', '$2y$10$sGMr/Tkb1Hj5EKenUgJ.rusOs.KTLsumehfzbRpJlIqqbRCEWs.ru', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-08 04:01:21', '2022-10-09 09:09:35', NULL),
(19, 'cobasaya@gmail.com', 'coba', 'coba', 'default.png', '$2y$10$R80YNRk/Hcj0aN/dj6SbQuyCz/3YTQz8/wCcDLpWgbnYxKUGrsM96', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2022-10-08 06:21:32', '2022-10-09 13:19:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id_produsen`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indeks untuk tabel `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD KEY `sale_id` (`sale_id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id_produsen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
