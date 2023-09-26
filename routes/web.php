<?php

use App\Http\Controllers\Applicant\HomePageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registering'])->name('registering');


Route::get('/auth/redirect/{provider}', function ($provider) {

    return Socialite::driver($provider)->redirect();
})->name('auth.redirect');

Route::get('/auth/callback/{provider}', [AuthController::class, 'callback'])->name('auth.callback');

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::get('/language/{locale}', function ($locale) {
    if (!in_array($locale, config('app.locales'))) {
        $locale = config('app.fallback_locale');
    }

    session()->put('locale', $locale);

    return redirect()->back()->withCookie(cookie('locale', $locale, 60 * 24 * 30));
})->name('language');

///////////////
Route::get('/test', [TestController::class, 'test']);
Route::get('/testapi', [TestController::class, 'testAPI']);

