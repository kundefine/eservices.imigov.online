<?php


use App\Http\Controllers\Users\Admin\SaleController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/sale',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [SaleController::class, 'saleIndex'])->name('saleIndex');
    Route::post('/', [SaleController::class, 'saleStore'])->name('saleStore');
    Route::get('/create', [SaleController::class, 'saleCreate'])->name('saleCreate');
    Route::get('/edit/{sale}', [SaleController::class, 'saleEdit'])->name('saleEdit');
    Route::patch('/update/{sale}', [SaleController::class, 'saleUpdate'])->name('saleUpdate');
    Route::delete('/delete/{sale}', [SaleController::class, 'saleDestroy'])->name('saleDestroy');
});

