<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('companies', [\App\Http\Controllers\CompaniesController::class, 'index'])->name('company.index');
    Route::get('select/{id}', [\App\Http\Controllers\CompaniesController::class, 'select'])->name('company.select');
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('inventory')->group(function () {
            Route::get('/items', function(){ return view('admin.inventory.index');})->name('admin.inventory.index');
            Route::get('/categories', function(){ return view('admin.inventory.categories');})->name('admin.inventory.categories');
        });
        Route::prefix('setup')->group(function () {
            Route::get('/', function(){ return view('admin.setup.index');})->name('admin.setup.index');
        });
    });

});

