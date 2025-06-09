<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\HairstyleController;
use App\Http\Controllers\Admin\MembershipController as AdminMembershipController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HairstyleCatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\User\UserController;
use App\Models\Hairstyle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/services', function () {
    return view('services');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services');

Route::get('/hairstyles', [HairstyleCatalogController::class, 'index'])->name('hairstyle.catalog');

Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [BookingController::class, 'storeStepOne'])->name('booking.store-step-one');

    Route::get('/booking-step-two', [BookingController::class, 'stepTwo'])->name('booking.step-two');
    Route::post('/booking-step-two', [BookingController::class, 'storeStepTwo'])->name('booking.store-step-two');

    Route::get('/booking-step-three', [BookingController::class, 'stepThree'])->name('booking.step-three');
    Route::post('/booking-step-three', [BookingController::class, 'storeStepThree'])->name('booking.store-step-three');

    Route::get('/booking-step-four', [BookingController::class, 'stepFour'])->name('booking.step-four');
    Route::post('/booking-confirm', [BookingController::class, 'confirm'])->name('booking.confirm');

    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

    Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');
});

Route::get('/membership', [MembershipController::class, 'index'])->name('membership');

Route::middleware(['auth'])->group(function () {
    Route::post('/membership/join', [MembershipController::class, 'join'])->name('membership.join');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->usertype === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->middleware('auth')->name('dashboard');

// user routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    // Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

// admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    // admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // admin manageHairstyle
    Route::get('/manageHairstyle', function () {
        $hairstyles = Hairstyle::all();
        return view('admin.manageHairstyle', compact('hairstyles'));
    })->name('admin.manageHairstyle');

    Route::post('/hairstyle', [HairstyleController::class, 'store'])
        ->name('admin.hairstyle.store');

    Route::get('/hairstyle/{hairstyle}/edit', [HairstyleController::class, 'edit'])
        ->name('admin.hairstyle.edit');

    Route::put('/hairstyle/{hairstyle}', [HairstyleController::class, 'update'])
        ->name('admin.hairstyle.update');

    Route::delete('/hairstyle/{hairstyle}', [HairstyleController::class, 'destroy'])
        ->name('admin.hairstyle.destroy');

    // admin manageBooking
    Route::get('/manageBooking', [AdminBookingController::class, 'index'])->name('admin.manageBooking');
    Route::post('/bookings', [AdminBookingController::class, 'store'])->name('admin.bookings.store');
    Route::get('/bookings/{booking}/edit', [AdminBookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
    Route::delete('/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');

    // admin manageService
    Route::get('/manageService', [AdminServiceController::class, 'index'])->name('admin.manageService');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('admin.service.store');
    Route::get('/services/{service}/edit', [AdminServiceController::class, 'edit'])->name('admin.service.edit');
    Route::put('/services/{service}', [AdminServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])->name('admin.service.destroy');

    // admin manageMembership
    Route::get('/manageMembership', [AdminMembershipController::class, 'index'])->name('admin.manageMembership');
    Route::post('/membership', [AdminMembershipController::class, 'store'])->name('admin.membership.store');
    Route::get('/membership/{membership}/edit-data', [AdminMembershipController::class, 'editData'])->name('admin.membership.editData');
    Route::put('/membership/{membership}', [AdminMembershipController::class, 'update'])->name('admin.membership.update');
    Route::delete('/membership/{membership}', [AdminMembershipController::class, 'destroy'])->name('admin.membership.destroy');

    // admin profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth', 'ad')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
