<?php

while (!feof(STDIN)) { // eof
    $n = fgets(STDIN);
    $n = trim($n);
    $n = intval($n);
    $is_prime=true;
    for($i=2;$i<=sqrt($n);$i++){
        if($n%$i==0){
            // echo $i."\n";
            $is_prime=false;
            break;
        }
    }
    echo $is_prime ? "Y\n" : "N\n";
}

?>