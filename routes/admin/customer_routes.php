<?php


use App\Http\Controllers\Users\Admin\CustomerController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/customer',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [CustomerController::class, 'customerIndex'])->name('customerIndex');
    Route::post('/', [CustomerController::class, 'customerStore'])->name('customerStore');
    Route::get('/create', [CustomerController::class, 'customerCreate'])->name('customerCreate');
    Route::get('/edit/{customer}', [CustomerController::class, 'customerEdit'])->name('customerEdit');
    Route::patch('/update/{customer}', [CustomerController::class, 'customerUpdate'])->name('customerUpdate');
    Route::delete('/delete/{customer}', [CustomerController::class, 'customerDestroy'])->name('customerDestroy');


    Route::group(['prefix' => 'ajax'], function() {
        Route::get('/', [CustomerController::class, 'customerIndexAjax'])->name('customerIndexAjax');
        Route::post('/create', [CustomerController::class, 'customerCreateAjax'])->name('customerCreateAjax');
    });


});

