<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once('connect.php');

if (isset($_GET['prog']))
    $prog = $_GET['prog'];
else
    $prog = 'trangchu';

if ($prog == 'dangnhap' || $prog == 'dangky') {
    require_once('controllers/' . $prog . '.php');
    include('views/' . $prog . '.php');
} else {
    if (file_exists('controllers/' . $prog . '.php')) {
        require_once('controllers/' . $prog . '.php');
        $template = 'views/pages/' . $prog . '.php';
        include_once('views/index.php');
    } else {
        require_once('controllers/404.php');
        include('views/404.php');
    }

}
?>