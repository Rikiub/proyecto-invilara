-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2024 at 10:44 PM
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
-- Table structure for table `ciudadano`
--

CREATE TABLE `ciudadano` (
  `cedula` int NOT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `correo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `telefono` text,
  `direccion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `ciudadano`
--

INSERT INTO `ciudadano` (`cedula`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(12239222, 'Carlos Montella', 'hola@gmail.com', '04124474248', 'Urb. 7'),
(31492771, 'Mario Barroco', 'hola@gmail.com', '0412842951', 'Calle 9');

-- --------------------------------------------------------

--
-- Table structure for table `comunidad`
--

CREATE TABLE `comunidad` (
  `id` int NOT NULL,
  `id_parroquia` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comunidad`
--

INSERT INTO `comunidad` (`id`, `id_parroquia`, `nombre`, `direccion`, `tipo`) VALUES
(1, 1, 'Sindicato Único de Telecomunicaciones del Estadio Anzoátegui', 'Urb. 7', 'Sindicato'),
(2, NULL, 'Parque \"Oeste\"', 'Calle 7 y Calle 9', 'Parque');

-- --------------------------------------------------------

--
-- Table structure for table `gerencia`
--

CREATE TABLE `gerencia` (
  `id` int NOT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `nombre_gerente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `gerencia`
--

INSERT INTO `gerencia` (`id`, `nombre`, `nombre_gerente`) VALUES
(1, 'Administración de herramientas', 'Francisco Gomez'),
(5, 'Administración de bienes', 'Rodrigo Torres');

-- --------------------------------------------------------

--
-- Table structure for table `institucion`
--

CREATE TABLE `institucion` (
  `id` int NOT NULL,
  `id_parroquia` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `nombre_director` text,
  `correo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `telefono` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`id`, `id_parroquia`, `nombre`, `nombre_director`, `correo`, `telefono`, `direccion`) VALUES
(1, 1, 'Comisión Nacional para los Refugiados', 'Carlos Jimenez', 'hola@gmail.com', '04124474248', 'Calle 6'),
(2, 1, 'Departamento de defensa civil', 'Vicente Fernandez', 'bye@outlook.com', '0412447', 'Calle 7');

-- --------------------------------------------------------

--
-- Table structure for table `parroquia`
--

CREATE TABLE `parroquia` (
  `id` int NOT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `nombre_municipio` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `parroquia`
--

INSERT INTO `parroquia` (`id`, `nombre`, `nombre_municipio`) VALUES
(1, 'Barquisimeto', 'Torres');

-- --------------------------------------------------------

--
-- Table structure for table `solicitud`
--

CREATE TABLE `solicitud` (
  `nro_control` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nro_solicitud_1x10` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nro_solicitud_general` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nro_solicitud_institucional` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `problematica` text,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `estatus` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud_1x10`
--

CREATE TABLE `solicitud_1x10` (
  `nro_control` varchar(50) NOT NULL,
  `id_gerencia` int DEFAULT NULL,
  `id_comunidad` int DEFAULT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `problematica` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'Descripción de la problematica.',
  `estatus` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud_general`
--

CREATE TABLE `solicitud_general` (
  `nro_control` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_gerencia` int DEFAULT NULL COMMENT 'Gerencia referida donde sera enviada la solicitud.',
  `id_comunidad` int DEFAULT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `fecha` date DEFAULT NULL COMMENT 'Fecha de la solicitud.',
  `problematica` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'Descripción de la situación que presenta la solicitud.',
  `estatus` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `solicitud_institucional`
--

CREATE TABLE `solicitud_institucional` (
  `nro_control` varchar(20) NOT NULL,
  `nro_oficio` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `id_institucion` int DEFAULT NULL,
  `id_comunidad` int DEFAULT NULL,
  `id_gerencia` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `problematica` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `instrucciones` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `observacion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `estatus` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `solicitud_institucional`
--

INSERT INTO `solicitud_institucional` (`nro_control`, `nro_oficio`, `id_institucion`, `id_comunidad`, `id_gerencia`, `fecha`, `problematica`, `instrucciones`, `observacion`, `estatus`) VALUES
('1', '1', 1, 1, 1, '2024-07-07', 'Problema a solucionar.', 'Instrucciones para resolver la problemática.', '', 'En programación');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int NOT NULL,
  `contraseña` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cedula`, `contraseña`) VALUES
(1, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `comunidad`
--
ALTER TABLE `comunidad`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `comunidad_parroquia_FK` (`id_parroquia`);

--
-- Indexes for table `gerencia`
--
ALTER TABLE `gerencia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `institucion_parroquia_FK` (`id_parroquia`);

--
-- Indexes for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`nro_control`) USING BTREE,
  ADD KEY `solicitud_solicitud_1x10_FK` (`nro_solicitud_1x10`),
  ADD KEY `solicitud_solicitud_general_FK` (`nro_solicitud_general`),
  ADD KEY `solicitud_solicitud_institucional_FK` (`nro_solicitud_institucional`);

--
-- Indexes for table `solicitud_1x10`
--
ALTER TABLE `solicitud_1x10`
  ADD PRIMARY KEY (`nro_control`) USING BTREE,
  ADD KEY `solicitud_1x10_gerencia_FK` (`id_gerencia`),
  ADD KEY `solicitud_1x10_comunidad_FK` (`id_comunidad`),
  ADD KEY `solicitud_1x10_ciudadano_FK` (`cedula_solicitante`);

--
-- Indexes for table `solicitud_general`
--
ALTER TABLE `solicitud_general`
  ADD PRIMARY KEY (`nro_control`),
  ADD KEY `solicitud_general_ciudadano_FK` (`cedula_solicitante`),
  ADD KEY `solicitud_general_comunidad_FK` (`id_comunidad`),
  ADD KEY `solicitud_general_gerencia_FK` (`id_gerencia`);

--
-- Indexes for table `solicitud_institucional`
--
ALTER TABLE `solicitud_institucional`
  ADD PRIMARY KEY (`nro_control`) USING BTREE,
  ADD KEY `solicitud_institucional_institucion_FK` (`id_institucion`),
  ADD KEY `solicitud_institucional_comunidad_FK` (`id_comunidad`),
  ADD KEY `solicitud_institucional_gerencia_FK` (`id_gerencia`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comunidad`
--
ALTER TABLE `comunidad`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gerencia`
--
ALTER TABLE `gerencia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comunidad`
--
ALTER TABLE `comunidad`
  ADD CONSTRAINT `comunidad_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_solicitud_1x10_FK` FOREIGN KEY (`nro_solicitud_1x10`) REFERENCES `solicitud_1x10` (`nro_control`),
  ADD CONSTRAINT `solicitud_solicitud_general_FK` FOREIGN KEY (`nro_solicitud_general`) REFERENCES `solicitud_general` (`nro_control`),
  ADD CONSTRAINT `solicitud_solicitud_institucional_FK` FOREIGN KEY (`nro_solicitud_institucional`) REFERENCES `solicitud_institucional` (`nro_control`);

--
-- Constraints for table `solicitud_1x10`
--
ALTER TABLE `solicitud_1x10`
  ADD CONSTRAINT `solicitud_1x10_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `ciudadano` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_1x10_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_1x10_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `solicitud_general`
--
ALTER TABLE `solicitud_general`
  ADD CONSTRAINT `solicitud_general_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `ciudadano` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_general_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_general_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `solicitud_institucional`
--
ALTER TABLE `solicitud_institucional`
  ADD CONSTRAINT `solicitud_institucional_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_institucional_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_institucional_institucion_FK` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
