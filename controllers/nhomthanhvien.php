<?php
$title = 'Danh sách nhóm thành viên';
$lib->checkLogin();

if ($_GET['ajax']) {
    if ($_GET['ajax'] == 'add') {
        include('views/blocks/chitietnhom.php');
        die();
    } else if ($_GET['ajax'] == 'edit') {
        $strquery = "SELECT * FROM tbl_nhomtv WHERE manhom = " . $_POST['id'];
        $nhom = $lib->selectone($strquery);
        include('views/blocks/chitietnhom.php');
        die();
    } else if ($_GET['ajax'] == 'remove') {
        if ($lib->delete('tbl_nhomtv', array('manhom' => $_POST['id']))) {
            echo "1";
            die();
        } else {
            echo "0";
            die();
        }
    }
}
if (isset($_POST['btnsubmit'])) {
    if ($_POST['tennhom'] == '') {
        $_SESSION['message'] = array('class' => 'alert-danger', 'content' => 'Các trường có dấu * là bắt buộc!');
    } else {
        if ($_GET['act'] == 'add') {
            $nhom = array('tennhom' => $_POST['tennhom']);
            $id = $lib->insert('tbl_nhomtv', $nhom);
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Thêm mới thành công!');
        } else if ($_GET['act'] == 'edit') {
            $nhom = array('tennhom' => $_POST['tennhom']);
            $lib->update('tbl_nhomtv', $nhom, array('manhom' => $_GET['id']));
            $_SESSION['message'] = array('class' => 'alert-success', 'content' => 'Chỉnh sửa thành công!');
        }
    }
}

$strquery = "SELECT * FROM tbl_nhomtv";
$nhomtv = $lib->selectall($strquery);
for ($i = 0; $i < count($nhomtv); $i++) {
    $strquery = "SELECT * FROM tbl_chianhom JOIN tbl_thanhvien ON tbl_chianhom.matv = tbl_thanhvien.matv WHERE tbl_thanhvien.tinhtrang=1 AND manhom=" . $nhomtv[$i]['manhom'];
    $nhomtv[$i]['tvhoatdong'] = count($lib->selectall($strquery));
    $strquery = "SELECT * FROM tbl_chianhom JOIN tbl_thanhvien ON tbl_chianhom.matv = tbl_thanhvien.matv WHERE manhom=" . $nhomtv[$i]['manhom'];
    $nhomtv[$i]['tongtv'] = count($lib->selectall($strquery));
}
?>