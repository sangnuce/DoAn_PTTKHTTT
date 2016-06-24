<?php
require_once('configs/configs.php');
require_once('models/thuvien.php');

$lib = new LIB(SERVER, HOST, DB, USER, PASS);

if (isset($_COOKIE['remember']) && !isset($_SESSION['thanhvien'])) {
    $idtk = $_COOKIE['remember'];
    $strquery = "SELECT * FROM tbl_thanhvien WHERE matv='$idtk'";
    $rs = $lib->selectone($strquery);
    if ($rs) $_SESSION['thanhvien'] = $rs;
}

?>