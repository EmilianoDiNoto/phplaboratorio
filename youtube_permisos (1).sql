-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 07-11-2024 a las 21:39:13
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
-- Base de datos: `youtube_permisos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CLAVE` varchar(40) NOT NULL,
  `NIVEL` enum('user','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `EMAIL`, `CLAVE`, `NIVEL`) VALUES
(1, 'user@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user'),
(2, 'guest@email.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user'),
(3, 'admin@email.com', 'd5f12e53a182c062b6bf30c1445153faff12269a', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos_youtube`
--

CREATE TABLE `videos_youtube` (
  `id` int(11) NOT NULL,
  `url_video` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videos_youtube`
--

INSERT INTO `videos_youtube` (`id`, `url_video`, `estado`, `fecha_creacion`) VALUES
(1, 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 0, '2024-11-07 00:08:44'),
(2, 'https://www.youtube.com/watch?v=cVLTIsx2JeA', 1, '2024-11-07 00:10:40'),
(3, 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 1, '2024-11-07 02:13:36'),
(4, 'https://www.youtube.com/watch?v=raaOguebvE8', 1, '2024-11-07 02:13:36'),
(5, 'https://www.youtube.com/watch?v=tjH-KxSHgBc&t=607s', 1, '2024-11-07 02:13:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indices de la tabla `videos_youtube`
--
ALTER TABLE `videos_youtube`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `videos_youtube`
--
ALTER TABLE `videos_youtube`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
