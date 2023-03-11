<?php

use App\Http\Controllers\Dashboart\CategoryController;
use App\Http\Controllers\Dashboart\PostController;
use App\Http\Middleware\TestMiddleware;
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

// Route::get('/test/{id?}/{name?}', function ($id = 10, $name = 'oscar') {
//     echo $id;
//     echo $name;
// });

// Route::controller(PostController::class)->group(function () {

//     Route::get('post', 'index')->name('post.index');

// });

// Route::middleware([TestMiddleware::class])->group(function () {
//     Route::get('/test/{id?}/{name?}', function ($id = 10, $name = 'oscar') {
//         echo $id;
//         echo $name;
//     });
// });

Route::prefix('dashboard')->group(function () {
    Route::resource('post', PostController::class);

    Route::resource('category', CategoryController::class);
});



// Route::get('post', [PostController::class, 'index']);
// Route::get('post/{post}', [PostController::class, 'show']);
// Route::get('post/{create}', [PostController::class, 'create']);
// Route::get('post/{post}/edit', [PostController::class, 'edit']);

// Route::pos('post', [PostController::class, 'store']);
// Route::put('post/{post}', [PostController::class, 'update']);
// Route::delete('post/{post}', [PostController::class, 'delete']);
