<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
        <?php
        //検索詳細画面から戻ってきた場合にセッションの値をそのままにする。
        $mode = isset($_POST['mode']) ? $_POST['mode'] : "";
        if($mode == "BACKtoSEARCH_RESULT"){
            $name = $_SESSION['name'];
            $year = $_SESSION['year'];
            $type = $_SESSION['type'];
        }
        //GETの値をセッションに格納しつつ、値を変数に格納する。
        else{
            $name = bind_g2s('name');
            $year = bind_g2s('year');
            $type = bind_g2s('type');
        }?>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        $search_result = null; //$result→$search_result
        if(empty($name) && empty($year) && empty($type)){
            $search_result = search_all_profiles(); //スペルミスを修正 serch_all_profiles → seach_all_profiles
        }else{
            $search_result = search_profiles( $name, $year, $type ); //スペルミスを修正 serch_profiles → seach_all_profiles
        }
        foreach($search_result as $value){
        ?>
            <tr>
                <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate']));; ?></td>
            </tr>
        <?php
        }
        ?>
    </table><br>
    <form action="<?php echo SEARCH; ?>" method="POST">
        <input type="hidden" name="mode" value="REINPUT" >
        <input type="submit" name="NO" value="検索画面に戻る"style="width:100px">
    </form>
    <br>
    <?php echo return_top(); //トップページへ戻るリンクの生成?>
</body>
</html>
