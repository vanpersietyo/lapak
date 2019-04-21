-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Apr 2019 pada 12.08
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_aktivitas` varchar(25) NOT NULL,
  `tgl_aktivitas` date NOT NULL DEFAULT '0000-00-00',
  `nama_aktivitas` varchar(75) NOT NULL,
  `keterangan_aktivitas` varchar(100) DEFAULT NULL,
  `pengerjaan_aktivitas` int(1) NOT NULL DEFAULT '0' COMMENT '0 = jam kerja | 1 = diluar jam kerja',
  `status_aktivitas` smallint(3) DEFAULT '0' COMMENT '0 = diajukan | 1 = disetujui | 2 = ditolak',
  `file` text,
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not deleted ;  1 = deleted',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id_aktivitas`, `id_user`, `kode_aktivitas`, `tgl_aktivitas`, `nama_aktivitas`, `keterangan_aktivitas`, `pengerjaan_aktivitas`, `status_aktivitas`, `file`, `deleted`, `date_created`, `date_modified`) VALUES
(9, 32, 'AKTVS20190421001', '2019-04-21', 'ngoding jaya', 'ini ngoding\r\n ', 0, 0, NULL, 0, '2019-04-21 06:09:16', '0000-00-00 00:00:00'),
(10, 32, 'AKTVS20190421002', '2019-04-21', 'tes 2', 'asasd ', 0, 2, NULL, 0, '2019-04-21 07:20:23', '2019-04-21 07:21:01'),
(11, 32, 'AKTVS20190421003', '2019-04-21', 'tes 3', ' asasdas\r\n', 0, 1, NULL, 0, '2019-04-21 07:20:36', '2019-04-21 07:20:55'),
(12, 33, 'AKTVS20190421004', '2019-04-21', 'iki punya staf dn', 'tes ', 0, 0, NULL, 0, '2019-04-21 07:41:28', '0000-00-00 00:00:00'),
(13, 33, 'AKTVS20190421005', '2019-04-21', 'pelraasdad 2', ' 3', 0, 2, NULL, 0, '2019-04-21 07:41:41', '2019-04-21 07:56:53'),
(14, 33, 'AKTVS20190421006', '2019-04-21', '3adasdaasd', ' 23234', 0, 1, NULL, 0, '2019-04-21 07:41:50', '2019-04-21 07:56:49'),
(15, 34, 'AKTVS20190421007', '2019-04-21', 'staf_ln_1', ' asdasdasd', 0, 0, NULL, 0, '2019-04-21 07:53:21', '0000-00-00 00:00:00'),
(16, 34, 'AKTVS20190421008', '2019-04-21', 'staf_ln_2', ' asdasd', 0, 2, NULL, 0, '2019-04-21 07:53:28', '2019-04-21 07:57:19'),
(17, 34, 'AKTVS20190421009', '2019-04-21', 'staf_ln_3', ' asdasdasd', 0, 1, NULL, 0, '2019-04-21 07:53:34', '2019-04-21 07:57:12'),
(18, 33, 'AKTVS20190421010', '2019-04-21', 'tesss', ' asdadsa', 0, 0, '0', 0, '2019-04-21 08:32:17', '0000-00-00 00:00:00'),
(19, 33, 'AKTVS20190421011', '2019-04-21', 'asdasd', ' ', 0, 0, NULL, 0, '2019-04-21 08:52:27', '0000-00-00 00:00:00'),
(20, 33, 'AKTVS20190421012', '2019-04-21', 'asdasdas', ' asdasd', 1, 0, 'virus_penghilang_office.txt', 0, '2019-04-21 08:59:17', '0000-00-00 00:00:00'),
(21, 33, 'AKTVS20190421013', '2019-04-21', 'sfdsdfsfds', ' ', 0, 0, '{\"file_name\":\"4_Komponen-IMK.pdf\",\"file_type\":\"application\\/pdf\",\"file_path\":\"\\/opt\\/lampp\\/htdocs\\/project\\/lapak\\/assets\\/uploads\\/file\\/\",\"full_path\":\"\\/opt\\/lampp\\/htdocs\\/project\\/lapak\\/assets\\/uploads\\/file\\/4_Komponen-IMK.pdf\",\"raw_name\":\"4_Komponen-IMK\",\"orig_name\":\"4_Komponen-IMK.pdf\",\"client_name\":\"4_Komponen-IMK.pdf\",\"file_ext\":\".pdf\",\"file_size\":574.0700000000000500222085975110530853271484375,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}', 0, '2019-04-21 09:00:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_aktivitas` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `jenis_file` varchar(10) NOT NULL,
  `path_file` varchar(50) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `kode_jabatan` varchar(25) NOT NULL,
  `id_parent_jabatan` int(11) DEFAULT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `keterangan_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `id_level`, `kode_jabatan`, `id_parent_jabatan`, `nama_jabatan`, `keterangan_jabatan`) VALUES
(1, 1, 'ROOT', NULL, 'ROOT', 'ROOT'),
(2, 2, 'KABAG', NULL, 'Kepala Bagian Administrasi Kerjasama', 'Administrasi Kerjasama'),
(3, 3, 'KASUBAG_DN', 2, 'Kepala Sub Bagian Kerjasama Dalam Negeri', 'Dalam Negeri'),
(4, 3, 'KASUBAG_LN', 2, 'Kepala Sub Bagian Kerjasama Luar Negeri', 'Luar Negeri'),
(5, 3, 'KASUBAG_PE', 2, 'Kepala Sub Bagian Pelaporan dan Evaluasi Kerjasama', 'Pelaporan dan Evaluasi'),
(6, 4, 'STAFF_DN', 3, 'Staff Sub Bagian Kerjasama Dalam Negeri', 'Dalam Negeri'),
(7, 4, 'STAFF_LN', 4, 'Staff Sub Bagian Kerjasama Luar Negeri', 'Luar Negeri'),
(8, 4, 'STAFF_PE', 5, 'Staff Sub Bagian Pelaporan dan Evaluasi Kerjasama', 'Pelaporan dan Evaluasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `kode_level` varchar(10) NOT NULL,
  `nama_level` varchar(25) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0= not deleted | 1 = deleted',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `kode_level`, `nama_level`, `keterangan`, `deleted`, `date_created`, `date_modified`) VALUES
(1, 'LVL0001', 'ROOT', 'akses penuh', 0, '2019-04-18 07:29:19', '0000-00-00 00:00:00'),
(2, 'LVL0002', 'KABAG', 'Kepala Bagian', 0, '2019-04-18 07:29:30', '0000-00-00 00:00:00'),
(3, 'LVL0003', 'KASUBAG', 'Kepala Sub Bagian', 0, '2019-04-18 07:29:46', '0000-00-00 00:00:00'),
(4, 'LVL0004', 'PELAKSANA', 'PELAKSANA AKTIVITAS', 0, '2019-04-18 07:30:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `persetujuan`
--

CREATE TABLE `persetujuan` (
  `id_persetujuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_aktivitas` int(11) NOT NULL,
  `jenis_persetujuan` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = setuju | 0 = tolak',
  `alasan` varchar(100) DEFAULT NULL,
  `tgl_persetujuan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `persetujuan`
--

INSERT INTO `persetujuan` (`id_persetujuan`, `id_user`, `id_aktivitas`, `jenis_persetujuan`, `alasan`, `tgl_persetujuan`) VALUES
(1, 31, 11, 1, 'setuju', '2019-04-21 07:20:55'),
(2, 31, 10, 0, 'saya tolak', '2019-04-21 07:21:01'),
(3, 35, 14, 1, 'setuju', '2019-04-21 07:56:49'),
(4, 35, 13, 0, 'tolak', '2019-04-21 07:56:53'),
(5, 36, 17, 1, 'setuja', '2019-04-21 07:57:12'),
(6, 36, 16, 0, 'saya tolak', '2019-04-21 07:57:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `kode_user` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `telp` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `bagian` int(50) DEFAULT NULL,
  `periode_kontrak` int(11) DEFAULT NULL COMMENT 'bulan',
  `tgl_awal_kontrak` date DEFAULT NULL,
  `tgl_akhir_kontrak` date DEFAULT NULL,
  `tugas` text,
  `foto` varchar(100) DEFAULT 'male-circle-512.png',
  `deleted` tinyint(1) DEFAULT '0' COMMENT '0 : tidak di hapus | 1 = dihapus',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_jabatan`, `kode_user`, `username`, `password`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telp`, `email`, `bagian`, `periode_kontrak`, `tgl_awal_kontrak`, `tgl_akhir_kontrak`, `tugas`, `foto`, `deleted`, `date_created`, `date_modified`) VALUES
(26, 1, 'USR003', 'root', '63a9f0ea7bb98050796b649e85481845', 'Adhitya Dwi Prasetyo', 'L', 'KABUPATEN SIDOARJO', '1994-06-28', 'Jalan Mayjen Bambang Yuwono No 201\r\nDusun Suwaluh Utara RT 03 RW 01\r\nDesa Suwaluh', '', 'barcelonitas.adhyt@gmail.com', 0, 1, '2019-01-01', '2019-06-30', 'mengelola aplikasi\r\n', NULL, 0, '2019-04-18 07:30:41', '2019-04-21 06:00:29'),
(30, 2, 'USR004', 'kabag', '8ddcff3a80f4189ca1c9d4d902c3c909', 'kabag', '', '', '0000-00-00', ' ', '', '', 0, 0, '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-21 06:05:11', '0000-00-00 00:00:00'),
(31, 5, 'USR005', 'kasubagpe', '8ddcff3a80f4189ca1c9d4d902c3c909', 'ibu tina', '', '', '0000-00-00', ' ', '', '', 0, 0, '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-21 06:07:05', '0000-00-00 00:00:00'),
(32, 8, 'USR006', 'staffpe', '8ddcff3a80f4189ca1c9d4d902c3c909', 'staff pe', '', '', '0000-00-00', ' ', '', '', 0, 0, '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-21 06:07:30', '0000-00-00 00:00:00'),
(33, 6, 'USR007', 'staffdn', '8ddcff3a80f4189ca1c9d4d902c3c909', 'staffdn', '', '', '0000-00-00', ' ', '', '', 0, 0, '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-21 07:37:55', '0000-00-00 00:00:00'),
(34, 7, 'USR008', 'staffln', '8ddcff3a80f4189ca1c9d4d902c3c909', 'staffln', '', '', '0000-00-00', ' ', '', '', 0, 0, '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-21 07:38:33', '0000-00-00 00:00:00'),
(35, 3, 'USR009', 'kasubagdn', '8ddcff3a80f4189ca1c9d4d902c3c909', 'kasubagdn', '', '', '0000-00-00', ' ', '', '', 0, 0, '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-21 07:38:57', '0000-00-00 00:00:00'),
(36, 4, 'USR010', 'kasubagln', '8ddcff3a80f4189ca1c9d4d902c3c909', 'kasubagln', '', '', '0000-00-00', ' ', '', '', 0, 0, '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-21 07:39:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_aktivitas`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_aktivitas` (
`id_aktivitas` int(11)
,`id_user` int(11)
,`kode_aktivitas` varchar(25)
,`tgl_aktivitas` date
,`nama_aktivitas` varchar(75)
,`keterangan_aktivitas` varchar(100)
,`pengerjaan_aktivitas` int(1)
,`status_aktivitas` smallint(3)
,`file` text
,`keterangan_status_aktivitas` varchar(20)
,`deleted` tinyint(1)
,`date_created` timestamp
,`date_modified` timestamp
,`kode_user` varchar(15)
,`username` varchar(25)
,`password` varchar(50)
,`nama` varchar(50)
,`jenis_kelamin` varchar(15)
,`tempat_lahir` varchar(25)
,`tgl_lahir` date
,`alamat` text
,`telp` varchar(15)
,`email` varchar(50)
,`bagian` int(50)
,`periode_kontrak` int(11)
,`tgl_awal_kontrak` date
,`tgl_akhir_kontrak` date
,`tugas` text
,`foto` varchar(100)
,`user_deleted` tinyint(1)
,`user_date_created` timestamp
,`user_date_modified` timestamp
,`id_jabatan` int(11)
,`id_level` int(11)
,`nama_level` varchar(25)
,`kode_jabatan` varchar(25)
,`id_parent_jabatan` int(11)
,`kode_parent_jabatan` varchar(25)
,`nama_parent_jabatan` varchar(50)
,`keterangan_parent_jabatan` varchar(100)
,`nama_jabatan` varchar(50)
,`keterangan_jabatan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_jabatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_jabatan` (
`id_jabatan` int(11)
,`id_level` int(11)
,`nama_level` varchar(25)
,`kode_jabatan` varchar(25)
,`id_parent_jabatan` int(11)
,`kode_parent_jabatan` varchar(25)
,`nama_parent_jabatan` varchar(50)
,`keterangan_parent_jabatan` varchar(100)
,`nama_jabatan` varchar(50)
,`keterangan_jabatan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_persetujuan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_persetujuan` (
`id_persetujuan` int(11)
,`id_user` int(11)
,`id_aktivitas` int(11)
,`jenis_persetujuan` tinyint(1)
,`keterangan_jenis` varchar(11)
,`alasan` varchar(100)
,`tgl_persetujuan` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_user` (
`id_user` int(11)
,`kode_user` varchar(15)
,`username` varchar(25)
,`password` varchar(50)
,`nama` varchar(50)
,`jenis_kelamin` varchar(15)
,`tempat_lahir` varchar(25)
,`tgl_lahir` date
,`alamat` text
,`telp` varchar(15)
,`email` varchar(50)
,`bagian` int(50)
,`periode_kontrak` int(11)
,`tgl_awal_kontrak` date
,`tgl_akhir_kontrak` date
,`tugas` text
,`foto` varchar(100)
,`deleted` tinyint(1)
,`date_created` timestamp
,`date_modified` timestamp
,`id_jabatan` int(11)
,`id_level` int(11)
,`nama_level` varchar(25)
,`kode_jabatan` varchar(25)
,`id_parent_jabatan` int(11)
,`kode_parent_jabatan` varchar(25)
,`nama_parent_jabatan` varchar(50)
,`keterangan_parent_jabatan` varchar(100)
,`nama_jabatan` varchar(50)
,`keterangan_jabatan` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_aktivitas`
--
DROP TABLE IF EXISTS `v_aktivitas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_aktivitas`  AS  (select `aktivitas`.`id_aktivitas` AS `id_aktivitas`,`aktivitas`.`id_user` AS `id_user`,`aktivitas`.`kode_aktivitas` AS `kode_aktivitas`,`aktivitas`.`tgl_aktivitas` AS `tgl_aktivitas`,`aktivitas`.`nama_aktivitas` AS `nama_aktivitas`,`aktivitas`.`keterangan_aktivitas` AS `keterangan_aktivitas`,`aktivitas`.`pengerjaan_aktivitas` AS `pengerjaan_aktivitas`,`aktivitas`.`status_aktivitas` AS `status_aktivitas`,`aktivitas`.`file` AS `file`,if((`aktivitas`.`status_aktivitas` = 0),'Menunggu Persetujuan',if((`aktivitas`.`status_aktivitas` = 1),'Disetujui',if((`aktivitas`.`status_aktivitas` = 2),'Ditolak',''))) AS `keterangan_status_aktivitas`,`aktivitas`.`deleted` AS `deleted`,`aktivitas`.`date_created` AS `date_created`,`aktivitas`.`date_modified` AS `date_modified`,`v_user`.`kode_user` AS `kode_user`,`v_user`.`username` AS `username`,`v_user`.`password` AS `password`,`v_user`.`nama` AS `nama`,`v_user`.`jenis_kelamin` AS `jenis_kelamin`,`v_user`.`tempat_lahir` AS `tempat_lahir`,`v_user`.`tgl_lahir` AS `tgl_lahir`,`v_user`.`alamat` AS `alamat`,`v_user`.`telp` AS `telp`,`v_user`.`email` AS `email`,`v_user`.`bagian` AS `bagian`,`v_user`.`periode_kontrak` AS `periode_kontrak`,`v_user`.`tgl_awal_kontrak` AS `tgl_awal_kontrak`,`v_user`.`tgl_akhir_kontrak` AS `tgl_akhir_kontrak`,`v_user`.`tugas` AS `tugas`,`v_user`.`foto` AS `foto`,`v_user`.`deleted` AS `user_deleted`,`v_user`.`date_created` AS `user_date_created`,`v_user`.`date_modified` AS `user_date_modified`,`v_user`.`id_jabatan` AS `id_jabatan`,`v_user`.`id_level` AS `id_level`,`v_user`.`nama_level` AS `nama_level`,`v_user`.`kode_jabatan` AS `kode_jabatan`,`v_user`.`id_parent_jabatan` AS `id_parent_jabatan`,`v_user`.`kode_parent_jabatan` AS `kode_parent_jabatan`,`v_user`.`nama_parent_jabatan` AS `nama_parent_jabatan`,`v_user`.`keterangan_parent_jabatan` AS `keterangan_parent_jabatan`,`v_user`.`nama_jabatan` AS `nama_jabatan`,`v_user`.`keterangan_jabatan` AS `keterangan_jabatan` from (`aktivitas` join `v_user` on((`v_user`.`id_user` = `aktivitas`.`id_user`)))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_jabatan`
--
DROP TABLE IF EXISTS `v_jabatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jabatan`  AS  (select `jabatan`.`id_jabatan` AS `id_jabatan`,`jabatan`.`id_level` AS `id_level`,`level`.`nama_level` AS `nama_level`,`jabatan`.`kode_jabatan` AS `kode_jabatan`,`jabatan`.`id_parent_jabatan` AS `id_parent_jabatan`,`parent_jabatan`.`kode_jabatan` AS `kode_parent_jabatan`,`parent_jabatan`.`nama_jabatan` AS `nama_parent_jabatan`,`parent_jabatan`.`keterangan_jabatan` AS `keterangan_parent_jabatan`,`jabatan`.`nama_jabatan` AS `nama_jabatan`,`jabatan`.`keterangan_jabatan` AS `keterangan_jabatan` from ((`jabatan` left join `jabatan` `parent_jabatan` on((`jabatan`.`id_parent_jabatan` = `parent_jabatan`.`id_jabatan`))) join `level` on((`level`.`id_level` = `jabatan`.`id_level`)))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_persetujuan`
--
DROP TABLE IF EXISTS `v_persetujuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_persetujuan`  AS  (select `persetujuan`.`id_persetujuan` AS `id_persetujuan`,`persetujuan`.`id_user` AS `id_user`,`persetujuan`.`id_aktivitas` AS `id_aktivitas`,`persetujuan`.`jenis_persetujuan` AS `jenis_persetujuan`,if((`persetujuan`.`jenis_persetujuan` = 0),'Penolakan',if((`persetujuan`.`jenis_persetujuan` = 1),'Persetujuan','')) AS `keterangan_jenis`,`persetujuan`.`alasan` AS `alasan`,`persetujuan`.`tgl_persetujuan` AS `tgl_persetujuan` from `persetujuan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS  (select `user`.`id_user` AS `id_user`,`user`.`kode_user` AS `kode_user`,`user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`nama` AS `nama`,`user`.`jenis_kelamin` AS `jenis_kelamin`,`user`.`tempat_lahir` AS `tempat_lahir`,`user`.`tgl_lahir` AS `tgl_lahir`,`user`.`alamat` AS `alamat`,`user`.`telp` AS `telp`,`user`.`email` AS `email`,`user`.`bagian` AS `bagian`,`user`.`periode_kontrak` AS `periode_kontrak`,`user`.`tgl_awal_kontrak` AS `tgl_awal_kontrak`,`user`.`tgl_akhir_kontrak` AS `tgl_akhir_kontrak`,`user`.`tugas` AS `tugas`,`user`.`foto` AS `foto`,`user`.`deleted` AS `deleted`,`user`.`date_created` AS `date_created`,`user`.`date_modified` AS `date_modified`,`v_jabatan`.`id_jabatan` AS `id_jabatan`,`v_jabatan`.`id_level` AS `id_level`,`v_jabatan`.`nama_level` AS `nama_level`,`v_jabatan`.`kode_jabatan` AS `kode_jabatan`,`v_jabatan`.`id_parent_jabatan` AS `id_parent_jabatan`,`v_jabatan`.`kode_parent_jabatan` AS `kode_parent_jabatan`,`v_jabatan`.`nama_parent_jabatan` AS `nama_parent_jabatan`,`v_jabatan`.`keterangan_parent_jabatan` AS `keterangan_parent_jabatan`,`v_jabatan`.`nama_jabatan` AS `nama_jabatan`,`v_jabatan`.`keterangan_jabatan` AS `keterangan_jabatan` from (`user` join `v_jabatan` on((`v_jabatan`.`id_jabatan` = `user`.`id_jabatan`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`),
  ADD KEY `fk_aktifitas_user` (`id_user`);

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD KEY `FK_file_aktivitas` (`id_aktivitas`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`),
  ADD KEY `fk_level_jabatan` (`id_level`),
  ADD KEY `fk_parent_jabatan` (`id_parent_jabatan`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `persetujuan`
--
ALTER TABLE `persetujuan`
  ADD PRIMARY KEY (`id_persetujuan`),
  ADD KEY `fk_persetujuan_user` (`id_user`),
  ADD KEY `fk_aktifitas_persetujuan` (`id_aktivitas`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_jabatan_user` (`id_jabatan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `persetujuan`
--
ALTER TABLE `persetujuan`
  MODIFY `id_persetujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `fk_aktifitas_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `FK_file_aktivitas` FOREIGN KEY (`id_aktivitas`) REFERENCES `aktivitas` (`id_aktivitas`);

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `fk_level_jabatan` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `fk_parent_jabatan` FOREIGN KEY (`id_parent_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `persetujuan`
--
ALTER TABLE `persetujuan`
  ADD CONSTRAINT `fk_aktifitas_persetujuan` FOREIGN KEY (`id_aktivitas`) REFERENCES `aktivitas` (`id_aktivitas`),
  ADD CONSTRAINT `fk_persetujuan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_jabatan_user` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
