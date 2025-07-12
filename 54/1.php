<?php

$find = "";
$line = "";
$lines = "";
$find = readline();
$find = trim($find);
while(($line = fgets(STDIN)) !== false) {
    $lines .= trim($line);
}
preg_match_all('/<(.*?)>/s',$lines,$matches);
// print_r($matches);
$max = 0;
$arr = [];
foreach($matches[1] as $match){
    if(empty($arr)){
        $arr[] = trim($match);
    }else{
        $thiss = trim($match, '/');
        if($match[0]=="/"){
            array_pop($arr);
        }else{
            $single = trim($match);
            if($single[strlen($single)-1]=="/"){
                if(strpos($single, $find) !== false){
                    $max = max($max, count($arr) + 1);
                }
            }else{
                $arr[] = $thiss;
                if($thiss == $find){
                    $max = max($max, count($arr));
                }
            }
        }
    }
    print_r($arr);
}
echo $max;