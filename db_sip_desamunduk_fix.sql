-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 06:34 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sip_desamunduk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guide`
--

CREATE TABLE `tb_guide` (
  `id_guide` int(11) NOT NULL,
  `nama_guide` varchar(128) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `guide_rate` varchar(128) NOT NULL,
  `status` int(1) NOT NULL,
  `foto_profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guide`
--

INSERT INTO `tb_guide` (`id_guide`, `nama_guide`, `no_hp`, `email`, `guide_rate`, `status`, `foto_profile`) VALUES
(1, 'Made', '087860430966', 'made@gmail.com', '500000', 1, 'profileGuide.png'),
(2, 'putu', '168991567', 'putu@gmail.com', '400000', 0, 'profileGuide.png\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Travel'),
(2, 'Restourant'),
(3, 'Hotels');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempatwisata`
--

CREATE TABLE `tb_tempatwisata` (
  `id_tps` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tarif` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `tgl_upload` date NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `link_berita` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tempatwisata`
--

INSERT INTO `tb_tempatwisata` (`id_tps`, `id_kategori`, `tarif`, `keterangan`, `tgl_upload`, `lokasi`, `link_berita`, `foto`) VALUES
(1, 1, '20000', 'Tempat Wisata Danau Tamblingan', '2020-10-22', 'https://goo.gl/maps/Sg8GmJwoCXcLjw3w9', 'https://www.balitoursclub.net/danau-tamblingan/', 'tamblingan.jpg'),
(2, 3, '450000', 'Munduk Menir Villas', '2020-11-25', 'https://goo.gl/maps/uKogVjKfdpfQmacj8', 'https://dispar.bulelengkab.go.id/berita/kegiatan-sertifikasi-dan-penyerahan-sertifikat-tatanan-kehidupan-era-baru-di-kawasan-munduk-80', 'hotel.jpg'),
(3, 2, 'Sesuai tarif restaurant', 'Warung Made', '2020-11-01', 'https://goo.gl/maps/DNHiDnJoFqHukVtb9', '0', 'rumahmakan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `id_tps` int(11) NOT NULL,
  `id_guide` int(11) NOT NULL,
  `jml_pengunjung` varchar(128) NOT NULL,
  `total_harga` varchar(128) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `satus_alergi` text NOT NULL,
  `status_makanan` varchar(128) NOT NULL,
  `verifikasi` int(10) NOT NULL,
  `bukti_trf` text NOT NULL,
  `finish` int(11) NOT NULL,
  `waktu_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_tps`, `id_guide`, `jml_pengunjung`, `total_harga`, `tgl_kunjungan`, `satus_alergi`, `status_makanan`, `verifikasi`, `bukti_trf`, `finish`, `waktu_order`) VALUES
(1, '7', 2, 1, '5', '2650000', '2020-12-07', '0', 'Non Vegetarian', 1, '', 0, '2020-12-06 00:22:11');

--
-- Triggers `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `guide` BEFORE INSERT ON `tb_transaksi` FOR EACH ROW BEGIN

UPDATE tb_guide SET status=1 WHERE id_guide=NEW.id_guide;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updata_guide` AFTER UPDATE ON `tb_transaksi` FOR EACH ROW BEGIN

IF OLD.finish <> NEW.finish THEN
       UPDATE tb_guide SET status=0 WHERE id_guide=NEW.id_guide;
    END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Nyoman ayu sinta gayatri', 'aysin@gmail.com', 'default.jpg', '$2y$10$0Yhcdzzota6oEWa1d2t.QOdR1C4BlIpoxohLBTyHLZYD9XpgdGC/q', 1, 1, 1583807857),
(2, 'Ayu Sinta', 'ayusinta@gmail.com', 'default.jpg', '$2y$10$NG3FDzrbvAwz47kfL315/ODBFWEtjdAMRzbgmvqakqEpQ/cUbWSEm', 2, 1, 1583807893),
(4, 'admin', 'admin@gmail.com', 'default.jpg', '$2y$10$SmqbJiAX4KBuT7lFsQ47TOlM/rl.3TKMx.J8cC4MGwr9x82YuRPua', 1, 1, 1583807893),
(5, 'pengunjung', 'pengunjung@gmail.com', 'default.jpg', '$2y$10$SmqbJiAX4KBuT7lFsQ47TOlM/rl.3TKMx.J8cC4MGwr9x82YuRPua', 2, 1, 1583807893),
(6, 'aaa', 'aa@gmail.com', 'default.jpg', 'aaaaaa', 2, 1, 0),
(7, 'Sueca', 'sueca@gmail.com', 'default.png', '$2y$10$SmqbJiAX4KBuT7lFsQ47TOlM/rl.3TKMx.J8cC4MGwr9x82YuRPua', 2, 1, 1607155554);

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
(2, 1, 2),
(3, 2, 3),
(4, 1, 3);

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
(2, 'Menu Sidebar'),
(3, 'Data User');

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
(1, 'Administrator'),
(2, 'Member');

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
(1, 1, 'Dashboard', 'menu/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(5, 2, 'Menu Sidebar', 'menu', 'fas fa-fw fa-folder', 1),
(6, 2, 'Submenu Sidebar', 'menu/submenu', 'fas fa-fw fa-folder-open ', 1),
(10, 1, 'My Profile', 'admin', 'far fa-fw fa-user', 1),
(23, 3, 'Data Tempat Wisata', 'menu/dataTempatWisata', 'far fa-fw fas fa-table', 1),
(24, 3, 'Data Kategori', 'menu/dataKategori', 'far fa-fw fas fa-table', 1),
(25, 3, 'Data Guide', 'menu/dataGuide', 'far fa-fw fas fa-table', 1),
(26, 3, 'Data Transaksi', 'menu/dataTransaksi', 'far fa-fw fas fa-table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `tb_guide`
--
ALTER TABLE `tb_guide`
  ADD PRIMARY KEY (`id_guide`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_tempatwisata`
--
ALTER TABLE `tb_tempatwisata`
  ADD PRIMARY KEY (`id_tps`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- AUTO_INCREMENT for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_guide`
--
ALTER TABLE `tb_guide`
  MODIFY `id_guide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tempatwisata`
--
ALTER TABLE `tb_tempatwisata`
  MODIFY `id_tps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
