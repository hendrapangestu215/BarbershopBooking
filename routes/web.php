<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HairstyleController;
use App\Http\Controllers\Admin\MembershipController as AdminMembershipController;
use App\Http\Controllers\HairstyleCatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Models\Hairstyle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/services', function () {
    return view('services');
});

Route::get('/hairstyles', [HairstyleCatalogController::class, 'index'])->name('hairstyle.catalog');

Route::get('/booking', function () {
    return view('bookingAppointment');
});

// Route::get('/membership', function () {
//     return view('membership');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/membership', [MembershipController::class, 'index'])->name('membership');
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
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('/admin/manageHairstyle', [AdminController::class, 'manageHairstyle'])->name('admin.manageHairstyle');
    Route::get('/admin/manageBooking', [AdminController::class, 'manageBooking'])->name('admin.manageBooking');
    Route::get('/admin/manageService', [AdminController::class, 'manageService'])->name('admin.manageService');
    // Route::get('/admin/manageMembership', [AdminController::class, 'manageMembership'])->name('admin.manageMembership');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'adminMiddleware'])->prefix('admin')->group(function () {
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
});

Route::middleware(['auth', 'verified', 'adminMiddleware'])->prefix('admin')->group(function () {
    Route::get('/manageMembership', [AdminMembershipController::class, 'index'])->name('admin.manageMembership');
    Route::post('/membership', [AdminMembershipController::class, 'store'])->name('admin.membership.store');
    Route::get('/membership/{membership}/edit-data', [AdminMembershipController::class, 'editData'])->name('admin.membership.editData');
    Route::put('/membership/{membership}', [AdminMembershipController::class, 'update'])->name('admin.membership.update');
    Route::delete('/membership/{membership}', [AdminMembershipController::class, 'destroy'])->name('admin.membership.destroy');
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
