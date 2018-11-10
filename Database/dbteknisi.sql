/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100134
 Source Host           : localhost:3306
 Source Schema         : dbteknisi

 Target Server Type    : MySQL
 Target Server Version : 100134
 File Encoding         : 65001

 Date: 10/11/2018 12:41:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `idBarang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `namaBarang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stokBarang` int(5) NULL DEFAULT NULL,
  `statusBarang` int(1) NULL DEFAULT NULL,
  `idUser` int(8) NULL DEFAULT NULL,
  `timestamp` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`idBarang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('1', 'barang1', 11, 0, 1, '2018-11-09 23:52:28');
INSERT INTO `barang` VALUES ('123131', 'hehe', 12, 0, 1, '2018-11-09 19:18:16');
INSERT INTO `barang` VALUES ('2', 'barang hehe', 10, 1, 1, '2018-11-09 23:52:45');

-- ----------------------------
-- Table structure for pesanan
-- ----------------------------
DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE `pesanan`  (
  `idPesanan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `idUser` int(8) NULL DEFAULT NULL,
  `timestamp` datetime(0) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `idUserApproval` int(8) NULL DEFAULT NULL,
  `timeapproval` datetime(0) NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idPesanan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pesanandetail
-- ----------------------------
DROP TABLE IF EXISTS `pesanandetail`;
CREATE TABLE `pesanandetail`  (
  `idPesananDetail` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `idPesanan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idBarang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idPesananDetail`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `idUser` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `role` int(1) UNSIGNED NULL DEFAULT 0 COMMENT '0:Gudang , 1:teknisi, 2:kepala teknisi',
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin_Gu', 'admin', 0, 0);
INSERT INTO `user` VALUES (2, 'admin_Te', 'admin', 0, 1);
INSERT INTO `user` VALUES (3, 'admin_Ke', 'admin', 0, 2);

SET FOREIGN_KEY_CHECKS = 1;
