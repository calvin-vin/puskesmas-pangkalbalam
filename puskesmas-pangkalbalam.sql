-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 09:01 AM
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
  `hasil_pemeriksaan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, '10220', 'Invoker Kael', 'jl Dota', 'L', '1376239843781239', '01/01/2001', 'BPJS', '082365458971');

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
(5, '10220', 'Invoker Kael', '3003', '1000000', 'BPJS', '01/01/2001', '1376239843781239', 'jl Dota', '12/04/2020', 'L');

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
  `nama_petugas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Calvin', 'calvinsan123@gmail.com', '$2y$10$YO148UE5GherPwaiF9m9cuOiuUVrX2Id1hzl1B2EZJfeGBIXvHlsW', 'default1.jpg', 1, 'Admin', 1, 1585668838, 1586717627),
(3, 'Admin', 'calvin_vinz12@yahoo.com', '$2y$10$TJ5Fl4EQBHeTxdqkcUsVJeh9dd./U67vqJsxiKtMPJf5KC/nvXACC', 'avatar-big-01.jpg', 2, 'THT', 1, 1585984361, 1586717643),
(5, 'Zero', 'zero@gmail.com', '$2y$10$KEcCc.CqiGUopH/rcDOSQu1kZTsRqit4jS/gim4OtZmXH8Ee6dOHu', 'CALVIN.jpg', 3, 'Admin', 1, 1585986616, 1586002681);

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
(3, 1, 3),
(14, 2, 2),
(16, 3, 2),
(18, 2, 4),
(19, 3, 4),
(20, 1, 5),
(22, 2, 5),
(24, 1, 7),
(25, 1, 8),
(26, 1, 6),
(29, 1, 4);

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
(6, 'Loket'),
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
(3, 'Petugas');

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
(9, 4, 'Pasien', 'puskesmas', 'fas fa-fw fa-clinic-medical', 1),
(10, 4, 'Pendaftaran', 'puskesmas/pendaftaran', 'fas fa-fw fa-notes-medical', 1),
(12, 4, 'Obat', 'puskesmas/obat', 'fas fa-fw fa-briefcase-medical', 1),
(13, 4, 'Penyakit', 'puskesmas/penyakit', 'fas fa-fw fa-heartbeat', 1),
(14, 5, 'Rekam Medis', 'dokter', 'fas fa-fw fa-file-medical', 1),
(15, 7, 'Rujukan Pasien', 'rujukan', 'fas fa-fw fa-hospital', 1),
(16, 8, 'Detail Laboratorium', 'laboratorium', 'fas fa-fw fa-flask', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pemeriksaan`
--
ALTER TABLE `detail_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rujukan`
--
ALTER TABLE `rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
