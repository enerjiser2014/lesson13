<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>Новости</title>
</head>
<body>
<h1>Новости сайта</h1>
<?php
    foreach ($items as $article ):
        ?>
    <div class="article">
        <h3><a href="index.php?ctrl=news&method=showArticle&id=<?php echo $article->id;?>"><?php echo $article->title . ' ' . $article->date; ?></a></h3>
        <?php echo $article->text; ?>
    </div>
<?php
endforeach; ?>
<a href="index.php?ctrl=admin&method=form">Добавить новость</a>

<div class = "footer">
    <?php
   foreach ($this as $name => $value ):
       // echo $name . '-';
        //var_dump($value);
    endforeach;
?>
</div>
</body>
</html>