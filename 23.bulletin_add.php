<?php

    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session（用來確認登入狀態）
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 未登入提示
        echo "please login first";
        // 3 秒後導向登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    } else {
        // 連接 MySQL 資料庫
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );
        // 建立新增佈告的 SQL 指令
        // 將表單資料寫入 bulletin 資料表
        $sql = "insert into bulletin(title, content, type, time) 
                values(
                    '{$_POST['title']}',
                    '{$_POST['content']}',
                    {$_POST['type']},
                    '{$_POST['time']}'
                )";
        // 執行 SQL 指令
        if (!mysqli_query($conn, $sql)) {
            // 新增失敗
            echo "新增命令錯誤";
        } else {
            // 新增成功
            echo "新增佈告成功，三秒鐘後回到網頁";
            // 3 秒後回到佈告列表頁
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
