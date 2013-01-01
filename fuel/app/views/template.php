<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <title><?php // echo $title; ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('content.css'); ?>        
</head>
<body>
    <div class="main-contents">
        <h1>お名前を入力して下さい</h1>
        <form action="" method="GET">
            <input type="text" name="user_name">
            <input type="submit" value="送信">
        </form>
    </div>
    
    <footer>
        <p>
            <small>Copyright © 2012- <?php echo date('y');?> megadreams</small>
        </p>
    </footer>
</body>
</html>
