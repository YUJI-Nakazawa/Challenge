<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>
<?php session_start(); 
        session_chk();?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>


    <?php
    if( empty($_POST['access_chk']) ){ // 直接このページにアクセスした際にトップページに飛ばす
        auto_shift();
    }
    else{

        
        $name = $_SESSION['name'];
        $birthday = $_SESSION['birthday'];
        $type = $_SESSION['type'];
        $tell = $_SESSION['tell'];
        $comment = $_SESSION['comment'];

        //db接続を確立
        $insert_db = connect2MySQL();
        
        //DBに全項目のある1レコードを登録
        insertSQL($name, $birthday, $tell, $type, $comment);
        
        ?>

        <h1>登録結果画面</h1><br>
        名前:<?php echo $name;?><br>
        生年月日:<?php echo $birthday;?><br>
        種別:<?php echo $type?><br>
        電話番号:<?php echo $tell;?><br>
        自己紹介:<?php echo $comment;?><br>
        以上の内容で登録しました。<br>
        <br>
        <?php 
        echo return_top(); // トップへ戻るリンクを生成
    }?>
    
</body>

</html>
