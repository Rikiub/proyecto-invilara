-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2024 at 03:41 AM
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
-- Table structure for table `comunidad`
--

CREATE TABLE `comunidad` (
  `id` int NOT NULL,
  `id_parroquia` int DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tipo` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comunidad`
--

INSERT INTO `comunidad` (`id`, `id_parroquia`, `nombre`, `direccion`, `tipo`) VALUES
(1, NULL, 'Sindicato Único de Telecomunicaciones del Estadio Anzoátegui', 'Urb. 7', 'Sindicato'),
(2, NULL, 'Parque \"Oeste\"', 'Calle 7 y Calle 9', 'Parque');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `gerencia`
--

INSERT INTO `gerencia` (`id`, `cedula_gerente`, `nombre`, `direccion`) VALUES
(16, 11222333, 'Hidrolara', 'Parroquias');

-- --------------------------------------------------------

--
-- Table structure for table `gerente`
--

CREATE TABLE `gerente` (
  `cedula` int NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `id_parroquia` int DEFAULT NULL,
  `cedula_director` int DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `institucion`
--

INSERT INTO `institucion` (`id`, `id_parroquia`, `cedula_director`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(6, 1, 11222333, 'Pepito', 'hola@gmail.com', '412-134-4364', 'Caracas');

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
(1, 'Iribarren'),
(2, 'Andres Eloy Blanco'),
(3, 'Urdaneta');

-- --------------------------------------------------------

--
-- Table structure for table `parroquia`
--

CREATE TABLE `parroquia` (
  `id` int NOT NULL,
  `id_municipio` int DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `parroquia`
--

INSERT INTO `parroquia` (`id`, `id_municipio`, `nombre`) VALUES
(1, 3, 'Barquisimeto');

-- --------------------------------------------------------

--
-- Table structure for table `solicitante`
--

CREATE TABLE `solicitante` (
  `cedula` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `solicitante`
--

INSERT INTO `solicitante` (`cedula`, `nombre`, `correo`, `telefono`, `direccion`) VALUES
(11985184, 'Veronika', 'hola@gmail.com', '412-134-4364', 'Calle 7'),
(12239200, 'Maria Belnadez', 'hola@gmail.com', '412-447-4248', 'Calle 9');

-- --------------------------------------------------------

--
-- Table structure for table `solicitud_1x10`
--

CREATE TABLE `solicitud_1x10` (
  `nro_control` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_gerencia` int DEFAULT NULL,
  `id_comunidad` int DEFAULT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `problematica` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT 'Descripción de la problematica.',
  `estatus` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
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
  `problematica` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL COMMENT 'Descripción de la situación que presenta la solicitud.',
  `estatus` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
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
  `problematica` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `instrucciones` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `observacion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `estatus` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `solicitud_institucional`
--

INSERT INTO `solicitud_institucional` (`nro_control`, `nro_oficio`, `id_institucion`, `id_comunidad`, `id_gerencia`, `fecha`, `problematica`, `instrucciones`, `observacion`, `estatus`) VALUES
('1', '1', NULL, 1, NULL, '2024-07-07', 'Problema a solucionar.', 'Instrucciones para resolver la problemática.', '', 'En programación');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cedula`, `contrasena`) VALUES
(1, '1');

--
-- Indexes for dumped tables
--

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
  ADD KEY `institucion_parroquia_FK` (`id_parroquia`),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gerencia`
--
ALTER TABLE `gerencia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `institucion_director_FK` FOREIGN KEY (`cedula_director`) REFERENCES `director` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `institucion_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_municipio_FK` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `solicitud_1x10`
--
ALTER TABLE `solicitud_1x10`
  ADD CONSTRAINT `solicitud_1x10_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `solicitante` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_1x10_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_1x10_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `solicitud_general`
--
ALTER TABLE `solicitud_general`
  ADD CONSTRAINT `solicitud_general_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `solicitante` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
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
