<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/slug', [PostController::class, 'checkSlug'])->name('posts.slug.check');
Route::post('/posts/slug', [PostController::class, 'generateSlug'])->name('posts.slug.generate');
Route::get('/companies/check/{companyName?}', [CompanyController::class, 'check'])->name('companies.check');
Route::get('/companies', [CompanyController::class, 'index'])->name('companies');
Route::get('/languages', [LanguageController::class, 'index'])->name('languages');
