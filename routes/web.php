<?php

use App\Http\Controllers\Author\AuthorController;
use App\Http\Controllers\Author\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentControlar;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Frontend Route 
Route::get('/', [FrontendController::class,'index'])->name('index');
Route::prefix('author')->group(function(){
    Route::get('login/page',[FrontendController::class,'author_login_page'])->name('author.login.page');
    Route::get('signup/page',[FrontendController::class,'author_signup_page'])->name('author.signup.page');
    Route::post('/login',[AuthorController::class,'author_login'])->name('author.login');
    Route::post('/register',[AuthorController::class,'author_register'])->name('author.register');
});



// Backend Route 
Route::get('/dashboard', [HomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
});

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/profile/edit',[UserController::class,'editProfile'])->name('admin.edit.profile');
    Route::post('/profile/update/{id}',[UserController::class,'updateProfile'])->name('admin.update.profile');
    Route::post('/profile/update/password/{id}',[UserController::class,'updatePassword'])->name('admin.update.password');
    Route::post('/profile/update/photo/{id}',[UserController::class,'update_photo'])->name('admin.update.photo');
    Route::get('users',[UserController::class,'User'])->name('user');
    Route::Post('user/add',[UserController::class,'addUser'])->name('user.add');
    Route::get('user/delete/{id}',[UserController::class,'userDelete'])->name('user.delete');
    // Author route 
    Route::get('/author-list',[UserController::class,'author_list_page'])->name('admin.author.list');
    Route::get('/author-status/{id}',[UserController::class,'author_status'])->name('admin.author.satus');
    Route::get('/author-delete/{id}',[UserController::class,'author_delete'])->name('admin.author.delete');

    // ===== Categorty ====

    Route::get('category',[CategoryController::class,'category'])->name('category');
    Route::post('category/store',[CategoryController::class,'category_store'])->name('category.store');
    Route::get('category/edit/{id}',[CategoryController::class,'category_edit'])->name('category.edit');
    Route::post('category/update/{id}',[CategoryController::class,'category_update'])->name('category.update');
    Route::get('category/delete/{id}',[CategoryController::class,'category_delete'])->name('category.delete');
    Route::get('category/trash',[CategoryController::class,'categoryTrash'])->name('category.trash');
    Route::get('category/restore/{id}',[CategoryController::class,'categoryRestore'])->name('category.restore');
    Route::get('category/force/delete/{id}',[CategoryController::class,'categoryForceDelete'])->name('category.froceDelete');
    Route::post('category/check_delete',[CategoryController::class,'categoryCheckDelete'])->name('category.froceCheckDelete');
    Route::post('category/check_restore',[CategoryController::class,'check_restore'])->name('category.check.restore');

    //=========== Tags ==========
    Route::get('tag',[TagController::class,'tag'])->name('tag');
    Route::post('tag/store',[TagController::class,'tag_store'])->name('tag.store');
    Route::get('tag/softdelete/{id}',[TagController::class,'tag_softdelete'])->name('tag.softdelete');
    Route::post('tag/checkdelete',[TagController::class,'tag_checkdelete'])->name('tag.checkdelete');
    Route::post('tag/checkrestoredelete',[TagController::class,'checkrestoredelete'])->name('tag.checkrestoredelete');
    Route::get('tag/trash',[TagController::class,'trash'])->name('tag.trash');
    Route::get('tag/delete',[TagController::class,'tag_delete'])->name('tag.delete');

    // Tag Edit
    Route::get('tag/edit/{id}',[TagController::class,'tagEdit'])->name('tag.edit');
    Route::post('tag/update/{id}',[TagController::class,'tagUpdate'])->name('tag.update');


});

// Author all route 

Route::middleware('authormiddleware')->prefix('author')->group(function(){
    Route::get('/logout',[AuthorController::class,'author_logout'])->name('author.logout');
    Route::get('/dashboard',[AuthorController::class,'author_dashboard'])->name('author.dashboard');
    Route::get('/edit/profile',[AuthorController::class,'authorEdit'])->name('author.edit');
    Route::post('/edit/profile/{id}',[AuthorController::class,'authorUpdate'])->name('author.update');
    Route::post('/edit/profile/password/{id}',[AuthorController::class,'authorPassword'])->name('author.update.password');
    Route::post('/edit/profile/photo/{id}',[AuthorController::class,'authorPhoto'])->name('author.update.photo');

    // post route 
    Route::get('add/post',[PostController::class,'post'])->name('author.add.post');
    Route::post('add/post/store',[PostController::class,'post_store'])->name('author.post.store');
    Route::get('my-post',[PostController::class,'my_post'])->name('author.post.show');
    Route::get('post/active/{id}',[PostController::class,'active_post'])->name('post.active');
    Route::get('post/delete/{id}',[PostController::class,'post_delete'])->name('post.delete');
    
});
// post details route 
Route::get('post/details/{slug}',[FrontendController::class,'post_datails'])->name('post.details');
Route::get('author/all/post/{id}',[FrontendController::class,'author_post'])->name('author.post');
Route::get('cartgories/all/category/{id}',[FrontendController::class,'category_post'])->name('category.post');
Route::post('add/comment',[CommentControlar::class,'comment'])->name('add.comment');


require __DIR__.'/auth.php';
