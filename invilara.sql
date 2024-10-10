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
-- Table structure for table `asignacion`
--

DROP TABLE IF EXISTS `asignacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asignacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_gerencia` int DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asignacion_gerencia_FK` (`id_gerencia`),
  CONSTRAINT `asignacion_gerencia_FK` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion`
--

LOCK TABLES `asignacion` WRITE;
/*!40000 ALTER TABLE `asignacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comunidad`
--

DROP TABLE IF EXISTS `comunidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comunidad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `representante` varchar(100) DEFAULT NULL,
  `rif` int DEFAULT NULL,
  `ambito` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comunidad`
--

LOCK TABLES `comunidad` WRITE;
/*!40000 ALTER TABLE `comunidad` DISABLE KEYS */;
INSERT INTO `comunidad` VALUES (1,'Sindicato','Sindicato Único de Telecomunicaciones del Estadio Anzoátegui','Urb. 7',NULL,NULL,NULL),(2,'Parque','Parque \"Oeste\"','Calle 7 y Calle 9',NULL,NULL,NULL);
/*!40000 ALTER TABLE `comunidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `director`
--

DROP TABLE IF EXISTS `director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `director` (
  `cedula` int NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `director`
--

LOCK TABLES `director` WRITE;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` VALUES (11222333,'Urb. 7 con calle 3','Carlos Jimenez','412-134-4364','hola@gmail.com');
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
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `gerencia_gerente_FK` (`cedula_gerente`),
  CONSTRAINT `gerencia_gerente_FK` FOREIGN KEY (`cedula_gerente`) REFERENCES `gerente` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerencia`
--

LOCK TABLES `gerencia` WRITE;
/*!40000 ALTER TABLE `gerencia` DISABLE KEYS */;
INSERT INTO `gerencia` VALUES (16,11222333,'Hidrolara','Parroquias');
/*!40000 ALTER TABLE `gerencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerente`
--

DROP TABLE IF EXISTS `gerente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gerente` (
  `cedula` int NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerente`
--

LOCK TABLES `gerente` WRITE;
/*!40000 ALTER TABLE `gerente` DISABLE KEYS */;
INSERT INTO `gerente` VALUES (11222333,'412-134-4364','hola@gmail.com','Caracas','Pedro Jimenez');
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
  `nombre` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `institucion_director_FK` (`cedula_director`),
  CONSTRAINT `institucion_director_FK` FOREIGN KEY (`cedula_director`) REFERENCES `director` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institucion`
--

LOCK TABLES `institucion` WRITE;
/*!40000 ALTER TABLE `institucion` DISABLE KEYS */;
INSERT INTO `institucion` VALUES (6,11222333,'Pepito','hola@gmail.com','412-134-4364','Caracas');
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
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Iribarren'),(2,'Andres Eloy Blanco'),(3,'Urdaneta');
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
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `parroquia_municipio_FK` (`id_municipio`),
  CONSTRAINT `parroquia_municipio_FK` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parroquia`
--

LOCK TABLES `parroquia` WRITE;
/*!40000 ALTER TABLE `parroquia` DISABLE KEYS */;
INSERT INTO `parroquia` VALUES (1,3,'Barquisimeto');
/*!40000 ALTER TABLE `parroquia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitante`
--

DROP TABLE IF EXISTS `solicitante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitante` (
  `cedula` int NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitante`
--

LOCK TABLES `solicitante` WRITE;
/*!40000 ALTER TABLE `solicitante` DISABLE KEYS */;
INSERT INTO `solicitante` VALUES (11985184,'Veronika Chifflet','hola@gmail.com','412-134-4364','Calle 7'),(12239200,'Maria Belnadez','hola@gmail.com','412-447-4248','Calle 9');
/*!40000 ALTER TABLE `solicitante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_comunidad` int DEFAULT NULL,
  `id_asignacion` int DEFAULT NULL,
  `id_institucion` int DEFAULT NULL,
  `id_parroquia` int DEFAULT NULL,
  `cedula_solicitante` int DEFAULT NULL,
  `tipo_solicitud` int DEFAULT NULL,
  `problematica` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitud_comunidad_fk` (`id_comunidad`),
  KEY `solicitud_institucion_fk` (`id_institucion`),
  KEY `solicitud_asignacion_FK` (`id_asignacion`),
  KEY `solicitud_solicitante_FK` (`cedula_solicitante`),
  KEY `solicitud_tipo_solicitud_FK` (`tipo_solicitud`),
  KEY `solicitud_parroquia_FK` (`id_parroquia`),
  CONSTRAINT `solicitud_asignacion_FK` FOREIGN KEY (`id_asignacion`) REFERENCES `asignacion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_comunidad_fk` FOREIGN KEY (`id_comunidad`) REFERENCES `comunidad` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_institucion_fk` FOREIGN KEY (`id_institucion`) REFERENCES `institucion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_parroquia_FK` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_solicitante_FK` FOREIGN KEY (`cedula_solicitante`) REFERENCES `solicitante` (`cedula`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `solicitud_tipo_solicitud_FK` FOREIGN KEY (`tipo_solicitud`) REFERENCES `tipo_solicitud` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_solicitud`
--

DROP TABLE IF EXISTS `tipo_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_solicitud` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_solicitud`
--

LOCK TABLES `tipo_solicitud` WRITE;
/*!40000 ALTER TABLE `tipo_solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `cedula` int NOT NULL,
  `contrasena` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
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

-- Dump completed on 2024-10-10 18:46:05
