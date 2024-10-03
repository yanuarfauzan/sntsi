<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ url('test') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv" id="">
        <button type="submit">GO</button>
    </form>
</body>

</html>
