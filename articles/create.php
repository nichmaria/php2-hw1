<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="create.php" method="post">
        <p><textarea rows="2" cols="20" name="heading">write heading</textarea></p>
        <p><textarea rows="11" cols="60" name="content">write content</textarea></p>
        <p style="text-indent:210px"><input type="submit" value="submit"></p>
    </form>
    <?php
    require __DIR__ . '/../autoload.php';
    require __DIR__ . '/../classes/DataBase.php';
    require __DIR__ . '/../classes/Config.php';

    use classes\Config;
    use classes\DataBase;
    use classes\News;

    $config = Config::make();
    $database = DataBase::make($config->dsn, $config->login, $config->password);



    $new = new News();
    if (!empty($_POST['heading'])) {
        $new->setHeading($_POST['heading']);
        $new->setContent($_POST['content']);
        $new->insert($database);
        echo 'your record is successfully saved!';
    }
    ?>
</body>

</html>