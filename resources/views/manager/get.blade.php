<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <form action="{{route('manager.edit.name')}}" method="get">
        @csrf
        @method("get")
        <label for="name">ENTER THE FIRST NAME:</label><br>
        <input type="text" placeholder="NAME" name="fname" required><br><br>
        <input type="submit" value="Send NAME">
    </form >
</head>
<body>
    
</body>
</html>