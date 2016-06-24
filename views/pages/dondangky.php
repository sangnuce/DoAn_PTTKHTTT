<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tuyển thành viên
        <small>Danh sách đơn đăng ký</small>
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
                                class="text-red text-bold"><?php echo count($dondangky) ?></span> đơn đăng ký
                        </h3>
                    </div>
                    <div class="col-sm-3">
                        <a href="index.php?prog=dangky" target="_blank" class="btn btn-primary pull-right">Thêm mới</a>
                    </div>
                </div>
                <div class="box-body">
                    <table id="dsdondangky" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Ngày đăng ký</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Phỏng vấn</th>
                            <th>Chi tiết</th>
                            <th>Duyệt</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($dondangky as $don) {
                            ?>
                            <tr id="<?php echo $don['matv'] ?>">
                                <td><?php echo date('d-m-Y', strtotime($don['ngaygianhap'])) ?></td>
                                <td><?php echo $don['hoten'] ?></td>
                                <td><?php echo ($don['ngaysinh'] == 0) ? '' : date('d-m-Y', strtotime($don['ngaysinh'])) ?></td>
                                <td><?php echo $don['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                <td><?php echo $don['quequan'] ?></td>
                                <td><?php echo $don['sdt'] ?></td>
                                <td>
                                    <?php
                                    echo $dkthoigianpv[$don['matv']]['sangchieu'] == 0 ? 'Sáng ' . $dkthoigianpv[$don['matv']]['ngay'] : 'Chiều ' . $dkthoigianpv[$don['matv']]['ngay'];
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info detail" data-toggle="modal"
                                            data-target="#detail" data-id="<?php echo $don['matv'] ?>">Chi tiết
                                    </button>
                                </td>
                                <td>
                                    <?php
                                    if ($don['tinhtrang'] == 0) {
                                        ?>
                                        <button type="button" class="btn btn-default pass"
                                                data-id="<?php echo $don['matv'] ?>"><i class="fa fa-check"></i>
                                        </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="button" class="btn btn-success unpass"
                                                data-id="<?php echo $don['matv'] ?>"><i class="fa fa-check"></i>
                                        </button>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger remove"
                                            data-id="<?php echo $don['matv'] ?>"><i class="fa fa-remove"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Ngày đăng ký</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Quê quán</th>
                            <th>SĐT</th>
                            <th>Phỏng vấn</th>
                            <th>Chi tiết</th>
                            <th>Duyệt</th>
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
                            <h4 class="modal-title">Thông tin đơn đăng ký</h4>
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
        var table = $('#dsdondangky');
        table.DataTable({
            "aaSorting": []
        });

        table.on('click', 'button', function () {
            var btn = $(this);

            if (btn.hasClass('detail')) {
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=dondangky&act=edit&id=' + btn.attr('data-id'));
                $.post('index.php?prog=dondangky&ajax=view', {id: btn.attr('data-id')}, function (data) {
                    $('#modal-body').html(data);
                });
            } else if (btn.hasClass('pass')) {
                $.post('index.php?prog=dondangky&ajax=pass', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('pass');
                        btn.addClass('unpass');
                        btn.removeClass('btn-default');
                        btn.addClass('btn-success');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
            } else if (btn.hasClass('unpass')) {
                $.post('index.php?prog=dondangky&ajax=unpass', {id: btn.attr('data-id')}, function (data) {
                    if (data == 1) {
                        btn.removeClass('unpass');
                        btn.addClass('pass');
                        btn.removeClass('btn-success');
                        btn.addClass('btn-default');
                    }
                    else alert("Có lỗi xảy ra, thử lại sau");
                });
            } else if (btn.hasClass('remove')) {
                if (confirm("Xác nhận xoá?")) {
                    $.post('index.php?prog=dondangky&ajax=remove', {id: btn.attr('data-id')}, function (data) {
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