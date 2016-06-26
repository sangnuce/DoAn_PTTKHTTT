<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo BASE_URL ?>/views/dist/img/doan.ico" type="image/x-icon">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/dist/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/dist/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<?php
if (isset($_SESSION['message'])) {
    ?>
    <section class="content-header">
        <div class="alert <?php echo $_SESSION['message']['class'] ?> message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $_SESSION['message']['content'] ?>
        </div>
    </section>
    <?php
    unset($_SESSION['message']);
}
?>
<div class="login-box">
    <div class="login-logo">
        <p>Đăng nhập hệ thống</p>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Tài khoản" name="taikhoan"
                       value="<?php echo isset($_POST['taikhoan']) ? $_POST['taikhoan'] : '' ?>">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau"
                       value="<?php echo isset($_POST['matkhau']) ? $_POST['matkhau'] : '' ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-7">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"
                                   name="remember" <?php echo isset($_POST['remember']) ? 'checked' : '' ?>> Ghi nhớ
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="btnsubmit">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo BASE_URL ?>/views/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo BASE_URL ?>/views/bootstrap/js/bootstrap.min.js"></script>
<!-- Dashboard -->
<script src="<?php echo BASE_URL ?>/views/dist/js/dashboard.js"></script>
<!-- iCheck -->
<script src="<?php echo BASE_URL ?>/views/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
