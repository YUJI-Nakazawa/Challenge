<?php 
// 課題1
echo '課題1<br>';
echo 'Hello World.'.'<br>';
// 課題2
echo '課題2<br>';
echo 'groove'.'-'.'gear'.'<br>';
// 課題3
echo '課題3<br>';
echo '中澤裕司と申します。年齢は29歳、長野県出身です。<br>
      趣味は自転車、ゲーム、アウトドアなどです。<br>
      現在、転職活動中です。よろしくお願いいたします!<br>';
// 課題4,5
echo '課題4,5<br>';
const A = 100;
$a = 200;
$b = 1000;

echo A + $a . '<br>';
echo $b - $a . '<br>';
echo A * ($b / $a) .'<br>';
echo $b % (A + $a) .'<br>';
// 課題6
echo '課題6<br>';
$x = 100;
if($x == 1){
    echo '1です!';
}
elseif($x == 2){
    echo 'プログラミングキャンプ!';
}
elseif($x == 'a'){
    echo '文字です!';
}
else{
    echo 'その他です!';
}
 ?>