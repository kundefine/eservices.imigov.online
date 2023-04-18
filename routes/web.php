<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// admin routes
require_once __DIR__ . '/admin/auth_routes.php';
require_once __DIR__ . '/admin/dashboard_routes.php';
require_once __DIR__ . '/admin/ajax_routes.php';
require_once __DIR__ . '/admin/system_users_routes.php';
require_once __DIR__ . '/admin/form_generator_routes.php';
require_once __DIR__ . '/admin/services_routes.php';
require_once __DIR__ . '/admin/sale_routes.php';
require_once __DIR__ . '/admin/customer_routes.php';
require_once __DIR__ . '/admin/company_routes.php';
require_once __DIR__ . '/admin/payment_method_routes.php';


// user routes
require_once __DIR__ . '/user/dashboard_routes.php';
require_once __DIR__ . '/nobel-ui_routes.php';


Route::view('/', 'index');
Auth::routes();



Route::get('/example', [ExampleController::class, 'exampleGet']);
Route::post('/example', [ExampleController::class, 'examplePost']);
Route::get('/example_auth', [ExampleController::class, 'exampleAuth'])->middleware('auth:admin');


