-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 09:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_homestay`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` char(60) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_pemilik`, `email`, `phone`, `password`, `tgl_daftar`) VALUES
(1, 'admin', 'admin@gmail.com', '14045', '$2y$10$qvMu8V2E//2SJyZ2VZSFwu/UcY3wM0DPL1xUy/I9Hx8b2K0H2moLa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_homestay` int(10) UNSIGNED NOT NULL,
  `kamar_tidur` int(10) UNSIGNED NOT NULL,
  `tempat_tidur` int(10) UNSIGNED NOT NULL,
  `kamar_mandi` int(10) UNSIGNED NOT NULL,
  `tv` tinyint(1) NOT NULL,
  `ac_kipasAngin` tinyint(1) NOT NULL,
  `wifi` tinyint(1) NOT NULL,
  `sarapan` tinyint(1) NOT NULL,
  `tempat_parkir` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `id_homestay`, `kamar_tidur`, `tempat_tidur`, `kamar_mandi`, `tv`, `ac_kipasAngin`, `wifi`, `sarapan`, `tempat_parkir`) VALUES
(1, 1, 1, 2, 1, 1, 1, 1, 0, 1),
(2, 2, 2, 1, 1, 1, 1, 1, 1, 1),
(3, 3, 2, 2, 2, 1, 1, 1, 0, 0),
(4, 4, 3, 1, 1, 0, 0, 1, 0, 1),
(5, 5, 2, 2, 2, 1, 1, 1, 0, 1),
(6, 6, 2, 1, 2, 1, 1, 1, 0, 1),
(7, 7, 4, 1, 4, 0, 0, 1, 1, 1),
(8, 8, 3, 1, 3, 1, 1, 1, 0, 1),
(9, 9, 5, 1, 5, 1, 1, 0, 0, 0),
(10, 10, 1, 1, 1, 1, 1, 0, 0, 1),
(11, 11, 12, 1, 12, 1, 1, 0, 0, 1),
(12, 12, 8, 1, 8, 1, 1, 1, 1, 1),
(13, 13, 2, 1, 1, 1, 1, 0, 0, 1),
(14, 14, 4, 2, 4, 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `homestay`
--

CREATE TABLE `homestay` (
  `id_homestay` int(11) UNSIGNED NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_homestay` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `alamat1` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `fasilitas` float NOT NULL,
  `jarak` float NOT NULL,
  `akses_jalan` float NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homestay`
--

INSERT INTO `homestay` (`id_homestay`, `id_akun`, `nama_homestay`, `alamat`, `alamat1`, `kode_pos`, `harga`, `fasilitas`, `jarak`, `akses_jalan`, `rating`) VALUES
(1, 1, 'Herman Homestay Prambanan', 'Jalan Aster No 3 Klurak Baru RT 02 RW 04 Bokoharjo Prambanan Sleman Yogyakarta 55572, Prambanan, Yogyakarta, Indonesia, 55572', 'Prambanan, Yogyakarta', '55572', 350000, 8.3, 1.6, 8.6, 8.8),
(2, 1, 'Rumah Desa Homestay', 'Ngangkruk Baru, Gang Akasia, No 51, Rt 25, Rw 08, Tlogo, Prambanan, Klaten, 57454 Prambanan, Indonesia', 'Prambanan, Yogyakarta', '57454', 445500, 9.2, 1.7, 7.2, 9.4),
(3, 1, 'OYO 3846 Rumah Prambanan Syariah', 'Jalan Yogyakarta - Solo KM. 21, Dusun Tegal Borong, Desa Kemudo, Tegalbarong, Kec, Kec. Prambanan, Kabupaten Klaten, Jawa Tengah 57454', 'Prambanan, Yogyakarta', '57454', 234905, 8.3, 3.8, 5.8, 7.7),
(4, 1, 'Maqmil Homestay', 'Jalan Raya Piyungan KM 0,5, 55572 Prambanan, Indonesia', 'Prambanan, Yogyakarta', '55572', 90000, 7, 1.5, 9, 7.2),
(5, 1, 'Star Homestay Prambanan', 'Klurak Baru RT 01/04 Bokoharjo, 55572 Prambanan, Indonesia', 'Prambanan, Yogyakarta', '55572', 337500, 8.1, 1.4, 8.6, 8.6),
(6, 1, 'Henny Homestay Prambanan', 'klurak baru, Klurak Baru, Bokoharjo, Prambanan, Sleman Regency, Daerah Istimewa Yogyakarta 55572', 'Prambanan, Yogyakarta', '55572', 174000, 5, 1.3, 8.4, 9.6),
(7, 1, 'The Temple Homestay', 'Jalan Mawar Kadirojo 2, RT 05/ RW 02, Purwomartani, Kalasan, Sleman, 55571 Yogyakarta, Indonesia ', 'Kalasan, Yogyakarta', '55571', 1268176, 5, 6.1, 7.2, 9.2),
(8, 1, 'Opak Homestay Syariah', 'Jl. Opak Raya, Jirak, Bokoharjo, Kec. Prambanan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55572', 'Prambanan, Yogyakarta', '55572', 181500, 5, 4.6, 6.4, 9.8),
(9, 1, 'Algira Homestay Prambanan', 'Pemukti Baru Rt 12 Rw 04 Tlogo Prambanan, 57454 Klaten, Indonesia', 'Prambanan, Yogyakarta', '57454', 916988, 5, 1.6, 6.4, 10),
(10, 1, 'RedDoorz near Candi Ratu Boko', 'Jl. Raya Piyungan - Prambanan, Ringin Sari, Bokoharjo, Kec. Prambanan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55572', 'Prambanan, Yogyakarta', '55572', 140400, 6.2, 4.1, 7.2, 6.5),
(11, 1, 'Homestay Damandiri Prambanan', 'Jalan karangmojo RT.001/RW.01, Karang Mojo, Karan, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571, Indonesia', 'Kalasan, Yogyakarta', '55571', 268182, 2, 1.4, 8.6, 6.4),
(12, 1, 'Surya Darma Homestay', 'Jl. Griya Permata Hijau, Juwangen, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571, Indonesia', 'Kalasan, Yogyakarta', '55571', 152000, 8.6, 7.5, 8.6, 8.8),
(13, 1, 'East Maguwoharjo Homestay Jogja', 'Perumahan Royal Maguwoharjo, Maguwoharjo Depok, Sleman, Yogyakarta, Sanggrahan, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Jawa Tengah 55282', 'Maguwoharjo, Yogyakarta', '55282', 270000, 6.9, 11.4, 7, 7.5),
(14, 1, 'Homestay Cokro Hansaziel', 'Jarakan, RT.03/RW.11, Jarakan, Tirtomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571', 'Kalasan, Yogyakarta', '55571', 250000, 5, 5.2, 5, 9.8),
(15, 0, 'nama', '44555', 'alamat', 'lokasi', 3465, 5, 1.4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `id_homestay` int(11) UNSIGNED NOT NULL,
  `lintang` float(10,6) DEFAULT NULL,
  `bujur` float(10,6) DEFAULT NULL,
  `gbr_dpn` varchar(2083) DEFAULT NULL,
  `gbr_tgh` varchar(2083) DEFAULT NULL,
  `gbr_blkg` varchar(2083) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `id_homestay`, `lintang`, `bujur`, `gbr_dpn`, `gbr_tgh`, `gbr_blkg`) VALUES
(1, 1, -7.759099, 110.488815, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/214390720.jpg?k=1406703abfd9aedc80e5a2dfd589225b2b50fc923dcbb7e9cb4c93519f80481f&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/214390729.jpg?k=69d2cd4778798030cbaf9e229c44f3599e13d10cd28139e8c3c72a0fb793bc68&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/231304996.jpg?k=7f51e124efea0a4e39117d935dc18a2051b5dce4ae36cec5a0449bb487eda998&o=&hp=1'),
(2, 2, -7.746769, 110.495834, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/219398649.jpg?k=234c9d03097e89205181268450df7ecae0695b1ebe58dd8d873184bf1b12f7c7&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/219463181.jpg?k=1789528dc8aaeb3c8044eff7dad2c5c30f5b0e7f3cc26c039a0222fca480d6ad&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/219418742.jpg?k=e6fe54873b030b4dce951e93df59ded60123fc955244922fdd4d495a4f9f224e&o=&hp=1'),
(3, 3, -7.746244, 110.524498, 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20042467-5b783b4a1b642b72e8e5a161215046f6.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20042467-6a699134728df88a72aa1121c3bb619a.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20042467-793a716bdc3e63c33a93c36a87c3c4fc.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit'),
(4, 4, -7.758015, 110.489082, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/89821066.jpg?k=fcf1e4626c7830cef3a8b584ab8e403f55303467a3c38a905914723b09a25598&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/124175153.jpg?k=3a655c3357800197258504521828dc26a12cc7b473c184a9f8655b312b27627e&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/124143736.jpg?k=70bf06fb4fa18d1dee447821664ea93fb52a2d19cc3bf5d481794a1be549a291&o=&hp=1'),
(5, 5, -7.757787, 110.489304, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/93733610.jpg?k=db739b7e5ce84a3aeb0ad421f88b5ca702511fd2b223a5766ab54e3e4945f57b&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/91899376.jpg?k=56228bbb6fa66518381bee530b565a11f0c837b005372b181893365526692778&o=&hp=1', 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/150548749.jpg?k=86742883ebcdf75daed9bab1529e5d7a15bf694ad2ebe33342c436110490aca8&o=&hp=1'),
(6, 6, -7.759672, 110.490654, 'https://a0.muscache.com/im/pictures/4f74c351-680c-4be9-b272-dbbce25f1878.jpg?im_w=720', 'https://a0.muscache.com/im/pictures/95675f37-d68b-4a5e-a62a-7a7b303e528c.jpg?im_w=1440', 'https://a0.muscache.com/im/pictures/5c06c91a-a26d-42b1-b553-fc6ea153c1e8.jpg?im_w=1440'),
(7, 7, -7.767144, 110.450813, 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67738548-1280x720-FIT_AND_TRIM-0633ae3fe4070e0b7d7e1a5548ff6d42.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67738548-3000x1688-FIT_AND_TRIM-b4a40ed390323cc09ef27a5c9720640f.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/67738548-3000x1688-FIT_AND_TRIM-64e146f450593eccc736a2270c054b42.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit'),
(8, 8, -7.779400, 110.475311, 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/224578429.jpg?k=e751e62e464854d15d524db4bc082cba7c0a246699296b94432c6ed7989ee920&o=&hp=1', 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/228596316.jpg?k=82b97085e1358182191af5ab815efd7a94f32ec20e63fbc5b9a6964df0412687&o=&hp=1', 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/228595319.jpg?k=81058e6372de5eabff35ecb06c96017ab39c6616ed32ec987609851b96943ea5&o=&hp=1'),
(9, 9, -7.751236, 110.499626, 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/329596958.jpg?k=53b25b8fa323d2052e6eabfab1baab1b501f2c806676b0a78bd124b643db7ab6&o=&hp=1', 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/329597006.jpg?k=20a480d5e3ce5b1054a1f993e06c8fdc879f9065d98e618a8d4009a6bf998ac3&o=&hp=1', 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/329602251.jpg?k=78345596c8967a3b9b72141c84fe36125df63749900be975424ec663cf20d441&o=&hp=1'),
(10, 10, -7.779732, 110.482353, 'https://dgov63yz6bnpt.cloudfront.net/photos/119873/desktop_hotel_gallery_large_900x600_3b3257a8-0af6-4de2-b84e-9c4032192ddf_2F508a4c80-cf9e-4979-a4f4-8f3088e9a12d_2FIMG_5205.jpg', 'https://dgov63yz6bnpt.cloudfront.net/photos/119882/desktop_hotel_gallery_large_900x600_0726e79a-b7e5-4217-9683-fcf5cdf92474_2F508a4c80-cf9e-4979-a4f4-8f3088e9a12d_2FIMG_5198.jpg', 'https://dgov63yz6bnpt.cloudfront.net/photos/119872/desktop_hotel_gallery_large_900x600_568a3623-5070-4947-be90-a7d6fe4d71d6_2Fd806857b-86ca-4640-9bc5-b2588f6b14b8_2FIMG_5092.jpg'),
(11, 11, -7.752097, 110.484978, 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20051442-457039cec491d619e9623104f1d66574.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20051442-494edc009536682a001ad8386e1c9032.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20051442-176850cb773b441c52fefe22bcdb69dd.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit'),
(12, 12, -7.781894, 110.444717, 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/12393892.jpg?k=3dd724ded888256d1933f18aa903f11cc001c1e6a93447870bf1aaa6cb00172b&o=&hp=1', 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/12384735.jpg?k=f8bcff08c4bba45762868cc72253a28cdb62ce6e5676cdac75c2a2b4aac26659&o=&hp=1', 'https://t-cf.bstatic.com/xdata/images/hotel/max1280x900/12380126.jpg?k=a3c97016d7d486bf447d8778157ccbaa1b3b43996a42829692d383e9bbc88d84&o=&hp=1'),
(13, 13, -7.767868, 110.426292, 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20011023-d49610775e52a401bf1869c40b530e47.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20011023-ff51744ef672a24a0a0c50f4b195021c.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit', 'https://ik.imagekit.io/tvlk/apr-asset/dgXfoyh24ryQLRcGq00cIdKHRmotrWLNlvG-TxlcLxGkiDwaUSggleJNPRgIHCX6/hotel/asset/20011023-89805991557b8719da05ecafd8532a4c.jpeg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit'),
(14, 14, -7.778045, 110.465706, 'https://www.sewakost.com/files/03-2019/ad22318/homestay-cokro-205031621_large.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pencarian`
--

CREATE TABLE `pencarian` (
  `id_cari` int(10) UNSIGNED NOT NULL,
  `tgl_cari` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `harga_bawah` int(10) UNSIGNED NOT NULL,
  `harga_atas` int(10) UNSIGNED NOT NULL,
  `fasilitas_bawah` float UNSIGNED NOT NULL,
  `fasilitas_atas` float UNSIGNED NOT NULL,
  `jarak_bawah` float UNSIGNED NOT NULL,
  `jarak_atas` float UNSIGNED NOT NULL,
  `akses_bawah` float UNSIGNED NOT NULL,
  `akses_atas` float UNSIGNED NOT NULL,
  `rating_bawah` float UNSIGNED NOT NULL,
  `rating_atas` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(10) UNSIGNED NOT NULL,
  `id_homestay` int(10) UNSIGNED NOT NULL,
  `nama_penyewa` varchar(50) NOT NULL,
  `id_penyewa` varchar(20) NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `status_bayar` tinyint(1) NOT NULL,
  `rating_fasilitas` float UNSIGNED DEFAULT NULL,
  `rating_AksesJalan` float UNSIGNED DEFAULT NULL,
  `total_rating` float UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `FK_HomestayFasilitas` (`id_homestay`);

--
-- Indexes for table `homestay`
--
ALTER TABLE `homestay`
  ADD PRIMARY KEY (`id_homestay`),
  ADD KEY `FK_AkunHomestay` (`id_akun`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `FK_HomestayLokasi` (`id_homestay`);

--
-- Indexes for table `pencarian`
--
ALTER TABLE `pencarian`
  ADD PRIMARY KEY (`id_cari`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `FK_HomestaySewa` (`id_homestay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `homestay`
--
ALTER TABLE `homestay`
  MODIFY `id_homestay` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `FK_HomestayFasilitas` FOREIGN KEY (`id_homestay`) REFERENCES `homestay` (`id_homestay`);

--
-- Constraints for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `FK_HomestayLokasi` FOREIGN KEY (`id_homestay`) REFERENCES `homestay` (`id_homestay`);

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `FK_HomestaySewa` FOREIGN KEY (`id_homestay`) REFERENCES `homestay` (`id_homestay`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
