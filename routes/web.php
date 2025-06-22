<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\CertificateController;

Route::get('/certificates/create', [CertificateController::class, 'create'])->name('certificates.create');
Route::post('/certificates', action: [CertificateController::class, 'store'])->name('certificates.store');

Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');
Route::post('/services/{id}/reviews', [ServiceController::class, 'storeReview'])->name('services.storeReview');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/certificates', [CertificateController::class, 'index'])->name('admin.certificates.index');

    Route::get('/services', [App\Http\Controllers\Admin\ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [App\Http\Controllers\Admin\ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [App\Http\Controllers\Admin\ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [App\Http\Controllers\Admin\ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [App\Http\Controllers\Admin\ServiceController::class, 'destroy'])->name('services.destroy');
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');

    Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::delete('/bookings/{id}', [ProfileController::class, 'cancelBooking'])->name('bookings.cancel');
});

Route::get('/services', function () {
    $services = Service::all();
    return view('services.index', compact('services'));
});

Route::get('/services/{service}', function (Service $service) {
    return view('services.show', compact('service'));
})->name('services.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/booking/{service}', [BookingController::class, 'showBookingForm'])->name('booking.form');
    Route::post('/booking/{service}', [BookingController::class, 'bookAppointment'])->name('booking.submit');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');  


Auth::routes();

