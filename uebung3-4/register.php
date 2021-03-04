<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting();

    session_start();

    include_once 'DB.php';

    $db = DB::get();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $db->query("INSERT INTO users(username, password) VALUES (:username, :password)",
            [
                ':username' => $_POST['username'],
                ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ]
            );
    }