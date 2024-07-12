<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;

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

Route::get('/plp', function () {
    return view('web.pages.plp');
});

// Route::get('/checkout', function () {
//     return view('web.pages.checkout');
// });

Route::get('/checkout', [CheckoutController::class, 'openCheckoutPage']);
Route::post('/to_checkout', [CheckoutController::class, 'checkInput']);

Route::get('/registration', [UserController::class, 'openRegistrationPage'])->name('registration');
Route::post('/register', [UserController::class, 'register']);



// Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login');
