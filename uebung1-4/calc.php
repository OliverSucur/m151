<?php
    $x = $_GET['x'];
    $y = $_GET['y'];

    $result = intval($x) + intval($y);

    echo "Loesung: {$result}";
?>