<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


Route::get('/', [ImageController::class, 'index'])->name('image.index');

Route::post('/upload', [ImageController::class, 'upload'])->name('image.upload');

