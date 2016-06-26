<div class="form-group">
    <label>Tên hoạt động *</label>
    <input class="form-control" type="text" name="tenhd"
           value="<?php echo isset($hd['tenhd']) ? $hd['tenhd'] : '' ?>" required>
</div>
<div class="form-group">
    <label>Thời gian bắt đầu *</label>
    <input class="form-control" type="datetime-local" name="tgbatdau"
           value="<?php echo isset($hd['tgbatdau']) ? date('Y-m-d\TH:i',strtotime($hd['tgbatdau'])) : '' ?>" required>
</div>
<div class="form-group">
    <label>Thời gian kết thúc</label>
    <input class="form-control" type="datetime-local" name="tgketthuc"
           value="<?php echo isset($hd['tgketthuc']) ? date('Y-m-d\TH:i',strtotime($hd['tgketthuc'])) : '' ?>" required>
</div>
<div class="form-group">
    <label>Số người</label>
    <input class="form-control" type="number" min="0" name="songuoi"
           value="<?php echo isset($hd['songuoi']) ? $hd['songuoi'] : '0' ?>">
</div>
<div class="form-group">
    <label>Địa điểm *</label>
    <input class="form-control" type="text" name="diadiem"
           value="<?php echo isset($hd['diadiem']) ? $hd['diadiem'] : '' ?>" required>
</div>