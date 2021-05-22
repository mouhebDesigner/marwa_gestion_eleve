<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RepaController;
use App\Http\Controllers\Admin\EleveController;
use App\Http\Controllers\Admin\ClasseController;
use App\Http\Controllers\Admin\NiveauController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\CantineController;
use App\Http\Controllers\Admin\MatiereController;
use App\Http\Controllers\Enseignant\NoteController;
use App\Http\Controllers\Admin\EnseignantController;
use App\Http\Controllers\Admin\SecretaireController;
use App\Http\Controllers\Admin\InscriptionController;
use App\Http\Controllers\Enseignant\EmploiController;
use App\Http\Controllers\Enseignant\AbsenceController;
use App\Http\Controllers\Admin\SeanceController as SeanceController_admin;
use App\Http\Controllers\Enseignant\EleveController as EleveController_enseignant;
use App\Http\Controllers\Enseignant\MatiereController as MatiereController_enseignant;


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
Route::get('/login', function () {
    return view('login');
});

Auth::routes(['register' => 'false']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::resource('enseignants', EnseignantController::class)->middleware('auth');
    Route::resource('secretaires', SecretaireController::class)->middleware('auth');
    Route::resource('eleves', EleveController::class)->middleware('auth');
    Route::resource('parents', ParentController::class)->middleware('auth');
    Route::resource('matieres', MatiereController::class)->middleware('auth');
    Route::resource('classes', ClasseController::class)->middleware('auth');
    Route::get('classe/{classe_id}/seance', [ClasseController::class, 'registre_appel'])->middleware('auth');
    Route::resource('niveaux', NiveauController::class)->middleware('auth');
    Route::resource('repas', RepaController::class)->only('edit', 'destroy', 'update')->middleware('auth');
    Route::prefix('cantine/{cantine_id}')->group(function(){
        Route::resource('repas', RepaController::class)->only('index', 'store', 'create')->middleware('auth');
    });
    Route::resource('seances', SeanceController_admin::class)->middleware('auth');
    Route::resource('cantines', CantineController::class)->middleware('auth');

});
Route::prefix('secretaire')->group(function () {
    Route::resource('enseignants', EnseignantController::class)->middleware('auth');
    Route::resource('eleves', EleveController::class)->middleware('auth');
    Route::resource('parents', ParentController::class)->middleware('auth');
    Route::resource('matieres', MatiereController::class)->middleware('auth');
    Route::resource('classes', ClasseController::class)->middleware('auth');
    Route::get('classe/{classe_id}/seance', [ClasseController::class, 'registre_appel'])->middleware('auth');
    Route::resource('repas', RepaController::class)->only('edit', 'destroy', 'update')->middleware('auth');
    Route::prefix('cantine/{cantine_id}')->group(function(){
        Route::resource('repas', RepaController::class)->only('index', 'store', 'create')->middleware('auth');
    });
    Route::resource('seances', SeanceController_admin::class)->middleware('auth');
    Route::resource('cantines', CantineController::class)->middleware('auth');

});
Route::prefix('enseignant')->group(function () {
    Route::get('matieres', [MatiereController_enseignant::class, 'index'])->middleware('auth');
    Route::prefix('matiere/{matiere_id}')->group(function(){
        Route::resource('notes', NoteController::class)->only('index', 'store', 'create', 'edit')->middleware('auth');
    });
    // enseignant/seance/'.$seance->id.'/absences
    Route::prefix('seance/{seance_id}')->group(function(){
        Route::resource('absences', AbsenceController::class)->only('index')->middleware('auth');
        Route::get('absences/{eleve_id}/absent', [AbsenceController::class, 'absent'])->middleware('auth');
        Route::get('absences/{eleve_id}/present', [AbsenceController::class, 'present'])->middleware('auth');
    });

    Route::resource('notes', NoteController::class)->only('destroy', 'update')->middleware('auth');
    Route::get('eleves', [EleveController_enseignant::class, 'index']);
    Route::get('emplois', [EmploiController::class, 'index']);
    
});
