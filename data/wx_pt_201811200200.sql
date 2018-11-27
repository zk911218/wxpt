/*
Navicat MySQL Data Transfer

Source Server         : MariaDB
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : wx_pt

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-28 02:00:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wx_pt_pt
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_pt`;
CREATE TABLE `wx_pt_pt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pt_sh_id` int(11) DEFAULT NULL COMMENT '发起拼团的商户id',
  `pt_mc` varchar(100) DEFAULT NULL COMMENT '拼团的名称',
  `pt_jg` double DEFAULT 0 COMMENT '拼团价格（元），精确到小数点后2位。',
  `pt_js` text DEFAULT NULL COMMENT '拼团介绍',
  `pt_tp` varchar(255) DEFAULT NULL COMMENT '宣传图片',
  `pt_yxqq` datetime DEFAULT NULL COMMENT '拼团—有效期起',
  `pt_yxqz` datetime DEFAULT NULL COMMENT '拼团—有效期止',
  `pt_ctxz` text DEFAULT NULL COMMENT '参团须知',
  `pt_lx` char(1) DEFAULT NULL COMMENT '拼团类型。固定团：“G”，阶梯团：“J”',
  `pt_max_num` int(10) unsigned DEFAULT NULL COMMENT '最大开团人数',
  `pt_insert_time` timestamp NULL DEFAULT current_timestamp(),
  `pt_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pt_state` char(1) DEFAULT NULL COMMENT '有效状态。”Y"/"N"',
  PRIMARY KEY (`id`),
  KEY `pt_sh_id` (`pt_sh_id`) COMMENT '发起拼团的商户id',
  KEY `pt_state` (`pt_state`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='拼团信息表。';

-- ----------------------------
-- Records of wx_pt_pt
-- ----------------------------

-- ----------------------------
-- Table structure for wx_pt_pt_ptjt
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_pt_ptjt`;
CREATE TABLE `wx_pt_pt_ptjt` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jt_pt_id` int(11) DEFAULT NULL COMMENT '所属的拼团id',
  `jt_rs` int(11) DEFAULT NULL COMMENT '成团人数',
  `jt_jg` double DEFAULT NULL COMMENT '价格',
  `jt_insert_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '添加时间',
  `jt_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `pt_id` (`jt_pt_id`) COMMENT 'pt_id'
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='拼团阶梯。每一次拼团对应的拼团阶梯。固定团有1条记录，阶梯团有多条记录。';

-- ----------------------------
-- Records of wx_pt_pt_ptjt
-- ----------------------------

-- ----------------------------
-- Table structure for wx_pt_pt_ptxm
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
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='拼团项目。每一次拼团对应的拼团项目';

-- ----------------------------
-- Records of wx_pt_pt_ptxm
-- ----------------------------

-- ----------------------------
-- Table structure for wx_pt_pt_t
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
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='组团信息';

-- ----------------------------
-- Records of wx_pt_pt_t
-- ----------------------------

-- ----------------------------
-- Table structure for wx_pt_sh
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_sh`;
CREATE TABLE `wx_pt_sh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sh_name` varchar(256) DEFAULT NULL COMMENT '商户名称',
  `sh_id` varchar(256) DEFAULT NULL COMMENT '用户登陆账号',
  `sh_pwd` varchar(256) DEFAULT NULL COMMENT '用户密码',
  `sh_salt` varchar(64) DEFAULT NULL COMMENT '对登陆密码加盐。',
  `sh_yxq` date DEFAULT NULL COMMENT '有效期止',
  `sh_max_ci` int(10) unsigned DEFAULT NULL COMMENT '最大有效次数',
  `sh_dz` varchar(250) DEFAULT NULL COMMENT '地址',
  `sh_dh` varchar(12) DEFAULT NULL COMMENT '电话',
  `sh_insert_time` timestamp NULL DEFAULT current_timestamp() COMMENT '添加时间',
  `sh_insert_id` int(11) DEFAULT NULL COMMENT '添加人id',
  `sh_update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '更改时间',
  `sh_state` char(1) DEFAULT '' COMMENT '商户账号状态。"Y"/"N"',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk COMMENT='用户信息表';

-- ----------------------------
-- Records of wx_pt_sh
-- ----------------------------
INSERT INTO `wx_pt_sh` VALUES ('1', '黄河整容医院', 'hh001', 'aaaaaaaaaaaaaaaaa', 'aaasssssssssssss', '2019-01-01', '200', '黄河大道黄河整容医院', null, '2018-11-28 00:05:05', null, '2018-11-28 00:05:05', null);
INSERT INTO `wx_pt_sh` VALUES ('2', '12', '2121', '$2y$10$WeXHPi7SOaw1.nhUTsZa.ukJ.Ysnz8doFUY4rMyCsr7z8LszIKkoO', null, '2018-11-28', '2121', 'wq', '11111111111', '2018-11-28 01:23:44', '1', '2018-11-28 01:23:44', '');
INSERT INTO `wx_pt_sh` VALUES ('3', '12', '2121', '$2y$10$G/kYXl5txIY7DcGtpSZu6uKHCqFqjd6xFwzOLMRmGSx3X33TYNA.i', null, '2018-11-28', '2121', 'wq', '11111111111', '2018-11-28 01:29:03', '1', '2018-11-28 01:29:03', '');
INSERT INTO `wx_pt_sh` VALUES ('4', '12', '2121', '$2y$10$FtsuoJXwjcYPMJLKwBgH1uJg0R97Xx4U50mZHt2HvoTk79TwWGgfW', null, '2018-11-28', '2121', 'wq', '11111111111', '2018-11-28 01:29:33', '1', '2018-11-28 01:29:33', '');
INSERT INTO `wx_pt_sh` VALUES ('5', '黄河整容医院', 'hh001', 'aaaaaaaaaaaaaaaaa', null, '2019-01-01', '200', '黄河大道黄河整容医院', '1234567901', '2018-11-28 01:34:02', '2', '2018-11-28 01:34:02', 'Y');
INSERT INTO `wx_pt_sh` VALUES ('6', '莆田整容整形医院01店', 'pt01', '$2y$10$JGh94WWsuB73kjRrYNfHuOwh3I5MB542YleOy3I0n7aZ.s.HkhqUG', null, '2019-01-31', '100', '莆田市莆田整容整形医院01店', '03111554499', '2018-11-28 01:34:59', '1', '2018-11-28 01:34:59', 'Y');
INSERT INTO `wx_pt_sh` VALUES ('7', '莆田整容整形医院02店', 'pt01', '$2y$10$86d.e9VD9Rqgz4rGwM2ZS.3wERx6Hf94W3BovNr39wGVukmxJUXyi', null, '2019-01-31', '100', '莆田市莆田整容整形医院02店', '03111554499', '2018-11-28 01:40:04', '1', '2018-11-28 01:40:04', 'Y');

-- ----------------------------
-- Table structure for wx_pt_yh
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
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='参与平台拼团的用户';

-- ----------------------------
-- Records of wx_pt_yh
-- ----------------------------

-- ----------------------------
-- Table structure for wx_pt_zf
-- ----------------------------
DROP TABLE IF EXISTS `wx_pt_zf`;
CREATE TABLE `wx_pt_zf` (
  `id` int(11) NOT NULL COMMENT '订单支付id。',
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
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='拼团用户订单信息';

-- ----------------------------
-- Records of wx_pt_zf
-- ----------------------------
