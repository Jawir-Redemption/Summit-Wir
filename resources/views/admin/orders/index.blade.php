<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    <h1>Order Management</h1>
    @foreach ($orders as $order)
        <div>
            <h2>Order #{{ $order->id }}</h2>
            <p>User: {{ $order->user->name }}</p>
            <p>Total: ${{ $order->total }}</p>
            <p>Status: {{ $order->status }}</p>
        </div>
    @endforeach
    {{ $orders->links() }}
</body>
</html>