<?php
$stack = [];
$input = trim(fgets(STDIN));
// leetcode 32
// (()(()
$max = 0;
for($i=0;$i<strlen($input);$i++){
    if($input[$i] == "("){
        $stack[] = $i;
    }else{
        if(count($stack)===0){
            $stack[] = $i;
        }else{
            array_pop($stack);
            $max = max($max, $i-end($stack));
        }
    }
}
echo $max . "\n";