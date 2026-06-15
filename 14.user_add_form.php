<html>
    <head>
        <title>新增使用者</title>
    </head>
    <body>
<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session，用來存取登入資訊
    session_start();
    // 檢查是否已登入（Session 中是否有 id）
    if (!$_SESSION["id"]) {
        // 若未登入，顯示提示訊息
        echo "請登入帳號";
        // 3 秒後自動跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    } else {
        // 若已登入，顯示新增使用者表單
        echo "
            <form action=15.user_add.php method=post>
                帳號：
                <input type=text name=id><br>
                密碼：
                <input type=text name=pwd><p></p>
                <!-- 送出資料按鈕 -->
                <input type=submit value=新增>
                <!-- 清除表單內容按鈕 -->
                <input type=reset value=清除>
            </form>
        ";
    }
?>

    </body>
</html>
