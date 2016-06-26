<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo BASE_URL ?>/views/dist/img/doan.ico" type="image/x-icon">
    <title><?php echo isset($title) ? $title : "Đăng ký tuyển thành viên"; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/dist/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/dist/css/AdminLTE.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin: 0">
        <?php
        if (isset($_SESSION['message'])) {
            ?>
            <section class="content-header">
                <div class="alert <?php echo $_SESSION['message']['class'] ?>">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $_SESSION['message']['content'] ?>
                </div>
            </section>
            <?php
            unset($_SESSION['message']);
        }
        ?>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="modal-dialog">
                    <?php if ($showform == true) { ?>
                        <div class="modal-content">
                            <form action="" method="post">
                                <div class="modal-header">
                                    <h4 class="modal-title">Thông tin đơn đăng ký</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên *</label>
                                                <input class="form-control" type="text" name="hoten"
                                                       value="<?php echo isset($_POST['hoten']) ? $_POST['hoten'] : '' ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>MSSV</label>
                                                <input class="form-control" type="text" name="mssv"
                                                       value="<?php echo isset($_POST['mssv']) ? $_POST['mssv'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Giới tính</label>
                                                <select class="form-control" name="gioitinh">
                                                    <option
                                                        value="1" <?php echo (isset($_POST['gioitinh']) && $_POST['gioitinh'] == 1) ? 'selected' : '' ?>>
                                                        Nam
                                                    </option>
                                                    <option
                                                        value="0" <?php echo (isset($_POST['gioitinh']) && $_POST['gioitinh'] == 0) ? 'selected' : '' ?>>
                                                        Nữ
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Lớp</label>
                                                <input class="form-control" type="text" name="lop"
                                                       value="<?php echo isset($_POST['lop']) ? $_POST['lop'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày sinh</label>
                                                <input class="form-control" type="date" name="ngaysinh"
                                                       value="<?php echo isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '' ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại *</label>
                                                <input class="form-control" type="number" name="sdt"
                                                       value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : '' ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Quê quán</label>
                                        <input class="form-control" type="text" name="quequan"
                                               value="<?php echo isset($_POST['quequan']) ? $_POST['quequan'] : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ hiện tại</label>
                                        <input class="form-control" type="text" name="diachi"
                                               value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : '' ?>">
                                    </div>
                                    <?php
                                    foreach ($cauhoi as $ch) {
                                        ?>
                                        <div class="form-group">
                                            <label><?php echo $ch['noidung'] ?> *</label>
                                    <textarea class="form-control" style="resize: vertical"
                                              name="cauhoi[<?php echo $ch['mach'] ?>]" required><?php echo isset($_POST['cauhoi'][$ch['mach']]) ? $_POST['cauhoi'][$ch['mach']] : '' ?></textarea>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label>Thời gian phỏng vấn *</label>
                                        <select name="tgphongvan" class="form-control">
                                            <?php
                                            foreach ($thoigianpv as $tg) {
                                                ?>
                                                <option
                                                    value="<?php echo $tg['matg'] ?>" <?php echo (isset($_POST['tgphongvan']) && $tg['matg'] == $_POST['tgphongvan']) ? 'selected' : '' ?>>
                                                    <?php echo $tg['sangchieu'] == 0 ? 'Sáng ' . $tg['ngay'] : 'Chiều ' . $tg['ngay'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã xác nhận *</label>
                                        <div class="input-group">
                                        <span class="input-group-addon"><img
                                                src="<?php echo BASE_URL ?>/controllers/captcha.php"></span>
                                            <input class="form-control" type="text" name="captcha" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="btndangky">Lưu</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    <?php } ?>
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin: 0">
        Đội sinh viên tình nguyện trường Đại học Xây Dựng
        <div class="pull-right hidden-xs">
            Xây dựng bởi <b>Nhóm 1, lớp 58PM</b>
        </div>

    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo BASE_URL ?>/views/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_URL ?>/views/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL ?>/views/dist/js/app.js"></script>
<!-- Dashboard -->
<script src="<?php echo BASE_URL ?>/views/dist/js/dashboard.js"></script>

</body>
</html>