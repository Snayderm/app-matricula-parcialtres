<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/carreras',[CarreraController::class, 'index'])->name('carreras.index');
    Route::post('/carreras',[CarreraController::class, 'store'])->name('carreras.store');
    Route::get('/carreras/create',[CarreraController::class, 'create'])->name('carreras.create');
    Route::delete('/carreras/{carrera}',[CarreraController::class, 'destroy'])->name('carreras.destroy');
    Route::put('/carreras/{carrera}',[CarreraController::class, 'update'])->name('carreras.update');
    Route::get('/carreras/{carrera}/edit',[CarreraController::class, 'edit'])->name('carreras.edit');


    Route::get('/estudiantes',[EstudianteController::class, 'index'])->name('estudiantes.index');
    Route::post('/estudiantes',[EstudianteController::class, 'store'])->name('estudiantes.store');
    Route::get('/estudiantes/create',[EstudianteController::class, 'create'])->name('estudiantes.create');
    Route::delete('/estudiantes/{estudiante}',[EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
    Route::put('/estudiantes/{estudiante}',[EstudianteController::class, 'update'])->name('estudiantes.update');
    Route::get('/estudiantes/{estudiante}/edit',[EstudianteController::class, 'edit'])->name('estudiantes.edit');

});

require __DIR__.'/auth.php';
