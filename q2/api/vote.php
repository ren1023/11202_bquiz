<?php include_once "../db.php";

$opt=$Que-> find($_POST['opt']);
$opt['count']=$opt['count']+1;//選項統計


$subject=$Que->find($opt['subject_id']);//主題
$subject['count']=$subject['count']+1;

$Que->save($opt);
$Que->save($subject);

header("location:../result.php?id={$subject['id']}");//回到題目的結果，並代該題目的id
