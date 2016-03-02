<?php 

if(!empty($_SESSION['last_access_time'])){
    $last_accessTime = $_SESSION['last_access_time'];//どちらでも大丈夫
    echo '前回のアクセス時刻:'.$last_accessTime;
}

$_SESSION['last_access_time'] = date('H時i分s秒');//どちらでも大丈夫

// echo '前回のアクセス時刻:'.$last_accessTime;

 ?>