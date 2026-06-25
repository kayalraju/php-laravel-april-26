<?php

use App\Http\Controllers\FormHandallingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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