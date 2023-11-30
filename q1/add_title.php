<?php

// 從 post 來時，只有 傳文字，故 db 裡缺 img
echo print_r($_POST);
include_once "db.php";



if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"./img/".$_FILES['img']['name']);

    
    $_POST['img']=$_FILES['img']['name'];
}



$_POST['sh']=0;
// 寫去資料庫

$Title->save($_POST);

// echo $Title->save($_POST);
header("location:index.php")

?>