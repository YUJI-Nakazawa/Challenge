<?php

//DBへの接続を行う。成功ならPDOオブジェクトを、失敗なら中断、メッセージの表示を行う
function connect2challenge_db(){//関数名を変更。connect2MySQL → connect2challenge_db
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=challenge_db;charset=utf8','root','root');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $connect_e) {  // PDOExptionのインスタンス名を変更 $e → $connect_e
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$connect_e->getMessage());
    }
}

//レコードの挿入を行う。失敗した場合はエラー文を返却する
function insert_profiles($name, $birthday, $type, $tell, $comment){
    //db接続を確立
    $insert_db = connect2challenge_db();
    
    //DBに全項目のある1レコードを登録するSQL
    $insert_sql = "INSERT INTO user_t(name,birthday,tell,type,comment,newDate)"
            . "VALUES(:name,:birthday,:tell,:type,:comment,:newDate)";

    //現在時をdatetime型で取得
    $datetime =new DateTime();
    $date = $datetime->format('Y-m-d H:i:s');

    //クエリとして用意
    $insert_query = $insert_db->prepare($insert_sql);

    //SQL文にセッションから受け取った値＆現在時をバインド
    $insert_query->bindValue(':name',$name);
    $insert_query->bindValue(':birthday',$birthday);
    $insert_query->bindValue(':tell',$tell);
    $insert_query->bindValue(':type',$type);
    $insert_query->bindValue(':comment',$comment);
    $insert_query->bindValue(':newDate',$date);

    //SQLを実行
    try{
        $insert_query->execute();
    } catch (PDOException $insert_e) { // PDOExptionのインスタンス名を変更 $e → $insert_e
        //接続オブジェクトを初期化することでDB接続を切断
        $insert_db=null;
        return $insert_e->getMessage();
    }

    $insert_db=null;
    return null;
}

function search_all_profiles(){ //スペルミスを修正 serch_all_profiles → search_all_profiles
    //db接続を確立
    $search_db = connect2challenge_db();
    
    $search_sql = "SELECT * FROM user_t";
    
    //クエリとして用意
    $search_query = $search_db->prepare($search_sql);
    
    //SQLを実行
    try{
        $search_query->execute();
    } catch (PDOException $search_all_e) { // PDOExptionのインスタンス名を変更 $e → $search_all_e
        $search_query=null;
        return $search_all_e->getMessage();
    }
    
    //全レコードを連想配列として返却
    return $search_query->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * 複合条件検索を行う
 * @param type $name
 * @param type $year
 * @param type $type
 * @return type
 */
function search_profiles($name=null, $year=null, $type=null){ //スペルミスを修正 serch_profiles → search_profiles
    //db接続を確立
    $search_db = connect2challenge_db();
    
    $search_sql = "SELECT * FROM user_t";
    $flag = false;
    //名前が入力されているか判別する。
    if(isset($name)){
        $search_sql .= " WHERE name like :name";
        $flag = true; //SQL文にWHERE句が既に存在するかのフラグ。trueならば既にWHERE句が存在する。
    }
    //生年が入力されているか判別する。
    if(isset($year) && $flag == false){//条件分を修正 $flag = false → $flag == false
        $search_sql .= " WHERE birthday like :year";
        $flag = true;
    }else if(isset($year)){
        $search_sql .= " AND birthday like :year";
    }
    //種別が入力されているか判別する。
    if(isset($type) && $flag == false){//条件分を修正 $flag = false → $flag == false
        $search_sql .= " WHERE type = :type";
    }else if(isset($type)){
        $search_sql .= " AND type = :type";
    }
    //クエリとして用意
    $search_query = $search_db->prepare($search_sql); //スペルミスを修正 seatch_query → serach_query
    //名前、生年、種別の何れかが入力されていなかった時に、入力されていない項目のプレースホルダーが
    //存在しなくなるため、それぞれの変数の有無を判別する。
    if( isset($name) ){
        $search_query->bindValue(':name','%'.$name.'%');
    }
    if( isset($year) ){
        $search_query->bindValue(':year','%'.$year.'%');
    }
    if( isset($type) ){
        // $search_query->bindValue(':type','%'.$type.'%');
        $search_query->bindValue(':type',$type); //あいまい検索である必要が無いため前後の%は削除する。
    }

    //SQLを実行
    try{
        $search_query->execute();
    } catch (PDOException $search_e) { // PDOExptionのインスタンス名を変更 $e → $search_e
        $search_query=null;
        // return $search_e->getMessage();// 検索ができなかった時のエラーを表示
        return $search_e->getMessage();
    }
    
    //該当するレコードを連想配列として返却
    return $search_query->fetchAll(PDO::FETCH_ASSOC);
}



function profile_detail($id){
    //db接続を確立
    $detail_db = connect2challenge_db();
    
    $detail_sql = "SELECT * FROM user_t WHERE userID=:id";
    
    //クエリとして用意
    $detail_query = $detail_db->prepare($detail_sql);
    
    $detail_query->bindValue(':id',$id);
    
    //SQLを実行
    try{
        $detail_query->execute();
    } catch (PDOException $detail_e) { // PDOExptionのインスタンス名を変更 $e → $detail_e
        $detail_query=null;
        return $detail_e->getMessage();
    }
    
    //レコードを連想配列として返却
    return $detail_query->fetchAll(PDO::FETCH_ASSOC);
}

function update_profile($id, $name, $birthday, $type, $tell, $comment){
    //db接続を確立
    $update_db = connect2challenge_db();
    
    
    
    $update_sql = "UPDATE user_t SET name=:name, birthday=:birthday, type=:type,".
                  " tell=:tell, comment=:comment WHERE userID=:id";
    //クエリとして用意
    $update_query = $update_db->prepare($update_sql);
    
    $update_query->bindValue(':id',$id);
    $update_query->bindValue(':name',$name);
    $update_query->bindValue(':birthday',$birthday);
    $update_query->bindValue(':type',$type);
    $update_query->bindValue(':tell',$tell);
    $update_query->bindValue(':comment',$comment);
    
    //SQLを実行
    try{
        $update_query->execute();
    } catch (PDOException $update_e) {
        $update_query=null;
        return $update_e->getMessage();
    }
    return null;
}

function delete_profile($id){
    //db接続を確立
    $delete_db = connect2challenge_db();
    
    $delete_sql = "DELETE FROM user_t WHERE userID=:id"; //DELEtE → DELETE
    
    //クエリとして用意
    $delete_query = $delete_db->prepare($delete_sql);
    
    $delete_query->bindValue(':id', $id);
    
    //SQLを実行
    try{
        $delete_query->execute();
    } catch (PDOException $delete_e) { // PDOExptionのインスタンス名を変更 $e → $delete_e
        $delete_query=null;
        return $delete_e->getMessage();
    }
    return null;
}