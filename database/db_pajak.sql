-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2014 at 05:46 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pajak`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('051d49c79953de9bf3777852cfb76be4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('05b3d98a9dc8c0f20d3b0edb64b40b68', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('166140a7840283e3877908a46484cce8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('1fe0eef6e000cbbe652809c66ef180b6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('20c572f2f22894688351bbbcce0b86ac', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('382d71142fb5e23b76d261618e5852c4', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('38db5075364da1c48ac3ac566bba88fe', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246799, ''),
('3ef30f1f1a1b3db78dafe0a2951975e1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('46d8fc2988b2f9e2a6146ae26a02d7ed', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('52cc2b5b4db753896807312967933488', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('5ebb035c66bb6615fd1f6dea9bd4589c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246799, ''),
('6b5fcbfd71b9bec29d19bc7121bde700', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('7b9acd32129eeede445f0c1ef2c39eab', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246799, ''),
('86d4cfd8ff1b7b3a7a23fa0e53b64c05', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246799, ''),
('8a02b451563555b70f7ba4ac0cf2d788', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('9aa10432f80ed3ce8ecf9b2738b293d2', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416247443, 'a:9:{s:9:"user_data";s:0:"";s:7:"loginid";s:1:"2";s:8:"username";s:4:"adin";s:8:"password";s:4:"adin";s:13:"nama_pengguna";s:10:"adin Pai73";s:4:"stts";s:5:"admin";s:12:"npwp_pilihan";s:20:"20.025.203.9-411.000";s:12:"nama_pilihan";s:17:"DKPP KOTA TANGSEL";s:14:"alamat_pilihan";s:15:"JL WITANA HARJA";}'),
('9c24f9bb326cc42f5c4aad98fc6d3cfc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('a3dac0bced07c59df35edc58c8329140', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246799, ''),
('b5bc64dca5404e7517705a5f37e20f4c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, 'a:9:{s:9:"user_data";s:0:"";s:7:"loginid";s:1:"2";s:8:"username";s:4:"adin";s:8:"password";s:4:"adin";s:13:"nama_pengguna";s:10:"adin Pai73";s:4:"stts";s:5:"admin";s:12:"npwp_pilihan";s:20:"71.157.929.2-014.000";s:12:"nama_pilihan";s:15:"Ahmad Alimuddin";s:14:"alamat_pilihan";s:19:"Jl Bangka V No. 28 ";}'),
('cf6bc826265574817f8c58a60ffc71bc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('dd45ed2d761db8191ea4841f9d3547fc', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246799, ''),
('e01410f96c1778caf6084ef654966251', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246799, ''),
('e90a45205a5c8d94533cb86ed588880a', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, ''),
('f24e74da86864f1b90a19f16e87cf54d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1416246798, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_belanja`
--

