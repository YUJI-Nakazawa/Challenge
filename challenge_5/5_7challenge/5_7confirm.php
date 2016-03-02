<?php 
$name = $_POST['name'];
$seibetsu = $_POST['seibetsu'];
$hoby = $_POST['hoby'];

session_start();
$_SESSION['s_name'] = $name;
$_SESSION['s_seibetsu'] = $seibetsu;
$_SESSION['s_hoby'] = $hoby;

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>課題5-7,8(確認ページ)</title>
</head>
<body>
    <h1>投稿ページ</h1>
    <h3>送信内容を確認してください。</h3>
    <p><?php echo '名前:'.$name; ?></p>
    <p><?php echo '性別:'.$seibetsu; ?></p>
    <p><?php echo '趣味:'.$hoby; ?></p>
    <form action="" method="post"><!--おまけ-->
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="seibetsu" value="<?php echo $seibetsu; ?>">
        <input type="hidden" name="hoby" value="<?php echo $hoby; ?>">
        <input type="submit" value="上記の内容で送信">
    </form>
    <a href="5_7-8top.php">戻る</a>
</body>
</html>




