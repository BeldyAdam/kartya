<?php
    include_once './Ab.php';
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magyar kártya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $adatbazis = new Ab();
    /* $adatbazis->adatLeker("kép", "szín"); */
    $adatbazis-> adatLekerTablazat("név","kép", "szín");
    $adatbazis->kapcsolatBezar();

    ?>

</body>
</html>