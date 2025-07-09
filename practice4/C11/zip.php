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
        for($x=0;$x<$size;$x+=$size){
            for($y=0;$y<$size;$y+=$size){
                $rgb = imagecolorsforindex($image, imagecolorat($image, $x, $y));
                $r+=$rgb['red'];
                $g+=$rgb['green'];
                $b+=$rgb['blue'];
            }
        }
        $r = intdiv($r,$count);
        $g = intdiv($g,$count);
        $b = intdiv($b,$count);
        $color = imagecolorallocate($image,$r,$g,$b);
        imagecolor
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <img src="zip.png" alt="unknown"/>
</body>

</html>