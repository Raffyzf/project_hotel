<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//ADMIN Controller--------------------------------------------------------------------
Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');

//DATA BOOKING
Route::get('/data_booking', [AdminController::class, 'data_booking']);
Route::get('/booking_update/{id}', [AdminController::class, 'booking_update']);
Route::post('/update_booking/{id}', [AdminController::class, 'update_booking']);

//DELETE BOOKING
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);

//CREATE KAMAR
Route::get('/kamar_tambah', [AdminController::class, 'kamar_tambah']);
Route::post('/create_kamar', [AdminController::class, 'create_kamar']);

//READ KAMAR
Route::get('/data_kamar', [AdminController::class, 'data_kamar']);

//UPDATE KAMAR
Route::get('/kamar_update/{id}', [AdminController::class, 'kamar_update']);
Route::post('/update_kamar/{id}', [AdminController::class, 'update_kamar']);

//DELETE KAMAR
Route::get('/delete_kamar/{id}', [AdminController::class, 'delete_kamar']);
//END ADMIN Controller----------------------------------------------------------------



//HOME Controller---------------------------------------------------------------------
Route::get('/kamar_detail/{id}', [HomeController::class, 'kamar_detail']);

Route::middleware('auth')->group(function(){
    Route::post('/booking_kamar/{id}', [HomeController::class, 'booking_kamar']);
});
