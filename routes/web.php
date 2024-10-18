<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', [PageController::class, 'index']);

Route::post('/save-content', [PageController::class, 'saveContentBlock'])->name('save-content');

