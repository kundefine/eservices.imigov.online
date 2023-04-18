<?php


use App\Http\Controllers\Users\Admin\FormGeneratorController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'systemx/form_generator',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [FormGeneratorController::class, 'formGeneratorIndex'])->name('formGeneratorIndex');
    Route::post('/', [FormGeneratorController::class, 'formGeneratorStore'])->name('formGeneratorStore');
    Route::get('/ajax/{formGenerator}', [FormGeneratorController::class, 'formGeneratorAjaxShow'])->name('formGeneratorAjaxShow');
    Route::get('/create', [FormGeneratorController::class, 'formGeneratorCreate'])->name('formGeneratorCreate');
    Route::get('/edit/{formGenerator}', [FormGeneratorController::class, 'formGeneratorEdit'])->name('formGeneratorEdit');
    Route::patch('/update/{formGenerator}', [FormGeneratorController::class, 'formGeneratorUpdate'])->name('formGeneratorUpdate');
    Route::delete('/delete/{formGenerator}', [FormGeneratorController::class, 'formGeneratorDestroy'])->name('formGeneratorDestroy');
});

