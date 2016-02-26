<?php 

echo '課題9<br>';

function user1(){
    //user1
    // global $info_user1;
    $id1 = 8593787;
    $name1 = '中澤裕司';
    $birthday1 = '1986/10/25';
    $address1 = '東京都 八王子市 北野町◯◯番地';
    $info_user1 = array('ID' =>$id1, '名前' => $name1, '生年月日' => $birthday1, '住所' => $address1);
    return $info_user1;
}
    // user2
function user2(){
    // global $info_user2;
    $id2 = 7834576;
    $name2 = '田中太郎';
    $birthday2 = '1944/3/6';
    $address2 = '神奈川県 横浜市';
    $info_user2 = array('ID' =>$id2, '名前' => $name2, '生年月日' => $birthday2, '住所' => $address2);
    return $info_user2;
}
    // user3
function user3(){
    // global $info_user3;
    $id3 = 6541029;
    $name3 = '佐藤祐子';
    $birthday3 = '1990/6/19';
    $address3 = '群馬県 高崎市';
    $info_user3 = array('ID' =>$id3, '名前' => $name3, '生年月日' => $birthday3, '住所' => $address3);
    return $info_user3;
}

$users = array("user1" => user1() , "user2" => user2(), "user3" => user3());

foreach($users as $value1){
    // var_dump($value1);
    // echo "<br>";
    foreach($value1 as $key2 => $value2){
        // var_dump($value2);
        // echo "<br>";
        switch($key2){
            case 'ID':
                continue;
                break;
            case '名前':
                echo $key2.":".$value2."<br>";
                break;
            case '生年月日':
                echo $key2.":".$value2."<br>";
                break;
            case '住所':
                continue;
                break;
        }
    }
}
 ?>