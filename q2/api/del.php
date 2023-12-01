<?php include_once "../db.php";

// 處理刪除按鈕的功能

//刪除主題
if(isset($_GET['id'])){
    $Que->del($_GET['id']);
    $Que->del(['subject_id'=> $_GET['id']]);//刪除選項資料
}




header("location:../admin.php");