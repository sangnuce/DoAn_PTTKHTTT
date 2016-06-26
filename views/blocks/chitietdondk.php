<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Ngày đăng ký</label>
            <input class="form-control" type="date" name="ngaygianhap" value="<?php echo $don['ngaygianhap'] ?>" disabled>
        </div>
        <div class="form-group">
            <label>Lớp</label>
            <input class="form-control" type="text" name="lop"
                   value="<?php echo $don['lop'] ?>">
        </div>
        <div class="form-group">
            <label>Ngày sinh</label>
            <input class="form-control" type="date" name="ngaysinh"
                   value="<?php echo $don['ngaysinh'] ?>">
        </div>
        <div class="form-group">
            <label>Quê quán</label>
            <input class="form-control" type="text" name="quequan"
                   value="<?php echo $don['quequan'] ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Họ tên *</label>
            <input class="form-control" type="text" name="hoten"
                   value="<?php echo $don['hoten'] ?>">
        </div>
        <div class="form-group">
            <label>MSSV</label>
            <input class="form-control" type="text" name="mssv"
                   value="<?php echo $don['mssv'] ?>">
        </div>
        <div class="form-group">
            <label>Giới tính</label>
            <select class="form-control" name="gioitinh">
                <option
                    value="1" <?php echo ($don['gioitinh'] == 1) ? 'selected' : '' ?>>
                    Nam
                </option>
                <option
                    value="0" <?php echo ($don['gioitinh'] == 0) ? 'selected' : '' ?>>
                    Nữ
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Số điện thoại *</label>
            <input class="form-control" type="text" name="sdt"
                   value="<?php echo $don['sdt'] ?>">
        </div>
    </div>
</div>
<div class="form-group">
    <label>Địa chỉ</label>
    <input class="form-control" type="text" name="diachi"
           value="<?php echo $don['diachi'] ?>">
</div>
<?php
foreach ($cauhoi as $ch) {
    ?>
    <div class="form-group">
        <label><?php echo $ch['noidung'] ?> *</label>
            <textarea class="form-control" style="resize: vertical"
                      name="cauhoi[<?php echo $ch['mach'] ?>]"><?php echo isset($traloi[$don['matv']][$ch['mach']]) ? $traloi[$don['matv']][$ch['mach']] : '' ?></textarea>
    </div>
<?php } ?>
<div class="form-group">
    <label>Thời gian phỏng vấn *</label>
    <select name="tgphongvan" class="form-control">
        <?php
        foreach ($thoigianpv as $tg) {
            ?>
            <option value="<?php echo $tg['matg'] ?>" <?php echo ($dkthoigianpv[$don['matv']]['matg'] == $tg['matg']) ? 'selected' : '' ?>>
                <?php echo $tg['sangchieu'] == 0 ? 'Sáng ' . $tg['ngay'] : 'Chiều ' . $tg['ngay'] ?>
            </option>
        <?php } ?>
    </select>
</div>