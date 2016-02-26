<?php 

echo '課題7<br>';

$num = 3;

function sample(){
    global $num;
    static $i = 1;
    $num *= 2;
    echo $i."回目<br>";
    echo $num."<br>";
    $i++;
}

sample();
sample();
sample();
sample();
sample();
sample();
sample();

 ?>