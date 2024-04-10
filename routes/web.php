<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Employee routes
Route::get('/employee/index',[EmployeeController::class,'index'])->name('employee.dashboard');
Route::get('/employees',[EmployeeController::class,'showEmployees'])->name('employees');

// manager routes
Route::get('/manager/index',[ManagerController::class ,'index'])->name('manager.dashboard');
Route::get('/manager/create',[ManagerController::class,'create'])->name('manager.create');
Route::post('/manager/store',[ManagerController::class,'store'])->name('manager.store');
Route::get('/manager/show/edit/option',[ManagerController::class,'editoption'])->name('manager.edit.option');
Route::get('/manager/show/edit',[ManagerController::class,'showedit'])->name('manager.show.edit');
Route::get('/manager/show/delet',[ManagerController::class,'showedelet'])->name('manager.show.delet'); #i can use form instaed of anotehr blade for delete 
Route::get('/manager/delet{user}',[ManagerController::class,'delet'])->name('manager.delet');
Route::get('/manager/edit{user}',[ManagerController::class,'edit'])->name('manager.edit');
Route::get('/managers',[ManagerController::class,'showmanagers'])->name('managers');
Route::get('/manager/get/name',[ManagerController::class,'getname'])->name('manager.get.name');
Route::get('/manager/edit/name',[ManagerController::class,'editname'])->name('manager.edit.name');
Route::put('/manager/edit{sname}',[ManagerController::class,'updatename'])->name('manager.update.name');
Route::get('manager/get/role',[ManagerController::class,'getrole'])->name("manager.get.role");
Route::get('/manager/edit/role',[ManagerController::class,'editrole'])->name('manager.edit.role');
Route::put('manager/edit/role{name}',[ManagerController::class,'updaterole'])->name("manger.update.role");
// next step add more features and inclue the upgrade message for employee when change the role from employee to manager
// enahncements on the previos repo :
/*
1-make all the validations and use custom rules and use the requet class. done
1.1. update using ajax form.done
2-edit the weakness that they told u about  like the passowrd in ther table and hashing and edit and search and delelt using the name.done.
2.1- add the second name with the serach  for professinal. done
3-make the middleware more advanced by using the spatie role and permisssion
4-add chech box or selection with checked and make it more attricative.
6-add the permission addition fucttion wiht it's controller sure and the role also and make it more advacned. 




*/
