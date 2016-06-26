<div class="form-group">
    <label>Buổi *</label>
    <select class="form-control" name="sangchieu">
        <option value="0" <?php echo (isset($tg['sangchieu']) && $tg['sangchieu'] == 0) ? 'selected' : '' ?>>Sáng
        </option>
        <option value="1" <?php echo (isset($tg['sangchieu']) && $tg['sangchieu'] == 1) ? 'selected' : '' ?>>Chiều
        </option>
    </select>
</div>
<div class="form-group">
    <label>Ngày *</label>
    <input type="date" class="form-control" name="ngay" value="<?php echo isset($tg['ngay']) ? $tg['ngay'] : '' ?>"
           required>
</div>