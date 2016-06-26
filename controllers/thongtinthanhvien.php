<?php
$title = "Thông tin thành viên";

if (isset($_GET['ajax'])) {
    if ($_GET['ajax'] == 'viewpc') {
        $matv = $_POST['matv'];
        $mahd = $_POST['mahd'];
        $strquery = "SELECT tbl_phancong.*, tbl_nhiemvu.noidung FROM tbl_phancong JOIN tbl_nhiemvu ON tbl_phancong.manv = tbl_nhiemvu.manv WHERE matv=" . $matv . " AND tbl_nhiemvu.mahd=" . $mahd . " ORDER BY tbl_nhiemvu.manv";
        $phancong = $lib->selectall($strquery);
        include('views/blocks/nhiemvuthanhvien.php');
        die();
    }
}

if (isset($_POST['btnsubmit'])) {
    if ($_POST['hoten'] == '' && $_POST['sdt'] == '') {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        $strquery = "SELECT * FROM tbl_thanhvien WHERE sdt='" . $_POST['sdt'] . "' AND matv<>" . $_GET['matv'];
        $rs = $lib->selectall($strquery);
        if (count($rs) > 0) {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Số điện thoại mới đã tồn tại trong hệ thống!');
        } else {
            $thanhvien = array(
                'hoten' => $_POST['hoten'],
                'lop' => $_POST['lop'],
                'mssv' => $_POST['mssv'],
                'ngaysinh' => $_POST['ngaysinh'],
                'gioitinh' => $_POST['gioitinh'],
                'sdt' => $_POST['sdt'],
                'quequan' => $_POST['quequan'],
                'diachi' => $_POST['diachi'],
                'ngaygianhap' => $_POST['ngaygianhap'],
                'tinhtrang' => $_POST['tinhtrang']
            );
            $lib->update('tbl_thanhvien', $thanhvien, array('matv' => $_GET['matv']));
            if (isset($_POST['chucvu'])) {
                $strquery = "SELECT * FROM tbl_chianhom WHERE matv=" . $_GET['matv'];
                $rs = $lib->selectone($strquery);
                if ($rs['lanhomtruong'] == 0) {
                    if ($_POST['chucvu'] == 1) {
                        $lib->update('tbl_chianhom', array('manhom' => $_POST['manhom'], 'lanhomtruong' => 1, 'tgbatdau' => date('Y-m-d')), array('matv' => $_GET['matv']));
                    } else {
                        $lib->update('tbl_chianhom', array('manhom' => $_POST['manhom']), array('matv' => $_GET['matv']));
                    }
                } else {
                    if ($_POST['chucvu'] == 0) {
                        $lib->update('tbl_chianhom', array('manhom' => $_POST['manhom'], 'lanhomtruong' => 0), array('matv' => $_GET['matv']));
                    } else {
                        $lib->update('tbl_chianhom', array('manhom' => $_POST['manhom']), array('matv' => $_GET['matv']));
                    }
                }
            }
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
        }
    }
}

$matv = $_GET['matv'];
$strquery = "SELECT * FROM tbl_nhomtv";
$nhomtv = $lib->selectall($strquery);

$strquery = "SELECT tbl_thanhvien.*, tbl_nhomtv.*, lanhomtruong, ladoitruong
            FROM (tbl_thanhvien LEFT JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv)
                LEFT JOIN tbl_nhomtv ON tbl_chianhom.manhom = tbl_nhomtv.manhom
            WHERE tbl_thanhvien.matv=" . $matv;
$tv = $lib->selectone($strquery);

$strquery = "SELECT DISTINCT tbl_hoatdong.* FROM tbl_hoatdong JOIN tbl_phancong ON tbl_hoatdong.mahd = tbl_phancong.mahd WHERE tbl_phancong.matv=" . $matv;
$hoatdong = $lib->selectall($strquery);

?>