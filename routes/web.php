<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/loan', [LoanController::class, 'store'])->name('loan.store');
Route::get('/loan/{id}', [LoanController::class, 'show'])->name('loan.view');
Route::get('/loan', [LoanController::class, 'index'])->name('loan.index');
Route::delete('/loan', [LoanController::class, 'index'])->name('loan.delete');
