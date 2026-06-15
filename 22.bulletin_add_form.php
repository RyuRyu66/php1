<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 啟動 Session（用來確認是否登入）
    session_start();
    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {
        // 尚未登入則提示訊息
        echo "please login first";
        // 3 秒後自動導向登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    } else {
        // 若已登入則顯示新增佈告頁面
        echo "
        <html>
            <head>
                <title>新增佈告</title>
            </head>
            <body>
                <!-- 新增佈告表單 -->
                <form method=post action=23.bulletin_add.php>
                    <!-- 標題輸入 -->
                    標    題：
                    <input type=text name=title><br>
                    <!-- 內容輸入 -->
                    內    容：<br>
                    <textarea name=content rows=20 cols=20></textarea><br>
                    <!-- 佈告類型選擇 -->
                    佈告類型：
                    <input type=radio name=type value=1>系上公告 
                    <input type=radio name=type value=2>獲獎資訊
                    <input type=radio name=type value=3>徵才資訊<br>
                    <!-- 發布時間 -->
                    發布時間：
                    <input type=date name=time><p></p>
                    <!-- 提交與重置按鈕 -->
                    <input type=submit value=新增佈告>
                    <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
