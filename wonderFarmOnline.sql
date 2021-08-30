-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 30, 2021 lúc 06:49 PM
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
(16, 'nước cốt dừa', 'kljhkjhjh', 1, 'Drink-Name-7381.jpg', 15, 'Yes'),
(17, 'dsfsd', 'fsdfsdf', 2, 'Drink-Name-1484.jpg', 14, 'Yes'),
(18, 'sdfsdfsd', 'dsfsdf', 2, 'Drink-Name-5140.jpg', 15, 'Yes'),
(19, 'kjkhj', 'kjhkhj', 2, 'Drink-Name-883.jpg', 16, 'Yes');

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
(21, 'nước cốt dừa', 1, 1, 1, '2021-08-30 06:30:58', 'Delivered', 'Phung Viet', '0926823391', 'tien phong\r\nba vi', 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `imageName` varchar(25) CHARACTER SET utf8 NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`productId`, `title`, `imageName`, `active`) VALUES
(14, 'nước cốt dừa', 'Drink_Product_922.jpg', 'Yes'),
(15, 'Wonder Farm', 'Drink_Product_124.jpg', 'Yes'),
(16, 'Kirin', 'Drink_Product_382.png', 'Yes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(45) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `email`, `fullName`, `role`) VALUES
(24, 'admin', '$2y$10$Jr.vOXImPJ/LVR3PzKVv9eUM5D0E3wKAPbDc7rVbu1MJWV0ThN3ny', 'vietkaka9x@gmail.com', 'Phùng Thế Việt', 1),
(25, 'username05', '$2y$10$BpQm6/ZZqgWHsbbXUZowJONwWmSCzTN5IbDAXbqMLWXQUnNMGXLpa', 'dfdfdffdf@gmail.com', 'irutreotritu', 0),
(26, 'username06', '$2y$10$Ccj2g1EXzUt3.1t9ju6a8.xV5eRYQUZw0V55H.4hX/GxZtEwEdFea', 'Vietfgkfdfdfdgfjg@gmai.com', 'dfdfdf', 0),
(27, 'ussername07', '$2y$10$CnJxnlX62qOj3aDsoHzXLu5TvmyuD.GParg10d8lQRxX30KL2RL5i', 'dffdfdf@gmail.com', 'jgjrgrigjr', 0);

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
  MODIFY `drinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
