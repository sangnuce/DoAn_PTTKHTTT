<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thành viên
        <small>Danh sách thành viên</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tổng số: <span
                            class="text-red text-bold"><?php echo count($thanhvien) + count($doitruong) ?></span> thành
                        viên</h3>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-sm-9">
                        <h3 class="box-title">Danh sách đội trưởng</h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary pull-right adddt" type="button"
                                data-toggle="modal"
                                data-target="#detail">Thêm mới
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="dsthanhvien table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Chi tiết</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
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
                                <td>
                                    <a href="index.php?prog=thongtinthanhvien&matv=<?php echo $dt['matv'] ?>"
                                       class="btn btn-primary">Chi tiết</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info edit"
                                            data-id="<?php echo $dt['matv'] ?>" data-toggle="modal"
                                            data-target="#detail"><i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove"
                                            data-id="<?php echo $dt['matv'] ?>"><i class="fa fa-remove"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Chi tiết</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <?php foreach ($nhomtv as $nhom) { ?>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $nhom['tennhom'] ?></h3>
                    </div>
                    <div class="box-body">
                        <table class="dsthanhvien table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>SĐT</th>
                                <th>Quê quán</th>
                                <th>Hoạt động</th>
                                <th>Nhóm trưởng</th>
                                <th>Chi tiết</th>
                                <th>Sửa</th>
                                <th>Xoá</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($thanhvien as $tv) {
                                if ($tv['manhom'] == $nhom['manhom']) {
                                    ?>
                                    <tr>
                                        <td><?php echo $tv['hoten'] ?></td>
                                        <td><?php echo $lib->dateformat($tv['ngaysinh']) ?></td>
                                        <td><?php echo $tv['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                        <td><?php echo $tv['sdt'] ?></td>
                                        <td><?php echo $tv['quequan'] ?></td>
                                        <td>
                                            <?php
                                            $class = 'btn-success deactive';
                                            if ($tv['tinhtrang'] == 0) $class = 'btn-default active';
                                            ?>
                                            <button type="button" class="btn <?php echo $class ?>"
                                                    data-id="<?php echo $tv['matv'] ?>"><i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <?php
                                            $class = 'btn-default manager';
                                            if ($tv['lanhomtruong'] == 1) $class = 'btn-success notmanager';
                                            ?>
                                            <button type="button" class="btn <?php echo $class ?>"
                                                    data-id="<?php echo $tv['matv'] ?>"><i class="fa fa-check"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <a href="index.php?prog=thongtinthanhvien&matv=<?php echo $tv['matv'] ?>"
                                               class="btn btn-primary">Chi tiết</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info edit"
                                                    data-id="<?php echo $tv['matv'] ?>" data-toggle="modal"
                                                    data-target="#detail"><i class="fa fa-pencil"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove"
                                                    data-id="<?php echo $tv['matv'] ?>"><i class="fa fa-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>SĐT</th>
                                <th>Quê quán</th>
                                <th>Hoạt động</th>
                                <th>Nhóm trưởng</th>
                                <th>Chi tiết</th>
                                <th>Sửa</th>
                                <th>Xoá</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        <?php } ?>
        <div id="detail" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <form action="" method="post" id="modal-form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Thông tin thành viên</h4>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <i class="fa fa-spinner fa-spin fa-3x"></i>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" name="btnsubmit">Lưu</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(function () {
        var table = $('.dsthanhvien');
        table.DataTable({
            "aaSorting": []
        });
        $('button.adddt').click(function () {
            $('.modal-title').html("Thêm mới đội trưởng");
            $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
            $('form#modal-form').attr('action', 'index.php?prog=thanhvien&act=adddt');
            $.post('index.php?prog=thanhvien&ajax=adddt', function (data) {
                $('#modal-body').html(data);
            });
        });
        table.on('click', 'button', function () {
            var btn = $(this);

            if (btn.hasClass('edit')) {
                $('.modal-title').html("Thông tin thành viên");
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=thanhvien&act=edit&matv=' + btn.attr('data-id'));
                $.post('index.php?prog=thanhvien&ajax=edit', {id: btn.attr('data-id')}, function (data) {
                    $('#modal-body').html(data);
                });
            } else if (btn.hasClass('active')) {
                btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                $.post('index.php?prog=thanhvien&ajax=active', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('active');
                        btn.addClass('deactive');
                        btn.removeClass('btn-default');
                        btn.addClass('btn-success');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
                btn.html('<i class="fa fa-check"></i>');
            } else if (btn.hasClass('deactive')) {
                btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                $.post('index.php?prog=thanhvien&ajax=deactive', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('deactive');
                        btn.addClass('active');
                        btn.removeClass('btn-success');
                        btn.addClass('btn-default');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
                btn.html('<i class="fa fa-check"></i>');
            } else if (btn.hasClass('manager')) {
                btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                $.post('index.php?prog=thanhvien&ajax=manager', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('manager');
                        btn.addClass('notmanager');
                        btn.removeClass('btn-default');
                        btn.addClass('btn-success');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
                btn.html('<i class="fa fa-check"></i>');
            } else if (btn.hasClass('notmanager')) {
                btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                $.post('index.php?prog=thanhvien&ajax=notmanager', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('notmanager');
                        btn.addClass('manager');
                        btn.removeClass('btn-success');
                        btn.addClass('btn-default');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
                btn.html('<i class="fa fa-check"></i>');
            } else if (btn.hasClass('remove')) {
                if (confirm("Xác nhận xoá?")) {
                    btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                    $.post('index.php?prog=thanhvien&ajax=remove', {id: btn.attr('data-id')}, function (data) {
                        if (data == 1) {
                            var r = btn.closest('tr');
                            table.DataTable().row(r).remove().draw(false);
                        }
                        else alert("Có lỗi xảy ra, thử lại sau");
                    });
                    btn.html('<i class="fa fa-remove"></i>');
                }
            }
        });
    });
</script>