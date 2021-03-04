<?php

include_once "DB.php";

$db = DB::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$userList = $db->select(
    "SELECT * FROM users WHERE username = :username",
    [
        ':username' => $username
    ]

);

$user = $userList[0];
$userPassword = $user['password'];

if(password_verify($password, $userPassword)) {
    $_SESSION['userId'] = $user['id'];

    header("Location: /index.php");
} else {
    die('falsches Passwort');
}