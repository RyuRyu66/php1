<?php

    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 未登入時顯示訊息
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
        // 執行更新指令
        // 將指定帳號的密碼更新為表單輸入的新密碼
        if (!mysqli_query(
                $conn,
                "update user
                 set pwd='{$_POST['pwd']}'
                 where id='{$_POST['id']}'"
            )) {
            // 更新失敗
            echo "修改錯誤";
            // 3秒後返回使用者管理頁面
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        } else {
            // 更新成功
            echo "修改成功，三秒鐘後回到網頁";
            // 3秒後返回使用者管理頁面
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>
