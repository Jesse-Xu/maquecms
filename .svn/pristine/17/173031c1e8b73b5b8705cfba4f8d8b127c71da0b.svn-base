# Host: localhost  (Version: 5.5.53)
# Date: 2018-08-23 01:15:20
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "cms_admin_action"
#

DROP TABLE IF EXISTS `cms_admin_action`;
CREATE TABLE `cms_admin_action` (
  `actionid` int(11) NOT NULL AUTO_INCREMENT,
  `px` tinyint(3) unsigned DEFAULT '0' COMMENT '排序，数越大越靠前',
  `pid` int(5) unsigned DEFAULT '0',
  `name` varchar(30) DEFAULT NULL,
  `controller` varchar(50) DEFAULT NULL COMMENT '控制器',
  `action` varchar(50) DEFAULT NULL COMMENT '节点',
  `value` varchar(50) DEFAULT NULL,
  `type` varchar(15) DEFAULT '0' COMMENT '类型:控制器，操作',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态，启用禁用',
  `addtime` varchar(50) DEFAULT NULL,
  `uptime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`actionid`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COMMENT='操作列表';

#
# Data for table "cms_admin_action"
#

/*!40000 ALTER TABLE `cms_admin_action` DISABLE KEYS */;
INSERT INTO `cms_admin_action` VALUES (1,0,0,'管理员管理','Auto',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(2,0,1,'管理员列表','Auto','adminlist','Auth/adminlist','操作',1,'2018-08-23 01:07:46',NULL),(3,0,1,'编辑管理员信息','Auto','admininfo','Auth/admininfo','操作',1,'2018-08-23 01:07:46',NULL),(4,0,1,'修改管理员状态','Auto','adminup','Auth/adminup','操作',1,'2018-08-23 01:07:46',NULL),(5,0,1,'删除管理员','Auto','admindel','Auth/admindel','操作',1,'2018-08-23 01:07:46',NULL),(6,0,1,'角色列表','Auto','rolelist','Auth/rolelist','操作',1,'2018-08-23 01:07:46',NULL),(7,0,1,'编辑角色信息','Auto','roleinfo','Auth/roleinfo','操作',1,'2018-08-23 01:07:46',NULL),(8,0,1,'删除管理员','Auto','roledel','Auth/roledel','操作',1,'2018-08-23 01:07:46',NULL),(9,0,1,'修改角色状态','Auto','roleup','Auth/roleup','操作',1,'2018-08-23 01:07:46',NULL),(10,0,1,'权限列表','Auto','actionlist','Auth/actionlist','操作',1,'2018-08-23 01:07:46',NULL),(11,0,1,'编辑权限信息','Auto','actioninfo','Auth/actioninfo','操作',1,'2018-08-23 01:07:46',NULL),(12,0,1,'删除权限信息','Auto','actiondel','Auth/actiondel','操作',1,'2018-08-23 01:07:46',NULL),(13,0,1,'修改权限状态','Auto','actionup','Auth/actionup','操作',1,'2018-08-23 01:07:46',NULL),(14,0,1,'管理员日志','Auto','loglist','Auth/loglist','操作',1,'2018-08-23 01:07:46',NULL),(15,0,1,'编辑角色信息','Auto','rolemenu','Auth/rolemenu','操作',1,'2018-08-23 01:07:46',NULL),(16,0,1,'角色菜单生成','Auto','RoleMenuBuild','Auth/RoleMenuBuild','操作',1,'2018-08-23 01:07:46',NULL),(17,0,1,'刷新权限','Auto','index','Auth/index','操作',1,'2018-08-23 01:07:46',NULL),(18,0,1,'(.*?)','Auto','','Auth/','操作',1,'2018-08-23 01:07:46','2018-08-23 01:07:46'),(19,0,1,'修改密码','Auto','modifypd','Auth/modifypd','操作',1,'2018-08-23 01:07:46',NULL),(20,0,0,'轮播管理','Banner',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(21,0,20,'数据列表','Banner','lists','Banner/lists','操作',1,'2018-08-23 01:07:46',NULL),(22,0,20,'添加数据','Banner','info','Banner/info','操作',1,'2018-08-23 01:07:46',NULL),(23,0,20,'删除数据','Banner','del','Banner/del','操作',1,'2018-08-23 01:07:46',NULL),(24,0,20,'修改状态','Banner','up','Banner/up','操作',1,'2018-08-23 01:07:46',NULL),(25,0,0,'后台主页','Index',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(26,0,25,'清空缓存','Index','delcache','Index/delcache','操作',1,'2018-08-23 01:07:46',NULL),(27,0,25,'服务器信息','Index','serverinfo','Index/serverinfo','操作',1,'2018-08-23 01:07:46',NULL),(28,0,0,'友情链接管理','Link',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(29,0,28,'数据列表','Link','lists','Link/lists','操作',1,'2018-08-23 01:07:46',NULL),(30,0,28,'添加数据','Link','info','Link/info','操作',1,'2018-08-23 01:07:46',NULL),(31,0,28,'删除数据','Link','del','Link/del','操作',1,'2018-08-23 01:07:46',NULL),(32,0,28,'修改状态','Link','up','Link/up','操作',1,'2018-08-23 01:07:46',NULL),(33,0,0,'留言管理','Msg',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(34,0,33,'数据列表','Msg','lists','Msg/lists','操作',1,'2018-08-23 01:07:46',NULL),(35,0,33,'添加数据','Msg','info','Msg/info','操作',1,'2018-08-23 01:07:46',NULL),(36,0,33,'创建表单','Msg','forminfo','Msg/forminfo','操作',1,'2018-08-23 01:07:46',NULL),(37,0,33,'删除数据','Msg','del','Msg/del','操作',1,'2018-08-23 01:07:46',NULL),(38,0,33,'修改状态','Msg','up','Msg/up','操作',1,'2018-08-23 01:07:46',NULL),(39,0,0,'新闻管理','News',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(40,0,39,'分类列表','News','catelist','News/catelist','操作',1,'2018-08-23 01:07:46',NULL),(41,0,39,'分类信息','News','cateinfo','News/cateinfo','操作',1,'2018-08-23 01:07:46',NULL),(42,0,39,'修改分类','News','cateup','News/cateup','操作',1,'2018-08-23 01:07:46',NULL),(43,0,39,'删除分类','News','catedel','News/catedel','操作',1,'2018-08-23 01:07:46',NULL),(44,0,39,'页面编辑','News','pageinfo','News/pageinfo','操作',1,'2018-08-23 01:07:46',NULL),(45,0,39,'模型管理','News','modellist','News/modellist','操作',1,'2018-08-23 01:07:46',NULL),(46,0,39,'模型信息','News','modelinfo','News/modelinfo','操作',1,'2018-08-23 01:07:46',NULL),(47,0,39,'删除模型','News','modeldel','News/modeldel','操作',1,'2018-08-23 01:07:46',NULL),(48,0,39,'新闻列表','News','newslist','News/newslist','操作',1,'2018-08-23 01:07:46',NULL),(49,0,39,'分类分类','News','newsinfo','News/newsinfo','操作',1,'2018-08-23 01:07:46',NULL),(50,0,39,'检查是否重复','News','pageset','News/pageset','操作',1,'2018-08-23 01:07:46',NULL),(51,0,39,'删除新闻','News','newsdel','News/newsdel','操作',1,'2018-08-23 01:07:46',NULL),(52,0,39,'修改新闻','News','newsup','News/newsup','操作',1,'2018-08-23 01:07:46',NULL),(53,0,39,'作者管理','News','authorlist','News/authorlist','操作',1,'2018-08-23 01:07:46',NULL),(54,0,39,'作者信息','News','authorinfo','News/authorinfo','操作',1,'2018-08-23 01:07:46',NULL),(55,0,39,'删除作者','News','authordel','News/authordel','操作',1,'2018-08-23 01:07:46',NULL),(56,0,39,'修改作者','News','authorup','News/authorup','操作',1,'2018-08-23 01:07:46',NULL),(57,0,39,'评论列表','News','comment','News/comment','操作',1,'2018-08-23 01:07:46',NULL),(58,0,39,'删除评论','News','commentdel','News/commentdel','操作',1,'2018-08-23 01:07:46',NULL),(59,0,39,'修改评论状态','News','commentup','News/commentup','操作',1,'2018-08-23 01:07:46',NULL),(60,0,0,'站点设置','Site',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(61,0,60,'基本设置','Site','index','Site/index','操作',1,'2018-08-23 01:07:46',NULL),(62,0,60,'水印设置','Site','water','Site/water','操作',1,'2018-08-23 01:07:46',NULL),(63,0,60,'上传设置','Site','upload','Site/upload','操作',1,'2018-08-23 01:07:46',NULL),(64,0,60,'模板选择','Site','template','Site/template','操作',1,'2018-08-23 01:07:46',NULL),(65,0,0,'用户管理','User',NULL,NULL,'控制器',1,'2018-08-23 01:07:46',NULL),(66,0,65,'数据列表','User','lists','User/lists','操作',1,'2018-08-23 01:07:46',NULL),(67,0,65,'添加数据','User','info','User/info','操作',1,'2018-08-23 01:07:46',NULL),(68,0,65,'删除数据','User','del','User/del','操作',1,'2018-08-23 01:07:46',NULL),(69,0,65,'修改状态','User','up','User/up','操作',1,'2018-08-23 01:07:46',NULL),(70,0,65,'导出用户','User','ExportExcel','User/ExportExcel','操作',1,'2018-08-23 01:07:46',NULL),(71,0,65,'excel导入','User','ExportPort','User/ExportPort','操作',1,'2018-08-23 01:07:46',NULL);
/*!40000 ALTER TABLE `cms_admin_action` ENABLE KEYS */;

#
# Structure for table "cms_admin_group"
#

DROP TABLE IF EXISTS `cms_admin_group`;
CREATE TABLE `cms_admin_group` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(50) DEFAULT NULL COMMENT '分组名称',
  `roleid` int(11) unsigned DEFAULT NULL COMMENT '角色id',
  `addtime` varchar(50) DEFAULT NULL COMMENT '添加时间',
  `updatetime` varchar(50) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员分组';

#
# Data for table "cms_admin_group"
#

/*!40000 ALTER TABLE `cms_admin_group` DISABLE KEYS */;
INSERT INTO `cms_admin_group` VALUES (1,'超级管理员',0,NULL,NULL);
/*!40000 ALTER TABLE `cms_admin_group` ENABLE KEYS */;

#
# Structure for table "cms_admin_list"
#

DROP TABLE IF EXISTS `cms_admin_list`;
CREATE TABLE `cms_admin_list` (
  `adminid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `avatar` varchar(150) DEFAULT NULL COMMENT '头像',
  `roleid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '管理员分组',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `uptime` varchar(50) DEFAULT NULL COMMENT '更新时间',
  `logintime` varchar(50) DEFAULT NULL COMMENT '上次登录时间',
  PRIMARY KEY (`adminid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员';

#
# Data for table "cms_admin_list"
#

#
# Structure for table "cms_admin_log"
#

DROP TABLE IF EXISTS `cms_admin_log`;
CREATE TABLE `cms_admin_log` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `adminid` int(11) unsigned DEFAULT NULL COMMENT '管理员id',
  `name` varchar(50) DEFAULT NULL COMMENT '管理员名字',
  `content` varchar(250) DEFAULT NULL COMMENT '操作内容',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`logid`)
) ENGINE=MyISAM AUTO_INCREMENT=1078 DEFAULT CHARSET=utf8 COMMENT='管理员操作日志';

