<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\UserController;
use App\Http\Controllers\Backend\Auth\loginController;
use App\Http\Controllers\Backend\Admin\ProductController;
use App\Http\Controllers\Backend\Admin\categoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\SliderBannerController;

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
    return view('Components.fontEnd.templates.app');
})->name('test');

Route::get('fake-user', function () {
    $user = new App\Models\User;
    $user->username = 'Hung Application';
    $user->email = 'hung.tran6@ntq-solution.com.vn';
    $user->password = bcrypt(123456789);
    $user->avatar = 'img';
    $user->phone = '0365855828';
    $user->address = 'yen bai';
    $user->password_confirmation = $user->password_confirmation;
    $user->role = 0;
    $user->save();
});

Route::get('/login', [loginController::class, 'getLogin'])->name('login');
Route::post('/login', [loginController::class, 'postLogin'])->name('postlogin');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/store/register', [loginController::class, 'store'])->name('register');
Route::post('/store/register', [loginController::class, 'create'])->name('createregister');



// categories route
Route::group(['prefix' => 'admin', 'middleware' => ['admin.role']], function () {
    Route::get('/category/list', [categoryController::class, 'getCates'])->name('listcates');
    Route::get('/category/store/create', [categoryController::class, 'store'])->name('storecreate');
    Route::post('/category/store/create', [categoryController::class, 'create'])->name('create');
    Route::get('/category/edit/{id}', [categoryController::class, 'show'])->name('categoriesEdit');
    Route::post('/category/edit/{id}', [categoryController::class, 'update']);
    Route::get('/category/remove/{id}', [categoryController::class, 'destroy'])->name('destroy');
    Route::get('/changeStatus', [categoryController::class, 'changeStatus'])->name('changeCategoriesStatus');
});
// banner slider route 
Route::group(['prefix' => 'admin', 'middleware' => ['admin.role']], function () {
    Route::get('/banner/list', [SliderBannerController::class, 'index'])->name('listBanner');
    Route::get('/banner/create/', [SliderBannerController::class, 'showCreate'])->name('showCreateBanner');
    Route::post('/banner/create/', [SliderBannerController::class, 'createBanner']);
    Route::get('/banner/edit/{id}', [SliderBannerController::class, 'showEdit'])->name('showEditBanner');
    Route::post('/banner/edit/{id}', [SliderBannerController::class, 'editCreateBanner']);
    Route::get('/banner/delete/{id}', [SliderBannerController::class, 'destroyBanner'])->name('destroyBanner');
    Route::get('/changeStatusBanner', [SliderBannerController::class, 'changeStatusBanner'])->name('changeStatusBanner');
});


// products route 

Route::group(['prefix' => 'admin', 'middleware' => ['admin.role']], function () {
    Route::get('/products/list', [ProductController::class, 'index'])->name('listProducts');
    Route::get('/products/store/create', [ProductController::class, 'store'])->name('storeProducts');
    Route::post('products/store/create', [ProductController::class, 'create'])->name('createStoreProducts');
    Route::get('products/edit/{id}', [ProductController::class, 'showEditProducts'])->name('editProducts');
    Route::post('products/edit/{id}', [ProductController::class, 'createEditProducts'])->name('createEditProducts');
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('storeProducts.Destroy');
});

// Dashboard route

Route::group(['prefix' => 'admin', 'middleware' => ['admin.role']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('listDashboard');
});

// Users Route 
Route::group(['prefix' => 'admin', 'middleware' => ['admin.role']], function () {
    Route::get('/users/list', [UserController::class, 'index'])->name('listUser');
    Route::get('/users/store/create', [UserController::class, 'showCreateUser'])->name('ShowCreateUser');
    Route::post('/users/store/create', [UserController::class, 'createUser']);
    Route::get('/users/edit/{id}', [UserController::class, 'EditUser'])->name('ShowEditUser');
    Route::post('/users/edit/{id}', [UserController::class, 'createEditUser']);
    Route::get('/users/show/profile/{id}', [UserController::class, 'showReviewUser'])->name('ShowReviewUser');
    Route::get('/changeRole', [UserController::class, 'changeRole'])->name('changeUserRole');
    Route::get('/users/delete/{id}', [UserController::class, 'destroyUser'])->name('destroyUser');
});
