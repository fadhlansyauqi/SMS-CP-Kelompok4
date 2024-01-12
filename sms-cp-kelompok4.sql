-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2024 pada 03.12
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms-cp-kelompok4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_11_30_131254_create_tbl_classes_table', 1),
(2, '2014_10_12_000000_create_tbl_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2023_11_30_131613_create_tbl_students_table', 1),
(5, '2023_12_01_135804_create_tbl_teachers_table', 1),
(6, '2023_12_05_115752_create_tbl_courses_table', 1),
(7, '2023_12_12_033203_create_absens_table', 1),
(8, '2023_12_12_131303_create_tbl_class_schedules_table', 1),
(9, '2023_12_13_004442_create_attendances_table', 1),
(10, '2023_12_14_032130_create_tbl_attendances_table', 1),
(11, '2023_12_16_155939_create_tbl_days_table', 1),
(12, '2023_12_16_164339_create_tbl_lesson_hours_table', 1),
(13, '2023_12_20_044713_tbl_sub_attendances', 1),
(14, '2023_12_20_151928_create_tbl_grades_table', 1),
(15, '2023_12_20_161051_create_tbl_sub_grades_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_attendances`
--

CREATE TABLE `tbl_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_attendances`
--

INSERT INTO `tbl_attendances` (`id`, `date`, `id_course`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, '2024-01-12', 1, 1, '2024-01-11 19:02:36', '2024-01-11 19:02:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_classes`
--

INSERT INTO `tbl_classes` (`id`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'VII A', '2023-12-30 07:31:45', '2023-12-30 07:31:45'),
(2, 'VIII A', '2023-12-30 07:32:08', '2023-12-30 07:32:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_class_schedules`
--

CREATE TABLE `tbl_class_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lesson_hours` int(11) NOT NULL,
  `id_course` int(11) DEFAULT NULL,
  `id_class` int(11) NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_class_schedules`
--

INSERT INTO `tbl_class_schedules` (`id`, `id_lesson_hours`, `id_course`, `id_class`, `hari`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Senin', '2023-12-30 07:33:54', '2023-12-30 07:33:54'),
(2, 1, 1, 1, 'Selasa', '2023-12-30 07:33:54', '2023-12-30 07:33:54'),
(3, 1, 1, 1, 'Rabu', '2023-12-30 07:33:54', '2023-12-30 07:33:54'),
(4, 1, 1, 1, 'Kamis', '2023-12-30 07:33:54', '2023-12-30 07:33:54'),
(5, 1, 1, 1, 'Jumat', '2023-12-30 07:33:54', '2023-12-30 07:33:54'),
(6, 1, 1, 1, 'Sabtu', '2023-12-30 07:33:54', '2023-12-30 07:33:54'),
(7, 2, 1, 1, 'Senin', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(8, 2, 1, 1, 'Selasa', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(9, 2, 1, 1, 'Rabu', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(10, 2, 1, 1, 'Kamis', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(11, 2, 1, 1, 'Jumat', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(12, 2, 1, 1, 'Sabtu', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(13, 3, 1, 1, 'Senin', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(14, 3, 1, 1, 'Selasa', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(15, 3, 1, 1, 'Rabu', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(16, 3, 1, 1, 'Kamis', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(17, 3, 1, 1, 'Jumat', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(18, 3, 1, 1, 'Sabtu', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(19, 4, 1, 1, 'Senin', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(20, 4, 1, 1, 'Selasa', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(21, 4, 1, 1, 'Rabu', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(22, 4, 1, 1, 'Kamis', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(23, 4, 1, 1, 'Jumat', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(24, 4, 1, 1, 'Sabtu', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(25, 5, 1, 1, 'Senin', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(26, 5, 1, 1, 'Selasa', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(27, 5, 1, 1, 'Rabu', '2023-12-30 07:33:55', '2023-12-30 07:33:55'),
(28, 5, 1, 1, 'Kamis', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(29, 5, 1, 1, 'Jumat', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(30, 5, 1, 1, 'Sabtu', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(31, 6, 1, 1, 'Senin', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(32, 6, 1, 1, 'Selasa', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(33, 6, 1, 1, 'Rabu', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(34, 6, 1, 1, 'Kamis', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(35, 6, 1, 1, 'Jumat', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(36, 6, 1, 1, 'Sabtu', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(37, 7, 1, 1, 'Senin', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(38, 7, 1, 1, 'Selasa', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(39, 7, 1, 1, 'Rabu', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(40, 7, 1, 1, 'Kamis', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(41, 7, 1, 1, 'Jumat', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(42, 7, 1, 1, 'Sabtu', '2023-12-30 07:33:56', '2023-12-30 07:33:56'),
(43, 1, 1, 2, 'Senin', '2023-12-30 07:35:38', '2023-12-30 07:35:38'),
(44, 1, 1, 2, 'Selasa', '2023-12-30 07:35:38', '2023-12-30 07:35:38'),
(45, 1, 1, 2, 'Rabu', '2023-12-30 07:35:38', '2023-12-30 07:35:38'),
(46, 1, 1, 2, 'Kamis', '2023-12-30 07:35:38', '2023-12-30 07:35:38'),
(47, 1, 1, 2, 'Jumat', '2023-12-30 07:35:38', '2023-12-30 07:35:38'),
(48, 1, 1, 2, 'Sabtu', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(49, 2, 1, 2, 'Senin', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(50, 2, 1, 2, 'Selasa', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(51, 2, 1, 2, 'Rabu', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(52, 2, 1, 2, 'Kamis', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(53, 2, 1, 2, 'Jumat', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(54, 2, 1, 2, 'Sabtu', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(55, 3, 1, 2, 'Senin', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(56, 3, 1, 2, 'Selasa', '2023-12-30 07:35:39', '2023-12-30 07:35:39'),
(57, 3, 1, 2, 'Rabu', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(58, 3, 1, 2, 'Kamis', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(59, 3, 1, 2, 'Jumat', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(60, 3, 1, 2, 'Sabtu', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(61, 4, 1, 2, 'Senin', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(62, 4, 1, 2, 'Selasa', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(63, 4, 1, 2, 'Rabu', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(64, 4, 1, 2, 'Kamis', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(65, 4, 1, 2, 'Jumat', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(66, 4, 1, 2, 'Sabtu', '2023-12-30 07:35:40', '2023-12-30 07:35:40'),
(67, 5, 1, 2, 'Senin', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(68, 5, 1, 2, 'Selasa', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(69, 5, 1, 2, 'Rabu', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(70, 5, 1, 2, 'Kamis', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(71, 5, 1, 2, 'Jumat', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(72, 5, 1, 2, 'Sabtu', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(73, 6, 1, 2, 'Senin', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(74, 6, 1, 2, 'Selasa', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(75, 6, 1, 2, 'Rabu', '2023-12-30 07:35:41', '2023-12-30 07:35:41'),
(76, 6, 1, 2, 'Kamis', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(77, 6, 1, 2, 'Jumat', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(78, 6, 1, 2, 'Sabtu', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(79, 7, 1, 2, 'Senin', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(80, 7, 1, 2, 'Selasa', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(81, 7, 1, 2, 'Rabu', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(82, 7, 1, 2, 'Kamis', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(83, 7, 1, 2, 'Jumat', '2023-12-30 07:35:42', '2023-12-30 07:35:42'),
(84, 7, 1, 2, 'Sabtu', '2023-12-30 07:35:42', '2023-12-30 07:35:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mapel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_courses`
--

INSERT INTO `tbl_courses` (`id`, `kode_mapel`, `nama_mapel`, `id_teacher`, `created_at`, `updated_at`) VALUES
(1, 'PKW101', 'Pendidikan Kewarganegaraan', 1, '2023-12-30 07:33:29', '2023-12-30 07:33:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_days`
--

CREATE TABLE `tbl_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_days`
--

INSERT INTO `tbl_days` (`id`, `hari`, `created_at`, `updated_at`) VALUES
(1, 'Senin', NULL, NULL),
(2, 'Selasa', NULL, NULL),
(3, 'Rabu', NULL, NULL),
(4, 'Kamis', NULL, NULL),
(5, 'Jumat', NULL, NULL),
(6, 'Sabtu', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_grades`
--

CREATE TABLE `tbl_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `id_course` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_grades`
--

INSERT INTO `tbl_grades` (`id`, `date`, `id_course`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, '2024-01-12', 1, 1, '2024-01-11 19:04:38', '2024-01-11 19:04:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lesson_hours`
--

CREATE TABLE `tbl_lesson_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jam` int(11) NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_lesson_hours`
--

INSERT INTO `tbl_lesson_hours` (`id`, `jam`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 1, '07.30 - 08.15', NULL, NULL),
(2, 2, '08.15 - 09.00', NULL, NULL),
(3, 3, '09.00 - 09.45', NULL, NULL),
(4, 4, '10.00 - 10.45', NULL, NULL),
(5, 5, '10.45 - 11.30', NULL, NULL),
(6, 6, '11.45 - 12.30', NULL, NULL),
(7, 7, '12.30 - 13.15', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `user_id`, `id_kelas`, `nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `nama_ortu`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2000001, 'Andrian', 'Medan, Sumut', '2023-01-01', 'laki-laki', 'Supriadi', 'Medan, Sumut', 'Belum Lulus', '2024-01-11 19:00:25', '2024-01-11 19:00:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_attendances`
--

CREATE TABLE `tbl_sub_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_attendance` bigint(20) UNSIGNED NOT NULL,
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_sub_attendances`
--

INSERT INTO `tbl_sub_attendances` (`id`, `id_attendance`, `id_student`, `status`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hadir', '', '2024-01-11 19:02:38', '2024-01-11 19:02:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_grades`
--

CREATE TABLE `tbl_sub_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_grade` bigint(20) UNSIGNED NOT NULL,
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `jenis_nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_sub_grades`
--

INSERT INTO `tbl_sub_grades` (`id`, `id_grade`, `id_student`, `jenis_nilai`, `nilai`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Quiz', 80, '', '2024-01-11 19:04:38', '2024-01-11 19:04:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_teachers`
--

INSERT INTO `tbl_teachers` (`id`, `nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 2000002, 'Yogi, S.Pd', 'Medan, Sumut', '2023-12-07', 'laki-laki', 'Medan, sumut', '2023-12-30 07:32:59', '2024-01-11 19:01:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('ADMIN','TEACHER','STUDENT') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'STUDENT',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `id_kelas`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'ADMIN', 'admin@mail.com', '$2y$10$prGJHcDxMLmQ.VfCVRplkuWtT1QFYMXCz9Q8sQLDybwOMFegSRoNa', NULL, NULL, NULL),
(2, NULL, 'Teacher', 'TEACHER', 'teacher@mail.com', '$2y$10$aOflLxoj5SY8OzwifzLFPOuVNRXlr//cWmsKH55SKKXKldWqZAz72', NULL, NULL, NULL),
(3, NULL, 'Student', 'STUDENT', 'student@mail.com', '$2y$10$3p5fHoJ4V0rqRoxw5KLd1.RolN7qf59qgtJAruKYMBWbRJPp5vC0.', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_attendances_id_course_foreign` (`id_course`),
  ADD KEY `tbl_attendances_id_kelas_foreign` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_class_schedules`
--
ALTER TABLE `tbl_class_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_days`
--
ALTER TABLE `tbl_days`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_grades_id_course_foreign` (`id_course`),
  ADD KEY `tbl_grades_id_kelas_foreign` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_lesson_hours`
--
ALTER TABLE `tbl_lesson_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_students_id_kelas_foreign` (`id_kelas`),
  ADD KEY `tbl_students_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tbl_sub_attendances`
--
ALTER TABLE `tbl_sub_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sub_attendances_id_attendance_foreign` (`id_attendance`),
  ADD KEY `tbl_sub_attendances_id_student_foreign` (`id_student`);

--
-- Indeks untuk tabel `tbl_sub_grades`
--
ALTER TABLE `tbl_sub_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sub_grades_id_grade_foreign` (`id_grade`),
  ADD KEY `tbl_sub_grades_id_student_foreign` (`id_student`);

--
-- Indeks untuk tabel `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`),
  ADD KEY `tbl_users_id_kelas_foreign` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_class_schedules`
--
ALTER TABLE `tbl_class_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_days`
--
ALTER TABLE `tbl_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_grades`
--
ALTER TABLE `tbl_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_lesson_hours`
--
ALTER TABLE `tbl_lesson_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_attendances`
--
ALTER TABLE `tbl_sub_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_grades`
--
ALTER TABLE `tbl_sub_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_attendances`
--
ALTER TABLE `tbl_attendances`
  ADD CONSTRAINT `tbl_attendances_id_course_foreign` FOREIGN KEY (`id_course`) REFERENCES `tbl_courses` (`id`),
  ADD CONSTRAINT `tbl_attendances_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_classes` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_grades`
--
ALTER TABLE `tbl_grades`
  ADD CONSTRAINT `tbl_grades_id_course_foreign` FOREIGN KEY (`id_course`) REFERENCES `tbl_courses` (`id`),
  ADD CONSTRAINT `tbl_grades_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_classes` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD CONSTRAINT `tbl_students_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_classes` (`id`),
  ADD CONSTRAINT `tbl_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_sub_attendances`
--
ALTER TABLE `tbl_sub_attendances`
  ADD CONSTRAINT `tbl_sub_attendances_id_attendance_foreign` FOREIGN KEY (`id_attendance`) REFERENCES `tbl_attendances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_sub_attendances_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `tbl_students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sub_grades`
--
ALTER TABLE `tbl_sub_grades`
  ADD CONSTRAINT `tbl_sub_grades_id_grade_foreign` FOREIGN KEY (`id_grade`) REFERENCES `tbl_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_sub_grades_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `tbl_students` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
