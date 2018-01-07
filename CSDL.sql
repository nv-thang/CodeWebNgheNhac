-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2018 lúc 07:42 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mp3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihat`
--

CREATE TABLE `baihat` (
  `id` int(255) NOT NULL,
  `tenbaihat` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `casy` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theloai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duongdan` varchar(200) NOT NULL,
  `loibaihat` varchar(9999) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luotnghe` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `baihat`
--

INSERT INTO `baihat` (`id`, `tenbaihat`, `casy`, `tacgia`, `theloai`, `duongdan`, `loibaihat`, `luotnghe`) VALUES
(57, 'Kém Duyên', 'Rum, Nit, Masew', '', 'Việt Nam', 'nhac/Kem-Duyen-Rum-NIT-Masew.mp3', '', 2),
(55, 'Chạm Khẽ Tim Anh Một Chút Thôi', 'Noo Phước Thịnh', '', 'Việt Nam', 'nhac/Cham-Khe-Tim-Anh-Mot-Chut-Thoi-Noo-Phuoc-Thinh.mp3', '', 0),
(54, 'Túy Âm', 'Xesi', '', 'Việt Nam', 'nhac/TuyAm-XesiMasewNhatNguyen-5132651.mp3', '', 1),
(52, 'Ánh Nắng Của Anh', 'Đức Phúc', '', 'Việt Nam', 'nhac/Anh-Nang-Cua-Anh-Cho-Em-Den-Ngay-Mai-OST-Duc-Phuc.mp3', '', 5),
(56, 'Sống Xa Anh Chẳng Dễ Dàng', 'Bảo Anh', '', 'Việt Nam', 'nhac/Song-Xa-Anh-Chang-De-Dang-Bao-Anh.mp3', '', 0),
(58, 'Phía Sau Một Cô Gái', 'Soobin Hoàng Sơn', '', 'Việt Nam', 'nhac/PhiaSauMotCoGai-SoobinHoangSon-4632323.mp3', '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihathot`
--

