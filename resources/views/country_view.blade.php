<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
    <a href="{{ url()->previous() }}">Back</a>
    <p>{{ $country[0]["name"] }}</p>
</body>
</html>