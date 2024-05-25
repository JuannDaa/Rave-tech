-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2024 a las 21:41:14
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rave-tech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(100) NOT NULL,
  `descuento` tinyint(3) NOT NULL DEFAULT 0,
  `id_categoria` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `descuento`, `id_categoria`, `activo`) VALUES
(1, 'Portátil Gamer ASUS TUF FX506L', '<b>Caracteristicas:</b><br>\r\n<ul>\r\n<li>Procesador Intel Core i5 10300H</li>\r\n<li>Tarjeta de Video: GTX 1650 4GB</li>\r\n<li>Memoria RAM: 8GB DDR4</li>\r\n<li>Almacenamiento 1: SSD 512GB PCIe NVME</li>\r\n<li>Pantalla de 15,6\" FHD 144Hz</li>\r\n<li>Teclado: Latinoamericano</li>\r\n</ul>', 3200000, 10, 1, 1),
(2, 'Portátil ACER Nitro 5 AN515', '<b>Caracteristicas:</b><br>\n<ul>\n<li>Procesador: Intel Core i5-10300H</li>\n<li>Tarjeta de Video: GTX 1650 4GB</li>\n<li>Memoria RAM: 8GB DDR4</li>\n<li>Almacenamiento 1: SSD 512GB PCIe NVME</li>\n<li>Pantalla: 15,6\" FHD</li>\n<li>Teclado: Latinoamericano</li>\n<li>Software: SO Windows 10 Home Single</li>\n</ul>', 3400000, 12, 1, 1),
(3, 'Portatil MSI GP76 Leopard', '<b>Caracteristicas:</b><br>\r\n<ul>\r\n<li>Procesador: Intel Core i7 11800H</li>\r\n<li>Tarjeta de Video: RXT 3070 8GB</li>\r\n<li>Memoria RAM: 16GB (8GB*2) DDR4</li>\r\n<li>Almacenamiento: 1 TBSSD</li>\r\n<li>Pantalla: Panel Led 17.3 FHD anti-glare, IPS – level, 240hz</li>\r\n<li>Teclado: Latinoamericano</li>\r\n</ul>', 10980000, 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` int(30) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
