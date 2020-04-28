-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 11:08 AM
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
(6, 'Venno Armandes', 'Sutan Muharramsyah', '01', '28/04/2020', '04', 'Viyo Agusti Wicaksono', 'Shigellosis, tidak spesifik', '-', 1);

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
(6, '01', '01', 'Adam Zuyinal Adib', '28/04/2020', 'Sutan Muharramsyah', 'Infeksi Salmonella, tidak spesifik', 'Antibiotik', 'Kaki'),
(7, '02', '02', 'Emma Yuliana', '28/04/2020', 'Sutan Muharramsyah', 'Kolera, yang tidak spesifik', 'Antijamur', '-'),
(8, '03', '03', 'Mega Indasari', '28/04/2020', 'Sutan Muharramsyah', 'Demam tifoid', 'Antasida', '-');

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
(3, 'Antasida', 'Tablet', 200, '01', '28/04/2020'),
(4, 'Antibiotik', 'Tablet', 500, '02', '28/04/2020'),
(5, 'Antidepresan', 'Tablet', 20, '03', '28/04/2020'),
(6, 'Antijamur', 'Salep', 20, '04', '28/04/2020'),
(7, 'Betadine', 'Tetes', 500, '05', '28/04/2020');

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
(10, '01', 'Adam Zuyinal Adib', 'Jl Komarudin Ujung Krawang Pulogebang RT 05/05', 'L', '1997705304042238', '20/04/2000', 'BPJS', '080773052777'),
(11, '02', 'Emma Yuliana', 'Jl Teluk Betung 43', 'P', '1991706806827445', '15/09/1998', 'Non BPJS', '085055981401'),
(12, '03', 'Mega Indasari', 'Jl Binjai P Baris Km 8,5/13 C', 'P', '1975801718632836', '18/10/1999', 'Non BPJS', '085268457849'),
(13, '04', 'Viyo Agusti Wicaksono', 'Jl Suwiryo 16', 'L', '1944247467877103', '11/04/2006', 'BPJS', '087196505942'),
(14, '05', 'Rudolf Orlando', 'Psr Turi Baru Street B/72 Lt 1', 'L', '1989699483479314', '17/01/1996', 'Non BPJS', '087145248164');

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
(13, '01', 'Adam Zuyinal Adib', '01', '0', 'BPJS', '20/04/2000', '1997705304042238', 'Jl Komarudin Ujung Krawang Pulogebang RT 05/05', '28/04/2020', 'L'),
(14, '02', 'Emma Yuliana', '02', '100000', 'Non BPJS', '15/09/1998', '1991706806827445', 'Jl Teluk Betung 43', '28/04/2020', 'P'),
(15, '03', 'Mega Indasari', '03', '75000', 'Non BPJS', '18/10/1999', '1975801718632836', 'Jl Binjai P Baris Km 8,5/13 C', '28/04/2020', 'P'),
(16, '04', 'Viyo Agusti Wicaksono', '04', '0', 'BPJS', '11/04/2006', '1944247467877103', 'Jl Suwiryo 16', '28/04/2020', 'L'),
(17, '05', 'Rudolf Orlando', '05', '200000', 'Non BPJS', '17/01/1996', '1989699483479314', 'Psr Turi Baru Street B/72 Lt 1', '28/04/2020', 'L');

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
(4, 'Kolera, yang tidak spesifik', '01', 'A00.9'),
(5, 'Demam tifoid', '02', 'A01.0'),
(6, 'Demam paratifoid', '03', 'A01.1'),
(7, 'Demam paratifoid, tidak spesifik', '04', 'A01.4'),
(8, 'Infeksi Salmonella, tidak spesifik', '05', 'A02.9'),
(9, 'Shigellosis, tidak spesifik', '06', 'A03.9'),
(10, 'Infeksi bakteri usus, tidak spesifik', '07', 'A04.9'),
(11, 'Keracunan staphylococcal bawaan makanan', '08', 'A05.0'),
(12, 'Botulisme', '09', 'A05.1'),
(13, 'Keracunan makanan akibat bakteri yang tidak spesifik', '10', 'A05.9'),
(14, 'Disentri amuba akut', '11', 'A06.0'),
(15, 'Amoebiasis usus kronis', '12', 'A06.1');

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
(21, '01', '01', 'Adam Zuyinal Adib', '28/04/2020', 'Sutan Muharramsyah', 1),
(22, '02', '02', 'Emma Yuliana', '28/04/2020', 'Sutan Muharramsyah', 1),
(23, '03', '03', 'Mega Indasari', '28/04/2020', 'Sutan Muharramsyah', 1),
(24, '04', '04', 'Viyo Agusti Wicaksono', '28/04/2020', 'Sutan Muharramsyah', 1),
(25, '05', '05', 'Rudolf Orlando', '28/04/2020', 'Sutan Muharramsyah', 1);

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
(4, 'Rs Bakti Timah', '01', 'Rudolf Orlando', '28/04/2020', '05', '-', 'Keracunan staphylococcal bawaan makanan', 'M. Irpan Trikurniawan', 1);

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
(1, 'Calvin', 'calvin017@gmail.com', '$2y$10$YO148UE5GherPwaiF9m9cuOiuUVrX2Id1hzl1B2EZJfeGBIXvHlsW', 'default.png', 1, 'Admin', 1, 1585668838, 1588063342),
(6, 'Sutan Muharramsyah', 'sutan123@gmail.com', '$2y$10$Hp5epctntIEhcuYEndM9c.X75u/6JKmV8exie2kgBDNPjlqpYnVGy', 'default.png', 2, 'Mata', 1, 1586972815, 1588064413),
(7, 'David Fredy Stefano', 'davidkun11@gmail.com', '$2y$10$HkpN1gBa3ZMjIrTnzJWCUu4cqX5ADiJ./FmnjMbR3L0.Dnmsz8Gfi', 'default.png', 3, 'Pendaftaran', 1, 1586972964, 1588064061),
(8, 'M. Irpan Trikurniawan', 'mrirpan@gmail.com', '$2y$10$k3x8R3Ay7bKuhcOLWB660.GBODtLTBEupYheI8Kt9xr4xxswzS8GC', 'default.png', 4, 'Rujukan', 1, 1586973101, 1588064586),
(9, 'Venno Armandes', 'vennodesh@gmail.com', '$2y$10$0AfMlHT7gHHc5TAecklKG.JOGTnCGAHhInv9OIGh44QVpSQHADE.6', 'default.png', 5, 'USG', 1, 1586973268, 1588064517),
(10, 'Ella Kristia', 'kristiaella@gmail.com', '$2y$10$Z.fiSH2TqDkPrkdvvqp5xOx4VwrJmQI4cfF0ol.e616XblItW59MG', 'default.png', 6, 'Puskesmas', 1, 1586973333, 1588064715),
(11, 'Khailas Rakhmatullah', 'khailasrakh@gmail.com', '$2y$10$r2iVFaMB7QCEBmPn7FHLtu2qpTDjlhLyrsmqdVAIxCuZkGvAEwblu', 'default.png', 1, 'Admin', 1, 1586973439, 1586973439);

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
(33, 1, 8),
(34, 1, 9),
(37, 1, 5),
(38, 1, 7),
(40, 1, 4),
(41, 1, 6),
(43, 4, 2),
(45, 5, 8),
(46, 5, 2),
(47, 6, 4),
(48, 6, 2),
(51, 4, 7),
(52, 6, 5),
(53, 6, 6),
(54, 6, 7),
(55, 6, 8),
(56, 2, 6),
(57, 3, 5),
(58, 6, 1);

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
(5, 'Pendaftaran'),
(6, 'Dokter'),
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
(6, 'Admin Puskesmas');

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
(14, 6, 'Rekam Medis', 'dokter', 'fas fa-fw fa-stethoscope', 1),
(15, 7, 'Belum Dirujuk', 'rujukan', 'fas fa-fw fa-hospital', 1),
(16, 8, 'Belum Diperiksa', 'laboratorium', 'fas fa-fw fa-flask', 1),
(17, 5, 'Pasien', 'pendaftaran', 'fas fa-fw fa-clinic-medical', 1),
(18, 5, 'Pendaftaran', 'pendaftaran/pendaftaran', 'fas fa-fw fa-notes-medical', 1),
(19, 6, 'Data Rekam Medis', 'dokter/data_rekam', 'fas fa-fw fa-file-medical', 1),
(21, 6, 'Hasil Pemeriksaan', 'dokter/pemeriksaan', 'fas fa-fw fa-user-check', 1),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_pemeriksaan`
--
ALTER TABLE `detail_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rujukan`
--
ALTER TABLE `rujukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
