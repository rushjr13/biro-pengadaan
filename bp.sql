-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Agu 2019 pada 07.58
-- Versi Server: 10.1.28-MariaDB
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
-- Struktur dari tabel `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses_menu`
--

INSERT INTO `akses_menu` (`id`, `id_level`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `panggil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `tgl_antrian`, `no_antrian`, `panggil`) VALUES
(5, '2019-05-20', 39, 1),
(6, '2019-05-23', 12, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kds`
--

CREATE TABLE `kds` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isi_ks` text NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` enum('Pending','Respon') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kds`
--

INSERT INTO `kds` (`id`, `nama`, `telpon`, `email`, `isi_ks`, `tanggal`, `status`) VALUES
(1, 'Ruslan Samuel', '08514533166', 'ruslansamuelgorontalo@gmail.com', 'tampilan web harus di perbarui lagi', 1565161694, 'Pending'),
(2, 'Abdulrizal M. Pauweni, S.SI', '085145123456', 'abdulrizalpauweni@rocketmail.com', 'selalu error, perbaiki jaringan server', 1565580168, 'Pending'),
(3, 'Ms. Antonette Quigley', '085145123523', 'anrizsi10@gmail.com', 'asad', 1565581195, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `kategori` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `isi`, `file`, `kategori`) VALUES
(1, 'Pelayanan e-Katalog', '<p><span style=\"font-size:20px\"><strong>PROSES PENYAMPAIAN LAYANAN <em>(Service Delivery)</em></strong></span></p>\r\n\r\n<table class=\"table table-bordered\" style=\"width:100%\">\r\n	<thead>\r\n		<tr>\r\n			<th style=\"text-align:center\">NO</th>\r\n			<th style=\"text-align:center\">KOMPONEN</th>\r\n			<th style=\"text-align:center\">URAIAN</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>1.</td>\r\n			<td>Persyaratan Pelayanan</td>\r\n			<td>\r\n			<ul>\r\n				<li>Para pihak yang terkait Pengadaan Barang/Jasa di K/L/D/I dapat langsung mengakses E-Katalog.</li>\r\n				<li>Penyedia Barang/Jasa memenuhi seluruh persyaratan sesuai Standar Dokumen Pengadaan Katalog Elektronik Pengadaan Barang/Jasa Pemerintah yang diselenggarakan oleh LKPP.</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2.</td>\r\n			<td>Sistem, mekanisme, dan prosedur</td>\r\n			<td>\r\n			<ul>\r\n				<li>Pihak Pengadaan Barang/Jasa K/L/D/I mengusulkan penayangan produk pada E-Katalog\r\n				<ol>\r\n					<li>Kepala Daerah atau Pejabat Yang Ditunjuk/Pimpinan Lembaga menyampaikan surat permohonan usulan produk penayangan Barang/jasa pada E-Katalog disertai dengan spesifikasi dan kebutuhan</li>\r\n					<li>Melakukan riset pasar dengan Tim Pengembangan Katalog Elektronik LKPP</li>\r\n					<li>Menerima jawaban atau konfirmasi terkait dengan usulan produk katalog</li>\r\n				</ol>\r\n				</li>\r\n				<li>Pihak Penyedia Barang/Jasa:\r\n				<ol>\r\n					<li>Pengusulan produk\r\n					<ul>\r\n						<li>Penyedia menyampaikan usulan produk.</li>\r\n						<li>Penyedia mengikuti kegiatan diskusi dan riset pasar.</li>\r\n						<li>Menerima surat jawaban atau konfirmasi terkait dengan usulan produk katalog.</li>\r\n					</ul>\r\n					</li>\r\n					<li>Pendaftaran penyedia di E-Katalog\r\n					<ul>\r\n						<li>Pendaftaran penyedia di E-Katalog melalui lelang:\r\n						<ol>\r\n							<li>Mengikuti proses pemilihan penyedia yang dilaksanakan oleh Pokja.</li>\r\n							<li>Telah ditetapkan menjadi pemenang lelang.</li>\r\n						</ol>\r\n						</li>\r\n						<li>Pendaftaran penyedia di E-Katalog melalui negosiasi:\r\n						<ol>\r\n							<li>Mengajukan penawaran sebagai penyedia pada E-Katalog.</li>\r\n							<li>Lulus Evaluasi.</li>\r\n							<li>Telah ditetapkan dan berkontrak sebagai penyedia E-Katalog.</li>\r\n						</ol>\r\n						</li>\r\n					</ul>\r\n					</li>\r\n					<li>Pengusulan penayangan produk\r\n					<ul>\r\n						<li>Pengusulan penayangan produk yang belum tayang di katalog:\r\n						<ol>\r\n							<li>Telah terdaftar sebagai penyedia E-Katalog.</li>\r\n							<li>Menyampaikan dokumen administrasi, teknis dan harga.</li>\r\n							<li>Melakukan negosiasi harga produk dengan Pokja.</li>\r\n							<li>Terjadi kesepakatan teknis dan harga.</li>\r\n							<li>Telah diterbitkan Surat Penetapan Penyedia Katalog Elektronik.</li>\r\n							<li>Melakukan perikatan.</li>\r\n							<li>Memasukkan data teknis dan harga dalam sistem E-Katalog.</li>\r\n							<li>Mendapatkan persetujuan penayangan data teknis dan harga.</li>\r\n						</ol>\r\n						</li>\r\n						<li>Pengusulan penambahan produk yang sudah tayang di katalog:\r\n						<ol>\r\n							<li>Menyampaikan perubahan dokumen teknis dan harga.</li>\r\n							<li>Melakukan negosiasi harga produk dengan Pokja.</li>\r\n							<li>Terjadi kesepakatan teknis dan harga.</li>\r\n							<li>Telah diterbitkan Surat Penetapan Penyedia Katalog Elektronik.</li>\r\n							<li>Melakukan perikatan.</li>\r\n							<li>Memasukkan data teknis dan harga dalam sistem E-Katalog.</li>\r\n							<li>Mendapatkan persetujuan penayangan data teknis dan harga.</li>\r\n						</ol>\r\n						</li>\r\n					</ul>\r\n					</li>\r\n					<li>Pengusulan perubahan spesifikasi dan harga produk\r\n					<ul>\r\n						<li>Memasukkan data teknis dan harga dalam sistem E-Katalog.</li>\r\n						<li>Melakukan negosiasi data teknis dan harga dalam sistem E-Katalog.</li>\r\n						<li>Mendapatkan persetujuan penayangan perubahan spesifikasi dan harga produk.</li>\r\n					</ul>\r\n					</li>\r\n					<li>Penurunan penayangan produk\r\n					<ul>\r\n						<li>Mengajukan permohonan penurunan penayangan produk.</li>\r\n						<li>Mendapatkan persetujuan penurunan penayangan produk.</li>\r\n					</ul>\r\n					</li>\r\n				</ol>\r\n				</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'ekatalog.pdf', '1'),
(2, 'Pelayanan e-Purchasing', '', 'epurchasing.pdf', '1'),
(3, 'Pelayanan Konsultasi Tatap Muka Mengenai Rencana Umum Pengadaan, Monitoring dan Evaluasi PBJP, dan Penanyangan Daftar Hitam', '', 'konsultasi tatap muka.pdf', '1'),
(4, 'Pelayanan Permohonan Sosialisasi/Bimbingan Teknis/Pelatihan Mengenai Rencana Umum Pengadaan dan Monitoring Evaluasi PBJP', '', 'permohonan sosialisasi bimtek.pdf', '1'),
(5, 'Pelayanan Ujian Sertifikasi Keahlian Tingkat Dasar Pengadaan Barang/Jasa Pemerintah', '', 'ujian sertifikasi.pdf', '1'),
(6, 'Pelayanan Ujian Keahlian Pengadaan Barang/Jasa Berbasis Kompetensi', '', 'ujian keahlian pbj.pdf', '1'),
(7, 'Pelayanan Penafsiran Perundang-undangan Tentang Pengadaan Barang/Jasa', '', 'penafsiran perundangundangan.pdf', '1'),
(8, 'Pelayanan Advokasi dan Permasalahan Kontrak', '', 'advokasi dan permasalahan kontrak.pdf', '1'),
(9, 'Pelayanan Pemberian Keterangan Ahli', '', 'pemberian keterangan ahli.pdf', '1'),
(10, 'Pelayanan Dukungan Pengguna SPSE', '', 'dukungan pengguna spse.pdf', '1'),
(11, 'Formulir Pengaduan Layanan Publik', '', 'pengaduan layanan publik.pdf', '2'),
(12, 'Formulir Saran dan Kritik Pelayanan Publik', '', 'kritik dan saran.pdf', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`) VALUES
(1, 'Admin'),
(2, 'Pengguna'),
(3, 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_landing`
--

CREATE TABLE `menu_landing` (
  `id_ml` int(11) NOT NULL,
  `nama_ml` varchar(255) NOT NULL,
  `url_ml` varchar(255) NOT NULL,
  `status_ml` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_landing`
--

INSERT INTO `menu_landing` (`id_ml`, `nama_ml`, `url_ml`, `status_ml`) VALUES
(1, 'Profil', 'profil', 1),
(2, 'Layanan', 'layanan', 1),
(3, 'Galeri', 'galeri', 1),
(4, 'Hubungi Kami', 'kontak', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `jenjang` varchar(255) NOT NULL,
  `gaji_harian` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `jenjang`, `gaji_harian`) VALUES
(1, 'SMA/SMK', 100000),
(2, 'Diploma (1-3)', 105000),
(3, 'D4/S1', 110000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `isi_aduan` text NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` enum('Pending','Proses','Selesai','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama`, `telpon`, `email`, `id_layanan`, `isi_aduan`, `tanggal`, `status`) VALUES
(1, 'Ruslan Samuel', '08514533166', 'ruslansamuelgorontalo@gmail.com', 6, 'ekatalog tidak bisa diakses', 1565161694, 'Pending'),
(2, 'Abdulrizal M. Pauweni, S.SI', '085145123456', 'abdulrizalpauweni@rocketmail.com', 2, 'tampilan epurchasing error', 1565580168, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
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
  `icon` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_web`, `alias`, `url`, `alamat`, `telpon`, `email`, `jam_kerja`, `facebook`, `instagram`, `twitter`, `logo`, `icon`, `map`, `info`) VALUES
('atur', 'Biro Pengadaan', 'BP', 'http://localhost/bp/', 'Biro Pengadaan Setda Provinsi Gorontalo<br>Jl. Sapta Marga Kel. Botu Kec. Dumbo Raya Kota Gorontalo 96118', '(0435) 821277  - 828281', 'bp_provgtlo@gmail.com', 'Senin - Jumat | 08.00 - 16.30 WITA', 'bp_provgtlo', 'bp_provgtlo', 'bp_provgtlo', 'logo.png', 'icon2.png', 'https://maps.google.com/maps?q=kantor%20gubernur%20gorontalo&t=&z=15&ie=UTF8&iwloc=&output=embed', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
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
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `email`, `jk`, `id_level`, `status`, `foto`, `tgl_daftar`) VALUES
(1, 'admin', '123456', 'Administrator', 'admin@email.com', 'Perempuan', 1, 1, '', 1557463646),
(2, 'rushjr', 'samuel93', 'Ruslan Samuel', 'ruslansamuel11@gmailcom', 'Laki-laki', 1, 1, '', 1557463657),
(4, 'mumut', 'mutiara', 'Mutiara', 'mutiara@gmail.com', 'Perempuan', 2, 1, '', 1558061455),
(6, 'tes', '123456', 'tes', 'tes@email.com', 'Perempuan', 2, 1, '', 1558061785),
(7, 'tes2', '123456', 'tes 2', 'tes2@email.com', 'Laki-laki', 2, 1, '', 1558061889);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` enum('Pending','Respon') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `telpon`, `email`, `isi_pesan`, `tanggal`, `status`) VALUES
(3, 'Ms. Antonette Quigley', '085145123523', 'anrizsi10@gmail.com', 'asad', 1565581195, 'Pending'),
(4, 'as', '085145123456', 'as@as.co', 'asdddddddw', 1565754438, 'Pending'),
(5, 'Abdulrizal M. Pauweni, S.SI', '085145123456', 'wambuloli.km18@gmail.com', 'assdwetrhdffas', 1565754507, 'Pending'),
(6, 'Ms. Antonette Quigley', '085145123456', 'cv.vithoputramandiri@gmail.com', 'asdadsa', 1565754540, 'Pending'),
(7, 'Moses Barrows', '085145123523', 'abdulrizalpauweni@rocketmail.com', 'sadsdfe', 1565754623, 'Pending'),
(8, 'asdwwf', 'saasfa', 'as@as.co', 'asdawegergrtuyjn', 1565754684, 'Pending'),
(9, 'asfe', '085145123523', 'cv.vithoputramandiri@gmail.com', 'dfbyhmkoipolyhjrt', 1565754720, 'Pending'),
(10, 'asdwwf', '085145123456', 'ruslansamuel11@gmail.com', 'asdewgd', 1565754956, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pns`
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
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nama_profil` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_profil`, `tipe`, `isi`) VALUES
(1, 'Sejarah & Latar Belakang', 'text', '<p style=\"text-align:justify\"><strong><span style=\"color:#e74c3c\">CKEditor </span>adalah</strong>&nbsp;semacam library yang di bangun dari dengan&nbsp;<em><strong><span style=\"background-color:#f1c40f\">javascript</span></strong></em>. untuk memudahkan kita dalam membuat form posting/text editor pada form. jadi dengan ada nya text editor ck editor ini kita bisa membuat form posting seperti pada blogspot atau wordpress. kita bisa membuat text tebal, text heading dan lain-lainnya dengan sangat mudah. karena ckeditor mengandung unsur WYSIWYG(What You See Is What You Get).</p>\r\n\r\n<p style=\"text-align:justify\"><strong>CKEditor adalah</strong>&nbsp;semacam library yang di bangun dari dengan&nbsp;<em><strong>javascript</strong></em>. untuk memudahkan kita dalam membuat form posting/text editor pada form. jadi dengan ada nya text editor ck editor ini kita bisa membuat form posting seperti pada blogspot atau wordpress. kita bisa membuat text tebal, text heading dan lain-lainnya dengan sangat mudah. karena ckeditor mengandung unsur WYSIWYG(What You See Is What You Get).</p>\r\n'),
(2, 'Tugas & Fungsi', 'text', '<p style=\"text-align:justify\"><strong>CKEditor adalah</strong>&nbsp;semacam library yang di bangun dari dengan&nbsp;<em><strong>javascript</strong></em>. untuk memudahkan kita dalam membuat form posting/text editor pada form. jadi dengan ada nya text editor ck editor ini kita bisa membuat form posting seperti pada blogspot atau wordpress. kita bisa membuat text tebal, text heading dan lain-lainnya dengan sangat mudah. karena ckeditor mengandung unsur WYSIWYG(What You See Is What You Get).</p>\r\n'),
(3, 'Struktur Organisasi', 'gambar', 'strukturorganisasi.png'),
(4, 'Visi & Misi', 'text', '<p style=\"text-align:justify\"><strong>CKEditor adalah</strong>&nbsp;semacam library yang di bangun dari dengan&nbsp;<em><strong>javascript</strong></em>. untuk memudahkan kita dalam membuat form posting/text editor pada form. jadi dengan ada nya text editor ck editor ini kita bisa membuat form posting seperti pada blogspot atau wordpress. kita bisa membuat text tebal, text heading dan lain-lainnya dengan sangat mudah. karena ckeditor mengandung unsur WYSIWYG(What You See Is What You Get).</p>\r\n'),
(5, 'Pejabat', 'text', '<p style=\"text-align:justify\"><strong>Daftar Pejabat Biro Pengadaan</strong></p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Kepala Biro</li>\r\n	<li style=\"text-align: justify;\">Kepala Bagian Administrasi</li>\r\n	<li style=\"text-align: justify;\">Kepala Bagian Kebijakan Strategi &amp; Informasi</li>\r\n	<li style=\"text-align: justify;\">Kepala Bagian Layanan Pengadaan</li>\r\n</ol>\r\n'),
(6, 'Rencana Strategi 2017-2022', 'text', '<p style=\"text-align:justify\"><strong>CKEditor adalah</strong>&nbsp;semacam library yang di bangun dari dengan&nbsp;<em><strong>javascript</strong></em>. untuk memudahkan kita dalam membuat form posting/text editor pada form. jadi dengan ada nya text editor ck editor ini kita bisa membuat form posting seperti pada blogspot atau wordpress. kita bisa membuat text tebal, text heading dan lain-lainnya dengan sangat mudah. karena ckeditor mengandung unsur WYSIWYG(What You See Is What You Get).</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ptt`
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
-- Dumping data untuk tabel `ptt`
--

INSERT INTO `ptt` (`id_ptt`, `nik`, `nama_lengkap`, `jabatan`, `id_pendidikan`, `agama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `foto`) VALUES
(2, '7503031312930003', 'Ruslan Dara Samuel', 'PTT/Honorer', 1, 'Islam', 'Gorontalo', '1993-12-13', 'Jl. Perintis Desa Boludawa Kec. Suwawa Kab. Bone Bolango', 'userl1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
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
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `url`, `icon`, `status`) VALUES
(1, 1, 'Pengaturan', 'dashboard/pengaturan', 'fa-cogs', 1),
(2, 1, 'Pengguna', 'dashboard/pengguna', 'fa-users', 1),
(3, 2, 'Profil Saya', 'pengguna/profil', 'fa-user', 1),
(4, 3, 'Dashboard', 'menu', 'fa-list', 1),
(5, 3, 'Sub Menu', 'menu/submenu', 'fa-list', 1),
(6, 3, 'Landing', 'menu/landing', 'fa-list', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarsasi`
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
-- Dumping data untuk tabel `tarsasi`
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
-- Indexes for table `kds`
--
ALTER TABLE `kds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

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
-- Indexes for table `menu_landing`
--
ALTER TABLE `menu_landing`
  ADD PRIMARY KEY (`id_ml`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pns`
--
ALTER TABLE `pns`
  ADD PRIMARY KEY (`id_pns`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

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
-- AUTO_INCREMENT for table `kds`
--
ALTER TABLE `kds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_landing`
--
ALTER TABLE `menu_landing`
  MODIFY `id_ml` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pns`
--
ALTER TABLE `pns`
  MODIFY `id_pns` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ptt`
--
ALTER TABLE `ptt`
  MODIFY `id_ptt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tarsasi`
--
ALTER TABLE `tarsasi`
  MODIFY `id_tarsasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
