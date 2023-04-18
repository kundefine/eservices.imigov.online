<?php


use App\Http\Controllers\Users\Admin\AjaxController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/ajax',
    'middleware' => 'auth:admin'
], function() {
    Route::post('/sync_permission', [AjaxController::class, 'syncPermission'])->name('syncPermission');
});
