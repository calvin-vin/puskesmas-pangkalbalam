-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 08:40 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas-pangkalbalam`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_laboratorium`
--

CREATE TABLE `detail_laboratorium` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL,
  `dokter_pengirim` varchar(128) NOT NULL,
  `nomor_laboratorium` varchar(128) NOT NULL,
  `tanggal_pemeriksaan` varchar(128) NOT NULL,
  `nomor_rekam_medis` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `hasil_pemeriksaan` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_laboratorium`
--

INSERT INTO `detail_laboratorium` (`id`, `nama_petugas`, `dokter_pengirim`, `nomor_laboratorium`, `tanggal_pemeriksaan`, `nomor_rekam_medis`, `nama_pasien`, `hasil_pemeriksaan`, `keterangan`, `status`) VALUES
(3, '', 'Calvin', '', '', '101', 'Invoker Kael', '', '', 0),
(4, 'Venno Armandes', 'Sutan Muharramsyah', '001', '15/04/2020', '002', 'Andika Adnan Husaini', 'COVID-19', 'batuk, demam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemeriksaan`
--

CREATE TABLE `detail_pemeriksaan` (
  `id` int(11) NOT NULL,
  `nomor_pemeriksaan` varchar(128) NOT NULL,
  `nomor_rekam_medis` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `tanggal_berobat` varchar(128) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `nama_penyakit` varchar(128) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemeriksaan`
--

INSERT INTO `detail_pemeriksaan` (`id`, `nomor_pemeriksaan`, `nomor_rekam_medis`, `nama_pasien`, `tanggal_berobat`, `nama_dokter`, `nama_penyakit`, `nama_obat`, `keterangan`) VALUES
(1, '303', '222', 'Zilong', '13/04/2020', 'Calvin', 'Flu Babi', 'hexagrip', 'adkde'),
(2, '123', '222', 'Zilong', '13/04/2020', 'Calvin', 'COVID-19', 'hexagrip', 'dkded'),
(4, '112', '123', 'Invoker Kael', '14/04/2020', 'Calvin', 'Flu Babi', 'hexagrip', 'ade'),
(5, '003', '003', 'Angga Puryanto', '15/04/2020', 'Sutan Muharramsyah', 'Flu Babi', 'hexagrip', 'gatal-gatal, timbul bercak merah di muka');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis` varchar(128) NOT NULL,
  `stok` int(5) NOT NULL,
  `nomor_obat` varchar(128) NOT NULL,
  `tanggal_masuk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`, `jenis`, `stok`, `nomor_obat`, `tanggal_masuk`) VALUES
(1, 'hexagrip', 'generik', 16, '112', '10/12/2019');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nomor_pasien` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `tanggal_lahir` varchar(128) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `hp` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nomor_pasien`, `nama`, `alamat`, `jenis_kelamin`, `nik`, `tanggal_lahir`, `kategori`, `hp`) VALUES
(3, '10219', 'Layla', 'Jl. Kenanga no 92 kecamatan selindung', 'P', '2367129732124723', '19/10/1994', 'BPJS', '081287429712'),
(4, '10220', 'Invoker Kael', 'jl Dota', 'L', '1376239843781239', '01/01/2001', 'BPJS', '082365458971'),
(5, '0851', 'selena', 'jl. lele', 'P', '6545769812557733', '06/07/1999', 'Non BPJS', '083275937512'),
(6, '001', 'Adam Zuyinal Adib', 'Jl. Kampung asem no 32 kecamatan gerunggang', 'L', '1982763400998821', '15/09/1999', 'Non BPJS', '082165840012'),
(7, '002', 'Andika Adnan Husaini', 'Jl. Balai no 21 kelurahan gedung nasional kecamatan taman sari pangkalpinang', 'L', '1987321245128877', '21/12/2000', 'BPJS', '084367888812'),
(8, '003', 'Angga Puryanto', 'Jl. Pasir putih kecamatan bukit intan pangkalpinang', 'L', '1923456555672112', '22/01/1999', 'BPJS', '081266448972'),
(9, '004', 'Delba Vika Aniya', 'Jl balai', 'P', '1920247685564711', '21/09/1999', 'BPJS', '082355777123');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `nomor_pasien` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nomor_pendaftaran` varchar(128) NOT NULL,
  `biaya` varchar(128) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `tanggal_lahir` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `tanggal_berobat` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nomor_pasien`, `nama`, `nomor_pendaftaran`, `biaya`, `kategori`, `tanggal_lahir`, `nik`, `alamat`, `tanggal_berobat`, `jenis_kelamin`) VALUES
