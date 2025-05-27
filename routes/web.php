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

Route::get('/booking-step-two', function () {
    return view('bookingAppointmentsteptwo');
});

Route::get('/booking-step-three', function () {
    return view('bookingAppointmentstepthree');
});

Route::get('/booking-step-four', function () {
    return view('bookingAppointmentstepfour');
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
