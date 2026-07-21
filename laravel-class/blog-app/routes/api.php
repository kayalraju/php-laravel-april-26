<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

Route::post('/create/student',[StudentController::class,'createStudent']);
Route::get('/student',[StudentController::class,'getAllStudent']);






