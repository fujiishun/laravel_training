<?php include('header.php'); ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    title:
    <input type="text" name="title"><br/>
    comments:
    <input type="text" name="text"><br/>
    アップロードする画像ファイルを選択する:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
<?php include('footer.php'); ?>