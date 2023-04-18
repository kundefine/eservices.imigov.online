<?php


use App\Http\Controllers\Users\Admin\CompanyController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/company',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [CompanyController::class, 'companyIndex'])->name('companyIndex');
    Route::post('/', [CompanyController::class, 'companyStore'])->name('companyStore');
    Route::get('/create', [CompanyController::class, 'companyCreate'])->name('companyCreate');
    Route::get('/edit/{company}', [CompanyController::class, 'companyEdit'])->name('companyEdit');
    Route::patch('/update/{company}', [CompanyController::class, 'companyUpdate'])->name('companyUpdate');
    Route::delete('/delete/{company}', [CompanyController::class, 'companyDestroy'])->name('companyDestroy');

    Route::group(['prefix' => 'ajax'], function() {
        Route::get('/', [CompanyController::class, 'companyIndexAjax'])->name('companyIndexAjax');
    });
});

