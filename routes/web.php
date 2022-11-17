<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Etudiant;
use App\Models\User;

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
    return redirect()->route('login');
});

Auth::routes();

// Auth::routes([ 'register' => false ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Les routes d'authentification
Route::middleware('auth')->group(function(){

    //Gestion des utilisateurs
    Route::resource('users', App\Http\Controllers\UserController::class);

    //Modification des utilisateurs
    Route::get('/users/status/{user_id}/{status_code}', [UserController::class, 'updateStatus'])->name('users.status.update');

    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');
    Route::get('export/', [UserController::class, 'export'])->name('export');
});


Route::group(['middleware' => ['auth', 'isAdmin']], function(){

    Route::get('/dashboard', function() {
        $etudiants_non_inscris = Etudiant::where('etat_candidat', 'non_inscrit')->get()->count();
        $etudiants_inscris = Etudiant::where('etat_candidat', 'inscrit')->get()->count();
        $etudiants = Etudiant::count();
        $users = User::count();
        return view('admin.dashboard', compact('etudiants_non_inscris', 'etudiants_inscris', 'users', 'etudiants'));
    });

    Route::get('/profile', [App\Http\Controllers\Admin\DashboardController::class, 'getProfile'])->name('detail');
    Route::post('/update/profile', [App\Http\Controllers\Admin\DashboardController::class, 'updateProfile'] )->name('update');
    Route::get('/pass/admin', [App\Http\Controllers\UserController::class, 'adminPass'] )->name('my-pass');
    Route::post('/update/password', [App\Http\Controllers\UserController::class, 'updatePassword'] )->name('update-pass.admin');


    Route::get('/list-etudiant', [App\Http\Controllers\Admin\EtudiantController::class, 'index'])->name('list-etudiants');
    Route::get('/create-etudiant', [App\Http\Controllers\Admin\EtudiantController::class, 'createEtudiant'])->name('create-etudiants');
    Route::post('/save-etudiant', [App\Http\Controllers\Admin\EtudiantController::class, 'store'])->name('save-etudiants');
    

    Route::get('edit-etudiant/{id}', [App\Http\Controllers\Admin\EtudiantController::class, 'editEtudiant'])->name('admin.etudiant.edit');
    Route::put('update/{id}', [App\Http\Controllers\Admin\EtudiantController::class, 'updateEtudiant'])->name('update-etudiant');
    Route::get('/inscritible/{inscrit_id}/delete', [App\Http\Controllers\Admin\EtudiantController::class, 'deleteEtudiant'])->name('delete-etudiant');

    Route::get('/list-inscrit', [App\Http\Controllers\Admin\EtudiantController::class, 'inscrit'])->name('list-inscrit');

    Route::get('/list-faculty', [App\Http\Controllers\Admin\EtudiantController::class, 'getFaculty'])->name('list-faculty');
    Route::post('/save-facuulty', [App\Http\Controllers\Admin\EtudiantController::class, 'storeFaculty'])->name('save-faculty');

    
    Route::get('/import-etudiants', [App\Http\Controllers\Admin\EtudiantController::class, 'importEtudiants'])->name('import-etudiants');
    Route::post('/upload-etudiants', [App\Http\Controllers\Admin\EtudiantController::class, 'uploadEtudiant'])->name('uploade-etudiants');
    Route::get('/export-etudiants', [App\Http\Controllers\Admin\EtudiantController::class, 'exportEtudiants'])->name('export-etudiants');


    Route::get('/list-bachelier-fages', [App\Http\Controllers\Admin\FaculteController::class, 'fagesAdmin'])->name('bacheliers.fages');
    Route::get('/list-bachelier-fasso', [App\Http\Controllers\Admin\FaculteController::class, 'fassoAdmin'])->name('bacheliers.fasso');
    Route::get('/list-bachelier-iufp', [App\Http\Controllers\Admin\FaculteController::class, 'iufpAdmin'])->name('bacheliers.iufp');
    Route::get('/list-bachelier-fama', [App\Http\Controllers\Admin\FaculteController::class, 'famaAdmin'])->name('bacheliers.fama');


});


Route::group(['middleware' => ['auth', 'isUser']], function(){
    Route::get('/user-dashboard', function() {
        $etudiants_users_non_inscris = Etudiant::where('etat_candidat', 'non_inscrit')->get()->count();
        $etudiants_inscris = Etudiant::where('etat_candidat', 'inscrit')->get()->count();
        $etudiants = Etudiant::count();
        return view('users.dashboard', compact('etudiants_users_non_inscris', 'etudiants_inscris', 'etudiants'));
    });

    Route::get('/users-home', [App\Http\Controllers\UserController::class, 'getProfile'])->name('detail.users');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'updateProfile'] )->name('update.users');

    Route::get('/change-password', [App\Http\Controllers\UserController::class, 'getPassword'] )->name('pass.users');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'updatePassword'] )->name('update-pass.users');


    Route::get('/registration-etudiant', [App\Http\Controllers\User\EtudiantController::class, 'create'])->name('registration.etudiants');
    Route::post('/registration-neo-etudiant', [App\Http\Controllers\User\EtudiantController::class, 'storeRegist'])->name('registered.etudiants');
    // Route::get('/registration-etudiant', [App\Http\Controllers\User\EtudiantController::class, 'index'])->name('registration.etudiants');


    Route::get('/list-etudiant-cenou', [App\Http\Controllers\User\EtudiantController::class, 'index'])->name('list.etudiants');
    Route::get('edit-etudiant-inscrit/{id}', [App\Http\Controllers\User\EtudiantController::class, 'editEtud'])->name('users.etud.edit');
    Route::put('update/inscrit/{id}', [App\Http\Controllers\User\EtudiantController::class, 'updat'])->name('update-etudiant-inscrit');
    

    Route::get('/list-etudiant-valide', [App\Http\Controllers\User\InscritController::class, 'index'])->name('etudiants.validate');


    Route::get('/list-etudiant-fages', [App\Http\Controllers\User\FaculteController::class, 'fages'])->name('etudiants.fages');
    Route::get('/list-etudiant-fasso', [App\Http\Controllers\User\FaculteController::class, 'fasso'])->name('etudiants.fasso');
    Route::get('/list-etudiant-iufp', [App\Http\Controllers\User\FaculteController::class, 'iufp'])->name('etudiants.iufp');
    Route::get('/list-etudiant-fama', [App\Http\Controllers\User\FaculteController::class, 'fama'])->name('etudiants.fama');

    Route::get('/export-etudiants-to', [App\Http\Controllers\User\EtudiantController::class, 'exportEtudiantsTo'])->name('export.etudiants.to');

});



Route::group(['middleware' => ['auth', 'isVendor']], function(){
    Route::get('/vendor-dashboard', function() {
        return view('vendor.dashboard');
    });
});



