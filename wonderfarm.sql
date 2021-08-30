-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 30, 2021 lúc 04:43 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wonderfarm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `drink`
--

CREATE TABLE `drink` (
  `drinkId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `imageName` varchar(50) NOT NULL,
  `productId` int(10) NOT NULL,
  `active` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `drink`
--

INSERT INTO `drink` (`drinkId`, `title`, `description`, `price`, `imageName`, `productId`, `active`) VALUES
(6, '0', 'wonderfarm nước sửa dừa', 1, 'Drink-Name-3710.jpg', 8, 'Yes'),
(7, '0', 'Kirin ice + đào 500ml', 1, 'Drink-Name-8528.jpg', 8, 'Yes'),
(8, '0', 'Kirin nước vải muối 500ml1', 1, 'Drink-Name-9727.jpg', 8, 'Yes'),
(9, '0', 'Kirin latte 330ml', 1, 'Drink-Name-8616.jpg', 12, 'Yes'),
(11, '0', 'adsadsadsa', 1, 'Drink-Name-5863.jpg', 8, 'Yes'),
(12, '0', 'sdsdsds', 1, 'Drink-Name-5185.jpg', 8, 'Yes'),
(13, '0', 'fsdf', 1, 'Drink-Name-3757.jpg', 8, 'Yes'),
(14, 'trà xanh', 'nước đường', 1, 'Drink-Name-4876.jpg', 12, 'Yes'),
(15, 'nước cốt dừa', 'dfsafsad', 1, 'Drink-Name-8896.jpg', 8, 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderId` int(10) NOT NULL,
  `drink` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT 1,
  `total` float NOT NULL,
  `orderDate` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerPhone` varchar(14) NOT NULL,
  `customerAddress` varchar(127) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orderId`, `drink`, `price`, `quantity`, `total`, `orderDate`, `status`, `customerName`, `customerPhone`, `customerAddress`, `userId`) VALUES
(16, '0', 1, 5, 1, '2021-08-30 03:44:04', 'Ordered', 'Phung Viet', '926823391', 'tien phong\r\nba vi', 21),
(17, '', 1, 4, 1, '2021-08-30 03:45:21', 'Ordered', 'Tiến', '0926465623', 'ho chi minh', 21),
(18, '0', 1, 1, 1, '2021-08-30 04:00:21', 'Ordered', 'Phùng Thế Việt', '926823391', 'ba vì hà nội', 21),
(19, '', 1, 1, 1, '2021-08-30 04:01:14', 'Delivered', 'Phùng Thế Việt', '0926823311', '3', 21),
(20, '0', 1, 1, 1, '2021-08-30 04:05:26', 'Delivered', 'sadsa', '0926823391', 'sdfsdfds', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `imageName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `title`, `imageName`, `active`) VALUES
(8, 'Wonder Farm', 'Drink_Product_550.png', 'Yes'),
(9, 'Kirin', 'Drink_Product_646.png', 'Yes'),
(12, 'nước cốt dừa', 'Drink_Product_532.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `email`, `fullName`, `role`) VALUES
(12, 'admin', '$2y$10$hKmojZip5smQTMvpuXIIVuekEIGoUpSknHf2zBhEXBDqOIO4q5bzK', 'vietpt72@wru.vn', 'Phùng Thế Việt', '1'),
(13, 'username2', '$2y$10$Pq8DM9WlazwEFZqDdxl2febrv1V5Eepy82HdPE4brmYYsyzLkTlFy', 'vietpt72@wru.vn', 'Phùng Thế Việt', '0'),
(14, 'usename1', '$2y$10$oHtUB15.oPQmBqZUs8wtV.hunHJ9t4UAWn1fBAs4FQTsc6hNDYvta', 'Viethaha91@gmail.com', 'Phùng Thế Việt', '0'),
(15, 'username3', '$2y$10$eBSCst.eq9Q1JuRTdBrEu.wRrS7oabDc2unwYwLF5iE4ArYJbuhku', 'vietlala9112@gmail.com', 'Phùng Thế Việt', '0'),
(16, 'username4', '$2y$10$JeOBylhH7TbDEo.qZlwBzeyF/YcMy5yIXnPxkKdYgXXSpfFbyt8lS', 'vietkaka93232x@gmail.com', 'Phung Viet', '0'),
(17, 'username5', '$2y$10$.Oh6o6FJpKYQ92lHh3UiJ.cT/rgeSlKxMKke97npuWItn0zQDfwae', 'vietkaka9x232323@gmail.com', 'Phung Viet', '0'),
(18, 'username6', '$2y$10$2aLjd.rcvd5By9MXUdEn6udL5QvNgEcbUBl3NEQciiN5TRjLla6.O', 'vietkaka9x@gmail.com', 'Phung Viet', '0'),
(19, 'khanh121121', '$2y$10$je6Y5wF7JQayYX.PPeY0puODyJD1mkFuedfnJAdR5pCJVWV5fiHVG', 'vietkak55a9x@gmail.com', 'Phung Viet', '0'),
(20, 'username88', '$2y$10$R.SNpb.zRFHu1wpB349zhe1Z7U.E7ARlPh30VtbKDeADyiy8sSypy', 'thuyloi1959@gmail.com', 'Thuỷ Lợi', '0'),
(21, 'test8888', '$2y$10$NV6LbRwgI32FSF6n4T8PredOVFM4Du.s7K7cLb/80nmWyjzWTRv62', 'test8888@gmail.com', 'tester', '0'),
(22, 'viet1999', '$2y$10$xUeQI2VJDrYT2jri/19dfOQ5bbOXHlmYVftWy.2ZozVTcu4JscXLW', 'Vietlalafsd@gmail.com', 'Phùng Việt', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`drinkId`),
  ADD KEY `drinkToProduct` (`productId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `orderToUser` (`userId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `drink`
--
ALTER TABLE `drink`
  MODIFY `drinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drinkToProduct` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orderToUser` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
