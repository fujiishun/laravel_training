<?php
// データベースの構成
$dbHost     = "localhost:8889";
$dbUsername = "root";
$dbPassword = "root";
$dbName     = "file_db";

// データベース接続の構築
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// 接続の確認
if ($db->connect_error) {
    die("接続に失敗しました: " . $db->connect_error);
}
?>