-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2015 at 01:27 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `inboxs`
--

CREATE TABLE IF NOT EXISTS `inboxs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `inboxs`
--

INSERT INTO `inboxs` (`id`, `name`, `phone`, `content`, `view`, `created_at`, `updated_at`) VALUES
(2, 'sdfs', 'fsdfsd', 'fsdf', 1, '2015-07-18 03:31:22', '2015-07-22 10:16:57'),
(3, 'phan vana qunafgsdfs', 'dfsdfsdf', 'sdfsdfsdfsdfsf', 1, '2015-07-18 04:28:35', '2015-07-22 10:17:07'),
(4, 'fvsdfsdf', 'sdfsd', 'fsdfsdf', 1, '2015-08-22 21:26:03', '2015-08-22 21:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_ingredient` int(11) NOT NULL,
  `name_ingredient` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `bang`, `id_ingredient`, `name_ingredient`, `old_info`, `created_at`, `updated_at`, `datetime`) VALUES
(38, 'Sửa', 'Tin tức', 5, 'Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc', '', '2015-08-22 21:22:25', '2015-08-22 21:22:25', '2015-08-23 04:22:25'),
(37, 'thêm', 'Tự viện', 1001, 'weqeweqwe', '', '2015-08-22 21:20:58', '2015-08-22 21:20:58', '2015-08-23 04:20:58'),
(36, 'Sửa', 'Tăng Ni', 1028, '1992', '', '2015-08-22 21:20:39', '2015-08-22 21:20:39', '2015-08-23 04:20:39'),
(35, 'thêm', 'Ngiệp sư', 8, 'Hàng Giác', '', '2015-08-22 21:20:23', '2015-08-22 21:20:23', '2015-08-23 04:20:23'),
(34, 'thêm', 'Ngiệp sư', 7, 'Hàng đạo', '', '2015-08-22 21:20:13', '2015-08-22 21:20:13', '2015-08-23 04:20:13'),
(33, 'thêm', 'Ngiệp sư', 6, 'Hàng Minh', '', '2015-08-22 21:20:04', '2015-08-22 21:20:04', '2015-08-23 04:20:04'),
(39, 'Sửa', 'Tin tức', 6, 'Du Xuân trẩy hội Chùa Hương cùng Saigontourist', '', '2015-08-22 21:22:37', '2015-08-22 21:22:37', '2015-08-23 04:22:37'),
(40, 'Sửa', 'Tin tức', 7, 'Ùn Ùn trẩy hội các đền và khu du lịch', '', '2015-08-22 21:22:46', '2015-08-22 21:22:46', '2015-08-23 04:22:46'),
(41, 'Sửa', 'Tin tức', 8, 'Tổ chức chương trình Hướng về Hương Tích ', '', '2015-08-22 21:23:13', '2015-08-22 21:23:13', '2015-08-23 04:23:13'),
(42, 'Đọc tin', 'Tin nhắn', 3, 'phan vana qunafgsdfs', '', '2015-08-22 21:23:44', '2015-08-22 21:23:44', '2015-08-23 04:23:44'),
(43, 'Gửi', 'Tin nhắn', 4, 'fvsdfsdf', '', '2015-08-22 21:26:03', '2015-08-22 21:26:03', '2015-08-23 04:26:03'),
(44, 'Sửa', 'Tăng Ni', 1028, '1992', '', '2015-08-22 21:29:09', '2015-08-22 21:29:09', '2015-08-23 04:29:09'),
(45, 'Đọc tin', 'Tin nhắn', 4, 'fvsdfsdf', '', '2015-08-22 21:29:22', '2015-08-22 21:29:22', '2015-08-23 04:29:22'),
(46, 'Đọc tin', 'Tin nhắn', 4, 'fvsdfsdf', '', '2015-08-22 21:29:29', '2015-08-22 21:29:29', '2015-08-23 04:29:29'),
(47, 'Sửa', 'Tăng Ni', 1028, '1992', '', '2015-08-22 21:31:13', '2015-08-22 21:31:13', '2015-08-23 04:31:13'),
(48, 'thêm', 'Tự viện', 1001, 'Chùa tùng lâm', '', '2015-08-22 23:22:26', '2015-08-22 23:22:26', '2015-08-23 06:22:26'),
(49, 'Sửa', 'Tăng Ni', 1028, 'thích văn quang', '', '2015-08-22 23:23:00', '2015-08-22 23:23:00', '2015-08-23 06:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_07_10_135422_create_monk_table', 2),
('2015_07_10_160024_create_temple_table', 3),
('2015_07_10_163738_create_role_table', 4),
('2015_07_10_164917_create_user_role_table', 5),
('2015_07_13_173554_create_status_table', 6),
('2015_07_13_192715_create_positions_table', 7),
('2015_07_14_052406_create_logs_table', 8),
('2015_07_14_082256_create_newtypes_table', 9),
('2015_07_17_202339_create_inboxs_table', 10),
('2015_07_17_202658_create_pages_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `monks`
--

CREATE TABLE IF NOT EXISTS `monks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `the_danh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phap_danh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `cmt` text COLLATE utf8_unicode_ci NOT NULL,
  `birthplace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dad_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dad_birthday` int(11) NOT NULL,
  `dad_dead` int(11) NOT NULL,
  `mother_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mother_birthday` int(11) NOT NULL,
  `mother_dead` int(11) NOT NULL,
  `ordained` int(11) NOT NULL,
  `first_temple` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_first_temple` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_temple_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_temple` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_temple_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_temple_other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_information` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='thông tin nhà sư' AUTO_INCREMENT=1029 ;

--
-- Dumping data for table `monks`
--

INSERT INTO `monks` (`id`, `the_danh`, `phap_danh`, `image`, `birthday`, `cmt`, `birthplace`, `address`, `dad_name`, `dad_birthday`, `dad_dead`, `mother_name`, `mother_birthday`, `mother_dead`, `ordained`, `first_temple`, `check_first_temple`, `first_temple_other`, `position`, `check_position`, `position_other`, `education`, `last_temple`, `check_temple_other`, `last_temple_other`, `adress`, `phone`, `email`, `other_information`, `created_at`, `updated_at`) VALUES
(1028, 'phan van quang', 'thích văn quang', '0e3ca96614.jpg', '1992-11-11', '125658985', '1992', '1992', '1992', 1992, 0, '1992', 1992, 0, 1992, '1001', 'on', NULL, '6', 'on', NULL, '1992', '1001', 'on', NULL, '1992', '1992', 'vsfsdfs@gdjf.dd', '1992', '2015-08-22 11:10:15', '2015-08-22 23:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `newtypes`
--

CREATE TABLE IF NOT EXISTS `newtypes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `newtypes`
--

INSERT INTO `newtypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Phật Sự', '2015-07-14 08:30:49', '2015-07-18 23:46:26'),
(2, 'Phật Giáo và Đời Sống', '2015-07-14 08:31:23', '2015-07-18 23:46:48'),
(3, 'Phật Giáo và xã hội', '2015-07-18 23:47:26', '2015-07-18 23:47:26'),
(4, 'Phật giáo & tuổi trẻ', '2015-07-18 23:47:49', '2015-07-18 23:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(2, 'Giáo lý', 'Giáo lý', '2015-07-18 09:53:51', '2015-07-18 09:53:51'),
(3, 'Kiến Trúc', 'Kiến Trúc', '2015-07-18 09:54:08', '2015-07-18 09:54:08'),
(4, 'Văn Hóa', 'Văn Hóa', '2015-07-18 09:54:17', '2015-07-18 09:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Hàng Minh', '2015-08-22 21:20:04', '2015-08-22 21:20:04'),
(7, 'Hàng đạo', '2015-08-22 21:20:13', '2015-08-22 21:20:13'),
(8, 'Hàng Giác', '2015-08-22 21:20:23', '2015-08-22 21:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `decription` text NOT NULL,
  `category` text NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `thumb`, `decription`, `category`, `content`, `created_at`, `updated_at`) VALUES
(5, 'Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc', '2dff373fd8.jpg', 'Hôm nay, ngày 24/02 (tức mùng 6 tháng Giêng), Chùa Hương khai hội. Khai hội Chùa Hương ách tắc như... mọi năm. Tình trạng ùn tắc tiếp tục diễn ra tại khu vực bến đò dù suối Yến đã được mở rộng', '1', '<p>H&ocirc;m nay, ng&agrave;y 24/02 (tức m&ugrave;ng 6 th&aacute;ng Gi&ecirc;ng), Ch&ugrave;a Hương khai hội. Khai hội&nbsp;Ch&ugrave;a Hương&nbsp;&aacute;ch tắc như... mọi năm. T&igrave;nh trạng &ugrave;n tắc tiếp tục diễn ra tại khu vực bến đ&ograve; d&ugrave; suối Yến đ&atilde; được mở rộng. Đường v&agrave;o ch&ugrave;a Thi&ecirc;n Tr&ugrave; v&agrave; lối xuống động Hương T&iacute;ch, người người chen nhau đến ngạt thở.</p>\r\n\r\n<p>D&ograve;ng người xếp h&agrave;ng chờ đi c&aacute;p treo d&agrave;i h&agrave;ng trăm m&eacute;t, dẫn đến t&igrave;nh trạng qu&aacute; tải g&acirc;y mất điện nhiều lần.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, phải nhấn mạnh rằng &yacute; thức của người d&acirc;n khi tham gia chảy hội Ch&ugrave;a Hương đ&atilde; c&oacute; thay đổi t&iacute;ch cực. D&ugrave; người rất đ&ocirc;ng nhưng kh&ocirc;ng c&ograve;n t&igrave;nh trạng x&ocirc; đẩy.</p>\r\n\r\n<p>Nhưng vẫn c&ograve;n v&agrave;i người &quot;cưỡi&quot; cụ r&ugrave;a để nghỉ ch&acirc;n v&agrave; xả r&aacute;c bừa b&atilde;i.</p>\r\n\r\n<p><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 1" src="http://xmedia.nguoiduatin.vn/133/2015/2/24/chua-huong-1.jpg" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 1" /></p>\r\n\r\n<h4>&quot;Cưỡi&quot; cụ r&ugrave;a để nghỉ ch&acirc;n.</h4>\r\n\r\n<p>Từ xưa, nhiều người đ&atilde; quan niệm rằng nước từ nhũ ở Ch&ugrave;a Hương l&agrave; lộc trời. V&igrave; vậy, ai v&atilde;n cảnh nơi đ&acirc;y cũng cố hứng cho bằng được v&agrave;i giọt nước &quot;ti&ecirc;n&quot; n&agrave;y để uống hoặc xoa l&ecirc;n mặt với mong muốn c&oacute; được sức khỏe, v&ocirc; bệnh tật trong năm.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, mong muốn n&agrave;y c&oacute; lẽ đang trở l&ecirc;n qu&aacute; đ&agrave; khi c&oacute; những qu&yacute; &ocirc;ng gần như &ocirc;m chọn nhũ đ&aacute; để hứng nước lộc.</p>\r\n\r\n<p><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 2" src="http://xmedia.nguoiduatin.vn/133/2015/2/24/chua-huong-2.jpg" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 2" /></p>\r\n\r\n<p><strong><em>&Ocirc;m nhũ đ&aacute; để hứng lộc.</em></strong></p>\r\n\r\n<p><strong>3 miếng đậu c&oacute; gi&aacute; 50.000đ</strong></p>\r\n\r\n<p>Gi&aacute; cả ở Ch&ugrave;a Hương dịp n&agrave;y vẫn... tr&ecirc;n trời. V&eacute; đ&ograve; theo quy định của ban tổ chức l&agrave; 35.000 đồng, nhưng người l&aacute;i đ&ograve; đ&ograve;i hỏi th&ecirc;m tiền &quot;bo&quot; cho một kh&aacute;ch l&agrave; 50.000 đồng.</p>\r\n\r\n<p>Chi ph&iacute; cho một bữa ăn b&igrave;nh d&acirc;n l&agrave; 120.000 đồng một người. 3 miếng đậu sốt c&agrave; chua c&oacute; gi&aacute; 50.000đ.</p>\r\n\r\n<p>V&eacute; gửi xe cũng được l&uacute;c đội gi&aacute;. Theo quy định chung, gi&aacute; v&eacute; ch&ocirc;ng xe m&aacute;y l&agrave; 3000đ v&agrave; nếu gửi qua đ&ecirc;m l&agrave; c&oacute; gi&aacute; l&agrave; 5000đ. Tuy nhi&ecirc;n, ở Ch&ugrave;a Hương h&ocirc;m nay, muốn gửi xe phải nộp 50.000đ hoặc hơn t&ugrave;y... cảm hứng của người ch&ocirc;ng.</p>\r\n\r\n<p><em>Sau đ&acirc;y l&agrave; một số h&igrave;nh ảnh Ch&ugrave;a Hương ng&agrave;y khai hội:</em></p>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 3" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1608.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 3" /></em></h2>\r\n\r\n<h2><em>Suối Yến d&agrave;y đặc đ&ograve; trở kh&aacute;ch, nhiều đ&ograve; vẫn c&ograve;n t&igrave;nh trạng trở qu&aacute; tải.</em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 4" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1159.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 4" /></em></h2>\r\n\r\n<h2><em>T&igrave;nh trạng &ugrave;n tắc k&eacute;o d&agrave;i tại bến Trong.</em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 5" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1445.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 5" /></em></h2>\r\n\r\n<h2><em>D&ograve;ng người d&agrave;i h&agrave;ng chăm m&eacute;t chờ c&aacute;p treo.</em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 6" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1501.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 6" /></em></h2>\r\n\r\n<h2><em>Đường lễ ch&ugrave;a Thi&ecirc;n Tr&ugrave;.</em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 7" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1202%20%281%29.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 7" /></em></h2>\r\n\r\n<h2><em>Lối xuống động Hương T&iacute;ch chen ch&uacute;c chờ đợi đến h&agrave;ng giờ đồng hồ.</em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 8" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1312.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 8" /></em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 9" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1313.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 9" /></em></h2>\r\n\r\n<h2><em>Lực lượng c&ocirc;ng an đ&atilde; được tăng cường để đảm bảo&nbsp;an ninh&nbsp;cho lễ hội.</em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 10" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1356.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 10" /></em></h2>\r\n\r\n<h2><em>Trong động Hương T&iacute;ch chật cứng người.</em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 11" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1369.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 11" /></em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 12" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1396.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 12" /></em></h2>\r\n\r\n<h2><em><img alt="Hình ảnh Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc số 13" src="http://xmedia.nguoiduatin.vn/203/2015/2/24/IMG_1398.JPG" title="Khai hội Chùa Hương: Ôm nhũ đá để... hứng lộc - ảnh 13" /></em></h2>\r\n\r\n<h2><em>Chen ch&uacute;c dơ tay hứng &quot;lộc&quot; từ nhũ đ&aacute; nhỏ xuống.</em></h2>\r\n', '2015-07-18 23:56:03', '2015-08-23 04:22:25'),
(6, 'Du Xuân trẩy hội Chùa Hương cùng Saigontourist', 'cf770c3ac6.jpg', '- Cập nhật các hotgirl hàng đầu Việt Nam', '2', '<p>(NLĐO) - Sau Tết, đất trời vẫn c&ograve;n xu&acirc;n, l&ograve;ng người phấn chấn h&ograve;a c&ugrave;ng nhịp điệu tự nhi&ecirc;n l&ecirc;n đường trảy hội, h&agrave;nh hương về những miền đất linh thi&ecirc;ng của ba miền.</p>\r\n\r\n<p>Dịp n&agrave;y, C&ocirc;ng ty Dịch vụ Lữ h&agrave;nh Saigontourist chọn lọc giới thiệu ch&ugrave;m tour m&ugrave;a h&agrave;nh hương, lễ hội đặc sắc, khởi h&agrave;nh trong th&aacute;ng 3 v&agrave; th&aacute;ng 4 tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p>M&ugrave;a xu&acirc;n lu&ocirc;n rộn r&agrave;ng kh&ocirc;ng kh&iacute; lễ hội d&acirc;n gian, c&ugrave;ng với đ&oacute; l&agrave; những chuyến h&agrave;nh hương trải khắp 3 miền đất nước. Đến miền Bắc c&oacute; hội ch&ugrave;a Hương (H&agrave; Nội), Y&ecirc;n Tử (Quảng Ninh), lễ hội ch&ugrave;a B&aacute;i Đ&iacute;nh (Ninh B&igrave;nh); miền Trung trầm lắng bởi những ng&ocirc;i ch&ugrave;a cổ linh thi&ecirc;ng thu h&uacute;t bao kh&aacute;ch h&agrave;nh hương thập phương. Trong khi đ&oacute; ở miền Nam lại thấm đẫm m&agrave;u sắc văn h&oacute;a t&iacute;n ngưỡng pha trộn Việt - Hoa - Khmer - Chăm với lễ hội B&agrave; Ch&uacute;a Xứ (Ch&acirc;u Đốc - An Giang)&hellip;</p>\r\n\r\n<p><img alt="Cùng Saigontourist du lịch mùa hành hương, lễ hội" id="img_165128" src="http://nld.vcmedia.vn/thumb_w/540/2015/chuahuong-suoiyen-1-1-1425100449197.jpeg" title="" /></p>\r\n\r\n<p>Ở miền Bắc, d&agrave;i nhất phải kể hội ch&ugrave;a Hương, bắt đầu từ m&ugrave;ng 6 th&aacute;ng gi&ecirc;ng đến th&aacute;ng 3 &acirc;m lịch, thu h&uacute;t đ&ocirc;ng người dự bậc nhất. Hội ch&ugrave;a Hương đặc biệt bởi nơi chốn linh thi&ecirc;ng n&agrave;y gắn liền với thắng cảnh Hương T&iacute;ch - đệ nhất động trời Nam. L&ograve;ng người h&agrave;nh hương đ&atilde; b&eacute;n tiếng chu&ocirc;ng ch&ugrave;a h&ograve;a quyện kh&ocirc;ng gian những c&aacute;nh rừng h&ugrave;ng vĩ uốn quanh dải suối mềm như yếm đ&agrave;o, thấp tho&aacute;ng hang động ẩn s&acirc;u trong l&ograve;ng n&uacute;i non ti&ecirc;n cảnh.</p>\r\n\r\n<p>Cũng trảy hội suốt ba th&aacute;ng m&ugrave;a xu&acirc;n, từ m&ugrave;ng 10 Tết cho đến th&aacute;ng ba &Acirc;m lịch, l&agrave; hội Y&ecirc;n Tử. Mệnh danh trung t&acirc;m của Phật gi&aacute;o Việt Nam, ở Y&ecirc;n Tử c&ograve;n c&oacute; th&aacute;p Huệ Quang, nơi đặt một phần x&aacute; lợi của Phật Ho&agrave;ng Trần Nh&acirc;n T&ocirc;ng. Y&ecirc;n Tử, b&ecirc;n cạnh &yacute; nghĩa t&acirc;m linh Phật gi&aacute;o, c&ograve;n l&agrave; chốn phong cảnh hữu t&igrave;nh, n&uacute;i non tr&ugrave;ng điệp khiến bao người ngẩn ngơ khi đặt ch&acirc;n đến.</p>\r\n\r\n<p><img alt="Cùng Saigontourist du lịch mùa hành hương, lễ hội" id="img_165129" src="http://nld.vcmedia.vn/thumb_w/540/2015/trang-an-zing-4-1-1425100534354.jpg" title="" /></p>\r\n\r\n<p>Lễ hội m&ugrave;a xu&acirc;n quy m&ocirc; thứ ba ở miền Bắc l&agrave; hội ch&ugrave;a B&aacute;i Đ&iacute;nh ở Ninh B&igrave;nh. Trảy&nbsp;hội ch&ugrave;a B&aacute;i Đ&iacute;nh, cũng l&agrave; chuyến h&agrave;nh hương về v&ugrave;ng đất&nbsp;cố đ&ocirc; Hoa Lư. Ngo&agrave;i phần lễ, phần hội ch&ugrave;a B&aacute;i Đ&iacute;nh hấp dẫn với c&aacute;c tr&ograve; chơi d&acirc;n gian, biểu diễn nghệ thuật h&aacute;t ch&egrave;o, h&aacute;t xẩm. Phần s&acirc;n khấu h&oacute;a t&aacute;i hiện lễ đăng đ&agrave;n x&atilde; tắc của&nbsp;Đinh Ti&ecirc;n Ho&agrave;ng Đế&nbsp;v&agrave; lễ tế cờ của Vua Quang Trung tr&ecirc;n n&uacute;i Đ&iacute;nh trước giờ xung trận. Đến đ&acirc;y, du kh&aacute;ch c&oacute; dịp chi&ecirc;m b&aacute;i ng&ocirc;i ch&ugrave;a lớn nhất v&agrave; sở hữu nhiều kỷ lục nhất ở Việt Nam, như &ldquo;Ch&ugrave;a c&oacute; tượng Phật Th&iacute;ch Ca bằng đồng d&aacute;t v&agrave;ng lớn nhất&rdquo; v&agrave; &ldquo;ng&ocirc;i ch&ugrave;a c&oacute; h&agrave;nh lang La H&aacute;n d&agrave;i nhất&rdquo; (hai kỷ lục ch&acirc;u &Aacute; năm 2012); v&agrave; &ldquo;Ch&ugrave;a c&oacute; tượng Di Lặc bằng đồng lớn nhất Đ&ocirc;ng Nam &Aacute;&rdquo;...</p>\r\n\r\n<p>Đến miền Trung, mảnh đất duy&ecirc;n hải đầy nắng gi&oacute; n&agrave;y l&agrave; qu&ecirc; hương của bao nhi&ecirc;u ng&ocirc;i cổ tự linh thi&ecirc;ng lu&ocirc;n thu h&uacute;t kh&aacute;ch thập phương quanh năm, đặc biệt v&agrave;o mỗi m&ugrave;a xu&acirc;n. Nếu cố đ&ocirc; Huế c&oacute; ch&ugrave;a Linh Mụ, Đ&agrave; Nẵng c&oacute; ch&ugrave;a Linh Ứng hay quần thể đến ch&ugrave;a ở khu danh thắng Non Nước - Ngũ H&agrave;nh Sơn, th&igrave; phố cổ Hội An cũng hội tụ nhiều ng&ocirc;i ch&ugrave;a cổ thể hiện sự giao h&ograve;a t&iacute;n ngưỡng giữa người Việt v&agrave; cộng đồng người gốc Hoa&hellip;</p>\r\n\r\n<p><img alt="Cùng Saigontourist du lịch mùa hành hương, lễ hội" id="img_165130" src="http://nld.vcmedia.vn/thumb_w/540/2015/8-55-1425100580683.jpg" title="" /></p>\r\n\r\n<p>Trong khi đ&oacute;, lễ hội lớn nhất của miền Nam chắc chắn l&agrave; hội miếu B&agrave; Ch&uacute;a Xứ ở n&uacute;i Sam, ch&acirc;u Đốc (An Giang) thu h&uacute;t khoảng 2 triệu lượt kh&aacute;ch h&agrave;nh hương mỗi năm. K&eacute;o d&agrave;i suốt m&ugrave;a xu&acirc;n, từ th&aacute;ng gi&ecirc;ng đến đến 27-4&nbsp;&acirc;m lịch, lễ hội d&acirc;n gian đậm bản sắc Nam bộ n&agrave;y l&agrave; dịp để du kh&aacute;ch thập phương chi&ecirc;m b&aacute;i B&agrave; Ch&uacute;a Xứ linh thi&ecirc;ng, cầu t&agrave;i cầu lộc, may mắn v&agrave; ngoạn cảnh n&uacute;i Sam kỳ th&uacute;...</p>\r\n\r\n<p>Dịp n&agrave;y, C&ocirc;ng ty dịch vụ Lữ h&agrave;nh Saigontourist sẽ đưa du kh&aacute;ch đến t&acirc;m điểm của những sự kiện văn h&oacute;a d&acirc;n gian đậm bản sắc n&agrave;y bằng c&aacute;c đường tour từ TP HCM đi h&agrave;nh hương&nbsp;<strong>Y&ecirc;n Tử - Hạ Long - Ninh B&igrave;nh - H&agrave; Nội</strong>* (4,75 triệu đồng - khởi h&agrave;nh ng&agrave;y 11, 18, 25-3; 1-4); dự lễ hội ch&ugrave;a B&aacute;i Đ&iacute;nh theo tuyến&nbsp;<strong>H&agrave; Nội - Ninh B&igrave;nh - Hạ Long*</strong>(4,65 triệu đồng - li&ecirc;n tục trong th&aacute;ng 3); dự&nbsp;<strong>Hội ch&ugrave;a Hương - H&agrave; Nội - Hạ Long*</strong>&nbsp;(4,995 triệu đồng - ng&agrave;y 28-3; 2-4);&nbsp;<strong>H&agrave;nh hương miền Trung - Đ&agrave; Nẵng - Hội An - động Thi&ecirc;n Đường - Huế</strong>* (4,15 triệu đồng - th&aacute;ng 3, 4); &nbsp;<strong>Hội B&agrave; ch&uacute;a Xứ - miền T&acirc;y</strong>&nbsp;(3,15 triệu đồng - KH ng&agrave;y 5, 7, 12, 14, 19, 21, 26, 28-3; 2-4);&nbsp;<strong>V&atilde;ng cảnh Thất Sơn - Sa Đ&eacute;c - Long Xuy&ecirc;n - Ch&acirc;u Đốc</strong>&nbsp;(2,555 triệu đồng - KH ng&agrave;y 7, 14, 21, 28-3);&nbsp;<strong>tour về nguồn&nbsp;C&ocirc;n Đảo&nbsp;</strong>(từ 5,04 triệu đồng - khởi h&agrave;nh hằng ng&agrave;y)...&nbsp;(*gi&aacute; chưa bao gồm v&eacute; m&aacute;y bay).</p>\r\n\r\n<p>Tham gia tour, du kh&aacute;ch của Saigontourist đồng thời c&oacute; cơ hội tham gia chương tr&igrave;nh khuyến m&atilde;i Tết, với giải đặc biệt gồm: tour mới&nbsp;<em>Malta - Gozo - Sicily - Dubai&nbsp;</em>với đảo thi&ecirc;n đường Địa Trung Hải&nbsp;Malta&nbsp;v&agrave; 100 triệu đồng tiền mặt; c&ugrave;ng nhiều giải thưởng c&oacute; gi&aacute; trị kh&aacute;c đều bằng tiền mặt.</p>\r\n', '2015-07-19 00:01:34', '2015-08-23 04:22:37'),
(7, 'Ùn Ùn trẩy hội các đền và khu du lịch', '466e141a2b.png', 'Cập nhật các hotgirl hàng đầu Việt NamCập nhật các hotgirl hàng đầu Việt NamCập nhật các hotgirl hàng đầu Việt NamCập nhật các hotgirl hàng đầu Việt Nam', '3', '<h2>Tr&ecirc;n 600.000 người dự khai hội ch&ugrave;a Hương l R&ugrave;ng rợn lễ hội khai đao ch&eacute;m lợn l&agrave;ng N&eacute;m Thượng</h2>\r\n\r\n<p><a href="http://nld.com.vn/mua-le-hoi.html" target="_blank" title="Mùa lễ hội">M&ugrave;a lễ hội</a>&nbsp;năm 2015 đ&atilde; bắt đầu khi h&ocirc;m qua, 24-2 (m&ugrave;ng 6 Tết), người d&acirc;n khắp nơi trong cả nước đ&atilde; đổ x&ocirc; đến c&aacute;c điểm lễ hội d&acirc;ng hương cầu ph&uacute;c, an l&agrave;nh cho năm mới.</p>\r\n\r\n<p><strong>Rồng rắn đến ch&ugrave;a Hương</strong></p>\r\n\r\n<p>Hơn 600.000 người đ&atilde; về dự ng&agrave;y khai&nbsp;<strong>hội</strong>&nbsp;ch&ugrave;a Hương (huyện Mỹ Đức, TP H&agrave; Nội). Theo ghi nhận của ch&uacute;ng t&ocirc;i, trước một lượng kh&aacute;ch qu&aacute; đ&ocirc;ng nhưng t&igrave;nh trạng chen lấn, x&ocirc; đạp đ&atilde; kh&ocirc;ng xảy ra. Tuy nhi&ecirc;n, c&aacute;c ga c&aacute;p treo l&ecirc;n ch&ugrave;a bị qu&aacute; tải. Du kh&aacute;ch rồng rắn xếp h&agrave;ng mua v&eacute;, nhiều người chờ h&agrave;ng giờ vẫn chưa đến lượt m&igrave;nh.</p>\r\n\r\n<p>Điểm đ&aacute;ng ghi nhận trong ng&agrave;y đầu của lễ&nbsp;<a href="http://nld.com.vn/hoi-chua-huong.html" target="_blank" title="hội chùa Hương">hội ch&ugrave;a Hương</a>&nbsp;năm nay l&agrave; diễn ra kh&aacute; trật tự. &Ocirc;ng Nguyễn Văn Hậu - Ph&oacute; Chủ tịch UBND huyện Mỹ Đức, Trưởng Ban Tổ chức lễ hội - cho biết nhờ bố tr&iacute; lực lượng kiểm tra li&ecirc;n ng&agrave;nh n&ecirc;n kh&ocirc;ng xảy ra việc c&aacute;c cơ sở kinh doanh, đặc biệt l&agrave; c&aacute;c nh&agrave; h&agrave;ng ăn uống, g&acirc;y&nbsp;<a href="http://nld.com.vn/mat-trat-tu.html" target="_blank" title="mất trật tự">mất trật tự</a>, mỹ quan. Hiện tượng b&agrave;y b&aacute;n thịt th&uacute; rừng ở c&aacute;c qu&aacute;n ăn, treo thịt sống g&acirc;y phản cảm đ&atilde; kh&ocirc;ng c&ograve;n như mọi năm. V&agrave;i cơ sở kinh doanh l&eacute;n l&uacute;t b&agrave;y b&aacute;n th&uacute; rừng lập tức bị lực lương chức năng lập bi&ecirc;n bản thu giữ h&agrave;ng h&oacute;a, xử phạt tại chỗ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Du khách xếp hàng mua vé cáp treo vào chùa HươngẢnh: MẠNH DUY" id="img_163998" src="http://nld.vcmedia.vn/thumb_w/540/2015/thoisu1-1424796338493.jpg" title="Du khách xếp hàng mua vé cáp treo vào chùa HươngẢnh: MẠNH DUY" /></p>\r\n\r\n<p>Du kh&aacute;ch xếp h&agrave;ng mua v&eacute; c&aacute;p treo v&agrave;o ch&ugrave;a Hương - Ảnh: MẠNH DUY</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Theo &ocirc;ng Nguyễn Văn Hậu, đ&acirc;y l&agrave; năm đầu ti&ecirc;n thiết lập &ldquo;Kỷ cương v&agrave; văn minh du lịch&rdquo; ở ch&ugrave;a Hương n&ecirc;n cảnh s&aacute;t giao th&ocirc;ng, cảnh s&aacute;t cơ động của huyện v&agrave; TP H&agrave; Nội đ&atilde; được tăng cường l&agrave;m nhiệm vụ. Đặc biệt, c&aacute;c tổ c&ocirc;ng t&aacute;c 141 xử l&yacute; nhanh vi phạm giao th&ocirc;ng v&agrave; trật tự cũng được tăng cường từ cửa ng&otilde; của huyện Mỹ Đức v&agrave; x&atilde; Hương Sơn n&ecirc;n hiện tượng &ldquo;c&ograve; mồi&rdquo;,&nbsp;<a href="http://nld.com.vn/cheo-keo-khach.html" target="_blank" title="chèo kéo khách">ch&egrave;o k&eacute;o kh&aacute;ch</a>&nbsp;giảm hẳn.</p>\r\n\r\n<p>Dịch vụ&nbsp;, &ldquo;chặt ch&eacute;m&rdquo; du kh&aacute;ch cũng kh&ocirc;ng c&ograve;n. Khi v&agrave;o đến tận suối Yến mới c&oacute; hiện tượng c&aacute;c hộ kinh doanh dọc hai b&ecirc;n Bến Đ&uacute;c h&eacute;t gi&aacute; tiền gửi xe của du kh&aacute;ch.</p>\r\n\r\n<p>Chị Nguyễn Hiền Diệu, ngụ TP H&agrave; Nội, nhận x&eacute;t: &ldquo;Gi&aacute; c&aacute;c dịch vụ ăn, nghỉ v&agrave;o ng&agrave;y khai hội ở ch&ugrave;a Hương lu&ocirc;n được n&acirc;ng l&ecirc;n do lượng kh&aacute;ch tham quan qu&aacute; đ&ocirc;ng. Tuy nhi&ecirc;n, gi&aacute; cả năm nay cũng kh&ocirc;ng qu&aacute; đắt tới mức &ldquo;cắt cổ&rdquo; như c&aacute;c m&ugrave;a lễ hội trước&rdquo;.</p>\r\n\r\n<p><strong>H&ograve; reo ch&eacute;m lợn</strong></p>\r\n\r\n<p>Tr&aacute;i ngược với h&igrave;nh ảnh đi ch&ugrave;a d&acirc;ng hương, cầu ph&uacute;c, một lễ hội nhuốm m&agrave;u bạo lực đ&atilde; diễn ra tại l&agrave;ng N&eacute;m Thượng (huyện Ti&ecirc;n Du, tỉnh Bắc Ninh). Đ&oacute; l&agrave; lễ hội ch&eacute;m lợn.</p>\r\n\r\n<p>H&agrave;ng ng&agrave;n người đ&atilde; đổ x&ocirc; về l&agrave;ng Thượng để xem cảnh ch&eacute;m lợn. Đúng 9 giờ ng&agrave;y 24-2, như tục l&ecirc;̣, &ldquo;&ocirc;ng lợn&rdquo; được rước quanh làng để mọi người sờ vào cầu may. Đ&ecirc;́n 12 giờ, &ldquo;&ocirc;ng lợn&rdquo; được v&ecirc;̀ đ&ecirc;́n s&acirc;n đình Thượng.</p>\r\n\r\n<p>Lúc này, s&acirc;n đình đã ch&acirc;̣t kín người d&acirc;n và du khách. Sau khi tướng cờ l&agrave;m lễ phất cờ, 2 thủ đao ch&iacute;nh thức &ldquo;khai đao ch&eacute;m lợn tế th&aacute;nh&rdquo;. Người xem ph&acirc;́n khích reo hò khi 2 &ldquo;đao th&acirc;̀n&rdquo; giơ đao chém xu&ocirc;́ng đ&acirc;̀u &ldquo;&ocirc;ng lợn&rdquo;. Nhiều người sau đ&oacute; quết tiền v&agrave;o m&aacute;u &ldquo;&ocirc;ng lợn&rdquo; bị ch&eacute;m với hy vọng năm mới thật nhiều may mắn. Ngay sau đó, ph&acirc;̀n th&acirc;n và đ&acirc;̀u &ldquo;&ocirc;ng ỉn&rdquo; được đưa ra s&acirc;n sau làm c&ocirc;̃ cúng Thành hoàng Làng.</p>\r\n\r\n<p>Lễ hội ch&eacute;m lợn l&agrave;ng N&eacute;m Thượng bắt nguồn từ một truyền thuyết xưa, vị tướng Đo&agrave;n Thượng khi đ&aacute;nh trận chạy đến v&ugrave;ng n&uacute;i N&eacute;m Thượng đồn tr&uacute; đ&atilde; ch&eacute;m lợn rừng nu&ocirc;i qu&acirc;n. Từ đ&oacute;, hằng năm, người d&acirc;n mở hội ch&eacute;m lợn để tưởng nhớ người c&oacute; c&ocirc;ng khai khẩn đất đai.</p>\r\n\r\n<p>Đ&atilde; c&oacute; rất nhiều &yacute; kiến về việc hủy bỏ lễ hội nhuốm m&agrave;u bạo lực n&agrave;y. Trước đ&oacute;, Tổ chức Động vật ch&acirc;u &Aacute; k&ecirc;u gọi dừng lễ hội, bởi việc ch&eacute;m những con lợn c&ograve;n đang sống khỏe mạnh l&agrave; đối xử t&agrave;n &aacute;c đối với động vật. Quan trọng hơn, những h&igrave;nh ảnh bạo lực của lễ hội l&agrave;m trơ l&igrave; cảm x&uacute;c của người xem khi chứng kiến c&aacute;ch thức động vật bị đối xử d&atilde; man, đặc biệt l&agrave; trẻ em.</p>\r\n\r\n<p>&Ocirc;ng Nguy&ecirc;̃n Đăng Thức, Phó trưởng Ban T&ocirc;̉ chức l&ecirc;̃ h&ocirc;̣i, cho bi&ecirc;́t sau khi có nhi&ecirc;̀u dư lu&acirc;̣n trái chi&ecirc;̀u, c&aacute;c ban, ngành li&ecirc;n quan đ&atilde; v&acirc;̣n đ&ocirc;̣ng thay đ&ocirc;̉i nghi l&ecirc;̃ nhưng d&acirc;n làng v&acirc;̃n quy&ecirc;́t định giữ lại tục xưa. Nhiều người trong l&agrave;ng xem việc ch&eacute;m lợn là ni&ecirc;̀m tự hào, l&agrave; dịp để tái hi&ecirc;̣n lịch sử, tưởng nhớ đ&ecirc;́n vị anh hùng ng&agrave;y n&agrave;o.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Cảnh cướp lộc ở lễ hội đền GióngẢnh: Nguyễn Hưởng" id="img_164000" src="http://nld.vcmedia.vn/thumb_w/540/2015/thoisu-1424796338491.jpg" title="Cảnh cướp lộc ở lễ hội đền GióngẢnh: Nguyễn Hưởng" /></p>\r\n\r\n<p>Cảnh cướp lộc ở lễ hội đền Gi&oacute;ngẢnh: Nguyễn Hưởng</p>\r\n', '2015-07-19 00:07:01', '2015-08-23 04:22:46'),
(8, 'Tổ chức chương trình Hướng về Hương Tích ', '3d97a63b1b.jpg', 'Để đáp ứng nhu cầu sinh hoạt của người dân cũng như việc du lịch thăm quan thắng cảnh, Hội đồng hương sinh viên Nam Định tại Hà Nội tổ chức chương: "Hướng về Hương Tích" để góp một phần nhỏ cho sự thành công của lễ Hội chùa Hương năm nay.\r\n', '4', '<p>Ch&ugrave;a Hương l&agrave; c&aacute;ch n&oacute;i trong d&acirc;n gian, tr&ecirc;n thực tế ch&ugrave;a Hương hay Hương Sơn l&agrave; cả một quần thể văn h&oacute;a - t&ocirc;n gi&aacute;o Việt Nam, gồm h&agrave;ng chục ng&ocirc;i ch&ugrave;a thờ Phật, v&agrave;i ng&ocirc;i đền thờ thần, c&aacute;c ng&ocirc;i đ&igrave;nh, thờ t&iacute;n ngưỡng n&ocirc;ng nghiệp. Trung t&acirc;m ch&ugrave;a Hương nằm ở x&atilde; Hương Sơn, huyện Mỹ Đức, H&agrave; Nội, nằm ven bờ phải s&ocirc;ng Đ&aacute;y. Trung t&acirc;m của cụm đền ch&ugrave;a tại v&ugrave;ng n&agrave;y ch&iacute;nh l&agrave; ch&ugrave;a Hương nằm trong động Hương T&iacute;ch hay c&ograve;n gọi l&agrave; ch&ugrave;a Trong.<br />\r\n<br />\r\nĐể đ&aacute;p ứng nhu cầu sinh hoạt của người d&acirc;n cũng như việc du lịch thăm quan thắng cảnh, Hội đồng hương sinh vi&ecirc;n Nam Định tại H&agrave; Nội tổ chức chương: &quot;Hướng về Hương T&iacute;ch&quot; để g&oacute;p một phần nhỏ cho sự th&agrave;nh c&ocirc;ng của lễ Hội ch&ugrave;a Hương năm nay.<br />\r\n<br />\r\nĐược sự đồng &yacute; của ban tổ chức, Thầy chủ tr&igrave;, Hội đồng hương sinh vi&ecirc;n Nam Định tại H&agrave; Nội tuyển 45 t&igrave;nh nguyện vi&ecirc;n l&ecirc;n ch&ugrave;a l&agrave;m c&ocirc;ng quả.<br />\r\n1. Thời gian tuyển t&igrave;nh nguyện vi&ecirc;n : từ ng&agrave;y 18-03-2015 đến ng&agrave;y 19-03-2015<br />\r\n2. Thời gian tập chung v&agrave; địa điểm xuất ph&aacute;t:<br />\r\n+ Thời gian: 18h ng&agrave;y 20-03-2015<br />\r\n+ Địa điểm tập chung : Đ&agrave;i phun nước Đại học Quốc Gia H&agrave; Nội.<br />\r\n3. Thời gian v&agrave; địa điểm về:<br />\r\n+ Thời gian: Chiều tối ng&agrave;y 22-03-2015<br />\r\n+ Địa điểm về : Đại học Quốc gia H&agrave; Nội.<br />\r\n<br />\r\nKhi tham gia chương tr&igrave;nh c&aacute;c bạn sẽ được ban tổ chức cũng như ban quản l&yacute; ch&ugrave;a hỗ trợ ăn nghỉ, c&aacute;c v&eacute; v&agrave;o cửa cũng như những nhu yếu phẩm phục vụ trong c&ocirc;ng t&aacute;c t&igrave;nh nguyện của c&aacute;c bạn. C&aacute;c bạn sẽ đ&oacute;ng 180.000đ chi ph&iacute; bao gồm cả chi ph&iacute; di chuyển H&agrave; Nội - ch&ugrave;a Hương v&agrave; tiền đ&ograve;.<br />\r\n<br />\r\n<br />\r\nHoan hỷ các bạn trẻ, sinh vi&ecirc;n đang học t&acirc;̣p ở Hà N&ocirc;̣i tham gia chương tr&igrave;nh t&igrave;nh.<br />\r\nA DI ĐÀ PH&Acirc;̣T!<br />\r\n<br />\r\nMọi thắc mắc c&aacute;c bạn li&ecirc;n hệ :<br />\r\n- Nguyễn Đức Ho&agrave;n : 0975.123.550&nbsp;<br />\r\n- Phạm Văn C&ocirc;ng: 01698.341.336<br />\r\n- Phạm Văn Ph&ograve;ng: 0962.173.631</p>\r\n', '2015-07-19 00:09:04', '2015-08-23 04:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Thành viên', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Chưa kích hoạt', '2015-07-13 17:46:55', '2015-07-13 17:46:55'),
(2, 'Đã kích hoạt', '2015-07-13 17:47:21', '2015-07-13 17:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `temple`
--

CREATE TABLE IF NOT EXISTS `temple` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1001 ;

--
-- Dumping data for table `temple`
--

INSERT INTO `temple` (`id`, `created_at`, `updated_at`) VALUES
(1000, '2015-08-21 17:00:00', '2015-08-21 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `temples`
--

CREATE TABLE IF NOT EXISTS `temples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year_built` int(10) NOT NULL,
  `architecture` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'kien truc',
  `abbot` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `history` text COLLATE utf8_unicode_ci NOT NULL,
  `bots` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'cac doi to',
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1002 ;

--
-- Dumping data for table `temples`
--

INSERT INTO `temples` (`id`, `name`, `adress`, `image`, `year_built`, `architecture`, `abbot`, `history`, `bots`, `website`, `phone`, `email`, `other`, `created_at`, `updated_at`) VALUES
(1001, 'Chùa tùng lâm', 'hà nộ', '122c75a5e8.jpg', 1992, '1992', 'phan van quang', 'qweqwe', 'wqeqweq', '1992dfsdfsdf.com', '0125984544', 'dfgsdfgd@gmailc.ocds', '<p>sssssssssssssd</p>\r\n', '2015-08-22 09:41:42', '2015-08-22 23:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(25, 'phan van quang', 'tieuqeuangnd@gmail.com', 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 2, NULL, '2015-07-16 23:34:09', '2015-07-18 23:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id_foreign_idx` (`user_id`),
  KEY `role_id_foreign` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1020 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1013, 25, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
