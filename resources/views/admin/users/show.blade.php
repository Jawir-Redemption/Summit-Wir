<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>
</head>

<body>
    <div>
        <h2>{{ $user->name }}</h2>
        <p>Email: {{ $user->email }}</p>
        <p>Role: {{ $user->role }}</p>
        @if ($user->ktp_image)
            <img src="{{ asset('storage/' . $user->ktp_image) }}" alt="KTP Image" style="max-width:200px;">
        @else
            <p>No KTP image available.</p>
        @endif
    </div>
</body>

</html>