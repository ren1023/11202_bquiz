<?php
include_once "db.php";
dd ($_POST); // 除錯用
//dd 的輸入資料_start
// Array
// (
//     [text] => Array
//         (
//             [0] => 4dfsg
//             [1] => 1234
//             [2] => jklj;
//             [3] => dfgagsfd
//             [4] => sgsgfs
//         )

//     [id] => Array
//         (
//             [0] => 4
//             [1] => 5
//             [2] => 6
//             [3] => 7
//             [4] => 8
//         )

//     [del] => Array
//         (
//             [0] => 5
//         )

//     [sh] => 6
// )


//dd 的輸入資料_end

print_r($_POST['id']);
// Array ( [0] => 4 [1] => 5 [2] => 6 [3] => 7 [4] => 8 )

// 檢查是否有刪除的資料，查詢是否有 del 的 id 資料。
foreach($_POST['id'] as $key => $id){
    // 從 $_POST 輸入資料陣列中，取得 del 的 id=5, 而且 這個 id 有在 $_POST ['del'] 的陣列中。 
    if (isset ($_POST ['del']) && in_array ($id,$_POST ['del'])){    
        $Title->del ($id);  // 就去執行 del $(id)，刪除這筆資料
    }else{
        $row=$Title->find ($id);// 提供 $id , 搜尋出 其它欄位資料。
        echo  "<br>";
        print_r($row);  //Array ( [id] => 4 [img] => 01B04.jpg [text] => 4dfsg [sh] => 0 )
        exit();
        $row ['text']=$_POST ['text'][$key];// [text] => 4dfsg
        
        $row['sh']=($id==$_POST['sh'])?1:0; //[sh] => 0
        $Title->save($row);
    }
}

header("location:index.php");

?>

