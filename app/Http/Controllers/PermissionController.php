<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       $permissions=Permission::get();
       return view('permissionandroles.permission.index',['permisssions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('permissionandroles.permission.create');



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([

            'name'=>['required'],


        ]);

        // $data=[
        //     'name' => $request->name,
        // ];
        $input=$request->only('name');

        Permission::create($input);
        return redirect()
        ->route('permissions.index')
        ->with('success','the permission added successfully');
        
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $permission=Permission::find($permission);

       return view('permissionandroles.permission.edit',['permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([

            'name'=>['required']

        ]);
    $permission->name=$request->name;
    $permission->save();
    // $permission->update($request->name);
    return redirect()
    ->route('permissions.index')
    ->with('success','the permission added successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        
    }
}
