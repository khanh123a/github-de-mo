-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2020 lúc 05:00 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address_adm` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `image_adm` varchar(100) DEFAULT NULL,
  `create_at_adm` timestamp NULL DEFAULT NULL,
  `update_at_adm` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address_adm`, `email`, `password`, `phone`, `status`, `level`, `image_adm`, `create_at_adm`, `update_at_adm`) VALUES
(1, 'Đoàn Đình Khánh', 'Hưng Yên', 'khanh041506@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0779235213', 1, 1, NULL, NULL, '2020-10-27 18:13:45'),
(11, 'Dương Minh Tiến', 'Hà Nội', 'idoltien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0', 1, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(1) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `update_at`) VALUES
(2, 'Tai nghe', 'tai-nghe', NULL, NULL, 0, 1, '2020-10-26 03:29:22', '2020-11-09 08:06:47'),
(3, 'Kính cường lực', 'kinh-cuong-luc', NULL, NULL, 1, 1, '2020-10-26 13:31:00', '2020-11-04 08:06:47'),
(4, 'Dây sạc', 'day-sac', NULL, NULL, 1, 1, '2020-10-26 13:52:34', '2020-11-04 07:32:58'),
(5, 'Giá đỡ điện thoại', 'gia-do-dien-thoai', NULL, NULL, 1, 1, '2020-10-26 13:56:06', '2020-10-28 16:13:43'),
(17, 'ốp điện thoại', 'op-dien-thoai', NULL, NULL, 1, 1, '2020-10-27 07:18:09', '2020-11-03 18:10:19'),
(22, 'Pin dự phòng', 'pin-du-phong', NULL, NULL, 0, 1, '2020-11-03 18:10:50', '2020-11-03 18:10:50'),
(23, 'Tai nghe Bluetooth', 'tai-nghe-bluetooth', NULL, NULL, 0, 1, '2020-11-03 18:11:22', '2020-11-03 18:11:22'),
(24, 'Phụ kiện khác', 'phu-kien-khac', NULL, NULL, 1, 1, '2020-11-04 08:13:52', '2020-11-04 08:16:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) NOT NULL,
  `amount` int(15) DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `user_name` varchar(100) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `amount`, `users_id`, `status`, `user_name`, `user_address`, `note`, `created_at`, `update_at`) VALUES
