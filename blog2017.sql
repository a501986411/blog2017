-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: blog2017
-- ------------------------------------------------------
-- Server version	5.7.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_admin_user`
--

DROP TABLE IF EXISTS `blog_admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id主键',
  `login_name` varchar(255) DEFAULT '' COMMENT '登录账号',
  `user_name` varchar(255) DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码加密字符串',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次登录时间',
  `ip` varchar(255) DEFAULT '' COMMENT '最后一次登录IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_admin_user`
--

LOCK TABLES `blog_admin_user` WRITE;
/*!40000 ALTER TABLE `blog_admin_user` DISABLE KEYS */;
INSERT INTO `blog_admin_user` VALUES (1,'admin','黑牛儿','14e1b600b1fd579f47433b88e8d85291',1515158236,'223.85.221.18');
/*!40000 ALTER TABLE `blog_admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_article`
--

DROP TABLE IF EXISTS `blog_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='文章列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_article`
--

LOCK TABLES `blog_article` WRITE;
/*!40000 ALTER TABLE `blog_article` DISABLE KEYS */;
INSERT INTO `blog_article` VALUES (2,'JS金额转大写','Javascript|金额转大写|Jquery','黑牛儿','利用js JQuery实现金额大写转换','\r\n###需提前引入jquery \r\n```\r\n(function ($) {\r\n        $.numToRmb = function (n) {\r\n            var fraction = [\'角\', \'分\'];\r\n            var digit = [\r\n                \'零\', \'壹\', \'贰\', \'叁\', \'肆\',\r\n                \'伍\', \'陆\', \'柒\', \'捌\', \'玖\'\r\n            ];\r\n            var unit = [\r\n                [\'元\', \'万\', \'亿\'],\r\n                [\'\', \'拾\', \'佰\', \'仟\']\r\n            ];\r\n            var head = n &amp;amp;amp;lt; 0 ? \'负数\' : \'\';\r\n            n = Math.abs(n);\r\n            var s = \'\';\r\n            for (var i = 0; i &amp;amp;amp;lt; fraction.length; i++) {\r\n                s += (digit[Math.floor(n * (10 * Math.pow(10, i))) % 10] + fraction[i]).replace(/零./, \'\');\r\n            }\r\n            s = s || \'整\';\r\n            n = Math.floor(n);\r\n            for (var i = 0; i &amp;amp;amp;lt; unit[0].length &amp;amp;amp;amp;&amp;amp;amp;amp; n &amp;amp;amp;gt; 0; i++) {\r\n                var p = \'\';\r\n                for (var j = 0; j &amp;amp;amp;lt; unit[1].length &amp;amp;amp;amp;&amp;amp;amp;amp; n &amp;amp;amp;gt; 0; j++) {\r\n                    p = digit[n % 10] + unit[1][j] + p;\r\n                    n = Math.floor(n / 10);\r\n                }\r\n                s = p.replace(/(零.)*零$/, \'\').replace(/^$/, \'零\') + unit[0][i] + s;\r\n            }\r\n            return head + s.replace(/(零.)*零元/, \'元\')\r\n                            .replace(/(零.)+/g, \'零\')\r\n                            .replace(/^整$/, \'零元整\');\r\n        }\r\n    })(jQuery)\r\n\r\n```\r\n - 调用方法:`$.numToRmb(125.24)`',1515071011,1515071011,1,12,0,'',0),(3,'阿里云服务器 Centos 7 上安装LAMP web环境','Mysql| LAMP|lamp|apache|mysql|PHP|阿里云 ','黑牛儿','阿里云服务器上 Centos7 系统上安装 web运行环境，这个是PHP程序猿必备技能，我的安装步骤，并记录在文章中，希望更多的人不走弯路。','## 一、yum命令 安装apache(httpd)\r\n\r\n```\r\n 执行以下命令：  yum install httpd -y\r\n \r\n```\r\n```\r\n然后执行命令车看是否安装成功（能找到如：httpd-2.4.6-67.el7.centos.6.x86_64则成功） ： rpm -qa httpd \r\n```\r\n```\r\n启动httpd: systemctl start httpd\r\n```\r\n\r\n```\r\n查看启动状态： systemctl status httpd\r\n```\r\n出现以下结果则表示启动成功：\r\n\r\n```\r\n● httpd.service - The Apache HTTP Server\r\n   Loaded: loaded (/usr/lib/systemd/system/httpd.service; disabled; vendor preset: disabled)\r\n   Active: active (running) since Fri 2017-12-01 10:04:33 CST; 19s ago\r\n     Docs: man:httpd(8)\r\n           man:apachectl(8)\r\n Main PID: 1374 (httpd)\r\n   Status: &quot;Total requests: 0; Current requests/sec: 0; Current traffic:   0 B/sec&quot;\r\n   CGroup: /system.slice/httpd.service\r\n           ├─1374 /usr/sbin/httpd -DFOREGROUND\r\n           ├─1375 /usr/sbin/httpd -DFOREGROUND\r\n           ├─1376 /usr/sbin/httpd -DFOREGROUND\r\n           ├─1377 /usr/sbin/httpd -DFOREGROUND\r\n           ├─1378 /usr/sbin/httpd -DFOREGROUND\r\n           └─1379 /usr/sbin/httpd -DFOREGROUND\r\n```\r\n到这里httpd(apache)就安装成功了；\r\n在浏览器中输入服务器ip则可以访问了；\r\n\r\n最后设置 开机自启动\r\n\r\n```\r\n执行命令：systemctl enable httpd.service\r\n\r\n成功结果：Created symlink from /etc/systemd/system/multi-user.target.wants/httpd.service to /usr/lib/systemd/system/httpd.service.\r\n\r\n```\r\n\r\n\r\n## 二、安装 Mysql（mariaDB）\r\n1. 配置mysql yum 源\r\n     利用wget命令在mysql官网中下载yum的安装包：http://dev.mysql.com/get/mysql57-community-release-el7-8.noarch.rpm\r\n```\r\n wget http://dev.mysql.com/get/mysql57-community-release-el7-8.noarch.rpm\r\n```\r\n2. 用yum命令mysql程序安装源\r\n    \r\n```\r\nyum localinstall mysql57-community-release-el7-8.noarch.rpm -y\r\n```\r\n3. 检查mysql安装源是否安装成功\r\n    \r\n```\r\n执行命令：yum repolist enabled | grep &quot;mysql.*&quot;\r\n出现以下结果则mysql源安装成功：\r\n \r\nmysql-connectors-community/x86_64 MySQL Connectors Community                  42\r\nmysql-tools-community/x86_64      MySQL Tools Community                       55\r\nmysql57-community/x86_64          MySQL 5.7 Community Server                 227\r\n```\r\n4.可以修改vim /etc/yum.repos.d/mysql-community.repo源，改变默认安装的mysql版本。比如要安装5.7版本，将5.6源的enabled=1改成enabled=0。然后再将5.7源的enabled=0改成enabled=1即可\r\n\r\n```\r\n[mysql-connectors-community]\r\nname=MySQL Connectors Community\r\nbaseurl=http://repo.mysql.com/yum/mysql-connectors-community/el/7/$basearch/\r\nenabled=1\r\ngpgcheck=1\r\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-mysql\r\n\r\n[mysql-tools-community]\r\nname=MySQL Tools Community\r\nbaseurl=http://repo.mysql.com/yum/mysql-tools-community/el/7/$basearch/\r\nenabled=1\r\ngpgcheck=1\r\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-mysql\r\n\r\n# Enable to use MySQL 5.5\r\n[mysql55-community]\r\nname=MySQL 5.5 Community Server\r\nbaseurl=http://repo.mysql.com/yum/mysql-5.5-community/el/7/$basearch/\r\nenabled=0\r\ngpgcheck=1\r\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-mysql\r\n\r\n# Enable to use MySQL 5.6\r\n[mysql56-community]\r\nname=MySQL 5.6 Community Server\r\nbaseurl=http://repo.mysql.com/yum/mysql-5.6-community/el/7/$basearch/\r\nenabled=0\r\ngpgcheck=1\r\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-mysql\r\n\r\n[mysql57-community]\r\nname=MySQL 5.7 Community Server\r\nbaseurl=http://repo.mysql.com/yum/mysql-5.7-community/el/7/$basearch/\r\nenabled=1\r\ngpgcheck=1\r\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-mysql\r\n\r\n[mysql-tools-preview]\r\nname=MySQL Tools Preview\r\nbaseurl=http://repo.mysql.com/yum/mysql-tools-preview/el/7/$basearch/\r\nenabled=0\r\ngpgcheck=1\r\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-mysql\r\n```\r\n5. 安装mysql 服务\r\n\r\n```\r\nyum install mysql-community-server\r\n```\r\n6. 启动mysqld服务\r\n\r\n```\r\n systemctl start  mysqld\r\n```\r\n\r\n```\r\n然后查看是否启动成功：systemctl status  mysqld\r\n```\r\n7. 修改root本地登录密码\r\n    mysql安装完成之后，在/var/log/mysqld.log文件中给root生成了一个默认密码。通过下面的方式找到root默认密码，然后登录mysql进行修改：\r\n\r\n```\r\n执行命令：grep \'temporary password\' /var/log/mysqld.log\r\n\r\n结果：2017-12-01T02:54:11.303463Z 1 [Note] A temporary password is generated for root@localhost: 3CLYyf:4OsNm\r\n```\r\n有结果看出默认密码是：3CLYyf:4OsNm\r\n\r\n用默认密码登录修改root密码：\r\n\r\n```\r\nset password for \'root\'@\'localhost\'=password(\'MyNewPass4!\'); \r\n```\r\n\r\n==主要：mysql5.7默认安装了密码安全检查插件（validate_password），默认密码检查策略要求密码必须包含：大小写字母、数字和特殊符号，并且长度不能少于8位。否则会提示ERROR 1819 (HY000): Your password does not satisfy the current policy requirements错误。== \r\n\r\n8. 添加远程连接mysql用户\r\n\r\n    默认只允许root帐户在本地登录，如果要在其它机器上连接mysql，必须修改root允许远程连接，或者添加一个允许远程连接的帐户，为了安全起见，我添加一个新的帐户：\r\n    \r\n```\r\ngrant all privileges on *.* to \'dev\'@\'%\' identified by \'Dev2017!\' with grant option;\r\n```\r\n以上命令成功执行后就成功添加了一个 用户名未dev 的数据库用户\r\n\r\n在远程电脑上用navcate 通过 dev 用户和密码连接数据\r\n\r\n若失败，请关闭服务器防火墙 或者开放3306端口（命令自查）\r\n\r\n若还是不能正常连接\r\n\r\n就查看 阿里元安全规则，默认是没有运行3306端口的。\r\n\r\n然后再次远程连接。我到这一步就成功了\r\n\r\n最后设置开机自启动：\r\n```\r\n执行命令：systemctl enable mysqld.service\r\n```\r\n\r\n\r\n## 三、安装php5.6\r\n\r\n本内容参考网站：[http://blog.csdn.net/u010738364/article/details/75635334](http://blog.csdn.net/u010738364/article/details/75635334)\r\n\r\n\r\n1. 配置yum源\r\n    \r\n```\r\n rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm\r\n```\r\n2. 确认yum源中有准备安装的程序版本\r\n\r\n```\r\nyum list --enablerepo=remi --enablerepo=remi-php56 | grep php\r\n```\r\n\r\n3. 安装php5.6\r\n    \r\n```\r\nyum install php56w php56w-mysql php56w-gd libjpeg* php56w-ldap php56w-odbc php56w-pear php56w-xml php56w-xmlrpc php56w-mbstring php56w-bcmath\r\n```\r\n一直 “Y”直到结束\r\n\r\n4.除了上面那些，其实还有一个包我们需要下载，是php的加密扩展库php-mhash,但在源里并没有看到，所以要单独下载。\r\n\r\n```\r\n yum -y install epel-release\r\n\r\nyum groupinstall &quot;development tools&quot;\r\n\r\nyum -y install mhash mhash-devel mcrypt\r\n```\r\n\r\n## 四、重启httpd、Mysql\r\n\r\n到此 LAMP环境配置完成',1515071059,1515071059,1,12,0,'',0),(4,'git创建ssh key','GIT|SSH|ssh key 创建','黑牛儿','Git是分布式的代码管理工具，远程的代码管理是基于SSH的，\r\n所以要使用远程的Git则需要SSH的配置。','	Git是分布式的代码管理工具，远程的代码管理是基于SSH的，所以要使用远程的Git则需要SSH的配置。\r\n	github的SSH配置如下：\r\n	一 、设置Git的user name和email：\r\n	$ git config --global user.name &amp;quot;aa&amp;quot;\r\n	$ git config --global user.email &amp;quot;aaa@gmail.com&amp;quot;\r\n	二、生产SSH key密钥\r\n	1.查看是否已经有了ssh密钥：cd ~/.ssh\r\n	如果没有密钥则不会有此文件夹，有则备份删除\r\n	2.生存密钥：\r\n	$ ssh-keygen -t rsa -C “aaa@gmail.com”\r\n	按3个回车，密码为空。\r\n	（email@email.com是github的账号，即上面的email）\r\n\r\n	Your identification has been saved in /home/tekkub/.ssh/id_rsa.\r\n	Your public key has been saved in /home/tekkub/.ssh/id_rsa.pub.\r\n	The key fingerprint is:\r\n\r\n	最后得到了两个文件：id_rsa和id_rsa.pub\r\n	3.添加id_rsa密钥到ssh，命令为：ssh-add 文件名\r\n	 如果出现error：Could not open a connection to your authentication agent.\r\n	   则先执行：$ssh-agent bash\r\n	   然后再执行：$ssh-add id_rsa \r\n出现一下结果：\r\n![](/uploads/20180104/3161858ee75663a91255b70c619e796a.png)\r\n\r\n	4.在github上添加ssh密钥，这要添加的是“id_rsa.pub”里面的公钥。\r\n	打开https://github.com/ ，登陆，复制id_rsa.pub里面的内容添加ssh。\r\n	如果直接从Linux上复制id_rsa.pub的内容，可能会复制里面的换行符，而key是没有换行符的，直接复制可能会出现下面的错误提示：\r\n	Key is invalid\r\n	Fingerprint has already been taken\r\n	Fingerprint cannot be generated\r\n\r\n	解决方案：\r\n		   $cat id_rsa.pub\r\n然后复制里面的内容，就OK了！',1515071135,1515071285,1,26,0,'',0),(5,'centOS 7 忘记root密码，重置root密码方法','CentOS7|root密码|密码重置','黑牛儿','centos7 系统 有些时候会忘记root管理员密码，所以我就整理了一份如何重置管理员密码','一、进入单用户模式\r\n开机 当进入以下界面时通过 ↑ ↓选中目标项然后按e键\r\n![](/uploads/20180105/2f4914f75ae8f4e77c833eaa32d2fce2.png)\r\n\r\n当 按下 e键后进入 如下界面\r\n![](/uploads/20180105/2e6e7527fb8e35e14a3b8d12674463e3.png)\r\n\r\n在 上图着重标记 后面 加上 &quot; rw init=/bin/sh&quot; ；如图：\r\n![](/uploads/20180105/4d700e7cc8f0f8d71fa50ef036308a42.png)\r\n\r\n然后 按 “Ctrl+x”就进入单用户模式\r\n\r\n二、修改root密码\r\n\r\n按下 “Ctrl+x” 后 会进入以下界面(可能需要等待一会):\r\n![](/uploads/20180105/9c8f164cbf306e02abcb3c132f9217f0.png)\r\n\r\n然后 数据命令 : “passwd” 界面 如图：\r\n![](/uploads/20180105/1de645c7cf05429f53fcb0a7fcbffcc9.png)\r\n\r\n然后输入 新 的root 密码，输入两次如图：\r\n![](/uploads/20180105/dad593fafa6f590c7a0ba28de1f80e6a.png)\r\n连续输入两次相同的密码后，若出现 上图中标记内容表示重置密码成功；\r\n可重启正常使用了',1515158945,1515158945,1,6,0,'/uploads/20180105/2f4914f75ae8f4e77c833eaa32d2fce2.png',0);
/*!40000 ALTER TABLE `blog_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_article_comments`
--

DROP TABLE IF EXISTS `blog_article_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_article_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键Id',
  `article_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章ID',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '回复评论ID，0',
  `content` text NOT NULL COMMENT '评论内容',
  `userId` int(11) NOT NULL COMMENT '发布者ID(畅言的userId)',
  `nickname` varchar(255) NOT NULL DEFAULT '' COMMENT '发布者昵称',
  `usericon` text NOT NULL COMMENT '发布者头像',
  `ip` varchar(60) NOT NULL DEFAULT '' COMMENT '评论Ip',
  `channeltype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为评论框直接发表的评论，2为第三方回流的评论',
  `from` varchar(255) NOT NULL DEFAULT '' COMMENT '评论来源',
  `spcount` int(11) NOT NULL DEFAULT '0' COMMENT '评论被顶次数',
  `opcount` int(11) NOT NULL DEFAULT '0' COMMENT '评论被踩次数',
  `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '评论时间',
  `cmtid` int(11) NOT NULL DEFAULT '0' COMMENT '畅言评论唯一标识ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_article_comments`
--

LOCK TABLES `blog_article_comments` WRITE;
/*!40000 ALTER TABLE `blog_article_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_article_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_article_tag`
--

DROP TABLE IF EXISTS `blog_article_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `tag` varchar(60) NOT NULL DEFAULT '' COMMENT '文章标签',
  `show_times` tinyint(11) NOT NULL DEFAULT '1' COMMENT '出现次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态；1：正常，2：屏蔽',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`) USING BTREE,
  KEY `idx_showTimes` (`show_times`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COMMENT='文章标签记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_article_tag`
--

LOCK TABLES `blog_article_tag` WRITE;
/*!40000 ALTER TABLE `blog_article_tag` DISABLE KEYS */;
INSERT INTO `blog_article_tag` VALUES (64,'Javascript',1,1),(65,'金额转大写',1,1),(66,'Jquery',1,1),(67,'Mysql',2,1),(68,'LAMP',2,1),(69,'apache',1,1),(70,'PHP',1,1),(71,'阿里云',1,1),(72,'GIT',1,1),(73,'SSH',1,1),(74,'ssh key 创建',1,1),(75,'CentOS7',1,1),(76,'root密码',1,1),(77,'密码重置',1,1);
/*!40000 ALTER TABLE `blog_article_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_friend_link`
--

DROP TABLE IF EXISTS `blog_friend_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_friend_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `web_name` varchar(255) NOT NULL DEFAULT '' COMMENT '网站名称',
  `web_url` varchar(255) NOT NULL DEFAULT '' COMMENT '网站链接地址',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `click_num` int(11) NOT NULL DEFAULT '0' COMMENT '点击次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='友情链接数据表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_friend_link`
--

LOCK TABLES `blog_friend_link` WRITE;
/*!40000 ALTER TABLE `blog_friend_link` DISABLE KEYS */;
INSERT INTO `blog_friend_link` VALUES (1,' 不落阁','http://www.lyblogs.cn/',0,2),(3,'zuoqy','http://zuoqy.cn/',0,1),(4,'WYW 一个人的博客','http://www.wuyuanwei.com/',0,0),(5,'晴枫','https://www.sunmale.cn/',0,0);
/*!40000 ALTER TABLE `blog_friend_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_leave_msg`
--

DROP TABLE IF EXISTS `blog_leave_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_leave_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键Id',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '回复评论ID，0',
  `content` text NOT NULL COMMENT '评论内容',
  `userId` int(11) NOT NULL COMMENT '发布者ID(畅言的userId)',
  `nickname` varchar(255) NOT NULL DEFAULT '' COMMENT '发布者昵称',
  `usericon` text NOT NULL COMMENT '发布者头像',
  `ip` varchar(60) NOT NULL DEFAULT '' COMMENT '评论Ip',
  `channeltype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为评论框直接发表的评论，2为第三方回流的评论',
  `from` varchar(255) NOT NULL DEFAULT '' COMMENT '评论来源',
  `spcount` int(11) NOT NULL DEFAULT '0' COMMENT '评论被顶次数',
  `opcount` int(11) NOT NULL DEFAULT '0' COMMENT '评论被踩次数',
  `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '评论时间',
  `cmtid` int(11) NOT NULL DEFAULT '0' COMMENT '畅言评论唯一标识ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_leave_msg`
--

LOCK TABLES `blog_leave_msg` WRITE;
/*!40000 ALTER TABLE `blog_leave_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_leave_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_menu`
--

DROP TABLE IF EXISTS `blog_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键Id',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级菜单ID',
  `name` varchar(60) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '菜单链接地址',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态，1：启用，0：停用；停用后所有子菜单同时停用',
  `sort` int(11) NOT NULL DEFAULT '1' COMMENT '排序',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='后台菜单管理表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_menu`
--

LOCK TABLES `blog_menu` WRITE;
/*!40000 ALTER TABLE `blog_menu` DISABLE KEYS */;
INSERT INTO `blog_menu` VALUES (1,0,'系统设置','/MenuMange/MenuMange',1,2),(2,1,'菜单管理','/MenuMange/MenuMange',1,21),(3,0,'首页','/',1,1),(5,0,'文章管理','/ArticleManage/index',1,4),(6,5,'类别管理','/ArticleManage/index',1,42),(7,5,'标签管理','/Tag/index',1,43),(16,5,'文章列表','/ArticleManage/index',1,41),(17,1,'友情链接','/FriendLink/index',1,22),(18,1,'公告管理','/Notice/index',1,23);
/*!40000 ALTER TABLE `blog_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_notice`
--

DROP TABLE IF EXISTS `blog_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键Id',
  `content` text NOT NULL COMMENT '公告内容',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '连接地址',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间（发布时间）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='公告记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_notice`
--

LOCK TABLES `blog_notice` WRITE;
/*!40000 ALTER TABLE `blog_notice` DISABLE KEYS */;
INSERT INTO `blog_notice` VALUES (2,'我的博客 “黑牛儿”终于上线了','www.heiniuer.cn',1515073167),(3,'博客添加了百度统计代码','',1515158257);
/*!40000 ALTER TABLE `blog_notice` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-13 10:12:50
