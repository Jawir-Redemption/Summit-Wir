<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit #{{ $order->id }}</title>
</head>
<body>
    <div>
        <h2>Edit Order #{{ $order->id }}</h2>
        <p>User: {{ $order->user->name }}</p>
        <p>Total: ${{ $order->total }}</p>
        <p>Status: {{ $order->status }}</p>
    </div>
</body>
</html>