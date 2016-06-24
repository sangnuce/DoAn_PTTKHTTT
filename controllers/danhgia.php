<?php
$title = 'Bảng đánh giá';
$lib->checkLogin();

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'edit') {
        $strquery = "SELECT tbl_bangdiem.*, hoten, ngaysinh, gioitinh FROM tbl_bangdiem JOIN tbl_thanhvien ON tbl_bangdiem.matv = tbl_thanhvien.matv WHERE tbl_bangdiem.matv = " . $_POST['id'];
        $kq = $lib->selectone($strquery);
        include('views/blocks/chitietdanhgia.php');
        die();
    }
}
if (isset($_POST['btnsubmit'])) {
    if ($_POST['teamgame'] == '' || $_POST['teamwork'] == '') {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        if ($_GET['act'] == 'edit') {
            $ketqua = array(
                'quaphongvan' => $_POST['quaphongvan'],
                'teamgame' => $_POST['teamgame'],
                'teamwork' => $_POST['teamwork']
            );
            $lib->update('tbl_bangdiem', $ketqua, array('matv' => $_GET['id']));
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Cập nhật thành công!');
        }
    }
}

$strquery = "SELECT tbl_bangdiem.*, hoten, ngaysinh, gioitinh, (teamgame+teamwork) as tongdiem FROM tbl_bangdiem JOIN tbl_thanhvien ON tbl_bangdiem.matv = tbl_thanhvien.matv ORDER BY tongdiem DESC";
$ketqua = $lib->selectall($strquery);

?>