/*
 Navicat Premium Data Transfer

 Source Server         : mySQL
 Source Server Type    : MySQL
 Source Server Version : 100108
 Source Host           : localhost:3306
 Source Schema         : sikiper

 Target Server Type    : MySQL
 Target Server Version : 100108
 File Encoding         : 65001

 Date: 24/10/2018 22:44:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota`  (
  `id_anggota` int(255) NOT NULL AUTO_INCREMENT,
  `nik_anggota` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_anggota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_bergabung` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES (3, '123123', 'Anggota', '2018-10-03 12:47:49.092881');
INSERT INTO `anggota` VALUES (4, '321321321', 'Anggota', '2018-10-06 20:26:29.141233');

-- ----------------------------
-- Table structure for angsuran
-- ----------------------------
DROP TABLE IF EXISTS `angsuran`;
CREATE TABLE `angsuran`  (
  `id_angsuran` int(255) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` int(255) NULL DEFAULT NULL,
  `nominal_angsuran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_pembayaran` timestamp(6) NULL DEFAULT NULL,
  `angsuran_ke` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id_angsuran`) USING BTREE,
  INDEX `pinjaman`(`id_pinjaman`) USING BTREE,
  CONSTRAINT `pinjaman` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pinjaman
-- ----------------------------
DROP TABLE IF EXISTS `pinjaman`;
CREATE TABLE `pinjaman`  (
  `id_pinjaman` int(99) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(99) NOT NULL COMMENT ' ',
  `nominal_pinjaman` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_pengajuan` timestamp(6) NULL DEFAULT NULL,
  `tenor_pinjaman` int(5) NULL DEFAULT NULL,
  `jatuh_tempo_pembayaran` date NULL DEFAULT NULL,
  `status_pinjaman` int(1) NULL DEFAULT NULL COMMENT '0 : Belum Lunas; 1 : Lunas',
  PRIMARY KEY (`id_pinjaman`) USING BTREE,
  INDEX `angota_pinjaman`(`id_anggota`) USING BTREE,
  CONSTRAINT `angota_pinjaman` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for simpanan_pokok
-- ----------------------------
DROP TABLE IF EXISTS `simpanan_pokok`;
CREATE TABLE `simpanan_pokok`  (
  `id_simp_pokok` int(255) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(255) NOT NULL,
  `nominal_pokok` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_disetorkan` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id_simp_pokok`) USING BTREE,
  INDEX `anggota_simpanan_pokok`(`id_anggota`) USING BTREE,
  CONSTRAINT `anggota_simpanan_pokok` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for simpanan_sukarela
-- ----------------------------
DROP TABLE IF EXISTS `simpanan_sukarela`;
CREATE TABLE `simpanan_sukarela`  (
  `id_simp_sukarela` int(255) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(255) NOT NULL COMMENT ' ',
  `nominal_simp_sukarela` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_disetorkan` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id_simp_sukarela`) USING BTREE,
  INDEX `anggota_simpanan_sukarela`(`id_anggota`) USING BTREE,
  CONSTRAINT `anggota_simpanan_sukarela` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for simpanan_wajib
-- ----------------------------
DROP TABLE IF EXISTS `simpanan_wajib`;
CREATE TABLE `simpanan_wajib`  (
  `id_simp_wajib` int(255) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(255) NOT NULL COMMENT ' ',
  `nominal_simp_wajib` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_disetorkan` time(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id_simp_wajib`) USING BTREE,
  INDEX `anggota_simpanan_wajib`(`id_anggota`) USING BTREE,
  CONSTRAINT `anggota_simpanan_wajib` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of simpanan_wajib
-- ----------------------------
INSERT INTO `simpanan_wajib` VALUES (1, 3, '80000', NULL);
INSERT INTO `simpanan_wajib` VALUES (2, 3, '90000', NULL);

SET FOREIGN_KEY_CHECKS = 1;
