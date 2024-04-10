<form action='{{route('roles.update',['role'=>$role[0]])}}' method="POST">
    @csrf
    @method("PUT")
    <label for='name'>Role Name  </label>
    <input  type='text'  id='name' placeholder="Role Name" name='name' value="{{$role[0]->name}}" required >
   <input type='submit' value='Update Role' >
        

</form>