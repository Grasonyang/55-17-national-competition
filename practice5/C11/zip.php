<?php
$cell = isset($_GET['cell_size'])?$_GET['cell_size']:50;
$img = imagecreatefrompng('./A.png');
$w = imagesx($img);
$h = imagesy($img);
for($i=0;$i<$w;$i+=$cell){
    for($j=0;$j<$h;$j+=$cell){
        $count = $r = $g = $b = 0;
        for($x=0;$x<$cell && $i+$x<$w;$x+=1){
            
            for($y=0;$y<$cell && $j+$y<$h;$y+=1){
                $rgb = imagecolorat($img, $i+$x, $j+$y);
                $color = imagecolorsforindex($img,$rgb);
                // print_r($color);
                $r += $color['red'];
                $g += $color['green'];
                $b += $color['blue'];
                $count+=1;
            }
        }
        $count = $count==0 ? 1:$count;
        $r = intdiv($r, $count);
        $g = intdiv($g, $count);
        $b = intdiv($b, $count);
        // echo "$r $g $b";
        // echo PHP_EOL;
        $color = imagecolorallocate($img,$r,$g,$b);
        imagefilledrectangle($img, $i, $j, $i+$cell, $j+$cell, $color);
    }
}
imagepng($img);
imagedestroy($img);