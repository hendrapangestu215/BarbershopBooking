<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/hairstyles', function () {
    return view('hairstyleCatalog');
});

Route::get('/booking', function () {
    return view('bookingAppointment');
});

Route::get('/membership', function () {
    return view('membership');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});
