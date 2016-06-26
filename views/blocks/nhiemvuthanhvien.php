<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nhiệm vụ</th>
        <th>TG bắt đầu</th>
        <th>TG kết thúc</th>
    </tr>
    </thead>
    <tbody>
    <?php if (count($phancong) == 0) {
        ?>
        <tr>
            <td colspan="3">Chưa nhận nhiệm vụ</td>
        </tr>
        <?php
    } else {
        foreach ($phancong as $pc) { ?>
            <tr>
                <td><?php echo $pc['noidung'] ?></td>
                <td><?php echo $lib->dateformat($pc['tgbatdau'], 1) ?></td>
                <td><?php echo $lib->dateformat($pc['tgketthuc'], 1) ?></td>
            </tr>
        <?php }
    } ?>
    </tbody>
</table>