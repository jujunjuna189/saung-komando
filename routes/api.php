<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Category
Route::get('/facility/category/show', [App\Http\Controllers\Dashboard\Facility\FacilityCategoryController::class, "show"]);

// Facility
Route::get('/facility/show', [App\Http\Controllers\Dashboard\Facility\FacilityController::class, "show"]);
Route::post('/facility/create', [App\Http\Controllers\Dashboard\Facility\FacilityController::class, "create"]);

// Reservation
Route::get('/reservation/show', [App\Http\Controllers\Dashboard\Reservation\ReservationController::class, "show"]);
Route::post('/reservation/create', [App\Http\Controllers\Dashboard\Reservation\ReservationController::class, "create"]);
