<?php

use App\Http\Controllers\Users\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// admin dashboard
Route::group([
    "prefix" => "systemx",
    "middleware" => "auth:admin"
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});
