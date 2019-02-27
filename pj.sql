/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : project

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2019-02-26 14:32:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for carousel
-- ----------------------------
DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lid` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carousel
-- ----------------------------
INSERT INTO `carousel` VALUES ('39', '1', '/uploads/carousel/27861548817534.jpg');
INSERT INTO `carousel` VALUES ('40', '1', '/uploads/carousel/48501548817534.jpg');
INSERT INTO `carousel` VALUES ('37', '1', '/uploads/carousel/67911548815786.jpg');
INSERT INTO `carousel` VALUES ('35', '2', '/uploads/carousel/19211548815774.jpg');
INSERT INTO `carousel` VALUES ('34', '2', '/uploads/carousel/22751548815774.jpg');
INSERT INTO `carousel` VALUES ('33', '2', '/uploads/carousel/44331548815774.jpg');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for color
-- ----------------------------
DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `color` varchar(16) NOT NULL,
  `display` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of color
-- ----------------------------
INSERT INTO `color` VALUES ('1', '1', '红色', '0');
INSERT INTO `color` VALUES ('2', '1', '白色', '0');
INSERT INTO `color` VALUES ('3', '2', '黑色', '1');
INSERT INTO `color` VALUES ('4', '2', '白色', '1');
INSERT INTO `color` VALUES ('5', '2', '粉色', '1');
INSERT INTO `color` VALUES ('9', '3', '白色', '0');
INSERT INTO `color` VALUES ('10', '3', '红色', '0');
INSERT INTO `color` VALUES ('11', '3', '黑色', '0');
INSERT INTO `color` VALUES ('12', '3', '蓝色', '0');
INSERT INTO `color` VALUES ('13', '6', '白色', '1');
INSERT INTO `color` VALUES ('16', '1', '蓝色', '0');
INSERT INTO `color` VALUES ('17', '5', '黑色', '1');
INSERT INTO `color` VALUES ('18', '9', '白色', '0');
INSERT INTO `color` VALUES ('19', '13', '臊子', '1');
INSERT INTO `color` VALUES ('20', '13', '粉色', '1');

-- ----------------------------
-- Table structure for color_img
-- ----------------------------
DROP TABLE IF EXISTS `color_img`;
CREATE TABLE `color_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of color_img
-- ----------------------------
INSERT INTO `color_img` VALUES ('1', '1', '/uploads/colorimg/97801549543903.jpg');
INSERT INTO `color_img` VALUES ('2', '1', '/uploads/colorimg/73441549543903.jpg');
INSERT INTO `color_img` VALUES ('3', '1', '/uploads/colorimg/33801549543903.jpg');
INSERT INTO `color_img` VALUES ('4', '2', '/uploads/colorimg/98931549544091.jpg');
INSERT INTO `color_img` VALUES ('5', '2', '/uploads/colorimg/28691549544091.jpg');
INSERT INTO `color_img` VALUES ('6', '2', '/uploads/colorimg/37291549544091.jpg');
INSERT INTO `color_img` VALUES ('7', '3', '/uploads/colorimg/76381549590476.jpg');
INSERT INTO `color_img` VALUES ('8', '3', '/uploads/colorimg/63151549590476.jpg');
INSERT INTO `color_img` VALUES ('9', '3', '/uploads/colorimg/70321549590476.jpg');
INSERT INTO `color_img` VALUES ('10', '4', '/uploads/colorimg/76381549590498.jpg');
INSERT INTO `color_img` VALUES ('11', '4', '/uploads/colorimg/48761549590498.jpg');
INSERT INTO `color_img` VALUES ('12', '4', '/uploads/colorimg/36451549590498.jpg');
INSERT INTO `color_img` VALUES ('13', '5', '/uploads/colorimg/23011549590530.jpg');
INSERT INTO `color_img` VALUES ('14', '5', '/uploads/colorimg/23191549590530.jpg');
INSERT INTO `color_img` VALUES ('15', '5', '/uploads/colorimg/96581549590530.jpg');
INSERT INTO `color_img` VALUES ('22', '9', '/uploads/colorimg/18201549590803.jpg');
INSERT INTO `color_img` VALUES ('21', '9', '/uploads/colorimg/26801549590803.jpg');
INSERT INTO `color_img` VALUES ('23', '9', '/uploads/colorimg/29211549590803.jpg');
INSERT INTO `color_img` VALUES ('24', '10', '/uploads/colorimg/69881549590817.jpg');
INSERT INTO `color_img` VALUES ('25', '10', '/uploads/colorimg/25831549590817.jpg');
INSERT INTO `color_img` VALUES ('26', '10', '/uploads/colorimg/56201549590817.jpg');
INSERT INTO `color_img` VALUES ('27', '11', '/uploads/colorimg/70601549590838.jpg');
INSERT INTO `color_img` VALUES ('28', '11', '/uploads/colorimg/78391549590838.jpg');
INSERT INTO `color_img` VALUES ('29', '11', '/uploads/colorimg/64201549590838.jpg');
INSERT INTO `color_img` VALUES ('30', '12', '/uploads/colorimg/59931549590848.jpg');
INSERT INTO `color_img` VALUES ('31', '12', '/uploads/colorimg/25691549590848.jpg');
INSERT INTO `color_img` VALUES ('32', '12', '/uploads/colorimg/54211549590848.jpg');
INSERT INTO `color_img` VALUES ('33', '13', '/uploads/colorimg/69461549603051.jpg');
INSERT INTO `color_img` VALUES ('44', '17', '/uploads/colorimg/67671549679047.jpg');
INSERT INTO `color_img` VALUES ('43', '16', '/uploads/colorimg/25941549612958.jpg');
INSERT INTO `color_img` VALUES ('42', '16', '/uploads/colorimg/16531549612958.jpg');
INSERT INTO `color_img` VALUES ('41', '16', '/uploads/colorimg/55671549612958.jpg');
INSERT INTO `color_img` VALUES ('45', '18', '/uploads/colorimg/49931549976997.jpg');
INSERT INTO `color_img` VALUES ('46', '19', '/uploads/colorimg/46971550741318.jpg');
INSERT INTO `color_img` VALUES ('47', '19', '/uploads/colorimg/56871550741318.jpg');
INSERT INTO `color_img` VALUES ('48', '19', '/uploads/colorimg/34421550741318.jpg');
INSERT INTO `color_img` VALUES ('49', '20', '/uploads/colorimg/85541550741365.jpg');
INSERT INTO `color_img` VALUES ('50', '20', '/uploads/colorimg/91431550741365.jpg');
INSERT INTO `color_img` VALUES ('51', '20', '/uploads/colorimg/86931550741365.jpg');
INSERT INTO `color_img` VALUES ('52', '20', '/uploads/colorimg/45001550741365.jpg');
INSERT INTO `color_img` VALUES ('53', '20', '/uploads/colorimg/18301550741365.jpg');
INSERT INTO `color_img` VALUES ('54', '20', '/uploads/colorimg/34301550741365.jpg');
INSERT INTO `color_img` VALUES ('55', '20', '/uploads/colorimg/43211550741365.jpg');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `gid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `number` varchar(64) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `score` decimal(2,1) NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('2', '3', '201902100405041716', '打算发大水浮点俺的沙发大师发达傻傻的发阿斯顿发大水发达反倒是第三方暗示法第三方按时发大水发大叔大婶', '2.5', '1550477673');
INSERT INTO `comment` VALUES ('1', '7', '201902210408187010', 'dsfdfadsfdsfadfsafdsfdfafd', '2.5', '1550736667');
INSERT INTO `comment` VALUES ('1', '7', '201902210408187010', 'fgfdggf', '2.5', '1550736675');
INSERT INTO `comment` VALUES ('1', '7', '201902210408187010', 'asgagafg', '2.5', '1550736686');
INSERT INTO `comment` VALUES ('2', '7', '201902210412125744', 'gsdfgfsg', '2.5', '1550736788');
INSERT INTO `comment` VALUES ('2', '7', '201902210412125744', 'gsdfgfsg', '2.5', '1550736789');
INSERT INTO `comment` VALUES ('2', '7', '201902210412125744', 'sdfgdfg', '4.5', '1550736795');
INSERT INTO `comment` VALUES ('1', '8', '201902210434203233', '第一个', '0.5', '1550739610');
INSERT INTO `comment` VALUES ('1', '8', '201902210434203233', '第一个', '1.5', '1550739620');
INSERT INTO `comment` VALUES ('1', '8', '201902210434203233', '第一个', '2.0', '1550739629');
INSERT INTO `comment` VALUES ('2', '1', '201902180657015551', '阿大师傅大蒜发大水的萨芬大多数', '2.5', '1550488590');
INSERT INTO `comment` VALUES ('2', '1', '201902180657015551', '打发第三方大地方撒', '3.0', '1550488594');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(16) NOT NULL DEFAULT '0',
  `company` varchar(50) NOT NULL,
  `sale` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '27', '连衣裙A', '69.00', '<p><img src=\"/ueditor/php/upload/image/20190206/timg (1).jpg\" title=\"timg (1).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg (2).jpg\" title=\"timg (2).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg (3).jpg\" title=\"timg (3).jpg\"/></p><p><br/></p><p><br/></p>', '1', '古驰', '0', '1549459412');
INSERT INTO `goods` VALUES ('2', '27', '连衣裙B', '89.00', '<p><img src=\"/ueditor/php/upload/image/20190206/timg (1).jpg\" title=\"timg (1).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg (2).jpg\" title=\"timg (2).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg (3).jpg\" title=\"timg (3).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg.jpg\" title=\"timg.jpg\"/></p><p><br/></p>', '1', '古驰', '0', '1549459487');
INSERT INTO `goods` VALUES ('3', '27', '连衣裙C', '89.00', '<p><img src=\"/ueditor/php/upload/image/20190206/timg (2).jpg\" title=\"timg (2).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg (3).jpg\" title=\"timg (3).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg.jpg\" title=\"timg.jpg\"/></p><p><br/></p>', '1', '古驰', '0', '1549459534');
INSERT INTO `goods` VALUES ('4', '27', '连衣裙D', '49.00', '<p><img src=\"/ueditor/php/upload/image/20190206/timg (1).jpg\" title=\"timg (1).jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20190206/timg (2).jpg\" title=\"timg (2).jpg\"/></p><p><br/></p>', '1', '古驰', '0', '1549459573');
INSERT INTO `goods` VALUES ('13', '27', '裙子发生的空间发的是', '12580.00', '<p>这个是描述<img src=\"/ueditor/php/upload/image/20190221/92f157fd6800eb3cd0258031a2a90c40.jpg\" title=\"92f157fd6800eb3cd0258031a2a90c40.jpg\" alt=\"92f157fd6800eb3cd0258031a2a90c40.jpg\"/></p><p><br/></p><p><br/></p><p>辅导老师框<strong>架发了多少看风景</strong></p><p><br/></p><p><br/></p><p><strong>浮点数丽枫酒店酸辣粉</strong></p><p><br/></p><p>范德萨发等老师</p>', '1', '苏州二郎乡', '0', '1550741218');
INSERT INTO `goods` VALUES ('6', '27', '连衣短裙A', '150.00', '<p><img src=\"/ueditor/php/upload/image/20190208/timg (1).jpg\" title=\"timg (1).jpg\"/></p><p><br/></p><p><br/></p>', '1', '普拉达', '0', '1549590984');
INSERT INTO `goods` VALUES ('10', '27', '花色连衣裙', '110.00', '<p><img src=\"/ueditor/php/upload/image/20190208/timg.jpg\" title=\"timg.jpg\" alt=\"timg.jpg\"/></p>', '1', '爱马仕', '0', '1549591281');
INSERT INTO `goods` VALUES ('7', '27', '连衣短裙B', '120.00', '<p><img src=\"/ueditor/php/upload/image/20190208/timg (1).jpg\" title=\"timg (1).jpg\" alt=\"timg (1).jpg\"/></p>', '1', '普拉达', '0', '1549591035');
INSERT INTO `goods` VALUES ('8', '27', '连衣短裙C', '140.00', '<p><img src=\"/ueditor/php/upload/image/20190208/timg (2).jpg\" title=\"timg (2).jpg\" alt=\"timg (2).jpg\"/></p>', '1', '爱马仕', '0', '1549591130');
INSERT INTO `goods` VALUES ('9', '27', '连衣短裙D', '180.00', '<p><img src=\"/ueditor/php/upload/image/20190208/timg.jpg\" title=\"timg.jpg\" alt=\"timg.jpg\"/></p>', '0', '爱马仕', '0', '1549591187');
INSERT INTO `goods` VALUES ('11', '27', '浅色连衣裙', '110.00', '<p><img src=\"/ueditor/php/upload/image/20190208/timg (1).jpg\" title=\"timg (1).jpg\" alt=\"timg (1).jpg\"/></p>', '1', '范思哲', '0', '1549591408');

-- ----------------------------
-- Table structure for goods_img
-- ----------------------------
DROP TABLE IF EXISTS `goods_img`;
CREATE TABLE `goods_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_img
-- ----------------------------
INSERT INTO `goods_img` VALUES ('21', '1', '/uploads/goodsimg/83171549546030.jpg');
INSERT INTO `goods_img` VALUES ('22', '1', '/uploads/goodsimg/26851549546030.jpg');
INSERT INTO `goods_img` VALUES ('20', '1', '/uploads/goodsimg/13081549546030.jpg');
INSERT INTO `goods_img` VALUES ('5', '2', '/uploads/goodsimg/90901549459487.jpg');
INSERT INTO `goods_img` VALUES ('6', '2', '/uploads/goodsimg/99011549459487.jpg');
INSERT INTO `goods_img` VALUES ('7', '2', '/uploads/goodsimg/42521549459487.jpg');
INSERT INTO `goods_img` VALUES ('8', '2', '/uploads/goodsimg/17491549459487.jpg');
INSERT INTO `goods_img` VALUES ('9', '3', '/uploads/goodsimg/23681549459534.jpg');
INSERT INTO `goods_img` VALUES ('10', '3', '/uploads/goodsimg/33131549459534.jpg');
INSERT INTO `goods_img` VALUES ('11', '3', '/uploads/goodsimg/56641549459534.jpg');
INSERT INTO `goods_img` VALUES ('12', '3', '/uploads/goodsimg/61771549459534.jpg');
INSERT INTO `goods_img` VALUES ('13', '4', '/uploads/goodsimg/23651549459573.jpg');
INSERT INTO `goods_img` VALUES ('14', '4', '/uploads/goodsimg/76301549459573.jpg');
INSERT INTO `goods_img` VALUES ('15', '4', '/uploads/goodsimg/69351549459573.jpg');
INSERT INTO `goods_img` VALUES ('16', '4', '/uploads/goodsimg/37911549459573.jpg');
INSERT INTO `goods_img` VALUES ('17', '5', '/uploads/goodsimg/80131549507985.jpg');
INSERT INTO `goods_img` VALUES ('18', '5', '/uploads/goodsimg/26841549507985.jpg');
INSERT INTO `goods_img` VALUES ('19', '5', '/uploads/goodsimg/49531549507985.jpg');
INSERT INTO `goods_img` VALUES ('23', '6', '/uploads/goodsimg/32631549590984.jpg');
INSERT INTO `goods_img` VALUES ('24', '6', '/uploads/goodsimg/59971549590984.jpg');
INSERT INTO `goods_img` VALUES ('25', '6', '/uploads/goodsimg/28241549590984.jpg');
INSERT INTO `goods_img` VALUES ('26', '7', '/uploads/goodsimg/64081549591035.jpg');
INSERT INTO `goods_img` VALUES ('27', '7', '/uploads/goodsimg/29771549591035.jpg');
INSERT INTO `goods_img` VALUES ('28', '7', '/uploads/goodsimg/44461549591035.jpg');
INSERT INTO `goods_img` VALUES ('29', '8', '/uploads/goodsimg/72181549591130.jpg');
INSERT INTO `goods_img` VALUES ('30', '8', '/uploads/goodsimg/22101549591130.jpg');
INSERT INTO `goods_img` VALUES ('31', '8', '/uploads/goodsimg/34951549591130.jpg');
INSERT INTO `goods_img` VALUES ('32', '9', '/uploads/goodsimg/67261549591187.jpg');
INSERT INTO `goods_img` VALUES ('33', '10', '/uploads/goodsimg/94211549591281.jpg');
INSERT INTO `goods_img` VALUES ('34', '10', '/uploads/goodsimg/54181549591281.jpg');
INSERT INTO `goods_img` VALUES ('35', '10', '/uploads/goodsimg/17791549591281.jpg');
INSERT INTO `goods_img` VALUES ('36', '11', '/uploads/goodsimg/43431549591409.jpg');
INSERT INTO `goods_img` VALUES ('37', '11', '/uploads/goodsimg/94621549591409.jpg');
INSERT INTO `goods_img` VALUES ('38', '11', '/uploads/goodsimg/11331549591409.jpg');
INSERT INTO `goods_img` VALUES ('40', '13', '/uploads/goodsimg/72781550741218.jpg');

