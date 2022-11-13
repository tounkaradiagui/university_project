<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    // Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'getProfile'])->name('detail');
    // Route::post('/update', [App\Http\Controllers\Admin\DashboardController::class, 'updateProfile'] )->name('update');
    // Route::post('/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'changePassword'])->name('change-password');
});

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'getProfile'])->name('detail');
    Route::post('/update', [App\Http\Controllers\UserController::class, 'updateProfile'] )->name('update');
});


Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\Vendor\DashboardController::class, 'getProfile'])->name('detail');
    Route::post('/update', [App\Http\Controllers\Vendor\DashboardController::class, 'updateProfile'] )->name('update');
});



Route::group(['middleware' => ['auth', 'isAdmin']], function(){

    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    });

    Route::get('/profile', [App\Http\Controllers\Admin\DashboardController::class, 'getProfile'])->name('detail');
    Route::post('/update/profile', [App\Http\Controllers\Admin\DashboardController::class, 'updateProfile'] )->name('update');
    Route::post('/change-password', [App\Http\Controllers\Admin\DashboardController::class, 'changePassword'])->name('change-password');

    Route::get('/list-etudiant', [App\Http\Controllers\Admin\EtudiantController::class, 'index'])->name('list-etudiants');
    Route::get('/create-etudiant', [App\Http\Controllers\Admin\EtudiantController::class, 'createEtudiant'])->name('create-etudiants');
    Route::post('/save-etudiant', [App\Http\Controllers\Admin\EtudiantController::class, 'store'])->name('save-etudiants');
    Route::get('edit-etudiant/{id}', [App\Http\Controllers\Admin\EtudiantController::class, 'editEtudiant'])->name('admin.etudiant.edit');
    Route::put('update/{id}', [App\Http\Controllers\Admin\EtudiantController::class, 'updateEtudiant'])->name('update-etudiant');



    Route::get('/list-faculty', [App\Http\Controllers\Admin\EtudiantController::class, 'getFaculty'])->name('list-faculty');
    Route::post('/save-facuulty', [App\Http\Controllers\Admin\EtudiantController::class, 'storeFaculty'])->name('save-faculty');

    
    Route::get('/import-etudiants', [App\Http\Controllers\Admin\EtudiantController::class, 'importEtudiants'])->name('import-etudiants');
    Route::post('/upload-etudiants', [App\Http\Controllers\Admin\EtudiantController::class, 'uploadEtudiant'])->name('uploade-etudiants');
    // Route::get('export/', [UserController::class, 'export'])->name('export');

});

Route::group(['middleware' => ['auth', 'isVendor']], function(){
    Route::get('/vendor-dashboard', function() {
        return view('vendor.dashboard');
    });
});


Route::group(['middleware' => ['auth', 'isUser']], function(){
    Route::get('/user-dashboard', function() {
        return view('users.dashboard');
    });
});



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



// Route::get('/import-student', [StudentController::class, 'importStudents'])->name('import');
// Route::post('/upload-student', [StudentController::class, 'uploadStudents'])->name('upload');


