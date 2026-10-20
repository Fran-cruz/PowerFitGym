<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\MembershipPlanController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainingAreaController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [FeatureController::class, 'index'])->name('inicio');

Route::get('/membresias', [MembershipPlanController::class, 'index'])->name('membresias');

Route::get('/entrenamiento', [TrainingAreaController::class, 'index'])->name('entrenamiento');

Route::get('/entrenadores', [TrainerController::class, 'index'])->name('entrenadores');

Route::get('/instalaciones', [FacilityController::class, 'index'])->name('instalaciones');

Route::get('/nosotros', [FeatureController::class, 'about'])->name('nosotros');

Route::get('/contacto', function () {
    return Inertia::render('Contacto');
})->name('contacto');
