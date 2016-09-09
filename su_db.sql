/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : su_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-09-09 09:24:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '2', '1472824473');
INSERT INTO `auth_assignment` VALUES ('theCreator', '1', '1473217450');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/basicfilemanager/*', '2', null, null, null, '1473168548', '1473168548');
INSERT INTO `auth_item` VALUES ('/borrow-material/*', '2', null, null, null, '1473387077', '1473387077');
INSERT INTO `auth_item` VALUES ('/menu/*', '2', null, null, null, '1473094894', '1473094894');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1473092529', '1473092529');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1473092658', '1473092658');
INSERT INTO `auth_item` VALUES ('/user/*', '2', null, null, null, '1473166817', '1473166817');
INSERT INTO `auth_item` VALUES ('admin', '1', 'Administrator of this application', null, null, '1472803072', '1472803072');
INSERT INTO `auth_item` VALUES ('employee', '1', 'Employee of this site/company who has lower rights than admin', null, null, '1472803072', '1472803072');
INSERT INTO `auth_item` VALUES ('managerMenus', '2', null, null, null, '1473094862', '1473094862');
INSERT INTO `auth_item` VALUES ('manageUsers', '2', 'Allows admin+ roles to manage users', null, null, '1472803072', '1472803072');
INSERT INTO `auth_item` VALUES ('member', '1', 'Authenticated user, equal to \"@\"', null, null, '1472803072', '1472803072');
INSERT INTO `auth_item` VALUES ('premium', '1', 'Premium users. Authenticated users with extra powers', null, null, '1472803072', '1472803072');
INSERT INTO `auth_item` VALUES ('theCreator', '1', 'You!', null, null, '1472803072', '1472803072');
INSERT INTO `auth_item` VALUES ('usePremiumContent', '2', 'Allows premium+ roles to use premium content', null, null, '1472803072', '1472803072');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', '/basicfilemanager/*');
INSERT INTO `auth_item_child` VALUES ('admin', '/borrow-material/*');
INSERT INTO `auth_item_child` VALUES ('admin', '/site/index');
INSERT INTO `auth_item_child` VALUES ('admin', '/user/*');
INSERT INTO `auth_item_child` VALUES ('admin', 'managerMenus');
INSERT INTO `auth_item_child` VALUES ('admin', 'manageUsers');
INSERT INTO `auth_item_child` VALUES ('employee', 'premium');
INSERT INTO `auth_item_child` VALUES ('managerMenus', '/menu/*');
INSERT INTO `auth_item_child` VALUES ('premium', 'member');
INSERT INTO `auth_item_child` VALUES ('premium', 'usePremiumContent');
INSERT INTO `auth_item_child` VALUES ('theCreator', 'admin');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('isAuthor', 'O:28:\"common\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1472803071;s:9:\"updatedAt\";i:1472803071;}', '1472803071', '1472803071');

-- ----------------------------
-- Table structure for `material`
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id` varchar(30) NOT NULL COMMENT 'รหัสครุภัณฑ์',
  `title` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `brand` varchar(100) DEFAULT NULL COMMENT 'ยี่ห้อ',
  `status` int(1) DEFAULT NULL COMMENT 'สถานะ',
  `material_type_id` int(11) DEFAULT NULL COMMENT 'ประเภท',
  `bought_at` date DEFAULT NULL COMMENT 'วันที่ซื้อ',
  `warrant_at` date DEFAULT NULL COMMENT 'วันที่หมดประกัน',
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` int(11) DEFAULT NULL COMMENT 'ปรับปรุงเมื่อ',
  `updated_by` int(11) DEFAULT NULL COMMENT 'แก้ไขโดย',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of material
-- ----------------------------

-- ----------------------------
-- Table structure for `material_type`
-- ----------------------------
DROP TABLE IF EXISTS `material_type`;
CREATE TABLE `material_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภท',
  `title` varchar(255) DEFAULT NULL COMMENT 'ชื่อประเภท',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of material_type
-- ----------------------------

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเมนู',
  `menu_category_id` int(11) DEFAULT NULL COMMENT 'รหัสหมวดเมนู',
  `parent_id` int(11) DEFAULT NULL COMMENT 'ภายใต้เมนู',
  `title` varchar(200) NOT NULL COMMENT 'ชื่อเมนู',
  `router` varchar(250) NOT NULL COMMENT 'ลิงค์',
  `parameter` varchar(250) DEFAULT NULL COMMENT 'พารามิเตอร์',
  `icon` varchar(30) DEFAULT NULL COMMENT 'ไอคอน',
  `status` enum('2','1','0') DEFAULT '0' COMMENT 'สถานะ',
  `item_name` varchar(64) DEFAULT NULL COMMENT 'บทบาท',
  `target` varchar(30) DEFAULT NULL COMMENT 'เป้าหมาย',
  `protocol` varchar(20) DEFAULT NULL COMMENT 'โปรโตคอล',
  `home` enum('1','0') DEFAULT '0' COMMENT 'หน้าแรก',
  `sort` int(3) DEFAULT NULL COMMENT 'เรียง',
  `language` varchar(7) DEFAULT '*' COMMENT 'ภาษา',
  `params` mediumtext COMMENT 'ลักษณะพิเศษ',
  `assoc` varchar(12) DEFAULT NULL COMMENT 'ชุดเมนู',
  `created_at` int(11) DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `created_by` int(11) DEFAULT NULL COMMENT 'สร้างโดย',
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `menu_cate_id` (`menu_category_id`) USING BTREE,
  KEY `menu_parent` (`parent_id`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`menu_category_id`) REFERENCES `menu_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='ระบบเมนู';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('33', null, null, '', '', null, null, '0', null, null, null, '0', null, '*', null, null, null, null, 'หน้าแรก', null, '/site/index', null, null);

-- ----------------------------
-- Table structure for `menu_auth`
-- ----------------------------
DROP TABLE IF EXISTS `menu_auth`;
CREATE TABLE `menu_auth` (
  `menu_id` int(11) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  PRIMARY KEY (`menu_id`,`item_name`),
  CONSTRAINT `menu_auth_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu_auth
-- ----------------------------

-- ----------------------------
-- Table structure for `menu_category`
-- ----------------------------
DROP TABLE IF EXISTS `menu_category`;
CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหมวดเมนู',
  `title` varchar(50) NOT NULL COMMENT 'ชื่อหมวดเมนู',
  `discription` varchar(255) DEFAULT NULL COMMENT 'คำอธิบาย',
  `status` enum('1','0') DEFAULT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`id`),
  KEY `menu_cate_id` (`id`,`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='หมวดเมนู';

-- ----------------------------
-- Records of menu_category
-- ----------------------------

-- ----------------------------
-- Table structure for `migration`
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1472790233');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1473212850');
INSERT INTO `migration` VALUES ('m141022_115823_create_user_table', '1472790235');
INSERT INTO `migration` VALUES ('m141022_115912_create_rbac_tables', '1472790235');
INSERT INTO `migration` VALUES ('m141022_115922_create_session_table', '1472790235');
INSERT INTO `migration` VALUES ('m160425_081413_create_user_profile_table', '1473212885');

-- ----------------------------
-- Table structure for `notification`
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL COMMENT 'เรื่อง',
  `status` int(1) DEFAULT NULL COMMENT 'สถานะ',
  `detail` varchar(255) DEFAULT NULL COMMENT 'รายละเอียด',
  `router` varchar(255) DEFAULT NULL COMMENT 'เส้นทาง',
  `sented_at` int(11) DEFAULT NULL COMMENT 'ส่งเมื่อ',
  `sented_by` int(11) NOT NULL COMMENT 'ส่งโดย',
  `received_at` int(11) DEFAULT NULL COMMENT 'รับเมื่อ',
  `received_by` int(11) NOT NULL COMMENT 'อ่านโดย',
  PRIMARY KEY (`id`),
  KEY `notification_ibfk_1` (`sented_at`),
  KEY `notification_ibfk_2` (`received_at`),
  KEY `sented_by` (`sented_by`),
  KEY `received_by` (`received_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notification
-- ----------------------------

-- ----------------------------
-- Table structure for `person`
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `user_id` int(11) NOT NULL COMMENT 'User Id',
  `status` int(1) NOT NULL COMMENT 'Status',
  `position_id` int(11) NOT NULL COMMENT 'Position',
  `title_id` int(11) NOT NULL COMMENT 'Title',
  `phd` int(1) NOT NULL DEFAULT '0' COMMENT 'Ph.D',
  `firstname_th` varchar(100) NOT NULL COMMENT 'First name TH',
  `lastname_th` varchar(100) NOT NULL COMMENT 'Last name TH',
  `firstname_en` varchar(100) NOT NULL COMMENT 'First name EN',
  `lastname_en` varchar(100) NOT NULL COMMENT 'Last name EN',
  `created_at` int(11) NOT NULL COMMENT 'Created at',
  `updated_at` int(11) NOT NULL COMMENT 'Updated at',
  `created_by` int(11) NOT NULL COMMENT 'Created by',
  `updated_by` int(11) NOT NULL COMMENT 'Updated by',
  UNIQUE KEY `uid` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------

-- ----------------------------
-- Table structure for `session`
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `expire` int(11) NOT NULL,
  `data` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('3j4qovqbrum3o0h79nqbh010q3', '1473388535', 0x5F5F666C6173687C613A303A7B7D5F5F69647C693A313B);
INSERT INTO `session` VALUES ('ion9ai5d9qf2mcchmcsquqo6l5', '1473260755', 0x5F5F666C6173687C613A303A7B7D);
INSERT INTO `session` VALUES ('to5tfc9ef8d8eibikeiehetqc3', '1473100462', 0x5F5F666C6173687C613A303A7B7D5F5F72657475726E55726C7C733A31323A222F73752F6261636B656E642F223B5F5F69647C693A313B);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'UWU4pJF3teH4kvNJeP6RE2olINBduTWR', '$2y$13$MkHJJFqYy2lwqGDnYq4RuuQR8DcYt7JJgoNgn7LCPkreLYMVFUuKe', null, 'admin@localhost.local', '10', '1473214315', '1473214315');

-- ----------------------------
-- Table structure for `user_profile`
-- ----------------------------
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `avatar_offset` varchar(255) NOT NULL,
  `avatar_cropped` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `cover_offset` varchar(255) NOT NULL,
  `cover_cropped` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_profile
-- ----------------------------
INSERT INTO `user_profile` VALUES ('1', 'อาฮาหมัด', 'เจ๊ะดือราแม', '12.89-31.5-56.89-56.25', '32457cf77e4b1b3a_57cf77e4b03c9.jpg', '57cf77e4b03c9.jpg', '0-13.93-100-40.59', '35557cf789455e01_57cf789453308.jpg', '57cf789453308.jpg', '', null);
