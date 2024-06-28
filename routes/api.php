<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\PurchaseDetailController;
// use App\Http\Controllers\Api\UoMController;
// use App\Http\Controllers\Api\CategoryController;
// use App\Http\Controllers\Api\ManufacturerController;
// use App\Http\Controllers\Api\SectionController;

/*

| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'products' => ProductController::class,
    //'categories' => CategoryController::class,
    'customers' => CustomerController::class,
    'users' => UserController::class,
    'suppliers' => SupplierController::class,
    'purchases' => PurchaseController::class,
    'purchaseDetails' => PurchaseDetailController::class
    //'uoms'=>UoMController::class,
    //'manufacturers'=>ManufacturerController::class,
    //'sections'=>SectionController::class
]);

