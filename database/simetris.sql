-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 04:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simetris`
--

-- --------------------------------------------------------

--
-- Table structure for table `def_jabatan_iki`
--

CREATE TABLE `def_jabatan_iki` (
  `DJI_KODE` int(11) NOT NULL,
  `MST_IKI_KODE` int(11) DEFAULT NULL,
  `REF_JAB_KODE` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `def_jabatan_iki`
--

INSERT INTO `def_jabatan_iki` (`DJI_KODE`, `MST_IKI_KODE`, `REF_JAB_KODE`) VALUES
(45, 40, 'DAITI01'),
(47, 42, 'DAITI01'),
(48, 43, 'DAITI01'),
(49, 44, 'DAITI01'),
(50, 45, 'DAITI01'),
(51, 46, 'DAITI01'),
(52, 47, 'DAITI01'),
(53, 48, 'DAITI01'),
(54, 49, 'PRITI01'),
(55, 50, 'PRITI01'),
(56, 51, 'PRITI01'),
(57, 52, 'PRITI01'),
(59, 54, 'DAITI01'),
(60, 55, 'DAITI01'),
(61, 56, 'DAITI01'),
(62, 57, 'PRITI01'),
(63, 58, 'PRIKA02'),
(64, 59, 'PRIKA02'),
(65, 60, 'PRIKA02'),
(66, 61, 'PRIKA02'),
(67, 62, 'PRIKA02'),
(68, 63, 'PRIKA02'),
(69, 64, 'PRIKA02'),
(70, 65, 'PRIKA02'),
(71, 66, 'PRIKA02'),
(72, 67, 'PRITI01');

-- --------------------------------------------------------

--
-- Table structure for table `def_jabatan_logbook`
--

CREATE TABLE `def_jabatan_logbook` (
  `DJL_KODE` int(11) NOT NULL,
  `MKL_KODE` int(11) DEFAULT NULL,
  `REF_JAB_KODE` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `def_jabatan_logbook`
--

INSERT INTO `def_jabatan_logbook` (`DJL_KODE`, `MKL_KODE`, `REF_JAB_KODE`) VALUES
(1, 2, 'PRITI01'),
(3, 2, 'DAITI01'),
(4, 4, 'DAITI01'),
(5, 5, 'DAITI01'),
(6, 3, 'DAITI01'),
(7, 18, 'PRITI01'),
(10, 15, 'DAITI01'),
(11, 16, 'PRITI01'),
(13, 18, 'DAITI01'),
(14, 19, 'PRITI01'),
(15, 20, 'PRIKA02'),
(16, 21, 'PRITI01');

-- --------------------------------------------------------

--
-- Table structure for table `def_unit_iki`
--

CREATE TABLE `def_unit_iki` (
  `DUI_KODE` int(11) NOT NULL,
  `MST_IKI_KODE` int(11) DEFAULT NULL,
  `MST_UNIT_MSU_KODE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `def_unit_iki`
--

