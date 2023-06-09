<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\RegistersContoller;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\CitiesController as AdminCitiesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\VisitsController as AdminVisitsController;
use App\Http\Controllers\Admin\HospitalsController as AdminHospitalsController;


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
Route::get('/wyloguj', [AuthController::class, 'logout']);

// tylko po zalogowaniu
Route::get('/zapisy', [RegistersContoller::class, 'index']);
Route::get('/ajax/vaccine/{city}', [RegistersContoller::class, 'citiesList']);
Route::get('/ajax/vaccine/city/{city}', [RegistersContoller::class, 'cityInfo']);
Route::get('/zapisy/zapisz/{hospital}', [RegistersContoller::class, 'registerForVisit']);

// tylko uzytkownik
Route::get('/moje-konto', [UserController::class, 'myAccount']);
Route::post('/moje-konto', [UserController::class, 'updateMyData']);
Route::get('/moje-konto/wizyty', [UserController::class, 'myVisits']);
Route::get('/moje-konto/wizyty/certfikat/{visit}', [UserController::class, 'certificate']);
Route::get('/moje-konto/wizyty/anuluj/{visit}', [UserController::class, 'cancelVisit']);

// tylko pracownik
Route::get('/testy', [TestsController::class, 'index']);
Route::get('/test/change-status/{visit}', [TestsController::class, 'changeStatus']);
Route::get('/test/change-result/{visit}', [TestsController::class, 'changeResult']);

// admin
Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminAuthController::class, 'login']);
    Route::post('/login', [AdminAuthController::class, 'loginUser']);
    Route::get('/', [AdminDashboardController::class, 'index']);

    //FAQ
    Route::prefix('faq')->group(function() {
        Route::get('/', [AdminFaqController::class, 'list']);
        Route::get('create', [AdminFaqController::class, 'create']);
        Route::post('create', [AdminFaqController::class, 'save']);
        Route::get('{itemId}', [AdminFaqController::class, 'edit']);
        Route::patch('edit', [AdminFaqController::class, 'update']);
        Route::delete('delete', [AdminFaqController::class, 'delete']);
    });

    //Miasta
    Route::prefix('cities')->group(function() {
        Route::get('/', [AdminCitiesController::class, 'list']);
        Route::get('create', [AdminCitiesController::class, 'create']);
        Route::post('create', [AdminCitiesController::class, 'save']);
        Route::get('{itemId}', [AdminCitiesController::class, 'edit']);
        Route::patch('edit', [AdminCitiesController::class, 'update']);
        Route::delete('delete', [AdminCitiesController::class, 'delete']);
    });

    //Użytkownicy
    Route::prefix('users')->group(function() {
        Route::get('/', [AdminUsersController::class, 'list']);
        Route::get('create', [AdminUsersController::class, 'create']);
        Route::post('create', [AdminUsersController::class, 'save']);
        Route::get('{itemId}', [AdminUsersController::class, 'edit']);
        Route::patch('edit', [AdminUsersController::class, 'update']);
        Route::delete('delete', [AdminUsersController::class, 'delete']);
        Route::post('addHospital', [AdminUsersController::class, 'addHospital']);
        Route::delete('deleteHospital', [AdminUsersController::class, 'deleteHospital']);
    });

    //Wizyty
    Route::prefix('visits')->group(function() {
        Route::get('/', [AdminVisitsController::class, 'list']);
        Route::get('create', [AdminVisitsController::class, 'create']);
        Route::post('create', [AdminVisitsController::class, 'save']);
        Route::get('{itemId}', [AdminVisitsController::class, 'edit']);
        Route::patch('edit', [AdminVisitsController::class, 'update']);
        Route::delete('delete', [AdminVisitsController::class, 'delete']);
    });

    //Szpitale
    Route::prefix('hospitals')->group(function() {
        Route::get('/', [AdminHospitalsController::class, 'list']);
        Route::get('create', [AdminHospitalsController::class, 'create']);
        Route::post('create', [AdminHospitalsController::class, 'save']);
        Route::get('{itemId}', [AdminHospitalsController::class, 'edit']);
        Route::patch('edit', [AdminHospitalsController::class, 'update']);
        Route::delete('delete', [AdminHospitalsController::class, 'delete']);
    });
});
