-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-04-2023 a las 10:16:13
-- Versión del servidor: 8.0.33
-- Versión de PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nesher_live`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image_product`
--

CREATE TABLE `image_product` (
  `product_id` int UNSIGNED NOT NULL,
  `image_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `image_product`
--

INSERT INTO `image_product` (`product_id`, `image_id`) VALUES
(2, 94),
(2, 137),
(4, 100),
(4, 205),
(5, 208),
(5, 209),
(6, 127),
(8, 167),
(9, 125),
(10, 126),
(11, 121),
(11, 122),
(13, 165),
(14, 113),
(15, 114),
(15, 115),
(16, 116),
(17, 171),
(17, 188),
(18, 117),
(19, 118),
(20, 212),
(20, 213),
(20, 214),
(21, 217),
(21, 218),
(21, 219),
(22, 79),
(24, 139),
(26, 132),
(27, 222),
(27, 223),
(27, 224),
(27, 225),
(28, 173),
(29, 130),
(30, 228),
(30, 229),
(31, 145),
(31, 146),
(32, 155),
(32, 158),
(32, 159),
(33, 169),
(34, 177),
(34, 189),
(35, 179),
(36, 181);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`product_id`,`image_id`),
  ADD KEY `IDX_465A53714584665A` (`product_id`),
  ADD KEY `IDX_465A53713DA5256D` (`image_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `FK_465A53713DA5256D` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_465A53714584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
