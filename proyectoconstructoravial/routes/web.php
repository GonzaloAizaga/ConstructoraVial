<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachinesTypeController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ConstructionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/machines', function () {
//    return view('machines');
//})->name('machines');

Route::get('/machines', [MachineController::class, 'show'])->name('machines.show');
Route::delete('/machines/{machine}', [MachineController::class, 'destroy'])->name('machines.destroy');
Route::put('/machines/{machine}', [MachineController::class, 'update'])->name('machines.update');
Route::get('/machines/info/{id}', [MachineController::class, 'viewInfo'])->name('machines.info');
Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
Route::post('/machines', [MachineController::class, 'store'])->name('machines.store');

//Route::get('/constructions', function () {
//    return view('constructions');
//})->name('constructions');

Route::get('/constructions', [ConstructionController::class, 'index'])->name('constructions.show');
Route::delete('/constructions/{constructions}', [ConstructionController::class, 'destroy'])->name('constructions.destroy');
Route::get('/constructions/info/{id}', [ConstructionController::class, 'viewInfo'])->name('constructions.info');


Route::get('/assignment', function () {
    return view('assignment');
})->name('assignment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
