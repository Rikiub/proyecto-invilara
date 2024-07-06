-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: invilara
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ciudadano`
--

DROP TABLE IF EXISTS `ciudadano`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ciudadano` (
  `cedula` int NOT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `correo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `telefono` text,
  `direccion` text,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudadano`
--

LOCK TABLES `ciudadano` WRITE;
/*!40000 ALTER TABLE `ciudadano` DISABLE KEYS */;
INSERT INTO `ciudadano` VALUES (31492771,'Carlos','hola@gmail.com','41','Caracas');
/*!40000 ALTER TABLE `ciudadano` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunidad`
--

DROP TABLE IF EXISTS `comunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comunidad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_parroquia` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `comunidad_parroquia_FK` (`id_parroquia`),
  CONSTRAINT `comunidad_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunidad`
--

LOCK TABLES `comunidad` WRITE;
/*!40000 ALTER TABLE `comunidad` DISABLE KEYS */;
INSERT INTO `comunidad` VALUES (1,1,'Sindicato Único de Telecomunicaciones del Estadio Anzoátegui','Urb. 7','Sindicato');
/*!40000 ALTER TABLE `comunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerencia`
--

DROP TABLE IF EXISTS `gerencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `nombre_gerente` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerencia`
--

LOCK TABLES `gerencia` WRITE;
/*!40000 ALTER TABLE `gerencia` DISABLE KEYS */;
INSERT INTO `gerencia` VALUES (1,'Adminsitración de bienes','Veronica Gomez');
/*!40000 ALTER TABLE `gerencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institucion`
--

DROP TABLE IF EXISTS `institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institucion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_parroquia` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `nombre_director` text,
  `correo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `telefono` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `institucion_parroquia_FK` (`id_parroquia`),
  CONSTRAINT `institucion_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institucion`
--

LOCK TABLES `institucion` WRITE;
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
INSERT INTO `institucion` VALUES (1,1,'Comisión Nacional para los Refugiados','Carlos Jimenez','hola@gmail.com','04124474248','Caracas');
/*!40000 ALTER TABLE `institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parroquia`
--

DROP TABLE IF EXISTS `parroquia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parroquia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `nombre_municipio` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parroquia`
--

LOCK TABLES `parroquia` WRITE;
/*!40000 ALTER TABLE `parroquia` DISABLE KEYS */;
INSERT INTO `parroquia` VALUES (1,'Barquisimeto','Iribarren');
/*!40000 ALTER TABLE `parroquia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud` (
  `nro_control` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nro_solicitud_1x10` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nro_solicitud_general` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nro_solicitud_institucional` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `problematica` text,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `estatus` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`nro_control`) USING BTREE,
  KEY `solicitud_solicitud_1x10_FK` (`nro_solicitud_1x10`),
  KEY `solicitud_solicitud_general_FK` (`nro_solicitud_general`),
  KEY `solicitud_solicitud_institucional_FK` (`nro_solicitud_institucional`),
  CONSTRAINT `solicitud_solicitud_1x10_FK` FOREIGN KEY (`nro_solicitud_1x10`) REFERENCES `solicitud_1x10` (`nro_control`),
  CONSTRAINT `solicitud_solicitud_general_FK` FOREIGN KEY (`nro_solicitud_general`) REFERENCES `solicitud_general` (`nro_control`),
  CONSTRAINT `solicitud_solicitud_institucional_FK` FOREIGN KEY (`nro_solicitud_institucional`) REFERENCES `solicitud_institucional` (`nro_control`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_1x10`
--

DROP TABLE IF EXISTS `solicitud_1x10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_1x10` (
  `nro_control` varchar(50) NOT NULL,
  `id_gerencia` int DEFAULT NULL,
  `id_comunidad` int DEFAULT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `problematica` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'Descripción de la problematica.',
  `estatus` text,
  PRIMARY KEY (`nro_control`) USING BTREE,
  KEY `solicitud_1x10_gerencia_FK` (`id_gerencia`),
  KEY `solicitud_1x10_comunidad_FK` (`id_comunidad`),
  KEY `solicitud_1x10_ciudadano_FK` (`cedula_solicitante`),
  CONSTRAINT `solicitud_1x10_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `ciudadano` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_1x10_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_1x10_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_1x10`
--

LOCK TABLES `solicitud_1x10` WRITE;
/*!40000 ALTER TABLE `solicitud_1x10` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_1x10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_general`
--

DROP TABLE IF EXISTS `solicitud_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_general` (
  `nro_control` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_gerencia` int DEFAULT NULL COMMENT 'Gerencia referida donde sera enviada la solicitud.',
  `id_comunidad` int DEFAULT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `fecha` date DEFAULT NULL COMMENT 'Fecha de la solicitud.',
  `problematica` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'Descripción de la situación que presenta la solicitud.',
  `estatus` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`nro_control`),
  KEY `solicitud_general_ciudadano_FK` (`cedula_solicitante`),
  KEY `solicitud_general_comunidad_FK` (`id_comunidad`),
  KEY `solicitud_general_gerencia_FK` (`id_gerencia`),
  CONSTRAINT `solicitud_general_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `ciudadano` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_general_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_general_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_general`
--

LOCK TABLES `solicitud_general` WRITE;
/*!40000 ALTER TABLE `solicitud_general` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_institucional`
--

DROP TABLE IF EXISTS `solicitud_institucional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  `estatus` text,
  PRIMARY KEY (`nro_control`) USING BTREE,
  KEY `solicitud_institucional_gerencia_FK` (`id_gerencia`),
  KEY `solicitud_institucional_institucion_FK` (`id_institucion`),
  KEY `solicitud_institucional_comunidad_FK` (`id_comunidad`),
  CONSTRAINT `solicitud_institucional_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_institucional_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_institucional_institucion_FK` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_institucional`
--

LOCK TABLES `solicitud_institucional` WRITE;
/*!40000 ALTER TABLE `solicitud_institucional` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_institucional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `cedula` int NOT NULL,
  `contraseña` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'1');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'invilara'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-06 14:56:57
