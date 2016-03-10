<?php 

$input_page = '7_13challenge_input.php';

$timetableID = isset($_POST['timetableID']) ? $_POST['timetableID'] : "";
// $weekday = isset($_POST['weekday']) ? $_POST['weekday'] : "";
// $period = isset($_POST['period']) ? $_POST['period'] : "";
$subjectID = isset($_POST['subjectID']) ? $_POST['subjectID'] : "";
// $subjectName = isset($_POST['subjectName']) ? $_POST['subjectName'] : "";
$teacherID = isset($_POST['teacherID']) ? $_POST['teacherID'] : "";
// $teacherName = isset($_POST['teacherName']) ? $_POST['teacherName'] : "";

$flag = isset($_POST['flag']) ? $_POST['flag'] : "";

try{
$pdo_object = new PDO('mysql:host=localhost; dbname=challenge7_13; charset=utf8','root','root');
// echo '接続に成功<br>';
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception->getMessage());
}

// echo $timetableID.'<br>';
// echo $subjectID.'<br>';
// echo $teacherID.'<br>';


// UPDATEインスタンス
$update_sql = 'UPDATE timetable SET subjectID = :subjectID, teacherID = :teacherID WHERE timetableID = :timetableID';
$update = $pdo_object -> prepare($update_sql);
$update -> bindValue(':subjectID', $subjectID);
$update -> bindValue(':teacherID', $teacherID);
$update -> bindValue(':timetableID', $timetableID);
if($flag){
    $update -> execute();
}

// SELECTインスタンス
// $select_sql = 'select * from timetable where timetableID = :timetableID';
// $select_sql = 'select * from timetable';
$select_sql = 'SELECT timetableID, weekday, period, subjectName, teacherName FROM timetable JOIN subjects JOIN teachers
                ON timetable.subjectID = subjects.subjectID AND timetable.teacherID = teachers.teacherID';
$select = $pdo_object -> prepare($select_sql);
// $select -> bindValue(':timetableID', 1);
$select -> execute();

function maketd(){
    global $select;
    global $weekday;
    global $period;
    $rec = $select -> fetch(PDO::FETCH_NUM);
    for ($i=0; $i <= 4; $i++) {
        echo '<td width="100">'.$rec[$i].'</td>';
    }
    $weekday = $rec[1];
    $period = $rec[2];
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>◯✕塾 時間割</title>
    <link type="text/css" rel="stylesheet" href="style.css">
</head>
<body>
    <h3>時間割</h3>
    <div class="timetable">
    <table border="1">
        <tr>
            <th width="100">ID</th>
            <th width="100">曜日</th>
            <th width="100">時限</th>
            <th width="100">科目</th>
            <th width="100">講師</th>
            <th width="100" class="lastcolumn"></th>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="1">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="2">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="3">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="4">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="5">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="6">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="7">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="8">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="9">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="10">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="11">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="12">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="13">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="14">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
        <tr>
            <?php maketd(); ?>
            <td width="100" class="lastcolumn">
                <form action="<?php echo $input_page; ?>" method="post">
                    <button type="submit" name="timetableID" value="15">変更</button>
                    <input type="hidden" name="weekday" value="<?php echo $weekday ?>">
                    <input type="hidden" name="period" value="<?php echo $period ?>">
                </form>
            </td>
        </tr>
    </table>
    </div>
    <!-- <div class="buttontable">
        <table>
            <tr><th></th></tr>
            <tr><td><form><button type="submit" name="timetableID" value="1">変更</button></fomr></td></tr>
            <tr><td><form><button type="submit" name="timetableID" value="2">変更</button></fomr></td></tr>
            <tr><td><form><button type="submit" name="timetableID" value="3">変更</button></fomr></td></tr>
            <tr><td><form><button type="submit" name="timetableID" value="4">変更</button></fomr></td></tr>
            <tr><td><form><button type="submit" name="timetableID" value="5">変更</button></fomr></td></tr>
            <tr><td><form><button type="submit" name="timetableID" value="6">変更</button></fomr></td></tr>
            <tr><td><form><button type="submit" name="timetableID" value="7">変更</button></fomr></td></tr>
            
        </table>
    </div> -->
</body>
</html>
 