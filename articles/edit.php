<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require __DIR__ . '/../classes/Model.php';
    require __DIR__ . '/../classes/News.php';

    use classes\News;

    include __DIR__ . '/../createdatabase.php';

    $new = News::getById((int)$_GET['id'], $database);
    if (!empty($_POST['heading'])) {
        $new->setHeading($_POST['heading']);
        $new->setContent($_POST['content']);
        $new->update($database);
    }
    ?>
    <form action="edit.php?id=<?php echo $new->id; ?>" method="post">
        <p><textarea rows="2" cols="20" name="heading"><?php echo $new->getHeading(); ?></textarea></p>
        <p><textarea rows="11" cols="60" name="content"><?php echo $new->getContent(); ?></textarea></p>
        <p style="text-indent:210px"><input type="submit" value="submit"></p>
    </form>
</body>


</html>