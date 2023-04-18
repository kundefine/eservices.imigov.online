<?php


use App\Http\Controllers\Users\Admin\ServiceController;

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/services',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [ServiceController::class, 'serviceIndex'])->name('serviceIndex');
    Route::post('/', [ServiceController::class, 'serviceStore'])->name('serviceStore');
    Route::get('/create', [ServiceController::class, 'serviceCreate'])->name('serviceCreate');
    Route::get('/edit/{service}', [ServiceController::class, 'serviceEdit'])->name('serviceEdit');
    Route::patch('/update/{service}', [ServiceController::class, 'serviceUpdate'])->name('serviceUpdate');
    Route::delete('/delete/{service}', [ServiceController::class, 'serviceDestroy'])->name('serviceDestroy');

    Route::get('/ajax/all', [ServiceController::class, 'serviceAjaxAll'])->name('serviceAjaxAll');
});

