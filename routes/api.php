<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Category
Route::get('/facility/category/show', [App\Http\Controllers\Dashboard\Facility\FacilityCategoryController::class, 'show']);

// Facility
Route::get('/facility/show', [App\Http\Controllers\Dashboard\Facility\FacilityController::class, 'show']);
Route::post('/facility/create', [App\Http\Controllers\Dashboard\Facility\FacilityController::class, 'create']);
Route::post('/facility/update', [App\Http\Controllers\Dashboard\Facility\FacilityController::class, 'update']);

// Reservation
Route::get('/reservation/show', [App\Http\Controllers\Dashboard\Reservation\ReservationController::class, 'show']);
Route::post('/reservation/create', [App\Http\Controllers\Dashboard\Reservation\ReservationController::class, 'create']);
Route::post('/reservation/update', [App\Http\Controllers\Dashboard\Reservation\ReservationController::class, 'update']);
Route::post('/reservation/delete', [App\Http\Controllers\Dashboard\Reservation\ReservationController::class, 'delete']);
Route::post('/reservation/pin', [App\Http\Controllers\Dashboard\Reservation\ReservationController::class, 'pin']);

// Promotion
Route::get('/promotion/show', [App\Http\Controllers\Dashboard\Promotion\PromotionController::class, 'show']);
Route::post('/promotion/create', [App\Http\Controllers\Dashboard\Promotion\PromotionController::class, 'create']);
Route::post('/promotion/delete', [App\Http\Controllers\Dashboard\Promotion\PromotionController::class, 'delete']);
