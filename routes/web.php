<?php

use Illuminate\Support\Facades\Route;

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
    return view('dashboard.calendar.index');
})->name('dashboard.calendar');

Route::get('/dashboard/promotion', function () {
    return view('dashboard.promotion.index');
})->name('dashboard.promotion');

Route::get('/dashboard/gallery', function () {
    return view('dashboard.gallery.index');
})->name('dashboard.gallery');
