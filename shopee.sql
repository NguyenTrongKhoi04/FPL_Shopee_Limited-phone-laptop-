-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 23, 2024 lúc 11:20 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sopee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `gmail` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `gmail`, `username`, `password`, `role`, `createtime`, `birthday`, `address`) VALUES
(1, 'account23@gmail.com', 'user86', '12345', 0, '2022-11-21 04:05:04', '2022-11-12', 'Cà mau'),
(2, 'account23@gmail.com', 'user22', '12345', 0, '2022-11-21 04:05:09', '2022-11-26', 'Cà mau'),
(3, 'account26@gmail.com', 'user12', '12345', 0, '2022-11-21 04:05:04', '2022-11-13', 'Hà nội'),
(5, 'account26@gmail.com', 'user45', '12345', 0, '2022-11-21 04:05:02', '2022-11-12', 'Hà giang'),
(6, 'account22@gmail.com', 'user3', '12345', 0, '2022-11-21 04:05:08', '2022-11-12', 'Cà mau'),
(7, 'account22@gmail.com', 'user56', '12345', 0, '2022-11-21 04:05:03', '2022-11-28', 'Hà giang'),
(8, 'account24@gmail.com', 'user7', '12345', 0, '2022-11-21 04:05:07', '2022-11-13', ' số 1 phố trịnh văn bô');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_acc` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `id_acc`, `quantity`) VALUES
(1, 6, 32),
(2, 7, 65),
(3, 1, 65),
(4, 2, 19),
(5, 8, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartdetail`
--

CREATE TABLE `cartdetail` (
  `id` int(11) NOT NULL,
  `id_cart` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cartdetail`
--

INSERT INTO `cartdetail` (`id`, `id_cart`, `id_pro`) VALUES
(1, 1, 24),
(2, 2, 28),
(3, 2, 21),
(4, 2, 22),
(5, 1, 24),
(6, 3, 24),
(7, 5, 30),
(8, 1, 27),
(9, 5, 29),
(10, 4, 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_cate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name_cate`) VALUES
(1, 'LapTop'),
(2, 'Smart Phone');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_pro`, `comment`) VALUES
(1, 5, 29, 'cmtcần cải thiện thêm'),
(2, 6, 25, 'cmtcần cải thiện thêm'),
(3, 4, 24, 'c,tsản phẩm bị lỗi'),
(4, 8, 31, 'cmtcần cải thiện thêm'),
(5, 5, 26, 'cmt sản phẩm thật là tuyệt vời'),
(6, 8, 23, 'cmtcần cải thiện thêm'),
(7, 2, 22, 'cmt sản phẩm thật là tuyệt vời'),
(8, 1, 28, 'cmtcần cải thiện thêm'),
(9, 4, 22, 'c,tsản phẩm bị lỗi'),
(10, 7, 25, 'cmt sản phẩm thật là tuyệt vời');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailproduct`
--

CREATE TABLE `detailproduct` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `detailproduct`
--

