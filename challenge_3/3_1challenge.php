<?php 

echo '課題1<br>';

function my_profile(){
    echo "中澤裕司<br>";
    echo "1986/10/25<br>";
    echo "長野県出身です。<br>
          趣味は自転車、ゲーム、アウトドアなどです。<br>";;
}
for($i=1; $i<=10; $i++){
    echo $i.'回目<br>';
    my_profile();
}
 ?>