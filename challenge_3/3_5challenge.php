<?php 

echo '課題5<br>';

function profile(){
    $id = 8593787;
    $name = '中澤裕司';
    $birthday = '1986/10/25';
    $address = '東京都 八王子市 北野町◯◯番地';
    return array('ID' =>$id, '名前' => $name, '生年月日' => $birthday, '住所' => $address);
}
foreach(profile() as $key => $value){
    echo $key.':'.$value."<br>";
}

 ?>