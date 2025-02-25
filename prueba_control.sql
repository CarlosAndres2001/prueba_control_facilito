-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2025 a las 00:03:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rubro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `rubro`) VALUES
(1, 'datec', 'tecnologico'),
(2, 'datec', 'tecnologico'),
(3, 'control facilito', 'tecnologico'),
(4, 'el solar ', 'informática'),
(5, 'cordes', 'salud'),
(6, 'hp', 'te'),
(7, 'casacolor', 'pintura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `empresa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `correo`, `contrasena`, `empresa_id`) VALUES
(1, 'andres', 'andres@gmail.com', '12345', 1),
(2, 'jhon', 'jhon@gmail.com', '$2y$10$nfaNiL5wXF5mm0R4fi8SS.0ltM.CC9JApO.upPP5IZ7Sh117wmxPS', 1),
(3, 'karol', 'karol@gmail.com', '$2y$10$4k6VST8mbJ8vncgVhc3TwODUye0Q.dpFKJE3uYMgJi3S059YymLLS', 1),
(4, 'alkfnoae', 'apoeifhipwef@gmcil.com', '$2y$10$2mYDD9yuVynyTq0ksz6bs.Z/GLUsod7zd95pnavCKfycuEfoawOcO', 1),
(5, 'joseandt', 'jhosep@gmail.com', '$2y$10$crhkIvYETCMahKpk1K.0V..BFB02x0HNz8iu2IlJbQJVDdUKa9nAC', 1),
(6, 'andres', 'admin', '$2y$10$FDUWQCuLWAmt8HY0iYM26.JVcw4qFjcIO.4IV9sPWqYPx33MNTi8W', 1),
(12, 'andres', 'sdfwd@gmail.com', '$2y$10$t5FJlTPi3G7OX9gQcEhRh.UcSjXm/fsdKKc6mCMqIbSTob8411mJK', 1),
(14, 'hazz', 'hazz@gmai.com', '$2y$10$7sNyvsjqGOqcWpLeLobT2uU0dXsxHevbpcN4lD0ekTBqrdVOSrfFS', 2),
(16, 'leo', 'wkenfwefn@gmail.com', '$2y$10$izrCEPPmgkzY6MfAYCXFMei3qW6u6FtRiAM3TPQuJt4vqJBvvIEq.', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