#
# Data for table "cms_admin_log"
#

/*!40000 ALTER TABLE `cms_admin_log` DISABLE KEYS */;
INSERT INTO `cms_admin_log` VALUES (1,NULL,NULL,'访问_ , 控制器：auth/index','2018-08-23 01:07:46');
/*!40000 ALTER TABLE `cms_admin_log` ENABLE KEYS */;

#
# Structure for table "cms_admin_role"
#

DROP TABLE IF EXISTS `cms_admin_role`;
CREATE TABLE `cms_admin_role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `px` int(5) unsigned DEFAULT NULL COMMENT '排序',
  `auth` text COMMENT '权限',
  `menu` text COMMENT '菜单',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态',
  `addtime` varchar(50) DEFAULT NULL,
  `uptime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色列表';

#
# Data for table "cms_admin_role"
#

/*!40000 ALTER TABLE `cms_admin_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_admin_role` ENABLE KEYS */;

#
# Structure for table "cms_banner_list"
#

DROP TABLE IF EXISTS `cms_banner_list`;
CREATE TABLE `cms_banner_list` (
  `bannerid` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(150) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL COMMENT '链接',
  `px` int(2) unsigned DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY (`bannerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='banner列表';

#
# Data for table "cms_banner_list"
#

/*!40000 ALTER TABLE `cms_banner_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_banner_list` ENABLE KEYS */;

#
# Structure for table "cms_comment_list"
#

DROP TABLE IF EXISTS `cms_comment_list`;
CREATE TABLE `cms_comment_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsid` int(5) unsigned DEFAULT '0' COMMENT '新闻id',
  `floor` int(11) unsigned DEFAULT '0' COMMENT '回复楼层id',
  `pid` int(10) unsigned DEFAULT NULL COMMENT '回复的id',
  `touser` varchar(50) DEFAULT NULL COMMENT '回复给哪个用户',
  `userid` int(8) unsigned DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `avatar` varchar(150) DEFAULT NULL COMMENT '头像',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '评论时间',
  `uptime` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评论列表';

#
# Data for table "cms_comment_list"
#

/*!40000 ALTER TABLE `cms_comment_list` DISABLE KEYS */;
INSERT INTO `cms_comment_list` VALUES (1,5,0,0,NULL,0,'昵称网游1534947693','','666',1,'2018-08-22 22:21:33','2018-08-22 22:22:32');
/*!40000 ALTER TABLE `cms_comment_list` ENABLE KEYS */;

#
# Structure for table "cms_link_list"
#

DROP TABLE IF EXISTS `cms_link_list`;
CREATE TABLE `cms_link_list` (
  `linkid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL COMMENT '链接',
  `px` int(2) unsigned DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `uptime` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`linkid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='banner列表';

#
# Data for table "cms_link_list"
#

/*!40000 ALTER TABLE `cms_link_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_link_list` ENABLE KEYS */;

#
# Structure for table "cms_msg_list"
#

DROP TABLE IF EXISTS `cms_msg_list`;
CREATE TABLE `cms_msg_list` (
  `msgid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL COMMENT '性别',
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `add` varchar(150) DEFAULT NULL COMMENT '地址',
  `msg` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `status` tinyint(1) unsigned DEFAULT '0' COMMENT '状态',
  `addtime` timestamp NULL DEFAULT NULL,
  `uptime` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`msgid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='留言';

#
# Data for table "cms_msg_list"
#

/*!40000 ALTER TABLE `cms_msg_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_msg_list` ENABLE KEYS */;

#
# Structure for table "cms_news_author"
#

DROP TABLE IF EXISTS `cms_news_author`;
CREATE TABLE `cms_news_author` (
  `authorid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `px` int(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '作者名称',
  `pic` varchar(150) NOT NULL DEFAULT '' COMMENT '头像',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `uptime` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`authorid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='模型列表';

#
# Data for table "cms_news_author"
#

/*!40000 ALTER TABLE `cms_news_author` DISABLE KEYS */;
INSERT INTO `cms_news_author` VALUES (1,0,'与光同尘','',1,'2018-08-20 17:07:10',NULL);
/*!40000 ALTER TABLE `cms_news_author` ENABLE KEYS */;

#
# Structure for table "cms_news_cate"
#

DROP TABLE IF EXISTS `cms_news_cate`;
CREATE TABLE `cms_news_cate` (
  `cateid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(5) unsigned DEFAULT '0' COMMENT '父级id',
  `catepx` int(11) unsigned DEFAULT '0' COMMENT '排序',
  `catename` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名称',
  `catethumb` varchar(150) DEFAULT NULL COMMENT '缩略图',
  `other` varchar(30) DEFAULT NULL COMMENT '其他',
  `url` varchar(150) DEFAULT NULL COMMENT '跳转连接',
  `modelid` int(5) unsigned DEFAULT NULL COMMENT '模型id',
  `template` varchar(50) DEFAULT NULL COMMENT '模板名称',
  `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `isnav` tinyint(1) unsigned DEFAULT '0' COMMENT '导航栏是否可见',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态，0 ，1',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `uptime` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`cateid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='分类';

#
# Data for table "cms_news_cate"
#

/*!40000 ALTER TABLE `cms_news_cate` DISABLE KEYS */;
INSERT INTO `cms_news_cate` VALUES (1,0,0,'新闻管理','','','/cate-1.html',7,'list_news','','',1,1,'2018-08-20 10:26:15','2018-08-20 16:58:01'),(2,0,0,'关于我们','','','/content-4-cateid-2.html',8,'page_about','','',1,1,'2018-08-20 17:44:22',NULL);
/*!40000 ALTER TABLE `cms_news_cate` ENABLE KEYS */;

#
# Structure for table "cms_news_list"
#

DROP TABLE IF EXISTS `cms_news_list`;
CREATE TABLE `cms_news_list` (
  `newsid` int(11) NOT NULL AUTO_INCREMENT,
  `cateid` int(3) unsigned DEFAULT NULL COMMENT '分类id',
  `catename` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `title` varchar(150) DEFAULT NULL COMMENT '标题',
  `keyword` varchar(150) DEFAULT NULL COMMENT '关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `thumb` varchar(150) DEFAULT NULL COMMENT '缩略图',
  `abstract` varchar(255) DEFAULT NULL COMMENT '文章摘要',
  `content` text COMMENT '内容',
  `photos` text COMMENT '图集',
  `files` text COMMENT '文件地址',
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击量',
  `hot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐，1推荐，0不推荐',
  `top` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否制定，1置顶，0不置顶',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1正常，0不正藏,-1 草稿',
  `authorid` int(5) unsigned DEFAULT NULL COMMENT '作者id',
  `authorname` varchar(50) DEFAULT NULL COMMENT '作者名称',
  `authorpic` varchar(150) DEFAULT NULL COMMENT '作者头像',
  `template` varchar(50) DEFAULT NULL COMMENT '模板名称',
  `url` varchar(150) DEFAULT '' COMMENT '跳转链接',
  `iscomment` tinyint(1) DEFAULT '1' COMMENT '是否允许评论，1允许，0不允许',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `uptime` varchar(30) DEFAULT NULL COMMENT '更新时间',
  `pushtime` timestamp NULL DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`newsid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='新闻列表';

#
# Data for table "cms_news_list"
#

/*!40000 ALTER TABLE `cms_news_list` DISABLE KEYS */;
INSERT INTO `cms_news_list` VALUES (1,1,NULL,'测试下','','','','测试文章摘要','<p>sss</p>','null','null',12,1,1,1,0,NULL,NULL,'','/content-1.html',1,'2018-08-20 11:42:51',NULL,'2018-08-20 11:42:51'),(2,1,NULL,'测试新闻','','','','','<p>测试测试撒打发第三方</p>','null','null',1,1,1,1,0,NULL,NULL,NULL,'/content-2.html',1,'2018-08-20 17:43:10',NULL,'2018-08-20 17:43:10'),(3,1,NULL,'测试','','','','','<p>阿斯顿发顺丰阿斯顿发发送到阿斯顿发啊</p>','null','null',0,0,0,1,0,NULL,NULL,NULL,'/content-3.html',1,'2018-08-20 17:43:54',NULL,'2018-08-20 17:43:54'),(4,2,NULL,'关于麻雀cms','','','','','<p style=\"margin-top: 0px; margin-bottom: 10px; color: rgb(85, 85, 85); font-family: 微软雅黑, Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">麻雀cms</p><p style=\"margin-top: 0px; margin-bottom: 10px; color: rgb(85, 85, 85); font-family: 微软雅黑, Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 10px; color: rgb(85, 85, 85); font-family: 微软雅黑, Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">与光同尘，一个90后php程序员！15年入行。一直潜心研究web技术，一边工作一边积累经验，一直想做点什么出来，于是就做了这款cms出来。<br style=\"margin: 0px; padding: 0px;\"/><br style=\"margin: 0px; padding: 0px;\"/>奋斗了将近三年时间，见证了行业的发展。期间有很多的不容易，但是都没有放弃过。入了这一行，就深深的喜欢上它。我喜欢一句话“冥冥中该来则来，无处可逃”。<br style=\"margin: 0px; padding: 0px;\"/><br style=\"margin: 0px; padding: 0px;\"/>近几年我也看了其他的一些cmc源码，向他们也学到了很多。<br style=\"margin: 0px; padding: 0px;\"/><br style=\"margin: 0px; padding: 0px;\"/>自从入了这一行，也交到了不少朋友，QQ群也不断的壮大起来，群号：<span style=\"color: rgb(64, 72, 91); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" apple=\"\" color=\"\" ui=\"\" liberation=\"\" pingfang=\"\" microsoft=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" zen=\"\" st=\"\" hei=\"\" white-space:=\"\">159360042&nbsp;</span>，群里的小伙伴们也很积极的帮助新朋友解决问题，如果你想加入我们，这个大家庭的门，永远给你敞开！</p><p style=\"margin-top: 0px; margin-bottom: 10px; color: rgb(85, 85, 85); font-family: 微软雅黑, Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\"><br/></p>','null','null',39,0,0,1,0,NULL,NULL,'page_about','/content-4.html',1,'2018-08-20 17:51:47','2018-08-22 13:33:13','2018-08-20 17:51:47'),(5,1,NULL,'测试测试','','','','','<p>撒打发斯蒂芬</p>','null','null',117,0,0,1,0,NULL,NULL,'content_1','/content-5.html',1,'2018-08-20 18:28:07','2018-08-21 23:47:47','2018-08-20 18:28:07');
/*!40000 ALTER TABLE `cms_news_list` ENABLE KEYS */;

#
# Structure for table "cms_news_model"
#

DROP TABLE IF EXISTS `cms_news_model`;
CREATE TABLE `cms_news_model` (
  `modelid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `px` int(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '模型名称',
  `type` varchar(30) NOT NULL DEFAULT '' COMMENT '类别',
  `template` varchar(60) NOT NULL DEFAULT '' COMMENT '模板',
  `page` varchar(25) NOT NULL DEFAULT '' COMMENT '单页模板',
  `category` varchar(25) NOT NULL DEFAULT '' COMMENT '栏目',
  `list` varchar(25) NOT NULL DEFAULT '' COMMENT '列表',
  `content` varchar(25) NOT NULL DEFAULT '' COMMENT '内容页',
  `authorid` int(8) unsigned DEFAULT NULL COMMENT '作者id',
  `iscomment` tinyint(1) unsigned DEFAULT '1' COMMENT '是否允许评论',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '添加时间',
  `uptime` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`modelid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='模型列表';

#
# Data for table "cms_news_model"
#

/*!40000 ALTER TABLE `cms_news_model` DISABLE KEYS */;
INSERT INTO `cms_news_model` VALUES (7,0,'内容模型','列表类型','','','','list_news','content_1',0,1,1,'2018-08-20 17:42:20',NULL),(8,0,'单页模型','单页类型','','page_about','','','',0,1,1,'2018-08-20 17:42:35',NULL),(10,0,'测试模型','列表类型','','','','list_news','content_1',1,1,1,'2018-08-23 00:44:59',NULL);
/*!40000 ALTER TABLE `cms_news_model` ENABLE KEYS */;

#
# Structure for table "cms_order_list"
#

DROP TABLE IF EXISTS `cms_order_list`;
CREATE TABLE `cms_order_list` (
  `orderid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) DEFAULT NULL,
  `userid` int(11) unsigned DEFAULT NULL COMMENT '用户id',
  `user_nickname` varchar(50) DEFAULT NULL COMMENT '用户昵称',
  `user_headimg` varchar(200) DEFAULT NULL COMMENT '用户头像',
  `teaid` int(5) DEFAULT NULL COMMENT '老师id',
  `tea_name` varchar(50) DEFAULT NULL COMMENT '老师姓名',
  `tea_headimg` varchar(120) DEFAULT NULL COMMENT '老师头像',
  `courseid` int(11) unsigned DEFAULT NULL COMMENT '课程id',
  `cou_title` varchar(120) DEFAULT NULL COMMENT '课程名称',
  `cou_pic` varchar(120) DEFAULT NULL COMMENT '课程图片',
  `ticketid` int(5) unsigned DEFAULT NULL COMMENT '券id',
  `tick_key` varchar(20) DEFAULT NULL COMMENT '券秘钥',
  `tick_money` decimal(3,0) DEFAULT '0' COMMENT '优惠券金额',
  `price` decimal(5,2) DEFAULT '0.00' COMMENT '单价',
  `money` decimal(10,2) unsigned DEFAULT NULL COMMENT '购买金额',
  `isdel` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户是否删除订单，0 未删除，1已删除',
  `ordernum` varchar(30) NOT NULL DEFAULT '' COMMENT '支付号',
  `transaction_id` varchar(30) NOT NULL DEFAULT '' COMMENT '流水号',
  `status` int(1) DEFAULT '0' COMMENT '0,未支付，1已支付，-1退款',
  `addtime` timestamp NULL DEFAULT NULL COMMENT '记录时间',
  `paytime` timestamp NULL DEFAULT NULL COMMENT '支付时间',
  `backtime` timestamp NULL DEFAULT NULL COMMENT '退款时间',
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

#
# Data for table "cms_order_list"
#


#
# Structure for table "cms_user_list"
#

DROP TABLE IF EXISTS `cms_user_list`;
CREATE TABLE `cms_user_list` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL COMMENT '账号',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(50) DEFAULT NULL COMMENT '用户昵称',
  `headavatar` varchar(150) DEFAULT NULL COMMENT '头像',
  `openid` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `tel` char(11) DEFAULT NULL COMMENT '手机号',
  `ip` varchar(20) DEFAULT NULL COMMENT 'ip',
  `status` tinyint(1) unsigned DEFAULT '1' COMMENT '状态',
  `addtime` varchar(15) DEFAULT NULL COMMENT '添加时间',
  `uptime` varchar(50) DEFAULT NULL COMMENT '修改时间',
  `logintime` varchar(30) DEFAULT NULL COMMENT '上次登录时间',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户列表';

#
# Data for table "cms_user_list"
#

/*!40000 ALTER TABLE `cms_user_list` DISABLE KEYS */;
INSERT INTO `cms_user_list` VALUES (1,'张三','1','张三','asdf','111','321@qq.com','150906909',NULL,1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cms_user_list` ENABLE KEYS */;

#
# Structure for table "cms_wx_menu"
#

DROP TABLE IF EXISTS `cms_wx_menu`;
CREATE TABLE `cms_wx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(2) DEFAULT NULL COMMENT '主菜单',
  `name` varchar(25) DEFAULT NULL COMMENT '菜单名称',
  `type` varchar(20) DEFAULT NULL COMMENT '事件类型',
  `val` varchar(150) DEFAULT NULL COMMENT '事件值',
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `status` int(1) unsigned DEFAULT '1' COMMENT '状态1 是正常，0 是禁用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='微信菜单';

#
# Data for table "cms_wx_menu"
#

/*!40000 ALTER TABLE `cms_wx_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `cms_wx_menu` ENABLE KEYS */;
