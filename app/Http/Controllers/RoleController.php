<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::get();
       return view('permissionandroles.role.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissionandroles.role.create');
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

        Role::create($input);
        return redirect()
        ->route('roles.index')
        ->with('success','the role added successfully');
        
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $role=Role::find($role);

        return view('permissionandroles.role.edit',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        
        $request->validate([

            'name'=>['required']

        ]);
    $role->name=$request->name;
    $role->save();
    // $role->update($request->name);
    return redirect()
    ->route('roles.index')
    ->with('success','the role updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        
        $role->delete();
        return redirect()
        ->route('roles.index')
        ->with('success','the role Deleted successfully');
    }
}
