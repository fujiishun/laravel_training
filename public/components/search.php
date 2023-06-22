<?php include('header.php');
define('MAX','2');
  include 'dbConfig.php';

// 検索結果でページネーションを使う時
if (isset($_GET["search_title"])) {
$next_title = $_GET["search_title"];
$_POST["search_title"] = $next_title;
}
if (isset($_GET["search_text"])) {
$next_text = $_GET["search_text"];
$_POST["search_text"] = $next_text;
}

//「タイトル」だけ入力されている場合
if (isset($_POST["search_title"]) && empty($_POST["search_text"])){
$search_title = $_POST["search_title"];
$search_text = '';
}

//「テキスト」だけ入力されている場合
if (empty($_POST["search_title"]) && isset($_POST["search_text"])){
$search_title = '';
$search_text = $_POST["search_text"];
}

//「タイトル」「テキスト」両方が入力されている場合
if (isset($_POST["search_title"]) && isset($_POST["search_text"])){
$search_title = $_POST["search_title"];
$search_text = $_POST["search_text"];
}

//実行
$sql1="SELECT COUNT(*) FROM images WHERE title like '%{$search_title}%' and text like '%{$search_text}%'";
$categorys_num = $db->query($sql1);
$categorys_num = $categorys_num->fetch_row()[0];
$max_page = ceil($categorys_num / MAX);
 
if(!isset($_GET['page_id'])){
    $now = 1;
}else{
    $now = $_GET['page_id'];
}
 
$start_no = ($now - 1) * 2;
$sql="SELECT * FROM images WHERE title like '%{$search_title}%' and text like '%{$search_text}%' LIMIT $start_no, 2";
$query = $db->query($sql);
//データベース切断
$db=null;
?>


<form action="search.php" method="POST">
<table border="1" style="border-collapse: collapse">
<tr>
<th>タイトル</th>
<td><input type="text" name="search_title" value="<?php if( !empty($_POST['search_title']) ){ echo $_POST['search_title']; } ?>"></td></td>
<th>テキスト</th>
<td><input type="text" name="search_text" value="<?php if( !empty($_POST['search_text']) ){ echo $_POST['search_text']; } ?>"></td>
<td><input type="submit" name="search" value="検索"></td>
</tr>
</table>
</form>
<br />
<h3>の検索結果</h3>
<br />

<!--検索解除-->
<?php if (isset($_POST["search"]) || $next_title || $next_text ) {?>
<a href="http://127.0.0.1:8000/index.php">検索を解除</a><br />
<?php } ?>


<!--MySQLデータを表示-->
<?php
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
    <a href="components/detail.php?id=<?php print($row['id']) ?>">
    <img src="<?php echo $imageURL; ?>" width="200" height="140" alt="" /><br/></a>
    <?php echo "本文： ".$text;
    ?><br/>
    <a href="components/delete.php?id=<?php print($row['id']) ?>">削除</a>
    <a href="components/editPage.php?id=<?php print($row['id']) ?>">編集</a><hr/>
<?php }
}else{ ?>
    <p>投稿が見つからず表示されません..
    </p>
<?php } 

echo '全件数'. $categorys_num. '件'. '　'; // 全データ数の表示
 
 if($now > 1){ // リンクをつけるかの判定
     $a=$now-1;
     echo "<a href='http://127.0.0.1:8000/components/search.php?page_id=$a&search_title=$search_title&search_text=$search_text'";
     echo ")>前へ</a>  ";
 } else {
     echo '前へ'. '  ';
 }
  
 for($i = 1; $i <= $max_page; $i++){
     if ($i == $now) {
         echo $now. '  '; 
     } else {
         echo "<a href='http://127.0.0.1:8000/components/search.php?page_id=$i&search_title=$search_title&search_text=$search_text'>";
         echo $i;
         echo "</a>  ";
     }
 }
  
 if($now < $max_page){ // リンクをつけるかの判定
     $a=$now+1;
     echo "  <a  href='http://127.0.0.1:8000/components/search.php?page_id=$a&search_title=$search_title&search_text=$search_text'";
     echo ")>次へ</a>";
     // echo '<a href='/pagetest.php?page_id='.($now + 1).'')>次へ</a>'. '　';
 } else {
     echo '次へ';
 }
 ?>
 <?php include('footer.php');