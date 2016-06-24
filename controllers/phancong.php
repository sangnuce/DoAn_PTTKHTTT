<?php
$lib->checkLogin();

if (isset($_GET['ajax'])) {
    if ($_GET['ajax'] == 'removepc') {
        if ($lib->delete('tbl_phancong', array('mapc' => $_POST['mapc']))) {
            die("1");
        } else {
            die("0");
        }
    } else {
        $strquery = "SELECT * FROM tbl_thanhvien WHERE matv IN (SELECT matv FROM tbl_phancong WHERE mahd=" . $_POST['mahd'] . ")";
        $thanhvien = $lib->selectall($strquery);
        $strquery = "SELECT * FROM tbl_nhiemvu WHERE mahd=" . $_POST['mahd'];
        $nhiemvu = $lib->selectall($strquery);

        if ($_GET['ajax'] == 'addpc') {
            $pc['matv'] = $_POST['matv'];
            include('views/blocks/chitietphancong.php');
            die();
        } else if ($_GET['ajax'] == 'viewpc') {
            $strquery = "SELECT tbl_phancong.*, tbl_nhiemvu.noidung FROM tbl_phancong JOIN tbl_nhiemvu ON tbl_phancong.manv = tbl_nhiemvu.manv WHERE matv=" . $_POST['matv'] . " AND tbl_nhiemvu.mahd=" . $_POST['mahd'] . " ORDER BY tbl_nhiemvu.manv";
            $phancong = $lib->selectall($strquery);
            $rs = array();
            foreach ($phancong as $pc) {
                $row[0] = $pc['noidung'];
                $row[1] = $lib->dateformat($pc['tgbatdau'], 1);
                $row[2] = $lib->dateformat($pc['tgketthuc'], 1);
                $row[3] = '<button type="button" class="btn btn-info editpc" data-toggle="modal" data-target="#detail" data-id="' . $pc['mapc'] . '"><i class="fa fa-pencil"></i></button>';
                $row[4] = '<button type = "button" class="btn btn-danger removepc" data-id="' . $pc['mapc'] . '" ><i class="fa fa-remove" ></i></button>';
                $rs[] = $row;
            }
            header('Content-Type: application/json');
            die(json_encode($rs));
        } else if ($_GET['ajax'] == 'editpc') {
            $strquery = "SELECT * FROM tbl_phancong WHERE mapc=" . $_POST['mapc'];
            $pc = $lib->selectone($strquery);
            include('views/blocks/chitietphancong.php');
            die();
        }
    }
}
if (isset($_POST['btnsubmit'])) {
    if ($_POST['tgbatdau'] == 0) {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        $phancong = array(
            'matv' => $_POST['matv'],
            'manv' => $_POST['manv'],
            'mahd' => $_GET['mahd'],
            'tgbatdau' => $_POST['tgbatdau'],
            'tgketthuc' => $_POST['tgketthuc']
        );
        if ($_GET['act'] == 'addpc') {
            $strquery = "SELECT mapc FROM tbl_phancong WHERE manv IS NULL AND matv=" . $_POST['matv'] . " AND mahd=" . $_GET['mahd'];
            $pc = $lib->selectone($strquery);
            if (count($pc) > 0) {
                $lib->update('tbl_phancong', $phancong, array('mapc' => $pc['mapc']));
            } else {
                $lib->insert('tbl_phancong', $phancong);
            }
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới thành công!');
        } else if ($_GET['act'] == 'editpc') {
            $lib->update('tbl_phancong', $phancong, array('mapc' => $_POST['mapc']));
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
        }
    }
    header('Location: index.php?prog=thongtinhoatdong&mahd=' . $_GET['mahd']);
    die();
}
?>