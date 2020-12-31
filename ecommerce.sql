-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 04:28 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'rolex'),
(2, 'apple'),
(3, 'casio'),
(4, 'omega'),
(5, 'citizen'),
(6, 'bitis');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user` varchar(100) NOT NULL,
  `cart_prodID` int(11) NOT NULL,
  `cart_prodTitle` varchar(255) DEFAULT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user`, `cart_prodID`, `cart_prodTitle`, `cart_quantity`, `cart_price`) VALUES
(232, '1', 5, 'Đồng hồ Nam Citizen BI5000-87A\r\n', 3, 6192000),
(233, '1', 0, '', 1, 0),
(234, '1', 3, 'Đồng hồ Nam Citizen AW1211-12A ', 1, 3290000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Đồng hồ truyền thống'),
(2, 'Smartwatch');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_name` varchar(255) DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_phone` varchar(30) NOT NULL,
  `order_address` varchar(300) NOT NULL,
  `order_amount` float NOT NULL,
  `order_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_name`, `order_date`, `order_email`, `order_phone`, `order_address`, `order_amount`, `order_note`) VALUES
(1, 1, 'Bùi Quang Tuyến', '2020-12-30', 'tuyenbui3030@gmail.com', '0836988085', 'Gia Lai', 1000000, NULL),
(2, 1, 'Bùi Quang Tuyến', '0000-00-00', 'tuyenbui3030@gmail.com', '02156612986', 'North Wales', 100000, NULL),
(3, 1, 'Bùi Quang Tuyến', '2020-12-30', 'kasumin147@gmail.com', '0836988085', 'Tp. Hồ Chí Minh', 100000, ''),
(4, 1, 'Bùi Quang Tuyến', '2020-12-30', 'tuyenbui3030@gmail.com', '0836988085', 'Pleiku', 100000, ''),
(5, 1, 'Bùi Quang Tuyến', '2020-12-30', 'tuyenbui3030@gmail.com', '6608329428', 'FOSTER', 100000, ''),
(6, 1, 'Bùi Quang Tuyến', '2020-12-30', 'tuyenbui3030@gmail.com', '0836988085', 'Gia Lai', 100000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_cat` int(11) NOT NULL,
  `prod_brand` int(11) NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_price` float NOT NULL,
  `prod_quantity` int(11) DEFAULT NULL,
  `prod_view` int(11) NOT NULL,
  `prod_tinydes` text NOT NULL,
  `prod_fulldes` text NOT NULL,
  `prod_status` varchar(255) NOT NULL,
  `prod_image` text NOT NULL,
  `prod_date` date NOT NULL,
  `prod_origin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat`, `prod_brand`, `prod_title`, `prod_price`, `prod_quantity`, `prod_view`, `prod_tinydes`, `prod_fulldes`, `prod_status`, `prod_image`, `prod_date`, `prod_origin`) VALUES
