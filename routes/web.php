<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\UmkmController;

use App\Models\User;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;

Route::get('/', function () {
    $latestArticle = Post::orderBy('created_at', 'desc')->first();
    $articles = Post::latest()->skip(1)->take(4)->get();
    $product1 = Product::where('status', 1)
        ->latest()
        ->take(3)
        ->get();

    $product4 = Product::where('status', 1)
        ->latest()
        ->skip(3)
        ->take(6)
        ->get();
    return view('landing', compact('latestArticle', 'articles', 'product1', 'product4'));
});

Route::get('/umkm', [UmkmController::class, 'index']);

Route::get('/berita', function (Request $request) {
    $posts = Post::latest()->get();
    // if ($request->ajax()) {
    //     return view('partials.posts', compact('posts'))->render();
    // }
    return view('berita', compact('posts'));
});

Route::get('/visimisi', function (Request $request) {
    return view('visiMisi');
});
Route::get('/struktur', function (Request $request) {
    return view('struktur');
});
Route::get('/artilogo', function (Request $request) {
    return view('artiLogo');
});
Route::get('/kontak', function (Request $request) {
    return view('kontak');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

//AUTH
Route::redirect('/admin/login', '/login');
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

//ADMIN-POST
Route::middleware('auth')->group(function () {
    Route::get('/admin/post', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('/admin/post/create', function () {
        return view('createPost');
    })->name('createPost');
    Route::post('/admin/post/create', [PostController::class, 'store']);
    Route::GET('/admin/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::PUT('/admin/post/update/{post}', [PostController::class, 'update'])->name('admin.post.update');
    Route::DELETE('/admin/post/delete/{post}', [PostController::class, 'destroy'])->name('admin.post.destroy');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});


Route::get('/post/{post}', function ($post) {
    $article = Post::findOrFail($post);
    return view('detailBlog', compact('article'));
})->name('articles.show');

Route::get('/product/{product}', function ($product) {
    $product = Product::findOrFail($product);
    return view('detailProduct', compact('product'));
})->name('product.show');

//ADMIN-PRODUCT
Route::middleware('auth')->group(function () {
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/product/create', function () {
        return view('createProduct');
    })->name('createProduct');
    Route::post('/admin/product/create', [ProductController::class, 'store']);
    Route::GET('/admin/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::PUT('/admin/product/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::DELETE('/admin/product/delete/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
});

Route::post('/admin/upload-image', [ImageUploadController::class, 'upload']);


// routes/web.php
Route::get('/api/provinces', [WilayahController::class, 'getProvinces']);
Route::get('/api/regencies/{provinceCode}', [WilayahController::class, 'getRegencies']);
Route::get('/api/districts/{regencyCode}', [WilayahController::class, 'getDistricts']);
Route::get('/api/villages/{districtCode}', [WilayahController::class, 'getVillages']);