CREATE TABLE `baihathot` (
  `id` int(255) NOT NULL,
  `tenbaihat` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `casy` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theloai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duongdan` varchar(200) NOT NULL,
  `loibaihat` varchar(9999) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luotnghe` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `baihathot`
--

INSERT INTO `baihathot` (`id`, `tenbaihat`, `casy`, `tacgia`, `theloai`, `duongdan`, `loibaihat`, `luotnghe`) VALUES
(39, 'Ánh Nắng Của Anh', 'Đức Phúc', '', 'Nhạc Quốc Tế', 'nhac/Anh-Nang-Cua-Anh-Cho-Em-Den-Ngay-Mai-OST-Duc-Phuc.mp3', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baihatmoi`
--

CREATE TABLE `baihatmoi` (
  `id` int(255) NOT NULL,
  `tenbaihat` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `casy` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `theloai` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duongdan` varchar(200) NOT NULL,
  `loibaihat` varchar(9999) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `luotnghe` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangquyen`
--

CREATE TABLE `bangquyen` (
  `id` int(11) NOT NULL,
  `noidung` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `casy`
--

CREATE TABLE `casy` (
  `id` int(255) NOT NULL,
  `casy` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `casy`
--

INSERT INTO `casy` (`id`, `casy`) VALUES
(80, 'Soobin Hoàng Sơn'),
(79, 'Bảo Anh'),
(81, 'Noo Phước Thịnh'),
(82, 'Đức Phúc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuchay`
--

CREATE TABLE `chuchay` (
  `id` int(11) NOT NULL,
  `noidung` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chuchay`
--

INSERT INTO `chuchay` (`id`, `noidung`) VALUES
(1, 'Web nghe nhạc trực tuyền Online Mp3 | Cr- Thắng | Crthang.blogspot.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

CREATE TABLE `chude` (
  `id` int(11) NOT NULL,
  `chude` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chude`
--

INSERT INTO `chude` (`id`, `chude`) VALUES
(10, 'Nhạc Hot Việt'),
(11, 'Nhạc Chờ Hot'),
(12, 'Nhạc Việt Mới'),
(13, 'Nhạc Hot Rap Việt'),
(15, 'Hôm Nay Nghe Gì? '),
(16, 'Love Songs'),
(17, 'Nhạc Sàn'),
(18, 'Nhạc Giáng Sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `id` int(10) NOT NULL,
  `noidung` varchar(9999) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `footer`
--

INSERT INTO `footer` (`id`, `noidung`) VALUES
(1, '<h1 style=\"font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; text-align: center;\"><hr></h1><h3 style=\"font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; text-align: center;\"><br></h3><blockquote style=\"margin: 0px 0px 0px 40px; border: none; padding: 0px;\"><h1 style=\"font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; text-align: center;\"></h1><h4 style=\"font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; text-align: center;\"><font color=\"#ff0000\" size=\"5\" face=\"Courier New\"><u>Cr-Thắng</u></font></h4><div style=\"font-family: Arial, Verdana; text-align: center;\"><span style=\"background-color: rgb(255, 255, 255);\"><font color=\"#ff0000\" style=\"\" size=\"6\">Crthang.blogspot.com</font></span></div><div style=\"font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal;\"><font color=\"#ff0000\"><u><br></u></font></div><div style=\"font-size: 10pt; text-align: center;\"><font color=\"#ff0000\" style=\"\"><b style=\"font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal;\"><u style=\"\">Liên hệ Facebook:</u></b><font style=\"\"><span style=\"font-size: 10pt;\">&nbsp;</span></font><span style=\"font-size: 13.3333px;\">https://www.facebook.com/crthang1409</span><b style=\"font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal;\">&nbsp;</b><u style=\"font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: bold;\">Điện Thoại:</u> <font style=\"\"><span style=\"font-size: 10pt;\">0963638962</span></font></font></div></blockquote><hr style=\"font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant: normal; font-weight: normal; line-height: normal;\">');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `noidung` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `logo`
--

INSERT INTO `logo` (`id`, `noidung`) VALUES
(4, 'images/logo/logo.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luot`
--

CREATE TABLE `luot` (
  `luot` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `luot`
--

INSERT INTO `luot` (`luot`) VALUES
(1529);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(255) NOT NULL,
  `tinhtrang` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `tinhtrang`) VALUES
(1, 'OK'),
(2, 'NO');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `noidung` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `noidung`) VALUES
(17, 'Nhạc Quốc Tế'),
(16, 'Việt Nam'),
(19, 'Âu Mỹ'),
(20, 'Hàn Quốc'),
(21, 'Rap Việt'),
(22, 'Cách Mạng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timelog`
--

CREATE TABLE `timelog` (
  `id` int(255) NOT NULL,
  `time` date NOT NULL,
  `day` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'OK',
  `gioitinh` varchar(4) NOT NULL,
  `ngaysinh` varchar(30) NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(255) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `status`, `gioitinh`, `ngaysinh`, `diachi`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'Phát Nguyễn', 'OK', '', '', 'RAH', 'phatvalong@gmail.com', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_online`
--

CREATE TABLE `user_online` (
  `session` varchar(99) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user_online`
--

INSERT INTO `user_online` (`session`, `time`) VALUES
('e421dv1hscb0i4h8t7aaaphjmo', '1515298406');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baihat`
--
ALTER TABLE `baihat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baihathot`
--
ALTER TABLE `baihathot`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baihatmoi`
--
ALTER TABLE `baihatmoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bangquyen`
--
ALTER TABLE `bangquyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `casy`
--
ALTER TABLE `casy`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chuchay`
--
ALTER TABLE `chuchay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baihat`
--
ALTER TABLE `baihat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT cho bảng `baihathot`
--
ALTER TABLE `baihathot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT cho bảng `baihatmoi`
--
ALTER TABLE `baihatmoi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT cho bảng `bangquyen`
--
ALTER TABLE `bangquyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `casy`
--
ALTER TABLE `casy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT cho bảng `chude`
--
ALTER TABLE `chude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
