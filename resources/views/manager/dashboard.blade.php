
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in as Manager !!') }}<br><br>
                    @role('super-manager')
                    {{-- now this will be found for the super-manger only not for manager.by the way ali, it will disaper for the manger --}}
                    <a href="{{route('manager.create')}}">Create new Account</a><br><br>
                    @endrole
                    <a href="{{route('manager.get.name')}}">Edit Account by NAME</a><br><br> 
                    <a href='{{route('manager.edit.option')}}'>Edit for Any User (Employee,Manager)</a><br><br>        
                    @can('delet employee')
                     {{--note: between the brakets of @can i put the name  of the permission directly    --}}
         {{-- now this will be found(on the screen) for the users that they have this permission only .by the way it will disaper for the users havnot this permission --}}
                    <a href="{{route('manager.show.delet')}}">Delete Account</a><br><br>
                    @endcan
                    <a href='{{route('managers')}}'>veiw all Users Employees and Managers</a><br><br>
                    <a href="{{route('manager.get.role')}}">Edit the role for Emplyee</a><br><br>
                    <a href='{{route('home')}}'>back to previous page</a><br><br>   
                    @if(session()->has("success"))
                   {{session('success')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
