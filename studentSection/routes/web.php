<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

// Section routes
Route::resource('sections', SectionController::class);

// Student routes
Route::resource('students', StudentController::class);
