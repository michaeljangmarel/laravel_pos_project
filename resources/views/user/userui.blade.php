<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    this is user


    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="LOG OUT">
    </form>

</body>
</html>
