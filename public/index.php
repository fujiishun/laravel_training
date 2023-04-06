<?php include('components/header.php'); ?>

<?php
    // データベース設定ファイルを含む
    include 'components/dbConfig.php';

    // データベースから画像を取得する
    $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $id = $row["id"];
            $title = $row["title"];
            $imageURL = 'uploads/'.$row["file_name"];
            $text = $row["text"];
    ?>
            <?php echo "id:".$id;
            echo '<br>';
            echo "タイトル： ".$title;
        ?>
        <br/>
        <a href="detail.php?id=<?php print($row['id']) ?>">
        <img src="<?php echo $imageURL; ?>" width="200" height="140" alt="" /><br/></a>
        <?php echo "本文： ".$text;
        ?><br/>
        <a href="components/delete.php?id=<?php print($row['id']) ?>">削除</a>
        <a href="components/editPage.php?id=<?php print($row['id']) ?>">編集</a><hr/>
    <?php }
    }else{ ?>
        <p>投稿が見つからず表示されません..
        </p>
    <?php } ?>

<?php include('components/footer.php'); ?>