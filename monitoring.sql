/*
 Navicat Premium Data Transfer

 Source Server         : lokal
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : monitoring

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 19/07/2020 19:32:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_kunjungan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kunjungan`;
CREATE TABLE `tb_kunjungan`  (
  `id_kunjungan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_pol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_kunjungan` date NULL DEFAULT NULL,
  `jam_masuk` time(0) NULL DEFAULT NULL,
  `jam_keluar` time(0) NULL DEFAULT NULL,
  `jenis_kunjungan` enum('rutin','non_rutin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'non_rutin',
  `driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_keluar` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_kunjungan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_kunjungan
-- ----------------------------
INSERT INTO `tb_kunjungan` VALUES ('85f13a868b9a50', 'k-5049-fq', '2020-07-19', '08:56:56', '09:18:23', 'non_rutin', 'wawan', '2020-07-19');
INSERT INTO `tb_kunjungan` VALUES ('85f13b1df31585', 'K-5122-KQ', '2020-07-19', '09:37:19', '09:37:32', 'non_rutin', 'hermawan', '2020-07-19');
INSERT INTO `tb_kunjungan` VALUES ('85f13f82d35e2c', 'K-5122-KQ', '2020-07-19', '14:37:17', '14:42:34', 'non_rutin', 'hermawan', '2020-07-19');
INSERT INTO `tb_kunjungan` VALUES ('85f14021706c79', 'K-5122-KQ', '2020-07-19', '15:19:35', '15:21:08', 'non_rutin', 'hermawan', '2020-07-19');
INSERT INTO `tb_kunjungan` VALUES ('85f14026ce6e59', 'K-5122-KQ', '2020-07-19', '15:21:00', '15:21:13', 'rutin', 'hermawan', '2020-07-19');
INSERT INTO `tb_kunjungan` VALUES ('85f1402a7c1b90', 'k-7890-gt', '2020-07-17', '15:21:59', '17:49:33', 'non_rutin', 'setiadi', '2020-07-17');

-- ----------------------------
-- Table structure for tb_pengunjung
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengunjung`;
CREATE TABLE `tb_pengunjung`  (
  `no_pol` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_terdaftar` date NULL DEFAULT NULL,
  `tgl_update` date NULL DEFAULT NULL,
  PRIMARY KEY (`no_pol`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_pengunjung
-- ----------------------------
INSERT INTO `tb_pengunjung` VALUES ('K-5122-KQ', 'hermawan', '2020-07-19', '2020-07-19');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('12345', 'admin', 'admin', '1');

SET FOREIGN_KEY_CHECKS = 1;
