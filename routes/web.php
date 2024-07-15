<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Auth\LoginController;


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


// Color routes [example]

Route::get('/colors', [ColorController::class, 'readColors']);
Route::get('/colors/{id}', [ColorController::class, 'readColor']);
Route::post('/colors/create', [ColorController::class, 'createColor']);
Route::post('/colors/edit/{id}', [ColorController::class, 'updateColor']);
Route::get('/colors/delete/{id}', [ColorController::class, 'deleteColor']);

// Product routes

Route::get('/products', [ProductController::class, 'readProducts']);


Route::get('/products/{id}', [ProductController::class, 'readProducts']);
Route::post('/products/create', [ProductController::class, 'createProduct']);
Route::post('/products/edit/{id}', [ProductController::class, 'updateProduct']);
Route::get('/products/delete/{id}', [ProductController::class, 'deleteProduct']);

// Category routes

Route::get('/categories', [CategoryController::class, 'readCategories']);
Route::get('/categories/{id}', [CategoryController::class, 'readProduct']);
Route::post('/categories/create', [CategoryController::class, 'createProduct']);
Route::post('/categories/edit/{id}', [CategoryController::class, 'updateProduct']);
Route::get('/categories/delete/{id}', [CategoryController::class, 'deleteProduct']);

Route::get('/', function () {
    return view('web.pages.home');
});

Route::get('/pdp', function () {
    return view('web.pages.pdp');
});

Route::get('/cart', function () {
    return view('web.pages.cart');
});

Route::get('/plp', [FilterController::class, 'noInput']);

Route::post('/plp', [FilterController::class, 'testInput']);

Route::get('/checkout', [CheckoutController::class, 'openCheckoutPage']);
Route::post('/to_checkout', [CheckoutController::class, 'checkInput']);


Route::get('/admin', [AdminController::class, 'openAllProductPage']);
Route::get('/createproduct', [AdminController::class, 'openAddProductPage']);
Route::get('/subcategories', [AdminController::class, 'getSubcategories']);
Route::post('/add_product', [AdminController::class, 'addProduct']);
Route::get('/get_product', [AdminController::class, 'getProducts']);


Route::get('/get_spec', [AdminController::class, 'getSpecifications']);
Route::get('/get_prod_colors', [AdminController::class, 'getProductColors']);


// AUTH
Route::get('/registration', [UserController::class, 'openRegistrationPage'])->middleware('guest')->name('registration');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
