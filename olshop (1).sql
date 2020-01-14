-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 03:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`users_id`, `name`, `email`, `password`, `remember_token`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$FJR2WLtTtlB329Wl72eoieqlwLBmP2MSptrOG2uB0YxSB/NzH302y', 'feKZZJFjBD8XHsyyK6Gwp4hf8hHisKaF7ZCUJCzNT5nBw2TBQmLsepLW3Hnc');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `nama`, `keterangan`, `kategori_id`, `harga`, `stock`, `status_id`) VALUES
(33, 'Kedelai Bola Hijau', '<p>Kedelai impor dari amerika</p>\r\n\r\n<p>Harga per kilo 7000 kg</p>\r\n\r\n<p>Minimal pembelian 50 kg</p>', 6, 350000, 5000, 1),
(34, 'Ragi Tempe', '<p>Ragi Untuk Pembuatan Tahu Tempe</p>\r\n\r\n<p>Dijual dengan 12.500 per pcs</p>', 7, 12500, 100, 1),
(35, 'Kedelai 7Roda', '<pre>\r\nKedelai impor Dari amerika</pre>\r\n\r\n<p>Harga 7000 per Kilogram</p>\r\n\r\n<p>Minimal Pembelian 50kg</p>', 6, 350000, 5000, 1),
(36, 'Kedelai Bola Merah', '<p>Kedelai Impor dari amerika</p>\r\n\r\n<p>Harga 7000 per kilo</p>\r\n\r\n<p>Minimal Pembelian 50kg</p>', 6, 350000, 5000, 1),
(37, 'Kedelai Bola Ungu', '<p>Kedelai Impor dari amerika</p>\r\n\r\n<p>Harga 7000 per kilo</p>\r\n\r\n<p>Minimal Pembelian 50kg</p>', 6, 350000, 5000, 1),
(38, 'Kedelai GCU', '<p>Kedelai GCU Impor dari Amerika</p>\r\n\r\n<p>harga 7000/kg</p>\r\n\r\n<p>Minimal Pembelian 50kg</p>', 6, 350000, 100, 1),
(39, 'Kedelai Paus', '<p>Kedelai Paus impor dari amerika</p>\r\n\r\n<p>Harga 7000/kg</p>\r\n\r\n<p>Minimal Pembelian 50/kg</p>', 6, 350000, 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `base64`
--

CREATE TABLE `base64` (
  `base64_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base64`
--

INSERT INTO `base64` (`base64_id`, `barang_id`, `nama`) VALUES
(1, 20, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL29wcG8uanBlZw=='),
(2, 21, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL3NpcndhbGpvZ2dlci5qcGVn'),
(3, 22, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkICgyKS5qcGVn'),
(4, 23, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkLmpwZWc='),
(5, 24, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2NlbGFuYV9wcmlhX1RSS18xOF83Ny5qcGc='),
(6, 25, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzI5MDk2MTM0XzE0MjgxNjkxODA2MjcwODJfMzk4NzIwMjM2NDkwOTAyNzMyOF9uLmpwZw=='),
(7, 26, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkICgxKS5qcGVn'),
(8, 27, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkICgzKS5qcGVn'),
(9, 28, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzI4NzYyOTk2XzE1ODM5OTQ0NjgzMDIzODBfMTY0Njg5MDQwMDYwMzk2MzM5Ml9uLmpwZw=='),
(10, 29, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzE3NTk2MTE2Xzk5Mjk1NDgxNDE3NTE3M183MzcxMjA1Nzg3NDYyNDAyMDQ4X24uanBn'),
(11, 30, 'aHR0cDovL2xvY2FsaG9zdC9hZG1pbi1vbHNob3AvcHVibGljL2ltYWdlLzI5MDkzNTY3XzU2NzMwNDA1Njk3Njk2M184ODg1NDgwODQzNjQ1MDI2MzA0X24uanBn'),
(12, 31, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL2tlZGVsYWlfN3JvZGEuanBn'),
(13, 32, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL2tlZGVsYWlfcGF1cy5qcGc='),
(14, 33, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL2tlZGVsYWlfYm9sYV9oaWphdS5qcGc='),
(15, 34, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL3JhZ2kuanBn'),
(16, 35, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL2tlZGVsYWlfN3JvZGEuanBn'),
(17, 36, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL2tlZGVsYWlfYm9sYV9tZXJhaC5qcGc='),
(18, 37, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL2tlZGVsYWlfYm9sYV91bmd1LmpwZw=='),
(19, 38, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL0tlZGVsYWlfZ2N1LmpwZw=='),
(20, 39, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL2tlZGVsYWlfcGF1cy5qcGc=');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama`) VALUES
(6, 'Kedelai'),
(7, 'Ragi');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `konfirmasi_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`konfirmasi_id`, `users_id`, `pesanan_id`, `photo`) VALUES
(1, 1, 2, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL3lhc21pbmZiLmpwZw=='),
(2, 1, 2, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlLzI5NDE2ODY2XzIwNDI0MTg4NTYwNzk5MjlfODEzMTQ1NjQ3NTM1MzU3OTUyMF9uLmpwZw=='),
(3, 1, 3, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL3lhc21pbjIuanBlZw=='),
(4, 1, 1, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL2Rvd25sb2FkLmpwZWc='),
(5, 1, 4, 'aHR0cDovL2xvY2FsaG9zdC9vbHNob3AvcHVibGljL2ltYWdlL3lhc21pbmZiMi5qcGVn'),
(6, 2, 1, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL0NhcHR1cmUuUE5H'),
(7, 2, 7, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL0NhcHR1cmUxLlBORw=='),
(8, 2, 8, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL0NhcHR1cmUyLlBORw=='),
(9, 2, 11, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL0NhcHR1cmUxLlBORw=='),
(10, 2, 12, 'aHR0cDovL2xvY2FsaG9zdDo4MDAwL2ltYWdlL3NzMi5QTkc=');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `total_bayar` decimal(10,2) NOT NULL,
  `status_invoice_id` int(11) NOT NULL DEFAULT '1',
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`pesanan_id`, `users_id`, `nama_penerima`, `alamat`, `total_bayar`, `status_invoice_id`, `tanggal`) VALUES
(1, 1, 'Fadly', 'kp. pedurenan bekasi', '85000.00', 4, NULL),
(2, 1, 'Pida', 'Kp. Sawah Bekasi', '170000.00', 3, NULL),
(3, 1, 'sdfsdf', 'sdfjdkgdfgfdgdfgfd', '79000.00', 4, NULL),
(4, 1, 'Shafa', 'Kp. Sawah', '45000.00', 4, NULL),
(5, 2, 'taufan', 'ds kiajaran', '1000.00', 1, NULL),
(6, 2, 'taufan', 'ds.kiajaran', '1000.00', 1, NULL),
(7, 2, 'taufan', 'ds.kiajaran', '350000.00', 3, NULL),
(8, 2, 'taufan', 'ds.langut', '12500.00', 4, NULL),
(9, 2, 'taufan', 'indramayu', '700000.00', 1, NULL),
(10, 2, 'taufan', 'sa', '700000.00', 1, NULL),
(11, 2, 'taufan', 'asd', '700000.00', 2, NULL),
(12, 2, 'as', 'asda', '1050000.00', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_barang`
--

CREATE TABLE `pesanan_barang` (
  `pesanan_barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_barang`
--

INSERT INTO `pesanan_barang` (`pesanan_barang_id`, `pesanan_id`, `barang_id`, `qty`, `subtotal`) VALUES
(1, 1, 21, 1, '85000.00'),
(2, 2, 21, 2, '170000.00'),
(3, 3, 23, 1, '56000.00'),
(4, 3, 28, 1, '23000.00'),
(5, 4, 30, 1, '45000.00'),
(6, 5, 31, 1, '1000.00'),
(7, 6, 31, 1, '1000.00'),
(8, 7, 33, 1, '350000.00'),
(9, 8, 34, 1, '12500.00'),
(10, 9, 33, 1, '350000.00'),
(11, 9, 36, 1, '350000.00'),
(12, 10, 37, 1, '350000.00'),
(13, 10, 36, 1, '350000.00'),
(14, 11, 36, 1, '350000.00'),
(15, 11, 35, 1, '350000.00'),
(16, 12, 37, 2, '700000.00'),
(17, 12, 36, 1, '350000.00');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `barang_id`, `nama`) VALUES
(1, 13, 'sirwaljogger.jpeg'),
(2, 14, 'sirwaljogger.jpeg'),
(3, 15, 'levis.jpeg'),
(4, 16, 'jogger.jpeg'),
(5, 17, 'levis-wanita.jpeg'),
(6, 18, 'levis.jpeg'),
(8, 20, 'oppo.jpeg'),
(9, 21, 'sirwaljogger.jpeg'),
(10, 22, 'download (2).jpeg'),
(11, 23, 'download.jpeg'),
(12, 24, 'celana_pria_TRK_18_77.jpg'),
(13, 25, '29096134_1428169180627082_3987202364909027328_n.jpg'),
(14, 26, 'download (1).jpeg'),
(15, 27, 'download (3).jpeg'),
(16, 28, '28762996_1583994468302380_1646890400603963392_n.jpg'),
(17, 29, '17596116_992954814175173_7371205787462402048_n.jpg'),
(18, 30, '29093567_567304056976963_8885480843645026304_n.jpg'),
(19, 31, 'kedelai_7roda.jpg'),
(20, 32, 'kedelai_paus.jpg'),
(21, 33, 'kedelai_bola_hijau.jpg'),
(22, 34, 'ragi.jpg'),
(23, 35, 'kedelai_7roda.jpg'),
(24, 36, 'kedelai_bola_merah.jpg'),
(25, 37, 'kedelai_bola_ungu.jpg'),
(26, 38, 'Kedelai_gcu.jpg'),
(27, 39, 'kedelai_paus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `nama`) VALUES
(1, 'Ditampilkan'),
(2, 'Disembunyikan');

-- --------------------------------------------------------

--
-- Table structure for table `status_invoice`
--

CREATE TABLE `status_invoice` (
  `status_invoice_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_invoice`
--

INSERT INTO `status_invoice` (`status_invoice_id`, `nama`) VALUES
(1, 'Belum Dibayar'),
(2, 'Menunggu Verifikasi'),
(3, 'Dibayar'),
(4, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `email`, `password`, `remember_token`, `admin`) VALUES
(1, 'Fadly', 'fadly@fadly.com', '$2y$10$FJR2WLtTtlB329Wl72eoieqlwLBmP2MSptrOG2uB0YxSB/NzH302y', 'HzlhWWGxusrIM9Y6YHsF8bourtuLZqmLKy9ivtdoo3BhMLuTsWoecYzHIck8', 0),
(2, 'taufan', 'taufanyusuf25@gmail.com', '$2y$10$xOmIls2jsLJ4n4Ud/dqFVesIvgFt.cTMGCc0PCXvvD3SaopOj/3Oa', 'y0ezVyYQ6MbUi15h7xiawQ7G98Z2po50oDOnkT6N9LnfSZABvV5z2j8udxQ3', 1),
(5, 'coba', 'coba@gmail.com', '$2y$10$P7YDQchsn7L5PQmKLmN7S.05kkr9zJOoeMxAfSdk/HUIawCzzVmx.', '4bYY2m78myp8vSnkTY8yhBUigCdVKviHnmAehzrimitKv4XG50S1kaO8DiNF', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `base64`
--
ALTER TABLE `base64`
  ADD PRIMARY KEY (`base64_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- Indexes for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  ADD PRIMARY KEY (`pesanan_barang_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_invoice`
--
ALTER TABLE `status_invoice`
  ADD PRIMARY KEY (`status_invoice_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `base64`
--
ALTER TABLE `base64`
  MODIFY `base64_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  MODIFY `pesanan_barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_invoice`
--
ALTER TABLE `status_invoice`
  MODIFY `status_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