INSERT INTO `def_unit_iki` (`DUI_KODE`, `MST_IKI_KODE`, `MST_UNIT_MSU_KODE`) VALUES
(37, 40, 1),
(39, 42, 1),
(40, 43, 1),
(41, 44, 1),
(42, 45, 1),
(43, 46, 1),
(44, 47, 1),
(45, 48, 1),
(46, 49, 1),
(47, 50, 1),
(48, 51, 1),
(49, 52, 1),
(51, 54, 1),
(52, 55, 1),
(53, 56, 1),
(54, 57, 1),
(55, 58, 2),
(56, 59, 2),
(57, 60, 2),
(58, 61, 2),
(59, 62, 2),
(60, 63, 2),
(61, 64, 2),
(62, 65, 2),
(63, 66, 2),
(64, 67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `def_unit_logbook`
--

CREATE TABLE `def_unit_logbook` (
  `DUL_KODE` int(11) NOT NULL,
  `MKL_KODE` int(11) DEFAULT NULL,
  `MST_UNIT_MSU_KODE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `def_unit_logbook`
--

INSERT INTO `def_unit_logbook` (`DUL_KODE`, `MKL_KODE`, `MST_UNIT_MSU_KODE`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 1),
(5, 5, 2),
(6, 3, 2),
(9, 15, 1),
(10, 16, 1),
(12, 18, 1),
(13, 19, 1),
(14, 20, 2),
(15, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_iki`
--

CREATE TABLE `mst_iki` (
  `MST_IKI_KODE` int(11) NOT NULL,
  `MST_IKI_INDIKATOR` text NOT NULL,
  `MST_IKI_DEFINISI` varchar(200) NOT NULL,
  `MST_IKI_TARGET` int(3) NOT NULL,
  `MST_IKI_BOBOT` int(3) NOT NULL,
  `MST_IKI_KATEGORI` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_iki`
--

INSERT INTO `mst_iki` (`MST_IKI_KODE`, `MST_IKI_INDIKATOR`, `MST_IKI_DEFINISI`, `MST_IKI_TARGET`, `MST_IKI_BOBOT`, `MST_IKI_KATEGORI`) VALUES
(40, '100% Operasional sistem berjalan lancar; target penilaian : hardware : infra & jaringan lancar: software : permintaan aplikasi ditindaklanjuti; Maintenance : penanganan troubelshoot ditindaklanjuti', 'Indikator mutu', 100, 5, 'kualitas'),
(42, 'Berada di tempat kerja / lingkungan kerja lebih 40 jam dalam seminggu', 'Keberadaan', 100, 15, 'perilaku'),
(43, 'Cepat mengenali masalah dan memperkarsai mengupayakan tindakan dan saran korektif', 'Inisiatif', 100, 3, 'perilaku'),
(44, 'Selalu siap dan sering memprakarsai kerjasama dan menerima masukan dan kritik dengan baik', 'Kerjasama', 100, 3, 'perilaku'),
(45, 'Antusias dengan tugasnya, senantiasa  mau membantu, mampu dan aktif berkomunikasi dengan pelanggan', 'Sikap dan perilaku', 100, 3, 'perilaku'),
(46, 'Logbook Data Analys', 'Logbook Data Analys', 100, 50, 'kuantitas'),
(47, 'Respon time penyelesaian masalah SIRS; target penilaian : hardware : infra & jaringan lancar: software : kecepatan develop sistem & bug; Maintenance : kecepatan penanganan troubelshoot', 'Kecepatan', 100, 5, 'kualitas'),
(48, 'Respon time penyelesaian masalah SIRS; target penilaian : hardware : kecepatan penanganan infra & jar: software : estimasi penyempurnaan aplikasi tepat waktu; Maintenance : ketepatan penanganan troubelshoot', 'Ketepatan', 100, 5, 'kualitas'),
(49, 'Kulaitas1', 'Kulaitas1', 5, 5, 'kualitas'),
(50, 'Logbook Programmer', 'Logbook Programmer', 100, 50, 'kuantitas'),
(51, 'Kualitas 2', 'Kualitas 2', 5, 5, 'kualitas'),
(52, 'Kualitas 3', 'Kualitas3', 6, 10, 'kualitas'),
(54, 'Taat pada aturan dan dapat memotivasi karyawan lain', 'Kepatuhan terhadap aturan', 100, 3, 'perilaku'),
(55, 'Tugas rutin selesai tepat waktu tanpa kendala', 'Kehandalan', 100, 3, 'perilaku'),
(56, 'Tingkat kepuasan pelanggan terhadap pelayanan sesuai SPO, waktu yang ditetapkan tanpa kesalaha atau komplain dari pelanggan: tidak ada keluhan : 100 ; 1-3 keluhan : 80 ; > 3 keluhan : 60', 'Komplain', 100, 5, 'kualitas'),
(57, 'Datang tepat waktu', 'Datang tepat waktu', 100, 15, 'perilaku'),
(58, 'Indeks kinerja kualitas untuk perawat 1', 'Indeks kinerja kualitas untuk perawat 1', 50, 5, 'kualitas'),
(59, 'Indeks kinerja kualitas untuk perawat 2', 'Indeks kinerja kualitas untuk perawat 2', 100, 5, 'kualitas'),
(60, 'Indeks kinerja kualitas untuk perawat 3', 'Indeks kinerja kualitas untuk perawat 3', 100, 5, 'kualitas'),
(61, 'Indeks kinerja kualitas untuk perawat 4', 'Indeks kinerja kualitas untuk perawat 4', 100, 5, 'kualitas'),
(62, 'Logbook Perawat', 'Logbook Perawat', 100, 50, 'kuantitas'),
(63, 'Datanag tepat waktu', 'Datanag tepat waktu', 100, 15, 'perilaku'),
(64, 'Semangat bekerja', 'Semangat bekerja', 100, 5, 'perilaku'),
(65, 'Menyelesaikan tugas', 'Menyelesaikan tugas', 100, 5, 'perilaku'),
(66, 'Semangat', 'Semangat', 100, 5, 'perilaku'),
(67, 'Mematuhi aturan dan sopan', 'Kesopanan', 100, 10, 'perilaku');

-- --------------------------------------------------------

--
-- Table structure for table `mst_kegiatan_logbook`
--

CREATE TABLE `mst_kegiatan_logbook` (
  `MKL_KODE` int(11) NOT NULL,
  `MKL_NAMA` varchar(200) NOT NULL,
  `MKL_KETERANGAN` varchar(200) NOT NULL,
  `MKL_SCORE` int(3) NOT NULL,
  `MKL_ISAKTIF` int(1) NOT NULL DEFAULT '1',
  `MST_UNIT_MSU_KODE` varchar(50) DEFAULT NULL,
  `REF_JN_JB_FNG_RJJABF_KOD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kegiatan_logbook`
--

INSERT INTO `mst_kegiatan_logbook` (`MKL_KODE`, `MKL_NAMA`, `MKL_KETERANGAN`, `MKL_SCORE`, `MKL_ISAKTIF`, `MST_UNIT_MSU_KODE`, `REF_JN_JB_FNG_RJJABF_KOD`) VALUES
(2, 'Rapat koordinasi', 'Melakukan rapat koordinasi setiap bulan sekali', 4, 1, '1', 'KPITI01'),
(3, 'Melakukan penelitian', 'Penelitian dilakukan untuk kemajuan instansi', 4, 1, NULL, NULL),
(4, 'Melakukan koordinasi dengan System Analyst', 'Melakukan koordinasi dengan System Analyst', 3, 1, '1', 'DAITI01'),
(5, 'Kegiatan 4', 'Kegiatan 4', 2, 1, '2', 'DAITI01'),
(15, 'Peningkatan kapasitas diri', 'Peningkatan kapasitas diri', 2, 1, '1', 'DAITI01'),
(16, 'Membuat rancangan desain database', 'Membuat rancangan desain database', 2, 1, '1', 'PRITI01'),
(18, 'Membuat desain rancangan sistem', 'Membuat desain rancangan sistem', 4, 1, '1', 'DAITI01'),
(19, 'Menyiapkan dokumen sistem informasi baru', 'Menyiapkan dokumen sistem informasi baru', 4, 1, '1', 'PRITI01'),
(20, 'Rapat koordinasi', 'Rapat koordinasi', 3, 1, '2', 'PRIKA02'),
(21, 'Kegiatan peningkatan kualitas diri', 'Peningkatan skill', 2, 1, '1', 'PRITI01');

-- --------------------------------------------------------

--
-- Table structure for table `mst_pegawai`
--

CREATE TABLE `mst_pegawai` (
  `MPG_KODE` int(11) NOT NULL,
  `MPG_HANDKEY` varchar(20) NOT NULL,
  `MPG_NAMA` varchar(100) NOT NULL,
  `MPG_NIP` varchar(20) NOT NULL,
  `MPG_ALAMAT` varchar(200) NOT NULL,
  `MPG_JK` varchar(1) NOT NULL,
  `MPG_NO_TELP` varchar(13) NOT NULL,
  `MPG_EMAIL` varchar(50) NOT NULL,
  `MPG_ISAKTIF` int(1) NOT NULL,
  `REF_AGAMA_RAG_KODE` int(11) NOT NULL,
  `MPG_IS_VERIF` int(1) NOT NULL,
  `MPG_TMPT_LAHIR` varchar(100) NOT NULL,
  `MPG_TGL_LAHIR` datetime NOT NULL,
  `MPG_FOTO` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_pegawai`
--

INSERT INTO `mst_pegawai` (`MPG_KODE`, `MPG_HANDKEY`, `MPG_NAMA`, `MPG_NIP`, `MPG_ALAMAT`, `MPG_JK`, `MPG_NO_TELP`, `MPG_EMAIL`, `MPG_ISAKTIF`, `REF_AGAMA_RAG_KODE`, `MPG_IS_VERIF`, `MPG_TMPT_LAHIR`, `MPG_TGL_LAHIR`, `MPG_FOTO`) VALUES
(1, 'MASHUDI', 'MASHUDI ROHMAT', '01201912345', 'Pudak Rt 02 Rw 02 Sanggrong,Jatiroto,Wonogiri,Jawa Tengah', 'L', '085642084961', 'mashudi@gmail.com', 1, 1, 1, 'WONOGIRI', '1994-11-08 00:00:00', '1578360262306.jpg'),
(2, 'FATMA', 'SITI FATMAWATI', '01201912344', 'Boyolali', 'P', '085123456789', 'fatma@gmail.com', 1, 1, 1, 'Kalimantan', '1999-11-29 00:00:00', 'fatma.jpg'),
(3, 'NOVA', 'NOVA ARIF', '123456', 'Jogja', 'L', '123456', 'nova@gmail.com', 1, 1, 1, 'Jogja', '2019-12-02 00:00:00', '1578360262306.jpg'),
(4, 'syamsul', 'Syamsul Arifin', '022020010646', 'Jogja', 'L', '085642084961', 'syamsul@gmail.com', 1, 1, 1, 'Jogja', '2020-01-05 20:09:52', '15782664665741.jpg'),
(5, 'HAR07', 'HARRY KANE', '01202001076', 'Tottenham', 'L', '1234', 'hary@gmail.com', 1, 1, 1, 'Tottenham', '2020-01-05 20:09:52', '1578360262306.jpg'),
(6, 'CAM07', 'CAMILA CABELLO', '01202001077', 'Brazil', 'P', '123456789', 'camila@gmail.com', 1, 1, 1, 'Brazil', '2020-01-05 20:09:52', '1578360398164.jpg'),
(7, 'Ami17', 'Amir Rosyidi', '02202004171', 'Klaten', 'L', '085642084961', 'amir@gmail.com', 1, 1, 1, 'Klaten', '1994-05-12 11:16:39', '1587097050934.png'),
(8, 'Muh17', 'Muhammad Ali', '01202004178', 'Klaten', 'L', '085642084961', 'muhammad@gmail.com', 1, 1, 1, 'Klaten', '1995-06-14 14:03:20', '1587107026202.png'),
(9, 'And25', 'Andre Taulany', '01202004259', 'Jakarta', 'L', '12345678', 'andre@gmial.com', 1, 1, 1, 'Jakarta', '2020-04-25 11:52:43', '1587790392044.png'),
(10, 'Sul27', 'Sule', '012020042710', 'Bandung', 'L', '12345678', 'sule@gmail.com', 1, 1, 1, 'Bandung', '2020-04-09 16:21:03', '1587979286522.png');

-- --------------------------------------------------------

--
-- Table structure for table `mst_unit`
--

CREATE TABLE `mst_unit` (
  `MSU_KODE` int(11) NOT NULL,
  `MSU_NAMA` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_unit`
--

INSERT INTO `mst_unit` (`MSU_KODE`, `MSU_NAMA`) VALUES
(1, 'INSTALASI TEKNOLOGI INFORMASI'),
(2, 'INSTALASI KESEHATAN ANAK');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `ID_PENILAIAN` int(11) NOT NULL,
  `MPG_KODE` int(11) NOT NULL,
  `MSU_KODE` int(11) NOT NULL,
  `TGL_PENILAIAN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IKI_KODE` int(11) NOT NULL,
  `SCORE` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`ID_PENILAIAN`, `MPG_KODE`, `MSU_KODE`, `TGL_PENILAIAN`, `IKI_KODE`, `SCORE`) VALUES
(85, 2, 1, '2020-04-17 04:42:45', 42, 100),
(86, 2, 1, '2020-04-17 04:42:46', 43, 100),
(87, 2, 1, '2020-04-17 04:42:46', 44, 100),
(88, 2, 1, '2020-04-17 04:42:46', 45, 100),
(89, 2, 1, '2020-04-17 04:42:46', 54, 100),
(90, 2, 1, '2020-04-17 04:42:46', 55, 100),
(91, 2, 1, '2020-04-17 04:42:46', 40, 100),
(92, 2, 1, '2020-04-17 04:42:46', 47, 100),
(93, 2, 1, '2020-04-17 04:42:46', 48, 100),
(94, 2, 1, '2020-04-17 04:42:46', 56, 100),
(95, 2, 1, '2020-01-17 17:00:00', 42, 100),
(96, 2, 1, '2020-01-23 17:00:00', 43, 100),
(97, 2, 1, '2020-01-16 17:00:00', 44, 100),
(98, 2, 1, '2020-01-22 17:00:00', 45, 100),
(99, 2, 1, '2020-01-15 17:00:00', 54, 100),
(100, 2, 1, '2020-01-15 17:00:00', 55, 100),
(101, 2, 1, '2020-01-15 17:00:00', 40, 100),
(102, 2, 1, '2020-01-21 17:00:00', 47, 100),
(103, 2, 1, '2020-01-15 17:00:00', 48, 100),
(104, 2, 1, '2020-01-15 17:00:00', 56, 100),
(105, 2, 1, '2020-02-11 17:00:00', 42, 100),
(106, 2, 1, '2020-02-04 17:00:00', 43, 100),
(107, 2, 1, '2020-02-10 17:00:00', 44, 100),
(108, 2, 1, '2020-02-11 17:00:00', 45, 100),
(109, 2, 1, '2020-02-18 17:00:00', 54, 100),
(110, 2, 1, '2020-02-11 17:00:00', 55, 100),
(111, 2, 1, '2020-02-25 17:00:00', 40, 100),
(112, 2, 1, '2020-02-05 17:00:00', 47, 100),
(113, 2, 1, '2020-02-19 17:00:00', 48, 100),
(114, 2, 1, '2020-02-18 17:00:00', 56, 100),
(115, 2, 1, '2020-03-11 17:00:00', 42, 100),
(116, 2, 1, '2020-03-09 17:00:00', 43, 100),
(117, 2, 1, '2020-03-08 17:00:00', 44, 100),
(118, 2, 1, '2020-03-17 17:00:00', 45, 100),
(119, 2, 1, '2020-03-17 17:00:00', 54, 100),
(120, 2, 1, '2020-03-16 17:00:00', 55, 100),
(121, 2, 1, '2020-03-01 17:00:00', 40, 100),
(122, 2, 1, '2020-03-17 17:00:00', 47, 100),
(123, 2, 1, '2020-03-11 17:00:00', 48, 100),
(124, 2, 1, '2020-03-24 17:00:00', 56, 100),
(125, 2, 1, '2020-04-17 04:55:51', 42, 100),
(126, 2, 1, '2020-04-17 04:55:51', 43, 100),
(127, 2, 1, '2020-04-17 04:55:51', 44, 100),
(128, 2, 1, '2020-04-17 04:55:51', 45, 100),
(129, 2, 1, '2020-04-17 04:55:51', 54, 100),
(130, 2, 1, '2020-04-17 04:55:51', 55, 100),
(131, 2, 1, '2020-04-17 04:55:51', 40, 100),
(132, 2, 1, '2020-04-17 04:55:51', 47, 100),
(133, 2, 1, '2020-04-17 04:55:51', 48, 100),
(134, 2, 1, '2020-04-17 04:55:51', 56, 100),
(135, 6, 1, '2020-04-17 05:59:30', 42, 100),
(136, 6, 1, '2020-04-17 05:59:30', 43, 100),
(137, 6, 1, '2020-04-17 05:59:30', 44, 100),
(138, 6, 1, '2020-04-17 05:59:30', 45, 100),
(139, 6, 1, '2020-04-17 05:59:30', 54, 100),
(140, 6, 1, '2020-04-17 05:59:30', 55, 100),
(141, 6, 1, '2020-04-17 05:59:30', 40, 100),
(142, 6, 1, '2020-04-17 05:59:30', 47, 100),
(143, 6, 1, '2020-04-17 05:59:31', 48, 100),
(144, 6, 1, '2020-04-17 05:59:31', 56, 100),
(145, 6, 1, '2020-03-10 17:00:00', 48, 100),
(146, 6, 1, '2020-03-09 17:00:00', 56, 100),
(147, 6, 1, '2020-03-09 17:00:00', 0, 0),
(148, 6, 1, '2020-03-09 17:00:00', 42, 100),
(149, 6, 1, '2020-03-02 17:00:00', 43, 100),
(150, 6, 1, '2020-03-03 17:00:00', 44, 100),
(151, 6, 1, '2020-03-10 17:00:00', 45, 100),
(152, 6, 1, '2020-03-10 17:00:00', 54, 100),
(153, 6, 1, '2020-03-09 17:00:00', 40, 100),
(154, 6, 1, '2020-03-10 17:00:00', 47, 100),
(155, 6, 1, '2020-03-10 17:00:00', 48, 100),
(156, 6, 1, '2020-03-09 17:00:00', 56, 100),
(157, 6, 1, '2020-03-09 17:00:00', 42, 100),
(158, 6, 1, '2020-03-02 17:00:00', 43, 100),
(159, 6, 1, '2020-03-03 17:00:00', 44, 100),
(160, 6, 1, '2020-03-10 17:00:00', 45, 100),
(161, 6, 1, '2020-03-10 17:00:00', 54, 100),
(162, 6, 1, '2020-03-09 17:00:00', 40, 100),
(163, 6, 1, '2020-03-10 17:00:00', 47, 100),
(164, 5, 1, '2020-04-17 06:40:11', 57, 100),
(165, 5, 1, '2020-04-17 06:40:13', 67, 100),
(166, 5, 1, '2020-04-17 06:40:13', 49, 5),
(167, 5, 1, '2020-04-17 06:40:13', 51, 5),
(168, 5, 1, '2020-04-17 06:40:13', 52, 6),
(183, 9, 1, '2020-04-27 09:21:58', 57, 90),
(184, 9, 1, '2020-04-27 09:21:58', 67, 90),
(185, 9, 1, '2020-04-27 09:21:58', 49, 4),
(186, 9, 1, '2020-04-27 09:21:58', 51, 4),
(187, 9, 1, '2020-04-27 09:21:58', 52, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ref_agama`
--

CREATE TABLE `ref_agama` (
  `RAG_KODE` int(11) NOT NULL,
  `REF_AGAMA_NAMA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_agama`
--

INSERT INTO `ref_agama` (`RAG_KODE`, `REF_AGAMA_NAMA`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Budha'),
(5, 'Katholik'),
(6, 'Protestan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jb_fungsional`
--

CREATE TABLE `ref_jb_fungsional` (
  `REF_JB_FN_KODE` varchar(11) NOT NULL,
  `REF_JB_FN_NAMA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_jb_fungsional`
--

INSERT INTO `ref_jb_fungsional` (`REF_JB_FN_KODE`, `REF_JB_FN_NAMA`) VALUES
('DAITI01', 'DATA ANALYST'),
('KPIKA02', 'KEPALA INSTALASI KESEHATAN ANAK'),
('KPITI01', 'KEPALA INSTALASI TEKNNOLOGI INFORMASI'),
('PRIKA02', 'PERAWAT'),
('PRITI01', 'PROGRAMMER');

-- --------------------------------------------------------

--
-- Table structure for table `ref_level_kesulitan`
--

CREATE TABLE `ref_level_kesulitan` (
  `RLK_KODE` int(1) NOT NULL,
  `RLK_NAMA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_level_kesulitan`
--

INSERT INTO `ref_level_kesulitan` (`RLK_KODE`, `RLK_NAMA`) VALUES
(1, 'MUDAH'),
(2, 'SEDANG'),
(3, 'SULIT');

-- --------------------------------------------------------

--
-- Table structure for table `trans_jabatan_pegawai`
--

CREATE TABLE `trans_jabatan_pegawai` (
  `TJB_KODE` int(11) NOT NULL,
  `MST_PEG_KODE` int(11) NOT NULL,
  `REF_JAB_KODE` varchar(11) NOT NULL,
  `TJB_IS_VERIF` int(1) NOT NULL,
  `TJP_TGL_AWAL` date DEFAULT NULL,
  `TJP_TGL_AKHIR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_jabatan_pegawai`
--

INSERT INTO `trans_jabatan_pegawai` (`TJB_KODE`, `MST_PEG_KODE`, `REF_JAB_KODE`, `TJB_IS_VERIF`, `TJP_TGL_AWAL`, `TJP_TGL_AKHIR`) VALUES
(1, 1, 'KPITI01', 0, NULL, NULL),
(2, 2, 'DAITI01', 0, NULL, NULL),
(3, 3, 'PRIKA02', 1, NULL, NULL),
(4, 4, 'KPIKA02', 1, NULL, NULL),
(10, 5, 'PRITI01', 0, NULL, NULL),
(11, 6, 'DAITI01', 0, NULL, NULL),
(12, 7, 'PRIKA02', 0, NULL, NULL),
(13, 8, 'PRITI01', 0, NULL, NULL),
(14, 9, 'PRITI01', 0, NULL, NULL),
(16, 10, 'PRITI01', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trans_logbook`
--

CREATE TABLE `trans_logbook` (
  `TLB_ID` int(11) NOT NULL,
  `TLB_TANGGAL` datetime NOT NULL,
  `MST_PEGAWAI_MPG_KODE` int(11) NOT NULL,
  `TLB_NAMA_PEGAWAI` varchar(100) NOT NULL,
  `MST_UNIT_MSU_KODE` int(11) NOT NULL,
  `MST_KEG_LOGB_MKL_KODE` int(11) NOT NULL,
  `TLB_NAMA_KEGIATAN` varchar(200) NOT NULL,
  `TLB_KETERANGAN_KEGIATAN` varchar(200) NOT NULL,
  `TLB_IS_VERIF` int(1) NOT NULL DEFAULT '0',
  `TLB_TANGGAL_AKHIR` datetime NOT NULL,
  `TLB_QTY` int(3) NOT NULL,
  `TLB_SOURCE_DATA` int(1) NOT NULL,
  `TLB_OUTPUT` varchar(20) NOT NULL,
  `REF_LVL_KESLTN_RLK_KODE` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_logbook`
--

INSERT INTO `trans_logbook` (`TLB_ID`, `TLB_TANGGAL`, `MST_PEGAWAI_MPG_KODE`, `TLB_NAMA_PEGAWAI`, `MST_UNIT_MSU_KODE`, `MST_KEG_LOGB_MKL_KODE`, `TLB_NAMA_KEGIATAN`, `TLB_KETERANGAN_KEGIATAN`, `TLB_IS_VERIF`, `TLB_TANGGAL_AKHIR`, `TLB_QTY`, `TLB_SOURCE_DATA`, `TLB_OUTPUT`, `REF_LVL_KESLTN_RLK_KODE`) VALUES
(45, '2020-01-01 11:31:06', 2, 'SITI FATMAWATI', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 1, '2020-01-01 11:31:06', 1, 2, 'selesai', 2),
(46, '2020-01-02 11:31:51', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-01-02 11:31:51', 1, 2, 'selesai', 1),
(47, '2020-01-03 11:32:18', 2, 'SITI FATMAWATI', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 1, '2020-01-03 11:32:18', 1, 2, 'selesai', 2),
(48, '2020-01-05 11:32:43', 2, 'SITI FATMAWATI', 1, 15, 'Peningkatan kapasitas diri', 'keterangan', 1, '2020-01-05 11:32:43', 1, 2, 'selesai', 1),
(49, '2020-01-06 11:33:10', 2, 'SITI FATMAWATI', 1, 15, 'Peningkatan kapasitas diri', 'keterangan', 1, '2020-01-06 11:33:10', 1, 2, 'selesai', 2),
(50, '2020-01-08 11:33:32', 2, 'SITI FATMAWATI', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 1, '2020-01-08 11:33:32', 1, 2, 'selesai', 2),
(51, '2020-02-01 11:33:51', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-02-01 11:33:51', 1, 2, 'selesai', 2),
(52, '2020-02-03 11:34:20', 2, 'SITI FATMAWATI', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 1, '2020-02-03 11:34:20', 1, 2, 'selesai', 2),
(53, '2020-02-05 11:34:58', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-02-05 11:34:58', 1, 2, 'selesai', 1),
(54, '2020-02-07 11:35:15', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-02-07 11:35:15', 1, 2, 'selesai', 2),
(55, '2020-02-13 11:35:31', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-02-06 11:35:31', 1, 2, 'selesai', 2),
(56, '2020-03-01 11:35:50', 2, 'SITI FATMAWATI', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 1, '2020-03-08 11:35:50', 1, 2, 'selesai', 2),
(57, '2020-03-24 11:36:18', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-03-17 11:36:18', 1, 2, 'selesai', 1),
(58, '2020-03-11 11:36:47', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-03-11 11:36:47', 1, 2, 'selesai', 1),
(59, '2020-03-21 11:37:03', 2, 'SITI FATMAWATI', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 1, '2020-03-21 11:37:03', 1, 2, 'selesai', 2),
(60, '2020-04-17 11:37:24', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 11:37:24', 1, 2, 'selesai', 2),
(61, '2020-04-17 11:37:35', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 11:37:35', 1, 2, 'selesai', 2),
(62, '2020-04-17 11:37:47', 2, 'SITI FATMAWATI', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 1, '2020-04-17 11:37:47', 1, 2, 'selesai', 2),
(63, '2020-04-17 11:38:00', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 11:38:00', 1, 2, 'selesai', 2),
(64, '2020-04-17 11:38:10', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 11:38:10', 1, 2, 'selesai', 2),
(65, '2020-04-17 11:38:31', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 11:38:31', 1, 2, 'selesai', 2),
(66, '2020-01-06 12:53:39', 6, 'CAMILA CABELLO', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 0, '2020-01-06 12:53:39', 1, 2, 'selesai', 2),
(67, '2020-01-08 12:54:19', 6, 'CAMILA CABELLO', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 0, '2020-01-08 12:54:19', 1, 2, 'selesai', 2),
(68, '2020-01-09 12:54:34', 6, 'CAMILA CABELLO', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 0, '2020-04-09 12:54:34', 1, 2, 'selesai', 2),
(69, '2020-01-17 12:54:49', 6, 'CAMILA CABELLO', 1, 3, 'Melakukan penelitian', 'keterangan', 0, '2020-01-08 12:54:49', 1, 2, 'selesai', 2),
(70, '2020-02-13 12:55:18', 6, 'CAMILA CABELLO', 1, 3, 'Melakukan penelitian', 'keterangan', 0, '2020-02-04 12:55:18', 1, 2, 'selesai', 2),
(71, '2020-02-12 12:55:34', 6, 'CAMILA CABELLO', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 0, '2020-02-13 12:55:34', 1, 2, 'selesai', 2),
(72, '2020-02-20 12:55:49', 6, 'CAMILA CABELLO', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 0, '2020-02-14 12:55:49', 1, 2, 'selesai', 2),
(73, '2020-03-01 12:56:05', 6, 'CAMILA CABELLO', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 0, '2020-03-01 12:56:05', 1, 2, 'selesai', 2),
(74, '2020-03-02 12:56:20', 6, 'CAMILA CABELLO', 1, 3, 'Melakukan penelitian', 'keterangan', 0, '2020-03-02 12:56:20', 1, 2, 'selesai', 2),
(75, '2020-04-17 12:56:34', 6, 'CAMILA CABELLO', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 12:56:34', 1, 2, 'tidak selesai', 2),
(76, '2020-04-17 12:56:48', 6, 'CAMILA CABELLO', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 12:56:48', 1, 2, 'selesai', 2),
(77, '2020-04-17 12:56:56', 6, 'CAMILA CABELLO', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 1, '2020-04-17 12:56:56', 1, 2, 'selesai', 2),
(78, '2020-04-17 12:57:04', 6, 'CAMILA CABELLO', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 12:57:04', 1, 2, 'selesai', 2),
(79, '2020-04-17 12:57:13', 6, 'CAMILA CABELLO', 1, 3, 'Melakukan penelitian', 'keterangan', 1, '2020-04-17 12:57:13', 1, 2, 'selesai', 2),
(80, '2020-04-17 12:57:21', 6, 'CAMILA CABELLO', 1, 4, 'Melakukan koordinasi dengan System Analyst', 'keterangan', 1, '2020-04-17 12:57:21', 1, 2, 'selesai', 2),
(81, '2020-04-17 13:42:15', 5, 'HARRY KANE', 1, 18, 'Membuat desain rancangan sistem', 'untuk sistem baru', 1, '2020-04-17 13:42:15', 1, 2, 'selesai', 2),
(82, '2020-04-17 13:43:35', 5, 'HARRY KANE', 1, 18, 'Membuat desain rancangan sistem', 'sistem baru', 1, '2020-04-17 13:43:35', 1, 2, 'selesai', 2),
(83, '2020-04-17 13:43:53', 5, 'HARRY KANE', 1, 19, 'Menyiapkan dokumen sistem informasi baru', 'keterangan', 1, '2020-04-17 13:43:53', 1, 2, 'selesai', 2),
(84, '2020-04-17 14:18:39', 2, 'SITI FATMAWATI', 1, 3, 'Melakukan penelitian', 'fdfd', 1, '2020-04-17 14:18:39', 1, 2, 'selesai', 1),
(85, '2020-04-27 16:23:43', 9, 'Andre Taulany', 1, 16, 'Membuat rancangan desain database', 'keterangan', 1, '2020-04-27 16:23:43', 1, 2, 'selesai', 2),
(86, '2020-04-27 16:24:01', 9, 'Andre Taulany', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 1, '2020-04-27 16:24:01', 1, 2, 'selesai', 2),
(87, '2020-04-27 16:24:10', 9, 'Andre Taulany', 1, 18, 'Membuat desain rancangan sistem', 'keterangan', 1, '2020-04-27 16:24:10', 1, 2, 'selesai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trans_unit_pegawai`
--

CREATE TABLE `trans_unit_pegawai` (
  `TUP_ID` int(11) NOT NULL,
  `MST_PEGAWAI_MPG_KODE` int(11) NOT NULL,
  `MST_UNIT_MSU_KODE` int(11) NOT NULL,
  `TUP_TGL_AWAL` timestamp NULL DEFAULT NULL,
  `TUP_TGL_AHIR` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_unit_pegawai`
--

INSERT INTO `trans_unit_pegawai` (`TUP_ID`, `MST_PEGAWAI_MPG_KODE`, `MST_UNIT_MSU_KODE`, `TUP_TGL_AWAL`, `TUP_TGL_AHIR`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 2, NULL, NULL),
(13, 5, 1, NULL, NULL),
(14, 6, 1, NULL, NULL),
(15, 7, 2, NULL, NULL),
(16, 8, 1, NULL, NULL),
(17, 9, 1, NULL, NULL),
(19, 10, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `def_jabatan_iki`
--
ALTER TABLE `def_jabatan_iki`
  ADD PRIMARY KEY (`DJI_KODE`),
  ADD KEY `REF_JAB_KODE` (`REF_JAB_KODE`),
  ADD KEY `MST_IKI_KODE` (`MST_IKI_KODE`) USING BTREE;

--
-- Indexes for table `def_jabatan_logbook`
--
ALTER TABLE `def_jabatan_logbook`
  ADD PRIMARY KEY (`DJL_KODE`),
  ADD KEY `MKL_KODE` (`MKL_KODE`),
  ADD KEY `REF_JAB_KODE` (`REF_JAB_KODE`);

--
-- Indexes for table `def_unit_iki`
--
ALTER TABLE `def_unit_iki`
  ADD PRIMARY KEY (`DUI_KODE`),
  ADD KEY `MST_UNIT_MSU_KODE` (`MST_UNIT_MSU_KODE`);

--
-- Indexes for table `def_unit_logbook`
--
ALTER TABLE `def_unit_logbook`
  ADD PRIMARY KEY (`DUL_KODE`),
  ADD KEY `MKL_KODE` (`MKL_KODE`),
  ADD KEY `MST_UNIT_MSU_KODE` (`MST_UNIT_MSU_KODE`);

--
-- Indexes for table `mst_iki`
--
ALTER TABLE `mst_iki`
  ADD PRIMARY KEY (`MST_IKI_KODE`);

--
-- Indexes for table `mst_kegiatan_logbook`
--
ALTER TABLE `mst_kegiatan_logbook`
  ADD PRIMARY KEY (`MKL_KODE`);

--
-- Indexes for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  ADD PRIMARY KEY (`MPG_KODE`),
  ADD KEY `REF_AGAMA_REG_KODE` (`REF_AGAMA_RAG_KODE`);

--
-- Indexes for table `mst_unit`
--
ALTER TABLE `mst_unit`
  ADD PRIMARY KEY (`MSU_KODE`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`ID_PENILAIAN`);

--
-- Indexes for table `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`RAG_KODE`);

--
-- Indexes for table `ref_jb_fungsional`
--
ALTER TABLE `ref_jb_fungsional`
  ADD PRIMARY KEY (`REF_JB_FN_KODE`);

--
-- Indexes for table `ref_level_kesulitan`
--
ALTER TABLE `ref_level_kesulitan`
  ADD PRIMARY KEY (`RLK_KODE`);

--
-- Indexes for table `trans_jabatan_pegawai`
--
ALTER TABLE `trans_jabatan_pegawai`
  ADD PRIMARY KEY (`TJB_KODE`),
  ADD KEY `REF_JAB_KODE` (`REF_JAB_KODE`),
  ADD KEY `MST_PEG_KODE` (`MST_PEG_KODE`);

--
-- Indexes for table `trans_logbook`
--
ALTER TABLE `trans_logbook`
  ADD PRIMARY KEY (`TLB_ID`),
  ADD KEY `MST_KEG_LOGB_MKL_KODE` (`MST_KEG_LOGB_MKL_KODE`),
  ADD KEY `REF_LVL_KESLTN_RLK_KODE` (`REF_LVL_KESLTN_RLK_KODE`),
  ADD KEY `MST_PEGAWAI_MPG_KODE` (`MST_PEGAWAI_MPG_KODE`);

--
-- Indexes for table `trans_unit_pegawai`
--
ALTER TABLE `trans_unit_pegawai`
  ADD PRIMARY KEY (`TUP_ID`),
  ADD KEY `MST_UNIT_MSU_KODE` (`MST_UNIT_MSU_KODE`),
  ADD KEY `MST_PEGAWAI_MPG_KODE` (`MST_PEGAWAI_MPG_KODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `def_jabatan_iki`
--
ALTER TABLE `def_jabatan_iki`
  MODIFY `DJI_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `def_jabatan_logbook`
--
ALTER TABLE `def_jabatan_logbook`
  MODIFY `DJL_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `def_unit_iki`
--
ALTER TABLE `def_unit_iki`
  MODIFY `DUI_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `def_unit_logbook`
--
ALTER TABLE `def_unit_logbook`
  MODIFY `DUL_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mst_iki`
--
ALTER TABLE `mst_iki`
  MODIFY `MST_IKI_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `mst_kegiatan_logbook`
--
ALTER TABLE `mst_kegiatan_logbook`
  MODIFY `MKL_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mst_unit`
--
ALTER TABLE `mst_unit`
  MODIFY `MSU_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `ID_PENILAIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `RAG_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_level_kesulitan`
--
ALTER TABLE `ref_level_kesulitan`
  MODIFY `RLK_KODE` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trans_jabatan_pegawai`
--
ALTER TABLE `trans_jabatan_pegawai`
  MODIFY `TJB_KODE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trans_logbook`
--
ALTER TABLE `trans_logbook`
  MODIFY `TLB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `trans_unit_pegawai`
--
ALTER TABLE `trans_unit_pegawai`
  MODIFY `TUP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `def_jabatan_iki`
--
ALTER TABLE `def_jabatan_iki`
  ADD CONSTRAINT `def_jabatan_iki_ibfk_2` FOREIGN KEY (`REF_JAB_KODE`) REFERENCES `ref_jb_fungsional` (`REF_JB_FN_KODE`);

--
-- Constraints for table `def_jabatan_logbook`
--
ALTER TABLE `def_jabatan_logbook`
  ADD CONSTRAINT `def_jabatan_logbook_ibfk_1` FOREIGN KEY (`MKL_KODE`) REFERENCES `mst_kegiatan_logbook` (`MKL_KODE`),
  ADD CONSTRAINT `def_jabatan_logbook_ibfk_2` FOREIGN KEY (`REF_JAB_KODE`) REFERENCES `ref_jb_fungsional` (`REF_JB_FN_KODE`);

--
-- Constraints for table `def_unit_iki`
--
ALTER TABLE `def_unit_iki`
  ADD CONSTRAINT `def_unit_iki_ibfk_2` FOREIGN KEY (`MST_UNIT_MSU_KODE`) REFERENCES `mst_unit` (`MSU_KODE`);

--
-- Constraints for table `def_unit_logbook`
--
ALTER TABLE `def_unit_logbook`
  ADD CONSTRAINT `def_unit_logbook_ibfk_1` FOREIGN KEY (`MKL_KODE`) REFERENCES `mst_kegiatan_logbook` (`MKL_KODE`),
  ADD CONSTRAINT `def_unit_logbook_ibfk_2` FOREIGN KEY (`MST_UNIT_MSU_KODE`) REFERENCES `mst_unit` (`MSU_KODE`);

--
-- Constraints for table `mst_pegawai`
--
ALTER TABLE `mst_pegawai`
  ADD CONSTRAINT `mst_pegawai_ibfk_1` FOREIGN KEY (`REF_AGAMA_RAG_KODE`) REFERENCES `ref_agama` (`RAG_KODE`);

--
-- Constraints for table `trans_jabatan_pegawai`
--
ALTER TABLE `trans_jabatan_pegawai`
  ADD CONSTRAINT `trans_jabatan_pegawai_ibfk_2` FOREIGN KEY (`REF_JAB_KODE`) REFERENCES `ref_jb_fungsional` (`REF_JB_FN_KODE`),
  ADD CONSTRAINT `trans_jabatan_pegawai_ibfk_3` FOREIGN KEY (`MST_PEG_KODE`) REFERENCES `mst_pegawai` (`MPG_KODE`);

--
-- Constraints for table `trans_logbook`
--
ALTER TABLE `trans_logbook`
  ADD CONSTRAINT `trans_logbook_ibfk_1` FOREIGN KEY (`MST_KEG_LOGB_MKL_KODE`) REFERENCES `mst_kegiatan_logbook` (`MKL_KODE`),
  ADD CONSTRAINT `trans_logbook_ibfk_3` FOREIGN KEY (`REF_LVL_KESLTN_RLK_KODE`) REFERENCES `ref_level_kesulitan` (`RLK_KODE`),
  ADD CONSTRAINT `trans_logbook_ibfk_4` FOREIGN KEY (`MST_PEGAWAI_MPG_KODE`) REFERENCES `mst_pegawai` (`MPG_KODE`);

--
-- Constraints for table `trans_unit_pegawai`
--
ALTER TABLE `trans_unit_pegawai`
  ADD CONSTRAINT `trans_unit_pegawai_ibfk_2` FOREIGN KEY (`MST_UNIT_MSU_KODE`) REFERENCES `mst_unit` (`MSU_KODE`),
  ADD CONSTRAINT `trans_unit_pegawai_ibfk_3` FOREIGN KEY (`MST_PEGAWAI_MPG_KODE`) REFERENCES `mst_pegawai` (`MPG_KODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
