<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Página de inicio pública
Route::get('/', function () {
    return Inertia::render('Inicio');
})->name('inicio');

// Páginas públicas estáticas del gimnasio
Route::get('/membresias', function () {
    return Inertia::render('Membresias');
})->name('membresias');

Route::get('/entrenamiento', function () {
    return Inertia::render('Entrenamiento');
})->name('entrenamiento');

Route::get('/entrenadores', function () {
    return Inertia::render('Entrenadores');
})->name('entrenadores');

Route::get('/instalaciones', function () {
    return Inertia::render('Instalaciones');
})->name('instalaciones');

Route::get('/nosotros', function () {
    return Inertia::render('Nosotros');
})->name('nosotros');

Route::get('/contacto', function () {
    return Inertia::render('Contacto');
})->name('contacto');
