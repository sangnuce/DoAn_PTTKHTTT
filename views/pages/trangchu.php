<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Quản lý đăng ký tình nguyện viên và các hoạt động của đội SVTN trường ĐHXD</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="index.php?prog=nhomthanhvien">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-group"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">NHÓM THÀNH VIÊN</span>
                        <span class="info-box-number"><?php echo count($nhomtv) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="index.php?prog=thanhvien">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">THÀNH VIÊN</span>
                        <span class="info-box-number"><?php echo count($thanhvien) + count($doitruong) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="index.php?prog=hoatdong">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-list-alt"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">HOẠT ĐỘNG</span>
                        <span class="info-box-number"><?php echo count($hoatdong) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="index.php?prog=dondangky">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-file-text-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">ĐƠN ĐĂNG KÝ</span>
                        <span class="info-box-number"><?php echo count($dondangky) ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách nhóm thành viên</h3>
                </div>
                <div class="box-body">
                    <table id="dsnhomtv" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Tên nhóm</th>
                            <th>Số thành viên</th>
                            <th>Nhóm trưởng hiện tại</th>
                            <th>Số điện thoại</th>
                            <th>TG bắt đầu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($nhomtv as $nhom) {
                            ?>
                            <tr>
                                <td><?php echo $nhom['tennhom'] ?></td>
                                <td><?php echo is_numeric($nhom['tongtv']) ? $nhom['tongtv'] : '0' ?></td>
                                <td><?php echo $nhom['hoten'] ?></td>
                                <td><?php echo $nhom['sdt'] ?></td>
                                <td><?php echo $lib->dateformat($nhom['tgbatdau']) ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách đội trưởng</h3>
                </div>
                <div class="box-body">
                    <table id="dsdoitruong" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($doitruong as $dt) { ?>
                            <tr>
                                <td><?php echo $dt['hoten'] ?></td>
                                <td><?php echo $lib->dateformat($dt['ngaysinh']) ?></td>
                                <td><?php echo $dt['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                <td><?php echo $dt['quequan'] ?></td>
                                <td><?php echo $dt['sdt'] ?></td>
                                <td><?php echo $lib->dateformat($dt['tgbatdau']) ?></td>
                                <td><a href="index.php?prog=thongtinthanhvien&matv=<?php echo $dt['matv'] ?>"
                                       class="btn btn-success">Chi tiết</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách thành viên</h3>
                </div>
                <div class="box-body">
                    <table id="dsthanhvien" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nhóm</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Ngày gia nhập</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($thanhvien as $tv) { ?>
                            <tr>
                                <td><?php echo $tv['tennhom'] ?></td>
                                <td><?php echo $tv['hoten'] ?></td>
                                <td><?php echo $lib->dateformat($tv['ngaysinh']) ?></td>
                                <td><?php echo $tv['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                <td><?php echo $tv['quequan'] ?></td>
                                <td><?php echo $tv['sdt'] ?></td>
                                <td><?php echo $lib->dateformat($tv['ngaygianhap']) ?></td>
                                <td><a href="index.php?prog=thongtinthanhvien&matv=<?php echo $tv['matv'] ?>"
                                       class="btn btn-success">Chi tiết</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách hoạt động</h3>
                </div>
                <div class="box-body">
                    <table id="dshoatdong" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Tên hoạt động</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Địa điểm</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($hoatdong as $hd) {
                            ?>
                            <tr>
                                <td><?php echo $hd['tenhd'] ?></td>
                                <td><?php echo $lib->dateformat($hd['tgbatdau'], 1) ?></td>
                                <td><?php echo $lib->dateformat($hd['tgketthuc'], 1) ?></td>
                                <td><?php echo $hd['diadiem'] ?></td>
                                <td><a href="index.php?prog=thongtinhoatdong&mahd=<?php echo $hd['mahd'] ?>"
                                       class="btn btn-success">Chi tiết</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách đơn đăng ký</h3>
                </div>
                <div class="box-body">
                    <table id="dsdondangky" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Ngày đăng ký</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Phỏng vấn</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($dondangky as $don) {
                            ?>
                            <tr>
                                <td><?php echo $lib->dateformat($don['ngaygianhap']) ?></td>
                                <td><?php echo $don['hoten'] ?></td>
                                <td><?php echo $lib->dateformat($don['ngaysinh']) ?></td>
                                <td><?php echo $don['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                <td><?php echo $don['quequan'] ?></td>
                                <td><?php echo $don['sdt'] ?></td>
                                <td>
                                    <?php
                                    echo $tgphongvan[$don['matv']]['sangchieu'] == 0 ? 'Sáng ' : 'Chiều ';
                                    echo $tgphongvan[$don['matv']]['ngay'];
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(function () {
        $('.datatable ').DataTable({
            "aaSorting": []
        });
    });
</script>