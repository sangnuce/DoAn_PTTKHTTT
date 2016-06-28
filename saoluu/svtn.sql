SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `tbl_bangdiem`;
CREATE TABLE `tbl_bangdiem` (
  `matv` int(11) NOT NULL,
  `quaphongvan` tinyint(4) NOT NULL DEFAULT '0',
  `teamgame` tinyint(4) NOT NULL DEFAULT '0',
  `teamwork` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`matv`),
  CONSTRAINT `fk_thanhvien_bangdiem` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_bangdiem` VALUES
(116, 0, 0, 0),
(117, 0, 0, 0),
(118, 0, 0, 0),
(119, 0, 0, 0),
(122, 0, 0, 0),
(123, 0, 0, 0),
(124, 0, 0, 0),
(125, 0, 0, 0),
(126, 0, 0, 0);

DROP TABLE IF EXISTS `tbl_cauhoi`;
CREATE TABLE `tbl_cauhoi` (
  `mach` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` varchar(300) /*!40101 COLLATE utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY (`mach`)
) ENGINE=InnoDB AUTO_INCREMENT=5 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_cauhoi` VALUES
(1, 'Bạn đã có gấu chưa?'),
(2, 'Các sở thích, sở trường của bạn là gì?'),
(3, 'Là sinh viên, bạn suy nghĩ như thế nào về tầm quan trọng của 3 việc: Học tập - Tình yêu - Hoạt động xã hội');

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
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_chianhom` VALUES
(3, 53, 1, '2016-04-25'),
(4, 56, 1, '2016-06-28'),
(4, 64, 0, '2016-06-27'),
(4, 68, 0, NULL),
(4, 72, 0, NULL),
(4, 88, 0, NULL),
(4, 91, 0, NULL),
(4, 92, 0, NULL),
(4, 97, 0, NULL),
(4, 99, 0, NULL),
(4, 100, 0, NULL),
(4, 103, 0, NULL),
(4, 106, 0, NULL),
(5, 65, 0, NULL),
(5, 67, 1, '2016-06-27'),
(5, 69, 0, NULL),
(5, 84, 0, NULL),
(5, 86, 0, NULL),
(5, 89, 0, NULL),
(5, 90, 0, NULL),
(5, 102, 0, NULL),
(5, 105, 0, NULL),
(5, 107, 0, NULL),
(5, 108, 0, NULL),
(5, 109, 0, NULL),
(6, 57, 1, '2016-06-27'),
(6, 58, 0, NULL),
(6, 66, 0, NULL),
(6, 73, 0, NULL),
(6, 85, 0, NULL),
(6, 87, 0, NULL),
(6, 93, 0, NULL),
(6, 94, 0, NULL),
(6, 95, 0, '2016-06-27'),
(6, 96, 0, NULL),
(6, 98, 0, NULL),
(6, 101, 0, NULL),
(6, 104, 0, NULL);

DROP TABLE IF EXISTS `tbl_dkthoigianpv`;
CREATE TABLE `tbl_dkthoigianpv` (
  `matv` int(11) NOT NULL,
  `matg` int(11) NOT NULL,
  PRIMARY KEY (`matg`,`matv`),
  KEY `fk_thanhvien_dangky` (`matv`),
  CONSTRAINT `fk_thanhvien_dangky` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_thoigian_dangky` FOREIGN KEY (`matg`) REFERENCES `tbl_thoigianpv` (`matg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_dkthoigianpv` VALUES
(110, 7),
(111, 7),
(112, 7),
(113, 12),
(114, 10),
(115, 9),
(116, 10),
(117, 9),
(118, 10),
(119, 9),
(120, 12),
(121, 10),
(122, 9),
(123, 12),
(124, 9),
(125, 10),
(126, 12),
(127, 10);

DROP TABLE IF EXISTS `tbl_hoatdong`;
CREATE TABLE `tbl_hoatdong` (
  `mahd` int(11) NOT NULL AUTO_INCREMENT,
  `tenhd` varchar(500) /*!40101 COLLATE utf8_unicode_ci */ NOT NULL,
  `tgbatdau` datetime NOT NULL,
  `tgketthuc` datetime NOT NULL,
  `songuoi` int(11) NOT NULL DEFAULT '0',
  `diadiem` text /*!40101 COLLATE utf8_unicode_ci */,
  PRIMARY KEY (`mahd`)
) ENGINE=InnoDB AUTO_INCREMENT=18 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_hoatdong` VALUES
(14, 'Giọt Hồng Xây Dựng 2016', '2016-06-24 07:00:00', '2016-06-24 18:00:00', 20, 'Trường Đại học Xây Dựng'),
(16, 'Chào khóa 61', '2016-09-04 07:00:00', '2016-09-04 17:30:00', 25, 'Hội trường G3'),
(17, 'XÂY DỰNG TINH THẦN THẦN THANH NIÊN TRONG THÁNG THANH NIÊN', '2016-03-25 08:00:00', '2016-03-25 11:30:00', 15, 'SÂN TRƯỜNG ĐHXD');

DROP TABLE IF EXISTS `tbl_nhiemvu`;
CREATE TABLE `tbl_nhiemvu` (
  `manv` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` text /*!40101 COLLATE utf8_unicode_ci */ NOT NULL,
  `mahd` int(11) NOT NULL,
  PRIMARY KEY (`manv`),
  KEY `fk_hoatdong_nhiemvu` (`mahd`),
  CONSTRAINT `fk_hoatdong_nhiemvu` FOREIGN KEY (`mahd`) REFERENCES `tbl_hoatdong` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_nhiemvu` VALUES
(2, 'Hỗ trợ khu vực sau hiến máu', 14),
(3, 'Hỗ trợ khu vực phát quà', 14),
(8, 'Hỗ trợ khu vực nhận trả phiếu', 14),
(9, 'PHỤC VỤ SÂN KHẤU', 17),
(10, 'HỖ TRỢ PHỤC TRANG', 17),
(11, 'HẬU CẦN', 17),
(12, 'AN NINH- TRẬT TỰ', 17),
(13, 'Hỗ trợ dựng sân khấu', 16),
(14, 'Hỗ trợ phân chia chỗ ngồi', 16),
(15, 'Chuẩn bị tiết mục văn nghê', 16);

DROP TABLE IF EXISTS `tbl_nhomtv`;
CREATE TABLE `tbl_nhomtv` (
  `manhom` int(11) NOT NULL AUTO_INCREMENT,
  `tennhom` varchar(50) /*!40101 COLLATE utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY (`manhom`)
) ENGINE=InnoDB AUTO_INCREMENT=8 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_nhomtv` VALUES
(4, 'Nhóm 1'),
(5, 'Nhóm 2'),
(6, 'Nhóm 3');

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
) ENGINE=InnoDB AUTO_INCREMENT=57 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_phancong` VALUES
(3, 65, 14, 2, '2016-06-26 11:22:00', '0000-00-00 00:00:00'),
(5, 64, 14, 2, '1016-06-24 13:00:00', '2196-06-24 17:00:00'),
(6, 65, 14, 3, '2016-06-04 12:01:00', '0000-00-00 00:00:00'),
(7, 66, 14, 8, '2016-06-25 07:00:00', '0000-00-00 00:00:00'),
(8, 56, 14, 8, '2016-06-26 12:30:00', '2016-06-26 15:30:00'),
(9, 68, 14, NULL, NULL, NULL),
(10, 88, 14, NULL, NULL, NULL),
(11, 92, 14, NULL, NULL, NULL),
(12, 72, 14, 8, '2016-06-24 10:00:00', '0000-00-00 00:00:00'),
(13, 69, 14, 8, '2016-06-26 11:00:00', '0000-00-00 00:00:00'),
(14, 86, 14, NULL, NULL, NULL),
(15, 91, 14, NULL, NULL, NULL),
(16, 102, 14, NULL, NULL, NULL),
(17, 94, 14, NULL, NULL, NULL),
(18, 87, 14, NULL, NULL, NULL),
(19, 93, 14, NULL, NULL, NULL),
(20, 93, 14, NULL, NULL, NULL),
(21, 96, 14, NULL, NULL, NULL),
(22, 101, 14, NULL, NULL, NULL),
(23, 57, 14, 2, '2016-06-24 08:00:00', '0000-00-00 00:00:00'),
(24, 107, 14, NULL, NULL, NULL),
(25, 104, 14, NULL, NULL, NULL),
(26, 108, 14, NULL, NULL, NULL),
(27, 109, 14, NULL, NULL, NULL),
(28, 97, 14, NULL, NULL, NULL),
(29, 100, 14, NULL, NULL, NULL),
(30, 106, 14, NULL, NULL, NULL),
(31, 99, 14, 2, '2016-06-26 15:00:00', '0000-00-00 00:00:00'),
(32, 67, 14, 2, '2016-06-24 21:30:00', '0000-00-00 00:00:00'),
(33, 90, 14, NULL, NULL, NULL),
(34, 58, 14, 3, '2016-06-25 15:30:00', '0000-00-00 00:00:00'),
(35, 85, 14, NULL, NULL, NULL),
(36, 89, 14, NULL, NULL, NULL),
(37, 84, 14, 3, '2016-06-24 14:20:00', '0000-00-00 00:00:00'),
(38, 64, 14, 3, '2016-06-25 16:30:00', '0000-00-00 00:00:00'),
(39, 56, 17, 9, '2016-03-25 07:00:00', '0000-00-00 00:00:00'),
(40, 68, 17, NULL, NULL, NULL),
(41, 64, 17, NULL, NULL, NULL),
(42, 72, 17, NULL, NULL, NULL),
(43, 88, 17, NULL, NULL, NULL),
(44, 91, 17, NULL, NULL, NULL),
(45, 92, 17, NULL, NULL, NULL),
(46, 97, 17, NULL, NULL, NULL),
(47, 99, 17, NULL, NULL, NULL),
(48, 100, 17, NULL, NULL, NULL),
(49, 103, 17, NULL, NULL, NULL),
(50, 103, 17, NULL, NULL, NULL),
(51, 106, 17, NULL, NULL, NULL),
(52, 64, 16, NULL, NULL, NULL),
(53, 68, 16, NULL, NULL, NULL),
(54, 88, 16, NULL, NULL, NULL),
(55, 72, 16, NULL, NULL, NULL),
(56, 91, 16, NULL, NULL, NULL);

DROP TABLE IF EXISTS `tbl_taikhoan`;
CREATE TABLE `tbl_taikhoan` (
  `matv` int(11) NOT NULL,
  `matkhau` varchar(50) /*!40101 COLLATE utf8_unicode_ci */ NOT NULL,
  PRIMARY KEY (`matv`),
  CONSTRAINT `fk_thanhvien_taikhoan` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_taikhoan` VALUES
