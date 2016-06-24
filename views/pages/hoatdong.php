<section class="content-header">
    <h1>
        Hoạt động
        <small>Danh sách hoạt động</small>
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
                                class="text-red text-bold"><?php echo count($hoatdong) ?></span> hoạt động
                        </h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary pull-right add" type="button" data-toggle="modal"
                                data-target="#detail">Thêm mới
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="dshoatdong" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Tên hoạt động</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Số người</th>
                            <th>Địa điểm</th>
                            <th>Chi tiết</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($hoatdong as $hd) { ?>
                            <tr id="<?php echo $hd['mahd'] ?>">
                                <td><?php echo $hd['tenhd'] ?></td>
                                <td><?php echo $lib->dateformat($hd['tgbatdau'], 1) ?></td>
                                <td><?php echo $lib->dateformat($hd['tgketthuc'], 1) ?></td>
                                <td><?php echo $hd['songuoi'] ?></td>
                                <td><?php echo $hd['diadiem'] ?></td>
                                <td><a href="index.php?prog=thongtinhoatdong&mahd=<?php echo $hd['mahd'] ?>"
                                       class="btn btn-success">Chi tiết</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info edit" data-toggle="modal"
                                            data-target="#detail" data-id="<?php echo $hd['mahd'] ?>"><i
                                            class="fa fa-pencil"></i></button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove"
                                            data-id="<?php echo $hd['mahd'] ?>"><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Tên hoạt động</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Số người</th>
                            <th>Địa điểm</th>
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
        <div id="detail" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" id="modal-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Thông tin hoạt động</h4>
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
        var table = $('#dshoatdong');
        table.DataTable();

        $('button.add').click(function () {
            $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
            $('form#modal-form').attr('action', 'index.php?prog=hoatdong&act=add');
            $.post('index.php?prog=hoatdong&ajax=add', function (data) {
                $('#modal-body').html(data);
            });
        });
        table.on('click', 'button', function () {
            var btn = $(this);

            if (btn.hasClass('edit')) {
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=hoatdong&act=edit&id=' + btn.attr('data-id'));
                $.post('index.php?prog=hoatdong&ajax=edit', {id: btn.attr('data-id')}, function (data) {
                    $('#modal-body').html(data);
                });
            } else if (btn.hasClass('remove')) {
                if (confirm("Xác nhận xoá?")) {
                    $.post('index.php?prog=hoatdong&ajax=remove', {id: btn.attr('data-id')}, function (data) {
                        if (data == 1) {
                            table.DataTable().row('#' + btn.attr('data-id')).remove().draw(false);
                            alert("Xoá thành công!");
                        }
                        else alert("Có lỗi xảy ra, thử lại sau");
                    });
                }
            }
        });
    });
</script>