<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellen</title>
</head>
<body>
    <h1>Bestellen</h1>
    <h2>Rechnungsart</h2>
    <input type="radio" id="i_invoiceType" name="i_invoiceType">
    <label for="i_invoiceType">Rechnung</label><br>
    <h2>Personalien</h2>
    <p>Vorname: {{ $user->first_name }}</p>
    <p>Nachname: {{ $user->last_name }}</p>
    <p>Stadt: {{ $user->city }}</p>
    <p>Postleitzahl: {{ $user->zip }}</p>
    <p>Strasse: {{ $user->street }}</p>
    <<button onclick="window.location.href='/finishOrder'">Continue</button>
</body>
</html>
