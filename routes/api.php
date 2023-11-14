<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// api route : <baseurl>/api/<any of d below routes>

Route::controller(BookController::class)->group(function () {
    // List all posts
    Route::get('posts', 'index');

    // List a single post
    Route::get('post/{id}', 'show');

    // Create a new post
    Route::post('post', 'store');

    // Update a post
    Route::put('post', 'update');

    // Delete a post
    Route::delete('post/{id}', 'destroy');
});
