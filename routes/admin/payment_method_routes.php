<?php


use App\Http\Controllers\Users\Admin\PaymentMethodController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/payment_method',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [PaymentMethodController::class, 'paymentMethodIndex'])->name('paymentMethodIndex');
    Route::post('/', [PaymentMethodController::class, 'paymentMethodStore'])->name('paymentMethodStore');
    Route::get('/create', [PaymentMethodController::class, 'paymentMethodCreate'])->name('paymentMethodCreate');
    Route::get('/edit/{payment_method}', [PaymentMethodController::class, 'paymentMethodEdit'])->name('paymentMethodEdit');
    Route::patch('/update/{payment_method}', [PaymentMethodController::class, 'paymentMethodUpdate'])->name('paymentMethodUpdate');
    Route::delete('/delete/{payment_method}', [PaymentMethodController::class, 'paymentMethodDestroy'])->name('paymentMethodDestroy');

    Route::group(['prefix' => 'ajax'], function() {
        Route::get('/', [PaymentMethodController::class, 'paymentMethodIndexAjax'])->name('paymentMethodIndexAjax');
    });
});

