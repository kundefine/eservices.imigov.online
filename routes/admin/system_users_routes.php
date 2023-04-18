<?php


use App\Http\Controllers\Users\Admin\SystemUserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/system_users/role',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [SystemUserController::class, 'roleIndex'])->name('roleIndex');
    Route::post('/', [SystemUserController::class, 'roleStore'])->name('roleStore');
    Route::get('/create', [SystemUserController::class, 'roleCreate'])->name('roleCreate');
    Route::get('/edit/{role}', [SystemUserController::class, 'roleEdit'])->name('roleEdit');
    Route::patch('/update/{role}', [SystemUserController::class, 'roleUpdate'])->name('roleUpdate');
});

Route::group([
    'prefix' => 'systemx/system_users',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [SystemUserController::class, 'adminIndex'])->name('adminIndex');
    Route::post('/', [SystemUserController::class, 'adminStore'])->name('adminStore');
    Route::get('/create', [SystemUserController::class, 'adminCreate'])->name('adminCreate');
    Route::get('/{admin}', [SystemUserController::class, 'adminShow'])->name('adminShow');
    Route::patch('/{admin}/role_update', [SystemUserController::class, 'adminRoleUpdate'])->name('adminRoleUpdate');
    Route::patch('/{admin}/password_update', [SystemUserController::class, 'adminPasswordUpdate'])->name('adminPasswordUpdate');
    Route::delete('/{admin}/delete', [SystemUserController::class, 'adminDelete'])->name('adminDelete');
});

