<?php

// Alle Fehlermeldungen ausgeben
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

// DB Klasse laden
include_once "DB.php";

// Instanz der Datenbankklasse laden
$db = DB::get();

// Alle Customers laden
$customers = $db->select("SELECT * FROM customers", []);

?>

<a href="create.php">Neuer Benutzer erstellen</a>

<table>
    <tr>
        <th>ID</th>
        <th>Firma</th>
        <th>Name</th>
        <th>Job</th>
        <th>Bearbeiten</th>
        <th>Bestellungen</th>
    </tr>
    <?php
    foreach ($customers as $row) {
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['company']; ?></td>
            <td><?= $row['first_name']; ?> <?= $row['last_name']; ?></td>
            <td><?= $row['job_title']; ?></td>
            <td><a href="create.php?id=<?= $row['id']; ?>">Benutzer bearbeiten</a></td>
            <td><a href="orders.php?id=<?= $row['id']; ?>">Bestellungen anzeigen</a></td>
        </tr>
        <?php
    }
    ?>
</table>
