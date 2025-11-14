<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
</head>
<body>
    <h1>This is the search</h1>
    <select name="destination" id="destination">
        @foreach($countries as $country)
            <option value="{{ $country["id"] }}">{{$country["name"]}}</option>
        @endforeach
    </select>
</body>
</html>