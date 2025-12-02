<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\CardController; // <-- Tambahkan ini
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

// Rute untuk halaman utama/landing page
Route::get('/', function () {
    return view('welcome');
});

// Rute dashboard bawaan dari Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup rute yang hanya bisa diakses setelah pengguna login
Route::middleware('auth')->group(function () {
    // Rute untuk manajemen profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ==========================================================
    // == RUTE UNTUK FITUR MANAJEMEN TIM ==
    // ==========================================================
    Route::prefix('teams')->name('teams.')->group(function () {
        Route::get('/', [TeamController::class, 'index'])->name('index');
        Route::get('/create', [TeamController::class, 'create'])->name('create');
        Route::post('/', [TeamController::class, 'store'])->name('store');
    });

    // ==========================================================
    // == RUTE UNTUK FITUR MANAJEMEN PROYEK ==
    // ==========================================================
    Route::prefix('teams/{team}/projects')->name('projects.')->group(function () {
        Route::get('/create', [ProjectController::class, 'create'])->name('create');
        Route::post('/', [ProjectController::class, 'store'])->name('store');
    });
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

    // ==========================================================
    // == RUTE UNTUK FITUR MANAJEMEN KOLOM (LISTS) ==
    // ==========================================================
    Route::post('/projects/{project}/lists', [ListController::class, 'store'])->name('lists.store');

    // ==========================================================
    // == RUTE UNTUK FITUR MANAJEMEN KARTU (CARDS) ==
    // ==========================================================
    Route::post('/lists/{list}/cards', [CardController::class, 'store'])->name('cards.store');

});

// Memuat semua rute autentikasi (login, register, logout, dll.)
require __DIR__.'/auth.php';