-- ----------------------------
-- Table structure for manager
-- ----------------------------
DROP TABLE IF EXISTS `manager`;
CREATE TABLE `manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `tname` varchar(32) NOT NULL,
  `password` char(64) NOT NULL,
  `header` varchar(64) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manager
-- ----------------------------
INSERT INTO `manager` VALUES ('10', 'root', '张鑫', '$2y$10$DTTVDc.lXmygHXuQqkDbteE6blGTUEoiT73qZvSHMbjHSzj9yO11e', '/uploads/64491551010851.jpg', '1', '1548838966');
INSERT INTO `manager` VALUES ('11', 'zhangxin', '张鑫', '$2y$10$uhE0gQQ96FxHpFMFnmEcP.g73fhhP6jr8skubHh5QN68mxxy6xnym', '/uploads/93521549358019.jpg', '1', '1549268090');
INSERT INTO `manager` VALUES ('12', 'zhangxinxin', '张三金', '$2y$10$CYlXWHm3ur1ltKTDDTxyyupsNQSikP8Pu8/.Dh/H5pKxdjrDp4rVK', '/uploads/71591550489764.jpg', '1', '1550489764');
INSERT INTO `manager` VALUES ('13', 'admins', '马奔', '$2y$10$65L4kZUJcBS9W2WQa2lLg.wdmv/HwlHxARLaKmnenrksZTEnTk5ji', '/uploads/71171550740272.jpg', '1', '1550740112');

-- ----------------------------
-- Table structure for order_info
-- ----------------------------
DROP TABLE IF EXISTS `order_info`;
CREATE TABLE `order_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `size` varchar(16) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `num` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `color` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_info
-- ----------------------------
INSERT INTO `order_info` VALUES ('21', '25', '26', '/uploads/colorimg/76381549590476.jpg', 'L', '连衣裙B', '89.00', '2', '178.00', '黑色');
INSERT INTO `order_info` VALUES ('22', '25', '2', '/uploads/colorimg/97801549543903.jpg', 'M', '连衣裙A', '69.00', '3', '207.00', '红色');
INSERT INTO `order_info` VALUES ('23', '26', '30', '/uploads/colorimg/23011549590530.jpg', 'L', '连衣裙B', '89.00', '3', '267.00', '粉色');
INSERT INTO `order_info` VALUES ('24', '26', '27', '/uploads/colorimg/76381549590476.jpg', 'XL', '连衣裙B', '89.00', '6', '534.00', '黑色');
INSERT INTO `order_info` VALUES ('27', '29', '1', '/uploads/colorimg/97801549543903.jpg', 'S', '连衣裙A', '69.00', '1', '69.00', '红色');
INSERT INTO `order_info` VALUES ('28', '30', '5', '/uploads/colorimg/98931549544091.jpg', 'M', '连衣裙A', '69.00', '7', '483.00', '白色');
INSERT INTO `order_info` VALUES ('29', '30', '3', '/uploads/colorimg/97801549543903.jpg', 'L', '连衣裙A', '69.00', '9', '621.00', '红色');
INSERT INTO `order_info` VALUES ('32', '32', '30', '/uploads/colorimg/23011549590530.jpg', 'L', '连衣裙B', '89.00', '3', '267.00', '粉色');
INSERT INTO `order_info` VALUES ('33', '32', '26', '/uploads/colorimg/76381549590476.jpg', 'L', '连衣裙B', '89.00', '3', '267.00', '黑色');
INSERT INTO `order_info` VALUES ('44', '39', '4', '/uploads/colorimg/98931549544091.jpg', 'S', '连衣裙A', '69.00', '6', '414.00', '白色');
INSERT INTO `order_info` VALUES ('43', '39', '5', '/uploads/colorimg/98931549544091.jpg', 'M', '连衣裙A', '69.00', '5', '345.00', '白色');
INSERT INTO `order_info` VALUES ('45', '40', '30', '/uploads/colorimg/23011549590530.jpg', 'L', '连衣裙B', '89.00', '4', '356.00', '粉色');
INSERT INTO `order_info` VALUES ('46', '40', '8', '/uploads/colorimg/76381549590476.jpg', 'S', '连衣裙B', '89.00', '4', '356.00', '黑色');
INSERT INTO `order_info` VALUES ('47', '41', '2', '/uploads/colorimg/97801549543903.jpg', 'M', '连衣裙A', '69.00', '4', '276.00', '红色');
INSERT INTO `order_info` VALUES ('48', '42', '25', '/uploads/colorimg/76381549590498.jpg', 'X', '连衣裙B', '89.00', '4', '356.00', '白色');
INSERT INTO `order_info` VALUES ('49', '42', '26', '/uploads/colorimg/76381549590476.jpg', 'L', '连衣裙B', '89.00', '4', '356.00', '黑色');
INSERT INTO `order_info` VALUES ('50', '43', '2', '/uploads/colorimg/97801549543903.jpg', 'M', '连衣裙A', '69.00', '16', '1104.00', '红色');
INSERT INTO `order_info` VALUES ('51', '43', '5', '/uploads/colorimg/98931549544091.jpg', 'M', '连衣裙A', '69.00', '15', '1035.00', '白色');
INSERT INTO `order_info` VALUES ('52', '43', '5', '/uploads/colorimg/98931549544091.jpg', 'M', '连衣裙A', '69.00', '15', '1035.00', '白色');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(64) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `payway` varchar(64) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(16) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT '暂未填写',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('39', '201902190825592667', 'zzzxxx', '', '18068436941', '货到付款', '1550579159', '1', '759.00', '苏州市世茂运河成和茂苑');
INSERT INTO `orders` VALUES ('40', '201902210355060457', 'admin', '', '暂未填写', '未支付', '1550735706', '0', '712.00', '暂未填写');
INSERT INTO `orders` VALUES ('25', '201902100405041716', 'zzzxxx', '', '18068436941', '支付宝', '1549785904', '3', '385.00', '苏州市世茂运河城');
INSERT INTO `orders` VALUES ('26', '201902101038095596', 'zzzxxx', '', '18068436941', '支付宝', '1549809489', '3', '801.00', '苏州市世茂运河成和茂苑');
INSERT INTO `orders` VALUES ('29', '201902121205575137', 'zzzxxx', '', '18068436941', '货到付款', '1549944357', '3', '69.00', '苏州市世茂运河成和茂苑');
INSERT INTO `orders` VALUES ('30', '201902130305072939', 'zzzxxx', '', '18068436941', '货到付款', '1550041507', '3', '1104.00', '苏州市世茂运河成和茂苑');
INSERT INTO `orders` VALUES ('32', '201902180657015551', 'zhangxin', '', '18068436941', '货到付款', '1550487421', '3', '534.00', '苏州');
INSERT INTO `orders` VALUES ('41', '201902210408187010', 'aaaabb', '', '18068436941', '支付宝', '1550736498', '3', '276.00', '苏州市世茂运河城');
INSERT INTO `orders` VALUES ('42', '201902210412125744', 'aaaabb', '', '18068436941', '支付宝', '1550736732', '3', '712.00', '苏州市世茂运河城');
INSERT INTO `orders` VALUES ('43', '201902210434203233', 'maben', '', '18068436941', '支付宝', '1550738060', '3', '3174.00', '江苏省苏州市广济南路2108A');

