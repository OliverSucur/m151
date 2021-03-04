<?php
    session_start();

    $zutaten = $_SESSION['zutaten'];
    if(!is_array($zutaten)){
        $_SESSION['zutaten'] = [];

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>