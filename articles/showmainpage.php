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

    foreach ($news as $new) { ?>
        <a href="show.php?id=<?php echo $new->id; ?>">
            <?php echo $new->getHeading();  ?>
        </a>
    <?php
        echo "<br>";
        echo $new->getContent();
        echo "<br>";
    } ?>
    <p><a href="create.php">go to create page</a></p>
</body>


</html>