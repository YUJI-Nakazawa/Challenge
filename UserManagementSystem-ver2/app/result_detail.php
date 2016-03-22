<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
session_start();

//ソース冒頭でGET変数を変数に格納し、html<body>内では変数を呼び出す。

if(isset($_POST['mode']) && $_POST['mode'] == 'BACKtoRESULT_DETAIL'){
    $id = $_SESSION['id'];
}
else{
    $id = bind_g2s('id');
}
$result = profile_detail($id);

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報詳細画面</title>
</head>
  <body>
    <?php
    //エラーが発生しなければ表示を行う
    if(is_array($result)){
    ?>
      
    <h1>詳細情報</h1>
    名前:<?php echo $result[0]['name'];?><br>
    生年月日:<?php echo $result[0]['birthday'];?><br>
    種別:<?php echo ex_typenum($result[0]['type']);?><br>
    電話番号:<?php echo $result[0]['tell'];?><br>
    自己紹介:<?php echo $result[0]['comment'];?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>
    
    <form action="<?php echo UPDATE; ?>?id=<?php echo $result[0]['userID'] ?>" method="POST">
        <input type="submit" name="update" value="変更" style="width:100px">
        <input type="hidden" name="access_chk" value="access_chk"><!-- 正常なアクセスの確認のための変数の送信 -->
    </form>
    <form action="<?php echo DELETE; ?>?id=<?php echo $result[0]['userID'] ?>" method="POST">
        <input type="submit" name="delete" value="削除" style="width:100px">
        <input type="hidden" name="access_chk" value="access_chk"><!-- 正常なアクセスの確認のための変数の送信 -->
    </form>
    <br>
    <form action="<?php echo SEARCH_RESULT; ?>" method="POST">
      <input type="hidden" name="mode" value="BACKtoSEARCH_RESULT"> 
      <input type="submit" name="NO" value="検索結果画面に戻る"style="width:100px">
    </form>
    <br>
    <?php
    echo return_top(); 
    ?>
    <?php
    }else{
        echo 'データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result;
    }
    ?>
  </body>
</html>
