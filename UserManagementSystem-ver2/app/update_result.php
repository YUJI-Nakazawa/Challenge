<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';

$id = $_GET['id'];

$name = $_POST['name'];
$birthday = $_POST['birthday'];
$type = $_POST['type'];
$tell = $_POST['tell'];
$comment = $_POST['comment'];

$name_upd = $_POST['name_upd'];
$year_upd = $_POST['year_upd'];
$month_upd = $_POST['month_upd'];
$day_upd = $_POST['day_upd'];
$type_upd = $_POST['type_upd'];
$tell_upd = $_POST['tell_upd'];
$comment_upd = $_POST['comment_upd'];
$birthday_upd = $year_upd.'-'.sprintf('%02d',$month_upd).'-'.sprintf('%02d',$day_upd);

$result = update_profile($id, $name_upd, $birthday_upd, $type_upd, $tell_upd, $comment_upd);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
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
    echo return_top();
    ?>
  </body>
</html>
