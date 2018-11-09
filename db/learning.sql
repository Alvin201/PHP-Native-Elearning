-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 07:32 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(6) NOT NULL,
  `level` varchar(8) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`, `level`) VALUES
('ADM-0001', 'Qodir Mr', '123456', 'Admin'),
('ADM-0002', 'Wakhid Nur R', '123456', 'Guru IPA'),
('ADM-0003', 'Astri Devi R', '123456', 'Guru IPS'),
('ADM-0004', 'Peblian R', '123456', 'TU');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_tanya_jawab` int(11) NOT NULL,
  `id_admin` varchar(8) NOT NULL,
  `tgl_jawab` date NOT NULL,
  `jam_jawab` time NOT NULL,
  `jawaban` text NOT NULL,
  PRIMARY KEY (`id_jawaban`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_tanya_jawab`, `id_admin`, `tgl_jawab`, `jam_jawab`, `jawaban`) VALUES
(15, 19, 'adm-0003', '2016-01-25', '16:13:21', '<p>Maaf disini Bu Astri, Tidak ada Tugas Klipping kok :)</p>'),
(16, 20, 'adm-0003', '2016-01-25', '16:14:09', '<p>Ya, Makanya jangan suka ngasih jawaban ke temen yaa... Biar teman-temanmu belajar mandiri. oke ?</p>');

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE IF NOT EXISTS `latihan` (
  `nis` varchar(8) NOT NULL,
  `kode_soal` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`nis`, `kode_soal`, `nilai`) VALUES
('12123901', 'SL-0001', 80),
('12123902', 'SL-0002', 60),
('12123903', 'SL-0002', 60),
('12123902', 'SL-0001', 80),
('12123904', 'SL-0001', 80);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `kode_mapel` varchar(7) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_mapel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`kode_mapel`, `nama_mapel`) VALUES
('MP-0002', 'IPS'),
('MP-0001', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_soal` varchar(7) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` varchar(100) NOT NULL,
  `pilihan_b` varchar(100) NOT NULL,
  `pilihan_c` varchar(100) NOT NULL,
  `pilihan_d` varchar(100) NOT NULL,
  `kunci_jawaban` enum('A','B','C','D') NOT NULL,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `kode_soal`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `kunci_jawaban`) VALUES
(156, 'SL-0002', 'Jenis jenis nilai sosial menurut Notonegoro adalah?', 'Nilai Adat', 'Nilai Sosial', 'Nilai Hukum', 'Nilai Vital', 'D'),
(155, 'SL-0002', 'Merupakan pola perilaku yang diakui sebagai hal yang baik dan dijadikan hokum tidak tertulis dengan sanksi yang berat adalah?', 'Adat Istiadat', 'Norma Agama', 'Norma Kesusilaan', 'Norma Kesopanan', 'A'),
(154, 'SL-0002', 'Merupakan ketentuan yang berisi perintah maupun larangan yang ditetapkan berdasarkan kesepakatan bersama, disebut dengan?', 'Norma Sosial', 'Hukum Sosial', 'Interaksi Sosial', 'Hubungan Sosial', 'A'),
(153, 'SL-0002', 'Ciri-ciri Nilai Sosial, kecuali...', 'Dipelajari melalui sosialisasi', 'Disebarkan dari satu individu ke individu yang lain', 'Merupakan hasil interaksi antar pemerintah', 'Cenderung berkaitan antara yang satu dengan yang lain dan membentuk kesatuan nilai', 'C'),
(152, 'SL-0002', 'Dapat diartikan sebagai sesuatu yang baik, yang didinginkan, dicita-citakan, dan dianggap penting oleh warga masyarakat dan dijadikan dasar dalam menentukan apa yang baik, bernilai atau berharga, disebut dengan?', 'Nilai Sosial', 'Nilai Material', 'Nilai Hukum', 'Nilai Kepribadian', 'A'),
(150, 'SL-0001', 'Arti F dari rumus F = G + L dari varisi jenis keanekaragaman gen adalah? ', 'Feet', 'Foot ', 'Fenotip', 'Fenotop', 'C'),
(151, 'SL-0001', 'Contoh variasi jenis kelapa dari keanekaragaman gen adalah?', 'Kelapa Gading', 'Kelapa Muda', 'Kelapa Parut', 'Kelapa Tua', 'B'),
(149, 'SL-0001', 'Rumus membuat variasi Keanekaragaman tingkat tingkat gen adalah?', 'F = G + 1', 'F = G - 1', 'F = G * L', 'F = G + L', 'D'),
(148, 'SL-0001', 'Keanekaragaman ekosistem ditunjukan adanya?', 'Ekosistem di Biosfer', 'Ekosistem di Atmosfer', 'Ekosistem di Hutan Tropis', 'Ekosistem di Perairan', 'A'),
(147, 'SL-0001', 'Keanekaragaman hayati terbagi menjadi tiga tingkat, yaitu? kecuali...', 'Keanekaragaman gen', 'Keanekaragaman jenis (spesies)', 'Keanekaragaman ekosistem', 'Keanekaragaman persamaan', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` double NOT NULL,
  `password` varchar(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `kelas`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `no_telp`, `password`, `foto`) VALUES
('12123907', 'Sri Imanisa', 'X-2', 'P', '1992-01-02', 'Jl. Kemangi No .45 Jakarta', 85718617758, '1992-01-02', 'ima.jpg'),
('12123908', 'Saepul Alimi', 'X-3', 'L', '1992-01-03', 'Jl. Dan Mogot No. 11 Jakarta', 85718617759, '1992-01-03', 'ipul.jpg'),
('12123906', 'Ade Gigih Satriyo', 'X-2', 'L', '1992-01-01', 'Jl. Ambon No. 90 Jakarta', 85718617757, '1992-01-01', 'gigi.jpg'),
('12123905', 'Sarah Darmawangsa', 'X-2', 'P', '1991-12-31', 'Jl. Merah No. 11 Jakarta', 85718617756, '1991-12-31', 'sar.jpg'),
('12123904', 'Astri Devi Rahmayanti', 'X-1', 'P', '1991-12-30', 'Jl. Palmerah No. 89 Jakarta', 85718617755, '1991-12-30', 'Astri.jpg'),
('12123903', 'Peblian Rahmadani', 'X-1', 'P', '1991-12-29', 'Jl. Pahlawan No. 11 Jakarta', 85718617754, '1991-12-29', 'Peblian.jpg'),
('12123901', 'Qodir Masruri', 'X-1', 'L', '1991-12-27', 'Jl. Kemangi No. 22 Jakarta', 85718617752, '1991-12-27', 'Qodir.jpg'),
('12123902', 'Wakhid Nur Rohman', 'X-1', 'L', '1991-12-28', 'Jl. Irian No. 21 Jakarta', 85718617753, '1991-12-28', 'Wakhid.jpg'),
('12123909', 'Simon Peres', 'X-3', 'L', '1992-01-04', 'Jl. Medan Merdeka No. 09 Jakarta', 85718617760, '1992-01-04', 'simon.jpg'),
('12123910', 'Ayu Citra Anggraini', 'X-3', 'P', '1992-01-05', 'Jl. Kali Urang No. 23 Jakarta', 85718617761, '1992-01-05', 'ayu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `kode_soal` varchar(7) NOT NULL,
  `id_admin` varchar(8) NOT NULL,
  `kode_mapel` varchar(7) NOT NULL,
  `pertemuan` int(2) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jumlah_pertanyaan` int(1) NOT NULL,
  `modul` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_soal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`kode_soal`, `id_admin`, `kode_mapel`, `pertemuan`, `tgl_mulai`, `tgl_selesai`, `jumlah_pertanyaan`, `modul`) VALUES
('SL-0002', 'adm-0003', 'MP-0002', 1, '2016-01-24', '2016-01-31', 5, 'Nilai Dan Norma Sosial.pdf'),
('SL-0001', 'adm-0002', 'MP-0001', 1, '2015-12-25', '2016-01-31', 5, 'Keanekaragaman Hayati.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE IF NOT EXISTS `tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_topik` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam_posting` time NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_tanggapan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_topik`, `nis`, `tgl_posting`, `jam_posting`, `isi`) VALUES
(63, 43, '12123903', '2016-01-25', '16:17:06', '<p>Hid, Lu mau jurusan IPA atau IPS sih ?</p>'),
(64, 43, '12123902', '2016-01-25', '16:20:34', '<p>Belum tau peb, gw mah pinternya IPA. Bokap gw kan pengen gw jadi dokter, jadi kayaknya masuk IPA deh. </p>\r\n<p>Lu mau jurusan apa? <strong>Tata boga</strong> yaa? hahahahah</p>'),
(65, 43, '12123904', '2016-01-25', '16:22:06', '<p>Hahahaha, Peblian masuk tata boga aja bareng eyke... :p</p>'),
(66, 43, '12123901', '2016-01-25', '16:24:24', '<p>Heh, malah pada ngobrol disini :D</p>\r\n<p>Betewe thanks hid penambahan materinya :)</p>\r\n<p>&nbsp;</p>\r\n<p>Eh kalian udah pada ngerjain soal latihan belum? udah di upload tuh mah Ibu Astri dan Pak Wakhid :)</p>'),
(67, 43, '12123903', '2016-01-27', '22:59:14', '<p>suee ahh pada ngecengin gw...</p>\r\n<p>Qod, itu buat latihan doang kan yaaa ? ulangannya berarti minggu ini kan ?</p>'),
(62, 43, '12123902', '2016-01-25', '16:09:27', '<p><strong>Hukum Perbandingan Berganda (Hukum Dalton)</strong></p>\r\n<p style="text-align: justify;">Pada saat mengajukan hukum ini, rumus kimia senyawa belum diketahui. Hukum ini diajukan John Dalton, ahli kimia Inggris sekaligus penemu teori atom modern. Hukum ini menyebutkan bahwa jika massa salah satu unsur dalam dua senyawa sama, maka perbandingan massa unsur lainnya merupakan bilangan bulat dan sederhana.</p>\r\n<p style="text-align: justify;">Contohnya, perbandingan unsur karbon (C) dan oksigen (O) pada karbon monoksida dan karbon dioksida berurutan adalah 3:4 dan 3:8. Jika massa C adalah sama, maka perbandingan massa O pada karbon monoksida dan karbon dioksida adalah 4:8 atau 1:2.Komposisi kimia ditunjukkan oleh rumus kimianya. Dalam senyawa, seperti air, dua unsur bergabung masing-masing menyumbangkan sejumlah atom tertentu untuk membentuk suatu senyawa. Dari dua unsur dapat dibentuk beberapa senyawa dengan perbandingan berbeda-beda. Misalnya, belerang dengan oksigen dapat membentuk senyawa SO2 dan SO3. Dari unsur hidrogen dan oksigen dapat dibentuk senyawa H2O dan H2O2.</p>\r\n<p style="text-align: justify;">Perlu dicatat, bahwa hukum ini adalah pengembangan dari hukum Proust, walaupun ditemukan sebelum hukum Proust sendiri. Hukum ini juga menyatakan bahwa atom tidak dapat berbentuk pecahan seperti setengah, harus bilangan bulat. Hukum ini kuat karena didukung teori atom. Dalton menyelidiki perbandingan unsur-unsur tersebut pada setiap senyawa dan didapatkan suatu pola keteraturan. Pola tersebut dinyatakan sebagai hukum Perbandingan.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tanya_jawab`
--

CREATE TABLE IF NOT EXISTS `tanya_jawab` (
  `id_tanya_jawab` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `kategori` varchar(3) NOT NULL,
  `tgl_tanya` date NOT NULL,
  `jam_tanya` time NOT NULL,
  PRIMARY KEY (`id_tanya_jawab`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tanya_jawab`
--

INSERT INTO `tanya_jawab` (`id_tanya_jawab`, `nis`, `pertanyaan`, `kategori`, `tgl_tanya`, `jam_tanya`) VALUES
(19, '12123901', '<p>Permisi pak Wakhid, Mau nanyak dong Tugas Membuat klipingnya dikumpulin kapan yaa pak ?</p>', 'IPS', '2016-01-25', '16:02:24'),
(20, '12123902', '<p>Bu Astri, Ulangan saya kemarin kok remedi sih? Padahal saya udah belajar tekun loh...</p>', 'IPS', '2016-01-25', '16:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE IF NOT EXISTS `topik` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(3) NOT NULL,
  `judul_topik` varchar(100) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam_posting` time NOT NULL,
  `isi_topik` text NOT NULL,
  `jumlah_tanggapan` double NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `kategori`, `judul_topik`, `nis`, `tgl_posting`, `jam_posting`, `isi_topik`, `jumlah_tanggapan`) VALUES
(43, 'IPA', 'Hukum Dalton', '12123901', '2016-01-25', '15:59:20', '<p style="text-align: justify;"><img style="display: block; margin-left: auto; margin-right: auto;" src="../kcfinder/upload/image/Hukum%20Dalton.JPG" alt="" width="300" height="217" />Hukum dalam ilmu alam yang menyatakan bahwa tekanan total suatu campuran gas adalah sama dengan jumlah tekanan parsial dari masing-masing bagian gas. Tekanan parsial adalah tekanan yang akan dimiliki masing-masing gas bila berada sendiri &amp;lsquo;dalam volume seluruh campuran gas pada suhu yang sama. Hukum empirik ini diketemukan oleh ahli kimia Inggeris John Dalton, 1801. Hukum ini dapat diterangkan dengan menggunakan teori kinetik gas dengan anggapan bahwa gas bersifat ideal, yaitu memenuhi hukum Boyle-Gay Lusaac, dan tidak ada reaksi kimia antara bagian-bagian gas.</p>', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
