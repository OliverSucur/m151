<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="/loginUser" method="POSt">
        <h1>Login</h1>
        <input type="text" name="i_email" id="i_email" placeholder="E-Mail"><br>
        <input type="password" name="i_password" id="i_password" placeholder="Passwort"><br>
        <button type="submit">Login</button>
    </form>
    <a href="/register">Zur Registrierung</a>
</body>
</html>
