<?php 
$bocchan_fp = fopen('4_12_bocchan.txt','r'); //ファイルの読み込み
// for($read_line = 0; fgets($bocchan_fp); $read_line++); //ファイルの行数を取得
$read_line = 12; //ファイルの行数を取得
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>坊ちゃん</title>
</head>
<body>
    <h1>[元の文書]</h1>
    <?php
    for($i = 0; $i < $read_line; $i++){
        $count1 = $i+1;
        $bocchan_text[$i] = fgets($bocchan_fp);
        echo $count1.'行目'.$bocchan_text[$i];
    }
    ?>
    <h1>[変更後の文書]</h1>
    <?php
    for($ii = 0; $ii < $read_line; $ii++){
        $count2 = $ii+1;
        $bocchan_text[$ii] = fgets($bocchan_fp);
        $bocchan_text_rep[$ii] = str_replace('。' ,'。<br>',$bocchan_text[$ii]);
        $bocchan_text_br[$ii] = $bocchan_text_rep[$ii];
        echo $count2.'行目'.$bocchan_text_br[$ii];
    }
    fclose($bocchan_fp);
    
    ?>
</body>
</html>









