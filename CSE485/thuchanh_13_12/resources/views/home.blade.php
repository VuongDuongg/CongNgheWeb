<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Medicines List</title>
</head>
<body>
    @foreach ($medicines as $medicine)
        <p>{{ $medicine->name }}</p>
    @endforeach
</body>
</html>
