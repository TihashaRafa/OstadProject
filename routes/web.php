<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'role:admin'])->name('admin.index');

Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [RegisterController::class, 'login'])->name('admin.register');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    //category API
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/add', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');
    
    
     Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    // Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    // Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    // Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
    // Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
    // Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
  



    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
