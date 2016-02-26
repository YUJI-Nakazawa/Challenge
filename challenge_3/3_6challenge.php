<?php 

echo '課題6<br>';

function profile($user){
    //user1
    $id1 = 8593787;
    $name1 = '中澤裕司';
    $birthday1 = '1986/10/25';
    $address1 = '東京都 八王子市 北野町◯◯番地';
    $user1 = array('ID' =>$id1, '名前' => $name1, '生年月日' => $birthday1, '住所' => $address1);
    // user2
    $id2 = 7834576;
    $name2 = '田中太郎';
    $birthday2 = '1944/3/6';
    $address2 = '神奈川県 横浜市';
    $user2 = array('ID' =>$id2, '名前' => $name2, '生年月日' => $birthday2, '住所' => $address2);
    // user3
    $id3 = 6541029;
    $name3 = '佐藤祐子';
    $birthday3 = '1990/6/19';
    $address3 = '群馬県 高崎市';
    $user3 = array('ID' =>$id3, '名前' => $name3, '生年月日' => $birthday3, '住所' => $address3);
    
    switch(true){
        case strstr($name1, $user):
            return $user1;
            break;
        case strstr($name2, $user):
            return $user2;
            break;
        case strstr($name3, $user):
            return $user3;
            break;
        default:
            echo '該当するユーザーはいません。<br>';
            return "";
            break;
    }
}
$user = '太';
if(profile($user) != null){
    foreach(profile($user) as $key => $value){ 
        echo $key.':'.$value."<br>";
    }
}

 ?>