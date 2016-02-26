<?php 

echo '課題3<br>';

function calc($num1, $num2 = 5, $type = false){
    $mult = $num1*$num2;
    if($type === true){
        echo $mult;
    }else{
        echo $mult*$mult;
    }
}

calc(3,4,true);

 ?>