<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php var_dump($_POST);?>
<form action="./index.php?ctrl=admin&method=edit" method="POST" >
    <select size="1" name="id">
    <?php
    foreach($items as $article):?>

        <option value="<?php echo $article->id; ?>"><?php echo $article->title;?></option>

    <?php
    endforeach;
    ?></select>
    <input type="submit">
</form>
<form action="./index.php?ctrl=admin&method=add" method="POST">
    <label>Название новости</label>

    <br><input type="text" name="title"><br>
    <label>Тест новости</label><br>
    <textarea rows="10" cols="50" name="text"></textarea><br>
    <input type="submit">
</form>
</body>
</html>