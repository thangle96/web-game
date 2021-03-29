-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2020 lúc 03:43 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopphukien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_category`
--

CREATE TABLE `nts_category` (
  `id` int(11) NOT NULL COMMENT 'Mã Loại',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên loại SP',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'SLug Loại SP',
  `parentid` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `orders` int(11) NOT NULL COMMENT 'Thứ tự',
  `metakey` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_category`
--

INSERT INTO `nts_category` (`id`, `name`, `slug`, `parentid`, `orders`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(44, 'PIN SẠC DỰ PHÒNG', 'pin-sac-du-phong', 0, 1, '', '', '2020-12-04 20:47:22', 1, '2020-12-04 20:47:22', 1, 1),
(45, 'SẠC, CÁP', 'sac-cap', 0, 1, '', '', '2020-12-04 20:47:32', 1, '2020-12-04 20:47:32', 1, 1),
(46, 'TAI NGHE', 'tai-nghe', 0, 1, '', '', '2020-12-04 20:47:44', 1, '2020-12-04 20:47:44', 1, 1),
(47, 'LOA', 'loa', 0, 1, '', '', '2020-12-04 20:47:57', 1, '2020-12-05 05:44:45', 1, 1),
(53, 'APPLE WATCH', 'apple-watch', 0, 1, '', '', '2020-12-09 09:42:09', 1, '2020-12-09 09:42:09', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_contact`
--

CREATE TABLE `nts_contact` (
  `id` int(11) NOT NULL COMMENT 'Mã liên hệ',
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Họ và tên',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email',
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Điện thoại',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tiêu đề',
  `detail` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chi tiết',
  `replaydetail` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nội dung liên hệ',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày liên hệ',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày trả lời',
  `updated_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Người trả lời',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Tráng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_contact`
--

INSERT INTO `nts_contact` (`id`, `fullname`, `email`, `phone`, `title`, `detail`, `replaydetail`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Nguyễn Văn Toàn', 'nguyenvantoan@gmail.com', '0987654321', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', NULL, '2020-06-30 22:31:49', '2020-06-30 22:31:49', 1, 1),
(2, 'Lê Thái Sơn', 'lethaison@gmail.com', '0987667986', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', NULL, '2020-06-30 22:31:49', '2020-06-30 22:31:49', 1, 1),
(3, 'Trần Ngọc Ái', 'tranngocai@gmail.com', '0987654379', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', NULL, '2020-06-30 22:31:49', '2020-06-30 22:31:49', 1, 1),
(4, 'Mai Tiến Sơn', 'maitienson@gmail.com', '0987654367', 'Hỏi về liên kết mua sĩ', 'Hỏi về liên kết mua sĩ', NULL, '2020-06-30 22:31:49', '2020-06-30 22:31:49', 1, 1),
(5, 'NGUYEN  THANH SANG', 'sang30051999@gmail.com', '0798877042', 'CỐC/CỦ SẠC IPAD NGUYÊN ZIN BH 12 THÁNG', ' abcsada', NULL, '2020-11-21 06:04:41', '2020-11-21 06:04:41', 1, 1),
(6, 'NGUYEN  THANH SANG', 'sang30051999@gmail.com', '0798877042', 'CỐC/CỦ SẠC IPAD NGUYÊN ZIN BH 12 THÁNG', ' abc', NULL, '2020-11-21 07:18:06', '2020-11-21 07:18:06', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_menu`
--

CREATE TABLE `nts_menu` (
  `id` int(11) NOT NULL COMMENT 'Mã Menu',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên Menu',
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Liên kết',
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Kiểu Menu',
  `tableid` int(11) NOT NULL DEFAULT 0 COMMENT 'Mã trong bảng',
  `orders` int(11) NOT NULL DEFAULT 0 COMMENT 'Thứ tự',
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Vị trí',
  `parentid` int(11) NOT NULL COMMENT 'Mã cấp cha',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày Tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_menu`
--

INSERT INTO `nts_menu` (`id`, `name`, `link`, `type`, `tableid`, `orders`, `position`, `parentid`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Trang chủ', 'index.php?option=home', 'custom', 1, 0, 'mainmenu', 0, '2020-06-30 15:36:22', 1, '2020-12-09 08:51:05', 1, 1),
(2, 'Giới thiệu', 'index.php?option=page-category', 'custom', 1, 0, 'mainmenu', 0, '2020-06-30 15:36:22', 1, '2020-12-09 08:51:05', 1, 1),
(3, 'Dịch vụ', 'index.php?option=dichvu', 'custom', 1, 0, 'mainmenu', 0, '2020-06-30 15:36:22', 1, '2020-12-09 08:51:05', 1, 1),
(4, 'Liên hệ', 'index.php?option=contact', 'custom', 1, 0, 'mainmenu', 0, '2020-06-30 15:36:22', 1, '2020-12-09 08:51:05', 1, 1),
(5, 'Tin tức', 'index.php?option=post', 'custom', 1, 0, 'mainmenu', 0, '2020-07-23 03:34:26', 1, '2020-07-23 03:34:26', 1, 1),
(9999, 'Sản phẩm', 'index.php?option=product', 'custom', 1, 1, 'mainmenu', 0, '2020-07-23 03:34:26', 1, '2020-07-23 03:34:26', 1, 1),
(10006, 'PIN SẠC DỰ PHÒNG', 'index.php?option=product&cat=pin-sac-du-phong', '', 0, 1, '', 9999, '2020-12-09 07:40:21', 1, '2020-12-09 07:40:21', 1, 1),
(10009, 'SẠC, CÁP', 'index.php?option=product&cat=sac-cap', '', 0, 1, '', 9999, '2020-12-09 07:43:40', 1, '2020-12-09 07:43:40', 1, 1),
(10010, 'TAI NGHE', 'index.php?option=product&cat=tai-nghe', '', 0, 1, '', 9999, '2020-12-09 09:32:22', 1, '2020-12-09 09:32:22', 1, 1),
(10011, 'LOA', 'index.php?option=product&cat=loa', '', 0, 1, '', 9999, '2020-12-09 09:33:50', 1, '2020-12-09 09:33:50', 1, 1),
(10012, 'APPLE WATCH', 'index.php?option=product&cat=apple-watch', '', 0, 1, '', 9999, '2020-12-09 09:42:33', 1, '2020-12-09 09:42:33', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_order`
--

CREATE TABLE `nts_order` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Code đơn hàng',
  `userid` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `createdate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `exportdate` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày xuất',
  `deliveryaddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ người nhận',
  `deliveryname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên người nhận',
  `deliveryphone` varchar(120) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Điện thoại người nhận',
  `deliveryemail` varchar(120) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email ngươig nhận',
  `updated_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày cập nhật',
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'Người cập nhật',
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_order`
--

INSERT INTO `nts_order` (`id`, `code`, `userid`, `createdate`, `exportdate`, `deliveryaddress`, `deliveryname`, `deliveryphone`, `deliveryemail`, `updated_at`, `updated_by`, `status`) VALUES
(1, '20200813101249', 2, '2020-08-12 17:00:00', '2020-08-12 17:00:00', '', 'Khách hàng', '0987654367', 'khachhang@gmail.com', '2020-08-13 03:12:49', 2, 2),
(2, '20200813101416', 2, '2020-08-12 17:00:00', '2020-08-12 17:00:00', 'Thanh Trì Hà Nội', 'Nguyễn Văn Tèo', '0987654321', 'teo@yahoo.com', '2020-08-13 03:14:16', 2, 2),
(3, '20200813101556', 2, '2020-08-12 17:00:00', '2020-08-12 17:00:00', '', 'Khách hàng', '0987654367', 'khachhang@gmail.com', '2020-08-13 03:15:56', 2, 2),
(4, '20200813101608', 2, '2020-08-12 17:00:00', '2020-08-12 17:00:00', '', 'Khách hàng', '0987654367', 'khachhang@gmail.com', '2020-08-13 03:16:08', 2, 2),
(5, '20200813101657', 2, '2020-08-12 17:00:00', '2020-08-12 17:00:00', '', 'Khách hàng', '0987654367', 'khachhang@gmail.com', '2020-08-13 03:16:57', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_orderdetail`
--

CREATE TABLE `nts_orderdetail` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã CT Đơn hàng',
  `orderid` int(10) UNSIGNED NOT NULL COMMENT 'Mã đơn hàng',
  `productid` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `price` float(12,2) NOT NULL COMMENT 'Giá sản phẩm',
  `quantity` int(10) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `amount` float(12,2) NOT NULL COMMENT 'Thành tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_orderdetail`
--

INSERT INTO `nts_orderdetail` (`id`, `orderid`, `productid`, `price`, `quantity`, `amount`) VALUES
(1, 1, 393, 259000.00, 6, 1554000.00),
(2, 1, 420, 259000.00, 5, 1295000.00),
(3, 1, 394, 259000.00, 4, 1036000.00),
(4, 2, 517, 259000.00, 4, 1036000.00),
(5, 2, 518, 259000.00, 5, 1295000.00),
(6, 3, 517, 259000.00, 4, 1036000.00),
(7, 3, 518, 259000.00, 5, 1295000.00),
(8, 4, 517, 259000.00, 4, 1036000.00),
(9, 4, 518, 259000.00, 5, 1295000.00),
(10, 5, 320, 259000.00, 4, 1036000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_page`
--

CREATE TABLE `nts_page` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã bài viết',
  `topid` int(10) UNSIGNED DEFAULT NULL COMMENT 'Mã chủ đề',
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tiêu đề bài viết',
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Slug tiêu đề',
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chi tiết bài viết',
  `img` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hình ảnh',
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post' COMMENT 'Kiểu bài viết',
  `metakey` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_page`
--

INSERT INTO `nts_page` (`id`, `topid`, `title`, `slug`, `detail`, `img`, `type`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, NULL, 'Giới thiệu', 'gioi-thieu', 'sang-store ', 'tin-tuc.jpg', 'page', 'Từ khóa SEO', 'Mô tả SEO', '2020-06-30 22:20:53', 1, '2020-06-30 22:20:53', 1, 1),
(2, NULL, 'Chính sách đổi trả', 'chinh-sach-doi-tra', 'Chi tiết bài viết ', 'tin-tuc.jpg', 'page', 'Từ khóa SEO', 'Mô tả SEO', '2020-06-30 22:20:53', 1, '2020-06-30 22:20:53', 1, 1),
(3, NULL, 'Cách thanh toán', 'cach-thanh-toan', 'Chi tiết bài viết ', 'tin-tuc.jpg', 'page', 'Từ khóa SEO', 'Mô tả SEO', '2020-06-30 22:20:53', 1, '2020-06-30 22:20:53', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_post`
--

CREATE TABLE `nts_post` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã bài viết',
  `topid` int(10) UNSIGNED DEFAULT NULL COMMENT 'Mã chủ đề',
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tiêu đề bài viết',
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Slug tiêu đề',
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chi tiết bài viết',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hình ảnh',
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'post' COMMENT 'Kiểu bài viết',
  `metakey` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(4) NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_post`
--

INSERT INTO `nts_post` (`id`, `topid`, `title`, `slug`, `detail`, `img`, `type`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(25, 0, 'nguyen sang', 'nguyen sang', '', '84654300_2567700580185732_3900762325556133888_o.jp', '1', '1', '1', '2020-12-09 09:08:32', 1, '2020-12-09 09:10:12', 1, 0),
(26, 0, 'nguyen sang', 'nguyen sang', '', '84654300_2567700580185732_3900762325556133888_o.jpg', '1', '1', '1', '2020-12-09 09:10:27', 1, '2020-12-09 09:10:27', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_product`
--

CREATE TABLE `nts_product` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã sản phẩm',
  `catid` int(10) UNSIGNED NOT NULL COMMENT 'Mã loại sản phẩm',
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  `slug` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Slug tên sản phẩm',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hình ảnh',
  `detail` mediumtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Chi tiết',
  `number` smallint(5) UNSIGNED NOT NULL COMMENT 'Số lượng',
  `price` int(20) NOT NULL COMMENT 'Giá',
  `pricesale` int(20) NOT NULL COMMENT 'Giá khuyến mãi',
  `metakey` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_product`
--

INSERT INTO `nts_product` (`id`, `catid`, `name`, `slug`, `img`, `detail`, `number`, `price`, `pricesale`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(558, 44, 'Pin sạc dự phòng 7500mAh AVA DS6301', 'pin-sac-du-phong-7500mah-ava-ds6301', 'Loại sản phẩm.jpg', 'Thiết kế đơn giản, cứng cáp.\r\nSử dụng lõi pin Li-Ion an toàn.\r\nNguồn ra 2 cổng USB 5V - 2.1A.\r\nDung lượng 7500 mAh cho hiệu suất sạc 64%.\r\nSạc được cho mọi điện thoại và máy tính bảng tương thích.', 3, 210000, 200000, 'sacdu phong', 'sacdu phong', '2020-12-04 20:54:28', 1, '2020-12-09 09:30:00', 1, 1),
(559, 44, 'Pin sạc dự phòng Polymer 10.000mAh ', 'pin-sac-du-phong-polymer-10-000mah', 'pin-sac-du-phong-polymer-10000mah-ava-pj-jp207-xam-600x600.jpg', 'Thiết kế nhỏ gọn, dễ dàng mang theo, cất trong balo, túi xách.\r\nDung lượng 10.000 mAh, lõi pin Polymer an toàn, bền bỉ.\r\n2 cổng USB đầu ra 5V - 2.4A, sạc nhanh chóng cho thiết bị.\r\nCó đèn Led báo phần trăm pin tiện lợi.\r\nTương thích hầu hết mọi điện thoại, máy tính bảng,...\r\n\r\n', 4, 320000, 300000, 'pin', 'pin du phong', '2020-12-04 20:56:44', 1, '2020-12-09 09:19:29', 1, 1),
(561, 44, 'Pin sạc dự phòng Polymer 15.000mAh', 'pin-sac-du-phong-polymer-xam', 'sac-du-phong-10000mah-khong-day-xmobile-p106wd-600x600-1-600x600.jpg', 'abc', 6, 400000, 300000, 'pin', 'pin', '2020-12-04 21:01:21', 1, '2020-12-04 21:01:21', 1, 1),
(562, 45, 'Adapter Sạc 2 cổng USB 2.4A ', 'adapter-sac-2-cong-usb-2-4a-type-c', 'adapter-sac-1a-ava-ds432x-600x600.jpg', 'abcs', 4, 200000, 140000, 'sac', 'sac', '2020-12-04 21:05:45', 1, '2020-12-04 21:05:45', 1, 1),
(563, 45, 'Adapter Sạc 1A AVA DS432X', 'adapter-sac-1a-ava-ds432x', 'adapter-sac-2-cong-usb-type-c-3a-xmobile-ds165x-600x600.jpg', 'abc', 5, 90000, 90000, 'sac', 'sac', '2020-12-04 21:06:29', 1, '2020-12-04 21:06:29', 1, 1),
(564, 45, 'Adapter Sạc Type C 20W ', 'adapter-sac-type-c-20w-dung-cho-iphone-ipad-apple', 'adapter-sac-type-c-20w-cho-iphone-ipad-apple-mhje3-ava-600x600.png', 'abc', 2, 990000, 800000, 'sac', 'sac', '2020-12-04 21:07:39', 1, '2020-12-04 21:07:39', 1, 1),
(565, 46, 'Tai nghe Bluetooth Mozard ', 'tai-nghe-bluetooth-mozard-r559x-den', 'bluetooth-beats-flex-mymc2-mymd2-ava-1-600x600.jpg', 'abc', 4, 1900000, 1800000, 'tainghe', 'tainge', '2020-12-04 21:12:33', 1, '2020-12-04 21:12:33', 1, 1),
(566, 46, 'Tai nghe Bluetooth Beats Flex ', 'tai-nghe-bluetooth-beats-flex-mymc2-mymd2', 'ep-gaming-asus-rog-cetra-core-den-ava-600x600.jpg', 'abc', 3, 1450000, 14500000, 'nghe', 'nghe', '2020-12-04 21:15:39', 1, '2020-12-04 21:15:39', 1, 1),
(567, 46, 'Tai nghe EP Gaming Asus Rog ', 'tai-nghe-ep-gaming-asus-rog-cetra-core-den', 'tai-nghe-bluetooth-mozard-r559x-den-600x600-1-600x600.jpg', 'abc', 3, 1190000, 1000000, 'tainghe', 'tainghe', '2020-12-04 21:17:09', 1, '2020-12-04 21:17:09', 1, 1),
(568, 47, 'Loa Bluetooth JBL Boombox 2 Đen', 'loa-bluetooth-jbl-boombox-2-den', 'loa-bluetooth-jbl-boombox-2-den-ava-1-600x600.jpg', 'Thiết kế hình trụ bắt mắt, tay cầm tiện lợi.\r\nCông suất 60 W khi dùng pin, lên đến 80 W khi cắm điện trực tiếp.\r\nÂm thanh bùng nổ, dải bass mạnh mẽ, vượt trội.\r\nTích hợp tính năng Party Boost giúp kết nối các loa Boombox 2 lại với nhau.\r\nThời gian sử dụng đến 24 tiếng và sạc lại chỉ 6.5 tiếng.\r\nBảo vệ loa an toàn với chuẩn IPX7', 3, 9100000, 9030000, 'loa', 'loa', '2020-12-05 04:53:16', 1, '2020-12-05 04:53:16', 1, 1),
(570, 47, 'Loa bluetooth Sony Extra Bass SRS-XB43', 'loa-bluetooth-sony-extra-bass-srs-xb43', 'loa-bluetooth-sony-srs-xb43-ava-600x600-1-600x600.jpg', 'Thiết kế cá tính, 2 màu lựa chọn, dễ di chuyển.\r\nÂm thanh rõ nét với 2 driver woofer và 2 driver tweeter.\r\nÂm trầm mạnh mẽ với Extra Bass và màng loa kiểu mới lạ.\r\nKiểm soát đèn LED trên điện thoại với ứng dụng Sony | Music Center và Fiestable.\r\nDùng trong suốt 24 giờ, sạc trong 5 tiếng, sạc ngược qua cổng USB cho thiết bị khác.\r\nKhả năng chống va đập, chống nước và chống bụi chuẩn IP67, tăng độ bền, an toàn khi dùng.\r\nĐồng bộ 100 loa qua tính năng Party Connect.', 2, 4110000, 4000000, 'loa', 'loa', '2020-12-05 04:55:23', 1, '2020-12-05 04:55:23', 1, 1),
(571, 47, 'Loa Kéo Bluetooth Mozard L0629K', 'loa-keo-bluetooth-mozard-l0629k', 'loa-keo-bluetooth-mozard-l0629k-den-xam-600x600-1-600x600.jpg', 'Công suất 24 W cho âm thanh sắc nét và mạnh mẽ. Dải tần số 40 Hz - 20 kHz.\r\nThời gian sử dụng 2 giờ - 3 giờ, thời gian sạc khoảng 5 - 8 giờ.\r\nHát karaoke thả ga với 2 micro tặng kèm.\r\nHỗ trợ đa dạng kết nối.\r\nKhông bảo hành phụ kiện kèm theo.', 3, 2200000, 2000000, 'loa', 'loa', '2020-12-05 05:00:03', 1, '2020-12-05 05:00:03', 1, 1),
(572, 44, 'Pin sạc dự phòng 10.000 mAh JP106S', 'pin-sac-du-phong-polymer-10-000-mah-type-c-esaver-pj-jp106s', 'polymer-10000-mah-type-c-esaver-pj-jp106s-avatar-1-600x600.jpg', 'Thiết kế vỏ nhôm chắc chắn, màu sắc trang nhã.\r\nSử dụng lõi pin Polymer chất lượng cao, tăng khả năng dùng được lâu và an toàn.\r\nTrang bị thêm cổng ra/vào Type-C thích hợp cho các thiết bị có cổng kết nối Type-C.\r\nTương thích với nhiều thiết bị điện thoại, máy tính bảng,...', 3, 510000, 490000, 'loa', 'loa', '2020-12-05 05:06:10', 1, '2020-12-05 05:06:10', 1, 1),
(573, 45, 'Adapter chuyển đổi USB C 6 in 1', 'adapter-chuyen-doi-usb-c-6-in-1', 'adapter-chuyen-doi-usb-c-6-in-1-xmobile-ds109a-wb-600x600.jpg', 'Adapter chuyển đổi USB C 6 in 1 nhỏ gọn, tiện lợi, thay thế cho nhiều loại dây cáp, cổng chuyển đổi.\r\nKết nối tương thích với nhiều thiết bị cùng lúc nhờ 2 cổng USB 3.1, SD, Micro SD, USB Type-C và HDMI.\r\nCổng HDMI trình chiếu truy xuất dữ liệu 4K 30Hz cho ra âm thanh sống động, hình ảnh sắc nét.\r\nCổng USB C 60W Power Delivery cho phép sạc nhanh với nhiều thiết bị có các mức điện áp khác nhau.\r\nTương thích với các sản phẩm MacBook có cổng USB-C, Surface Pro, Laptop có cổng USB-C.', 1, 1000000, 990000, 'sac', 'sac', '2020-12-05 05:08:59', 1, '2020-12-05 05:08:59', 1, 1),
(574, 46, 'Tai nghe True Wireless Elite 75T', 'tai-nghe-true-wireless-elite-75t', 'tai.jpg', 'Tai nghe không dây tinh tế, đeo dễ dàng, dễ chịu.\r\nCông nghệ Bluetooth 5.0 kết nối mạnh mẽ đến 10 m.\r\nSử dụng 4 micro tăng cường khả năng đàm thoại và lọc tiếng ồn.\r\nThời gian sử dụng 7.5 giờ, 28 giờ khi sử dụng cùng hộp sạc.\r\nSạc nhanh 15 phút có thể sử dụng đến 60 phút.\r\nĐạt chuẩn chống nước, chống bụi IP55.\r\nĐiều chỉnh âm thanh theo sở thích qua ứng dụng Jabra Sound+.', 3, 5000000, 4990000, 'tai', 'tai', '2020-12-05 05:16:41', 1, '2020-12-09 09:21:31', 1, 1),
(575, 47, 'Loa Bluetooth JBL FLIP4 Đen', 'loa-bluetooth-jbl-flip4-den', 'loa-bluetooth-jbl-flip4blu-275620-105654-600x600.jpg', 'Loa JBL Flip 4 có trang bị công nghệ Bluetooth 4.2, cho khả năng kết nối ổn định trong khoảng cách 10 m.\r\nJBL Flip 4 có thể kết nối cùng lúc với 2 thiết bị qua Bluetooth.\r\nDung lượng lên đến 3.000 mAh, thời gian sử dụng liên tục lên đến 12 giờ, thời gian sạc 3.5 giờ.\r\nÂm thanh chân thực, sống động với chất lượng âm bass mạnh mẽ.\r\nCông nghệ JBL Connect có thể liên kết không dây với hơn 100 loa JBL Connect cùng nhau để tăng cường trải nghiệm nghe nhạc.\r\nTích hợp microphone với công nghệ SoundClear có khả năng ngăn tiếng ồn và tiếng vọng lại.\r\nKích hoạt và nói chuyện với Siri hoặc Google Now từ JBL Flip 4 chỉ bằng 1 phím ấn.\r\nTrang bị chuẩn chống nước IPX7 giúp bạn an tâm khi gặp mưa hoặc rơi xuống nước.\r\nJBL - Thương hiệu âm thanh nổi tiếng toàn cầu đến từ Mỹ.', 2, 3000000, 2790000, 'loa', 'loa', '2020-12-05 05:18:54', 1, '2020-12-09 10:01:55', 1, 1),
(577, 53, 'Apple Watch S6 LTE 40mm viền nhôm dây cao su', 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su', 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-ava-600x600.jpg', 'Kiểu dáng năng động, cá tính\r\nApple Watch S6 LTE 40mm viền nhôm dây cao su sở hữu màn hình 1.57 inch giúp hiển thị đầy đủ thông tin và hình ảnh sắc nét. Dây đeo được làm từ chất liệu cao su dẻo dai và êm ái, cho cảm giác dễ chịu khi mang. Thêm vào đó, mặt kính cường lực Sapphire giúp chống trầy, tăng độ bền cho thiết bị. Các đường nét được thiết kế tinh xảo làm nên sự đẳng cấp của Apple Watch.', 4, 15990000, 14990000, 'aw', 'aw', '2020-12-09 09:47:05', 1, '2020-12-09 09:47:05', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_slider`
--

CREATE TABLE `nts_slider` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã Slider',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên Slider',
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Liên kết',
  `position` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Vị trí',
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hình ảnh',
  `orders` int(10) UNSIGNED NOT NULL COMMENT 'Thứ tự',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_slider`
--

INSERT INTO `nts_slider` (`id`, `name`, `link`, `position`, `img`, `orders`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Khuyễn mãi hè 2020', 'http://domain.com/index.php?option=page&cat=khuyen-mai-he', 'slideshow', 'hero_1.jpg', 1, '2020-07-01 00:12:13', 1, '2020-07-01 00:12:13', 1, 1),
(2, 'Khuyễn mãi mùa khai giảng', 'http://domain.com/index.php?option=page&cat=khuyen-mai-mua-khai-giang', 'slideshow', '2.jpg', 1, '2020-07-01 00:12:13', 1, '2020-07-01 00:12:13', 1, 0),
(3, 'Khuyễn mãi giáng sinh', 'http://domain.com/index.php?option=page&cat=khuyen-giang-sinh', 'slideshow', '1.jpg', 1, '2020-07-01 00:12:13', 1, '2020-07-01 00:12:13', 1, 0),
(4, 'Khuyễn mãi Covid', 'http://domain.com/index.php?option=page&cat=khuyen-mai-covid', 'slideshow', '2.jpg', 1, '2020-07-01 00:12:13', 1, '2020-07-01 00:12:13', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_topic`
--

CREATE TABLE `nts_topic` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã chủ đề',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên chủ đề',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Slug tên chủ đề',
  `parentid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Mã cấp cha',
  `orders` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Sắp xếp',
  `metakey` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Từ khóa SEO',
  `metadesc` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mô tả SEO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_topic`
--

INSERT INTO `nts_topic` (`id`, `name`, `slug`, `parentid`, `orders`, `metakey`, `metadesc`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Tin tức', 'tin-tuc', 0, 1, 'Từ khóa SEO', 'Mô tả SEO', '2020-07-03 09:14:39', 1, '2020-07-03 09:14:39', 1, 1),
(2, 'Dịch vụ', 'dich-vu', 0, 2, 'Từ khóa SEO', 'Mô tả SEO', '2020-07-03 09:14:39', 1, '2020-12-04 09:57:43', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nts_user`
--

CREATE TABLE `nts_user` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Mã tài khoản',
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Họ và tên',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên đăng nhâp',
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email',
  `gender` tinyint(3) UNSIGNED NOT NULL COMMENT 'Giới tính',
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Điện thoại',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ',
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Hình',
  `access` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quyền truy cập',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `created_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người tạo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sửa',
  `updated_by` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Người sửa',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nts_user`
--

INSERT INTO `nts_user` (`id`, `fullname`, `username`, `password`, `email`, `gender`, `phone`, `address`, `img`, `access`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Quản trị', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin@gmail.com', 1, '0987654367', NULL, 'admin.jpg', 1, '2020-07-01 00:16:03', 1, '2020-07-01 00:16:03', 1, 1),
(2, 'Khách hàng', 'khachhang', '356a192b7913b04c54574d18c28d46e6395428ab', 'khachhang@gmail.com', 1, '0987654367', NULL, 'khachhang.jpg', 0, '2020-07-01 00:16:03', 1, '2020-07-01 00:16:03', 1, 1),
(3, 'Nguyen Thanh Sang', 'user', '356a192b7913b04c54574d18c28d46e6395428ab', 'khachhang@gmail.com', 1, '0987654367', NULL, 'khachhang.jpg', 0, '2020-07-01 00:16:03', 1, '2020-07-01 00:16:03', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nts_category`
--
ALTER TABLE `nts_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_contact`
--
ALTER TABLE `nts_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_menu`
--
ALTER TABLE `nts_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_order`
--
ALTER TABLE `nts_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_orderdetail`
--
ALTER TABLE `nts_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_page`
--
ALTER TABLE `nts_page`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_post`
--
ALTER TABLE `nts_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_product`
--
ALTER TABLE `nts_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_slider`
--
ALTER TABLE `nts_slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_topic`
--
ALTER TABLE `nts_topic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nts_user`
--
ALTER TABLE `nts_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nts_category`
--
ALTER TABLE `nts_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Loại', AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `nts_contact`
--
ALTER TABLE `nts_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã liên hệ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nts_menu`
--
ALTER TABLE `nts_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã Menu', AUTO_INCREMENT=10013;

--
-- AUTO_INCREMENT cho bảng `nts_order`
--
ALTER TABLE `nts_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nts_orderdetail`
--
ALTER TABLE `nts_orderdetail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã CT Đơn hàng', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `nts_page`
--
ALTER TABLE `nts_page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã bài viết', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `nts_post`
--
ALTER TABLE `nts_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã bài viết', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `nts_product`
--
ALTER TABLE `nts_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=578;

--
-- AUTO_INCREMENT cho bảng `nts_slider`
--
ALTER TABLE `nts_slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã Slider', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nts_topic`
--
ALTER TABLE `nts_topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã chủ đề', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nts_user`
--
ALTER TABLE `nts_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mã tài khoản', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
