<?php 
// 課題1
echo '課題1<br>';
$n = 1;
switch($n){
    case 1:
        echo 'one<br>';
        break;
    case 2:
        echo 'two<br>';
        break;
    default:
        echo '想定外<br>';
        break;
}
// 課題2
echo '課題2<br>';
$c = 'A';
switch($c){
    case 'A':
        echo '英語<br>';
        break;
    case 'あ';
        echo '日本語<br>';
        break;
}
// 課題3
echo '課題3<br>';
$A = 1;
for($i = 0; $i < 20; $i++){
    $A=$A*8;
}
    echo 'A='.$A.'<br>';
// 課題4
echo '課題4<br>';
$stiring = 'A';
for($i = 0; $i < 30; $i++){
    $stiring.='A';
}
echo $stiring.'<br>';
//課題5
echo '課題5<br>';
$a = 0;
// $b = 0;
for($i = 1; $i <=100; $i++){
    $a += $i;
    // $b = $b + $i;
}
echo $a.'<br>';
// echo $b.'<br>';
//課題6
echo '課題6<br>';
$a = 1000;
while($a >= 100){
    $a = $a / 2;
}
echo $a.'<br>';
//課題7
echo '課題7<br>';
$Array1 = array(10,100,'soeda','hayashi',-20,118,'END');
var_dump($Array1);
echo '<br>';
//課題8
echo '課題8<br>';
$Array1[2] = 33;
var_dump($Array1);
echo '<br>';
//課題9
echo '課題9<br>';
$Array2 = array(1 => 'AAA', 'hello' => 'world', 'soeda'=> 33, 20 => 20);
echo $Array2['soeda'];

//課題10
echo '課題10<br>';







 ?>