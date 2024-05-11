<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::group(['prefix' => 'announcements'], function () { 
    Route::any('/', [AnnouncementController::class, 'index'])->name('announcements.index')->middleware('auth');
    Route::get('/data', [AnnouncementController::class, 'data'])->name('announcements.data');
    Route::delete('/delete', [AnnouncementController::class, 'delete'])->name('announcements.delete');
    Route::get('/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcements.edit');
});

Route::group(['prefix' => 'proposals'], function () { 
    Route::any('/', [ProposalController::class, 'index'])->name('proposals.index')->middleware('auth');
    Route::get('/data', [ProposalController::class, 'data'])->name('proposals.data');
    Route::delete('/delete', [ProposalController::class, 'delete'])->name('proposals.delete');
    Route::get('/edit/{id}', [ProposalController::class, 'edit'])->name('proposals.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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
        Route::group(['prefix' => 'permissions'], function () { //route to manage permissions
            Route::any('/', [PermissionController::class, 'index'])->name('permissions.index');
            Route::get('/data', [PermissionController::class, 'data'])->name('permissions.data');
        });
    });
    Route::group(['prefix' => 'manage_data'], function () {
        Route::group(['prefix' => 'studyprogram'], function () { //route to manage study program
            Route::any('/', [StudyProgramController::class, 'index'])->name('program.index');
            Route::get('/data', [StudyProgramController::class, 'data'])->name('program.data');
            Route::delete('/delete', [StudyProgramController::class, 'delete'])->name('program.delete');
            Route::get('/edit/{id}', [StudyProgramController::class, 'edit'])->name('program.edit');
            Route::put('/update/{id}', [StudyProgramController::class, 'update'])->name('program.update');
        });
          Route::group(['prefix' => 'department'], function () { //route to manage study program
            Route::any('/', [DepartmentController::class, 'index'])->name('dept.index')->middleware('auth');
            Route::get('/data', [DepartmentController::class, 'data'])->name('dept.data');
            Route::delete('/delete', [DepartmentController::class, 'delete'])->name('dept.delete');
            Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('dept.edit');
        });
    });
});