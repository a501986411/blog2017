/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : blog2017

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-11-21 18:01:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_menu
-- ----------------------------
DROP TABLE IF EXISTS `blog_menu`;
CREATE TABLE `blog_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键Id',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单ID',
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '菜单链接地址',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态，1：启用，0：停用；停用后所有子菜单同时停用',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='后台菜单管理表';

-- ----------------------------
-- Records of blog_menu
-- ----------------------------
INSERT INTO `blog_menu` VALUES ('1', '0', '系统设置', '/Index/MenuMange', '1', '2');
INSERT INTO `blog_menu` VALUES ('2', '1', '菜单管理', '/Index/MenuMange', '1', '21');
INSERT INTO `blog_menu` VALUES ('3', '0', '首页', '/', '1', '1');
