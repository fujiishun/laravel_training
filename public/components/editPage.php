<?php include('header.php'); ?>
<h1>編集ページ</h1>
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
        $imageURL = './../uploads/'.$row["file_name"];
        $text = $row["text"];
?>
        <?php echo "id:".$id;
        echo '<br>';
        echo "タイトル： ".$title;
    ?>
    <br/>
    <img src="<?php echo $imageURL; ?>" width="200" height="140" alt="" /><br/>
    <?php echo "本文： ".$text;
    ?><br/>
    <h2>↑編集前</h2>
    <hr/>
<?php }
}?>

    <form action="edit.php?id=<?php print($_GET['id']) ?>" method="post" enctype="multipart/form-data">
    title:
    <input type="text" name="title"><br/>
    comments:
    <input type="text" name="text"><br/>
    アップロードする画像ファイルを選択する:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Update">
<?php include('footer.php'); ?>