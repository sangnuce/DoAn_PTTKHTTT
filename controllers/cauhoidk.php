<?php
$title = 'Danh sách câu hỏi đơn đăng ký';
$lib->checkLogin();

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'add') {
        include('views/blocks/chitietcauhoidk.php');
        die();
    } else if ($_GET['ajax'] == 'edit') {
        $strquery = "SELECT * FROM tbl_cauhoi WHERE mach = " . $_POST['id'];
        $ch = $lib->selectone($strquery);
        include('views/blocks/chitietcauhoidk.php');
        die();
    } else if ($_GET['ajax'] == 'remove') {
        if ($lib->delete('tbl_cauhoi', array('mach' => $_POST['id']))) {
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    }
}
if (isset($_POST['btnsubmit'])) {
    if ($_POST['noidung'] == '') {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        if ($_GET['act'] == 'add') {
            $cauhoi = array('noidung' => $_POST['noidung']);
            $id = $lib->insert('tbl_cauhoi', $cauhoi);
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới thành công!');
        } else if ($_GET['act'] == 'edit') {
            $cauhoi = array('noidung' => $_POST['noidung']);
            $lib->update('tbl_cauhoi', $cauhoi, array('mach' => $_GET['id']));
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
        }
    }
}

$strquery = "SELECT * FROM tbl_cauhoi";
$cauhoi = $lib->selectall($strquery);

?>