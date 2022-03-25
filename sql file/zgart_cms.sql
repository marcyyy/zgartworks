-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 02:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zgart_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_username` varchar(50) NOT NULL,
  `account_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_username`, `account_password`) VALUES
(1, 'zgartworks', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `anc`
--

CREATE TABLE `anc` (
  `id` int(11) NOT NULL,
  `about` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anc`
--

INSERT INTO `anc` (`id`, `about`, `email`, `phone`) VALUES
(1, 'Hi! i\'m Zyrah Avila, a self taught artist from the Philippines.\r\nI love making art and it has always been a hobby for me.\r\nSupport a local artist!', 'avila.zyrah@gmail.com', '09438285735');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_merch` int(11) NOT NULL,
  `merch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cart_merch`, `merch_id`) VALUES
(1, 0, 4),
(2, 0, 8),
(3, 0, 9),
(4, 1, 5),
(5, 1, 4),
(6, 1, 15),
(7, 1, 2),
(8, 1, 14),
(9, 2, 4),
(10, 2, 5),
(11, 2, 7),
(12, 2, 1),
(13, 2, 13),
(14, 2, 12),
(15, 3, 6),
(16, 3, 10),
(17, 3, 5),
(18, 4, 3),
(20, 4, 19),
(21, 4, 8),
(23, 4, 13),
(24, 4, 12),
(25, 4, 11),
(26, 5, 7),
(27, 5, 1),
(29, 6, 5),
(30, 6, 5),
(31, 6, 5),
(32, 6, 14),
(33, 7, 3),
(34, 7, 19),
(35, 7, 15),
(36, 7, 16),
(37, 8, 6),
(38, 8, 12),
(39, 8, 19),
(40, 8, 2),
(41, 8, 15),
(42, 9, 5),
(44, 9, 3),
(45, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `style` int(11) NOT NULL,
  `inclusion` varchar(200) NOT NULL,
  `tat` varchar(50) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `style`, `inclusion`, `tat`, `price`) VALUES
(1, 4, 'Illustration, Detailed Background, 1 Character', '3 days', 5000),
(3, 2, 'Half body, Plain Color Background, 1 Character', '2 days', 3000),
(4, 3, 'Illustration, Detailed Background, 1 Character', '2 days', 5000),
(5, 5, 'Illustration, Detailed Background, 1 Character', '1 day', 2000),
(6, 6, 'Illustration, Detailed Background, 1 Character', '2 days', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `merch`
--

CREATE TABLE `merch` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merch`
--

INSERT INTO `merch` (`id`, `type`, `image`, `title`, `description`, `price`) VALUES
(1, 2, 'calendar.jpg', '2021 concept calendar 1', '29.7 x 42 cm, 12 pages', 500),
(2, 1, 'calendar2.jpg', '2021 concept calendar 2 ', '21 x 29.8 cm', 500),
(3, 1, 'p1.jpg', 'Neo Manila Poster', '42x30 cm, 200 gsm, frame not included', 300),
(4, 1, 'p2.jpg', 'Morty v Evil Morty Poster', '42x30 cm, 200 gsm, frame not included', 300),
(5, 1, 'p3.jpg', 'Kaneki Ken Poster', '42x30 cm, 200 gsm, frame not included', 300),
(6, 1, 'p4.jpg', 'Yue Poster', '30x42 cm, 200 gsm, frame not included', 300),
(7, 1, 'p5.jpg', 'Saya Poster', '30x42 cm, 200 gsm, frame not included', 300),
(8, 1, 'p6.jpg', 'Quick Paint Series Poster', '30x42 cm, 200 gsm, frame not included', 300),
(9, 1, 'p7.jpg', 'Nayeon Poster', '40x40 cm, 200 gsm, frame not included', 300),
(10, 1, 'p8.jpg', 'Siesta Poster', '40x40 cm, 200 gsm, frame not included', 300),
(11, 1, 'p9.jpg', '手放す Poster', '40x40 cm, 200 gsm, frame not included', 300),
(12, 1, 'p10.jpg', 'Petrichor Poster', '40x40 cm, 200 gsm, frame not included', 300),
(13, 1, 'p11.jpg', 'Fay Poster', '40x40 cm, 200 gsm, frame not included', 300),
(14, 1, 'p12.jpg', 'Wirt Jr. Poster', '40x40 cm, 200 gsm, frame not included', 300),
(15, 5, 'pin1.jpg', 'Kaneki Ken Pin', '1.25inches, glossy finish', 100),
(16, 5, 'pin2.jpg', 'Nayeon Pin', '1.25inches, glossy finish', 100),
(17, 5, 'pin3.jpg', 'Ramona Flowers Pin', '1.25inches, glossy finish', 100),
(18, 5, 'pin4.jpg', 'zgartworks Pin', '1.25inches, glossy finish', 100),
(19, 4, 'tote1.jpg', 'Yue Tote Bag', '14 by 16 inches, Cotton Canvas', 650),
(20, 4, 'tote2.jpg', 'Saya Tote Bag', '14 by 16 inches, Cotton Canvas', 650),
(21, 4, 'tote3.jpg', 'zgartworks Tote Bag', '14 by 16 inches, Cotton Canvas', 500);

