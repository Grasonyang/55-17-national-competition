<?php
$n = trim(fgets(STDIN));
// only greedy
$arr=[];
$total=0;
$money=[
    50,10,5,1
];
for($i=0;$i<count($money);$i++){
    $m=intdiv($n,$money[$i]);
    $n-=$m*$money[$i];
    $arr[$money[$i]]=$m;
    $total+=$m;
}
for($i=count($arr)-1;$i>=0;$i--){
    echo $money[$i] . " " . $arr[$money[$i]] . "\n";
}
echo "$total\n";