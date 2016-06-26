<?php
$title = "Cài đặt tuyển thành viên";
$lib->checkLogin();
$strquery = "SELECT * FROM tbl_tuyentv";
$rs = $lib->selectall($strquery);
$tuyentv = array();
foreach ($rs as $row) {
    $tuyentv[$row['thuoctinh']] = $row['giatri'];
}

if (isset($_GET['ajax'])) {
    if ($_GET['ajax'] == 'update') {
        if ($lib->update('tbl_tuyentv', array('giatri' => $_POST['giatri']), array('thuoctinh' => $_POST['thuoctinh']))) {
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    } else if ($_GET['ajax'] == 'delete') {
        try {
            $lib->delete('tbl_traloi');
            $lib->delete('tbl_dkthoigianpv');
            $lib->delete('tbl_thoigianpv');
            $lib->delete('tbl_bangdiem');
            $strquery = "SELECT tbl_thanhvien.* FROM tbl_thanhvien LEFT JOIN tbl_chianhom ON tbl_thanhvien.matv = tbl_chianhom.matv WHERE manhom IS NULL AND ladoitruong=0";
            $dondangky = $lib->selectall($strquery);
            foreach ($dondangky as $don) {
                $lib->delete('tbl_thanhvien', array('matv' => $don['matv']));
            }
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Xoá dữ liệu thành công');
            die("1");
        } catch (Exception $e) {
            die("0");
        }
    }
}
?>