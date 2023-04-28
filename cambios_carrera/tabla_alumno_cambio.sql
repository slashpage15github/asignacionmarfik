/*
Navicat MySQL Data Transfer

Source Server         : daw
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : asignacionfs_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-15 17:33:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tabla_alumno_cambio
-- ----------------------------
DROP TABLE IF EXISTS `tabla_alumno_cambio`;
CREATE TABLE `tabla_alumno_cambio` (
  `Matricula` int(8) NOT NULL,
  `Alumno` varchar(50) NOT NULL,
  `Estatus` varchar(8) NOT NULL,
  `Plan` int(3) NOT NULL,
  `Al_Plan` int(3) NOT NULL,
  `Telefono` bigint(10) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Respuesta` varchar(100) NOT NULL,
  PRIMARY KEY (`Matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
