<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Models\Blog;
use App\Models\User;

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

Route::get('/', [BlogController::class, 'index']);
Route::get('/hakkimda', function () {
    return view('hakkimda');
});
Route::get('/iletisim', function () {
    return view('iletisim');
});
Route::get('/blog-yazilarim', [BlogController::class, 'list'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('register.store');
    Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->middleware('throttle:3,1')->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/admin/dashboard', function () {
    abort_unless(in_array(auth()->user()->role, ['yönetici', 'editör'], true), 403);

    $blogCount = Blog::count();
    $publishedBlogCount = Blog::where('is_published', true)->count();

    return view('admin.dashboard', [
        'userCount' => User::count(),
        'adminCount' => User::where('role', 'yönetici')->count(),
        'editorCount' => User::where('role', 'editör')->count(),
        'memberCount' => User::where('role', 'kullanıcı')->count(),
        'blogCount' => $blogCount,
        'publishedBlogCount' => $publishedBlogCount,
        'draftBlogCount' => $blogCount - $publishedBlogCount,
        'recentBlogs' => Blog::latest()->take(6)->get(),
    ]);
})->middleware('auth')->name('admin.dashboard');
