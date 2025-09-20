-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2025 at 10:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_suplemen`
--

-- --------------------------------------------------------

--
-- Table structure for table `kec_alt_kriteria`
--

CREATE TABLE `kec_alt_kriteria` (
  `id_alt_kriteria` int(11) NOT NULL,
  `f_id_alternatif` int(11) NOT NULL,
  `f_id_kriteria` char(3) NOT NULL,
  `f_id_sub_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kec_alt_kriteria`
--

INSERT INTO `kec_alt_kriteria` (`id_alt_kriteria`, `f_id_alternatif`, `f_id_kriteria`, `f_id_sub_kriteria`) VALUES
(13782, 610, 'C1', 105),
(13783, 610, 'C2', 109),
(13784, 610, 'C3', 112),
(13785, 610, 'C4', 116),
(13790, 611, 'C1', 104),
(13791, 611, 'C2', 108),
(13792, 611, 'C3', 113),
(13793, 611, 'C4', 116),
(13794, 612, 'C1', 104),
(13795, 612, 'C2', 108),
(13796, 612, 'C3', 113),
(13797, 612, 'C4', 116),
(13798, 613, 'C1', 104),
(13799, 613, 'C2', 110),
(13800, 613, 'C3', 114),
(13801, 613, 'C4', 117),
(13802, 614, 'C1', 104),
(13803, 614, 'C2', 109),
(13804, 614, 'C3', 113),
(13805, 614, 'C4', 116);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` char(3) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `jenis_kriteria` enum('Cost','Benefit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `jenis_kriteria`) VALUES
('C1', 'Kandungan', 'Benefit'),
('C2', 'Harga', 'Cost'),
('C3', 'Kemasan', 'Benefit'),
('C4', 'Bentuk  Suplemen', 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_admin`, `username`, `password`) VALUES
(6, 'admin', '$2y$10$NojNDZaCPecW2YIthIFqaOO2vb60S9SG50.uj0.gjHZ.vUAHGpafC');

-- --------------------------------------------------------

--
-- Table structure for table `peringkat`
--

CREATE TABLE `peringkat` (
  `id_peringkat` int(11) NOT NULL,
  `nilai_peringkat` double(11,5) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `batch_id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `nama_sub_kriteria` varchar(255) NOT NULL,
  `bobot_sub_kriteria` int(11) NOT NULL,
  `f_id_kriteria` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `nama_sub_kriteria`, `bobot_sub_kriteria`, `f_id_kriteria`) VALUES
(104, 'EPA & DHA tinggi   (>600mg)', 4, 'C1'),
(105, 'EPA & DHA sedang  (300-600mg)', 3, 'C1'),
(106, 'EPA & DHA rendah  (<300mg)', 2, 'C1'),
(107, 'Hanya (Nabati)', 1, 'C1'),
(108, 'Sangat mahal  >Rp300.000', 1, 'C2'),
(109, 'Mahal (Rp.200.000-Rp.300.000)', 2, 'C2'),
(110, 'Sedang (Rp.100.000-Rp.200.000)', 3, 'C2'),
(111, 'Murah ( < Rp.100.000)', 4, 'C2'),
(112, 'Botol isi &gt; 100 kapsul', 4, 'C3'),
(113, 'Botol isi 60-100 kapsul', 3, 'C3'),
(114, 'Botol isi 30-59 kapsul ', 2, 'C3'),
(115, 'Botol cair', 1, 'C3'),
(116, '(softgel lunak &amp;  mudah ditelan)', 4, 'C4'),
(117, 'Softgel biasa', 3, 'C4'),
(118, 'Kapsul kasar', 2, 'C4'),
(119, 'Cairan', 1, 'C4');

-- --------------------------------------------------------

--
-- Table structure for table `suplemen`
--

CREATE TABLE `suplemen` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplemen`
--

INSERT INTO `suplemen` (`id_alternatif`, `nama_alternatif`, `gambar`) VALUES
(610, 'Blackmores  fish oil 1000', '1758349604-download.png'),
(611, 'Wellness  Natural  omega-3', '1758354762-pngtree-kids-doodle-2-png-image_14122298.png'),
(612, 'Natural  salmon  omega-3  complex ', '1758354815-ChatGPT_Image_7_Sep_2025,_18_46_16.png'),
(613, 'Omepros', '1758354923-ChatGPT_Image_7_Sep_2025,_19_12_34.png'),
(614, 'Sea-quill  omega-3 ', '1758354968-ChatGPT_Image_7_Sep_2025,_19_12_34.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kec_alt_kriteria`
--
ALTER TABLE `kec_alt_kriteria`
  ADD PRIMARY KEY (`id_alt_kriteria`),
  ADD KEY `f_id_alternatif` (`f_id_alternatif`),
  ADD KEY `f_id_sub_kriteria` (`f_id_sub_kriteria`),
  ADD KEY `f_id_kriteria` (`f_id_kriteria`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD PRIMARY KEY (`id_peringkat`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`),
  ADD KEY `f_id_kriteria` (`f_id_kriteria`);

--
-- Indexes for table `suplemen`
--
ALTER TABLE `suplemen`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kec_alt_kriteria`
--
ALTER TABLE `kec_alt_kriteria`
  MODIFY `id_alt_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13806;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peringkat`
--
ALTER TABLE `peringkat`
  MODIFY `id_peringkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `suplemen`
--
ALTER TABLE `suplemen`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=615;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kec_alt_kriteria`
--
ALTER TABLE `kec_alt_kriteria`
  ADD CONSTRAINT `kec_alt_kriteria_ibfk_3` FOREIGN KEY (`f_id_sub_kriteria`) REFERENCES `sub_kriteria` (`id_sub_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kec_alt_kriteria_ibfk_4` FOREIGN KEY (`f_id_alternatif`) REFERENCES `suplemen` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kec_alt_kriteria_ibfk_5` FOREIGN KEY (`f_id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peringkat`
--
ALTER TABLE `peringkat`
  ADD CONSTRAINT `peringkat_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `suplemen` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`f_id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
