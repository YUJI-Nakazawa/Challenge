<?php

//DBへの接続用を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2MySQL(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','root','roo');
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOインスタンスにエラーレポートを出させ、例外を投げる属性を付与
        return $pdo;
    } catch (PDOException $e) {
        die('接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
    }
}
////DBに全項目のある1レコードを登録。失敗の場合、処理を中断し、エラーメッセージを表示する。
function insertSQL($name, $birthday, $tell, $type, $comment){
    global $insert_db;

    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";
    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);
    
    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':birthday',$birthday);
    $insert_query->bindValue(':tell',$tell);
    $insert_query->bindValue(':type',$type);
    $insert_query->bindValue(':comment',$comment);
    $insert_query->bindValue(':newDate',date('Y-m-d h:i:s')); // time() → date()に変更、さらにformatを追加
    
    //SQLを実行
    try{
        $insert_query->execute();
    }catch (PDOException $ie){
        die('データの挿入に失敗しました。次記のエラーにより処理を中断します:'.$ie->getMessage() );
    }
    //接続オブジェクトを初期化することでDB接続を切断
    $insert_db=null;
}