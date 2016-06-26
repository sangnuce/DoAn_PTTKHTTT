<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thành viên
        <small>Thông tin thành viên</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <form action="" method="post" id="modal-form">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nhóm</label>
                                    <select class="form-control"
                                            name="manhom" <?php echo (isset($tv['ladoitruong']) && $tv['ladoitruong'] == 1) || (isset($tv['lanhomtruong']) && $tv['lanhomtruong'] == 1) ? 'disabled' : '' ?>>
                                        <?php if (isset($tv['ladoitruong']) && $tv['ladoitruong'] == 1) { ?>
                                            <option value="0">Chọn nhóm</option>
                                        <?php } else {
                                            foreach ($nhomtv as $nhom) { ?>
                                                <option
                                                    value="<?php echo $nhom['manhom'] ?>" <?php echo isset($tv['manhom']) && $tv['manhom'] == $nhom['manhom'] ? 'selected' : '' ?>><?php echo $nhom['tennhom'] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input class="form-control" type="date" name="ngaysinh"
                                           value="<?php echo isset($tv['ngaysinh']) ? $tv['ngaysinh'] : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ hiện tại</label>
                                    <input class="form-control" type="text" name="diachi"
                                           value="<?php echo isset($tv['diachi']) ? $tv['diachi'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>Họ tên *</label>
                                    <input class="form-control" type="text" name="hoten"
                                           value="<?php echo isset($tv['hoten']) ? $tv['hoten'] : '' ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select class="form-control" name="gioitinh">
                                        <option
                                            value="1" <?php echo isset($tv['gioitinh']) && $tv['gioitinh'] == 1 ? 'selected' : '' ?>>
                                            Nam
                                        </option>
                                        <option
                                            value="0" <?php echo isset($tv['gioitinh']) && $tv['gioitinh'] == 0 ? 'selected' : '' ?>>
                                            Nữ
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ngày gia nhập</label>
                                    <input class="form-control" type="date" name="ngaygianhap"
                                           value="<?php echo isset($tv['ngaygianhap']) ? $tv['ngaygianhap'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>Lớp</label>
                                    <input class="form-control" type="text" name="lop"
                                           value="<?php echo isset($tv['lop']) ? $tv['lop'] : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label>Quê quán</label>
                                    <input class="form-control" type="text" name="quequan"
                                           value="<?php echo isset($tv['quequan']) ? $tv['quequan'] : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <select class="form-control" name="tinhtrang">
                                        <option
                                            value="1" <?php echo isset($tv['tinhtrang']) && $tv['tinhtrang'] == 1 ? 'selected' : '' ?>>
                                            Còn hoạt động
                                        </option>
                                        <option
                                            value="0" <?php echo isset($tv['tinhtrang']) && $tv['tinhtrang'] == 0 ? 'selected' : '' ?>>
                                            Đã nghỉ
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>MSSV</label>
                                    <input class="form-control" type="text" name="mssv"
                                           value="<?php echo isset($tv['mssv']) ? $tv['mssv'] : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại *</label>
                                    <input class="form-control" type="number" name="sdt"
                                           value="<?php echo isset($tv['sdt']) ? $tv['sdt'] : '' ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ</label>
                                    <select class="form-control"
                                            name="chucvu" <?php echo isset($tv['ladoitruong']) && $tv['ladoitruong'] == 1 ? 'disabled' : '' ?>>
                                        <option
                                            value="0" <?php echo isset($tv['lanhomtruong']) && $tv['lanhomtruong'] == 0 ? 'selected' : '' ?>>
                                            Thành viên
                                        </option>
                                        <option
                                            value="1" <?php echo isset($tv['lanhomtruong']) && $tv['lanhomtruong'] == 1 ? 'selected' : '' ?>>
                                            Nhóm trưởng
                                        </option>
                                        <option
                                            value="2" <?php echo isset($tv['ladoitruong']) && $tv['ladoitruong'] == 1 ? 'selected' : '' ?>>
                                            Đội trưởng
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right" name="btnsubmit">Lưu</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tổng số: <span
                            class="text-red text-bold"><?php echo count($hoatdong) ?></span> hoạt động đã tham gia
                    </h3>
                </div>
                <div class="box-body">
                    <table id="dshoatdong" class="datatable table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>&nbsp;</th>
                            <th>Tên hoạt động</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Số người</th>
                            <th>Địa điểm</th>
                            <th>Chi tiết</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($hoatdong as $hd) { ?>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-success plus"
                                            data-id="<?php echo $hd['mahd'] ?>"><i
                                            class="fa fa-plus"></i>
                                    </button>
                                </td>
                                <td><?php echo $hd['tenhd'] ?></td>
                                <td><?php echo $lib->dateformat($hd['tgbatdau'], 1) ?></td>
                                <td><?php echo $lib->dateformat($hd['tgketthuc'], 1) ?></td>
                                <td><?php echo $hd['songuoi'] ?></td>
                                <td><?php echo $hd['diadiem'] ?></td>
                                <td>
                                    <a href="index.php?prog=thongtinhoatdong&mahd=<?php echo $hd['mahd'] ?>"
                                       class="btn btn-info">Xem</a>
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
        var table = $('.datatable');
        table.DataTable({
            "aaSorting": []
        });

        table.on('click', 'button', function () {
            var btn = $(this);
            var r = table.DataTable().row(btn.closest('tr'));
            if (btn.hasClass('plus')) {
                btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                $.post('index.php?prog=thongtinthanhvien&ajax=viewpc', {
                    mahd: btn.attr('data-id'),
                    matv:<?php echo $_GET['matv'] ?>
                }, function (data) {
                    r.child(data).show();
                    btn.removeClass('plus');
                    btn.addClass('minus');
                    btn.html('<i class="fa fa-minus"></i>');
                });
            } else if (btn.hasClass('minus')) {
                r.child().hide();
                btn.removeClass('minus');
                btn.addClass('plus');
                btn.html('<i class="fa fa-plus"></i>');
            }
        });
    });
</script>