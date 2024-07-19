<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\user\PermissionController;
use App\Http\Controllers\user\RoleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route Login
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('auth/login', [AuthController::class, 'postlogin'])->name('postlogin')->middleware("throttle:5,2");

//Route Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
        // Permissions route group
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/permission', 'index')->name('permission.index');
            Route::get('/permission/json', 'jsonpermission')->name('permission.json');
            Route::get('/permission/create', 'create')->name('permission.create');
            Route::post('/permission', 'store')->name('permission.store');
        });
    
        // Role access management route group
        Route::controller(RoleController::class)->group(function () {
            Route::get('/role', 'index')->name('role.index');
            Route::get('/role/create', 'create')->name('role.create');
            Route::post('/role', 'store')->name('role.store');
            Route::get('/role/edit/{role}', 'edit')->name('role.edit');
            Route::patch('/role/update/{role}', 'update')->name('role.update');
        });
});