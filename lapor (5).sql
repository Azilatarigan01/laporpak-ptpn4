-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2025 pada 17.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nama_area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `area`
--

INSERT INTO `area` (`id_area`, `nama_area`) VALUES
(1, 'KBN DOS'),
(2, 'PKS DOS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id_categories`, `name`) VALUES
(1, 'Berita Perusahaan'),
(2, 'Tanggung Jawab Sosial (CSR)'),
(3, 'Infrastruktur'),
(4, 'Ekonomi'),
(5, 'Lingkungan'),
(6, 'Kesejahteraan Karyawan'),
(7, 'Komunitas dan Sosial'),
(8, 'Investasi dan Bisnis'),
(9, 'Pembangunan Berkelanjutan'),
(10, 'Event Perusahaan'),
(11, '9'),
(12, '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `niksap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_posisi`, `nama_karyawan`, `niksap`) VALUES
(1, 1, 'Samirah', 4004155),
(2, 1, 'Suryanto', 4023017),
(3, 2, 'Erni', 4004178),
(4, 3, 'Justan Dolok Saribu, SOPCR(III)', 4003995),
(5, 4, 'Baktiar frengki Manik', 4004341),
(6, 4, 'Adi Putra Ritonga', 4004369),
(7, 5, 'Hedriyanto', 4024552),
(8, 6, 'Juniardi', 4003950),
(9, 7, 'Trimo', 4004159),
(10, 8, 'Usrek Kusery', 4004180),
(11, 8, 'Supriadi', 4004263),
(12, 8, 'Lasmono', 4004291),
(13, 8, 'Tulus Fransisko Lubis', 4004361),
(14, 9, 'Syarifah Rahmadani', 4004164),
(15, 10, 'Antony', 4003972),
(16, 11, 'Rinaldi', 4004001),
(17, 12, 'M. Syafi i', 4004035),
(18, 13, 'Suwarno', 4004095),
(19, 13, 'Pian Nauri', 4004327),
(20, 14, 'Aan Setiawan', 4004338),
(21, 15, 'Abdul Kayamudin', 4004226),
(22, 16, 'Kasim, SPUBT(I)', 4004032),
(23, 16, 'Sadio, SPUBT(I)', 4004161),
(24, 17, 'Ponimin', 4004110),
(25, 17, 'Ronald Simanjuntak', 4004119),
(26, 18, 'Poniman-III, SPTP TU', 4004098),
(27, 19, 'Poniran-II', 4004045),
(28, 19, 'Warsono', 4004245),
(29, 20, 'Hermanto', 4004162),
(30, 20, 'Sugiono', 4004275),
(31, 21, 'Triono-II', 4004077),
(32, 21, 'Suyadi', 4004350),
(33, 22, 'Sukarmun', 4004132),
(34, 22, 'Rusiadi, SPUBT(I)', 4004156),
(35, 23, 'Parwito', 4004253),
(36, 23, 'Omo Manik', 4004349),
(37, 24, 'Warsino', 4004324),
(38, 24, 'Syaiful Amri', 4023386),
(39, 25, 'Sugiato', 4004201),
(40, 25, 'Suriadi', 4004251),
(41, 25, 'Tasun', 4023387),
(42, 25, 'Andika Saputra Samosir', 4024559),
(43, 26, 'Kastoni Sitompul', 4004147),
(44, 27, 'Marno', 4004160),
(45, 28, 'Bejo', 4004260),
(46, 29, 'Sunariyadi', 4004247),
(47, 30, 'Subari', 4004090),
(48, 30, 'Miswanto', 4004096),
(49, 30, 'Suhartono', 4004251),
(50, 30, 'Suyanto', 4023388),
(51, 31, 'Iwan Sanjaya', 4004034),
(52, 31, 'Wiwin Hardiansaputra', 4004363),
(53, 32, 'Poniman', 4003999),
(54, 32, 'Samiaman', 4004227),
(55, 32, 'Nurpiandi', 4004285),
(56, 33, 'Baringin Samosir', 4004100),
(57, 34, 'Suriadi', 4004052),
(58, 34, 'Jasmani', 4004116),
(59, 34, 'Jemson, S.', 4004198),
(60, 35, 'Rahmadianto Damanik', 4003926),
(61, 35, 'Idawati Damanik', 4003942),
(62, 35, 'Yahumi', 4003960),
(63, 36, 'Ahmad Husni', 4003948),
(64, 37, 'Suyono', 4004037),
(65, 37, 'Indra Iswanto', 4004079),
(66, 37, 'Hendrik Sinaga', 4004099),
(67, 37, 'Richardo Siahaan', 4004165),
(68, 37, 'Wagino', 4004239),
(69, 38, 'Sumadi', 4004163),
(70, 38, 'Muslimat', 4004277),
(71, 38, 'Muhammad Yurdana', 4004326),
(72, 38, 'Narsiman', 4009891),
(73, 38, 'Haposan Siregar', 4017815),
(74, 39, 'Makmun Syahbani', 4004080),
(75, 40, 'Budi Prianto', 4003971),
(76, 41, 'Hari Irwanto', 4004321),
(77, 42, 'Hermanto', 4004355),
(78, 42, 'Sandi Setiawan', 4024530),
(79, 43, 'Muhammad Syahratul Ikram', 4004265),
(80, 44, 'Safari', 4004241),
(81, 44, 'Abdullah Sam', 4004242),
(82, 45, 'Hotmauli Silaen', 4004203),
(83, 45, 'Dede Wahyudi', 4004343),
(84, 45, 'Lilik Sejali', 4004377),
(85, 46, 'Herrys Jendri Batu Bara', 4004255),
(86, 46, 'Sopan', 4004261),
(87, 46, 'Sriyanto', 4004280),
(88, 46, 'Syahrel', 4004290),
(89, 46, 'Zulham', 4004308),
(90, 46, 'Wahyu saputra', 4004325),
(91, 46, 'Dedi Hartono', 4004360),
(92, 46, 'Rinto Parpunguan Siregar', 4004368),
(93, 46, 'Sutiono', 4024531),
(94, 46, 'Hermanto', 4024532),
(95, 46, 'Rahmadani', 4024533),
(96, 46, 'Sujarwadi', 4024536),
(97, 46, 'Ardianto', 4024537),
(98, 46, 'Dedi Saputra', 4024538),
(99, 46, 'Andi ', 4024540),
(100, 46, 'Gibson Siahaan', 4024541),
(101, 46, 'Saiin Abdi Pane', 4024543),
(102, 46, 'Suratno Sitorus', 4025007),
(103, 46, 'Riando Oloan Situmorang', 4025008),
(104, 46, 'Irvan Juliansyah Samosir', 4025009),
(105, 46, 'Hidayahtullah Sinaga', 4025010),
(106, 46, 'Feri Hardian', 4025011),
(107, 46, 'Endang Tri Wahyudi', 4025015),
(108, 46, 'Robert Sirait', 4025020),
(109, 46, 'Prianto', 4025939),
(110, 46, 'Juniansen Purba', 4025940),
(111, 46, 'Sumandi', 4025946),
(112, 46, 'Bumbunnan Sihombing', 4025948),
(113, 46, 'Safri Umar', 4027286),
(114, 46, 'Hardiansyah', 4027287),
(115, 46, 'Hidayat ', 4027292),
(116, 46, 'M. Zulkifli', 4027269),
(117, 46, 'Sugio', 4004176),
(118, 47, 'Nurhayati Malau', 4004087),
(119, 47, 'Bambang Syafrizal', 4004239),
(120, 47, 'Ahmad Orlando Manulang', 4004358),
(121, 48, 'Afriandi Prayugo', 4004337),
(122, 49, 'Sugianto', 4004312),
(123, 50, 'Andi Ahmad Daulay', 4004286),
(124, 51, 'Sabduli', 4004307),
(125, 51, 'Irfan Dwi Cahyana', 4004362),
(126, 52, 'Jumono', 4004298),
(127, 53, 'Suhendratno', 4004382),
(128, 53, 'Gani Gandryono', 4004097),
(129, 54, 'Suhadi', 4004271),
(130, 55, 'Wiono', 4004281),
(131, 55, 'Joko Supriono', 4004331),
(132, 55, 'Sri Hayati', 4004196),
(133, 56, 'Juniardi', 4004282),
(134, 56, 'Tupon', 4004297),
(135, 56, 'Suwardi', 4004169),
(136, 57, 'Supriadi', 4004246),
(137, 57, 'Rame', 4004256),
(138, 57, 'Wardi', 4004258),
(139, 57, 'Irwansyah', 4004284),
(140, 57, 'Tugimin', 4004305),
(141, 57, 'Syahyunan', 4004310),
(142, 57, 'Suheri', 4004315),
(143, 57, 'Sungkono', 4004316),
(144, 57, 'Sukardi', 4004367),
(145, 57, 'Darwanto', 4004371),
(146, 57, 'Makarena', 4004376),
(147, 57, 'Surat', 4004378),
(148, 57, 'Rinto Siahaan', 4004388),
(149, 57, 'Muklis', 4024544),
(150, 57, 'Heri Chandra Huta Barat', 4024546),
(151, 57, 'Edoat Simare mare', 4024547),
(152, 57, 'Junaidi', 4024548),
(153, 57, 'Selamat', 4024549),
(154, 57, 'Supardi', 4024550),
(155, 57, 'Pono', 4024551),
(156, 57, 'Mesdi', 4024577),
(157, 57, 'Sapriadi', 4025013),
(158, 57, 'Sudarmin', 4025014),
(159, 57, 'Suharto', 4025016),
(160, 57, 'Rudiansyah Hutasuhut', 4025017),
(161, 57, 'Amalika Suandi', 4025018),
(162, 57, 'Kadi Putra', 4025941),
(163, 57, 'Fahri Surya Andika', 4025942),
(164, 57, 'Prianto', 4025943),
(165, 57, 'Rudi Candra', 4027288),
(166, 57, 'Sugiyanto', 4027289),
(167, 57, 'Surta Dewi Br Hombing', 4004205),
(168, 58, 'Rasmini', 4004223),
(169, 58, 'Rita', 4004225),
(170, 58, 'Besti Siregar', 4004229),
(171, 58, 'Muhammad Arbie Damanik', 4024535),
(172, 59, 'Julianto', 4004303),
(173, 60, 'Suroto', 4004144),
(174, 61, 'Fran Dodo', 4004328),
(175, 62, 'Edi Susanto', 4004383),
(176, 62, 'Sunarmin', 4004002),
(177, 63, 'Chaidir Wanda', 4004301),
(178, 63, 'Poniman', 4004191),
(179, 64, 'Nurmala Sihite', 4004116),
(180, 64, 'Heriadi', 4004267),
(181, 64, 'Suriadi', 4024554),
(182, 64, 'Suyatno', 4004262),
(183, 65, 'Supriadi', 4004266),
(184, 65, 'Indra Harianto', 4004279),
(185, 65, 'Suhendra', 4004299),
(186, 65, 'Herianto', 4004300),
(187, 65, 'Mesriadi', 4004317),
(188, 65, 'Slamet Prianto', 4004323),
(189, 65, 'Nurpi Dedi', 4004332),
(190, 65, 'Irfan Afandi', 400433),
(191, 65, 'Ruslianto', 4004336),
(192, 65, 'Irwanto', 4004339),
(193, 65, 'Subali', 4004364),
(194, 65, 'Kasianto', 4004365),
(195, 65, 'Hasan Hardianto', 4004380),
(196, 65, 'Gunawan', 4024555),
(197, 65, 'Wagimin', 4024556),
(198, 65, 'Ferri', 4024557),
(199, 65, 'Budiman', 4024558),
(200, 65, 'Ripaldi Frasetiyo', 4025019),
(201, 65, 'Rian Apriandi', 4025021),
(202, 65, 'Indra Lesmana', 4025022),
(203, 65, 'Riski ', 4025023),
(204, 65, 'M. Syahrullah Primuktami. Damanik', 4025944),
(205, 65, 'Rio Irawan', 4025945),
(206, 65, 'Amri', 4025947),
(207, 65, 'Tantra Priyatna Prakoso', 4025949),
(208, 65, 'Agus Saputra', 4027290),
(209, 65, 'Alfin Ramansyah', 4027291),
(210, 65, 'Gunawan', 4027293),
(211, 65, 'Purnomo', 4027294),
(212, 65, 'Exsa Arya Pratama', 4027295),
(213, 65, 'Mardiana Sinambela', 4004192),
(214, 66, 'Suratmi', 4004193),
(215, 66, 'Eko Bahri', 4004359),
(216, 66, 'Tumiran', 4004238),
(217, 67, 'Rahmadi ', 4004038),
(218, 68, 'Resno', 4004078),
(219, 69, 'Paidi', 4024563),
(220, 69, 'Mariadi', 4004056),
(221, 70, 'Basuki', 4004311),
(222, 70, 'Suwardi', 4004249),
(223, 71, 'Susanto', 4004288),
(224, 71, 'Mardianto', 4004289),
(225, 71, 'Supriyadi', 4004257),
(226, 72, 'Wagiman', 4004276),
(227, 72, 'Adi Ramanto', 4004292),
(228, 72, 'Firmansyah', 4004340),
(229, 72, 'Sudarmono', 4004385),
(230, 72, 'Komaruddin', 4024561),
(231, 72, 'Santoso', 4024562),
(232, 72, 'Irfan ', 4025024),
(233, 72, 'Vuji Agus Irawan', 4025025),
(234, 72, 'Budi Hartono', 4025026),
(235, 72, 'Heri Irwandi', 4027297),
(236, 72, 'Jumawansyah', 4027298),
(237, 72, 'Nurdiansyah', 4027299),
(238, 72, 'Julianto', 4027300),
(239, 72, 'Bambang', 4027301),
(240, 72, 'Fajar Santoso', 4027302),
(241, 72, 'Nofiansyah', 4028147),
(242, 72, 'Sucipto', 4028148),
(243, 72, 'Jerry Atma Sitorus', 4028149),
(244, 72, 'Masrudin Purba', 4028150),
(245, 72, 'Firliandi', 4028151),
(246, 72, 'Eko Purnomo', 4028152),
(247, 72, 'Hertono', 4028154),
(248, 72, 'Manisem', 4004189),
(249, 73, 'Legino', 4004270),
(250, 74, 'Herman', 4004351),
(251, 75, 'Putra Atmaja', 4004283),
(252, 76, 'Wawan Handayana', 4004565),
(253, 76, 'Ahmad Rahim Lubis', 4004264),
(254, 77, 'Parwadi', 4004274),
(255, 77, 'Samidin', 4004041),
(256, 78, 'Selamat', 4004259),
(257, 78, 'Irwansyah', 4004273),
(258, 78, 'Suwartini', 4004220),
(259, 79, 'Dedi Syahputra', 4024319),
(260, 79, 'Nasib Juniardi', 4024566),
(261, 79, 'Boimin', 4004250),
(262, 80, 'Yuyun Pristiwanto', 4004304),
(263, 80, 'Supendi', 4004314),
(264, 80, 'Dedi Handoko', 404320),
(265, 80, 'Herianto Purba', 4004329),
(266, 80, 'Ponirin', 4004325),
(267, 80, 'Mika Darma', 4004347),
(268, 80, 'Suyatno', 4004370),
(269, 80, 'Suseno', 4004373),
(270, 80, 'Bambang Sriwahyudi', 4004375),
(271, 80, 'Abdi Fajar Sidiq', 4004567),
(272, 80, 'Handika Bambang Hermawan', 4025027),
(273, 80, 'Wirayudha Maulana', 4025028),
(274, 80, 'Prayetno', 4025029),
(275, 80, 'Abdi Syahputra', 4002530),
(276, 80, 'Nurdiwanto', 4025031),
(277, 80, 'Irawan', 4025032),
(278, 80, 'Setia Budi', 4025033),
(279, 80, 'Seniman', 4025950),
(280, 80, 'Budiman', 4025951),
(281, 80, 'Jogi Bestama Siahaan', 4025952),
(282, 80, 'Surya Darma', 4025953),
(283, 80, 'Permadi', 4027303),
(284, 80, 'Rudi Handoko', 4027304),
(285, 80, 'Sapri Andi', 4027305),
(286, 80, 'Wakina', 4004199),
(287, 81, 'Dahliana', 4004221),
(288, 81, 'Richwan Zulnaidy', 4004188),
(289, 82, 'Suherwin', 4004330),
(290, 83, 'Wasis', 4004272),
(291, 84, 'Keliwon', 4004221),
(292, 85, 'Suyati', 4004222),
(293, 85, 'Bernat Sinaga', 4004042),
(294, 86, 'Tukiman-III', 4004039),
(295, 87, 'Leginem', 4004130),
(296, 87, 'Sukirah', 4004197),
(297, 87, 'Jumaidi Nainggolan', 4004043),
(298, 88, 'Panti Jumaini', 4003975),
(299, 89, 'Hajarul', 4004167),
(300, 90, 'Megawati', 4003970),
(301, 91, 'Muhammad Pardoni, Sak3u', 4003988),
(302, 92, 'Ade Irawan', 4004093),
(303, 92, 'Muhammad Suhendra', 4003979),
(304, 93, 'Jati Wibowo', 4004346),
(305, 94, 'Agustin Tambunan', 4004179),
(306, 95, 'Ramses Halomoan Situmorang', 4017791),
(307, 95, 'Ginah', 4004204),
(308, 96, 'Sofyan', 4004030),
(309, 97, 'Prayetno', 4004040),
(310, 97, 'Samanuddin', 4004075),
(311, 97, 'Jumino', 4004076),
(312, 97, 'M.Jamil Harahap', 4004094),
(313, 97, 'Jumadi', 4004102),
(314, 97, 'Tusino', 4004128),
(315, 97, 'Kasiman', 4004145),
(316, 97, 'Bonari', 4004171),
(317, 97, 'Adi', 4004177),
(318, 97, 'Karnadi', 4004202),
(319, 97, 'Mangapul Siahaan', 4004224),
(320, 97, 'Suriyadi', 4004230),
(321, 97, 'Sugito Kromo Rawiro', 4004230),
(322, 97, 'Masto', 4004237),
(323, 97, 'Sarimiin', 4004240),
(324, 97, 'Suhendra', 4004244),
(325, 97, 'Yanto', 4004248),
(326, 97, 'Wakidi', 4004268),
(327, 97, 'Jumalik', 4004269),
(328, 97, 'Usman', 4004278),
(329, 97, 'Suheri', 4004296),
(330, 97, 'Lamijan', 4004309),
(331, 97, 'Saman', 4004313),
(332, 97, 'Roy Martin', 4004357),
(333, 97, 'Julpan Efendi Siregar', 4004372),
(334, 97, 'Erwin Junaidi', 4004374),
(335, 97, 'Julianto', 4004379),
(336, 97, 'Erikson Tampubolon', 4004386),
(337, 97, 'Triono', 4003982),
(338, 98, 'Muhammad Yusuf', 4004294),
(339, 98, 'Indra', 4004295),
(340, 98, 'Kasiman', 4024553),
(341, 98, 'Heriyanto', 4003949),
(342, 99, 'Sumadi', 4004112),
(343, 99, 'Herbin Siahaan', 4004387),
(344, 99, 'Arsizal Jambak', 4024534),
(345, 99, 'Harjono', 4000509),
(346, 100, 'Roy S. Parni Batubara', 4004158),
(347, 101, 'Pranoto', 4004356),
(348, 102, 'Mulia Wahyudi', 4004381),
(349, 102, 'Suhartono-II', 4023389),
(350, 102, 'Subakti', 4004254),
(351, 103, 'Riki Yuda Sarandi', 4004318),
(352, 103, 'Ramadani', 4004385),
(353, 103, 'Suheri', 4004348),
(354, 103, 'Ardiansyah', 4024564),
(355, 103, 'Nardi', 4004131),
(356, 104, 'Ratino', 4004168),
(357, 104, 'Agus Yulianto', 4004322),
(358, 104, 'Hotmaida Purba', 4004033),
(359, 105, 'Lisdawati Br.Limbong', 4003927),
(360, 106, 'Marta Tri Hardono', 4004031),
(361, 107, 'Mukhlis Purwono', 4004036),
(362, 107, 'Hendra Gunawan', 4003958),
(363, 108, 'Ahmad Safii Lubis', 4003935),
(364, 109, 'Basuki Syahputra', 4004342),
(365, 110, 'Ramijah', 4004117),
(366, 111, 'Yusminar Puspawari', 4004181),
(367, 111, 'Yanti', 4004195),
(368, 111, 'Bilker Sihombing', 4003980),
(369, 112, 'Nganteman', 4003987),
(370, 113, 'Suhendra', 4004287),
(371, 114, 'Irwansyah Purba', 4024560),
(372, 114, 'Herry Kiswanto', 4004334),
(373, 115, 'Selamat Riyanto', 4004142),
(374, 116, 'Kasiadi', 4024439),
(376, 10, 'Zulfi', 40045789);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pengaduan`
--

CREATE TABLE `kategori_pengaduan` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_pengaduan`
--

INSERT INTO `kategori_pengaduan` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Konflik Kerja', '2025-01-28 15:45:30', '2025-01-28 15:45:30'),
(2, 'Fasilitas Kantor', '2025-01-28 15:45:30', '2025-01-28 15:45:30'),
(3, 'Keamanan', '2025-01-28 15:45:30', '2025-01-28 16:00:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id_berita` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `main` text NOT NULL,
  `quote` text NOT NULL,
  `conclusion` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id_berita`, `title`, `intro`, `main`, `quote`, `conclusion`, `image`, `author`, `created_at`, `updated_at`) VALUES
(1, 'PTPN IV Regional II Dolok Sinumbah Berikan Bantuan Pembangunan Masjid Tahfidzul Qur\'an As-Salam Sebesar Rp. 10.000.000,-', 'PT Perkebunan Nusantara IV (PTPN IV) Regional II Dolok Sinumbah terus menunjukkan komitmennya dalam mendukung pengembangan komunitas lokal. Salah satu bentuk nyata dari upaya tersebut adalah memberikan bantuan sebesar Rp. 10.000.000,- (Sepuluh Juta Rupiah) untuk pembangunan Masjid Tahfidzul Qur\'an As-Salam yang terletak di Rambung Susu, Kabupaten Simalungun.', 'Bantuan ini diharapkan dapat mempercepat pembangunan masjid yang akan menjadi pusat kegiatan keagamaan dan pendidikan Al-Qur\'an bagi masyarakat setempat. Langkah ini sejalan dengan visi PTPN IV untuk memberikan dampak positif tidak hanya di bidang ekonomi tetapi juga sosial dan spiritual bagi masyarakat sekitar.', '\"Kami berharap pembangunan Masjid Tahfidzul Qur\'an As-Salam ini dapat memberikan manfaat besar bagi masyarakat sekitar, khususnya generasi muda dalam memperdalam nilai-nilai keagamaan.\" Manajer PTPN IV Regional II Dolok Sinumbah', 'Komitmen Berkelanjutan PTPN IVDengan terus mendukung inisiatif pembangunan seperti ini, PTPN IV berkomitmen untuk menjadi bagian integral dalam memajukan masyarakat dan menciptakan dampak positif di semua lini. Bantuan ini tidak hanya menjadi simbol tanggung jawab sosial, tetapi juga bentuk nyata kepedulian perusahaan terhadap masyarakat sekitar.', 'uploads/image/j9PUvYkAONeFbKHn7BNS2SMOBDXUezyqBv6t4DWc.jpg', 'Nur Azila Tarigan', '2025-01-24 02:47:56', '2025-01-24 16:15:11'),
(3, 'PTPN', 'PTPN', 'PTPN', 'PTPN', 'PTPN', 'uploads/image/ePnsbUzfTsEvRpVK2lkz3P3PZdS2EPiYhi6nB8ST.jpg', 'Nur Azila Tarigan', '2025-01-24 14:45:44', '2025-01-27 16:41:48'),
(4, 'uuuuu', 'PTPN', 'PTPN', 'PTPN', 'PTPN', 'uploads/image/vh60Fyvyf3ANRxS3enCwEkMYM3zp78ZbwwBfEZ7l.jpg', 'Nur Azila Tarigan', '2025-01-24 15:51:10', '2025-01-24 15:51:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_categories`
--

CREATE TABLE `news_categories` (
  `id_berita` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_tags`
--

CREATE TABLE `news_tags` (
  `id_berita` int(11) NOT NULL,
  `id_tags` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_realisasi` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `niksap` int(11) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `status` varchar(50) DEFAULT 'Diterima',
  `balasan` text DEFAULT NULL,
  `kode_pengaduan` varchar(20) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_area`, `id_realisasi`, `id_posisi`, `id_karyawan`, `niksap`, `no_hp`, `deskripsi`, `lampiran`, `foto`, `tgl_pengaduan`, `status`, `balasan`, `kode_pengaduan`, `kategori_id`) VALUES
(1, 1, 4, 41, 76, 76, '899909000', 'mmmmmmmm', 'lampiran/TGDbsIADgygNDV7YTsyJmCgFXGcy3jvzdmiENmh0.jpg', 'foto/pMWDIQj0sH1GB7P3YPDKQ6Dx8JEHpdb4avdyZibE.jpg', '2025-01-14 18:20:10', 'Diterima', NULL, '0', NULL),
(2, 2, 1, 4, 5, 5, '899909000', 'sakit', 'lampiran/fd3OZ0BfsZm41mA0eTxb0ufYGzqsvWyyfF8FXfvP.jpg', 'foto/7jX3k1mJsSWmU1NTprOQjkjFLBe7I8OGFBJ5LZz3.jpg', '2025-01-14 18:20:47', 'Diterima', NULL, '0', NULL),
(3, 2, 2, 14, 20, 20, '899909000', 'bsimilah', 'lampiran/2BtYy5xX1X0yxoUZSZJMW071CeOqsMaJtcbt0QPo.jpg', 'foto/PAddKPiKmpovoTR2ysmXh3ZjZu5E7pepueGm3L5G.jpg', '2025-01-14 18:23:20', 'Diterima', NULL, '0', NULL),
(4, 2, 2, 14, 20, 20, '899909000', 'Alat kerja yang saya gunakan sudah tidak layak pakai dan sering mengalami kerusakan. Hal ini menghambat proses kerja saya. Mohon agar alat kerja yang baru dapat segera disediakan.', 'uploads/lampiran/LxGdI8dCtWlSasHp518Jx4fWQfibT9uvDfJiMbnE.jpg', 'uploads/foto/R7VDNzRkMiAuu89ev5XFxACfZq2MSCqILLCHlNsZ.jpg', '2025-01-15 13:11:36', 'Diterima', 'apanya yang rusak?', '0', NULL),
(7, 2, 1, 2, 3, 3, '082172812663', 'bi', 'uploads/lampiran/cwEZD6IVgNv6zW9Q9C66BP2qRbsUO8L5WI7ibbNi.jpg', 'uploads/foto/VViqp9EOebzwKEv7ODsrmEXYq8DmtGchEaH8P3kp.jpg', '2025-01-20 00:41:23', 'Diterima', NULL, '0', NULL),
(8, 1, 8, 85, 293, 293, '082172812663', 'tolong cek', 'uploads/lampiran/Pj3WdWU7nqKQu6OeTMnBs2wpkj2Z3qIsHR8NttsV.jpg', 'uploads/foto/zg2oayraNBy7zKwxr8sWuAevoEQNRL5gB3l5trnz.jpg', '2025-01-20 14:37:50', 'Diterima', NULL, '0', NULL),
(9, 2, 1, 5, 7, 7, '082172812663', 'uuuu', 'uploads/lampiran/2OpG692z5p7RmaPQrbaUZAH3kNrlVKe0XOYd66pV.jpg', 'uploads/foto/uOTi42ItrUGupyFibILVId7VmWr7dmYUszVnwSca.jpg', '2025-01-20 14:49:53', 'Diterima', NULL, '0', NULL),
(10, 1, 8, 81, 288, 288, '089090980900', '9uioounmlnkj,klk', 'uploads/lampiran/M7vF1gI8iQD3QMcnUEXlZ9zRvLnH7l5zjPaxlDes.jpg', 'uploads/foto/6TnMuUMUO7TBwFVDGGGafFheiUrjaQAtkeltUgM4.jpg', '2025-01-21 01:52:21', 'Diterima', NULL, '0', NULL),
(12, 2, 1, 6, 8, 8, '082172812663', 'saya', 'uploads/lampiran/j6wZVNW9J1jPBhwztiC5xlyt8sVZT8uLekWJYajF.jpg', 'uploads/foto/qlMO1xceh9irM0IpDaiTA7xxFJnEm3TVUutQxIKW.jpg', '2025-01-28 05:41:07', 'Dalam Proses', NULL, '0', NULL),
(13, 1, 5, 55, 131, 131, '082172812663', 'ini', 'uploads/lampiran/XdiVof0arIpQDrgO0n8c5VThE4vIRD47HIBY1xQR.jpg', 'uploads/foto/eYgZElgiBqOCqpW0Gnfe91OSAVsysGCxNRtyUmhd.jpg', '2025-01-28 05:41:49', 'Dalam Proses', 'apa', '0', NULL),
(14, 2, 1, 1, 1, 1, '082172812663', 'butuh duit', 'uploads/lampiran/VBrtKoLVGcJy1vYGzjWsvDz8ea4hN0ntVRrRMgn5.png', 'uploads/foto/hhKLaI2GEHoh5rwq94R4TPCRcy7oRG2x8WCDQXnw.png', '2025-01-28 13:00:59', 'Selesai', 'udah di tf', 'PD250128-9284', NULL),
(15, 2, 2, 12, 17, 17, '082172812663', 'rusak', 'uploads/lampiran/C3l0w0K1PKjP52QNjZprYB4BKvdvWhtifKlOme2H.png', 'uploads/foto/52B23rRtDaILirdzEtPHPGPZYfp2bmlE1FFC0NYa.jpg', '2025-01-28 16:54:04', 'Diterima', 'apanya yang rusak', 'PD250128-3338', 2),
(16, 2, 2, 14, 20, 20, '082172812663', 'gelud', 'uploads/lampiran/mO6rdLt4mkO0Tpii9f1gCyi1JI80yF3awjUUMOog.png', 'uploads/foto/kTbciGYBwaHMcnOi1CktgOy6sSFZlDvuSTxH25iK.png', '2025-01-29 05:28:18', 'Selesai', 'oke jumpa tengah', 'PD250129-7191', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_realisasi` int(11) NOT NULL,
  `nama_posisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `id_area`, `id_realisasi`, `nama_posisi`) VALUES
(1, 2, 1, 'Analisis Mutu & Losis'),
(2, 2, 1, 'Analisis Tandan'),
(3, 2, 1, 'Kantor Quality Assurance'),
(4, 2, 1, 'Krani Timbang'),
(5, 2, 1, 'Mandor Quality Assurance Tekpe'),
(6, 2, 1, 'Mandor Sortasi'),
(7, 2, 1, 'Operator Effluent Treatment'),
(8, 2, 1, 'Operator Sortasi'),
(9, 2, 1, 'Petugas Limbah'),
(10, 2, 2, 'Krani Pengolahan'),
(11, 2, 2, 'Krani Produksi'),
(12, 2, 2, 'Mandor Pengolahan'),
(13, 2, 2, 'Meknanik Instalasi'),
(14, 2, 2, 'Mekanik Listrik'),
(15, 2, 2, 'Operator Mesin Genset & Listrik'),
(16, 2, 2, 'Operator ST. Boiler'),
(17, 2, 2, 'Operator ST. Hoisting Crane'),
(18, 2, 2, 'Operator ST. Kamar Mesin'),
(19, 2, 2, 'Operator ST. Kernel Plant'),
(20, 2, 2, 'Operator ST. Klarifikasi'),
(21, 2, 2, 'Operator ST. Loading Ramp'),
(22, 2, 2, 'Operator ST. Press'),
(23, 2, 2, 'Operator ST. Rebusan'),
(24, 2, 2, 'Operator Water Treatment'),
(25, 2, 2, 'Pembantu Operator Boiler'),
(26, 2, 2, 'Pembantu Operator Hosting Crane'),
(27, 2, 2, 'Pembantu Operator Kamar Mesin'),
(28, 2, 2, 'Pembantu Operator Kernel Plant'),
(29, 2, 2, 'Pembantu Operator Klarifikasi'),
(30, 2, 2, 'Pembantu Operator Loading Ramp'),
(31, 2, 2, 'Pemantu Operator Press'),
(32, 2, 2, 'Pembantu Operator Rebusan'),
(33, 2, 2, 'Petugas Pengiriman'),
(34, 2, 2, 'Petugas Rail Track'),
(35, 2, 3, 'Krani Teknik'),
(36, 2, 3, 'Mandor Teknik'),
(37, 2, 3, 'Mekanik'),
(38, 2, 3, 'Pembantu Mekanik'),
(39, 2, 3, 'Petugas CMMS'),
(40, 2, 3, 'Tukang Bubut'),
(41, 1, 4, 'Krani Afdeling'),
(42, 1, 4, 'Krani Cek Sawit'),
(43, 1, 4, 'Mandor I Tanaman'),
(44, 1, 4, 'Mandor Panen'),
(45, 1, 4, 'Mandor Pemeliharaan'),
(46, 1, 4, 'Pemanen'),
(47, 1, 4, 'Pemeliharaan'),
(48, 1, 4, 'Penjaga Mesin'),
(49, 1, 4, 'Petugas AKP'),
(50, 1, 4, 'Petugas Global Telling'),
(51, 1, 4, 'Petugas Timbang Brondolan'),
(52, 1, 5, 'Krani Afdeling'),
(53, 1, 5, 'Krani Cek Sawit'),
(54, 1, 5, 'Mandor I Tanaman'),
(55, 1, 5, 'Mandor Pemeliharaan'),
(56, 1, 5, 'Pemanen'),
(57, 1, 5, 'Pemeliharaan'),
(58, 1, 5, 'Petugas Globab Telling'),
(59, 1, 5, 'Petugas Timbang Berondolan'),
(60, 1, 6, 'Krani Afdeling'),
(61, 1, 6, 'Krani Cek Sawit'),
(62, 1, 6, 'Mandor I Tanaman'),
(63, 1, 6, 'Mandor Panen'),
(64, 1, 6, 'Mandor Pemeliharaan'),
(65, 1, 6, 'Pemanen'),
(66, 1, 6, 'Pemeliharaan'),
(67, 1, 6, 'Petugas Global Telling'),
(68, 1, 7, 'Krani Afdeling'),
(69, 1, 7, 'Krani Cek Sawit'),
(70, 1, 7, 'Mandor Panen'),
(71, 1, 7, 'Mandor Pemeliharaan'),
(72, 1, 7, 'Pemanen'),
(73, 1, 7, 'Pemeliharaan'),
(74, 1, 7, 'Penjaga Mesin'),
(75, 1, 7, 'Petugas AKP'),
(76, 1, 7, 'Petugas Global Telling'),
(77, 1, 8, 'Krani Afdeling'),
(78, 1, 8, 'Krani Cek Sawit'),
(79, 1, 8, 'Mandor I Tanaman'),
(80, 1, 8, 'Mandor Panen'),
(81, 1, 8, 'Mandor Pemeliharaan'),
(82, 1, 8, 'Pemanen'),
(83, 1, 8, 'Pemeliharaan'),
(84, 1, 8, 'Penjaga Mesin'),
(85, 1, 8, 'Petugas AKP'),
(86, 1, 8, 'Petugas Global Telling'),
(87, 1, 8, 'Petugas Timbang Brondolan'),
(88, 1, 9, 'Danton'),
(89, 1, 9, 'Guru Sekolah/Madrasah'),
(90, 1, 9, 'Kantor Personalia'),
(91, 1, 9, 'Krani Dokumen Sistem & Sertifikasi'),
(92, 1, 9, 'Krani I Personalia'),
(93, 1, 9, 'Krani Personalia'),
(94, 1, 9, 'Krani Umum'),
(95, 1, 9, 'Krani Upah'),
(96, 1, 9, 'Operator Mesin genset & Listrik'),
(97, 1, 9, 'Petugas Mess'),
(98, 1, 9, 'Satpam'),
(99, 1, 9, 'Satpam (Pengamanan Aset)'),
(100, 1, 9, 'Sopir'),
(101, 1, 10, 'Krani Quality Assurance Tanaman'),
(102, 1, 11, 'Krani I Tanaman'),
(103, 1, 11, 'Krani Kap Inspeksi'),
(104, 1, 11, 'Krani Produksi'),
(105, 1, 11, 'Krani Tanaman'),
(106, 1, 12, 'Krani akuntansi'),
(107, 1, 12, 'Krani Finansil'),
(108, 1, 12, 'Krani Gudang'),
(109, 1, 12, 'Krani I Tata Usaha'),
(110, 1, 12, 'Krani Keuangan & Anggaran'),
(111, 1, 12, 'Krani sekretariat'),
(112, 1, 12, 'Pelayan Kantor'),
(113, 1, 12, 'Petugas Gudang'),
(114, 1, 13, 'Mandor Teknik'),
(115, 1, 13, 'Operator Alat Berat'),
(116, 1, 13, 'Sopir truck/Dump Truck'),
(117, 1, 13, 'Tukang Kebun & Dinas Sipil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `realisasi`
--

CREATE TABLE `realisasi` (
  `id_realisasi` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `nama_realisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `realisasi`
--

INSERT INTO `realisasi` (`id_realisasi`, `id_area`, `nama_realisasi`) VALUES
(1, 2, 'Kantor Quality Assurance'),
(2, 2, 'Kantor Pengolahan'),
(3, 2, 'Kantor Teknik PKS'),
(4, 1, 'Afdeling I'),
(5, 1, 'Afdeling II'),
(6, 1, 'Afdeling III'),
(7, 1, 'Afdeling IV'),
(8, 1, 'Afdeling V'),
(9, 1, 'Kantor Personalia'),
(10, 1, 'Kantor Quality Assurance KBN'),
(11, 1, 'Kantor Tanaman'),
(12, 1, 'Kantor Tata Usaha'),
(13, 1, 'Kantor Teknik Kebun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id_tags` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id_tags`, `name`) VALUES
(1, 'CSR'),
(2, 'Sumbangan'),
(3, 'Masjid'),
(4, 'Infrastruktur'),
(5, 'Komunitas'),
(6, 'Tanggung Jawab Sosial'),
(7, 'Pembangunan'),
(8, 'Lingkungan Hidup'),
(9, 'Kesejahteraan Karyawan'),
(10, 'PTPN IV'),
(11, 'Berita Perusahaan'),
(12, 'Bisnis'),
(13, 'Ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1:admin 2:kepala 3:karyawan',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not deleted, 1:deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profil`, `remember_token`, `user_type`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$mwNanGECZq3fkLdV20gak./d/H4zcvhrH.2MbjIf6NGtI9ove./ce', '1737505241.jpg', 'kabGvrLdc4ZIM6jaoEKgRtWvCfTB01cfZfqwOjZV5eFEI4vpXwx1qYMIpdBw', 1, 0, '2025-01-09 15:26:38', '2025-01-21 17:20:42'),
(2, 'Asisten Tata Usaha', 'asistentu@gmail.com', NULL, '$2y$10$ir660aCmY/hVU8hGICG8MeFBN3OYBAVlcy1NBPIscDrpBjYhqyyl6', '1737039137_WhatsApp_Image_2023-10-06_at_21.56.15_b9b9cad4.jpg', NULL, 2, 0, '2025-01-09 15:26:38', '2025-01-29 07:13:39'),
(3, 'Karyawan', 'karyawan@gmail.com', NULL, '$2y$10$pRR7xiH9qbfDoTa74D1VuOuthfz04m.v5rPmQOOr.Y7OZDFELgJo6', '', NULL, 3, 0, '2025-01-09 15:26:38', '2025-01-09 08:56:35'),
(4, 'Nur Azira Tarigan', 'raaaa@gmail.com', NULL, '$2y$10$NRpmhvDTK/8mlwXohB6wXeLtHV6oH.JGkmZTIdvh7WWDdF.Huo5da', '', NULL, 3, 0, '2025-01-10 10:32:15', '2025-01-10 10:32:15'),
(7, 'Nur Azira Tarigan', 'tr@gmail.com', NULL, '$2y$10$S8iqbxJMhtsIET9wOzPveOTOaMyG1o/wTf4V0U31w3/Z3H35wu2tS', '', NULL, 3, 0, '2025-01-10 10:34:27', '2025-01-10 10:34:27'),
(8, 'hakus', 'nur23039@mail.unpad.ac.id', NULL, '$2y$10$le11n1EXJ7MbmCYWOamCxORCWBIT.uDmdTSZAsfa.D.oYE7uKtQKi', '', NULL, 3, 0, '2025-01-10 10:40:42', '2025-01-10 10:40:42'),
(9, 'Nur Azira Tarigan', 'nur23039@gmail.com', NULL, '$2y$10$LTmaJNoZ4wAtg6D8fmL1rudca4OVPo/1U3HgYYbulH/d7wHR7JpGq', '', NULL, 3, 0, '2025-01-10 10:43:27', '2025-01-10 10:43:27'),
(10, 'ee', 'ee@gmail.com', NULL, '$2y$10$XgyJ.To0rb/e5bqq.PzI8ecVteKtVYLE/4TszWiRMa1joVD1hqJxa', '', NULL, 3, 0, '2025-01-10 10:45:26', '2025-01-10 10:45:26'),
(12, 'zilaaaa', 'azila@gmail.com', NULL, '$2y$10$knm0bnOxORIIbTXzUdab/eDOLZb4PJ9DBW0vdb8Zp3.qPBg4/p5VS', '1736572632_constructions-2.jpg', NULL, 1, 0, '2025-01-10 10:59:57', '2025-01-10 22:17:12'),
(14, 'ajil', 'ajil@gmail.com', NULL, '$2y$10$DxGE/bGJocFsdBxgkHQJju6whwaRBQEtaF2Y0MBnl7DT5.TnIYjtG', '1736949889_IMG_20231006_165053.jpg', NULL, 1, 0, '2025-01-15 07:04:27', '2025-01-15 07:04:49'),
(15, 'Nur Azila Tarigan', 'kepalabagian@gmail.com', NULL, '$2y$10$59hI.M36b.oI6KRTSy0GHu4XgEnWjL8GabdmddFFKEON/gpdZmqeG', '1737505860.jpg', NULL, 2, 0, '2025-01-16 05:42:11', '2025-01-21 17:31:01'),
(16, 'Asisten Teknik', 'asistenteknik@gmail.com', NULL, '$2y$10$hkPVOsvm7Gd7/cr579ItVOBZ0fLRd6dEfz5l/AsRH4Jn6X1i.anCi', '1738160154.jpg', NULL, 2, 0, '2025-01-29 07:15:55', '2025-01-29 07:15:55'),
(17, 'Asisten Quality Assurance Tekpe', 'asistenquatekpe@gmail.com', NULL, '$2y$10$fxa62HsdpgfJsmYUtv7EwOOZrckcYdC9ABWQpTQxcvNheCuAnd1Ti', '1738160328.jpg', NULL, 2, 0, '2025-01-29 07:18:48', '2025-01-29 07:18:48'),
(18, 'Asisten Personalia Kebun', 'asistenpk@gmail.com', NULL, '$2y$10$HjPCW.KGFWzZ6WcH7h37EeGE0ZdnUpKLvdqe8Elpx0ndXR9nfSS52', '1738160432.jpg', NULL, 2, 0, '2025-01-29 07:20:32', '2025-01-29 07:20:32'),
(19, 'Asisten Pengolahan', 'asistenpengolahan@gmail.com', NULL, '$2y$10$sqs7ZlayBsLtLboP92sXVe0Isk2GkE0xLccedsdFnkDPnlj14/ENK', '1738160498.jpg', NULL, 2, 0, '2025-01-29 07:21:38', '2025-01-29 07:21:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_posisi` (`id_posisi`);

--
-- Indeks untuk tabel `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `id_categories` (`id_categories`);

--
-- Indeks untuk tabel `news_tags`
--
ALTER TABLE `news_tags`
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `id_tags` (`id_tags`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_realisasi` (`id_realisasi`),
  ADD KEY `id_posisi` (`id_posisi`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `fk_kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_realisasi` (`id_realisasi`);

--
-- Indeks untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_realisasi`),
  ADD KEY `id_area` (`id_area`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id_tags`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT untuk tabel `kategori_pengaduan`
--
ALTER TABLE `kategori_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `id_realisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id_tags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`);

--
-- Ketidakleluasaan untuk tabel `news_categories`
--
ALTER TABLE `news_categories`
  ADD CONSTRAINT `news_categories_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `news` (`id_berita`),
  ADD CONSTRAINT `news_categories_ibfk_2` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`);

--
-- Ketidakleluasaan untuk tabel `news_tags`
--
ALTER TABLE `news_tags`
  ADD CONSTRAINT `news_tags_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `news` (`id_berita`),
  ADD CONSTRAINT `news_tags_ibfk_2` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`);

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `fk_kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_pengaduan` (`id`),
  ADD CONSTRAINT `fk_kategori_pengaduan` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_pengaduan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `pengaduan_ibfk_2` FOREIGN KEY (`id_realisasi`) REFERENCES `realisasi` (`id_realisasi`),
  ADD CONSTRAINT `pengaduan_ibfk_3` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`),
  ADD CONSTRAINT `pengaduan_ibfk_4` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD CONSTRAINT `posisi_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`),
  ADD CONSTRAINT `posisi_ibfk_2` FOREIGN KEY (`id_realisasi`) REFERENCES `realisasi` (`id_realisasi`);

--
-- Ketidakleluasaan untuk tabel `realisasi`
--
ALTER TABLE `realisasi`
  ADD CONSTRAINT `realisasi_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
