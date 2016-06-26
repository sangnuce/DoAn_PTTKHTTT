<?php
$title = 'Danh sách thành viên';
$lib->checkLogin();

$strquery = "SELECT * FROM tbl_nhomtv";
$nhomtv = $lib->selectall($strquery);

if (isset($_GET['ajax'])) {
    $matv = $_POST['id'];
    switch ($_GET['ajax']) {
        case 'adddt':
            include('views/blocks/themmoidoitruong.php');
            die();
            break;
        case 'edit':
            $strquery = "SELECT tbl_thanhvien.*, manhom, lanhomtruong 
                    FROM tbl_thanhvien LEFT JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv
                    WHERE tbl_thanhvien.matv=" . $matv;
            $tv = $lib->selectone($strquery);
            include('views/blocks/chitietthanhvien.php');
            die();
            break;
        case 'active':
            if ($lib->update('tbl_thanhvien', array('tinhtrang' => 1), array('matv' => $matv))) {
                die("1");
            } else {
                die("0");
            }
            break;
        case 'deactive':
            if ($lib->update('tbl_thanhvien', array('tinhtrang' => 0), array('matv' => $matv))) {
                die("1");
            } else {
                die("0");
            }
            break;
        case 'manager':
            if ($lib->update('tbl_chianhom', array('lanhomtruong' => 1, 'tgbatdau' => date('Y-m-d')), array('matv' => $matv))) {
                die("1");
            } else {
                die("0");
            }
            break;
        case 'notmanager':
            if ($lib->update('tbl_chianhom', array('lanhomtruong' => 0), array('matv' => $matv))) {
                die("1");
            } else {
                die("0");
            }
            break;
        case 'remove':
            if ($lib->delete('tbl_thanhvien', array('matv' => $matv))) {
                die("1");
            } else {
                die("0");
            }
            break;
    }
}

if (isset($_POST['btnsubmit'])) {
    if ($_GET['act'] == 'edit') {
        $matv = $_GET['matv'];
        if ($_POST['hoten'] == '' || $_POST['sdt'] == '') {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
        } else {
            $strquery = "SELECT * FROM tbl_thanhvien WHERE sdt='" . $_POST['sdt'] . "' AND matv<>" . $matv;
            if (count($lib->selectone($strquery)) > 0) {
                $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Số điện thoại mới đã tồn tại trong hệ thống!');
            } else {
                $tv = array(
                    'hoten' => $_POST['hoten'],
                    'lop' => $_POST['lop'],
                    'mssv' => $_POST['mssv'],
                    'ngaysinh' => $_POST['ngaysinh'],
                    'gioitinh' => $_POST['gioitinh'],
                    'sdt' => $_POST['sdt'],
                    'quequan' => $_POST['quequan'],
                    'diachi' => $_POST['diachi'],
                    'ngaygianhap' => $_POST['ngaygianhap']
                );
                if ($lib->update('tbl_thanhvien', $tv, array('matv' => $matv))) {
                    if (isset($_POST['manhom']) && $_POST['manhom'] != 0) {
                        $lib->update('tbl_chianhom', array('manhom' => $_POST['manhom']), array('matv' => $matv));
                    }
                    $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
                }
            }
        }
    } else if ($_GET['act'] == 'adddt') {
        if ($_POST['sdt'] == '') {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
        } else {
            $strquery = "SELECT * FROM tbl_thanhvien WHERE sdt='" . $_POST['sdt'] . "'";
            $tv = $lib->selectone($strquery);
            if (count($tv) == 0) {
                $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Số điện thoại không tồn tại trong hệ thống!');
//            } else if ($tv['ladoitruong']==1) {
//                $_SESSION['message'] = array('class' => 'alert-warning', 'content' => 'Thành viên '.$tv['hoten'].' đã là đội trưởng!');
            } else {
                if ($lib->update('tbl_thanhvien', array('ladoitruong' => 1, 'tgbatdau' => date('Y-m-d')), array('matv' => $tv['matv']))) {
                    $lib->delete('tbl_chianhom', array('matv' => $tv['matv']));
                    $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới đội trưởng thành công!');
                }
            }
        }
    }
}

$strquery = "SELECT tbl_thanhvien.*, tbl_nhomtv.*, lanhomtruong
            FROM (tbl_chianhom RIGHT JOIN tbl_thanhvien ON tbl_chianhom.matv=tbl_thanhvien.matv)
            JOIN tbl_nhomtv ON tbl_chianhom.manhom = tbl_nhomtv.manhom
            WHERE tbl_chianhom.manhom IS NOT NULL";
$thanhvien = $lib->selectall($strquery);

$strquery = "SELECT * FROM tbl_thanhvien WHERE ladoitruong=1 ORDER BY tgbatdau DESC";
$doitruong = $lib->selectall($strquery);
?>