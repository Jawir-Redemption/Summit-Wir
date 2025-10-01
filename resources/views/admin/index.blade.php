<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <p>Total Orders: {{ $totalOrders }}</p>
    <p>Successful Orders: {{ $successOrders }}</p>
    <p>Pending Orders: {{ $pendingOrders }}</p>
    <p>Failed Orders: {{ $failedOrders }}</p>
    <h2>Latest Orders</h2>
    <ul>
        @foreach ($latestOrders as $order)
            <li>Order #{{ $order->id }} - {{ $order->created_at }}</li>
        @endforeach
    </ul>
</body>
</html>