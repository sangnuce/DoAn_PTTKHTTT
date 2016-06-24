<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tuyển thành viên
        <small>Danh sách được tuyển</small>
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
                <div class="box-body">
                    <form action="" method="post" id="form">
                        <table id="dsthanhvien" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Giới tính</th>
                                <th>Quê quán</th>
                                <th>SĐT</th>
                                <th>Nhóm</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($thanhvien as $tv) {
                                ?>
                                <tr>
                                    <td><?php echo $tv['hoten'] ?></td>
                                    <td><?php echo ($tv['ngaysinh'] != 0) ? date('d-m-Y', strtotime($tv['ngaysinh'])) : '' ?></td>
                                    <td><?php echo $tv['gioitinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                    <td><?php echo $tv['quequan'] ?></td>
                                    <td><?php echo $tv['sdt'] ?></td>
                                    <td>
                                        <select class="form-control" name="nhomtv[<?php echo $tv['matv'] ?>]"
                                                data-id="<?php echo $tv['matv'] ?>">
                                            <?php
                                            foreach ($nhomtv as $nhom) {
                                                echo '<option value="' . $nhom['manhom'] . '">' . $nhom['tennhom'] . '</option>';
                                            }
                                            ?>
                                        </select>
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
                                <th>Nhóm</th>
                            </tr>
                            </tfoot>
                        </table>
                        <button class="btn btn-primary" type="submit" name="btnsubmit">Lưu</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<script>
    $(function () {
        $('#dsthanhvien').DataTable();

        $('#form').submit(function () {
            var form = this;
            var visibleIDs = [];
            $(form).find("select").each(function (i, visibleInput) {
                var visibleID = $(visibleInput).attr("data-id");
                if (visibleID != undefined) {
                    visibleIDs.push(visibleID);
                }
            });
            $(form).find("#dsthanhvien").each(function (j, table) {
                $(table).DataTable().$("select").each(function (k, item) {
                    var useInput = true;
                    // var useInput = $(item).prop("checked");
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