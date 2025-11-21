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
