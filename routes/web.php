<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\Route;

// Setup route: runs migrate, db:seed, key:generate (if needed)
// Local: just visit /setup | Production: add SETUP_TOKEN to .env and use /setup?token=YOUR_SECRET
Route::get('/setup', [SetupController::class, 'run'])->middleware('setup.token')->name('setup');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about/{page?}', [HomeController::class, 'about'])->name('about')->defaults('page', 'overview');
Route::get('/products/{slug?}', [HomeController::class, 'products'])->name('products');
Route::get('/quality/{page?}', [HomeController::class, 'quality'])->name('quality')->defaults('page', 'control');
Route::get('/investors', [HomeController::class, 'investors'])->name('investors');
Route::get('/clients', [HomeController::class, 'clients'])->name('clients');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'blogShow'])->name('blog.show');
Route::get('/contact/{page?}', [HomeController::class, 'contact'])->name('contact')->defaults('page', 'us');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::resource('blogs', AdminBlogController::class);
        Route::post('/ckeditor/upload', [\App\Http\Controllers\Admin\CkEditorUploadController::class, 'upload'])->name('ckeditor.upload');
    });
});
