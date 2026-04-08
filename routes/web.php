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
    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/complaints', [AdminController::class, 'complaints'])->name('admin.complaints.index');
        Route::get('/complaints/{complaint}', [AdminController::class, 'showComplaint'])->name('admin.complaints.show');
        Route::patch('/complaints/{complaint}/status', [AdminController::class, 'updateStatus'])->name('admin.complaints.status');
        Route::delete('/complaints/{complaint}', [AdminController::class, 'destroyComplaint'])->name('admin.complaints.destroy');
        Route::post('/import/students', [AdminController::class, 'importStudents'])->name('admin.students.import');

        // Manajemen Siswa (Manual)
        Route::get('/students', [AdminController::class, 'students'])->name('admin.students.index');
        Route::get('/students/create', [AdminController::class, 'createStudent'])->name('admin.students.create');
        Route::post('/students', [AdminController::class, 'storeStudent'])->name('admin.students.store');
        Route::get('/students/{student}/edit', [AdminController::class, 'editStudent'])->name('admin.students.edit');
        Route::patch('/students/{student}', [AdminController::class, 'updateStudent'])->name('admin.students.update');
        Route::delete('/students/{student}', [AdminController::class, 'destroyStudent'])->name('admin.students.destroy');
    });

    // Profile Routes (Assuming Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    Route::get('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [App\Http\Controllers\Auth\AdminAuthController::class, 'store']);
});

Route::middleware('auth')->post('logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
