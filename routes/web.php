<?php

use App\Http\Controllers\Dashboart\CategoryController;
use App\Http\Controllers\Dashboart\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\BlogController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('post', PostController::class);

    Route::resource('category', CategoryController::class);
});

// Route::group(['prefix' => 'blog'])->group(function () {
//     Route::controller(BlogController::class)->group(function(){
//         Route::get('/', "index");
//     });
// });

Route::group(['prefix' => 'blog'], function () {

    Route::controller(BlogController::class)->group(function(){
        Route::get('/', "index")->name("web.blog.index");
        Route::get('/{post}', "show")->name("web.blog.show");;
    });
});

require __DIR__.'/auth.php';
