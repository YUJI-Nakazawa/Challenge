<?php 

// $zakka = 300;
// $shokuhin = 80;

$total_price = $_GET['total_price'];
$n = $_GET['n'];
$class = $_GET['class'];
// $total_price = (float)$total_price;

if($class == '雑貨'){
    echo '種別:雑貨<br>';
}
elseif($class == '生鮮食品'){
    echo '種別:生鮮食品<br>';
}
else{
    echo '種別:その他<br>';
}
echo "総額:\t".$total_price.'円<br>';
echo "単価:\t@".$total_price / $n.'円<br>';
if($total_price >= 5000){
    $rate = 0.05;
}
elseif($total_price >= 3000){
    $rate = 0.04;
}
else{
    $rate = 0;
}
// var_dump($total_price);echo '<br>';
// var_dump($n);echo '<br>';
// var_dump($rate);echo '<br>';
$point = $total_price * $rate;
// var_dump($point);echo '<br>';
echo "今回のポイント加算: $point pt";
?>