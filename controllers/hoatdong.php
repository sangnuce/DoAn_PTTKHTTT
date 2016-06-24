<?php
$title = 'Danh sách hoạt động';
$lib->checkLogin();

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'add') {
        include('views/blocks/chitiethoatdong.php');
        die();
    } else if ($_GET['ajax'] == 'edit') {
        $strquery = "SELECT * FROM tbl_hoatdong WHERE mahd = " . $_POST['id'];
        $hd = $lib->selectone($strquery);
        include('views/blocks/chitiethoatdong.php');
        die();
    } else if ($_GET['ajax'] == 'remove') {
        if ($lib->delete('tbl_hoatdong', array('mahd' => $_POST['id']))) {
            $lib->delete('tbl_phancong', array('mahd' => $_POST['id']));
            $lib->delete('tbl_nhiemvu', array('mahd' => $_POST['id']));
            die("1");
        } else {
            die("0");
        }
    }
}
if (isset($_POST['btnsubmit'])) {
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
        if ($_GET['act'] == 'add') {
            $id = $lib->insert('tbl_hoatdong', $hoatdong);
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới thành công!');
        } else if ($_GET['act'] == 'edit') {
            $lib->update('tbl_hoatdong', $hoatdong, array('mahd' => $_GET['id']));
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
        }
    }
}

$strquery = "SELECT * FROM tbl_hoatdong ORDER BY mahd DESC";
$hoatdong = $lib->selectall($strquery);
?>