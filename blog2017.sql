/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : blog2017

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-11-25 12:33:20
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
  `index_img` varchar(255) NOT NULL DEFAULT '' COMMENT '首图地址',
  `is_top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否置顶；0：未置顶；1：已置顶',
  PRIMARY KEY (`id`),
  KEY `idx_visit` (`visit_num`) USING BTREE,
  KEY `idx_comment` (`comment_num`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文章列表';

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', 'PHP程序设计', 'PHP|IOS|AI', '黑牛儿', '监考老师大姐夫\r\n水电费公司垃圾费\r\n是打发斯蒂芬\r\n十大f', '是的范德萨发\r\n## 十大范德萨发\r\n是的发生大法师的\r\n|  as |按时   |\r\n| ------------ | ------------ |\r\n|  asd | sa  |\r\n|  as | as  |\r\nsdfasfsdafsdf\r\n\r\n    <?php\r\n    /**\r\n     * Created by PhpStorm.\r\n     * User: chl\r\n     * Date: 2017/11/22\r\n     * Time: 13:40\r\n     */\r\n    namespace app\\admin\\controller;\r\n    \r\n    class ArticleManage {\r\n    \r\n        /**\r\n         * 显示文章列表\r\n         * @return \\think\\response\\View\r\n         */\r\n        public function index()\r\n        {\r\n            return view();\r\n        }\r\n    \r\n        public function save()\r\n        {\r\n            print_r(input());\r\n            return false;\r\n        }\r\n    }', '0', '1511495699', '1', '1', '321', '/static/tmpImg/201708252044567037.jpg', '1');
INSERT INTO `blog_article` VALUES ('2', '图片测试', 'IOS|AI|', '黑牛儿', '图片测试', '![](/uploads\\20171122\\c3ade49465f29d204e27fc9b0f5a9142.jpg)\r\nsdfsdfsdf\r\n`sdfsdfsdfsdfsdfsdfsdfsdfsd`\r\n[百度][1]\r\n[1]: http://www.baid.com \"百度\"', '0', '1511495689', '1', '12', '21', '/static/tmpImg/201708252044567037.jpg', '0');
INSERT INTO `blog_article` VALUES ('3', 'mysql 利用merge 引擎分表', 'Mysql|merge|分表|Mysqlfenbiao', '黑牛儿', 'Mysql利用merge 引擎实现分表', '# 序言\r\n		日常开发中我们经常会遇到大表的情况，所谓的大表是指存储了百万级乃至千万级条记录的表。这样的表过于庞大，导致数据库在查询和插入的时候耗时太长，性能低下，如果涉及联合查询的情况，性能会更加糟糕，可能就死在那了。分表的目的就是减少数据库的负担，提高数据库的效率，通常点来讲就是提高表的增删改查效率。这里主要讲使用MERGE存储引擎来实现分表。\r\n	\r\n# 正文\r\n个人是小白，所以在前人的经验上，把自己踩过的坑填上。在这里博主用的是MySQL5.5，有一张city表，举例把它分成两张表。 \r\n首先创建两张子表和city表具有同样的表结构\r\n    #查看表结构\r\n    mysql> desc city;\r\n    +-------------+----------+------+-----+---------+----------------+\r\n    | Field       | Type     | Null | Key | Default | Extra          |\r\n    +-------------+----------+------+-----+---------+----------------+\r\n    | ID          | int(11)  | NO   | PRI | NULL    | auto_increment |\r\n    | Name        | char(35) | NO   | MUL |         |                |\r\n    | CountryCode | char(3)  | NO   |     |         |                |\r\n    | District    | char(20) | NO   |     |         |                |\r\n    | Population  | int(11)  | NO   |     | 0       |                |\r\n    +-------------+----------+------+-----+---------+----------------+\r\n    5 rows in set (0.12 sec)\r\n    \r\n    #创建子表\r\n    mysql>CREATE TABLE IF NOT EXISTS `city1` (\r\n    ->  `ID` int(11) NOT NULL AUTO_INCREMENT,\r\n    ->  `Name` char(35) NOT NULL,\r\n    ->  `CountryCode` char(3) NOT NULL,\r\n    ->  `District` char(20) NOT NULL,\r\n    ->  `Population` int(11) NOT NULL,\r\n    ->  PRIMARY KEY (`ID`) ) \r\n    ->  ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;  \r\n    \r\n    mysql>CREATE TABLE IF NOT EXISTS `city2` (\r\n    ->  `ID` int(11) NOT NULL AUTO_INCREMENT,\r\n    ->  `Name` char(35) NOT NULL,\r\n    ->  `CountryCode` char(3) NOT NULL,\r\n    ->  `District` char(20) NOT NULL,\r\n    ->  `Population` int(11) NOT NULL,\r\n    ->  PRIMARY KEY (`ID`) ) \r\n    ->  ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ; \r\n	\r\n	现在来创建主表，主表类似于一个壳子，逻辑上封装了子表，实际上数据都是存储在子表中的。\r\n	    #创建主表\r\n    mysql>CREATE TABLE IF NOT EXISTS `allcity` (\r\n    ->  `ID` int(11) NOT NULL AUTO_INCREMENT,\r\n    ->  `Name` char(35) NOT NULL,\r\n    ->  `CountryCode` char(3) NOT NULL,\r\n    ->  `District` char(20) NOT NULL,\r\n    ->  `Population` int(11) NOT NULL,\r\n    ->  PRIMARY KEY (`ID`) ) \r\n    ->  ENGINE=MERGE UNION=(city1,city2) INSERT_METHOD=LAST CHARSET=utf8 AUTO_INCREMENT=1 ;\r\n	\r\n	创建主表的时候有个INSERT_METHOD，指明插入方式，取值可以是：0 不允许插入；FIRST 插入到UNION中的第一个表； LAST 插入到UNION中的最后一个表。现在我需要把现有的city表分为分拆到city1和city2表中。\r\n	\r\n    #把2000条数据插入city1表\r\n    mysql>INSERT INTO city1(city1.ID,city1.Name,city1.CountryCode,city1.District,city1.Population) SELECT city.ID,city.Name,city.CountryCode,city.District,city.Population FROM city where city.ID <= 2000;   \r\n    #把剩下的数据插入city2表\r\n    mysql>INSERT INTO city2(city2.ID,city2.Name,city2.CountryCode,city2.District,city2.Population) SELECT city.ID,city.Name,city.CountryCode,city.District,city.Population FROM city where city.ID >= 2000;  \r\n\r\n这样我就成功的将一张city表，分成了二个表，这个时候有一个问题，代码中的sql语句怎么办，以前是一张表，现在变成二张表了，代码改动很大，这样带来了很大的工作量，有没有好的办法解决这一点呢？办法是把以前的city表备份一下，然后删除掉，上面的操作中我建立了一个allcity表，只把这个allcity表的表名改成city就行了。', '1511490430', '1511495682', '1', '123', '1', '/static/tmpImg/201708252044567037.jpg', '0');

-- ----------------------------
-- Table structure for blog_article_tag
-- ----------------------------
DROP TABLE IF EXISTS `blog_article_tag`;
CREATE TABLE `blog_article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `tag` varchar(60) NOT NULL DEFAULT '' COMMENT '文章标签',
  `show_times` tinyint(11) NOT NULL DEFAULT '1' COMMENT '出现次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1：正常，2：屏蔽',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`) USING BTREE,
  KEY `idx_showTimes` (`show_times`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='文章标签记录表';

-- ----------------------------
-- Records of blog_article_tag
-- ----------------------------
INSERT INTO `blog_article_tag` VALUES ('52', 'PHP', '1', '1');
INSERT INTO `blog_article_tag` VALUES ('53', 'IOS', '2', '1');
INSERT INTO `blog_article_tag` VALUES ('54', 'AI', '2', '1');
INSERT INTO `blog_article_tag` VALUES ('56', 'Mysql', '1', '1');
INSERT INTO `blog_article_tag` VALUES ('57', 'merge', '1', '1');
INSERT INTO `blog_article_tag` VALUES ('58', '分表', '1', '1');
INSERT INTO `blog_article_tag` VALUES ('59', 'Mysqlfenbiao', '1', '1');

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
