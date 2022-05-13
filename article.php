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
    require __DIR__ . '/classes/DataBase.php';
    require __DIR__ . '/classes/Model.php';
    require __DIR__ . '/classes/News.php';
    require __DIR__ . '/classes/Config.php';

    use classes\News;
    use classes\Config;
    use classes\DataBase;

    $config = Config::readConfig();
    $dsn = 'mysql:host=' . $config->info[0] . ';dbname=' . $config->info[1];
    $login = $config->info[2];
    $password = $config->info[3];

    $database = new DataBase($dsn, $login, '');

    $new = News::getById((int)$_GET['id'], $database);

    echo $new->getHeading();
    echo "<br>";
    echo $new->getContent();
    echo "<br>";
    ?>
</body>

</html>