<?php
$title = "Danh sách tài khoản";

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'add') {
        include('views/blocks/chitiettaikhoan.php');
        die();
    } else if ($_GET['ajax'] == 'remove') {
        if ($lib->delete('tbl_taikhoan', array('matv' => $_POST['id']))) {
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    }
}
if (isset($_POST['btnsubmit'])) {
    if ($_POST['sdt'] == '') {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        if ($_GET['act'] == 'add') {
            $strquery = "SELECT * FROM tbl_thanhvien WHERE sdt='" . $_POST['sdt'] . "'";
            $tv = $lib->selectone($strquery);
            if (count($tv) > 0) {
                $strquery = "SELECT * FROM tbl_taikhoan WHERE matv=" . $tv['matv'];
                $tk = $lib->selectone($strquery);
                if (count($tk) > 0) {
                    $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Đã tồn tại tài khoản của thành viên ' . $tv['hoten'] . '!');
                } else {
                    $tk = array('matv' => $tv['matv'], 'matkhau' => md5($_POST['sdt']));
                    $id = $lib->insert('tbl_taikhoan', $tk);
                    $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới thành công!');
                }
            } else {
                $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Số điện thoại không tồn tại trong hệ thống!');
            }
        }
    }
}

$strquery = "SELECT tbl_thanhvien.* FROM tbl_thanhvien JOIN tbl_taikhoan ON tbl_taikhoan.matv = tbl_thanhvien.matv";
$taikhoan = $lib->selectall($strquery);

?>