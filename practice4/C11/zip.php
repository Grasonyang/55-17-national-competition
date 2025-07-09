<?php

if(isset($_GET['cell_size'])){
    $size = $_GET['cell_size'];
}else{
    $size = 50;
}

$image = imagecreatefrompng("./B.png");
$w=imagesx($image);
$h=imagesy($image);
for($i=0;$i<$w;$i+=$size){
    for($j=0;$j<$h;$j+=$size){
        $count = $r = $b =$g =0;
        for($x=0;$x<$size && $i+$x<$w;$x++){
            for($y=0;$y<$size && $j+$y<$h;$y++){
                $rgb = imagecolorsforindex($image, imagecolorat($image, $i+$x, $j+$y));
                $r+=$rgb['red'];
                $g+=$rgb['green'];
                $b+=$rgb['blue'];
                $count++;
            }
        }
        $r = intdiv($r,$count);
        $g = intdiv($g,$count);
        $b = intdiv($b,$count);
        $color = imagecolorallocate($image,$r,$g,$b);
        imagefilledrectangle($image,$i,$j,$i+$size,$j+$size,$color);
    }
}
imagepng($image);
