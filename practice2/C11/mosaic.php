<?php

function getmosaic($img, $x, $y, $size) {
    $sumR = $sumG = $sumB = 0; $count = 0;
    $width = imagesx($img);
    $height = imagesy($img);
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $px = $x + $i;
            $py = $y + $j;
            if ($px >= $width || $py >= $height) continue; // 邊界檢查
            $rgb = imagecolorat($img, $px, $py);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;

            $sumR += $r;
            $sumG += $g;
            $sumB += $b;
            $count++;
        }
    }
    if ($count == 0) $count = 1; // 避免除以0
    $avgR = intval($sumR / $count);
    $avgG = intval($sumG / $count);
    $avgB = intval($sumB / $count);
    return imagecolorallocate($img, $avgR, $avgG, $avgB);
}

if(isset($_GET['call']) && $_GET['call']=="mosaic") {
    $size = $_POST["size"] ?? 10;
    $image = $_POST["image"];
    $img=imagecreatefrompng($image);
    for($i=0;$i<imagesx($img);$i+=$size){
        for($j=0;$j<imagesy($img);$j+=$size){
           $color=getmosaic($img,$i,$j,$size);
           imagefilledrectangle($img, $i, $j, $i + $size - 1, $j + $size - 1, $color);
        }
    }
    ob_start();
    imagepng($img);
    $file_content = ob_get_clean();
    imagedestroy($img);
    echo "data:image/png;base64," . base64_encode($file_content);
}