(1, 1, 1, 'Đồng hồ Nam Citizen BI5000-87L\r\n', 2064000, 982, 0, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.', 'published', 'citizen-bi5000-87l.jpg', '2020-12-24', 'Hoa kì'),
(2, 1, 1, 'Đồng hồ Nam Citizen AN3610-55L\r\n', 4032000, 362, 0, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Ý nghĩa của từ Citizen trong tiếng anh là người dân. Điều này cho thấy mong muốn của Citizen là bình dân hóa mặt hàng đồng hồ vốn xa xỉ trở nên gần gũi và phổ biến cho mọi người trên khắp thế giới.\r\n\r\nKhông chỉ sản xuất các sản phẩm về đồng hồ, Citizen còn sản xuất rất nhiều các mặt hàng khác như đồ trang sức, gọng kính mắt và các sản phẩm chăm sóc sức khỏe khác.Citizen thường sử dụng thép không gỉ, vàng, titanium, kính Sapphire hay pha lê để chế tác vỏ đồng hồ, mỗi loại sẽ có những đặc tính riêng làm nổi bật lên vẻ đẹp thẩm mỹ và tăng giá trị của từng mẫu đồng hồ.\r\n\r\nNgoài ra hãng còn tận dụng các chất liệu khác như cao su, silicone, nhựa, gốm, đá quý, kim cương nhân tạo,... để tạo nên một sản phẩm kết cấu hoàn chỉnh và chất lượng tốt nhất.', 'published', 'citizen-an3610-55l-xanh-1-org.jpg', '2020-12-24', 'Hoa kì'),
(3, 1, 1, 'Đồng hồ Nam Citizen AW1211-12A ', 3290000, 212, 0, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Ý nghĩa của từ Citizen trong tiếng anh là người dân. Điều này cho thấy mong muốn của Citizen là bình dân hóa mặt hàng đồng hồ vốn xa xỉ trở nên gần gũi và phổ biến cho mọi người trên khắp thế giới.\r\n\r\nKhông chỉ sản xuất các sản phẩm về đồng hồ, Citizen còn sản xuất rất nhiều các mặt hàng khác như đồ trang sức, gọng kính mắt và các sản phẩm chăm sóc sức khỏe khác.Citizen thường sử dụng thép không gỉ, vàng, titanium, kính Sapphire hay pha lê để chế tác vỏ đồng hồ, mỗi loại sẽ có những đặc tính riêng làm nổi bật lên vẻ đẹp thẩm mỹ và tăng giá trị của từng mẫu đồng hồ.\r\n\r\nNgoài ra hãng còn tận dụng các chất liệu khác như cao su, silicone, nhựa, gốm, đá quý, kim cương nhân tạo,... để tạo nên một sản phẩm kết cấu hoàn chỉnh và chất lượng tốt nhất.', 'published', 'citizen-aw1211-12a-trang3-ga-1-org.jpg', '2020-12-24', 'Việt nam'),
(4, 1, 1, 'Đồng hồ Nam Citizen BI5070-57H\r\n', 3760000, 973, 0, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Sở hữu thiết kế sang trọng và tinh tế, chiếc đồng hồ quartz này phù hợp với các quý ông mạnh mẽ và thời thượng\r\n\r\nĐồng hồ Citizen BI5000-87L mang thương hiệu đồng hồ Citizen đến từ Nhật Bản, nổi tiếng với nhiều chiếc đồng hồ hiện đại và sang trọng.\r\n\r\nLớp vỏ ngoài bền chắc giúp đồng hồ có khả năng chịu va đập tốt.\r\n\r\n- Mặt kính của mẫu đồng hồ Citizen nam này có độ trong suốt tốt, cứng cáp, hạn chế nứt vỡ khi rơi ở độ cao vừa phải.\r\n\r\n- Bộ khung chắc chắn, khả năng chống oxi hóa và ăn mòn tốt, bảo vệ an toàn cho các chi tiết máy bên trong.\r\n\r\nHệ số chống nước 5 ATM, chiếc đồng hồ nam này vẫn an toàn khi bạn đeo đi mưa và tắm, không mang khi bơi lội hay lặn.\r\n\r\nNgười dùng nắm bắt thông tin ngày trong tháng dễ dàng hơn khi chiếc đồng hồ kim này được trang bị lịch ngày.\r\n\r\nDây đồng hồ có độ bền cao, chịu được mọi điều kiện thời tiết, dễ dàng đánh bóng như mới sau một thời gian sử dụng.', 'published', 'dong-ho-nam-citizen-bi5000-87l-trang-600x600.jpg', '2020-12-24', 'Việt nam'),
(5, 1, 1, 'Đồng hồ Nam Citizen BI5000-87A\r\n', 2064000, 192, 0, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Thiết kế sang trọng và với màu bạc tinh tế, mẫu đồng hồ quartz này phù hợp với các quý ông đẳng cấp, thời thượng\r\n\r\nĐồng hồ nam Citizen BI5000-87A mang thương hiệu đồng hồ Citizen, một trong những hãng đồng hồ nổi tiếng của Nhật Bản.\r\n\r\nLớp vỏ bên ngoài chắc chắn và cứng cáp\r\n\r\n- Chiếc đồng hồ Citizen nam này có mặt kính trong suốt, chịu lực tốt, có thể đánh bóng, làm mới khi trầy xước nhẹ.\r\n\r\n- Khung viền mẫu đồng hồ nam này bền bỉ, chống oxi hóa, hạn chế hư hỏng khi bị tác động hoặc khi rơi ở độ cao vừa phải.\r\n\r\nHệ số chống nước lên đến 5 ATM, an toàn khi đi mưa, rửa tay và đi tắm, không đeo đồng hồ khi bơi hay đi lặn\r\n\r\nĐồng hồ được trang bị lịch ngày giúp bạn thuận tiện hơn trong công việc và cuộc sống\r\n\r\nDây đeo của chiếc đồng hồ kim này có độ bền cao, chịu được mọi thời tiết khác nhau, dễ dàng lau chùi khi bám bẩn', 'published', 'dong-ho-nam-citizen-bi5000-87a-trang-600x600.jpg', '2020-12-24', 'Việt nam');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_prod_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_prod_id`, `size_name`, `size_quantity`) VALUES
(3, 1, '40', 50),
(4, 1, '41', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_token` varchar(300) NOT NULL,
  `user_verified` bit(1) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_username`, `user_password`, `user_email`, `user_token`, `user_verified`, `user_address`, `user_birthday`) VALUES
(1, 'Bùi Quang Tuyến', 'tuyenbui3030', '$2y$10$oRfhplNHusJ3evktuB0usebqVFpHDtUM62g1KMrD5YWxqv6C9AHMK', 'tuyenbui3030@gmail.com', '33b1e0185b7f53ec3811b8b0706504ef72cdfeb8d614bce7497635e7c16def43a3d26a1b3a5b8165604ae0dbf84f2be80d0b', b'1', 'TP.HCM', '0000-00-00'),
(2, 'Tuyến Bùi', 'tuyenbui1999', '$2y$10$KNP2rasT9fsBWSxTpRDIE.ksh7ojHlrqXuYe8pVemEf1MNDp3.1tm', 'tuyenbui1999@gmail.com', 'e1cc2b4d24431eb1756b578da5eb8b6ad9f020841f7032722a6beb665759ab9eb900efeea331668bbcdb8923104f508cbb06', b'1', 'TP.HCM', '0000-00-00'),
(4, '', 'kasumin147', '$2y$10$kcySZVOhARn.wKUjg7x7J.rvBXDJ6vz5aiko3Ev1NF0lGcKUVtNvu', 'kasumin147@gmail.com', 'ec185595b05821e0b9ed70afec5b4ea226bf55d8f5597031c657630ecd1eebe759de9ce2af7995e5c2882585d2d10899e88d', b'0', '', '0000-00-00'),
(5, '', 'tuyenbui2608', '$2y$10$dBUFbHTZz/X9kncAIPdgb.D9loG5oLK19KhWakfyoCwQ4KS.QLLJi', 'tuyenbui2608@gmail.com', '0ec18de812fe366b146eb3943aab050eda878f734ce36af3a2c30a9eb5b2255af8c998563f1c1bb52d96ce81fbed7657dfe7', b'0', '', '1999-08-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD UNIQUE KEY `orderDetail_id` (`orderDetail_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_ORDERS_USERS` (`order_user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `FK_PRODUCT_BRAND` (`prod_brand`),
  ADD KEY `FK_PRODUCT_CATEGORY` (`prod_cat`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `FK_SIZE_PRODUCT` (`size_prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_ORDERS_USERS` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_PRODUCT_BRAND` FOREIGN KEY (`prod_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `FK_PRODUCT_CATEGORY` FOREIGN KEY (`prod_cat`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `FK_SIZE_PRODUCT` FOREIGN KEY (`size_prod_id`) REFERENCES `products` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