-- --------------------------------------------------------

--
-- Table structure for table `merch_type`
--

CREATE TABLE `merch_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merch_type`
--

INSERT INTO `merch_type` (`id`, `type_name`) VALUES
(1, 'Prints'),
(2, 'Calendar'),
(3, 'Stickers'),
(4, 'Tote Bag'),
(5, 'Button Pins'),
(6, 'T-Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `orders_commission`
--

CREATE TABLE `orders_commission` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `commission_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `reference` text NOT NULL,
  `rushed` varchar(3) NOT NULL,
  `purpose` varchar(20) NOT NULL,
  `tos` varchar(3) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_commission`
--

INSERT INTO `orders_commission` (`id`, `email`, `name`, `commission_id`, `description`, `reference`, `rushed`, `purpose`, `tos`, `order_date`, `status`) VALUES
(1, 'rairaine@gmail.com', 'Raine Gulke', 3, 'Make a AOT Levi Ackerman fanart. You are free to do anything', '', 'No', 'Personal', 'yes', '2021-02-24', 'Processing'),
(2, 'wynonazella@gmail.com', 'Wynona  Zella', 5, 'Draw my OC in your style!', 'https://www.newgrounds.com/art/view/bankeron/my-discord-mascot-oc', 'No', 'Commercial', 'yes', '2021-02-24', 'Done'),
(3, 'jensonlavern@gmail.com', 'Jenson Lavern', 6, 'Create anything in impressionistic style.', '', 'No', 'Personal', 'yes', '2021-02-24', 'Declined'),
(4, 'breannagray@gmail.com', 'Breanna Gray', 4, 'Recreate this childhood picture of my younger brother in your style. It is for his birthday soon.', 'https://unsplash.com/photos/_qbmPbsgFRs', 'Yes', 'Personal', 'yes', '2021-02-24', 'Processing'),
(5, 'kkeighley@gmail.com', 'Kean Keighley', 5, 'Draw me in Rick and Morty Style!', 'http://charliecorp.com/media/2007/09/30/CNG_7794.JPG', 'No', 'Personal', 'yes', '2021-02-24', 'Pending'),
(6, 'leonordizon@gmail.com', 'Leonor Dizon', 1, 'Make me an anime style fanart of Pewdiepie. I will be selling prints of it.', '', 'Yes', 'Commercial', 'yes', '2021-02-24', 'Done'),
(8, 'fultonsid@gmail.com', 'Sid Fulton', 3, 'Girl with red eyes and black hoodie with angel wings print on its back.', '', 'No', 'Personal', 'yes', '2021-02-24', 'Pending'),
(9, 'jonahtv@gmail.com', 'Jonah Calvin', 5, 'Recreate my logo in your cartoon style.', 'https://placeit.net/c/logos/stages/gaming-logo-template-featuring-cuphead-inspired-graphics-2957', 'Yes', 'Commercial', 'yes', '2021-02-24', 'Pending'),
(10, 'alelou@gmail.com', 'Alexis Lou', 3, 'Draw my dog in your style! ', 'https://hips.hearstapps.com/harpersbazaaruk.cdnds.net/17/37/2048x1365/gallery-1505467869-winston.jpg?resize=768:*', 'No', 'Personal', 'yes', '2021-02-25', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders_merch`
--

CREATE TABLE `orders_merch` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cart_merch` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_merch`
--

INSERT INTO `orders_merch` (`id`, `email`, `name`, `cart_merch`, `total_price`, `order_date`, `status`) VALUES
(3, 'cody.wilmer@gmail.com', 'Cody Wilmer', 2, 2000, '2021-02-24', 'Done'),
(4, 'prisckayle@gmail.com', 'Kayle Priscilla', 3, 900, '2021-02-24', 'Declined'),
(5, 'jelorde@gmail.com', 'Jerold Lorde', 4, 2150, '2021-02-24', 'Processing'),
(7, 'roldrod@gmail.com', 'Rodney Herold', 6, 1200, '2021-02-24', 'Pending'),
(8, 'flet123@gmail.com', 'Hildred Fletcher', 7, 1150, '2021-02-24', 'Pending'),
(9, 'fue_abby@gmail.com', 'Abby Fue', 8, 1850, '2021-02-24', 'Pending'),
(10, 'chloe1398@gmail.com', 'Chloe Saphire', 9, 900, '2021-02-25', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `pf_style` int(11) NOT NULL,
  `pf_image` varchar(200) NOT NULL,
  `pf_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `pf_style`, `pf_image`, `pf_title`) VALUES
(1, 3, 'a4.jpg', '手放す'),
(2, 4, 'bfin2.jpg', 'Neo Manila '),
(3, 2, 'final.jpg', 'Saya'),
(4, 2, 'v4.3.jpg', 'Yue'),
(5, 3, 'a3.jpg', 'Siesta'),
(6, 2, '1235.jpg', 'Ramona Flowers'),
(7, 5, 'morty2.2.jpg', 'Morty v Evil Morty'),
(8, 4, 'finals.jpg', 'Kaneki Ken'),
(9, 4, 'a1.jpg', 'Nayeon'),
(10, 2, 'bday2.jpg', 'Quarantine Birthday'),
(11, 5, 'jp.jpg', 'Wirt Jr.'),
(12, 6, '2.jpg', 'Psychoanalysis'),
(54, 6, 'reflection.jpg', 'Reflection');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `site` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `site`, `url`) VALUES
(1, 'Facebook', 'https://www.facebook.com/Zgartworks'),
(2, 'Twitter', 'https://www.twitter.com/zgartworks'),
(3, 'Instagram', 'https://www.instagram.com/zgartworks');

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `id` int(11) NOT NULL,
  `style_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`id`, `style_name`) VALUES
(2, 'Paint'),
(3, 'Concept'),
(4, 'Anime'),
(5, 'Cartoon'),
(6, 'Traditional');

-- --------------------------------------------------------

--
-- Table structure for table `tos`
--

CREATE TABLE `tos` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `commission_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tos`
--

INSERT INTO `tos` (`id`, `description`, `commission_status`) VALUES
(1, 'General:\r\n- I have the right to decline any commission requests.\r\n- Artstyle is flexible (price may differ)\r\n- Visual references and descriptions (pose, clothing, composition, and color palette) are highly appreciated!\r\n- Fee for Commercial use commission is different from posted\r\n- commissioned artwork may be posted as sample work or for portfolio.\r\n- Client is entitled to 2 revision before rendering, any more will be charged an additional\r\n\r\nPayment:\r\n- Gcash (Local, Php) and Paypal (International, USD) only.\r\n- You can pay 100% upfront or 50% downpayment to reserve a slot\r\n- The remaining balance shall be paid before i send you the final output via Gdrive/Email.', 'open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `anc`
--
ALTER TABLE `anc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merch` (`merch_id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artstyle1` (`style`);

--
-- Indexes for table `merch`
--
ALTER TABLE `merch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merch type` (`type`);

--
-- Indexes for table `merch_type`
--
ALTER TABLE `merch_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_commission`
--
ALTER TABLE `orders_commission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commission` (`commission_id`);

--
-- Indexes for table `orders_merch`
--
ALTER TABLE `orders_merch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artstyle` (`pf_style`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tos`
--
ALTER TABLE `tos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anc`
--
ALTER TABLE `anc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `merch`
--
ALTER TABLE `merch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `merch_type`
--
ALTER TABLE `merch_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders_commission`
--
ALTER TABLE `orders_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_merch`
--
ALTER TABLE `orders_merch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tos`
--
ALTER TABLE `tos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `merch` FOREIGN KEY (`merch_id`) REFERENCES `merch` (`id`);

--
-- Constraints for table `commission`
--
ALTER TABLE `commission`
  ADD CONSTRAINT `artstyle1` FOREIGN KEY (`style`) REFERENCES `style` (`id`);

--
-- Constraints for table `merch`
--
ALTER TABLE `merch`
  ADD CONSTRAINT `merch type` FOREIGN KEY (`type`) REFERENCES `merch_type` (`id`);

--
-- Constraints for table `orders_commission`
--
ALTER TABLE `orders_commission`
  ADD CONSTRAINT `commission` FOREIGN KEY (`commission_id`) REFERENCES `commission` (`id`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `artstyle` FOREIGN KEY (`pf_style`) REFERENCES `style` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
