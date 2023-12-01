<?php include_once "../db.php";

$que=$Que-> find($_GET['id']);
// print_r($que);
// exit();
if ($que['sh']== 0){
    $que['sh']= 1;
}elseif($que['sh']== 1){
    $que['sh']= 0;
}

$Que-> save($que['sh']);

header("location:../admin.php");