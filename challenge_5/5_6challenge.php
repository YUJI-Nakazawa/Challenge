<?php
    // var_dump($_FILES);
    $fp = fopen( $_FILES['userfile']['tmp_name'] ,'r');
    echo $_FILES['userfile']['tmp_name'].'<br>'
    // $text = fgets($fp);
    // echo $text;
?>


