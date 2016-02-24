<?php
//課題10
echo '課題10<br>';
$give_n = $_GET['数字'];

$n = $give_n;

// 変数の初期化
$dtime2 = $dtime3 = $dtime5 = $dtime7 = 0;
$insu2 = $insu3 = $insu5 = $insu7 = "";

while($n % 2 == 0){// 2で割れる回数の算出
    $n /= 2;
    $dtime2++;
}
// echo "2で割った回数は".$dtime2."<br>"; echo $n."<br>";

while($n % 3 == 0){// 3で割れる回数の算出
    $n /= 3;
    $dtime3++;
}
// echo "3で割った回数は".$dtime3."<br>"; echo $n."<br>";

while($n % 5 == 0){// 5で割れる回数の算出
    $n /= 5;
    $dtime5++;
}
// echo "5で割った回数は".$dtime5."<br>"; echo $n."<br>";

while($n % 7 == 0){// 7で割れる回数の算出
    $n /= 7;
    echo $dtime7."<br>";
    $dtime7++;
}
// echo "7で割った回数は".$dtime7."<br>"; echo $n."<br>";

// 2桁以上の因数の有無の確認
if($n == 1){
    $etc = "";
}else{
    $etc = "その他";
}
// echo $etc."<br>";

if($dtime2 == 0){
    $insu2 = "";
    $beki2 = "";
}else{
    $insu2 = '2';
    $beki2 = $dtime2;
}
if($dtime3 == 0){
    $insu3 = "";
    $beki3 = "";
}else{
    $insu3 = '3';
    $beki3 = $dtime3;
}
if($dtime5 == 0){
    $insu5 = "";
    $beki5 = "";
}else{
    $insu5 = '5';
    $beki5 = $dtime5;
}
if($dtime7 == 0){
    $insu7 = "";
    $beki7 = "";
}else{
    $insu7 = '7';
    $beki7 = $dtime7;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>素因数分解</title>
</head>
<body>
    <h3>元の数値:<?php echo $give_n;?>
        ,素因数<?php echo $insu2; ?> <sup><?php echo $beki2; ?></sup>
              <?php echo $insu3; ?> <sup><?php echo $beki3; ?></sup>
              <?php echo $insu5; ?> <sup><?php echo $beki5; ?></sup>
              <?php echo $insu7; ?> <sup><?php echo $beki7; ?></sup>
              <?php echo $etc; ?>
    </h3>
</body>
</html>

