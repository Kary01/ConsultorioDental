-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2019 a las 19:38:10
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `fecha`, `hora`, `tratamiento`) VALUES
(1, 'Karen', 'Ruiz', 'Barrios', '0000-00-00', '8:30 AM', 'Brackets'),
(2, 'KAREN', 'RUIZ', 'BARRIOS', '2019-11-19', '12:30 PM', 'Brackets'),
(3, 'MARTIN', 'RUIZ', 'BARRIOS', '2019-11-19', '11:00 AM', 'Extracción'),
(4, 'NATALY', 'RUIZ', 'BARRIOS', '2019-11-19', '3:00 PM', 'Recina'),
(5, 'NATALY', 'RUIZ', 'BARRIOS', '2019-11-14', '2:30 PM', 'Extracción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `edad`, `telefono`, `correo`, `tratamiento`, `fecha_registro`) VALUES
(21, 'MARTA OLIVIA', 'SANCHES', '', 43, '3310100124', '', 'Ortodoncia', '2019-11-19'),
(22, 'GUSTAVO', 'MURILLO', '', 31, '3328674750', '', 'Recina', '2019-11-19'),
(23, 'MONTSE', 'CUEVAS', '', 31, '3310394395', '', 'Endodoncia', '2019-11-19'),
(24, 'ISMAEL', 'CHAVES', '', 55, '6421512694', '', 'Endodoncia', '2019-11-19'),
(25, 'MANUEL', 'LOPEZ', 'RUIZ', 55, '3335968379', '', 'Recina', '2019-11-19'),
(26, 'MARÍA GUADALUPE', 'RUIZ', '', 57, '3317580787', '', 'Recina', '2019-11-19'),
(27, 'ELIA', 'BARRAGAN', '', 61, '3311933558', '', 'Prótesis', '2019-11-19'),
(28, 'ALEJANDRO', 'GONZALES', '', 61, '3338209592', '', 'Endodoncia', '2019-11-19'),
(29, 'ALEJANDRO', 'GONZALES', '', 61, '3338209592', '', 'Endodoncia', '2019-11-19'),
(30, 'RUTH', 'CURIEL', 'PENDIENTE', 55, '2233445566', '', 'Limpieza', '2019-11-19'),
(31, 'GLORIA', 'BRAVO', '', 48, '3335061007', '', 'Endodoncia', '2019-11-19'),
(32, 'CLAUDIA', 'GALVAN', '', 35, '3313079993', '', 'Extracción', '2019-11-19'),
(33, 'OSCAR OCTAVIO', 'MARSICAL', '', 27, '3322413512', '', 'Extracción', '2019-11-19'),
(34, 'TERESA', 'RUBIO', '', 35, '3320557819', '', 'Endodoncia', '2019-11-19'),
(35, 'MIRIAM', 'LOPEZ', 'HERNANDEZ', 17, '3320524971', '', 'Extracción', '2019-11-19'),
(36, 'MONICA', 'IÑIGUES', '', 41, '3312559117', '', 'Amalgama', '2019-11-19'),
(37, 'GUADALUPE', 'VARGAS', '', 63, '3311314151', '', 'Endodoncia', '2019-11-19'),
(38, 'DANIEL', 'ADOÑO', 'PONCE', 11, '36944006', '', 'Brackets', '2019-11-19'),
(39, 'IVAN', 'MORALES', '', 27, '15914803', '', 'Endodoncia', '2019-11-19'),
(40, 'ELIZABETH', 'CORONA', '', 13, '3314570898', '', 'Brackets', '2019-11-19'),
(41, 'MIA', 'DOMINGUEZ', '', 8, '3314770754', '', 'Extracción', '2019-11-19'),
(42, 'MARTIN', 'SANCHEZ', '', 68, '3338228976', '', 'Amalgama', '2019-11-19'),
(43, 'MARGARITA', 'RODRIGUEZ', 'RAMIRES', 56, '36121816', '', 'Recina', '2019-11-19'),
(44, 'ANDREA', 'LOMELI', '', 22, '3319869931', '', 'Extracción', '2019-11-19'),
(45, 'JORGE EDUARDO PENDIENTE', 'GONZALES', 'GALLO', 16, '1122334455', '', 'Endodoncia', '2019-11-19'),
(46, 'GUADALUPE', 'MORA', '', 49, '3332003886', '', 'Corona', '2019-11-19'),
(48, 'HUGO', 'PEREZ', '', 54, '2223541804', '', 'Recina', '2019-11-19'),
(49, 'ARTURO', 'RODRIGUEZ', 'PENDIENTE', 58, '5566778899', '', 'Corona', '2019-11-19'),
(50, 'MARIEL', 'CORTES', '', 16, '3326791218', '', 'Brackets', '2019-11-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Usuario Administrador', 'blanca2726', 'admi123', 'Administrador', '', 1, '0000-00-00 00:00:00', '2019-11-14 16:31:54'),
(3, 'Alan', 'alan12345', '12345', 'usuario', '', 1, '0000-00-00 00:00:00', '2019-11-15 02:42:42'),
(4, 'Alan', 'alan12345', '12345', 'usuario', '', 1, '0000-00-00 00:00:00', '2019-11-15 02:43:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
