<div class="form-group">
    <label>Tên hoạt động *</label>
    <input class="form-control" type="text" name="tenhd"
           value="<?php echo isset($hd['tenhd']) ? $hd['tenhd'] : '' ?>">
</div>
<div class="form-group">
    <label>Thời gian bắt đầu *</label>
    <input class="form-control" type="datetime-local" name="tgbatdau"
           value="<?php echo isset($hd['tgbatdau']) ? date('Y-m-d\TH:i',strtotime($hd['tgbatdau'])) : '' ?>">
</div>
<div class="form-group">
    <label>Thời gian kết thúc</label>
    <input class="form-control" type="datetime-local" name="tgketthuc"
           value="<?php echo isset($hd['tgketthuc']) ? date('Y-m-d\TH:i',strtotime($hd['tgketthuc'])) : '' ?>">
</div>
<div class="form-group">
    <label>Số người</label>
    <input class="form-control" type="text" name="songuoi"
           value="<?php echo isset($hd['songuoi']) ? $hd['songuoi'] : '' ?>">
</div>
<div class="form-group">
    <label>Địa điểm *</label>
    <input class="form-control" type="text" name="diadiem"
           value="<?php echo isset($hd['diadiem']) ? $hd['diadiem'] : '' ?>">
</div>