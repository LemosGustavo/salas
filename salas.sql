CREATE DATABASE  IF NOT EXISTS `salas` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `salas`;
-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: salas
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `reserva_sala`
--

DROP TABLE IF EXISTS `reserva_sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reserva_sala` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sala_id` int NOT NULL,
  `persona_reserva` varchar(80) NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_hasta` datetime NOT NULL,
  `estado` int NOT NULL DEFAULT '0',
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva_sala`
--

LOCK TABLES `reserva_sala` WRITE;
/*!40000 ALTER TABLE `reserva_sala` DISABLE KEYS */;
INSERT INTO `reserva_sala` VALUES (1,5,'Gustavo s','Esto es una edición','2022-05-10 20:00:00','2022-05-27 22:00:00',1,'2022-05-05 11:00:03','2022-05-17 19:32:03'),(2,2,'Gustavo Lemos','Holaasdsadsadasdsa','2018-05-22 20:28:00','2018-05-22 22:28:00',1,'2022-05-16 18:28:56','2022-05-17 19:33:05'),(24,3,'Gustavo','Es una observación','2022-05-03 21:49:28','2022-05-16 21:49:31',1,'2022-05-17 19:49:41','0000-00-00 00:00:00'),(23,2,'aSasaSA','ASasaSasASas','2022-05-07 22:34:59','2022-05-30 22:35:01',1,'2022-05-16 20:35:05','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `reserva_sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sala`
--

DROP TABLE IF EXISTS `sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sala` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_sala` varchar(80) DEFAULT NULL,
  `ubicacion` varchar(150) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado_sala` int NOT NULL DEFAULT '0',
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sala`
--

LOCK TABLES `sala` WRITE;
/*!40000 ALTER TABLE `sala` DISABLE KEYS */;
INSERT INTO `sala` VALUES (3,'Salón Azul','Maipú','Es un salón muy grande',0,'2022-05-16 15:24:20','2022-05-17 21:30:25'),(2,'Sala Violeta','Le Parc','Está ubicada en Guaymallén es un espacio multicultural',1,'2022-05-16 14:55:11','2022-05-16 15:03:22'),(6,'Sala Platino','Palmares','Gran salón ubicado en Palmares Open Mall',1,'2022-05-17 20:34:45',NULL);
/*!40000 ALTER TABLE `sala` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-18 22:07:53
