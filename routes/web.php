<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
})->name('index');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Test
    Route::get('/test', [RoleController::class, 'test'])->name('test');
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'setting','middleware' => ['auth']],function () {
    // Route::resource('roles', RoleController::class); 

    Route::group(['prefix' => 'manage_account'], function () {
        Route::group(['prefix' => 'users'], function () { //route to manage users
            Route::any('/', [UserController::class, 'index'])->name('users.index');
            Route::get('/data', [UserController::class, 'data'])->name('users.data');
            Route::any('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::any('/reset_password/{id}', [UserController::class, 'reset_password'])->name('users.reset_password');
            Route::delete('/delete', [UserController::class, 'delete'])->name('users.delete');
        });
        Route::group(['prefix' => 'roles'], function () { //route to manage roles
            Route::any('/', [RoleController::class, 'index'])->name('roles.index');
            Route::get('/data', [RoleController::class, 'data'])->name('roles.data');
            Route::any('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
            Route::delete('/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');
        });
        Route::group(['prefix' => 'manage_studyprogram'], function () { //route to manage study program
            Route::any('/', [StudyProgramController::class, 'index'])->name('program.index');
            Route::get('/data', [StudyProgramController::class, 'data'])->name('program.data');
            Route::delete('/delete', [StudyProgramController::class, 'delete'])->name('program.delete');
            Route::get('/edit/{id}', [StudyProgramController::class, 'edit'])->name('program.edit');
            Route::put('/update/{id}', [StudyProgramController::class, 'update'])->name('program.update');
          });
          Route::group(['prefix' => 'manage_departement'], function () { //route to manage study program
            Route::any('/', [DepartementController::class, 'index'])->name('dept.index')->middleware('auth');
            Route::get('/data', [DepartementController::class, 'data'])->name('dept.data');
            Route::delete('/delete', [DepartementController::class, 'delete'])->name('dept.delete');
            Route::get('/edit/{id}', [DepartementController::class, 'edit'])->name('dept.edit');
          });
    });

});