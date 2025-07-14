<?php
$cell_size = $_GET['cell_size'] ?? 50;

$img = imagecreatefrompng('default.png');
$w = imagesx($img);
$h = imagesy($img);
for($i=0;$i<$w;$i+=$cell_size){
    for($j=0;$j<$h;$j+=$cell_size){
        $count = $r = $g = $b = 0;
        for($x = 0; $x<$cell_size && $i+$x<$w;$x++){
            for($y = 0; $y<$cell_size && $j+$y<$w;$y++){
                $color = imagecolorat($img, $i+$x, $j+$y);
                $color = imagecolorsforindex($img,$color);
                $count++;
                $r += $color['red'];
                $g += $color['green'];
                $b += $color['blue'];
            }
        }
        $r = intdiv($r,$count);
        $g = intdiv($g,$count);
        $b = intdiv($b,$count);
        $color = imagecolorallocate($img, $r, $g, $b);
        imagefilledrectangle($img, $i, $j, $i+$cell_size, $j+$cell_size, $color);
    }
}
imagepng($img);
imagedestroy($img);
