<?php

use App\Exports\ReservationExport;
use App\Exports\ReservationMiniSoccerExport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [App\Http\Controllers\PublicView\Home\HomeController::class, 'index'])->name('home');

Route::get('/facility', [App\Http\Controllers\PublicView\Facility\FacilityController::class, 'index'])->name('facility');
Route::get('/facility/detail', [App\Http\Controllers\PublicView\Facility\FacilityController::class, 'detail'])->name('facility.detail');

Route::get('/gallery', [App\Http\Controllers\PublicView\Gallery\GalleryController::class, 'index'])->name('gallery');

Route::get('/contact', function () {
    return view('public.contact.index');
})->name('contact');

Route::get('/login', function () {
    return view('public.login.index');
})->name('login');

Route::get('/term-condition', function () {
    return view('public.term-condition.index');
})->name('term-condition');

Route::get('/privacy', function () {
    return view('public.privacy.index');
})->name('privacy');

Route::get('/dashboard/overview', function () {
    return view('dashboard.overview.index');
})->name('dashboard.overview');

Route::get('/dashboard/facility', function () {
    return view('dashboard.facility.index');
})->name('dashboard.facility');

Route::get('/dashboard/calendar', function () {
    return view('dashboard.calendar.reservasi');
})->name('dashboard.calendar');
// Reservation
Route::get('/reservations/export', function () {return Excel::download(new ReservationExport, 'reservations.xlsx');})->name('reservations.export');
Route::get('/reservations-mini-soccer/export', function () {return Excel::download(new ReservationMiniSoccerExport, 'reservation-mini-soccer.xlsx');})->name('reservations-mini-soccer.export');

Route::get('/dashboard/calendar-mini-soccer', function () {
    return view('dashboard.calendar.mini-soccer');
})->name('dashboard.calendar-mini-soccer');

Route::get('/dashboard/promotion', function () {
    return view('dashboard.promotion.index');
})->name('dashboard.promotion');

Route::get('/dashboard/gallery', function () {
    return view('dashboard.gallery.index');
})->name('dashboard.gallery');
