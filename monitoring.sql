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

 Date: 23/07/2020 00:30:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tahun
-- ----------------------------
DROP TABLE IF EXISTS `tahun`;
CREATE TABLE `tahun`  (
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`tahun`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tahun
-- ----------------------------
INSERT INTO `tahun` VALUES ('2019');
INSERT INTO `tahun` VALUES ('2020');
INSERT INTO `tahun` VALUES ('2021');
INSERT INTO `tahun` VALUES ('2022');

-- ----------------------------
-- Table structure for tb_data_kendaraan
-- ----------------------------
DROP TABLE IF EXISTS `tb_data_kendaraan`;
CREATE TABLE `tb_data_kendaraan`  (
  `id_data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_pol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_kepemilikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_teregistrasi` date NULL DEFAULT NULL,
  `tgl_kadaluwarsa` date NULL DEFAULT NULL,
  `keaktifan` enum('aktif','expired') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_data`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_jenis_kendaraan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_kendaraan`;
CREATE TABLE `tb_jenis_kendaraan`  (
  `id_jenis_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_kendaraan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_kendaraan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kendaraan`;
CREATE TABLE `tb_kendaraan`  (
  `no_pol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kendaraan` int(255) NULL DEFAULT NULL,
  `merek_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `seri_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `warna_kendaraan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`no_pol`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
-- Table structure for tb_merek
-- ----------------------------
DROP TABLE IF EXISTS `tb_merek`;
CREATE TABLE `tb_merek`  (
  `id_merek` int(255) NOT NULL AUTO_INCREMENT,
  `merek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_merek`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `tb_pegawai`;
CREATE TABLE `tb_pegawai`  (
  `id_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pegawai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
-- Table structure for tb_perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `tb_perusahaan`;
CREATE TABLE `tb_perusahaan`  (
  `id_perusahaan` int(255) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 87 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_perusahaan
-- ----------------------------
INSERT INTO `tb_perusahaan` VALUES (1, 'PT PLN (Persero) UIK TJB', NULL);
INSERT INTO `tb_perusahaan` VALUES (2, 'PT Haleyora Powerindo', NULL);
INSERT INTO `tb_perusahaan` VALUES (3, 'PT Central Jawa Power', NULL);
INSERT INTO `tb_perusahaan` VALUES (4, 'PT PJB Services', NULL);
INSERT INTO `tb_perusahaan` VALUES (5, 'PT TJB Power Services', NULL);
INSERT INTO `tb_perusahaan` VALUES (6, 'PT Prambanan Dwipaka', NULL);
INSERT INTO `tb_perusahaan` VALUES (7, 'PT Catur Manunggal', NULL);
INSERT INTO `tb_perusahaan` VALUES (8, 'PT Zamaraya Aztrin', NULL);
INSERT INTO `tb_perusahaan` VALUES (9, 'PT Komipo Pembangkitan Jawa Bali', NULL);
INSERT INTO `tb_perusahaan` VALUES (10, 'CV Bangun Arta', NULL);
INSERT INTO `tb_perusahaan` VALUES (11, 'PT Bahtera Adhiguna', NULL);
INSERT INTO `tb_perusahaan` VALUES (12, 'Bank Negara Indonesia 46', NULL);
INSERT INTO `tb_perusahaan` VALUES (13, 'Koperasi Pegawai Tanjung Jati B', NULL);
INSERT INTO `tb_perusahaan` VALUES (14, 'PT PLN (Persero) Pusat Manajemen Proyek', NULL);
INSERT INTO `tb_perusahaan` VALUES (15, 'PT Kalinyamat Perkasa', NULL);
INSERT INTO `tb_perusahaan` VALUES (16, 'PT. Indominco Mandiri', NULL);
INSERT INTO `tb_perusahaan` VALUES (17, 'UIT JBT GI Tanjung Jati', NULL);
INSERT INTO `tb_perusahaan` VALUES (18, 'PT Bravo Security Indonesia', NULL);
INSERT INTO `tb_perusahaan` VALUES (19, 'PT. Mitra Karya Prima', '');
INSERT INTO `tb_perusahaan` VALUES (20, 'PT. Adhiguna Putera', NULL);
INSERT INTO `tb_perusahaan` VALUES (21, 'PT. Krakatau Bandar Samudera', '');

-- ----------------------------
-- Table structure for tb_status_kepemilikan
-- ----------------------------
DROP TABLE IF EXISTS `tb_status_kepemilikan`;
CREATE TABLE `tb_status_kepemilikan`  (
  `id_kepemilikan` int(2) NOT NULL,
  `status_kepemilikan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kepemilikan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
