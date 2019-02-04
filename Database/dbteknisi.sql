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

 Date: 05/02/2019 03:29:46
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
  `idRFID` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `statusBarang` int(1) NULL DEFAULT NULL,
  `id_jenisBarang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idUser` int(8) NULL DEFAULT NULL,
  `timestamp` datetime(0) NULL DEFAULT NULL,
  `Supplier` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idBarang`) USING BTREE,
  INDEX `id_jenisBarang`(`id_jenisBarang`) USING BTREE,
  INDEX `idUser`(`idUser`) USING BTREE,
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jenisBarang`) REFERENCES `jenis_barang` (`id_jenisBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('1', 'barang1', '0', 0, '3121321', 1, '2018-11-09 23:52:28', NULL);
INSERT INTO `barang` VALUES ('123131', 'hehe', '11', 0, '89898', 1, '2018-11-09 19:18:16', NULL);
INSERT INTO `barang` VALUES ('2', 'barang hehe', '432432432', 1, '89898', 1, '2018-11-09 23:52:45', NULL);
INSERT INTO `barang` VALUES ('test', 'flshdisk', '1231321321', 0, '89898', 2, '2019-01-03 17:44:41', 'toko angin ribut');
INSERT INTO `barang` VALUES ('test1', 'flshdisk', '1231321321', 0, '89898', 2, '2019-01-03 17:44:41', 'toko angin ribut');
INSERT INTO `barang` VALUES ('test2', 'flshdisk', '1231321321', 0, '89898', 2, '2019-01-03 17:44:41', 'toko angin ribut');

-- ----------------------------
-- Table structure for jenis_barang
-- ----------------------------
DROP TABLE IF EXISTS `jenis_barang`;
CREATE TABLE `jenis_barang`  (
  `id_jenisBarang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_rfid` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Nama_jenis` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_jenisBarang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jenis_barang
-- ----------------------------
INSERT INTO `jenis_barang` VALUES ('3121321', '321321', '321321', 0);
INSERT INTO `jenis_barang` VALUES ('89898', '989898', '98989', 0);

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
  PRIMARY KEY (`idPesanan`) USING BTREE,
  INDEX `idUser`(`idUser`) USING BTREE,
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pesanan
-- ----------------------------
INSERT INTO `pesanan` VALUES ('0011321321', 2, '2018-11-10 07:18:45', 1, 3, '2018-12-25 14:35:44', 'buat bangun rumah');
INSERT INTO `pesanan` VALUES ('002', 2, '2018-11-22 17:55:05', 1, 3, '2018-11-23 19:47:27', 'tetetete');
INSERT INTO `pesanan` VALUES ('004', 1, '2018-12-25 14:34:30', 1, 3, '2018-12-25 14:41:40', 'Sebelum sidang');
INSERT INTO `pesanan` VALUES ('3213123', 1, '2019-02-04 20:38:42', 0, NULL, NULL, '321312321');
INSERT INTO `pesanan` VALUES ('432432432', 1, '2019-01-03 17:38:26', 1, 3, '2019-01-03 19:12:29', 'buat bangun rumah tangga');

-- ----------------------------
-- Table structure for pesanandetail
-- ----------------------------
DROP TABLE IF EXISTS `pesanandetail`;
CREATE TABLE `pesanandetail`  (
  `idPesananDetail` int(50) NOT NULL AUTO_INCREMENT,
  `idPesanan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `idBarang` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`idPesananDetail`) USING BTREE,
  INDEX `idPesanan`(`idPesanan`) USING BTREE,
  INDEX `idBarang`(`idBarang`) USING BTREE,
  CONSTRAINT `pesanandetail_ibfk_1` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pesanandetail_ibfk_2` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pesanandetail
-- ----------------------------
INSERT INTO `pesanandetail` VALUES (7, '432432432', '1', NULL, 1);
INSERT INTO `pesanandetail` VALUES (13, '432432432', '123131', NULL, 1);
INSERT INTO `pesanandetail` VALUES (14, '432432432', '2', NULL, 1);
INSERT INTO `pesanandetail` VALUES (15, '432432432', 'test', NULL, 1);
INSERT INTO `pesanandetail` VALUES (16, '3213123', 'test1', NULL, 0);
INSERT INTO `pesanandetail` VALUES (17, '3213123', 'test2', NULL, 0);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `idUser` int(8) NOT NULL AUTO_INCREMENT,
  `idUser_Atasan` int(8) NULL DEFAULT NULL,
  `idRFID` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 0,
  `role` int(1) UNSIGNED NULL DEFAULT 0 COMMENT '0:Gudang , 1:teknisi, 2:kepala teknisi',
  PRIMARY KEY (`idUser`) USING BTREE,
  INDEX `idUser_Atasan`(`idUser_Atasan`) USING BTREE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idUser_Atasan`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, NULL, '0005306435', 'teknisi 1', 'teknisi1', 0, 1);
INSERT INTO `user` VALUES (2, NULL, '001', 'Bagian Gudang', 'admin', 0, 0);
INSERT INTO `user` VALUES (3, NULL, NULL, 'Kepala Teknisi', 'admin', 0, 2);
INSERT INTO `user` VALUES (4, 1, '0007275249', 'teknisi 2', 'teknisi2', 0, 1);
INSERT INTO `user` VALUES (5, 2, 'jkljkjfkls', 'bagian gudang3', '1234', 0, 0);
INSERT INTO `user` VALUES (6, NULL, '', '', '', 0, NULL);

SET FOREIGN_KEY_CHECKS = 1;
