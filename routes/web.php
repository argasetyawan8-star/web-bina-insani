<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Models\Program;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Models\Hero;
use App\Http\Controllers\Admin\AboutController;
use App\Models\About;
use App\Models\Gallery;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FaqController;
use App\Models\Faq;
use App\Http\Controllers\Admin\ContactController;
use App\Models\Contact;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\PaymentSettingController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/



Route::get('/', function () {

    $programs = Program::all();

    $hero = Hero::first();

     $about = About::first();

    $galleries = Gallery::latest()->get();

    $faqs = Faq::where('is_active', true)
        ->latest()
        ->get();

        $contact = Contact::first();

    return view(
        'landing.index',
        compact(
            'programs',
            'hero',
            'about',
            'galleries',
            'faqs',
            'contact'
        )
    );

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


/*
|--------------------------------------------------------------------------
| Payment
|--------------------------------------------------------------------------
*/

Route::get(
    '/payment/{registration}',
    [PaymentController::class, 'index']
)->name('payment.index');

Route::post(
    '/payment/{registration}',
    [PaymentController::class, 'store']
)->name('payment.store');

Route::get(
    '/payment/{registration}/success',
    [PaymentController::class, 'success']
)->name('payment.success');



/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/


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

Route::patch(
    '/registrations/{registration}/payment/verify',
    [AdminRegistrationController::class, 'verifyPayment']
)->name('registrations.payment.verify');

Route::patch(
    '/registrations/{id}/payment/approve',
    [AdminRegistrationController::class, 'approvePayment']
)->name('registrations.payment.approve');


Route::patch(
    '/registrations/{registration}/payment/reject',
    [AdminRegistrationController::class, 'rejectPayment']
)->name('registrations.payment.reject');

Route::get(
    '/payments',
    [AdminPaymentController::class, 'index']
)->name('payments.index');

Route::get(
    '/programs',
    [ProgramController::class, 'index']
)->name('programs.index');

Route::get(
    '/reports',
    [ReportController::class, 'index']
)->name('reports.index');

Route::get(
    '/payments/{id}',
    [AdminPaymentController::class, 'show']
)->name('payments.show');

Route::resource(
    'programs',
    ProgramController::class
)->names('programs');

Route::get(
    '/reports/pdf',
    [ReportController::class, 'exportPdf']
)->name('reports.pdf');

Route::get(
    '/reports/excel',
    [ReportController::class,'exportExcel']
)->name('reports.excel');

Route::get(
    '/settings',
    [SettingController::class, 'index']
)->name('settings.index');

Route::post(
    '/settings',
    [SettingController::class, 'update']
)->name('settings.update');

Route::get(
            '/hero',
            [HeroController::class, 'index']
        )->name('hero.index');

        Route::post(
            '/hero',
            [HeroController::class, 'update']
        )->name('hero.update');


   Route::get('/about', [AboutController::class, 'index'])
    ->name('about.index');

Route::post('/about', [AboutController::class, 'update'])
    ->name('about.update');

    Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery.index');

Route::post('/gallery', [GalleryController::class, 'store'])
    ->name('gallery.store');

Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])
    ->name('gallery.destroy');

    Route::resource(
    'faqs',
    FaqController::class
)->names('faqs');


Route::get(
    'contact',
    [ContactController::class,'index']
)->name('contact.index');


Route::put(
    'contact',
    [ContactController::class,'update']
)->name('contact.update');

Route::get(
        '/payment-setting',
        [\App\Http\Controllers\Admin\PaymentSettingController::class,'index']
    )
    ->name('payment-setting.index');


    Route::post(
        '/payment-setting',
        [\App\Http\Controllers\Admin\PaymentSettingController::class,'update']
    )
    ->name('payment-setting.update');


    });

    

   


require __DIR__.'/auth.php';