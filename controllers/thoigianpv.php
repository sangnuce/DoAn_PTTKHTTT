<?php
$title = 'Danh sách thời gian phỏng vấn';
$lib->checkLogin();

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'add') {
        include('views/blocks/chitietthoigianpv.php');
        die();
    } else if ($_GET['ajax'] == 'edit') {
        $strquery = "SELECT * FROM tbl_thoigianpv WHERE matg = " . $_POST['id'];
        $tg = $lib->selectone($strquery);
        include('views/blocks/chitietthoigianpv.php');
        die();
    } else if ($_GET['ajax'] == 'remove') {
        if ($lib->delete('tbl_thoigianpv', array('matg' => $_POST['id']))) {
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    }
}
if (isset($_POST['btnsubmit'])) {
    if ($_POST['sangchieu'] == '' || $_POST['ngay'] == '') {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        $thoigian = array('sangchieu' => $_POST['sangchieu'], 'ngay' => $_POST['ngay']);
        if ($_GET['act'] == 'add') {
            $id = $lib->insert('tbl_thoigianpv', $thoigian);
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới thành công!');
        } else if ($_GET['act'] == 'edit') {
            $lib->update('tbl_thoigianpv', $thoigian, array('matg' => $_GET['id']));
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
        }
    }
}

$strquery = "SELECT * FROM tbl_thoigianpv";
$thoigian = $lib->selectall($strquery);

?>