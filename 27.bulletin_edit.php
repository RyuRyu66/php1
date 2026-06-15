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
        // 更新 bulletin 資料表
        // 根據 bid 修改指定公告內容
        if (!mysqli_query(
                $conn,
                "update bulletin set
                    title='{$_POST['title']}',
                    content='{$_POST['content']}',
                    time='{$_POST['time']}',
                    type={$_POST['type']}
                 where bid='{$_POST['bid']}'"
            )) {
            // 更新失敗
            echo "修改錯誤";
            // 3 秒後回到佈告列表
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        } else {
            // 更新成功
            echo "修改成功，三秒鐘後回到佈告欄列表";
            // 3 秒後回到佈告列表
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
