<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 未登入顯示訊息
        echo "請登入帳號";
        // 3秒後跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    } else {
        // 連接 MySQL 資料庫
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );
        // 刪除指定使用者資料
        // 從網址取得 id 參數
        $sql = "delete from user where id='{$_GET["id"]}'";
        // 顯示 SQL 指令（除錯時可取消註解）
        #echo $sql;
        // 執行刪除指令
        if (!mysqli_query($conn, $sql)) {
            // 刪除失敗
            echo "使用者刪除錯誤";
        } else {
            // 刪除成功
            echo "使用者刪除成功";
        }
        // 3秒後返回使用者管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }

?>
