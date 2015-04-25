<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<h1><?php
    echo $items->title?></h1>
    <div class="article">
            <?php echo $items->text; ?>
    </div>
</body>
</html>