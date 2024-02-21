<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Forgetpassword;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\DashboardController;

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


// Route::get('/dashboard', function () {
    //     return view('newsletter.DASHBOARD.show');
// });
  
    
Route::get('/', function () { return view('newsletter.index'); })->name('landing.page');


/* 
---------------------------------------------------
                Dashboard
---------------------------------------------------
*/


Route::get('/dashboard',[ DashboardController::class, 'index'])->name('dashboard');
Route::get('/Add/Role/{user}',[ DashboardController::class, 'Add_Role'])->name('add.role');
Route::put('/Assign/Role/{user}',[ DashboardController::class, 'Assign_Role'])->name('assign.role');
Route::post('/create/tamplate',[ DashboardController::class, 'Create_Tamp'])->name('create.tamp');
Route::get('/send/email/{template}',[ DashboardController::class, 'send_to_email'])->name('send_to_email');



/* 
---------------------------------------------------
                log in
---------------------------------------------------
*/

Route::get('/login',[ AuthController::class,'login'])->name('login');
Route::post('/login',[ AuthController::class,'loginuser'])->name('login');

/* 
---------------------------------------------------
                register
---------------------------------------------------
*/

Route::get('/register',[ AuthController::class,'pageregister'])->name('register');
Route::post('/register',[ AuthController::class,'registeruser'])->name('registeruser');

/* 
---------------------------------------------------
                logout
---------------------------------------------------
*/

Route::post('/logout',[ AuthController::class,'logout'])->name('logout');


/* 
---------------------------------------------------
                forget password
---------------------------------------------------
*/
Route::get('/enter/email',[ Forgetpassword::class,'pageemail'])->name('enter.email');
Route::post('/forgetpassword',[ Forgetpassword::class,'sendemail'])->name('send.email');
Route::get('/resetpassword/{email}/{token}',[ Forgetpassword::class,'pagereset'])->name('page.reset');
Route::post('/resetpassword',[ Forgetpassword::class,'resetpassword'])->name('change.pass');


/* 
--------------------------------------------------
                subscribe
---------------------------------------------------
*/

Route::post('/', [MembersController::class,'store'])->name('subscribe');
Route::post('/unsub', [MembersController::class,'update'])->name('unsubscribe');


/* 
--------------------------------------------------
                create role and permission
---------------------------------------------------
*/

Route::get('/role', function () { 
    
    // // create role 
    // $role_admin = Role::create(['name' => 'admin']);
    // $role_user = Role::create(['name' => 'user']);
    // $role_writer = Role::create(['name' => 'writer']);

    // // create permission
    // $permission_create_tamp = Permission::create(['name' => 'create tamplate']);
    // $permission_edit_tamp = Permission::create(['name' => 'edit tamplate']);
    // $permission_show_tamp = Permission::create(['name' => 'show tamplate']);
    // $permission_softdelet_tamp = Permission::create(['name' => 'softdelet tamplate']);
    // $permission_send_tamp = Permission::create(['name' => 'send tamplate']);
    // $permission_download_pdf = Permission::create(['name' => 'download pdf']);
    // $permission_assign_role = Permission::create(['name' => 'assign role']);


    // // assign permission to role 
    // $role_admin->givePermissionTo($permission_download_pdf);
    // $role_admin->givePermissionTo($permission_assign_role);

    // $role_user->givePermissionTo($permission_create_tamp);
    // $role_user->givePermissionTo($permission_edit_tamp);
    // $role_user->givePermissionTo($permission_show_tamp);
    // $role_user->givePermissionTo($permission_softdelet_tamp);
    // $role_user->givePermissionTo($permission_send_tamp);

    // return nadi;





});




/* 
---------------------------------------------------
                Template
---------------------------------------------------
*/

Route::get('/edit/tamplate/{template}',[ DashboardController::class, 'Edit_Tamp'])->name('edit.tamp');
Route::put('/update/tamplate/{template}',[ DashboardController::class, 'Update_Tamp'])->name('update.tamp');
Route::delete('/delet/tamplate/{template}',[ DashboardController::class, 'SoftDelete_Tamp'])->name('delete.temp');
Route::get('/arshived',[ DashboardController::class, 'Restore'])->name('arshved');



/* 
---------------------------------------------------
                Telecharge pdf
---------------------------------------------------
*/

Route::get('/download/tamplate',[ DashboardController::class, 'Download_pdf'])->name('download_pdf');
