<?php 
//基本クラス
abstract class base{
    abstract protected function load();
    abstract public function show();
    protected function connect2DB(){
        try{
            $pdo = new PDO('mysql:host=localhost; dbname=challenge9; charset=utf8','root','root');
            //SQL実行時のエラーをtry-catchで取得できるように設定
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $connect_e) {  // PDOExptionのインスタンス名を変更 $e → $connect_e
            die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$connect_e->getMessage());
        }
    }
}
//人クラス
class Human extends base{
    private $table = "";
    function __construct($tablename){
        $this->table = $tablename;
    }
    protected function load(){
        $selectDB = $this->connect2DB();
        //SQL文
        $select_sql = "SELECT * FROM $this->table";
        //クエリとして用意
        try{
            $select_query = $selectDB -> prepare($select_sql);
            $select_query -> execute();
        }
        catch (PDOException $select_e) {
            $select_query = null;
            echo $select_e -> getMessage();
        }
        return $select_query -> fetchall(PDO::FETCH_ASSOC);
    }
    public function show(){
        $show_Human = $this->load();
        // var_dump($show_human);
        foreach($show_Human as $values){
            echo $values['humanName'].'<br>';
        }
    }
}
//駅クラス
class Station extends base{
    private $table = '';
    function __construct($tablename){
        $this->table = $tablename;
    }
    protected function load(){
        $selectDB = $this-> connect2DB();
        $select_sql = "SELECT * FROM $this->table";
        $select_query = $selectDB -> prepare($select_sql);
        try{
            $select_query -> execute();
        } catch (PDOException $select_e) {
            $select_query = null;
            echo $select_e -> getMessage();
        }
        return $select_query->fetchall(PDO::FETCH_ASSOC);
    }
    public function show(){
        $show_Station = $this->load();
        foreach($show_Station as $values){
            echo $values['stationName'].'<br>';
        }
    }
}


 ?>