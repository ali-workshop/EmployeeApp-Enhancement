<form action='{{route('roles.store')}}' method="POST">
    @csrf
    @method("POST")
    <label for='name'>Role Name  </label>
    <input type='text'  id='name' placeholder="Role Name" name='name' required >
   <input type='submit' value='add Role' >
        

</form>