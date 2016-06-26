<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Hoạt động
        <small>Thông tin hoạt động</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="hoatdong" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Tên hoạt động</th>
                            <th>Thời gian bắt đầu</th>
                            <th>Thời gian kết thúc</th>
                            <th>Số người</th>
                            <th>Địa điểm</th>
                            <th>Sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $hd['tenhd'] ?></td>
                            <td><?php echo $lib->dateformat($hd['tgbatdau'], 1) ?></td>
                            <td><?php echo $lib->dateformat($hd['tgketthuc'], 1) ?></td>
                            <td><?php echo $hd['songuoi'] ?></td>
                            <td><?php echo $hd['diadiem'] ?></td>
                            <td>
                                <button type="button" class="btn btn-info edithd" data-toggle="modal"
                                        data-target="#detail" data-id="<?php echo $hd['mahd'] ?>"><i
                                        class="fa fa-pencil"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-12 collapse" id="listthanhvien">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-sm-9">
                        <h3 class="box-title">Tổng số: <span
                                class="text-red text-bold"><?php echo count($listtv) ?></span> thành viên chưa tham gia
                        </h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary pull-right" type="button" data-toggle="collapse"
                                data-target="#listthanhvien">Đóng
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="listtv" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nhóm</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Thêm vào</th>
                        </tr>
                        </thead>
                        <tbody id="listtv-body">
                        <?php foreach ($listtv as $tv) { ?>
                            <tr>
                                <td><?php echo $tv['tennhom'] ?></td>
                                <td><?php echo $tv['hoten'] ?></td>
                                <td><?php echo $lib->dateformat($tv['ngaysinh']) ?></td>
                                <td><?php echo $tv['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                <td><?php echo $tv['sdt'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success addtv"
                                            data-id="<?php echo $tv['matv'] ?>">Thêm
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nhóm</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Thêm vào</th>
                        </tr>
                        </tfoot>
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
                    <div class="col-sm-9">
                        <h3 class="box-title">Tổng số: <span
                                class="text-red text-bold"><?php echo count($thanhvien) ?></span> thành viên tham gia
                        </h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary pull-right" type="button" data-toggle="collapse"
                                data-target="#listthanhvien">Thêm mới
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="dsthanhvien" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nhóm</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Nhiệm vụ</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($thanhvien as $tv) { ?>
                            <tr>
                                <td><?php echo $tv['tennhom'] ?></td>
                                <td><?php echo $tv['hoten'] ?></td>
                                <td><?php echo $lib->dateformat($tv['ngaysinh']) ?></td>
                                <td><?php echo $tv['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                <td><?php echo $tv['sdt'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success viewtv" data-toggle="modal"
                                            data-target="#phancongnv" data-id="<?php echo $tv['matv'] ?>">Xem
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removetv"
                                            data-id="<?php echo $tv['matv'] ?>"><i class="fa fa-remove"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nhóm</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>SĐT</th>
                            <th>Nhiệm vụ</th>
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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-sm-9">
                        <h3 class="box-title">Tổng số: <span
                                class="text-red text-bold"><?php echo count($nhiemvu) ?></span> nhiệm vụ
                        </h3>
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-primary pull-right addnv" type="button" data-toggle="modal"
                                data-target="#detail">Thêm mới
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="dsnhiemvu" class="datatable table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Nội dung</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($nhiemvu as $nv) { ?>
                            <tr>
                                <td><?php echo $nv['noidung'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-info editnv" data-toggle="modal"
                                            data-target="#detail" data-id="<?php echo $nv['manv'] ?>"><i
                                            class="fa fa-pencil"></i>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removenv"
                                            data-id="<?php echo $nv['manv'] ?>"><i
                                            class="fa fa-remove"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
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
        <?php if (count($nhiemvu) > 0) { ?>
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border bg-danger">
                        <h3 class="box-title">Chi tiết phân công nhiệm vụ</h3>
                    </div>
                </div>
                <?php foreach ($nhiemvu as $nv) { ?>
                    <div class="box">
                        <div class="box-header with-border" data-toggle="collapse"
                             data-target="#nhiemvu<?php echo $nv['manv'] ?>">
                            <h3 class="box-title"><?php echo $nv['noidung'] ?></h3>
                        </div>
                        <div class="box-body collapse" id="nhiemvu<?php echo $nv['manv'] ?>">
                            <table id="dsphancong<?php echo $nv['manv'] ?>"
                                   class="datatable table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Nhóm</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>SĐT</th>
                                    <th>TG bắt đầu</th>
                                    <th>TG kết thúc</th>
                                    <th>Sửa</th>
                                    <th>Xoá</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($phancong[$nv['manv']] as $tv) {
                                    foreach ($tv['phancong'] as $pc) { ?>
                                        <tr>
                                            <td><?php echo $tv['tennhom'] ?></td>
                                            <td><?php echo $tv['hoten'] ?></td>
                                            <td><?php echo $lib->dateformat($tv['ngaysinh']) ?></td>
                                            <td><?php echo $tv['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                            <td><?php echo $tv['sdt'] ?></td>
                                            <td><?php echo $lib->dateformat($pc['tgbatdau'], 1) ?></td>
                                            <td><?php echo $lib->dateformat($pc['tgketthuc'], 1) ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info editpc" data-toggle="modal"
                                                        data-target="#detail" data-id="<?php echo $pc['mapc'] ?>"><i
                                                        class="fa fa-pencil"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger removepc"
                                                        data-id="<?php echo $pc['mapc'] ?>"><i
                                                        class="fa fa-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Nhóm</th>
                                    <th>Họ tên</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>SĐT</th>
                                    <th>TG bắt đầu</th>
                                    <th>TG kết thúc</th>
                                    <th>Sửa</th>
                                    <th>Xoá</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                <?php } ?>
            </div>
            <!-- /.col -->
        <?php } ?>
        <div id="phancongnv" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-title">Danh sách nhiệm vụ của thành viên</h4>
                    </div>
                    <div class="modal-body" id="modal-body-phancong">
                        <table id="dsphancong" class="datatable table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nhiệm vụ</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Sửa</th>
                                <th>Xoá</th>
                            </tr>
                            </thead>
                            <tbody id="table-body">

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary addpc" data-toggle="modal" data-target="#detail">
                            Thêm
                            mới
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div id="detail" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="" method="post" id="modal-form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title title">Thông tin nhiệm vụ</h4>
                        </div>
                        <div class="modal-body" id="modal-body">
                            <i class="fa fa-spinner fa-spin fa-3x"></i>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" name="btnsubmit" id="btnsubmit">Lưu</button>
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
        var table = $('.datatable');
        table.DataTable({
            "aaSorting": []
        });

        $('button.edithd').click(function () {
            $('.title').html("Thông tin hoạt động");
            $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
            $('form#modal-form').attr('action', 'index.php?prog=thongtinhoatdong&mahd=' + $(this).attr('data-id') + '&act=edithd');
            $.post('index.php?prog=hoatdong&ajax=edit', {id: $(this).attr('data-id')}, function (data) {
                $('#modal-body').html(data);
            });
        });

        $('button.addnv').click(function () {
            $('.title').html("Thông tin nhiệm vụ");
            $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
            $('form#modal-form').attr('action', 'index.php?prog=thongtinhoatdong&mahd=<?php echo $_GET["mahd"] ?>&act=addnv');
            $.post('index.php?prog=thongtinhoatdong&ajax=addnv', function (data) {
                $('#modal-body').html(data);
            });
        });

        $('button.addpc').click(function () {
            $('.title').html("Thông tin phân công");
            $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
            $('form#modal-form').attr('action', 'index.php?prog=phancong&mahd=<?php echo $_GET["mahd"] ?>&act=addpc');
            $.post('index.php?prog=phancong&ajax=addpc', {
                matv: $(this).attr('data-id'),
                mahd: <?php echo $_GET['mahd'] ?>}, function (data) {
                $('#modal-body').html(data);
            });
        });

        table.on('click', 'button', function () {
            var btn = $(this);
            if (btn.hasClass('editnv')) {
                $('.title').html("Thông tin nhiệm vụ");
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=thongtinhoatdong&mahd=<?php echo $_GET["mahd"] ?>&act=editnv&manv=' + btn.attr('data-id'));
                $.post('index.php?prog=thongtinhoatdong&ajax=editnv', {manv: btn.attr('data-id')}, function (data) {
                    $('#modal-body').html(data);
                });
            } else if (btn.hasClass('removenv')) {
                if (confirm("Xác nhận xoá?")) {
                    btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                    $.post('index.php?prog=thongtinhoatdong&ajax=removenv', {manv: btn.attr('data-id')}, function (data) {
                        if (data == 1) {
                            var r = btn.closest('tr');
                            table.DataTable().row(r).remove().draw(false);
                            alert("Xoá thành công!");
                        }
                        else alert("Có lỗi xảy ra, thử lại sau");
                    });
                    btn.html('<i class="fa fa-remove"></i>');
                }
            } else if (btn.hasClass('addtv')) {
                $.post('index.php?prog=thongtinhoatdong&ajax=addtv',
                    {
                        matv: btn.attr('data-id'),
                        mahd: <?php echo $_GET["mahd"] ?>
                    }, function (data) {
                        if (data == 1) {
                            var r = btn.closest('tr');
                            var d = table.DataTable().row(r).data();
                            d[5] = '<button type="button" class="btn btn-success viewtv" data-toggle="modal" data-target="#phancongnv" data-id="' + btn.attr('data-id') + '">Xem</button>';
                            d[6] = '<button type="button" class="btn btn-danger removetv" data-id="' + btn.attr('data-id') + '"><i class="fa fa-remove"></i></button>';
                            $('#dsthanhvien').DataTable().row.add(d).draw(false);
                            table.DataTable().row(r).remove().draw(false);
                            alert("Thêm thành công!");
                        }
                        else alert("Có lỗi xảy ra, thử lại sau");
                    });
            } else if (btn.hasClass('removetv')) {
                if (confirm("Xác nhận xoá?")) {
                    btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                    $.post('index.php?prog=thongtinhoatdong&ajax=removetv',
                        {
                            matv: btn.attr('data-id'),
                            mahd: <?php echo $_GET['mahd'] ?>
                        },
                        function (data) {
                            if (data == 1) {
                                var r = btn.closest('tr');
                                var d = table.DataTable().row(r).data();
                                d[5] = '<button type="button" class="btn btn-success addtv" data-id="' + btn.attr('data-id') + '">Thêm</button>';
                                d.splice(6, 1);
                                $('#listtv').DataTable().row.add(d).draw(false);
                                table.DataTable().row(r).remove().draw(false);
                                alert("Xoá thành công!");
                            }
                            else alert("Có lỗi xảy ra, thử lại sau");
                        });
                    btn.html('<i class="fa fa-remove"></i>');
                }
            } else if (btn.hasClass('viewtv')) {
                $('#modal-title').append('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $.post('index.php?prog=phancong&ajax=viewpc',
                    {
                        matv: btn.attr('data-id'),
                        mahd: <?php echo $_GET['mahd'] ?>
                    },
                    function (data) {
                        $('#dsphancong').DataTable().clear();
                        $('#dsphancong').DataTable().rows.add(data).draw(false);
                        $('#modal-title').html("Danh sách nhiệm vụ của thành viên");
                        $('button.addpc').attr('data-id', btn.attr('data-id'));
                    });
            } else if (btn.hasClass('editpc')) {
                $('.title').html("Phân công nhiệm vụ");
                $('#modal-body').html('<i class="fa fa-spinner fa-spin fa-3x"></i><span class="sr-only">Loading...</span>');
                $('form#modal-form').attr('action', 'index.php?prog=phancong&mahd=<?php echo $_GET["mahd"] ?>&act=eidtpc');
                $.post('index.php?prog=phancong&ajax=editpc', {
                    mapc: btn.attr('data-id'),
                    mahd:<?php echo $_GET["mahd"] ?> }, function (data) {
                    $('#modal-body').html(data);
                });
            } else if (btn.hasClass('removepc')) {
                if (confirm("Xác nhận xoá?")) {
                    btn.html('<i class="fa fa-spinner fa-spin"></i><span class="sr-only">Loading...</span>');
                    $.post('index.php?prog=phancong&ajax=removepc',
                        {
                            mapc: btn.attr('data-id')
                        }, function (data) {
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