(50, '202cb962ac59075b964b07152d234b70'),
(56, '68cdd986e943ab5999976d996efa5ff4');

DROP TABLE IF EXISTS `tbl_thanhvien`;
CREATE TABLE `tbl_thanhvien` (
  `matv` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) /*!40101 COLLATE utf8_unicode_ci */ NOT NULL,
  `lop` varchar(10) /*!40101 COLLATE utf8_unicode_ci */ DEFAULT NULL,
  `mssv` varchar(10) /*!40101 COLLATE utf8_unicode_ci */ DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` tinyint(1) DEFAULT NULL,
  `quequan` varchar(100) /*!40101 COLLATE utf8_unicode_ci */ DEFAULT NULL,
  `diachi` text /*!40101 COLLATE utf8_unicode_ci */,
  `sdt` varchar(15) /*!40101 COLLATE utf8_unicode_ci */ DEFAULT NULL,
  `ngaygianhap` date DEFAULT NULL,
  `tinhtrang` tinyint(1) NOT NULL DEFAULT '0',
  `ladoitruong` tinyint(1) NOT NULL DEFAULT '0',
  `tgbatdau` date DEFAULT NULL,
  PRIMARY KEY (`matv`)
) ENGINE=InnoDB AUTO_INCREMENT=128 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_thanhvien` VALUES
(50, 'Sáng Béo', '58PM1', '15545558', '1995-08-26', 1, 'Hà Tĩnh', 'Hoàng Mai, Hà Nội', '0976481070', '2016-06-22', 1, 1, '2016-06-25'),
(53, 'Lương Văn Sáng', '58PM1', '15545558', '1995-08-26', 1, 'Hà Tĩnh', 'Hoàng Mai, Hà Nội', '09764810700', '2016-06-23', 1, 0, NULL),
(56, 'Cả Nga', '58PM1', '1525058', '1995-12-02', 0, 'Lương Tài, Bắc Ninh', 'đường Giáp Bát, Hoàng Mai, HN', '0977720295', '2016-06-26', 1, 0, NULL),
(57, 'Phạm Thị Hà', '59pm3', '1568859', '1996-07-11', 0, 'Thanh Hóa', 'Thanh Hóa', '0969725969', '2016-06-24', 1, 0, NULL),
(58, 'Vũ Thị Thu ', '57QD1', '360357', '1993-05-10', 0, 'Bắc Ninh', 'Ngõ Giáp Bát, Hoàng Mai, Hà Nội', '0982341615', '2016-06-24', 1, 0, NULL),
(64, 'Hoàng Thị Phương', '58pm1', '378058', '1995-01-10', 0, 'Thái Bình', 'Đông La- Đông Hưng - Thái Bình', '01689237730', '2016-06-26', 1, 0, NULL),
(65, 'Quỳnh Thảo My', '59PM1', '1524859', '1996-05-16', 0, 'Bà Rịa Vũng Tàu', '281 Trương ĐỊnh Hoàng Mai Hà Nnội', '0165893254', '2016-06-24', 1, 0, NULL),
(66, 'Nguyễn Như Mai', '58PM1', '146058', '1995-02-06', 1, 'Yên Bái', '90 Tuệ Tĩnh - Văn Yên - Yên Bái', '0293834070', '2016-06-26', 1, 0, NULL),
(67, 'phạm thị thu thùy', '58pm1', '1528958', '1995-06-21', 0, 'Hưng Yên', '199 đông thành, quang trung, hưng yên', '01639318893', '2016-06-26', 1, 0, NULL),
(68, 'Nguyễn Viết Quân', '60PM1', '212360', '1997-04-17', 1, 'Nam Định', '', '0943447204', '2016-06-26', 1, 0, NULL),
(69, 'Chu Thị Hương', '58th2', '3542058', '1995-09-01', 0, 'Bắc Giang', 'Phương Mai_Đống Đa', '0961098374', '2016-06-27', 1, 0, NULL),
(72, 'Đinh Thị Dược', '58PM1', '1542158', '1994-03-01', 1, 'Quỳnh Bảo, Quỳnh Phụ , Thái Bình', 'Quỳnh Bảo, Quỳnh Phụ , Thái Bình', '0941934612', '2016-06-27', 1, 0, NULL),
(73, 'Vũ Tuyên ', '57PM3', '123456', '1995-03-01', 1, 'Hà Nội', 'Hà Nội', '12345667dg', '2016-06-27', 1, 0, NULL),
(84, 'Nam', '59VL2', '123459', '1996-05-11', 1, 'Hà Nam', 'Cầu Giấy', '0123456790', '2016-06-27', 1, 0, NULL),
(85, 'Lưu Công Đông', '58PM1', '1234558', '1995-02-23', 1, 'Nam Định', 'CẦU GỖ', '0192847523', '2016-06-27', 1, 0, NULL),
(86, 'Mai Thị Lan Anh', '58PM2', '1527258', '1995-06-08', 0, 'Hải Dương', 'Trương Định', '01649034508', '2016-06-27', 1, 0, NULL),
(87, 'Phạm Thị Thu Thùy', '58PM1', '1542358', '1995-05-22', 0, 'Hưng Yên', 'Trương Định', '0128967367', '2016-06-27', 1, 0, NULL),
(88, 'Lưu Đình Thi', '58PM1', '1542358', '1995-10-10', 1, 'Thái Bình', 'Giải Phóng', '01642353698', '2016-06-27', 1, 0, NULL),
(89, 'Hoàng Thị Thu Thi', '58PM2', '369858', '1995-05-14', 0, 'Nam Định', 'Hoàng Diệu', '0194757622', '2016-06-27', 1, 0, NULL),
(90, 'Hoàng Thị Phương', '58PM1', '234558', '1995-01-10', 0, 'THÁI BÌNH', 'TRƯƠNG ĐỊNH', '0145727149', '2016-06-27', 1, 0, NULL),
(91, 'Đào Thị Thu', '58PM1', '1543258', '1995-10-07', 0, 'THÁI BÌNH', 'PHÙNG KHOANG', '096665725', '2016-06-27', 1, 0, NULL),
(92, 'Đỗ Thùy Dung', '58PM2', '1542858', '1995-04-03', 0, 'THÁI BÌNH', 'BẠCH MAI', '0977155875', '2016-06-27', 1, 0, NULL),
(93, 'Nguyễn Thị Tươi', '58PM2', '1517158', '1995-04-10', 0, 'HÀ TÂY', '72 TRẦN ĐẠI NGHĨA', '0941934730', '2016-06-27', 1, 0, NULL),
(94, 'Hoàng Thị Thu Hằng', '59TH2', '523459', '1995-05-05', 0, 'Nam Định', '72 TRẦN ĐẠI NGHĨA', '094761651', '2016-06-27', 1, 0, NULL),
(95, 'Lãnh Thị Minh Thư', 'KV28', '123428', '1996-02-05', 0, 'Cao Bằng', '72 TRẦN ĐẠI NGHĨA', '093166511', '2016-06-27', 1, 0, NULL),
(96, 'LÝ THỊ VIÊN', 'KV28', '675428', '1997-06-10', 0, 'CAO BẰNG', '72 TRẦN ĐẠI NGHĨA', '0941934615', '2016-06-27', 1, 0, NULL),
(97, 'CÀ THỊ THƯƠNG', 'KV28', '656328', '1996-02-01', 0, 'ĐIỆN BIÊN', '72 TRẦN ĐẠI NGHĨA', '091946411', '2016-06-27', 1, 0, NULL),
(98, 'ĐÀM CÔNG LÝ', '57KT', '172657', '1994-09-04', 0, 'THÁI NGUYÊN', '72 TRẦN ĐẠI NGHĨA', '0938166421', '2016-06-27', 1, 0, NULL),
(99, 'NGUYỄN THỊ KHÁNH', '59KT3', '637659', '1996-06-04', 0, 'BẮC GIANG', '72 TRẦN ĐẠI NGHĨA', '0184765292', '2016-06-27', 1, 0, NULL),
(100, 'CÔNG', '57VL2', '187357', '1993-03-01', 1, 'NGHỆ AN', 'CẦU SẮT', '092654415', '2016-06-27', 1, 0, NULL),
(101, 'THÀNH', '57CDE', '1983857', '1994-06-09', 1, 'SƠN LA', 'CẦU THÉP', '084676213', '2016-06-27', 1, 0, NULL),
(102, 'DANH', '58XE', '8273658', '1995-09-19', 1, 'HÀ GIANG', 'CẦU NHÔM', '091938741', '2016-06-27', 1, 0, NULL),
(103, 'TOẠI', '58TH1', '8736158', '1994-12-09', 1, 'LÀO CAI', 'CẦU THỦY NGÂN', '0193864134', '2016-06-27', 1, 0, NULL),
(104, 'LONG', '57XF', '0824557', '1994-09-09', 1, 'HÀ TĨNH', 'CẦU HIDRO', '0193771641', '2016-06-27', 1, 0, NULL),
(105, 'MẠNH', '58TH2', '1983758', '1995-08-09', 1, 'HÀ NỘI', 'NỘI BÀI', '092476571', '2016-06-27', 1, 0, NULL),
(106, 'Nguyễn Nhật Ninh', '58XD9', '2746758', '1995-09-16', 1, 'HÀ NỘI', 'LONG BIÊN', '0887147556', '2016-06-27', 1, 0, NULL),
(107, 'TƯỜNG', '58XD2', '1398858', '1995-08-15', 1, 'THỪA THIÊN-HUẾ', 'NGUYỄN TRÃI', '0289472565', '2016-06-27', 1, 0, NULL),
(108, 'Hùng', '57BDS', '2948757', '1994-07-06', 1, 'LẠNG SƠN', 'LÊ THANH NGHỊ', '0947186541', '2016-06-27', 1, 0, NULL),
(109, 'DUY', '60DT', '1093860', '1997-09-05', 1, 'LÀO CAI', 'BẠCH MAI', '019376155', '2016-06-27', 1, 0, NULL),
(110, 'Minh', '58CG2', '122358', '1995-08-08', 1, 'Ở BỂN', 'GẦM CẦU', '0189374513', '2016-06-28', 0, 0, NULL),
(111, 'Ngọc', '57KG2', '1837457', '1993-04-05', 0, 'HƯNG YÊN', 'HÀ NỘI', '0183681541', '2016-06-28', 0, 0, NULL),
(112, 'Đường', '58CB2', '917458', '1995-09-16', 1, 'BULGARIA', 'LONG BIEN\'S CITY', '0186561743', '2016-06-28', 0, 0, NULL),
(113, 'Dũng', '56VL2', '847456', '1992-08-11', 1, 'NAM ĐỊNH', 'NGỌC HỒI', '092861541', '2016-06-28', 0, 0, NULL),
(114, 'Đan', 'Trường ngo', '', '1997-06-05', 0, 'Thái Nguyên', 'NGUYỄN TRÃI', '0193864232', '2016-06-28', 0, 0, NULL),
(115, 'LCD', 'Ko có', 'ko có', '0000-00-00', 1, '01481864', 'BÃI CÁT', '20488611', '2016-06-28', 0, 0, NULL),
(116, 'Tiên Chi', 'ĐẠI HỌC NÔ', '', '0000-00-00', 0, 'LẠNG SƠN', '', '0167823864', '2016-06-28', 1, 0, NULL),
(117, 'MINH HẰNG', 'ĐẠI HỌC HÀ', '', '1994-07-15', 1, 'THANH HÓA', 'NGUYỄN TRÃI', '0913864651', '2016-06-28', 1, 0, NULL),
(118, 'Tim Cát Vũ', 'Đại học Sâ', '', '1989-03-14', 1, 'Long An', 'Hà Nội', '019389164', '2016-06-28', 1, 0, NULL),
(119, 'Trương Quỳnh Anh', 'KV24', '123424', '1996-09-19', 0, 'HÀ NỘI', 'HÀ NỘI', '0194763611', '2016-06-28', 1, 0, NULL),
(120, 'SEUNG GI', '58CB2', '', '0000-00-00', 1, 'HÀN XẺNG', 'HÀ NỘI', '019398961', '2016-06-28', 0, 0, NULL),
(121, 'Họ và tên', '55HH', '152435', '1993-12-12', 1, 'Nô', 'Nô', '0987879786', '2016-06-28', 0, 0, NULL),
(122, 'NGUYỄN THỊ NGÂN TRANG', 'HV NN', '123457', '1994-08-28', 0, 'HÀ TÂY', 'LONG BIÊN', '01648293991', '2016-06-28', 1, 0, NULL),
(123, 'NGÔ KIẾN HUY', 'ĐẠI HỌC HÁ', '', '1988-04-12', 1, 'BÌNH YÊN', 'LẠNH LÙNG', '019368157', '2016-06-28', 1, 0, NULL),
(124, 'Đông Nhi', 'HỌC VIỆN N', '', '1988-07-15', 0, 'Xa Lắc', 'Mù Khơi', '0149718541', '2016-06-28', 1, 0, NULL),
(125, 'Tiêu Hạ My', '60KD', '130560', '1998-06-04', 0, 'Đồng Nai', 'Giải phóng', '0123456897', '2016-06-28', 1, 0, NULL),
(126, 'Nguyễn Văn Minh', '59MN1', '172359', '1997-12-06', 1, 'Hà Nội', 'Bà Triệu, Hoàn Kiếm', '0123456789', '2016-06-28', 1, 0, NULL),
(127, 'Selena Gomez', '58Pm2', '152458', '1995-07-16', 0, 'Nước ngoài', 'Hà Nội', '0133579546', '2016-06-28', 0, 0, NULL);

