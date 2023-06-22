<?php include('header.php');
include 'dbConfig.php';
?>

<form action="signin.php" method="post" enctype="multipart/form-data">
<h2>新規会員登録</h2>
<p>パスワード：<input type="password" name="password"></p>
<p>名前：<input type="text" name="name"></p>
<p>メールアドレス：<input type="text" name="email"></p>
<p><input type="submit" name="submit" value="新規登録"></p>
</from>

<?php
if(isset($_POST["submit"])) {
  $password = $_POST["password"];
  $name = $_POST["name"];
  $email = $_POST["email"];
//   var_dump($db);
//   $stmt = $db->query("select * from images");
  $stmt = $db->query("INSERT into users SET name='$name', password='$password', email='$email'");
var_dump($stmt);
}
?>


<?php include('footer.php');?>

