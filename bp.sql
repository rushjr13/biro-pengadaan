-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 03:36 AM
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
-- Database: `bp`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_menu`
--

INSERT INTO `akses_menu` (`id`, `id_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `panggil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `tgl_antrian`, `no_antrian`, `panggil`) VALUES
(5, '2019-05-20', 39, 1),
(6, '2019-05-23', 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`) VALUES
(1, 'Admin'),
(2, 'Pengguna'),
(3, 'Menu'),
(4, 'LPSE'),
(5, 'Administrasi');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `gaji_harian` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `jenjang`, `gaji_harian`) VALUES
(1, 'SMA/SMK', 100000),
(2, 'Diploma (1-3)', 105000),
(3, 'D4/S1', 110000);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` varchar(4) NOT NULL,
  `nama_web` varchar(255) NOT NULL,
  `alias` varchar(3) NOT NULL,
  `url` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jam_kerja` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_web`, `alias`, `url`, `alamat`, `telpon`, `email`, `jam_kerja`, `facebook`, `instagram`, `twitter`, `logo`, `icon`) VALUES
('atur', 'Kebijakan Strategi & Informasi', 'KSI', 'http://localhost/ksi/', 'Biro Pengadaan Setda Provinsi Gorontalo<br>Jl. Sapta Marga Kel. Botu Kec. Dumbo Raya Kota Gorontalo 96118', '(0435) 821277  - 828281', 'ksi.bp_provgtlo@gmail.com', 'Senin - Jumat | 08.00 - 16.30 WITA', 'ksi_bp', 'ksi_bp', 'ksi_bp', 'logo.png\r\n\r\n\r\n\r\n', 'icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` varchar(25) NOT NULL,
  `tgl_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `email`, `jk`, `id_level`, `status`, `foto`, `tgl_daftar`) VALUES
(1, 'admin', '123456', 'Administrator', 'admin@email.com', 'Perempuan', 1, 1, 'userl3.jpg', 1557463646),
(2, 'rushjr', 'samuel93', 'Ruslan Samuel', 'ruslansamuel11@gmailcom', 'Laki-laki', 1, 1, '', 1557463657),
(4, 'mumut', 'mutiara', 'Mutiara', 'mutiara@gmail.com', 'Perempuan', 2, 1, '', 1558061455),
(6, 'tes', '123456', 'tes', 'tes@email.com', 'Perempuan', 2, 1, '', 1558061785),
(7, 'tes2', '123456', 'tes 2', 'tes2@email.com', 'Laki-laki', 2, 1, '', 1558061889);

-- --------------------------------------------------------

--
-- Table structure for table `pns`
--

CREATE TABLE `pns` (
  `id_pns` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `ruang` varchar(1) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ptt`
--

CREATE TABLE `ptt` (
  `id_ptt` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ptt`
--

INSERT INTO `ptt` (`id_ptt`, `nik`, `nama_lengkap`, `jabatan`, `id_pendidikan`, `agama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `foto`) VALUES
(2, '7503031312930003', 'Ruslan Dara Samuel', 'PTT/Honorer', 1, 'Islam', 'Gorontalo', '1993-12-13', 'Jl. Perintis Desa Boludawa Kec. Suwawa Kab. Bone Bolango', 'userl1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `url`, `icon`, `status`) VALUES
(1, 1, 'Pengaturan', 'admin/pengaturan', 'fa-cogs', 1),
(2, 2, 'Profil Saya', 'pengguna/profil', 'fa-user', 1),
(3, 3, 'Menu Manajemen', 'menu', 'fa-list', 1),
(4, 3, 'Sub Menu', 'menu/submenu', 'fa-list', 1),
(5, 2, 'Ubah Profil', 'pengguna/ubahprofil', 'fa-user-edit', 1),
(6, 2, 'Ganti Kata Sandi', 'pengguna/gantikatasandi', 'fa-user-lock', 1),
(7, 1, 'Pengguna', 'admin/pengguna', 'fa-users', 1),
(8, 4, 'Antrian', 'lpse/antrian', 'fa-sort-numeric-down', 1),
(9, 4, 'Panggil Antrian', 'lpse/panggil', 'fa-map-marker-alt', 1),
(10, 5, 'Administrasi', 'administrasi/peljasa', 'fa-chart-bar', 1),
(11, 5, 'Sarana & Prasarana', 'administrasi/sarpras', 'fa-shopping-cart', 1),
(12, 5, 'SDM Aparatur', 'administrasi/sdm', 'fa-user-tie', 1),
(13, 5, 'Monitoring & Evaluasi', 'administrasi/monev', 'fa-chart-bar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tarsasi`
--

CREATE TABLE `tarsasi` (
  `id_tarsasi` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tf` float NOT NULL,
  `rf` float NOT NULL,
  `tk` float NOT NULL,
  `rk` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarsasi`
--

INSERT INTO `tarsasi` (`id_tarsasi`, `bulan`, `tf`, `rf`, `tk`, `rk`) VALUES
(1, 'Januari', 2.31, 22.91, 0.18, 19.43),
(2, 'Februari', 15.18, 57.23, 6.13, 53.3),
(3, 'Maret', 26.11, 64.15, 17.3, 58.9),
(4, 'April', 35.42, 75, 23.34, 69.98),
(5, 'Mei', 45.67, 75.61, 30.63, 70.66),
(6, 'Juni', 65.37, 0, 41.29, 0),
(7, 'Juli', 76.65, 0, 59.06, 0),
(8, 'Agustus', 87.07, 0, 70.99, 0),
(9, 'September', 91.12, 0, 81.52, 0),
(10, 'Oktober', 95.39, 0, 85.75, 0),
(11, 'November', 98.15, 0, 92.61, 0),
(12, 'Desember', 100, 0, 100, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pns`
--
ALTER TABLE `pns`
  ADD PRIMARY KEY (`id_pns`);

--
-- Indexes for table `ptt`
--
ALTER TABLE `ptt`
  ADD PRIMARY KEY (`id_ptt`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `tarsasi`
--
ALTER TABLE `tarsasi`
  ADD PRIMARY KEY (`id_tarsasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pns`
--
ALTER TABLE `pns`
  MODIFY `id_pns` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ptt`
--
ALTER TABLE `ptt`
  MODIFY `id_ptt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tarsasi`
--
ALTER TABLE `tarsasi`
  MODIFY `id_tarsasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
