<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home.index');
})->name('home');

Route::get('/facility', function () {
    return view('public.facility.index');
})->name('facility');

Route::get('/gallery', function () {
    return view('public.gallery.index');
})->name('gallery');

Route::get('/contact', function () {
    return view('public.contact.index');
})->name('contact');

Route::get('/login', function () {
    return view('public.login.index');
})->name('login');

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
