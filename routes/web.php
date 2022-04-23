<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('delete/{from}/{id}', [HomeController::class, 'delete_user'])
    ->middleware('adminOrStaff')
    ->name('profile.delete');

Auth::routes();

// Profile

Route::get('/profile', [HomeController::class, 'profile'])->middleware('auth')->name('profile.index');
Route::get('/profile/{id}', [HomeController::class, 'profile'])
    ->middleware('adminOrStaff')
    ->name('profile.view');
Route::get('/profile/{id}/edit', [HomeController::class, 'edit_profile'])->middleware('auth')->name('profile.edit');
Route::post('/profile/{id}/edit', [
    HomeController::class,
    'edit_profile_submit',
])->middleware('auth')->name('profile.edit.submit');

// News
Route::group(['prefix' => 'news'], function () {
    Route::get('/', [UpdateController::class, 'index'])->middleware('auth')->name('news.index');
    Route::get('/create', [UpdateController::class, 'create'])
        ->middleware('adminOrStaff')
        ->name('news.create');
    Route::post('/create', [UpdateController::class, 'create_submit'])
        ->middleware('adminOrStaff')
        ->name('news.create.submit');
    Route::get('/{id}', [UpdateController::class, 'show'])->name('news.show');
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
Route::group(['prefix' => 'staff'], function () {
    Route::get('/', [StaffController::class, 'index'])
        ->middleware('admin')
        ->name('staffs.index');
    Route::get('/create', [StaffController::class, 'create'])
        ->middleware('admin')
        ->name('staffs.create');
    Route::post('/create', [StaffController::class, 'create_submit'])
        ->middleware('admin')
        ->name('staffs.create.submit');
});

// Students
Route::group(['prefix' => 'student'], function () {
    Route::get('/', [StudentController::class, 'index'])
        ->middleware('staff')
        ->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])
        ->middleware('staff')
        ->name('students.create');
    Route::post('/create', [StudentController::class, 'create_submit'])
        ->middleware('staff')
        ->name('students.create.submit');
});

// Notifications
Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth')->name(
    'notifications.index'
);
Route::get('/notification/{id}/read', [
    NotificationController::class,
    'markAsRead',
])->middleware('auth')->name('notifications.seen');

// All users
Route::get('/users', [UserController::class, 'index'])
    ->middleware('admin')
    ->name('users.index');
// Change user role
Route::get('/change-role/{id}/{role}', [UserController::class, 'changeRole'])
    ->middleware('admin')
    ->name('users.change.role');


// Chats
Route::get('/chats', [ChatController::class, 'index'])->middleware('auth')->name('chats.index');
Route::get('/chats/{id}', [ChatController::class, 'show'])->middleware('auth')->name('chats.show');
Route::post('/chats/create', [ChatController::class, 'create'])->middleware('auth')->name('chats.create');

// Training

Route::get('/trainings', [TrainingController::class, 'index'])->middleware('admin')->name('trainings.index');
Route::get('/trainings/create', [TrainingController::class, 'create'])->middleware('admin')->name('trainings.create');
Route::post('/trainings', [TrainingController::class, 'list'])->middleware('admin')->name('trainings.list');
Route::post('/trainings/store', [TrainingController::class, 'store'])->middleware('admin')->name('trainings.store');
Route::get('/trainings/{training}', [TrainingController::class, 'show'])->middleware('admin')->name('trainings.show');
Route::get('/trainings/{training}/attendance', [TrainingController::class, 'attendance'])->middleware('admin')->name('trainings.attendance');
Route::post('/trainings/attendance', [TrainingController::class, 'storeAttendance'])->middleware('admin')->name('trainings.attendance.store');

// Settings
Route::get('/settings', [DetailController::class, 'index'])->middleware('admin')->name('settings.index');
Route::post('/settings/update', [DetailController::class, 'update'])->middleware('admin')->name('settings.update');