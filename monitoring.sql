-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2021 at 05:24 PM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingin_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` varchar(255) NOT NULL,
  `bulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`) VALUES
('01', 'Januari'),
('02', 'Februari'),
('03', 'Maret'),
('04', 'April'),
('05', 'Mei'),
('06', 'Juni'),
('07', 'Juli'),
('08', 'Agustus'),
('09', 'September'),
('10', 'Oktober'),
('11', 'November'),
('12', 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `no_pendaftaran`
--

CREATE TABLE `no_pendaftaran` (
  `id_nomor` int(20) NOT NULL,
  `nomor_terakhir` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `no_pendaftaran`
--

INSERT INTO `no_pendaftaran` (`id_nomor`, `nomor_terakhir`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`tahun`) VALUES
('2019'),
('2020'),
('2021'),
('2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_kendaraan`
--

CREATE TABLE `tb_data_kendaraan` (
  `id_data` varchar(255) NOT NULL,
  `no_pol` varchar(255) NOT NULL,
  `pemilik` varchar(255) DEFAULT NULL,
  `sim` varchar(255) NOT NULL,
  `id_kepemilikan` varchar(255) DEFAULT NULL,
  `tgl_teregistrasi` date DEFAULT NULL,
  `tgl_kadaluwarsa` date DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `seri` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_data_kendaraan`
--

INSERT INTO `tb_data_kendaraan` (`id_data`, `no_pol`, `pemilik`, `sim`, `id_kepemilikan`, `tgl_teregistrasi`, `tgl_kadaluwarsa`, `jenis`, `merek`, `seri`, `warna`, `perusahaan`, `qr_code`) VALUES
('INV-65f2d00b61eb5f', 'Z-2865-CW', 'IMA KHARISMAWATI', '191203003', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A4400CC887', 'NMAX', 'Hitam', 'PT PLN (Persero) UIK TJB', 'Z-2865-CW.png'),
('INV-65f2d015922222', 'B-1030-EOG', 'MUHAMMAD FIRDAUS', '191203002', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F1A43E8C1F18', 'HRV', 'Hitam', 'PT PLN (Persero) UIK TJB', 'B-1030-EOG.png'),
('INV-65f2d01a41d720', 'H-9438-KQ', 'PLN OPERASIONAL', '191123004', '2', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E6367C4A', 'INNOVA', 'Putih', 'PT PLN (Persero) UIK TJB', 'H-9438-KQ.png'),
('INV-65f2d03231478e', 'K-1258-RV', 'SUTAHAR', '191203028', '2', '2020-08-07', '2021-08-07', 'Lainnya', 'MRK-45F280E989A3AC', 'BUS', 'Hitam', 'PT TJB Power Services', 'K-1258-RV.png'),
('INV-65f2d036ed3bb6', 'K-8470-NL', 'TIKA DEVI A', '191205004', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E823A546', 'XPANDER', 'Putih', 'PT TJB Power Services', 'K-8470-NL.png'),
('INV-65f2d03ccba394', 'H-1167-PG', 'CJP OPERASIONAL', '191122007', '2', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E6367C4A', 'INNOVA', 'Hitam', 'PT Central Jawa Power', 'H-1167-PG.png'),
('INV-65f2d0427f35db', 'K-9096-UH', 'DANANG KURNIAWAN ', '191227039', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F1A43E8C1F18', 'JAZZ', 'Biru', 'PT Komipo Pembangkitan Jawa Bali', 'K-9096-UH.png'),
('INV-65f2d0480208c4', 'K-2302-ABC', 'MAULIDA EFENDI ', '200318003', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'VARIO', 'Hitam', 'PT Adhiguna Putera', 'K-2302-ABC.png'),
('INV-65f2d04d5a6cf5', 'K-4694-V', 'HASSAN ASRI ', '200120025', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'SUPRA', 'Hitam', 'PT Bravo Security Indonesia', 'K-4694-V.png'),
('INV-65f2d053e656cf', 'K-4772-NQ', 'MARSINI', '191130005', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'BEAT', 'Putih', 'PT Haleyora Powerindo', 'K-4772-NQ.png'),
('INV-65f2d0593a7513', 'K-8675-JL', 'REZA SHAH ALAM', '191231011', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280F1B3056F', 'RIO', 'Merah', 'PT Bahtera Adhiguna', 'K-8675-JL.png'),
('INV-65f2d05dd25cce', 'N-1736-FK', 'EBEN WIDHIASMARA', '200304007', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F1A43EACD33D', 'ERTIGA', 'Putih', 'PT Kalinyamat Perkasa', 'N-1736-FK.png'),
('INV-65f2d062cbb442', 'AG-1013-VS', 'SIHONO', '191202006', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E6367C4A', 'INNOVA', 'Biru', 'PT PJB Services', 'AG-1013-VS.png'),
('INV-65f2d067c5f283', 'K-5853-DQ', 'NURUL SETYO BUDI', '200314011', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'VARIO', 'Putih', 'PT Mitra Karya Prima', 'K-5853-DQ.png'),
('INV-65f2d06e0f16e6', 'K-6809-VV', 'MUKO GINANJAR AGUNG', '200315006', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'SUPRA', 'Hitam', 'PT Mitra Karya Prima', 'K-6809-VV.png'),
('INV-65f2d140e52fcd', 'K-3271-NV', 'BAKHTIAR SYAFII', '191202014', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'VARIO', 'Merah', 'PT PJB Services', 'K-3271-NV.png'),
('INV-65f2d14647cdba', 'K-8457-GL', 'IKA PERMATAWATI ', '191227049', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F1A43EACD33D', 'ERTIGA', 'Silver', 'PT Komipo Pembangkitan Jawa Bali', 'K-8457-GL.png'),
('INV-65f2d14b3756df', 'AB-1085-VN', 'LAURENSIUS TIRTA AJI ', '191226050', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F1A43E8C1F18', 'BRIO', 'Hitam', 'PT Komipo Pembangkitan Jawa Bali', 'AB-1085-VN.png'),
('INV-65f2d1507c97a5', 'L-4610-QC', 'KPJB OPERASIONAL', '200520008', '2', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A4400CC887', 'MIO', 'Biru', 'PT Komipo Pembangkitan Jawa Bali', 'L-4610-QC.png'),
('INV-65f2d15b5cfae8', 'K-7386-EC', 'RIYANTO', '191130009', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43EACD33D', 'KATANA', 'Hijau', 'PT Haleyora Powerindo', 'K-7386-EC.png'),
('INV-65f2d1610072ab', 'W-1885-QT', 'ANGGER PRASOJO', '200317001', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E6367C4A', 'FORTUNER', 'Putih', 'PT Haleyora Powerindo', 'W-1885-QT.png'),
('INV-65f2d16ce1ad1b', 'K-5900-OQ', 'TEGUH ERIYANTO ', '200120011', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'VARIO', 'Hitam', 'PT Bravo Security Indonesia', 'K-5900-OQ.png'),
('INV-65f2d78230d21b', 'B-2370-UBE', 'RIFHANDITA ASOKAWATI', '191224044', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F1A43E8C1F18', 'CRV', 'Hitam', 'PT TJB Power Services', 'B-2370-UBE.png'),
('INV-65f2d78582174e', 'K-4221-QQ', 'LILIS FAUZIYAH', '191208016', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'BEAT', 'Putih', 'PT TJB Power Services', 'K-4221-QQ.png'),
('INV-65f2d78a33ece9', 'K-1243-RV', 'ACHMAD ZAINUDIN', '191204019', '2', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E6367C4A', 'HIACE', 'Putih', 'PT TJB Power Services', 'K-1243-RV.png'),
('INV-65f2d78ffd89b2', 'AD-6201-KQ', 'JANI PRATAWA', '191205010', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A4400CC887', 'VIXION', 'Hitam', 'PT TJB Power Services', 'AD-6201-KQ.png'),
('INV-65f2d796154717', 'E-3682-JQ', 'REZA MAULID GHIFFARY', '191231069', '1', '2020-08-07', '2021-08-07', 'motor', 'MRK-45F1A43E8C1F18', 'BEAT', 'Hitam', 'PT PLN (Persero) UIK TJB', 'E-3682-JQ.png'),
('INV-65f2d7999a5600', 'H-8401-DQ', 'PLN OPERASIONAL', '191123013', '2', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E6367C4A', 'HIACE', 'Silver', 'PT PLN (Persero) UIK TJB', 'H-8401-DQ.png'),
('INV-65f2d7a03c42ec', 'R-9264-FS', 'KUKUH SUDARYATMO', '200123001', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F1A43E8C1F18', 'BRIO', 'Hitam', 'PT PLN (Persero) UIK TJB', 'R-9264-FS.png'),
('INV-65f2d7a3a8cd3d', 'H-7622-IW', 'IBNU WICAKSANA', '191127003', '1', '2020-08-07', '2021-08-07', 'mobil', 'MRK-45F280E823A546', 'PAJERO', 'Hitam', 'PT PLN (Persero) UIK TJB', 'H-7622-IW.png'),
('INV-65f2de64df0974', 'K-5136-AMC', 'DANANG ADI PANRUS ', '200120022', '1', '2020-08-07', '2021-08-08', 'motor', 'MRK-45F1A4400CC887', 'NMAX', 'Putih', 'PT Bravo Security Indonesia', 'K-5136-AMC.png'),
('INV-65f2de6a2e1085', 'K-9107-JA', 'KADONO', '200120009', '1', '2020-08-07', '2021-08-08', 'mobil', 'MRK-45F280EAB57E66', 'PANTHER', 'Biru', 'PT Bravo Security Indonesia', 'K-9107-JA.png'),
('INV-65f2de6f24c7c5', 'K-3902-TL', 'SLAMET RIYADI ', '200120038', '1', '2020-08-07', '2021-08-08', 'motor', 'MRK-45F1A43E8C1F18', 'LEGENDA', 'Hitam', 'PT Bravo Security Indonesia', 'K-3902-TL.png'),
('INV-65f2de743bbb77', 'K-4346-YV', 'DANIEL SETIYA BUDI ', '200120049', '1', '2020-08-07', '2021-08-08', 'motor', 'MRK-45F1A4400CC887', 'JUPITER', 'Biru', 'PT Bravo Security Indonesia', 'K-4346-YV.png'),
('INV-65f2de83dc077b', 'K-4358-IS', 'LILIK PUJIANTO ', '191227056', '1', '2020-08-07', '2021-08-08', 'motor', 'MRK-45F1A43E8C1F18', 'VARIO', 'Hitam', 'PT Komipo Pembangkitan Jawa Bali', 'K-4358-IS.png'),
('INV-65f2de8840a5b5', 'H-9107-TP', 'INTAN DEWI RACHMAWATI ', '191227077', '1', '2020-08-07', '2021-08-08', 'mobil', 'MRK-45F280E823A546', 'XPANDER', 'Silver', 'PT Komipo Pembangkitan Jawa Bali', 'H-9107-TP.png'),
('INV-65f2de8cd5685c', 'G-8483-MC', 'PARTONO ', '191227091', '1', '2020-08-07', '2021-08-08', 'mobil', 'MRK-45F1A43F12C66F', 'XENIA', 'Hitam', 'PT Komipo Pembangkitan Jawa Bali', 'G-8483-MC.png'),
('INV-65f2de9183fa83', 'H-9064-BM', 'ARTHA BUDHI NUGROHO ', '191227066', '1', '2020-08-07', '2021-08-08', 'mobil', 'MRK-45F280ED855F6F', 'GRAND LIVINA', 'Hitam', 'PT Komipo Pembangkitan Jawa Bali', 'H-9064-BM.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_kendaraan`
--

CREATE TABLE `tb_jenis_kendaraan` (
  `id_jenis_kendaraan` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `id_kunjungan` varchar(255) NOT NULL,
  `no_pol` varchar(255) DEFAULT NULL,
  `tgl_kunjungan` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `jenis_kunjungan` enum('rutin','non_rutin') DEFAULT 'non_rutin',
  `driver` varchar(255) DEFAULT NULL,
  `sim` varchar(255) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `bulan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_kunjungan`
--

INSERT INTO `tb_kunjungan` (`id_kunjungan`, `no_pol`, `tgl_kunjungan`, `jam_masuk`, `jam_keluar`, `jenis_kunjungan`, `driver`, `sim`, `tgl_keluar`, `perusahaan`, `tahun`, `bulan`) VALUES
('KUNJ-65f290468e0007', 'P-1234-HK', '2020-08-04', '13:47:04', '13:47:19', 'rutin', 'TOMI', '12312312', '2020-08-04', 'PT Central Jawa Power', '2020', '08'),
('KUNJ-65f2de49229cf4', 'K-5900-OQ', '2020-08-08', '06:32:34', '15:41:50', 'rutin', 'TEGUH ERIYANTO ', '200120011', '2020-08-08', 'PT Bravo Security Indonesia', '2020', '08'),
('KUNJ-65f2de4e2104d9', 'K-4772-NQ', '2020-08-08', '06:33:54', '15:41:56', 'rutin', 'MARSINI', '191130005', '2020-08-08', 'PT Haleyora Powerindo', '2020', '08'),
('KUNJ-65f2de511cae5c', 'K-7386-EC', '2020-08-08', '06:34:41', '15:42:01', 'rutin', 'RIYANTO', '191130009', '2020-08-08', 'PT Haleyora Powerindo', '2020', '08'),
('KUNJ-65f2de535ad4c9', 'W-1885-QT', '2020-08-08', '06:35:17', '16:46:30', 'rutin', 'ANGGER PRASOJO', '200317001', '2020-08-08', 'PT Haleyora Powerindo', '2020', '08'),
('KUNJ-65f2de75c77974', 'K-9107-JA', '2020-08-08', '06:44:28', '15:42:13', 'rutin', 'KADONO', '200120009', '2020-08-08', 'PT Bravo Security Indonesia', '2020', '08'),
('KUNJ-65f2de778234d0', 'K-5136-AMC', '2020-08-08', '06:44:56', '15:42:19', 'rutin', 'DANANG ADI PANRUS ', '200120022', '2020-08-08', 'PT Bravo Security Indonesia', '2020', '08'),
('KUNJ-65f2de7afe96df', 'K-4694-V', '2020-08-08', '06:45:51', '15:42:37', 'rutin', 'HASSAN ASRI ', '200120025', '2020-08-08', 'PT Bravo Security Indonesia', '2020', '08'),
('KUNJ-65f2de7c56766c', 'K-3902-TL', '2020-08-08', '06:46:13', '15:42:32', 'rutin', 'SLAMET RIYADI ', '200120038', '2020-08-08', 'PT Bravo Security Indonesia', '2020', '08'),
('KUNJ-65f2de7e908e9f', 'K-4346-YV', '2020-08-08', '06:46:49', '15:42:25', 'rutin', 'DANIEL SETIYA BUDI ', '200120049', '2020-08-08', 'PT Bravo Security Indonesia', '2020', '08'),
('KUNJ-65f2de94a1caad', 'K-4358-IS', '2020-08-08', '06:52:42', '16:46:37', 'rutin', 'LILIK PUJIANTO ', '191227056', '2020-08-08', 'PT Komipo Pembangkitan Jawa Bali', '2020', '08'),
('KUNJ-65f2de98165633', 'G-8483-MC', '2020-08-08', '06:53:37', '16:46:44', 'rutin', 'PARTONO ', '191227091', '2020-08-08', 'PT Komipo Pembangkitan Jawa Bali', '2020', '08'),
('KUNJ-65f2de9b80ddab', 'K-1258-RV', '2020-08-08', '06:54:32', '15:44:23', 'rutin', 'SUTAHAR', '191203028', '2020-08-08', 'PT TJB Power Services', '2020', '08'),
('KUNJ-65f2de9cdd6e24', 'K-8470-NL', '2020-08-08', '06:54:53', '15:44:32', 'rutin', 'TIKA DEVI A', '191205004', '2020-08-08', 'PT TJB Power Services', '2020', '08'),
('KUNJ-65f2deea5d3429', 'B-9608-YC', '2020-08-08', '07:15:33', '16:46:50', 'non_rutin', 'Muh. Amin', '191224064', '2020-08-08', 'PT Catur Manunggal', '2020', '08'),
('KUNJ-65f2deef1c31c5', 'K-4517-AGC', '2020-08-08', '07:16:49', '16:46:56', 'non_rutin', 'Nurul Azizah Niken S', '200109021', '2020-08-08', 'PT PLN (Persero) Pusat Manajemen Proyek', '2020', '08'),
('KUNJ-65f2def3e5e1ca', 'K-6827-AKC', '2020-08-08', '07:18:06', '15:44:57', 'non_rutin', 'Andreas SA', '191225001', '2020-08-08', 'PT Zamaraya Aztrin', '2020', '08'),
('KUNJ-65f2def6940f4b', 'K-4221-QQ', '2020-08-08', '07:18:49', '15:44:42', 'rutin', 'LILIS FAUZIYAH', '191208016', '2020-08-08', 'PT TJB Power Services', '2020', '08'),
('KUNJ-65f2def95eccc4', 'K-6809-VV', '2020-08-08', '07:19:33', '16:47:30', 'rutin', 'MUKO GINANJAR AGUNG', '200315006', '2020-08-08', 'PT Mitra Karya Prima', '2020', '08'),
('KUNJ-65f2defb1afe0a', 'K-8675-JL', '2020-08-08', '07:20:01', '16:47:24', 'rutin', 'REZA SHAH ALAM', '191231011', '2020-08-08', 'PT Bahtera Adhiguna', '2020', '08'),
('KUNJ-65f2defcdc4c28', 'K-9096-UH', '2020-08-08', '07:20:29', '16:47:16', 'rutin', 'DANANG KURNIAWAN ', '191227039', '2020-08-08', 'PT Komipo Pembangkitan Jawa Bali', '2020', '08'),
('KUNJ-65f2df018a7663', 'B-4512-SHS', '2020-08-08', '07:21:44', '16:47:42', 'non_rutin', 'Bayu Setiawan', '200117034', '2020-08-08', 'PT. Indominco Mandiri', '2020', '08'),
('KUNJ-65f2df04f31853', 'K-4862-AJC', '2020-08-08', '07:22:39', NULL, 'non_rutin', 'Firman Septian', '200128001', NULL, 'UIT JBT GI Tanjung Jati', '2020', '08'),
('KUNJ-65f2df08781d06', 'K-2105-AKC', '2020-08-08', '07:23:35', NULL, 'non_rutin', 'Johan', '200117043', NULL, 'UIT JBT GI Tanjung Jati', '2020', '08'),
('KUNJ-65f2e65c79962d', 'AD-6201-KQ', '2020-08-08', '15:43:51', NULL, 'rutin', 'JANI PRATAWA', '191205010', NULL, 'PT TJB Power Services', '2020', '08'),
('KUNJ-65f2e66791cb1c', 'K-1243-RV', '2020-08-08', '15:46:49', NULL, 'rutin', 'ACHMAD ZAINUDIN', '191204019', NULL, 'PT TJB Power Services', '2020', '08'),
('KUNJ-65f2e66a105817', 'B-2370-UBE', '2020-08-08', '15:47:29', NULL, 'rutin', 'RIFHANDITA ASOKAWATI', '191224044', NULL, 'PT TJB Power Services', '2020', '08'),
('KUNJ-65f314eef3322f', 'K-9107-JA', '2020-08-10', '20:43:11', '20:44:16', 'rutin', 'KADONO', '200120009', '2020-08-10', 'PT Bravo Security Indonesia', '2020', '08'),
('KUNJ-65f40b74dde220', 'K-6827-AKC', '2020-08-22', '13:12:29', NULL, 'non_rutin', 'Andreas SA', '191225001', NULL, 'PT Zamaraya Aztrin', '2020', '08'),
('KUNJ-65f40b7bd65eba', 'B-9608-YC', '2020-08-22', '13:14:21', NULL, 'non_rutin', 'Muh. Amin', '191224064', NULL, 'PT Catur Manunggal', '2020', '08'),
('KUNJ-65f48662d2dfaa', 'K-8470-NL', '2020-08-28', '09:04:29', NULL, 'rutin', 'TIKA DEVI A', '191205004', NULL, 'PT TJB Power Services', '2020', '08'),
('KUNJ-65f48669d2e736', 'Z-2865-CW', '2020-08-28', '09:06:21', NULL, 'rutin', 'IMA KHARISMAWATI', '191203003', NULL, 'PT PLN (Persero) UIK TJB', '2020', '08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merek`
--

CREATE TABLE `tb_merek` (
  `id_merek` varchar(255) NOT NULL,
  `merek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_merek`
--

INSERT INTO `tb_merek` (`id_merek`, `merek`) VALUES
('MRK-45f1a43e8c1f18', 'Honda'),
('MRK-45f1a43eacd33d', 'Suzuki'),
('MRK-45f1a43f12c66f', 'Daihatsu'),
('MRK-45f1a4400cc887', 'Yamaha'),
('MRK-45f280e6367c4a', 'Toyota'),
('MRK-45f280e823a546', 'Mitsubishi'),
('MRK-45f280e989a3ac', 'Hino'),
('MRK-45f280eab57e66', 'Isuzu'),
('MRK-45f280eb7294ec', 'Hyundai'),
('MRK-45f280ebe259ff', 'Kawasaki'),
('MRK-45f280eccb2ba0', 'Mercedes Benz'),
('MRK-45f280ed855f6f', 'Nissan'),
('MRK-45f280eeae0f2f', 'Wuling'),
('MRK-45f280ef6504ab', 'BMW'),
('MRK-45f280eff82f6b', 'Chevrolet'),
('MRK-45f280f1b3056f', 'KIA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(10) NOT NULL,
  `no_pendaftaran` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lahir` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `no_pol` varchar(10) NOT NULL,
  `driver` varchar(255) DEFAULT NULL,
  `tgl_terdaftar` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_pengunjung`
--

INSERT INTO `tb_pengunjung` (`no_pol`, `driver`, `tgl_terdaftar`, `tgl_update`) VALUES
('K-5122-KQ', 'hermawan', '2020-07-19', '2020-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_perusahaan`
--

CREATE TABLE `tb_perusahaan` (
  `id_perusahaan` int(255) NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `deskripsi_perusahaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_perusahaan`
--

INSERT INTO `tb_perusahaan` (`id_perusahaan`, `nama_perusahaan`, `deskripsi_perusahaan`) VALUES
(1, 'PT PLN (Persero) UIK TJB', NULL),
(3, 'PT Central Jawa Power', NULL),
(5, 'PT TJB Power Services', NULL),
(9, 'PT Komipo Pembangkitan Jawa Bali', NULL),
(20, 'PT Adhiguna Putera', ''),
(87, 'PT Bahtera Adhiguna', ''),
(88, 'PT Bravo Security Indonesia', ''),
(89, 'PT Haleyora Powerindo', ''),
(90, 'PT Kalinyamat Perkasa', ''),
(91, 'PT PJB Services', ''),
(92, 'PT Mitra Karya Prima', ''),
(93, 'Bank Negara Indonesia 46', ''),
(94, 'Koperasi Pegawai Tanjung Jati B', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_user` int(10) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_user`, `username`, `password`, `level`, `nama`, `jk`, `alamat`, `lahir`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'L', 'Jepara', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam`
--

CREATE TABLE `tb_rekam` (
  `id_rekam` int(20) NOT NULL,
  `id_pasien` int(20) DEFAULT NULL,
  `id_petugas` int(20) NOT NULL,
  `scan` varchar(255) DEFAULT NULL,
  `tgl_scan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_kepemilikan`
--

CREATE TABLE `tb_status_kepemilikan` (
  `id_kepemilikan` int(2) NOT NULL,
  `status_kepemilikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_status_kepemilikan`
--

INSERT INTO `tb_status_kepemilikan` (`id_kepemilikan`, `status_kepemilikan`) VALUES
(1, 'Pribadi'),
(2, 'Operasional');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('1','2') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
('12345', 'admin', 'admin', '1'),
('codingindo', 'SUPER', 'sikemas12345', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`) USING BTREE;

--
-- Indexes for table `no_pendaftaran`
--
ALTER TABLE `no_pendaftaran`
  ADD PRIMARY KEY (`id_nomor`) USING BTREE;

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`tahun`) USING BTREE;

--
-- Indexes for table `tb_data_kendaraan`
--
ALTER TABLE `tb_data_kendaraan`
  ADD PRIMARY KEY (`id_data`) USING BTREE;

--
-- Indexes for table `tb_jenis_kendaraan`
--
ALTER TABLE `tb_jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`) USING BTREE;

--
-- Indexes for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`) USING BTREE;

--
-- Indexes for table `tb_merek`
--
ALTER TABLE `tb_merek`
  ADD PRIMARY KEY (`id_merek`) USING BTREE;

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`) USING BTREE;

--
-- Indexes for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`no_pol`) USING BTREE;

--
-- Indexes for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`) USING BTREE;

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- Indexes for table `tb_rekam`
--
ALTER TABLE `tb_rekam`
  ADD PRIMARY KEY (`id_rekam`) USING BTREE,
  ADD KEY `id_pasien` (`id_pasien`) USING BTREE,
  ADD KEY `id_petugas` (`id_petugas`) USING BTREE;

--
-- Indexes for table `tb_status_kepemilikan`
--
ALTER TABLE `tb_status_kepemilikan`
  ADD PRIMARY KEY (`id_kepemilikan`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `no_pendaftaran`
--
ALTER TABLE `no_pendaftaran`
  MODIFY `id_nomor` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_perusahaan`
--
ALTER TABLE `tb_perusahaan`
  MODIFY `id_perusahaan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rekam`
--
ALTER TABLE `tb_rekam`
  MODIFY `id_rekam` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekam`
--
ALTER TABLE `tb_rekam`
  ADD CONSTRAINT `tb_rekam_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekam_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
