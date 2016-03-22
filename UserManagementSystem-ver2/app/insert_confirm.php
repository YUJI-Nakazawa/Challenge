<?php require_once '../common/defineUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    //入力画面から「確認画面へ」ボタンを押した場合のみ処理を行う
    if(!$_POST['mode']=="CONFIRM"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
        // 4,6,9,11月の時、日にちの選択の正・不正を判別する。
        if( $_POST['month'] == 4 || $_POST['month'] == 6 || $_POST['month'] == 9 || $_POST['month'] == 11 ){
            //31日の場合、$day_chkをnullとする。
            if( $_POST['day'] == 31 ){
                // $_POST['day'] = null;
                $day_chk = null;
            }
            else{
                $day_chk = true;
            }
        }
        // 2月の時、日にちの選択の正・不正を判別する。
        elseif( $_POST['month'] == 2){
            // うるう年の時の日にちの正・不正を判別する。
            if( $_POST['year']%4 == 0 && $_POST['year']%100 != 0 || $_POST['year'] == 0 ){
                //30日、31日の場合、$day_chkをnullとする。
                if( $_POST['day'] == 30 || $_POST['day'] = 31 ){
                    // $_POST['day'] = null;
                    $day_chk = null;
                }
                else{
                    $day_chk = true;
                }
            }
             //うるう年以外の時の日にちの正・不正を判別する。
            else{
                //29日、30日、31日の場合、$day_chkをnullとする。
                if( $_POST['day'] == 29 || $_POST['day'] == 30 || $_POST['day'] == 31 ){
                    // $_POST['day'] = null;
                    $day_chk = null;
                }
                else{
                    $day_chk = true;
                }
            }
        }
        else{
            $day_chk = true; //日にちの不正がなかった場合、もしくは、日にちが 未入力の場合$day_chkをtrueとする。
        }
        
        //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
        $confirm_values = array(
                                'name' => bind_p2s('name'),
                                'year' => bind_p2s('year'),
                                'month' =>bind_p2s('month'),
                                'day' =>bind_p2s('day'),
                                'type' =>bind_p2s('type'),
                                'tell' =>bind_p2s('tell'),
                                'comment' =>bind_p2s('comment'),
                                'day_chk' =>$day_chk);
        
        //1つでも未入力項目があったら表示しない
        if(!in_array(null,$confirm_values, true)){
            ?>        
            <h1>登録確認画面</h1><br>
            名前:<?php echo $confirm_values['name'];?><br>
            生年月日:<?php echo $confirm_values['year'].'年'.$confirm_values['month'].'月'.$confirm_values['day'].'日';?><br>
            種別:<?php echo ex_typenum($confirm_values['type']);?><br>
            電話番号:<?php echo $confirm_values['tell'];?><br>
            自己紹介:<?php echo $confirm_values['comment'];?><br><br>

            上記の内容で登録します。よろしいですか？

            <form action="<?php echo INSERT_RESULT ?>" method="POST">
                <input type="hidden" name="mode" value="RESULT" >
                <input type="submit" name="yes" value="はい">
            </form>
            <?php
        }
        else {
            ?>
            <h1>入力項目が不完全です</h1><br>
            再度入力を行ってください<br>
            <h3>不完全な項目</h3>
            <?php
            //連想配列内の未入力項目を検出して表示
            foreach ($confirm_values as $key => $value){
                if($value == null){
                    if($key == 'name'){
                        echo '名前';
                    }
                    if($key == 'year'){
                        echo '年';
                    }
                    if($key == 'month'){
                        echo '月';
                    }
                    if($key == 'day' && $day_chk == true){
                        echo '日';
                    }
                    if($key == 'type'){
                        echo '種別';
                    }
                    if($key == 'tell'){
                        echo '電話番号';
                    }
                    if($key == 'comment'){
                        echo '自己紹介';
                    }
                    if($key == 'day_chk'){
                        break;
                    }
                    echo 'が未記入です<br>';
                }
            }
            if($day_chk == null){
                echo '日にちの入力に誤りがあります。';
            }
        }
        ?>
        <form action="<?php echo INSERT; ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php
    }
    echo return_top();
    ?>
</body>
</html>