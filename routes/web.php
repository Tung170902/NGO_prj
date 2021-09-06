<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\Blog\CategoryController as CategoryController;
use App\Http\Controllers\Blog\PostController as PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VNPayController;

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


// AUTHENTICATION

Route::get('make-admin', [CustomAuthController::class, 'makeAdmin']);

// admin login page
Route::get('login', [CustomAuthController::class, 'index'])->name('login');

// user login page
Route::get('/user/login', [CustomAuthController::class, 'userLogin'])->name('user.login');


// handle login 
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');


// page register
Route::get('/user/register', [CustomAuthController::class, 'registration'])->name('register-user');

// handle page register

Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

// handle logout
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

// handle user logout
Route::get('/user/logout', [CustomAuthController::class, 'userLogout'])->name('user.logout');


// UPLOAD 

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);


// ADMIN CAMPAIGN

Route::prefix('admin/campaign')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [CampaignController::class, 'index'])->name('admin.campaign');
        Route::post('/', [CampaignController::class, 'create'])->name('admin.campaign.create');
        Route::put('/{id}', [CampaignController::class, 'edit'])->name('admin.campaign.edit');
        Route::delete('/{id}', [CampaignController::class, 'delete'])->name('admin.campaign.delete');
    });
});


// ADMIN BLOG

Route::prefix('admin/blog/category')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.blog.category');
        Route::post('/', [CategoryController::class, 'create'])->name('admin.blog.category.create');
        Route::put('/{id}', [CategoryController::class, 'edit'])->name('admin.blog.category.edit');
        Route::delete('/{id}', [CategoryController::class, 'delete'])->name('admin.blog.category.delete');
    });
});

Route::prefix('admin/blog/post')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.blog.post');
        Route::post('/', [PostController::class, 'create'])->name('admin.blog.post.create');
        Route::put('/{id}', [PostController::class, 'edit'])->name('admin.blog.post.edit');
        Route::delete('/{id}', [PostController::class, 'delete'])->name('admin.blog.post.delete');
    });
});


Route::prefix('admin/user')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::post('/', [UserController::class, 'create'])->name('admin.user.create');
        Route::put('/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });
});

Route::get('admin/profile', [UserController::class, 'profile'])->name('admin.profile');

Route::prefix('admin/contact')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [ContactController::class, 'adminIndex'])->name('admin.contact');
        Route::post('/', [ContactController::class, 'create'])->name('admin.contact.create');
        Route::put('/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');
        Route::delete('/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
    });
});


// PAGES CLIENT


// home page 

Route::get('/', [HomeController::class, 'index'])->name('page.home');


// contact page 

Route::get('/contact-us', [ContactController::class, 'index'])->name('page.contact');

// handle create contact 

Route::post('/contact-us', [ContactController::class, 'create'])->name('page.contact.create');

// blog page 

Route::get('/blog', [BlogController::class, 'index'])->name('page.blog');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('page.blog.detail');


// services page 

Route::get('/services', [ServiceController::class, 'index'])->name('page.services');
Route::get('/services/{slug}', [ServiceController::class, 'detail'])->name('page.services.detail');


Route::get('/about-us', [AboutController::class, 'index'])->name('page.about');

Route::get('/gallery', function () {
    return view('pages.gallery');
});

// DONATE

Route::post('/payment/vnpay', [VNPayController::class, 'createPayment'])->name('page.vnpay.create');