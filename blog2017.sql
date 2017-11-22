/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : blog2017

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-11-22 17:26:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `tag` text NOT NULL COMMENT '文章所属标签',
  `author` varchar(255) NOT NULL DEFAULT '' COMMENT '作者',
  `description` text NOT NULL COMMENT '文章描述信息',
  `content` text NOT NULL COMMENT '文章内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1：正常，2：屏蔽',
  `visit_num` int(11) NOT NULL DEFAULT '0' COMMENT '阅读次数',
  `comment_num` int(11) NOT NULL DEFAULT '0' COMMENT '评论条数',
  PRIMARY KEY (`id`),
  KEY `idx_visit` (`visit_num`) USING BTREE,
  KEY `idx_comment` (`comment_num`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章列表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', 'PHP程序设计', '', '', '监考老师大姐夫\r\n水电费公司垃圾费\r\n是打发斯蒂芬\r\n十大f', '是的范德萨发\r\n## 十大范德萨发\r\n是的发生大法师的\r\n|  as |按时   |\r\n| ------------ | ------------ |\r\n|  asd | sa  |\r\n|  as | as  |\r\nsdfasfsdafsdf\r\n\r\n    <?php\r\n    /**\r\n     * Created by PhpStorm.\r\n     * User: chl\r\n     * Date: 2017/11/22\r\n     * Time: 13:40\r\n     */\r\n    namespace app\\admin\\controller;\r\n    \r\n    class ArticleManage {\r\n    \r\n        /**\r\n         * 显示文章列表\r\n         * @return \\think\\response\\View\r\n         */\r\n        public function index()\r\n        {\r\n            return view();\r\n        }\r\n    \r\n        public function save()\r\n        {\r\n            print_r(input());\r\n            return false;\r\n        }\r\n    }', '0', '0', '1', '0', '0');
INSERT INTO `blog_article` VALUES ('2', '图片测试', '图片;PHP;Java;', '黑牛儿', '图片测试', '![](/uploads\\20171122\\c3ade49465f29d204e27fc9b0f5a9142.jpg)\r\nsdfsdfsdf\r\n`sdfsdfsdfsdfsdfsdfsdfsdfsd`\r\n[百度][1]\r\n[1]: http://www.baid.com \"百度\"', '0', '0', '1', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='后台菜单管理表';

-- ----------------------------
-- Records of blog_menu
-- ----------------------------
INSERT INTO `blog_menu` VALUES ('1', '0', '系统设置', '/MenuMange/MenuMange', '1', '2');
INSERT INTO `blog_menu` VALUES ('2', '1', '菜单管理', '/MenuMange/MenuMange', '1', '21');
INSERT INTO `blog_menu` VALUES ('3', '0', '首页', '/', '1', '1');
INSERT INTO `blog_menu` VALUES ('4', '0', '权限管理', '/Role/index', '1', '3');
INSERT INTO `blog_menu` VALUES ('5', '0', '文章管理', '/ArticleManage/index', '1', '4');
INSERT INTO `blog_menu` VALUES ('6', '5', '类别管理', '/ArticleManage/index', '1', '42');
INSERT INTO `blog_menu` VALUES ('7', '5', '标签管理', '/', '1', '43');
INSERT INTO `blog_menu` VALUES ('16', '5', '文章列表', '/ArticleManage/index', '1', '41');
