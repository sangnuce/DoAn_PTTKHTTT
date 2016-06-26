<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tuyển thành viên
        <small>Cài đặt</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="dscaidat" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nội dung</th>
                            <th>Tình trạng</th>
                            <th>Mô tả</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Nhận đơn</td>
                            <td>
                                <?php
                                $class = "btn-success";
                                if ($tuyentv['nhandon'] == 0) $class = "btn-default";
                                ?>
                                <button type="button" class="btn <?php echo $class ?> update" data-name="nhandon">
                                    <i class="fa fa-check"></i>
                                </button>
                            </td>
                            <td>Đóng / mở chức năng nhận đơn đăng ký tuyển thành viên</td>
                        </tr>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-danger delete" data-name="tinhtrang">Xoá dữ liệu
                                </button>
                            </td>
                            <td>&nbsp;</td>
                            <td>Xoá các dữ liệu đơn đăng ký sau khi tuyển thành viên</td>
                        </tr>
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
        var table = $('#dscaidat');

        table.on('click', 'button', function () {
            var btn = $(this);

            if (btn.hasClass('update')) {
                btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');

                var giatri = 0;
                if (btn.hasClass('btn-default')) giatri = 1;

                $.post('index.php?prog=caidattuyentv&ajax=update', {
                    thuoctinh: btn.attr('data-name'),
                    giatri: giatri
                }, function (data) {
                    if (data == 1) {
                        if (giatri == 1) {
                            btn.removeClass('btn-default');
                            btn.addClass('btn-success');
                        } else {
                            btn.removeClass('btn-success');
                            btn.addClass('btn-default');
                        }
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
                btn.html('<i class="fa fa-check"></i>');
            } else if (btn.hasClass('delete')) {
                if (confirm("Xác nhận xoá tất cả thông tin đơn đăng ký tuyển thành viên?")) {
                    btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                    $.post('index.php?prog=caidattuyentv&ajax=delete', function (data) {
                        if (data == 1) {
                            window.location.href = "index.php?prog=caidattuyentv";
                        }
                        else alert("Có lỗi xảy ra, thử lại sau");
                    });
                    btn.html('<i class="fa fa-remove"></i>');
                }
            }
        });
    });
</script>