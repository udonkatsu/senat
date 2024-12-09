-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 12:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password`, `gambar`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin.jpg'),
(2, 'admin2', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'admin2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_pengguna` int(11) NOT NULL,
  `nama_komisi` varchar(120) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','komisi') NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_bagian` varchar(12) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_pengguna`, `nama_komisi`, `username`, `password`, `role`, `nama_lengkap`, `alamat`, `no_hp_bagian`, `gambar`) VALUES
(24, 'Komisi A - test', 'mewing', 'mewing', 'admin', 'Mewing Sudrajat', '38 Evergreen Drive\r\nHanover', '081335354350', 'mewing.jpg'),
(25, 'test', 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'admin', 'Michael G Miller', '38 Evergreen Drive\r\nHanover', '081335354350', 'test.jpg'),
(28, 'Komisi A - Alan', 'hehe', '42525bb6d3b0dc06bb78ae548733e8fbb55446b3', 'komisi', 'Michael G Miller', '38 Evergreen Drive\r\nHanover', '081335354350', 'hehe.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen`
--

CREATE TABLE `tb_dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `jenis_dokumen` enum('Notulensi','Proposal','Laporan Pertanggung Jawaban','AD ART','Format Administrasi','Laporan Quartil','Rencana Kerja Tahunan','Undang-undang','Materi Legislatis','Musyawarah Mahasiswa','Penilaian UKM','Dokumentasi') NOT NULL,
  `komisi` enum('Pengurus Harian','Komisi A','Komisi B','Komisi C') NOT NULL,
  `tanggal_dokumen` date NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `diunggah_oleh` varchar(100) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_dokumen`
--

INSERT INTO `tb_dokumen` (`id_dokumen`, `judul_dokumen`, `deskripsi`, `jenis_dokumen`, `komisi`, `tanggal_dokumen`, `file_path`, `diunggah_oleh`, `tanggal_upload`) VALUES
(1, 'Notulensi Rapat Awal Tahun 2023', 'Notulensi rapat awal tahun untuk pembahasan program kerja.', 'Notulensi', 'Pengurus Harian', '2024-01-15', 'example.pdf', 'Admin', '2024-01-15 10:00:00'),
(2, 'Proposal Kegiatan Sosial', 'Proposal kegiatan sosial untuk membantu masyarakat.', 'Proposal', 'Pengurus Harian', '2024-02-10', 'example.pdf', 'Admin', '2024-02-10 17:00:00'),
(3, 'Laporan Pertanggung Jawaban Program', 'Laporan program tahunan.', 'Laporan Pertanggung Jawaban', 'Pengurus Harian', '2024-03-20', 'example.pdf', 'Admin', '2024-03-20 17:00:00'),
(4, 'Dokumentasi Rapat Pengurus', 'Dokumentasi rapat pengurus bulanan.', 'Dokumentasi', 'Pengurus Harian', '2024-04-05', 'example.pdf', 'Admin', '2024-04-05 17:00:00'),
(5, 'Rencana Kerja Tahunan', 'Rencana kerja tahunan untuk Komisi A.', 'Rencana Kerja Tahunan', 'Komisi A', '2024-01-20', 'example.pdf', 'Admin', '2024-01-20 17:00:00'),
(6, 'Format Administrasi Baru', 'Format administrasi baru untuk Komisi A.', 'Format Administrasi', 'Komisi A', '2024-02-15', 'example.pdf', 'Admin', '2024-02-15 17:00:00'),
(7, 'Laporan Quartil', 'Laporan quartil pertama tahun ini.', 'Laporan Quartil', 'Komisi A', '2024-03-10', 'example.pdf', 'Admin', '2024-03-10 17:00:00'),
(8, 'Dokumen AD ART', 'AD ART terbaru yang telah disahkan.', 'AD ART', 'Komisi A', '2024-04-20', 'example.pdf', 'Admin', '2024-04-20 17:00:00'),
(9, 'Dokumentasi Kegiatan Komisi A', 'Dokumentasi kegiatan Komisi A.', 'Dokumentasi', 'Komisi A', '2024-05-15', 'example.pdf', 'Admin', '2024-05-15 17:00:00'),
(10, 'Undang-undang Baru', 'Undang-undang baru yang disahkan oleh Komisi B.', 'Undang-undang', 'Komisi B', '2024-01-18', 'example.pdf', 'Admin', '2024-01-18 17:00:00'),
(11, 'Materi Legislasi Baru', 'Materi legislasi baru yang akan diterapkan.', 'Materi Legislatis', 'Komisi B', '2024-02-25', 'example.pdf', 'Admin', '2024-02-25 17:00:00'),
(12, 'Dokumentasi Kegiatan Komisi B', 'Dokumentasi kegiatan legislasi.', 'Dokumentasi', 'Komisi B', '2024-03-30', 'example.pdf', 'Admin', '2024-03-30 17:00:00'),
(14, 'Penilaian UKM Tahunan', 'Penilaian UKM untuk program pembinaan.', 'Penilaian UKM', 'Komisi C', '2024-02-12', 'example.pdf', 'Admin', '2024-02-12 17:00:00'),
(15, 'Dokumentasi Kegiatan Komisi C 2', 'Dokumentasi kegiatan mahasiswa.', 'Dokumentasi', 'Komisi C', '2024-03-20', 'example.pdf', 'Admin', '2024-03-20 17:00:00'),
(16, 'Notulensi Evaluasi Tengah Tahun', 'Notulensi rapat evaluasi program kerja tengah tahun.', 'Notulensi', 'Pengurus Harian', '2024-06-15', 'example.pdf', 'Admin', '2024-06-15 17:00:00'),
(17, 'Proposal Seminar Nasional', 'Proposal kegiatan seminar nasional di kampus.', 'Proposal', 'Pengurus Harian', '2024-07-10', 'example.pdf', 'Admin', '2024-07-10 17:00:00'),
(18, 'Laporan Semester 1', 'Laporan pertanggung jawaban untuk semester 1.', 'Laporan Pertanggung Jawaban', 'Pengurus Harian', '2024-08-20', 'example.pdf', 'Admin', '2024-08-20 17:00:00'),
(19, 'Dokumentasi Lomba Kreatif', 'Dokumentasi lomba kreatif mahasiswa.', 'Dokumentasi', 'Pengurus Harian', '2024-09-05', 'example.pdf', 'Admin', '2024-09-05 17:00:00'),
(20, 'Rencana Kerja Semester', 'Rencana kerja semester pertama tahun ini.', 'Rencana Kerja Tahunan', 'Komisi A', '2024-06-20', 'example.pdf', 'Admin', '2024-06-20 17:00:00'),
(21, 'Format Administrasi Keuangan', 'Format administrasi untuk laporan keuangan.', 'Format Administrasi', 'Komisi A', '2024-07-15', 'example.pdf', 'Admin', '2024-07-15 17:00:00'),
(22, 'Laporan Quartil Kedua', 'Laporan quartil kedua tahun ini.', 'Laporan Quartil', 'Komisi A', '2024-08-10', 'example.pdf', 'Admin', '2024-08-10 17:00:00'),
(23, 'Dokumen Revisi AD ART', 'Revisi dokumen AD ART terbaru.', 'AD ART', 'Komisi A', '2024-09-20', 'example.pdf', 'Admin', '2024-09-20 17:00:00'),
(24, 'Dokumentasi Workshop', 'Dokumentasi workshop keorganisasian.', 'Dokumentasi', 'Komisi A', '2024-10-15', 'example.pdf', 'Admin', '2024-10-15 17:00:00'),
(25, 'Revisi Undang-undang', 'Revisi undang-undang organisasi.', 'Undang-undang', 'Komisi B', '2024-06-18', 'example.pdf', 'Admin', '2024-06-18 17:00:00'),
(26, 'Materi Legislasi Digital', 'Materi legislasi untuk transformasi digital.', 'Materi Legislatis', 'Komisi B', '2024-07-25', 'example.pdf', 'Admin', '2024-07-25 17:00:00'),
(27, 'Dokumentasi Forum Legislasi', 'Dokumentasi forum legislasi nasional.', 'Dokumentasi', 'Komisi B', '2024-08-30', 'example.pdf', 'Admin', '2024-08-30 17:00:00'),
(28, 'Musyawarah UKM', 'Musyawarah UKM tahunan.', 'Musyawarah Mahasiswa', 'Komisi C', '2024-06-28', 'example.pdf', 'Admin', '2024-06-28 17:00:00'),
(29, 'Penilaian UKM Lanjutan', 'Penilaian UKM tahap kedua.', 'Penilaian UKM', 'Komisi C', '2024-07-12', 'example.pdf', 'Admin', '2024-07-12 17:00:00'),
(30, 'Dokumentasi Mahasiswa Berprestasi', 'Dokumentasi penghargaan mahasiswa berprestasi.', 'Dokumentasi', 'Komisi C', '2024-08-20', 'example.pdf', 'Admin', '2024-08-20 17:00:00'),
(31, 'Notulensi Akhir Tahun', 'Notulensi rapat akhir tahun untuk evaluasi program.', 'Notulensi', 'Pengurus Harian', '2024-12-15', 'example.pdf', 'Admin', '2024-12-15 17:00:00'),
(32, 'Proposal Pengabdian Masyarakat', 'Proposal kegiatan pengabdian masyarakat.', 'Proposal', 'Pengurus Harian', '2024-11-10', 'example.pdf', 'Admin', '2024-11-10 17:00:00'),
(33, 'Laporan Tahunan', 'Laporan pertanggung jawaban tahunan.', 'Laporan Pertanggung Jawaban', 'Pengurus Harian', '2024-10-20', 'example.pdf', 'Admin', '2024-10-20 17:00:00'),
(34, 'Dokumentasi Festival', 'Dokumentasi festival budaya kampus.', 'Dokumentasi', 'Pengurus Harian', '2024-09-05', 'example.pdf', 'Admin', '2024-09-05 17:00:00'),
(35, 'Rencana Program 2025', 'Rencana program kerja tahun depan.', 'Rencana Kerja Tahunan', 'Komisi A', '2024-12-20', 'example.pdf', 'Admin', '2024-12-20 17:00:00'),
(36, 'Format Administrasi Baru Tahap 2', 'Format administrasi baru revisi kedua.', 'Format Administrasi', 'Komisi A', '2024-11-15', 'example.pdf', 'Admin', '2024-11-15 17:00:00'),
(37, 'Laporan Quartil Ketiga', 'Laporan quartil ketiga tahun ini.', 'Laporan Quartil', 'Komisi A', '2024-10-10', 'example.pdf', 'Admin', '2024-10-10 17:00:00'),
(38, 'Dokumen Finalisasi AD ART', 'Finalisasi dokumen AD ART tahun ini.', 'AD ART', 'Komisi A', '2024-09-20', 'example.pdf', 'Admin', '2024-09-20 17:00:00'),
(39, 'Dokumentasi Konferensi', 'Dokumentasi konferensi mahasiswa.', 'Dokumentasi', 'Komisi A', '2024-08-15', 'example.pdf', 'Admin', '2024-08-15 17:00:00'),
(40, 'Pembaruan Undang-undang', 'Pembaruan undang-undang tentang keorganisasian.', 'Undang-undang', 'Komisi B', '2024-12-18', 'example.pdf', 'Admin', '2024-12-18 17:00:00'),
(41, 'Materi Legislasi Berbasis AI', 'Materi legislasi baru dengan teknologi AI.', 'Materi Legislatis', 'Komisi B', '2024-11-25', 'example.pdf', 'Admin', '2024-11-25 17:00:00'),
(42, 'Dokumentasi Sosialisasi Legislasi', 'Dokumentasi sosialisasi legislasi organisasi.', 'Dokumentasi', 'Komisi B', '2024-10-30', 'example.pdf', 'Admin', '2024-10-30 17:00:00'),
(43, 'Musyawarah Alumni', 'Musyawarah bersama alumni.', 'Musyawarah Mahasiswa', 'Komisi C', '2024-12-28', 'example.pdf', 'Admin', '2024-12-28 17:00:00'),
(44, 'Penilaian UKM Akhir Tahun', 'Penilaian UKM terakhir tahun ini.', 'Penilaian UKM', 'Komisi C', '2024-11-12', 'example.pdf', 'Admin', '2024-11-12 17:00:00'),
(45, 'Dokumentasi Seminar Mahasiswa', 'Dokumentasi seminar mahasiswa lintas jurusan.', 'Dokumentasi', 'Komisi C', '2024-10-20', 'example.pdf', 'Admin', '2024-10-20 17:00:00'),
(46, 'Notulensi Musyawarah Nasional', 'Notulensi musyawarah nasional tahunan.', 'Notulensi', 'Pengurus Harian', '2024-09-15', 'example.pdf', 'Admin', '2024-09-15 17:00:00'),
(47, 'Proposal Donasi Kemanusiaan', 'Proposal donasi kemanusiaan untuk korban bencana.', 'Proposal', 'Pengurus Harian', '2024-08-10', 'example.pdf', 'Admin', '2024-08-10 17:00:00'),
(48, 'Laporan Akhir Semester 2', 'Laporan pertanggung jawaban semester kedua.', 'Laporan Pertanggung Jawaban', 'Pengurus Harian', '2024-07-20', 'example.pdf', 'Admin', '2024-07-20 17:00:00'),
(49, 'Dokumentasi Festival Seni', 'Dokumentasi festival seni budaya kampus.', 'Dokumentasi', 'Pengurus Harian', '2024-06-05', 'example.pdf', 'Admin', '2024-06-05 17:00:00'),
(50, 'Laporan Penutupan Tahun', 'Laporan penutupan program kerja tahun ini.', 'Laporan Pertanggung Jawaban', 'Pengurus Harian', '2024-12-25', 'example.pdf', 'Admin', '2024-12-25 17:00:00'),
(51, 'test dokumen ini', 'hehe ini test ya', 'Notulensi', 'Pengurus Harian', '2024-11-28', '1732821128-example.pdf', 'admin', '2024-11-28 19:12:08'),
(52, 'Notulensi Rapat Awal Tahun 2025', 'test juga', 'Notulensi', 'Pengurus Harian', '2024-11-29', '1732833794-example.pdf', 'Myrna F Solid', '2024-11-28 22:43:14'),
(53, 'Notulensi Rapat akhir Tahun 2024', 'test donng', 'Notulensi', 'Pengurus Harian', '2024-11-29', '1732835881-SoalGCC.pdf', 'admin', '2024-11-28 23:18:01'),
(54, 'test dokumen ini 3', 'haha test', 'Undang-undang', 'Komisi B', '2024-11-29', '1732836067-MateriUTSITI3.pdf', 'Michael G Miller', '2024-11-28 23:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tanggalkeluar_suratkeluar` datetime NOT NULL,
  `kode_suratkeluar` varchar(10) NOT NULL,
  `nomor_suratkeluar` varchar(45) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL,
  `tanggalsurat_suratkeluar` date NOT NULL,
  `kepada_suratkeluar` varchar(255) NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `tanggalkeluar_suratkeluar`, `kode_suratkeluar`, `nomor_suratkeluar`, `nama_bagian`, `tanggalsurat_suratkeluar`, `kepada_suratkeluar`, `perihal_suratkeluar`, `file_suratkeluar`, `operator`, `tanggal_entry`) VALUES
(27, '2017-11-15 11:15:00', '411', '3451/WALIKOTA/2017', 'WALIKOTA', '2017-11-15', 'Masyarakat', 'Himbauan Gotong Royong', '2017-3451.pdf', 'admin', '2017-11-18 01:25:31'),
(29, '2017-11-15 08:20:00', '851', '3453/TU/2017', 'TU', '2017-11-15', 'Kepala Bagian Tata Usaha', 'Cuti Tahunan ', '2017-3453.pdf', 'admin', '2017-11-18 02:39:32'),
(30, '2017-11-14 13:25:00', '915.1', '3454/ADM.PEMB/2017', 'ADM.PEMB', '2017-11-15', 'Walikota', 'Daftar Usulan Proyek', '2017-3454.pdf', 'admin', '2017-11-14 23:29:41'),
(31, '2017-11-17 08:30:00', '125.4', '3455/PEM-OTDA/2017', 'PEM-OTDA', '2017-11-16', 'Camat Samarida Seberang', 'Pemekaran Wilayah', '2017-3455.pdf', 'admin', '2017-11-16 02:30:02'),
(35, '2017-11-17 08:30:00', '821.1', '3452/TU/2017', 'TU', '2017-11-16', 'Kepala Bagian Lingkup Pemkot Samarinda', 'Pengangkatan Jabatan Pegawai Negeri ', '2017-3452.pdf', 'admin', '2017-11-16 17:35:35'),
(88, '2017-11-17 08:45:00', '476.4', '3456/KESRA/2017', 'KESRA', '2017-11-17', 'Lurah SE-KOTA SAMARINDA', 'Peninjauan Kampung KB', '2017-3456.pdf', 'admin', '2017-11-17 02:58:51'),
(90, '2017-11-18 08:30:00', '376', '3458/ASSIII/2017', 'ASS.III', '2017-11-18', 'Kontraktor Bangunan', 'Penindakan Bangunan tanpa surat izin mendirikan bangunan', '2017-3458.pdf', 'admin', '2017-11-18 03:19:54'),
(91, '2017-11-30 01:00:00', '454', '3457/ORTAL/2017', 'ORTAL', '2017-11-30', 'Lurah SE-KOTA SAMARINDA', 'Pelatihan Kelembagaan Desa', '2017-3457.pdf', 'admin', '2017-11-30 00:01:06'),
(92, '2017-12-06 08:17:00', '342', '3459/TU/2017', 'TU', '2017-12-06', 'CAMAT SE-KOTA SAMARINDA', 'pilgub', '2017-3459.pdf', 'admin', '2017-12-06 07:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `tanggalmasuk_suratmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `kode_suratmasuk` varchar(10) NOT NULL,
  `nomorurut_suratmasuk` varchar(7) NOT NULL,
  `nomor_suratmasuk` varchar(25) NOT NULL,
  `tanggalsurat_suratmasuk` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `kepada_suratmasuk` varchar(255) NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi1` varchar(50) NOT NULL,
  `tanggal_disposisi1` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi2` varchar(50) NOT NULL,
  `tanggal_disposisi2` varchar(25) NOT NULL,
  `disposisi3` varchar(50) NOT NULL,
  `tanggal_disposisi3` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `tanggalmasuk_suratmasuk`, `kode_suratmasuk`, `nomorurut_suratmasuk`, `nomor_suratmasuk`, `tanggalsurat_suratmasuk`, `pengirim`, `kepada_suratmasuk`, `perihal_suratmasuk`, `file_suratmasuk`, `operator`, `tanggal_entry`, `disposisi1`, `tanggal_disposisi1`, `disposisi2`, `tanggal_disposisi2`, `disposisi3`, `tanggal_disposisi3`) VALUES
(2, '2017-09-20 13:00:00', '900', '4518', '050/588/300.01', '2017-09-20', 'BAPPEDA KOTA SAMARINDA', 'Sekretaris Daerah', 'Penyampaian Usulan Bantuan Keuangan Pada APBD Prov.Kaltim Tahun 2018\r\n', '2017-4518.pdf', 'admin', '2017-11-18 03:30:06', 'SEKDA', '2017-09-20 14:30:00', 'PLT.ASS.II', '2017-09-28 09:00:00', 'ADM.PEMB', '2017-09-29 10:00:00'),
(3, '2017-09-20 14:00:00', '010', '4519', '036/B/HMJELEKTRO/IX/2017', '2017-09-18', 'FORUM KOMUNIKASI HIMPUNAN MAHASISWA ELEKTRO INDONESIA WILAYAH XIII KALIMANTAN', 'UMUM', 'Permohonan\r\n', '2017-4519.pdf', 'admin2', '2017-11-14 23:43:44', 'UMUM', '2017-09-22 11:00:00', '', '1970-01-01 07:00:00', 'UMUM', '2017-09-22 11:05:00'),
(5, '2017-09-21 15:10:00', '660', '4520', '660.2/1539/100.14', '2017-09-19', 'DINAS LINGKUNGAN HIDUP KOTA SAMARINDA', 'Sekretaris Daerah', 'Penting', '2017-4520.pdf', 'admin2', '2017-11-14 23:58:01', 'SEKDA', '2017-09-21 23:00:00', 'PLT.ASS.II', '2017-09-24 21:00:00', 'EKONOMI & SDA', '2017-09-25 09:00:00'),
(6, '2017-09-26 10:00:00', '061', '4521', '061/4382/SJ', '2017-09-20', 'MENDAGRI RI', 'Organisasi', 'Surat Edaran Tentang Mekanisme Layanan Administrasi Kemendagri\r\n', '2017-4521.pdf', 'admin', '2017-12-02 21:44:11', 'ASS.III', '2017-09-26 15:00:00', '', '1970-01-01 07:00:00', 'ORTAL', '2017-09-27 11:30:00'),
(7, '2017-09-25 14:00:00', '503', '4522', '503/744/100.26', '2017-09-25', 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KOTA SAMARINDA', 'PLH SEKDA', 'Tindak Lanjut Permohonan Penghapusan Denda Retribusi IMB PT.Borneo Inti Graha\r\n', '2017-4522.pdf', 'admin', '2017-12-06 00:32:23', 'PLH.SEKDA', '2017-09-26 10:00:00', '', '1970-01-01 07:00:00', 'HUKUM', '2017-09-27 15:00:00'),
(8, '2017-12-06 08:12:00', '454', '4523 ', '4121/wawali/2017', '2017-12-06', 'pdam', 'wawali', 'air', '2017-4523.pdf', 'admin', '2017-12-06 07:15:07', 'WAKIL WALIKOTA', '2017-12-14 08:14:00', 'ADM.PEMB', '2017-12-12 08:14:00', 'PEM-OTDA', '2017-12-13 08:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username_admin_bagian` (`username`);

--
-- Indexes for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD UNIQUE KEY `nomor_suratkeluar` (`nomor_suratkeluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD UNIQUE KEY `nomorurut_suratmasuk` (`nomorurut_suratmasuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_dokumen`
--
ALTER TABLE `tb_dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
