<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tuyển thành viên
        <small>Bảng đánh giá</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tổng số: <span class="text-red text-bold"><?php echo count($ketqua) ?></span>
                        đơn</h3>
                </div>
                <div class="box-body">
                    <form action="index.php?prog=chianhom" method="post" id="form">
                        <table id="dsdanhgia" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Chọn</th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Phỏng vấn</th>
                                <th>TeamGame</th>
                                <th>TeamWork</th>
                                <th>Tổng điểm</th>
                                <th>Sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($ketqua as $kq) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="checkbox icheck">
                                            <input type="checkbox" name="matv[]" value="<?php echo $kq['matv'] ?>"
                                                   data-id="<?php echo $kq['matv'] ?>">
                                        </div>
                                    </td>
                                    <td><?php echo $kq['hoten'] ?></td>
                                    <td><?php echo $lib->dateformat($kq['ngaysinh']) ?></td>
                                    <td><?php echo ($kq['gioitinh'] == 1) ? 'Nam' : 'Nữ' ?></td>
                                    <td><?php echo ($kq['quaphongvan'] == 1) ? 'Đạt' : 'Không đạt' ?></td>
                                    <td><?php echo $kq['teamgame'] ?></td>
                                    <td><?php echo $kq['teamwork'] ?></td>
                                    <td><?php echo $kq['tongdiem'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info edit" data-toggle="modal"
                                                data-target="#detail" data-id="<?php echo $kq['matv'] ?>"><i
                                                class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Chọn</th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Phỏng vấn</th>
                                <th>TeamGame</th>
                                <th>TeamWork</th>
                                <th>Tổng điểm</th>
                                <th>Sửa</th>
                            </tr>
                            </tfoot>
                        </table>
                        <button class="btn btn-primary" type="submit" name="btnduyet">Duyệt</button>
                    </form>
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
                            <h4 class="modal-title">Đánh giá tuyển thành viên</h4>
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
<!-- iCheck -->
<script src="<?php echo BASE_URL ?>/views/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
        var table = $('#dsdanhgia');
        table.DataTable();

        table.on('click', 'button', function () {
            var btn = $(this);
            if (btn.hasClass('edit')) {
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=danhgia&act=edit&id=' + btn.attr('data-id'));
                $.post('index.php?prog=danhgia&ajax=edit', {id: btn.attr('data-id')}, function (data) {
                    $('#modal-body').html(data);
                });
            }
        });

        $('#form').submit(function () {
            var form = this;
            var visibleIDs = [];
            $(form).find("input").each(function (i, visibleInput) {
                var visibleID = $(visibleInput).attr("data-id");
                if (visibleID != undefined) {
                    visibleIDs.push(visibleID);
                }
            });
            $(form).find("#dsdanhgia").each(function (j, table) {
                $(table).DataTable().$("input").each(function (k, item) {
                    //var useInput = true;
                    var useInput = $(item).prop("checked");
                    if (useInput) {
                        var newID = $(item).attr("data-id");
                        if (visibleIDs.indexOf(newID) == -1) {
                            var input = '<input type="hidden" name="' + $(item).attr('name') + '" value="' + $(item).prop('value') + '">';
                            $(form).append(input);
                        }
                    }
                });
            });
        });
    });
</script>