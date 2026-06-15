<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index']);

Route::get('/about',[HomeController::class,'about']);
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
Route::get('/product/{id}/{color}',function($id,$color){
    return "product id is ".$id. ' product color is '.$color;
});

//optional parameters
Route::get('/profile/{id?}/{color?}',function($id=6,$color=null){
    return "profile id is ".$id. ' product color is '.$color;
});

