<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    //入力画面から「確認画面へ」ボタンを押した場合のみ処理を行う
    $mode = isset($_POST['mode']) ? $_POST['mode'] : "";
    if($mode != "UPDATE_RESULT"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
        $id = $_GET['id'];
        //更新前の情報を変数に格納
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $type = $_POST['type'];
        $tell = $_POST['tell'];
        $comment = $_POST['comment'];
        //更新後の情報を変数に格納
        $name_upd = bind_p2s('name_upd');
        $year_upd = bind_p2s('year_upd');
        $month_upd = bind_p2s('month_upd');
        $year_upd = bind_p2s('year_upd');
        $day_upd = bind_p2s('day_upd');
        $type_upd = bind_p2s('type_upd');
        $tell_upd = bind_p2s('tell_upd');
        $comment_upd = bind_p2s('comment_upd');
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $birthday_upd = $year_upd.'-'.sprintf('%02d',$month_upd).'-'.sprintf('%02d',$day_upd);
        
        // 4,6,9,11月の時、日にちの選択の正・不正を判別する。
        if($month_upd == 4 || $month_upd == 6 || $month_upd == 9 || $month_upd == 11){
            //31日の場合、$day_chkをnullとする。
            if($day_upd == 31){
                // $_POST['day'] = null;
                $day_chk = null;
            }
            else{
                $day_chk = true;
            }
        }
        // 2月の時、日にちの選択の正・不正を判別する。
        elseif($month_upd == 2){
            // うるう年の時の日にちの正・不正を判別する。
            if($year_upd % 4 == 0 && $year_upd % 100 != 0 || $year_upd == 0){
                //30日、31日の場合、$day_chkをnullとする。
                if($day_upd == 30 || $day_upd == 31){
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
                if($day_upd == 29 || $day_upd == 30 || $day_upd == 31 ){
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
        $confirm_values_upd = array(
                                'name_upd' => $name_upd,
                                'year_upd' => $year_upd,
                                'month_upd' => $month_upd,
                                'day_upd' => $day_upd,
                                'type_upd' => $type_upd,
                                'tell_upd' => $tell_upd,
                                'comment_upd' => $comment_upd,
                                'day_chk' => $day_chk);
    
        if(in_array(null,$confirm_values_upd, true)){
            ?>
            <h1>入力項目が不完全です</h1><br>
            再度入力を行ってください<br>
            <h3>不完全な項目</h3>
            <?php
            //連想配列内の未入力項目を検出して表示
            foreach ($confirm_values_upd as $key => $value){
                if($value == null){
                    if($key == 'name_upd'){
                        echo '名前';
                    }
                    if($key == 'year_upd'){
                        echo '年';
                    }
                    if($key == 'month_upd'){
                        echo '月';
                    }
                    if($key == 'day_upd' && $day_chk == true){
                        echo '日';
                    }
                    if($key == 'type_upd'){
                        echo '種別';
                    }
                    if($key == 'tell_upd'){
                        echo '電話番号';
                    }
                    if($key == 'comment_upd'){
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
            ?>
            <form action="<?php echo UPDATE; ?>?id=<?php echo $id ?>" method="POST">
                <input type="hidden" name="mode" value="REINPUT" >
                <input type="submit" name="no" value="登録画面に戻る">
            </form><br><br>
            <?php
        }
        else{
            $result = update_profile($id, $name_upd, $birthday_upd, $type_upd, $tell_upd, $comment_upd);
            //エラーが発生しなければ表示を行う
            if(!isset($result)){
                ?>
                <h1>更新確認</h1>
                <?php
                if($name != $name_upd){?>
                    名前:<?php echo $name; ?> → <?php echo $name_upd; ?><br>
                <?php
                }
                if($birthday != $birthday_upd){ ?>
                    生年月日:<?php echo $birthday; ?> → <?php echo $birthday_upd; ?><br>
                <?php }
                if($type != $type_upd){ ?>
                    種別:<?php echo ex_typenum($type); ?> → <?php echo ex_typenum($type_upd); ?><br>
                <?php }
                if($tell != $tell_upd){ ?>
                    電話番号:<?php echo $tell; ?> → <?php echo $tell_upd; ?><br>
                <?php }
                if($comment != $comment_upd){ ?>
                    自己紹介:<?php echo $comment; ?> → <?php echo $comment_upd; ?><br><br>
                <?php } ?>
                以上の内容で更新しました。<br>
                <?php
            }
            else{
                echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
            }
        }
    }
    echo return_top();
    ?>
  </body>
</html>
