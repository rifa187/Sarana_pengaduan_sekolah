<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Student Routes
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
    
    Route::resource('complaints', ComplaintController::class)->only([
        'index', 'create', 'store', 'show'
    ]);

    // Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () { // Assuming role checking is in views or controllers
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/complaints', [AdminController::class, 'complaints'])->name('admin.complaints.index');
        Route::get('/complaints/{complaint}', [AdminController::class, 'showComplaint'])->name('admin.complaints.show');
        Route::patch('/complaints/{complaint}/status', [AdminController::class, 'updateStatus'])->name('admin.complaints.status');
        Route::post('/import/students', [AdminController::class, 'importStudents'])->name('admin.students.import');
    });

    // Profile Routes (Assuming Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    Route::get('register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
    Route::get('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'store']);
});

Route::middleware('auth')->post('logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
