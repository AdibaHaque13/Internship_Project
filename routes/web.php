<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

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
//Admin Routes
Route::get('/admin',[AdminController::class, 'index'])->name('index');
Route::get('/adminProducts',[AdminController::class, 'products'])->name('products');
Route::post('/AddNewProduct',[AdminController::class, 'AddNewProduct'])->name('AddNewProduct');
Route::post('/updateProduct',[AdminController::class, 'updateProduct'])->name('updateProduct');
Route::get('/deleteProduct/{id}',[AdminController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/adminProfile',[AdminController::class, 'profile']);
Route::get('/ourOrders',[AdminController::class, 'ourOrders']);
Route::get('/changeOrderStatus/{status}/{id}',[AdminController::class, 'changeOrderStatus']);

//Customer Routes
Route::get('/',[MainController::class, 'index'])->name('index');
Route::get('/checkout',[MainController::class, 'checkout'])->name('checkout');
Route::get('/cart',[MainController::class, 'cart'])->name('cart');
Route::get('/single/{id}',[MainController::class, 'singleProduct'])->name('singleProduct');
Route::get('/shop',[MainController::class, 'shop'])->name('shop');
Route::get('/register',[MainController::class, 'register'])->name('register');
Route::get('/logout',[MainController::class, 'logout'])->name('logout');
Route::get('/login',[MainController::class, 'login'])->name('login');
Route::post('/loginUser',[MainController::class, 'loginUser'])->name('loginUser');
Route::post('/registerUser',[MainController::class, 'registerUser'])->name('registerUser');
Route::post('/addToCart',[MainController::class, 'addToCart'])->name('addToCart');
Route::get('/deleteCartItem/{id}',[MainController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::post('/updateCart',[MainController::class, 'updateCart'])->name('updateCart');
Route::get('/checkout',[MainController::class, 'checkout'])->name('checkout');
Route::get('/profile',[MainController::class, 'profile'])->name('profile');
Route::post('/updateUser',[MainController::class, 'updateUser'])->name('updateUser');
Route::get('/myOrders',[MainController::class, 'myOrders'])->name('myOrders');
