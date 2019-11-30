-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 19:51:45
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
  `fecha_hora` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `nombre`, `primer_apellido`, `segundo_apellido`, `fecha_hora`, `tratamiento`) VALUES
(23, 'OSCAR OCTAVIO', 'MARSICAL', 'CORNEJO', '2019-12-10 10:00', 'Extracción'),
(24, 'MONICA', 'IÑIGUES', 'ECHEVERRIA', '2020-01-08 09:00', 'Amalgama'),
(25, 'MIA', 'DOMINGUEZ', 'GALINDO', '2019-12-16 11:30', 'Extracción');

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
(25, 'MANUEL', 'LÓPEZ', 'LOMELI', 23, '3335968379', 'lopezmanue_lomeli@gmail.com', 'Recina', '2019-01-19'),
(26, 'MARÍA GUADALUPE', 'TORRES', 'CASTILLO', 57, '3317580787', 'almcastillo@gmail.com', 'Recina', '2019-02-25'),
(27, 'ELIA', 'BARRAGAN', 'CUERVO', 61, '3311933558', 'barragancuervos@gmail.com', 'Corona', '2019-03-19'),
(28, 'ALEJANDRO', 'GONZALES', 'GOMEZ', 61, '3338209592', '', 'Endodoncia', '2019-04-19'),
(30, 'RUTH', 'CURIEL', 'ALMANSA', 55, '2233445566', 'ruthiruth@gmail.com', 'Prótesis', '2019-05-19'),
(31, 'GLORIA', 'BRAVO', 'MARQUÉZ', 48, '3335061007', 'bravosmar@gmail.com', 'Endodoncia', '2019-06-19'),
(32, 'CLAUDIA', 'GALVAN', 'ORO', 35, '3313079993', 'galvanclaudiaOro@gmail.com', 'Extracción', '2019-07-19'),
(33, 'OSCAR OCTAVIO', 'MARSICAL', 'CORNEJO', 27, '3322413512', 'conejomariscal@gmail.com', 'Extracción', '2019-08-19'),
(34, 'TERESA', 'RUBIO', 'GIJON', 35, '3320557819', 'gijonrubio@gmail.com', 'Endodoncia', '2019-09-19'),
(35, 'MIRIAM', 'LÓPEZ', 'HERNANDEZ', 17, '3320524971', '', 'Extracción', '2019-10-19'),
(36, 'MONICA', 'IÑIGUES', 'ECHEVERRIA', 41, '3312559117', 'monicaecheigues@gmail.com', 'Amalgama', '2019-11-19'),
(37, 'GUADALUPE', 'VARGAS', 'ALLUE', 63, '3311314151', 'lupeallue@gmail.com', 'Endodoncia', '2019-11-19'),
(38, 'DANIEL', 'ADOÑO', 'PONCE', 11, '36944006', '', 'Brackets', '2019-11-19'),
(39, 'IVAN', 'MORALES', 'HORTA', 27, '15914803', 'ivanseta1112@gmail.com', 'Endodoncia', '2019-11-19'),
(40, 'ELIZABETH', 'CORONA', 'MURIEL', 13, '3314570898', 'elymuri00@gmail.com', 'Brackets', '2019-11-19'),
(41, 'MIA', 'DOMINGUEZ', 'GALINDO', 8, '3314770754', '', 'Extracción', '2019-11-19'),
(42, 'MARTIN', 'SANCHEZ', 'BUSTAMANTE', 68, '3338228976', 'martinssbus@gmail.com', 'Amalgama', '2019-11-19'),
(43, 'MARGARITA', 'RODRIGUEZ', 'RAMIREZ', 56, '36121816', '', 'Recina', '2019-11-19'),
(44, 'ANDREA', 'LOMELI', 'LOMELI', 22, '3319869931', 'lomeliandy@gmail.com', 'Extracción', '2019-11-19'),
(45, 'JORGE EDUARDO PENDIENTE', 'GONZALES', 'GALLO', 16, '1122334455', '', 'Endodoncia', '2019-11-19'),
(46, 'GUADALUPE', 'MORA', 'CASTRO', 49, '3332003886', '', 'Corona', '2019-11-19'),
(48, 'HUGO', 'PEREZ', 'SOLIS', 54, '2223541804', '', 'Recina', '2019-11-19'),
(49, 'ARTURO', 'RODRIGUEZ', 'CORNEJO', 58, '5566778899', '', 'Corona', '2019-11-19'),
(50, 'MARIEL', 'CORTES', 'PEREZ', 16, '3326791218', 'maricortes123@gmail.com', 'Brackets', '2019-11-19'),
(57, 'ANA KAREN', 'RUIZ', 'BARRIOS', 23, '2343231312', 'karen@gmail.com', 'Brackets', '2019-11-22'),
(64, 'MARIA ELENA', 'ROBLES', 'CAMPOS', 33, '3344993339', 'elena@gmail.com', 'Limpieza', '2019-07-10'),
(70, 'JESÚS', 'CAMACHO', 'LÓPEZ', 34, '3342785678', 'camachoschuy@gmail.com', 'Amalgama', '2018-05-08'),
(72, 'JESÚS', 'CAMACHO', 'LÓPEZ', 34, '3342585678', 'camachoschuy@gmail.com', 'Amalgama', '2018-05-08'),
(73, 'SALVADOR', 'NAVA', 'GALVEZ', 65, '3312983729', '', 'Corona', '2018-03-02'),
(74, 'MONSERRAT', 'CARRIL', 'TERRON', 34, '3388799146', 'unanueva.alma@gmail.com', 'Brackets', '2018-04-29'),
(75, 'ANTONIA', 'RAMA', 'QUIROGA', 18, '3328854664', 'quiroga_rama_antonia12@gmail.com', 'Limpieza', '2019-08-08'),
(76, 'FRANCISCA', 'FRANCO', 'BALDE', 48, '3377331648', 'francisca99franco@gmail.com', 'Limpieza', '2019-03-25'),
(77, 'ANA MARÍA', 'BENITO', 'LORENTE', 33, '3333141517', 'danamaria0010@gmail.com', 'Limpieza', '2018-07-28'),
(78, 'MARÍA ISABEL', 'GORDO', 'GUIRAO', 41, '3322797946', 'bellamaría78@gmail.com', 'Amalgama', '2018-07-16'),
(79, 'TERESA', 'MARTOREL', 'JARA', 41, '3311266348', 'lucesteresa46@gmail.com', 'Corona', '2018-10-28'),
(80, 'MARÍA MERCEDES', 'CEBALLOS', 'PERALES', 55, '3356457231', '', 'Corona', '2018-07-14'),
(81, 'NEREA', 'OLIVEROS', 'VALENCIA', 34, '3378781224', 'nerea.valencia88@gmail.com', 'Limpieza', '2018-07-13');

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
(1, 'Blanca Estela', 'blanca2726', 'admi123', 'Administrador', '', 1, '0000-00-00 00:00:00', '2019-11-30 18:51:11');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `telefono` (`telefono`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
