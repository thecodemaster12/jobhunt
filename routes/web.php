<?php

use App\Http\Controllers\backend\CategoryPageController;
use App\Http\Controllers\backend\HomePageController;
use App\Http\Controllers\backend\JobPageController;
use App\Http\Controllers\backend\OrganizationPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// TODO  --- Backend Start
// ! -- Home
Route::get('/', [HomePageController::class, 'index'])->name('dashboard.index');

// ! -- Job
Route::get('/jobs', [JobPageController::class, 'index'])->name('job.index');
Route::get('/jobs/create', [JobPageController::class, 'create'])->name('job.create');
Route::post('/jobs', [JobPageController::class, 'store'])->name('job.store');
Route::get('/jobs/{job}', [JobPageController::class, 'show'])->name('job.show');
Route::get('/jobs/[job]/edit', [JobPageController::class, 'edit'])->name('job.edit');

// ! -- Organization
Route::get('/organizations', [OrganizationPageController::class, 'index'])->name('organization.index');
Route::get('/organizations/create', [OrganizationPageController::class, 'create'])->name('organization.create');
Route::post('/organizations', [OrganizationPageController::class, 'store'])->name('organization.store');
Route::get('/organizations/{org}/edit', [OrganizationPageController::class, 'edit'])->name('organization.edit');
Route::put('/organizations/{org}', [OrganizationPageController::class, 'update'])->name('organization.update');
Route::get('/organizations/{org}', [OrganizationPageController::class, 'show'])->name('organization.show');
Route::delete('/organizations/{org}', [OrganizationPageController::class, 'destroy'])->name('organization.destroy');

// ! -- Category
Route::get('/categories', [CategoryPageController::class, 'index'])->name('category.index');

// TODO  --- Backend End

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