(42, 85800, 61, 1, NULL, NULL, '', '2020-11-06 18:33:02', '2020-11-06 18:34:01'),
(43, 171600, 61, 1, NULL, NULL, '', '2020-11-06 18:35:17', '2020-11-06 18:35:41'),
(44, 242550, 61, 0, NULL, NULL, 'Giao hàng nhẹ nhàng vào thứ 7', '2020-11-06 19:16:35', '2020-11-06 19:16:35'),
(45, 242550, 61, 1, NULL, NULL, 'Giao hàng nhẹ nhàng vào thứ 7', '2020-11-06 19:18:35', '2020-11-06 19:29:24'),
(46, 131450, 61, 1, NULL, NULL, 'Giao hàng nhẹ nhàng vào thứ 7 nhé', '2020-11-06 19:30:14', '2020-11-06 19:35:04'),
(47, 463837, 61, 1, NULL, NULL, 'Mình muốn giao đến số nhà 43 ở Nam từ niêm hà nội', '2020-11-06 20:16:34', '2020-11-06 20:20:03'),
(48, 154440, 61, 1, NULL, NULL, 'Giao nhanh giúp mình nhé', '2020-11-06 20:21:08', '2020-11-06 20:23:52'),
(49, 125950, 62, 1, NULL, NULL, '', '2020-11-07 09:33:25', '2020-11-07 09:47:13'),
(50, 73700, 61, 1, NULL, NULL, 'Mình muốn giao đến số nhà 43 ở Nam từ niêm hà nội', '2020-11-09 07:56:10', '2020-11-09 07:57:17'),
(51, 0, 61, 0, NULL, NULL, '', '2020-11-11 08:54:49', '2020-11-11 08:54:49'),
(52, 0, 61, 0, NULL, NULL, '', '2020-11-11 08:55:19', '2020-11-11 08:55:19'),
(53, 703450, 61, 1, NULL, NULL, 'Mình muốn giao đến số nhà 43 ở Nam từ niêm hà nội', '2020-11-11 15:09:57', '2020-11-11 15:10:48'),
(54, 1210000, 61, 1, 'Vũ Văn Thuận', 'Số 132, Nguyên Xá, Nam từ Niêm, Hà Nội', 'Giao hàng nhẹ nhàng vào thứ 7 nhé', '2020-11-11 15:33:39', '2020-11-11 15:33:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `hoadon_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `hoadon_id`, `product_id`, `qty`, `price`, `created_at`, `update_at`) VALUES
(79, 42, 1, 1, 0, '2020-11-06 18:33:02', '2020-11-06 18:33:02'),
(80, 43, 1, 2, 0, '2020-11-06 18:35:17', '2020-11-06 18:35:17'),
(81, 45, 24, 1, 0, '2020-11-06 19:18:35', '2020-11-06 19:18:35'),
(82, 45, 25, 1, 0, '2020-11-06 19:18:35', '2020-11-06 19:18:35'),
(83, 46, 24, 1, 19500, '2020-11-06 19:30:14', '2020-11-06 19:30:14'),
(84, 46, 11, 1, 100000, '2020-11-06 19:30:14', '2020-11-06 19:30:14'),
(85, 47, 25, 2, 201000, '2020-11-06 20:16:34', '2020-11-06 20:16:34'),
(86, 47, 24, 1, 19500, '2020-11-06 20:16:34', '2020-11-06 20:16:34'),
(87, 47, 20, 1, 170, '2020-11-06 20:16:34', '2020-11-06 20:16:34'),
(88, 48, 15, 1, 120000, '2020-11-06 20:21:08', '2020-11-06 20:21:08'),
(89, 48, 22, 1, 20400, '2020-11-06 20:21:08', '2020-11-06 20:21:08'),
(90, 49, 3, 2, 47500, '2020-11-07 09:33:25', '2020-11-07 09:33:25'),
(91, 49, 24, 1, 19500, '2020-11-07 09:33:25', '2020-11-07 09:33:25'),
(92, 50, 24, 1, 19500, '2020-11-09 07:56:10', '2020-11-09 07:56:10'),
(93, 50, 3, 1, 47500, '2020-11-09 07:56:11', '2020-11-09 07:56:11'),
(95, 53, 24, 6, 19500, '2020-11-11 15:09:58', '2020-11-11 15:09:58'),
(96, 53, 3, 11, 47500, '2020-11-11 15:09:58', '2020-11-11 15:09:58'),
(97, 54, 25, 5, 201000, '2020-11-11 15:33:39', '2020-11-11 15:33:39'),
(98, 54, 3, 2, 47500, '2020-11-11 15:33:39', '2020-11-11 15:33:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT 0,
  `sale` int(11) DEFAULT 0,
  `thunbar` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `like_pro` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `hot` int(11) DEFAULT 0,
  `pay` int(5) DEFAULT 0,
  `created_pro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_pro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `number`, `sale`, `thunbar`, `category_id`, `mota`, `like_pro`, `view`, `hot`, `pay`, `created_pro`, `update_pro`) VALUES
(1, 'Dán kính cường lực Note 10 Plus Nillkin Cp+ Max Full màn hình', 'dan-kinh-cuong-luc-note-10-plus-nillkin-cp-max-full-man-hinh', 100000, 19, 22, 'Dán kính cường lực Note 10 Plus Nillkin Cp+ Max Full màn hình.jpg', 3, 'Kính rất đẹp    ', 0, 0, 0, 3, '2020-11-06 18:35:41', '2020-11-06 18:35:41'),
(3, 'Ốp lưng cho iphone', 'op-lung-cho-iphone', 50000, 83, 5, 'Ốp da cao cấp cho iphone Xs.jpg', 17, 'Make in China  ', 0, 0, 0, 19, '2020-11-11 15:33:46', '2020-11-11 15:33:46'),
(11, 'Kính chống sước SamSung S8', 'kinh-chong-suoc-samsung-s8', 200000, 5, 50, 'Kính cường lực KingKong hiệu VTZ cho iPhone.jpg', 3, ' Kính cường lực rất tốt  ', 0, 0, 0, 1, '2020-11-06 19:35:05', '2020-11-06 19:35:05'),
(12, 'Kính cường lực KinhKong cho SamSung note 8', 'kinh-cuong-luc-kinhkong-cho-samsung-note-8', 100000, 200, 0, 'Ốp lưng kính viền kim loại Iphone.jpg', 3, ' Sản Phẩm chính hãng', 0, 0, 0, 0, '2020-10-28 13:34:14', '2020-10-28 13:34:14'),
(15, 'Bao da tiện lợi bảo vệ điện thoại', 'bao-da-tien-loi-bao-ve-dien-thoai', 120000, 54, 0, 'Bao da tiện lợi bảo vệ điện thoại(1).jpg', 17, ' Bao da tiện lợi bảo vệ điện thoại Iphone', 0, 0, 0, 1, '2020-11-06 20:23:52', '2020-11-06 20:23:52'),
(17, 'Cổng Sạc Kim Loại Yuqing Chống Bụi Cho Apple Iphone', 'cong-sac-kim-loai-yuqing-chong-bui-cho-apple-iphone', 79000, 200, 20, 'Cổng Sạc Kim Loại Yuqing Chống Bụi Cho Apple Iphone(1).jpg', 4, ' Cổng Sạc Kim Loại Yuqing Chống Bụi Cho Apple Iphone', 0, 0, 0, 0, '2020-11-04 08:08:36', '2020-11-04 08:08:36'),
(18, 'Đầu gắn cáp chia cổng sạc và tai nghe 2 trong 1 cho iPhone', 'dau-gan-cap-chia-cong-sac-va-tai-nghe-2-trong-1-cho-iphone', 200000, 55, 20, 'Đầu gắn cáp chia cổng sạc và tai nghe 2 trong 1 cho iPhone(1).jpg', 4, ' Đầu gắn cáp chia cổng sạc và tai nghe 2 trong 1 cho iPhone(1).jpg    ', 0, 0, 0, 0, '2020-11-04 08:10:37', '2020-11-04 08:10:37'),
(19, 'Dây Cáp Sạc Dữ Liệu Usb SUNTAIHO Dành Cho iPhone', 'day-cap-sac-du-lieu-usb-suntaiho-danh-cho-iphone', 50000, 125, 20, 'Dây Cáp Sạc Dữ Liệu Usb SUNTAIHO Dành Cho iPhone(1).jpg', 4, ' Dây Cáp Sạc Dữ Liệu Usb SUNTAIHO Dành Cho iPhone 11 và 12 Pro max', 0, 0, 0, 0, '2020-11-04 08:11:55', '2020-11-04 08:11:55'),
(20, 'Dây Silicone Khóa Kim Loại Cho Đồng Hồ Apple 4 3 2 38mm 42mm', 'day-silicone-khoa-kim-loai-cho-dong-ho-apple-4-3-2-38mm-42mm', 200, 21, 15, 'Dây Silicone Khóa Kim Loại Cho Đồng Hồ Apple 4 3 2 38mm 42mm(1).jpg', 24, ' Dây Silicone Khóa Kim Loại Cho Đồng Hồ Apple 4 3 2 38mm 42mm\r\nGiảm giá cực sốc', 0, 0, 0, 1, '2020-11-06 20:20:04', '2020-11-06 20:20:04'),
(21, 'EPOCH Túi Chống Nước Cho Điện Thoại', 'epoch-tui-chong-nuoc-cho-dien-thoai', 55000, 30, 14, 'EPOCH Túi Chống Nước Cho Điện Thoại(1).jpg', 24, ' EPOCH Túi Chống Nước Cho Điện Thoại\r\nCửa hàng Apple', 0, 0, 0, 0, '2020-11-04 08:15:52', '2020-11-04 08:15:52'),
(22, 'Film dán hydrogel mềm bảo vệ màn hình cho iPhone', 'film-dan-hydrogel-mem-bao-ve-man-hinh-cho-iphone', 25500, 129, 20, 'Film dán hydrogel mềm bảo vệ màn hình cho iPhone(2).jpg', 17, ' Film dán hydrogel mềm bảo vệ màn hình cho iPhone', 0, 0, 0, 1, '2020-11-06 20:23:52', '2020-11-06 20:23:52'),
(23, 'Gậy Chụp Ảnh Selfie Có Giá Đỡ 3 Chân Cho Điện Thoại', 'gay-chup-anh-selfie-co-gia-do-3-chan-cho-dien-thoai', 99000, 125, 20, 'Gậy Chụp Ảnh Selfie Có Giá Đỡ 3 Chân Cho Điện Thoại(6).jpg', 24, ' Gậy Chụp Ảnh Selfie Có Giá Đỡ 3 Chân Cho Điện Thoại \r\n', 0, 0, 0, 0, '2020-11-04 08:21:46', '2020-11-04 08:21:46'),
(24, 'Giá đỡ điện thoại 360 độ', 'gia-do-dien-thoai-360-do', 25000, 1, 22, 'Giá đỡ điện thoại 360 độ(1).jpg', 5, ' Giá đỡ điện thoại 360 độ kẹp phía sau điện thoại!', 0, 0, 0, 11, '2020-11-11 15:10:48', '2020-11-11 15:10:48'),
(25, 'Giá đỡ điện thoại gắn xe hơi', 'gia-do-dien-thoai-gan-xe-hoi', 300000, 25, 33, 'Giá đỡ điện thoại gắn xe hơi(2).jpg', 5, ' Giá đỡ điện thoại gắn xe hơi ', 0, 0, 0, 8, '2020-11-11 15:33:46', '2020-11-11 15:33:46'),
(26, 'Giá Đỡ Kim Loại Cho IPhone IPad(1)', 'gia-do-kim-loai-cho-iphone-ipad1', 50000, 60, 0, 'Giá Đỡ Kim Loại Cho IPhone IPad(1).jpg', 5, ' Giá Đỡ Kim Loại Cho IPhone IPad(1)', 0, 0, 0, 0, '2020-11-04 08:25:53', '2020-11-04 08:25:53'),
(27, 'Hộp Đựng Bảo Vệ Tai Nghe Airpods 1 _ 2 Bằng Silicon Hình Trái Tim 3d Có Móc', 'hop-dung-bao-ve-tai-nghe-airpods-1-2-bang-silicon-hinh-trai-tim-3d-co-moc', 50000, 22, 5, 'Hộp Đựng Bảo Vệ Tai Nghe Airpods 1 _ 2 Bằng Silicon Hình Trái Tim 3d Có Móc(1).jpg', 24, ' Hộp Đựng Bảo Vệ Tai Nghe Airpods 1 _ 2 Bằng Silicon Hình Trái Tim 3d Có Móc', 0, 0, 0, 0, '2020-11-04 08:26:36', '2020-11-04 08:26:36'),
(28, 'Hộp đựng tai nghe', 'hop-dung-tai-nghe', 50000, 121, 5, 'Hộp Đựng Bảo Vệ Tai Nghe Airpods 1 _ 2 Bằng Silicon Hình Trái Tim 3d Có Móc(3).jpg', 5, ' Hình trái tim', 0, 0, 0, 0, '2020-11-05 07:06:20', '2020-11-05 07:06:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'tu tang\r\n',
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `anh` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` varchar(50) DEFAULT NULL COMMENT 'xem xet viec khoa tk',
  `create_at_user` timestamp NULL DEFAULT NULL,
  `update_at_user` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `anh`, `status`, `token`, `create_at_user`, `update_at_user`) VALUES
(59, 'Đoàn Đình Khánh', 'khanh0415064@gmail.com', '0779235213', '1', 'fcea920f7412b5da7be0cf42b8c93759', '', 1, NULL, NULL, NULL),
(61, 'Đoàn Đình Khánh', 'khanh041506@gmail.com', '0779235213', 'Số 132, Nguyên Xá, Nam từ Niêm, Hà Nội', 'e10adc3949ba59abbe56e057f20f883e', 'tải xuống.jpg', 1, NULL, NULL, '2020-11-11 07:14:57'),
(62, 'Phạm Thanh Hương', 'khanh041506@gmail.com2', '01655525359', 'Quảng Lãng, Ân thi, Hưng Yên', 'e10adc3949ba59abbe56e057f20f883e', 'phạm thanh hương.jpg', 1, NULL, NULL, '2020-11-07 09:44:56');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoadon_id` (`hoadon_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`anh`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'tu tang\r\n', AUTO_INCREMENT=63;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`hoadon_id`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
