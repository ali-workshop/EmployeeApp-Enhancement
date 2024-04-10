<form action='{{route('permissions.update',['permission'=>$permission[0]])}}' method="POST">
    @csrf
    @method("PUT")
    <label for='name'>Permission Name  </label>
    <input  type='text'  id='name' placeholder="Permission Name" name='name' value="{{$permission[0]->name}}" required >
   <input type='submit' value='Update permssion' >
        

</form>