<?php

// Alle Fehlermeldungen ausgeben
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

// DB Klasse laden
include_once "DB.php";

// Instanz der Datenbankklasse laden
$db = DB::get();

$queryParameter = [
    ':id' => $_GET['id']
];

$db->startTransaction();

$db->query('DELETE FROM invoices WHERE order_id = :id', $queryParameter);
$db->query('DELETE FROM order_details WHERE order_id = :id', $queryParameter);
$db->query('DELETE FROM orders WHERE id = :id', $queryParameter);

$db->commitTransaction();
?>


Bestellung gelöscht.<br />
<a onclick="history.back()" href="#">Zurück</a>
