<?php
function session_chk(){
    $period_time = 120;
    session_start();
    if(!empty($_SESSION['last_access'])){  //ログインページにアクセスした時間がnullで なかった場合
        if((time() - $_SESSION['last_access']) > $period_time){ //ログインページにアクセスした時間から120秒経過したら
            logout_s();
            echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
            exit;
        }else{ //ログインページにアクセスしてから120秒以内であったら
            $_SESSION['last_access']=time();
        }
    }else{//直接このファイルにアクセスした場合。
        echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
        exit;
    }
}    

/**
 * セッション情報を破棄するための関数
 */
function logout_s(){
    session_unset();
    if (isset($_COOKIE['PHPSESSID'])) {
        setcookie('PHPSESSID', '', time() - 1800, '/');
    }
    session_destroy();
}
