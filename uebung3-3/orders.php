<?php

// Alle Fehlermeldungen ausgeben
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

// DB Klasse laden
include_once "DB.php";

// Instanz der Datenbankklasse laden
$db = DB::get();

$customerId = $_GET['id'];

// Alle Bestellungen des Customers laden
$orders = $db->select("SELECT * FROM orders WHERE customer_id = :customerId", [':customerId' => $customerId]);
?>

<h1>Bestellungen des Kunden mit ID <?= $customerId ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Versandt am</th>
        <th>Bezahlart</th>
        <th>Bestellung löschen</th>
    </tr>

    <?php
    foreach ($orders as $row) {
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['shipped_date']; ?></td>
            <td><?= $row['payment_type']; ?></td>
            <td><a href="delete.php?id=<?= $row['id']; ?>">Bestellung löschen</a></td>
        </tr>
        <?php
    }
    ?>

</table>