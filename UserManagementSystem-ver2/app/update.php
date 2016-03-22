<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
//ソース冒頭でPOST変数を変数に格納し、html<body>内では変数を呼び出す。
$id = $_GET['id'];
$result = profile_detail($id);

$name = $result[0]['name'];
$birthday = $result[0]['birthday'];
$year = explode('-',$birthday)[0];
$month = explode('-',$birthday)[1];
$day = explode('-',$birthday)[2];
$type = $result[0]['type'];
$tell = $result[0]['tell'];
$comment = $result[0]['comment'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>変更入力画面</title>
</head>
<body>
    <form action="<?php echo UPDATE_RESULT ?>?id=<?php echo $id ?>" method="POST">
        名前:
        <input type="text" name="name_upd" value="<?php echo $name; ?>">
        <br><br>

        生年月日:
        <select name="year_upd">
            <option value="">----</option>
            <?php
            for($i=1950; $i<=2010; $i++){ ?>
                <option value="<?php echo $i;?>" <?php if($i == $year){echo 'selected';} ?> ><?php echo $i ;?></option>
                <?php } ?>
        </select>年
        <select name="month_upd">
            <option value="">--</option>
            <?php
            for($i = 1; $i<=12; $i++){?>
            <option value="<?php echo $i;?>" <?php if($i == $month){echo 'selected';} ?> ><?php echo $i;?></option>
            <?php } ;?>
        </select>月
        <select name="day_upd">
            <option value="">--</option>
            <?php
            for($i = 1; $i<=31; $i++){ ?>
            <option value="<?php echo $i; ?>" <?php if($i == $day){echo 'selected';} ?>><?php echo $i;?></option>
            <?php } ?>
        </select>日
        <br><br>

        種別:
        <br>
        <?php
        for($i = 1; $i<=3; $i++){ ?>
        <input type="radio" name="type_upd" value="<?php echo $i; ?>"<?php if($i==$result[0]['type']){echo "checked";}?>><?php echo ex_typenum($i);?><br>
        <?php } ?>
        <br>

        電話番号:
        <input type="text" name="tell_upd" value="<?php echo $result[0]['tell']; ?>">
        <br><br>

        自己紹介文
        <br>
        <textarea name="comment_upd" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $result[0]['comment']; ?></textarea><br><br>

        <input type="hidden" name="name" value="<?php echo $name ?>">
        <input type="hidden" name="birthday" value="<?php echo $birthday ?>">
        <input type="hidden" name="type" value="<?php echo $type ?>">
        <input type="hidden" name="tell" value="<?php echo $tell ?>">
        <input type="hidden" name="comment" value="<?php echo $comment ?>">
        <input type="hidden" name="mode" value="RESULT">
        <input type="submit" name="btnSubmit" value="以上の内容で更新を行う">
    </form>
    <br>
    <form action="<?php echo RESULT_DETAIL; ?>" method="POST">
      <input type="hidden" name="mode" value="BACKtoRESULT_DETAIL">
      <input type="submit" name="NO" value="詳細画面に戻る" style="width:100px">
    </form>
    <br>
    <?php echo return_top();//トップページへ戻るリンクの生成 ?>
</body>

</html>
