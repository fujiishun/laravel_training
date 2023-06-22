<?php include('components/header.php');?>

<form action="components/search.php" method="POST">
<table border="1" style="border-collapse: collapse">
<tr>
<th>title</th>
<td><input type="text" name="search_title" value="<?php if( !empty($_POST['search_title']) ){ echo $_POST['search_title']; } ?>"></td></td>
<th>text</th>
<td><input type="text" name="search_text" value="<?php if( !empty($_POST['search_text']) ){ echo $_POST['search_text']; } ?>"></td>
<td><input type="submit" name="search" value="検索"></td>
</tr>
</table>
</form>
<br />

<?php include('components/pagenation.php'); ?>

<?php include('components/footer.php'); ?>