-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 19.33
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_silab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aset`
--

CREATE TABLE `tb_aset` (
  `kode_aset` int(20) NOT NULL,
  `id_lokasi` int(20) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `spesifikasi` text NOT NULL,
  `jumlah` int(20) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_aset`
--

INSERT INTO `tb_aset` (`kode_aset`, `id_lokasi`, `nama_barang`, `spesifikasi`, `jumlah`, `satuan`, `keterangan`, `foto`) VALUES
(1, 2, 'Komputer PC All in One', 'Monitor 20 inch Merek Benq Keyboard Serta Mouse', 20, 'Paket', 'Baik', 'pcLenovo.jpg'),
(2, 2, 'Rak Besi', 'Besi Diameter 1 x 3 meter', 3, 'Buah', 'Baik', 'rakbesi.jpg'),
(3, 2, 'LCD Proyektor', 'Merek Sony', 1, 'Buah', 'Baik', 'LCDproyektor.png'),
(4, 1, 'LCD Proyektor', 'Merek Sony', 1, 'Buah', 'Baik', 'LCDproyektor.png'),
(5, 6, 'LCD Proyektor', 'Merek Sony', 1, 'Buah', 'Baik', 'LCDproyektor.png'),
(6, 7, 'LCD Proyektor', 'Merek Sony', 1, 'Buah', 'Baik', 'LCDproyektor.png'),
(7, 1, 'AC', 'Merek LG', 3, 'Buah', 'Baik', 'AClg.jpg'),
(8, 1, 'AC', 'Merek LG', 4, 'Buah', '2 Baik, 2 Rusak', 'AClg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `nama_lab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `id_prodi`, `nama_lab`) VALUES
(1, 1, 'Lab Bawah MI'),
(2, 1, 'Lab Atas MI'),
(3, 4, 'Lab Jaringan'),
(4, 2, 'LCI (Laboratory Of Cultural Informatics)'),
(5, 6, 'Lab Kecantikan'),
(6, 6, 'Lab Busana Atas'),
(7, 6, 'Lab Busana Bawah'),
(8, 6, 'Lab Produksi'),
(9, 6, 'Lab Hidang'),
(10, 5, 'Lab 1 Elektronika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelaporan`
--

CREATE TABLE `tb_pelaporan` (
  `id_laporan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `kode_aset` int(20) NOT NULL,
  `deskripsi_laporan` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggapan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(10) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `fakultas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`, `jurusan`, `fakultas`) VALUES
(1, 'Manajemen Informatika', 'Teknik Informatika', 'Fakultas Teknik Dan Kejuruan'),
(2, 'Pendidikan Teknik Informatika', 'Teknik Informatika', 'Fakultas Teknik Dan Kejuruan'),
(3, 'Sistem Informasi', 'Teknik Informatika', 'Fakultas Teknik Dan Kejuruan'),
(4, 'Ilmu Komputer', 'Teknik Informatika', 'Fakultas Teknik Dan Kejuruan'),
(5, 'Pendidikan Teknik Elektro', 'Pendidikan Teknik Elektro', 'Fakultas Teknik Dan Kejuruan'),
(6, 'Pendidikan Kesejahteraan Keluarga', 'Teknik Industri', 'Fakultas Teknik Dan Kejuruan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `jabatan`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Ni Nyoman Ayu Sinta Gayatri', 'kmayusintagayatri@gmail.com', 'default.jpg', '$2y$10$0Yhcdzzota6oEWa1d2t.QOdR1C4BlIpoxohLBTyHLZYD9XpgdGC/q', 'Sekretaris', 1, 1, 1583807857);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu Sidebar'),
(3, 'Master Data');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'menu/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(5, 2, 'Menu Sidebar', 'menu', 'fas fa-fw fa-folder', 1),
(6, 2, 'Submenu Sidebar', 'menu/submenu', 'fas fa-fw fa-folder-open ', 1),
(10, 1, 'My Profile', 'admin', 'far fa-fw fa-user', 1),
(18, 3, 'Master Data User', 'menu/dataUser', 'fas fa-fw fa-key', 1),
(19, 3, 'Master Data Lokasi', 'menu/dataLokasi', 'fas fa-fw fa-key', 1),
(20, 3, 'Master Data Prodi', 'menu/dataProdi', 'fas fa-fw fa-key', 1),
(21, 3, 'Mater Data Aset', 'menu/dataAset', 'fas fa-fw fa-briefcase', 1),
(22, 3, 'Data Pelaporan', 'menu/dataPelaporan', 'fas fa-fw fa-search', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`kode_aset`);

--
-- Indeks untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `tb_pelaporan`
--
ALTER TABLE `tb_pelaporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `kode_aset` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_lokasi`
--
ALTER TABLE `tb_lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_pelaporan`
--
ALTER TABLE `tb_pelaporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
