<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Đơn đăng ký
        <small>Danh sách câu hỏi</small>
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
                                class="text-red text-bold"><?php echo count($cauhoi) ?></span> câu hỏi</h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary pull-right add" type="button"
                                data-toggle="modal"
                                data-target="#detail">Thêm mới
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="dscauhoidk" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Mã câu hỏi</th>
                            <th>Nội dung</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($cauhoi as $ch) {
                            ?>
                            <tr id="<?php echo $ch['mach'] ?>">
                                <td><?php echo $ch['mach'] ?></td>
                                <td><?php echo $ch['noidung'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-info edit" data-toggle="modal"
                                            data-target="#detail" data-id="<?php echo $ch['mach'] ?>"><i
                                            class="fa fa-pencil"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove"
                                            data-id="<?php echo $ch['mach'] ?>"><i
                                            class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Mã câu hỏi</th>
                            <th>Nội dung</th>
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
                            <h4 class="modal-title">Thông tin câu hỏi</h4>
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
        var table = $('#dscauhoidk');
        table.DataTable();

        $('button.add').click(function () {
            $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
            $('form#modal-form').attr('action', 'index.php?prog=cauhoidk&act=add');
            $.post('index.php?prog=cauhoidk&ajax=add', function (data) {
                $('#modal-body').html(data);
            });
        });
        table.on('click', 'button', function () {
            var btn = $(this);

            if (btn.hasClass('edit')) {
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=cauhoidk&act=edit&id=' + btn.attr('data-id'));
                $.post('index.php?prog=cauhoidk&ajax=edit', {id: btn.attr('data-id')}, function (data) {
                    $('#modal-body').html(data);
                });
            } else if (btn.hasClass('remove')) {
                if (confirm("Xác nhận xoá?")) {
                    $.post('index.php?prog=cauhoidk&ajax=remove', {id: btn.attr('data-id')}, function (data) {
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