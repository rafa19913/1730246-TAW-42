-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2020 a las 08:51:50
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `description_category` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name_category`, `description_category`, `date_added`) VALUES
(1, 'refrescos', 'Aquí se encuentran todo tipo de refrescos, Coca Cola, Doctor Pepper, etc.', '2020-06-13'),
(2, 'tacos', 'tacos de todo tipo', '2020-06-14'),
(3, 'computadoras', 'computadoras de todo ', '2020-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `note` varchar(255) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `date`, `note`, `reference`, `quantity`) VALUES
(3, 1, 2, '2020-06-14', 'rafael rdzagrego/compro', 'test', 50),
(4, 1, 2, '2020-06-14', 'rafael rdzagrego/compro', 'cambio de nombre', 50),
(6, 2, 2, '2020-06-14', 'rafael rdzagrego/compro', 'agregue 10 de stock al seven up', 10),
(7, 1, 2, '2020-06-14', 'rafael rdzagrego/compro', 'agregue 5 de stock a coca cola', 5),
(8, 1, 2, '2020-06-14', 'rafael rdzquito', 'quité 5 ', 5),
(9, 1, 2, '2020-06-14', 'rafael rdzquito', 'quité 10', 10),
(10, 1, 2, '2020-06-14', 'rafael rdzagrego/compro', 'modifque de 40 a 45 stock', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `code_product` char(20) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `price_product` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `code_product`, `name_product`, `date_added`, `price_product`, `stock`, `id_category`) VALUES
(1, '123', 'coca cola', '2020-06-13', 15, 45, 1),
(2, '325', 'Seven Up', '2020-06-13', 12, 60, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `date_addeed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `perfil`, `firstname`, `lastname`, `user_name`, `user_password`, `user_email`, `date_addeed`) VALUES
(2, 'admin', 'rafael', 'rdz', 'admin', '$2y$10$e457ry0tWncUAlQUug.kmuCJVIH3w8RuT3/srUflw6uwtP5xcx1Qa', 'rafa@hotmail.com', '0000-00-00'),
(7, 'cajero', 'cajero', 'cajero', 'cajero', '$2y$10$SOE.uBxcOaDycruoyZGCCOJvVDc7nc4UgAVAeRj0XaU4wWddR6Ksq', 'cajero@hotmail.com', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
