/*
 Navicat Premium Data Transfer

 Source Server         : Hetz - Super
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : 94.130.206.25:3370
 Source Schema         : uw_test

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 06/09/2020 08:19:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  `booking_date` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booking
-- ----------------------------
BEGIN;
INSERT INTO `booking` VALUES (1, 1, 1599353777);
INSERT INTO `booking` VALUES (2, 2, 1599393377);
INSERT INTO `booking` VALUES (3, 3, 1599386177);
INSERT INTO `booking` VALUES (4, 1, 1598954177);
INSERT INTO `booking` VALUES (5, 3, 1598964977);
INSERT INTO `booking` VALUES (6, 2, 1598100977);
INSERT INTO `booking` VALUES (7, 1, 1598014577);
INSERT INTO `booking` VALUES (8, 1, 1598183777);
INSERT INTO `booking` VALUES (9, 2, 1597348577);
INSERT INTO `booking` VALUES (10, 3, 1597521377);
INSERT INTO `booking` VALUES (11, 4, 1597866977);
INSERT INTO `booking` VALUES (12, 5, 1597866977);
INSERT INTO `booking` VALUES (13, 1, 1596311777);
INSERT INTO `booking` VALUES (14, 4, 1596398177);
INSERT INTO `booking` VALUES (15, 2, 1596916577);
INSERT INTO `booking` VALUES (16, 1, 1597002977);
INSERT INTO `booking` VALUES (17, 2, 1597002977);
COMMIT;

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of room
-- ----------------------------
BEGIN;
INSERT INTO `room` VALUES (1, 'R001');
INSERT INTO `room` VALUES (2, 'R002');
INSERT INTO `room` VALUES (3, 'R003');
INSERT INTO `room` VALUES (4, 'R004');
INSERT INTO `room` VALUES (5, 'R005');
INSERT INTO `room` VALUES (6, 'R006');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
