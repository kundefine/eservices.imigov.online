<?php


use App\Http\Controllers\Users\Admin\PraStatusController;
use Illuminate\Support\Facades\Route;



Route::group([
    'prefix' => 'systemx/pra_status',
    'middleware' => 'auth:admin'
], function(){
    Route::get('/', [PraStatusController::class, 'praStatusIndex'])->name('praStatusIndex');
    Route::post('/', [PraStatusController::class, 'praStatusStore'])->name('praStatusStore');
    Route::get('/create', [PraStatusController::class, 'praStatusCreate'])->name('praStatusCreate');
    Route::get('/{praStatus}/edit', [PraStatusController::class, 'praStatusEdit'])->name('praStatusEdit');
    Route::patch('/{praStatus}/update', [PraStatusController::class, 'praStatusUpdate'])->name('praStatusUpdate');
    Route::delete('/{praStatus}/delete', [PraStatusController::class, 'praStatusDelete'])->name('praStatusDelete');
});

