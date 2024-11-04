-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2024 at 12:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invilara`
--

-- --------------------------------------------------------

--
-- Table structure for table `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int NOT NULL,
  `id_gerencia` int DEFAULT NULL,
  `id_institucion_remitente` int DEFAULT NULL,
  `estado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asignacion`
--

INSERT INTO `asignacion` (`id`, `id_gerencia`, `id_institucion_remitente`, `estado`) VALUES
(60, 1, 1, 'En programación'),
(61, 1, 1, 'Programado'),
(62, 1, 1, 'Programado'),
(63, 1, 1, 'Programado'),
(64, 1, 1, 'En programación'),
(65, 1, 1, 'En programación'),
(66, 1, 1, 'En programación'),
(67, 1, 1, 'En programación'),
(68, 1, 1, 'En programación'),
(69, 21, 1, 'En programación'),
(70, 1, 1, 'En programación'),
(71, 1, 1, 'En programación'),
(72, 1, 1, 'En programación'),
(73, 1, 1, 'En programación'),
(74, 21, 1, 'En programación'),
(75, 21, 1, 'En programación'),
(76, 1, 1, 'En programación'),
(77, 1, 1, 'En programación'),
(78, 1, 1, 'En programación'),
(79, 21, 1, 'En programación'),
(80, 1, 1, 'En programación'),
(81, 1, 1, 'Programado'),
(82, 1, 1, 'Programado'),
(83, 1, 1, 'Programado'),
(84, 1, 1, 'Programado'),
(85, 1, 1, 'Programado'),
(86, 1, 1, 'Programado'),
(87, 21, 1, 'Programado'),
(88, 1, 1, 'Programado'),
(89, 1, 1, 'Ejecutado'),
(90, 21, 1, 'Programado'),
(91, 1, 1, 'Programado'),
(92, NULL, 1, 'Hay un problema.'),
(93, NULL, 1, NULL),
(94, NULL, 1, '1'),
(95, NULL, 1, '1'),
(96, NULL, 1, '1'),
(97, NULL, 1, '1'),
(98, NULL, 1, '1'),
(99, NULL, 1, '1'),
(100, NULL, 1, '1'),
(101, NULL, 1, '1'),
(102, NULL, 1, '1'),
(103, NULL, 17, 'XD');

-- --------------------------------------------------------

--
-- Table structure for table `comunidad`
--

