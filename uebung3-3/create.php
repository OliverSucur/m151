<?php

// Alle Fehlermeldungen ausgeben
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

// DB Klasse laden
include_once "DB.php";

// Instanz der Datenbankklasse laden
$db = DB::get();

$isNewCustomer = true;
if ($_GET['id'] || $_POST['id']) {
    $customerId = $_GET['id'] ? $_GET['id'] : $_POST['id'];
    $isNewCustomer = false;

    $customers = $db->select('SELECT * FROM customers WHERE id = :id', [':id' => $customerId]);
    $customer = $customers[0]; // $db->select() gibt immer ein Array aller Resultate zurück - wir möchten jedoch nur ein einzelnes Resultat haben.
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $job_title = $_POST['job_title'];

    if ($isNewCustomer) {
        $db->startTransaction();

        $queryParameter = [
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':job_title' => $job_title
        ];
        $db->query('INSERT INTO customers(first_name, last_name, job_title) VALUES (:first_name, :last_name, :job_title)', $queryParameter);
        $db->commitTransaction();
    }
    else {
        $db->startTransaction();

        $queryParameter = [
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':job_title' => $job_title,
            ':id' => intval($_POST['id'])
        ];
        $db->query('
                UPDATE customers SET first_name = :first_name,
                                     last_name = :last_name,
                                     job_title = :job_title
                         WHERE id = :id
        ', $queryParameter);
        $db->commitTransaction();
    }
    ?>
    Daten einfgefügt!
    <a href="index.php">Zurück zur Liste</a>
    <?php
}
?>

<form action="?" method="POST">
    <?php
        if (! $isNewCustomer) {
            echo "<input name='id' value='".$_GET['id']."' type='hidden' />";
        }
    ?>
    <input type="text" value="<?= $isNewCustomer ? '' : $customer['last_name'] ?>" name="last_name" placeholder="Last Name" />
    <input type="text" value="<?= $isNewCustomer ? '' : $customer['first_name'] ?>" name="first_name" placeholder="First Name" />
    <input type="text" value="<?= $isNewCustomer ? '' : $customer['job_title'] ?>" name="job_title" placeholder="Job Title" />
    <input type="submit" value="Absenden" />
</form>
