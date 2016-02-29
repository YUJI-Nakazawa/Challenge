<?php

// 課題1
echo '課題1<br>';
$stamp=mktime(0,0,0,1,1,2016);
echo $stamp.'<br>';

// 課題2
echo '課題2<br>';
$today = date('Y年-m月-d日 H時:i分:s秒');
echo $today.'<br>';

// 課題3
echo '課題3<br>';
$stamp=mktime(10,0,0,11,4,2016);
$a_day=date('Y年-m月-d日 H時:i分:s秒',$stamp);
echo $a_day.'<br>';

// 課題4
echo '課題4<br>';
$stamp1 = mktime(0,0,0,1,1,2015);
$stamp2 = mktime(23,59,59,12,31,2015);
$diff = $stamp2 - $stamp1;
echo $diff.'<br>';

// 課題5
echo '課題5<br>';
$name = '中澤裕司';
echo strlen($name)."<br>";
echo mb_strlen($name)."<br>";

// 課題6
echo '課題6<br>';
$mail = 'yuji.nakazawa1025@gmail.com';
echo strstr($mail,'@').'<br>';

// 課題7
echo '課題7<br>';
$serch = array('U','I');
$replace = array('う', 'い');
echo str_replace($serch,$replace,'きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます<br>');

// 課題8,課題9
echo '課題8,課題9<br>';
$fp = fopen('intro.txt','w');
fwrite($fp, 'こんにちは。中澤裕司です。');
fclose($fp);

$fp = fopen('intro.txt','r');
$file_txt = fgets($fp);
echo $file_txt.'<br>';
















