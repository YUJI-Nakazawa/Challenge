<!-- 課題9 -->

<?php
// 検索
$s_name = isset($_POST['s_name']) ? $_POST['s_name'] : "";
$s_hidden = isset($_POST['s_hidden']) ? $_POST['s_hidden'] : "";
// 挿入
$i_id = isset($_POST['i_id']) ? $_POST['i_id'] : "";
$i_name = isset($_POST['i_name']) ? $_POST['i_name'] : "";
$i_tell = isset($_POST['i_tell']) ? $_POST['i_tell'] : "";
$i_age = isset($_POST['i_age']) ? $_POST['i_age'] : "";
$i_birthday = isset($_POST['i_birthday']) ? $_POST['i_birthday'] : "";
$i_hidden = isset($_POST['i_hidden']) ? $_POST['i_hidden'] : "";
// 削除
$d_id = isset($_POST['d_id']) ? $_POST['d_id'] : "";
$d_hidden = isset($_POST['d_hidden']) ? $_POST['d_hidden'] : "";
// 上書き
$u_id = isset($_POST['u_id']) ? $_POST['u_id'] : "";
$u_name = isset($_POST['u_name']) ? $_POST['u_name'] : "";
$u_tell = isset($_POST['u_tell']) ? $_POST['u_tell'] : "";
$u_age = isset($_POST['u_age']) ? $_POST['u_age'] : "";
$u_birthday = isset($_POST['u_birthday']) ? $_POST['u_birthday'] : "";
$u_hidden = isset($_POST['u_hidden']) ? $_POST['u_hidden'] : "";
// 複合検索
$ms_name = isset($_POST['ms_name']) ? $_POST['ms_name'] : "";
$ms_age = isset($_POST['ms_age']) ? $_POST['ms_age'] : "";
$ms_birthday = isset($_POST['ms_birthday']) ? $_POST['ms_birthday'] : "";
$ms_hidden = isset($_POST['ms_hidden']) ? $_POST['ms_hidden'] : "";
// 全要素参照
$show_hidden = isset($_POST['show_hidden']) ? $_POST['show_hidden'] : "";

const this_page = '7_8-12challenge(or).php';

// var_dump($ms_hidden);

// データベースchallenge_dbに接続
try{
$pdo_object = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','root','root');
// echo '接続に成功<br>';
}catch(PDOException $Exception){
    die('接続に失敗しました:'.$Exception -> getMessage());
}
// 検索インスタンス
$search_sql = 'select * from profiles where name like :name';
$search = $pdo_object -> prepare($search_sql);
$search -> bindValue(':name', '%'.$s_name.'%');
// 挿入インスタンス
$insert_sql = 'insert into profiles(profilesID, name, tell, age, birthday)  values(:id, :name, :tell, :age, :birthday)';
$insert = $pdo_object -> prepare($insert_sql);
$insert -> bindValue(':id', $i_id);
$insert -> bindValue(':name', $i_name);
$insert -> bindValue(':tell', $i_tell);
$insert -> bindValue(':age', $i_age);
$insert -> bindValue(':birthday', $i_birthday);
// 削除インスタンス
$delete_sql = 'delete from profiles where profilesID = :id';
$delete = $pdo_object -> prepare($delete_sql);
$delete -> bindValue(':id', $d_id);
// 上書きインスタンス
$update_sql = 'update profiles set name = :name, tell = :tell, age = :age, birthday = :birthday where profilesID = :id';
$update = $pdo_object -> prepare($update_sql);
$update -> bindValue(':id', $u_id);
$update -> bindValue(':name', $u_name);
$update -> bindValue(':tell', $u_tell);
$update -> bindValue(':age', $u_age);
$update -> bindValue(':birthday', $u_birthday);
// 複合検索インスタンス
$mulsearch_sql = 'select * from profiles where name like :name or age = :age or birthday = :birthday';
$mulsearch = $pdo_object -> prepare($mulsearch_sql);

if(!empty($ms_name)){
    $mulsearch -> bindValue(':name', '%'.$ms_name.'%');
}
else{
    $mulsearch -> bindValue(':name', $ms_name);
}
$mulsearch -> bindValue(':age', $ms_age);
$mulsearch -> bindValue(':birthday', $ms_birthday);

// 全要素参照インスタンス
$selectAll_sql = 'select * from profiles';
$selectAll = $pdo_object -> prepare($selectAll_sql);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>課題9</title>
    </head>
