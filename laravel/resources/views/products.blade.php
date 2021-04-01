<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Produkte</title>
</head>

<body>
    <a href="login">Login</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Preis</th>
            <th>Details</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td><a href="/product/{{ $product->id }}">Link</a></td>
            <td><a href="/cart/{{ $product->id }}">Zum Warenkorb hinzufügen</a></td>
        </tr>
        @endforeach
    </table>
    <br><br>
    <a href="/cart">zum Warenkorb</a><br>
    <a href="/orderHistory">Meine Bestellungen</a>
</body>

</html>
