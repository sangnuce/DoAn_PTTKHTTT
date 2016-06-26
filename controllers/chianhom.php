<?php
$title = 'Chia nhóm thành viên';
$lib->checkLogin();

$strquery = "SELECT * FROM tbl_nhomtv";
$nhomtv = $lib->selectall($strquery);

$thanhvien = array();
if (isset($_POST['btnduyet'])) {
    foreach ($_POST['matv'] as $matv) {
        $strquery = "SELECT * FROM tbl_thanhvien WHERE matv=" . $matv;
        $thanhvien[] = $lib->selectone($strquery);
    }
}

if (isset($_POST['btnsubmit'])) {
    foreach ($_POST['nhomtv'] as $matv => $manhom) {
        $lib->insert('tbl_chianhom', array('manhom' => $manhom, 'matv' => $matv));
        $lib->update('tbl_thanhvien', array('ngaygianhap' => date('Y-m-d')), array('matv' => $matv));
        $lib->delete('tbl_bangdiem', array('matv' => $matv));
        $lib->delete('tbl_traloi', array('matv' => $matv));
        $lib->delete('tbl_dkthoigianpv', array('matv' => $matv));
    }
    $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chia nhóm thành viên mới thành công!');
    header('Location: index.php?prog=thanhvien');
    die();
}
?>