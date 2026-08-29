<?php

use Illuminate\Support\Facades\Route;

// ============================================================================
// PUBLIC CONTROLLERS
// ============================================================================

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ParticipantDashboardController;

// ============================================================================
// ADMIN CONTROLLERS
// ============================================================================

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\ProfileController;

// ============================================================================
// MODELS
// ============================================================================

use App\Models\Program;
use App\Models\Hero;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\Contact;


/*
|--------------------------------------------------------------------------
| PUBLIC - HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $programs = Program::query()
        ->where('is_active', true)
        ->orderBy('name')
        ->get();

    $hero = Hero::first();

    $about = About::first();

    $galleries = Gallery::latest()->get();

    $faqs = Faq::query()
        ->where('is_active', true)
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
| PUBLIC - PROGRAM
|--------------------------------------------------------------------------
*/

Route::get(
    '/program',
    [ProgramController::class, 'index']
)->name('programs.index');


Route::get(
    '/program/{program}',
    [ProgramController::class, 'show']
)->name('programs.show');


/*
|--------------------------------------------------------------------------
| PUBLIC - FAQ
|--------------------------------------------------------------------------
*/

Route::get('/faq', function () {

    $faqs = Faq::query()
        ->where('is_active', true)
        ->latest()
        ->get();

    return view(
        'faq.index',
        compact('faqs')
    );

})->name('faq.index');


/*
|--------------------------------------------------------------------------
| PUBLIC - KONTAK
|--------------------------------------------------------------------------
*/

Route::get('/kontak', function () {

    $contact = Contact::first();

    return view(
        'contact.index',
        compact('contact')
    );

})->name('contact.public');


/*
|--------------------------------------------------------------------------
| REGISTRATION
|--------------------------------------------------------------------------
|
| Peserta wajib login sebelum membuka dan mengirim formulir pendaftaran.
|
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/pendaftaran/{program}',
        [RegistrationController::class, 'create']
    )->name('registration.create');


    Route::post(
        '/pendaftaran',
        [RegistrationController::class, 'store']
    )->name('registration.store');

});


/*
|--------------------------------------------------------------------------
| PAYMENT - PESERTA
|--------------------------------------------------------------------------
|
| Semua proses pembayaran hanya dapat diakses oleh user yang sudah login.
|
*/

Route::middleware('auth')->group(function () {

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

});


/*
|--------------------------------------------------------------------------
| DASHBOARD PESERTA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/dashboard',
        [ParticipantDashboardController::class, 'index']
    )->name('dashboard');

});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | PROFILE
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/profile',
            [ProfileController::class, 'index']
        )->name('profile.index');


        Route::put(
            '/profile',
            [ProfileController::class, 'update']
        )->name('profile.update');


        /*
        |--------------------------------------------------------------------------
        | PASSWORD
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/password',
            [ProfileController::class, 'editPassword']
        )->name('password.edit');


        Route::put(
            '/password',
            [ProfileController::class, 'updatePassword']
        )->name('password.update');


        /*
        |--------------------------------------------------------------------------
        | REGISTRATIONS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/registrations',
            [AdminRegistrationController::class, 'index']
        )->name('registrations.index');


        Route::get(
            '/registrations/{registration}',
            [AdminRegistrationController::class, 'show']
        )->name('registrations.show');


        Route::patch(
            '/registrations/{id}/verify',
            [AdminRegistrationController::class, 'verify']
        )->name('registrations.verify');


        /*
        |--------------------------------------------------------------------------
        | PAYMENT VERIFICATION
        |--------------------------------------------------------------------------
        */

        Route::patch(
            '/registrations/{registration}/payment/approve',
            [AdminRegistrationController::class, 'approvePayment']
        )->name('registrations.payment.approve');


        Route::patch(
            '/registrations/{registration}/payment/reject',
            [AdminRegistrationController::class, 'rejectPayment']
        )->name('registrations.payment.reject');


        /*
        |--------------------------------------------------------------------------
        | PAYMENTS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/payments',
            [AdminPaymentController::class, 'index']
        )->name('payments.index');


        Route::get(
            '/payments/{id}',
            [AdminPaymentController::class, 'show']
        )->name('payments.show');


        /*
        |--------------------------------------------------------------------------
        | PROGRAMS - ADMIN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'programs',
            AdminProgramController::class
        )->names('programs');


        /*
        |--------------------------------------------------------------------------
        | REPORTS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/reports',
            [ReportController::class, 'index']
        )->name('reports.index');


        Route::get(
            '/reports/pdf',
            [ReportController::class, 'exportPdf']
        )->name('reports.pdf');


        Route::get(
            '/reports/excel',
            [ReportController::class, 'exportExcel']
        )->name('reports.excel');


        /*
        |--------------------------------------------------------------------------
        | WEBSITE SETTINGS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/settings',
            [SettingController::class, 'index']
        )->name('settings.index');


        Route::post(
            '/settings',
            [SettingController::class, 'update']
        )->name('settings.update');


        /*
        |--------------------------------------------------------------------------
        | HERO CMS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/hero',
            [HeroController::class, 'index']
        )->name('hero.index');


        Route::post(
            '/hero',
            [HeroController::class, 'update']
        )->name('hero.update');


        /*
        |--------------------------------------------------------------------------
        | ABOUT CMS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/about',
            [AboutController::class, 'index']
        )->name('about.index');


        Route::post(
            '/about',
            [AboutController::class, 'update']
        )->name('about.update');


        /*
        |--------------------------------------------------------------------------
        | GALLERY CMS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/gallery',
            [GalleryController::class, 'index']
        )->name('gallery.index');


        Route::post(
            '/gallery',
            [GalleryController::class, 'store']
        )->name('gallery.store');


        Route::delete(
            '/gallery/{gallery}',
            [GalleryController::class, 'destroy']
        )->name('gallery.destroy');


        /*
        |--------------------------------------------------------------------------
        | FAQ CMS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'faqs',
            FaqController::class
        )->names('faqs');


        /*
        |--------------------------------------------------------------------------
        | CONTACT CMS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/contact',
            [ContactController::class, 'index']
        )->name('contact.index');


        Route::put(
            '/contact',
            [ContactController::class, 'update']
        )->name('contact.update');


        /*
        |--------------------------------------------------------------------------
        | PAYMENT SETTINGS
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/payment-setting',
            [PaymentSettingController::class, 'index']
        )->name('payment-setting.index');


        Route::post(
            '/payment-setting',
            [PaymentSettingController::class, 'update']
        )->name('payment-setting.update');

    });


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
