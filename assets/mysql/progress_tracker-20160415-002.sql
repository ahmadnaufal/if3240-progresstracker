-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 12:08 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progress_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id` int(11) NOT NULL,
  `nama_channel` varchar(128) NOT NULL,
  `id_proyek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id`, `nama_channel`, `id_proyek`) VALUES
(1, 'Pembuatan UI', 4),
(2, 'Backend Development and Architecture', 4),
(3, 'Security', 4),
(4, 'Channel 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(512) NOT NULL,
  `waktu_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_kegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `nama_file`, `waktu_upload`, `id_kegiatan`) VALUES
(1, '12_-_Perancangan_Interface_dan_Dialog.pdf', '2016-04-15 09:46:59', 2),
(2, '19024967189-464845380-ticket.pdf', '2016-04-15 09:56:57', 2),
(3, '95579_copy.jpg', '2016-04-15 10:06:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `deskripsi` text,
  `waktu_mulai` date DEFAULT NULL,
  `waktu_selesai` date DEFAULT NULL,
  `id_proyek` int(11) NOT NULL,
  `milestone` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `deskripsi`, `waktu_mulai`, `waktu_selesai`, `id_proyek`, `milestone`) VALUES
(1, 'Membuat rancangan modul', 'Kegiatan satu mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo.', '2016-04-15', '2016-04-23', 2, 1),
(2, 'Membuat rancangan tampilan', 'Blablablabla. Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis.', '2016-04-05', '2016-04-20', 2, 0),
(3, 'Membuat rancangan apapun', 'Kegiatan ini merupakan kegiatan yang lalala lilili merancang apapun lalalala', '2016-04-20', '2016-04-27', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `tipe` tinyint(1) NOT NULL,
  `jabatan` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `email`, `tipe`, `jabatan`) VALUES
('klien', '875258ef07daf025034c48766e90ac9a52eaded6333a1b0274a55ecc80b94e9435161fa889683788e4400e5df22f96b3f3eef62b53d64591682ecce64a03775a', 'klien@perusahaan.com', 0, NULL),
('klien2', '7679a1ab3a54a6cd5416a7727203972dc1efebdb322c5bf34a62c7d397aeb058ee3f79e723030ef601a556eba624225b335fcf3d4f834273ccba4d27439a7cde', 'klien2@peru.com', 0, NULL),
('klienlagi', '56bc464e3ad3a0852e3da6320e4ca070bcdd7a2d8e52018ea670b1c29fc4dfc38ef0343942278ee48cb0454a57520942adc88bdda00ac8f1076b55bc121e2176', 'klienlagi@peru.com', 0, NULL),
('meridian', 'c897e52a3d572283fb6884df178120189e4f9ccfa1ee51c9382dcd4b297267a5c69a57e850bda3e17691b20e5eb558dcd8ee6fd85935c9509f650276bfe97e3d', 'meridian@meridian.id', 1, 'Developer'),
('testing', '521b9ccefbcd14d179e7a1bb877752870a6d620938b28a66a107eac6e6805b9d0989f45b5730508041aa5e710847d439ea74cd312c9355f1f2dae08d40e41d50', 'testing@test.com', 1, 'CEO');

-- --------------------------------------------------------

--
-- Table structure for table `pertemuan`
--

CREATE TABLE `pertemuan` (
  `id_proyek` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `judul` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertemuan`
--

INSERT INTO `pertemuan` (`id_proyek`, `waktu`, `deskripsi`, `judul`) VALUES
(4, '2016-04-16 07:00:00', 'Pertemuan ini membahas tentang UI', 'Pertemuan I: UI'),
(4, '2016-04-25 07:00:00', 'Pertemuan ini akan fokus ke pengenalan framework backend yang akan digunakan.', 'Pertemuan II: Backend'),
(2, '2016-04-25 21:00:00', 'Ini adalah koordinasi utama pekerjaan proyek. Dihadiri oleh kedua pihak. Jangan lupa pada datang ya.', 'Rapat Utama Pekerjaan'),
(2, '2016-05-01 21:00:00', 'Mengundang beberapa tim pengadaan dari klien untuk membahas kebutuhan logistik proyek', 'Koordinasi Pengadaan'),
(4, '2016-04-01 15:00:00', 'Lalalallala', 'Pertemuan III');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `konten` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_channel` int(11) NOT NULL,
  `username_pengguna` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `konten`, `timestamp`, `id_channel`, `username_pengguna`) VALUES
(1, 'Mockup halaman utama sudah saya attach di kegiatan awal ya', '2016-04-15 03:08:34', 1, 'meridian');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id_kegiatan` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `persentase` int(3) NOT NULL,
  `username_pengguna` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `nama_proyek` varchar(128) NOT NULL,
  `deskripsi` text,
  `username_klien` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `nama_proyek`, `deskripsi`, `username_klien`) VALUES
(1, 'Tes Proyek', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet minus sequi sunt, minima maiores doloribus reiciendis deserunt voluptas aliquid, necessitatibus ipsa molestias! Fuga saepe, mollitia aspernatur nulla, pariatur sequi distinctio.', 'klien'),
(2, 'Tes Proyek Lagi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus obcaecati deleniti similique maiores eligendi magnam, quidem id. Ratione expedita excepturi placeat quos error, quia dolore aperiam distinctio fugit. Harum, et.', 'klien2'),
(4, 'Tes Proyek Kedua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto molestias quo expedita itaque, doloribus mollitia sint suscipit qui. Aut inventore quidem, recusandae consequatur sunt praesentium animi quas in similique quibusdam.', 'klienlagi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_pengguna` (`username_pengguna`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD KEY `username_pengguna` (`username_pengguna`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_klien` (`username_klien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `channel`
--
ALTER TABLE `channel`
  ADD CONSTRAINT `channel_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`);

--
-- Constraints for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD CONSTRAINT `pertemuan_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`username_pengguna`) REFERENCES `pengguna` (`username`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`username_pengguna`) REFERENCES `pengguna` (`username`),
  ADD CONSTRAINT `progress_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id`);

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`username_klien`) REFERENCES `pengguna` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
