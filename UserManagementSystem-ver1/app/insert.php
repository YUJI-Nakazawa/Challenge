<?php require_once '../common/scriptUtil.php'; ?>
<?php session_start(); // session_startの位置を変更。理由:htmlのヘッダ情報が確定する前にセッションスタートさせる ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <?php 
    //セッションからユーザ情報を取得
    $post_name = isset($_SESSION['name']) ? $_SESSION['name'] : "";
    $post_birthday = isset($_SESSION['birthday']) ? $_SESSION['birthday'] : "";
    $post_type = isset($_SESSION['type']) ? $_SESSION['type'] : "";
    $post_tell = isset($_SESSION['tell']) ? $_SESSION['tell'] : "";
    $post_comment = isset($_SESSION['comment']) ? $_SESSION['comment'] : "";
    $post_year = isset($_SESSION['year']) ? $_SESSION['year'] : ""; // 年を追加
    $post_month = isset($_SESSION['month']) ? $_SESSION['month'] : ""; // 月を追加
    $post_day = isset($_SESSION['day']) ? $_SESSION['day'] : ""; // 日を追加
    // $arr_YMD = explode('-',$post_birthday); // 生年月日を"YYYY-MM-DD"から配列へ分解
    ?>
    
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    名前:
    <input type="text" name="name" value="<?php echo $post_name; ?>"> <!--  valueにセッションの中身を入れる -->
    <br><br>
    
    生年月日:　
    <select name="year">
        <option value="----">----</option>
        <?php
        for($i=1950; $i<=2010; $i++){ ?>
        <option value="<?php echo $i;?>" <?php if($i == $post_year){echo 'selected';} ?> ><?php echo $i ;?></option>
        <?php } ?>
    </select>年
    <select name="month">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=12; $i++){?>
        <option value="<?php echo $i;?>" <?php if($i == $post_month){echo 'selected';} ?> ><?php echo $i;?></option>
        <?php } ?>
    </select>月
    <select name="day">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=31; $i++){ ?>
        <option value="<?php echo $i; ?>" <?php if($i == $post_day){echo 'selected';} ?> ><?php echo $i;?></option>
        <?php } ?>
    </select>日
    <br><br>

    種別:
    <br><!-- if文によりラジオボタンの初期値をセッションの情報で選択 -->
    <input type="radio" name="type" value="エンジニア"
     <?php if($post_type == 'エンジニア'){echo 'checked';} ?> >エンジニア<br>
    <input type="radio" name="type" value="営業"
     <?php if($post_type == '営業'){echo 'checked';} ?> >営業<br>
    <input type="radio" name="type" value="その他"
     <?php if($post_type == 'その他'){echo 'checked';} ?> >その他<br>
    <br>
    
    電話番号:
    <input type="text" name="tell" value="<?php echo $post_tell ?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php echo $post_comment ?></textarea><br><br>
    
    <input type="submit" name="btnSubmit" value="確認画面へ">
    <input type="hidden" name="access_chk" value="access"><!-- 正常なアクセスの確認のための変数の送信 --> 
    
    </form>
    <br>
    <?php echo return_top(); // トップへ戻るリンクを生成?>
    
</body>
</html>
