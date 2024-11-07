<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'userpage.index');
});

Route::get('/dashboard', function () {
    return view(view: 'dashboard.index');
});