-- ----------------------------
-- Table structure for permission
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pername` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('36', '登录处理', 'App\\Http\\Controllers\\Admin\\LoginController@dologin', '系统模块');
INSERT INTO `permission` VALUES ('31', '修改头像', 'App\\Http\\Controllers\\Admin\\IndexController@header', '系统模块');
INSERT INTO `permission` VALUES ('32', '修改密码', 'App\\Http\\Controllers\\Admin\\IndexController@mpassword', '系统模块');
INSERT INTO `permission` VALUES ('33', '修改密码处理', 'App\\Http\\Controllers\\Admin\\IndexController@dompassword', '系统模块');
INSERT INTO `permission` VALUES ('41', '添加处理', 'App\\Http\\Controllers\\Admin\\ManagerController@store', '管理员模块');
INSERT INTO `permission` VALUES ('42', '修改', 'App\\Http\\Controllers\\Admin\\ManagerController@edit', '管理员模块');
INSERT INTO `permission` VALUES ('43', '修改处理', 'App\\Http\\Controllers\\Admin\\ManagerController@update', '管理员模块');
INSERT INTO `permission` VALUES ('39', '查看', 'App\\Http\\Controllers\\Admin\\ManagerController@index', '管理员模块');
INSERT INTO `permission` VALUES ('40', '添加', 'App\\Http\\Controllers\\Admin\\ManagerController@create', '管理员模块');
INSERT INTO `permission` VALUES ('44', '删除', 'App\\Http\\Controllers\\Admin\\ManagerController@destroy', '管理员模块');
INSERT INTO `permission` VALUES ('45', 'ajax', 'App\\Http\\Controllers\\Admin\\ManagerController@ajax', '管理员模块');
INSERT INTO `permission` VALUES ('46', '查看', 'App\\Http\\Controllers\\Admin\\UserController@index', '用户模块');
INSERT INTO `permission` VALUES ('47', '添加', 'App\\Http\\Controllers\\Admin\\UserController@create', '用户模块');
INSERT INTO `permission` VALUES ('48', '添加处理', 'App\\Http\\Controllers\\Admin\\UserController@store', '用户模块');
INSERT INTO `permission` VALUES ('51', '修改', 'App\\Http\\Controllers\\Admin\\UserController@edit', '用户模块');
INSERT INTO `permission` VALUES ('50', '修改处理', 'App\\Http\\Controllers\\Admin\\UserController@update', '用户模块');
INSERT INTO `permission` VALUES ('52', '删除', 'App\\Http\\Controllers\\Admin\\UserController@destroy', '用户模块');
INSERT INTO `permission` VALUES ('53', 'ajax', 'App\\Http\\Controllers\\Admin\\UserController@status', '用户模块');
INSERT INTO `permission` VALUES ('54', '查看', 'App\\Http\\Controllers\\Admin\\TypeController@index', '分类模块');
INSERT INTO `permission` VALUES ('55', '添加', 'App\\Http\\Controllers\\Admin\\TypeController@create', '分类模块');
INSERT INTO `permission` VALUES ('56', '添加处理', 'App\\Http\\Controllers\\Admin\\TypeController@store', '分类模块');
INSERT INTO `permission` VALUES ('61', '名称修改', 'App\\Http\\Controllers\\Admin\\TypeController@nameajax', '分类模块');
INSERT INTO `permission` VALUES ('62', '子分类查看', 'App\\Http\\Controllers\\Admin\\TypeController@typeChild', '分类模块');
INSERT INTO `permission` VALUES ('59', '删除', 'App\\Http\\Controllers\\Admin\\TypeController@destroy', '分类模块');
INSERT INTO `permission` VALUES ('60', '状态修改', 'App\\Http\\Controllers\\Admin\\TypeController@display', '分类模块');
INSERT INTO `permission` VALUES ('63', '添加子分类', 'App\\Http\\Controllers\\Admin\\TypeController@addChild', '分类模块');
INSERT INTO `permission` VALUES ('64', '添加子分类处理', 'App\\Http\\Controllers\\Admin\\TypeController@saveChild', '分类模块');
INSERT INTO `permission` VALUES ('65', '查看', 'App\\Http\\Controllers\\Admin\\GoodsController@index', '商品模块');
INSERT INTO `permission` VALUES ('66', '添加', 'App\\Http\\Controllers\\Admin\\GoodsController@create', '商品模块');
INSERT INTO `permission` VALUES ('67', '添加处理', 'App\\Http\\Controllers\\Admin\\GoodsController@store', '商品模块');
INSERT INTO `permission` VALUES ('68', '修改', 'App\\Http\\Controllers\\Admin\\GoodsController@edit', '商品模块');
INSERT INTO `permission` VALUES ('69', '修改处理', 'App\\Http\\Controllers\\Admin\\GoodsController@update', '商品模块');
INSERT INTO `permission` VALUES ('70', '删除', 'App\\Http\\Controllers\\Admin\\GoodsController@destroy', '商品模块');
INSERT INTO `permission` VALUES ('71', '状态修改', 'App\\Http\\Controllers\\Admin\\GoodsController@status', '分类模块');
INSERT INTO `permission` VALUES ('72', '删除商品图片', 'App\\Http\\Controllers\\Admin\\GoodsController@ajax', '商品模块');
INSERT INTO `permission` VALUES ('73', '规格查看', 'App\\Http\\Controllers\\Admin\\GoodsController@spe', '商品模块');
INSERT INTO `permission` VALUES ('74', '添加颜色', 'App\\Http\\Controllers\\Admin\\GoodsController@color', '商品模块');
INSERT INTO `permission` VALUES ('75', '颜色上下架', 'App\\Http\\Controllers\\Admin\\GoodsController@colorajax', '商品模块');
INSERT INTO `permission` VALUES ('76', '颜色删除', 'App\\Http\\Controllers\\Admin\\GoodsController@colordelete', '商品模块');
INSERT INTO `permission` VALUES ('77', '规格修改', 'App\\Http\\Controllers\\Admin\\GoodsController@sizeupdateajax', '商品模块');
INSERT INTO `permission` VALUES ('78', '规格添加', 'App\\Http\\Controllers\\Admin\\GoodsController@sizeaddajax', '商品模块');
INSERT INTO `permission` VALUES ('79', '规格删除', 'App\\Http\\Controllers\\Admin\\GoodsController@sizedeleteajax', '商品模块');
INSERT INTO `permission` VALUES ('80', '查看', 'App\\Http\\Controllers\\Admin\\CarouselController@index', '轮播图模块');
INSERT INTO `permission` VALUES ('81', '添加', 'App\\Http\\Controllers\\Admin\\CarouselController@create', '轮播图模块');
INSERT INTO `permission` VALUES ('82', '添加处理', 'App\\Http\\Controllers\\Admin\\CarouselController@store', '轮播图模块');
INSERT INTO `permission` VALUES ('83', '修改', 'App\\Http\\Controllers\\Admin\\CarouselController@edit', '轮播图模块');
INSERT INTO `permission` VALUES ('84', '修改处理', 'App\\Http\\Controllers\\Admin\\CarouselController@update', '轮播图模块');
INSERT INTO `permission` VALUES ('85', '删除', 'App\\Http\\Controllers\\Admin\\CarouselController@destroy', '轮播图模块');
INSERT INTO `permission` VALUES ('86', '图片删除', 'App\\Http\\Controllers\\Admin\\CarouselController@ajax', '轮播图模块');
INSERT INTO `permission` VALUES ('87', '查看', 'App\\Http\\Controllers\\Admin\\OrdersController@index', '订单模块');
INSERT INTO `permission` VALUES ('88', '详情', 'App\\Http\\Controllers\\Admin\\OrdersController@orderinfo', '订单模块');
INSERT INTO `permission` VALUES ('89', '状态修改', 'App\\Http\\Controllers\\Admin\\OrdersController@status', '订单模块');
INSERT INTO `permission` VALUES ('90', '查看', 'App\\Http\\Controllers\\Admin\\RoleController@index', '角色模块');
INSERT INTO `permission` VALUES ('91', '添加', 'App\\Http\\Controllers\\Admin\\RoleController@store', '角色模块');
INSERT INTO `permission` VALUES ('92', '修改', 'App\\Http\\Controllers\\Admin\\RoleController@ajax', '角色模块');
INSERT INTO `permission` VALUES ('93', '添加权限', 'App\\Http\\Controllers\\Admin\\RoleController@peradd', '角色模块');
INSERT INTO `permission` VALUES ('94', '添加权限处理', 'App\\Http\\Controllers\\Admin\\RoleController@persave', '角色模块');
INSERT INTO `permission` VALUES ('95', '查看', 'App\\Http\\Controllers\\Admin\\PerController@index', '权限模块');
INSERT INTO `permission` VALUES ('96', '添加', 'App\\Http\\Controllers\\Admin\\PerController@add', '权限模块');
INSERT INTO `permission` VALUES ('97', '删除', 'App\\Http\\Controllers\\Admin\\PerController@delete', '权限模块');
INSERT INTO `permission` VALUES ('98', '修改', 'App\\Http\\Controllers\\Admin\\PerController@edit', '权限模块');
INSERT INTO `permission` VALUES ('99', '角色查看', 'App\\Http\\Controllers\\Admin\\PerController@managerrole', '管理员模块');
INSERT INTO `permission` VALUES ('100', '角色添加', 'App\\Http\\Controllers\\Admin\\PerController@managerroleadd', '管理员模块');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('11', '产品经理');
INSERT INTO `role` VALUES ('10', '组长');
INSERT INTO `role` VALUES ('9', '员工');
INSERT INTO `role` VALUES ('12', '部门经理');
INSERT INTO `role` VALUES ('13', 'CEO');

-- ----------------------------
-- Table structure for role_permission
-- ----------------------------
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE `role_permission` (
  `role_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_permission
