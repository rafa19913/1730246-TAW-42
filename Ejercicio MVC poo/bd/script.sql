-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2020 a las 20:22:51
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
-- Base de datos: `ejercicio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id` int(4) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`) VALUES
(1, 'ITI'),
(2, 'MECA'),
(3, 'Filosofía'),
(4, 'Letras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(5) NOT NULL,
  `cedula` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `promedio` float NOT NULL,
  `edad` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `id_carrera` int(4) NOT NULL,
  `id_universidad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `cedula`, `nombre`, `apellidos`, `promedio`, `edad`, `fecha`, `id_carrera`, `id_universidad`) VALUES
(7, 'asdfaskdfnljkasdfasdf', 'José Rafael', 'Perez Rodríguez', 85, 20, '2020-05-22', 1, 1),
(8, 'gramdd', 'Paola gg', 'Torres Gudiño', 90, 21, '2020-05-22', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `id` int(4) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id`, `nombre`) VALUES
(1, 'UPV'),
(2, 'TECC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad_carrera`
--

CREATE TABLE `universidad_carrera` (
  `id` int(11) NOT NULL,
  `id_universidad` int(4) NOT NULL,
  `id_carrera` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `universidad_carrera`
--

INSERT INTO `universidad_carrera` (`id`, `id_universidad`, `id_carrera`) VALUES
(3, 1, 1),
(4, 1, 2),
(1, 2, 3),
(2, 2, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_universidad` (`id_universidad`),
  ADD KEY `id_carrera` (`id_carrera`) USING BTREE;

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidad_carrera`
--
ALTER TABLE `universidad_carrera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_universidad` (`id_universidad`,`id_carrera`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `universidad_carrera`
--
ALTER TABLE `universidad_carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`id_universidad`) REFERENCES `universidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `universidad_carrera`
--
ALTER TABLE `universidad_carrera`
  ADD CONSTRAINT `universidad_carrera_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `universidad_carrera_ibfk_2` FOREIGN KEY (`id_universidad`) REFERENCES `universidad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