<body>
    <div><!--課題8-->
        <form action = "<?php echo this_page ?>" method = "post">
            <h6>データ検索</h6>
            検索する名前:<input type = "text" name = "s_name"><br>
            <input type="hidden" name="s_hidden" value="search">
            <input type = "submit" value = " 検索">
        </form>
    </div>
    <div><!--課題9-->
        <form action = "<?php echo this_page ?>" method = "post">
            <h6>データ挿入</h6>
            挿入するID:<input type = "text" name = "i_id">
            挿入する名前:<input type = "text" name = "i_name">
            挿入する電話番号:<input type = "text" name = "i_tell">
            挿入する年齢:<input type = "text" name = "i_age">
            挿入する誕生日:<input type = "text" name = "i_birthday"><br>
            <input type="hidden" name="i_hidden" value="insert">
            <input type = "submit" value = "挿入">
        </form>
    </div>
    <div><!--課題10-->
        <form action = "<?php echo this_page ?>" method = "post">
            <h6>レコード削除</h6>
            ID:<input type = "text" name = "d_id"><br>
            <input type="hidden" name="d_hidden" value="delete">
            <input type = "submit" value = "削除">
        </form>
    </div>
    <div><!--課題11-->
        <form action = "<?php echo this_page ?>" method = "post">
            <h6>データ上書き</h6>
            対象のID:<input type = "text" name = "u_id">
            上書きする名前:<input type = "text" name = "u_name">
            上書きする電話番号:<input type = "text" name = "u_tell">
            上書きする年齢:<input type = "text" name = "u_age">
            上書きする誕生日:<input type = "text" name = "u_birthday"><br>
            <input type="hidden" name="u_hidden" value="update">
            <input type = "submit" value = "上書き">
        </form>
    </div>
    <div><!--課題12-->
        <form action = "<?php echo this_page ?>" method = "post">
            <h6>複合検索</h6>
            検索する名前:<input type = "text" name = "ms_name">
            検索する年齢:<input type = "text" name = "ms_age">
            検索する誕生日:<input type = "text" name = "ms_birthday"><br>
            <input type="hidden" name="ms_hidden" value="mulsearch">
            <input type = "submit" value = "複合検索">
        </form>
    </div>
    <div>
        <form action = "<?php echo this_page ?>" method = "post">
            <h6>全要素表示</h6>
            <input type="hidden" name="show_hidden" value="showall">
            <input type = "submit" value = "テーブルの全要素を参照する">
        </form>
    </div>
    <div>
        <h6>データ表示</h6>
        <?php
        if( !empty($s_hidden) ){
            if( empty($s_name) ){
                echo '検索エラー。名前を入力してください。<br>';
            }
            else{
                $search -> execute();
                while($recArr = $search -> fetch(PDO::FETCH_ASSOC)){
                    foreach($recArr as $key => $value){
                        echo $key.':'.$value.'<br>';
                    }
                }
                // if($search -> fetchColumn() == 0){
                //     echo '検索エラー。該当する名前はございません。';
                // }
            }
        }
        
        if( !empty($i_hidden) ){
            if( empty($i_id) && empty($i_name) && empty($i_tell) && empty($i_age) && empty($i_birthday)){
                echo '挿入エラー。データを入力してください。';
            }
            else{
                $insert -> execute();
                $selectAll -> execute();
                while($recArr = $selectAll -> fetch(PDO::FETCH_ASSOC)){
                    foreach($recArr as $key => $value){
                        echo $key.':'.$value.'<br>';
                    }
                }
            }
        }

        if( !empty($d_hidden) ){
            if( empty($d_id) ){
                echo '削除エラー。IDを入力してください。';
            }
            else{
                $delete -> execute();
                if($delete -> rowcount() > 0){
                    $selectAll -> execute();
                    while($recArr = $selectAll -> fetch(PDO::FETCH_ASSOC)){
                        foreach($recArr as $key => $value){
                            echo $key.':'.$value.'<br>';
                        }
                    }
                }
                else{
                    echo '削除エラー。該当するIDはございません。<br>';
                }
            }
        }
        
        if( !empty($u_hidden) ){
            if( empty($u_id) && empty($u_name) && empty($u_tell) && empty($u_age) && empty($u_birthday)){
                echo '上書きエラー。データを入力してください。';
            }
            else{
                $update -> execute();
                if($update -> rowcount() > 0){
                    $selectAll -> execute();
                    while($recArr = $selectAll -> fetch(PDO::FETCH_ASSOC)){
                        foreach($recArr as $key => $value){
                            echo $key.':'.$value.'<br>';
                        }
                    }
                }
                else{
                    echo '上書きエラー。該当するIDはございません。<br>';
                }
            }
        }
        
        if( !empty($ms_hidden) ){
            if( empty($ms_name) && empty($ms_age) && empty($ms_birthday) ){
                echo '検索エラー。データを入力してください。<br>';
            }
            else{
                $mulsearch -> execute();
                while($recArr = $mulsearch -> fetch(PDO::FETCH_ASSOC)){
                    foreach($recArr as $key => $value){
                        echo $key.':'.$value.'<br>';
                    }
                }
                // if($search -> fetchColumn() == 0){
                //     echo '検索エラー。該当する名前はございません。';
                // }
            }
        }
        
        if( !empty($show_hidden) ){
            $selectAll -> execute();
            while($recArr = $selectAll -> fetch(PDO::FETCH_ASSOC)){
                foreach($recArr as $key => $value){
                    echo $key.':'.$value.'<br>';
                }
            }
        }

        ?>
    </div>
</body>
</html>