-- ----------------------------
INSERT INTO `role_permission` VALUES ('13', '86');
INSERT INTO `role_permission` VALUES ('13', '85');
INSERT INTO `role_permission` VALUES ('13', '84');
INSERT INTO `role_permission` VALUES ('13', '83');
INSERT INTO `role_permission` VALUES ('13', '82');
INSERT INTO `role_permission` VALUES ('13', '81');
INSERT INTO `role_permission` VALUES ('13', '80');
INSERT INTO `role_permission` VALUES ('11', '9');
INSERT INTO `role_permission` VALUES ('11', '8');
INSERT INTO `role_permission` VALUES ('13', '89');
INSERT INTO `role_permission` VALUES ('13', '88');
INSERT INTO `role_permission` VALUES ('13', '87');
INSERT INTO `role_permission` VALUES ('13', '94');
INSERT INTO `role_permission` VALUES ('13', '93');
INSERT INTO `role_permission` VALUES ('13', '92');
INSERT INTO `role_permission` VALUES ('13', '91');
INSERT INTO `role_permission` VALUES ('13', '90');
INSERT INTO `role_permission` VALUES ('13', '33');
INSERT INTO `role_permission` VALUES ('13', '32');
INSERT INTO `role_permission` VALUES ('13', '31');
INSERT INTO `role_permission` VALUES ('13', '36');
INSERT INTO `role_permission` VALUES ('13', '100');
INSERT INTO `role_permission` VALUES ('13', '99');
INSERT INTO `role_permission` VALUES ('13', '45');
INSERT INTO `role_permission` VALUES ('13', '44');
INSERT INTO `role_permission` VALUES ('13', '40');
INSERT INTO `role_permission` VALUES ('13', '39');
INSERT INTO `role_permission` VALUES ('13', '43');
INSERT INTO `role_permission` VALUES ('13', '42');
INSERT INTO `role_permission` VALUES ('13', '41');
INSERT INTO `role_permission` VALUES ('13', '53');
INSERT INTO `role_permission` VALUES ('13', '52');
INSERT INTO `role_permission` VALUES ('13', '50');
INSERT INTO `role_permission` VALUES ('13', '51');
INSERT INTO `role_permission` VALUES ('13', '48');
INSERT INTO `role_permission` VALUES ('13', '47');
INSERT INTO `role_permission` VALUES ('13', '46');
INSERT INTO `role_permission` VALUES ('13', '98');
INSERT INTO `role_permission` VALUES ('13', '97');
INSERT INTO `role_permission` VALUES ('13', '96');
INSERT INTO `role_permission` VALUES ('13', '95');
INSERT INTO `role_permission` VALUES ('13', '79');
INSERT INTO `role_permission` VALUES ('13', '78');
INSERT INTO `role_permission` VALUES ('13', '77');
INSERT INTO `role_permission` VALUES ('13', '76');
INSERT INTO `role_permission` VALUES ('13', '75');
INSERT INTO `role_permission` VALUES ('13', '74');
INSERT INTO `role_permission` VALUES ('13', '73');
INSERT INTO `role_permission` VALUES ('13', '72');
INSERT INTO `role_permission` VALUES ('13', '70');
INSERT INTO `role_permission` VALUES ('13', '69');
INSERT INTO `role_permission` VALUES ('13', '68');
INSERT INTO `role_permission` VALUES ('13', '67');
INSERT INTO `role_permission` VALUES ('13', '66');
INSERT INTO `role_permission` VALUES ('13', '65');
INSERT INTO `role_permission` VALUES ('13', '71');
INSERT INTO `role_permission` VALUES ('13', '64');
INSERT INTO `role_permission` VALUES ('13', '63');
INSERT INTO `role_permission` VALUES ('13', '60');
INSERT INTO `role_permission` VALUES ('13', '59');
INSERT INTO `role_permission` VALUES ('13', '62');
INSERT INTO `role_permission` VALUES ('13', '61');
INSERT INTO `role_permission` VALUES ('13', '56');
INSERT INTO `role_permission` VALUES ('13', '55');
INSERT INTO `role_permission` VALUES ('13', '54');
INSERT INTO `role_permission` VALUES ('9', '65');
INSERT INTO `role_permission` VALUES ('9', '66');
INSERT INTO `role_permission` VALUES ('9', '67');
INSERT INTO `role_permission` VALUES ('9', '68');
INSERT INTO `role_permission` VALUES ('9', '69');
INSERT INTO `role_permission` VALUES ('9', '70');
INSERT INTO `role_permission` VALUES ('9', '72');
INSERT INTO `role_permission` VALUES ('9', '73');
INSERT INTO `role_permission` VALUES ('9', '74');
INSERT INTO `role_permission` VALUES ('9', '75');
INSERT INTO `role_permission` VALUES ('9', '76');
INSERT INTO `role_permission` VALUES ('9', '77');
INSERT INTO `role_permission` VALUES ('9', '78');
INSERT INTO `role_permission` VALUES ('9', '79');

