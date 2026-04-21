<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SneakerController;

Route::get('/', function () {
    return redirect()->route('sneakers.index');
});

Route::resource('sneakers', SneakerController::class);
