-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2022 lúc 06:10 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pccc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Trung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(1, 'BỘT HÀN HOÁ NHIỆT'),
(3, 'VÒI, LĂNG CHỮA CHÁY'),
(4, 'BÌNH CHỮA CHÁY NƯỚC'),
(5, 'BÌNH CHỮA CHÁY BỘT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `donhang_soluong` int(11) NOT NULL,
  `donhang_madonhang` varchar(50) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `donhang_ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `donhang_tinhtrang` int(11) NOT NULL,
  `donhang_huydon` int(11) NOT NULL DEFAULT 0,
  `donhang_ghichu` text NOT NULL,
  `donhang_diachi` varchar(200) NOT NULL,
  `donhang_giaohang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `donhang_soluong`, `donhang_madonhang`, `khachhang_id`, `donhang_ngaythang`, `donhang_tinhtrang`, `donhang_huydon`, `donhang_ghichu`, `donhang_diachi`, `donhang_giaohang`) VALUES
(74, 65, 1, '8084', 33, '2022-06-03 16:32:20', 0, 1, 'giao nhanh nhé', '18E1 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 0),
(75, 51, 1, '8084', 33, '2022-06-03 16:32:20', 0, 1, 'giao nhanh nhé', '18E1 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 0),
(76, 54, 1, '9470', 33, '2022-06-03 16:29:48', 0, 2, 'giao nha', ' TP Thủ Đức', 0),
(77, 66, 1, '4099', 33, '2022-06-03 16:35:20', 1, 0, '', ' TP Thủ Đức', 0),
(78, 51, 1, '3537', 33, '2022-06-03 16:45:00', 0, 0, '', ' TP Thủ Đức', 0),
(79, 64, 1, '8174', 33, '2022-06-03 16:45:09', 0, 0, '', ' TP Thủ Đức', 0),
(80, 51, 1, '1247', 33, '2022-06-03 16:46:42', 0, 0, '', ' TP Thủ Đức', 1),
(81, 65, 1, '9542', 33, '2022-06-03 16:47:02', 0, 0, '', ' TP Thủ Đức', 0),
(82, 51, 3, '1812', 33, '2022-06-03 16:53:48', 0, 0, '', ' TP Thủ Đức', 0),
(83, 65, 1, '4219', 34, '2022-06-03 16:57:34', 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(84, 54, 1, '4219', 34, '2022-06-03 16:57:34', 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(85, 61, 1, '4219', 34, '2022-06-03 16:57:34', 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(86, 49, 3, '4219', 34, '2022-06-03 16:57:34', 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(87, 65, 1, '3203', 34, '2022-06-03 16:58:10', 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giaodich_soluong` int(11) NOT NULL,
  `giaodich_magiaodich` varchar(50) NOT NULL,
  `giaodich_ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `giaodich_tinhtrang` int(11) NOT NULL DEFAULT 0,
  `giaodich_huydon` int(11) NOT NULL DEFAULT 0,
  `giaodich_ghichu` text NOT NULL,
  `giaodich_diachi` varchar(200) NOT NULL,
  `giaodich_giaohang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `giaodich_soluong`, `giaodich_magiaodich`, `giaodich_ngaythang`, `khachhang_id`, `giaodich_tinhtrang`, `giaodich_huydon`, `giaodich_ghichu`, `giaodich_diachi`, `giaodich_giaohang`) VALUES
(62, 65, 1, '8084', '2022-06-03 16:32:20', 33, 0, 1, 'giao nhanh nhé', '18E1 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 0),
(63, 51, 1, '8084', '2022-06-03 16:32:20', 33, 0, 1, 'giao nhanh nhé', '18E1 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 0),
(64, 54, 1, '9470', '2022-06-03 16:29:48', 33, 0, 2, 'giao nha', ' TP Thủ Đức', 0),
(65, 66, 1, '4099', '2022-06-03 16:35:20', 33, 1, 0, '', ' TP Thủ Đức', 0),
(66, 51, 1, '3537', '2022-06-03 16:45:00', 33, 0, 0, '', ' TP Thủ Đức', 0),
(67, 64, 1, '8174', '2022-06-03 16:45:09', 33, 0, 0, '', ' TP Thủ Đức', 0),
(68, 51, 1, '1247', '2022-06-03 16:46:42', 33, 0, 0, '', ' TP Thủ Đức', 1),
(69, 65, 1, '9542', '2022-06-03 16:47:02', 33, 0, 0, '', ' TP Thủ Đức', 0),
(70, 51, 3, '1812', '2022-06-03 16:53:48', 33, 0, 0, '', ' TP Thủ Đức', 0),
(71, 65, 1, '4219', '2022-06-03 16:57:34', 34, 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(72, 54, 1, '4219', '2022-06-03 16:57:34', 34, 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(73, 61, 1, '4219', '2022-06-03 16:57:34', 34, 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(74, 49, 3, '4219', '2022-06-03 16:57:34', 34, 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, Phường Phước Long B, TP Thủ Đức', 1),
(75, 65, 1, '3203', '2022-06-03 16:58:10', 34, 0, 0, 'hihi', '18/36 Đường Tăng Nhơn Phú, ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `giohang_tensp` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giohang_images` varchar(100) NOT NULL,
  `giohang_soluong` int(11) NOT NULL,
  `giohang_gia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`giohang_id`, `giohang_tensp`, `sanpham_id`, `giohang_images`, `giohang_soluong`, `giohang_gia`) VALUES
(109, 'BỘT HÀN HOÁ NHIỆT', 51, 'sp3.jpg', 4, '300000'),
(110, 'BÌNH CHỮA CHÁY 24kg C02 – MT24', 59, '1_916caf0e63eb4578a4a100fc4d2beef7_master.jpg', 1, '700000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `khachhang_ten` varchar(100) NOT NULL,
  `khachhang_sdt` varchar(50) NOT NULL,
  `khachhang_diachi` varchar(200) NOT NULL,
  `khachhang_email` varchar(150) NOT NULL,
  `khachhang_password` varchar(100) NOT NULL,
  `khachhang_ghichu` text NOT NULL,
  `khachhang_giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `khachhang_ten`, `khachhang_sdt`, `khachhang_diachi`, `khachhang_email`, `khachhang_password`, `khachhang_ghichu`, `khachhang_giaohang`) VALUES
(33, 'Nguyễn Bảo Trung', '0352240547', ' TP Thủ Đức', 'nbtrungg@gmail.com', '123', '', 0),
(34, 'Nguyễn Bảo', '3123123', '18/36 Đường Tăng Nhơn Phú, ', 'bao@gmail.com', '123', 'hihi', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_images` varchar(100) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_baoquan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `cartegory_id`, `sanpham_name`, `sanpham_gia`, `sanpham_active`, `sanpham_soluong`, `sanpham_images`, `sanpham_chitiet`, `sanpham_baoquan`) VALUES
(45, 1, 'BỘT HÀN HOÁ NHIỆT GOLDWELD (lọ 90g)', '450000', 0, 10, 'sp4.jpg', '1. Xuất xứ: Việt Nam \r\n2. Bảo hành: 12 tháng \r\n3. Quy cách đóng gói: 10 lọ/ hộp \r\n4. Ghi chú: \r\n*  Có sẵn loại có thuốc mồi riêng (dễ hàn, dễ cháy) \r\n*  Thuốc mồi hàn nằm trong phần nắp đỏ của mỗi lọ thuốc hàn', '-       Luôn để đóng kín trong hộp của nhà sản xuất, hạn chế mở ra mở vào lắp hộp thuốc hàn\r\n\r\n-        Để nơi khô ráo, thoáng mát và tránh những nơi ẩm ướt, gần lửa, điện…. để tránh làm thuốc hàn bị ẩm dẫn đến khó hàn. Vì là thuốc hàn có bột mồi bắt lửa dễ đến cháy nổ nên cần tránh xa những nơi nhiệt độ cao, lửa, điện….\r\n\r\n-       Trong quá trình vận chuyển nên vận chuyển nhẹ nhàng không nên va đập nhiều làm thuốc hàn, thuốc mồi bị trộn lẫn (đối với thuốc hàn, bột mồi bắt lửa dùng chung một lọ)\r\n\r\n-      Khi sử dụng, dùng đến đâu mang ra đến đó còn lại nên để trong kho thoáng mát, khô ráo (có thể dùng một vài viên chống ẩm để vào mỗi thùng đựng thuốc hàn)\r\n\r\n-      Nếu thuốc hàn bị ẩm ướt trong quá trình cất giữ có thể dùng các biện pháp hong khô ngoài trời dưới ánh nắng dịu…'),
(46, 1, 'BỘT HÀN HOÁ NHIỆT GREEN WELD (lọ 115g)', '750000', 0, 10, 'af8e92208521dbc8ca9b8d44f93abec1.jfif', '1. Xuất xứ: Việt Nam \r\n2. Bảo hành: 12 tháng \r\n3. Quy cách đóng gói: 10 lọ/ hộp \r\n4. Ghi chú: \r\n*  Có sẵn loại có thuốc mồi riêng (dễ hàn, dễ cháy) \r\n*  Thuốc mồi hàn nằm trong phần nắp đỏ của mỗi lọ thuốc hàn', '-       Luôn để đóng kín trong hộp của nhà sản xuất, hạn chế mở ra mở vào lắp hộp thuốc hàn\r\n\r\n-        Để nơi khô ráo, thoáng mát và tránh những nơi ẩm ướt, gần lửa, điện…. để tránh làm thuốc hàn bị ẩm dẫn đến khó hàn. Vì là thuốc hàn có bột mồi bắt lửa dễ đến cháy nổ nên cần tránh xa những nơi nhiệt độ cao, lửa, điện….\r\n\r\n-       Trong quá trình vận chuyển nên vận chuyển nhẹ nhàng không nên va đập nhiều làm thuốc hàn, thuốc mồi bị trộn lẫn (đối với thuốc hàn, bột mồi bắt lửa dùng chung một lọ)\r\n\r\n-      Khi sử dụng, dùng đến đâu mang ra đến đó còn lại nên để trong kho thoáng mát, khô ráo (có thể dùng một vài viên chống ẩm để vào mỗi thùng đựng thuốc hàn)\r\n\r\n-      Nếu thuốc hàn bị ẩm ướt trong quá trình cất giữ có thể dùng các biện pháp hong khô ngoài trời dưới ánh nắng dịu…'),
(47, 1, 'BỘT HÀN HOÁ NHIỆT LEE WELDS (lọ 90g)', '500000', 0, 10, 'admin280320103358.jfif', '1. Xuất xứ: Việt Nam \r\n2. Bảo hành: 12 tháng \r\n3. Quy cách đóng gói: 10 lọ/ hộp \r\n4. Ghi chú: \r\n*  Có sẵn loại có thuốc mồi riêng (dễ hàn, dễ cháy) \r\n*  Thuốc mồi hàn nằm trong phần nắp đỏ của mỗi lọ thuốc hàn', '-       Luôn để đóng kín trong hộp của nhà sản xuất, hạn chế mở ra mở vào lắp hộp thuốc hàn\r\n\r\n-        Để nơi khô ráo, thoáng mát và tránh những nơi ẩm ướt, gần lửa, điện…. để tránh làm thuốc hàn bị ẩm dẫn đến khó hàn. Vì là thuốc hàn có bột mồi bắt lửa dễ đến cháy nổ nên cần tránh xa những nơi nhiệt độ cao, lửa, điện….\r\n\r\n-       Trong quá trình vận chuyển nên vận chuyển nhẹ nhàng không nên va đập nhiều làm thuốc hàn, thuốc mồi bị trộn lẫn (đối với thuốc hàn, bột mồi bắt lửa dùng chung một lọ)\r\n\r\n-      Khi sử dụng, dùng đến đâu mang ra đến đó còn lại nên để trong kho thoáng mát, khô ráo (có thể dùng một vài viên chống ẩm để vào mỗi thùng đựng thuốc hàn)\r\n\r\n-      Nếu thuốc hàn bị ẩm ướt trong quá trình cất giữ có thể dùng các biện pháp hong khô ngoài trời dưới ánh nắng dịu…'),
(48, 1, 'BỘT HÀN HOÁ NHIỆT CROWEL (lọ 115g)', '650000', 0, 10, 'sp7.jpg', '1. Xuất xứ: Việt Nam \r\n2. Bảo hành: 12 tháng \r\n3. Quy cách đóng gói: 10 lọ/ hộp \r\n4. Ghi chú: \r\n*  Có sẵn loại có thuốc mồi riêng (dễ hàn, dễ cháy) \r\n*  Thuốc mồi hàn nằm trong phần nắp đỏ của mỗi lọ thuốc hàn', '-       Luôn để đóng kín trong hộp của nhà sản xuất, hạn chế mở ra mở vào lắp hộp thuốc hàn\r\n\r\n-        Để nơi khô ráo, thoáng mát và tránh những nơi ẩm ướt, gần lửa, điện…. để tránh làm thuốc hàn bị ẩm dẫn đến khó hàn. Vì là thuốc hàn có bột mồi bắt lửa dễ đến cháy nổ nên cần tránh xa những nơi nhiệt độ cao, lửa, điện….\r\n\r\n-       Trong quá trình vận chuyển nên vận chuyển nhẹ nhàng không nên va đập nhiều làm thuốc hàn, thuốc mồi bị trộn lẫn (đối với thuốc hàn, bột mồi bắt lửa dùng chung một lọ)\r\n\r\n-      Khi sử dụng, dùng đến đâu mang ra đến đó còn lại nên để trong kho thoáng mát, khô ráo (có thể dùng một vài viên chống ẩm để vào mỗi thùng đựng thuốc hàn)\r\n\r\n-      Nếu thuốc hàn bị ẩm ướt trong quá trình cất giữ có thể dùng các biện pháp hong khô ngoài trời dưới ánh nắng dịu…'),
(49, 1, 'BỘT HÀN HOÁ NHIỆT (lọ 90g)', '400000', 0, 10, 'sp5.jpg', '1. Xuất xứ: Việt Nam \r\n2. Bảo hành: 12 tháng \r\n3. Quy cách đóng gói: 10 lọ/ hộp \r\n4. Ghi chú: \r\n*  Có sẵn loại có thuốc mồi riêng (dễ hàn, dễ cháy) \r\n*  Thuốc mồi hàn nằm trong phần nắp đỏ của mỗi lọ thuốc hàn', '-       Luôn để đóng kín trong hộp của nhà sản xuất, hạn chế mở ra mở vào lắp hộp thuốc hàn\r\n\r\n-        Để nơi khô ráo, thoáng mát và tránh những nơi ẩm ướt, gần lửa, điện…. để tránh làm thuốc hàn bị ẩm dẫn đến khó hàn. Vì là thuốc hàn có bột mồi bắt lửa dễ đến cháy nổ nên cần tránh xa những nơi nhiệt độ cao, lửa, điện….\r\n\r\n-       Trong quá trình vận chuyển nên vận chuyển nhẹ nhàng không nên va đập nhiều làm thuốc hàn, thuốc mồi bị trộn lẫn (đối với thuốc hàn, bột mồi bắt lửa dùng chung một lọ)\r\n\r\n-      Khi sử dụng, dùng đến đâu mang ra đến đó còn lại nên để trong kho thoáng mát, khô ráo (có thể dùng một vài viên chống ẩm để vào mỗi thùng đựng thuốc hàn)\r\n\r\n-      Nếu thuốc hàn bị ẩm ướt trong quá trình cất giữ có thể dùng các biện pháp hong khô ngoài trời dưới ánh nắng dịu…'),
(50, 1, 'BỘT HÀN HOÁ NHIỆT GOLDWELD (lọ 115g)', '700000', 0, 10, 'sp6.jpg', '1. Xuất xứ: Việt Nam \r\n2. Bảo hành: 12 tháng \r\n3. Quy cách đóng gói: 10 lọ/ hộp \r\n4. Ghi chú: \r\n*  Có sẵn loại có thuốc mồi riêng (dễ hàn, dễ cháy) \r\n*  Thuốc mồi hàn nằm trong phần nắp đỏ của mỗi lọ thuốc hàn', '-       Luôn để đóng kín trong hộp của nhà sản xuất, hạn chế mở ra mở vào lắp hộp thuốc hàn\r\n\r\n-        Để nơi khô ráo, thoáng mát và tránh những nơi ẩm ướt, gần lửa, điện…. để tránh làm thuốc hàn bị ẩm dẫn đến khó hàn. Vì là thuốc hàn có bột mồi bắt lửa dễ đến cháy nổ nên cần tránh xa những nơi nhiệt độ cao, lửa, điện….\r\n\r\n-       Trong quá trình vận chuyển nên vận chuyển nhẹ nhàng không nên va đập nhiều làm thuốc hàn, thuốc mồi bị trộn lẫn (đối với thuốc hàn, bột mồi bắt lửa dùng chung một lọ)\r\n\r\n-      Khi sử dụng, dùng đến đâu mang ra đến đó còn lại nên để trong kho thoáng mát, khô ráo (có thể dùng một vài viên chống ẩm để vào mỗi thùng đựng thuốc hàn)\r\n\r\n-      Nếu thuốc hàn bị ẩm ướt trong quá trình cất giữ có thể dùng các biện pháp hong khô ngoài trời dưới ánh nắng dịu…'),
(51, 1, 'BỘT HÀN HOÁ NHIỆT', '300000', 0, 10, 'sp3.jpg', '1. Xuất xứ: Việt Nam \r\n2. Bảo hành: 12 tháng \r\n3. Quy cách đóng gói: 10 lọ/ hộp \r\n4. Ghi chú: \r\n*  Có sẵn loại có thuốc mồi riêng (dễ hàn, dễ cháy) \r\n*  Thuốc mồi hàn nằm trong phần nắp đỏ của mỗi lọ thuốc hàn', '-       Luôn để đóng kín trong hộp của nhà sản xuất, hạn chế mở ra mở vào lắp hộp thuốc hàn\r\n\r\n-        Để nơi khô ráo, thoáng mát và tránh những nơi ẩm ướt, gần lửa, điện…. để tránh làm thuốc hàn bị ẩm dẫn đến khó hàn. Vì là thuốc hàn có bột mồi bắt lửa dễ đến cháy nổ nên cần tránh xa những nơi nhiệt độ cao, lửa, điện….\r\n\r\n-       Trong quá trình vận chuyển nên vận chuyển nhẹ nhàng không nên va đập nhiều làm thuốc hàn, thuốc mồi bị trộn lẫn (đối với thuốc hàn, bột mồi bắt lửa dùng chung một lọ)\r\n\r\n-      Khi sử dụng, dùng đến đâu mang ra đến đó còn lại nên để trong kho thoáng mát, khô ráo (có thể dùng một vài viên chống ẩm để vào mỗi thùng đựng thuốc hàn)\r\n\r\n-      Nếu thuốc hàn bị ẩm ướt trong quá trình cất giữ có thể dùng các biện pháp hong khô ngoài trời dưới ánh nắng dịu…'),
(52, 5, 'BÌNH CHỮA CHÁY BỘT ABC 4kg-MFZL4', '210000', 0, 10, 'z3396931502261_747d7322ae8e07c7fa91421109028492_ca56b95edfa84a28948db26852b95b4b_master.jpg', 'Bình chữa cháy bột ABC MFZL4 4kg loại tốt được thiết kế giống với bình chữa cháy bột BC MFZ4 về hình dạng và kích thước, nếu nhìn bề ngoài thì khó mà phân biệt được hai loại này. Tuy nhiên, trên nhãn bình sẽ được in mã sản phẩm để người mua dễ dàng nhận biết và phân biệt. Ngoài khả năng chữa cháy cho các đám cháy chất lỏng và chất khí thì bình chữa cháy bột ABC MFZL4 còn chữa cháy tốt đối với đám cháy chất rắn nên nó sẽ có giá thành cao hơn một chút so với bình bột BC.', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. '),
(53, 5, 'BÌNH CHỮA CHÁY BỘT ABC 1kg-MFZL1', '120000', 0, 10, '1_916caf0e63eb4578a4a100fc4d2beef7_master.jpg', 'Bình chữa cháy bột ABC MFZL4 1kg loại tốt được thiết kế giống với bình chữa cháy bột BC MFZ4 về hình dạng và kích thước, nếu nhìn bề ngoài thì khó mà phân biệt được hai loại này. Tuy nhiên, trên nhãn bình sẽ được in mã sản phẩm để người mua dễ dàng nhận biết và phân biệt. Ngoài khả năng chữa cháy cho các đám cháy chất lỏng và chất khí thì bình chữa cháy bột ABC MFZL4 còn chữa cháy tốt đối với đám cháy chất rắn nên nó sẽ có giá thành cao hơn một chút so với bình bột BC.', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. '),
(54, 5, 'BÌNH CHỮA CHÁY BỘT ABC 35kg-MFZTL35', '1750000', 0, 10, 'z3390196664637_6755d7249d08f2d7765cfdbe26c3fafc_aceb0df56dd14e7e83a3f2af7b385280_master.webp', 'Bình chữa cháy bột ABC MFZL4 35kg loại tốt được thiết kế giống với bình chữa cháy bột BC MFZ4 về hình dạng và kích thước, nếu nhìn bề ngoài thì khó mà phân biệt được hai loại này. Tuy nhiên, trên nhãn bình sẽ được in mã sản phẩm để người mua dễ dàng nhận biết và phân biệt. Ngoài khả năng chữa cháy cho các đám cháy chất lỏng và chất khí thì bình chữa cháy bột ABC MFZL4 còn chữa cháy tốt đối với đám cháy chất rắn nên nó sẽ có giá thành cao hơn một chút so với bình bột BC.', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. '),
(55, 5, 'BÌNH CHỮA CHÁY BỘT ABC 2kg-MFZL2', '160000', 0, 10, 'z3396931502261_747d7322ae8e07c7fa91421109028492_ca56b95edfa84a28948db26852b95b4b_master.jpg', 'Bình chữa cháy bột ABC MFZL4 4kg loại tốt được thiết kế giống với bình chữa cháy bột BC MFZ4 về hình dạng và kích thước, nếu nhìn bề ngoài thì khó mà phân biệt được hai loại này. Tuy nhiên, trên nhãn bình sẽ được in mã sản phẩm để người mua dễ dàng nhận biết và phân biệt. Ngoài khả năng chữa cháy cho các đám cháy chất lỏng và chất khí thì bình chữa cháy bột ABC MFZL4 còn chữa cháy tốt đối với đám cháy chất rắn nên nó sẽ có giá thành cao hơn một chút so với bình bột BC.', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. '),
(56, 5, 'BÌNH CHỮA CHÁY BỘT ABC 35kg-MFZTL35', '200000', 0, 10, '1_916caf0e63eb4578a4a100fc4d2beef7_master.jpg', '', ''),
(57, 4, 'BÌNH CHỮA CHÁY 24kg C02 – MT24', '1500000', 0, 10, 'z3390262826385_cebdba429bc4bf5b1152878cc4edbea9_2ebe91613e2141608bbfa198c14134bb_master.jpg', 'Bình chữa cháy khí CO2 MT24 24kg có xe đẩy loại lớn được thiết kế thon dài hơn so với loại bình bột xe đẩy. Vỏ bình được đúc dày nên mặc dù lượng khí trong bình chỉ có 24kg nhưng tổng trọng lượng bình lên tới xấp xỉ 90kg. Do đó, phần khung đỡ và bánh xe cũng được thiết kế kỹ càng, chắc chắn hơn để có thể chịu được trọng lượng lớn khi di chuyển. Với chất chữa cháy là khí CO2 nên bình có thể chữa cháy linh hoạt cho nhiều môi trường khác nhau trong một khu vực rộng lớn.', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. '),
(58, 4, 'BÌNH CHỮA CHÁY 5kg C02 - MT5', '600000', 0, 10, 'z3396969067085_e5eebeb84f9a20ebe31df59f62911ef5_32907ca935284dd78b50797c90e6cf6a_master.webp', 'Bình chữa cháy khí CO2 MT24 24kg có xe đẩy loại lớn được thiết kế thon dài hơn so với loại bình bột xe đẩy. Vỏ bình được đúc dày nên mặc dù lượng khí trong bình chỉ có 24kg nhưng tổng trọng lượng bình lên tới xấp xỉ 90kg. Do đó, phần khung đỡ và bánh xe cũng được thiết kế kỹ càng, chắc chắn hơn để có thể chịu được trọng lượng lớn khi di chuyển. Với chất chữa cháy là khí CO2 nên bình có thể chữa cháy linh hoạt cho nhiều môi trường khác nhau trong một khu vực rộng lớn.', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. '),
(59, 4, 'BÌNH CHỮA CHÁY 24kg C02 – MT24', '700000', 0, 10, '1_916caf0e63eb4578a4a100fc4d2beef7_master.jpg', 'Bình chữa cháy bột ABC MFZL4 4kg loại tốt được thiết kế giống với bình chữa cháy bột BC MFZ4 về hình dạng và kích thước, nếu nhìn bề ngoài thì khó mà phân biệt được hai loại này. Tuy nhiên, trên nhãn bình sẽ được in mã sản phẩm để người mua dễ dàng nhận biết và phân biệt. Ngoài khả năng chữa cháy cho các đám cháy chất lỏng và chất khí thì bình chữa cháy bột ABC MFZL4 còn chữa cháy tốt đối với đám cháy chất rắn nên nó sẽ có giá thành cao hơn một chút so với bình bột BC.', 'Bình chữa cháy khí CO2 MT24 24kg có xe đẩy loại lớn được thiết kế thon dài hơn so với loại bình bột xe đẩy. Vỏ bình được đúc dày nên mặc dù lượng khí trong bình chỉ có 24kg nhưng tổng trọng lượng bình lên tới xấp xỉ 90kg. Do đó, phần khung đỡ và bánh xe cũng được thiết kế kỹ càng, chắc chắn hơn để có thể chịu được trọng lượng lớn khi di chuyển. Với chất chữa cháy là khí CO2 nên bình có thể chữa cháy linh hoạt cho nhiều môi trường khác nhau trong một khu vực rộng lớn.'),
(60, 4, 'BÌNH CHỮA CHÁY 1kg C02 – MT24', '150000', 0, 10, 'z3396931502261_747d7322ae8e07c7fa91421109028492_ca56b95edfa84a28948db26852b95b4b_master.jpg', 'Bình chữa cháy khí CO2 MT24 24kg có xe đẩy loại lớn được thiết kế thon dài hơn so với loại bình bột xe đẩy. Vỏ bình được đúc dày nên mặc dù lượng khí trong bình chỉ có 24kg nhưng tổng trọng lượng bình lên tới xấp xỉ 90kg. Do đó, phần khung đỡ và bánh xe cũng được thiết kế kỹ càng, chắc chắn hơn để có thể chịu được trọng lượng lớn khi di chuyển. Với chất chữa cháy là khí CO2 nên bình có thể chữa cháy linh hoạt cho nhiều môi trường khác nhau trong một khu vực rộng lớn.', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. '),
(61, 4, 'BÌNH CHỮA CHÁY 24kg C02 – MT24', '1200000', 0, 10, 'z3390262826385_cebdba429bc4bf5b1152878cc4edbea9_2ebe91613e2141608bbfa198c14134bb_master.jpg', 'Cách bảo quản bình chữa cháy bột: – Đặt bình chữa cháy bột ở nơi khô ráo, thoáng mát, cần tránh ánh sáng trực tiếp và có bức xạ nhiệt mạnh, nhiệt độ cao nhất bình ở mức an toàn là 50 độ C. ', 'Bình chữa cháy khí CO2 MT24 24kg có xe đẩy loại lớn được thiết kế thon dài hơn so với loại bình bột xe đẩy. Vỏ bình được đúc dày nên mặc dù lượng khí trong bình chỉ có 24kg nhưng tổng trọng lượng bình lên tới xấp xỉ 90kg. Do đó, phần khung đỡ và bánh xe cũng được thiết kế kỹ càng, chắc chắn hơn để có thể chịu được trọng lượng lớn khi di chuyển. Với chất chữa cháy là khí CO2 nên bình có thể chữa cháy linh hoạt cho nhiều môi trường khác nhau trong một khu vực rộng lớn.'),
(62, 3, 'Vòi D50-17bar-20m ( có khớp nối )', '670000', 0, 10, 'images__1__e126ff55359f4a2abba98f061380ff4b_master.jpg', '- Khớp nối: 50mm TCVN\r\n- Xuất xứ : TQ\r\n- Chiều dài (m) : 20 m\r\n- Chất liệu / Màu sắc : Polyester Yarn / Trắng\r\n- Áp suất làm việc (Br) : 17 Bar\r\n- Đường kính : DN50\r\n- Áo: 1 lớp dệt bằng sợi polyester filament\r\n- Lót bên trong: PVC chất lượng cao', ''),
(63, 3, 'Vòi D50-13bar-20m ( có khớp nối )', '370000', 0, 10, 'cuon-voi-chua-chay-d50-13bar_d85988b86a324e778dc017a3000f22ac_master.webp', 'Chiều dài : 20m\r\n Chất liệu: Sợi Polyester tổng hợp, cao su\r\n Áp xuất làm việc 13 Pa (Bar)\r\n Đường kính định danh: DN50\r\nMã sản phẩm : PVC D50-13 BAR-20M', 'Cấu tạo cuộn vòi chữa cháy với cuộn vòi chữa cháy D50-13 Bar- 20m được cấu tạo bởi 2 phần chính\r\nLớp sợi Polyester tổng hợp bao bọc bên ngoài,bên trong là lớp cap su tổng hợp tráng bên trong\r\nHình dạng ống trụ dài, đường kính ống D50\r\nTùy từng loại vật liệu mà chất lượng cuộn vòi chữa cháy khách nhau.độ bền cao,khả năng chịu áp xuất cũng khác nhau\r\nHai đầu cuộn vòi gắn kèm khớp nối vật liệu dễ dàng tiện lợi khi lắp nối để sử dụng'),
(64, 3, 'Lăng phun chữa cháy D50-13', '150000', 0, 10, 'd10ade2602d4305c8847db673c29f8de.jpg.webp', 'Sản phẩm này được làm từ hợp kim nhôm. Bề mặt sản phẩm được xử lý oxi hóa, đánh bóng.\r\n\r\nLăng phun kiểu B:\r\n\r\nĐường kính đầu vào: D50mm\r\n\r\nĐường kính đầu phun: 13 ± 0.2 mm', ''),
(65, 3, 'Vòi chữa cháy DN50 13 bar', '580000', 0, 10, 'cde35ca4dd82f225cfd117066d4db5dc.jpg.webp', 'Vòi chữa cháy DN50 13 bar\r\n\r\n \r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', ''),
(66, 3, 'Van góc chữa cháy DN65', '380000', 0, 10, '48e2f6d7edd9438db05868c7ae00cf36.jpg.webp', 'Van góc chữa cháy DN65\r\n\r\nVan góc PCCC là loại van cứu hỏa chuyên dụng được lắp đặt ngoài nhà.\r\nSản phẩm được chế tạo từ gang cầu với khả năng chịu lực lớn hơn và độ bền sử dụng cao hơn.\r\nTay vặn được làm bằng sắt sơn tĩnh điện, ngoại quan đẹp.\r\nTrục van được thiết kế bằng thép không gỉ, khả năng chịu được áp lực lớn.', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_images` varchar(100) NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_images`, `slider_active`) VALUES
(1, 'slide1.jpg', 1),
(2, 'slide2.jpg', 1),
(3, 'slide3.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
