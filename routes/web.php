<?php

use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\UserController;
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

Route::prefix('user/')->name('user.')->group(function(){
    Route::get('/',[UserController::class,'list'])->name('list');
    Route::get('create', [UserController::class,'createUser'])->name('create');
    Route::post('create', [UserController::class,'create_user']);
    Route::get('update', [UserController::class,'updateUser'])->name('update');
    Route::post('update', [UserController::class,'update_user']);
    Route::get('delete',[UserController::class,'deleteUser'])->name('delete');
});

Route::prefix('pharmacie/')->name('pharmacie.')->group(function(){
    Route::get('/',[PharmacieController::class,'list'])->name('list');
    Route::get('create', [PharmacieController::class,'createPharmacie'])->name('create');
    Route::post('create', [PharmacieController::class,'create_pharmacie']);
    Route::get('update', [PharmacieController::class,'updatePharmacie'])->name('update');
    Route::post('update', [PharmacieController::class,'update_pharmacie']);
    Route::get('delete',[PharmacieController::class,'deletePharmacie'])->name('delete');
    Route::get('make-user',[PharmacieController::class,'addUser'])->name('add-user');
    Route::post('make-user',[PharmacieController::class,'add_user']);
});

Route::prefix('medicament')->name('medicament.')->group(function(){
    Route::get('/',[MedicamentController::class,'list'])->name('list');
    Route::get('create', [MedicamentController::class,'createMedicament'])->name('create');
    Route::post('create', [MedicamentController::class,'create_medicament']);
    Route::get('update', [MedicamentController::class,'updateMedicament'])->name('update');
    Route::post('update', [MedicamentController::class,'update_medicament']);
    Route::get('delete',[MedicamentController::class,'deleteMedicament'])->name('delete');
    Route::get('search',[MedicamentController::class,'searchMedicament'])->name('search');
    Route::post('search',[MedicamentController::class,'search_medicament']);
    Route::get('check',[MedicamentController::class,'validateMedicament'])->name('validate');
    Route::post('check',[MedicamentController::class,'validate_medicament']);
});