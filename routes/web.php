<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsmalteController;

Route::get('/', function () {
    return redirect()->route('esmaltes.index');
});

Route::resource('esmaltes', EsmalteController::class);