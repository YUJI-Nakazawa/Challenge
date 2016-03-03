<?php
    require_once '5_9challenge4.php';//関数の呼び出し
    require_once '5_9challenge6.php';
    
    // if( isset($_POST['LOGOUT']) ){
    //     logout_s();
    //     echo '<meta http-equiv="refresh" content="0;URL='.LOGIN.'">';
    // }
    
    session_chk();//直にこのファイルにアクセスした場合不正アクセスとするため。
    
    if(!isset($_COOKIE['login_count']) && !isset($_COOKIE['last_login'])){//初回アクセスの場合
        $lcount = 1;
        $llogin = time();
        setcookie('login_count',$lcount);
        setcookie('last_login',$llogin);
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);//セッションIDを保存
    }else if($_COOKIE['PHPSESSID']!=$_COOKIE['SAVEDPHPSESSID']){//過去にセッション切れした場合
        setcookie('login_count',$_COOKIE['login_count']+1);   //ログインカウントを+1する
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
        setcookie('last_login',time());
        setcookie('SAVEDPHPSESSID',$_COOKIE['PHPSESSID']);
    }else{
        $lcount = $_COOKIE['login_count'];
        $llogin = $_COOKIE['last_login'];
    }
    // var_dump($_COOKIE['PHPSESSID']);echo '<br>';
    // var_dump($_COOKIE['SAVEDPHPSESSID']);echo '<br>';
    
    // session_start();
    $name = isset($_SESSION['s_name']) ? $_SESSION['s_name'] : "";
    $content = isset($_SESSION['s_content']) ? $_SESSION['s_content'] : "";
    
    
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo INPUT ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>掲示板投稿サービストップ</h1>
    今回で<?php echo $lcount ?>回目のアクセスです！　最終ログイン日時 <?php echo date('Y年m月d日 H時i分s秒',$llogin)?> <br>
    
    <form action="<?php echo SHOW ?>" method="POST">
        名前:　
        <input type="text" name="name" value="<?php echo $name ?>">
        <br><br>

        本文:<br>
        <textarea name="content" rows="8" cols="100"><?php echo $content ?></textarea>
        <br><br>
        
        <input type="submit" name="btnSubmit" value="投稿する">
    </form>
        <br><br>
    <!-- <form action="<?php echo INPUT; ?>" method="post">
        <button type="submit" name="LOGOUT" value="LOGOUT">ログアウト</button>
    </form> -->
    <form action="<?php echo LOGOUT; ?>" method="post">
        <button type="submit" name="LOGOUT" value="LOGOUT" 
            onclick="location.href='<?php echo LOGOUT; ?>'">ログアウト</button>
    </form>
    
</body>
</html>
