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
                            class="text-red text-bold"><?php echo count($thanhvien) ?></span> thành viên</h3>
                </div>
            </div>
        </div>
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
                                <th>Ngày gia nhập</th>
                                <th>Chi tiết</th>
                                <th>Trạng thái</th>
                                <th>Xoá</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($thanhvien as $tv) {
                                if ($tv['manhom'] == $nhom['manhom']) {
                                    ?>
                                    <tr id="<?php echo $tv['matv'] ?>" <?php echo ($tv['lanhomtruong'] == 1 || $tv['ladoitruong'] == 1) ? 'class="info"' : '' ?>>
                                        <td><?php echo $tv['hoten'] ?></td>
                                        <td><?php echo $tv['ngaysinh'] != 0 ? date('d-m-Y', strtotime($tv['ngaysinh'])) : '' ?></td>
                                        <td><?php echo $tv['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                        <td><?php echo $tv['sdt'] ?></td>
                                        <td><?php echo $tv['quequan'] ?></td>
                                        <td><?php echo $tv['ngaygianhap'] != 0 ? date('d-m-Y', strtotime($tv['ngaygianhap'])) : '' ?></td>
                                        <td>
                                            <button type="button" class="btn btn-info detail" data-toggle="modal"
                                                    data-target="#detail" data-id="<?php echo $tv['matv'] ?>">Chi
                                                tiết
                                            </button>
                                        </td>
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
                                <th>Ngày gia nhập</th>
                                <th>Chi tiết</th>
                                <th>Trạng thái</th>
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
                <form action="" method="post" id="model-form">
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
                            <button type="submit" class="btn btn-primary">Lưu</button>
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
        table.DataTable();

        table.on('click', 'button', function () {
            var btn = $(this);

            if (btn.hasClass('detail')) {
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=thanhvien&act=edit&id=' + btn.attr('data-id'));
                $.post('index.php?prog=thanhvien&ajax=view', {id: btn.attr('data-id')}, function (data) {
                    $('#modal-body').html(data);
                });
            } else if (btn.hasClass('active')) {
                $.post('index.php?prog=thanhvien&ajax=pass', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('active');
                        btn.addClass('deactive');
                        btn.removeClass('btn-default');
                        btn.addClass('btn-success');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
            } else if (btn.hasClass('deactive')) {
                $.post('index.php?prog=thanhvien&ajax=unpass', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('deactive');
                        btn.addClass('active');
                        btn.removeClass('btn-success');
                        btn.addClass('btn-default');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
            } else if (btn.hasClass('remove')) {
                if (confirm("Xác nhận xoá?")) {
                    $.post('index.php?prog=thanhvien&ajax=remove', {id: btn.attr('data-id')}, function (data) {
                        if (data == 1) {
                            table.DataTable().row('#' + btn.attr('data-id')).remove().draw(false);
                        }
                        else alert("Có lỗi xảy ra, thử lại sau");
                    });
                }
            }
        });
    });
</script>