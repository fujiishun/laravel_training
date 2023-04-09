<?php include('header.php'); ?>

<?php
define('MAX','2');
include 'dbConfig.php';

$categorys = array($db->query("SELECT * FROM images"));
$categorys_num = $db->query("SELECT COUNT(*) FROM images");
$categorys_num = $categorys_num->fetch_row()[0];

// $categorys_num = count($categorys);
$max_page = ceil($categorys_num / MAX);
 
if(!isset($_GET['page_id'])){
    $now = 1;
}else{
    $now = $_GET['page_id'];
}
 
$start_no = ($now - 1) * 2;
$query = $db->query("SELECT * FROM images LIMIT $start_no, 2");

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
    <a href="detail.php?id=<?php print($row['id']) ?>">
    <img src="<?php echo $imageURL; ?>" width="200" height="140" alt="" /><br/></a>
    <?php echo "本文： ".$text;
    ?><br/>
    <a href="delete.php?id=<?php print($row['id']) ?>">削除</a>
    <a href="editPage.php?id=<?php print($row['id']) ?>">編集</a><hr/>
<?php }
}else{ ?>
    <p>投稿が見つからず表示されません..
    </p>
<?php } 
 
echo '全件数'. $categorys_num. '件'. '　'; // 全データ数の表示
 
if($now > 1){ // リンクをつけるかの判定
    $a=$now-1;
    echo "<a href='/components/pagetest.php?page_id=$a'";
    echo ")>前へ</a>  ";
} else {
    echo '前へ'. '  ';
}
 
for($i = 1; $i <= $max_page; $i++){
    if ($i == $now) {
        echo $now. '  '; 
    } else {
        echo "<a href='/components/pagetest.php?page_id=$i'>";
        echo $i;
        echo "</a>  ";
    }
}
 
if($now < $max_page){ // リンクをつけるかの判定
    $a=$now+1;
    echo "  <a href='/components/pagetest.php?page_id=$a'";
    echo ")>次へ</a>";
    // echo '<a href='/pagetest.php?page_id='.($now + 1).'')>次へ</a>'. '　';
} else {
    echo '次へ';
}
?>

<?php include('footer.php'); ?>