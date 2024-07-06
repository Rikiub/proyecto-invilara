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
INSERT INTO `ciudadano` VALUES (31492771,'Carlos','hola@gmail.com','414',NULL);
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
  CONSTRAINT `comunidad_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunidad`
--

LOCK TABLES `comunidad` WRITE;
/*!40000 ALTER TABLE `comunidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `comunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `director`
--

DROP TABLE IF EXISTS `director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `director` (
  `cedula` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `correo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `telefono` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `director`
--

LOCK TABLES `director` WRITE;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
/*!40000 ALTER TABLE `director` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerencia`
--

DROP TABLE IF EXISTS `gerencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cedula_gerente` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `gerencia_gerente_FK` (`cedula_gerente`),
  CONSTRAINT `gerencia_gerente_FK` FOREIGN KEY (`cedula_gerente`) REFERENCES `gerente` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerencia`
--

LOCK TABLES `gerencia` WRITE;
/*!40000 ALTER TABLE `gerencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `gerencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerente`
--

DROP TABLE IF EXISTS `gerente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerente` (
  `cedula` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `correo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `telefono` text,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerente`
--

LOCK TABLES `gerente` WRITE;
/*!40000 ALTER TABLE `gerente` DISABLE KEYS */;
/*!40000 ALTER TABLE `gerente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institucion`
--

DROP TABLE IF EXISTS `institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `institucion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cedula_director` int DEFAULT NULL,
  `id_parroquia` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `correo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `direccion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `telefono` text,
  `dependencia` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `institucion_director_FK` (`cedula_director`),
  KEY `institucion_parroquia_FK` (`id_parroquia`),
  CONSTRAINT `institucion_director_FK` FOREIGN KEY (`cedula_director`) REFERENCES `director` (`cedula`),
  CONSTRAINT `institucion_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institucion`
--

LOCK TABLES `institucion` WRITE;
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parroquia`
--

DROP TABLE IF EXISTS `parroquia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parroquia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_municipio` int DEFAULT NULL,
  `nombre` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `parroquia_municipio_FK` (`id_municipio`),
  CONSTRAINT `parroquia_municipio_FK` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parroquia`
--

LOCK TABLES `parroquia` WRITE;
/*!40000 ALTER TABLE `parroquia` DISABLE KEYS */;
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
  `nro_solicitud_institucional_director` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `gerencia_referida` int DEFAULT NULL,
  `problematica` text,
  `instrucciones` text,
  `tipo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `estatus` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`nro_control`) USING BTREE,
  KEY `solicitud_solicitud_1x10_FK` (`nro_solicitud_1x10`),
  KEY `solicitud_solicitud_general_FK` (`nro_solicitud_general`),
  KEY `solicitud_solicitud_institucional_FK` (`nro_solicitud_institucional`),
  KEY `solicitud_solicitud_institucional_director_FK` (`nro_solicitud_institucional_director`),
  KEY `solicitud_gerencia_FK` (`gerencia_referida`),
  CONSTRAINT `solicitud_gerencia_FK` FOREIGN KEY (`gerencia_referida`) REFERENCES `gerencia` (`id`),
  CONSTRAINT `solicitud_solicitud_1x10_FK` FOREIGN KEY (`nro_solicitud_1x10`) REFERENCES `solicitud_1x10` (`nro_control`),
  CONSTRAINT `solicitud_solicitud_general_FK` FOREIGN KEY (`nro_solicitud_general`) REFERENCES `solicitud_general` (`nro_control`),
  CONSTRAINT `solicitud_solicitud_institucional_director_FK` FOREIGN KEY (`nro_solicitud_institucional_director`) REFERENCES `solicitud_institucional_director` (`nro_control`),
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
  `cedula_solicitante` int DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'Descripción de la problematica.',
  PRIMARY KEY (`nro_control`) USING BTREE,
  KEY `solicitud_1x10_ciudadano_FK` (`cedula_solicitante`),
  CONSTRAINT `solicitud_1x10_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `ciudadano` (`cedula`)
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
  `nro_control` varchar(20) NOT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `id_comunidad` int DEFAULT NULL,
  PRIMARY KEY (`nro_control`),
  KEY `solicitud_general_comunidad_FK` (`id_comunidad`),
  KEY `solicitud_general_ciudadano_FK` (`cedula_solicitante`),
  CONSTRAINT `solicitud_general_ciudadano_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `ciudadano` (`cedula`),
  CONSTRAINT `solicitud_general_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`)
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
  `observacion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `asunto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `instrucciones` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`nro_control`) USING BTREE,
  KEY `solicitud_institucional_institucion_FK` (`id_institucion`),
  CONSTRAINT `solicitud_institucional_institucion_FK` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`)
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
-- Table structure for table `solicitud_institucional_director`
--

DROP TABLE IF EXISTS `solicitud_institucional_director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_institucional_director` (
  `nro_control` varchar(20) NOT NULL,
  `nro_oficio` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `id_comunidad` int DEFAULT NULL,
  `nombre_presidente` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  PRIMARY KEY (`nro_control`) USING BTREE,
  KEY `solicitud_institucional_director_comunidad_FK` (`id_comunidad`),
  CONSTRAINT `solicitud_institucional_director_comunidad_FK` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_institucional_director`
--

LOCK TABLES `solicitud_institucional_director` WRITE;
/*!40000 ALTER TABLE `solicitud_institucional_director` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_institucional_director` ENABLE KEYS */;
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

-- Dump completed on 2024-07-05 20:21:45
