<?php


use App\Http\Controllers\Users\User\DashboardController;
use Illuminate\Support\Facades\Route;

// user dashboard
Route::group([
    "prefix" => "dashboard",
    "middleware" => "auth"
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');
});
