<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistersContoller;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/logowanie', [AuthController::class, 'index']);
Route::post('/logowanie', [AuthController::class, 'login']);
Route::get('/rejestracja', [AuthController::class, 'register']);
Route::post('/rejestracja', [AuthController::class, 'saveUser']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/o-nas', [HomeController::class, 'about']);
Route::get('/o-wirusie', [HomeController::class, 'aboutVirus']);

// tylko po zalogowaniu
Route::get('/zapisy', [RegistersContoller::class, 'index']);
Route::get('/ajax/vaccine/{city}', [RegistersContoller::class, 'citiesList']);
Route::get('/ajax/vaccine/city/{city}', [RegistersContoller::class, 'cityInfo']);
Route::get('/zapisy/zapisz/{hospital}', [RegistersContoller::class, 'registerForVisit']);
