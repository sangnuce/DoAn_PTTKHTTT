<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tài khoản
        <small>Danh sách tài khoản</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-sm-9">
                        <h3 class="box-title">Tổng số: <span
                                class="text-red text-bold"><?php echo count($taikhoan) ?></span> tài khoản</h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary pull-right add" type="button"
                                data-toggle="modal"
                                data-target="#detail">Thêm mới
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="dstaikhoan" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($taikhoan as $tk) {
                            ?>
                            <tr>
                                <td><?php echo $tk['hoten'] ?></td>
                                <td><?php echo $lib->dateformat($tk['ngaysinh']) ?></td>
                                <td><?php echo $tk['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                <td><?php echo $tk['sdt'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger remove"
                                            data-id="<?php echo $tk['matv'] ?>"><i
                                            class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
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
        <div id="detail" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" id="modal-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Thông tin tài khoản</h4>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <i class="fa fa-spinner fa-spin fa-3x"></i>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" name="btnsubmit">Lưu</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(function () {
        var table = $('#dstaikhoan');
        table.DataTable();

        $('button.add').click(function () {
            $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
            $('form#modal-form').attr('action', 'index.php?prog=taikhoan&act=add');
            $.post('index.php?prog=taikhoan&ajax=add', function (data) {
                $('#modal-body').html(data);
            });
        });
        table.on('click', 'button', function () {
            var btn = $(this);
            if (btn.hasClass('remove')) {
                if (confirm("Xác nhận xoá?")) {
                    btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                    $.post('index.php?prog=taikhoan&ajax=remove', {id: btn.attr('data-id')}, function (data) {
                        if (data == 1) {
                            var r = btn.closest('tr');
                            table.DataTable().row(r).remove().draw(false);
                            alert("Xoá thành công!");
                        }
                        else alert("Có lỗi xảy ra, thử lại sau");
                    });
                    btn.html('<i class="fa fa-remove"></i>');
                }
            }
        });
    });
</script>