<?php
require_once '../common/defineUtil.php';

  // トップへ戻るリンクの生成
  function return_top(){
      return "<a href='".ROOT_URL."'>トップへ戻る</a>";
  }
  
  // 確認画面や結果画面に不正にアクセスした際にトップに戻す
  function auto_shift(){
      echo '<h1>不正なアクセス</h1>
                    不正なアクセスです。三秒後にログイン画面に移動します';
      echo '<meta http-equiv="refresh" content="3; URL='.ROOT_URL.' ">';
  }
  
  // ページの滞在時間チェック
  function session_chk(){
      if( isset($_SESSION['last_access']) ){
          $period_time = 300;
          if((time() - $_SESSION['last_access']) > $period_time){ //ログインページにアクセスした時間から120秒経過したら
              logout_s(); // セッション破棄
              echo '<h1>セッション有効切れ</h1>
              セッション有効期限切れです。三秒後にログイン画面に移動します';
              echo '<meta http-equiv="refresh" content="3; URL='.ROOT_URL.' ">';
              exit;
          }else{ //ログインページにアクセスしてから120秒以内であったら
              $_SESSION['last_access']=time();
          }
      }
      else{
          auto_shift();
      }
  }
  
  // セッションを破棄
  function logout_s(){
      if (isset($_COOKIE['PHPSESSID'])) {
          setcookie('PHPSESSID', '', time() - 1800, '/');
      }
      session_destroy();
  }