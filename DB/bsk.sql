-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2021 at 01:02 PM
-- Server version: 10.3.29-MariaDB-cll-lve
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
-- Database: `u3727568_bsk`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(100) NOT NULL,
  `id_pts` int(100) NOT NULL,
  `judul` varchar(125) NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `pts` varchar(50) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `id` int(100) NOT NULL,
  `id_pts` varchar(100) NOT NULL,
  `id_mhs` int(100) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `ip` varchar(5) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(100) NOT NULL,
  `id_pts` varchar(100) NOT NULL,
  `id_mhs` int(100) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(100) NOT NULL,
  `id_pts` int(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `pts` varchar(100) NOT NULL,
  `slug` varchar(125) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(1000) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `email`, `pesan`, `created_at`, `updated_at`) VALUES
(4, 'alfinsalim696@gmail.com', 'Beasiswa S2 dalam negri', '2020-12-17 04:54:21', '2020-12-17 04:54:21'),
(5, 'mulizaardilia@gmail.com', 'Assalamualaikum wr wb', '2020-12-17 05:34:15', '2020-12-17 05:34:15'),
(6, 'htamrin952@gmail.com', 'Daftar', '2020-12-17 06:40:18', '2020-12-17 06:40:18'),
(7, 'dandy20rizki@gmail.com', 'Bismillahirohmabirrohim\r\nAssalamualaikum\r\nSaya dandi rizki mahasiswa universitas gunung rinjani konsentrasi  hukum s1 menyatakan bahwa membutuhkan beasiswa ini untuk menunjang perkuliahan di karenakan', '2020-12-17 07:06:11', '2020-12-17 07:06:11'),
(8, 'fsuhada907@gmail.com', 'Bagus', '2020-12-17 08:41:50', '2020-12-17 08:41:50'),
(9, 'yundaopi@gmail.com', 'Akan melakukan sesuai syarat dan ketentuan yg berlaku agar tepat sasaran', '2020-12-17 21:48:50', '2020-12-17 21:48:50'),
(13, 'abiygfra@gmail.com', 'bisakah di link kan di icon facebook, instagram dll (medsos)', '2021-01-03 20:45:46', '2021-01-03 20:45:46'),
(14, 'dandy20rizki@gmail.com', 'Bismillahirohmanirrohim\r\nAssalamualaikum\r\nSemoga Allah meridhoi sy untuk mendapatkan beasiswa ini dan mudah mudahan Allah memberikan taufiq dan hidayah kepada kita sebagai penerus estapet amanah bangsa dan negara wabilhusus untuk orang-orang Tua kita yang sekarang mengabdikan diri dalam kepemerintahan dalam memfasilitasi pendidikan untuk tunas bangsa\r\nSemoga beasiswa ini bermanfaat untuk kami yang membutuhkan dan kemudian hari dapat mengaplikasikan ilmu yang kami ikhtiarkan dan inshaAllah semata mata berkhitmat untuk masyarakat masyarakat \r\nSy dandi rizki mahasiswa universitas gunung rinjani sangat mendukung NTB gemilang ini.\r\nWassalam', '2021-01-04 01:34:08', '2021-01-04 01:34:08'),
(15, 'dandy20rizki@gmail.com', 'Bismillahirohmanirrohim\r\nAssalamualaikum\r\nSemoga Allah meridhoi sy untuk mendapatkan beasiswa ini dan mudah mudahan Allah memberikan taufiq dan hidayah kepada kita sebagai penerus estapet amanah bangsa dan negara wabilhusus untuk orang-orang Tua kita yang sekarang mengabdikan diri dalam kepemerintahan dalam memfasilitasi pendidikan untuk tunas bangsa\r\nSemoga beasiswa ini bermanfaat untuk kami yang membutuhkan dan kemudian hari dapat mengaplikasikan ilmu yang kami ikhtiarkan dan inshaAllah semata mata berkhitmat untuk masyarakat masyarakat \r\nSy dandi rizki mahasiswa universitas gunung rinjani sangat mendukung NTB gemilang ini.\r\nWassalam', '2021-01-05 21:56:39', '2021-01-05 21:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(100) NOT NULL,
  `id_pts` varchar(100) NOT NULL,
  `id_mhs` int(100) NOT NULL,
  `nama_p` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pts`
--

CREATE TABLE `pts` (
  `id` int(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `link` varchar(100) NOT NULL,
  `level` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pts`
--

INSERT INTO `pts` (`id`, `username`, `password`, `nama`, `slug`, `jenis`, `deskripsi`, `alamat`, `foto`, `link`, `level`, `created_at`, `updated_at`) VALUES
(3, 'dariadmin', '$2y$10$2Tq553AiQhRjPPGkXwNfY.Kk/mrPK/j7ZJzL/M/92WU2uic3GDfVW', 'I Gede Bagus Wirawan', 'i-gede-bagus-wirawan', '', '', '', '', '', 'admin', '2021-03-03 01:22:09', '2021-03-03 01:38:20'),
(72, 'ummat', '$2y$10$OR6ob5swFjpeZdHR4mf0t.Tcwq9Yix9aTnVcOvb//rYp6r7/avK.q', 'Universitas Muhamadiyah Mataram', 'universitas-muhamadiyah-mataram', '', '', '', '', '', 'pts', '2021-03-01 23:14:25', '2021-03-02 22:36:48'),
(73, 'unu', '$2y$10$7mBTbUijuNynheLvZqO.NuKBaPbRUW0N6RAWQl7Y1ntxk5Wj37OfW', 'Universitas Nahdlatul Ulama', 'universitas-nahdlatul-ulama', '', '', '', '', '', 'pts', '2021-03-01 23:14:52', '2021-03-03 01:16:25'),
(74, 'cordova', '$2y$10$mEIJgqV9T.na9PhaezCFQOlxIFctBxQXAj1/5OPKja8KDfLVE45Dm', 'Universitas Cordova', 'universitas-cordova', '', '', '', '', '', 'pts', '2021-03-01 23:15:12', '2021-03-03 01:17:07'),
(75, 'samawa', '$2y$10$Az5/WAtK.B2m0UeeBPgIoOYJF0brnIUFQ40z9f8B1hmhol.X6QMbe', 'Universitas Samawa', 'universitas-samawa', '', '', '', '', '', 'pts', '2021-03-01 23:15:43', '2021-03-03 01:17:48'),
(76, 'uts', '$2y$10$3/kAOGJUIIjOI/PNIIxPv.DmpasLdqmql26laKb46N08rqUtFqmHS', 'Universitas Teknologi Sumbawa', 'universitas-teknologi-sumbawa', '', '', '', '', '', 'pts', '2021-03-01 23:16:09', '2021-03-03 01:18:34'),
(77, 'hamzanwadi', '$2y$10$44ce9olUjGR5j98vi/sB.uk8hVFDufrGAMeqdwp3vzNdUhLD2W0KK', 'Universitas Hamzanwadi', 'universitas-hamzanwadi', '', '', '', '', '', 'pts', '2021-03-01 23:16:43', '2021-03-03 01:19:08'),
(78, 'sunan', '$2y$10$9o9v1o/hU1Bg8TApdU1DWOFFKXweXs0ILoQ09mQnIP1i.jZk97Ile', 'Institut Studi Islam Sunan Doe', 'institut-studi-islam-sunan-doe', '', '', '', '', '', 'pts', '2021-03-01 23:17:24', '2021-03-03 01:19:33'),
(79, 'iqh', '$2y$10$Nhff05Jo9.D6K39xxlihBul2KvtKdP0PLhN42sdCNsX/zErKXg14W', 'Institut Qamarul Huda', 'institut-qamarul-huda', '', '', '', '', '', 'pts', '2021-03-01 23:17:56', '2021-03-03 01:20:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pts`
--
ALTER TABLE `pts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `khs`
--
ALTER TABLE `khs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pts`
--
ALTER TABLE `pts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
