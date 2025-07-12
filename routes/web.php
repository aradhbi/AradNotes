<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Panel\AboutController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::where('is_published', true)
            ->orderBy('created_at', 'desc')->paginate(4);


    return view('index',compact('posts'));
})->name('index');

Route::get('/p/{post:slug}', [blogController::class,'post'])->name('post');

Route::get('/c/{category:name}', [blogController::class, 'categoryPosts'])->name('category.show');


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/login', [LoginController::class,"showLoginForm"])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        $categorieCount = Category::Count();
        $postCount = Post::count();

        return view('admin.index', compact('categorieCount', 'postCount'));
    })->name('admin.index');
// -----------------------------------posts-----------------------------------
    Route::get('posts', [PostController::class,'index'])->name('admin.posts.index');
    Route::get('posts/create', [PostController::class,'create'])->name('admin.posts.create');
    Route::post('posts', [PostController::class,'store'])->name('admin.posts.store');
    Route::get('posts/{post}/edit', [PostController::class,'edit'])->name('admin.posts.edit');
    Route::put('posts/update/{post}', [PostController::class,'update'])->name('admin.posts.update');
    Route::get('posts/{post}', [PostController::class,'destroy'])->name('admin.posts.destroy');
// -----------------------------------categories-----------------------------------

    Route::get('categories',[CategoryController::class,'index'])->name('admin.categories');
    Route::post('categories', [CategoryController::class,'store'])->name('admin.categories.store');
    Route::get('categories/{category}', [CategoryController::class,'destroy'])->name('admin.categories.destroy');
    // ------------------------about------------------------
    Route::get('admin/about', [AboutController::class, 'index'])->name('admin.about');
    Route::post('admin/about', [AboutController::class, 'store'])->name('admin.about.store');
    Route::put('admin/about/update-all', [AboutController::class, 'updateSkillsAndInterests'])->name('admin.about.update_all');


});
