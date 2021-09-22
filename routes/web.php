<?php

use App\Http\Controllers\admin\departmetusercontroller;
use App\Http\Controllers\admin\categoriesController;
use App\Http\Controllers\admin\adminuserController;
use App\Http\Controllers\user\ticketUserController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\ticketsController;
use App\Http\Controllers\user\ProfilController;
use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\admin\BitacoraController;
use App\Http\Controllers\admin\PDFController;
use App\Http\Controllers\admin\rolsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/Inactive', [HomeController::class,'index'])->name('home.index');

Route::get('/home', [ticketUserController::class, 'index'])
->middleware('verified')
->name('user.ticket');

route::get('/user/tickets/solved', [ticketUserController::class, 'solved'])
->name('user.ticket.solved');


Route::get('/ticket', [HomeController::class, 'post'])->name('ticket');


//ticket Usuario
Route::get('/user/tickets', [ticketUserController::class, 'index'])
->name('user.tickets.index')
;

Route::post('/user/tickets/store', [ticketUserController::class, 'store'])
->name('user.tickets.store');

Route::post('/user/tickets/{ticketId}/update', [ticketUserController::class, 'update'])
->name('user.tickets.update');

Route::delete('/user/tickets/{ticketId}/delete', [ticketUserController::class, 'delete'])
->name('user.ticket.delete');

route::get('/user/download/{file}',[ticketUserController::class,'download'])
->name('user.ticket.download');

Route::get('/user/ticket/{id}/show',[ ticketUsercontroller::class, 'show'])
->name('user.ticket.show');

Route::get('/user/ticket/{ticketId}/edit',[ ticketUsercontroller::class, 'edit'])
->name('user.ticket.edit');

//fin ticket usuario

//Usuarios admin

Route::get('/admin/usuarios', [adminusercontroller::class, 'index'])
->name('user.index');

Route::post('/admin/user/{userId}/update', [adminuserController::class, 'update'])
->name('admin.user.update');

Route::delete('/admin/user/{userId}/delete', [adminuserController::class, 'delete'])
->name('admin.user.delete');

Route::get('/admin/register', [adminusercontroller::class, 'Registro'])
->name('user.registro');



//departamento

route::get('/admin/departamento',[departmetusercontroller::class,'index'])
->name('department.index');

Route::post('/admin/depto/store', [departmetuserController::class, 'store'])
->name('admin.departament.store');

Route::post('/admin/departments/{departmentId}/update', [departmetuserController::class, 'update'])
->name('admin.departments.update');

Route::delete('/admin/departments/{departmentId}/delete', [departmetUserController::class, 'delete'])
->name('admin.department.delete');

Route::get('/auth/register',[RegisterController::class,'index'])
->name('Register_');



//PDF

route::get('/pdf',[PDFController::class,'PDFdetallado'])
->name('descargarPDF');

route::get('/pdf/department',[PDFController::class,'PDFdepartment'])
->name('descargarPDFDepartment');

//perfil
route::get('/user/perfil',[ProfilController::class,'index']);

Route::post('actualizar-perfil', [ProfilController::class, 'profilupdate'])
->name('user.profil.update');

Route::get('/user/perfil/edit', [ProfilController::class, 'edit'])
->name('user.profil.edit');



//roles

Route::get('/admin/roles',[rolsController::class , 'index']);

Route::post('/admin/role/store', [rolsController::class, 'store'])
->name('admin.rol.store');

Route::post('/admin/role/{rolId}/update', [rolsController::class, 'update'])
->name('admin.rol.update');

Route::delete('/admin/rol/{rolId}/delete', [rolsController::class, 'delete'])
->name('admin.rol.delete');


Route::get('/create/tickets',[ticketUsercontroller::class,'create']);


Route::get('/admin/bitacora',[BitacoraController::class ,'index'])->name('admin.bitacora');
























//categorias admin
Route::get('/admin/categories', [categoriesController::class, 'index'])
->name('admin.categories.index')
;

Route::post('/admin/categories/store', [categoriesController::class, 'store'])
->name('admin.categories.store');

Route::post('/admin/categories/{categoryId}/update', [categoriesController::class, 'update'])
->name('admin.categories.update');

Route::delete('/admin/categories/{categoryId}/delete', [categoriesController::class, 'delete'])
->name('admin.categories.delete');

//tickets admin
Route::get('/admin/tickets', [ticketsController::class, 'index'])
->name('admin.tickets.index');

Route::post('/admin/tickets/store', [ticketsController::class, 'store'])
->name('admin.tickets.store');

Route::post('/admin/tickets/{ticketId}/update', [ticketsController::class, 'update'])
->name('admin.tickets.update');

Route::get('/admin/panel', [ticketsController::class, 'post'])
->name('admin.panel.');

Route::get('/admin/ticket/solved', [ticketsController::class, 'solved'])
->name('admin.panel.solved');

// Route::delete('/admin/tickets/{ticketId}/delete', [ticketsController::class, 'delete'])
// ->name('admin.ticket.delete');

Route::get('/admin/panel/tickets/{category}', [ticketsController::class, 'postByCategory'])
->name('tickets.category');

route::get('/files/download/{file}',[ticketsController::class,'download'])
->name('user.ticket.download');




Route::get('/admin',[admincontroller::class, 'index'])
->name('admin.index')
->middleware('auth.admin');
//route
Auth::routes();
Auth::routes(['verify' => true]);
