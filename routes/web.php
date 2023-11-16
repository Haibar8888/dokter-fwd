<?php

use App\Http\Controllers\Backsite\AppointmentController as BacksiteAppointmentController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\PermisionController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\TransactionController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Fronsite\AppointmentController;
use App\Http\Controllers\Fronsite\LandingController;
use App\Http\Controllers\Fronsite\PaymentController;
use App\Models\MasterData\Consultation;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::resource('appointment', AppointmentController::class);
    Route::resource('payment', PaymentController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('permision', PermisionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('type-user', TypeUserController::class);
    Route::resource('config-payment', ConfigPaymentController::class);
    Route::resource('consultation', ConsultationController::class);
    Route::resource('specialist', SpecialistController::class);
    Route::resource('appointment', BacksiteAppointmentController::class);
    Route::resource('transaction', TransactionController::class);
    Route::resource('doctor', DoctorController::class);
}); 

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
