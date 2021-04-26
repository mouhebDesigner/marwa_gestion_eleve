<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EleveController;
use App\Http\Controllers\Admin\NiveauController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\MatiereController;
use App\Http\Controllers\Admin\EnseignantController;

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
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('enseignants', EnseignantController::class);
    Route::resource('eleves', EleveController::class);
    Route::resource('parents', ParentController::class);
    Route::resource('matieres', MatiereController::class);
    Route::resource('classes', NiveauController::class);
});
