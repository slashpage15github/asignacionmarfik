/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : especialesdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-13 23:37:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `especiales`
-- ----------------------------
DROP TABLE IF EXISTS `especiales`;
CREATE TABLE `especiales` (
  `id_especial` int(5) NOT NULL,
  `id_matricula` int(11) NOT NULL,
  `cve_mat` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estatus` int(1) DEFAULT NULL,
  `grado` int(2) DEFAULT NULL,
  `carrera` varchar(70) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_especial`,`id_matricula`),
  KEY `fk_matricula` (`id_matricula`),
  KEY `fk_materia` (`cve_mat`),
  CONSTRAINT `fk_materia` FOREIGN KEY (`cve_mat`) REFERENCES `alumnos` (`clave`),
  CONSTRAINT `fk_matricula` FOREIGN KEY (`id_matricula`) REFERENCES `alumnos` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- ----------------------------
-- Records of especiales
-- ----------------------------
INSERT INTO `especiales` VALUES ('1', '12683475', '686337', 'raul.jaramillo@outlook.com', '8442788754', '1', '9', '828', 'Raul Alejandro Martinez Jaramillo', 'me gusta la cabeza');
