<?php $png = imagecreatetruecolor(800, 600); 
imagesavealpha($png, true); 
$trans_colour = imagecolorallocatealpha($png, 0, 0, 0, 127); 
imagefill($png, 0, 0, $trans_colour); 
$Yellow = imagecolorallocate($png, 255, 255, 0); 
imagefilledellipse($png, 650, 150, 200, 200, $Yellow ); 
header("Content-type: image/png"); 

imagepng($png); 
imagedestroy($png); ?> 