-- ----------------------------
-- Table structure for size
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `size` varchar(16) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of size
-- ----------------------------
INSERT INTO `size` VALUES ('1', '1', 'S', '0');
INSERT INTO `size` VALUES ('2', '1', 'M', '0');
INSERT INTO `size` VALUES ('3', '1', 'L', '-160');
INSERT INTO `size` VALUES ('46', '2', 'S', '0');
INSERT INTO `size` VALUES ('36', '13', 'X', '12');
INSERT INTO `size` VALUES ('8', '3', 'S', '6');
INSERT INTO `size` VALUES ('31', '17', 'X', '15');
INSERT INTO `size` VALUES ('26', '3', 'L', '11');
INSERT INTO `size` VALUES ('25', '4', 'X', '11');
INSERT INTO `size` VALUES ('27', '3', 'XL', '10');
INSERT INTO `size` VALUES ('28', '4', 'L', '20');
INSERT INTO `size` VALUES ('29', '5', 'S', '20');
INSERT INTO `size` VALUES ('30', '5', 'L', '15');
INSERT INTO `size` VALUES ('47', '2', 'X', '0');
INSERT INTO `size` VALUES ('48', '2', 'L', '0');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `path` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `display` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '0', '0,', '男士', '1');
INSERT INTO `type` VALUES ('2', '0', '0,', '女士', '1');
INSERT INTO `type` VALUES ('3', '2', '0,2,', '包袋', '1');
INSERT INTO `type` VALUES ('4', '2', '0,2,', '小型皮具', '1');
INSERT INTO `type` VALUES ('5', '2', '0,2,', '成衣', '1');
INSERT INTO `type` VALUES ('6', '2', '0,2,', '鞋履', '1');
INSERT INTO `type` VALUES ('7', '2', '0,2,', '配件', '1');
INSERT INTO `type` VALUES ('8', '2', '0,2,', '太阳镜', '1');
INSERT INTO `type` VALUES ('9', '3', '0,2,3,', '手提袋', '1');
INSERT INTO `type` VALUES ('10', '3', '0,2,3,', '单肩包', '1');
INSERT INTO `type` VALUES ('11', '3', '0,2,3,', '购物包', '1');
INSERT INTO `type` VALUES ('12', '3', '0,2,3,', '迷你包', '1');
INSERT INTO `type` VALUES ('13', '3', '0,2,3,', '背包', '1');
INSERT INTO `type` VALUES ('14', '3', '0,2,3,', '腰包', '1');
INSERT INTO `type` VALUES ('15', '3', '0,2,3,', '手提袋', '1');
INSERT INTO `type` VALUES ('19', '4', '0,2,4,', '钱包', '1');
INSERT INTO `type` VALUES ('20', '4', '0,2,4,', '收纳包', '1');
INSERT INTO `type` VALUES ('21', '4', '0,2,4,', '钥匙包', '1');
INSERT INTO `type` VALUES ('22', '4', '0,2,4,', '证章夹', '1');
INSERT INTO `type` VALUES ('23', '4', '0,2,4,', '电子产品配件', '1');
INSERT INTO `type` VALUES ('24', '5', '0,2,5,', '外套羽绒服', '1');
INSERT INTO `type` VALUES ('25', '5', '0,2,5,', '大衣', '1');
INSERT INTO `type` VALUES ('26', '5', '0,2,5,', '针织衫', '1');
INSERT INTO `type` VALUES ('27', '5', '0,2,5,', '连衣裙', '1');
INSERT INTO `type` VALUES ('28', '5', '0,2,5,', '裤装', '1');
INSERT INTO `type` VALUES ('30', '6', '0,2,6,', '高跟鞋', '1');
INSERT INTO `type` VALUES ('31', '6', '0,2,6,', '运动鞋', '1');
INSERT INTO `type` VALUES ('32', '6', '0,2,6,', '拖鞋', '1');
INSERT INTO `type` VALUES ('33', '6', '0,2,6,', '凉鞋', '1');
INSERT INTO `type` VALUES ('34', '6', '0,2,6,', '系带鞋', '1');
INSERT INTO `type` VALUES ('35', '7', '0,2,7,', '腰带', '1');
INSERT INTO `type` VALUES ('36', '7', '0,2,7,', '时尚首饰', '1');
INSERT INTO `type` VALUES ('37', '7', '0,2,7,', '肩带', '1');
INSERT INTO `type` VALUES ('38', '7', '0,2,7,', '帽子', '1');
INSERT INTO `type` VALUES ('44', '8', '0,2,8,', '宝圣', '1');
INSERT INTO `type` VALUES ('43', '8', '0,2,8,', '雷朋', '1');
INSERT INTO `type` VALUES ('45', '8', '0,2,8,', '别克', '1');
INSERT INTO `type` VALUES ('46', '8', '0,2,8,', '迪奥', '1');
INSERT INTO `type` VALUES ('47', '1', '0,1,', '包袋', '1');
INSERT INTO `type` VALUES ('48', '1', '0,1,', '小型皮具', '1');
INSERT INTO `type` VALUES ('49', '1', '0,1,', '成衣', '1');
INSERT INTO `type` VALUES ('50', '1', '0,1,', '鞋履', '1');
INSERT INTO `type` VALUES ('51', '1', '0,1,', '配件', '1');
INSERT INTO `type` VALUES ('52', '1', '0,1,', '旅行', '1');
INSERT INTO `type` VALUES ('53', '47', '0,1,47,', '公文包', '1');
INSERT INTO `type` VALUES ('54', '47', '0,1,47,', '邮差包', '1');
INSERT INTO `type` VALUES ('55', '47', '0,1,47,', '手包', '1');
INSERT INTO `type` VALUES ('56', '47', '0,1,47,', '腰包', '1');
INSERT INTO `type` VALUES ('57', '47', '0,1,47,', '背包', '1');
INSERT INTO `type` VALUES ('58', '48', '0,1,48,', '收纳包', '1');
INSERT INTO `type` VALUES ('59', '48', '0,1,48,', '钱夹', '1');
INSERT INTO `type` VALUES ('60', '48', '0,1,48,', '证章夹', '1');
INSERT INTO `type` VALUES ('61', '48', '0,1,48,', '钥匙包', '1');
INSERT INTO `type` VALUES ('62', '48', '0,1,48,', '护照夹', '1');
INSERT INTO `type` VALUES ('63', '49', '0,1,49,', '大衣', '1');
INSERT INTO `type` VALUES ('64', '49', '0,1,49,', '外套', '1');
INSERT INTO `type` VALUES ('65', '49', '0,1,49,', '针织衫', '1');
INSERT INTO `type` VALUES ('66', '49', '0,1,49,', '衬衫', '1');
INSERT INTO `type` VALUES ('67', '49', '0,1,49,', '牛仔裤', '1');
INSERT INTO `type` VALUES ('68', '50', '0,1,50,', '运动鞋', '1');
INSERT INTO `type` VALUES ('69', '50', '0,1,50,', '皮鞋', '1');
INSERT INTO `type` VALUES ('70', '50', '0,1,50,', '系带鞋', '1');
INSERT INTO `type` VALUES ('71', '50', '0,1,50,', '凉鞋', '1');
INSERT INTO `type` VALUES ('72', '50', '0,1,50,', '厚底鞋', '1');
INSERT INTO `type` VALUES ('73', '51', '0,1,51,', '皮带', '1');
INSERT INTO `type` VALUES ('74', '51', '0,1,51,', '帽子', '1');
INSERT INTO `type` VALUES ('75', '51', '0,1,51,', '手套', '1');
INSERT INTO `type` VALUES ('76', '51', '0,1,51,', '时尚首饰', '1');
INSERT INTO `type` VALUES ('77', '52', '0,1,52,', '拉杆箱', '1');
INSERT INTO `type` VALUES ('78', '52', '0,1,52,', '旅行箱', '1');
INSERT INTO `type` VALUES ('79', '52', '0,1,52,', '护照夹', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` char(64) NOT NULL,
  `header` varchar(64) NOT NULL DEFAULT '/common/image/man.jpg',
  `addtime` int(11) NOT NULL,
  `level` enum('2','1','0') NOT NULL DEFAULT '0',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'zhangxin', '$2y$10$weqTE.qLv1Ncmq6wvnEs7e8JaCeWcjTmo5wXhR2rW6/S5VHwbmIhy', '/uploads/52061549422265.jpg', '1549422265', '0', '1', '');
INSERT INTO `user` VALUES ('2', 'asaafdsafds', '$2y$10$JOMGXRqgeaQeg4Bri0pMDOfvkmEQ56tTS1Hx3j19j4B64a2idsPO.', '/uploads/27251549422370.jpg', '1549422370', '2', '1', '');
INSERT INTO `user` VALUES ('3', 'zzzxxx', '$2y$10$vixItfZptUS6pxiL2gbLkuNYP1lANCDNDxD06JjEUqZC6/RLzd.ku', '/uploads/86041549931986.jpg', '1549422500', '0', '1', 'YFLiTXzRo5dHb2uTWpvuHcjXxOouOHqF');
INSERT INTO `user` VALUES ('4', 'caohui', '$2y$10$K/SrYSjVfvDlYZ9/PX8Y1uhPp4/P4VVELFQLwDKllWv.KM4S.BGHO', '/common/image/man.jpg', '1550489914', '0', '1', 'Y5W8L1MxaCKhztIQDcPeshUm5OrlqVnA');
INSERT INTO `user` VALUES ('5', 'aaabbb', '$2y$10$vIkvuW1tkxo0u1msSR3w3uNSCDxwNuEupwPSKS2X0CZVKWpAIj1E.', '/common/image/man.jpg', '1550735309', '0', '1', 'wcPSzsPpTFXMZCIe0hC94v16P5IBl1ys');
INSERT INTO `user` VALUES ('6', 'admin', '$2y$10$sUYdFrcYEbQ9lO38Mab0nudKXVMgQocQQEImjxRNijUsIgpgJdyVG', '/common/image/man.jpg', '1550735470', '0', '1', 'qq8Ii45YNxZtk9uIqOnKf85dEKYkc7Yf');
INSERT INTO `user` VALUES ('7', 'aaaabb', '$2y$10$K8brVW7sM5BgeceZ2H5bP.545zW/KIyOqwhARBZ4LmcSmT/cQIp6y', '/common/image/man.jpg', '1550736457', '0', '1', 'QQ6GxpaZWnrMxXRn59msTca3fxb2QSSd');
INSERT INTO `user` VALUES ('8', 'maben', '$2y$10$PkwoeVH4PiyRHsEz5UVkUekvGgi11ZYFY2XUQTx988ry3dmqbgBCe', '/common/image/man.jpg', '1550737546', '0', '1', 'UMxlCRNU7IyCpYkK6uQtUspbDswWR5tm');
INSERT INTO `user` VALUES ('9', 'zzzzxxxx', '$2y$10$sH3k8OUlwYBVezA41yt0yeV.hkCGgqrlmiuzey1kcfHAG/2bAjrVC', '/uploads/88311551003287.jpg', '1550990005', '0', '1', 'ejY4gGLxWjqqu8NwYZm5Y3hVoFfrlNOH');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `tname` varchar(16) NOT NULL DEFAULT '暂未填写',
  `sex` enum('2','1','0') NOT NULL DEFAULT '1',
  `address` varchar(255) NOT NULL DEFAULT '暂未填写',
  `phone` varchar(16) NOT NULL DEFAULT '暂未填写',
  `email` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '1', '张鑫', '1', '苏州', '18068436941', '122680311@qq.com');
INSERT INTO `user_info` VALUES ('2', '2', '啊啊啊', '1', '江苏省姑苏区山塘街', '18068436941', '122680312@qq.com');
INSERT INTO `user_info` VALUES ('3', '3', '张鑫', '1', '苏州市世茂运河成和茂苑', '18068436941', '122680313@qq.com');
INSERT INTO `user_info` VALUES ('4', '4', '暂未填写', '1', '暂未填写', '18068436940', '2573230929@qq.com');
INSERT INTO `user_info` VALUES ('5', '5', '暂未填写', '1', '暂未填写', '暂未填写', '122680315@qq.com');
INSERT INTO `user_info` VALUES ('6', '6', '暂未填写', '1', '暂未填写', '暂未填写', '122680311@qq.com');
INSERT INTO `user_info` VALUES ('8', '7', '张鑫', '1', '<font color=\"red\">fdsfdsfsd</font>', '18068436941', '12268ssss310@qq.com');
INSERT INTO `user_info` VALUES ('9', '8', '马奔', '1', '暂未填写', '18559321182', 'mabenchn@gmail.com');
INSERT INTO `user_info` VALUES ('10', '9', '张鑫', '1', '江苏省姑苏区山塘街52号', '18068436941', '122680310@qq.com');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('11', '13');
