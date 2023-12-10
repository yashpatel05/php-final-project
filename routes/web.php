<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SubCategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\FeedbacksController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\MyAccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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
// Route for the index view
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders/accept/{id}/{uid}', [DashboardController::class, 'acceptOrder'])->name('admin.orders.accept');
    Route::get('/orders/reject/{id}/{uid}', [DashboardController::class, 'rejectOrder'])->name('admin.orders.reject');
    Route::get('/users', [UsersController::class, 'index'])->name('admin.user');

    // Routes for categories
    Route::get('/category', [CategoriesController::class, 'index'])->name('admin.category');
    Route::get('/category/create', [CategoriesController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoriesController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id}', [CategoriesController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [CategoriesController::class, 'delete'])->name('admin.category.delete');

    // Routes for subcategories
    Route::get('/subcategory', [SubCategoriesController::class, 'index'])->name('admin.subcategory');
    Route::get('/subcategory/create', [SubCategoriesController::class, 'create'])->name('admin.subcategory.create');
    Route::post('/subcategory/store', [SubCategoriesController::class, 'store'])->name('admin.subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubCategoriesController::class, 'edit'])->name('admin.subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoriesController::class, 'update'])->name('admin.subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubCategoriesController::class, 'delete'])->name('admin.subcategory.delete');

    // Routes for products
    Route::get('/product', [ProductsController::class, 'index'])->name('admin.product');
    Route::get('/product/create', [ProductsController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductsController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductsController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [ProductsController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}', [ProductsController::class, 'delete'])->name('admin.product.delete');

    // Routes for brands
    Route::get('/brand', [BrandsController::class, 'index'])->name('admin.brand');
    Route::get('/brand/create', [BrandsController::class, 'create'])->name('admin.brand.create');
    Route::post('/brand/store', [BrandsController::class, 'store'])->name('admin.brand.store');
    Route::get('/brand/edit/{id}', [BrandsController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/brand/update/{id}', [BrandsController::class, 'update'])->name('admin.brand.update');
    Route::get('/brand/delete/{id}', [BrandsController::class, 'delete'])->name('admin.brand.delete');

    // Routes for feedbacks
    Route::get('/feedbacks', [FeedbacksController::class, 'index'])->name('admin.feedback');

    // Routes for contacts
    Route::get('/contacts', [ContactsController::class, 'index'])->name('admin.contact');
    Route::post('/contacts/marksolved/{id}', [ContactsController::class, 'markSolved'])->name('admin.contact.markSolved');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/contactus', [ContactUsController::class, 'index'])->name('contactus');
    Route::post('/contactus', [ContactUsController::class, 'store'])->name('contactus.store');
    Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
    Route::get('/myorder', [MyOrdersController::class, 'index'])->name('myorder');
    Route::get('/myaccount', [MyAccountController::class, 'index'])->name('myaccount');
    Route::post('/myaccount/update', [MyAccountController::class, 'update'])->name('myaccount.update');
    Route::post('/change-password', [MyAccountController::class, 'changePassword'])->name('change-password');

    // Routes for feedbacks
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');

    // Routes for carts
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::match(['get', 'delete'], '/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

    // Routes for payments
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('placeorder');
});

// Route for the login page
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route for the signup page
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route for the logout page
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
