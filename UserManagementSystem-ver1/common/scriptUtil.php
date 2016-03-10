<?php
require_once '../common/defineUtil.php';


  function return_top(){
      return "<a href='".ROOT_URL."'>トップへ戻る</a>";
  }
  
  function auto_shift(){
              echo '<h1>不正なアクセス</h1>
                    不正なアクセスです。三秒後にログイン画面に移動します';
              echo '<meta http-equiv="refresh" content="3; URL='.ROOT_URL.' ">';
  }