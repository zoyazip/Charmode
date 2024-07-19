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

use App\Http\Middleware\AdminRoutes;



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
Route::get('/adminproducts', [AdminController::class, 'openAllProductPage'])
    ->middleware(AdminRoutes::class);
Route::get('/createproduct', [AdminController::class, 'openAddProductPage'])
    ->middleware(AdminRoutes::class);
Route::get('/adminproducts/edit/{id}', [AdminController::class, 'editProduct'])
    ->middleware(AdminRoutes::class);
Route::get('/orders/{id}', [AdminController::class, 'openOneOrderPage'])
    ->middleware(AdminRoutes::class);
Route::get('/adminproducts/{id}', [AdminController::class, 'openOneProductPage'])
    ->middleware(AdminRoutes::class);
Route::get('/orders', [AdminController::class, 'openOrdersPage'])
    ->middleware(AdminRoutes::class);

// Users order history
Route::get('/myorders', [OrderController::class, 'openMyOrdersPage']);

// Delete Review
Route::get('/reviews/delete/{id}', [ReviewController::class, 'delete'])
    ->middleware(AdminRoutes::class);
// Delete Product
Route::get('/adminproducts/delete/{id}', [ProductController::class, 'delete'])
    ->middleware(AdminRoutes::class);
// Delete Image
Route::get('/adminproducts/images/delete/{id}', [ImageController::class, 'delete'])
    ->middleware(AdminRoutes::class);


// Save Product
Route::post('/add_product', [AdminController::class, 'addProduct'])
    ->middleware(AdminRoutes::class);

// Update Product
Route::post('/update_product/{id}', [AdminController::class, 'updateProduct'])
    ->middleware(AdminRoutes::class);

// Update status
Route::post('/orders/update/{id}', [OrderController::class, 'updateStatus'])
    ->middleware(AdminRoutes::class);

Route::post('/cartitem/create/{product_id}/{quantity}', [CartController::class, 'store']);

Route::get('/subcategories', [AdminController::class, 'getSubcategories']);

// AUTH
Route::get('/registration', [UserController::class, 'render'])->middleware('guest')->name('registration');

Route::post('/register', [UserController::class, 'register'])->middleware('guest');

Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// page routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{id}', [ProductDisplayPageController::class, 'index'])->name('product');

// add reviews
Route::post('/reviews', [ReviewController::class, 'store'])->middleware('auth')->name('reviews.store');


// plp routes
// Route::get('/filter', [ProductListPageController::class, 'index'])->name('filter');
Route::get('/filter/{subcat?}', [ProductListPageController::class, 'categoryIndex'])->name('filter');


// cart 
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/store/guest', [CartController::class, 'storeGuest'])->name('cart.store.guest')->middleware('guest');
Route::post('/cart/store', [CartController::class, 'storeAuth'])->name('cart.store')->middleware('auth');

Route::delete('/cart', [CartController::class, 'removeAllItems']);
Route::put('/cart', [CartController::class, 'removeItem']);
Route::patch('/cart', [CartController::class, 'updateList']);
