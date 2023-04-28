/*
Navicat MySQL Data Transfer

Source Server         : localserver
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : asignacionfs_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-26 18:56:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `videos`
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `ID` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `LINK` varchar(2000) DEFAULT NULL,
  `DESCRIPCION` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES ('1', 'VIDEO UNO', 'https://www.youtube.com/watch?v=hcimDieP9oM', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ');
INSERT INTO `videos` VALUES ('2', 'VIDEO DOS', 'https://www.youtube.com/watch?v=f4Mc-NYPHaQ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ');
INSERT INTO `videos` VALUES ('3', 'VIDEO TRES', 'https://www.youtube.com/watch?v=tRcIr-naUU0', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ');
INSERT INTO `videos` VALUES ('4', 'VIDEO CUATRO', 'https://www.youtube.com/watch?v=3QP-FvAPM10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ');
INSERT INTO `videos` VALUES ('5', 'VIDEO CINCO', 'https://www.youtube.com/watch?v=1RkCMRtkA1w', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ');
