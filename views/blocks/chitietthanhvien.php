<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nhóm</label>
            <select class="form-control"
                    name="manhom" <?php echo (isset($tv['ladoitruong']) && $tv['ladoitruong'] == 1) || (isset($tv['lanhomtruong']) && $tv['lanhomtruong'] == 1) ? 'disabled' : '' ?>>
                <?php if (isset($tv['ladoitruong']) && $tv['ladoitruong'] == 1) { ?>
                    <option value="0">Chọn nhóm</option>
                <?php } else {
                    foreach ($nhomtv as $nhom) { ?>
                        <option
                            value="<?php echo $nhom['manhom'] ?>" <?php echo isset($tv['manhom']) && $tv['manhom'] == $nhom['manhom'] ? 'selected' : '' ?>><?php echo $nhom['tennhom'] ?></option>
                    <?php }
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Lớp</label>
            <input class="form-control" type="text" name="lop"
                   value="<?php echo isset($tv['lop']) ? $tv['lop'] : '' ?>">
        </div>
        <div class="form-group">
            <label>Ngày sinh</label>
            <input class="form-control" type="date" name="ngaysinh"
                   value="<?php echo isset($tv['ngaysinh']) ? $tv['ngaysinh'] : '' ?>">
        </div>
        <div class="form-group">
            <label>Quê quán</label>
            <input class="form-control" type="text" name="quequan"
                   value="<?php echo isset($tv['quequan']) ? $tv['quequan'] : '' ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Họ tên *</label>
            <input class="form-control" type="text" name="hoten"
                   value="<?php echo isset($tv['hoten']) ? $tv['hoten'] : '' ?>">
        </div>
        <div class="form-group">
            <label>MSSV</label>
            <input class="form-control" type="text" name="mssv"
                   value="<?php echo isset($tv['mssv']) ? $tv['mssv'] : '' ?>">
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <select class="form-control" name="gioitinh">
                <option value="1" <?php echo isset($tv['gioitinh']) && $tv['gioitinh'] == 1 ? 'selected' : '' ?>>Nam
                </option>
                <option value="0" <?php echo isset($tv['gioitinh']) && $tv['gioitinh'] == 0 ? 'selected' : '' ?>>Nữ
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Số điện thoại *</label>
            <input class="form-control" type="text" name="sdt"
                   value="<?php echo isset($tv['sdt']) ? $tv['sdt'] : '' ?>">
        </div>
    </div>
</div>
<div class="form-group">
    <label>Địa chỉ hiện tại</label>
    <input class="form-control" type="text" name="diachi"
           value="<?php echo isset($tv['diachi']) ? $tv['diachi'] : '' ?>">
</div>
<div class="form-group">
    <label>Ngày gia nhập</label>
    <input class="form-control" type="date" name="ngaygianhap"
           value="<?php echo isset($tv['ngaygianhap']) ? $tv['ngaygianhap'] : '' ?>">
</div>