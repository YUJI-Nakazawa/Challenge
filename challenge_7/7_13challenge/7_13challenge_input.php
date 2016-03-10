<?php 

$timetable_page = '7_13challenge.php';

$timetableID = $_POST['timetableID'];
$weekday = $_POST['weekday'];
$period = $_POST['period'];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>◯✕塾 時間割</title>
     <link type="text/css" rel="stylesheet" href="style.css">
 </head>
 <body>
     <h3><?php echo $weekday.'の'.$period.'時限目の時間割の変更' ?></h3>
     <div class="input">
         <!-- <h5>曜日</h5> -->
         <form action="<?php echo $timetable_page; ?>" method="post">
             <!-- <select name="weekday">
                 <option value="">選択してください</option>
                 <option value="1">月曜日</option>
                 <option value="2">火曜日</option>
                 <option value="3">水曜日</option>
                 <option value="4">木曜日</option>
                 <option value="5">金曜日</option>
             </select>
         <h5>時限</h5>
             <select name="period">
                 <option value="">選択してください</option>
                 <option value="1">1時限目</option>
                 <option value="2">2時限目</option>
                 <option value="3">3時限目</option>
             </select> -->
         <h5>科目</h5>
             <select name="subjectID">
                 <option value="">選択してください</option>
                 <option value="1">国語</option>
                 <option value="2">数学</option>
                 <option value="3">英語</option>
                 <option value="4">世界史</option>
                 <option value="5">日本史</option>
                 <option value="6">地理</option>
                 <option value="7">物理</option>
                 <option value="8">化学</option>
                 <option value="9">生物</option>
             </select>
         <h5>講師</h5>
             <select name="teacherID">
                 <option value="">選択してください</option>
                 <option value="1">田中</option>
                 <option value="2">青木</option>
                 <option value="3">佐藤</option>
                 <option value="4">鈴木</option>
                 <option value="5">加藤</option>
             </select><br><br>
             <button type="submit" name="flag" value="true">変更</button>
             <input type="hidden" name="timetableID" value="<?php echo $timetableID;?>">
         </form>
         <br><br>
         <a href="<?php echo $timetable_page; ?>">戻る</a>
     </div>
 </body>
 </html>
 