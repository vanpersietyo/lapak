-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Apr 2019 pada 04.11
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

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
(31, 6, 'AKTVS20190422001', '2019-04-15', 'Rapat Rekomendasi Roadmap 2019', ' ', 0, 0, '', 1, '2019-04-22 08:10:54', '2019-04-22 08:22:42'),
(32, 6, 'AKTVS20190422002', '2019-04-22', 'Persiapan Administrasi Apeksi', ' ', 1, 1, '{\"file_name\":\"20190227_PP_49_Tahun_2018_Manajemen_PPPK.pdf\",\"file_type\":\"application\\/pdf\",\"file_path\":\"\\/opt\\/lampp\\/htdocs\\/project\\/lapak\\/assets\\/uploads\\/file\\/\",\"full_path\":\"\\/opt\\/lampp\\/htdocs\\/project\\/lapak\\/assets\\/uploads\\/file\\/20190227_PP_49_Tahun_2018_Manajemen_PPPK.pdf\",\"raw_name\":\"20190227_PP_49_Tahun_2018_Manajemen_PPPK\",\"orig_name\":\"20190227_PP_49_Tahun_2018_Manajemen_PPPK.pdf\",\"client_name\":\"20190227 PP 49 Tahun 2018 Manajemen PPPK.pdf\",\"file_ext\":\".pdf\",\"file_size\":1305.3699999999998908606357872486114501953125,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}', 0, '2019-04-22 08:16:22', '2019-04-22 08:23:59'),
(33, 6, 'AKTVS20190422003', '2019-04-22', 'Rapat', ' ', 0, 2, '{\"file_name\":\"Jadwal_Rakor_Komwil_Update_18_Maret_2019.doc\",\"file_type\":\"application\\/msword\",\"file_path\":\"\\/opt\\/lampp\\/htdocs\\/project\\/lapak\\/assets\\/uploads\\/file\\/\",\"full_path\":\"\\/opt\\/lampp\\/htdocs\\/project\\/lapak\\/assets\\/uploads\\/file\\/Jadwal_Rakor_Komwil_Update_18_Maret_2019.doc\",\"raw_name\":\"Jadwal_Rakor_Komwil_Update_18_Maret_2019\",\"orig_name\":\"Jadwal_Rakor_Komwil_Update_18_Maret_2019.doc\",\"client_name\":\"Jadwal Rakor Komwil Update 18 Maret 2019.doc\",\"file_ext\":\".doc\",\"file_size\":1310,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}', 0, '2019-04-22 08:18:15', '2019-04-22 08:24:22'),
(34, 6, 'AKTVS20190422004', '2019-04-22', 'Sosialisasi', ' ', 0, 1, '', 0, '2019-04-22 09:23:36', '2019-04-24 03:54:34'),
(35, 12, 'AKTVS20190422005', '2019-04-22', 'Rapat', ' ', 0, 1, '', 0, '2019-04-22 10:16:07', '2019-04-24 02:03:31'),
(36, 6, 'AKTVS20190424001', '2019-04-24', ' Rapat inventarisasi Aplikasi', ' ', 0, 0, '', 0, '2019-04-24 02:52:13', '0000-00-00 00:00:00'),
(37, 6, 'AKTVS20190424002', '2019-04-24', 'Rapat', ' ', 0, 0, '', 0, '2019-04-24 02:53:25', '0000-00-00 00:00:00'),
(38, 6, 'AKTVS20190424003', '2019-04-24', ' Rapat', ' ', 0, 0, '', 1, '2019-04-24 03:51:02', '2019-04-24 03:52:51');

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
(1, 'LVL0001', 'ROOT', 'akses penuh', 0, '2019-04-18 00:29:19', '0000-00-00 00:00:00'),
(2, 'LVL0002', 'KABAG', 'Kepala Bagian', 0, '2019-04-18 00:29:30', '0000-00-00 00:00:00'),
(3, 'LVL0003', 'KASUBAG', 'Kepala Sub Bagian', 0, '2019-04-18 00:29:46', '0000-00-00 00:00:00'),
(4, 'LVL0004', 'PELAKSANA', 'PELAKSANA AKTIVITAS', 0, '2019-04-18 00:30:15', '0000-00-00 00:00:00');

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
(9, 3, 32, 1, NULL, '2019-04-22 08:23:59'),
(10, 3, 33, 0, 'tidak relevan', '2019-04-22 08:24:22'),
(11, 5, 35, 1, 'bagus', '2019-04-24 02:03:31'),
(12, 3, 34, 1, NULL, '2019-04-24 03:54:34');

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
  `bagian` varchar(50) DEFAULT NULL,
  `periode_kontrak` varchar(50) DEFAULT NULL COMMENT 'bulan',
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
(1, 1, 'USR001', 'mayakerjasama', '8ddcff3a80f4189ca1c9d4d902c3c909', 'ROOT', 'P', '', '0000-00-00', ' ', '', '', '0', '0', '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-22 02:09:16', '2019-04-22 07:48:46'),
(2, 2, 'USR002', 'kabagkerjasama', '25d55ad283aa400af464c76d713c07ad', 'Dra. DEWI WAHYU WARDANI, M.Si.', 'P', '', '0000-00-00', ' ', '', '', '0', '0', '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-22 07:34:35', '0000-00-00 00:00:00'),
(3, 5, 'USR003', 'kasubagpe', '25d55ad283aa400af464c76d713c07ad', 'TIENA WAHJUNINGSIH PRIBADI, S.H., ', 'P', '', '0000-00-00', ' ', '', '', '0', '0', '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-22 07:35:22', '0000-00-00 00:00:00'),
(4, 4, 'USR004', 'kasubagln', '25d55ad283aa400af464c76d713c07ad', 'FARAH ANDITA RAMDHANI, S.Hum.', 'P', '', '0000-00-00', ' ', '', '', '0', '0', '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-22 07:36:23', '0000-00-00 00:00:00'),
(5, 3, 'USR005', 'kasubagdn', '25d55ad283aa400af464c76d713c07ad', 'kasubagdn', '', '', '0000-00-00', ' ', '', '', '0', '0', '0000-00-00', '0000-00-00', ' ', NULL, 0, '2019-04-22 07:37:04', '0000-00-00 00:00:00'),
(6, 8, 'USR006', 'maya1234', 'cd3b1199e806bf65a0baba2e57adfcf0', 'Yurika Mayasari', 'P', 'Surabaya', '1994-03-29', ' Bentul II No. 7 Surabaya', '085732022863', 'yurikamayasari@gmail.com', 'Tenaga Admin Aplikasi 2', '8 Bulan', '2019-03-01', '2019-12-31', ' 1. Mengelola SIM Aplikasi Kerjasama;\r\n2. Mengelola website Bagian Administrasi Kerjasama;\r\n3. Mengakomodasi kebutuhan database terkait pelaksanaan tugas Bagian Administrasi Kerjasama;\r\n4. Membantu penyusunan Laporan Kinerja, LPPD, LKPJ dan Laporan Hasil Pelaksanaan Kerjasama di Bagian Administrasi Kerjasama;', NULL, 0, '2019-04-22 07:56:54', '2019-04-24 10:15:24'),
(7, 8, 'USR007', 'taofik1234', '73c3a4c6f5f30e2ed0142be7db53813e', 'Taofik', 'L', '', '1973-03-16', ' Jl. Manukan Lor I / 7 Surabaya', '081331100606', '', 'Tenaga Administrasi 3', '1 Tahun', '2019-01-02', '2019-12-31', ' 1. Melaksanakan tugas-tugas administrasi yang terkait dengan kerjasama daerah;\r\n2. Membantu melakukan perawatan komputer, printer, mobil operasional, instalasi dan peralatan lainnya sebagai penunjang operasional kantor;\r\n3. Membantu pengurusan ijin- ijin perjalanan dinas luar negeri;\r\n4. Sebagai pembantu umum;\r\n5. Membantu mengentri data barang persediaan;\r\n6. Membantu mencatat dan menghitung keluar/masuk barang inventaris;', NULL, 0, '2019-04-22 09:54:27', '2019-04-24 08:58:07'),
(8, 7, 'USR008', 'farid1234', 'acc0b7857abb226eaf7a347c477033ce', 'M. Husni Faried', 'L', '', '1990-03-16', ' Manyar Sabrangan 8-B/44-B Surabaya', '081335138230', '', 'Tenaga Teknis 2', '1 Tahun', '2019-01-02', '2019-12-31', ' 1. Membuat desain website, souvenir, buku profil, buku laporan, seragam dan logo- logo event di Bagian Administrasi Kerjasama ;\r\n2. Membuat Guide Book perjalanan dinas luar negeri;\r\n3. Membuat laporan kerjasama dan perjalanan dinas luar negeri;\r\n4. Mengentri data delegasi perjalanan dinas luar negeri;\r\n5. Membantu pendampingan tamu dari luar negeri;\r\n6. Bertanggung jawab atas ketersediaan data PNS terkait kebutuhan administrasi perjalanan dinas luar negeri;', NULL, 0, '2019-04-22 09:56:58', '2019-04-24 09:01:36'),
(9, 7, 'USR009', 'dina1234', '9b37a3ea07415a3421941a3110053b6b', 'Dina Hadfina Mulyani', 'P', '', '1992-11-08', ' Jl. Wiguna Timur VII / 3 Surabaya', '081259225961', '', 'Tenaga Teknis 2', '1 Tahun', '2019-01-02', '2019-12-31', ' 1. Membantu menyiapkan bahan-bahan yang terkait dengan kerjasama daerah dengan mitra kerjasama di luar negeri;\r\n2. Membantu pembuatan dokumen kerjasama daerah dengan mitra kerjasama di luar negeri;\r\n3. Membantu menyusun petunjuk teknis pelaksanaan kerjasama daerah dengan mitra kerjasama di luar negeri;\r\n4. Melaksanakan tugas-tugas administrasi yang terkait dengan kerjasama daerah dengan mitra kerjasama di luar negeri;\r\n5. Sebagai penerjemah pada acara kunjungan tamu dari luar negeri;\r\n6. Membantu komunikasi dengan mitra kerjasama di luar negeri;\r\n7. Membantu pengurusan visa dan ijin- ijin perjalanan dinas luar negeri;', NULL, 0, '2019-04-22 09:57:57', '2019-04-24 09:02:47'),
(10, 7, 'USR010', 'vita1234', '09d68704be7ddb9f3553478bcc985231', 'Cavita Ezra Martina', 'P', '', '1996-08-23', ' Jl. Kalibutuh 136 Surabaya', '081221812027', '', 'Tenaga Administrasi 3', '0', '2019-01-02', '2019-12-31', ' 1. Mengentri data delegasi perjalanan dinas luar negeri;\r\n2. Membantu pendampingan tamu dari luar negeri;\r\n3. Membantu menyiapkan bahan- bahan yang terkait dengan kerjasama daerah dengan mitra kerjasama di luar negeri;\r\n4. Melaksanakan tugas- tugas administrasi yang terkait dengan kerjasama daerah dengan mitra kerjasama di luar negeri;\r\n5. Sebagai penerjemah pada acara kunjungan tamu dari luar negeri;', NULL, 0, '2019-04-22 09:58:35', '2019-04-24 09:04:18'),
(11, 6, 'USR011', 'tanti1234', 'cba6613105bc233155c55d7012970d18', 'Tanti Mei Wulan Cahyani', 'P', '', '1986-05-18', ' Tambak Segaran 5 / 18 Surabaya', '085645270018', '', 'Tenaga Teknis 2', '1 Tahun', '2019-01-02', '2019-12-31', ' 1. Membantu menyiapkan bahan-bahan yang terkait dengan kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n2. Membantu pembuatan dokumen kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n3. Membantu koordinasi dengan Perangkat Daerah terkait;\r\n4. Melaksanakan tugas-tugas administrasi yang terkait dengan kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n5. Membantu komunikasi dengan mitra kerjasama di dalam negeri;', NULL, 0, '2019-04-22 09:59:39', '2019-04-24 07:55:38'),
(12, 6, 'USR012', 'mirza1234', '876b530c2fe4088ce30e8deb16623839', 'Mirza Nindya P', 'P', '', '1994-10-05', 'Darma Rakyat II No. 9 Surabaya', '085730957353', '', 'Tenaga Teknis 2', '2 Bulan', '2019-03-01', '2019-04-30', ' 1. Membantu menyiapkan bahan-bahan yang terkait dengan kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n\r\n2. Membantu pembuatan dokumen kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n\r\n3. Membantu koordinasi dengan Perangkat Daerah terkait;\r\n\r\n4. Melaksanakan tugas-tugas administrasi yang terkait dengan kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n\r\n5. Membantu komunikasi dengan mitra kerjasama di dalam negeri;', NULL, 0, '2019-04-22 10:00:53', '2019-04-24 09:07:52'),
(13, 6, 'USR013', 'lina1234', 'b795f72d7bdce788197af463a822580f', 'Maurent Naulina', 'P', '', '1996-03-16', ' Jl. Pucangan 9/17 Surabaya', '085331612467', '', 'Tenaga Teknis 2', '1 Tahun', '2019-01-02', '2019-12-31', ' 1. Membantu menyiapkan bahan-bahan yang terkait dengan kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n2. Membantu pembuatan dokumen kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n3. Membantu koordinasi dengan Perangkat Daerah terkait;\r\n4. Melaksanakan tugas-tugas administrasi yang terkait dengan kerjasama daerah dengan mitra kerjasama di dalam negeri;\r\n5. Membantu komunikasi dengan mitra kerjasama di dalam negeri;', NULL, 0, '2019-04-23 01:23:35', '2019-04-24 09:09:39');

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
,`keterangan_pengerjaan_aktivitas` varchar(23)
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
,`bagian` varchar(50)
,`periode_kontrak` varchar(50)
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
,`bagian` varchar(50)
,`periode_kontrak` varchar(50)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_aktivitas`  AS  (select `aktivitas`.`id_aktivitas` AS `id_aktivitas`,`aktivitas`.`id_user` AS `id_user`,`aktivitas`.`kode_aktivitas` AS `kode_aktivitas`,`aktivitas`.`tgl_aktivitas` AS `tgl_aktivitas`,`aktivitas`.`nama_aktivitas` AS `nama_aktivitas`,`aktivitas`.`keterangan_aktivitas` AS `keterangan_aktivitas`,`aktivitas`.`pengerjaan_aktivitas` AS `pengerjaan_aktivitas`,if((`aktivitas`.`pengerjaan_aktivitas` = 0),'Jam Kerja','Luar Jam Kerja / Lembur') AS `keterangan_pengerjaan_aktivitas`,`aktivitas`.`status_aktivitas` AS `status_aktivitas`,`aktivitas`.`file` AS `file`,if((`aktivitas`.`status_aktivitas` = 0),'Menunggu Persetujuan',if((`aktivitas`.`status_aktivitas` = 1),'Disetujui',if((`aktivitas`.`status_aktivitas` = 2),'Ditolak',''))) AS `keterangan_status_aktivitas`,`aktivitas`.`deleted` AS `deleted`,`aktivitas`.`date_created` AS `date_created`,`aktivitas`.`date_modified` AS `date_modified`,`v_user`.`kode_user` AS `kode_user`,`v_user`.`username` AS `username`,`v_user`.`password` AS `password`,`v_user`.`nama` AS `nama`,`v_user`.`jenis_kelamin` AS `jenis_kelamin`,`v_user`.`tempat_lahir` AS `tempat_lahir`,`v_user`.`tgl_lahir` AS `tgl_lahir`,`v_user`.`alamat` AS `alamat`,`v_user`.`telp` AS `telp`,`v_user`.`email` AS `email`,`v_user`.`bagian` AS `bagian`,`v_user`.`periode_kontrak` AS `periode_kontrak`,`v_user`.`tgl_awal_kontrak` AS `tgl_awal_kontrak`,`v_user`.`tgl_akhir_kontrak` AS `tgl_akhir_kontrak`,`v_user`.`tugas` AS `tugas`,`v_user`.`foto` AS `foto`,`v_user`.`deleted` AS `user_deleted`,`v_user`.`date_created` AS `user_date_created`,`v_user`.`date_modified` AS `user_date_modified`,`v_user`.`id_jabatan` AS `id_jabatan`,`v_user`.`id_level` AS `id_level`,`v_user`.`nama_level` AS `nama_level`,`v_user`.`kode_jabatan` AS `kode_jabatan`,`v_user`.`id_parent_jabatan` AS `id_parent_jabatan`,`v_user`.`kode_parent_jabatan` AS `kode_parent_jabatan`,`v_user`.`nama_parent_jabatan` AS `nama_parent_jabatan`,`v_user`.`keterangan_parent_jabatan` AS `keterangan_parent_jabatan`,`v_user`.`nama_jabatan` AS `nama_jabatan`,`v_user`.`keterangan_jabatan` AS `keterangan_jabatan` from (`aktivitas` join `v_user` on((`v_user`.`id_user` = `aktivitas`.`id_user`)))) ;

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
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id_persetujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
