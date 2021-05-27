/*
 Navicat Premium Data Transfer

 Source Server         : xampp7.2
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : db_inventori

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 27/05/2021 08:21:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `status_active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '1',
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'manager@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '1', 'manager');
INSERT INTO `tbl_user` VALUES (2, 'worker@gmail.com', 'b61822e8357dcaff77eaaccf348d9134', 2, '1', 'Worker');

SET FOREIGN_KEY_CHECKS = 1;
