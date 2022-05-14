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

    echo $new->getHeading();
    echo "<br>";
    echo $new->getContent();
    echo "<br>";
    ?>
    <p><a href="edit.php?id=<?php echo $new->id; ?>">go to edit page</a></p>
</body>


</html>