<?php 

// 課題3,4
// 3．以下の機能を持つクラスを作成してください。
//     ・パブリックな２つの変数
//     ・２つの変数に値を設定するパブリックな関数
//     ・２つの変数の中身をechoするパブリックな関数
// 4．3のクラスを継承し、以下の機能を持つクラスを作成してください。
//     ・２つの変数の中身をクリアするパブリックな関数

class Human{
    public $name;
    public $age;
    
    public function setHuman($n,$a){
        $this->name = $n;
        $this->age = $a;
    }
    public function sayHuman(){
        echo $this->name . $this->age.'<br>';
    }
}

class Clear extends Human{
    public function clear(){
        $this->name = "";
        $this->age = "";
    }
}

$Yuji = new Human();
$Yuji -> setHuman('中澤裕司',29);
$Yuji -> sayHuman();
// $Yuji -> echo $this -> name;

$Yuji2 = new Clear();
$Yuji2->setHuman('小林武史',44);
// $Yuji2->sayHuman();
$Yuji2->clear();
$Yuji2->sayHuman();










 ?>