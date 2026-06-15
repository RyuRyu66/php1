<?php

    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session（確認登入狀態）
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 未登入提示
        echo "請登入帳號";
        // 3 秒後導向登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    } else {
        // 連接資料庫
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );
        // 刪除指定佈告
        // bid 從網址 GET 取得
        $sql = "delete from bulletin where bid='{$_GET["bid"]}'";
        // 除錯用（可顯示 SQL 指令）
        #echo $sql;
        // 執行刪除指令
        if (!mysqli_query($conn, $sql)) {
            // 刪除失敗
            echo "佈告刪除錯誤";
        } else {
            // 刪除成功
            echo "佈告刪除成功";
        }
        // 3 秒後回到佈告列表頁
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }

?>
