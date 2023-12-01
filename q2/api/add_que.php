<?php
include_once "../db.php";

dd($_POST);
//輸出結果：
// Array
// (
//     [subject] => 1234
//     [opt] => Array
//         (
//             [0] => fdse
//         )

// )
//儲存資料
$data=[];//宣告一個空陣列。
$data['text']=$_POST['subject'];//將主題存到資料表
$data['subject_id']=0;//問卷主題，都設為0
$data['count']=0;
$data['sh']=1;//是否show在monitor上，上架使用，預設為1，表示上架

$Que->save($data);

//  寫入選項
foreach($_POST['opt'] as $opt){
    $data=[];
$subject_id=$Que->find(['text'=>$_POST['subject']])['id'];

$data['text']=$opt;
$data['subject_id']= $subject_id;//問卷主題，都設為0
$data['count']=0;
$data['sh']=1;//是否show在monitor上，上架使用
$Que->save($data);//寫入資料表
}

// echo "test";//dbug
header("location:../admin.php");

