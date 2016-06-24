<?php
$rs = array();
foreach ($phancong as $pc) {
    $row[0] = $pc['noidung'];
    $row[1] = $lib->dateformat($pc['tgbatdau'], 1);
    $row[2] = $lib->dateformat($pc['tgketthuc'], 1);
    $row[3] = '<button type="button" class="btn btn-info editpc" data-toggle="modal" data-target="#detail" data-id="' . $pc['mapc'] . '"><i class="fa fa-pencil"></i></button>';
    $row[4] = '<button type = "button" class="btn btn-danger removepc" data-id = "' . $pc['mapc'] . '" ><i class="fa fa-remove" ></i></button>';
    $rs[] = $row;
}
die(json_encode($rs));
?>