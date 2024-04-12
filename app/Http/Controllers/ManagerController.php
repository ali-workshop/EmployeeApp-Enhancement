<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\UpperCaseRule;
use Illuminate\Http\Request;
use App\Http\Requests\MyRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function __construct(){

        $this->middleware("auth");
        $this->middleware("manager");
    }
    public function index(){

        return view('manager.dashboard');
    }
    public function create(){
            $roles=Role::get();
        return view('manager.create'
    ,['roles'=>$roles]);

    }
    public function store(MyRequest $request){
        // dd($request->all());
        $NewRecord=[
            'name'=> $request->fname,
            'sname'=> $request->sname,
            'email'=> $request->email,
            'password'=> Hash::make( $request->password),
        

        ];

      $user=User::create($NewRecord);
    //   assign the entered roles into the created user using the spatie role.:)
      $user->syncRoles($request->role);

      return redirect()->route('manager.dashboard')->with('success','Account Added Successfully..');#make wiht this  link for see the table 
    }





    
    // public function edit($user){
    // $user=User::findorfill($user);
    // return view('manager.edit',compact('user'));
  
    // }


    public function getname(){

        return view('manager.get');


    }
    public function editname(Request $request){
        if($request->sname!=null){
            
            $sname=$request->sname;
            $user=User::where('sname','LIKE','%'.$sname.'%')->get();
            return view('manager.edit',['user'=>$user[0]]);
        }

        
        $name=$request->fname;
        
        // $countsOfItem=array_count_values($users);
        $user=User::where('name','LIKE','%'.$name.'%')->get();
        // dd($user);
        if(sizeof($user)>1){
            // dd($user);
            return view('manager.getsecondname');
           
        }
        else{
            // dd($user);
            return view('manager.edit',['user'=>$user[0]]);}
    }
    public function updatename($sname,Request $request){
// dd($id);
// dd($name);
    try {
    $request->validate
    ([
    'name'=> ["required","string",new UpperCaseRule],
    'sname'=> ["required","string",new UpperCaseRule],
    'email'=> ['email','required','unique:users,email'],
    'password'=> ['required','string','min:8'],
    'role'=> ['required','string'],
        ]);    
    
 
        $user=User::where('sname','LIKE','%'.$sname.'%')->get()->first();

        $user->name=$request->name;
        $user->sname=$request->sname;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role=$request->role;
        $user->save();
    
        return response()->json(['message' => 'Record.UPdated']);
    
    }catch (\Illuminate\Validation\ValidationException $e) {
        // If validation fails, return the validation error message
        return response()->json(['message' => $e->getMessage()], 422);
    }

    }
    public function showmanagers(){

        $users=User::all();
        return view('manager.home',['users'=>$users]);
        
    }
public function editoption(){

return view('manager.editoption');


}
public function showedit(){
    $users=User::all();
    return view('manager.showedit',['users'=>$users]);#compact('users'));


}
public function showedelet(){
    $users=User::all();
    return view('manager.showedelet',['users'=>$users]);#compact('users'));


}
public function delet(User $user){

$user->delete();
return redirect()->route('manager.dashboard')->with('success','Account Deleted successfully');
}

public function edit(User $user){
// dd($user);
    return view('manager.edit',['user'=>$user]);
}


public function getrole(){
return view('manager.getrole');
}
public function editrole(Request $request){
    // $user=new User();
    // User::find( $request->id );
    // $user->find($request->validate([
    //     'id'=> ['required','integer'],
    // ]));
    
$user=User::where('name','LIKE','%'.$request->name.'%')->get()->first();

    return view('manager.editrole',['user'=>$user]);
    }
    public function updaterole($name,Request $request){
        //dd($id)
        $user=User::where('name','LIKE','%'.$name.'%')->get()->first();
        $user->role=$request->role;
        $user->save();
        return redirect()->route('manager.dashboard')->with('success','Account updated successfully');
    
    }
    }
