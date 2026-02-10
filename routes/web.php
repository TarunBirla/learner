<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCourseController;


/*
|--------------------------------------------------------------------------
| Frontend Routes (Website)
|--------------------------------------------------------------------------
*/
// php artisan key:generate
Route::get('key-generate', function () {    
    Artisan::call('key:generate');
});
Route::get('/', [FrontendController::class,'home']);

Route::get('/courses', [FrontendController::class,'courses']);

Route::get('/blog', [FrontendController::class,'blog']);

Route::get('/contact', [FrontendController::class,'contact']);
Route::get('/about', [FrontendController::class,'about']);

Route::get('/instructors', [FrontendController::class,'instructors']);

Route::get('/pricing', [FrontendController::class,'pricing']);
Route::get('/enroll', [FrontendController::class,'enroll']);




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function(){

    // Dashboard
    Route::get('/dashboard', [AdminController::class,'dashboard']);

    // Courses Management
    Route::get('/courses', [AdminCourseController::class,'index']);

    Route::get('/courses/create',[AdminCourseController::class,'create']);

});

