<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FinalisasiDanaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProposalController;
use App\Http\Controllers\ViceRector1Controller;
use App\Http\Controllers\ViceRector2Controller;
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
    Route::put('/update/{id}', [AnnouncementController::class, 'update'])->name('announcements.update');
});

Route::group(['prefix' => 'user-proposals'], function () {
    Route::any('/', [UserProposalController::class, 'index'])->name('user-proposals.index')->middleware('auth');
    Route::get('/data', [UserProposalController::class, 'data'])->name('user-proposals.data');
    Route::any('/create', [UserProposalController::class,'create'])->name('user-proposals.create');
    Route::delete('/delete', [UserProposalController::class, 'delete'])->name('user-proposals.delete');
    Route::get('/edit/{id}', [UserProposalController::class, 'edit'])->name('user-proposals.edit');
    Route::get('/category/by_id', [UserProposalController::class, 'category_by_id'])->name('DOC.get_category_by_id');
});


Route::get('/get_research_themes_by_id', [UserProposalController::class, 'getResearchThemeById'])->name('DOC.get_research_themes_by_id');
Route::get('/get_research_topics_by_id', [UserProposalController::class, 'getResearchTopicById'])->name('DOC.get_research_topics_by_id');

Route::group(['prefix' => 'proposals'], function () { //manage admin proposal
    Route::any('/', [ProposalController::class, 'index'])->name('proposals.index')->middleware('auth');
    Route::any('/dana', [ProposalController::class, 'dana'])->name('proposals.dana');
    Route::any('/loa', [ProposalController::class, 'loa'])->name('proposals.loa');
    Route::any('/monev', [ProposalController::class, 'monev'])->name('proposals.monev');
    Route::get('/data', [ProposalController::class, 'data'])->name('proposals.data');
    Route::delete('/delete', [ProposalController::class, 'delete'])->name('proposals.delete');
    Route::get('/edit/{id}', [ProposalController::class, 'edit'])->name('proposals.edit');
});

Route::group(['prefix' => 'finalisasidana'], function () { //FinalisasiDanas
    Route::any('/', [FinalisasiDanaController::class, 'index'])->name('finalisasidana.index')->middleware('auth');
    Route::get('/data', [FinalisasiDanaController::class, 'data'])->name('finalisasidana.data');
    Route::delete('/delete', [FinalisasiDanaController::class, 'delete'])->name('finalisasidana.delete');
    Route::get('/edit/{id}', [FinalisasiDanaController::class, 'edit'])->name('finalisasidana.edit');
});

Route::group(['prefix' => 'reviewer'], function () { //reviewers
    Route::any('/', [ReviewerController::class, 'index'])->name('reviewers.index')->middleware('auth');
    Route::get('/data', [ReviewerController::class, 'data'])->name('reviewers.data');
    Route::delete('/delete', [ReviewerController::class, 'delete'])->name('reviewers.delete');
    Route::get('/edit/{id}', [ReviewerController::class, 'edit'])->name('reviewers.edit');
});

Route::group(['prefix' => 'vicerector1'], function () { //vicerector1
    Route::any('/', [ViceRector1Controller::class, 'index'])->name('vicerector1.index')->middleware('auth');
    Route::get('/data', [ViceRector1Controller::class, 'data'])->name('vicerector1.data');
    Route::delete('/delete', [ViceRector1Controller::class, 'delete'])->name('vicerector1.delete');
    Route::get('/edit/{id}', [ViceRector1Controller::class, 'edit'])->name('vicerector1.edit');
});

Route::group(['prefix' => 'vicerector2'], function () { //vicerector2
    Route::any('/', [ViceRector2Controller::class, 'index'])->name('vicerector2.index')->middleware('auth');
    Route::get('/data', [ViceRector2Controller::class, 'data'])->name('vicerector2.data');
    Route::delete('/delete', [ViceRector2Controller::class, 'delete'])->name('vicerector2.delete');
    Route::get('/edit/{id}', [ViceRector2Controller::class, 'edit'])->name('vicerector2.edit');
});

Route::middleware('auth')->group(function () {
    Route::any('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::any('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
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
            Route::put('/update/{id}', [DepartmentController::class, 'update'])->name('dept.update');
        });
    });
});
