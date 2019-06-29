/*
 Navicat Premium Data Transfer

 Source Server         : mySQL
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : sikiper

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 29/06/2019 09:13:03
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
  `role` int(1) NULL DEFAULT NULL COMMENT '0:Anggota,1:Petugas',
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES (3, 'amirhamzah', 'Anggota', '2019-06-25 19:45:59.836728', 1, 'e172dd95f4feb21412a692e73929961e');
INSERT INTO `anggota` VALUES (4, 'anggota', 'Anggota', '2019-06-25 20:10:46.101690', 2, 'e172dd95f4feb21412a692e73929961e');

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
  `status_angsuran` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_angsuran`) USING BTREE,
  INDEX `pinjaman`(`id_pinjaman`) USING BTREE,
  CONSTRAINT `pinjaman` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of angsuran
-- ----------------------------
INSERT INTO `angsuran` VALUES (1, 3, '60000', '2018-11-07 18:31:29.000000', 1, NULL);
INSERT INTO `angsuran` VALUES (2, 3, '60000', '2018-11-07 18:32:53.000000', 2, NULL);
INSERT INTO `angsuran` VALUES (3, 3, '234000', NULL, 3, NULL);

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
  `status_pinjaman` int(1) NULL DEFAULT 0 COMMENT '0 : Proses; 1 : Disetujui,Belum Lunas, 2:Lunas',
  PRIMARY KEY (`id_pinjaman`) USING BTREE,
  INDEX `angota_pinjaman`(`id_anggota`) USING BTREE,
  CONSTRAINT `angota_pinjaman` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pinjaman
-- ----------------------------
INSERT INTO `pinjaman` VALUES (3, 4, '300000', '2018-11-07 18:30:13.000000', 5, '2018-11-06', 1);

-- ----------------------------
-- Table structure for rekap
-- ----------------------------
DROP TABLE IF EXISTS `rekap`;
CREATE TABLE `rekap`  (
  `id_pelanggan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pelanggan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for simpanan_pokok
-- ----------------------------
DROP TABLE IF EXISTS `simpanan_pokok`;
CREATE TABLE `simpanan_pokok`  (
  `id_simp_pokok` int(255) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(255) NOT NULL,
  `nominal_pokok` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_disetorkan` timestamp(6) NULL DEFAULT NULL,
  `status_pokok` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_simp_pokok`) USING BTREE,
  INDEX `anggota_simpanan_pokok`(`id_anggota`) USING BTREE,
  CONSTRAINT `anggota_simpanan_pokok` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of simpanan_pokok
-- ----------------------------
INSERT INTO `simpanan_pokok` VALUES (1, 4, '156000', '2019-04-03 00:00:00.000000', NULL);

-- ----------------------------
-- Table structure for simpanan_sukarela
-- ----------------------------
DROP TABLE IF EXISTS `simpanan_sukarela`;
CREATE TABLE `simpanan_sukarela`  (
  `id_simp_sukarela` int(255) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(255) NOT NULL COMMENT ' ',
  `nominal_simp_sukarela` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_disetorkan` timestamp(6) NULL DEFAULT NULL,
  `status_sukarela` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_simp_sukarela`) USING BTREE,
  INDEX `anggota_simpanan_sukarela`(`id_anggota`) USING BTREE,
  CONSTRAINT `anggota_simpanan_sukarela` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of simpanan_sukarela
-- ----------------------------
INSERT INTO `simpanan_sukarela` VALUES (1, 4, '980000', '2018-11-07 00:00:00.000000', NULL);

-- ----------------------------
-- Table structure for simpanan_wajib
-- ----------------------------
DROP TABLE IF EXISTS `simpanan_wajib`;
CREATE TABLE `simpanan_wajib`  (
  `id_simp_wajib` int(255) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(255) NOT NULL COMMENT ' ',
  `nominal_simp_wajib` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_disetorkan` date NULL DEFAULT NULL,
  `status_wajib` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_simp_wajib`) USING BTREE,
  INDEX `anggota_simpanan_wajib`(`id_anggota`) USING BTREE,
  CONSTRAINT `anggota_simpanan_wajib` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of simpanan_wajib
-- ----------------------------
INSERT INTO `simpanan_wajib` VALUES (3, 4, '900000', '2018-11-06', 0);
INSERT INTO `simpanan_wajib` VALUES (4, 4, '890000', '2018-11-06', 1);

SET FOREIGN_KEY_CHECKS = 1;
