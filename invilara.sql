-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2025 a las 21:08:17
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
-- Base de datos: `invilara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `id_gerencia` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `id_gerencia`, `id_estado`) VALUES
(60, 1, 1),
(61, 1, 1),
(62, 1, 1),
(63, 1, 1),
(64, 1, 1),
(65, 1, 1),
(66, 1, 1),
(67, 1, 1),
(68, 1, 1),
(69, 21, 1),
(70, 1, 1),
(71, 1, 1),
(72, 1, 1),
(73, 1, 1),
(74, 21, 1),
(75, 21, 1),
(76, 1, 1),
(77, 1, 1),
(78, 1, 1),
(79, 21, 1),
(80, 1, 1),
(81, 1, 1),
(82, 1, 1),
(83, 1, 1),
(84, 1, 1),
(85, 1, 1),
(86, 1, 2),
(87, 21, 1),
(88, 1, 1),
(89, NULL, 1),
(90, 21, 2),
(91, 1, 1),
(92, 1, 2),
(93, NULL, 1),
(94, NULL, 1),
(95, NULL, 1),
(96, NULL, 1),
(97, NULL, 1),
(98, NULL, 1),
(99, NULL, 1),
(100, NULL, 1),
(101, NULL, 1),
(102, NULL, 1),
(103, NULL, 1),
(104, NULL, 3),
(105, NULL, 3),
(106, NULL, 1),
(107, NULL, 3),
(108, NULL, 3),
(109, 1, 3),
(110, 21, 3),
(111, 1, 3),
(112, 1, 2),
(113, NULL, 1),
(114, 1, 2),
(115, 1, 2),
(116, NULL, 1),
(117, NULL, 3),
(118, NULL, 1),
(119, 1, 3),
(120, 1, 3),
(121, 21, 3),
(122, 21, 3),
(123, 21, 3),
(124, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidad`
--

