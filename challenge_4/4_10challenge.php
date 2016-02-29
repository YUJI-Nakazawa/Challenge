<?php 

$command = 'file_copy intro.txt';

$action = strstr($command,' ',TRUE);
$f_name = trim(strstr($command,' '));
// $farr = explode('.',$f_name);

// var_dump($action);echo '<br>';
// var_dump($f_name);

if($action === 'file_copy'){
    $start = date('Y-m-d H:i:s');
    $log = fopen('log.txt','w');
    fwrite($log, $start.' '.$f_name.'のコピーを実行(開始)<br>');
    fclose($log);
    $f_copy = copy($f_name,'(copy)intro.txt');
    $exit = date('Y-m-d H:i:s');
    $log = fopen('log.txt','a');
    if($f_copy == true){
        fwrite($log, $exit.' '.$f_name.'のコピーを実行(終了)');
        fclose($log);
    }else{
        fwrite($log, $exit.' '.$f_name.'のコピーに失敗しました。');
        fclose($log);
    }
}else{
    echo 'コマンドが間違っています。';
}
$log = fopen('log.txt','r');
$log_text = fgets($log);
echo $log_text;
fclose($log);


 ?>