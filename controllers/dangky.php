<?php
$title = 'Thêm mới đơn đăng ký';

// Lấy ra các dữ liệu để hoàn thiện thông tin cần thiết cho form
$strquery = "SELECT * FROM tbl_cauhoi";
$cauhoi = $lib->selectall($strquery);
$strquery = "SELECT * FROM tbl_thoigianpv";
$thoigianpv = $lib->selectall($strquery);

// Chuyển đổi định dạng hiển thị ngày tháng của thời gian phỏng vấn
for ($i = 0; $i < count($thoigianpv); $i++) {
    $thoigianpv[$i]['ngay'] = date("d-m-Y", strtotime($thoigianpv[$i]['ngay']));
}

// Kiểm tra tình trạng có nhận đơn nữa hay không
$strquery = "SELECT * FROM tbl_tuyentv";
$rs = $lib->selectall($strquery);
$tuyentv = array();
foreach ($rs as $row) {
    $tuyentv[$row['thuoctinh']] = $row['giatri'];
}
if ($tuyentv['nhandon'] == 0) {
    $_SESSION['message'] = array('class' => 'alert-warning', 'content' => 'Hiện tại chúng tôi không nhận thêm đơn đăng ký!');
} else {
// Kiểm tra dữ liệu gửi từ form
    if (isset($_POST['btndangky'])) {
        $ktcauhoi = true;
        foreach ($_POST['cauhoi'] as $traloi) {
            if ($traloi == '') {
                $ktcauhoi = false;
                break;
            }
        }
        $ktthoigian = true;
        if (!isset($_POST['tgphongvan'])) $ktthoigian = false;

        if ($_POST['hoten'] == '' || $_POST['sdt'] == '' || $_POST['captcha'] == '' || !$ktcauhoi || !$ktthoigian) {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
        } else if ($_POST['captcha'] != $_SESSION['captcha']) {
            $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Mã xác nhận không đúng!');
        } else {
            $strquery = "SELECT * FROM tbl_thanhvien WHERE sdt='" . $_POST['sdt'] . "'";
            $rs = $lib->selectall($strquery);
            if (count($rs) > 0) {
                $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Số điện thoại đã tồn tại trong hệ thống!');
            } else {
                unset($_SESSION['captcha']);
                $thanhvien = array(
                    'hoten' => $_POST['hoten'],
                    'lop' => $_POST['lop'],
                    'mssv' => $_POST['mssv'],
                    'ngaysinh' => $_POST['ngaysinh'],
                    'gioitinh' => $_POST['gioitinh'],
                    'sdt' => $_POST['sdt'],
                    'quequan' => $_POST['quequan'],
                    'diachi' => $_POST['diachi'],
                    'ngaygianhap' => date('Y-m-d')
                );
                $id = $lib->insert('tbl_thanhvien', $thanhvien);
                foreach ($_POST['cauhoi'] as $mach => $traloi) {
                    $lib->insert('tbl_traloi', array('mach' => $mach, 'matv' => $id, 'traloi' => $traloi));
                }
                $lib->insert('tbl_dkthoigianpv', array('matv' => $id, 'matg' => $_POST['tgphongvan']));
                $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Đăng ký thành công!');
            }
        }
    }
}
?>