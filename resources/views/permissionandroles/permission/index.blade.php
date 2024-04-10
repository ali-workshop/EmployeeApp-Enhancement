
<a href=" {{route('permissions.create')}}" >Add permission</a>


<table align="1.2">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
    
    @foreach ($permisssions as $permission)

    <tr>
        <td>{{$permission->id}}</td>
        <td>{{$permission->name}}</td>
       <td><a href="{{route('permissions.edit')}}">edit</a></td>
       <td><a href="">delete</a></td>
    </tr>
    
    @endforeach


</table>