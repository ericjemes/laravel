/*
Navicat MySQL Data Transfer

Source Server         : 10.10.1.138
Source Server Version : 50549
Source Host           : 10.10.1.138:3306
Source Database       : chaojijiaolian

Target Server Type    : MYSQL
Target Server Version : 50549
File Encoding         : 65001

Date: 2017-12-22 15:50:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_manage_menu
-- ----------------------------
DROP TABLE IF EXISTS `t_manage_menu`;
CREATE TABLE `t_manage_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(30) NOT NULL DEFAULT '0' COMMENT '菜单名称',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父菜单ID',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '菜单地址',
  `key` varchar(50) NOT NULL DEFAULT '' COMMENT '菜单key',
  `type` int(4) NOT NULL DEFAULT '0' COMMENT '菜单类型 0:菜单 1:权限 2:资源',
  `icon` varchar(25) NOT NULL DEFAULT '' COMMENT '菜单图标',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '数据状态:1:正常 0:失效',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_key` (`key`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1032 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='菜单表';

-- ----------------------------
-- Records of t_manage_menu
-- ----------------------------
INSERT INTO `t_manage_menu` VALUES ('1', '用户管理', '0', '', 'user', '26', 'ec-users', '1', '0', '1509011519');
INSERT INTO `t_manage_menu` VALUES ('2', '用户列表', '1', '/user/list', 'user_list', '0', '0', '1', '0', '1495461420');
INSERT INTO `t_manage_menu` VALUES ('1021', '菜单管理', '0', '#', 'menu_manage', '0', 'im-menu', '1', '1495455083', '1496233264');
INSERT INTO `t_manage_menu` VALUES ('1023', '菜单列表', '1021', '/menu/list', 'menu_list', '0', '0', '1', '1495458036', '1495458036');
INSERT INTO `t_manage_menu` VALUES ('1024', '菜单添加', '1021', '/menu/add', 'menu_add', '0', '0', '1', '1495433444', '1495455442');
INSERT INTO `t_manage_menu` VALUES ('1025', '角色列表', '1026', '/role/list', 'role_list', '0', '0', '1', '1495537885', '1495538003');
INSERT INTO `t_manage_menu` VALUES ('1026', '角色管理', '0', '#', 'role', '0', 'im-profile', '1', '1495537988', '1496233333');
INSERT INTO `t_manage_menu` VALUES ('1027', '角色添加', '1026', '/role/add', 'role_add', '0', '0', '1', '1495538043', '1495538043');
INSERT INTO `t_manage_menu` VALUES ('1028', '教练管理', '0', '#', 'coach_manage', '0', '', '1', '1501239796', '1501239796');
INSERT INTO `t_manage_menu` VALUES ('1029', '教练列表', '1028', '/coach/list', 'coach_list', '0', '', '1', '1501239865', '1501239865');
INSERT INTO `t_manage_menu` VALUES ('1030', 'app名片', '1028', '/coach/card_list', 'coach_card_list', '0', '', '1', '1501239932', '1501239932');
INSERT INTO `t_manage_menu` VALUES ('1031', '招生地址', '1028', '/coach/address_list', 'coach_address_list', '0', '', '1', '1501240007', '1501240007');
