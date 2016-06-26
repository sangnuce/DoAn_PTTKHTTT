<?php
$title = "Trang chủ";
$lib->checkLogin();

$strquery = "SELECT tbl_thanhvien.* FROM tbl_thanhvien LEFT JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv WHERE manhom IS NULL AND ladoitruong=0 ORDER BY tinhtrang, ngaygianhap DESC";
$dondangky = $lib->selectall($strquery);

$tgphongvan = array();
foreach ($dondangky as $don) {
    $strquery = "SELECT * FROM tbl_dkthoigianpv JOIN tbl_thoigianpv ON tbl_dkthoigianpv.matg = tbl_thoigianpv.matg WHERE matv = " . $don['matv'];
    $tg = $lib->selectone($strquery);
    $tgphongvan[$don['matv']] = array(
        'matg' => $tg['matg'],
        'sangchieu' => $tg['sangchieu'],
        'ngay' => $lib->dateformat($tg['ngay'])
    );
}

$strquery = "SELECT * FROM tbl_hoatdong ORDER BY tgbatdau DESC";
$hoatdong = $lib->selectall($strquery);

$strquery = "SELECT tbl_nhomtv.*, t1.tongtv FROM tbl_nhomtv 
            LEFT JOIN (SELECT manhom, COUNT(matv) AS tongtv FROM tbl_chianhom GROUP BY manhom) AS t1 
            ON t1.manhom = tbl_nhomtv.manhom";
$nhomtv = $lib->selectall($strquery);
for ($i = 0; $i < count($nhomtv); $i++) {
    $strquery = "SELECT tbl_chianhom.tgbatdau, hoten, sdt FROM tbl_chianhom JOIN tbl_thanhvien
                ON tbl_chianhom.matv = tbl_thanhvien.matv 
                WHERE tbl_chianhom.tgbatdau IS NOT NULL AND manhom=" . $nhomtv[$i]['manhom'] . " 
                ORDER BY tbl_chianhom.tgbatdau DESC LIMIT 0,1";
    $tv = $lib->selectone($strquery);
    $nhomtv[$i] = array_merge($nhomtv[$i], $tv);
}

$strquery = "SELECT tbl_thanhvien.*, tennhom, lanhomtruong 
        FROM (tbl_thanhvien JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv) 
        JOIN tbl_nhomtv ON tbl_chianhom.manhom = tbl_nhomtv.manhom
        ORDER BY ngaygianhap DESC";
$thanhvien = $lib->selectall($strquery);

$strquery = "SELECT *
        FROM tbl_thanhvien 
        WHERE ladoitruong=1
        ORDER BY tgbatdau DESC";
$doitruong = $lib->selectall($strquery);


?>