-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 04:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elbayan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `password`, `nama_admin`, `alamat`, `no_hp`, `img`) VALUES
(1, '160c07aeb4925fa728a3726268303b68', 'maelbayan', 'Cibeunying', '08123456789', 'profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(14) NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `kode_buku`, `judul_buku`, `kategori`, `penerbit`, `pengarang`, `tahun_terbit`, `stok_buku`, `keterangan`) VALUES
(4, 'Bk-05', 'Pendidikan Agama Islam', '6', 'Graha Ilmu', 'Bambang Hariyanto', 2010, 30, 'Buku perpus'),
(5, 'BK-06', 'Manajemen dalam persfektif islam', '6', 'Pustaka el-bayan majenang', 'Andi', 2005, 15, 'Buku perpus'),
(6, 'Bk-07', 'Pendidikan Kewarganegaraan', '6', 'Airlangga', 'Tere Liye', 2007, 58, 'Buku Perpus'),
(7, 'Bk-08', 'Biologi', '6', 'Yrama Widya', 'Supeni', 2016, 20, 'Buku perpus'),
(8, 'Bk-09', 'Bahasa Arab', '6', 'Erlangga', 'Faidah Rachmawati', 2005, 32, 'Buku perpus'),
(9, 'Bk-10', 'Bahasa Mandarin', '6', 'Gramedia', 'Direktorat KSKK Madrasah', 2009, 21, 'Buku perpus'),
(10, 'Bk-01', 'Sayap-Sayap Patah', '5', 'Erlangga', 'Kahlil Gibran', 2005, 4, 'novel perpus'),
(11, 'Bk-02', 'sang pemimpi', '5', 'Gramedia', 'Andrea Hirata', 2009, 5, 'Novel perpus'),
(12, 'Bk-03', 'Laskar pelangi', '5', 'Gramedia', 'Andrea Hirata', 2007, 4, 'novel perpus'),
(13, 'Bk-04', 'Negeri 5 Menara', '5', 'Erlangga', 'Ahmad Fuadi', 2008, 5, 'novel perpus'),
(14, 'Bk-19', 'Kamus Bahasa Indonesia', '8', 'Erlangga', 'Waridah', 2000, 5, 'Kamus perpus'),
(15, 'Bk-20', 'Kamus Bahasa Mandarin', '8', 'Gramedia', 'Hwat', 1998, 3, 'Kamus perpus'),
(16, 'Bk-21', 'Kamus Bahasa Arab', '8', 'Erlangga', 'Taufiqurochman', 2002, 3, 'Kamus perpus'),
(17, 'Bk-11', 'Bahasa Indonesia', '6', 'Pusat kurikulum dan perbukuan', 'Maman suryaman', 2017, 25, 'Buku perpus'),
(18, 'Bk-12', 'Buku Paket 1', '6', 'Gramedia', 'Suherli', 2018, 5, 'Buku perpus'),
(19, 'Bk-13', 'Ilmu Pengetahuan Alam', '6', 'Gramedia', 'Putri Az-Zahra Haryanto', 2018, 26, 'Buku perpus'),
(20, 'Bk-14', 'Ilmu Pengethuan Sosial', '6', 'Erlangga', 'Irwa Sadad Sutarman', 2007, 17, 'Buku perpus'),
(21, 'Bk-15', 'Seni  Budaya', '6', 'Yrama Widya', 'Sutarman', 2014, 17, 'Buku perpus'),
(22, 'Bk-16', 'Sosiologi', '6', 'Pusat kurikulum dan perbukuan', 'Muhammad asrori', 2005, 19, 'Buku perpus'),
(23, 'Bk-17', 'Kewirausahaan', '6', 'Gramedia', 'Arikunto', 2019, 15, 'Buku perpus'),
(24, 'Bk-18', 'Umat Nabi', '6', 'Azka Press', 'Bambang Hariyanto', 2009, 50, 'Buku Perpus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(5) NOT NULL,
  `id_pinjam` int(10) NOT NULL,
  `denda` varchar(16) NOT NULL,
  `status` enum('A','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `id_pinjam`, `denda`, `status`) VALUES
(1, 38, '2000', 'N'),
(2, 42, '4500', 'N'),
(3, 46, '2500', 'N'),
(4, 50, '5500', 'N'),
(5, 51, '1000', 'N'),
(6, 37, '1000', 'N'),
(7, 52, '3000', 'N'),
(8, 44, '500', 'A'),
(9, 53, '5000', 'N'),
(10, 56, '6500', 'N'),
(11, 68, '2000', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(5, 'Novel'),
(6, 'Pendidikan'),
(8, 'Kamus'),
(9, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(5) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(32, 'X Agama'),
(33, 'X Bahasa'),
(28, 'X IPA 1'),
(29, 'X IPA 2'),
(30, 'X IPA 3'),
(31, 'X IPA 4'),
(2, 'X IPS 1'),
(25, 'X IPS 2'),
(26, 'X IPS 3'),
(27, 'X IPS 4'),
(3, 'XI Agama'),
(20, 'XI BAHASA'),
(9, 'XI IPA 1'),
(13, 'XI IPA 2'),
(14, 'XI IPA 3'),
(15, 'XI IPA 4'),
(16, 'XI IPS 1'),
(17, 'XI IPS 2'),
(18, 'XI IPS 3'),
(19, 'XI IPS 4'),
(10, 'XII Agama'),
(24, 'XII BAHASA'),
(21, 'XII IPA 1'),
(5, 'XII IPA 2'),
(23, 'XII IPS 1'),
(34, 'XII IPS 2'),
(35, 'XII IPS 3'),
(11, 'XII IPS 4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(10) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_buku`, `id_siswa`, `tgl_pinjam`, `tgl_kembali`, `jumlah_kembali`, `tgl_dikembalikan`) VALUES
(20, 4, 61135420, '2022-10-08', '2022-10-06', 5, '2022-10-08'),
(21, 16, 55919325, '2022-10-08', '2022-10-02', 1, '2022-10-08'),
(22, 11, 68903611, '2022-10-08', '2022-10-07', 3, '2022-10-08'),
(23, 10, 62629317, '2022-10-08', '2022-09-28', 4, '2022-10-08'),
(24, 20, 53514647, '2022-10-08', '2022-10-11', 12, '2022-10-08'),
(25, 13, 56583522, '2022-10-08', '2022-09-26', 2, '2022-10-08'),
(26, 16, 64525124, '2022-10-08', '2022-10-09', 2, '2022-10-08'),
(27, 4, 62513834, '2022-10-08', '2022-10-11', 8, '2022-10-08'),
(28, 18, 53843302, '2022-10-08', '2022-10-11', 2, '2022-10-08'),
(29, 20, 59720529, '2022-10-08', '2022-10-11', 4, '2022-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `status`) VALUES
('admin', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` int(5) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'Erlangga'),
(2, 'Gramedia'),
(3, 'HGS'),
(4, 'Erlangga'),
(5, 'Gramedia'),
(6, 'HGS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `id_pengarang` int(5) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengarang`
--

INSERT INTO `tb_pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'Tere Liye'),
(2, 'Boy Candra'),
(3, 'Susanto Sunaryo'),
(4, 'Tere Liye'),
(5, 'Boy Candra'),
(6, 'Susanto Sunaryo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(10) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `password` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `img`, `jenis_kelamin`, `alamat`, `no_hp`, `password`, `keterangan`) VALUES
(1, 'admin ', 'profile.jpg', 'P', 'Sukabumi', '08123456789', 'admin123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_buku` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_buku` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `denda` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `tgl_pinjam`, `id_buku`, `id_siswa`, `tgl_kembali`, `total_buku`, `status`, `denda`) VALUES
(37, '2022-10-08', 4, 61135420, '2022-10-06', 5, 1, 1),
(42, '2022-10-08', 7, 64743739, '2022-09-29', 17, 0, 1),
(43, '2022-10-08', 13, 54291933, '2022-10-06', 2, 0, 0),
(44, '2022-10-08', 11, 68903611, '2022-10-07', 3, 1, 1),
(47, '2022-10-08', 9, 67030783, '2022-10-11', 2, 0, 0),
(48, '2022-10-08', 5, 49665069, '2022-10-05', 5, 0, 0),
(49, '2022-10-08', 4, 62513834, '2022-10-11', 8, 1, 0),
(52, '2022-10-08', 16, 55919325, '2022-10-02', 1, 1, 1),
(53, '2022-10-08', 10, 62629317, '2022-09-28', 4, 1, 1),
(54, '2022-10-08', 4, 62733111, '2022-10-05', 12, 0, 0),
(55, '2022-10-08', 7, 59092153, '2022-10-05', 3, 0, 0),
(56, '2022-10-08', 13, 56583522, '2022-09-26', 2, 1, 1),
(57, '2022-10-08', 11, 62513834, '2022-10-03', 2, 0, 0),
(58, '2022-10-08', 18, 53843302, '2022-10-11', 2, 1, 0),
(59, '2022-10-08', 17, 58627340, '2022-09-30', 4, 0, 0),
(60, '2022-10-08', 20, 53514647, '2022-10-11', 12, 1, 0),
(61, '2022-10-08', 19, 53147655, '2022-10-04', 20, 0, 0),
(62, '2022-10-08', 20, 59720529, '2022-10-11', 4, 1, 0),
(63, '2022-10-08', 17, 62513834, '2022-09-27', 2, 0, 0),
(64, '2022-10-08', 16, 64525124, '2022-10-09', 2, 1, 0),
(65, '2022-10-08', 21, 68109788, '2022-10-05', 10, 0, 0),
(67, '2022-10-08', 23, 60034726, '2022-10-02', 12, 0, 0),
(68, '2022-10-08', 22, 53147655, '2022-10-05', 12, 0, 1),
(69, '2022-10-09', 24, 64743739, '2022-10-12', 5, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `jenis_kelamin`, `kelas`, `no_hp`, `alamat`, `keterangan`) VALUES
(18, '0079085191', 'Muhamad Fathir Assyifa', 'L', '9', '089374672322', 'JL.A.YANI NO.38 CARUY, CIPARI, CILACAP, JAWA TENGAH, 53262, 53262', 'Pondok'),
(21, '0061135420', 'IQNATUL FEBRIYANTI', 'P', '9', '0817366337', 'Serang, RT 01 RW 07 SERANG, CIPARI, CILACAP, JAWA TENGAH, 53262, 53262', 'Pondok'),
(22, '0064525124', 'MIFTAHUL FARID FIRDAUS', 'L', '13', '089374672322', 'KEDUNGHAUR RT 09/06 KERTAJAYA KERTAJAYA, MANGUNJAYA, KABUPATEN PANGANDARAN, JAWA BARAT, 46571, 46571', 'Pondok'),
(25, '0068053190', 'NAJWA FATIMATU ZAHRO', 'P', '13', '083836074108', 'RT 014/006 MULYO ASRI, BUMI AGUNG, LAMPUNG TIMUR, LAMPUNG, 34194, 34194', 'Pondok'),
(26, '0054291933', 'Azizatun Nisa', 'P', '14', '089374672322', 'RT 001/001 SUKANAGARA, CIKUPA, KABUPATEN TANGERANG, BANTEN, 15710, 15710', 'Pondok'),
(27, '0068109788', 'AENI NUR HIDAYAH', 'P', '14', '0879397901', 'Bulureja RT 02 RW 07  BANTARSARI, BANTARSARI, CILACAP, JAWA TENGAH, 53258, 53258', 'Pondok'),
(28, '0056583522', 'AYU SAFITRI', 'P', '15', '08797763297', 'RT 02 RW 07 PADANGJAYA, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(29, '0055900559', 'AFLAHUL &#39;IZATI', 'P', '15', '08827642313', 'Jl Kartini Rt 02/Rw 05 PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(30, '0064743739', 'ZAHRA EVA FAUZIAH ', 'P', '16', '08786796873', 'BABAKAN BANTAR, WANAREJA, CILACAP, JAWA TENGAH, 53265, 53265', 'Pondok'),
(31, '3067555215', 'FIKRI MAULANA ACHMAD', 'L', '16', '0897289430', 'JL. ABDURRAHMAN PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Pondok'),
(32, '0061047986', 'KHOMARIYAH', 'P', '17', '08927916402', 'RT 006/009 CIKLAPA, KEDUNGREJA, CILACAP, JAWA TENGAH, 53263, 53263', 'Pondok'),
(33, '0067078606', 'HULASOTUL KHIQMAH', 'P', '17', '08129792649', 'RT 04/05 Padangsari PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(34, '0067597239', 'CHINTYA LESTARI', 'P', '18', '081972974245', 'Jl. SERINGGU JAYA SERINGGU JAYA, MERAUKE, MERAUKE, PAPUA, 99619, 99619', 'Pondok'),
(35, '0061313666', 'HANADI NADIA MULYA', 'P', '18', '08197391693', 'RT 003/009 PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(36, '0069201100', 'DELA FEBIYANTI', 'P', '19', '085178391693', 'RT 010/001 PAHONJEAN, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(37, '0055853359', 'TARMONO', 'L', '19', '085872683694', 'RT 001/006 KARANGREJA, CIMANGGU, CILACAP, JAWA TENGAH, 53256, 53256', 'Pondok'),
(39, '0065939103', 'NOVI RIDAUNNAJAH', 'P', '3', '081973961435', 'Sidodadi Rt 05/02 Tambakreja TAMBAKREJA, LAKBOK, KABUPATEN CIAMIS, JAWA BARAT, 46385, 46385', 'Pondok'),
(40, '0068903611', 'AMALIA MULYASAROH', 'P', '3', '081973972974', 'Cipari, RT 06 RW 04 CIPARI, CIPARI, CILACAP, JAWA TENGAH, 53262, 53262', 'Pondok'),
(41, '0064764369', 'ZAYYINNA SABIQ ALFAZA', 'P', '20', '08176986496234', 'RT 002/004 CINGEBUL, LUMBIR, BANYUMAS, JAWA TENGAH, 53177, 53177', 'Pondok'),
(42, '62621660', 'KHOLISHOTUL &#39;AINI', 'P', '20', '081987397453', 'Cikawung, 28/07 CINTARATU, LAKBOK, KABUPATEN CIAMIS, JAWA BARAT, 46385, 46385', 'Pondok'),
(43, '0051797680', 'NABILA BUNGA NURLITA', 'P', '28', '08108492679', 'Rt 004/003 GANDRUNGMANIS, GANDRUNGMANGU, CILACAP, JAWA TENGAH, 53254, 53254', 'Pondok'),
(44, '68415284', 'DINAN SALSA BILA', 'P', '28', '0809179472', 'DUSUN IV TANJUNG HARAPAN, MARGA TIGA, LAMPUNG TIMUR, LAMPUNG, 34195, 34195', 'Pondok'),
(45, '60034726', 'ARIF DA&#39;I BAKHTIAR', 'L', '29', '08927973095', 'JL.MALANGDIRANA SEGARALANGU, CIPARI, CILACAP, JAWA TENGAH, 53262, 53262', 'Pondok'),
(46, '0062513834', 'ANISA NUKI AMELIA', 'P', '29', '08781686393', 'SINDANGRATU RT 033/010 KARANGPAWITAN, PADAHERANG, KABUPATEN PANGANDARAN, JAWA BARAT, 46354, 46354', 'Pondok'),
(47, '3068887831', 'ARISTA NOVI ISTIQOMAH', 'P', '30', '08792798623', 'RT 024/011 MARUYUNGSARI, PADAHERANG, KABUPATEN PANGANDARAN, JAWA BARAT, 46384, 46384', 'Pondok'),
(48, '0059092153', 'NAJMUL FARIKH', 'L', '30', '087297898769', 'JL.KY SUHUD PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(49, '0062596556', 'NUR LAELATUL AZKIYAH', 'P', '31', '08969798245', 'Banjarharja,RT.009/003 BAREGBEG, LAKBOK, KABUPATEN CIAMIS, JAWA BARAT, 46385, 46385', 'Pondok'),
(50, '0058792109', 'SIFA USWATUN HASANAH', 'P', '31', '087853374854', 'Adimulya 13/03 Sukanagara SUKANAGARA, LAKBOK, KABUPATEN CIAMIS, JAWA BARAT, 46385, 46385', 'Pondok'),
(51, '0066208589', 'DEWI RIZQIYATUNNUFUS', 'P', '2', '087578637757', 'Jalan Perintis IV No. 05 Rt. 04/02 SIDASARI, CIPARI, CILACAP, JAWA TENGAH, 53262, 53262', 'Pondok'),
(52, '0062759395', 'IKA ISMATUL HAWA', 'P', '2', '0897086524', 'Desa Mataram Baru,  Kec. Mataram Baru MATARAM BARU, MATARAM BARU, LAMPUNG TIMUR, LAMPUNG, 34199, 34199', 'Pondok'),
(53, '0067436562', 'FAIZ ITMAMUDIN', 'L', '25', '08971938764', 'Sekincau SEKINCAU, SEKINCAU, LAMPUNG BARAT, LAMPUNG, 34886, 34886', 'Pondok'),
(54, '0053514647', 'MUHAMMAD AWALUDIN', 'L', '25', '087917936897', 'RT 001/007 PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(55, '3061339004', 'VANIESA EKA', 'P', '26', '08978916927', 'Mekarsari Rt 04/28 BALEENDAH, BALEENDAH, KABUPATEN BANDUNG, JAWA BARAT, 40375, 40375', 'Pondok'),
(56, '0062997223', 'FINA WAFIROTUL FADILAH', 'P', '26', '089816286392', 'Gandrungmangu rt 01 rw 04 MUKTISARI, GANDRUNGMANGU, CILACAP, JAWA TENGAH, 53254, 53254', 'Pondok'),
(57, '3061971890', 'FARHAN ABDULLOH', 'L', '27', '08927963861', 'Jl Ky Safari Rt 01/Rw 02 PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(58, '0066840673', 'GEORGE APRILIO SARWOTO', 'L', '27', '089654783764', 'Tiparkidul RT 03 /RW 16 TIPAR KIDUL, AJIBARANG, BANYUMAS, JAWA TENGAH, 53163, 53163', 'Pondok'),
(59, '0067030783', 'MUCHAMMAD FAHMI IDRIS', 'L', '32', '087975954466', 'Hargomulyo HARGOMULYO, SEKAMPUNG, LAMPUNG TIMUR, LAMPUNG, 34182, 34182', 'Pondok'),
(60, '0068812910', 'HALIM ZALFA NASOKHA', 'P', '32', '08685829263', 'Sidareja Rt 01 Rw 06 SIDAREJA, SIDAREJA, CILACAP, JAWA TENGAH, 53261, 53261', 'Pondok'),
(61, '0062629317', 'KENAN ASYSYAHID', 'L', '33', '082354178268', 'Gg Rido WANAREJA, WANAREJA, CILACAP, JAWA TENGAH, 53265, 53265', 'Pondok'),
(62, '0059861646', 'NAILA KHOEROTUNNISA', 'P', '33', '086296129926', 'Dusun Sukasari RT 11/RW 03 Desa Sukajadi SUKAJADI, PAMARICAN, KABUPATEN CIAMIS, JAWA BARAT, 46382, 46382', 'Pondok'),
(63, '0058587774', 'AZIZAH ZAHRA SANTOSO', 'P', '21', '6283116386229', 'HARGOMULYO RT 030/007 HARGOMULYO, SEKAMPUNG, LAMPUNG TIMUR, LAMPUNG, 34182, 34182', 'Pondok'),
(64, '0057733911', 'ALIFIA SYIFAUNNABILA', 'P', '21', '6288983128175', 'JL.SRIKAYA NO.03 JENANG, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(65, '0053843302', 'IHSAN ALMUSYAFFA', 'L', '5', '6285156226680', 'Margasari RT 001 RW 006 LANGENSARI, LANGENSARI, KOTA BANJAR, JAWA BARAT, 46325, 46325', 'Pondok'),
(66, '0059720529', 'ZIDNA HUSNA AMALINA', 'P', '5', '6281575723932', 'RT 03/05 Padangsari PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(67, '0012064477', 'RIFAUL ULUM', 'L', '23', '6283826388433', 'KUBANGWARU RT 005/003 REJODADI, CIMANGGU, CILACAP, JAWA TENGAH, 53256, 53256', 'Pondok'),
(68, '0054880060', 'KHUMROTUS SANINGAH', 'P', '23', '628895512113', 'RT 005/005 SALEBU, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(69, '0044714515', 'ALI NURHIDAYAT', 'L', '34', '6288216678247', 'RT 004/005 SALEBU, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(70, '0053464489', 'DEWI ZUHROTUS SALWA', 'P', '34', '6238841883693', 'RT01/RW04 KOTA WAY, KASUI, WAY KANAN, LAMPUNG, 34565, 34565', 'Pondok'),
(71, '0012064487', 'SITI FATONAH', 'P', '35', '6283141251367', 'Rejodadi, Rt 07/03 REJODADI, CIMANGGU, CILACAP, JAWA TENGAH, 53256, 53256', 'Desa'),
(72, '0062733111', 'ADAM MALIK ASHARI', 'L', '35', '6283830103439', 'JL.KY.ABDUL GHONI RT 003/009 PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(73, '0055919325', 'AGHNI THOBIQOTUSSUPLA', 'P', '11', '6283145778769', 'JL.KY SUHUD PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(74, '0053147655', 'ARIF MUJAHID', 'L', '11', '6283126640966', 'Rt.01/Rw.04 Padangsari PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa'),
(75, '0058945566', 'MUHAMMAD KHOIRUL ANAM', 'L', '10', '6285922128515', 'DONO ARUM DONO ARUM, SEPUTIH AGUNG, LAMPUNG TENGAH, LAMPUNG, 34161, 34161', 'Pondok'),
(76, '0058627340', 'SITI NUR AISYAH', 'P', '10', '6281335690563', 'Karangcengek RT 27/08 Pamarican Kec. Pamarican Kab. Ciamis PAMARICAN, PAMARICAN, KABUPATEN CIAMIS, JAWA BARAT, 46382, 46382', 'Pondok'),
(77, '0061336864', 'MUHAMMAD KHAIRUL AMANY', 'L', '24', '6283162233061', 'JL. SEI NIUR RT 003/005 ALAH AIR TIMUR, TEBING TINGGI, KEPULAUAN MERANTI, RIAU, 28753, 28753', 'Pondok'),
(78, '0049665069', 'SEPTI RAHAYU', 'P', '24', '6285900470331', 'PUWOSARI RT 001/007 PADANGSARI, MAJENANG, CILACAP, JAWA TENGAH, 53257, 53257', 'Desa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_admin` (`id_admin`,`password`,`nama_admin`,`alamat`,`no_hp`,`img`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`kategori`),
  ADD KEY `id_penerbit` (`penerbit`),
  ADD KEY `id_pengarang` (`pengarang`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas` (`kelas`) USING BTREE;

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`,`password`,`status`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_siswa` (`id_siswa`) USING BTREE;

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nisn` (`nisn`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id_penerbit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengarang`
--
ALTER TABLE `tb_pengarang`
  MODIFY `id_pengarang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
