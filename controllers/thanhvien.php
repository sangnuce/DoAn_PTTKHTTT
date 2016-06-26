<?php
$title = 'Danh sách thành viên';
$lib->checkLogin();
$strquery = "SELECT tbl_thanhvien.*, tbl_nhomtv.*, lanhomtruong
            FROM (tbl_chianhom RIGHT JOIN tbl_thanhvien ON tbl_chianhom.matv=tbl_thanhvien.matv)
            JOIN tbl_nhomtv ON tbl_chianhom.manhom = tbl_nhomtv.manhom
            WHERE tbl_chianhom.manhom IS NOT NULL OR ladoitruong=1";
$thanhvien = $lib->selectall($strquery);
$strquery = "SELECT * FROM tbl_nhomtv";
$nhomtv = $lib->selectall($strquery);
?>