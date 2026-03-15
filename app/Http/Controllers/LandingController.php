<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.welcome_to_hell');
});