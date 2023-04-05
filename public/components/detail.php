<?php include('header.php'); ?>
<h1>詳細ページ</h1>
<?php
    // データベース設定ファイルを含む
    include 'dbConfig.php';

    $id = $_GET['id'];
    // データベースから画像を取得する
    $query = $db->query("SELECT * FROM images WHERE id=$id");

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $id = $row["id"];
            $title = $row["title"];
            $imageURL = 'uploads/'.$row["file_name"];
            $text = $row["text"];

            echo '<br>';
            echo "<h2>タイトル： ".$title."</h2>";
        ?>
        <br/>
        <img src="<?php echo $imageURL; ?>" width="400" height="280" alt="" /><br/></a>
        <?php echo "<h3>本文： ".$text."</h3>";
        ?><br/>
    <?php }
    }?>

<?php include('footer.php'); ?>