<?php
$title = 'Thông tin chi tiết hoạt động';
$lib->checkLogin();

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'addnv') {
        include('views/blocks/chitietnhiemvu.php');
        die();
    } else if ($_GET['ajax'] == 'editnv') {
        $strquery = "SELECT * FROM tbl_nhiemvu WHERE manv = " . $_POST['manv'];
        $nv = $lib->selectone($strquery);
        include('views/blocks/chitietnhiemvu.php');
        die();
    } else if ($_GET['ajax'] == 'removenv') {
        if ($lib->delete('tbl_nhiemvu', array('manv' => $_POST['manv']))) {
            $lib->delete('tbl_phancong', array('manv' => $_POST['manv']));
            die("1");
        } else {
            die("0");
        }
    } else if ($_GET['ajax'] == 'addtv') {
        try {
            $lib->insert('tbl_phancong', array('matv' => $_POST['matv'], 'mahd' => $_POST['mahd']));
            die("1");
        } catch (Exception $e) {
            die("0");
        }
    } else if ($_GET['ajax'] == 'removetv') {
        if ($lib->delete('tbl_phancong', array('matv' => $_POST['matv'], 'mahd' => $_POST['mahd']))) {
            die("1");
        } else {
            die("0");
        }
    }
}
if (isset($_POST['btnsubmit'])) {
    if ($_GET['act'] == 'edithd') {
        if ($_POST['tenhd'] == '' || $_POST['tgbatdau'] == '' || $_POST['diadiem'] == '') {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
        } else {
            $hoatdong = array(
                'tenhd' => $_POST['tenhd'],
                'tgbatdau' => $_POST['tgbatdau'],
                'tgketthuc' => $_POST['tgketthuc'],
                'songuoi' => $_POST['songuoi'],
                'diadiem' => $_POST['diadiem']
            );
            if ($_GET['act'] == 'edit') {
                $lib->update('tbl_hoatdong', $hoatdong, array('mahd' => $_GET['mahd']));
                $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
            }
        }
    } else if ($_GET['act'] == 'editnv' || $_GET['act'] == 'addnv') {
        if ($_POST['noidung'] == '') {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
        } else {
            if ($_GET['act'] == 'addnv') {
                $nhiemvu = array('noidung' => $_POST['noidung'], 'mahd' => $_GET['mahd']);
                $id = $lib->insert('tbl_nhiemvu', $nhiemvu);
                $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới thành công!');
            } else if ($_GET['act'] == 'editnv') {
                $nhiemvu = array('noidung' => $_POST['noidung']);
                $lib->update('tbl_nhiemvu', $nhiemvu, array('manv' => $_GET['manv']));
                $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
            }
        }
    }
}

$mahd = @$_GET['mahd'];

$strquery = "SELECT * FROM tbl_hoatdong WHERE mahd=" . $mahd;
$hd = $lib->selectone($strquery);

$strquery = "SELECT * FROM tbl_nhiemvu WHERE mahd=" . $mahd;
$nhiemvu = $lib->selectall($strquery);

$strquery = "SELECT DISTINCT matv FROM tbl_phancong WHERE mahd=" . $mahd;
$matv = $lib->selectall($strquery);

$thanhvien = array();
foreach ($matv as $ma) {
    $strquery = "SELECT * FROM tbl_thanhvien WHERE matv=" . $ma['matv'];
    $tv = $lib->selectone($strquery);
    $strquery = "SELECT tbl_nhomtv.* FROM tbl_nhomtv JOIN tbl_chianhom ON tbl_chianhom.manhom = tbl_nhomtv.manhom WHERE matv=" . $ma['matv'];
    $nhom = $lib->selectone($strquery);
    $thanhvien[] = array_merge($tv, $nhom);
}

$strquery = "SELECT tbl_thanhvien.*, tbl_nhomtv.tennhom 
                FROM (tbl_thanhvien JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv) 
                JOIN tbl_nhomtv ON tbl_chianhom.manhom = tbl_nhomtv.manhom
                WHERE tinhtrang=1 AND tbl_thanhvien.matv NOT IN (SELECT matv FROM tbl_phancong WHERE mahd=" . $_GET['mahd'] . ")";
$listtv = $lib->selectall($strquery);

$phancong = array();
foreach ($nhiemvu as $nv){
    $phancong[$nv['manv']]= array();
    $strquery = "SELECT tbl_thanhvien.* , tbl_nhomtv.tennhom 
                FROM (tbl_thanhvien JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv) 
                JOIN tbl_nhomtv ON tbl_chianhom.manhom = tbl_nhomtv.manhom WHERE tbl_thanhvien.matv IN (SELECT matv FROM tbl_phancong WHERE manv=" . $nv['manv'] . ")";
    $tv = $lib->selectall($strquery);
    foreach ($tv as $t) {
        $strquery = "SELECT tbl_phancong.* 
                FROM tbl_phancong 
                WHERE manv=" . $nv['manv'] . " AND matv=" . $t['matv'];
        $t['phancong'] = $lib->selectall($strquery);
        $phancong[$nv['manv']][] = $t;
    }
}

?>