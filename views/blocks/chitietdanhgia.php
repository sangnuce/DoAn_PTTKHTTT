<div class="form-group">
    <label>Họ tên</label>
    <input class="form-control" type="text" name="hoten" value="<?php echo isset($kq['hoten']) ? $kq['hoten'] : '' ?>"
           disabled>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Ngày sinh</label>
            <input class="form-control" type="date" name="ngaysinh"
                   value="<?php echo isset($kq['ngaysinh']) ? $kq['ngaysinh'] : '' ?>" disabled>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Giới tính</label>
            <select name="gioitinh" class="form-control" disabled>
                <option value="1" <?php echo (isset($kq['gioitinh']) && $kq['gioitinh'] == 1) ? 'selected' : '' ?>>Nam
                </option>
                <option value="0" <?php echo (isset($kq['gioitinh']) && $kq['gioitinh'] == 0) ? 'selected' : '' ?>>Nữ
                </option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Phỏng vấn *</label>
    <select name="quaphongvan" class="form-control">
        <option value="1" <?php echo (isset($kq['quaphongvan']) && $kq['quaphongvan'] == 1) ? 'selected' : '' ?>>Đạt</option>
        <option value="0" <?php echo (isset($kq['quaphongvan']) && $kq['quaphongvan'] == 0) ? 'selected' : '' ?>>Không đạt
        </option>
    </select>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>TeamGame *</label>
            <input class="form-control" type="text" name="teamgame"
                   value="<?php echo isset($kq['teamgame']) ? $kq['teamgame'] : '' ?>">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>TeamWork *</label>
            <input class="form-control" type="text" name="teamwork"
                   value="<?php echo isset($kq['teamwork']) ? $kq['teamwork'] : '' ?>">
        </div>
    </div>
</div>