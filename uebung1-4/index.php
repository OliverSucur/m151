<?php
    $username = "Peter";
    $age = "0";  

    if ($_GET['username']) {
        $username = $_GET['username'];
        echo "Hallo {$username}!<br />";
    }
    if ($_GET['age']) {
        $age = $_GET['age'];
        echo "Du bist {$age} Jahre alt.";
    }
?>

