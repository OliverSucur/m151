<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Preis</th>
            <th>Details</th>
        </tr>
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td></td>
        </tr>
    </table>
</body>

</html>