<?php
    require_once '5_9challenge4.php';
    require_once '5_9challenge6.php';
    if( isset($_SESSION) ){
        logout_s();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title><?php echo REDIRECT ?></title>
</head>
<body>
    <?php 
    if(isset($_POST['LOGOUT'])){
    ?>
        <h1>ログアウトしました。</h1>
        三秒後にログイン画面に移動します
    <?php 
    }else{
    ?>
        <h1>不正なアクセス</h1>
        不正なアクセスです。三秒後にログイン画面に移動します
    <?php
    }
    ?>
    <meta http-equiv="refresh" content="3;URL='<?php echo LOGIN ?>'">
</body>
</html>