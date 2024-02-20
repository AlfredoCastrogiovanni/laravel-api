<?php

use App\Http\Controllers\admin\ProjectController as AdminProjectController;
use App\Http\Controllers\admin\TypeController as AdminTypeController;
use App\Http\Controllers\admin\TechnologyController as AdminTechnologyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('pages.guest.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        // User
        Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('user');
        Route::get('/projects/deleted', [AdminProjectController::class, 'deleted'])->name('projects.deleted');
        Route::get('/projects/restore/{project}', [AdminProjectController::class, 'restore'])->name('projects.restore');
        Route::delete('/projects/deleted/{project}', [AdminProjectController::class, 'permanentDestroy'])->name('projects.permanentDestroy');
        // Types
        Route::get('/types/deleted', [AdminTypeController::class, 'deleted'])->name('types.deleted');
        Route::get('/types/restore/{type}', [AdminTypeController::class, 'restore'])->name('types.restore');
        Route::delete('/types/deleted/{type}', [AdminTypeController::class, 'permanentDestroy'])->name('types.permanentDestroy');
        // Technologies
        Route::get('/technologies/deleted', [AdminTechnologyController::class, 'deleted'])->name('technologies.deleted');
        Route::get('/technologies/restore/{type}', [AdminTechnologyController::class, 'restore'])->name('technologies.restore');
        Route::delete('/technologies/deleted/{type}', [AdminTechnologyController::class, 'permanentDestroy'])->name('technologies.permanentDestroy');
        // Resources
        Route::resource('/projects', AdminProjectController::class);
        Route::resource('/types', AdminTypeController::class);
        Route::resource('/technologies', AdminTechnologyController::class);
    });