CREATE TABLE IF NOT EXISTS `tbl_belanja` (
  `belanjaid` int(2) NOT NULL AUTO_INCREMENT,
  `belanja` varchar(250) NOT NULL,
  `jpid` int(11) DEFAULT NULL,
  PRIMARY KEY (`belanjaid`),
  KEY `FK_tbl_belanja_tbl_jp` (`jpid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_belanja`
--

INSERT INTO `tbl_belanja` (`belanjaid`, `belanja`, `jpid`) VALUES
(1, 'Barang', 1),
(3, 'Jasa Konstruksi', 4),
(4, 'Jasa bukan konstruksi', 8),
(5, 'Sewa barang', 8),
(6, 'Sewa gedung / bangunan', 3),
(7, 'Jasa Catering', 8),
(8, 'Jasa Restaurant', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_transaksi` (
  `iddetail` int(10) NOT NULL,
  `jpid` int(3) NOT NULL,
  `nilai_pajak` double NOT NULL,
  `npwp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE IF NOT EXISTS `tbl_info` (
  `infoid` int(4) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `informasi` text NOT NULL,
  PRIMARY KEY (`infoid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jp`
--

CREATE TABLE IF NOT EXISTS `tbl_jp` (
  `jpid` int(4) NOT NULL AUTO_INCREMENT,
  `kd_akun` varchar(7) NOT NULL,
  `kd_jenis` varchar(3) NOT NULL,
  `nm_jenis` varchar(25) NOT NULL,
  `ket` varchar(125) NOT NULL,
  PRIMARY KEY (`jpid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_jp`
--

INSERT INTO `tbl_jp` (`jpid`, `kd_akun`, `kd_jenis`, `nm_jenis`, `ket`) VALUES
(1, '411211', '100', 'PPN', 'Setoran Masa PPN'),
(2, '411128', '402', 'PPh Pasal 4(2)', 'PPh Pasal 4 ayat (2) atas Pembelian Tanah dan/atau Bangunan'),
(3, '411128', '403', 'PPh Pasal 4(2)', 'PPh Pasal 4 ayat (2) Sewa Tanah dan/atau Bangunan'),
(4, '411128', '409', 'PPh Pasal 4(2)', 'PPh Pasal 4 ayat (2) Jasa Konstruksi'),
(5, '411121', '100', 'PPh Pasal 21', 'PPh Pasal 21 Rutin/Bulanan'),
(6, '411121', '402', 'PPh Pasal 21', 'PPh Pasal 21 Kegiatan'),
(7, '411122', '100', 'PPh Pasal 22', 'PPh Pasal 22 Pembelian Barang, Pengadaan ATK'),
(8, '411124', '100', 'PPh Pasal 23', 'PPh Pasal 23 Jasa dan Catering ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `loginid` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_pengguna` varchar(25) NOT NULL,
  `stts` varchar(10) NOT NULL,
  PRIMARY KEY (`loginid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`loginid`, `username`, `password`, `nama_pengguna`, `stts`) VALUES
(2, 'adin', 'adin', 'adin Pai73', 'admin'),
(3, 'admin', 'admin', 'Administrator', 'admin'),
(4, 'ali', 'ali', 'ali amakusa', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pejabat`
--

CREATE TABLE IF NOT EXISTS `tbl_pejabat` (
  `pejabatid` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `eselon` varchar(12) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`pejabatid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_pejabat`
--

INSERT INTO `tbl_pejabat` (`pejabatid`, `nama`, `nip`, `jabatan`, `eselon`, `status`) VALUES
(2, 'test', 'tets', 'test', 'test', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pp`
--

CREATE TABLE IF NOT EXISTS `tbl_pp` (
  `ppid` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `npwp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(25) NOT NULL,
  PRIMARY KEY (`ppid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_pp`
--

INSERT INTO `tbl_pp` (`ppid`, `nama`, `npwp`, `alamat`, `tlp`) VALUES
(1, 'DKPP Kota Tangsel', '20.025.203.9-411.000', 'JL. WITANA HARJA ', '9090909');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `kode_tr` int(4) NOT NULL,
  `masa_p` int(2) NOT NULL,
  `tahun_p` year(4) NOT NULL,
  `wpid` int(4) NOT NULL,
  `ppid` int(4) NOT NULL,
  `nilai_belanja` double NOT NULL,
  `tgl_manual` date NOT NULL,
  `tgl_otomatis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uraian` text NOT NULL,
  `pejabatid` int(1) NOT NULL,
  KEY `FK_tbl_transaksi_tbl_wp` (`wpid`),
  KEY `FK_tbl_transaksi_tbl_pp` (`ppid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wp`
--

CREATE TABLE IF NOT EXISTS `tbl_wp` (
  `wpid` int(4) NOT NULL AUTO_INCREMENT,
  `npwp` varchar(25) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`wpid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_wp`
--

INSERT INTO `tbl_wp` (`wpid`, `npwp`, `nama`, `alamat`) VALUES
(1, '71.157.929.2-014.000', 'Ahmad Alimuddin', 'Jl Bangka V No. 28 '),
(2, '20.025.203.9-411.000', 'DKPP KOTA TANGSEL', 'JL WITANA HARJA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_belanja`
--
ALTER TABLE `tbl_belanja`
  ADD CONSTRAINT `FK_tbl_belanja_tbl_jp` FOREIGN KEY (`jpid`) REFERENCES `tbl_jp` (`jpid`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `FK_tbl_transaksi_tbl_pp` FOREIGN KEY (`ppid`) REFERENCES `tbl_pp` (`ppid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tbl_transaksi_tbl_wp` FOREIGN KEY (`wpid`) REFERENCES `tbl_wp` (`wpid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
