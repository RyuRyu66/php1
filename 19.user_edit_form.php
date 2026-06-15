<html>
    <head>
        <title>修改使用者</title>
    </head>
    <body>
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
        // 查詢指定帳號資料
        // id 從網址列取得
        $result = mysqli_query(
            $conn,
            "select * from user where id='{$_GET['id']}'"
        );
        // 取出查詢結果
        $row = mysqli_fetch_array($result);
        // 顯示修改表單
        echo "
        <form method=post action=20.user_edit.php>
            <!-- 隱藏欄位，將原帳號傳送到修改程式 -->
            <input type=hidden name=id value={$row['id']}>
            帳號：{$row['id']}<br>
            密碼：
            <input type=text name=pwd value={$row['pwd']}>
            <p></p>
            <!-- 送出修改 -->
            <input type=submit value=修改>
        </form>
        ";
    }

    ?>

    </body>
</html>
