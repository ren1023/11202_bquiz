<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷管理後台</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <header class="container p-5">
        <h1 class="text-center">問卷管理</h1>
    </header>
    <main class="container p-3">
        <fieldset>
            <legend>新增問卷</legend>
            <form action="./api/add_que.php" method="post">
                <!-- 主題 -->
                <div class="d-flex">
                    <div class="col-3 bg-light p-2">問卷名稱</div>
                    <div class="col-6 p-2">
                        <input type="text" name="subject" id="">
                    </div>
                </div>
                <!-- 選項 -->
                <div class="bg-light">
                    <div class="p-2" id="option">
                        <label for="">選項</label>
                        <input type="text" name="opt[]">
                        <input type="button" value="更多" onclick="more()">
                    </div>
                </div>
                <div>
                    <input type="submit" value="新增">
                    <input type="reset" value="清空">
                </div>
            </form>
        </fieldset>
        <fieldset>
            <legend class="mt-5" >問卷列表</legend>
            <div class="col-7 mx-auto">
                <table class="table">
                    <tr>
                        <td>編號</td>
                        <td>主題內容</td>
                        <td>操作</td>
                    </tr>
                    <?php
                    $ques = $Que->all(['subject_id'=>0]);//只撈主題的資料
                    foreach ($ques as $idx => $que) {
                    ?>
                        <tr>
                            <td><?= $idx+1; ?></td>  <!-- 編號欄位的資料 -->
                            <td><?= $que['text']; ?></td>  <!-- 主題內容 -->
                            <td> <!-- 操作欄位有3個按鈕 -->
                                <button class="btn btn-info">顯示</button>
                                <button class="btn btn-success">編輯</button>
                                <a href="./api/del.php?id=<?=$que['id'];?>"> <!-- 當我點刪除時，透過 id的欄位去提供給 del.php這隻api去刪除資料 -->
                                    <button class="btn btn-danger">刪除</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </fieldset>
    </main>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    </main>
</body>
</html>
<script>
    // 請在id=option前面，不停的幫忙塞此表在原本選項的上面
    function more() {
        let opt = `<div class="p-2">
                    <label for="">選項</label>
                    <input type="text" name="opt[]">
                    <input type="button" value="更多">
                    </div>`
        $("#option").before(opt)
    }
</script>