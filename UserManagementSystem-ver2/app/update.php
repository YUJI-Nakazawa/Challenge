<?php
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
session_start();?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $mode = isset($_POST['mode']) ? $_POST['mode'] : "";
    if($mode != "UPDATE" && $mode != "REINPUT" && $id == null){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }
    else{
        $result = profile_detail($id);
        
        //更新前の情報を変数に格納する。
        $name = $result[0]['name'];
        $birthday = $result[0]['birthday'];
        $year = explode('-',$birthday)[0];
        $month = explode('-',$birthday)[1];
        $day = explode('-',$birthday)[2];
        $type = $result[0]['type'];
        $tell = $result[0]['tell'];
        $comment = $result[0]['comment'];
        
        //フォーム再入力時の初期値
        $name_upd = form_value('name_upd');
        $year_upd = form_value('year_upd');
        $month_upd = form_value('month_upd');
        $day_upd = form_value('day_upd');
        $type_upd = form_value('type_upd');
        $tell_upd = form_value('tell_upd');
        $comment_upd = form_value('comment_upd');
        
        //指定したセッションの中身が存在していればセッションの値を、なければ更新前の値を変数に格納する。
        $name_upd = isset($name_upd) ? $name_upd : $name;
        $year_upd = isset($year_upd)? $year_upd : $year;
        $month_upd = isset($month_upd) ? $month_upd : $month;
        $day_upd = isset($day_upd) ? $day_upd : $day;
        $type_upd = isset($type_upd) ? $type_upd : $type;
        $tell_upd = isset($tell_upd) ? $tell_upd : $tell;
        $comment_upd = isset($comment_upd) ? $comment_upd : $comment;
        ?>
        
        <form action="<?php echo UPDATE_RESULT ?>?id=<?php echo $id ?>" method="POST">
            名前:
            <input type="text" name="name_upd" value="<?php echo $name_upd; ?>">
            <br><br>

            生年月日:
            <select name="year_upd">
                <option value="">----</option>
                <?php
                for($i=1950; $i<=2010; $i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if($i == $year_upd){echo 'selected';} ?> ><?php echo $i; ?></option>
                    <?php } ?>
            </select>年
            <select name="month_upd">
                <option value="">--</option>
                <?php
                for($i = 1; $i<=12; $i++){ ?>
                <option value="<?php echo $i;?>" <?php if($i == $month_upd){echo 'selected';} ?> ><?php echo $i; ?></option>
                <?php } ;?>
            </select>月
            <select name="day_upd">
                <option value="">--</option>
                <?php
                for($i = 1; $i<=31; $i++){ ?>
                <option value="<?php echo $i; ?>" <?php if($i == $day_upd){echo 'selected';} ?>><?php echo $i; ?></option>
                <?php } ?>
            </select>日
            <br><br>

            種別:
            <br>
            <?php
            for($i = 1; $i<=3; $i++){ ?>
            <input type="radio" name="type_upd" value="<?php echo $i; ?>"<?php if($i == $type_upd){echo "checked";} ?>><?php echo ex_typenum($i);?><br>
            <?php } ?>
            <br>

            電話番号:
            <input type="text" name="tell_upd" value="<?php echo $tell_upd; ?>">
            <br><br>

            自己紹介文
            <br>
            <textarea name="comment_upd" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $comment_upd; ?></textarea><br><br>
            <!-- 更新前の情報を次のページに投げる -->
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="birthday" value="<?php echo $birthday; ?>">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="hidden" name="tell" value="<?php echo $tell; ?>">
            <input type="hidden" name="comment" value="<?php echo $comment; ?>">
            <input type="hidden" name="mode" value="UPDATE_RESULT">
            <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
        </form>
        <br>
        <form action="<?php echo RESULT_DETAIL; ?>?id=<?php echo $id ?>" method="POST">
            <input type="hidden" name="mode" value="BACKtoRESULT_DETAIL">
            <input type="submit" name="NO" value="詳細画面に戻る" style="width:100px">
        </form>
        <br>
    <?php } ?>
    <?php echo return_top();//トップページへ戻るリンクの生成 ?>
</body>

</html>
