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
    require __DIR__ . '/../autoload.php';
    require __DIR__ . '/../classes/DataBase.php';
    require __DIR__ . '/../classes/Config.php';

    use classes\Config;
    use classes\DataBase;
    use classes\News;

    $config = Config::make();
    $database = DataBase::make($config->dsn, $config->login, $config->password);



    $new = News::getById((int)$_GET['id'], $database);
    if (!empty($_POST['heading'])) {
        $new->setHeading($_POST['heading']);
        $new->setContent($_POST['content']);
        $new->update($database);
    }

    ?>
    <p>
    <form action="edit.php?id=<?php echo $new->id; ?>" method="post">
        <p><textarea rows="2" cols="20" name="heading"><?php echo $new->getHeading(); ?></textarea></p>
        <p><textarea rows="11" cols="60" name="content"><?php echo $new->getContent(); ?></textarea></p>
        <p style="text-indent:210px"><input type="submit" value="submit"></p>
    </form>
    </p>

    <p>
    <form action="index.php" method="post">
        <input type="submit" value="delete article" name="<?php echo $new->id; ?>" />
    </form>
    </p>
</body>


</html>