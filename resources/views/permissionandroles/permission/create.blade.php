<form action='{{route('permissions.store')}}' method="POST">
    @csrf
    @method("POST")
    <label for='name'>Permission Name  </label>
    <input type='text'  id='name' placeholder="Permission Name" name='name' required >
   <input type='submit' value='add permssion' >
        

</form>