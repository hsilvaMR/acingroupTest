<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Oficina;
use App\Http\Controllers\Dashboard;



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

// route index 
Route::get('/', [Home::class, 'index'])->name('home');

// route login  
Route::post('/login', [Login::class, 'login_v2'])->name('login');
Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
// area de gestão 
Route::get('/dashboard/users', [Dashboard::class, 'gestaoUtilizador'])->name('gestUser');
Route::get('/dashboard/oficina', [Dashboard::class, 'gestaoOficina'])->name('gestOficina');
Route::get('/dashboard/cliente', [Dashboard::class, 'gestaoCliente'])->name('gestClient');
Route::get('/dashboard/myProfile', [Dashboard::class, 'gestaoPerfil'])->name('gestProfile');
Route::get('/', [Login::class, 'logout'])->name('logout');

// add item view 
Route::get('/dashboard/add/{tipo}', [Dashboard::class, 'add_view'])->name('add_main_view');
Route::post('/dashboard/add', [Dashboard::class, 'add'])->name('add');

// editar 
Route::get('/dashboard/edit/{id}', [Dashboard::class, 'editar_view'])->name('editarView');

// editar
Route::get('/dashboard/delet/{id}', [Dashboard::class, 'delet'])->name('delet');


//Route::get('/login-page', [Login::class, 'pageLogin'])->name('box-login');

/*Route::get('/', function () {
    return view('welcome');
});*/
