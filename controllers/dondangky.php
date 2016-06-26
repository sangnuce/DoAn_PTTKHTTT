<?php
$title = 'Danh sách đơn đăng ký';
$lib->checkLogin();

$strquery = "SELECT * FROM tbl_cauhoi";
$cauhoi = $lib->selectall($strquery);

$strquery = "SELECT * FROM tbl_thoigianpv";
$thoigianpv = $lib->selectall($strquery);
for ($i = 0; $i < count($thoigianpv); $i++) {
    $thoigianpv[$i]['ngay'] = date('d-m-Y', strtotime($thoigianpv[$i]['ngay']));
}

if (isset($_POST['btnsubmit'])) {
    $ktcauhoi = true;
    foreach ($_POST['cauhoi'] as $traloi) {
        if ($traloi == '') {
            $ktcauhoi = false;
            break;
        }
    }
    $ktthoigian = true;
    if (!isset($_POST['tgphongvan'])) $ktthoigian = false;

    if ($_POST['hoten'] == '' || $_POST['sdt'] == '' || !$ktcauhoi || !$ktthoigian) {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        $thanhvien = array(
            'hoten' => $_POST['hoten'],
            'lop' => $_POST['lop'],
            'mssv' => $_POST['mssv'],
            'ngaysinh' => $_POST['ngaysinh'],
            'gioitinh' => $_POST['gioitinh'],
            'sdt' => $_POST['sdt'],
            'quequan' => $_POST['quequan'],
            'diachi' => $_POST['diachi']
        );
        $lib->update('tbl_thanhvien', $thanhvien, array('matv' => $_GET['id']));
        foreach ($_POST['cauhoi'] as $mach => $traloi) {
            $lib->update('tbl_traloi', array('traloi' => $traloi), array('mach' => $mach, 'matv' => $_GET['id']));
        }
        $lib->update('tbl_dkthoigianpv', array('matg' => $_POST['tgphongvan']), array('matv' => $_GET['id']));
        $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Cập nhật thành công!');
    }
}

$strquery = "SELECT tbl_thanhvien.* FROM tbl_thanhvien LEFT JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv WHERE manhom IS NULL AND ladoitruong=0 ORDER BY tinhtrang, ngaygianhap";
$dondangky = $lib->selectall($strquery);

$traloi = array();
foreach ($dondangky as $don) {
    $strquery = "SELECT * FROM tbl_traloi WHERE matv = " . $don['matv'];
    $rs = $lib->selectall($strquery);
    foreach ($rs as $tl) {
        $traloi[$don['matv']][$tl['mach']] = $tl['traloi'];
    }
}

$dkthoigianpv = array();
foreach ($dondangky as $don) {
    $strquery = "SELECT tbl_thoigianpv.* FROM tbl_dkthoigianpv JOIN tbl_thoigianpv ON tbl_dkthoigianpv.matg = tbl_thoigianpv.matg WHERE matv = " . $don['matv'];
    $tg = $lib->selectone($strquery);
    $dkthoigianpv[$don['matv']] = array(
        'matg' => $tg['matg'],
        'sangchieu' => $tg['sangchieu'],
        'ngay' => $lib->dateformat($tg['ngay'])
    );
}

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'view') {
        $strquery = "SELECT * FROM tbl_thanhvien WHERE matv = " . $_POST['id'];
        $don = $lib->selectone($strquery);
        include('views/blocks/chitietdondk.php');
        die();
    } else if ($_GET['ajax'] == 'pass') {
        if ($lib->update('tbl_thanhvien', array('tinhtrang' => 1), array('matv' => $_POST['id']))) {
            $lib->insert('tbl_bangdiem', array('matv' => $_POST['id']));
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    } else if ($_GET['ajax'] == 'unpass') {
        if ($lib->update('tbl_thanhvien', array('tinhtrang' => 0), array('matv' => $_POST['id']))) {
            $lib->delete('tbl_bangdiem', array('matv' => $_POST['id']));
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    } else if ($_GET['ajax'] == 'remove') {
        if ($lib->delete('tbl_thanhvien', array('matv' => $_POST['id']))) {
            $lib->delete('tbl_bangdiem', array('matv' => $_POST['id']));
            $lib->delete('tbl_traloi', array('matv' => $_POST['id']));
            $lib->delete('tbl_dkthoigianpv', array('matv' => $_POST['id']));
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    }
}

?>