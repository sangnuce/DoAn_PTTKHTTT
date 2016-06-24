<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo BASE_URL ?>/views/dist/img/doan.ico" type="image/x-icon">
    <title><?php echo isset($title) ? $title : "Quản trị hệ thống"; ?></title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/views/plugins/iCheck/square/blue.css">

    <!-- jQuery 2.2.0 -->
    <script src="<?php echo BASE_URL ?>/views/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo BASE_URL ?>/views/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo BASE_URL ?>/views/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL ?>/views/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL ?>/views/dist/js/app.js"></script>
    <!-- Dashboard -->
    <script src="<?php echo BASE_URL ?>/views/dist/js/dashboard.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">QT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Quản trị hệ thống</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span><?php echo $_SESSION['thanhvien']['hoten'] ?></span> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?prog=doimatkhau">Đổi mật khẩu</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="index.php?prog=dangxuat">Đăng xuất</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i>
                        <span>Tuyển thành viên</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?prog=dondangky"><i class="fa fa-circle-o"></i> Đơn đăng ký</a></li>
                        <li><a href="index.php?prog=danhgia"><i class="fa fa-circle-o"></i> Bảng đánh giá</a></li>
                        <li><a href="index.php?prog=cauhoidk"><i class="fa fa-circle-o"></i> Câu hỏi đăng ký</a></li>
                        <li><a href="index.php?prog=thoigianpv"><i class="fa fa-circle-o"></i> Thời gian phỏng vấn</a>
                        </li>
                        <li><a href="index.php?prog=caidattuyentv"><i class="fa fa-circle-o"></i> Cài đặt</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i>
                        <span>Thành viên</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?prog=thanhvien"><i class="fa fa-circle-o"></i> Thành viên</a></li>
                        <li><a href="index.php?prog=nhomthanhvien"><i class="fa fa-circle-o"></i> Nhóm thành viên</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list-alt"></i>
                        <span>Hoạt động</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?prog=hoatdong"><i class="fa fa-circle-o"></i> Danh sách hoạt động</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Tài khoản</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?prog=taikhoan"><i class="fa fa-circle-o"></i> Danh sách tài khoản</a>
                        </li>
                        <li><a href="index.php?prog=doimatkhau"><i class="fa fa-circle-o"></i> Đổi mật khẩu</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
        <?php include($template) ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        Đội sinh viên tình nguyện trường Đại học Xây Dựng
        <div class="pull-right hidden-xs">
            Xây dựng bởi <b>Nhóm 1, lớp 58PM</b>
        </div>

    </footer>

</div>
<!-- ./wrapper -->
</body>
</html>
