<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cookie-proof', function () {
    return response('COOKIE SENT')->cookie(
        'proof_cookie',
        'it_works',
        10,
        '/',
        'localhost',
        false,
        false,
        false,
        'Lax'
    );
});
