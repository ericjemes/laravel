/*
Navicat MySQL Data Transfer

Source Server         : 10.10.1.138
Source Server Version : 50549
Source Host           : 10.10.1.138:3306
Source Database       : chaojijiaolian

Target Server Type    : MYSQL
Target Server Version : 50549
File Encoding         : 65001

Date: 2017-12-22 15:50:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_manage_role
-- ----------------------------
DROP TABLE IF EXISTS `t_manage_role`;
CREATE TABLE `t_manage_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `is_admin` int(4) NOT NULL DEFAULT '0' COMMENT '是否管理员 0:否 1:是',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '角色名称',
  `desc` varchar(50) NOT NULL DEFAULT '' COMMENT '角色说明',
  `menu_json` varchar(200) NOT NULL DEFAULT '' COMMENT '角色分配的菜单',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '数据状态:1:正常 0:失效',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='角色表';

-- ----------------------------
-- Records of t_manage_role
-- ----------------------------
INSERT INTO `t_manage_role` VALUES ('1', '1', '超级管理员', '超级管理员', '', '1', '1495538230', '1495538230');
INSERT INTO `t_manage_role` VALUES ('2', '0', '用户管理角色', '用户管理角色', '2,1025,1026,1027', '1', '1495538995', '1496234168');
INSERT INTO `t_manage_role` VALUES ('3', '0', '菜单管理角色', '菜单管理角色', '1,2,1025', '1', '1495539004', '1495627055');
