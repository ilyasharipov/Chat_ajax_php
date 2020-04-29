/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : gk150m

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-17 19:46:30
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `maz_char_message`
-- ----------------------------
DROP TABLE IF EXISTS `maz_char_message`;
CREATE TABLE `maz_char_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `date` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of maz_char_message
-- ----------------------------
INSERT INTO `maz_char_message` VALUES ('1', '1', 'dfgbkdfgbkfds', '1578663833');
INSERT INTO `maz_char_message` VALUES ('2', '2', 'sdgfdsfgfg', '1578664134');
INSERT INTO `maz_char_message` VALUES ('3', '2', '111111', '1578664140');
INSERT INTO `maz_char_message` VALUES ('4', '3', 'sadgdsfgds', '1578664278');
INSERT INTO `maz_char_message` VALUES ('5', '1', 'sdfsdf', '1578664365');
INSERT INTO `maz_char_message` VALUES ('6', '9', 'qwe', '1578664421');
INSERT INTO `maz_char_message` VALUES ('7', '1', 'qwe', '1578664429');
INSERT INTO `maz_char_message` VALUES ('8', '9', 'qwe', '1578664451');
INSERT INTO `maz_char_message` VALUES ('9', '1', 'qwe', '1578664455');
INSERT INTO `maz_char_message` VALUES ('10', '1', 'ffff', '1578664458');
INSERT INTO `maz_char_message` VALUES ('11', '1', '234', '1578665269');
INSERT INTO `maz_char_message` VALUES ('12', '9', 'asdfsdfsf', '1578665699');
INSERT INTO `maz_char_message` VALUES ('13', '1', 'fghfgh', '1578665713');
INSERT INTO `maz_char_message` VALUES ('14', '1', 'dghfghfdgf', '1578665717');
INSERT INTO `maz_char_message` VALUES ('15', '9', 'dfghdff', '1578665720');
INSERT INTO `maz_char_message` VALUES ('16', '1', 'dsfgsdfg', '1578665798');
INSERT INTO `maz_char_message` VALUES ('17', '1', 'fcgvhfgfd', '1578665801');
INSERT INTO `maz_char_message` VALUES ('18', '1', 'szdfsd', '1578667508');
INSERT INTO `maz_char_message` VALUES ('19', '1', 'sdfsdfsdf', '1578916799');
INSERT INTO `maz_char_message` VALUES ('20', '1', 'ÐŸÑ€Ð¸Ð²ÐµÑ‚!', '1578916818');
INSERT INTO `maz_char_message` VALUES ('21', '1', '123', '1578917436');
INSERT INTO `maz_char_message` VALUES ('22', '1', 'qwe', '1578917594');
INSERT INTO `maz_char_message` VALUES ('23', '1', '123', '1578917627');
INSERT INTO `maz_char_message` VALUES ('24', '1', 'Hi!', '1578917692');
INSERT INTO `maz_char_message` VALUES ('25', '1', 'qwe', '1578917863');
INSERT INTO `maz_char_message` VALUES ('26', '1', 'dsfgdsgf', '1578917941');
INSERT INTO `maz_char_message` VALUES ('27', '1', 'dghfdgfd', '1578917944');
INSERT INTO `maz_char_message` VALUES ('28', '1', 'fghfghdfghdgfgh', '1578917946');
INSERT INTO `maz_char_message` VALUES ('29', '1', 'asdasda', '1578917991');
INSERT INTO `maz_char_message` VALUES ('30', '1', 'fdyhjfgyjhgf', '1578917993');
INSERT INTO `maz_char_message` VALUES ('31', '1', 'fghfghdfh', '1578917996');
INSERT INTO `maz_char_message` VALUES ('32', '9', 'sfgdfghhdfh', '1578918011');
INSERT INTO `maz_char_message` VALUES ('33', '1', 'dfgdsfgs', '1578918015');
INSERT INTO `maz_char_message` VALUES ('34', '9', 'gfyjhfgjgj', '1578918019');
INSERT INTO `maz_char_message` VALUES ('35', '1', 'dfghfd', '1578918022');
INSERT INTO `maz_char_message` VALUES ('36', '1', 'dsfgfdsg', '1578920992');
INSERT INTO `maz_char_message` VALUES ('37', '1', '/w maz2 dsfghdsfgsdfg', '1578921023');

-- ----------------------------
-- Table structure for `maz_db_test`
-- ----------------------------
DROP TABLE IF EXISTS `maz_db_test`;
CREATE TABLE `maz_db_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of maz_db_test
-- ----------------------------
INSERT INTO `maz_db_test` VALUES ('1', 'qweqwe', '111');

-- ----------------------------
-- Table structure for `maz_files`
-- ----------------------------
DROP TABLE IF EXISTS `maz_files`;
CREATE TABLE `maz_files` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `filehash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `component` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `space` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filesize` bigint(20) DEFAULT NULL,
  `filetype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of maz_files
-- ----------------------------
INSERT INTO `maz_files` VALUES ('1', 'ee6032d47315c03a82b1956c6b142a9d5cdd08c4', 'user', 'file', '1', '1.png', '7', 'image/png', '1579098184');
INSERT INTO `maz_files` VALUES ('2', '619f5c3adcdcc2a1e888b014de960aff2ec51efd', 'user', 'file', '1', '11.png', '42652', 'image/png', '1579097242');

-- ----------------------------
-- Table structure for `maz_user`
-- ----------------------------
DROP TABLE IF EXISTS `maz_user`;
CREATE TABLE `maz_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_reg` int(10) DEFAULT NULL,
  `time_online` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`),
  KEY `email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of maz_user
-- ----------------------------
INSERT INTO `maz_user` VALUES ('1', 'maz@2i.tusur.ru', 'MCore_user#6w3btv5ll0T80OO#da7a8f1d7ebd55c2dba24a967810ac675c3f8a28', 'maz', null, null, null, '1579099414');
INSERT INTO `maz_user` VALUES ('2', 'zdv', 'new_password', 'zdv', 'new_firstname', null, null, null);
INSERT INTO `maz_user` VALUES ('3', 'rvv', '1111111', 'rvv', null, null, null, null);
INSERT INTO `maz_user` VALUES ('9', 'naz@qwe.qw', 'MCore_user#6w3btv5ll0T80OO#da7a8f1d7ebd55c2dba24a967810ac675c3f8a28', 'maz2', 'qwe', 'qwe', '1578657854', '1578923357');
INSERT INTO `maz_user` VALUES ('20', '123', null, null, null, null, null, null);
INSERT INTO `maz_user` VALUES ('21', '1', null, null, null, null, null, null);
INSERT INTO `maz_user` VALUES ('30', '123', null, null, null, null, null, null);
INSERT INTO `maz_user` VALUES ('31', '123', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `maz_user_password_recovery`
-- ----------------------------
DROP TABLE IF EXISTS `maz_user_password_recovery`;
CREATE TABLE `maz_user_password_recovery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `userid` int(10) DEFAULT NULL,
  `key` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of maz_user_password_recovery
-- ----------------------------
