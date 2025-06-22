<?php

$arr = [0,1];
for($i=2;$i<=93;$i++){
    $arr[$i] = $arr[$i-1] + $arr[$i-2];
}

while (!feof(STDIN)) { // eof
    $n = trim(fgets(STDIN));
    echo $arr[$n] . "\n";
}

?>