<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nhóm</label>
            <select class="form-control" name="manhom">
                <?php foreach ($nhomtv as $nhom) { ?>
                    <option
                        value="<?php echo $nhom['manhom'] ?>" <?php echo isset($tv['manhom']) && $tv['manhom'] == $nhom['manhom'] ? 'selected' : '' ?>><?php echo $nhom['tennhom'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Lớp</label>
            <input class="form-control" type="text" value="58PM2">
        </div>
        <div class="form-group">
            <label>Ngày sinh</label>
            <input class="form-control" type="date" value="1995-11-25">
        </div>
        <div class="form-group">
            <label>Quê quán</label>
            <input class="form-control" type="text" value="Hà Nội">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Họ tên</label>
            <input class="form-control" type="text" value="Nguyễn Văn A">
        </div>
        <div class="form-group">
            <label>MSSV</label>
            <input class="form-control" type="text" value="1323458">
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <select class="form-control">
                <option value="">Nam</option>
                <option value="">Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" type="text" value="1323458">
        </div>
    </div>
</div>
<div class="form-group">
    <label>Địa chỉ</label>
    <input class="form-control" type="text"
           value="55 Giải Phóng, Hai Bà Trưng, Hà Nội">
</div>
<div class="form-group">
    <label>Ngày gia nhập</label>
    <input class="form-control" type="date" value="2015-10-15">
</div>