<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormHandallingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OneToOneRelationship;

Route::get('/', [HomeController::class,'index'])->name('home.page');

Route::get('/about',[HomeController::class,'about'])->name('about.page');
Route::get('/user', [HomeController::class,'user'])->name('user.raju');
Route::get('/blog',[HomeController::class,'blog'])->name('blog.page');

Route::get('/contact',function(){
    return 'contact page';
}); 


//httm request method

Route::post('/contact',function(){
    return 'contact page';
});

Route::put('/contact',function(){
    return 'contact page';
});

Route::patch('/contact',function(){
    return 'contact page';
});

Route::delete('/contact',function(){
    return 'contact page';
});

Route::match(['get','post'],'/contact',function(){
    return 'contact page';
});

Route::any('/contact',function(){
    return 'contact page';
});


//parameters Route
// Route::get('/product/{id}/{color}',function($id,$color){
//     return "product id is ".$id. ' product color is '.$color;
// });

// //optional parameters
// Route::get('/profile/{id?}/{color?}',function($id=6,$color=null){
//     return "profile id is ".$id. ' product color is '.$color;
// });


//php form handling

Route::get('/student/form',[FormHandallingController::class,'index'])->name('student.form');
Route::post('/student/store',[FormHandallingController::class,'store'])->name('student.store');

//crud route
Route::get('/product/list',[ProductController::class,'index'])->name('product.list');
Route::get('/product/add',[ProductController::class,'addview'])->name('product.add');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::DELETE('/product/delete/{id}',[ProductController::class,'destroy'])->name('product.destroy');


//middleware 


//Route::get('/employee',[HomeController::class,'employee'])->middleware('agecheck');



Route::middleware('checkageandcountry')->group(function () {
    Route::get('/employee',[HomeController::class,'employee']);
});


//auth 

Route::prefix('user')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/register/store', [AuthController::class, 'registerStore'])->name('user.register.store');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/store', [AuthController::class, 'loginstore'])->name('user.login.store');


    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('user.dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
    });

});


//one to one relationship
Route::get('/author', [OneToOneRelationship::class, 'createAuthor'])->name('author');
Route::post('/author/store', [OneToOneRelationship::class, 'storeAuthor'])->name('author.store');
Route::get('/author/blog/{id}', [OneToOneRelationship::class, 'authorBlog'])->name('author.blog');
Route::get('/blog', [OneToOneRelationship::class, 'createBlog'])->name('blog');
Route::post('/blog/store', [OneToOneRelationship::class, 'storeBlog'])->name('blog.store');
Route::get('/bloglist', [OneToOneRelationship::class, 'authorBlogList'])->name('blog.list');








