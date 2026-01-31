<?php

use App\Http\Controllers\SetupController;
use Illuminate\Support\Facades\Route;

// Setup route: runs migrate, db:seed, key:generate (if needed)
// Uses API middleware (no session) - so it works before migrations run
// Local: /api/setup | Production: /api/setup?token=YOUR_SECRET
Route::get('/setup', [SetupController::class, 'run'])->middleware('setup.token')->name('setup');
