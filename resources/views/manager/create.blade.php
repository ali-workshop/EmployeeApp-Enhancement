<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Registration Form</title>
</head>
<body>

<h2>User Registration Form</h2>

<form action="{{route('manager.store')}}" method="post">
  @csrf
  <label for="fname">Name:</label><br>
  <input type="text" placeholder="name" name="fname" ><br><br>
  <span style="color: red">
    @error('fname')
        {{ $message }}
    @enderror
        </span><br><br>
        <label for="sname">Last Name:</label><br>
        <input type="text" placeholder="name" name="sname" ><br><br>
        <span style="color: red">
          @error('sname')
              {{ $message }}
          @enderror
              </span><br><br>
  <label for="password">Password:</label><br>
  <input type="password" placeholder="password" name="password" ><br><br>
  <span style="color: red">
    @error('password')
        {{ $message }}
    @enderror
</span><br><br>
  <label for="email">Email:</label><br>
  <input type="email" placeholder="email" name="email" ><br><br>
  <span style="color: red">
    @error('email')
        {{ $message }}
    @enderror
</span><br><br>
  <label for="role">Role:</label><br>
  <select placeholder="role" name="role" >
    <option value="">Select Role</option>
    @foreach ( $roles as $role)
    <option value="{{$role->name}}">{{$role->name}}</option>  
    @endforeach
    
  </select><br><br>
  <span style="color: red">
    @error('role')
        {{ $message }}
    @enderror
</span><br><br>
  <input type="submit" value="Create New Account">
</form>

</body>
</html>
