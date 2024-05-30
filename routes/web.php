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

Route::get('/',[UserController::class,'searchMedicament'])->name('home');
Route::post('/',[UserController::class,'search_medicament']);

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'dologin']);
Route::delete('/logout',[UserController::class, 'logout'])->name('logout');

Route::prefix('user/')->name('user.')->middleware('auth')->group(function(){
    Route::get('/',[UserController::class,'list'])->name('list');
    Route::get('create', [UserController::class,'createUser'])->name('create');
    Route::post('create', [UserController::class,'create_user']);
    Route::get('update/{table}', [UserController::class,'updateUser'])->name('update');
    Route::post('update/{table}', [UserController::class,'update_user']);
    Route::get('delete/{table}',[UserController::class,'deleteUser'])->middleware('authAdmin')->name('delete');
});

Route::prefix('pharmacie/')->name('pharmacie.')->middleware('auth')->group(function(){
    Route::get('/',[PharmacieController::class,'list'])->name('list');
    Route::get('create', [PharmacieController::class,'createPharmacie'])->middleware('authAdmin')->name('create');
    Route::post('create', [PharmacieController::class,'create_pharmacie']);
    Route::get('update/{table}', [PharmacieController::class,'updatePharmacie'])->middleware('authAdmin')->name('update');
    Route::post('update/{table}', [PharmacieController::class,'update_pharmacie']);
    Route::get('delete/{table}',[PharmacieController::class,'deletePharmacie'])->middleware('authAdmin')->name('delete');
    Route::get('make-user',[PharmacieController::class,'addUser'])->name('add-user');
    Route::post('make-user',[PharmacieController::class,'add_user']);
    Route::get('check/{table}',[PharmacieController::class,'validateMedicament'])->name('validate');
    Route::post('check/{table}',[PharmacieController::class,'validate_medicament']);
});

Route::prefix('medicament')->name('medicament.')->middleware('auth')->group(function(){
    Route::get('/',[MedicamentController::class,'list'])->name('list');
    Route::get('create', [MedicamentController::class,'createMedicament'])->name('create');
    Route::post('create', [MedicamentController::class,'create_medicament']);
    Route::get('update/{table}', [MedicamentController::class,'updateMedicament'])->name('update');
    Route::post('update/{table}', [MedicamentController::class,'update_medicament']);
    Route::get('delete{table}',[MedicamentController::class,'deleteMedicament'])->middleware('authAdmin')->name('delete');
    Route::get('search',[MedicamentController::class,'searchMedicament'])->name('search');
    Route::post('search',[MedicamentController::class,'search_medicament']);
    Route::get('check/{table}',[MedicamentController::class,'validateMedicament'])->name('validate');
    Route::post('check/{table}',[MedicamentController::class,'validate_medicament']);
});