CREATE TABLE `comunidad` (
  `id` int(11) NOT NULL,
  `id_parroquia` int(11) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `representante` varchar(100) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `rif` varchar(20) DEFAULT NULL,
  `ambito` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comunidad`
--

INSERT INTO `comunidad` (`id`, `id_parroquia`, `tipo`, `nombre`, `direccion`, `representante`, `correo`, `telefono`, `rif`, `ambito`) VALUES
(42, 38, 'Organización comunal', 'Parque Baradida', 'Carrera 7, calle 7', 'Carlos Mujicaz', 'hola@gmail.com', '325233263346', 'C-64364346-3', 'Es un parque.'),
(43, 37, 'UBCH', 'Urbanización Nueva Paz', 'Caracas', 'Yeah', 'hola@gmail.com', '0414-3262362', 'E-36363266-5', 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `cedula` int(11) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`cedula`, `direccion`, `nombre`, `telefono`, `correo`) VALUES
(11222333, 'Urb. 7 con calle 3', 'Carlos Jimenez', '412-134-4364', 'hola@gmail.com'),
(23636326, 'asfasfa', 'Roberto', '365-236-3277', 'hola@gmail.com'),
(30528058, 'morrocoy mi casa chuaaa', 'Freider Guedez', '426-795-5615', 'freiderstevenguedezherrera@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerencia`
--

CREATE TABLE `gerencia` (
  `id` int(11) NOT NULL,
  `cedula_gerente` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gerencia`
--

INSERT INTO `gerencia` (`id`, `cedula_gerente`, `nombre`, `direccion`) VALUES
(1, 11222333, 'Hidrolara', 'Parroquias'),
(21, 11222333, 'Servitel', 'Torres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerente`
--

CREATE TABLE `gerente` (
  `cedula` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gerente`
--

INSERT INTO `gerente` (`cedula`, `telefono`, `correo`, `direccion`, `nombre`) VALUES
(11222333, '412-134-4364', 'hola@gmail.com', 'Caracas', 'Pedro Jimenez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id` int(11) NOT NULL,
  `cedula_director` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id`, `cedula_director`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(1, 11222333, 'Bellas Artes', 'hola@gmail.com', '412-134-4364', 'Caracas'),
(20, 30528058, 'Escuela', 'chua@gmail.com', '0426-7955615', 'morrocoy mi casa chuaaa'),
(21, 11222333, 'Roberto ', 'hola@gmail.com', '0414-3626231', 'asfasfgsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `nombre`) VALUES
(2, 'Andrés Eloy Blanco'),
(3, 'Urdaneta'),
(18, 'Irribarren'),
(21, 'Crespo'),
(22, 'Torres'),
(23, 'Jiménez'),
(24, 'Morán'),
(25, 'Palavecino'),
(26, 'Simón Planas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id` int(11) NOT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id`, `id_municipio`, `nombre`) VALUES
(1, 26, 'Sarare'),
(35, 22, 'Altragracia'),
(36, 22, 'Antonio Díaz'),
(37, 2, 'Quebrada Honda De Guache'),
(38, 2, 'Pío Tamayo'),
(39, 25, 'Cabudare'),
(40, 18, 'Aguedo Felipe Alvarado'),
(41, 21, 'José María Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitante`
--

CREATE TABLE `solicitante` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitante`
--

INSERT INTO `solicitante` (`cedula`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(11985184, 'Veronika Chifflet', 'hola@gmail.com', '412-134-4364', 'Calle 7'),
(12239200, 'Maria Belnadez', 'hola@gmail.com', '412-447-4248', 'Calle 9'),
(87545879, 'Juan', 'Juan@gmail.com', '412-898-2456', 'Calle principal entre Av 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` varchar(30) NOT NULL,
  `id_comunidad` int(11) DEFAULT NULL,
  `id_asignacion` int(11) DEFAULT NULL,
  `id_institucion` int(11) DEFAULT NULL,
  `cedula_solicitante` int(11) DEFAULT NULL,
  `tipo_solicitud` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `problematica` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `id_comunidad`, `id_asignacion`, `id_institucion`, `cedula_solicitante`, `tipo_solicitud`, `fecha`, `problematica`) VALUES
('LO-12464', 43, 113, NULL, 11985184, 1, '2024-11-04', 'Hay un problema.'),
('LS-7523', 43, 89, NULL, 11985184, 2, '2024-10-16', 'Hay un problema.'),
('SFA-236322623', 43, 119, 20, NULL, 3, '2025-03-21', 'Hola'),
('TEST-123', 43, 122, NULL, 11985184, 1, '2025-03-21', 'Problema'),
('TEST-5656', 42, 124, NULL, 12239200, 2, '2025-03-21', 'Problema'),
('TEST-789', 42, 123, 20, NULL, 3, '2025-03-21', 'Problema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estado`
--

CREATE TABLE `tipo_estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_estado`
--

INSERT INTO `tipo_estado` (`id`, `nombre`) VALUES
(1, 'En programación'),
(2, 'En ejecución'),
(3, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`id`, `nombre`) VALUES
(1, 'general'),
(2, '1x10'),
(3, 'institucional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(11) NOT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `contrasena`, `rol`) VALUES
(11111111, '11111111', 2),
(22222222, '22222222', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignacion_gerencia_FK` (`id_gerencia`),
  ADD KEY `asignacion_tipo_estado_FK` (`id_estado`);

--
-- Indices de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comunidad_parroquia_FK` (`id_parroquia`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `gerencia_gerente_FK` (`cedula_gerente`);

--
-- Indices de la tabla `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `institucion_director_FK` (`cedula_director`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `parroquia_municipio_FK` (`id_municipio`);

--
-- Indices de la tabla `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud_comunidad_fk` (`id_comunidad`),
  ADD KEY `solicitud_institucion_fk` (`id_institucion`),
  ADD KEY `solicitud_asignacion_FK` (`id_asignacion`),
  ADD KEY `solicitud_solicitante_FK` (`cedula_solicitante`),
  ADD KEY `solicitud_tipo_solicitud_FK` (`tipo_solicitud`);

--
-- Indices de la tabla `tipo_estado`
--
ALTER TABLE `tipo_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT de la tabla `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_tipo_estado_FK` FOREIGN KEY (`id_estado`) REFERENCES `tipo_estado` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `comunidad`
--
ALTER TABLE `comunidad`
  ADD CONSTRAINT `comunidad_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `gerencia`
--
ALTER TABLE `gerencia`
  ADD CONSTRAINT `gerencia_gerente_FK` FOREIGN KEY (`cedula_gerente`) REFERENCES `gerente` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_director_FK` FOREIGN KEY (`cedula_director`) REFERENCES `director` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_municipio_FK` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_asignacion_FK` FOREIGN KEY (`id_asignacion`) REFERENCES `asignacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_comunidad_fk` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_institucion_fk` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_solicitante_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `solicitante` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_tipo_solicitud_FK` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitud` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
