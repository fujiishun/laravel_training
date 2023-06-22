<?php include('header.php');
include 'dbConfig.php';
?>

<h2>ログインページ</h2>
<form action="confirm.php" method="post">
<p>会員IDを入力：<input type="text" name="user" required></p>
<p>パスワードを入力：<input type="password" name="password" required></p>
<p><input type="submit" value="ログイン"></p>
</form>

新規登録は<a href="signin.php">こちら</a><br />

<?php include('footer.php');?>