INSERT INTO `detailproduct` (`id`, `id_pro`, `image`, `price`, `size`, `count`) VALUES
(2, 22, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 543300, 2, 0),
(3, 24, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 334000, 2, 0),
(4, 23, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 543300, 2, 0),
(5, 21, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 334000, 1, 0),
(6, 26, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 434000, 2, 0),
(7, 25, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 543300, 1, 0),
(9, 24, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 543300, 1, 0),
(12, 21, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 543300, 2, 0),
(13, 27, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 434000, 2, 0),
(15, 22, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 543300, 1, 0),
(16, 27, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 434000, 1, 0),
(24, 23, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 342000, 1, 0),
(25, 28, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 543300, 1, 0),
(32, 26, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 434000, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `id_order`, `id_pro`, `count`, `comment`, `address`) VALUES
(1, 10, 23, 323, 'cần cải thiện thêm', 'tây hồ'),
(2, 27, 21, 323, 'sản phẩm thật là tuyệt vời', 'chương mỹ '),
(3, 27, 27, 326, 'sản phẩm bị lỗi', 'trịnh văn bô'),
(4, 23, 26, 432, 'sản phẩm bị lỗi', 'trịnh văn bô'),
(5, 8, 29, 231, 'sản phẩm thật là tuyệt vời', 'Bắc cạn'),
(7, 12, 28, 523, 'cần cải thiện thêm', 'trịnh văn bô'),
(8, 23, 30, 171, 'cần cải thiện thêm', 'chương mỹ '),
(9, 21, 21, 523, 'cần cải thiện thêm', 'Cà mau'),
(10, 25, 28, 231, 'cần cải thiện thêm', 'tây hồ'),
(11, 21, 24, 231, 'sản phẩm thật là tuyệt vời', 'tây hồ'),
(12, 27, 31, 432, 'sản phẩm bị lỗi', 'trịnh văn bô'),
(13, 1, 27, 323, 'sản phẩm bị lỗi', 'Hà giang'),
(15, 6, 24, 523, 'sản phẩm thật là tuyệt vời', 'trịnh văn bô'),
(16, 21, 22, 326, 'sản phẩm thật là tuyệt vời', 'Hà giang'),
(17, 27, 25, 523, 'sản phẩm bị lỗi', 'Hà giang'),
(18, 5, 24, 134, 'sản phẩm thật là tuyệt vời', 'Hà giang'),
(19, 11, 30, 523, 'sản phẩm thật là tuyệt vời', 'Bắc cạn'),
(20, 24, 21, 171, 'sản phẩm thật là tuyệt vời', 'Cà mau'),
(21, 18, 28, 326, 'sản phẩm bị lỗi', 'trịnh văn bô'),
(22, 2, 26, 326, 'cần cải thiện thêm', 'Hà giang'),
(23, 20, 26, 523, 'cần cải thiện thêm', 'tây hồ'),
(24, 14, 26, 523, 'cần cải thiện thêm', 'chương mỹ '),
(25, 12, 30, 231, 'sản phẩm bị lỗi', 'Cà mau'),
(26, 13, 28, 432, 'sản phẩm thật là tuyệt vời', 'Hà nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `totalorder` int(11) DEFAULT NULL,
  `id_voucher` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time_order` datetime DEFAULT NULL,
  `time_complete` datetime DEFAULT NULL,
  `reason_reject` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_ship` int(11) DEFAULT NULL,
  `status_pay` int(11) DEFAULT NULL,
  `reason_return` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `totalorder`, `id_voucher`, `status`, `time_order`, `time_complete`, `reason_reject`, `id_user`, `id_ship`, `status_pay`, `reason_return`) VALUES
(1, 23, 17, 1, '2022-11-21 04:05:13', '2022-11-28 06:03:28', 2, 7, 1, 0, ''),
(2, 21, 13, 4, '2022-11-21 04:05:26', '2022-11-28 06:03:28', 3, 3, 1, 0, ''),
(5, 23, 13, 1, '2022-11-21 04:05:13', '2022-11-28 06:03:12', 2, 5, 1, 0, ''),
(6, 22, 16, 6, '2022-11-21 04:05:12', '2022-11-28 06:03:13', 1, 6, 1, 0, ''),
(7, 28, 17, 1, '2022-11-21 04:05:28', '2022-11-28 06:03:26', 1, 2, 2, 0, ''),
(8, 24, 17, 1, '2022-11-21 04:05:12', '2022-11-28 06:03:28', 1, 1, 2, 0, ''),
(9, 26, 18, 1, '2022-11-21 04:05:13', '2022-11-28 06:03:28', 1, 8, 2, 0, ''),
(10, 21, 17, 6, '2022-11-21 04:05:13', '2022-11-28 06:03:28', 1, 7, 2, 0, ''),
(11, 27, 14, 6, '2022-11-21 04:05:28', '2022-11-28 06:03:28', 2, 5, 1, 0, ''),
(12, 25, 14, 3, '2022-11-21 04:05:28', '2022-11-28 06:03:12', 1, 8, 2, 0, ''),
(13, 27, 16, 6, '2022-11-21 04:05:26', '2022-11-28 06:03:26', 3, 2, 2, 0, ''),
(14, 21, 13, 7, '2022-11-21 04:05:26', '2022-11-28 06:03:26', 2, 6, 1, 0, ''),
(15, 22, 16, 2, '2022-11-21 04:05:13', '2022-11-28 06:03:28', 2, 5, 1, 0, ''),
(16, 22, 17, 2, '2022-11-21 04:05:28', '2022-11-28 06:03:28', 3, 2, 1, 0, ''),
(17, 27, 13, 6, '2022-11-21 04:05:13', '2022-11-28 06:03:13', 3, 8, 1, 0, ''),
(18, 25, 13, 2, '2022-11-21 04:05:26', '2022-11-28 06:03:12', 1, 7, 2, 0, ''),
(19, 21, 14, 2, '2022-11-21 04:05:13', '2022-11-28 06:03:26', 1, 1, 1, 0, ''),
(20, 23, 17, 6, '2022-11-21 04:05:26', '2022-11-28 06:03:28', 3, 3, 1, 0, ''),
(21, 21, 13, 8, '2022-11-21 04:05:28', '2022-11-28 06:03:26', 3, 8, 2, 0, ''),
(22, 28, 13, 7, '2022-11-21 04:05:28', '2022-11-28 06:03:13', 3, 8, 1, 0, ''),
(23, 21, 17, 4, '2022-11-21 04:05:13', '2022-11-28 06:03:26', 1, 3, 2, 0, ''),
(24, 27, 17, 4, '2022-11-21 04:05:12', '2022-11-28 06:03:26', 3, 6, 2, 0, ''),
(25, 28, 16, 5, '2022-11-21 04:05:13', '2022-11-28 06:03:12', 2, 6, 2, 0, ''),
(26, 28, 16, 2, '2022-11-21 04:05:26', '2022-11-28 06:03:13', 3, 7, 1, 0, ''),
(27, 27, 16, 3, '2022-11-21 04:05:26', '2022-11-28 06:03:13', 1, 8, 1, 0, ''),
(28, 22, 17, 1, '2022-11-21 04:05:12', '2022-11-28 06:03:28', 2, 2, 1, 0, ''),
(29, 27, 16, 8, '2022-11-21 04:05:26', '2022-11-28 06:03:12', 3, 2, 2, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `namepro` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `datepro` date DEFAULT NULL,
  `id_subcategory` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `namepro`, `quantity`, `datepro`, `id_subcategory`, `description`, `sale`) VALUES
