/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : svtn

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-06-26 18:09:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_bangdiem
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bangdiem`;
CREATE TABLE `tbl_bangdiem` (
  `matv` int(11) NOT NULL,
  `quaphongvan` tinyint(4) NOT NULL DEFAULT '0',
  `teamgame` tinyint(4) NOT NULL DEFAULT '0',
  `teamwork` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`matv`),
  CONSTRAINT `fk_thanhvien_bangdiem` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_bangdiem
-- ----------------------------
INSERT INTO `tbl_bangdiem` VALUES ('69', '0', '0', '0');
INSERT INTO `tbl_bangdiem` VALUES ('72', '0', '0', '0');

-- ----------------------------
-- Table structure for tbl_cauhoi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cauhoi`;
CREATE TABLE `tbl_cauhoi` (
  `mach` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mach`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_cauhoi
-- ----------------------------
INSERT INTO `tbl_cauhoi` VALUES ('1', 'Bạn đã từng tham gia các tổ chức tình nguyện nào?');
INSERT INTO `tbl_cauhoi` VALUES ('2', 'Các sở thích, sở trường của bạn là gì?');
INSERT INTO `tbl_cauhoi` VALUES ('3', 'Là sinh viên, bạn suy nghĩ như thế nào về tầm quan trọng của 3 việc: Học tập - Tình yêu - Hoạt động xã hội');

-- ----------------------------
-- Table structure for tbl_chianhom
-- ----------------------------
DROP TABLE IF EXISTS `tbl_chianhom`;
CREATE TABLE `tbl_chianhom` (
  `manhom` int(11) NOT NULL,
  `matv` int(11) NOT NULL,
  `lanhomtruong` tinyint(1) NOT NULL DEFAULT '0',
  `tgbatdau` date DEFAULT NULL,
  PRIMARY KEY (`manhom`,`matv`),
  KEY `fk_thanhvien_chianhom` (`matv`),
  CONSTRAINT `fk_nhom_chianhom` FOREIGN KEY (`manhom`) REFERENCES `tbl_nhomtv` (`manhom`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_thanhvien_chianhom` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_chianhom
-- ----------------------------
INSERT INTO `tbl_chianhom` VALUES ('4', '63', '1', '2016-06-26');
INSERT INTO `tbl_chianhom` VALUES ('4', '64', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('4', '71', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('5', '53', '1', '2016-06-26');
INSERT INTO `tbl_chianhom` VALUES ('5', '65', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('5', '66', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('5', '67', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('5', '78', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('6', '57', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('6', '58', '0', null);
INSERT INTO `tbl_chianhom` VALUES ('6', '68', '1', '2016-06-26');

-- ----------------------------
-- Table structure for tbl_dkthoigianpv
-- ----------------------------
DROP TABLE IF EXISTS `tbl_dkthoigianpv`;
CREATE TABLE `tbl_dkthoigianpv` (
  `matv` int(11) NOT NULL,
  `matg` int(11) NOT NULL,
  PRIMARY KEY (`matg`,`matv`),
  KEY `fk_thanhvien_dangky` (`matv`),
  CONSTRAINT `fk_thanhvien_dangky` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_thoigian_dangky` FOREIGN KEY (`matg`) REFERENCES `tbl_thoigianpv` (`matg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_dkthoigianpv
-- ----------------------------
INSERT INTO `tbl_dkthoigianpv` VALUES ('50', '4');
INSERT INTO `tbl_dkthoigianpv` VALUES ('56', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('64', '6');
INSERT INTO `tbl_dkthoigianpv` VALUES ('66', '6');
INSERT INTO `tbl_dkthoigianpv` VALUES ('67', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('68', '4');
INSERT INTO `tbl_dkthoigianpv` VALUES ('69', '6');
INSERT INTO `tbl_dkthoigianpv` VALUES ('71', '5');
INSERT INTO `tbl_dkthoigianpv` VALUES ('72', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('73', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('74', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('75', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('76', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('77', '1');
INSERT INTO `tbl_dkthoigianpv` VALUES ('79', '1');

-- ----------------------------
-- Table structure for tbl_hoatdong
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hoatdong`;
CREATE TABLE `tbl_hoatdong` (
  `mahd` int(11) NOT NULL AUTO_INCREMENT,
  `tenhd` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `tgbatdau` datetime NOT NULL,
  `tgketthuc` datetime NOT NULL,
  `songuoi` int(11) NOT NULL DEFAULT '0',
  `diadiem` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`mahd`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_hoatdong
-- ----------------------------
INSERT INTO `tbl_hoatdong` VALUES ('14', 'Giọt Hồng Xây Dựng 2016', '2016-06-24 07:00:00', '2016-06-24 18:00:00', '20', 'Trường Đại học Xây Dựng');
INSERT INTO `tbl_hoatdong` VALUES ('15', 'Hỗ trợ tân sinh viên nhập học 2016', '2016-09-04 07:00:00', '2016-09-06 18:00:00', '30', 'Trường Đại học Xây Dựng');

-- ----------------------------
-- Table structure for tbl_nhiemvu
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nhiemvu`;
CREATE TABLE `tbl_nhiemvu` (
  `manv` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `mahd` int(11) NOT NULL,
  PRIMARY KEY (`manv`),
  KEY `fk_hoatdong_nhiemvu` (`mahd`),
  CONSTRAINT `fk_hoatdong_nhiemvu` FOREIGN KEY (`mahd`) REFERENCES `tbl_hoatdong` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_nhiemvu
-- ----------------------------
INSERT INTO `tbl_nhiemvu` VALUES ('2', 'Hỗ trợ khu vực sau hiến máu', '14');
INSERT INTO `tbl_nhiemvu` VALUES ('3', 'Hỗ trợ khu vực phát quà', '14');
INSERT INTO `tbl_nhiemvu` VALUES ('4', 'Hỗ trợ khu vực nhận trả phiếu', '14');
INSERT INTO `tbl_nhiemvu` VALUES ('5', 'Hỗ trợ khu vực sơ đồ nhập học', '15');
INSERT INTO `tbl_nhiemvu` VALUES ('6', 'Hỗ trợ khu vực nhận hồ sơ', '15');
INSERT INTO `tbl_nhiemvu` VALUES ('7', 'Hỗ trợ khu vực vào làm thủ tục', '15');
INSERT INTO `tbl_nhiemvu` VALUES ('8', 'Hỗ trợ khu vực đoàn đội, nội trú', '15');

-- ----------------------------
-- Table structure for tbl_nhomtv
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nhomtv`;
CREATE TABLE `tbl_nhomtv` (
  `manhom` int(11) NOT NULL AUTO_INCREMENT,
  `tennhom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manhom`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_nhomtv
-- ----------------------------
INSERT INTO `tbl_nhomtv` VALUES ('4', 'Nhóm 1');
INSERT INTO `tbl_nhomtv` VALUES ('5', 'Nhóm 2');
INSERT INTO `tbl_nhomtv` VALUES ('6', 'Nhóm 3');

-- ----------------------------
-- Table structure for tbl_phancong
-- ----------------------------
DROP TABLE IF EXISTS `tbl_phancong`;
CREATE TABLE `tbl_phancong` (
  `mapc` int(11) NOT NULL AUTO_INCREMENT,
  `matv` int(11) NOT NULL,
  `mahd` int(11) NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `tgbatdau` datetime DEFAULT NULL,
  `tgketthuc` datetime DEFAULT NULL,
  PRIMARY KEY (`mapc`),
  KEY `fk_thanhvien_phancong` (`matv`),
  KEY `fk_hoatdong_phancong` (`mahd`),
  KEY `fk_nhiemvu_phancong` (`manv`),
  CONSTRAINT `fk_hoatdong_phancong` FOREIGN KEY (`mahd`) REFERENCES `tbl_hoatdong` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nhiemvu_phancong` FOREIGN KEY (`manv`) REFERENCES `tbl_nhiemvu` (`manv`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_thanhvien_phancong` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_phancong
-- ----------------------------
INSERT INTO `tbl_phancong` VALUES ('1', '57', '14', '4', '2016-06-24 12:11:00', '2016-06-24 18:12:00');
INSERT INTO `tbl_phancong` VALUES ('3', '63', '15', null, null, null);
INSERT INTO `tbl_phancong` VALUES ('4', '64', '15', null, null, null);
INSERT INTO `tbl_phancong` VALUES ('6', '67', '15', null, null, null);
INSERT INTO `tbl_phancong` VALUES ('7', '66', '15', null, null, null);
INSERT INTO `tbl_phancong` VALUES ('8', '68', '15', null, null, null);
INSERT INTO `tbl_phancong` VALUES ('9', '57', '15', null, null, null);

-- ----------------------------
-- Table structure for tbl_taikhoan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_taikhoan`;
CREATE TABLE `tbl_taikhoan` (
  `matv` int(11) NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`matv`),
  CONSTRAINT `fk_thanhvien_taikhoan` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_taikhoan
-- ----------------------------
INSERT INTO `tbl_taikhoan` VALUES ('50', '202cb962ac59075b964b07152d234b70');

-- ----------------------------
-- Table structure for tbl_thanhvien
-- ----------------------------
DROP TABLE IF EXISTS `tbl_thanhvien`;
CREATE TABLE `tbl_thanhvien` (
  `matv` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lop` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mssv` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `quequan` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` text COLLATE utf8_unicode_ci,
  `sdt` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaygianhap` date DEFAULT NULL,
  `tinhtrang` tinyint(1) NOT NULL DEFAULT '0',
  `ladoitruong` tinyint(1) NOT NULL DEFAULT '0',
  `tgbatdau` date DEFAULT NULL,
  PRIMARY KEY (`matv`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_thanhvien
-- ----------------------------
INSERT INTO `tbl_thanhvien` VALUES ('50', 'Lương Văn Sáng', '58PM1', '15545558', '1995-08-26', '1', 'Hà Tĩnh', 'Hoàng Mai, Hà Nội', '0976481070', '2016-06-22', '1', '1', '2016-06-26');
INSERT INTO `tbl_thanhvien` VALUES ('53', 'Lương Văn Sáng', '58PM1', '15545558', '1995-08-26', '1', 'Hà Tĩnh', 'Hoàng Mai, Hà Nội', '09764810700', '2016-06-23', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('56', 'Nguyễn Thị Nga', '58PM1', '1525058', '1995-12-02', '0', 'Lương Tài, Bắc Ninh', 'đường Giáp Bát, Hoàng Mai, HN', '0977720295', '2016-06-26', '1', '1', '2016-06-26');
INSERT INTO `tbl_thanhvien` VALUES ('57', 'Phạm Thị Hà', '59PM3', '1568859', '1996-07-11', '0', 'Thanh Hóa', 'Thanh Hóa', '0969725969', '2016-06-24', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('58', 'Vũ Thị Thu ', '57QD1', '360357', '1993-05-10', '0', 'Bắc Ninh', 'Ngõ Giáp Bát, Hoàng Mai, Hà Nội', '0982341615', '2016-06-24', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('63', 'Nguyễn Thị Bích Phương', '', '', '1993-09-30', '0', 'Thanh Tuyền - Thanh Liêm - Hà Nam', 'số 100 ngõ 13 Lĩnh Nam Hoàng Mai - Hà Nội', '0989272247', '2016-06-24', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('64', 'Hoàng Thị Phương', '58pm1', '378058', '1995-01-10', '0', 'Thái Bình', 'Đông La- Đông Hưng - Thái Bình', '01689237730', '2016-06-26', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('65', 'Quỳnh Thảo My', '59PM1', '1524859', '1996-05-16', '0', 'Bà Rịa Vũng Tàu', '281 Trương ĐỊnh Hoàng Mai Hà Nnội', '0165893254', '2016-06-24', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('66', 'Nguyễn Như Mai', '58PM1', '146058', '1995-02-06', '1', 'Yên Bái', '90 Tuệ Tĩnh - Văn Yên - Yên Bái', '0293834070', '2016-06-26', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('67', 'phạm thị thu thùy', '58pm1', '1528958', '1995-06-21', '0', 'Hưng Yên', '199 đông thành, quang trung, hưng yên', '01639318893', '2016-06-26', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('68', 'Nguyễn Viết Quân', '60PM1', '212360', '1997-04-17', '1', 'Nam Định', '', '0943447204', '2016-06-26', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('69', 'Chu Thị Hương', '58th2', '3542058', '1995-09-01', '0', 'Bắc Giang', 'Phương Mai_Đống Đa', '0961098374', '2016-06-24', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('71', 'Sáng Béo Béo', '58PM1', '', '0000-00-00', '1', '', '', '097648107011', '2016-06-26', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('72', 'Đinh Thị Dược', '58PM1', '1542158', '1994-03-01', '1', 'Quỳnh Bảo, Quỳnh Phụ , Thái Bình', 'Quỳnh Bảo, Quỳnh Phụ , Thái Bình', '0941934612', '2016-06-24', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('73', 'Vũ Tuyên ', '57PM3', '123456', '1995-03-01', '1', 'Hà Nội', 'Hà Nội', '12345667dg', '2016-06-24', '0', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('74', 'Vũ Minh ', '57PM3', '123456', '1995-03-01', '1', 'Hà Nội', 'Hà Nội', '-473899', '2016-06-24', '0', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('75', 'Vũ Minh Anh', '57PM3', '123456anh', '1995-03-01', '1', 'Hà Nội', 'Hà Nội', '473899', '2016-06-24', '0', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('76', 'Minh Anh', '57PM3', '123456anh', '1995-03-01', '1', 'Hà Nội', 'Hà Nội', '4738995', '2016-06-24', '0', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('77', 'Minh Hoa', '60PM1', '1567209', '1995-03-01', '1', 'Hà Nội', 'Hà Nội', '568123', '2016-06-24', '0', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('78', 'Tươi xinh đẹp', 'Cư tê', '1517158', '1995-04-10', '1', 'Hà Tây xinh đẹp', '72 Trần Đại Nghĩa', '0941934730', '2016-06-26', '1', '0', null);
INSERT INTO `tbl_thanhvien` VALUES ('79', 'ẻgerr', '', '', '0000-00-00', '1', '', '', '0976481071', '2016-06-26', '0', '0', null);

-- ----------------------------
-- Table structure for tbl_thoigianpv
-- ----------------------------
DROP TABLE IF EXISTS `tbl_thoigianpv`;
CREATE TABLE `tbl_thoigianpv` (
  `matg` int(11) NOT NULL AUTO_INCREMENT,
  `sangchieu` tinyint(4) NOT NULL,
  `ngay` date NOT NULL,
  PRIMARY KEY (`matg`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_thoigianpv
-- ----------------------------
INSERT INTO `tbl_thoigianpv` VALUES ('1', '0', '2016-06-30');
INSERT INTO `tbl_thoigianpv` VALUES ('2', '1', '2016-06-30');
INSERT INTO `tbl_thoigianpv` VALUES ('3', '0', '2016-07-01');
INSERT INTO `tbl_thoigianpv` VALUES ('4', '1', '2016-07-01');
INSERT INTO `tbl_thoigianpv` VALUES ('5', '0', '2016-07-02');
INSERT INTO `tbl_thoigianpv` VALUES ('6', '1', '2016-07-02');

-- ----------------------------
-- Table structure for tbl_traloi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_traloi`;
CREATE TABLE `tbl_traloi` (
  `matv` int(11) NOT NULL,
  `mach` int(11) NOT NULL AUTO_INCREMENT,
  `traloi` varchar(5000) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`mach`,`matv`),
  KEY `fk_thanhvien_traloi` (`matv`),
  CONSTRAINT `fk_cauhoi_traloi` FOREIGN KEY (`mach`) REFERENCES `tbl_cauhoi` (`mach`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_thanhvien_traloi` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_traloi
-- ----------------------------
INSERT INTO `tbl_traloi` VALUES ('50', '1', '- Đội SVTN khoa CNTT');
INSERT INTO `tbl_traloi` VALUES ('56', '1', 'đội SVTN khoa CNTT');
INSERT INTO `tbl_traloi` VALUES ('64', '1', 'chưa');
INSERT INTO `tbl_traloi` VALUES ('66', '1', 'Đội TN Khoa Công Nghệ Thông Tin - Trường Đại Học Xây Dựng');
INSERT INTO `tbl_traloi` VALUES ('67', '1', 'đội sinh viên tình nguyện trường dhXD');
INSERT INTO `tbl_traloi` VALUES ('68', '1', 'Đội SVTN khoa CNTT');
INSERT INTO `tbl_traloi` VALUES ('69', '1', 'đội sinh viên tình nguyện khoa CNTT');
INSERT INTO `tbl_traloi` VALUES ('71', '1', 'adasd');
INSERT INTO `tbl_traloi` VALUES ('72', '1', 'Khoa Công nghệ thông tin ');
INSERT INTO `tbl_traloi` VALUES ('73', '1', 'CNTT');
INSERT INTO `tbl_traloi` VALUES ('74', '1', 'CNTT');
INSERT INTO `tbl_traloi` VALUES ('75', '1', 'CNTT');
INSERT INTO `tbl_traloi` VALUES ('76', '1', 'CNTT');
INSERT INTO `tbl_traloi` VALUES ('77', '1', 'CNTT');
INSERT INTO `tbl_traloi` VALUES ('79', '1', 'sdfsd');
INSERT INTO `tbl_traloi` VALUES ('50', '2', '- Nấu ăn\r\n- Ca hát');
INSERT INTO `tbl_traloi` VALUES ('56', '2', 'ăn, ngủ, đi phượt');
INSERT INTO `tbl_traloi` VALUES ('64', '2', 'đi chơi, nghe nhạc, xem phim');
INSERT INTO `tbl_traloi` VALUES ('66', '2', 'ăn phở KHÔNG HÀNH');
INSERT INTO `tbl_traloi` VALUES ('67', '2', 'hát');
INSERT INTO `tbl_traloi` VALUES ('68', '2', 'Đi du lịch, chơi bời');
INSERT INTO `tbl_traloi` VALUES ('69', '2', 'thích màu vàng, thích xem phim Việt Nam. \r\nSở trường: như nhà văn');
INSERT INTO `tbl_traloi` VALUES ('71', '2', 'wefwefwef');
INSERT INTO `tbl_traloi` VALUES ('72', '2', 'Sở thích : Phượt, khám phá\r\nSở trường : kiên trì nhẫn nại');
INSERT INTO `tbl_traloi` VALUES ('73', '2', 'Không có');
INSERT INTO `tbl_traloi` VALUES ('74', '2', 'ko có');
INSERT INTO `tbl_traloi` VALUES ('75', '2', 'ko có');
INSERT INTO `tbl_traloi` VALUES ('76', '2', 'ko có');
INSERT INTO `tbl_traloi` VALUES ('77', '2', 'ko có');
INSERT INTO `tbl_traloi` VALUES ('79', '2', 'sdsdf');
INSERT INTO `tbl_traloi` VALUES ('50', '3', '- Tất cả đều quan trọng');
INSERT INTO `tbl_traloi` VALUES ('56', '3', 'Học tập là 1');
INSERT INTO `tbl_traloi` VALUES ('64', '3', 'cả 3 đều quan trọng');
INSERT INTO `tbl_traloi` VALUES ('66', '3', 'quan trọng - thường thôi :)) - rất nên tham gia');
INSERT INTO `tbl_traloi` VALUES ('67', '3', 'cả 3 đều cần thiết, quan trọng và nên cân bằng');
INSERT INTO `tbl_traloi` VALUES ('68', '3', 'nó có mói liên hệ mật thiết với nhau');
INSERT INTO `tbl_traloi` VALUES ('69', '3', 'Mình nghĩ là 3 cái đấy rất quan trọng, bổ trợ cho nhau. Nhưng sinh viên quan trọng nhất vẫn là học tập. 2 điều còn lại giúp cho điều thứ nhất được hoàn thiện hơn');
INSERT INTO `tbl_traloi` VALUES ('71', '3', 'wefwefwef');
INSERT INTO `tbl_traloi` VALUES ('72', '3', 'Công việc không thể thiếu');
INSERT INTO `tbl_traloi` VALUES ('73', '3', 'Khá quan trọng');
INSERT INTO `tbl_traloi` VALUES ('74', '3', 'Khá quan trọng');
INSERT INTO `tbl_traloi` VALUES ('75', '3', 'Khá quan trọng');
INSERT INTO `tbl_traloi` VALUES ('76', '3', 'Khá quan trọng');
INSERT INTO `tbl_traloi` VALUES ('77', '3', 'Khá quan trọng');
INSERT INTO `tbl_traloi` VALUES ('79', '3', 'sdfsdf');

-- ----------------------------
-- Table structure for tbl_tuyentv
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tuyentv`;
CREATE TABLE `tbl_tuyentv` (
  `thuoctinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `giatri` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`thuoctinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_tuyentv
-- ----------------------------
INSERT INTO `tbl_tuyentv` VALUES ('nhandon', '1');
