<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\PaymentController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PaymentSettingController;
use App\Http\Controllers\Admin\ProfileController;

// Models
use App\Models\Program;
use App\Models\Hero;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Faq;
use App\Models\Contact;


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
| Payment - Peserta
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
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Profile
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
        | Password
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
        | Registrations
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/registrations',
            [AdminRegistrationController::class, 'index']
        )->name('registrations.index');

        Route::get(
            '/registrations/{id}',
            [AdminRegistrationController::class, 'show']
        )->name('registrations.show');

        Route::patch(
            '/registrations/{id}/verify',
            [AdminRegistrationController::class, 'verify']
        )->name('registrations.verify');


        /*
        |--------------------------------------------------------------------------
        | Payment Verification
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
        | Payments
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
        | Programs
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'programs',
            ProgramController::class
        )->names('programs');


        /*
        |--------------------------------------------------------------------------
        | Reports
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
        | Website Settings
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
        | Hero CMS
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
        | About CMS
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
        | Gallery CMS
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
        | Contact CMS
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
        | Payment Settings
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
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
