/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : wywloa

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-08-18 17:11:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for renewal
-- ----------------------------
DROP TABLE IF EXISTS `renewal`;
CREATE TABLE `renewal` (
  `rid` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键，自动递增，用户表 续费表',
  `oid` int(10) DEFAULT NULL COMMENT '外键，对应订单id',
  `timesnum` int(10) DEFAULT NULL COMMENT '续费的次数',
  `paytime` varchar(255) DEFAULT NULL COMMENT '付费时间',
  `starttime` varchar(255) DEFAULT NULL COMMENT '续费时间',
  `endtime` varchar(255) DEFAULT NULL COMMENT '到期时间',
  `note` text COMMENT '备注',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of renewal
-- ----------------------------
