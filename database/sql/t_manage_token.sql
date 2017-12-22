/*
Navicat MySQL Data Transfer

Source Server         : 10.10.1.138
Source Server Version : 50549
Source Host           : 10.10.1.138:3306
Source Database       : chaojijiaolian

Target Server Type    : MYSQL
Target Server Version : 50549
File Encoding         : 65001

Date: 2017-12-22 15:50:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_manage_token
-- ----------------------------
DROP TABLE IF EXISTS `t_manage_token`;
CREATE TABLE `t_manage_token` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `token` varchar(50) NOT NULL DEFAULT '' COMMENT '登录token',
  `type` int(4) NOT NULL DEFAULT '0' COMMENT '用户类型 0:默认 1:微信',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '数据状态:1:正常 0:失效',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_user_id` (`user_id`,`type`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1009 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='登录token表';

-- ----------------------------
-- Records of t_manage_token
-- ----------------------------
INSERT INTO `t_manage_token` VALUES ('1005', '1006', '7f1c3a899ebbf3fbd992eb886fd47ee4', '0', '1', '1494914254', '1495022011');
INSERT INTO `t_manage_token` VALUES ('1006', '1013', 'b53542440f584436cfa776b32c077593', '0', '1', '1494933132', '1497528695');
INSERT INTO `t_manage_token` VALUES ('1007', '1014', 'efe196fecdccaa02f621bfdb47dadc7c', '0', '1', '1494938027', '1494938027');
INSERT INTO `t_manage_token` VALUES ('1008', '1011', 'd334d115f0b4d1f53ebbaf205fe0848a', '0', '1', '1495197875', '1508480478');
