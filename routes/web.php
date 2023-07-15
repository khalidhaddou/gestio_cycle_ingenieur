<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\AvisController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EtatEtudiantController;
use App\Http\Controllers\AbsenceAdminController;
use App\Http\Controllers\Enseignant\ModuldEnseignantController;
use App\Http\Controllers\Enseignant\AvisEnseignantController;
use App\Http\Controllers\Enseignant\CoursEnseignantController;
use App\Http\Controllers\Enseignant\NoteEnseignantController;
use App\Http\Controllers\Enseignant\AbsenceController;

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
});
Route::get('/', [AvisController::class, 'afficher_Avis_Public'])->name('Avis_Public');

Route::middleware('auth','verified')->group(function () {
    Route::get('/Etudiant/avis', [AvisController::class, 'create'])->name('user.Avis');
    Route::get('/Etudiant/Accueil', [AccueilController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/Etudiant/Cours', [CoursController::class, 'Affiche_cour'])->name('user.Cours');
    Route::get('/Etudiant/Notes', [NoteController::class, 'Affiche_notes'])->name('user.Notes');
    Route::post('/contact', 'ContactController@store')->name('contact.store');
});

Route::post('/import-users', 'EtudiantController@importUsers')->name('import.users');
Route::get('/etudiants/releve', 'NoteController@Allreleve')->name('Alletudiants.releve');

Route::get('/user/Profile', function () {
    return view('user.pages.Profile');
})->middleware(['auth', 'verified'])->name('user.Profile');

Route::get('/user/Contact', function () {
    return view('user.pages.Contact');
})->middleware(['auth', 'verified'])->name('user.Contact');


require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');
Route::get('/enseignant/dashboard', function () {
    return view('enseignant.dashboard');
})->middleware(['auth:admin', 'verified'])->name('enseignant.dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});
Route::resource('admin/Etudiant', EtudiantController::class);
Route::delete('admin/Etudiant', 'EtudiantController@deleteall')->name('delete_all');
Route::resource('admin/Module', ModuleController::class);
Route::post('updatecours/{id}', [CoursController::class, 'update']);
Route::resource('admin/Cours', CoursController::class);
Route::get('editCours/{id}', [CoursController::class, 'edit']);

Route::resource('admin/Avis', AvisController::class);
Route::get('editAvis/{id}', [AvisController::class, 'edit']);
Route::get('updateavis/{id}', [AvisController::class, 'update']);
Route::resource('admin/Utilisateur', UtilisateurController::class);
Route::resource('admin/Enseignant', EnseignantController::class);
Route::resource('admin/Note', NoteController::class);
Route::resource('/admin/Etat_Etudiant', EtatEtudiantController::class);
Route::resource('/enseignant/Absence', AbsenceController::class);

//les routes de Enseignant
Route::get('/enseignant/dashboard', function () {
    return view('enseignant.dashboard');
})->middleware(['auth:admin', 'verified'])->name('enseignant.dashboard');
Route::resource('/enseignant/Module', ModuldEnseignantController::class);
Route::resource('/enseignant/Note', NoteEnseignantController::class);
Route::resource('/enseignant/Cours', CoursEnseignantController::class);
Route::resource('/enseignant/Avis', AvisEnseignantController::class);
Route::post('/import-note', [NoteEnseignantController::class, 'importNote'])->name('import.note');
Route::get('/etudiants/notes-modules-pdf{id}', 'NoteController@notesModulesPDF')->name('etudiants.notes-modules-pdf');

Route::get('/Affichage/pdf', [NoteController::class, 'createPDF_affichage']);
Route::get('/etudiants/{cne}/releve', 'NoteController@releve')->name('etudiants.releve');
Route::resource('admin/Absence', AbsenceAdminController ::class);

require __DIR__.'/adminauth.php';
