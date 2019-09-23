<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HaseFramework</title>
    <style>
        .title{
            font-size:30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="title">
        こんにちは,「HaseFramework」です。
    </div>
    <form method="post">
        <input type="text" name="names" value="">
        <input type="hidden" name="token" value="<?php echo $WelcomeModel->CSRF_TOKEN; ?>">
        <input type="submit" value="送信">
    </form>
    <?php 
    var_dump($_SERVER['REQUEST_METHOD']); 
    var_dump($WelcomeModel);
    ?>
</body>
</html>