(1, '10218', 'Zilong', '3001', '70000', 'BPJS', '15/04/2004', '123456789', 'jl balmond 7', '14/04/2020', 'L'),
(4, '10220', 'Invoker Kael', '3002', '1000', 'BPJS', '01/01/2001', '1376239843781239', 'jl Dota', '11/04/2020', 'L'),
(5, '10220', 'Invoker Kael', '3003', '1000000', 'BPJS', '01/01/2001', '1376239843781239', 'jl Dota', '12/04/2020', 'L'),
(6, '10219', 'Layla', '3004', '1000000', 'BPJS', '19/10/1994', '2367129732124723', 'Jl. Kenanga no 92 kecamatan selindung', '23/04/2020', 'P'),
(7, '0851', 'selena', '228', '50000', 'Non BPJS', '06/07/1999', '6545769812557733', 'jl. lele', '15/04/2020', 'P'),
(8, '0851', 'selena', '765', '210000', 'Non BPJS', '06/07/1999', '6545769812557733', 'jl. lele', '14/05/2020', 'P'),
(9, '001', 'Adam Zuyinal Adib', '001', '150000', 'Non BPJS', '15/09/1999', '1982763400998821', 'Jl. Kampung asem no 32 kecamatan gerunggang', '16/04/2020', 'L'),
(10, '002', 'Andika Adnan Husaini', '002', '0', 'BPJS', '21/12/2000', '1987321245128877', 'Jl. Balai no 21 kelurahan gedung nasional kecamatan taman sari pangkalpinang', '16/04/2020', 'L'),
(11, '003', 'Angga Puryanto', '003', '0', 'BPJS', '22/01/1999', '1923456555672112', 'Jl. Pasir putih kecamatan bukit intan pangkalpinang', '16/04/2020', 'L'),
(12, '004', 'Delba Vika Aniya', '004', '0', 'BPJS', '21/09/1999', '1920247685564711', 'Jl balai', '16/04/2020', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nomor_penyakit` varchar(128) NOT NULL,
  `kode` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `nama`, `nomor_penyakit`, `kode`) VALUES
(2, 'COVID-19', '12388', 'KIH8374'),
(3, 'Flu Babi', '6751', 'H5N1');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id` int(11) NOT NULL,
  `nomor_rekam_medis` varchar(128) NOT NULL,
  `nomor_pendaftaran` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `tanggal_berobat` varchar(128) NOT NULL,
  `nama_dokter` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id`, `nomor_rekam_medis`, `nomor_pendaftaran`, `nama_pasien`, `tanggal_berobat`, `nama_dokter`, `status`) VALUES
(2, '222', '3001', 'Zilong', '13/04/2020', 'Calvin', 1),
(3, '987', '3001', 'Zilong', '14/04/2020', 'Calvin', 1),
(4, '123', '3002', 'Invoker Kael', '14/04/2020', 'Calvin', 1),
(5, '544', '3004', 'Layla', '14/04/2020', 'Calvin', 1),
(6, '333', '3004', 'Layla', '15/04/2020', 'Calvin', 1),
(7, '111', '3002', 'Invoker Kael', '15/04/2020', 'Calvin', 1),
(8, '115', '228', 'selena', '15/04/2020', 'Calvin', 1),
(9, '1002', '3002', 'Invoker Kael', '15/04/2020', 'Calvin', 0),
(10, '101', '3002', 'Invoker Kael', '15/04/2020', 'Calvin', 1),
(11, '1123', '3002', 'Invoker Kael', '15/04/2020', 'Calvin', 0),
(12, '10023', '765', 'selena', '15/04/2020', 'Calvin', 0),
(16, '001', '001', 'Adam Zuyinal Adib', '15/04/2020', 'Sutan Muharramsyah', 1),
(17, '002', '002', 'Andika Adnan Husaini', '15/04/2020', 'Sutan Muharramsyah', 1),
(18, '003', '003', 'Angga Puryanto', '15/04/2020', 'Sutan Muharramsyah', 1),
(19, '004', '004', 'Delba Vika Aniya', '16/04/2020', 'Calvin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rujukan`
--

CREATE TABLE `rujukan` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `nomor_rujukan` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `tanggal_berobat` varchar(128) NOT NULL,
  `nomor_rekam_medis` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `nama_penyakit` varchar(128) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rujukan`
--

INSERT INTO `rujukan` (`id`, `tujuan`, `nomor_rujukan`, `nama_pasien`, `tanggal_berobat`, `nomor_rekam_medis`, `keterangan`, `nama_penyakit`, `nama_petugas`, `status`) VALUES
(1, 'rs benteng', '112', 'Layla', '14/04/2020', '544', 'dakde', 'COVID-19', 'Calvin', 1),
(2, 'rs sungailiat', '001', 'Adam Zuyinal Adib', '15/04/2020', '001', 'batuk, demam', 'COVID-19', 'M. Irpan Trikurniawan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(2) NOT NULL,
  `section` varchar(128) DEFAULT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `role_id`, `section`, `is_active`, `date_created`, `last_login`) VALUES
(1, 'Calvin', 'calvinsan123@gmail.com', '$2y$10$YO148UE5GherPwaiF9m9cuOiuUVrX2Id1hzl1B2EZJfeGBIXvHlsW', '3x4.jpg', 1, 'Admin', 1, 1585668838, 1586975903),
(6, 'Sutan Muharramsyah', 'sutan123@gmail.com', '$2y$10$Hp5epctntIEhcuYEndM9c.X75u/6JKmV8exie2kgBDNPjlqpYnVGy', 'default.jpg', 2, 'Mata', 1, 1586972815, 1586974386),
(7, 'David Fredy Stefano', 'davidkun11@gmail.com', '$2y$10$HkpN1gBa3ZMjIrTnzJWCUu4cqX5ADiJ./FmnjMbR3L0.Dnmsz8Gfi', 'default.jpg', 3, 'Pendaftaran', 1, 1586972964, 1586974205),
(8, 'M. Irpan Trikurniawan', 'mrirpan@gmail.com', '$2y$10$k3x8R3Ay7bKuhcOLWB660.GBODtLTBEupYheI8Kt9xr4xxswzS8GC', 'default.jpg', 4, 'Rujukan', 1, 1586973101, 1586974915),
(9, 'Venno Armandes', 'vennodesh@gmail.com', '$2y$10$0AfMlHT7gHHc5TAecklKG.JOGTnCGAHhInv9OIGh44QVpSQHADE.6', 'default.jpg', 5, 'USG', 1, 1586973268, 1586974872),
(10, 'Ella Kristia', 'kristiaella@gmail.com', '$2y$10$Z.fiSH2TqDkPrkdvvqp5xOx4VwrJmQI4cfF0ol.e616XblItW59MG', 'default.jpg', 6, 'Puskesmas', 1, 1586973333, 1586973333),
(11, 'Khailas Rakhmatullah', 'khailasrakh@gmail.com', '$2y$10$r2iVFaMB7QCEBmPn7FHLtu2qpTDjlhLyrsmqdVAIxCuZkGvAEwblu', 'default.jpg', 1, 'Admin', 1, 1586973439, 1586973439);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(14, 2, 2),
(16, 3, 2),
(22, 2, 5),
(33, 1, 8),
(34, 1, 9),
(37, 1, 5),
(38, 1, 7),
(40, 1, 4),
(41, 1, 6),
(42, 3, 6),
(43, 4, 2),
(45, 5, 8),
(46, 5, 2),
(47, 6, 4),
(48, 6, 2),
(49, 1, 3),
(50, 1, 2),
(51, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Puskesmas'),
(5, 'Dokter'),
(6, 'Pendaftaran'),
(7, 'Rujukan'),
(8, 'Laboratorium');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Dokter'),
(3, 'Petugas Pendaftaran'),
(4, 'Petugas Rujukan'),
(5, 'Petugas Laboratorium'),
(6, 'Petugas Puskesmas');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Manajemen Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Manajemen Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Ubah Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(8, 1, 'Manajemen Pengguna', 'admin/user', 'fas fa-fw fa-users', 1),
(12, 4, 'Obat', 'puskesmas/', 'fas fa-fw fa-briefcase-medical', 1),
(13, 4, 'Penyakit', 'puskesmas/penyakit', 'fas fa-fw fa-heartbeat', 1),
(14, 5, 'Rekam Medis', 'dokter', 'fas fa-fw fa-stethoscope', 1),
(15, 7, 'Belum Dirujuk', 'rujukan', 'fas fa-fw fa-hospital', 1),
(16, 8, 'Belum Diperiksa', 'laboratorium', 'fas fa-fw fa-flask', 1),
(17, 6, 'Pasien', 'pendaftaran', 'fas fa-fw fa-clinic-medical', 1),
(18, 6, 'Pendaftaran', 'pendaftaran/pendaftaran', 'fas fa-fw fa-notes-medical', 1),
(19, 5, 'Data Rekam Medis', 'dokter/data_rekam', 'fas fa-fw fa-file-medical', 1),
(21, 5, 'Hasil Pemeriksaan', 'dokter/pemeriksaan', 'fas fa-fw fa-user-check', 1),
(22, 7, 'Telah Dirujuk', 'rujukan/telah_dirujuk', 'fas fa-fw fa-check', 1),
(23, 8, 'Telah Diperiksa', 'laboratorium/telah_diperiksa', 'fas fa-fw fa-check', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_laboratorium`
--
ALTER TABLE `detail_laboratorium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pemeriksaan`
--
ALTER TABLE `detail_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rujukan`
--
ALTER TABLE `rujukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_laboratorium`
--
ALTER TABLE `detail_laboratorium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_pemeriksaan`
--
ALTER TABLE `detail_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rujukan`
--
ALTER TABLE `rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
