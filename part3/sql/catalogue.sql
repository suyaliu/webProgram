--
-- Database: `shoestore` and php web application user
-- referance lecture teacher w13 example
--
CREATE DATABASE shoestore;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON shoestore.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE shoestore;

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `product_id` int(11) NOT NULL,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `color` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `category` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Data for table `catalogue`
--

INSERT INTO `catalogue` (`product_id`, `image`, `model`, `stock`, `color`, `rating`, `category`, `price`) VALUES
(1, 'image/FLUFF_YEAR_SLIDE_125.jpg', 'FLUFF YEAR SLIDE', 10, 'red', 5, 'lady', '15.00'),
(2, 'image/oh-year-125-10.jpg', 'OH YEAR', 8, 'pink', 4, 'lady', '86.00'),
(3, 'image/Scuffette_II-105-2.webp', 'CALI COLLAGE', 10, 'black', 3, 'lady', '231.00'),
(4, 'image/men-BLacK_butte.webp', 'BLacK_butte', 3, 'black', 2, 'men', '130.00'),
(5, 'image/men-brown-union-CHElsea_2.webp', 'Chelsea', 3, 'Balck', 2, 'men', '725.00'),
(6, 'image/men-brown_190.webp', 'Classic', 3, 'brown', 2, 'men', '190.00'),
(7, 'image/classic-clear-mini-190-6.webp', 'Classic II', 10, 'brown', 1, 'Kids', '25.00'),
(8, 'image/kids-blue-Gradient.jpg', 'Gradient', 10, 'blue', 5, 'kid', '85.00'),
(9, 'image/kids_fluff_rainbow.webp', 'fluff_rainbow', 10, 'red', 5, 'kid', '65.00');