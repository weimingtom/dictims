<?php
if (!session_id()) session_start();
header('Content-type: image/png');
$image = imagecreate(40, 14);
$background = imagecolorallocate($image, 255, 255, 255);
$text = imagecolorallocate($image, 0, 0, 0);
//$random = floor(mt_rand(1000, 9999));
$length = 4;
$random = "";
$strPol = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$max = strlen($strPol) - 1;
for ($i = 0; $i < $length; $i++) {
  $random .= $strPol[mt_rand(0, $max)];
}
imagestring($image, 5, 0, 0, $random, $text);
imagepng($image);
imagedestroy();

$_SESSION['pSN'] = $random;
?>
