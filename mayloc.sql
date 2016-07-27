-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2016 at 04:15 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mayloc`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `photo`, `product_id`, `created_at`, `updated_at`) VALUES
(9, '/photos/1/nhat-pham/577b2265ddc07.png', 7, '2016-07-05 00:36:54', '2016-07-05 00:36:54'),
(10, '/photos/1/nhat-pham/577b2277ab058.png', 7, '2016-07-05 00:36:54', '2016-07-05 00:36:54'),
(11, '/photos/1/nhat-pham/577b5922e06ce.png', 7, '2016-07-05 00:36:54', '2016-07-05 00:36:54'),
(12, '/photos/1/nhat-pham/577b2265ddc07.png', 8, '2016-07-05 00:44:01', '2016-07-05 00:44:01'),
(14, '/photos/1/nhat-pham/577b2277ab058.png', 8, '2016-07-05 00:44:01', '2016-07-05 00:44:01'),
(15, '/photos/1/nhat-pham/577b5922e06ce.png', 8, '2016-07-05 00:44:01', '2016-07-05 00:44:01'),
(16, '/photos/1/nhat-pham/577b2277ab058.png', 9, '2016-07-05 18:58:15', '2016-07-05 18:58:15'),
(17, '/photos/1/nhat-pham/577b2265ddc07.png', 9, '2016-07-05 18:58:15', '2016-07-05 18:58:15'),
(18, '/photos/1/nhat-pham/5779e65d5bdde.png', 10, '2016-07-10 18:47:29', '2016-07-10 18:47:29'),
(19, '/photos/1/nhat-pham/577b2265ddc07.png', 10, '2016-07-10 18:47:29', '2016-07-10 18:47:29'),
(20, '/photos/1/nhat-pham/577b2277ab058.png', 10, '2016-07-10 18:47:29', '2016-07-10 18:47:29'),
(21, '/photos/1/nhat-pham/5782fa724b75a.jpg', 8, '2016-07-12 21:12:35', '2016-07-12 21:12:35'),
(22, '/photos/1/nhat-pham/5779e65d5bdde.png', 8, '2016-07-12 21:12:36', '2016-07-12 21:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `set_title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `format` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `lft`, `rgt`, `depth`, `sort_order`, `set_title`, `meta_desc`, `meta_key`, `publish`, `format`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm', 'san-pham', NULL, 1, 34, 0, 0, '', '', '', '0', 'product', '2016-07-03 21:24:52', '2016-07-11 00:46:41'),
(2, 'Tin tức - sự kiện', 'tin-tuc-su-kien', NULL, 35, 36, 0, 0, 'Tin tức - sự kiện', 'Tin tức - sự kiện', 'Tin tức - sự kiện', '0', 'news', '2016-07-05 18:40:45', '2016-07-11 00:46:41'),
(3, 'Máy lọc không khí', 'may-loc-khong-khi', 1, 2, 15, 1, 0, 'Máy lọc không khí', 'Máy lọc không khí', 'Máy lọc không khí', '1', 'product', '2016-07-08 20:09:57', '2016-07-11 00:42:49'),
(4, 'Máy lọc không khí Panasonic', 'may-loc-khong-khi-panasonic', 3, 3, 4, 2, 0, 'Máy lọc không khí Panasonic', 'Máy lọc không khí Panasonic', 'Máy lọc không khí Panasonic', '0', 'product', '2016-07-10 18:43:45', '2016-07-10 18:48:46'),
(5, 'Máy lọc không khí Coway', 'may-loc-khong-khi-coway', 3, 5, 6, 2, 0, 'Máy lọc không khí Coway', 'Máy lọc không khí Coway', 'Máy lọc không khí Coway', '0', 'product', '2016-07-11 00:40:34', '2016-07-11 00:40:44'),
(6, 'Máy lọc không khí DAIKIN', 'may-loc-khong-khi-daikin', 3, 7, 8, 2, 0, 'Máy lọc không khí DAIKIN', 'Máy lọc không khí DAIKIN', 'Máy lọc không khí DAIKIN', '0', 'product', '2016-07-11 00:41:02', '2016-07-11 00:41:02'),
(7, 'Máy lọc không khí LIFEPRO', 'may-loc-khong-khi-lifepro', 3, 9, 10, 2, 0, 'Máy lọc không khí LIFEPRO', 'Máy lọc không khí LIFEPRO', 'Máy lọc không khí LIFEPRO', '0', 'product', '2016-07-11 00:41:23', '2016-07-11 00:41:23'),
(8, 'Máy lọc không khí AIROCIDE – NASA', 'may-loc-khong-khi-airocide-nasa', 3, 11, 12, 2, 0, 'Máy lọc không khí AIROCIDE – NASA', 'Máy lọc không khí AIROCIDE – NASA', 'Máy lọc không khí AIROCIDE – NASA', '0', 'product', '2016-07-11 00:42:32', '2016-07-11 00:42:32'),
(9, 'Máy lọc không khí Gia Phong', 'may-loc-khong-khi-gia-phong', 3, 13, 14, 2, 0, 'Máy lọc không khí Gia Phong', 'Máy lọc không khí Gia Phong', 'Máy lọc không khí Gia Phong', '0', 'product', '2016-07-11 00:42:49', '2016-07-11 00:42:49'),
(10, 'Máy lọc không khí chuyên dụng', 'may-loc-khong-khi-chuyen-dung', 1, 16, 33, 1, 0, 'Máy lọc không khí chuyên dụng', 'Máy lọc không khí chuyên dụng', 'Máy lọc không khí chuyên dụng', '0', 'product', '2016-07-11 00:43:05', '2016-07-11 00:46:41'),
(11, 'Máy lọc không khí trên Ô tô', 'may-loc-khong-khi-tren-o-to', 10, 17, 18, 2, 0, 'Máy lọc không khí trên Ô tô', 'Máy lọc không khí trên Ô tô', 'Máy lọc không khí trên Ô tô', '0', 'product', '2016-07-11 00:43:36', '2016-07-11 00:43:36'),
(12, 'Máy lọc không khí bệnh viện', 'may-loc-khong-khi-benh-vien', 10, 19, 20, 2, 0, 'Máy lọc không khí bệnh viện', 'Máy lọc không khí bệnh viện', 'Máy lọc không khí bệnh viện', '0', 'product', '2016-07-11 00:43:51', '2016-07-11 00:43:52'),
(14, 'Máy lọc không khí trường học', 'may-loc-khong-khi-truong-hoc', 10, 21, 22, 2, 0, 'Máy lọc không khí trường học', 'Máy lọc không khí trường học', 'Máy lọc không khí trường học', '0', 'product', '2016-07-11 00:44:16', '2016-07-11 00:44:35'),
(15, 'Máy lọc không khí công nghiệp', 'may-loc-khong-khi-cong-nghiep', 10, 23, 24, 2, 0, 'Máy lọc không khí công nghiệp', 'Máy lọc không khí công nghiệp', 'Máy lọc không khí công nghiệp', '0', 'product', '2016-07-11 00:45:02', '2016-07-11 00:45:02'),
(16, 'Máy lọc không khí gia đình', 'may-loc-khong-khi-gia-dinh', 10, 25, 26, 2, 0, 'Máy lọc không khí gia đình', 'Máy lọc không khí gia đình', 'Máy lọc không khí gia đình', '0', 'product', '2016-07-11 00:45:28', '2016-07-11 00:45:29'),
(17, 'Máy lọc không khí nhà hàng, khách sạn', 'may-loc-khong-khi-nha-hang-khach-san', 10, 27, 28, 2, 0, 'Máy lọc không khí nhà hàng, khách sạn', 'Máy lọc không khí nhà hàng, khách sạn', 'Máy lọc không khí nhà hàng, khách sạn', '0', 'product', '2016-07-11 00:45:59', '2016-07-11 00:45:59'),
(18, 'Máy lọc không khí văn phòng', 'may-loc-khong-khi-van-phong', 10, 29, 30, 2, 0, 'Máy lọc không khí văn phòng', 'Máy lọc không khí văn phòng', 'Máy lọc không khí văn phòng', '0', 'product', '2016-07-11 00:46:24', '2016-07-11 00:46:24'),
(19, 'Máy lọc không khí phòng họp', 'may-loc-khong-khi-phong-hop', 10, 31, 32, 2, 0, 'Máy lọc không khí phòng họp', 'Máy lọc không khí phòng họp', 'Máy lọc không khí phòng họp', '0', 'product', '2016-07-11 00:46:40', '2016-07-11 00:46:53'),
(20, 'Dự án', 'du-an', NULL, 37, 38, 0, 0, 'Dự án máy lọc không khí', 'máy lọc không khí, máy hút ẩm', 'máy lọc không khí, máy hút ẩm', '0', 'project', '2016-07-19 02:15:26', '2016-07-19 02:15:26'),
(21, 'Đối tác - khách hàng', 'doi-tac-khach-hang', NULL, 39, 44, 0, 0, 'Đối tác - khách hàng', 'Đối tác - khách hàng', 'Đối tác - khách hàng', '0', 'partner', '2016-07-19 07:51:16', '2016-07-19 07:55:37'),
(22, 'Đối tác', 'doi-tac', 21, 42, 43, 1, 0, 'Đối tác công ty', 'Đối tác công ty', 'Đối tác công ty', '0', 'partner', '2016-07-19 07:54:54', '2016-07-19 07:55:37'),
(23, 'Khách hàng', 'khach-hang', 21, 40, 41, 1, 0, 'Khách hàng công ty', 'Khách hàng công ty', 'Khách hàng công ty', '0', 'partner', '2016-07-19 07:55:20', '2016-07-19 07:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `body`, `product`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Thị Ngọc Lam', 'ngoclam@cute.ct', '0905483996', 'Hỗ trợ rất tốt. Cảm ơn', '', 1, '2016-07-24 17:46:24', '2016-07-25 03:00:39'),
(8, 'Ngọc Lam', 'lamngoc@gmail.com', '0985678889', '', 'Máy lọc không khí Panasonic FPXF35A', 0, '2016-07-25 02:02:35', '2016-07-25 02:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `publish`, `created_at`, `updated_at`) VALUES
(1, 'Primary-menu', '0', '2016-07-06 19:34:14', '2016-07-06 19:34:14'),
(2, 'Danh mục sản phẩm', '0', '2016-07-11 00:55:36', '2016-07-11 00:55:36'),
(3, 'Hỗ trợ khách hàng', '0', '2016-07-22 05:09:27', '2016-07-22 05:11:04'),
(4, 'Chính sách khách hàng', '0', '2016-07-22 05:11:15', '2016-07-22 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `category_id`, `page_id`, `parent_id`, `lft`, `rgt`, `depth`, `order`) VALUES
(1, 1, 1, NULL, NULL, 5, 6, 0, 0),
(2, 1, 2, NULL, NULL, 9, 10, 0, 0),
(3, 1, NULL, 1, NULL, 1, 2, 0, 0),
(4, 1, NULL, 2, NULL, 11, 12, 0, 0),
(5, 1, NULL, 3, NULL, 7, 8, 0, 0),
(7, 2, 3, NULL, NULL, 1, 2, 0, 0),
(8, 2, 4, NULL, NULL, 3, 4, 0, 0),
(9, 2, 5, NULL, NULL, 5, 6, 0, 0),
(10, 2, 6, NULL, NULL, 7, 8, 0, 0),
(11, 2, 7, NULL, NULL, 9, 10, 0, 0),
(12, 2, 8, NULL, NULL, 13, 14, 0, 0),
(13, 2, 9, NULL, NULL, 11, 12, 0, 0),
(14, 2, 10, NULL, NULL, 15, 16, 0, 0),
(15, 2, 11, NULL, NULL, 17, 18, 0, 0),
(16, 2, 12, NULL, NULL, 29, 30, 0, 0),
(17, 2, 14, NULL, NULL, 31, 32, 0, 0),
(18, 2, 15, NULL, NULL, 25, 26, 0, 0),
(19, 2, 16, NULL, NULL, 27, 28, 0, 0),
(20, 2, 17, NULL, NULL, 3, 4, 0, 0),
(21, 2, 18, NULL, NULL, 23, 24, 0, 0),
(22, 2, 19, NULL, NULL, 19, 20, 0, 0),
(23, 1, 20, NULL, NULL, NULL, NULL, NULL, 0),
(24, 3, NULL, 7, NULL, NULL, NULL, NULL, 0),
(25, 3, NULL, 8, NULL, NULL, NULL, NULL, 0),
(26, 3, NULL, 9, NULL, NULL, NULL, NULL, 0),
(27, 4, NULL, 4, NULL, NULL, NULL, NULL, 0),
(28, 4, NULL, 5, NULL, NULL, NULL, NULL, 0),
(29, 4, NULL, 6, NULL, NULL, NULL, NULL, 0),
(30, 4, NULL, 10, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_08_173535_create_categories_table', 1),
('2016_05_17_073147_create_pages_table', 1),
('2016_05_17_162229_create_sliders_table', 1),
('2016_05_18_075641_create_carriages_table', 1),
('2016_05_22_171510_create_news_table', 1),
('2016_05_27_171155_create_menus_table', 1),
('2016_05_27_171330_create_menu_items_table', 1),
('2016_06_08_115921_create_orders_table', 1),
('2016_06_08_174050_create_settings_table', 1),
('2016_06_30_085524_create_partners_table', 1),
('2016_07_19_084914_create_projects_table', 2),
('2016_07_19_143630_alter_partners_table', 3),
('2016_07_19_145906_alter_partners_table', 4),
('2016_07_23_104700_create_contacts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `set_title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `slug`, `image`, `content`, `category_id`, `set_title`, `meta_desc`, `meta_key`, `publish`, `view`, `created_at`, `updated_at`) VALUES
(1, 'Những trải nghiệm thú vị khi đi du lịch Đà Nẵng bằng xe máy', 'nhung-trai-nghiem-thu-vi-khi-di-du-lich-da-nang-bang-xe-may', '/photos/1/nhat-pham/577c621498cf4.jpg', '<p><strong>Du lịch Đà Nẵng</strong> chỉ bằng chiếc xe máy, bạn đã thử chưa?<span id="more-69"></span> Không quá khó khăn để bạn có thể thuê được một chiếc xe máy ở các địa điểm <strong>cho thuê xe máy Đà Nẵng</strong>, chi phí không cao cho chuyến du lịch của bạn.Đây sẽ làm một trải nghiệm thú vị cho bạn nhất là với những người trẻ khi đến Đà Nẵng. Dưới đây là một số gợi ý cho bạn trải nghiệm khi thực hiện chuyến du lịch khám phá Đà Nẵng của mình chỉ bằng chiếc xe máy.</p>\r\n<p><strong>1. Nếm thử tất cả các món ăn vặt</strong></p>\r\n<p><strong><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/an-vat-da-nang.jpg" alt="ăn-vat-o-da-nang" width="730" /></strong></p>\r\n<p>Đà Nẵng nổi tiếng là thiên đường ăn vặt với rất nhiều món ăn vặt hấp dẫn, thu hút rất nhiều người nhất là các bạn tuổi teen. Nếu bạn là người mê các món ăn vặt thì Đà Nẵng là địa điểm lý tưởng cho bạn với rất nhiều món hấp dẫn như bánh tráng kẹp, mít trộn, ốc hút, bánh tráng tương,… Bạn sẽ dễ dàng tìm thấy các món ăn vặt ở nhiều địa điểm trên thành phố như khu chợ Cồn, chợ Hàn, khu yaourt muối dưới chân cầu Trần Thị Lý,…</p>\r\n<p><strong>2. Phượt ra vùng ngoại ô và các tỉnh lân cận</strong></p>\r\n<p><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/ba_na_namchamdulich_2.jpg" alt="du-lich-ba-na" width="730" /></p>\r\n<p>Ngoài các địa điểm ở trong thành phố thì phượt ra các địa điểm vùng ngoại ô thành phố hay xa hơn tí là các tỉnh lân cận cũng là ý tưởng không tồi. Di chuyển lên Bà Nà, đến du lịch vòng quanh bán đảo, khám phá Ngũ Hành Sơn hay xa hơn là ra Nam Ô ăn gỏi cá, chinh phục ngọn đèo đẹp Hải Vân, chạy xe về Hội An, đi Cù Lao Chàm,… Bạn sẽ thấy rằng còn rất nhiều điểm thú vị cho bạn chinh phục ngoài thành phố Đà Nẵng chì bằng một chiếc xe máy.</p>\r\n<p><strong>3</strong><strong>. Đi khắp các con đường ở Đà Nẵng</strong></p>\r\n<p><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/duong-dep-da-nang.jpg" alt="kham-pha-duong-da-nang" width="730" /></p>\r\n<p>Đà Nẵng là thành phố đáng sống nhất Việt Nam, một thành phố năng động, phát triển với nhiều tòa nhà đẹp, đặc biệt cảnh quan thành phố Đà Nẵng rất đẹp với những con đường đẹp. Với chiếc xe máy của mình bạn có thể đi khắp thành phố, khám phá các con đường đẹp như đường Bạch Đằng nằm ven sông Hàn với những cây cầu độc đáo, đường Nguyễn Tất Thành, Võ Nguyên Giáp để ngắm những bãi biển đẹp,…</p>\r\n<p><strong>4. Lượn các trung tâm mua sắm sang trọng để ngắm đồ</strong></p>\r\n<p><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/trung-tam-mua-sam-da-nang.jpg" alt="trung-tam-mua-sam-da-nang" width="730" /></p>\r\n<p>Đà Nẵng có các trung tâm mua sắm lớn như Indochina, Pakson, VinCom, các siêu thị lớn như BigC, Lotte,… đây là nơi mà các bạn có thể thoải mái ngắm nhìn các loại áo quần, trang sức sang trọng, cùng rất nhiều thứ khác. Đi quanh và ngắm nhìn chúng cùng người mình yêu, những người bạn cũng là một ý tưởng khám phá hay cho bạn.</p>\r\n<p><strong>5. Đến những địa điểm đẹp ở Đà Nẵng chụp hình lưu niệm</strong></p>\r\n<p><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/chup-anh-o-da-nang.jpg" alt="chup-anh-luu-niem-o-da-nang" width="730" /></p>\r\n<p>Đi du lịch thì chắc hẳn sẽ không thể thiếu được những bức hình lưu niệm phải không nào? Đà Nẵng có rất nhiều địa điểm đẹp cho bạn có thể “check in” một cách thoải mái để lưu giữ kỷ niệm về thành phố xinh đẹp này. Các cây cầu như cầu sông Hàn, cầu Rồng, cầu Thuận Phước, cầu Trần Thị Lý, lãng mạn hơn cho các cặp đôi là cầu Tình Yêu, tượng cá chép hóa rồng, công viên biển Đông, các bãi biển Mỹ Khê, Phạm Văn Đồng, tòa nhà hành chính,… đó là những địa điểm chụp hình đẹp mà bạn không thể bỏ qua ở Đà Nẵng. Còn gì tuyệt vời hơn khi đi du lịch và mang về cho mình được những búc ảnh đẹp gắn liền với những địa điểm đẹp ở Đà Nẵng.</p>\r\n<p><strong>6. Khám phá các quán cafe đẹp ở Đà Nẵng</strong></p>\r\n<p><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/quan-cafe-da-nang.jpg" alt="quan-cafe-da-nang" width="730" /></p>\r\n<p>Đà Nẵng có rất nhiều quán cafe đẹp cho bạn có thể khám phá, dừng chân nghỉ ngơi và thưởng thức các đồ uống thơm ngon. Với nhiều loại hình, bạn chỉ cần với chiếc điện thoại của mình là đã có thể tìm được những quán cafe đẹp.</p>\r\n<p>Ngoài ra còn nhiều trải nghiệm khác nữa đang chờ đợi bạn khám phá. Hy vọng với những trải nghiệm trên sẽ giúp bạn có một chuyến hành trình du lịch Đà Nẵng đầy thú vị bằng chiếc xe máy.</p>', 2, 'Những trải nghiệm thú vị khi đi du lịch Đà Nẵng bằng xe máy', 'Những trải nghiệm thú vị khi đi du lịch Đà Nẵng bằng xe máy', 'du lịch Đà Nẵng bằng xe máy', '0', 0, '2016-07-05 18:43:05', '2016-07-05 18:45:07'),
(2, 'Khám phá lễ HANAMI đầu tiên tại ASIA PARK', 'kham-pha-le-hanami-dau-tien-tai-asia-park', '/photos/1/nhat-pham/577c6373cfb75.jpg', '<p>Đến Đà Nẵng vào dịp tháng 4 này, du khách sẽ được khám phá nhiều sự kiện, địa điểm du lịch hấp dẫn không thể bỏ qua. <span id="more-66"></span>Một sự kiến hấp dẫn lần đầu tiên tổ chức ở Đà Nẵng rất đáng để du khách có thể khám phá nhất là đối với những ai yêu thích đất nước Nhật Bản. Trong hai ngày 9-10/4/2016, Đà Nẵng sẽ có lễ hội Hanami lần đầu tiên được tổ chức tại Asia Park.</p>\r\n<p>Lễ hội Hanami tại Asia Park sẽ tái hiện chân thực hầu hết lễ hội Hanami truyền thống được tổ chức vào tháng 4 hàng năm tại Nhật Bản. Đến với lễ hội bạn sẽ cảm nhận được một không gian đậm chất Nhật Bản sẽ được tái hiện sinh động với nhiều hoạt động: Các sự kiện văn hóa truyền thống xứ sở Mặt trời mọc, trưng bày hoa anh đào… hứa hẹn sẽ mang tới trải nghiệm thú vị khó quên cho du khách.</p>\r\n<p><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/Asia_Park__Hanami5_1.jpg" alt="le-hoi-hanami" width="730" /></p>\r\n<p>Nếu ai chưa có dịp tận mắt thấy các cành hoa anh đào thì đây là cơ hội cho bạn được chiêm ngưỡng vẻ đẹp rạng rỡ, thuần khiết của hoa anh đào, một loài hoa đặc trưng, được xem như quốc hoa của xứ sở Mặt trời mọc.</p>\r\n<p>Hanami Festival sẽ mang đến trải nghiệm chưa từng có, bạn sẽ cảm thấy như mình đang đến đất nước Nhật Bản ngay tại Asia Park. Du khách cũng được thưởng thức nhiều chương trình nghệ thuật đặc sắc của xứ sở Phù tang, đặc biệt tất cả do đích thân các nghệ sĩ đến từ Nhật Bản trình diễn như Biểu diễn Trà đạo, điệu múa Yosakoi truyền thống, Thư pháp đại tự…</p>\r\n<p><img src="http://xemaydathanh.com/Content/UserFiles/Images/News/Asia_Park__Hanami3.jpg" alt="le-hoi-hanami-tai-asia-park" width="730" /></p>\r\n<p>Đặc biệt chương trình biểu diễn thời trang theo phong cách Cosplay – phong cách thời trang đường phố truyền thống Nhật Bản cũng là một chương trình mà bạn không nên bỏ qua hay du khách còn có thể tham quan các gian hàng giới thiệu văn hóa ẩm thực, trang phục Kimono truyền thống…</p>\r\n<p>Cùng với hồ rồng biểu trưng cho tinh thần võ sĩ đạo, nhà hàng café Momo được thiết kế theo kiến trúc shinden-zukuri dành cho giới quý tộc Nhật Bản, khu trưng bày lưu niệm với hơn 3.000 sản phẩm thủ công mỹ nghệ của người Nhật… sẽ khiến du khách vô cùng ấn tượng với Lễ hội Hanami lần đầu tiên được tổ chức tại thành phố sông Hàn.</p>\r\n<p>Đây là hoạt động nhằm chia sẻ những giá trị văn hóa, thẩm mỹ của nền văn hóa Nhật với người Đà Nẵng và du khách, giúp gia tăng sự hiểu biết lẫn nhau và tình hữu nghị giữa người dân hai nước và dự kiến đây sẽ là hoạt động thường niên tại Asia Park.</p>', 2, 'Khám phá lễ HANAMI đầu tiên tại ASIA PARK', 'Khám phá lễ HANAMI đầu tiên tại ASIA PARK', 'lễ HANAMI, ASIA PARK', '1', 0, '2016-07-05 18:49:14', '2016-07-19 07:18:28'),
(3, '"Bom tấn" thứ 4 của Mourinho ở MU: Không Pogba thì ai', 'bom-tan-thu-4-cua-mourinho-o-mu-khong-pogba-thi-ai', '/photos/1/nhat-pham/577c649e24ed4.jpg', '<p>Manchester United đã hoàn thành 3 bản hợp đồng lớn trong mùa hè là Eric Bailly cho hàng thủ, Henrikh Mkhitaryan cho hàng tiền vệ và Zlatan Ibrahimovic của hàng tấn công. Tuy nhiên như thế vẫn là chưa đủ cho <strong>Jose Mourinho</strong>, ông còn muốn một nhân vật tầm cỡ nữa xuất hiện tại Old Trafford.</p>\r\n<p><img class="news-image" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-05/1467736832-3000-500.jpg" alt="" /></p>\r\n<p>Paul Pogba</p>\r\n<p>Tiền vệ Paul Pogba của Juventus được cho là người đó, anh hiện đang thu hút MU lẫn <a class="TextlinkBaiviet" title="Real Madrid" href="http://www.24h.com.vn/real-madrid-p725c48.html">Real Madrid</a> vào một cuộc chiến giá cả mà hai đội bóng này hứa hẹn sẽ chỉ làm béo thêm Juventus, đội có lúc đã đòi mức giá ngất ngưởng 100 triệu euro cho Pogba. Pogba là cầu thủ cũ của MU nhưng rời sang Juventus sau khi không được trọng dụng dưới thời Sir Alex Ferguson, và tại Juve anh đã trở thành một trong những tiền vệ hàng đầu hiện nay.</p>\r\n<p>Jose Mourinho trong ngày ra mắt MU đã nói rằng ông đặt mục tiêu mua về 4 cầu thủ để tăng cường lực lượng. Bailly, Ibrahimovic và Mkhitaryan đều đã được tuyển mộ thành công, vậy phải chăng Pogba sẽ là người thứ 4? Công cuộc chiêu mộ Pogba của MU đang được tiến hành khá quyết liệt, “Quỷ Đỏ” đang sử dụng mối quan hệ với người đại diện Mino Raiola (có thân chủ là Ibra lẫn Mkhitaryan) để đưa nốt Pogba trở lại Manchester.</p>\r\n<p>Tuy nhiên theo tờ The Guardian, MU đang vấp phải một sự cản trở khá lớn từ Real Madrid. Real không ngại tham gia vào một cuộc đấu giá với MU, cũng sẵn sàng đáp ứng đòi hỏi tiền lương vào khoảng 300.000 euro/tuần của tiền vệ người Pháp, nhưng lợi thế lớn nhất đội bóng Hoàng gia có được là <em>Pogba</em> muốn được chơi tại La Liga dưới trướng HLV Zinedine Zidane, vì cho rằng Real có cơ hội mang về cho anh nhiều danh hiệu hơn.</p>\r\n<p>Guardian cho biết, trong trường hợp Real không thể đáp ứng các yêu cầu tài chính của Pogba lẫn Juventus, hoặc không thể bảo đảm suất đá chính trên hàng tiền vệ cho tuyển thủ đang dự Euro 2016, Pogba lúc ấy mới ngó đến MU. Nhưng hy vọng của MU không phải là nhỏ, bởi MU giờ đã có HLV mới và được Mourinho tuyển mộ là một sự bảo đảm cho Pogba rằng anh sẽ xuất hiện đều đặn trên sân.</p>\r\n<p>Trong lúc này, Pogba đã nối lại liên lạc với một số cầu thủ MU trước đây anh cùng thi đấu, trong đó có Jesse Lingard và Adnan Januzaj đang được Dortmund mượn. Pogba cũng hay giao du với một cầu thủ MU khác là Memphis Depay.</p>\r\n<p>Mặc dù dư luận đang phần lớn chờ đợi <u>Paul Pogba</u> về MU, nhưng cũng có khả năng người thứ tư mà Mourinho đưa về lại là tiền vệ Blaise Matuidi đang khoác áo Paris Saint-Germain. Matuidi đã sang Anh đầu tuần này sau khi đá trận tứ kết Euro 2016 cho ĐT Pháp, và báo giới đồn rằng anh đã có mặt ở Manchester</p>', 2, '"Bom tấn" thứ 4 của Mourinho ở MU: Không Pogba thì ai', '"Bom tấn" thứ 4 của Mourinho ở MU: Không Pogba thì ai', 'Mourinho, MU, Pogba', '0', 0, '2016-07-05 18:52:39', '2016-07-05 18:53:39'),
(4, 'MU - Ibrahimovic: Tình muộn nhưng hứa hẹn mộng mơ', 'mu-ibrahimovic-tinh-muon-nhung-hua-hen-mong-mo', '/photos/1/nhat-pham/577c6524a37bd.jpg', '<p><strong>MU và Ibrahimovic</strong> đã thuộc về nhau mà Jose Mourinho có thể coi là “ông tơ bà nguyệt”. Nếu không có nhà cầm quân người Bồ Đào Nha thì chắc chắn “Quỷ đỏ” sẽ chẳng bao giờ chinh phục được trái tim của một Ibrahimovic “kiêu căng, sang chảnh”. Vì Ibrahimovic từng là trò cũ của Mourinho và luôn vô cùng nể trọng ông.</p>\r\n<p align="center"><img class="news-image" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-05/1467660141-mu.jpg" alt="MU - Ibrahimovic: Tình muộn nhưng hứa hẹn mộng mơ - 1" /></p>\r\n<p>MU và Ibrahimovic đã đến với nhau</p>\r\n<p>7 năm trước, MU đã “say đắm” Ibrahimovic biết bao. Đó là thời điểm họ phải miễn cưỡng bán đi ngôi sao số 1 Cristiano <a class="TextlinkBaiviet" title="Ronaldo" href="http://www.24h.com.vn/cristiano-ronaldo-p357c48.html">Ronaldo</a> cho <a class="TextlinkBaiviet" title="Real Madrid" href="http://www.24h.com.vn/real-madrid-p725c48.html">Real Madrid</a>. Mục tiêu Benzema cũng bị “Kền kền trắng” nẫng mất vào phút chót và MU thực sự hi vọng có được chân sút người Thụy Điển.</p>\r\n<p>Nhưng từ chỗ khá thờ ơ, đội quân siêu hạng năm ấy Barca bỗng tấn công Ibrahimovic dữ dội và khiến tiền đạo này “đổ ầm” trong ít ngày đàm phán. Thời gian cứ lặng lẽ trôi qua, MU mòn mỏi đi tìm một người như Ibrahimovic mà không được trọn vẹn. Chicharito mang tầm vóc không lớn. Persie là bản hợp đồng thời vụ. Rooney quá đa năng. Owen, Falcao vô hại. Martial hay Rashford mùa trước mới chớm “nảy mầm”.</p>\r\n<p>Khi trong tâm trí chẳng còn nhớ tới <em>Ibrahimovic, MU</em> bỗng lại giành quyền sở hữu anh. Một chút tiếc nuối vì họ đã đến với nhau quá muộn. Ibrahimovic năm nay đã 34 tuổi rồi. Trước đây, “Quỷ đỏ” cũng từng ước được gặp thủ môn Van der Sar và tiền đạo Henrik Larsson sớm hơn. Vì sao ư? Vì họ đến với MU ở cái tuổi tưởng chừng “hết đát” nhưng vẫn tỏa sáng rực rỡ.</p>\r\n<p>Van der Sar, người kí hợp đồng với MU ở tuổi 35, hóa ra lại bắt đầu những năm tháng đẹp nhất sự nghiệp. Anh kịp cống hiến cho “Quỷ đỏ” tới 6 mùa giải và mang về những vinh quang chói lọi. Sau này vị HLV người Scotland, Sir Alex đã thừa nhận Van der Sar là một trong những vụ chuyển nhượng thành công nhất dưới triều đại của ông tại MU.</p>\r\n<p>Trường hợp của Henrik Larsson đặc biệt hơn cả. Anh chỉ có thể chơi cho nửa đỏ thành Manchester vỏn vẹn có 2 tháng theo bản hợp đồng cho mượn từ Helsingborgs IF. Dù quãng thời gian rất ngắn ngủi nhưng cựu tiền đạo Barca vẫn làm say mê những fan MU nói riêng.</p>\r\n<p>Henrik Larsson hòa nhập cực nhanh với lối chơi MU. Anh có bàn thắng ngay ở trận ra mắt giúp chủ sân Old Trafford vượt qua Aston Villa 2-1 trong khuôn khổ vòng 3 FA Cup. Anh trở thành nhân tố quan trọng góp phần đưa MU chống chọi với sự khắc nghiệt của mùa đông năm 2007. Và cuối mùa ấy, Larsson được MU xin LĐBĐ Anh đặc cách trao huy chương vô địch <a class="TextlinkBaiviet" title="Premier League" href="http://www.24h.com.vn/premier-league-2012-13-tu-dai-gia-quyet-dau-c48e2367.html">Premier League</a> dù không chơi đủ số trận theo quy định.</p>\r\n<p align="center"><img class="news-image" src="http://image.24h.com.vn/upload/3-2016/images/2016-07-05/1467660141-ibra.jpg" alt="MU - Ibrahimovic: Tình muộn nhưng hứa hẹn mộng mơ - 2" /></p>\r\n<p>Ibrahimovic hứa hẹn là bản hợp đồng thành công dù anh đã 34 tuổi</p>\r\n<p>Ibrahimovic liệu có là Van de Sar và Henrik Larsson thứ 2 của MU? Có Mourinho, MU chưa chắc đã đoạt danh hiệu ngay mùa đầu tiên, nhưng thêm một Ibrahimovic xuất chúng thì mọi chuyện có thể xảy ra. Ibrahimovic 34 tuổi nhưng anh chưa già nếu nhìn cái cách chân sút này tung hoành trên sân. Việc anh phá kỷ lục trong bài kiểm tra thể lực ở MU đủ nói lên tất cả. Ibrahimovic còn rất sung mãn.</p>\r\n<p>Mùa trước, Ibrahimovic ghi 50 bàn/51 trận. Ở tuổi 34, không ai đạt mốc con số phi thường như thế. Tuổi 34, Ronaldo (béo) ghi 12 bàn cho Corinthians và chuẩn bị giải nghệ; Henrik Larsson ghi 4 bàn cho Barcelona; Van Nistelrooy ghi 7 bàn cho Hamburg; Raul ghi 19 bàn cho Schalke và Thiery Henry ghi 15 bàn cho New York Red Bulls.</p>\r\n<p><u>Ibrahimovic</u> thực ra ghi bàn siêu khủng ở mức ổn định vì bất kì giải đấu nào anh đi qua cũng đều như thế. Nhưng thứ MU cần hơn cả ở Ibrahimovic là tư chất của một nhà vô địch. Ngày kí hợp đồng với MU, anh nói thẳng là đến đây để chiến thắng chứ không phải dưỡng già.</p>', 2, 'MU - Ibrahimovic: Tình muộn nhưng hứa hẹn mộng mơ', 'MU - Ibrahimovic: Tình muộn nhưng hứa hẹn mộng mơ', 'MU, Ibrahimovic', '0', 13, '2016-07-05 18:56:21', '2016-07-25 18:11:08'),
(5, 'Ô nhiễm không khí tại Hà Nội vượt giới hạn cho phép ở một số nơi', 'o-nhiem-khong-khi-tai-ha-noi-vuot-gioi-han-cho-phep-o-mot-so-noi', '/photos/1/nhat-pham/578dd12aaa7cc.jpg', '<p>Ông Nguyễn Trọng Đông – Giám đốc Sở Tài nguyên và Môi trường Hà Nội – cho biết, chất lượng môi trường không khí của thành phố đã có biểu hiện suy thoái. Trong khu vực nội thành, các trục đường giao thông chính và các công trường xây dựng… vào một số thời điểm nồng độ ô nhiễm vượt giới hạn cho phép.</p>\r\n<p>Ngày 26/6, UBND TP Hà Nội tổ chức Hội thảo nâng cao năng lực quan trắc môi trường. Tại đây, ông Nguyễn Trọng Đông – Giám đốc Sở Tài Nguyên và Môi trường cho biết, so với những năm từ 2010 trở về trước, chất lượng không khí tại các khu vực dân cư, khu công nghiệp có xu hướng được cải thiện dần theo thời gian.</p>\r\n<p>Trên địa bàn thành phố do việc gia tăng sử dụng nhiên liệu hóa thạch (xăng), đặc biệt do sự gia tăng các phương tiện giao thông nên chỉ tiêu Benzen có xu hướng tăng dần qua các năm. Ngoài ra, quá trình đô thị hóa nhanh kéo theo các hoạt động xây dựng cùng với sự gia tăng dân số cơ học… đã gây ra ô nhiễm môi trường không khí, đặc biệt là ô nhiễm bụi và tiếng ồn.</p>\r\n<p><a href="http://maylockhongkhijapan.com/wp-content/uploads/2016/06/o-nhiem-khong-khi-tai-ha-noi-vuot-gioi-han-cho-phep-o-mot-so-noi.jpg"><img class="alignnone size-full wp-image-808" src="http://maylockhongkhijapan.com/wp-content/uploads/2016/06/o-nhiem-khong-khi-tai-ha-noi-vuot-gioi-han-cho-phep-o-mot-so-noi.jpg" sizes="(max-width: 800px) 100vw, 800px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2016/06/o-nhiem-khong-khi-tai-ha-noi-vuot-gioi-han-cho-phep-o-mot-so-noi.jpg 800w, http://maylockhongkhijapan.com/wp-content/uploads/2016/06/o-nhiem-khong-khi-tai-ha-noi-vuot-gioi-han-cho-phep-o-mot-so-noi-300x169.jpg 300w, http://maylockhongkhijapan.com/wp-content/uploads/2016/06/o-nhiem-khong-khi-tai-ha-noi-vuot-gioi-han-cho-phep-o-mot-so-noi-768x432.jpg 768w, http://maylockhongkhijapan.com/wp-content/uploads/2016/06/o-nhiem-khong-khi-tai-ha-noi-vuot-gioi-han-cho-phep-o-mot-so-noi-90x51.jpg 90w" alt="Ô nhiễm không khí tại Hà Nội vượt giới hạn cho phép ở một số nơi" width="800" height="450" /></a></p>\r\n<p>Từ những phân tích trên, Giám đốc Sở Tài nguyên và Môi trường Hà Nội đưa ra đánh giá, chất lượng môi trường không khí của thành phố đã có biểu hiện suy thoái. Trong khu vực nội thành, các trục đường giao thông chính và các công trường xây dựng có nồng độ ô nhiễm bụi ở một số nơi vào một số thời điểm đã vượt giới hạn cho phép.</p>\r\n<p>Để giám sát chặt chẽ tình hình môi trường trên địa bàn Hà Nội hiện có 6 trạm quan trắc không khí cố định. Trong 6 trạm quan trắc đó có 4 trạm do Trung ương quản lý (2 trạm do Tổng Cục môi trường quản lý, 2 trạm do Trung tâm mạng lưới khí tượng thủy văn và môi trường quốc gia quản lý), 2 trạm do Sở Tài nguyên và Môi trường quản lý, nhưng đến nay chỉ còn 2 trạm quan trắc do Trung ương quản lý là còn hoạt động (Trạm tại 556 Nguyễn Văn Cừ, Long Biên và Trạm tại số 8 Pháo Đài Láng, Quận Đống Đa).</p>\r\n<p>Hà Nội đã đầu tư xe quan trắc không khí lưu động và trạm quan trắc nước thải tự động và đang làm các thủ tục tiếp nhận 20 trạm quan trắc không khí tự động cố định do Chính phủ Pháp tài trợ gồm: 2 trạm quan trắc môi trường nền, 9 trạm quan trắc tại các điểm nút giao thông có mật độ giao thông lớn và 9 trạm đặt tại các khu đô thị tập trung đông dân cư.</p>\r\n<p>Tại hội thảo, các chuyên gia đến từ Cộng hòa Liên bang Đức đưa ra đánh giá nguyên nhân dẫn đến bụi ở Hà Nội là do sự gia tăng các nhà máy sản xuất, phương tiện giao thông và các trang thiết bị phát thải khí vào bầu khí quyển. Đặc biệt trong đó là lượng xe máy ở Việt Nam nói chung và Hà Nội nói riêng gia tăng quá nhanh.</p>\r\n<p>Tại hội thảo, Chủ tịch UBND TP Hà Nội Nguyễn Đức Chung cho biết, thành phố đang nỗ lực đưa ra nhiều giải pháp nhằm cải thiện môi trường, trong đó có việc trồng 1 triệu cây xanh, làm hồ điều hòa, cơ giới hóa công tác vệ sinh môi trường. Cùng với đó, thành phố cũng sẽ đưa ra lộ trình giảm phương tiện cá nhân trong khu vực nội đô.</p>\r\n<p>Chủ tịch UBND TP Hà Nội đặt hàng các chuyên gia đến từ Đức nghiên cứu đánh giá sát với thực tiễn, đưa ra các số liệu cụ thể về hiện trạng môi trường thành phố đồng thời đề xuất các giải pháp. Ông Chung cũng đề nghị các chuyên gia Đức giới thiệu các thiết bị quan trắc môi trường hiện đại để Hà Nội đầu tư xây dựng trên địa bàn.</p>', 2, '', '', '', '0', 0, '2016-07-19 07:05:22', '2016-07-19 07:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(15,0) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `qty`, `amount`, `status`, `data`, `transaction_id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 1, '4390000', 0, '', 9, 10, '2016-07-17 23:56:09', '2016-07-17 23:56:09'),
(10, 1, '20399000', 0, '', 10, 8, '2016-07-18 03:03:54', '2016-07-18 03:03:54'),
(11, 1, '12680000', 0, '', 10, 7, '2016-07-18 03:03:55', '2016-07-18 03:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `set_title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `format` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `image`, `content`, `parent_id`, `lft`, `rgt`, `depth`, `sort_order`, `set_title`, `meta_desc`, `meta_key`, `publish`, `format`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', '/photos/1/nhat-pham/577dba7bf1827.png', '<h2>Giới thiệu chung về Công ty</h2>\r\n<p><strong>HSVN GLOBAL </strong> tiền thân là Công ty cổ phần thương mại và dịch vụ tin học PC 115, được thành lập tại Hà Nội năm 2004 bởi những người Việt Nam trẻ tuổi, hoạt động ban đầu trong lĩnh vực máy tính thiết bị văn phòng đào tạo tin học và thành công rực rỡ với thương hiệu PC115. Những năm đầu của thế kỷ 21, PC115 luôn có mặt trong bảng xếp hạng Top 50 công ty cung cấp thiết bị dịch vụ máy tính uy tín nhất Hà Nội và các tỉnh thành phía Bắc. Từ năm 2009 .PC115 cơ cấu lại công ty phát triển thêm nhiều dịch vụ ngành hàng đồng thời đổi tên thương hiệu thành HSVN GLOBAL <br /><br />Với tầm nhìn dài hạn và quan điểm phát triển bền vững, <strong>HSVN GLOBAL</strong> đã tập trung đầu tư phát triển sản xuất phát triển và nhập khẩu thiết bị máy hút ẩm và máy lọc không khí lớn nhất tại Việt Nam.Chúng tôi là đối tác duy nhất của các hãng điện tử lớn trên thế giới như Panasonic,Sharp,Daiwa…. về sản phẩm máy lọc không khí,máy hút ẩm tại thị trường Việt Nam.</p>\r\n<h2 align="justify"><strong>Tầm nhìn – sứ mệnh công ty<br /></strong></h2>\r\n<p align="justify"><strong>Tầm nhìn của </strong><strong>HSVN GLOBAL</strong></p>\r\n<p align="justify">Bằng bản lĩnh và khát vọng tiên phong <strong>HSVN GLOBAL</strong> phải là một trong những Công ty lớn hàng đầu tại Việt Nam.</p>\r\n<p align="justify">Chúng tôi không tự hài lòng với những thành công mà Công ty đã đạt được, phải luôn phấn đấu nâng cao tầm vóc và giá trị Công ty.</p>\r\n<p align="justify"><strong>Sứ mệnh của </strong><strong>HSVN GLOBAL</strong>: Nâng cao giá trị cuộc sống</p>\r\n<p align="justify">Chúng tôi cố gắng gia tăng các giá trị của từng sản phẩm, dịch vụ của mình để ngày càng nâng cao giá trị cho khách hàng, nhân viên trong toàn công ty, các đối tác và cộng đồng xã hội.</p>\r\n<p align="justify"><strong>Giá trị cốt lõi:</strong></p>\r\n<p align="justify">Với triết lý kinh doanh “<strong>Uy tín tạo dựng thành công”</strong> Tập thể Công ty cùng tôn trọng và thực hiện các giá trị cốt lõi:</p>\r\n<ul>\r\n<li><strong>UY TÍN</strong>: CHỈ CÓ GIỮ GÌN CAM KẾT CỦA MÌNH ĐỐI VỚI KHÁCH HÀNG, CỔ ĐÔNG, NHÂN VIÊN VÀ CỘNG ĐỒNG THÌ CÔNG TY MỚI TỒN TẠI VÀ PHÁT TRIỂN.</li>\r\n<li><strong>VƯỢT TRỘI</strong>: CHÚNG TÔI LUÔN LUÔN TÌM KIẾM VÀ THỰC HIỆN SỰ KHÁC BIỆT TRONG TỪNG SẢN PHẨM, DỊCH VỤ SO VỚI CÁC ĐỐI THỦ CẠNH TRANH.</li>\r\n<li><strong>ĐA DẠNG</strong>: CHÚNG TÔI LUÔN LÀM CHO CÁC HOẠT ĐỘNG KINH DOANH CỦA MÌNH TRỞ NÊN UYỂN CHUYỂN VÀ CÁC RỦI RO CỦA KINH DOANH ĐƯỢC PHÂN TÁN.</li>\r\n<li><strong>THÂN THIỆN</strong>: HSVN GLOBAL PHẤN ĐẤU KHÔNG PHẢI CHỈ VÌ LÀ MỘT CÔNG TY LỚN, MÀ CÒN LÀ MỘT CÔNG TY KINH DOANH CÓ MÔI TRƯỜNG THÂN THIỆN ĐƯỢC KHÁCH HÀNG VÀ NHÂN VIÊN YÊU CHUỘNG!</li>\r\n</ul>\r\n<p>HSVN GLOBAL chuyên gia về không khí hàng đầu Việt Nam</p>', NULL, 1, 2, 0, 0, '', '', '', '0', '', '2016-07-06 19:12:18', '2016-07-25 07:48:08'),
(2, 'Liên hệ', 'lien-he', '', '<p><strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong></p>\r\n<p>Địa chỉ : Số 49 Lê Đức Thọ, Phường Mỹ Đình 2, Quận Nam Từ Liêm, Thành Phố Hà Nội</p>\r\n<p>Văn Phòng 1: Số 2/98 Xuân Thủy Quận Cầu Giấy, Hà Nội</p>\r\n<p>Điện Thoại : 04.39999336 – 04.22.111159 – 0973.505.115 – 097.2222.958</p>\r\n<p>Chi nhánh phía Nam : Số 59 Đường Hoàng Việt,Phường 4, Quận Tân Bình, TP HCM</p>\r\n<p>Điện thoại : 08.668.55115 – 096.333.4440 – 0932.796.115</p>\r\n<p>Email: <a href="mailto:maylockhongkhijapan@gmail.com">maylockhongkhijapan@gmail.com</a></p>\r\n<p><iframe src="https://www.google.com/maps?f=d&amp;source=s_d&amp;saddr=Ng%C3%B5+98&amp;daddr=&amp;geocode=FRP-QAEd6jBOBg&amp;aq=&amp;sll=21.036615,105.787636&amp;sspn=0.001525,0.002626&amp;hl=vi&amp;mra=mr&amp;ie=UTF8&amp;ll=21.036615,105.787636&amp;spn=0.001525,0.002626&amp;t=m&amp;output=embed" width="630" height="500" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe></p>', NULL, 3, 4, 0, 0, '', '', '', '0', 'contact', '2016-07-06 19:13:59', '2016-07-25 07:48:09'),
(3, 'Đối tác - khách hàng', 'doi-tac-khach-hang', '', '<p>Chưa có</p>', NULL, 5, 6, 0, 0, '', '', '', '0', '', '2016-07-06 19:17:27', '2016-07-25 07:48:15'),
(4, 'Khu vực giao nhận miễn phí', 'khu-vuc-giao-nhan-mien-phi', '', '<h2>1. KHU VỰC HÀ NỘI</h2>\r\n<p>– Giao hàng miễn phí đối với các địa điểm thuộc 10 quận nội thành Hà Nội, bao gồm: Hoàn Kiếm, Ba Đình, Hai Bà Trưng, Đống Đa, Cầu Giấy, Thanh Xuân, Long Biên, Hoàng Mai, Tây Hồ, Hà Đông.</p>\r\n<h2>2. KHU VỰC THÀNH PHỐ HỒ CHÍ MINH</h2>\r\n<p>– Giao hàng miễn phí đối với các địa điểm thuộc nội thành thành phố Hồ Chí Minh, bao gồm: từ quận 1 đến quận 12, Gò Vấp, Bình Thạnh, Bình Tân, Tân Bình, Tân Phú, Thủ Đức, Phú Nhuận, Bình Chánh.</p>\r\n<h2>3. CÁC TỈNH THÀNH KHÁC TRÊN TOÀN QUỐC</h2>\r\n<p>– Giao hàng qua vận chuyển và thu phí dựa vào bên vận chuyển.</p>\r\n<p>Áp dụng cho tất cả các sản phẩm trên <a title="http://maylockhongkhijapan.com/" href="http://maylockhongkhijapan.com/">http://maylockhongkhijapan.com/</a></p>', NULL, 7, 8, 0, 0, 'Khu vực giao nhận miễn phí', 'chính sách khách hàng', 'chính sách khách hàng', '0', '', '2016-07-22 05:13:28', '2016-07-25 07:48:16'),
(5, 'Đổi trả sản phẩm', 'doi-tra-san-pham', '', '<p>Chúng tôi thực hiện đổi hàng/trả lại tiền cho quý khách trong thời gian 7 ngày kể từ ngày nhận hàng, nhưng không hoàn lại phí vận chuyển hoặc lệ phí giao hàng.</p>\r\n<p><strong>Trừ những trường hợp sau sẽ không được đổi, trả:</strong></p>\r\n<p>– Không đúng chủng loại, mẫu mã như quý khách đặt hàng.</p>\r\n<p>– Không đủ số lượng, không đủ bộ như trong đơn hàng.</p>\r\n<p>– Tình trạng bên ngoài bị ảnh hưởng như bong tróc, bể vỡ xảy ra trong quá trình vận chuyển,…</p>\r\n<p>– Không đạt chất lượng như: quá hạn sử dụng, hết bảo hành, không vận hành được, hỏng hóc khách quan trong phạm vi bảo hành của nhà cung cấp, nhà sản xuất,…</p>\r\n<p>Quý khách vui lòng kiểm tra hàng hóa và ký nhận tình trạng với Nhân viên giao hàng ngay khi nhận được hàng. Khi phát hiện một trong các trường hợp trên, quý khách có thể trao đổi trực tiếp với Nhân viên giao hàng hoặc phản hồi cho chúng tôi trong vòng 24h theo đường dây nóng 097.2222.958</p>\r\n<p><strong>Chúng tôi sẽ không chấp nhận đổi/trả hàng khi:</strong></p>\r\n<p>– Quý khách muốn thay đổi chủng loại, mẫu mã nhưng không thông báo trước.</p>\r\n<p>– Quý khách tự làm ảnh hưởng tình trạng bên ngoài như rách bao bì, bong tróc, bể vỡ,…</p>\r\n<p>– Quý khách vận hành không đúng chỉ dẫn gây hỏng hóc hàng hóa.</p>\r\n<p>– Quý khách đã kiểm tra và ký nhận tình trạng hàng hóa nhưng không có phản hồi trong vòng 24h kể từ lúc ký nhận hàng.</p>\r\n<p><strong>Chú ý:</strong></p>\r\n<p>– Việc đổi hàng, sửa chữa sẽ được thực hiện theo đúng quy định của nhà cung cấp, nhà sản xuất, hoặc nhà bảo hành được ủy quyền của nhà cung cấp, nhà sản xuất đó.</p>', NULL, 9, 10, 0, 0, 'Quy định đổi trả hàng', '', '', '0', '', '2016-07-22 05:14:44', '2016-07-25 07:46:27'),
(6, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', '/photos/1/5795c2d5384fe.png', '<p>Trong thời gian sử dụng nếu gặp bất kỳ trục trặc nào hoặc lỗi do người sử dụng Khách hàng có thể liên lạc trực tiếp với Bộ phận Chăm sóc Khách hàng của <strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu.</strong></p>\r\n<h2>I/ Những trường hợp được bảo hành miễn phí:</h2>\r\n<p>Bảo hành sản phẩm là: khắc phục những lỗi hỏng hóc, sự cố kỹ thuật xảy ra do lỗi của Hãng sản xuất.</p>\r\n<p>– Sản phẩm được bảo hành miễn phí nếu sản phẩm đó còn thời hạn bảo hành được tính kể từ ngày giao hàng.</p>\r\n<p>– Thời hạn bảo hành được ghi trên Phiếu Bảo Hành và theo quy định của từng Hãng sản xuất đối với tất cả các sự cố về mặt kỹ thuật.</p>\r\n<p>– Có Phiếu bảo hành và Tem bảo hành của Hãng sản xuất trên sản phẩm.</p>\r\n<p>– Sản phẩm bảo hành sẽ tuân theo qui định bảo hành của từng Hãng sản xuất đối với các sự cố về mặt kỹ thuật.</p>\r\n<p><strong>Đặt Biệt:</strong></p>\r\n<p>– Chính sách bảo hành tại nhà áp dụng tại khu vực nội thành Tp. Hà Nội và Tp. Hồ Chí Minh</p>\r\n<p>Những sản phẩm bảo hành tại nhà, tùy thuộc vào mức độ hư hỏng của sản phẩm, Kỹ thuật viên của chúng tôi sẽ trực tiếp khắc phục sự cố tại nhà hoặc thay mặt Quý khách mang sản phẩm tới Trung Tâm Bảo Hành của Hãng hoặc thông báo với Hãng để đến bảo hành sản phẩm cho Quý khách.</p>\r\n<p>Những sản phẩm không thuộc danh sách sản phẩm được bảo hành tại nhà (nằm trong khả năng chuyên chở của Quý khách), Quý khách vui lòng mang sản phẩm đến <strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong> để được phục vụ nhanh chóng hơn.</p>\r\n<h3>Chi phí vận chuyển khi bảo hành:</h3>\r\n<p>Đối với những yêu cầu bảo hành thuộc vào khu vực được áp dụng chuyển hàng miễn phí ( nội thành Tp. Hà Nội và Tp. Hồ Chí Minh), <strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong> sẽ miễn phí chi phí vận chuyển hàng và giao hàng.</p>\r\n<p>Đối với những yêu cầu bảo hành không thuộc vào khu vực được áp dụng chuyển hàng miễn phí (ngoại thành Tp. Hà Nội và Tp. Hồ Chí Minh), Quý khách vui lòng:</p>\r\n<p>– Liên lạc trực tiếp với Hãng hoặc gửi sản phẩm đến Trung Tâm Bảo Hành gần nhất của Hãng. Quý khách tự chịu chi phí chuyển hàng.</p>\r\n<p>– Liên lạc với Trung tâm chăm sóc Khách hàng của <strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong>, Công ty sẽ thay mặt Quý khách liên lạc với Hãng để đến bảo hành cho Quý khách.</p>\r\n<p>– Gửi sản phẩm đến Trung tâm chăm sóc Khách hàng của <strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong>. Quý khách tự chịu chi phí chuyển hàng.</p>\r\n<h2>II/ Những trường hợp sau đây sẽ không được bảo hành (sửa chữa có tính phí):</h2>\r\n<p>– Những sản phẩm không thể xác định được nguồn gốc mua tại <strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong>, thì Công ty có quyền từ chối bảo hành.</p>\r\n<p>– Sản phẩm đã quá thời hạn ghi trên Phiếu bảo hành hoặc mất Phiếu bảo hành.</p>\r\n<p>– Phiếu bảo hành,Tem bảo hành bị rách, không còn Tem bảo hành, Tem bảo hành dán đè hoặc bị sửa đổi.</p>\r\n<p>– Phiếu bảo hành không ghi rõ số Serial và ngày mua hàng.</p>\r\n<p>– Số Serial trên máy và Phiếu bảo hành không trùng khớp nhau hoặc không xác định được vì bất kỳ lý do nào.</p>\r\n<p>– Sản phẩm bị hư hỏng do tác động cơ học làm rơi, vỡ, va đập, trầy xước, móp méo, ẩm ướt, hoen rỉ, chảy nước hoặc do hỏa hoạn, thiên tai gây nên.</p>\r\n<p>– Sản phẩm có dấu hiệu hư hỏng do chuột bọ hoặc côn trùng xâm nhập.</p>\r\n<p>– Sản phẩm bị hư hỏng do sử dụng không đúng sách hướng dẫn, sử dụng sai điện áp quy định.</p>\r\n<p>– Các dữ liệu, tài liệu, văn bản cung cấp miễn phí, lưu trữ kèm theo sản phẩm (kể cả trong thời gian gửi bảo hành).</p>\r\n<p>– Tự ý tháo dỡ, sửa chữa bởi các cá nhân hoặc Kỹ thuật viên không được sự ủy quyền của <strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong>.</p>\r\n<h2>III// Liên hệ, thắc mắc, khiếu nại về vấn đề bảo hành:</h2>\r\n<p>Nếu Quý khách chưa thấy hài lòng hoặc có thắc mắc khiếu nại gì về vấn đề bảo hành, xin Quý khách vui lòng liên hệ:</p>\r\n<h4 class="widget-title widgettitle">Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</h4>\r\n<div class="textwidget">Địa chỉ : Số 49 Lê Đức Thọ, Phường Mỹ Đình 2, Quận Nam Từ Liêm, Thành Phố Hà NộiVăn Phòng 1: Số 2/98 Xuân Thủy Quận Cầu Giấy, Hà Nội\r\n<p> </p>\r\n<p>Điện Thoại : 04.39999336 – 04.22.111159 – 0973.505.115 – 097.2222.958</p>\r\n<p>Chi nhánh phía Nam : Số 59 Đường Hoàng Việt,Phường 4, Quận Tân Bình, TP HCM</p>\r\n<p>Điện thoại : 08.668.55115 – 096.333.4440 – 0932.796.115</p>\r\n</div>', NULL, 11, 12, 0, 0, 'Chính sách bảo hành', '', '', '1', '', '2016-07-22 05:15:26', '2016-07-25 07:48:18'),
(7, 'Hướng dẫn mua hàng', 'huong-dan-mua-hang', '/photos/1/5795c2efe28e0.png', '<h2>1. Mua hàng tại Công ty</h2>\r\n<p>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</p>\r\n<p>Địa chỉ : Số 49 Lê Đức Thọ, Phường Mỹ Đình 2, Quận Nam Từ Liêm, Thành Phố Hà Nội</p>\r\n<p>Văn Phòng 1: Số 2/98 Xuân Thủy Quận Cầu Giấy, Hà Nội</p>\r\n<p>Điện Thoại : 04.39999336 – 04.22.111159 – 0973.505.115 – 097.2222.958</p>\r\n<p>Chi nhánh phía Nam : Số 59 Đường Hoàng Việt,Phường 4, Quận Tân Bình, TP HCM</p>\r\n<p>Điện thoại : 08.668.55115 – 096.333.4440 – 0932.796.115</p>\r\n<h2>2. Mua hàng qua điện thoại</h2>\r\n<p>Quý khách có thể liên hệ số hotline để mua hàng nhanh nhất: <em><strong>04.39999336  – 097.2222.958</strong></em></p>\r\n<h2>3. Mua hàng trực tuyến qua website</h2>\r\n<p>Bằng cách mua hàng trực tuyến qua website, chúng tôi sẽ chuyển hàng nhanh nhất cho quý khách.</p>\r\n<p>Việc mua hàng qua website sẽ:</p>\r\n<p>– Nhanh chóng</p>\r\n<p>– Tiện lợi</p>\r\n<p>– Quý khách có thể tham khảo và chọn món hàng mình muốn mua</p>\r\n<p>– Đặt hàng nhanh về số lượng mua, thông tin thanh toán…</p>\r\n<p>– Tiếp nhận hàng hóa nhanh</p>\r\n<p>– Vận chuyển và giao hàng nhanh.</p>', NULL, 13, 14, 0, 0, 'Hướng dẫn mua hàng', '', '', '1', '', '2016-07-22 05:16:30', '2016-07-25 07:48:20'),
(8, 'Phương thức thanh toán', 'phuong-thuc-thanh-toan', '', '<div class="entry-content">\r\n<h2>1. PHƯƠNG THỨC GIAO HÀNG – TRẢ TIỀN MẶT</h2>\r\n<p>Phương thức Giao hàng – Trả tiền mặt chỉ áp dụng đối với những khu vực chúng tôi hỗ trợ giao nhận miễn phí (tham khảo thêm khu vực giao nhận miễn phí) hoặc trả tiền mua hàng trực tiếp tại hệ thống cửa hàng của chúng tôi.</p>\r\n<h2>Địa chỉ giao dịch:</h2>\r\n<p>Công ty TNHH Phát Triển Công Nghệ Và Dịch Vụ HSVN Toàn Cầu</p>\r\n<p>Địa chỉ: Số 49 Lê Đức Thọ ,Phường Mỹ Đình 2,Quận Nam Từ Liêm,Thành Phố Hà Nội</p>\r\n<p>Văn Phòng 1: Số 2/98 Xuân Thủy Quận Cầu Giấy ,Hà Nội</p>\r\n<div>\r\n<p>Điện Thoại: 04.39999336 – 04.22.111159 – 0973.505.115 – 097.2222.958</p>\r\n</div>\r\n<p>Chi nhánh phía Nam: Số 59 Đường  Hoàng Việt,Phường 4,Quận Tân Bình ,TP HCM</p>\r\n<p>Điện thoại: 08.668.55115 – 096.333.4440 – 0932.796.115</p>\r\n<h2>2. PHƯƠNG THỨC THANH TOÁN TRƯỚC</h2>\r\n<p>Chuyển tiền – Chuyển khoản</p>\r\n<p>Áp dụng cho khách hàng ngoài khu vực hỗ trợ giao nhận miễn phí và khách hàng có nhu cầu sử dụng phương thức thanh toán này</p>\r\n<p>Đơn vị thụ hưởng: <strong>Công ty TNHH Phát Triển Công Nghệ Và Dịch Vụ HSVN Toàn Cầu</strong></p>\r\n<table width="546">\r\n<tbody>\r\n<tr>\r\n<td width="48"><strong> </strong><strong>TT</strong></td>\r\n<td width="282"><strong> </strong><strong>Tên Ngân Hàng</strong></td>\r\n<td width="340"><strong> </strong><strong>Số Tài Khoản Ngân Hàng</strong></td>\r\n</tr>\r\n<tr>\r\n<td width="48">01</td>\r\n<td width="282"><strong>Vietcombank Thăng Long</strong></td>\r\n<td width="340"> 0491000006173</td>\r\n</tr>\r\n<tr>\r\n<td width="48">02</td>\r\n<td width="282"><strong>MSB (Maritime bank)</strong><strong>Ngân hàng Hàng Hải Viêt Nam</strong></td>\r\n<td width="340">03301019918298</td>\r\n</tr>\r\n<tr>\r\n<td width="48">03</td>\r\n<td width="282"><strong><em>Ngân hàng Á Châu ACB</em></strong></td>\r\n<td width="340">4214945601424419</td>\r\n</tr>\r\n<tr>\r\n<td width="48">04</td>\r\n<td width="282"><strong>Ngân hàng công thương Việt Nam,VietinBank</strong></td>\r\n<td width="340">711A16880499</td>\r\n</tr>\r\n<tr>\r\n<td width="48">05</td>\r\n<td width="282"><strong>Ngân hàng nông nghiệp</strong><strong>AGRIBANK</strong></td>\r\n<td width="340">1462205158663</td>\r\n</tr>\r\n<tr>\r\n<td width="48">06</td>\r\n<td width="282"><strong>NgânhàngSacomBank</strong></td>\r\n<td width="340">020026582904</td>\r\n</tr>\r\n<tr>\r\n<td width="48">07</td>\r\n<td width="282"><strong>Ngân hàng TiênPhongBANK</strong><strong> </strong></td>\r\n<td width="340">19901009001</td>\r\n</tr>\r\n<tr>\r\n<td width="48">08</td>\r\n<td width="282"><strong>Ngân hàng quân đội MBank</strong></td>\r\n<td width="340">0120104011007</td>\r\n</tr>\r\n<tr>\r\n<td width="48">09</td>\r\n<td width="282"> <strong>Tài Khoản công ty tại ngân hàng TienPhong Bank Hà Nội</strong></td>\r\n<td width="340">00123996001</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<footer class="entry-footer">\r\n<p class="entry-meta"> </p>\r\n</footer>', NULL, 15, 16, 0, 0, 'Phương thức thanh toán', '', '', '0', '', '2016-07-22 05:17:26', '2016-07-25 07:52:23'),
(9, 'Chăm sóc khách hàng', 'cham-soc-khach-hang', '/photos/1/5795c30abd24f.png', '<p>Quý khách cần liên hệ về các vấn đề: tư vấn sản phẩm, chương trình khuyến mãi, hậu mãi, bảo hành, bảo trì, sản phẩm hư hỏng trong thời gian bảo hành, cước phí vận chuyển, thái độ phục vụ của nhân viên vui lòng liên hệ:</p>\r\n<h2>Gửi thông tin về công ty:</h2>\r\n<p><strong>Công ty TNHH phát triển công nghệ và dịch vụ HSVN Toàn Cầu</strong></p>\r\n<p>Địa chỉ : Số 49 Lê Đức Thọ, Phường Mỹ Đình 2, Quận Nam Từ Liêm, Thành Phố Hà Nội<br />Văn Phòng 1: Số 2/98 Xuân Thủy Quận Cầu Giấy, Hà Nội</p>\r\n<p>Điện Thoại : 04.39999336 – 04.22.111159 – 0973.505.115 – 097.2222.958</p>\r\n<p>Chi nhánh phía Nam : Số 59 Đường Hoàng Việt,Phường 4, Quận Tân Bình, TP HCM</p>\r\n<p>Điện thoại : 08.668.55115 – 096.333.4440 – 0932.796.115</p>\r\n<h2>Liên hệ số điện thoại:</h2>\r\n<p>04.39999336 – 097.2222.958</p>\r\n<h2>Gửi Email</h2>\r\n<p>Email: hotropc115@gmail.com</p>', NULL, 17, 18, 0, 0, 'Chăm sóc khách hàng', '', '', '1', '', '2016-07-22 05:18:03', '2016-07-25 07:52:25'),
(10, 'Bảo mật thông tin', 'bao-mat-thong-tin', '/photos/1/nhat-pham/5795c2a10f162.png', '<p><strong>1. THÔNG BÁO TỪ CÔNG TY</strong></p>\r\n<p>- Khi truy cập hệ thống trang web , nghĩa là quý khách đồng ý chấp nhận thực hiện những mô tả trong Quy định bảo mật. Nếu quý khách không đồng ý với các điều khoản của Quy định bảo mật, vui lòng không sử dụng hệ thống trang web maylockhongkhijapan.com </p>\r\n<p>- Trong suốt quá trình hoạt động của Công ty, chúng tôi đã phát triển những mối quan hệ với khách hàng dựa trên sự tôn trọng và niềm tin. Chúng tôi nhận thức được sự tin tưởng và sự tự tin quý khách thể hiện khi truy cập vào hệ thống trang web maylockhongkhijapan.com và cung cấp thông tin cho chúng tôi. Thông báo bảo mật này được đưa ra để thể hiện vai trò của chúng tôi trong vấn đề bảo mật trực tuyến và dịch vụ khách hàng.Chúng tôi xử lý thông tin của quý khách bằng tính trung thực và độ nhạy cảm, điều mà chúng tôi đã thể hiện xuyên suốt lịch sử hình thành phát triển của Công ty TNHH Phát triển Công nghệ &amp; Dịch vụ HSVN Toàn Cầu.</p>\r\n<p><strong>2. QUY ĐỊNH THÔNG TIN CÁ NHÂN ĐƯỢC THU THẬP BỞI HỆ THỐNG WEBSITE maylockhongkhijapan.com:</strong> </p>\r\n<p>- Chúng tôi sử dụng thông tin thu thập từ khách vãng lai và khách đã đăng ký là thành viên trên hệ thống website để phát triển website ngày càng phong phú hơn, phù hợp với nhu cầu mua sắm của quý khách hơn. Chúng tôi thu thập các loại thông tin sau:</p>\r\n<p><strong><em>- </em></strong><strong>Thông tin Quý khách cung cấp cho chúng tôi</strong>: Chúng tôi thu thập thông tin cá nhân được cung cấp bởi người sử dụng trang web. "Thông tin cá nhân" bao gồm tên, địa chỉ, số điện thoại, thông tin thẻ tín dụng hoặc thẻ ghi nợ, địa chỉ email, ngày sinh, địa chỉ IP…</p>\r\n<p>- Thông tin cá nhân được thu thập khi quý khách đăng ký một tài khoản tại hệ thống website maylockhongkhijapan.com, đặt hàng trên website, tham gia những cuộc thi do chúng tôi tổ chức thông qua hệ thống website... hoặc khi quý khách giao tiếp với bất kỳ bộ phận nào của chúng tôi như dịch vụ chăm sóc khách hàng, tư vấn, bán hàng hoặc dịch vụ kỹ thuật thông qua trang web, điện thoại, email, thư tín hoặc fax. Trong một số trường hợp, chúng tôi có thể có được tên và địa chỉ email của người khác mà quý khách chọn để chia sẻ thông tin như “một người bạn” trên hệ thống website maylockhongkhijapan.com.</p>\r\n<p><strong><em>- </em></strong><strong>Cookies:</strong> Thông qua việc sử dụng Cookies, chúng tôi thu thập và phân tích địa chỉ IP được sử dụng để nối kết máy tính của quý khách với internet, máy tính và thông tin kết nối như trình duyệt và phiên bản trình duyệt, hệ điều hành, lịch sử mua hàng, xác nhận khi quý khách mở email mà chúng tôi gửi cho quý khách, ngày giờ và các URL đưa đến với website chúng tôi. Cookie không thể truy cập hoặc phân lượng dữ liệu trong ổ cứng máy tính của quý khách. Thông thường quý khách có thể thiết lập trình duyệt để vô hiệu hóa cookie hay thông báo cho quý khách biết khi được gửi cookie.Hiện nay trên thị trường cũng có sẵn các phần mềm cho phép quý khách truy cập vào trang web mà không cần cung cấp thông tin này. Quý khách vẫn được chào đón để viếng thăm hệ thống website khi quý khách sử dụng phần mềm như vậy, nhưng chúng tôi sẽ không thể cung cấp cho quý khách dịch vụ phù hợp với quý khách và chúng tôi cũng có quyền từ chối đơn đặt hàng trực tuyến từ quý khách khi có nghi ngờ vi phạm bảo mật của chúng tôi.</p>\r\n<p><strong><em>- </em></strong><strong>Đặt hàng:</strong> Nếu quý khách thực hiện mua hàng trực tuyến tại hệ thống website maylockhongkhijapan.com, quý khách sẽ được yêu cầu cung cấp thông tin liên lạc, phương thức thanh toán, thông tin thanh toán và địa chỉ giao hàng. Quý khách vui lòng cung cấp thông tin đúng và đầy đủ để thực hiện xử lý đơn hàng. Nếu có một người nào bên ngoài lợi dụng các thông tin này dẫn đến những sai sót khi giao hàng, chúng tôi sẽ thực hiện điều tra và xử lý. Nếu lỗi do quý khách bị lộ thông tin quý khách phải chịu hoàn toàn trách nhiệm.</p>\r\n<p><strong><em>- </em></strong><strong>Đăng ký nhận bản tin Khuyến mại:</strong> Khi quý khách thực hiện mua hàng tại website maylockhongkhijapan.com, quý khách sẽ nhận được những bản tin khuyến mại của Chúng tôi, trừ khi quý khách từ chối thông tin này nếu không muốn. Nếu quý khách yêu cầu đăng ký nhận Newsletter qua email, chúng tôi sẽ gửi quý khách một email xác nhận yêu cầu của quý khách. Nếu quý khách thay đổi và quyết định không tham gia vào danh sách nhận Newsletter, quý khách có thể từ chối ngay trong email đó. Hơn nữa, email xác nhận sẽ báo cho quý khách biết nếu có người nào khác đã sử dụng địa chỉ email của quý khách để đăng ký nhận Newsletter của chúng tôi. Để chắc rằng việc gửi Newsletter qua email là hữu ích cho quý khách, vui lòng xác nhận khi quý khách nhận được email  từ chúng tôi.</p>\r\n<p><strong>3. QUY ĐỊNH SỬ DỤNG THÔNG TIN THU THẬP ĐƯỢC:</strong></p>\r\n<p>- Chúng tôi sử dụng các thông tin thu thập được từ việc truy cập Website của chúng tôi nhằm mục đích giúp quý khách nâng cao kinh nghiệm mua sắm trực tuyến tại hệ thống website maylockhongkhijapan.com, cung cấp các dịch vụ và thông tin quý khách ưa thích. Chúng tôi cũng sử dụng những thông tin này để giúp phát triển và cải thiện website của chúng tôi trở nên hữu ích và hấp dẫn khách hàng hơn.</p>\r\n<p><strong>4. QUY ĐỊNH CHIA SẺ THÔNG TIN VỚI ĐỐI TÁC THỨ BA:</strong></p>\r\n<p>- Chúng tôi sẽ không thuê, bán hoặc tiết lộ Thông tin cá nhân của quý khách cho bên thứ ba không liên quan mà không có sự đồng ý của quý khách, trừ những điều được nêu trong Thông báo bảo mật cá nhân này.</p>\r\n<p> <strong>- Các nhà cung cấp dịch vụ: </strong>Chúng tôi có thể thuê các công ty hoặc cá nhân khác cung cấp một số dịch vụ hoặc thay mặt cho chúng tôi trong việc phân tích danh sách và dữ liệu khách hàng, hoặc thực hiện tiếp thị hay thực hiện dịch vụ tư vấn. Các đối tác này ("Nhà cung cấp dịch vụ") sẽ chỉ được tiếp cận với các thông tin cá nhân cần thiết để đại diện chúng tôi thực hiện các chức năng này, và được yêu cầu bảo vệ và bảo mật thông tin của khách hàng như chính chúng tôi. Các đối tác cung cấp dịch vụ đều bị cấm sử dụng thông tin cá nhân của quý khách cho bất kỳ mục đích nào khác.</p>\r\n<p><strong>- Các công ty thẻ tín dụng:</strong> Nếu quý khách đặt hàng trên hệ thống website maylockhongkhijapan.com, những thông tin cá nhân mà quý khách cung cấp cho chúng tôi được chuyển đến ngân hàng phát hành thẻ tín dụng của quý khách để thực hiện kiểm tra và xác nhận quyền sử dụng thẻ tín dụng trong thanh toán mua hàng của quý khách. Các thông tin này được hoàn toàn bảo mật và mã hóa để đảm bảo tính an toàn cao nhất khi thanh toán.</p>\r\n<p><strong>- Đối tác tiếp thị:</strong> Chúng tôi có thể chia sẻ tên, địa chỉ nhận thư của quý khách với một vài đối tác tiếp thị được chọn lọc kỹ, những đối tác mà chúng tôi tin là sản phẩm hay dịch vụ của họ có thể hữu ích với quý khách. Chúng tôi không bao giờ chia sẻ số điện thoại, địa chỉ email hoặc thông tin thẻ tín dụng mà quý khách đã cung cấp cho chúng tôi với bất kỳ một đối tác tiếp thị nào.</p>\r\n<p><strong>- Thông tin tổng hợp:</strong> Chúng tôi cung cấp thông tin tổng hợp cho một số đối tác kinh doanh của chúng tôi. Những thông tin này là những thông tin chung, không phải là thông tin cá nhân của quý khách. Chúng tôi thu thập và chia sẻ thông tin tổng hợp để biết thêm thông tin chung về đối tượng khách hàng của chúng tôi từ đó chúng tôi có thể giúp nâng cao kinh nghiệm mua sắm của quý khách.</p>\r\n<p><strong>- Công ty vận chuyển hàng hóa:</strong> Nếu quý khách thực hiện mua hàng tại hệ thống website maylockhongkhijapan.com, tên, số điện thoại và thông tin giao, nhận của quý khách phải được cung cấp cho đối tác giao, nhận của chúng tôi để thực hiện chuyển hàng hóa đến quý khách. Một số trường hợp, hàng hóa sẽ được chuyển trực tiếp từ các nhà cung cấp của chúng tôi đến quý khách.Trong trường hợp này, chỉ có tên, địa chỉ nhận hàng, và số điện thoại của quý khách được cung cấp cho nhà cung cấp với mục đích duy nhất là hoàn thành đơn mua hàng của quý khách.</p>\r\n<p><strong>- Dữ liệu thông qua giao dịch của website khác: </strong>Nếu quý khách viếng thăm website maylockhongkhijapan.com từ một website khác, website của bên thứ ba, website này có thể truy xuất và thu thập thông tin giao dịch của cá nhân quý khách. Để theo dõi và ghi nhận giao dịch của quý khách, website của bên thứ ba có thể cung cấp theo quý khách một mã lệnh, một cookie hay một hình ảnh duy nhất nhằm định danh quý khách. Điều này chỉ xảy ra nếu quý khách liên kết đến hệ thống website maylockhongkhijapan.com thông qua một website khác.Những giao dịch bất kỳ tại hệ thống website maylockhongkhijapan.com mà có mã lệnh như vậy sẽ được gửi báo cáo lại với website đó. Chúng tôi chỉ gửi những thông tin không phải là thông tin cá nhân của quý khách, như ngày thực hiện giao dịch, những sản phẩm quý khách mua, tổng số tiền mua. Chúng tôi sẽ không gửi bất kỳ thông tin nào đến website của bên thứ ba để họ có thể xác định được quý khách là ai. Sự hiện diện của một thanh điều hướng (Navigation bar) trên đầu bất kỳ trang web nào của maylockhongkhijapan.com, điều đó có nghĩa là quý khách đang truy cập website maylockhongkhi.com.vn thông qua một website khác, website của bên thứ ba này có thể thấy hoạt động của quý khách trên website chúng tôi.</p>\r\n<p><strong>- Liên kết đến website của đối tác:</strong>Hệ thống website maylockhongkhijapan.com chứa nhiều liên kết đến website của các đối tác như các nhà cung cấp của chúng tôi. Chúng tôi không có trách nhiệm hay chịu trách nhiệm về bảo mật thông tin hoặc nội dung hiển thị trên những website này. Chúng tôi khuyến cáo quý khách nên kiểm tra tính bảo mật đối với mỗi website mà quý khách viếng thăm.Việc cung cấp những liên kết đến website của các đối tác thứ ba chỉ nhằm giúp quý khách tham khảo thông tin thuận tiện hơn. </p>\r\n<p><strong>- Thực thi pháp luật và bảo vệ người sử dụng:</strong> Trong phạm vi luật pháp cho phép, chúng tôi sẽ tiết lộ những thông tin cá nhân của quý khách cho các cơ quan chính phủ hoặc các bên thứ ba theo yêu cầu pháp lý. Chúng tôi cũng có thể sử dụng hoặc cung cấp thông tin của quý khách theo pháp luật để thực hiện thẩm định phí, báo cáo hoặc thu nợ, chống lại những sự gian lận hoặc bảo vệ quyền lợi của chúng tôi cũng như khách hàng của chúng tôi, hoặc người sử dụng. Quý khách nên biết rằng, sau khi cung cấp cho bên thứ ba, thông tin cá nhân của quý khách có thể được biết bởi những người khác trong phạm vi cho phép hoặc yêu cầu của luật áp dụng.</p>\r\n<p><strong>5. QUY ĐỊNH LIÊN KẾT THÀNH VIÊN:</strong></p>\r\n<p>- Chúng tôi duy trì mối quan hệ với các website liên kết của đối tác. Mặc dù chúng tôi không và không thể quản lý các hoạt động của đối tác để điều hành những website đó, nhưng chúng tôi sẽ chấm dứt giao dịch với bất kỳ thành viên có những sai phạm, ví dụ như: gửi thư rác, vi phạm thương hiệu hàng hóa, làm phương tiên lợi dụng để lôi kéo khách viếng thăm, hoặc những hoạt động vi phạm pháp luật. Vui lòng thông báo cho chúng tôi khi quý khách phát hiện một liên kết xấu bằng cách gửi email đến địa chỉ: hsvnglobal@gmail.com</p>\r\n<p><strong>6. QUY ĐỊNH ĐỐI VỚI TRẺ EM VÀ BẢO MẬT:</strong></p>\r\n<p>- Các website thương mại nói chung không phải được thiết kế dành cho trẻ em dưới 13 tuổi. Chúng tôi không cố ý thu thập thông tin cá nhân của trẻ em dưới 13 tuổi mà không có sự kiểm soát của phụ huynh. Nếu quý khách dưới 13 tuổi, xin vui lòng không cung cấp cho chúng tôi bất kỳ thông tin cá nhân gì. Nếu chúng tôi xác định được người dùng có độ tuổi dưới 13 và đã gửi thông tin cá nhân mà không có sự kiểm soát của phụ huynh, chúng tôi sẽ loại bỏ thông tin cá nhân này khỏi dữ liệu của chúng tôi. Chúng tôi hiểu rằng trẻ em có thể không hoàn toàn hiểu tất cả các quy định của Thông báo này, hoặc có những lựa chọn mà website thiết kế chỉ nhằm dành cho người trưởng thành. Chúng tôi khuyến cáo phụ huynh và người giám hộ dành thời gian cùng trẻ em khi trẻ em vào internet và để biết được những trang mà con mình truy cập. Hệ thống website maylockhongkhi.com.vn không bán sản phẩm cho người dưới 13 tuổi.Nếu quý khách dưới 13 tuổi, quý khách được yêu cầu phải có sự đồng ý của cha mẹ hoặc người giám hộ để thực hiện mua hàng từ hệ thống website maylockhongkhijapan.com</p>\r\n<p><strong>7. QUY ĐỊNH SỬA ĐỔI/ XOÁ BỎ/ TỪ CHỐI THÔNG TIN:</strong></p>\r\n<p> </p>\r\n<p>- Nếu tên, địa chỉ email hoặc địa chỉ nhà, số điện thoại hoặc các thông tin cá nhân khác của quý khách có thay đổi, quý khách có thể cập nhật, sửa đổi qua tài khoản của mình ở website maylockhongkhi.com.vn hoặc bỏ đi các thông tin có liên quan bằng cách liên hệ với chúng tôi theo email: maylockhongkhijapan.com. Ngoài ra, nếu quý khách không muốn tiếp tục nhận thông tin newsletter qua email từ chúng tôi, quý khách vui lòng gửi email đến:  maylockhongkhijapan.com hoặc bằng cách nhấn chuột vào liên kết không tiếp tục nhận thông tin trong bất kỳ Newsletter email nào mà chúng tôi đã gửi đến quý khách.</p>\r\n<p><strong>8. QUY ĐỊNH THÔNG TIN LIÊN LẠC</strong>:</p>\r\n<p>- Nếu quý khách có bất kỳ câu hỏi hay thắc mắc gì về điều khoản Bảo mật này, vui lòng liên hệ chúng tôi qua đường dây nóng: 0949 318 386 hoặc email:hsvnglobal@gmail.com</p>\r\n<p><strong>9. THAY ĐỔI VỀ CHÍNH SÁCH</strong>:</p>\r\n<p>- Nội dung của “Quy định bảo mật” này có thể thay đổi để phù hợp với các nhu cầu của Chúng tôi cũng như nhu cầu và sự phản hồi từ khách hàng nếu có mà không cần báo trước. Khi cập nhật nội dung chính sách này, chúng tôi sẽ chỉnh sửa lại thời gian “Cập nhật lần cuối” bên trên. </p>\r\n<p>- Nội dung “Quy định bảo mật” này chỉ áp dụng tại Công ty CP Thương Mại và Sản Xuất Nam Trung Hải, không bao gồm hoặc liên quan đến các bên thứ ba đặt quảng cáo hay có links tại maylockhongkhijapan.com. Do đó, chúng tôi đề nghị bạn đọc và tham khảo kỹ nội dung “Quy định bảo mật” của từng website mà bạn đang truy cập. </p>\r\n<p>Chúng tôi luôn hoan nghênh các ý kiến đóng góp, liên hệ và phản hồi thông tin từ bạn về “Quy định bảo mật” này. Nếu bạn có những thắc mắc liên quan xin vui lòng liên hệ theo địa chỉ Email:hsvnglobal@gmail.com</p>', NULL, 19, 20, 0, 0, 'Bảo mật thông tin', '', '', '1', '', '2016-07-22 05:27:33', '2016-07-25 07:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `slug`, `logo`, `created_at`, `updated_at`, `link`, `desc`, `category_id`) VALUES
(2, 'Công ty cổ phần và kỹ thuật công nghệ Vina', 'cong-ty-co-phan-va-ky-thuat-cong-nghe-vina', '/photos/1/nhat-pham/578dfb515319f.png', '2016-07-19 10:09:55', '2016-07-19 10:29:10', 'http://mayozonecaocap.com/', ' Cung cấp các loại máy Ozone nội và ngoại nhập, máy khử mùi diệt khuẩn bằng Ozone và ion âm, thiết bị đo nồng độ Ozone,…', 22),
(3, 'Công ty CP Thương mại và Sản xuất Nam Trung Hải', 'cong-ty-cp-thuong-mai-va-san-xuat-nam-trung-hai', '/photos/1/578e084f99183.jpg', '2016-07-19 11:00:59', '2016-07-21 01:08:53', 'http://maylockhongkhi.com.vn/', 'Công ty CP Thương mại và Sản xuất Nam Trung Hải được biết đến là nhà cung cấp chuyên nghiệp các giải pháp và thiết bị lọc không khí chất lượng cao, công nghệ tiên tiến được ứng dụng trong dân dụng và công nghiệp', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price_market` decimal(15,0) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `price_different` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guarantee` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `numbers` tinyint(4) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `high_light` tinyint(1) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `set_title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `desc`, `content`, `price_market`, `price`, `price_different`, `image`, `guarantee`, `numbers`, `status`, `high_light`, `category_id`, `set_title`, `meta_key`, `meta_desc`, `view`, `created_at`, `updated_at`) VALUES
(7, 'Máy lọc không khí R900', 'may-loc-khong-khi-r900', '', '<p>By default, when an attribute being validated is not present or contains an empty value as defined by the required rule, normal validation rules, including custom extensions, are not run. For example, the unique rule will not be run against a null value</p>', '25080000', '12680000', '', '/photos/1/nhat-pham/5779e65d5bdde.png', '12', 2, '', 1, 3, 'Máy lọc không khí R900', 'Máy lọc không khí R900', 'Máy lọc không khí R900', 0, '2016-07-05 00:36:54', '2016-07-10 18:52:44'),
(8, 'Máy lọc không khí Panasonic F-PMF35A', 'may-loc-khong-khi-panasonic-f-pmf35a', 'Khi mua máy lọc không khí Panasonic F-PMF35A bạn sẽ nhận được những phần qua hấp dẫn từ cửa hàng của chúng tôi....', '<p>Máy lọc không khí Panasonic F-PMF35A công nghệ Japan công nghệ hạt Nanoe thâm nhập sâu vào mọi kết cấu bên trong để bắt lấy vi khuẩn và chất gây dị ứng, ngăn chặn đến 99,9% các tác nhân gây dị ứng.</p>\r\n<h2><img class="alignright wp-image-38 size-medium" title="Máy lọc không khí Panasonic F-PMF35A" src="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PMF35-300x294.jpg" sizes="(max-width: 300px) 100vw, 300px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PMF35-300x294.jpg 300w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PMF35-90x88.jpg 90w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PMF35.jpg 500w" alt="Máy lọc không khí Panasonic F-PMF35A" width="300" height="294" />Thông số kỹ thuật</h2>\r\n<p>– Lưu lượng không khí (m3/ phút): Cao 3.5 Trung 2.0 Thấp 1.0</p>\r\n<p>– Công suất tiêu thụ (Watt): Cao 21 Trung 8 Thấp 6</p>\r\n<p>– Độ ồn (dB(A)): Cao 44 Trung 35 Thấp 18</p>\r\n<p>– Phạm vi áp dụng (m2) 26</p>\r\n<p>– Ion nanoe (TM)</p>\r\n<p>– Thời gian sử dụng bộ lọc: bộ lọc tích hợp 3 năm, bộ lọc khử mùi 3 năm</p>\r\n<p>– Loại động cơ DC</p>\r\n<p>– Dòng không khí 3D hút vào tầm thấp có</p>\r\n<p>– Cảm biến mùi có</p>\r\n<p>– Đèn báo mức ô nhiễm không</p>\r\n<p>– Chế độ tự động không</p>\r\n<p>– Chế độ Turbo có</p>\r\n<p>– Chế độ khi ngủ 8 giờ có</p>\r\n<p>– Chế độ kiểm tra bộ lọc không</p>\r\n<p>– Kích thước (D x R x C) (mm) 300 x 189 x 520</p>\r\n<p>– Cân nặng (kg) 6.3</p>\r\n<h3>Chi tiết công nghệ NanoE trong <a title="Máy lọc không khí Panasonic F-PMF35A" href="http://maylockhongkhijapan.com/product/may-loc-khong-khi-panasonic-fpmf35a/" target="_blank">máy lọc không khí Panasonic F-PMF35A</a></h3>\r\n<p>– Hạt [nanoe] thâm nhập sâu vào mọi kết cấu bên trong để bắt lấy vi khuẩn và chất gây dị ứng, ngăn chặn đến 99,9% các tác nhân gây dị ứng.</p>\r\n<p>– Bộ lọc không khí tích hợp với công nghệ Super alleru-buster, Tinh chất trà xanh và vi sinh kháng khuẩn</p>\r\n<p>– Lưu thông không khí 3D giúp lọc sạch hiệu quả các chất bụi bẩn và mùi hôi trong nhà</p>\r\n<p>– Chế độ Turbo có thể loại bỏ sự ô nhiễm tại cài đặt mặc định trong 10 phút</p>\r\n<p>– Chế độ khi ngủ mang lại sự thoải mái, dễ chịu trong suốt 8 giờ.</p>\r\n<p>– Hiệu quả cho kích cỡ phòng tối đa 26 m2</p>\r\n<p>– Màu sắc : Hồng hoặc Xanh</p>\r\n<p><img class="wp-image-124 size-full aligncenter" title="Công nghệ lọc khí Panasonic fpmf35a" src="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-panasonic-fpmf35a.jpg" sizes="(max-width: 500px) 100vw, 500px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-panasonic-fpmf35a.jpg 500w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-panasonic-fpmf35a-209x300.jpg 209w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-panasonic-fpmf35a-62x90.jpg 62w" alt="Công nghệ lọc khí Panasonic fpmf35a" width="500" height="716" /></p>\r\n<h3>Một số ưu điểm của <a title="máy lọc không khí" href="http://maylockhongkhijapan.com/" target="_blank">máy lọc không khí</a> Panasonic F-PMF35A</h3>\r\n<p><img class="wp-image-125 size-full aligncenter" title="Máy lọc không khí Panasonic bảo vệ sức khỏe trẻ em" src="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe.jpg" sizes="(max-width: 500px) 100vw, 500px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe.jpg 500w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe-263x300.jpg 263w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe-79x90.jpg 79w" alt="Máy lọc không khí Panasonic bảo vệ sức khỏe trẻ em" width="500" height="569" /></p>\r\n<p>– Sảm phẩm đặc biệt hữu ích đối với người già, trẻ em và phụ nữ mang thai. Những người hay bị dị ứng bởi không khí bẩn và ô nhiễm.</p>\r\n<p>– Các khách sạn, nhà hàng, quán Karaoke, quán Internet, Café sử dụng sẽ rất hiệu quả, tiết kiệm điện.</p>\r\n<p>– Những người hay mắc các bệnh về đường hô hấp rất nên sử dụng.</p>\r\n<p>Trung tâm máy lọc không khí Japan chuyên về máy lọc không khí với nhiều năm kinh nghiệm phân phối sản phẩm máy lọc không khí tại Việt Nam mang đến các sản phẩm chất lượng, chính hãng uy tín nhất hiện nay.</p>', '22399000', '20399000', '', '/photos/1/nhat-pham/5779e65d5bdde.png', '6', 1, '', 1, 4, 'Máy lọc không khí Panasonic F-PMF35A', 'Máy lọc không khí Panasonic F-PMF35A', 'Máy lọc không khí Panasonic F-PMF35A', 35, '2016-07-05 00:44:01', '2016-07-25 09:47:42'),
(9, 'Máy lọc không khí và tạo ẩm Lifepro L886-AP', 'may-loc-khong-khi-va-tao-am-lifepro-l886-ap', '', '<p><strong>Máy lọc không khí và tạo ẩm Lifepro L886-AP </strong>lọc không khí mang đến không khí sạch và trong lành để bạn có một sức khỏe dồi dào, sẽ không còn lo lắng về không khí ô nhiễm và độ ẩm thay đổi.</p>\r\n<p>Việc sử dụng máy điều hòa trong gia đình và tại văn phòng không còn mới mẻ. Thế nhưng nếu dùng máy điều hòa thường xuyên cũng đe dọa sức khỏe sụt giảm. Trong quá trình làm mát không khí, máy điều hòa sẽ hút đi độ ẩm trong phòng, nếu như chúng ta làm việc quá lâu trong môi trường độ ẩm không đầy đủ thì sẽ mắc phải một số bệnh lý như: khô hốc mũi, đau họng, viêm phế quản… và đặc biệt là sự mất nước của da gây cho da mặt khô ráp khó chịu.</p>\r\n<h2>Thông số kỹ thuật</h2>\r\n<p><img class="alignright wp-image-95 size-medium" title="Máy lọc không khí và tạo ẩm Lifepro L886-AP" src="http://localhost/maylockhongkhi/wp-content/uploads/2014/06/may-loc-khong-khi-lifepro-l866ap-300x300.jpg" sizes="(max-width: 300px) 100vw, 300px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-lifepro-l866ap-300x300.jpg 300w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-lifepro-l866ap-150x150.jpg 150w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-lifepro-l866ap-90x90.jpg 90w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-lifepro-l866ap-400x400.jpg 400w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-lifepro-l866ap.jpg 500w" alt="Máy lọc không khí và tạo ẩm Lifepro L886-AP" width="300" height="300" /></p>\r\n<p>– Xuất xứ: Việt Nam</p>\r\n<p>Thông tin thương hiệu Lifepro: Lifepro là thương hiệu của Công ty CP Lifepro Việt Nam đã được đăng ký độc quyền thương hiệu tại Cục sở hữu trí tuệ Việt Nam.</p>\r\n<p>Sứ mệnh của Lifepro Việt Nam là cung cấp cho người tiêu dùng những sản phẩm có ích nhất và chất lượng cao nhất vì cuộc sống tốt đẹp hơn.</p>\r\n<p>Sản phẩm của Công ty đã có mặt trên thị trường nhiều năm và được khách hàng mến mộ và tin tưởng về chất lượng.</p>\r\n<p>– Bảo hành: Sản phẩm được bảo hành 1 năm trên toàn quốc.</p>\r\n<p>– Kích cỡ 480 x 418 x 198 mm</p>\r\n<p>– Nguồn điện 220 v</p>\r\n<p>– Công suất 100 w</p>\r\n<p>– Tuổi thọ màng lọc: 1 năm</p>\r\n<p>– Hút và lọc không khí / h 250 m3 khí/h</p>\r\n<p>– Hút lọc theo chức năng Ngủ: 80 m3 khí/h Thấp: 120 m3 khí/h Trung bình: 180 m3/h Cao: 250 m3/h</p>\r\n<p>– Mức độ tạo ẩm Mức thấp 80 ml/h Mức cao 250 ml/h</p>\r\n<p>– Diện tích lọc tốt nhất =&lt;45 m2</p>\r\n<p>– Lưu lượng phát ozone 50 mg/h</p>\r\n<p>– Lượng ion âm phát 8.000.000 ion âm/cm3</p>\r\n<h2>Ưu điểm</h2>\r\n<p>– Lọc sạch không khí, loại bỏ hoàn toàn bụi bẩn cho dù là bụi nhỏ nhất đến 0.001 mm.</p>\r\n<p>– Loại bỏ hoàn toàn các mùi khó chịu như: mùi hôi, mùi ẩm mốc, mùi thuốc lá, mùi thức ăn, mùi động<br />vật nuôi …</p>\r\n<p>– Diệt sạch tất cả những vi khuẩn, virus gây bệnh trong không khí.</p>\r\n<p>– Phun sương, tạo độ ẩm phù hợp trong không khí, chống khô da.</p>\r\n<p>Có thể thấy với những lợi ích tuyệt vời trên, <a title="Máy lọc không khí và tạo ẩm Lifepro L886-AP" href="http://maylockhongkhijapan.com/product/may-loc-khong-khi-va-tao-am-lifepro-l886-ap/" target="_blank"><em><strong>máy lọc không khí và tạo ẩm Lifepro L886-AP</strong></em></a> chắc chắn sẽ mang đến cho chúng ta 1 sức khỏe dồi dào, sẽ không còn lo lắng về không khí ô nhiễm và độ ẩm thay đổi.</p>\r\n<h2>Sử dụng</h2>\r\n<p>– Sử dụng trong gia đình, đặc biệt là những căn hộ gần mặt đường nhiều khói bụi, gần khu công nghiệp, chợ,bãi rác…</p>\r\n<p>– Sử dụng hiệu quả trong phòng có điều hòa, chống khô da &amp; khô mũi, môi, mắt cho người sử dụng</p>\r\n<p>– Sử dụng trong phòng khách đề loai bỏ hoàn toàn mùi và chất độc hại của khói thuốc lá. Đặc biệt tốt đối với các căn hộ có phòng khách cạnh bếp, loại bỏ hoàn toàn mùi thức ăn.</p>\r\n<p>– Sử dụng trong các phòng làm việc, loại bỏ hoàn toàn các chất độc hại do các loại máy như máy tính, máy in, máy photo, máy điều hòa…gây ra.</p>\r\n<p>– Đặc biệt tốt đối với người già, trẻ nhỏ, phụ nữ mang thai, những người có bệnh về đường hô hấp.</p>\r\n<h2>Hoạt động kỹ thuật của Lifepro L886-AP</h2>\r\n<p>– Hiệu quả tối đa với việc sử dụng 2 màng lọc kích thước lớn: màng lọc HEPA, màng lọc Carbon và than hoạt tính.</p>\r\n<p>– Tạo Ion âm, rất hiệu quả trong việc lọc sạch các chất bẩn trong không khí. Ion âm là các nguyên tử khí trong không khí bị mất đi electron, có tác dụng làm cho con người sảng khoái, giảm mệt mỏi, căng thẳng, buồn nôn, đau đầu.</p>\r\n<p>– Tạo Ozone: tăng cường oxi, khử sạch mùi khó chịu</p>\r\n<p>– Kháng khuẩn cực mạnh với đèn UV diệt khuẩn.</p>\r\n<p>– Phun sương tạo độ ẩm không khí. Đặc biệt máy có tính năng cảm biến, đặt chế độ giới hạn độ ẩm không khí phù hợp, giúp cho độ ẩm trong phòng luôn luôn ổn định. Tính năng này không có ở các máy phun sương tạo ẩm khác trên thị trường.</p>\r\n<p>– Tích hợp sensor cảm biến không khí xác định mức ô nhiễm của không khí trong phòng.</p>\r\n<p>– Độ ồn cực thấp, đặc biệt nổi bật với chức năng lọc không khí khi ngủ khi không tạo ra bất kỳ tiếng ồn nào giúp cho bạn có 1 giấc ngủ ngon.</p>\r\n<h3>Bộ sản phẩm bao gồm</h3>\r\n<p>– <a title="Máy lọc không khí" href="http://maylockhongkhijapan.com/" target="_blank"><strong>Máy lọc không khí</strong></a> và tạo ẩm Lifepro L886-AP</p>\r\n<p>– Tài liệu hướng dẫn sử dụng.</p>\r\n<p>– Giấy bảo hành.</p>\r\n<p>Các nghiên cứu cho thấy rằng việc sống trong một môi trường không khí trong lành và có độ ẩm thích hợp có tác dụng rất lớn, giúp tăng cường sức khỏe và nâng cao tuổi thọ. Đó chính là lý do vì sao mà <em><strong>máy lọc không khí và tạo ẩm Lifepro L886-AP</strong></em> trở thành sản phẩm được ưa chuộng nhất hiện nay.</p>', '4990000', '0', '', '/photos/1/5795cad01b71a.jpg', '12', 12, '', 1, 7, 'Máy lọc không khí và tạo ẩm Lifepro L886-AP', 'Máy lọc không khí và tạo ẩm Lifepro L886-AP', 'Máy lọc không khí và tạo ẩm Lifepro L886-AP', 61, '2016-07-05 18:58:15', '2016-07-26 02:14:10'),
(10, 'Máy lọc không khí Panasonic FPXF35A', 'may-loc-khong-khi-panasonic-fpxf35a', '', '<p><strong>Máy lọc không khí Panasonic FPXF35A</strong> kết hợp công nghệ Nanoe cùng bộ lọc không khí tích hợp với công nghệ Super alleru-buster, tinh chất trà xanh và vi sinh kháng khuẩn.</p>\r\n<h2>Thông số kỹ thuật</h2>\r\n<p><img class="alignright wp-image-36 size-medium" title="Máy lọc không khí Panasonic FPXF35A" src="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PXF35A-300x300.jpg" sizes="(max-width: 300px) 100vw, 300px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PXF35A-300x300.jpg 300w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PXF35A-150x150.jpg 150w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PXF35A-90x90.jpg 90w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PXF35A-400x400.jpg 400w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-F-PXF35A.jpg 500w" alt="Máy lọc không khí Panasonic FPXF35A" width="300" height="300" /></p>\r\n<p>Lưu lượng không khí (m3/ phút) : Cao 3.5 Trung 2.0 Thấp 1.0</p>\r\n<p>Công suất tiêu thụ (Watt) : Cao 21 Trung 8 Thấp 6</p>\r\n<p>Độ ồn (dB(A)) : Cao 44 Trung 35 Thấp 18</p>\r\n<p>Phạm vi áp dụng (m2) 26</p>\r\n<p>Ion nanoe (TM)</p>\r\n<p>Thời gian sử dụng bộ lọc : bộ lọc tích hợp 3 năm, bộ lọc khử mùi 3 năm</p>\r\n<p>Loại động cơ DC</p>\r\n<p>Dòng không khí 3D hút vào tầm thấp có</p>\r\n<p>Cảm biến mùi có</p>\r\n<p>Đèn báo mức ô nhiễm có</p>\r\n<p>Chế độ tự động có</p>\r\n<p>Chế độ Turbo có</p>\r\n<p>Chế độ khi ngủ 8 giờ có</p>\r\n<p>Chế độ kiểm tra bộ lọc có</p>\r\n<p>Kích thước (D x R x C) (mm) 300 x 189 x 520</p>\r\n<p>Cân nặng (kg) 6.3</p>\r\n<h2>Công nghệ Nanoe trong <a title="máy lọc không khí Panasonic FPXF35A" href="http://maylockhongkhijapan.com/product/may-loc-khong-khi-panasonic-fpxf35a/" target="_blank">máy lọc không khí Panasonic FPXF35A</a></h2>\r\n<p>– Hạt [nanoe] thâm nhập sâu vào mọi kết cấu bên trong để bắt lấy vi khuẩn và chất gây dị ứng và ngăn chặn đến 99,9% các tác nhân gây dị ứng.</p>\r\n<p><img class="wp-image-132 size-full aligncenter" title="Công nghệ Nanoe Panasonic" src="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-nanoe-panasonic.jpg" sizes="(max-width: 500px) 100vw, 500px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-nanoe-panasonic.jpg 500w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-nanoe-panasonic-209x300.jpg 209w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/cong-nghe-nanoe-panasonic-62x90.jpg 62w" alt="Công nghệ Nanoe Panasonic" width="500" height="716" /></p>\r\n<p><img class="aligncenter wp-image-125 size-full" title="Máy lọc không khí Panasonic bảo vệ sức khỏe trẻ em" src="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe.jpg" sizes="(max-width: 500px) 100vw, 500px" srcset="http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe.jpg 500w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe-263x300.jpg 263w, http://maylockhongkhijapan.com/wp-content/uploads/2014/06/may-loc-khong-khi-panasonic-bao-ve-suc-khoe-79x90.jpg 79w" alt="Máy lọc không khí Panasonic bảo vệ sức khỏe trẻ em" width="500" height="569" /></p>\r\n<p>– Bộ lọc không khí tích hợp với công nghệ Super alleru-buster, Tinh chất trà xanh và vi sinh kháng khuẩn</p>\r\n<p>– Lưu thông không khí 3D giúp lọc sạch hiệu quả các chất bụi bẩn và mùi hôi trong nhà</p>\r\n<p>– Đèn báo mức ô nhiễm thay đổi trên bảng đèn để cho thấy chất lượng không khí.</p>\r\n<p>– Chế độ tự động tạo ra tốc độ hoạt động tương ứng với mức độ ô nhiễm không khí</p>\r\n<p>– Chế độ Turbo có thể loại bỏ sự ô nhiễm tại cài đặt mặc định trong 10 phút</p>\r\n<p>– Chế độ khi ngủ mang lại sự thoải mái, dễ chịu trong suốt 8 giờ.</p>\r\n<p>– Chế độ kiểm tra bộ lọc sẽ nhắc nhở khi đến thời hạn cần phải thay mới</p>\r\n<p>– Hiệu quả cho kích cỡ phòng tối đa 26 m2</p>\r\n<p><em><strong><a title="máy lọc không khí" href="http://maylockhongkhijapan.com/" target="_blank">Máy lọc không khí</a> Panasonic FPXF35A</strong></em> tiện nghi sử dụng trong cả gia đình và văn phòng, sản phẩm chính hãng, giá cả phù hợp nhất cho mọi người tiêu dùng.</p>', '6500000', '4390000', '', '/photos/1/nhat-pham/5782fa724b75a.jpg', '12', 12, '', 1, 4, 'Máy lọc không khí Panasonic FPXF35A', 'Máy lọc không khí Panasonic FPXF35A', 'Máy lọc không khí Panasonic FPXF35A', 30, '2016-07-10 18:47:29', '2016-07-25 18:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `set_title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `slug`, `image`, `content`, `category_id`, `set_title`, `meta_desc`, `meta_key`, `publish`, `view`, `created_at`, `updated_at`) VALUES
(2, 'Dự án sữa Thống Nhất', 'du-an-sua-thong-nhat', '/photos/1/nhat-pham/578da72c66a31.png', '<p>Bình Phước là tỉnh tập trung khá nhiều nhà máy, xưởng sản xuất quy mô lớn, trong đó có dự án nhà máy may mặc xuất khẩu Far Eastern được xây dựng tại KCN Bắc Đồng Phú, huyện Đồng Phú với tổng diện tích sàn là 6,530m2, quy mô 2 tầng và chiều dài vượt nhịp là 11m</p>\r\n<p>.<img src="http://www.namcong.vn/public/skin/back-end/js/ckfinder/userfiles/images/2403/5558.jpg" alt="" /></p>\r\n<p>Chính thức ký hợp đồng với nhà thầu chính UNICONS vào ngày 05.12.2015, Namcong đã nhanh chóng triển khai quá trình thiết kế cùng Nhà tư vấn thiết kế chính là Công ty Cổ phần Tư vấn Thiết kế Đầu tư Xây dựng Hợp Phát. Dự án Nhà máy may mặc xuất khẩu Far Eastern có tổng diện tích gần 10ha, được chia làm 2 giai đoạn: giai đoạn 1 gồm khoảng 36 chuyền và giai đoạn 2 gồm 72 chuyền với hơn 8,000 lao động. Với quy mô khá lớn, sau khi hoàn tất, dự án sẽ giải quyết được nhu cầu việc làm cho đại bộ phận người dân địa phương và vùng lân cận. Đây là dự án thứ 2 của tập đoàn Apparel Việt Nam được xây dựng tại KCN Bắc Đồng Phú.</p>\r\n<p>Namcong đã hoàn tất quá trình thi công giai đoạn 1 cho dự án gồm nhà kho và nhà xe 1 và hiện đang bước vào giai đoạn 2 là thi công nhà xe 2.</p>\r\n<p><img src="http://www.namcong.vn/public/skin/back-end/js/ckfinder/userfiles/images/2403/far%20eastern%201.jpg" alt="" /></p>\r\n<p>Qua quá trình thi công dự án này, Namcong đã một lần nữa chứng minh là một nhà thầu chuyên nghiệp về cáp dự ứng lực khi đưa ra giải pháp thiết kế và thi công đáp ứng được yêu cầu công năng sử dụng của công trình. </p>', 20, 'Dự án sữa Thống Nhất', 'Dự án sữa Thống Nhất', 'Dự án sữa Thống Nhất', '0', 8, '2016-07-19 04:06:43', '2016-07-26 01:09:28'),
(3, 'Dự án Bệnh viện Từ Dũ', 'du-an-benh-vien-tu-du', '/photos/1/nhat-pham/578da9fbd4e96.png', '<p class="animated bounceIn">Bình Phước là tỉnh tập trung khá nhiều nhà máy, xưởng sản xuất quy mô lớn, trong đó có dự án nhà máy may mặc xuất khẩu Far Eastern được xây dựng tại KCN Bắc Đồng Phú, huyện Đồng Phú với tổng diện tích sàn là 6,530m2, quy mô 2 tầng và chiều dài vượt nhịp là 11m.<!-- pagebreak --></p>\r\n<p class="animated bounceIn"><img src="http://www.namcong.vn/public/skin/back-end/js/ckfinder/userfiles/images/2403/5558.jpg" alt="" /></p>\r\n<div class="row">\r\n<div class="col-md-12 content">\r\n<p>Chính thức ký hợp đồng với nhà thầu chính UNICONS vào ngày 05.12.2015, Namcong đã nhanh chóng triển khai quá trình thiết kế cùng Nhà tư vấn thiết kế chính là Công ty Cổ phần Tư vấn Thiết kế Đầu tư Xây dựng Hợp Phát. Dự án Nhà máy may mặc xuất khẩu Far Eastern có tổng diện tích gần 10ha, được chia làm 2 giai đoạn: giai đoạn 1 gồm khoảng 36 chuyền và giai đoạn 2 gồm 72 chuyền với hơn 8,000 lao động. Với quy mô khá lớn, sau khi hoàn tất, dự án sẽ giải quyết được nhu cầu việc làm cho đại bộ phận người dân địa phương và vùng lân cận. Đây là dự án thứ 2 của tập đoàn Apparel Việt Nam được xây dựng tại KCN Bắc Đồng Phú.</p>\r\n<p>Namcong đã hoàn tất quá trình thi công giai đoạn 1 cho dự án gồm nhà kho và nhà xe 1 và hiện đang bước vào giai đoạn 2 là thi công nhà xe 2.</p>\r\n<p><img src="http://www.namcong.vn/public/skin/back-end/js/ckfinder/userfiles/images/2403/far%20eastern%201.jpg" alt="" /></p>\r\n<p>Qua quá trình thi công dự án này, Namcong đã một lần nữa chứng minh là một nhà thầu chuyên nghiệp về cáp dự ứng lực khi đưa ra giải pháp thiết kế và thi công đáp ứng được yêu cầu công năng sử dụng của công trình.</p>\r\n</div>\r\n</div>', 20, 'Dự án Bệnh viện Từ Dũ', 'Dự án Bệnh viện Từ Dũ', 'Dự án Bệnh viện Từ Dũ', '0', 2, '2016-07-19 04:19:59', '2016-07-25 07:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_key`, `option_value`, `type`) VALUES
(1, 'name', 'Công ty TNHH Phát triển Công nghệ & Dịch vụ HSVN Toàn Cầu', 'text'),
(2, 'email', 'hsvnglobal@gmail.com', 'text'),
(3, 'phone', '04.39999336 - 04.22.111159 - 097.2222.958', 'text'),
(4, 'set_title', 'Máy lọc không khí Japan cao cấp chính hãng giá rẻ', 'text'),
(5, 'meta_key', 'Máy lọc không khí cao cấp, may loc khong khi, máy lọc không khí, may loc khong khi cao cap, may loc khong khi japan, máy lọc không khí japan', 'text'),
(6, 'meta_desc', 'Máy lọc không khí cao cấp Nhật Bản chất lượng cao, phân phối uy tín giá rẻ các loại máy lọc không khí từ Nhật Bản, Hàn Quốc, Mỹ và Châu Âu', 'textarea'),
(7, 'facebook', '#', 'text'),
(8, 'twice', '#', 'text'),
(9, 'youtube', '#', 'text'),
(10, 'google_plus', '#', 'text'),
(11, 'google_analytics', '', 'textarea'),
(12, 'chat_box', '', 'textarea'),
(13, 'banner', '/photos/1/579646e36a5e7.png', 'image'),
(14, 'hotline', '097.2222.958', 'text'),
(15, 'video', '<iframe width="100%" height="227" src="https://www.youtube.com/embed/LNKiGHCHNGc" frameborder="0" allowfullscreen></iframe>', 'text'),
(17, 'about_us', '<p>Nhà phân phối máy lọc không khí Nhật bản duy nhất tại Việt Nam</p>\r\n<p>MST : 0106308362 Cấp bởi sở kế hoạch đầu tư TP. Hà Nội</p>\r\n<p>Showroom: Số 475 Nguyễn Khang, Quận Cầu Giấy, Hà Nội</p>\r\n<p>Văn phòng: Số 43, Ngõ 165 Phố Mai Dịch, Cầu Giấy, Hà Nội</p>\r\n<p>Email : hsvnglobal@gmail.com.</p>\r\n<p>Hotline: 04.39999336 - 04.22.111159 - 097.2222.958</p>\r\n<p><strong>Chi nhánh phía Nam</strong></p>\r\n<p>MST : 0106308362-001 Cấp bởi sở kế hoạch đầu tư TP.Hồ Chí Minh</p>\r\n<p>Địa chỉ : Số 59 Đường Hoàng Việt,Phường 4,Quận Tân Bình, TP Hồ Chí Minh</p>\r\n<p>Hotline : 0973.505.115 - 08.668.55115</p>', 'editor'),
(18, 'co_so_1', '<ul>\r\n<li><strong>Cơ sở 1:</strong> Số 475 Nguyễn Khang, Quận Cầu Giấy, Hà Nội</li>\r\n<li><strong>Hotline:</strong> 04.39999336 - 04.22.111159 - 097.2222.958</li>\r\n</ul>', 'editor'),
(20, 'co_so_2', '<ul>\r\n<li><strong>Cơ sở 2:</strong> Số 59 Đường Hoàng Việt,Phường 4,Quận Tân Bình, TP Hồ Chí Minh</li>\r\n<li><strong>Hotline:</strong> 0973.505.115 - 08.668.55115</li>\r\n</ul>', 'editor'),
(21, 'cam_ket', '<ul>\r\n<li>Sản phẩm chính hãng, chất lượng vượt trội, hàng hóa đa dạng</li>\r\n<li>Tiên phong về giá cả, đem đến không gian sống tốt cho mọi nhà</li>\r\n<li>Dịch vụ bảo hành tại nhà, 24/7 nhanh chóng, chuyên nghiệp</li>\r\n<li>Cơ sở vật chất, hệ thống showroom hiện đại sang trọn BẬC NHẤT</li>\r\n<li>Đội ngũ nhân viên có trình độ chuyên môn, tận tình hết mình vì khách hàng</li>\r\n</ul>', 'editor'),
(22, 'fb_app_id', '1647393925578689', 'text'),
(23, 'fb_admin_id', '100007035581602', 'text'),
(24, 'fan_page_fb', '<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="320" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>', 'textarea'),
(25, 'thanh_tich', '/photos/1/5795c83a3846f.png', 'image');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publish` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `key`, `title`, `desc`, `image`, `publish`, `created_at`, `updated_at`) VALUES
(3, 'oVYuixEChtww', 'Banner', 'Banner lớn cho mọi trang', '/photos/1/579646e36a5e7.png', '0', '2016-07-26 01:40:52', '2016-07-26 01:57:53'),
(4, '_*y5!s5_E5Rf', 'Thành tích', 'Thành tích đạt được, hiển thị trang index ', '/photos/1/5795c83a3846f.png', '0', '2016-07-26 02:08:49', '2016-07-26 02:08:49'),
(5, 'a7s@L6ZHF^v*', 'Banner sản phẩm', 'Bannẻ hiển thị trang chi tiết sản phẩm', '/photos/1/5796507ddbfc8.png', '0', '2016-07-26 02:13:30', '2016-07-26 02:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `messages` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(15,0) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `email`, `phone`, `address`, `messages`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Phan Thị Tuyết Thu', 'butrentron.man95@gmail.com', '01202606292', 'Tp. Hồ Chí Minh', '', '4390000', 2, '2016-07-17 23:56:09', '2016-07-18 02:31:13'),
(10, 'Phạm Phúc Như Tâm', 'butrentron.dn95@gmail.com', '0905485589', '04 Đống đa, Hà Nội', '', '33079000', 1, '2016-07-18 03:03:54', '2016-07-18 03:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nhật Phạm Văn', 'thegioicotich.xahoa@wonderful.greate.thiendan', '$2y$10$/BfOog4ERIVhwqgpxNem.eBMq0tRolPXVpXdYUr.SBZ0KfumgtsAm', '', 'cdqkjs0Ny8ENvS58VYtesSqVftF8linYeJxAeD4DNg4OZaA96zgi8S7lnZo4', '2016-07-01 01:26:58', '2016-07-21 08:38:44'),
(6, 0, ' HSVN Toàn Cầu', 'hsvnglobal@gmail.com', '$2y$10$4PwgO13AKYR61MDrFtbhoeTfbdHhMC23PHg1cMhcyV0PrWg59P94u', '', NULL, '2016-07-21 08:45:36', '2016-07-21 08:45:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_index` (`parent_id`),
  ADD KEY `categories_lft_index` (`lft`),
  ADD KEY `categories_rgt_index` (`rgt`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`),
  ADD KEY `menu_items_category_id_foreign` (`category_id`),
  ADD KEY `menu_items_page_id_foreign` (`page_id`),
  ADD KEY `menu_items_parent_id_index` (`parent_id`),
  ADD KEY `menu_items_lft_index` (`lft`),
  ADD KEY `menu_items_rgt_index` (`rgt`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_transaction_id_foreign` (`transaction_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_parent_id_index` (`parent_id`),
  ADD KEY `pages_lft_index` (`lft`),
  ADD KEY `pages_rgt_index` (`rgt`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_category_id_foreign` (`category_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
