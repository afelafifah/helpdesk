-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 04:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kepala_desa` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`desa`, `kecamatan`, `kabupaten`, `kepala_desa`) VALUES
('MOJOMALANG', 'PARENGAN', 'TUBAN', 'KEPALA DESA SP.D');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_jabatan` varchar(30) DEFAULT NULL,
  `id_pegawai` varchar(30) DEFAULT NULL,
  `file` text,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_jabatan`, `id_pegawai`, `file`, `status`) VALUES
('000000001', '9879878978', 'update201608280143400000000019879878978.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` varchar(10) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `instansi`, `status`) VALUES
('000000001', 'Sekretariat Daerah', 1),
('000000002', 'Sekretariat Dewan Perwakilan Rakyat Daerah', 1),
('000000003', 'Staf Ahli Walikota', 1),
('000000004', 'Inspektorat', 1),
('000000005', 'Badan Perencanaan Pembangunan Daerah', 1),
('000000006', 'Badan Kepegawaian, Pendidikan Dan Pelatihan Daerah', 1),
('000000007', 'Badan Lingkungan Hidup', 1),
('000000008', 'Bapermas, PP, PA dan KB', 1),
('000000009', 'Badan Penanaman Modal dan Perizinan Terpadu', 1),
('000000010', 'Dinas Pendidikan Pemuda dan Olahraga', 1),
('000000012', 'Dinas Kesehatan', 1),
('000000013', 'Dinas Sosial Tenaga Kerja dan Transmigrasi', 1),
('000000014', 'Dinas Kependudukan dan Pencatatan Sipil', 1),
('000000015', 'Dinas Kebudayaan dan Pariwisata', 1),
('000000016', 'Dinas Pekerjaan Umum', 1),
('000000017', 'Dinas Tata Ruang Kota', 1),
('000000018', 'Dinas Kebersihan dan Pertamanan', 1),
('000000019', 'Dinas Koperasi dan Usaha Mikro Kecil Menengah', 1),
('000000020', 'Dinas Perindustrian dan Perdagangan', 1),
('000000021', 'Dinas Pengelolaan Pasar', 1),
('000000022', 'Dinas Pertanian', 1),
('000000023', 'Dinas Pendapatan, Pengelolaan Keuangan, dan Aset', 1),
('000000024', 'Dinas Komunikasi, Informatika, Statistik Dan Persandian', 1),
('000000025', 'Satuan Polisi Pamong Praja', 1),
('000000026', 'Kantor Arsip dan Perpustakaan Daerah', 1),
('000000027', 'Kantor Ketahanan Pangan', 1),
('000000028', 'Kantor Kesatuan Bangsa dan Politik', 1),
('000000029', 'Rumah Sakit Umum Daerah', 1),
('000000030', 'Kecamatan Jebres', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instansi_pegawai`
--

CREATE TABLE `instansi_pegawai` (
  `id_pegawai` varchar(50) DEFAULT NULL,
  `id_instansi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `instansi_pegawai`
--

INSERT INTO `instansi_pegawai` (`id_pegawai`, `id_instansi`) VALUES
('879678676', '000000002'),
('76798697786767', '000000002'),
('67575577667', '000000003'),
('9879878978', '000000002'),
('769878767', '000000024'),
('897980798', '000000002'),
('897980798', '000000003'),
('2147126947', '000000002'),
('12121212', '0');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(30) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `status`) VALUES
('000000001', 'Sekretaris Daerah', 1),
('000000002', 'Asisten Pemerintahan Dan Kesejahteraan Rakyat', 1),
('000000003', 'Asisten Ekonomi Dan Pembangunan', 1),
('000000004', 'Asisten Administrasi', 1),
('000000005', 'Kepala Biro Pemerintahan, Otonomi Daerah Dan Kerjasama', 1),
('000000006', 'Kepala Biro Perekonomian', 1),
('000000007', 'Kepala Biro Organisasi', 1),
('000000008', 'Kepala Dinas Komunikasi Dan Informatika', 1),
('000000009', 'Sekretaris', 1),
('000000010', 'Kabid Informasi Dan Komunikasi Publik', 1),
('000000011', 'Kabid Statistik', 1),
('000000012', 'Kabid Persandian Dan Keamanan Informasi', 1),
('000000013', 'Kasubbag Program', 1),
('000000014', 'Kasubbag Keuangan', 1),
('000000015', 'Kasi Pengembangan Aplikasi', 1),
('000000016', 'Sekretaris DPRD', 1),
('000000017', 'Kabag Umum', 1),
('000000018', 'Kabag Keuangan', 1),
('000000019', 'Kabag Humas', 1),
('000000020', 'Kabag Persidangan', 1),
('000000021', 'Kasubbag TU Dan Kepegawaian', 1),
('000000022', 'Kasubbag Rencana Program, Monitoring Dan Evaluasi', 1),
('000000023', 'Kasubbag Publikasi', 1),
('000000024', 'Kasubbag Rapat Dan Risalah', 1),
('000000025', 'Kasubbag Rumah Tangga', 1),
('000000026', 'Kasubbag Perbendaharaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_instansi`
--

CREATE TABLE `jabatan_instansi` (
  `id_jabatan` varchar(20) DEFAULT NULL,
  `id_instansi` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `jabatan_instansi`
--

INSERT INTO `jabatan_instansi` (`id_jabatan`, `id_instansi`, `status`) VALUES
('000000001', '000000001', 1),
('000000002', '000000001', 1),
('000000003', '000000001', 1),
('000000004', '000000001', 1),
('000000005', '000000001', 1),
('000000006', '000000001', 1),
('000000007', '000000001', 1),
('000000009', '000000024', 1),
('000000010', '000000024', 1),
('000000011', '000000024', 1),
('000000012', '000000024', 1),
('000000013', '000000024', 1),
('000000014', '000000024', 1),
('000000015', '000000024', 1),
('000000016', '000000002', 1),
('000000017', '000000002', 1),
('000000018', '000000002', 1),
('000000019', '000000002', 1),
('000000020', '000000002', 1),
('000000021', '000000002', 1),
('000000022', '000000002', 1),
('000000023', '000000002', 1),
('000000024', '000000002', 1),
('000000025', '000000002', 1),
('000000026', '000000002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `status`) VALUES
('000000001', 'Hardware', 1),
('000000002', 'Software', 1),
('000000003', 'xcxc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id_keluhan` varchar(100) NOT NULL,
  `keluhan` text,
  `id_pegawai` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id_keluhan`, `keluhan`, `id_pegawai`, `foto`, `status`) VALUES
('12121212', 'JL.LEY.SFAO', '000000004', '', 1),
('121212121212', 'RUSAK BRO', NULL, 'uploadfoto20180515020512121212121212.jpeg', 1),
('121312313', 'ASDASDASADADASDA\r\nDASDSADSADAD\r\nASDADADASD\r\nADASDAD', NULL, 'uploadfoto20180520235544121312313.jpeg', 1),
('123121', 'DSADA\r\n\r\nASDAD\r\nADA\r\nDA\r\nDA\r\nSD\r\nA\r\nD\r\nAS\r\nDA\r\nSDA\r\nDASD\r\nSA\r\nDA\r\nSD\r\nAS\r\nD\r\nSA\r\nDSAD\r\nASDA\r\nSDASD', NULL, 'uploadfoto20180520235148123121.jpeg', 1),
('12312312313', 'AADADASDSAADADA', NULL, 'uploadfoto2018051918255912312312313.jpeg', 1),
('1321321', 'DADADSADD\r\nADADADASD\r\nADSADADASDASDA\r\nDASDASDASDADAS\r\nDADADASDA', NULL, 'uploadfoto201805202353321321321.jpeg', 1),
('23', 'RUSAK MEN', NULL, 'uploadfoto2018051502042923.jpeg', 1),
('67575577667', 'DSN ALASTUWO ', '000000005', 'uploadfoto2016083006161467575577667.jpeg', 1),
('76798697786767', 'JALAN AHMAD YANI', '000000002', 'uploadfoto2016083006100676798697786767.jpeg', 1),
('769878767', 'JALAN SUROYO DINO', '000000003', 'uploadfoto20160830061254769878767.jpeg', 1),
('879678676', 'JALAN JALAN KE KOTA', '000000002', 'uploadfoto20160829182418879678676.jpeg', 1),
('897980798', 'JALAN AHMAD YANI', '000000004', 'uploadfoto20160830061438897980798.jpeg', 1),
('9879878978', 'JALAN BUNTU', '000000001', 'uploadfoto201608280140499879878978.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan1`
--

CREATE TABLE `keluhan1` (
  `id_keluhan` varchar(10) NOT NULL,
  `keluhan` varchar(30) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `keluhan1`
--

INSERT INTO `keluhan1` (`id_keluhan`, `keluhan`, `foto`, `status`) VALUES
('000001', 'Lambat', '', 1),
('000002', 'rusak', '', 1),
('000003', 'jhk', '', NULL),
('000004', 'sdgsd', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` varchar(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `deskripsi` text NOT NULL,
  `user_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `judul`, `tanggal`, `deskripsi`, `user_file`) VALUES
('112', 'coba kau pikirkan', '12112017', 'hanya bintang bintang hanya kaulah yang ku sayang', 'uploadfoto2016083006161467575577667.jpeg'),
('113', 'ARERRERE', '111213', ' AKU BISA', 'uploadfiless20180520234252113pdf'),
('114', 'CARA MEMBUAT PUDDING', '121212', '1. MASAK AIR\r\n2. MASUKKAN PUDDING INSTAN SACHET\r\n3. ADUK HINGGA MENGENTAL', 'uploadfiless20180521001033114.pdf'),
('12313', 'PELATIHAN BERBASIS WEB', '07/05/20', 'DASDADADA ', 'uploadfiless2018052100145612313.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(100) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` varchar(10) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` text,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `id_kategori` varchar(30) DEFAULT NULL,
  `id_tiket` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `golongan_darah`, `alamat`, `pekerjaan`, `kewarganegaraan`, `id_kategori`, `id_tiket`, `foto`, `status`) VALUES
('12121212', 'CACA', 'COLOMADU', '08/05/2018', 'Perempuan', 'B', 'JL.LEY.SFAO', 'SISWA', 'INDONESIA', '000000001', '000000004', '', 1),
('2147126947', 'GRACE GLORIA', 'SURAKARTA', '23/01/1997', 'Perempuan', 'B', 'JL. LET JEND.SUTOYO BUSUKAN', 'MAHASISWA', 'INDONESIA', '000000002', '000000002', 'uploadfoto201805011014542147126947.jpeg', 1),
('67575577667', 'SURYA DINATA', 'TUBAN', '12/09/1998', 'Laki-laki', 'AB', 'DSN ALASTUWO ', 'PNS', 'INDONESIA', '000000001', '000000005', 'uploadfoto2016083006161467575577667.jpeg', 1),
('76798697786767', 'CAMELIA', 'TUBAN', '12/09/1998', 'Perempuan', 'A', 'JALAN AHMAD YANI', 'IBU RUMAH TANGGA', 'INDONESIA', '000000001', '000000002', 'uploadfoto2016083006100676798697786767.jpeg', 1),
('769878767', 'FANA MAYA', 'BOJONEGORO', '12/08/1997', 'Laki-laki', 'AB', 'JALAN SUROYO DINO', 'PNS', 'INDONESIA', '000000001', '000000003', 'uploadfoto20160830061254769878767.jpeg', 1),
('879678676', 'ASAL COBA', 'TEMPAT LAHIR', '01/08/2016', 'Laki-laki', 'A', 'JALAN JALAN KE KOTA', 'PETANI', 'INDONESIA', '000000001', '000000002', 'uploadfoto20160829182418879678676.jpeg', 1),
('897980798', 'MUHAMMAD ROIISUL ABIDIN', 'TUBAN', '12/07/1998', 'Laki-laki', 'B', 'JALAN AHMAD YANI', '-', 'INDONESIA', '000000001', '000000004', 'uploadfoto20160830061438897980798.jpeg', 1),
('9879878978', 'TEJA PAKU ALAM', 'TUBAN', '01/08/1998', 'Laki-laki', 'A', 'JALAN BUNTU', 'PETANI', 'INDONESIA', '000000001', '000000001', 'uploadfoto201608280140499879878978.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `status` int(1) DEFAULT NULL,
  `id_pegawai` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `status`, `id_pegawai`, `level`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 1, '9879878978', 1),
(3, 'adm', 'b09c600fddc573f117449b3723f23d64', 1, '879678676', 2),
(4, 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 1, '897980798', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` varchar(20) NOT NULL,
  `no_tiket` varchar(50) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `tiket` varchar(30) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `no_tiket`, `rt`, `rw`, `tiket`, `status`) VALUES
('000000001', '76986987687687', '01', '02', '9879878978', '1'),
('000000002', '786978698768768', '09', '09', '879678676', '1'),
('000000003', '8907987897', '09', '08', '', '1'),
('000000004', '89798787', '08', '09', '897980798', '1'),
('000000005', '7698687967', '07', '08', '67575577667', '1'),
('000000006', '837592856', '23', '23', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`desa`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `keluhan1`
--
ALTER TABLE `keluhan1`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
