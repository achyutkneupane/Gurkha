<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('delete/{from}/{id}', [HomeController::class, 'delete_user'])
     ->middleware('admin')
     ->name('profile.delete');

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');



// Profile

Route::get('/profile', [HomeController::class, 'profile'])->name('profile.index');
Route::get('/profile/{id}', [HomeController::class, 'profile'])->middleware('adminOrStaff')->name('profile.view');
Route::get('/profile/{id}/edit', [HomeController::class, 'edit_profile'])->name('profile.edit');
Route::post('/profile/{id}/edit', [
    HomeController::class,
    'edit_profile_submit',
])->name('profile.edit.submit');


// News
Route::group(['prefix' => 'news'], function () {
    Route::get('/', [UpdateController::class, 'index'])->name('news.index');
    Route::get('/create', [UpdateController::class, 'create'])
        ->middleware('adminOrStaff')
        ->name('news.create');
    Route::post('/create', [UpdateController::class, 'create_submit'])
        ->middleware('adminOrStaff')
        ->name('news.create.submit');
    Route::get('/{id}', [UpdateController::class, 'show'])
        ->name('news.show');
    Route::get('/{id}/edit', [UpdateController::class, 'edit'])
        ->middleware('adminOrStaff')
        ->name('news.edit');
    Route::post('/{id}/edit', [UpdateController::class, 'edit_submit'])
        ->middleware('adminOrStaff')
        ->name('news.edit.submit');
    Route::get('/{id}/delete', [UpdateController::class, 'delete'])
        ->middleware('adminOrStaff')
        ->name('news.delete');
});


// Staff
Route::group(['prefix' => 'staff'], function() {
    Route::get('/',[StaffController::class,'index'])
         ->middleware('admin')
         ->name('staffs.index');
    Route::get('/create',[StaffController::class,'create'])
         ->middleware('admin')
         ->name('staffs.create');
    Route::post('/create',[StaffController::class,'create_submit'])
         ->middleware('admin')
         ->name('staffs.create.submit');
});

// Students
Route::group(['prefix' => 'student'], function() {
    Route::get('/',[StudentController::class,'index'])
         ->middleware('admin')
         ->name('students.index');
    Route::get('/create',[StudentController::class,'create'])
         ->middleware('admin')
         ->name('students.create');
    Route::post('/create',[StudentController::class,'create_submit'])
         ->middleware('admin')
         ->name('students.create.submit');
});