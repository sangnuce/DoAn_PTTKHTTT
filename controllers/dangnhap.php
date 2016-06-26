<?php
$title = "Đăng nhập vào hệ thống";
if (isset($_SESSION['thanhvien'])) {
    $_SESSION['message'] = array('class' => 'alert-info', 'content' => 'Bạn đang đăng nhập! (' . $_SESSION['thanhvien']['hoten'] . ')');
}

if (isset($_POST['btnsubmit'])) {
    if ($_POST['sdt'] == "" || $_POST['matkhau'] == "") {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Thông tin không đầy đủ!');
    } else {
        $tk = $lib->attempt($_POST['sdt'], $_POST['matkhau']);
        if (count($tk) > 0) {
            $_SESSION['thanhvien'] = $tk;
            if (isset($_POST['remember'])) {
                setcookie('remember', $tk['matv'], time() + 7 * 24 * 3600);
            }
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Đăng nhập thành công!');
            header('Location: index.php');
            die();
        } else {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
}
?>