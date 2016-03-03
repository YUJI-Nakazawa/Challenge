<?php
    require_once '5_9challenge4.php';//関数の呼び出し
    require_once '5_9challenge6.php';

    // if( isset($_POST['LOGOUT']) ){
    //     logout_s();
    //     echo '<meta http-equiv="refresh" content="0;URL='.LOGIN.'">';
    // }

    session_chk();//直にこのファイルにアクセスした場合不正アクセスとするため。
    
    $get_data = array();
    
    if(!empty($_POST['name'])){
        $get_data['name'] = $_POST['name'];
    }
    if(!empty($_POST['content'])){
        $get_data['content'] = $_POST['content'];
    }
    
    // session_start();
    
    $_SESSION['s_name']=isset($get_data['name']) ? $get_data['name'] : "";
    $_SESSION['s_content']=isset($get_data['content']) ? $get_data['content'] : "";
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo SHOW ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    if( isset($get_data['name']) && isset($get_data['content']) ){
        echo '<h1>下記の内容で投稿してよろしいですか?</h1>';
        echo '<p>お名前:'.$get_data['name'].'さん</p>';
        echo '<p>本文:<p>
             <textarea class="txtarea_resize" name="content" rows="8" cols="100" style="border:0">'.$get_data['content'].'</textarea><br>';
    ?>
    <br><br>
    <form action="" method="post"><!--おまけ-->
        <input type="hidden" name="name" value="<?php echo $get_data['name']; ?>">
        <input type="hidden" name="seibetsu" value="<?php echo $get_data['content']; ?>">
        <input type="botton" value="上記の内容で投稿">
    </form>

    
<? 
}
else{
        echo '<h1>入力内容が不足してます。</h1>';
    if(!isset($get_data['name']) && !isset($get_data['content'])){
        echo 'お名前の入力を行ってください。<br>本文の入力を行ってください。';
    }elseif(!isset($get_data['name']) ){
        echo 'お名前の入力を行ってください。';
    }elseif(!isset($get_data['content']) ){
        echo '本文の入力を行ってください。';
    }
}
?>
    <br><br>
    <form>
        <button type="button" onclick="location.href='<?php echo INPUT ?>'">戻る</button>
    </form>
    <br><br>
    <!-- <form action="<?php echo SHOW; ?>" method="post">
        <button type="submit" name="LOGOUT" value="LOGOUT">ログアウト</button>
    </form> -->
    <form action="<?php echo LOGOUT; ?>" method="post">
        <button type="submit" name="LOGOUT" value="LOGOUT" 
            onclick="location.href='<?php echo LOGOUT; ?>'">ログアウト</button>
    </form>
</body>
</html>
