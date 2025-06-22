<?php

while (!feof(STDIN)) { // eof
    $n = trim(fgets(STDIN));
    $arr = []; // 字串轉數字
    $numbers = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000,
    ];
    for($i=0;$i<strlen($n);$i++){
        $arr[$i] = $numbers[$n[$i]];
        // echo $arr[$i]."\n";
    }
    $total = 0;
    for($i=0;$i<count($arr);$i++){
        if($i+1<count($arr) && $arr[$i]<$arr[$i+1]){
            $total -= $arr[$i];
        }else{
            $total += $arr[$i];
        }
    }
    echo $total."\n";
}

?>