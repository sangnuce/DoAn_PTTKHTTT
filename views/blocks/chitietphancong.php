<div class="form-group">
    <label>Thành viên *</label>
    <select class="form-control" name="matv">
        <?php foreach ($thanhvien as $tv) { ?>
            <option
                value="<?php echo $tv['matv'] ?>" <?php echo isset($pc['matv']) && $pc['matv'] == $tv['matv'] ? 'selected' : '' ?>><?php echo $tv['hoten'] ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group">
    <label>Nhiệm vụ *</label>
    <select class="form-control" name="manv">
        <?php foreach ($nhiemvu as $nv) { ?>
            <option
                value="<?php echo $nv['manv'] ?>" <?php echo isset($pc['manv']) && $pc['manv'] == $nv['manv'] ? 'selected' : '' ?>><?php echo $nv['noidung'] ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group">
    <label>Thời gian bắt đầu *</label>
    <input class="form-control" type="datetime-local" name="tgbatdau"
           value="<?php echo isset($pc['tgbatdau']) ? date('Y-m-d\TH:i', strtotime($pc['tgbatdau'])) : '' ?>" required>
</div>
<div class="form-group">
    <label>Thời gian kết thúc</label>
    <input class="form-control" type="datetime-local" name="tgketthuc"
           value="<?php echo isset($pc['tgketthuc']) ? date('Y-m-d\TH:i', strtotime($pc['tgketthuc'])) : '' ?>">
</div>
<?php if ($_GET['ajax'] == 'editpc') { ?>
    <input type="hidden" name="mapc" value="<?php echo $pc['mapc'] ?>">
<?php } ?>