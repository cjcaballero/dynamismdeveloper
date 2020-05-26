-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2019 a las 19:27:43
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bocadito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Sandwichones'),
(3, 'Bocadillos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `medio` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `latitud` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `longitud` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `precition` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `medio`, `latitud`, `longitud`, `precition`, `created`, `modified`, `status`) VALUES
(35, 'Chencha', 'chenchis@yahoo.com', '8973918237', 'Acantilado del diable 6969', 'Facebook', '0', '0', '0', '2019-05-14 23:19:54', '0000-00-00 00:00:00', '1'),
(36, 'pedro', 'pedro@tuculo.com', '8903129380', 'jasdkasd dasdas', 'Facebook', '0', '0', '0', '2019-05-15 03:50:53', '0000-00-00 00:00:00', '1'),
(37, 'Rogelio Carrera', 'joel.caballero@bocadito.com', '8125822061', '4420 san agustin apart 6', 'Google', '0', '0', '0', '2019-05-15 14:40:34', '0000-00-00 00:00:00', '1'),
(38, 'sdasdad', 'asdasd', 'asdasd', 'adds', 'Facebook', '0', '0', '0', '2019-05-15 16:56:26', '0000-00-00 00:00:00', '1'),
(39, 'rrrrr', 'rrr', 'rrr', 'rrr', 'Facebook', '26', '0', '0', '2019-05-15 16:57:00', '0000-00-00 00:00:00', '1'),
(40, 'qweqwe', 'qweqwe', 'qweqwe', 'eqwqwe', 'Instagram', '25.6545483', '', '0', '2019-05-15 16:57:56', '0000-00-00 00:00:00', '1'),
(41, 'qweqeqwe', 'eqweqwe', 'qeqe', 'qeqweq', 'Facebook', '25.6545483', '-100.35541450000001', '0', '2019-05-15 16:58:46', '0000-00-00 00:00:00', '1'),
(42, 'ewrewr', 'rwerwe', 'rwer', 'werwe', 'Facebook', '25.6545483', '-100.35541450000001', '4123', '2019-05-15 17:00:27', '0000-00-00 00:00:00', '1'),
(43, 'DADAS', 'DADASS', 'DADASD', 'DADASD', 'Facebook', '25.6545483', '-100.35541450000001', '4123', '2019-05-15 17:19:28', '0000-00-00 00:00:00', '1'),
(44, 'DADAS', 'DADASS', 'DADASD', 'DADASD', 'Facebook', '25.6545483', '-100.35541450000001', '4123', '2019-05-15 17:23:12', '0000-00-00 00:00:00', '1'),
(45, 'DADAS', 'DADASS', 'DADASD', 'DADASD', 'Facebook', '25.6545483', '-100.35541450000001', '4123', '2019-05-15 17:29:07', '0000-00-00 00:00:00', '1'),
(46, 'DADAS', 'DADASS', 'DADASD', 'DADASD', 'Facebook', '25.6545483', '-100.35541450000001', '4123', '2019-05-15 17:30:14', '0000-00-00 00:00:00', '1'),
(47, 'sdsadasd', 'asdasdas@yahoo.com', '2133123', '3123123123', 'Facebook', '25.6545483', '-100.35541450000001', '4123', '2019-05-15 17:33:43', '0000-00-00 00:00:00', '1'),
(48, 'Carlin Cab', 'watitas0529@gmail.com', '8125822061', '4420 san agustin apart 6', 'Facebook', '25.6536786', '-100.3508411', '32', '2019-05-15 18:16:50', '0000-00-00 00:00:00', '1'),
(49, 'adsasdd', 'kjdhjdhdj@hotmail.com', '213123123', '213123123', 'Facebook', '25.65352725266552', '-100.35076755601987', '94', '2019-05-15 18:23:54', '0000-00-00 00:00:00', '1'),
(50, 'adsasdd', 'kjdhjdhdj@hotmail.com', '213123123', '213123123', 'Facebook', '25.65352725266552', '-100.35076755601987', '94', '2019-05-15 18:23:54', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(15, 'Sandwichon Poblano', 'Relleno de Cagada', 350, 'b3.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(28, 35, 250.00, '2019-05-15 03:50:19', '2019-05-15 01:21:16', '0'),
(29, 36, 350.00, '2019-05-15 03:50:56', '2019-05-15 05:50:56', '1'),
(30, 37, 350.00, '2019-05-15 14:40:41', '2019-05-15 16:40:41', '1'),
(31, 37, 700.00, '2019-05-15 16:47:17', '2019-05-15 18:47:17', '1'),
(32, 37, 350.00, '2019-05-15 16:52:41', '2019-05-15 18:52:41', '1'),
(33, 37, 1050.00, '2019-05-15 16:55:28', '2019-05-15 18:55:28', '1'),
(34, 42, 2100.00, '2019-05-15 17:10:12', '2019-05-15 19:10:12', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(12, 28, 14, 1),
(13, 29, 15, 1),
(14, 30, 15, 1),
(15, 31, 15, 2),
(16, 32, 15, 1),
(17, 33, 15, 3),
(18, 34, 15, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user`, `password`, `date`, `status`) VALUES
(1, 'Carlos Caballero', 'ing.carloscaballero@outlook.com', 'ccaballero', '123456', '2019-05-15 14:22:02', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
