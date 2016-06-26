<?php
$title = "Đổi mật khẩu";
$lib->checkLogin();
if (isset($_POST['btnsubmit'])) {
    if ($_POST['old_pass'] == "" || $_POST['new_pass'] == "" || $_POST['re_new_pass'] == "") {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else if ($_POST['new_pass'] != $_POST['re_new_pass']) {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Mật khẩu mới không trùng khớp!');
    } else {
        $strquery = "SELECT * FROM tbl_taikhoan WHERE matv=" . $_SESSION['thanhvien']['matv'] . " AND matkhau='" . md5($_POST['old_pass']) . "'";
        $tk = $lib->selectone($strquery);
        if (count($tk) > 0) {
            $lib->update('tbl_taikhoan', array('matkhau' => md5($_POST['new_pass'])), array('matv' => $tk['matv']));
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thay đổi mật khẩu thành công!');
        } else {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Mật khẩu cũ không chính xác!');
        }
    }
}
?>