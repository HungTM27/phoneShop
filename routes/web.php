<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\loginController;
use App\Http\Controllers\Backend\Admin\categoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Auth\UserController;

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
    return view('Admin.layouts.Home');
})->name('test');

Route::get('fake-user', function () {
    $user = new App\Models\User;
    $user->username = 'Hung Application';
    $user->email = 'hung.tran6@ntq-solution.com.vn';
    $user->password = bcrypt(123456789);
    $user->avatar = 'img';
    $user->phone = '0365855828';
    $user->address = 'yen bai';
    $user->role = 1;
    $user->save();
});

Route::get('/login',[loginController::class, 'getLogin'])->name('login');
Route::post('/login',[loginController::class, 'postLogin'])->name('postlogin');
Route::get('/logout',[loginController::class, 'logout'])->name('logout');
Route::get('/store/register',[loginController::class, 'store'])->name('register');
Route::post('/store/register',[loginController::class, 'create'])->name('createregister');



// categories route
Route::group(['middleware' => ['admin.role']], function () {
    Route::get('/category/list',[categoryController::class, 'getCates'])->name('listcates'); 
    Route::get('/category/store/create',[categoryController::class, 'store'])->name('storecreate');
    Route::post('/category/store/create',[categoryController::class, 'create'])->name('create');
    Route::get('/category/edit/{id}',[categoryController::class, 'show'])->name('categoriesEdit');
    Route::post('/category/edit/{id}',[categoryController::class, 'update']);
    Route::get('/category/remove/{id}',[categoryController::class, 'destroy'])->name('destroy');
    Route::get('/changeStatus', [categoryController::class, 'changeStatus'])->name('changeCategoriesStatus');
});

// products route 

Route::group(['middleware' => ['admin.role']], function () {
    Route::get('/products/list',[ProductController::class, 'index'])->name('listProducts');
    Route::get('/products/store/create',[ProductController::class, 'store'])->name('storeProducts');
    Route::post('products/store/create',[ProductController::class, 'create'])->name('createStoreProducts');
    Route::get('products/edit/{id}',[ProductController::class, 'showEditProducts'])->name('editProducts');
    Route::post('products/edit/{id}',[ProductController::class, 'createEditProducts'])->name('createEditProducts');
    Route::get('/products/delete/{id}',[ProductController::class, 'destroy'])->name('storeProducts.Destroy');
});

// Dashboard route

Route::group(['middleware' => ['admin.role']], function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('listDashboard');
    
});

// Users Route 
Route::group(['middleware' => ['admin.role']], function () {
    Route::get('/users/list',[UserController::class, 'index'])->name('listUser');
    Route::get('/users/store/create',[UserController::class, 'showCreateUser'])->name('ShowCreateUser');
    Route::post('/users/store/create',[UserController::class, 'createUser']);
    
});