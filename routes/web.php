<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HomeController;
use App\Models\Empleado;
use Illuminate\Support\Facades\Auth;



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

/*
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('empleado/create', [EmpleadoController::class, 'create']);*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('empleado/search', [EmpleadoController::class, 'search'])->name('search');
Route::resource('empleado', EmpleadoController::class)->middleware('auth');


Auth::routes();


Route::get('/home', [EmpleadoController::class, 'index'])->name('home'); //cuando usuario ingrese a home se envia al index de empleado controller

Route::group(['middleware' => 'auth'] , function (){
    Route::get('/',[EmpleadoController::class, 'index'])->name('home');

});
