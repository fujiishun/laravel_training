<?php
echo "test";
/**
* Laravel - A PHP Framework For Web Artisans
*
* @package  Laravel
* @author   Taylor Otwell <taylor@laravel.com>
*/

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);




// <?php
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
    <?php } ?>