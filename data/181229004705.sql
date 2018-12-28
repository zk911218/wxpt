/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: wxpt
Date: 2018/12/29 00:47:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `wx_pt_ad`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_ad`;
CREATE TABLE `wx_pt_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(255) DEFAULT '' COMMENT '账户姓名',
  `ad_id` varchar(255) NOT NULL,
  `ad_pwd` varchar(255) NOT NULL,
  `ad_logintime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp() COMMENT '最后登录时间',
  `ad_state` char(255) NOT NULL COMMENT '账号状态',
  `ad_insertId` int(11) DEFAULT NULL COMMENT '添加人',
  `ad_adminType` int(11) DEFAULT NULL COMMENT '管理员级别，0是超级管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
--  Table structure for `wx_pt_login`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_login`;
CREATE TABLE `wx_pt_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(2) DEFAULT NULL COMMENT '商户或管理员：sh，用户：yh',
  `logintime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip` varchar(20) DEFAULT '' COMMENT '用户登陆的ip地址',
  `state` varchar(20) DEFAULT '' COMMENT '登陆状态。',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='登陆记录';

-- ----------------------------
--  Table structure for `wx_pt_pt`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_pt`;
CREATE TABLE `wx_pt_pt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pt_id` varchar(255) DEFAULT NULL,
  `pt_sh_id` int(11) DEFAULT NULL COMMENT '发起拼团的商户id',
  `pt_mc` varchar(100) DEFAULT NULL COMMENT '拼团的名称',
  `pt_jg` int(11) DEFAULT 0 COMMENT '拼团价格（分）。',
  `pt_js` text DEFAULT NULL COMMENT '拼团介绍',
  `pt_tp` varchar(255) DEFAULT NULL COMMENT '宣传图片',
  `pt_yxqq` date DEFAULT NULL COMMENT '拼团—有效期起',
  `pt_yxqz` date DEFAULT NULL COMMENT '拼团—有效期止',
  `pt_ctxz` text DEFAULT NULL COMMENT '参团须知',
  `pt_lx` char(1) DEFAULT NULL COMMENT '拼团类型。固定团：“G”，阶梯团：“J”',
  `pt_max_num` int(10) unsigned DEFAULT NULL COMMENT '最大开团人数',
  `pt_insert_time` timestamp NULL DEFAULT current_timestamp(),
  `pt_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pt_state` char(1) DEFAULT 'Y' COMMENT '有效状态。”Y"/"N"',
  PRIMARY KEY (`id`),
  KEY `pt_sh_id` (`pt_sh_id`) COMMENT '发起拼团的商户id',
  KEY `pt_state` (`pt_state`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='拼团信息表。';

-- ----------------------------
--  Table structure for `wx_pt_pt_ptjt`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_pt_ptjt`;
CREATE TABLE `wx_pt_pt_ptjt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jt_id` varchar(255) DEFAULT NULL,
  `jt_pt_id` int(11) DEFAULT NULL COMMENT '所属的拼团id',
  `jt_rs` int(11) DEFAULT NULL COMMENT '成团人数',
  `jt_jg` double DEFAULT NULL COMMENT '价格',
  `jt_insert_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '添加时间',
  `jt_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `pt_id` (`jt_pt_id`) COMMENT 'pt_id'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='拼团阶梯。每一次拼团对应的拼团阶梯。固定团有1条记录，阶梯团有多条记录。';

-- ----------------------------
--  Table structure for `wx_pt_pt_ptxm`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_pt_ptxm`;
CREATE TABLE `wx_pt_pt_ptxm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `xm_pt_id` int(11) DEFAULT NULL COMMENT '拼团id',
  `xm_name` varchar(255) DEFAULT NULL COMMENT '拼团项目名字',
  `xm_jg` double DEFAULT NULL COMMENT '项目价格（正常售价）',
  `xm_tp` varchar(255) DEFAULT NULL COMMENT '项目图片的链接',
  `xm_cs` int(10) unsigned DEFAULT 1 COMMENT '项目次数',
  `xm_state` varchar(255) DEFAULT NULL COMMENT '项目状态."Y"/"N"',
  `xm_insert_time` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  `xm_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '最后修改时间',
  PRIMARY KEY (`id`),
  KEY `pt_id` (`xm_pt_id`) COMMENT 'xm_pt_id'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='拼团项目。每一次拼团对应的拼团项目';

-- ----------------------------
--  Table structure for `wx_pt_pt_t`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_pt_t`;
CREATE TABLE `wx_pt_pt_t` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `t_id` varchar(128) DEFAULT NULL COMMENT '此团的团id，拼团id+商户id+团长id+时间戳，升序排序，MD5加密。',
  `t_pt_id` int(11) DEFAULT NULL COMMENT '拼团id',
  `t_jt_id` int(11) DEFAULT NULL COMMENT '阶梯团的阶梯id',
  `t_tz_id` int(11) DEFAULT NULL COMMENT '团长id',
  `t_insert_time` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp() COMMENT '添加时间',
  `t_update_time` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp() COMMENT '更新时间',
  `t_state` char(1) DEFAULT NULL COMMENT '状态。"Y"/"N"',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='组团信息';

-- ----------------------------
--  Table structure for `wx_pt_sh`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_sh`;
CREATE TABLE `wx_pt_sh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sh_name` varchar(256) DEFAULT '' COMMENT '商户名称',
  `sh_id` varchar(256) DEFAULT NULL COMMENT '用户登陆账号',
  `sh_pwd` varchar(256) DEFAULT NULL COMMENT '用户密码',
  `sh_yxq` date DEFAULT NULL COMMENT '有效期止',
  `sh_max_ci` int(10) unsigned DEFAULT NULL COMMENT '最大有效次数',
  `sh_dz` varchar(250) DEFAULT '' COMMENT '地址',
  `sh_dh` varchar(12) DEFAULT NULL COMMENT '电话',
  `sh_insert_time` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  `sh_insert_id` int(11) DEFAULT NULL COMMENT '添加人id',
  `sh_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更改时间',
  `sh_update_id` int(11) DEFAULT NULL,
  `sh_state` char(1) DEFAULT '' COMMENT '商户账号状态。"Y"/"N"',
  `sh_id_hash` varchar(255) DEFAULT NULL COMMENT '用户档案id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='商户信息表';

-- ----------------------------
--  Table structure for `wx_pt_yh`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_yh`;
CREATE TABLE `wx_pt_yh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `yh_xm` varchar(255) DEFAULT NULL,
  `yh_dh` varchar(255) DEFAULT NULL,
  `yh_sh_id` int(11) DEFAULT NULL COMMENT '该用户对应的商户id',
  `yh_insert_time` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  `yh_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '最后一次修改时间',
  `yh_state` char(1) DEFAULT NULL COMMENT '用户状态。"Y"/"N"',
  PRIMARY KEY (`id`),
  KEY `yh_sh_id` (`yh_sh_id`) COMMENT '拼团用户对应的商户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='参与平台拼团的用户';

-- ----------------------------
--  Table structure for `wx_pt_zf`
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_zf`;
CREATE TABLE `wx_pt_zf` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单支付id。',
  `dd_id` varchar(256) DEFAULT NULL COMMENT '订单号。根据用户id+拼团id+商户id+当前时间，升序排列，MD5加密。\r\n商户支付的订单号由商户自定义生成，仅支持使用字母、数字、中划线-、下划线_、竖线|、星号*这些英文半角字符的组合，请勿使用汉字或全角等特殊字符。微信支付要求商户订单号保持唯一性（建议根据当前系统时间加随机序列来生成订单号）。重新发起一笔支付要使用原订单号，避免重复支付；已支付过或已调用关单、撤销（请见后文的API列表）的订单号不能重新发起支付。 ',
  `total_fee` int(11) DEFAULT 0 COMMENT '订单总金额，单位为分。注意：单位为分！！！',
  `dd_t_id` varchar(128) DEFAULT NULL COMMENT '团id',
  `product_id` varchar(32) DEFAULT '' COMMENT '拼团ID。trade_type=NATIVE时（即Native支付），此参数必传。此参数为二维码中包含的商品ID，商户自行定义。',
  `dd_open_id` int(128) DEFAULT NULL COMMENT '微信返回的用户openid . trade_type=JSAPI时（即JSAPI支付），此参数必传，此参数为微信用户在商户对应appid下的唯一标识。',
  `dd_sh_id` int(32) DEFAULT NULL COMMENT '商户的id，对应提交支付请求时的device_info',
  `nonce_str` varchar(32) DEFAULT NULL COMMENT '随机字符串',
  `dd_pt_ms` varchar(128) DEFAULT '' COMMENT '商品简单描述 . ',
  `dd_pt_xxms` varchar(6000) DEFAULT '' COMMENT '商品详细描述',
  `attach` varchar(127) DEFAULT '' COMMENT '附加数据，在查询API和支付通知中原样返回，可作为自定义参数使用。',
  `fee_type` varchar(16) DEFAULT 'CNY' COMMENT '标价币种，符合ISO 4217标准的三位字母代码，默认人民币：CNY',
  `sign` varchar(32) DEFAULT NULL COMMENT '签名。通过签名算法计算得出的签名值',
  `sign_type` varchar(32) DEFAULT NULL COMMENT '签名类型，默认为MD5，支持HMAC-SHA256和MD5',
  `spbill_create_ip` varchar(16) DEFAULT NULL COMMENT '终端IP。APP和网页支付提交用户端ip。Native支付填调用微信支付API的机器IP。',
  `time_start` char(14) DEFAULT NULL COMMENT '交易起始时间。订单生成时间，格式为yyyyMMddHHmmss，如2009年12月25日9点10分10秒表示为20091225091010。',
  `time_expire` char(14) DEFAULT NULL COMMENT '交易结束时间。订单失效时间，格式为yyyyMMddHHmmss，如2009年12月27日9点10分10秒表示为20091227091010。订单失效时间是针对订单号而言的，由于在请求支付的时候有一个必传参数prepay_id只有两小时的有效期，所以在重入时间超过2小时的时候需要重新请求下单接口获取新的prepay_id。\r\n建议：最短失效时间间隔大于1分钟',
  `goods_tag` varchar(32) DEFAULT NULL COMMENT '订单优惠标记.订单优惠标记，使用代金券或立减优惠功能时需要的参数',
  `notify_url` varchar(256) DEFAULT NULL COMMENT '通知地址 . 异步接收微信支付结果通知的回调地址，通知url必须为外网可访问的url，不能携带参数。如http://www.weixin.qq.com/wxpay/pay.php',
  `trade_type` varchar(16) DEFAULT 'JSAPI' COMMENT '交易类型 。\r\nJSAPI： JSAPI支付\r\n  NATIVE： Native支付  \r\nAPP： APP支付',
  `limit_pay` varchar(32) DEFAULT NULL COMMENT '指定支付方式 . 上传此参数no_credit--可限制用户不能使用信用卡支付',
  `scene_info_id` varchar(32) DEFAULT NULL COMMENT '门店id',
  `scene_info_name` varchar(32) DEFAULT NULL COMMENT '门店名称 ',
  `scene_info_area_code` char(6) DEFAULT NULL COMMENT '门店行政区划码 ',
  `scene_info_address` varchar(128) DEFAULT NULL COMMENT '门店详细地址 ',
  `dd_insert_time` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  `dd_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '修改时间',
  `dd_state` char(1) DEFAULT 'Z' COMMENT '订单状态。成功："Y"/ 失败："N"/ 取消："Q"/退款："T"/支付中：“Z”',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='拼团用户订单信息';

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `wx_pt_ad` VALUES ('1','管理员','admin','$2y$10$ej4Ujszup90Q3ZRT3bN1CO2wDLgMUR1.dYoNiCDem5gMcjPpf0wQO','2018-12-23 22:32:12','Y','1','0');
INSERT INTO `wx_pt_login` VALUES ('1','1','sh','2018-12-22 12:18:26','::1','success'), ('2','1','sh','2018-12-22 12:18:36','::1','password_error'), ('3','1','sh','2018-12-22 12:18:48','::1','password_error'), ('4','1','sh','2018-12-22 14:38:38','::1','success'), ('5','1','sh','2018-12-22 14:38:47','::1','success'), ('6','1','sh','2018-12-22 14:39:24','::1','success'), ('7','1','sh','2018-12-22 14:39:57','::1','success'), ('8','1','sh','2018-12-22 14:47:31','::1','success'), ('9','1','sh','2018-12-23 22:13:18','::1','success'), ('10','1','sh','2018-12-23 22:17:12','::1','success'), ('11','1','sh','2018-12-23 22:17:14','::1','success'), ('12','1','sh','2018-12-23 22:17:18','::1','success'), ('13','1','sh','2018-12-23 22:17:30','::1','success'), ('14','1','sh','2018-12-23 22:17:37','::1','success'), ('15','1','sh','2018-12-23 22:17:50','::1','success'), ('16','1','ad','2018-12-23 22:32:35','::1','success'), ('17','1','ad','2018-12-23 22:32:38','::1','password_error'), ('18','1','ad','2018-12-23 22:33:24','::1','password_error'), ('19','1','ad','2018-12-23 22:33:26','::1','success'), ('20','1','ad','2018-12-24 22:48:11','::1','success'), ('21','1','ad','2018-12-24 22:53:39','::1','success'), ('22','12','sh','2018-12-25 00:21:21','::1','password_error'), ('23','12','sh','2018-12-25 00:21:27','::1','password_error'), ('24','15','sh','2018-12-25 00:21:39','::1','password_error'), ('25','15','sh','2018-12-25 00:22:57','::1','success'), ('26','1','ad','2018-12-25 22:55:22','::1','password_error'), ('27','1','ad','2018-12-25 22:55:26','::1','success');
INSERT INTO `wx_pt_pt` VALUES ('1','1','3','测试','19900','这个团很好啊','http://img.sccnn.com/bimg/342/4288.jpg','2018-10-27','2018-12-29','拼团须知啊   须知啊','G','50','2018-11-28 22:35:16','2018-11-28 23:30:41','Y');
INSERT INTO `wx_pt_pt_ptjt` VALUES ('1','11','1','10','100','2018-11-28 23:57:46','2018-11-28 23:57:46'), ('2','22','1','5','200','2018-11-28 23:57:47','2018-11-28 23:57:47'), ('3','33','1','3','300','2018-11-28 23:57:48','2018-11-28 23:57:48');
INSERT INTO `wx_pt_pt_ptxm` VALUES ('1','1','项目1','120','http://img.sccnn.com/bimg/341/09012.jpg','1','Y','2018-11-28 22:57:19','2018-11-28 22:57:19'), ('2','1','项目2','149','http://huaban.com/go/?pin_id=2152240858','1','Y','2018-11-28 23:00:27','2018-11-28 23:00:29'), ('3','1','项目3','65','http://img.hb.aicdn.com/b0a16292ea8dc0a6bc2dbf1c98d58f3e16ccb42b2378-p6yZ31_fw658','3','Y','2018-11-28 23:01:03','2018-11-28 23:01:03');
INSERT INTO `wx_pt_sh` VALUES ('3','华山整形整容医院','hsyy01','$2y$10$fHvDv5Xc0IqfYb0YysNDZOLpY3FoazPDaPSrz8LUmLSrfV.lmUJdC','2019-01-31','20','华山南天门','03111111111','2018-11-28 21:36:25','1','2018-12-25 01:55:39','1','Y','sh1'), ('2','华山整形医院','ptyy04','$2y$10$gxP8rs6zUTab/4XS.P/RO.zLsQ6Pp4w1kmvrVqzgW6QpFDb4Ercz6','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:35:13','1','2018-12-25 01:08:19',NULL,'Y','sh2'), ('4','张三','ptyy04','$2y$10$x363P2I7OaGWQlKIwkSwpe1xk4lJUYUBmn7BaCByPelCAA6WZvKG.','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:36:59','1','2018-12-24 00:16:46',NULL,'Y','sh3'), ('5','张三','ptyy04','$2y$10$FNmrk7SYavTAQv6/rRMPaeztu03bdvIQbvW0JW3r0PesCcAPW2MP.','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:38:27','1','2018-12-23 23:27:56',NULL,'Y','4'), ('6','张三','ptyy04','$2y$10$jv8fR/3tvtzEf9bomNbuBOQE27MMMHh/k2fHFFEPHGI95TGgYgPTK','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:49:05','1','2018-12-23 23:27:57',NULL,'Y','5'), ('7','张三','ptyy04','$2y$10$8OMrpJQLStwbPmn7Feoa.eK823Jy0Qmw/oy4nt2CWCGzqQmnepd.u','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:49:17','1','2018-12-23 23:27:59',NULL,'Y','6'), ('8','张三','ptyy04','$2y$10$XhgHhWThhWnqA9YC75PsC.YCLehzhhay9OoBkd1alR0.81v8vJ.QW','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:49:36','1','2018-12-23 23:28:00',NULL,'Y','7'), ('9','张三','ptyy04','$2y$10$eXSjun8scyULxDII02/kGOGo.PkU3ade6nq9Zd5PbuaqQZ3hvfg46','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:51:25','1','2018-12-23 23:28:00',NULL,'Y','8'), ('10','张三','ptyy10','$2y$10$oiIaHguTZI0XQKUzyP6ABOAxpU8xsUkjlvoCPCtBI11fwKNnbfHde','2019-02-06','100','黄河大道','03111554499','2018-11-28 21:59:59','1','2018-12-23 23:28:01',NULL,'Y','9'), ('11','ad','ad','$2y$10$ej4Ujszup90Q3ZRT3bN1CO2wDLgMUR1.dYoNiCDem5gMcjPpf0wQO','2018-12-29','0','22','13333333333','2018-12-22 11:32:00','1','2018-12-23 23:28:03',NULL,'Y','11'), ('12','test1','test1','$2y$10$fBRYu5cmvb7G/cPzhZNQMOybRXl5BvcZqyBzK/zy26ySU2qJQmjm2','2018-12-26','0','aaaaaaaaa','12345678901','2018-12-24 23:42:59','1','2018-12-24 23:42:59',NULL,'Y','{C694B625-2015-460A-AA90-F308130CE5AB}'), ('13','test2','test2','$2y$10$Vf9rcI3meHj1y0AXfnpV.esiFYr7DLRdx/wQEkj63TsusnBt3RuD2','2018-12-26','0','aaaaaaaaa','12345678901','2018-12-24 23:46:54','1','2018-12-24 23:46:54',NULL,'Y','{EDA61744-EBBE-49A6-8649-56C8218225FB}'), ('14','test3','test3','$2y$10$bt0S1af0yD3CcB6.CPDhFOn0f8Y/TxcA8I7nQAWfI17qjBEZzISui','2019-06-30','0','122222222222222222sssssssssssssssssssssssssssssssss','12345678901','2018-12-24 23:47:50','1','2018-12-25 01:43:55','1','Y','{BBAE1255-AF03-4E1E-A0CC-BC7789649D26}'), ('15','test4','test4','$2y$10$XaSa5y1th/6IfQo4xuSD0uyuqk02gKlChlRa./MfdU.Yc48AFBTgC','2019-05-31','1000','21455as4dasdadwdas艾俄德法俄法而丰富啊啊啊啊啊啊啊啊','13333333333','2018-12-25 00:20:31','1','2018-12-25 00:20:31',NULL,'Y','{575F8C9F-398B-4A45-A4A9-29B2D812DBC1}');
