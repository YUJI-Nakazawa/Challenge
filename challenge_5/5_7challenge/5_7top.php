<?php 

session_start();
// var_dump($_SESSION);

$name = isset($_SESSION['s_name']) ? $_SESSION['s_name'] : "";
$seibetsu = isset($_SESSION['s_seibetsu']) ? $_SESSION['s_seibetsu'] : "";
$hoby = isset($_SESSION['s_hoby']) ? $_SESSION['s_hoby'] : "";

 ?>
 
 <!DOCTYPE html>
 <html lang="ja">
 <head>
     <meta charset="utf-8">
     <title>課題5-7,8(TOPページ)</title>
 </head>
 <body>
     <h1>投稿ページ</h1>
     <p><font color="red">※の箇所は必ず入力してください。</font></p>
     <form action="5_7-8confirm.php" method="post">
         
         名前:&nbsp;<input type="text" name="name" value="<?php echo $name ?>" required>
         <font size="1px">※必須</font><br><br>
         
         性別:&nbsp;
         女性<input type="radio" name="seibetsu" value="女性" 
         <?php if($seibetsu == '女性'){echo 'checked';}?> required>&nbsp;&nbsp;
         男性<input type="radio" name="seibetsu" value="男性" 
         <?php if($seibetsu == '男性'){echo 'checked';}?> required><font size="1px">※必須</font><br><br>
         
         趣味:&nbsp;<textarea name="hoby"><?php echo $hoby; ?></textarea><br><br>
         <input type="submit" value="送信">
     </form>
     <br>
     <br>
     <form action="5_7-8top.php">
         <button type="submit" value="<?php session_unset(); ?>">セッションを削除</button>
     </form>
 </body>
 </html>