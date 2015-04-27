<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php var_dump($_POST);?>

<form action="./index.php?ctrl=admin&method=update&id=<?php echo $items->id;?>" method="POST">
    <label>Название новости</label>

    <br><input type="text" name="title" <?php echo 'value="' . $items->title . '"'; ?> ><br>
    <label>Тест новости</label><br>
    <textarea rows="10" cols="50" name="text" ><?php echo $items->text; ?></textarea><br>
    <input type="submit">
</form>
</body>
</html>