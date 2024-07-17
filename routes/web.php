<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;



// pages controllers
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ProductListPageController;

use App\Http\Controllers\Pages\ProductDisplayPageController;



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


Route::get('/checkout', [CheckoutController::class, 'openCheckoutPage']);
Route::post('/to_checkout', [CheckoutController::class, 'checkInput']);

// Admin routes
Route::get('/adminproducts', [AdminController::class, 'openAllProductPage']);
Route::get('/createproduct', [AdminController::class, 'openAddProductPage']);
Route::get('/adminproducts/edit/{id}', [AdminController::class, 'editProduct']);
Route::get('/orders/{id}', [AdminController::class, 'openOneOrderPage']);
Route::get('/adminproducts/{id}', [AdminController::class, 'openOneProductPage']);
Route::get('/orders', [AdminController::class, 'openOrdersPage']);


// Delete Review
Route::get('/reviews/delete/{id}', [ReviewController::class, 'delete']);
// Delete Product
Route::get('/adminproducts/delete/{id}', [ProductController::class, 'delete']);
// Delete Image
Route::get('/adminproducts/images/delete/{id}', [ImageController::class, 'delete']);


// Save Product
Route::post('/add_product', [AdminController::class, 'addProduct']);

// Update Product
Route::post('/update_product/{id}', [AdminController::class, 'updateProduct']);

// Update status
Route::post('/orders/update/{id}', [OrderController::class, 'updateStatus']);

Route::post('/cartitem/create/{product_id}/{quantity}', [CartController::class, 'store']);


/*
Route::get('/subcategories', [AdminController::class, 'getSubcategories']);
Route::post('/add_product', [AdminController::class, 'addProduct']);
Route::get('/edit_product/{id}', [AdminController::class, 'editProduct']);
Route::get('/get_product', [AdminController::class, 'getProducts']);
*/

// Route::get('/subcategories', [AdminController::class, 'getSubcategories']);
// Route::get('/edit_product/{id}', [AdminController::class, 'editProduct']);
// Route::get('/get_product', [AdminController::class, 'getProducts']);


// Route::get('/get_spec', [AdminController::class, 'getSpecifications']);
// Route::get('/get_prod_colors', [AdminController::class, 'getProductColors']);
// Route::get('/get_images', [AdminController::class, 'getImages']);


// AUTH
Route::get('/registration', [UserController::class, 'render'])->middleware('guest')->name('registration');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// page routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{id}', [ProductDisplayPageController::class, 'index'])->name('product');

// add reviews
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


// plp routes
// Route::get('/filter', [ProductListPageController::class, 'index'])->name('filter');
Route::get('/filter/{subcat?}', [ProductListPageController::class, 'categoryIndex'])->name('filter');

//  please dont touch this routes 
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'storeGuest'])->name('cart.store.guest')->middleware('guest');
Route::post('/cart', [CartController::class, 'storeAuth'])->name('cart.store')->middleware('auth');



Route::delete('/cart', [CartController::class, 'removeAllItems']);
Route::put('/cart', [CartController::class, 'addOrRemoveItem']);
Route::patch('/cart', [CartController::class, 'updateList']);

