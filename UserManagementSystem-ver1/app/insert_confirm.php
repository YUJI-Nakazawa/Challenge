<?php require_once '../common/scriptUtil.php'; ?>
<?php session_start(); 
        session_chk();?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    
    if( empty($_POST['access_chk']) ){ // 直接このページにアクセスした際にトップページに飛ばす
        auto_shift();
    }
    else{
        
        // 生年月日不正確用変数を用意し、これを条件分岐に利用して生年月日の選択不正を切り分ける。
        if( !is_numeric($_POST['year']) || !is_numeric($_POST['month']) || !is_numeric($_POST['day']) ){ //年、月、日の何れかが数値ではない場合。
            $birthday_chk = null; // 生年月日不正確認用変数がnull
        }else{ // 年、月、日がずべて数値の時、
            if( $_POST['month'] == 4 || $_POST['month'] == 6 || $_POST['month'] == 9 || $_POST['month'] == 11 ){ // 4月、6月、9月、11月の時
                if( $_POST['day'] == 31 ){ // 日にちが31日なら
                    $birthday_chk = null; // 生年月日不正確認用変数がnull
                }
                else{ // 31日以外なら
                    $birthday_chk = 1;
                }
            }
            elseif( $_POST['month'] == 2){ // 2月の時
                if( $_POST['year']%4 == 0 && $_POST['year']%100 != 0 || $_POST['year'] == 0 ){ // うるう年なら
                    if( $_POST['day'] == 30 || $_POST['day'] = 31 ){ // 日にちが30日、31日なら
                        $birthday_chk = null; // 生年月日不正確認用変数がnull
                    }
                    else{ // 30日、31日以外なら
                        $birthday_chk = 1;
                    }
                }
                else{ //うるう年以外なら
                    if( $_POST['day'] == 29 || $_POST['day'] == 30 || $_POST['day'] == 31 ){ // 日にちが29日、30日、31日なら
                        $birthday_chk = null; // 生年月日不正確認用変数がnull
                    }
                    else{ // 29日、30日、31日以外なら、
                        $birthday_chk = 1;
                    }
                }
            }
            else{
                $birthday_chk = 1;
            }
        }
          // ※1
          $post_name = $_POST['name'];
          //date型にするために1桁の月日を2桁にフォーマットしてから格納
          $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
          $post_type = isset($_POST['type']) ? $_POST['type'] : ""; // radioボタンが選択されない場合にindexがないというエラーを回避するように修正。
          $post_tell = $_POST['tell'];
          $post_comment = $_POST['comment'];
          $post_year = $_POST['year']; // 年を追加
          $post_month = $_POST['month']; // 月を追加
          $post_day = $_POST['day']; // 日を追加
          
          //セッション情報に格納
          $_SESSION['name'] = $post_name;
          $_SESSION['birthday'] = $post_birthday;
          $_SESSION['type'] = $post_type;
          $_SESSION['tell'] = $post_tell;
          $_SESSION['comment'] = $post_comment;
          $_SESSION['year'] = $post_year; // 年を追加
          $_SESSION['month'] = $post_month; // 月を追加
          $_SESSION['day'] = $post_day; // 日を追加
        
        if(!empty($_POST['name']) && !empty($birthday_chk) && !empty($_POST['type']) //$_POST['year']を$birthday_chk
                && !empty($_POST['tell']) && !empty($_POST['comment'])){
        
        // ↑に修正 if(!empty($_POST['name']) && !empty($_POST['year']) && !empty($_POST['type']) 
        //         && !empty($_POST['tell']) && !empty($_POST['comment'])){
            
            // $post_name = $_POST['name']; ~ $_SESSION['comment'] = $post_comment;までの位置を
            // if文の上(※1)に変更。理由:現状だと入力の不完全があった場合にセッションに情報が格納されないため。
            // $post_name = $_POST['name'];
            // //date型にするために1桁の月日を2桁にフォーマットしてから格納
            // $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
            // $post_type = $_POST['type'];
            // $post_tell = $_POST['tell'];
            // $post_comment = $_POST['comment'];
            // 
            // //セッション情報に格納
            // session_start();
            // $_SESSION['name'] = $post_name;
            // $_SESSION['birthday'] = $post_birthday;
            // $_SESSION['type'] = $post_type;
            // $_SESSION['tell'] = $post_tell;
            // $_SESSION['comment'] = $post_comment;
        ?>

            <h1>登録確認画面</h1><br>
            名前:<?php echo $post_name;?><br>
            生年月日:<?php echo $post_birthday;?><br>
            種別:<?php echo $post_type?><br>
            電話番号:<?php echo $post_tell;?><br>
            自己紹介:<?php echo $post_comment;?><br>

            上記の内容で登録します。よろしいですか？

            <form action="<?php echo INSERT_RESULT ?>" method="POST">
              <input type="submit" name="yes" value="はい">
              <input type="hidden" name="access_chk" value="access"><!-- 正常なアクセスの確認のための変数の送信 --> 
            </form>
            <form action="<?php echo INSERT ?>" method="POST">
                <input type="submit" name="no" value="登録画面に戻る">
            </form>
            
        <?php }else{ ?>
            <h1>入力項目が不完全です</h1><br>
            再度入力を行ってください<br>
            <?php 
            if( empty($_POST['name']) ){ // 名前が不完全
                echo '<font color="red" size="2">※<strong>お名前</strong>の入力が不完全です</font><br>';
            }
            if( empty($birthday_chk) ){// 生年月日が不完全
                echo '<font color="red" size="2">※<strong>生年月日</strong>の入力に誤りがあります</font><br>';
            }
            if( empty($_POST['type']) ){// 種別が不完全
                echo '<font color="red" size="2">※<strong>種別</strong>の入力が不完全です</font><br>';
            }
            if( empty($_POST['tell']) ){// 電話番号が不完全
                echo '<font color="red" size="2">※<strong>電話番号</strong>の入力が不完全です</font><br>';
            }
            if( empty($_POST['comment']) ){// 自己紹介が不完全
                echo '<font color="red" size="2">※<strong>自己紹介</strong>の入力が不完全です</font><br>';
            }

            ?>
            <form action="<?php echo INSERT ?>" method="POST">
                <input type="submit" name="no" value="登録画面に戻る">
            </form>
        <?php }?>
        <br>
        <?php echo return_top(); // トップへ戻るリンクを生成 
    }?> 

</body>
</html>
