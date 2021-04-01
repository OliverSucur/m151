<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellhistory</title>
</head>
<body>
    <h1>Meine Bestellungen</h1>
    @foreach ($orders as $order)
    <p>{{ $order->id }}</p>
    <p>{{ $order->created_at }}</p>
    <p>{{ $order->price }}</p>
    <hr>
    @endforeach
</body>
</html>
