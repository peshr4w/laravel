<?php

use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('{all}', function () {
    return view('welcome');
})->where(['all' => ".*"]);