DROP TABLE IF EXISTS `tbl_thoigianpv`;
CREATE TABLE `tbl_thoigianpv` (
  `matg` int(11) NOT NULL AUTO_INCREMENT,
  `sangchieu` tinyint(4) NOT NULL,
  `ngay` date NOT NULL,
  PRIMARY KEY (`matg`)
) ENGINE=InnoDB AUTO_INCREMENT=13 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_thoigianpv` VALUES
(7, 0, '2016-07-02'),
(9, 1, '2016-07-02'),
(10, 0, '2016-07-03'),
(12, 1, '2016-07-03');

DROP TABLE IF EXISTS `tbl_traloi`;
CREATE TABLE `tbl_traloi` (
  `matv` int(11) NOT NULL,
  `mach` int(11) NOT NULL AUTO_INCREMENT,
  `traloi` varchar(5000) /*!40101 COLLATE utf8_unicode_ci */ DEFAULT '',
  PRIMARY KEY (`mach`,`matv`),
  KEY `fk_thanhvien_traloi` (`matv`),
  CONSTRAINT `fk_cauhoi_traloi` FOREIGN KEY (`mach`) REFERENCES `tbl_cauhoi` (`mach`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_thanhvien_traloi` FOREIGN KEY (`matv`) REFERENCES `tbl_thanhvien` (`matv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_traloi` VALUES
(110, 1, 'NHIỀU LẮM RỒI'),
(111, 1, 'CHƯA'),
(112, 1, 'I DONT\'T KNOW'),
(113, 1, 'CHƯA'),
(114, 1, 'RỒI'),
(115, 1, 'CÓ BẠN TRAI'),
(116, 1, 'CHƯA'),
(117, 1, 'CHƯA\r\n'),
(118, 1, 'Đã có vợ'),
(119, 1, 'RỒI'),
(120, 1, 'ĐÃ TỪNG, NHIỀU LẮM'),
(121, 1, 'Nô'),
(122, 1, 'RỒI'),
(123, 1, 'XẤU TRAI NÊN KO CÓ'),
(124, 1, 'RỒI'),
(125, 1, 'Chưa ạ'),
(126, 1, 'Có 2 gấu'),
(127, 1, 'rồi'),
(110, 2, 'ĐÁNH NHAU'),
(111, 2, 'CHƠI GUITAR, HÁT MÚA'),
(112, 2, 'I DON\'T HAVE ANYTHING'),
(113, 2, 'ĐÁ BÓNG, BÓNG RỔ'),
(114, 2, 'MC, CA HÁT'),
(115, 2, 'CHỌC GẬY BÁNH XE\r\nNÉM ĐÁ GIẤU TAY'),
(116, 2, 'ĐÁ CẦU, SHOPPING'),
(117, 2, 'HỌC TIẾNG ANH, CHÉM GIÓ'),
(118, 2, 'Hát hò'),
(119, 2, 'ĐÁNH QUAY, ĐÁNH CÙ'),
(120, 2, 'ĂN ỐC NÓI MÒ\r\nXỎ LÁ BA QUE'),
(121, 2, 'Nô'),
(122, 2, 'ĐÁ BÓNG, XEM BÓNG ĐÁ'),
(123, 2, 'ĂN ỐC NÓI MÒ\r\nTRÊU GÁI'),
(124, 2, 'KO CÓ'),
(125, 2, 'Đi du lịch, hát hò, tung tăng'),
(126, 2, 'Đẹp trai'),
(127, 2, 'vẽ'),
(110, 3, 'KO BIẾT GÌ VỀ 3 CÁI NÀY'),
(111, 3, 'THEO MÌNH 1 SINH VIÊN TIÊU BIỂU CẦN CÓ 3 ĐIỀU NÀY ĐI KÈM'),
(112, 3, 'I DON\'T UNDERSTAND WHAT YOU MEAN'),
(113, 3, 'RẤT QUAN TRỌNG'),
(114, 3, 'THEO MÌNH THÌ NÓ VÔ CÙNG QUAN TRỌNG'),
(115, 3, 'YÊU LÀ NGHỈ HỌC\r\nHOẠT ĐỘNG XÃ HỘI LÀ HỌC DỐT\r\nHỌC KHÔNG YÊU MẤT TUỔI TRẺ'),
(116, 3, 'THEO MÌNH CUỘC ĐỜI SINH VIÊN SẼ VẸN TOÀN HƠN NẾU CÓ ĐẦY DỦ CẢ 3 YẾU TỐ TRÊN'),
(117, 3, 'VÔ CÙNG MẬT THIẾT'),
(118, 3, 'Mình đăng ký chơi thôi ^^'),
(119, 3, 'VÔ CÙNG QUAN TRỌNG VỚI MỖI CUỘC ĐỜI SINH VIÊN'),
(120, 3, 'Mừn hông biếc chi đâuuuu'),
(121, 3, 'Nô'),
(122, 3, 'VÔ CÙNG QUAN TRỌNG VỚI MỖI SINH VIÊN'),
(123, 3, 'ỪM, CŨNG QUAN TRỌNG ĐẤY'),
(124, 3, 'KO BIẾT'),
(125, 3, 'Tiêu chí của em là: Ăn tranh thủ, ngủ khẩn trương, học bình thường, chơi là chính'),
(126, 3, 'Vô cùng quan trọng'),
(127, 3, 'vô cùng quan trọng');

DROP TABLE IF EXISTS `tbl_tuyentv`;
CREATE TABLE `tbl_tuyentv` (
  `thuoctinh` varchar(20) /*!40101 COLLATE utf8_unicode_ci */ NOT NULL,
  `giatri` varchar(100) /*!40101 COLLATE utf8_unicode_ci */ DEFAULT '',
  PRIMARY KEY (`thuoctinh`)
) ENGINE=InnoDB /*!40101 DEFAULT CHARSET=utf8 */ /*!40101 COLLATE=utf8_unicode_ci */;

INSERT INTO `tbl_tuyentv` VALUES
('nhandon', '1');

