<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MidtransCallbackController;
use App\Models\Program;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;


/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/



Route::get('/', function () {

    $programs = Program::all();

    return view('landing.index', compact('programs'));

})->name('home');

/*
|--------------------------------------------------------------------------
| Registration
|--------------------------------------------------------------------------
*/

Route::get(
    '/pendaftaran/{program}',
    [RegistrationController::class, 'create']
)->name('registration.create');

Route::post(
    '/pendaftaran',
    [RegistrationController::class, 'store']
)->name('registration.store');

Route::post(
    '/midtrans/callback',
    [MidtransCallbackController::class,'handle']
)->name('midtrans.callback');

/*
|--------------------------------------------------------------------------
| Payment
|--------------------------------------------------------------------------
*/

Route::get(
    '/payment/{registration}',
    [PaymentController::class, 'index']
)->name('payment.index');

Route::get(
    '/payment/{registration}/success',
    [PaymentController::class, 'success']
)->name('payment.success');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('participant.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', 
        [AdminDashboardController::class, 'index']
    )->name('dashboard');

});

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        Route::get('/registrations',
    [AdminRegistrationController::class,'index']
)->name('registrations.index');


Route::get('/registrations/{id}',
    [AdminRegistrationController::class,'show']
)->name('registrations.show');

 Route::patch('/registrations/{id}/verify',
    [AdminRegistrationController::class,'verify']
)->name('registrations.verify');

    });

   


require __DIR__.'/auth.php';