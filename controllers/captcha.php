<?php
session_start();

$str = md5(time() . rand());
$code = substr($str, rand(0, 25), 4);
$_SESSION['captcha'] = $code;
$img = imagecreatetruecolor(50,15);
$bg_color = imagecolorallocate($img, 255, 255, 255);
imagefilledrectangle($img,0,0,50,15,$bg_color);
$color = imagecolorallocate($img, 0, 0, 0);
imagestring($img, 10, 5, 0, $code, $color);
imagejpeg($img);
header('Content-Type: image/jpeg');
imagedestroy($img);
?>