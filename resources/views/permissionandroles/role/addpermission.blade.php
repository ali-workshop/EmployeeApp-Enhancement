

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>no thing</title>

</head>
<body>
<form  action="{{route('roles.give.permission',['roleid'=>$roleid])}}" method="POST">
    @csrf
    @method('PUT')

    @foreach ($permissions as $permission )   
    <label>
    <input type="checkbox"  name='permissions[]' value="{{$permission->name}}" multiple  {{$rolepermissions->contains($permission->id) ? 'checked' :" "}} >
    
     {{$permission->name}}</label>

    @endforeach
        <input type="submit" value="add those permissions">


</form>
</body>
</html>