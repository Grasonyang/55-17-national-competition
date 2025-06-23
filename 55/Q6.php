<?php
// leetcode 32
// (()(()

$stack = [-1];
$input = trim(fgets(STDIN));
$max = 0;
for($i=0;$i<strlen($input);$i++){
    if($input[$i] == "("){
        $stack[] = $i;
    }else{
        if(count($stack)===1){
            array_pop($stack);
            $stack[] = $i;
        }else{
            array_pop($stack);
            $max = max($max, $i-end($stack));
        }
    }
}
echo $max . "\n";