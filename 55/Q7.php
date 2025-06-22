<?php
$s = trim(fgets(STDIN),"[]");
$s = explode(",",$s);
$layer = 1;

function check($a,$b){
    global $s;
    while($a<$b){
        if($s[$a]== $s[$b]){
            $a++;
            $b--;
        }else{
            return false;
        }
    }
    return true;
}


for($i=0;$i<count($s);$i+=$layer){
    $result = check($i,$i+$layer-1);
    if(!$result)
        break;
    $layer+=1;
}
echo $result ? "Y\n" : "N\n";
?>