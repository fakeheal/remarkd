<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->group(function () {
    Route::resources([
        'tags' => \App\Http\Controllers\TagController::class,
        'bookmarks' => \App\Http\Controllers\BookmarkController::class,
        'bookmarks.notes' => \App\Http\Controllers\BookmarkNoteController::class,
    ]);
});
