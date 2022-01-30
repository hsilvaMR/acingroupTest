<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Oficina;
use App\Http\Controllers\Dashboard;
use App\Http\Middleware\DashbordMiddlware;



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
Route::get('/', [Home::class, 'index'])->name('login-box');

// route login  
Route::post('/login', [Login::class, 'login_v2'])->name('login');
Route::get('/', [Login::class, 'logout'])->name('logout');

Route::middleware(DashbordMiddlware::class)->get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
// area de gestão 
Route::middleware(DashbordMiddlware::class)->get('/dashboard/users', [Dashboard::class, 'gestaoUtilizador'])->name('gestUser');
Route::middleware(DashbordMiddlware::class)->get('/dashboard/oficina', [Dashboard::class, 'gestaoOficina'])->name('gestOficina');
Route::middleware(DashbordMiddlware::class)->get('/dashboard/cliente', [Dashboard::class, 'gestaoCliente'])->name('gestClient');
Route::middleware(DashbordMiddlware::class)->get('/dashboard/myProfile', [Dashboard::class, 'gestaoPerfil'])->name('gestProfile');

// add item view 
Route::middleware(DashbordMiddlware::class)->get('/dashboard/add/{tipo}', [Dashboard::class, 'add_view'])->name('add_main_view');
Route::middleware(DashbordMiddlware::class)->post('/dashboard/add', [Dashboard::class, 'add'])->name('add');

// editar 
Route::middleware(DashbordMiddlware::class)->get('/dashboard/edit/{id}', [Dashboard::class, 'editar_view'])->name('editarView');
// apagar 
Route::middleware(DashbordMiddlware::class)->get('/dashboard/delet/{id}', [Dashboard::class, 'delet'])->name('deleteRecord');


//Route::get('/login-page', [Login::class, 'pageLogin'])->name('box-login');

/*Route::get('/', function () {
    return view('welcome');
});*/
