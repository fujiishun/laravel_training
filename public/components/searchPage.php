<?php include('header.php'); ?>

<h1>検索ページ</h1>
    <form action="searchPage.php" method="post">
    ID:<input type="text" name="id">
    <?php
        if(preg_match("/[^0-9]/", $_POST['id'])){
            echo " IDは数字で入力してください！";
        }
    ?>
    <br>
        <input type="submit">
    </form>
    <?php
    // データベース設定ファイルを含む
    include 'dbConfig.php';
    $id=$_POST["id"];
    if(@$id){ //IDおよびユーザー名の入力有無を確認
        $query = $db->query("SELECT * FROM images WHERE id=$id"); //SQL文を実行して、結果を$stmtに代入する。
      if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $id = $row["id"];
            $title = $row["title"];
            $imageURL = 'uploads/'.$row["file_name"];
            $text = $row["text"];

            echo "<br><h2>ID：".$id."</h2><br>";
            echo "<h2>タイトル： ".$title."</h2>";
        ?>
        <br/>
        <img src="<?php echo $imageURL; ?>" width="400" height="280" alt="" /><br/></a>
        <?php echo "<h3>本文： ".$text."</h3>";
        ?><br/>
    <?php }
      }
    }
    else{
        echo " ID入力してください！";
    }?>
<?php include('footer.php'); ?>