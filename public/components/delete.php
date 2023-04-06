
<?php
    if (isset($_GET['id'])) {
        try {
            // 接続処理
 
            // DELETE文を発行
            $dbHost     = "localhost:8889";
            $dbUsername = "root";
            $dbPassword = "root";
            $dbName     = "file_db";
            $dbh = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            // DELETE文を発行
 
            $id = $_GET['id']; // DELETEするレコードのID
            $sql = "DELETE FROM images WHERE id=$id";
            $stmt = $dbh->query($sql); // DELETE文実行
            $sql1 = "ALTER TABLE `images` auto_increment = 1;";
            $stmt = $dbh->query($sql1); // DELETE文実行
            print "レコードを削除しました";
            echo '<br/><a href="http://127.0.0.1:8000">Home</a>';

            // 接続切断
            $dbh = null;
 
 
        } catch (PDOException $e) {
            print $e->getMessage() . "<br/>";
            die();
        }
    }
?>