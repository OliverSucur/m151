<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h1>Registrieren</h1>
    <form action="/registerUser" method="POST">
        <input type="text" name="i_firstname" id="i_lastname" placeholder="Vorname" required><br>
        <input type="text" name="i_lastname" id="i_lastname" placeholder="Nachname" required><br>
        <input type="email" name="i_email" id="i_email" placeholder="E-Mail" required><br>
        <input type="password" name="i_password" id="i_password" placeholder="Passwort" required><br>
        <input type="password" name="i_confirmPassword" id="i_confirmPassword" placeholder="Passwort bestätigen" required><br>
        <input type="text" name="i_city" id="i_city" placeholder="Stadt" required><br>
        <input type="text" name="i_zip" id="i_zip" placeholder="Postleitzahl" required><br>
        <input type="text" name="i_street" id="i_street" placeholder="Strasse und Hausnummer" required><br>
        <input type="text" name="i_phone" id="i_phone" placeholder="Telefonnummer" required><br>
        <button type="submit">Registrieren</button>
    </form>
    <a href="/login">Zum Login</a>
</body>
</html>
