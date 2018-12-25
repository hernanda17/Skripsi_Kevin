/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbteknisi

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-12-25 06:12:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `idBarang` varchar(50) NOT NULL,
  `namaBarang` varchar(50) DEFAULT NULL,
  `stokBarang` int(5) DEFAULT NULL,
  `statusBarang` int(1) DEFAULT NULL,
  `id_jenisBarang` varchar(25) DEFAULT NULL,
  `idUser` int(8) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`idBarang`) USING BTREE,
  KEY `id_jenisBarang` (`id_jenisBarang`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jenisBarang`) REFERENCES `jenis_barang` (`id_jenisBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES ('1', 'barang1', '1', '0', null, '1', '2018-11-09 23:52:28');
INSERT INTO `barang` VALUES ('123131', 'hehe', '12', '0', null, '1', '2018-11-09 19:18:16');
INSERT INTO `barang` VALUES ('2', 'barang hehe', '10', '1', null, '1', '2018-11-09 23:52:45');

-- ----------------------------
-- Table structure for jenis_barang
-- ----------------------------
DROP TABLE IF EXISTS `jenis_barang`;
CREATE TABLE `jenis_barang` (
  `id_jenisBarang` varchar(25) NOT NULL,
  `id_rfid` varchar(100) DEFAULT NULL,
  `Nama_jenis` varchar(25) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id_jenisBarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis_barang
-- ----------------------------

-- ----------------------------
-- Table structure for pesanan
-- ----------------------------
DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE `pesanan` (
  `idPesanan` varchar(50) NOT NULL,
  `idUser` int(8) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `idUserApproval` int(8) DEFAULT NULL,
  `timeapproval` datetime DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPesanan`) USING BTREE,
  KEY `idUser` (`idUser`),
  CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pesanan
-- ----------------------------
INSERT INTO `pesanan` VALUES ('0011321321', '2', '2018-11-10 07:18:45', '0', null, null, 'buat bangun rumah');
INSERT INTO `pesanan` VALUES ('002', '2', '2018-11-22 17:55:05', '1', '3', '2018-11-23 19:47:27', 'tetetete');

-- ----------------------------
-- Table structure for pesanandetail
-- ----------------------------
DROP TABLE IF EXISTS `pesanandetail`;
CREATE TABLE `pesanandetail` (
  `idPesananDetail` int(50) NOT NULL AUTO_INCREMENT,
  `idPesanan` varchar(50) DEFAULT NULL,
  `idBarang` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPesananDetail`) USING BTREE,
  KEY `idPesanan` (`idPesanan`),
  KEY `idBarang` (`idBarang`),
  CONSTRAINT `pesanandetail_ibfk_1` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pesanandetail_ibfk_2` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pesanandetail
-- ----------------------------
INSERT INTO `pesanandetail` VALUES ('1', '0011321321', '123131', '10');
INSERT INTO `pesanandetail` VALUES ('2', '0011321321', '1', '10');
INSERT INTO `pesanandetail` VALUES ('3', '002', '123131', '10');
INSERT INTO `pesanandetail` VALUES ('4', '002', '1', '10');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `idUser` int(8) NOT NULL AUTO_INCREMENT,
  `idRFID` varchar(100) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `role` int(1) unsigned DEFAULT '0' COMMENT '0:Gudang , 1:teknisi, 2:kepala teknisi',
  PRIMARY KEY (`idUser`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '0005306435', 'teknisi 1', 'teknisi1', '0', '1');
INSERT INTO `user` VALUES ('2', '001', 'Bagian Gudang', 'admin', '0', '0');
INSERT INTO `user` VALUES ('3', null, 'Kepala Teknisi', 'admin', '0', '2');
INSERT INTO `user` VALUES ('4', '0007275249', 'teknisi 2', 'teknisi2', '0', '1');
