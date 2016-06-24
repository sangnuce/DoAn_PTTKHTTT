<?php
$title = "Đăng xuất khỏi hệ thống";
$lib->checkLogin();
unset($_SESSION['thanhvien']);
if (isset($_COOKIE['remember'])) {
    setcookie('remember', '', time() - 3600);
    unset($_COOKIE['remember']);
}
$_SESSION['message'] = array('class' => 'alert-warning', 'content' => 'Bạn vừa đăng xuất khỏi hệ thống!');
header('Location: index.php?prog=dangnhap');
die();
?>