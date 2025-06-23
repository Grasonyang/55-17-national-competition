<?php
// leetcode 39

$n = trim(fgets(STDIN));
$result = [];
$currentPartition = [];

function backtrack($partition_number,$max_use_partition_number,&$currentPartition,&$result){
    if ($partition_number === 0) {
        $result[] = $currentPartition;
        return;
    }
    if ($partition_number < 0) {
        return;
    }
    for($i=min($partition_number,$max_use_partition_number);$i>=1;$i--){
        $currentPartition[] = $i;
        backtrack($partition_number - $i, $i, $currentPartition, $result);
        array_pop($currentPartition);
    }
}
backtrack($n,$n-1,$currentPartition,$result);
echo count($result)."\n";
foreach ($result as $partition) {
    echo implode(" ", $partition) . "\n";
}