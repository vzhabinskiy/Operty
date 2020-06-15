<?php
require_once "php/engine/Db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404</title>
    <link type="text/css" rel="stylesheet" href="../../source/css/style.css" />
</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>:(</h1>
            </div>
            <h2>404 - Страница не найдена</h2>
            <p>Страница, которую вы искали не была найдена.</p>
            <a href="<?=$_SESSION['user_id'] ? 'php/views/index.php' : 'php/views/login.php' ; ?>"><button class="button__notfound">Вернуться</button></a>
        </div>
    </div>

</body>

</html>