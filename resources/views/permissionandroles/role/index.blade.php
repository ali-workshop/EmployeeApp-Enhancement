
<a href=" {{route('roles.create')}}" >Add Role</a><br><br>
@if (Session::has('success'))
    {{session('success')}}<br><br>
@endif

<table align="1.2">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Action</th>
    </tr>
    
    @foreach ($roles as $role)

    <tr>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
       <td><a href="{{route('roles.edit',['role'=>$role])}}">edit</a></td>
       <td><a href="{{route('roles.add.permission',['roleid'=>$role->id])}}">add/edit permission</a></td>
       <td><form action='{{route('roles.destroy',['role'=>$role])}}' method="post">
        @csrf
        @method('DELETE')   
        <input type='submit'value='DELETE' >
    </form></td>
    </tr>
    
    @endforeach


</table>