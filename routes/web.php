<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ChipTunningController;
use App\Http\Controllers\Admin\EngineController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\ChipTuning;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get("chip-tunning",[HomeController::class, 'getChip'])->name('chip-tunning');

Route::post("contact-us",[HomeController::class, 'contactUs'])->name('contact-us');




Route::middleware(["auth"])->prefix("admin")->name("admin.")->group(function (){

    Route::get("/",[AdminController::class, 'index'])->name('dashboard');
    Route::get("/dashboard",[AdminController::class, 'index'])->name('dashboard');

    Route::resource('chip-tunnings', ChipTunningController::class);

    Route::resource("brands",BrandController::class);
    Route::resource("models",ModelController::class);
    Route::resource("types",TypeController::class);
    Route::resource("engines",EngineController::class);

    Route::resource("contacts",ContactController::class);

    // Route::get("profile",[ProfileController::class, "index"])->name("profile");
    // Route::put("profile",[ProfileController::class, "update"])->name("profile.update");
    // Route::put("profile/password",[ProfileController::class, "updatePassword"])->name("profile.update-password");



});