(21, 'sản phẩm 6', 101, '2022-11-03', 4, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 5),
(22, 'sản phẩm 6', 230, '2022-11-12', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 5),
(23, 'sản phẩm 6', 255, '2022-11-03', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 2),
(24, 'sản phẩm 1', 101, '2022-11-12', 4, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 3),
(25, 'sản phẩm 3', 255, '2022-11-12', 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 4),
(26, 'sản phẩm 5', 230, '2022-11-07', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 5),
(27, 'sản phẩm 4', 255, '2022-11-03', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 4),
(28, 'sản phẩm 2', 125, '2022-11-12', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 4),
(29, 'sản phẩm 2', 230, '2022-11-07', 4, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 4),
(30, 'sản phẩm 5', 101, '2022-11-07', 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 2),
(31, 'sản phẩm 4', 101, '2022-11-03', 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reasonreject`
--

CREATE TABLE `reasonreject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `reasonreject`
--

INSERT INTO `reasonreject` (`id`, `name`) VALUES
(1, 'Tôi không muốn đặt nữa'),
(2, 'Tôi muốn đổi sang sản phẩm khác'),
(3, 'Tôi hết tiền rồi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `namesale` varchar(255) DEFAULT NULL,
  `datesale` date DEFAULT NULL,
  `timesale` date DEFAULT NULL,
  `valuesale` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sale`
--

INSERT INTO `sale` (`id`, `namesale`, `datesale`, `timesale`, `valuesale`) VALUES
(2, 'sale3', '2022-11-12', '2022-12-02', 8),
(3, 'sale3', '2022-11-07', '2022-12-01', 6),
(4, 'sale2', '2022-11-07', '2022-12-01', 8),
(5, 'sale3', '2022-11-12', '2022-12-08', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ship`
--

CREATE TABLE `ship` (
  `id` int(11) NOT NULL,
  `nameship` varchar(255) DEFAULT NULL,
  `timeship` datetime DEFAULT NULL,
  `priceship` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ship`
--

INSERT INTO `ship` (`id`, `nameship`, `timeship`, `priceship`) VALUES
(1, 'Ship đơn 1', '2022-12-01 12:04:04', 654000),
(2, 'Ship đơn 2', '2022-12-01 12:04:04', 123000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `namesize` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `namesize`) VALUES
(1, '8GB'),
(2, '16GB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statusorder`
--

CREATE TABLE `statusorder` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `statusorder`
--

INSERT INTO `statusorder` (`id`, `name`) VALUES
(1, 'chờ shop xác nhận đơn hàng'),
(2, 'đang chuẩn bị hàng'),
(3, 'đang giao '),
(4, 'giao thành công'),
(5, 'đang chuẩn bị hàng'),
(6, 'khách hàng đã hủy đơn '),
(7, 'khách hàng hoàn trả đơn'),
(8, 'shop đồng ý hoàn trả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storedetailproduct`
--

CREATE TABLE `storedetailproduct` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `storedetailproduct`
--

INSERT INTO `storedetailproduct` (`id`, `id_pro`, `image`, `price`, `size`) VALUES
(1, 4, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 232000, 2),
(2, 4, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 445000, 1),
(3, 3, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 445000, 1),
(4, 4, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fstatusneo.com%2Ffrom-pixels-to-reality-how-ai-generated-images-are-revolutionizing-industries%2F&psig=AOvVaw2nIO_F_XbpVRrWWMrPkJwZ&ust=1713958043034000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCL', 234000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storepro`
--

CREATE TABLE `storepro` (
  `id` int(11) NOT NULL,
  `name_pro` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `datepro` date DEFAULT NULL,
  `id_subcategory` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `storepro`
--

INSERT INTO `storepro` (`id`, `name_pro`, `quantity`, `datepro`, `id_subcategory`, `description`) VALUES
(2, 'sản phẩm 4', 4454, '2022-11-07', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s'),
(3, 'sản phẩm 2', 2344, '2022-11-12', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s'),
(4, 'sản phẩm 1', 2344, '2022-11-07', 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s'),
(5, 'sản phẩm 4', 2344, '2022-11-12', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name_subcate` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`id`, `name_subcate`, `id_category`) VALUES
(1, 'danh mục1', 2),
(2, 'danh mục3', 1),
(3, 'danh mục1', 1),
(4, 'danh mục2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `codevoucher` varchar(255) DEFAULT NULL,
  `namevoucher` varchar(255) DEFAULT NULL,
  `valuevoucher` int(11) DEFAULT NULL,
  `countvoucher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `codevoucher`, `namevoucher`, `valuevoucher`, `countvoucher`) VALUES
(13, '22222222222', 'Voucher Khuyến Mại Test', 10, 30),
(14, '44444444', 'Voucher Khuyến Mại Test', 15, 25),
(16, '333333333', 'Voucher Khuyến Mại Test', 25, 25),
(17, '11111111', 'Voucher Khuyến Mại Test', 20, 25),
(18, '55555555', 'Voucher Khuyến Mại Test', 15, 30);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_acc` (`id_acc`);

--
-- Chỉ mục cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `comment_ibfk_1` (`id_pro`);

--
-- Chỉ mục cho bảng `detailproduct`
--
ALTER TABLE `detailproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pro` (`id_pro`,`size`),
  ADD KEY `size` (`size`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `reason_reject` (`reason_reject`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_ship` (`id_ship`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subcategory` (`id_subcategory`),
  ADD KEY `sale` (`sale`);

--
-- Chỉ mục cho bảng `reasonreject`
--
ALTER TABLE `reasonreject`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statusorder`
--
ALTER TABLE `statusorder`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `storedetailproduct`
--
ALTER TABLE `storedetailproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pro` (`id_pro`),
  ADD KEY `size` (`size`);

--
-- Chỉ mục cho bảng `storepro`
--
ALTER TABLE `storepro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subcategory` (`id_subcategory`);

--
-- Chỉ mục cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_ibfk_1` (`id_category`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codevoucher` (`codevoucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `detailproduct`
--
ALTER TABLE `detailproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `reasonreject`
--
ALTER TABLE `reasonreject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `statusorder`
--
ALTER TABLE `statusorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `storedetailproduct`
--
ALTER TABLE `storedetailproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `storepro`
--
ALTER TABLE `storepro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_acc`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `cartdetail_ibfk_3` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `detailproduct`
--
ALTER TABLE `detailproduct`
  ADD CONSTRAINT `detailproduct_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `detailproduct_ibfk_2` FOREIGN KEY (`size`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`status`) REFERENCES `statusorder` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`reason_reject`) REFERENCES `reasonreject` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`id_ship`) REFERENCES `ship` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sale`) REFERENCES `sale` (`id`);

--
-- Các ràng buộc cho bảng `storedetailproduct`
--
ALTER TABLE `storedetailproduct`
  ADD CONSTRAINT `storedetailproduct_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `storepro` (`id`),
  ADD CONSTRAINT `storedetailproduct_ibfk_2` FOREIGN KEY (`size`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `storepro`
--
ALTER TABLE `storepro`
  ADD CONSTRAINT `storepro_ibfk_1` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`);

--
-- Các ràng buộc cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
