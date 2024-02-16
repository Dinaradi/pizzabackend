<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sitecontroller;
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


// Route::get('/',[Sitecontroller::class, 'index'])->name('home');

// Route::group(['prefix' => '{locale}'], function (){
//     Route::get('/', function () {
//         return view('auth.login');
//     })->middleware('setLocale');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('customer', function () {
    //     return view('customer');
    // });

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});


Route::get('lang/{lang}', function ($lang) {
    session(['lang' => $lang]);
    return back();
})->name('language');



require __DIR__ . '/auth.php';
