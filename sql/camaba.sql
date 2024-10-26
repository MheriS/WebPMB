-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 08:53 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camaba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`) VALUES
(1, 'Heri', '123');

-- --------------------------------------------------------

--
-- Table structure for table `alur`
--

CREATE TABLE `alur` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(11) NOT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `biaya`) VALUES
(1, 100000),
(2, 120000),
(3, 150000),
(4, 155000);

-- --------------------------------------------------------

--
-- Table structure for table `diterima`
--

CREATE TABLE `diterima` (
  `id_diterima` varchar(50) NOT NULL,
  `id_hasil` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `nilai` float DEFAULT NULL,
  `id_maba` int(11) DEFAULT NULL,
  `Keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `nilai`, `id_maba`, `Keterangan`) VALUES
(1, 40, 2, 'Tidak Memenuhi');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode` varchar(50) NOT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `kegiatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode`, `tanggal`, `kegiatan`) VALUES
('J001', '1 - 30 April 2024', 'Pendaftaran'),
('J002', '5 Mei 2024', 'Ujian Masuk'),
('J003', '10 Mei 2024', 'Pengumuman Hasil Ujian'),
('J004', '12 - 15 Mei 2024', 'Daftar Ulang'),
('J005', '20 - 22 Mei 2024', 'Orientasi Mahasiswa Baru');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `id_biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `id_biaya`) VALUES
(1, 'Teknik Informatika', 3),
(3, 'Pendidikan Agama Islam', 1),
(4, 'Pendidikan Ilmu Pengetahuan Sosial', 1),
(5, 'Pendidikan Guru Madrasah Ibtidaiyah', 1),
(6, 'Pendidikan Bahasa Arab', 2),
(7, 'Pendidikan Islam Anak Usia Dini', 1),
(8, 'Manajemen Pendidikan Islam', 2),
(9, 'Tadris Bahasa Inggris', 2),
(10, 'Tadris Matematika', 2),
(11, 'al-Ahwal al-Syakhshiyyah', 1),
(12, 'Hukum Bisnis Syariâ€™ah', 2),
(13, 'Hukum Tata Negara', 2),
(14, 'Ilmu al-Qur\'an dan Tafsir', 3),
(15, 'Bahasa dan Sastra Arab', 2),
(16, 'Sastra Inggris', 2),
(17, 'Psikologi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `maba`
--

CREATE TABLE `maba` (
  `id_maba` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_biaya` int(11) DEFAULT NULL,
  `jeniskelamin` varchar(50) DEFAULT NULL,
  `tinggibadan` varchar(6) DEFAULT NULL,
  `beratbadan` varchar(6) DEFAULT NULL,
  `tmptlahir` varchar(15) DEFAULT NULL,
  `tgllahir` date NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `ktp` varchar(200) DEFAULT NULL,
  `ijazah` varchar(200) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `notlp` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maba`
--

INSERT INTO `maba` (`id_maba`, `nama`, `id_jurusan`, `id_biaya`, `jeniskelamin`, `tinggibadan`, `beratbadan`, `tmptlahir`, `tgllahir`, `foto`, `ktp`, `ijazah`, `email`, `kewarganegaraan`, `alamat`, `notlp`) VALUES
(2, 'MOH. HERI SUSANTO', 1, 3, 'Laki-Laki', '170', '78', 'Sumenep', '2000-10-21', 'blast2.jpg', 'BLAST1_055.jpg', 'BLAST2_074.jpg', '200605110087@student.uin-malang.ac.id', 'WNI', 'Bangkal', '085232008511');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id_panitia` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `nama`, `id_jurusan`, `password`) VALUES
('IDPN1', 'Heri', 1, '123');

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id` int(11) NOT NULL,
  `content` text,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id`, `content`, `created`) VALUES
(1, '<h1><strong>Persyaratan Pendaftaran Penerimaan Mahasiswa Baru (PMB)</strong></h1>\r\n\r\n<h2><strong>1. Umum</strong><br />\r\n- Calon mahasiswa harus warga negara Indonesia atau warga negara asing yang memenuhi persyaratan.<br />\r\n- Memiliki kemampuan fisik dan mental yang baik.</h2>\r\n\r\n<h2><strong>2. Dokumen Persyaratan</strong><br />\r\n- **Formulir Pendaftaran**: Mengisi formulir pendaftaran yang disediakan oleh panitia.<br />\r\n- **Fotokopi Ijazah**: Menyertakan fotokopi ijazah pendidikan terakhir (SMA/SMK atau yang setara).<br />\r\n- **Transkrip Nilai**: Menyertakan fotokopi transkrip nilai yang telah dilegalisir.<br />\r\n- **Pas Foto**: Menyertakan pas foto terbaru ukuran 3x4 sebanyak 2 lembar.<br />\r\n- **KTP/SIM**: Menyertakan fotokopi Kartu Tanda Penduduk (KTP) atau Surat Izin Mengemudi (SIM) yang masih berlaku.<br />\r\n- **Surat Keterangan Sehat**: Menyertakan surat keterangan sehat dari dokter.</h2>\r\n\r\n<h2><strong>3. Persyaratan Akademis</strong><br />\r\n- Lulusan SMA/SMK atau yang setara dengan nilai minimum tertentu (misalnya, rata-rata nilai Ujian Nasional atau nilai ujian akhir).<br />\r\n- Bagi calon mahasiswa yang sudah berpengalaman kerja, dapat menyertakan surat keterangan pengalaman kerja.</h2>\r\n\r\n<h2><strong>4. Persyaratan Khusus (Jika Ada)</strong><br />\r\n- Untuk program studi tertentu, mungkin ada persyaratan tambahan seperti:<br />\r\n&nbsp; - Mengikuti ujian seleksi masuk (jika diperlukan).<br />\r\n&nbsp; - Mengikuti wawancara.<br />\r\n&nbsp; - Mengumpulkan portfolio (khusus untuk program studi seni atau desain).</h2>\r\n\r\n<h2><strong>5. Batas Waktu Pendaftaran</strong><br />\r\n- Pendaftaran dibuka dari [tanggal mulai] hingga [tanggal berakhir]. Pastikan semua dokumen lengkap dan diserahkan sebelum batas waktu pendaftaran.</h2>\r\n\r\n<h2><strong>6. Biaya Pendaftaran</strong><br />\r\n- Calon mahasiswa diwajibkan membayar biaya pendaftaran sebesar [jumlah biaya] yang dapat dibayarkan melalui [metode pembayaran yang diterima].<br />\r\n&nbsp;</h2>\r\n', '2024-10-26 12:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `selesai_bayar`
--

CREATE TABLE `selesai_bayar` (
  `id_selesai_bayar` varchar(50) NOT NULL,
  `id_maba` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `univ` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selesai_bayar`
--

INSERT INTO `selesai_bayar` (`id_selesai_bayar`, `id_maba`, `biaya`, `univ`, `tanggal`, `password`) VALUES
('1', 2, 150000, 'UNIVERSITAS ISLAM NEGERI MAULANA MALIK IBRAHIM MALANG', '2024-10-15 00:00:00', '123');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `soal` varchar(500) DEFAULT NULL,
  `jawaban_A` varchar(500) DEFAULT NULL,
  `jawaban_B` varchar(500) DEFAULT NULL,
  `jawaban_C` varchar(500) DEFAULT NULL,
  `jawaban_D` varchar(500) DEFAULT NULL,
  `jawaban_E` varchar(500) DEFAULT NULL,
  `jawaban` enum('a','b','c','d','e') DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `soal`, `jawaban_A`, `jawaban_B`, `jawaban_C`, `jawaban_D`, `jawaban_E`, `jawaban`, `id_jurusan`) VALUES
(1, 'Apa yang dimaksud dengan cloud computing?', 'Penyimpanan data di perangkat lokal', 'Pengolahan data yang dilakukan secara offline', 'Penggunaan jaringan internet untuk mengakses dan menyimpan data di server remote', 'Instalasi perangkat lunak di komputer pribadi', 'Penyimpanan data di dalam hard disk komputer', 'c', 1),
(2, 'Apa tujuan utama dari sistem manajemen basis data (DBMS)?', 'Mengurangi ukuran data yang disimpan', 'Memudahkan pengolahan data secara manual', 'Mengelola, menyimpan, dan mengakses data secara efisien', 'Menghindari penggunaan SQL dalam pemrograman', 'Meningkatkan kecepatan akses internet', 'c', 1),
(3, 'Bahasa pemrograman mana yang paling umum digunakan untuk pengembangan aplikasi web?', 'Java', 'Python', 'C++', 'PHP', 'Assembly', 'd', 1),
(4, 'Apa yang dimaksud dengan cybersecurity?', 'Perlindungan perangkat keras dari kerusakan', 'Perlindungan sistem komputer dan jaringan dari ancaman digital', 'Penggunaan firewall untuk mengamankan data', 'Proses penghapusan virus dari perangkat', 'Pengembangan perangkat lunak tanpa kesalahan', 'b', 1),
(5, 'Apa fungsi dari router dalam jaringan komputer?', 'Menghubungkan perangkat dalam jaringan lokal', 'Mengatur dan mengarahkan lalu lintas data antar jaringan', 'Menyimpan data secara permanen', 'Mengonversi sinyal analog menjadi digital', 'Meningkatkan kecepatan internet', 'b', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alur`
--
ALTER TABLE `alur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `diterima`
--
ALTER TABLE `diterima`
  ADD PRIMARY KEY (`id_diterima`),
  ADD KEY `id_lulus` (`id_hasil`) USING BTREE;

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_selesai_bayar` (`id_maba`) USING BTREE;

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_biaya` (`id_biaya`);

--
-- Indexes for table `maba`
--
ALTER TABLE `maba`
  ADD PRIMARY KEY (`id_maba`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `FK_maba_biaya` (`id_biaya`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id_panitia`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selesai_bayar`
--
ALTER TABLE `selesai_bayar`
  ADD PRIMARY KEY (`id_selesai_bayar`) USING BTREE,
  ADD KEY `id_maba` (`id_maba`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alur`
--
ALTER TABLE `alur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `maba`
--
ALTER TABLE `maba`
  MODIFY `id_maba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
