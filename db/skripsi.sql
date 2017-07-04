-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 12:05 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `user_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `agenda` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`user_id`, `year`, `month`, `agenda`) VALUES
(8, 2017, 5, 'tes agenda');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `tanggal_upload`, `nama_file`, `tipe_file`, `ukuran_file`, `file`) VALUES
(39, '2015-08-22', 'hallo', 'xlsx', '532309', 'files/hallo.xlsx'),
(38, '2015-08-15', 'ayuk', 'xlsx', '532309', 'files/ayuk.xlsx'),
(34, '2015-08-01', 'apel', 'xlsx', '149669', 'files/apel.xlsx'),
(35, '2015-08-01', 'jeruk', 'xls', '25088', 'files/jeruk.xls'),
(36, '2015-08-01', 'jambu', 'docx', '10184', 'files/jambu.docx'),
(37, '2015-08-01', 'sirsak', 'xls', '25088', 'files/sirsak.xls'),
(40, '2017-06-03', 'xxxxxx', 'xlsx', '0', 'files/xxxxxx.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `insentif_rupiah`
--

CREATE TABLE `insentif_rupiah` (
  `performance` int(5) NOT NULL,
  `insentif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insentif_rupiah`
--

INSERT INTO `insentif_rupiah` (`performance`, `insentif`) VALUES
(0, 0),
(75, 750000),
(76, 760000),
(77, 770000),
(78, 780000),
(79, 790000),
(80, 800000),
(81, 810000),
(82, 820000),
(83, 830000),
(84, 840000),
(85, 850000),
(86, 860000),
(87, 870000),
(88, 880000),
(89, 890000),
(90, 900000),
(91, 910000),
(92, 920000),
(93, 930000),
(94, 940000),
(95, 950000),
(96, 960000),
(97, 970000),
(98, 980000),
(99, 990000),
(100, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `kpiid` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `nama_kpi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`kpiid`, `productID`, `nama_kpi`) VALUES
(10, 1, 'Volume Penjualan Kredit BNI Flexi'),
(20, 2, 'Volume Penjualan Kredit Konsumer'),
(30, 3, 'Volume Penjualan BNI Kredit Pensiun'),
(40, 4, 'Volume Penjualan Kredit Konsumer'),
(50, 5, 'Pertumbuhan OUts & Target Total DPK'),
(60, 9, 'Jumlah aplikasi Kartu Kredit yang dibukukan'),
(70, 10, 'Jumlah rekening Kredit Konsumer yg dibukukan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_nama` varchar(32) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_level` varchar(1) NOT NULL,
  `user_status` varchar(1) NOT NULL DEFAULT '0',
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `user_nama`, `user_email`, `user_level`, `user_status`, `foto`) VALUES
(1, 'admin', 'bi5millah', 'administrator', 'admin@gmail.com', '1', '1', ''),
(2, 'analis', 'bi5millah123', 'analisator', 'analis@gmail.com', '2', '1', ''),
(3, 'pic', 'testing', 'pic wilayah', 'pic@gmail.com', '3', '1', ''),
(4, 'abcde', '12345', 'aaaaa', 'bbbb', '1', '1', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `officeID` int(11) NOT NULL,
  `office_type` varchar(3) NOT NULL,
  `office_name` varchar(200) NOT NULL,
  `address` varchar(8000) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `performances`
--

CREATE TABLE `performances` (
  `npp` varchar(7) NOT NULL,
  `kpiid` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `bobot` float DEFAULT NULL,
  `realisasi` float(22,2) DEFAULT NULL,
  `performance` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performances`
--

INSERT INTO `performances` (`npp`, `kpiid`, `year`, `month`, `bobot`, `realisasi`, `performance`) VALUES
('SC70001', 10, 2015, 5, 70, 27.27, 19),
('SC70001', 20, 2015, 5, 20, 10.00, 2),
('SC70001', 30, 2015, 5, 10, 333.33, 33),
('SC70002', 40, 2015, 2, 65, 100.00, 65),
('SC70002', 50, 2015, 2, 20, 100.00, 20),
('SC70002', 60, 2015, 2, 5, 100.00, 5),
('SC70002', 70, 2015, 2, 5, 100.00, 5),
('SC70003', 10, 2015, 4, 70, 50.00, 35),
('SC70003', 20, 2015, 4, 20, 66.67, 13),
('SC70003', 30, 2015, 4, 10, 45.45, 5),
('SC70004', 40, 2015, 1, 65, 0.00, 0),
('SC70004', 40, 2015, 2, 65, 0.00, 0),
('SC70004', 40, 2015, 3, 65, 0.00, 0),
('SC70004', 40, 2015, 4, 65, 0.00, 0),
('SC70004', 40, 2015, 5, 65, 0.00, 0),
('SC70004', 40, 2015, 6, 65, 0.00, 0),
('SC70004', 40, 2015, 7, 65, 0.00, 0),
('SC70004', 40, 2015, 8, 65, 0.00, 0),
('SC70004', 40, 2015, 9, 65, 0.00, 0),
('SC70004', 40, 2015, 10, 65, 0.00, 0),
('SC70004', 40, 2015, 11, 65, 0.00, 0),
('SC70004', 40, 2015, 12, 65, 0.00, 0),
('SC70004', 50, 2015, 1, 20, 0.00, 0),
('SC70004', 50, 2015, 2, 20, 0.00, 0),
('SC70004', 50, 2015, 3, 20, 0.00, 0),
('SC70004', 50, 2015, 4, 20, 0.00, 0),
('SC70004', 50, 2015, 5, 20, 0.00, 0),
('SC70004', 50, 2015, 6, 20, 0.00, 0),
('SC70004', 50, 2015, 7, 20, 0.00, 0),
('SC70004', 50, 2015, 8, 20, 0.00, 0),
('SC70004', 50, 2015, 9, 20, 0.00, 0),
('SC70004', 50, 2015, 10, 20, 0.00, 0),
('SC70004', 50, 2015, 11, 20, 0.00, 0),
('SC70004', 50, 2015, 12, 20, 0.00, 0),
('SC70004', 60, 2015, 1, 5, 0.00, 0),
('SC70004', 60, 2015, 2, 5, 0.00, 0),
('SC70004', 60, 2015, 3, 5, 0.00, 0),
('SC70004', 60, 2015, 4, 5, 0.00, 0),
('SC70004', 60, 2015, 5, 5, 0.00, 0),
('SC70004', 60, 2015, 6, 5, 0.00, 0),
('SC70004', 60, 2015, 7, 5, 0.00, 0),
('SC70004', 60, 2015, 8, 5, 0.00, 0),
('SC70004', 60, 2015, 9, 5, 0.00, 0),
('SC70004', 60, 2015, 10, 5, 0.00, 0),
('SC70004', 60, 2015, 11, 5, 0.00, 0),
('SC70004', 60, 2015, 12, 5, 0.00, 0),
('SC70004', 70, 2015, 1, 5, 0.00, 0),
('SC70004', 70, 2015, 2, 5, 0.00, 0),
('SC70004', 70, 2015, 3, 5, 0.00, 0),
('SC70004', 70, 2015, 4, 5, 0.00, 0),
('SC70004', 70, 2015, 5, 5, 0.00, 0),
('SC70004', 70, 2015, 6, 5, 0.00, 0),
('SC70004', 70, 2015, 7, 5, 0.00, 0),
('SC70004', 70, 2015, 8, 5, 0.00, 0),
('SC70004', 70, 2015, 9, 5, 0.00, 0),
('SC70004', 70, 2015, 10, 5, 0.00, 0),
('SC70004', 70, 2015, 11, 5, 0.00, 0),
('SC70004', 70, 2015, 12, 5, 0.00, 0),
('SC70005', 40, 2015, 1, 65, 0.00, 0),
('SC70005', 40, 2015, 2, 65, 0.00, 0),
('SC70005', 40, 2015, 3, 65, 0.00, 0),
('SC70005', 40, 2015, 4, 65, 0.00, 0),
('SC70005', 40, 2015, 5, 65, 0.00, 0),
('SC70005', 40, 2015, 6, 65, 0.00, 0),
('SC70005', 40, 2015, 7, 65, 0.00, 0),
('SC70005', 40, 2015, 8, 65, 0.00, 0),
('SC70005', 40, 2015, 9, 65, 0.00, 0),
('SC70005', 40, 2015, 10, 65, 0.00, 0),
('SC70005', 40, 2015, 11, 65, 0.00, 0),
('SC70005', 40, 2015, 12, 65, 0.00, 0),
('SC70005', 50, 2015, 1, 20, 0.00, 0),
('SC70005', 50, 2015, 2, 20, 0.00, 0),
('SC70005', 50, 2015, 3, 20, 0.00, 0),
('SC70005', 50, 2015, 4, 20, 0.00, 0),
('SC70005', 50, 2015, 5, 20, 0.00, 0),
('SC70005', 50, 2015, 6, 20, 0.00, 0),
('SC70005', 50, 2015, 7, 20, 0.00, 0),
('SC70005', 50, 2015, 8, 20, 0.00, 0),
('SC70005', 50, 2015, 9, 20, 0.00, 0),
('SC70005', 50, 2015, 10, 20, 0.00, 0),
('SC70005', 50, 2015, 11, 20, 0.00, 0),
('SC70005', 50, 2015, 12, 20, 0.00, 0),
('SC70005', 60, 2015, 1, 5, 0.00, 0),
('SC70005', 60, 2015, 2, 5, 0.00, 0),
('SC70005', 60, 2015, 3, 5, 0.00, 0),
('SC70005', 60, 2015, 4, 5, 0.00, 0),
('SC70005', 60, 2015, 5, 5, 0.00, 0),
('SC70005', 60, 2015, 6, 5, 0.00, 0),
('SC70005', 60, 2015, 7, 5, 0.00, 0),
('SC70005', 60, 2015, 8, 5, 0.00, 0),
('SC70005', 60, 2015, 9, 5, 0.00, 0),
('SC70005', 60, 2015, 10, 5, 0.00, 0),
('SC70005', 60, 2015, 11, 5, 0.00, 0),
('SC70005', 60, 2015, 12, 5, 0.00, 0),
('SC70005', 70, 2015, 1, 5, 0.00, 0),
('SC70005', 70, 2015, 2, 5, 0.00, 0),
('SC70005', 70, 2015, 3, 5, 0.00, 0),
('SC70005', 70, 2015, 4, 5, 0.00, 0),
('SC70005', 70, 2015, 5, 5, 0.00, 0),
('SC70005', 70, 2015, 6, 5, 0.00, 0),
('SC70005', 70, 2015, 7, 5, 0.00, 0),
('SC70005', 70, 2015, 8, 5, 0.00, 0),
('SC70005', 70, 2015, 9, 5, 0.00, 0),
('SC70005', 70, 2015, 10, 5, 0.00, 0),
('SC70005', 70, 2015, 11, 5, 0.00, 0),
('SC70005', 70, 2015, 12, 5, 0.00, 0),
('SC70006', 40, 2015, 1, 65, 0.00, 0),
('SC70006', 40, 2015, 2, 65, 0.00, 0),
('SC70006', 40, 2015, 3, 65, 0.00, 0),
('SC70006', 40, 2015, 4, 65, 0.00, 0),
('SC70006', 40, 2015, 5, 65, 0.00, 0),
('SC70006', 40, 2015, 6, 65, 0.00, 0),
('SC70006', 40, 2015, 7, 65, 0.00, 0),
('SC70006', 40, 2015, 8, 65, 0.00, 0),
('SC70006', 40, 2015, 9, 65, 0.00, 0),
('SC70006', 40, 2015, 10, 65, 0.00, 0),
('SC70006', 40, 2015, 11, 65, 0.00, 0),
('SC70006', 40, 2015, 12, 65, 0.00, 0),
('SC70006', 50, 2015, 1, 20, 0.00, 0),
('SC70006', 50, 2015, 2, 20, 0.00, 0),
('SC70006', 50, 2015, 3, 20, 0.00, 0),
('SC70006', 50, 2015, 4, 20, 0.00, 0),
('SC70006', 50, 2015, 5, 20, 0.00, 0),
('SC70006', 50, 2015, 6, 20, 0.00, 0),
('SC70006', 50, 2015, 7, 20, 0.00, 0),
('SC70006', 50, 2015, 8, 20, 0.00, 0),
('SC70006', 50, 2015, 9, 20, 0.00, 0),
('SC70006', 50, 2015, 10, 20, 0.00, 0),
('SC70006', 50, 2015, 11, 20, 0.00, 0),
('SC70006', 50, 2015, 12, 20, 0.00, 0),
('SC70006', 60, 2015, 1, 5, 0.00, 0),
('SC70006', 60, 2015, 2, 5, 0.00, 0),
('SC70006', 60, 2015, 3, 5, 0.00, 0),
('SC70006', 60, 2015, 4, 5, 0.00, 0),
('SC70006', 60, 2015, 5, 5, 0.00, 0),
('SC70006', 60, 2015, 6, 5, 0.00, 0),
('SC70006', 60, 2015, 7, 5, 0.00, 0),
('SC70006', 60, 2015, 8, 5, 0.00, 0),
('SC70006', 60, 2015, 9, 5, 0.00, 0),
('SC70006', 60, 2015, 10, 5, 0.00, 0),
('SC70006', 60, 2015, 11, 5, 0.00, 0),
('SC70006', 60, 2015, 12, 5, 0.00, 0),
('SC70006', 70, 2015, 1, 5, 0.00, 0),
('SC70006', 70, 2015, 2, 5, 0.00, 0),
('SC70006', 70, 2015, 3, 5, 0.00, 0),
('SC70006', 70, 2015, 4, 5, 0.00, 0),
('SC70006', 70, 2015, 5, 5, 0.00, 0),
('SC70006', 70, 2015, 6, 5, 0.00, 0),
('SC70006', 70, 2015, 7, 5, 0.00, 0),
('SC70006', 70, 2015, 8, 5, 0.00, 0),
('SC70006', 70, 2015, 9, 5, 0.00, 0),
('SC70006', 70, 2015, 10, 5, 0.00, 0),
('SC70006', 70, 2015, 11, 5, 0.00, 0),
('SC70006', 70, 2015, 12, 5, 0.00, 0),
('SC70010', 10, 2015, 1, 70, 0.00, 0),
('SC70010', 10, 2015, 2, 70, 0.00, 0),
('SC70010', 10, 2015, 3, 70, 0.00, 0),
('SC70010', 10, 2015, 4, 70, 0.00, 0),
('SC70010', 10, 2015, 5, 70, 0.00, 0),
('SC70010', 10, 2015, 6, 70, 0.00, 0),
('SC70010', 10, 2015, 7, 70, 0.00, 0),
('SC70010', 10, 2015, 8, 70, 0.00, 0),
('SC70010', 10, 2015, 9, 70, 0.00, 0),
('SC70010', 10, 2015, 10, 70, 0.00, 0),
('SC70010', 10, 2015, 11, 70, 0.00, 0),
('SC70010', 10, 2015, 12, 70, 0.00, 0),
('SC70010', 20, 2015, 1, 20, 0.00, 0),
('SC70010', 20, 2015, 2, 20, 0.00, 0),
('SC70010', 20, 2015, 3, 20, 0.00, 0),
('SC70010', 20, 2015, 4, 20, 0.00, 0),
('SC70010', 20, 2015, 5, 20, 0.00, 0),
('SC70010', 20, 2015, 6, 20, 0.00, 0),
('SC70010', 20, 2015, 7, 20, 0.00, 0),
('SC70010', 20, 2015, 8, 20, 0.00, 0),
('SC70010', 20, 2015, 9, 20, 0.00, 0),
('SC70010', 20, 2015, 10, 20, 0.00, 0),
('SC70010', 20, 2015, 11, 20, 0.00, 0),
('SC70010', 20, 2015, 12, 20, 0.00, 0),
('SC70010', 30, 2015, 1, 10, 0.00, 0),
('SC70010', 30, 2015, 2, 10, 0.00, 0),
('SC70010', 30, 2015, 3, 10, 0.00, 0),
('SC70010', 30, 2015, 4, 10, 0.00, 0),
('SC70010', 30, 2015, 5, 10, 0.00, 0),
('SC70010', 30, 2015, 6, 10, 0.00, 0),
('SC70010', 30, 2015, 7, 10, 0.00, 0),
('SC70010', 30, 2015, 8, 10, 0.00, 0),
('SC70010', 30, 2015, 9, 10, 0.00, 0),
('SC70010', 30, 2015, 10, 10, 0.00, 0),
('SC70010', 30, 2015, 11, 10, 0.00, 0),
('SC70010', 30, 2015, 12, 10, 0.00, 0),
('SC70012', 40, 2015, 1, 65, 0.00, 0),
('SC70012', 40, 2015, 2, 65, 0.00, 0),
('SC70012', 40, 2015, 3, 65, 0.00, 0),
('SC70012', 40, 2015, 4, 65, 0.00, 0),
('SC70012', 40, 2015, 5, 65, 0.00, 0),
('SC70012', 40, 2015, 6, 65, 0.00, 0),
('SC70012', 40, 2015, 7, 65, 0.00, 0),
('SC70012', 40, 2015, 8, 65, 0.00, 0),
('SC70012', 40, 2015, 9, 65, 0.00, 0),
('SC70012', 40, 2015, 10, 65, 0.00, 0),
('SC70012', 40, 2015, 11, 65, 0.00, 0),
('SC70012', 40, 2015, 12, 65, 0.00, 0),
('SC70012', 50, 2015, 1, 20, 0.00, 0),
('SC70012', 50, 2015, 2, 20, 0.00, 0),
('SC70012', 50, 2015, 3, 20, 0.00, 0),
('SC70012', 50, 2015, 4, 20, 0.00, 0),
('SC70012', 50, 2015, 5, 20, 0.00, 0),
('SC70012', 50, 2015, 6, 20, 0.00, 0),
('SC70012', 50, 2015, 7, 20, 0.00, 0),
('SC70012', 50, 2015, 8, 20, 0.00, 0),
('SC70012', 50, 2015, 9, 20, 0.00, 0),
('SC70012', 50, 2015, 10, 20, 0.00, 0),
('SC70012', 50, 2015, 11, 20, 0.00, 0),
('SC70012', 50, 2015, 12, 20, 0.00, 0),
('SC70012', 60, 2015, 1, 5, 0.00, 0),
('SC70012', 60, 2015, 2, 5, 0.00, 0),
('SC70012', 60, 2015, 3, 5, 0.00, 0),
('SC70012', 60, 2015, 4, 5, 0.00, 0),
('SC70012', 60, 2015, 5, 5, 0.00, 0),
('SC70012', 60, 2015, 6, 5, 0.00, 0),
('SC70012', 60, 2015, 7, 5, 0.00, 0),
('SC70012', 60, 2015, 8, 5, 0.00, 0),
('SC70012', 60, 2015, 9, 5, 0.00, 0),
('SC70012', 60, 2015, 10, 5, 0.00, 0),
('SC70012', 60, 2015, 11, 5, 0.00, 0),
('SC70012', 60, 2015, 12, 5, 0.00, 0),
('SC70012', 70, 2015, 1, 5, 0.00, 0),
('SC70012', 70, 2015, 2, 5, 0.00, 0),
('SC70012', 70, 2015, 3, 5, 0.00, 0),
('SC70012', 70, 2015, 4, 5, 0.00, 0),
('SC70012', 70, 2015, 5, 5, 0.00, 0),
('SC70012', 70, 2015, 6, 5, 0.00, 0),
('SC70012', 70, 2015, 7, 5, 0.00, 0),
('SC70012', 70, 2015, 8, 5, 0.00, 0),
('SC70012', 70, 2015, 9, 5, 0.00, 0),
('SC70012', 70, 2015, 10, 5, 0.00, 0),
('SC70012', 70, 2015, 11, 5, 0.00, 0),
('SC70012', 70, 2015, 12, 5, 0.00, 0),
('SC70013', 40, 2015, 1, 65, 0.00, 0),
('SC70013', 40, 2015, 2, 65, 0.00, 0),
('SC70013', 40, 2015, 3, 65, 0.00, 0),
('SC70013', 40, 2015, 4, 65, 0.00, 0),
('SC70013', 40, 2015, 5, 65, 0.00, 0),
('SC70013', 40, 2015, 6, 65, 0.00, 0),
('SC70013', 40, 2015, 7, 65, 0.00, 0),
('SC70013', 40, 2015, 8, 65, 0.00, 0),
('SC70013', 40, 2015, 9, 65, 0.00, 0),
('SC70013', 40, 2015, 10, 65, 0.00, 0),
('SC70013', 40, 2015, 11, 65, 0.00, 0),
('SC70013', 40, 2015, 12, 65, 0.00, 0),
('SC70013', 50, 2015, 1, 20, 0.00, 0),
('SC70013', 50, 2015, 2, 20, 0.00, 0),
('SC70013', 50, 2015, 3, 20, 0.00, 0),
('SC70013', 50, 2015, 4, 20, 0.00, 0),
('SC70013', 50, 2015, 5, 20, 0.00, 0),
('SC70013', 50, 2015, 6, 20, 0.00, 0),
('SC70013', 50, 2015, 7, 20, 0.00, 0),
('SC70013', 50, 2015, 8, 20, 0.00, 0),
('SC70013', 50, 2015, 9, 20, 0.00, 0),
('SC70013', 50, 2015, 10, 20, 0.00, 0),
('SC70013', 50, 2015, 11, 20, 0.00, 0),
('SC70013', 50, 2015, 12, 20, 0.00, 0),
('SC70013', 60, 2015, 1, 5, 0.00, 0),
('SC70013', 60, 2015, 2, 5, 0.00, 0),
('SC70013', 60, 2015, 3, 5, 0.00, 0),
('SC70013', 60, 2015, 4, 5, 0.00, 0),
('SC70013', 60, 2015, 5, 5, 0.00, 0),
('SC70013', 60, 2015, 6, 5, 0.00, 0),
('SC70013', 60, 2015, 7, 5, 0.00, 0),
('SC70013', 60, 2015, 8, 5, 0.00, 0),
('SC70013', 60, 2015, 9, 5, 0.00, 0),
('SC70013', 60, 2015, 10, 5, 0.00, 0),
('SC70013', 60, 2015, 11, 5, 0.00, 0),
('SC70013', 60, 2015, 12, 5, 0.00, 0),
('SC70013', 70, 2015, 1, 5, 0.00, 0),
('SC70013', 70, 2015, 2, 5, 0.00, 0),
('SC70013', 70, 2015, 3, 5, 0.00, 0),
('SC70013', 70, 2015, 4, 5, 0.00, 0),
('SC70013', 70, 2015, 5, 5, 0.00, 0),
('SC70013', 70, 2015, 6, 5, 0.00, 0),
('SC70013', 70, 2015, 7, 5, 0.00, 0),
('SC70013', 70, 2015, 8, 5, 0.00, 0),
('SC70013', 70, 2015, 9, 5, 0.00, 0),
('SC70013', 70, 2015, 10, 5, 0.00, 0),
('SC70013', 70, 2015, 11, 5, 0.00, 0),
('SC70013', 70, 2015, 12, 5, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL DEFAULT '0',
  `product_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `product_name`) VALUES
(1, 'BNI Fleksi'),
(2, 'BNI Kredit Pensiun'),
(3, 'BNI Griya'),
(4, 'Tabungan'),
(5, 'Giro'),
(6, 'Deposito'),
(7, 'BNI Griya'),
(8, 'BNI Fleksi'),
(9, 'Jumlah Kartu Kredit yang disetujui'),
(10, 'Number of Account Kredit Konsumer');

-- --------------------------------------------------------

--
-- Table structure for table `product_kpi`
--

CREATE TABLE `product_kpi` (
  `productID` int(11) NOT NULL,
  `kpiid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(8) NOT NULL,
  `produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_produk`, `produk`) VALUES
('PRD0001', 'ibu'),
('SC70001', 'apel'),
('SC70002', 'jeruk'),
('SC70003', '');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE `realisasi` (
  `npp` varchar(12) NOT NULL,
  `productID` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `nominal` float(30,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`npp`, `productID`, `year`, `month`, `nominal`) VALUES
('', 0, 0, 0, 213123121152.00),
('SC70001', 1, 2015, 5, 1000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `npp` varchar(9) NOT NULL,
  `sales_type` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `upliner` varchar(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `officeID` varchar(20) NOT NULL,
  `phone` int(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `npp`, `sales_type`, `nama`, `status`, `upliner`, `keterangan`, `alamat`, `officeID`, `phone`) VALUES
(8, 'SC70008', '', 'padang', 'aktif', '80808', 'test', 'testing', '1', 2147483647),
(9, 'SC70009', 'Lending', 'yuyu', 'non-aktif', '70701', 'coba', 'utan', '', 2147483647),
(10, 'SC70010', 'Fleksi', 'wwwww', 'aktif', '9090', 'kkk', 'kikiki', '3', 1111111111);

-- --------------------------------------------------------

--
-- Table structure for table `sales_insentif`
--

CREATE TABLE `sales_insentif` (
  `npp` varchar(12) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `performance` int(5) NOT NULL,
  `insentif` float(22,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_insentif`
--

INSERT INTO `sales_insentif` (`npp`, `year`, `month`, `performance`, `insentif`) VALUES
('SC70001', 2015, 5, 54, NULL),
('SC70002', 2015, 2, 95, 950000.00),
('SC70003', 2015, 4, 53, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_mentah`
--

CREATE TABLE `sales_mentah` (
  `npp` varchar(12) NOT NULL DEFAULT '',
  `sales_name` varchar(10) NOT NULL,
  `sales_type` varchar(20) NOT NULL,
  `officeID` int(11) NOT NULL,
  `activedate` datetime NOT NULL,
  `grade` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `upliner_npp` int(12) NOT NULL,
  `keterangan` varchar(8000) NOT NULL,
  `non_activedate` datetime NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `last_updatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_mentah`
--

INSERT INTO `sales_mentah` (`npp`, `sales_name`, `sales_type`, `officeID`, `activedate`, `grade`, `status`, `upliner_npp`, `keterangan`, `non_activedate`, `address`, `phone`, `last_updatetime`) VALUES
('SC70001', 'indah', 'FLEKSI', 1, '2015-06-08 00:00:00', 'trainee', 'aktif', 54321, 'sales baru', '2015-06-30 00:00:00', 'sragen', '08998108340', '0000-00-00 00:00:00'),
('SC70002', 'wahyu', 'LENDING', 1, '2015-06-08 00:00:00', 'trainee', 'aktif', 54321, 'sales baru', '2015-06-30 00:00:00', 'sragen', '08998108340', '2015-06-30 00:00:00'),
('SC70003', 'ari', 'FLEKSI', 1, '2015-06-08 00:00:00', 'trainee', 'aktif', 54321, 'sales baru', '2015-06-30 00:00:00', 'sragen', '08998108340', '0000-00-00 00:00:00'),
('SC70004', 'nugroho', 'LENDING', 1, '2015-06-08 00:00:00', 'trainee', 'aktif', 54321, 'sales baru', '2015-06-30 00:00:00', 'sragen', '08998108340', '2015-06-30 00:00:00'),
('SC70005', 'ekowati', 'LENDING', 1, '2015-06-08 00:00:00', 'trainee', 'aktif', 54321, 'sales baru', '2015-06-30 00:00:00', 'boyolali', '08998108340', '2015-06-30 00:00:00'),
('SC70006', 'kaka', 'LENDING', 1, '2015-06-08 00:00:00', 'trainee', 'aktif', 54321, 'sales baru', '2015-06-30 00:00:00', 'boyolali', '08998108340', '2015-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_npp`
--

CREATE TABLE `sales_npp` (
  `npp` varchar(10) NOT NULL,
  `sales_name` varchar(100) NOT NULL,
  `activedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_target`
--

CREATE TABLE `sales_target` (
  `npp` varchar(12) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `target` float(30,2) DEFAULT NULL,
  `realisasi` float(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_target`
--

INSERT INTO `sales_target` (`npp`, `year`, `month`, `productID`, `target`, `realisasi`) VALUES
('SC70001', 2015, 5, 1, 1100000000.00, 300000000.00),
('SC70001', 2015, 5, 2, 10.00, 1.00),
('SC70001', 2015, 5, 3, 30.00, 100.00),
('SC70002', 2015, 2, 4, 30000000.00, 30000000.00),
('SC70002', 2015, 2, 5, 300000.00, 300000.00),
('SC70002', 2015, 2, 6, 500000.00, 500000.00),
('SC70002', 2015, 2, 7, 400000.00, 400000.00),
('SC70002', 2015, 2, 8, 200000.00, 200000.00),
('SC70002', 2015, 2, 9, 5.00, 5.00),
('SC70002', 2015, 2, 10, 20.00, 20.00),
('SC70003', 2015, 4, 1, 10.00, 5.00),
('SC70003', 2015, 4, 2, 30.00, 20.00),
('SC70003', 2015, 4, 3, 1100000000.00, 500000000.00),
('SC70004', 2015, 3, 4, 100000000.00, 200000000.00),
('SC70004', 2015, 3, 5, 50000000.00, 500000.00),
('SC70004', 2015, 3, 6, 150000000.00, 1000000.00),
('SC70004', 2015, 3, 7, 900000000.00, 1000000000.00),
('SC70004', 2015, 3, 8, 200000000.00, 0.00),
('SC70004', 2015, 3, 9, 10.00, 5.00),
('SC70004', 2015, 3, 10, 30.00, 4.00),
('SC70005', 2015, 5, 4, 100000000.00, 200000000.00),
('SC70005', 2015, 5, 5, 50000000.00, 500000.00),
('SC70005', 2015, 5, 6, 150000000.00, 1000000.00),
('SC70005', 2015, 5, 7, 900000000.00, 1000000000.00),
('SC70005', 2015, 5, 8, 200000000.00, 0.00),
('SC70005', 2015, 5, 9, 10.00, 5.00),
('SC70005', 2015, 5, 10, 30.00, 4.00),
('SC70006', 2015, 10, 4, 100000000.00, 200000000.00),
('SC70006', 2015, 10, 5, 50000000.00, 500000.00),
('SC70006', 2015, 10, 6, 150000000.00, 1000000.00),
('SC70006', 2015, 10, 7, 900000000.00, 1000000000.00),
('SC70006', 2015, 10, 8, 200000000.00, 0.00),
('SC70006', 2015, 10, 9, 10.00, 5.00),
('SC70006', 2015, 10, 10, 30.00, 4.00),
('SC70007', 2015, 5, 4, 100000000.00, 200000000.00),
('SC70007', 2015, 5, 5, 50000000.00, 500000.00),
('SC70007', 2015, 5, 6, 150000000.00, 1000000.00),
('SC70007', 2015, 5, 7, 900000000.00, 1000000000.00),
('SC70007', 2015, 5, 8, 200000000.00, 0.00),
('SC70007', 2015, 5, 9, 10.00, 5.00),
('SC70007', 2015, 5, 10, 30.00, 4.00),
('SC70010', 2015, 3, 10, 30.00, 4.00),
('SC70012', 2015, 3, 4, 100000000.00, 50000000.00),
('SC70012', 2015, 3, 5, 50000000.00, 5000000.00),
('SC70012', 2015, 3, 6, 150000000.00, 3000000.00),
('SC70012', 2015, 3, 7, 900000000.00, 0.00),
('SC70012', 2015, 3, 8, 200000000.00, 0.00),
('SC70012', 2015, 3, 9, 10.00, 5.00),
('SC70012', 2015, 3, 10, 30.00, 4.00),
('SC70013', 2015, 3, 4, 100000000.00, 50000000.00),
('SC70013', 2015, 3, 5, 50000000.00, 5000000.00),
('SC70013', 2015, 3, 6, 150000000.00, 3000000.00),
('SC70013', 2015, 3, 7, 900000000.00, 0.00),
('SC70013', 2015, 3, 8, 200000000.00, 0.00),
('SC70013', 2015, 3, 9, 10.00, 5.00),
('SC70013', 2015, 3, 10, 30.00, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `temp_performance`
--

CREATE TABLE `temp_performance` (
  `npp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tes4`
--

CREATE TABLE `tes4` (
  `npp` int(10) NOT NULL,
  `year` int(6) NOT NULL,
  `month` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_kpi`
--

CREATE TABLE `tmp_kpi` (
  `SALES_TYPE` varchar(20) NOT NULL,
  `nama_kpi` varchar(100) NOT NULL,
  `BOBOT` int(11) NOT NULL,
  `kpiid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_kpi`
--

INSERT INTO `tmp_kpi` (`SALES_TYPE`, `nama_kpi`, `BOBOT`, `kpiid`) VALUES
('LENDING', 'Volume Penjualan Kredit Konsumer', 65, 40),
('LENDING', 'Pertumbuhan OUts & Target Total DPK', 20, 50),
('LENDING', 'Jumlah aplikasi Kartu Kredit yang dibukukan', 5, 60),
('LENDING', 'Jumlah rekening Kredit Konsumer yg dibukukan', 5, 70),
('FLEKSI', 'Volume Penjualan Kredit BNI Flexi', 70, 10),
('FLEKSI', 'Volume Penjualan Kredit Konsumer', 20, 20),
('FLEKSI', 'Volume Penjualan BNI Kredit Pensiun', 10, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`kpiid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`officeID`);

--
-- Indexes for table `performances`
--
ALTER TABLE `performances`
  ADD PRIMARY KEY (`npp`,`kpiid`,`year`,`month`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_kpi`
--
ALTER TABLE `product_kpi`
  ADD PRIMARY KEY (`productID`,`kpiid`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`npp`,`productID`,`year`,`month`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_insentif`
--
ALTER TABLE `sales_insentif`
  ADD PRIMARY KEY (`npp`,`year`,`month`);

--
-- Indexes for table `sales_mentah`
--
ALTER TABLE `sales_mentah`
  ADD PRIMARY KEY (`npp`);

--
-- Indexes for table `sales_target`
--
ALTER TABLE `sales_target`
  ADD PRIMARY KEY (`npp`,`year`,`month`,`productID`);

--
-- Indexes for table `tes4`
--
ALTER TABLE `tes4`
  ADD PRIMARY KEY (`npp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
