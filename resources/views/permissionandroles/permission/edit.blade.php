<form action='{{route('permissions.update',['permission'=>$permission])}}' method="POST">
    @csrf
    @method("PUT")
    <label for='name'>Permission Name  </label>
    <input  type='text'  id='name' placeholder="Permission Name" name='name' value="{{$permission->name}}" required >
   <input type='submit' value='add permssion' >
        

</form>