CREATE TABLE `comunidad` (
  `id` int NOT NULL,
  `id_parroquia` int DEFAULT NULL,
  `tipo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `representante` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rif` int DEFAULT NULL,
  `ambito` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comunidad`
--

INSERT INTO `comunidad` (`id`, `id_parroquia`, `tipo`, `nombre`, `direccion`, `representante`, `rif`, `ambito`) VALUES
(1, 37, 'Organización comunal', 'Sindicato Único De Telecomunicaciones Del Estadio Anzoátegui', 'Urb. 7', 'Leonardo Torres', 437488, 'Sindicato'),
(2, 37, 'Comuna', 'Parque Oeste', 'Calle 7 y Calle 9', 'Carlos Villegas', 352362, 'Parque nacional');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `cedula` int NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`cedula`, `direccion`, `nombre`, `telefono`, `correo`) VALUES
(11222333, 'Urb. 7 con calle 3', 'Carlos Jimenez', '412-134-4364', 'hola@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `gerencia`
--

CREATE TABLE `gerencia` (
  `id` int NOT NULL,
  `cedula_gerente` int DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gerencia`
--

INSERT INTO `gerencia` (`id`, `cedula_gerente`, `nombre`, `direccion`) VALUES
(1, 11222333, 'Hidrolara', 'Parroquias'),
(21, 11222333, 'Servitel', 'Torres');

-- --------------------------------------------------------

--
-- Table structure for table `gerente`
--

CREATE TABLE `gerente` (
  `cedula` int NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gerente`
--

INSERT INTO `gerente` (`cedula`, `telefono`, `correo`, `direccion`, `nombre`) VALUES
(11222333, '412-134-4364', 'hola@gmail.com', 'Caracas', 'Pedro Jimenez');

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE `institucion` (
  `id` int NOT NULL,
  `cedula_director` int DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`id`, `cedula_director`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(1, 11222333, 'Bellas Artes', 'hola@gmail.com', '412-134-4364', 'Caracas'),
(17, 11222333, 'Academia De Investigación', 'hola@gmail.com', '412-134-4364', 'Caracas');

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `municipio`
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
-- Table structure for table `parroquia`
--

CREATE TABLE `parroquia` (
  `id` int NOT NULL,
  `id_municipio` int DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parroquia`
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
-- Table structure for table `solicitante`
--

CREATE TABLE `solicitante` (
  `cedula` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solicitante`
--

INSERT INTO `solicitante` (`cedula`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(11985184, 'Veronika Chifflet', 'hola@gmail.com', '412-134-4364', 'Calle 7'),
(12239200, 'Maria Belnadez', 'hola@gmail.com', '412-447-4248', 'Calle 9');

-- --------------------------------------------------------

--
-- Table structure for table `solicitud`
--

CREATE TABLE `solicitud` (
  `id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_comunidad` int DEFAULT NULL,
  `id_asignacion` int DEFAULT NULL,
  `id_institucion` int DEFAULT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `tipo_solicitud` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `problematica` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `solicitud`
--

INSERT INTO `solicitud` (`id`, `id_comunidad`, `id_asignacion`, `id_institucion`, `cedula_solicitante`, `tipo_solicitud`, `fecha`, `problematica`) VALUES
('BR-1954', 1, 90, NULL, 11985184, 2, '2024-10-26', 'Hay un problema.'),
('IK-57343', 2, 92, NULL, 11985184, 1, '2024-10-03', 'Hay un problema.'),
('LF-32678', 1, 91, 1, NULL, 3, '2024-10-26', 'Hay un problema.'),
('LS-7523', 1, 89, NULL, 11985184, 2, '2024-10-16', 'Hay un problema.'),
('SR-3057', 2, 88, 1, NULL, 3, '2024-10-24', 'Hay un problema.'),
('SR-326236', 1, 86, NULL, 11985184, 1, '2024-10-24', 'Hay un problema.');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`id`, `nombre`) VALUES
(1, 'general'),
(2, '1x10'),
(3, 'institucional');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cedula`, `contrasena`) VALUES
(1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignacion_gerencia_FK` (`id_gerencia`),
  ADD KEY `asignacion_institucion_FK` (`id_institucion_remitente`);

--
-- Indexes for table `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comunidad_parroquia_FK` (`id_parroquia`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `gerencia`
--
ALTER TABLE `gerencia`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `gerencia_gerente_FK` (`cedula_gerente`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `institucion_director_FK` (`cedula_director`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `parroquia_municipio_FK` (`id_municipio`);

--
-- Indexes for table `solicitante`
--
ALTER TABLE `solicitante`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud_comunidad_fk` (`id_comunidad`),
  ADD KEY `solicitud_institucion_fk` (`id_institucion`),
  ADD KEY `solicitud_asignacion_FK` (`id_asignacion`),
  ADD KEY `solicitud_solicitante_FK` (`cedula_solicitante`),
  ADD KEY `solicitud_tipo_solicitud_FK` (`tipo_solicitud`);

--
-- Indexes for table `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gerencia`
--
ALTER TABLE `gerencia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `asignacion_institucion_FK` FOREIGN KEY (`id_institucion_remitente`) REFERENCES `institucion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `comunidad`
--
ALTER TABLE `comunidad`
  ADD CONSTRAINT `comunidad_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `gerencia`
--
ALTER TABLE `gerencia`
  ADD CONSTRAINT `gerencia_gerente_FK` FOREIGN KEY (`cedula_gerente`) REFERENCES `gerente` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_director_FK` FOREIGN KEY (`cedula_director`) REFERENCES `director` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_municipio_FK` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `solicitud`
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
