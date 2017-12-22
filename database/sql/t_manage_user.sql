/*
Navicat MySQL Data Transfer

Source Server         : 10.10.1.138
Source Server Version : 50549
Source Host           : 10.10.1.138:3306
Source Database       : chaojijiaolian

Target Server Type    : MYSQL
Target Server Version : 50549
File Encoding         : 65001

Date: 2017-12-22 15:49:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_manage_user
-- ----------------------------
DROP TABLE IF EXISTS `t_manage_user`;
CREATE TABLE `t_manage_user` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名称',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '用户手机号',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮件地址',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT '用户密码',
  `type` int(4) NOT NULL DEFAULT '0' COMMENT '用户类型 0:默认 1:微信',
  `role` varchar(50) NOT NULL DEFAULT '0' COMMENT '用户拥有的角色',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT '个人描述',
  `address` varchar(100) NOT NULL COMMENT '地址信息',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '数据状态:1:正常 0:失效',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_telephone` (`mobile`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1020 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户表';

-- ----------------------------
-- Records of t_manage_user
-- ----------------------------
INSERT INTO `t_manage_user` VALUES ('1011', 'jemes', '18652979331', '490573621@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', 'i am a good man,hahahaha! you will aways know...', '上海.闵行', '1', '1494914900', '1501239274');
INSERT INTO `t_manage_user` VALUES ('1012', 'jemes', '18652979330', '', 'e10adc3949ba59abbe56e057f20f883e', '0', '1', '', '', '0', '1494914902', '1495715273');
INSERT INTO `t_manage_user` VALUES ('1013', 'jemes1', '18652979337', '', 'e10adc3949ba59abbe56e057f20f883e', '0', '3', '', '', '0', '1494933128', '1501239215');
INSERT INTO `t_manage_user` VALUES ('1014', 'name', '18652979338', '', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '', '', '0', '1494938018', '1501239232');
INSERT INTO `t_manage_user` VALUES ('1016', 'jemes1', '18652979321', '', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '', '', '0', '1494933128', '1501239236');
INSERT INTO `t_manage_user` VALUES ('1017', 'jemes1', '18652979322', '', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '', '', '0', '1494933128', '1501239238');
INSERT INTO `t_manage_user` VALUES ('1018', '15195903380', '15195903380', '', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', '', '', '0', '1494933128', '1501239240');
INSERT INTO `t_manage_user` VALUES ('1019', 'jean_14', '15195903382', '1016668405@qq.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', '0', '', '', '0', '1494933128', '1501239242');
